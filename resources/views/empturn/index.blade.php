
@extends('layouts.app')

@section('template_title')
    Datos de Turnos
@endsection

@section('content')

<div class="container py-4">

    <div class="d-flex mb-3">
        <form method="GET" action="{{ route('empturns.index') }}" class="d-flex w-100">

            <input name="search"
                value="{{ request('search') }}"
                placeholder="Buscar por código de turno o nombre del empleado"
                class="form-control flex-grow-1 w-100"
                style="border: 1px solid #2e5d20; border-radius: 8px;">

            <button class="btn ms-2"
                style="background-color: #2e5d20; color: white; border-radius: 8px; font-weight: 600;">
                Buscar
            </button>

            @if(request('search'))
                <a href="{{ route('empturns.index') }}"
                    class="btn ms-2"
                    style="background-color: #ffa24b; color: white; border-radius: 8px; font-weight: 600;">
                    Cancelar
                </a>
            @endif

        </form>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-12">

            <div class="card shadow-sm" style="border-radius: 18px; overflow: hidden; background-color: #ffffff;">

                <div class="card-header text-white d-flex justify-content-between align-items-center"
                    style="background-color: #2e5d20; padding: 1rem;">

                    <h4 class="mb-0">Listado de Datos de Turnos</h4>

                    <a href="{{ route('empturns.create') }}"
                        class="btn btn-sm px-4"
                        style="background-color: #ffa24b; color: white; border: none; border-radius: 8px; font-weight: 600;">
                        <i class="fas fa-plus-circle"></i> Crear Nuevo
                    </a>

                </div>

                @if ($message = Session::get('success'))
                    <div class="alert m-3"
                        style="background-color: #fff2d5; color: #244719; border: 1px solid #ffe2a5; border-radius: 10px;">
                        {{ $message }}
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle text-center mb-0">

                        <thead>
                            <tr>
                                <th style="background-color: #f69235; color: white;">#</th>
                                <th style="background-color: #f69235; color: white;">Código Dato de Turno</th>
                                <th style="background-color: #f69235; color: white;">Código Turno</th>
                                <th style="background-color: #f69235; color: white;">Empleado</th>
                                <th style="background-color: #f69235; color: white;">Horas Trabajadas</th>
                                <th style="background-color: #f69235; color: white;">Motivo</th>
                                <th style="background-color: #f69235; color: white;">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($empturns as $empturn)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $empturn->cod_empturn }}</td>
                                    <td>{{ $empturn->fk_turno }}-{{ $empturn->turn?->descripcion }}</td>
                                    <td>{{ $empturn->fk_empleado }}-{{ $empturn->employee?->nom }}</td>
                                    <td>{{ $empturn->horas_trabajadas }}</td>
                                    <td>{{ $empturn->motivo }}</td>

                                    <td>
                                        <div class="d-flex gap-3 justify-content-center align-items-center">

                                            <a href="{{ route('empturns.show', $empturn->cod_empturn) }}"
                                                title="Mostrar"
                                                style="color: #d99a36; text-decoration: none; font-size: 1.1rem;">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            <a href="{{ route('empturns.edit', $empturn->cod_empturn) }}"
                                                title="Editar"
                                                style="color: #2e5d20; text-decoration: none; font-size: 1.1rem;">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <form action="{{ route('empturns.destroy', $empturn->cod_empturn) }}"
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
                                    <td colspan="7" class="py-4" style="color: #244719;">
                                        {{ $noResultsMessage }}
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
