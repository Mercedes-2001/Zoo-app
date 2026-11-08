<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\AnimalRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Zone;
use App\Models\Species;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $query = Animal::query();

    if ($request->has('search')) {
        $search = $request->get('search');

        $query->where(function ($q) use ($search) {
            $q->where('id_ani', $search)                      // búsqueda exacta por ID
              ->orWhere('nombre_ani', 'like', "%{$search}%");    // búsqueda parcial por nombre
        });
    }

    $animals = $query->paginate();
    $noResultsMessage = $animals->isEmpty() && $request->has('search')
        ? 'No se encontraron animales con: "' . $search . '"'
        : 'No hay animales registrados.';

    return view('animal.index', compact('animals', 'noResultsMessage'))
           ->with('i', (request()->input('page', 1) - 1) * $animals->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $animal = new Animal();
        $zones = Zone::all();
        $species = Species::all();

        return view('animal.create', compact('animal', 'zones', 'species'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnimalRequest $request): RedirectResponse
    {
        Animal::create($request->validated());

        return Redirect::route('animal.index')
            ->with('success', 'Registro creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id_ani): View
    {
        $animal = Animal::find($id_ani);

        return view('animal.show', compact('animal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_ani): View
    {
        $animal = Animal::find($id_ani);
        $zones = Zone::all();
        $species = Species::all();

        return view('animal.edit', compact('animal', 'zones', 'species'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnimalRequest $request, Animal $animal): RedirectResponse
    {
        $animal->update($request->validated());

        return Redirect::route('animal.index')
            ->with('success', 'Registro actualizado exitosamente.');
    }

    public function destroy($id_ani): RedirectResponse
    {
        Animal::find($id_ani)->delete();

        return Redirect::route('animal.index')
            ->with('success', 'Registro eliminado exitosamente.');
    }
}
