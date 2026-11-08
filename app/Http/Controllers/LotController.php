<?php

namespace App\Http\Controllers;

use App\Models\Lot;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\LotRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Food;
class LotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
         $query = Lot::with('food');          
    if ($request->filled('search')) {
        $search = $request->search;

        $query->where('cod_lote', $search)           
              ->orWhereHas('food', function ($q) use ($search) {
                  $q->where('nom_alim', 'like', "%$search%");
              });
    }

    $lots = $query->paginate();
    $noResultsMessage = $lots->isEmpty() && $request->has('search')
        ? 'No se encontraron especies con: "' . $search . '"'
        : 'No hay registros.';

        return view('lots.index', compact('lots', 'noResultsMessage'))
            ->with('i', ($request->input('page', 1) - 1) * $lots->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $lot = new Lot();
        $foods= Food::all();

        return view('lots.create', compact('lot', 'foods'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LotRequest $request): RedirectResponse
    {
        Lot::create($request->validated());

        return Redirect::route('lots.index')
            ->with('success', 'Registro actualizado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($cod_lote): View
    {
        $lot = Lot::find($cod_lote);

        return view('lots.show', compact('lot'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($cod_lote): View
    {
        $lot = Lot::find($cod_lote);
        $foods= Food::all();

        return view('lots.edit', compact('lot','foods' ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LotRequest $request, Lot $lot): RedirectResponse
    {
        $lot->update($request->validated());

        return Redirect::route('lots.index')
            ->with('success', 'Lot updated successfully');
    }

    public function destroy($cod_lote): RedirectResponse
    {
        Lot::find($cod_lote)->delete();

        return Redirect::route('lots.index')
            ->with('success', 'Lot deleted successfully');
    }
}
