
@extends('layouts.app')

@section('template_title')
    {{ $employee->name ?? __('Detalles del Empleado') }}
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
                        <i class="fas fa-user-tie me-2"></i>
                        {{ __('Detalles del empleado') }}
                    </h5>

                    <a href="{{ route('employees.index') }}"
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
                            {{ $employee->nom }} {{ $employee->nom_s }} {{ $employee->apat }} {{ $employee->apmat }}
                        </h4>

                        <p class="mb-0" style="color: #2e5d20;">
                            Registro de empleado
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
                                <small class="fw-bold d-block mb-2" style="color: #2e5d20;">
                                    <i class="fas fa-id-card me-1"></i>
                                    Número trabajador
                                </small>
                                <span class="fw-semibold">{{ $employee->num_trabajador }}</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="p-3 h-100"
                                style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">
                                <small class="fw-bold d-block mb-2" style="color: #2e5d20;">
                                    <i class="fas fa-user me-1"></i>
                                    Nombre
                                </small>
                                <span class="fw-semibold">{{ $employee->nom }}</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="p-3 h-100"
                                style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">
                                <small class="fw-bold d-block mb-2" style="color: #2e5d20;">
                                    <i class="fas fa-user me-1"></i>
                                    Segundo nombre
                                </small>
                                <span class="fw-semibold">{{ $employee->nom_s }}</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="p-3 h-100"
                                style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">
                                <small class="fw-bold d-block mb-2" style="color: #2e5d20;">
                                    <i class="fas fa-user me-1"></i>
                                    Apellido paterno
                                </small>
                                <span class="fw-semibold">{{ $employee->apat }}</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="p-3 h-100"
                                style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">
                                <small class="fw-bold d-block mb-2" style="color: #2e5d20;">
                                    <i class="fas fa-user me-1"></i>
                                    Apellido materno
                                </small>
                                <span class="fw-semibold">{{ $employee->apmat }}</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="p-3 h-100"
                                style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">
                                <small class="fw-bold d-block mb-2" style="color: #2e5d20;">
                                    <i class="fas fa-birthday-cake me-1"></i>
                                    Edad
                                </small>
                                <span class="fw-semibold">{{ $employee->edad }}</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="p-3 h-100"
                                style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">
                                <small class="fw-bold d-block mb-2" style="color: #2e5d20;">
                                    <i class="fas fa-venus-mars me-1"></i>
                                    Sexo
                                </small>
                                <span class="fw-semibold">{{ $employee->sexo }}</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="p-3 h-100"
                                style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">
                                <small class="fw-bold d-block mb-2" style="color: #2e5d20;">
                                    <i class="fas fa-briefcase me-1"></i>
                                    Tipo empleado
                                </small>
                                <span class="fw-semibold">{{ $employee->tipo_em }}</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="p-3 h-100"
                                style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">
                                <small class="fw-bold d-block mb-2" style="color: #2e5d20;">
                                    <i class="fas fa-clock me-1"></i>
                                    Turno (FK)
                                </small>
                                <span class="fw-semibold">{{ $employee->fk_turno }}</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="p-3 h-100"
                                style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">
                                <small class="fw-bold d-block mb-2" style="color: #2e5d20;">
                                    <i class="fas fa-user-shield me-1"></i>
                                    Jefe (FK)
                                </small>
                                <span class="fw-semibold">{{ $employee->fk_jefe }}</span>
                            </div>
                        </div>

                    </div>

                    {{-- Datos adicionales --}}
                    @if ($employee->data)

                        <h5 class="fw-bold mt-4 mb-3">
                            <i class="fas fa-address-card me-2"
                                style="color: #ffa24b;"></i>
                            Datos adicionales
                        </h5>

                        <div class="row g-2">

                            <div class="col-md-6">
                                <div class="p-3 h-100"
                                    style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">
                                    <small class="fw-bold d-block mb-2" style="color: #2e5d20;">
                                        <i class="fas fa-phone me-1"></i>
                                        Teléfono
                                    </small>
                                    <span class="fw-semibold">{{ $employee->data->tel }}</span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="p-3 h-100"
                                    style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">
                                    <small class="fw-bold d-block mb-2" style="color: #2e5d20;">
                                        <i class="fas fa-envelope me-1"></i>
                                        Correo electrónico
                                    </small>
                                    <span class="fw-semibold">{{ $employee->data->correo_elec }}</span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="p-3 h-100"
                                    style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">
                                    <small class="fw-bold d-block mb-2" style="color: #2e5d20;">
                                        <i class="fas fa-road me-1"></i>
                                        Calle
                                    </small>
                                    <span class="fw-semibold">{{ $employee->data->calle }}</span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="p-3 h-100"
                                    style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">
                                    <small class="fw-bold d-block mb-2" style="color: #2e5d20;">
                                        <i class="fas fa-map-marker-alt me-1"></i>
                                        Colonia
                                    </small>
                                    <span class="fw-semibold">{{ $employee->data->col }}</span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="p-3 h-100"
                                    style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">
                                    <small class="fw-bold d-block mb-2" style="color: #2e5d20;">
                                        <i class="fas fa-mail-bulk me-1"></i>
                                        Código Postal
                                    </small>
                                    <span class="fw-semibold">{{ $employee->data->cp }}</span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="p-3 h-100"
                                    style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">
                                    <small class="fw-bold d-block mb-2" style="color: #2e5d20;">
                                        <i class="fas fa-door-closed me-1"></i>
                                        Nº Interior
                                    </small>
                                    <span class="fw-semibold">{{ $employee->data->n_I }}</span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="p-3 h-100"
                                    style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">
                                    <small class="fw-bold d-block mb-2" style="color: #2e5d20;">
                                        <i class="fas fa-door-open me-1"></i>
                                        Nº Exterior
                                    </small>
                                    <span class="fw-semibold">{{ $employee->data->n_E }}</span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="p-3 h-100"
                                    style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">
                                    <small class="fw-bold d-block mb-2" style="color: #2e5d20;">
                                        <i class="fas fa-map me-1"></i>
                                        Estado
                                    </small>
                                    <span class="fw-semibold">{{ $employee->data->estado }}</span>
                                </div>
                            </div>

                        </div>

                    @else

                        <div class="mt-4 p-3"
                            style="background-color: #fff2d5; border: 1px solid #ffe2a5; border-radius: 10px; color: #2e5d20;">

                            <i class="fas fa-info-circle me-2"
                                style="color: #ffa24b;"></i>

                            Este empleado aún no tiene datos adicionales registrados.
                        </div>

                    @endif

                    {{-- Pie informativo --}}
                    <div class="mt-4 p-3 text-center"
                        style="background-color: #ffa24b; border-radius: 10px; color: white;">

                        <i class="fas fa-leaf me-2"></i>
                        <span class="fw-semibold">
                            Zoológico Jurásico | Registro de empleado
                        </span>
                    </div>

                </div>
            </div>

        </div>
    </div>

</section>
@endsection
