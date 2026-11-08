
@extends('layouts.app')

@section('template_title')
    {{ $food->name ?? __('Detalles del Alimento') }}
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
                        <i class="fas fa-utensils me-2"></i>
                        Detalles del Alimento
                    </h4>

                    <a href="{{ route('food.index') }}"
                        class="btn px-3 py-2"
                        style="background-color: #ffa24b; color: white; border: none; border-radius: 8px; font-weight: 600; text-decoration: none;">

                        <i class="fas fa-arrow-left me-1"></i>
                        Volver

                    </a>

                </div>

                <!-- CONTENIDO -->
                <div class="card-body p-3 p-md-4"
                    style="color: #2e5d20;">

                    <!-- PRESENTACIÓN DEL ALIMENTO -->
                    <div class="text-center mb-3 p-3"
                        style="background-color: #f9f9f9; border-radius: 12px; border: 1px solid #ffe2a5;">

                        <h3 class="fw-bold mb-1"
                            style="color: #2e5d20; font-size: 1.5rem;">
                            {{ $food->nom_alim }}
                        </h3>

                        <p class="mb-0"
                            style="color: #2e5d20; font-size: 1rem;">
                            Nombre del alimento
                        </p>

                    </div>

                    <!-- INFORMACIÓN DEL ALIMENTO -->
                    <h5 class="fw-bold mb-2"
                        style="color: #2e5d20; font-size: 1.05rem;">

                        <i class="fas fa-info-circle me-2"
                            style="color: #ffa24b;"></i>
                        Información general

                    </h5>

                    <div class="row g-2">

                        <!-- CÓDIGO ALIMENTO -->
                        <div class="col-md-6">
                            <div class="p-3 h-100"
                                style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">

                                <small class="fw-bold d-block mb-1" style="color: #2e5d20;">
                                    <i class="fas fa-hashtag me-1"></i>
                                    Código del alimento
                                </small>

                                <span class="fw-semibold">
                                    {{ $food->cod_alim }}
                                </span>

                            </div>
                        </div>

                        <!-- NOMBRE ALIMENTO -->
                        <div class="col-md-6">
                            <div class="p-3 h-100"
                                style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">

                                <small class="fw-bold d-block mb-1" style="color: #2e5d20;">
                                    <i class="fas fa-apple-alt me-1"></i>
                                    Nombre del alimento
                                </small>

                                <span class="fw-semibold">
                                    {{ $food->nom_alim }}
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
                                    {{ $food->peso_alim }}
                                </span>

                            </div>
                        </div>

                        <!-- CONTENIDO -->
                        <div class="col-md-6">
                            <div class="p-3 h-100"
                                style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">

                                <small class="fw-bold d-block mb-1" style="color: #2e5d20;">
                                    <i class="fas fa-box-open me-1"></i>
                                    Contenido
                                </small>

                                <span class="fw-semibold">
                                    {{ $food->contenido_alim }}
                                </span>

                            </div>
                        </div>

                        <!-- CANTIDAD TOTAL -->
                        <div class="col-md-6">
                            <div class="p-3 h-100"
                                style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">

                                <small class="fw-bold d-block mb-1" style="color: #2e5d20;">
                                    <i class="fas fa-boxes me-1"></i>
                                    Cantidad total
                                </small>

                                <span class="fw-semibold">
                                    {{ $food->cant_total }}
                                </span>

                            </div>
                        </div>

                        <!-- COSTO -->
                        <div class="col-md-6">
                            <div class="p-3 h-100"
                                style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">

                                <small class="fw-bold d-block mb-1" style="color: #2e5d20;">
                                    <i class="fas fa-dollar-sign me-1"></i>
                                    Costo
                                </small>

                                <span class="fw-semibold">
                                    {{ $food->costo }}
                                </span>

                            </div>
                        </div>

                        <!-- PROVEEDOR -->
                        <div class="col-md-6">
                            <div class="p-3 h-100"
                                style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">

                                <small class="fw-bold d-block mb-1" style="color: #2e5d20;">
                                    <i class="fas fa-truck me-1"></i>
                                    Proveedor (FK)
                                </small>

                                <span class="fw-semibold">
                                    {{ $food->fk_prov }}
                                </span>

                            </div>
                        </div>

                    </div>

                    <!-- PIE INFORMATIVO -->
                    <div class="mt-3 text-center p-2"
                        style="background-color: #ffa24b; border-radius: 10px; color: white;">

                        <i class="fas fa-tree me-2"></i>
                        Zoológico Jurásico | Registro de alimentos

                    </div>

                </div>
            </div>

        </div>
    </div>

</section>
@endsection
