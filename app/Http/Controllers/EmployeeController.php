<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Data;
use App\Models\Employee;
use App\Models\Turn;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    /* ---------- LISTA ---------- */
    public function index(Request $request): View
    {
        $query = Employee::with('data');

        if ($request->filled('search')) {
            $search = $request->string('search');
            $query->where(fn ($q) => $q
                ->where('num_trabajador', $search)            // búsqueda exacta por ID
                ->orWhere('nom', 'like', "%{$search}%"));
        }

        $employees        = $query->paginate();
        $noResultsMessage = $employees->isEmpty() && $request->filled('search')
            ? "No se encontraron empleados con: “{$request->search}”"
            : 'No hay empleados registrados.';

        return view('employee.index', compact('employees', 'noResultsMessage'))
            ->with('i', (request('page', 1) - 1) * $employees->perPage());
    }

    /* ---------- CREATE ---------- */
    public function create(): View
    {
        $employee = new Employee;

        $turnos = Turn::select('cod_turno',
                        DB::raw("CONCAT(hora_inicio,' - ',hora_salida) AS descripcion"))
                      ->pluck('descripcion', 'cod_turno');

        $jefes = Employee::where('tipo_em', 'Administrativo')
              ->select('num_trabajador',
                       DB::raw("CONCAT(nom,' ',apat) AS nombre"))
              ->pluck('nombre', 'num_trabajador')
              ->prepend('Ninguno', null);

        $sexos         = ['M'=>'Mujer','H'=>'Hombre','Otro'=>'Otro'];
        $tiposEmpleado = ['Cuidador'=>'Cuidador','Limpieza'=>'Limpieza','Administrativo'=>'Administrativo'];
        $data          = new Data;                       // datos “vacíos” para la vista

        return view('employee.create', compact(
            'employee','turnos','jefes','sexos','tiposEmpleado','data'
        ));
    }

    /* ---------- STORE (solo empleado) ---------- */
    public function store(EmployeeRequest $request): RedirectResponse
    {
        Employee::create($request->validated());

        return Redirect::route('employees.index')
            ->with('success', __('Empleado creado correctamente.'));
    }

    /* ---------- SHOW ---------- */
    public function show(Employee $employee)   // <-- ya llega por route-model-binding
    {
        // eager-load la relación
        $employee->load('data');          //  ← nombre exacto del método de relación

        return view('employee.show', compact('employee'));
    }

    /* ---------- EDIT ---------- */
    public function edit(Employee $employee): View
    {
        $turnos = Turn::select('cod_turno',
                        DB::raw("CONCAT(hora_inicio,' - ',hora_salida) AS descripcion"))
                      ->pluck('descripcion', 'cod_turno');

        $jefes = Employee::where('tipo_em', 'Administrativo')
              ->where('num_trabajador', '!=', $employee->num_trabajador)
              ->select('num_trabajador',
                       DB::raw("CONCAT(nom,' ',apat) AS nombre"))
              ->pluck('nombre', 'num_trabajador')
              ->prepend('Ninguno', null);

        $sexos         = ['M'=>'Mujer','H'=>'Hombre','Otro'=>'Otro'];
        $tiposEmpleado = ['Cuidador'=>'Cuidador','Limpieza'=>'Limpieza','Administrativo'=>'Administrativo'];
        $data          = Data::where('num_trabajador',$employee->num_trabajador)->first() ?? new Data;

        return view('employee.edit', compact(
            'employee','turnos','jefes','sexos','tiposEmpleado','data'
        ));
    }

    /* ---------- UPDATE (solo empleado) ---------- */
    public function update(EmployeeRequest $request, Employee $employee): RedirectResponse
    {
        $employee->update($request->validated());

        return Redirect::route('employees.index')
            ->with('success', __('Empleado actualizado correctamente.'));
    }

    /* ---------- DESTROY ---------- */
    public function destroy($num_trabajador): RedirectResponse
    {
        Employee::findOrFail($num_trabajador)->delete();

        return Redirect::route('employees.index')
            ->with('success', __('Empleado eliminado correctamente.'));
    }

    /* ============================================================
       ===========  STORE y UPDATE con datos adicionales ===========
       ============================================================ */

    /** Guarda un empleado + sus datos (cuando “tipo_guardado = empleado_y_datos”) */
    public function storeTodo(Request $request): RedirectResponse
    {
        /*--------------- Validación del empleado ----------------*/
        $request->validate((new EmployeeRequest)->rules());

        /*--------------- Crear empleado ----------------*/
        $employee = Employee::create($request->except(['datos','tipo_guardado']));

        /*--------------- Decidir si hay que crear Data -------------*/
        $this->saveDataIfNeeded($request, $employee->num_trabajador);

        return Redirect::route('employees.index')
            ->with('success', __('Empleado (y datos) creado correctamente.'));
    }

    /** Actualiza un empleado + sus datos (cuando “tipo_guardado = empleado_y_datos”) */
    public function updateTodo(Request $request, Employee $employee): RedirectResponse
    {
        /*--------------- Validación del empleado ----------------*/
        $request->validate((new EmployeeRequest)->rules());

        /*--------------- Actualizar empleado ----------------*/
        $employee->update($request->except(['datos','tipo_guardado']));

        /*--------------- Actualizar/crear Data ---------------*/
        $this->saveDataIfNeeded($request, $employee->num_trabajador, true);

        return Redirect::route('employees.index')
            ->with('success', __('Empleado (y datos) actualizado correctamente.'));
    }

    /* ----------  MÉTODO AUXILIAR  ---------- */
    /**
     * Crea o actualiza el registro en “data” solo cuando:
     *   - el formulario se envió con tipo_guardado = empleado_y_datos
     *   - y al menos un campo de datos tiene contenido real
     */
    private function saveDataIfNeeded(Request $request, int $numTrabajador, bool $isUpdate = false): void
    {
        if ($request->input('tipo_guardado') !== 'empleado_y_datos') {
            // Se usó “Guardar solo Empleado” → salir
            return;
        }

        $datos = collect($request->input('datos', []))
                    ->filter(fn ($v) => $v !== null && $v !== '');

        if ($datos->isEmpty()) {
            // Todos los campos estaban vacíos → no se guarda nada
            return;
        }

        if ($isUpdate) {
            // Buscar registro existente
            $data = Data::firstOrNew(['num_trabajador' => $numTrabajador]);
            $data->fill($datos->all())->save();
        } else {
            // Crear nuevo
            Data::create($datos->merge(['num_trabajador' => $numTrabajador])->all());
        }
    }
}