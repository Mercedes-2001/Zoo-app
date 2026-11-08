
@extends('layouts.app')

@section('template_title')
    {{ $animal->name ?? __('Detalles del Animal') }}
@endsection

@section('content')

<section class="container-fluid px-3 py-3"
    style="min-height: calc(100vh - 180px); display: flex; align-items: center; justify-content: center;">

    <div class="row justify-content-center w-100">
        <div class="col-lg-10 col-xl-9">

            <div class="card shadow-lg"
                style="border: none; border-radius: 18px; overflow: hidden; background-color: white;">

                <!-- ENCABEZADO -->
                <div class="card-header text-white d-flex justify-content-between align-items-center"
                    style="background-color: #2e5d20; padding: 0.8rem 1.2rem; border: none;">

                    <h4 class="mb-0 fw-bold" style="font-size: 1.2rem;">
                        <i class="fas fa-paw me-2"></i>
                        Detalles del Animal
                    </h4>

                    <a href="{{ route('animals.index') }}"
                        class="btn px-3 py-2"
                        style="background-color: #f69235; color: white; border: none; border-radius: 8px; font-weight: 600; text-decoration: none;">

                        <i class="fas fa-arrow-left me-1"></i>
                        Volver

                    </a>

                </div>

                <!-- CONTENIDO -->
                <div class="card-body p-3 p-md-4"
                    style="color: #2e5d20;">

                    <!-- PRESENTACIÓN DEL ANIMAL -->
                    <div class="text-center mb-3 p-3"
                        style="background-color: #f9f9f9; border-radius: 12px; border: 1px solid #ffe2a5;">

                        <h3 class="fw-bold mb-1"
                            style="color: #2e5d20; font-size: 1.5rem;">
                            {{ $animal->nombre_ani }}
                        </h3>

                        <p class="mb-0"
                            style="color: #2e5d20; font-size: 1rem;">
                            <i class="fas me-1"></i>
                            Nombre del animal
                        </p>

                    </div>

                    <!-- INFORMACIÓN DEL ANIMAL -->
                    <h5 class="fw-bold mb-2"
                        style="color: #2e5d20; font-size: 1.05rem;">

                        <i class="fas fa-info-circle me-2"
                            style="color: #f69235;"></i>
                        Información general

                    </h5>

                    <div class="row g-2">

                        <!-- ID ANIMAL -->
                        <div class="col-md-6">
                            <div class="p-3 h-100"
                                style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">

                                <small class="fw-bold d-block mb-1" style="color: #2e5d20;">
                                    <i class="fas fa-hashtag me-1"></i>
                                    ID Animal
                                </small>

                                <span class="fw-semibold">
                                    {{ $animal->id_ani }}
                                </span>

                            </div>
                        </div>

                        <!-- NOMBRE -->
                        <div class="col-md-6">
                            <div class="p-3 h-100"
                                style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">

                                <small class="fw-bold d-block mb-1" style="color: #2e5d20;">
                                    <i class="fas fa-paw me-1"></i>
                                    Nombre
                                </small>

                                <span class="fw-semibold">
                                    {{ $animal->nombre_ani }}
                                </span>

                            </div>
                        </div>

                        <!-- EDAD -->
                        <div class="col-md-6">
                            <div class="p-3 h-100"
                                style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">

                                <small class="fw-bold d-block mb-1" style="color: #2e5d20;">
                                    <i class="fas fa-hourglass-half me-1"></i>
                                    Edad
                                </small>

                                <span class="fw-semibold">
                                    {{ $animal->edad_ani }}
                                </span>

                            </div>
                        </div>

                        <!-- PESO -->
                        <div class="col-md-6">
                            <div class="p-3 h-100"
                                style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">

                                <small class="fw-bold d-block mb-1" style="color: #2e5d20;">
                                    <i class="fas fa-weight me-1"></i>
                                    Peso
                                </small>

                                <span class="fw-semibold">
                                    {{ $animal->peso_ani }}
                                </span>

                            </div>
                        </div>

                        <!-- ALTURA -->
                        <div class="col-md-6">
                            <div class="p-3 h-100"
                                style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">

                                <small class="fw-bold d-block mb-1" style="color: #2e5d20;">
                                    <i class="fas fa-ruler-vertical me-1"></i>
                                    Altura
                                </small>

                                <span class="fw-semibold">
                                    {{ $animal->altura }}
                                </span>

                            </div>
                        </div>

                        <!-- SEXO -->
                        <div class="col-md-6">
                            <div class="p-3 h-100"
                                style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">

                                <small class="fw-bold d-block mb-1" style="color: #2e5d20;">
                                    <i class="fas fa-venus-mars me-1"></i>
                                    Sexo
                                </small>

                                <span class="fw-semibold">
                                    {{ $animal->sexo_ani }}
                                </span>

                            </div>
                        </div>

                        <!-- FECHA DE NACIMIENTO -->
                        <div class="col-md-6">
                            <div class="p-3 h-100"
                                style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">

                                <small class="fw-bold d-block mb-1" style="color: #2e5d20;">
                                    <i class="fas fa-calendar-alt me-1"></i>
                                    Fecha de nacimiento
                                </small>

                                <span class="fw-semibold">
                                    {{ $animal->fecha_nac }}
                                </span>

                            </div>
                        </div>

                        <!-- DESCRIPCIÓN -->
                        <div class="col-md-6">
                            <div class="p-3 h-100"
                                style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">

                                <small class="fw-bold d-block mb-1" style="color: #2e5d20;">
                                    <i class="fas fa-align-left me-1"></i>
                                    Descripción
                                </small>

                                <span class="fw-semibold">
                                    {{ $animal->descripcion_ani }}
                                </span>

                            </div>
                        </div>

                        <!-- LUGAR DE ORIGEN -->
                        <div class="col-md-6">
                            <div class="p-3 h-100"
                                style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">

                                <small class="fw-bold d-block mb-1" style="color: #2e5d20;">
                                    <i class="fas fa-globe-americas me-1"></i>
                                    Lugar de origen
                                </small>

                                <span class="fw-semibold">
                                    {{ $animal->lugar_origen }}
                                </span>

                            </div>
                        </div>

                        <!-- ESPECIE -->
                        <div class="col-md-6">
                            <div class="p-3 h-100"
                                style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">

                                <small class="fw-bold d-block mb-1" style="color: #2e5d20;">
                                    <i class="fas fa-dna me-1"></i>
                                    Especie
                                </small>

                                <span class="fw-semibold">
                                    {{ $animal->fk_especie }} — {{ $animal->species?->nom_comun }}
                                </span>

                            </div>
                        </div>

                        <!-- ID ZONA -->
                        <div class="col-md-6">
                            <div class="p-3 h-100"
                                style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">

                                <small class="fw-bold d-block mb-1" style="color: #2e5d20;">
                                    <i class="fas fa-hashtag me-1"></i>
                                    ID Zona
                                </small>

                                <span class="fw-semibold">
                                    {{ $animal->fk_zona }}
                                </span>

                            </div>
                        </div>

                        <!-- NOMBRE ZONA -->
                        <div class="col-md-6">
                            <div class="p-3 h-100"
                                style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">

                                <small class="fw-bold d-block mb-1" style="color: #2e5d20;">
                                    <i class="fas fa-map-marker-alt me-1"></i>
                                    Nombre de la zona
                                </small>

                                <span class="fw-semibold">
                                    {{ $animal->fk_nombre_zona }}
                                </span>

                            </div>
                        </div>

                    </div>

                    <!-- PIE INFORMATIVO -->
                    <div class="mt-3 text-center p-2"
                        style="background-color: #f69235; border-radius: 10px; color: white;">

                        <i class="fas fa-tree me-2"></i>
                        Zoológico Jurásico | Registro de animales

                    </div>

                </div>
            </div>

        </div>
    </div>

</section>
@endsection
