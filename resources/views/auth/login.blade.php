
@extends('layouts.app')

@section('content')

<!-- FONDO AZUL: OCUPA TODA LA MITAD DERECHA -->
<div class="position-fixed top-0 end-0 w-50 h-100"
     style="background-color:#FAF8F5; z-index: -1;">
</div>

<!-- IMAGEN: OCUPA TODA LA MITAD IZQUIERDA -->
<div class="position-fixed top-0 start-0 w-50 h-100 overflow-hidden"
     style="z-index: -1;">

    <img src="{{ asset('img/imagen_inicio.jpg') }}"
     alt="Imagen de bienvenida"
     class="position-absolute top-0 start-0 w-100 h-100"
     style="object-fit: cover;">

    <!-- DEGRADADO OSCURO -->
    <div style="
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(
            to right,
            rgba(0, 0, 0, 0.70) 0%,
            rgba(0, 0, 0, 0.50) 30%,
            rgba(0, 0, 0, 0.20) 65%,
            rgba(0, 0, 0, 0) 100%
        );
        pointer-events: none;">
    </div>

</div>

<!-- CONTENIDO PRINCIPAL -->
<div class="container-fluid p-0">

    <div class="row g-0">

        <!-- COLUMNA IZQUIERDA: BIENVENIDA -->
        <div class="col-12 col-md-6 d-flex align-items-center justify-content-center text-white p-4">

            <div class="text-center">

                <h1 class="fw-bold display-5">
                    <span class="px-3 py-2 rounded-3"
                        style="color: #f8faf8;">
                        ¡Bienvenido!
                    </span>
                </h1>

                <h2 class="fw-semibold mt-3">
                    Sistema de registro del Zoológico Jurásico
                </h2>

                <p class="fs-5 mt-3 fw-semibold">
                    Registra y administra
                    la experiencia de nuestro mundo animal.
                </p>

            </div>

        </div>

        <!-- COLUMNA DERECHA: FORMULARIO -->
        <div class="col-12 col-md-6 d-flex align-items-center justify-content-center p-4">

           <div class="card text-dark border border-light border-opacity-25
                        shadow-lg rounded-4 p-3 w-100"
                 style="background-color: #FFFFFF; max-width: 440px; box-shadow: 0 20px 40px rgba(44, 68, 40, 0.08) !important;">

                <!-- ENCABEZADO -->
                <div class="card-header bg-transparent text-center fs-3 fw-bold border-0"
                    style= "color: #372614;">
                    {{ __('Iniciar Sesión') }}
                </div>

                <div class="card-body">

                    <!-- FORMULARIO -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- CORREO ELECTRÓNICO -->
                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold"
                            style= "color: #372614;">
                                Correo electrónico
                            </label>

                            <input id="email"
                                   type="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   style="background-color: #FAF8F5; border-color: #E5E7EB; border-radius: 10px; color: #1E293B;"
                                   name="email"
                                   value="{{ old('email') }}"
                                   placeholder="ejemplo@jurasico.com"
                                   required
                                   autofocus
                                   autocomplete="username">

                            @error('email')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <!-- CONTRASEÑA -->
                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold"
                            style= "color: #372614;">
                                Contraseña
                            </label>

                            <input id="password"
                                   type="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                    style="background-color: #FAF8F5; border-color: #E5E7EB; border-radius: 10px; color: #1E293B;"
                                   placeholder="Introduce tu contraseña"
                                   name="password"
                                   required
                                   autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <!-- RECORDAR SESIÓN -->
                        <div class="mb-3 form-check">
                            <input class="form-check-input"
                                   type="checkbox"
                                   name="remember"
                                   id="remember">

                            <label class="form-check-label fw-semibold" for="remember"
                            style= "color: #372614;">
                                Recordarme
                            </label>
                        </div>

                        <!-- BOTÓN INICIAR SESIÓN -->
                        <div class="d-grid">
                            <button type="submit" class="btn fw-bold text-white"
                            style="background-color: #c6881c;">
                                Iniciar sesión
                            </button>
                        </div>

                        <!-- ENLACE REGISTRO -->
                        <div class="text-center mt-3 fw-semibold">
                            ¿No tienes una cuenta?
                            <a href="{{ route('register') }}"
                            style= "color: #244719; ">
                                Regístrate aquí
                            </a>
                        </div>

                    </form>

                </div>
            </div>

        </div>

    </div>

</div>

@endsection
