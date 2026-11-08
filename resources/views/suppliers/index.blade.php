
@extends('layouts.app')

@section('template_title')
    Suppliers
@endsection

@section('content')

<div class="container py-4">

    {{-- Buscador --}}
    <div class="d-flex mb-3">
        <form method="GET" action="{{ route('suppliers.index') }}" class="d-flex w-100">

            <input name="search"
                value="{{ request('search') }}"
                placeholder="Buscar por RFC o Nombre del Proveedor"
                class="form-control flex-grow-1 w-100"
                style="border: 1px solid #2e5d20; border-radius: 8px;">

            <button class="btn ms-2"
                style="background-color: #2e5d20; color: white; border-radius: 8px; font-weight: 600;">
                Buscar
            </button>

            <a href="{{ route('suppliers.index') }}"
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

                    <h4 class="mb-0">Listado de Proveedores</h4>

                    <a href="{{ route('suppliers.create') }}"
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
                                <th style="background-color: #f69235; color: white;">RFC</th>
                                <th style="background-color: #f69235; color: white;">Nombre</th>
                                <th style="background-color: #f69235; color: white;">Teléfono</th>
                                <th style="background-color: #f69235; color: white;">Correo</th>
                                <th style="background-color: #f69235; color: white;">Calle</th>
                                <th style="background-color: #f69235; color: white;">Colonia</th>
                                <th style="background-color: #f69235; color: white;">C.P.</th>
                                <th style="background-color: #f69235; color: white;"># Exterior</th>
                                <th style="background-color: #f69235; color: white;"># Interior</th>
                                <th style="background-color: #f69235; color: white;">Tipo Proveedor</th>
                                <th style="background-color: #f69235; color: white;">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse ($suppliers as $supplier)

                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $supplier->rfc }}</td>
                                    <td>{{ $supplier->nom_prov }}</td>
                                    <td>{{ $supplier->tel_prov }}</td>
                                    <td>{{ $supplier->correo_prov }}</td>
                                    <td>{{ $supplier->calle_prov }}</td>
                                    <td>{{ $supplier->col_prov }}</td>
                                    <td>{{ $supplier->cp_prov }}</td>
                                    <td>{{ $supplier->numext_prov }}</td>
                                    <td>{{ $supplier->numint_prov }}</td>
                                    <td>{{ $supplier->tipo_prov }}</td>

                                    <td>
                                        <div class="d-flex gap-3 justify-content-center align-items-center">

                                            {{-- Mostrar --}}
                                            <a href="{{ route('suppliers.show', $supplier->rfc) }}"
                                                title="Mostrar"
                                                style="color: #d99a36; text-decoration: none; font-size: 1.1rem;">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            {{-- Editar --}}
                                            <a href="{{ route('suppliers.edit', $supplier->rfc) }}"
                                                title="Editar"
                                                style="color: #2e5d20; text-decoration: none; font-size: 1.1rem;">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            {{-- Eliminar --}}
                                            <form action="{{ route('suppliers.destroy', $supplier->rfc) }}"
                                                method="POST"
                                                onsubmit="return confirm('¿Estás seguro de eliminar este proveedor?');"
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
                                    <td colspan="12" class="py-4"
                                        style="color: #244719;">
                                        {{ $noResultsMessage ?? 'No se encontraron proveedores registrados.' }}
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>
                    </table>

                </div>

                @if ($suppliers->hasPages())
                    <div class="p-3">
                        {!! $suppliers->withQueryString()->links() !!}
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>

@endsection
