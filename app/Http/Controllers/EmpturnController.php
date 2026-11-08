<?php

namespace App\Http\Controllers;

use App\Models\Empturn;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EmpturnRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Turn;
use App\Models\Employee;

class EmpturnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
    $query = Empturn::from('empturns as et')
        ->leftJoin('employees as e', 'e.num_trabajador', '=', 'et.fk_empleado')
        ->leftJoin('turns     as t', 't.cod_turno',      '=', 'et.fk_turno')
        ->select([
            'et.*',
            'e.nom as empleado_nombre',
            't.descripcion as turno_desc'
        ]);

    /* ────── Filtro ────── */
    if ($request->filled('search')) {
        $search = trim($request->input('search'));

        $query->where(function ($q) use ($search) {
            $q->where('et.fk_turno', $search)        // código exacto
              ->orWhere('t.descripcion', 'like', "%{$search}%"); // descripción
        });
    }

    $empturns = $query->paginate();

    $noResultsMessage = $empturns->isEmpty() && $request->has('search')
        ? 'No se encontraron datos con: "' . $request->input('search') . '"'
        : 'No hay datos registrados.';

    return view('empturn.index', compact('empturns', 'noResultsMessage'))
        ->with('i', ($request->input('page', 1) - 1) * $empturns->perPage());
}

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $empturn = new Empturn();
        $turns = Turn::all();
        $employees =Employee::all();

        return view('empturn.create', compact('empturn', 'turns', 'employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmpturnRequest $request): RedirectResponse
    {
        Empturn::create($request->validated());

        return Redirect::route('empturns.index')
            ->with('success', 'Registro creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($cod_empturn): View
    {
        $empturn = Empturn::find($cod_empturn);

        return view('empturn.show', compact('empturn'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($cod_empturn): View
    {
        $empturn = Empturn::find($cod_empturn);
        $turns = Turn::all();
        $employees =Employee::all();

        return view('empturn.edit', compact('empturn', 'turns', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmpturnRequest $request, Empturn $empturn): RedirectResponse
    {
        $empturn->update($request->validated());

        return Redirect::route('empturns.index')
            ->with('success', 'Registro actualizado exitosamente.');
    }

    public function destroy($cod_empturn): RedirectResponse
    {
        Empturn::find($cod_empturn)->delete();

        return Redirect::route('empturns.index')
            ->with('success', 'Registro eliminado exitosamente.');
    }
}
