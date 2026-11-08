<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body style="background-color: #fff4d4; min-height: 100vh;">

    <div id="app">

        
        <!-- CONTENEDOR PRINCIPAL: LOGO Y NAVBAR -->
<div class="container-fluid"
    style="{{ !request()->routeIs('login', 'register') ? 'background-color: #ffa24b;' : '' }}">
            <div class="row align-items-left flex-nowrap">

                <!-- COLUMNA 1: LOGO -->
                <div class="col-4 col-md-3 text-start py-2">

                    <a href="{{ url('/') }}">
                        <!-- img-fluid	Permite que la imagen se adapte al espacio disponible.
                             width: 100% Indica que la imagen debe ocupar el 100% del ancho disponible de su contenedor.-->
                        <img src="{{ asset('img/logo.png') }}" alt="Logo" class="img-fluid"
                            style="width: 220px;
                            height: 150px;
                            object-fit: contain;">
                    </a>

                </div>

                <!-- COLUMNA 2: NAVBAR -->
                <div class="col-8 col-md-9 p-5">

                    <nav class="navbar navbar-expand-md" border-radius: 10px;>

                        <div class="container-fluid justify-content-end">

                            <button class="navbar-toggler ms auto" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Alternar navegación">

                                <span class="navbar-toggler-icon"></span>

                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                                <ul class="navbar-nav me-auto"></ul>

                                @guest

                                    <ul class="navbar-nav ms-auto">

                                        @if (Route::has('login'))
                                            <li class="nav-item">
                                                <a class="nav-link fw-bold fs-5" href="{{ route('login') }}"
                                                style="color: #244719;">
                                                    Iniciar sesión
                                                </a>
                                            </li>
                                        @endif

                                        @if (Route::has('register'))
                                            <li class="nav-item">
                                                <a class="nav-link fw-bold fs-5" href="{{ route('register') }}"
                                                style="color: #244719;">
                                                    Registrarse
                                                </a>
                                            </li>
                                        @endif

                                    </ul>
                                
                                    @else

                                        <div class="d-flex flex-column flex-md-row align-items-start gap-2 ms-auto">

                                            <!-- Botón Menú: se oculta cuando ya estamos en el menú -->
                                            @unless (request()->routeIs('home'))
                                                <a href="{{ route('home') }}"
                                                class="btn d-flex align-items-center justify-content-center fw-bold"
                                                style="background-color: #2e5d20;
                                                color: #ffffff; 
                                                width: 200px;">

                                                    Menú

                                                </a>
                                            @endunless

                                            <!-- Botón Cerrar sesión -->
                                            <a href="#"
                                            class="btn d-flex align-items-center justify-content-center fw-bold"
                                            style="background-color: #2e5d20;
                                                    color: #ffffff;
                                                    width: 200px;"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

                                                <i class="fas fa-sign-out-alt me-1"></i>
                                                Cerrar sesión

                                            </a>

                                        </div>

                                        <!-- Formulario oculto -->
                                        <form id="logout-form"
                                            action="{{ route('logout') }}"
                                            method="POST"
                                            class="d-none">

                                            @csrf

                                        </form>

                                    @endguest

                            </div>
                        </div>
                    </nav>

                </div>

            </div>
        </div>

        <main class="py-0">
            @yield('content')
        </main>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
