<?php

namespace App\Http\Controllers;

use App\Models\Care;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\CareRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Food;
use App\Models\Animal;
use App\Models\Employee;
use App\Models\Species;

class CareController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $query = Care::query();

    if ($request->filled('search')) {
        $search = $request->get('search');

        $query->where(function ($q) use ($search) {
            $q->where('id_cuidados', $search)                    // ID exacto
              ->orWhere('tratamiento', 'like', "%$search%");  // nombre parcial
        });
    }

    $cares      = $query->paginate();
    $noResultsMessage = $cares  ->isEmpty() && $request->has('search')
        ? 'No se encontraron Cuidados con: "' . $search . '"'
        : 'No hay registros.';

    return view('care.index', compact('cares', 'noResultsMessage'))
           ->with('i', ($request->input('page', 1) - 1) * $cares  ->perPage());
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $care = new Care();
        $foods = Food::all();
        $employees = Employee::where('tipo_em', 'Cuidador')->get();
        $animals = Animal::with('species')->get();
        $species = Species::all();

        

        return view('care.create', compact('care', 'foods', 'employees', 'animals', 'species'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CareRequest $request): RedirectResponse
    {
        Care::create($request->validated());

        return Redirect::route('care.index')
            ->with('success', 'Registro creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id_cuidados): View
    {
        $care = Care::find($id_cuidados);

        return view('care.show', compact('care'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_cuidados): View
    {
        $care = Care::find($id_cuidados);
        $foods = Food::all();
        $employees = Employee::where('tipo_em', 'Cuidador')->get();
        $animals = Animal::with('species')->get();
        $species = Species::all();

        return view('care.edit', compact('care', 'foods', 'employees', 'animals', 'species'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CareRequest $request, Care $care): RedirectResponse
    {
        $care->update($request->validated());

        return Redirect::route('care.index')
            ->with('success', 'Registro actualizado exitosamente.');
    }

    public function destroy($id_cuidados): RedirectResponse
    {
        Care::find($id_cuidados)->delete();

        return Redirect::route('care.index')
            ->with('success', 'Registro eliminado exitosamente.');
    }
}
