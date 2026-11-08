@extends('layouts.app')

@section('template_title')
    {{ __('Crear Empleado') }}
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
                <div class="card-header text-white text-center rounded-top-4" style="background-color: #2e5d20; padding: 1rem;">
                    <h4 class="mb-0">{{ __('Crear Empleado') }}</h4>
                </div>

                <form method="POST" action="{{ route('employees.store.todo') }}" role="form" enctype="multipart/form-data" id="form-employee">
                        @csrf
                        @include('employee.form')
                </form>
            </div>

        </div>
    </div>
</section>
@endsection
