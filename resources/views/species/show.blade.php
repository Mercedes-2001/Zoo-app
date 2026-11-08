
@extends('layouts.app')

@section('template_title')
    {{ $species->name ?? __('Detalles de la Especie') }}
@endsection

@section('content')

<section class="container-fluid px-3 py-3"
    style="min-height: calc(100vh - 180px); display: flex; align-items: center; justify-content: center;">

    <div class="row justify-content-center w-100">
        <div class="col-lg-9 col-xl-8">

            <div class="card shadow-lg"
                style="border: none; border-radius: 18px; overflow: hidden; background-color: white;">

                <!-- ENCABEZADO -->
                <div class="card-header text-white d-flex justify-content-between align-items-center"
                    style="background-color: #2e5d20; padding: 0.8rem 1.2rem; border: none;">

                    <h4 class="mb-0 fw-bold" style="font-size: 1.2rem;">
                        <i class="fas fa-dna me-2"></i>
                        Detalles de la Especie
                    </h4>

                    <a href="{{ route('species.index') }}"
                        class="btn px-3 py-2"
                        style="background-color: #ffa24b; color: white; border: none; border-radius: 8px; font-weight: 600; text-decoration: none;">

                        <i class="fas fa-arrow-left me-1"></i>
                        Volver

                    </a>

                </div>

                <!-- CONTENIDO -->
                <div class="card-body p-3 p-md-4"
                    style="color: #2e5d20;">

                    <!-- PRESENTACIÓN DE LA ESPECIE -->
                    <div class="text-center mb-3 p-3"
                        style="background-color: #f9f9f9; border-radius: 12px; border: 1px solid #ffe2a5;">

                        <h3 class="fw-bold mb-1"
                            style="color: #2e5d20; font-size: 1.5rem;">
                            {{ $species->nom_comun }}
                        </h3>

                        <p class="mb-0 fst-italic"
                            style="color: #2e5d20; font-size: 1rem;">
                            {{ $species->nom_cientf }}
                        </p>

                    </div>

                    <!-- INFORMACIÓN DE LA ESPECIE -->
                    <h5 class="fw-bold mb-2"
                        style="color: #2e5d20; font-size: 1.05rem;">

                        <i class="fas fa-info-circle me-2"
                            style="color: #ffa24b;"></i>
                        Información general

                    </h5>

                    <div class="row g-2">

                        <!-- ID -->
                        <div class="col-md-6">
                            <div class="p-3 h-100"
                                style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">

                                <small class="fw-bold d-block mb-1"
                                    style="color: #2e5d20;">
                                    <i class="fas fa-hashtag me-1"></i>
                                    ID de la especie
                                </small>

                                <span class="fw-semibold">
                                    {{ $species->id_esp }}
                                </span>

                            </div>
                        </div>

                        <!-- NOMBRE COMÚN -->
                        <div class="col-md-6">
                            <div class="p-3 h-100"
                                style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">

                                <small class="fw-bold d-block mb-1"
                                    style="color: #2e5d20;">
                                    <i class="fas fa-paw me-1"></i>
                                    Nombre común
                                </small>

                                <span class="fw-semibold">
                                    {{ $species->nom_comun }}
                                </span>

                            </div>
                        </div>

                        <!-- NOMBRE CIENTÍFICO -->
                        <div class="col-md-6">
                            <div class="p-3 h-100"
                                style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">

                                <small class="fw-bold d-block mb-1"
                                    style="color: #2e5d20;">
                                    <i class="fas fa-microscope me-1"></i>
                                    Nombre científico
                                </small>

                                <span class="fw-semibold fst-italic">
                                    {{ $species->nom_cientf }}
                                </span>

                            </div>
                        </div>

                        <!-- TIPO DE NACIMIENTO -->
                        <div class="col-md-6">
                            <div class="p-3 h-100"
                                style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">

                                <small class="fw-bold d-block mb-1"
                                    style="color: #2e5d20;">
                                    <i class="fas fa-egg me-1"></i>
                                    Tipo de nacimiento
                                </small>

                                <span class="fw-semibold">
                                    {{ $species->tipo_nac }}
                                </span>

                            </div>
                        </div>

                        <!-- FAMILIA -->
                        <div class="col-md-6">
                            <div class="p-3 h-100"
                                style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">

                                <small class="fw-bold d-block mb-1"
                                    style="color: #2e5d20;">
                                    <i class="fas fa-sitemap me-1"></i>
                                    Familia
                                </small>

                                <span class="fw-semibold">
                                    {{ $species->familia }}
                                </span>

                            </div>
                        </div>

                    </div>

                    <!-- PIE INFORMATIVO -->
                    <div class="mt-3 text-center p-2"
                        style="background-color: #ffa24b; border-radius: 10px; color: white;">

                        <i class="fas fa-tree me-2"></i>
                        Zoológico Jurásico | Registro de especies

                    </div>

                </div>
            </div>

        </div>
    </div>

</section>
@endsection
