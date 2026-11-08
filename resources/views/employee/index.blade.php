
@extends('layouts.app')

@section('template_title')
    Employees
@endsection

@section('content')

<div class="container py-4">

    {{-- Buscador --}}
    <div class="d-flex mb-3">
        <form method="GET" action="{{ route('employees.index') }}" class="d-flex w-100">

            <input name="search"
                value="{{ request('search') }}"
                placeholder="Buscar por ID o nombre..."
                class="form-control flex-grow-1 w-100"
                style="border: 1px solid #2e5d20; border-radius: 8px;">

            <button class="btn ms-2"
                style="background-color: #2e5d20; color: white; border-radius: 8px; font-weight: 600;">
                Buscar
            </button>

            <a href="{{ route('employees.index') }}"
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

                    <h4 class="mb-0">Listado de Empleados</h4>

                    <a href="{{ route('employees.create') }}"
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
                                <th style="background-color: #f69235; color: white;">Numero Trabajador</th>
                                <th style="background-color: #f69235; color: white;">Nombre</th>
                                <th style="background-color: #f69235; color: white;">Segundo Nombre</th>
                                <th style="background-color: #f69235; color: white;">Apellido Paterno</th>
                                <th style="background-color: #f69235; color: white;">Apellido Materno</th>
                                <th style="background-color: #f69235; color: white;">Edad</th>
                                <th style="background-color: #f69235; color: white;">Sexo</th>
                                <th style="background-color: #f69235; color: white;">Puesto Empleado</th>
                                <th style="background-color: #f69235; color: white;">Turno</th>
                                <th style="background-color: #f69235; color: white;">Jefe</th>
                                <th style="background-color: #f69235; color: white;">Telefono</th>
                                <th style="background-color: #f69235; color: white;">Correo Electrónico</th>
                                <th style="background-color: #f69235; color: white;">Calle</th>
                                <th style="background-color: #f69235; color: white;">Colonia</th>
                                <th style="background-color: #f69235; color: white;">Codigo Postal</th>
                                <th style="background-color: #f69235; color: white;"># Interior</th>
                                <th style="background-color: #f69235; color: white;"># Exterior</th>
                                <th style="background-color: #f69235; color: white;">Estado</th>
                                <th style="background-color: #f69235; color: white;">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse ($employees as $employee)

                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $employee->num_trabajador }}</td>
                                    <td>{{ $employee->nom }}</td>
                                    <td>{{ $employee->nom_s }}</td>
                                    <td>{{ $employee->apat }}</td>
                                    <td>{{ $employee->apmat }}</td>
                                    <td>{{ $employee->edad }}</td>
                                    <td>{{ $employee->sexo }}</td>
                                    <td>{{ $employee->tipo_em }}</td>
                                    <td>{{ $employee->fk_turno }}</td>
                                    <td>{{ $employee->fk_jefe }}</td>

                                    <td>{{ $employee->data?->tel ?? '' }}</td>
                                    <td>{{ $employee->data?->correo_elec ?? '' }}</td>
                                    <td>{{ $employee->data?->calle ?? '' }}</td>
                                    <td>{{ $employee->data?->col ?? '' }}</td>
                                    <td>{{ $employee->data?->cp ?? '' }}</td>
                                    <td>{{ $employee->data?->n_I ?? '' }}</td>
                                    <td>{{ $employee->data?->n_E ?? '' }}</td>
                                    <td>{{ $employee->data?->estado ?? '' }}</td>

                                    {{-- Acciones --}}
                                    <td>
                                        <div class="d-flex gap-3 justify-content-center align-items-center">

                                            {{-- Mostrar --}}
                                            <a href="{{ route('employees.show', $employee->num_trabajador) }}"
                                                title="Mostrar"
                                                style="color: #d99a36; text-decoration: none; font-size: 1.1rem;">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            {{-- Editar --}}
                                            <a href="{{ route('employees.edit', $employee->num_trabajador) }}"
                                                title="Editar"
                                                style="color: #2e5d20; text-decoration: none; font-size: 1.1rem;">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            {{-- Eliminar --}}
                                            <form action="{{ route('employees.destroy', $employee->num_trabajador) }}"
                                                method="POST"
                                                onsubmit="return confirm('¿Estás seguro de eliminar este empleado?');"
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
                                    <td colspan="20" class="py-4"
                                        style="color: #244719;">
                                        {{ $noResultsMessage ?? 'No hay empleados registrados.' }}
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
