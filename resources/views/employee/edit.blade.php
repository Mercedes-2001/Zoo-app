@extends('layouts.app')

@section('template_title')
    {{ __('Actualizar Empleado') }}
@endsection

@section('content')

<div class="text-end mt-3" style="margin-right: 320px;">
    <a href="{{ route('employees.index') }}" class="btn btn-outline-dark">
        <i class="fas fa-arrow-left"></i> Volver
    </a>
</div>
    <section class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card shadow rounded-4">
                    <div class="card-header text-white text-center rounded-top-4" style="background-color:rgb(47, 105, 163)">
                        <h4 class="mb-0">{{ __('Actualizar Empleado') }}</h4>
                    </div>
                    
                       <form method="POST" action="{{ route('employees.update.todo', $employee->num_trabajador) }}" id="form-employee">
                            @method('PATCH') {{-- O @method('PUT') --}}
                            @csrf
                            @include('employee.form')
                        </form>
                </div>
            </div>
        </div>
    </section>
@endsection
