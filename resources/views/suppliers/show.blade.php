
@extends('layouts.app')

@section('template_title')
    {{ $supplier->name ?? __('Detalles del Proveedor') }}
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
                        <i class="fas fa-truck me-2"></i>
                        Detalles del Proveedor
                    </h4>

                    <a href="{{ route('suppliers.index') }}"
                        class="btn px-3 py-2"
                        style="background-color: #ffa24b; color: white; border: none; border-radius: 8px; font-weight: 600; text-decoration: none;">

                        <i class="fas fa-arrow-left me-1"></i>
                        Volver

                    </a>

                </div>

                <!-- CONTENIDO -->
                <div class="card-body p-3 p-md-4"
                    style="color: #2e5d20;">

                    <!-- PRESENTACIÓN DEL PROVEEDOR -->
                    <div class="text-center mb-3 p-3"
                        style="background-color: #f9f9f9; border-radius: 12px; border: 1px solid #ffe2a5;">

                        <h3 class="fw-bold mb-1"
                            style="color: #2e5d20; font-size: 1.5rem;">
                            {{ $supplier->nom_prov }}
                        </h3>

                        <p class="mb-0"
                            style="color: #2e5d20; font-size: 1rem;">
                            <i class="fas  me-1"></i>
                            Nombre del proveedor
                        </p>

                    </div>

                    <!-- INFORMACIÓN DEL PROVEEDOR -->
                    <h5 class="fw-bold mb-2"
                        style="color: #2e5d20; font-size: 1.05rem;">

                        <i class="fas fa-info-circle me-2"
                            style="color: #ffa24b;"></i>
                        Información general

                    </h5>

                    <div class="row g-2">

                        <!-- RFC -->
                        <div class="col-md-6">
                            <div class="p-3 h-100"
                                style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">

                                <small class="fw-bold d-block mb-1" style="color: #2e5d20;">
                                    <i class="fas fa-id-card me-1"></i>
                                    RFC
                                </small>

                                <span class="fw-semibold">
                                    {{ $supplier->rfc }}
                                </span>

                            </div>
                        </div>

                        <!-- NOMBRE PROVEEDOR -->
                        <div class="col-md-6">
                            <div class="p-3 h-100"
                                style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">

                                <small class="fw-bold d-block mb-1" style="color: #2e5d20;">
                                    <i class="fas fa-building me-1"></i>
                                    Nombre del proveedor
                                </small>

                                <span class="fw-semibold">
                                    {{ $supplier->nom_prov }}
                                </span>

                            </div>
                        </div>

                        <!-- TELÉFONO -->
                        <div class="col-md-6">
                            <div class="p-3 h-100"
                                style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">

                                <small class="fw-bold d-block mb-1" style="color: #2e5d20;">
                                    <i class="fas fa-phone me-1"></i>
                                    Teléfono
                                </small>

                                <span class="fw-semibold">
                                    {{ $supplier->tel_prov }}
                                </span>

                            </div>
                        </div>

                        <!-- CORREO -->
                        <div class="col-md-6">
                            <div class="p-3 h-100"
                                style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">

                                <small class="fw-bold d-block mb-1" style="color: #2e5d20;">
                                    <i class="fas fa-envelope me-1"></i>
                                    Correo electrónico
                                </small>

                                <span class="fw-semibold">
                                    {{ $supplier->correo_prov }}
                                </span>

                            </div>
                        </div>

                        <!-- CALLE -->
                        <div class="col-md-6">
                            <div class="p-3 h-100"
                                style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">

                                <small class="fw-bold d-block mb-1" style="color: #2e5d20;">
                                    <i class="fas fa-road me-1"></i>
                                    Calle
                                </small>

                                <span class="fw-semibold">
                                    {{ $supplier->calle_prov }}
                                </span>

                            </div>
                        </div>

                        <!-- COLONIA -->
                        <div class="col-md-6">
                            <div class="p-3 h-100"
                                style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">

                                <small class="fw-bold d-block mb-1" style="color: #2e5d20;">
                                    <i class="fas fa-map-marker-alt me-1"></i>
                                    Colonia
                                </small>

                                <span class="fw-semibold">
                                    {{ $supplier->col_prov }}
                                </span>

                            </div>
                        </div>

                        <!-- CÓDIGO POSTAL -->
                        <div class="col-md-6">
                            <div class="p-3 h-100"
                                style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">

                                <small class="fw-bold d-block mb-1" style="color: #2e5d20;">
                                    <i class="fas fa-mail-bulk me-1"></i>
                                    Código postal
                                </small>

                                <span class="fw-semibold">
                                    {{ $supplier->cp_prov }}
                                </span>

                            </div>
                        </div>

                        <!-- NÚMERO EXTERIOR -->
                        <div class="col-md-6">
                            <div class="p-3 h-100"
                                style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">

                                <small class="fw-bold d-block mb-1" style="color: #2e5d20;">
                                    <i class="fas fa-home me-1"></i>
                                    Número exterior
                                </small>

                                <span class="fw-semibold">
                                    {{ $supplier->numext_prov }}
                                </span>

                            </div>
                        </div>

                        <!-- NÚMERO INTERIOR -->
                        <div class="col-md-6">
                            <div class="p-3 h-100"
                                style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">

                                <small class="fw-bold d-block mb-1" style="color: #2e5d20;">
                                    <i class="fas fa-door-open me-1"></i>
                                    Número interior
                                </small>

                                <span class="fw-semibold">
                                    {{ $supplier->numint_prov }}
                                </span>

                            </div>
                        </div>

                        <!-- TIPO DE PROVEEDOR -->
                        <div class="col-md-6">
                            <div class="p-3 h-100"
                                style="background-color: #f9f9f9; border: 1px solid #ffe2a5; border-radius: 10px;">

                                <small class="fw-bold d-block mb-1" style="color: #2e5d20;">
                                    <i class="fas fa-tags me-1"></i>
                                    Tipo de proveedor
                                </small>

                                <span class="fw-semibold">
                                    {{ $supplier->tipo_prov }}
                                </span>

                            </div>
                        </div>

                    </div>

                    <!-- PIE INFORMATIVO -->
                    <div class="mt-3 text-center p-2"
                        style="background-color: #ffa24b; border-radius: 10px; color: white;">

                        <i class="fas fa-tree me-2"></i>
                        Zoológico Jurásico | Registro de proveedores

                    </div>

                </div>
            </div>

        </div>
    </div>

</section>
@endsection
