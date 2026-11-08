
@extends('layouts.app')

@section('template_title')
    Alimentos
@endsection

@section('content')

<div class="container py-4">

    {{-- Buscador --}}
    <div class="d-flex mb-3">
        <form method="GET" action="{{ route('food.index') }}" class="d-flex w-100">

            <input name="search"
                value="{{ request('search') }}"
                placeholder="Buscar por ID o nombre…"
                class="form-control flex-grow-1 w-100"
                style="border: 1px solid #2e5d20; border-radius: 8px;">

            <button class="btn ms-2"
                style="background-color: #2e5d20; color: white; border-radius: 8px; font-weight: 600;">
                Buscar
            </button>

            <a href="{{ route('food.index') }}"
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

                    <h4 class="mb-0">Listado de Alimentos</h4>

                    <a href="{{ route('food.create') }}"
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
                                <th style="background-color: #f69235; color: white;">Código Alimento</th>
                                <th style="background-color: #f69235; color: white;">Nombre</th>
                                <th style="background-color: #f69235; color: white;">Peso</th>
                                <th style="background-color: #f69235; color: white;">Contenido</th>
                                <th style="background-color: #f69235; color: white;">Cantidad Total</th>
                                <th style="background-color: #f69235; color: white;">Costo</th>
                                <th style="background-color: #f69235; color: white;">Proveedor</th>
                                <th style="background-color: #f69235; color: white;">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse ($food as $foodItem)

                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $foodItem->cod_alim }}</td>
                                    <td>{{ $foodItem->nom_alim }}</td>
                                    <td>{{ $foodItem->peso_alim }}</td>
                                    <td>{{ $foodItem->contenido_alim }}</td>
                                    <td>{{ $foodItem->cant_total }}</td>
                                    <td>{{ $foodItem->costo }}</td>
                                    <td>{{ $foodItem->fk_prov }}</td>

                                    <td>
                                        <div class="d-flex gap-3 justify-content-center align-items-center">

                                            {{-- Mostrar --}}
                                            <a href="{{ route('food.show', $foodItem->cod_alim) }}"
                                                title="Mostrar"
                                                style="color: #d99a36; text-decoration: none; font-size: 1.1rem;">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            {{-- Editar --}}
                                            <a href="{{ route('food.edit', $foodItem->cod_alim) }}"
                                                title="Editar"
                                                style="color: #2e5d20; text-decoration: none; font-size: 1.1rem;">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            {{-- Eliminar --}}
                                            <form action="{{ route('food.destroy', $foodItem->cod_alim) }}"
                                                method="POST"
                                                onsubmit="return confirm('¿Estás seguro de eliminar este alimento?');"
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
                                    <td colspan="9" class="py-4"
                                        style="color: #244719;">
                                        {{ $noResultsMessage ?? 'No hay alimentos registrados.' }}
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>
                    </table>

                </div>

                @if ($food->hasPages())
                    <div class="p-3">
                        {!! $food->withQueryString()->links() !!}
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>

@endsection
