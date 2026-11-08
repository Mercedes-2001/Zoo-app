
@extends('layouts.app')

@section('template_title')
    Lotes
@endsection

@section('content')

<div class="container py-4">

    {{-- Buscador --}}
    <div class="d-flex mb-3">
        <form method="GET" action="{{ route('lots.index') }}" class="d-flex w-100">

            <input name="search"
                value="{{ request('search') }}"
                placeholder="Buscar por ID de lote o nombre de alimento…"
                class="form-control flex-grow-1 w-100"
                style="border: 1px solid #2e5d20; border-radius: 8px;">

            <button class="btn ms-2"
                style="background-color: #2e5d20; color: white; border-radius: 8px; font-weight: 600;">
                Buscar
            </button>

            <a href="{{ route('lots.index') }}"
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

                    <h4 class="mb-0">Listado de Lotes</h4>

                    <a href="{{ route('lots.create') }}"
                        class="btn btn-sm px-4"
                        style="background-color: #ffa24b; color: white; border: none; border-radius: 8px; font-weight: 600;">
                        <i class="fas fa-plus-circle"></i> Crear Nuevo
                    </a>

                </div>

                @if ($message = Session::get('success'))
                    <div class="alert m-3"
                        style="background-color: #fff2d5; color: #2e5d20; border: 1px solid #ffe2a5; border-radius: 10px;">
                        {{ $message }}
                    </div>
                @endif

                <div class="table-responsive">

                    <table class="table table-striped table-hover align-middle text-center mb-0">

                        <thead>
                            <tr>
                                <th style="background-color: #f69235; color: white;">#</th>
                                <th style="background-color: #f69235; color: white;">Cod Lote</th>
                                <th style="background-color: #f69235; color: white;">Fecha de Caducidad</th>
                                <th style="background-color: #f69235; color: white;">Porción</th>
                                <th style="background-color: #f69235; color: white;">Fecha de Compra</th>
                                <th style="background-color: #f69235; color: white;">ID Alimento</th>
                                <th style="background-color: #f69235; color: white;">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse ($lots as $lot)

                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $lot->cod_lote }}</td>
                                    <td>{{ $lot->fecha_caduc }}</td>
                                    <td>{{ $lot->porcion }}</td>
                                    <td>{{ $lot->fecha_compra }}</td>
                                    <td>{{ $lot->fk_alimento }} - {{ $lot->food?->nom_alim }}</td>

                                    <td>
                                        <div class="d-flex gap-3 justify-content-center align-items-center">

                                            {{-- Mostrar --}}
                                            <a href="{{ route('lots.show', $lot->cod_lote) }}"
                                                title="Mostrar"
                                                style="color: #d99a36; text-decoration: none; font-size: 1.1rem;">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            {{-- Editar --}}
                                            <a href="{{ route('lots.edit', $lot->cod_lote) }}"
                                                title="Editar"
                                                style="color: #2e5d20; text-decoration: none; font-size: 1.1rem;">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            {{-- Eliminar --}}
                                            <form action="{{ route('lots.destroy', $lot->cod_lote) }}"
                                                method="POST"
                                                onsubmit="return confirm('¿Estás seguro de eliminar este lote?');"
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
                                    <td colspan="7" class="py-4"
                                        style="color: #244719;">
                                        {{ $noResultsMessage ?? 'No hay lotes registrados.' }}
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>
                    </table>

                </div>

                @if ($lots->hasPages())
                    <div class="p-3">
                        {!! $lots->withQueryString()->links() !!}
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>

@endsection
