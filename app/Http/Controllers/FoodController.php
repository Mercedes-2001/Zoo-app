<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\FoodRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Supplier;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $query = Food::query();

    if ($request->filled('search')) {
        $search = $request->get('search');

        $query->where(function ($q) use ($search) {
            $q->where('cod_alim', $search)                    // ID exacto
              ->orWhere('nom_alim', 'like', "%$search%");  // nombre parcial
        });
    }

    $food      = $query->paginate();
    $noResultsMessage = $food  ->isEmpty() && $request->has('search')
        ? 'No se encontraron registros con: "' . $search . '"'
        : 'No hay registros.';

        return view('food.index', compact('food', 'noResultsMessage'))
            ->with('i', ($request->input('page', 1) - 1) * $food->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $food = new Food();
        $suppliers = Supplier::all();

        return view('food.create', compact('food', 'suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FoodRequest $request): RedirectResponse
    {
        Food::create($request->validated());

        return Redirect::route('food.index')
            ->with('success', 'Registro creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($cod_alim): View
    {
        $food = Food::find($cod_alim);

        return view('food.show', compact('food'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($cod_alim): View
    {
        $food = Food::find($cod_alim);
        $suppliers = Supplier::all();

        return view('food.edit', compact('food', 'suppliers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FoodRequest $request, Food $food): RedirectResponse
    {
        $food->update($request->validated());

        return Redirect::route('food.index')
            ->with('success', 'Registro actualizado exitosamente.');
    }

    public function destroy($cod_alim): RedirectResponse
    {
        Food::find($cod_alim)->delete();

        return Redirect::route('food.index')
            ->with('success', 'Registro eliminado exitosamente.');
    }
}
