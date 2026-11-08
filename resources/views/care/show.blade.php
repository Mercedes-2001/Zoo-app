@extends('layouts.app')

@section('template_title')
    {{ $care->name ?? __('Detalles del Cuidado') }}
@endsection

@section('content')

<section class="container-fluid px-3 py-3"
    style="min-height: calc(100vh - 180px); display: flex; align-items: center; justify-content: center;">

    <div class="row justify-content-center w-100">
        <div class="col-lg-10 col-xl-9">

            <div class="card shadow-lg border-0 rounded-4"
                style="border-radius: 18px; overflow: hidden;">

                {{-- Encabezado --}}
                <div class="card-header text-white d-flex justify-content-between align-items-center flex-wrap gap-2"
                    style="background-color: #2e5d20; padding: 1rem 1.5rem;">

                    <h5 class="mb-0">
                        <i class="fas fa-hand-holding-medical me-2"></i>
                        {{ __('Detalles del Cuidado') }}
                    </h5>

                    <a href="{{ route('care.index') }}"
                        class="btn btn-sm fw-semibold"
                        style="background-color: #ffa24b; color: white; border: none; border-radius: 8px;">
                        <i class="fas fa-arrow-left me-1"></i> Volver
                    </a>
                </div>

                {{-- Contenido --}}
                <div class="card-body p-3 p-md-4" style="color: #2e5d20;">

                    {{-- Presentación --}}
                    <div class="text-center mb-4 p-3"
                        style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 12px;">

                        <h4 class="fw-bold mb-1">
                            Cuidado {{ $care->id_cuidados }}
                        </h4>

                        <p class="mb-0" style="color: #2e5d20;">
                            Registro de cuidado
                        </p>
                    </div>

                    {{-- Información general --}}
                    <h5 class="fw-bold mb-3">
                        <i class="fas fa-info-circle me-2"
                            style="color: #ffa24b;"></i>
                        Información general
                    </h5>

                    <div class="row g-2">

                        <div class="col-md-6">
                            <div class="p-3 h-100"
                                style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">

                                <small class="fw-bold d-block mb-2"
                                    style="color: #2e5d20;">
                                    <i class="fas fa-hashtag me-1"></i>
                                    ID Cuidados
                                </small>

                                <span class="fw-semibold">
                                    {{ $care->id_cuidados }}
                                </span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="p-3 h-100"
                                style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">

                                <small class="fw-bold d-block mb-2"
                                    style="color: #2e5d20;">
                                    <i class="fas fa-calendar-alt me-1"></i>
                                    Fecha inicio
                                </small>

                                <span class="fw-semibold">
                                    {{ $care->fecha_inicio_cuidado }}
                                </span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="p-3 h-100"
                                style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">

                                <small class="fw-bold d-block mb-2"
                                    style="color: #2e5d20;">
                                    <i class="fas fa-clock me-1"></i>
                                    Hora
                                </small>

                                <span class="fw-semibold">
                                    {{ $care->hora_cuidado }}
                                </span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="p-3 h-100"
                                style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">

                                <small class="fw-bold d-block mb-2"
                                    style="color: #2e5d20;">
                                    <i class="fas fa-notes-medical me-1"></i>
                                    Tratamiento
                                </small>

                                <span class="fw-semibold">
                                    {{ $care->tratamiento }}
                                </span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="p-3 h-100"
                                style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">

                                <small class="fw-bold d-block mb-2"
                                    style="color: #2e5d20;">
                                    <i class="fas fa-utensils me-1"></i>
                                    Cantidad alimento
                                </small>

                                <span class="fw-semibold">
                                    {{ $care->cantidad_alimento }}
                                </span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="p-3 h-100"
                                style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">

                                <small class="fw-bold d-block mb-2"
                                    style="color: #2e5d20;">
                                    <i class="fas fa-apple-alt me-1"></i>
                                    Alimento (FK)
                                </small>

                                <span class="fw-semibold">
                                    {{ $care->fk_alimento }}
                                </span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="p-3 h-100"
                                style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">

                                <small class="fw-bold d-block mb-2"
                                    style="color: #2e5d20;">
                                    <i class="fas fa-user-tie me-1"></i>
                                    Empleado (FK)
                                </small>

                                <span class="fw-semibold">
                                    {{ $care->fk_empleado }}
                                </span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="p-3 h-100"
                                style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">

                                <small class="fw-bold d-block mb-2"
                                    style="color: #2e5d20;">
                                    <i class="fas fa-paw me-1"></i>
                                    Animal (FK)
                                </small>

                                <span class="fw-semibold">
                                    {{ $care->fk_animal }}
                                </span>
                            </div>
                        </div>

                    </div>

                    {{-- Pie informativo --}}
                    <div class="mt-4 p-3 text-center"
                        style="background-color: #ffa24b; border-radius: 10px; color: white;">

                        <i class="fas fa-leaf me-2"></i>
                        <span class="fw-semibold">
                            Zoológico Jurásico | Registro de cuidado
                        </span>
                    </div>

                </div>
            </div>

        </div>
    </div>

</section>
@endsection