<?php

namespace App\Http\Controllers;

use App\Models\Zone;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ZoneRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $query = Zone::query();

    if ($request->filled('search')) {
        $search = $request->get('search');

        $query->where(function ($q) use ($search) {
            $q->where('id_zona', $search)                    
              ->orWhere('nombre_zona', 'like', "%$search%");  
              
        });
    }

    $zones      = $query->paginate();
    $noResultsMessage = $zones->isEmpty() && $request->has('search')
        ? 'No se encontraron zonas con: "' . $search . '"'
        : 'No hay zonas registradas.';


        return view('zone.index', compact('zones', 'noResultsMessage' ))
            ->with('i', ($request->input('page', 1) - 1) * $zones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $zone = new Zone();

        return view('zone.create', compact('zone'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ZoneRequest $request): RedirectResponse
    {
        Zone::create($request->validated());

        return Redirect::route('zones.index')
            ->with('success', 'Registro creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id_zona): View
    {
        $zone = Zone::find($id_zona);

        return view('zone.show', compact('zone'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_zona): View
    {
        $zone = Zone::find($id_zona);

        return view('zone.edit', compact('zone'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ZoneRequest $request, Zone $zone): RedirectResponse
    {
        $zone->update($request->validated());

        return Redirect::route('zones.index')
            ->with('success', 'Registro actualizado exitosamente.');
    }

    public function destroy($id_zona): RedirectResponse
    {
        Zone::find($id_zona)->delete();

        return Redirect::route('zones.index')
            ->with('success', 'Registro eliminado exitosamente.');
    }
}
