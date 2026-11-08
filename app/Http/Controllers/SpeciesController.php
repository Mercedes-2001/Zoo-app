<?php

namespace App\Http\Controllers;

use App\Models\Species;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\SpeciesRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class SpeciesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $query = Species::query();

    if ($request->filled('search')) {
        $search = $request->get('search');

        $query->where(function ($q) use ($search) {
            $q->where('id_esp', $search)                    // ID exacto
              ->orWhere('nom_comun', 'like', "%$search%");  // nombre parcial
        });
    }

    $species      = $query->paginate();
    $noResultsMessage = $species->isEmpty() && $request->has('search')
        ? 'No se encontraron especies con: "' . $search . '"'
        : 'No hay especies registrados.';

    return view('species.index', compact('species', 'noResultsMessage'))
           ->with('i', ($request->input('page', 1) - 1) * $species->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $species = new Species();

        return view('species.create', compact('species'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SpeciesRequest $request): RedirectResponse
    {
        Species::create($request->validated());

        return Redirect::route('species.index')
            ->with('success', 'Registro creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id_esp): View
    {
        $species = Species::find($id_esp);

        return view('species.show', compact('species'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_esp): View
    {
        $species = Species::find($id_esp);

        return view('species.edit', compact('species'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SpeciesRequest $request, Species $species): RedirectResponse
    {
        $species->update($request->validated());

        return Redirect::route('species.index')
            ->with('success', 'Registro actualizado exitosamente.');
    }

    public function destroy($id_esp): RedirectResponse
    {
        Species::find($id_esp)->delete();

        return Redirect::route('species.index')
            ->with('success', 'Registro eliminado exitosamente.');
    }
}
