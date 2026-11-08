
@extends('layouts.app')

@section('template_title')
    {{ $empturn->name ?? __('Detalles de la Asignación de Turno') }}
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
                        <i class="fas fa-user-clock me-2"></i>
                        {{ __('Detalles de asignación de turno') }}
                    </h5>

                    <a href="{{ route('empturns.index') }}"
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
                            Asignación {{ $empturn->cod_empturn }}
                        </h4>

                        <p class="mb-0" style="color: #2e5d20;">
                            Registro de asignación de turno
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
                                    Código empturn
                                </small>

                                <span class="fw-semibold">
                                    {{ $empturn->cod_empturn }}
                                </span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="p-3 h-100"
                                style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">

                                <small class="fw-bold d-block mb-2"
                                    style="color: #2e5d20;">
                                    <i class="fas fa-clock me-1"></i>
                                    Turno (FK)
                                </small>

                                <span class="fw-semibold">
                                    {{ $empturn->fk_turno }}
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
                                    {{ $empturn->fk_empleado }}
                                </span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="p-3 h-100"
                                style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">

                                <small class="fw-bold d-block mb-2"
                                    style="color: #2e5d20;">
                                    <i class="fas fa-hourglass-half me-1"></i>
                                    Horas trabajadas
                                </small>

                                <span class="fw-semibold">
                                    {{ $empturn->horas_trabajadas }}
                                </span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="p-3 h-100"
                                style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">

                                <small class="fw-bold d-block mb-2"
                                    style="color: #2e5d20;">
                                    <i class="fas fa-comment-alt me-1"></i>
                                    Motivo
                                </small>

                                <span class="fw-semibold">
                                    {{ $empturn->motivo }}
                                </span>
                            </div>
                        </div>

                    </div>

                    {{-- Pie informativo --}}
                    <div class="mt-4 p-3 text-center"
                        style="background-color: #ffa24b; border-radius: 10px; color: white;">

                        <i class="fas fa-leaf me-2"></i>
                        <span class="fw-semibold">
                            Zoológico Jurásico | Registro de asignación de turno
                        </span>
                    </div>

                </div>
            </div>

        </div>
    </div>

</section>
@endsection
