@extends('layouts.app')

@section('template_title')
    {{ __('Actualizar Datos del Empleado') }} 
@endsection

@section('content')
<style>
    body {
        background-image: url('https://static.vecteezy.com/system/resources/previews/006/551/665/non_2x/blue-ocean-with-fish-silhouette-background-free-vector.jpg'); /* o la ruta que corresponda */
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
        background-attachment: fixed;
    }
</style>
<div class="text-end mt-3" style="margin-right: 320px;">
    <a href="{{ url()->previous() }}" class="btn btn-outline-dark">
        <i class="fas fa-arrow-left"></i> Volver
    </a>
</div>
    <section class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card shadow rounded-4">
                    <div class="card-header text-white text-center rounded-top-4" style="background-color:rgb(47, 105, 163)">
                        <h4 class="mb-0">{{ __('Actualizar Datos del Empleado') }}</h4>
                    </div>
                    
                        <form method="POST" action="{{ route('data.update', $data->num_trabajador) }}">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('data.form')

                        </form>
                    
                </div>
            </div>
        </div>
    </section>
@endsection
