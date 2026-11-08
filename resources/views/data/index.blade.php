@extends('layouts.app')

@section('template_title')
    Data
@endsection

@section('content')
<style>
    body {
        background-image: url('https://static.vecteezy.com/system/resources/previews/056/618/553/non_2x/marine-theme-background-with-fish-and-algae-cartoon-illustration-vector.jpg'); /* o la ruta que corresponda */
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
        background-attachment: fixed;
    }
</style>

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header text-white d-flex justify-content-between align-items-center" style="background-color:rgb(45, 159, 104)">
                    <h4 class="mb-0" style="color:black;">Datos del Empleado</h4>
                    <a href="{{ route('data.create') }}" class="btn btn-light btn-sm px-4">
                        <i class="fas fa-plus-circle"></i> Crear Nuevo
                    </a>
                </div>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success m-3">
                        {{ $message }}
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle text-center">
                        <thead class="table-primary">
                            <tr>
                                <th style="background-color: rgb(63, 204, 136); color: black;">#</th>
                                <th style="background-color: rgb(63, 204, 136); color: black;">Numero Trabajador</th>
                                <th style="background-color: rgb(63, 204, 136); color: black;">Telefono</th>
                                <th style="background-color: rgb(63, 204, 136); color: black;">Correo Electrónico</th>
                                <th style="background-color: rgb(63, 204, 136); color: black;">Calle</th>
                                <th style="background-color: rgb(63, 204, 136); color: black;">Colonia</th>
                                <th style="background-color: rgb(63, 204, 136); color: black;">Codigo Postal</th>
                                <th style="background-color: rgb(63, 204, 136); color: black;"># Interior</th>
                                <th style="background-color: rgb(63, 204, 136); color: black;"># Exterior</th>
                                <th style="background-color: rgb(63, 204, 136); color: black;">Estado</th>
                                <th style="background-color: rgb(63, 204, 136); color: black;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item) 
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $item->num_trabajador }}</td>
                                    <td>{{ $item->tel }}</td>
                                    <td>{{ $item->correo_elec }}</td>
                                    <td>{{ $item->calle }}</td>
                                    <td>{{ $item->col }}</td>
                                    <td>{{ $item->cp }}</td>
                                    <td>{{ $item->n_I }}</td>
                                    <td>{{ $item->n_E }}</td>
                                    <td>{{ $item->estado }}</td>
                                    <td>
                                        <div class="d-flex gap-2 justify-content-center">
                                            <a class="btn btn-sm text-white" style="background-color:rgb(83, 150, 217)" href="{{ route('data.show', $item->num_trabajador) }}">
                                                MOSTRAR <i class="fas fa-eye"></i>
                                            </a>
                                            <a class="btn btn-sm text-white" style="background-color:rgb(53, 138, 53)" href="{{ route('data.edit', $item->num_trabajador) }}">
                                                EDITAR <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('data.destroy', $item->num_trabajador) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este registro?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm text-white" style="background-color:rgb(128, 62, 62)">
                                                    ELIMINAR <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    {!! $data->withQueryString()->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
