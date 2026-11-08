<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\DataRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Employee;
use App\Models\employees;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $data = Data::paginate();

        return view('data.index', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * $data->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $data = new Data();
        $employees=Employee::all();

        return view('data.create', compact('data', 'employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DataRequest $request): RedirectResponse
    {
        Data::create($request->validated());

        return Redirect::route('data.index')
            ->with('success', 'Registro creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($num_trabajador): View
    {
        $data = Data::find($num_trabajador);

        return view('data.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($num_trabajador): View
    {
        $data = Data::find($num_trabajador);
        $employees=Employee::all();

        return view('data.edit', compact('data', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DataRequest $request, Data $data): RedirectResponse
    {
        $data->update($request->validated());

        return Redirect::route('data.index')
            ->with('success', 'Registro actualizado exitosamente.');
    }

    public function destroy($num_trabajador): RedirectResponse
    {
        Data::find($num_trabajador)->delete();

        return Redirect::route('data.index')
            ->with('success', 'Registro eliminado exitosamente.');
    }
}
