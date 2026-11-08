<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\SupplierRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
       $query = Supplier::query();

    if ($request->filled('search')) {
        $search = $request->get('search');

        $query->where(function ($q) use ($search) {
            $q->where('rfc', 'like', "%$search%")                    // ID exacto
              ->orWhere('nom_prov', 'like', "%$search%");  // nombre parcial
        });
    }

    $suppliers      = $query->paginate();
    $noResultsMessage = $suppliers  ->isEmpty() && $request->has('search')
        ? 'No se encontraron registros con: "' . $search . '"'
        : 'No hay registros.';

        return view('suppliers.index', compact('suppliers', 'noResultsMessage' ))
            ->with('i', ($request->input('page', 1) - 1) * $suppliers->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $supplier = new Supplier();

        return view('suppliers.create', compact('supplier'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SupplierRequest $request): RedirectResponse
    {
        Supplier::create($request->validated());

        return Redirect::route('suppliers.index')
            ->with('success', 'Registro creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($rfc): View
    {
        $supplier = Supplier::find($rfc);

        return view('suppliers.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($rfc): View
    {
        $supplier = Supplier::find($rfc);

        return view('suppliers.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SupplierRequest $request, Supplier $supplier): RedirectResponse
    {
        $supplier->update($request->validated());

        return Redirect::route('suppliers.index')
            ->with('success', 'Registro actualizado exitosamente.');
    }

    public function destroy($rfc): RedirectResponse
    {
        Supplier::find($rfc)->delete();

        return Redirect::route('suppliers.index')
            ->with('success', 'Registro eliminado exitosamente.');
    }
}
