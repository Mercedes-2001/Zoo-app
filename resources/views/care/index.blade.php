

@extends('layouts.app')

@section('template_title')
    Cares
@endsection

@section('content')

<div class="container py-4">

    {{-- Buscador --}}
    <div class="d-flex mb-3">
        <form method="GET" action="{{ route('care.index') }}" class="d-flex w-100">

            <input name="search"
                value="{{ request('search') }}"
                placeholder="Buscar por ID o nombre del Tratamiento"
                class="form-control flex-grow-1 w-100"
                style="border: 1px solid #2e5d20; border-radius: 8px;">

            <button class="btn ms-2"
                style="background-color: #2e5d20; color: white; border-radius: 8px; font-weight: 600;">
                Buscar
            </button>

            <a href="{{ route('care.index') }}"
                class="btn ms-2"
                style="background-color: #ffa24b; color: white; border-radius: 8px; font-weight: 600;">
                Cancelar
            </a>

        </form>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-12">

            <div class="card shadow-sm"
                style="border-radius: 18px; overflow: hidden; background-color: white;">

                {{-- Encabezado --}}
                <div class="card-header text-white d-flex justify-content-between align-items-center"
                    style="background-color: #2e5d20; padding: 1rem;">

                    <h4 class="mb-0">Listado de Cuidados</h4>

                    <a href="{{ route('care.create') }}"
                        class="btn btn-sm px-4"
                        style="background-color: #ffa24b; color: white; border: none; border-radius: 8px; font-weight: 600;">
                        <i class="fas fa-plus-circle"></i> Crear Nuevo
                    </a>

                </div>

                {{-- Mensaje de éxito --}}
                @if ($message = Session::get('success'))
                    <div class="alert m-3"
                        style="background-color: #fff2d5; color: #2e5d20; border: 1px solid #ffe2a5; border-radius: 10px;">
                        {{ $message }}
                    </div>
                @endif

                {{-- Tabla --}}
                <div class="table-responsive">

                    <table class="table table-striped table-hover align-middle text-center mb-0">

                        <thead>
                            <tr>
                                <th style="background-color: #f69235; color: white;">#</th>
                                <th style="background-color: #f69235; color: white;">ID Cuidado</th>
                                <th style="background-color: #f69235; color: white;">Fecha de Inicio</th>
                                <th style="background-color: #f69235; color: white;">Hora Cuidado</th>
                                <th style="background-color: #f69235; color: white;">Tratamiento</th>
                                <th style="background-color: #f69235; color: white;">Cantidad de Alimento</th>
                                <th style="background-color: #f69235; color: white;">Alimento</th>
                                <th style="background-color: #f69235; color: white;">Empleado</th>
                                <th style="background-color: #f69235; color: white;">Animal</th>
                                <th style="background-color: #f69235; color: white;">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse ($cares as $care)

                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $care->id_cuidados }}</td>
                                    <td>{{ $care->fecha_inicio_cuidado }}</td>
                                    <td>{{ $care->hora_cuidado }}</td>
                                    <td>{{ $care->tratamiento }}</td>
                                    <td>{{ $care->cantidad_alimento }}</td>
                                    <td>{{ $care->fk_alimento }} - {{ $care->food?->nom_alim }}</td>
                                    <td>{{ $care->fk_empleado }} - {{ $care->employee?->nom }} {{ $care->employee?->nom_s }} {{ $care->employee?->apat }} {{ $care->employee?->apmat }}</td>
                                    <td>{{ $care->fk_animal }} - {{ $care->animal?->nombre_ani }} ({{ $care->animal?->species?->nom_comun }})</td>

                                    {{-- Acciones --}}
                                    <td>
                                        <div class="d-flex gap-3 justify-content-center align-items-center">

                                            {{-- Mostrar --}}
                                            <a href="{{ route('care.show', $care->id_cuidados) }}"
                                                title="Mostrar"
                                                style="color: #d99a36; text-decoration: none; font-size: 1.1rem;">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            {{-- Editar --}}
                                            <a href="{{ route('care.edit', $care->id_cuidados) }}"
                                                title="Editar"
                                                style="color: #2e5d20; text-decoration: none; font-size: 1.1rem;">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            {{-- Eliminar --}}
                                            <form action="{{ route('care.destroy', $care->id_cuidados) }}"
                                                method="POST"
                                                onsubmit="return confirm('¿Estás seguro de eliminar este registro?');"
                                                style="margin: 0;">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    title="Eliminar"
                                                    style="background: none; border: none; padding: 0; color: #a83e32; font-size: 1.1rem; cursor: pointer;">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>

                                            </form>

                                        </div>
                                    </td>
                                </tr>

                            @empty

                                <tr>
                                    <td colspan="10" class="py-4"
                                        style="color: #244719;">
                                        {{ $noResultsMessage ?? 'No hay cuidados registrados.' }}
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>
                    </table>

                </div>

            

            </div>
        </div>
    </div>
</div>

@endsection
