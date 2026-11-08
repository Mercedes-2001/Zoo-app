
@extends('layouts.app')

@section('template_title')
    Animales
@endsection

@section('content')

<div class="container py-4">

    {{-- Buscador --}}
    <div class="d-flex mb-3">
        <form method="GET" action="{{ route('animal.index') }}" class="d-flex w-100">

            <input name="search"
                value="{{ request('search') }}"
                placeholder="Buscar por ID o nombre..."
                class="form-control flex-grow-1 w-100"
                style="border: 1px solid #2e5d20; border-radius: 8px;">

            <button class="btn ms-2"
                style="background-color: #2e5d20; color: white; border-radius: 8px; font-weight: 600;">
                Buscar
            </button>

            <a href="{{ route('animal.index') }}"
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

                    <h4 class="mb-0">Listado de Animales</h4>

                    <a href="{{ route('animal.create') }}"
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
                                <th style="background-color: #ffa24b; color: white;">#</th>
                                <th style="background-color: #ffa24b; color: white;">ID Animal</th>
                                <th style="background-color: #ffa24b; color: white;">Nombre</th>
                                <th style="background-color: #ffa24b; color: white;">Edad</th>
                                <th style="background-color: #ffa24b; color: white;">Peso</th>
                                <th style="background-color: #ffa24b; color: white;">Altura</th>
                                <th style="background-color: #ffa24b; color: white;">Sexo</th>
                                <th style="background-color: #ffa24b; color: white;">Fecha de Nacimiento</th>
                                <th style="background-color: #ffa24b; color: white;">Descripción</th>
                                <th style="background-color: #ffa24b; color: white;">Lugar de Origen</th>
                                <th style="background-color: #ffa24b; color: white;">Especie</th>
                                <th style="background-color: #ffa24b; color: white;">ID Zona</th>
                                <th style="background-color: #ffa24b; color: white;">Nombre Zona</th>
                                <th style="background-color: #ffa24b; color: white;">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse ($animals as $animal)

                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $animal->id_ani }}</td>
                                    <td>{{ $animal->nombre_ani }}</td>
                                    <td>{{ $animal->edad_ani }}</td>
                                    <td>{{ $animal->peso_ani }}</td>
                                    <td>{{ $animal->altura }}</td>
                                    <td>{{ $animal->sexo_ani }}</td>
                                    <td>{{ $animal->fecha_nac }}</td>
                                    <td>{{ $animal->descripcion_ani }}</td>
                                    <td>{{ $animal->lugar_origen }}</td>
                                    <td>{{ $animal->fk_especie }} - {{ $animal->species?->nom_comun }}</td>
                                    <td>{{ $animal->fk_zona }}</td>
                                    <td>{{ $animal->fk_nombre_zona }}</td>

                                    {{-- Acciones --}}
                                    <td>
                                        <div class="d-flex gap-3 justify-content-center align-items-center">

                                            {{-- Mostrar --}}
                                            <a href="{{ route('animal.show', $animal->id_ani) }}"
                                                title="Mostrar"
                                                style="color: #d99a36; text-decoration: none; font-size: 1.1rem;">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            {{-- Editar --}}
                                            <a href="{{ route('animal.edit', $animal->id_ani) }}"
                                                title="Editar"
                                                style="color: #2e5d20; text-decoration: none; font-size: 1.1rem;">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            {{-- Eliminar --}}
                                            <form action="{{ route('animal.destroy', $animal->id_ani) }}"
                                                method="POST"
                                                onsubmit="return confirm('¿Estás seguro de eliminar este animal?');"
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
                                    <td colspan="14" class="py-4"
                                        style="color: #244719;">
                                        {{ $noResultsMessage ?? 'No hay animales registrados.' }}
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

