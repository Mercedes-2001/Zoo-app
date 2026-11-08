<?php

namespace App\Http\Controllers;

use App\Models\Turn;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\TurnRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class TurnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
    $query = Turn::query();

    if ($request->filled('search')) {
        $search = $request->get('search');

        $query->where(function ($q) use ($search) {
            $q->where('cod_turno', $search)                 // coincidencia exacta por ID
              ->orWhere('descripcion', 'like', "%$search%"); // coincidencia parcial por descripción
        });
    }

    $turns = $query->paginate();

    // Mensaje cuando no hay resultados
    $noResultsMessage = $turns->isEmpty() && $request->has('search')
        ? 'No se encontraron turnos con: "'.$search.'"'
        : 'No hay turnos registrados.';

    return view('turn.index', compact('turns', 'noResultsMessage'))
           ->with('i', ($request->input('page', 1) - 1) * $turns->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $turn = new Turn();

        return view('turn.create', compact('turn'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TurnRequest $request): RedirectResponse
    {
        Turn::create($request->validated());

        return Redirect::route('turns.index')
            ->with('success', 'Registro creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($cod_turno): View
    {
        $turn = Turn::find($cod_turno);

        return view('turn.show', compact('turn'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($cod_turno): View
    {
        $turn = Turn::find($cod_turno);

        return view('turn.edit', compact('turn'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TurnRequest $request, Turn $turn): RedirectResponse
    {
        $turn->update($request->validated());

        return Redirect::route('turns.index')
            ->with('success', 'Registro actualizado exitosamente.');
    }

    public function destroy($cod_turno): RedirectResponse
    {
        Turn::find($cod_turno)->delete();

        return Redirect::route('turns.index')
            ->with('success', 'Registro eliminado exitosamente.');
    }
}
