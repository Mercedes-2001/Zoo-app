
@extends('layouts.app')

@section('title', 'Menú principal')

@section('content')

<style>
    /* COLORES DEL DISEÑO */
    :root {
        --naranja: #ffa24b;
        --naranja-claro: #fff2d5;
        --verde: #2e5d20;
        --verde-texto: #244719;
        --fondo: #fffaf0;
        --borde: #ffe2a5;
    }

    /* FONDO GENERAL */
    .menu-principal {
        background-color: var(--fondo);
        min-height: calc(100vh - 180px);
        padding: 2rem 1rem;
    }

    /* TÍTULO */
    .titulo-menu {
        color: var(--verde-texto);
        font-weight: 800;
        text-align: center;
        margin-bottom: 2rem;
    }

    /* DISTRIBUCIÓN DE TARJETAS */
    .grid-opciones {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 1.5rem;
    }

    /* TARJETA */
    .tarjeta-menu {
        background-color: #ffffff;
        border: 1px solid var(--borde);
        border-radius: 18px;
        padding: 1.5rem;
        box-shadow: 0 3px 12px rgba(0, 0, 0, 0.04);
        display: flex;
        flex-direction: column;
        min-width: 0;
        transition: transform .25s, box-shadow .25s;
    }

    .tarjeta-menu:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.09);
    }

    /* ENCABEZADO DE TARJETA */
    .tarjeta-encabezado {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.2rem;
    }

    /* ICONO */
    .icono-menu {
        width: 62px;
        height: 62px;
        border-radius: 17px;
        background-color: #fff4d4;
        color: var(--naranja);
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 1.8rem;
    }

    /* ETIQUETA */
    .etiqueta-menu {
        background-color: #fff3cf;
        color: #a95412;
        border: 1px solid #ffe08a;
        border-radius: 30px;
        padding: .35rem .8rem;
        font-size: .85rem;
        font-weight: 700;
    }

    /* TÍTULO DE CADA TARJETA */
    .titulo-tarjeta {
        color: var(--verde-texto);
        font-size: 1.4rem;
        font-weight: 800;
        margin-bottom: .5rem;
    }

    .titulo-naranja {
        color: var(--naranja);
    }

    /* DESCRIPCIÓN */
    .descripcion-menu {
        color: #68717c;
        font-size: .95rem;
        line-height: 1.5;
        margin-bottom: 1.2rem;
        flex-grow: 1;
    }

    /* SEPARADOR */
    .separador-menu {
        border: 0;
        border-top: 1px solid #f5e9d3;
        opacity: 1;
        margin: .1rem 0 1.5rem;
    }

    /* BOTONES */
    .acciones-menu {
        display: flex;
        gap: .6rem;
        align-items: stretch;
    }

    .boton-ver {
        flex-grow: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: .5rem;
        background-color: var(--verde);
        color: white;
        text-decoration: none;
        border-radius: 13px;
        padding: .75rem;
        font-weight: 700;
        font-size: .9rem;
        transition: background-color .25s;
    }

    .boton-ver:hover {
        background-color: #0d381c;
        color: white;
    }

    .boton-agregar {
        width: 42px;
        min-width: 42px;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: var(--naranja);
        color: white;
        text-decoration: none;
        border-radius: 13px;
        font-size: 1.2rem;
        transition: background-color .25s;
    }

    .boton-agregar:hover {
        background-color: #d96d12;
        color: white;
    }

    /* RESPONSIVE PARA CELULARES */
    @media (max-width: 767px) {
        .grid-opciones {
            grid-template-columns: 1fr;
        }

        .menu-principal {
            padding: 1.5rem .8rem;
        }
    }
</style>

<div class="menu-principal">

    <div class="container-fluid">

        <h1 class="titulo-menu">
            Selecciona una opción
        </h1>

        <div class="grid-opciones">

            <!-- ESPECIES -->
            <div class="tarjeta-menu">

                <div class="tarjeta-encabezado">
                    <div class="icono-menu">
                        <i class="fas fa-dna"></i>
                    </div>
                </div>

                <h2 class="titulo-tarjeta">Especies</h2>

                <p class="descripcion-menu">
                    Nombre científico, Nombre común, Tipo Nacimiento, Familia
                </p>

                <hr class="separador-menu">

                <div class="acciones-menu">
                    <a href="{{ route('species.index') }}" class="boton-ver">
                        <i class="fas fa-folder-open"></i>
                        Ver Especies
                    </a>

                    <a href="{{ route('species.create') }}"
                       class="boton-agregar" title="Agregar especie">
                        <i class="fas fa-plus"></i>
                    </a>
                </div>

            </div>

            <!-- ZONAS -->
            <div class="tarjeta-menu">

                <div class="tarjeta-encabezado">
                    <div class="icono-menu">
                        <i class="fas fa-map-marked-alt"></i>
                    </div>

                </div>

                <h2 class="titulo-tarjeta">Zonas</h2>

                <p class="descripcion-menu">
                    Nombre de la zona, ubicación y Capacidad.
                </p>

                <hr class="separador-menu">

                <div class="acciones-menu">
                    <a href="{{ route('zones.index') }}" class="boton-ver">
                        <i class="fas fa-map"></i>
                        Explorar Zonas
                    </a>

                    <a href="{{ route('zones.create') }}"
                       class="boton-agregar" title="Agregar zona">
                        <i class="fas fa-plus"></i>
                    </a>
                </div>

            </div>

            <!-- ANIMALES -->
            <div class="tarjeta-menu">

                <div class="tarjeta-encabezado">
                    <div class="icono-menu">
                        <i class="fas fa-paw"></i>
                    </div>
                
                </div>

                <h2 class="titulo-tarjeta">Animales</h2>

                <p class="descripcion-menu">
                    Registro, identificación, seguimiento y
                    administración de los animales del zoológico.
                </p>

                <hr class="separador-menu">

                <div class="acciones-menu">
                    <a href="{{ route('animal.index') }}" class="boton-ver">
                        <i class="fas fa-folder-open"></i>
                        Ver Animales
                    </a>

                    <a href="{{ route('animal.create') }}"
                       class="boton-agregar" title="Agregar animal">
                        <i class="fas fa-plus"></i>
                    </a>
                </div>

            </div>

            <!-- PROVEEDORES -->
            <div class="tarjeta-menu">

                <div class="tarjeta-encabezado">
                    <div class="icono-menu">
                        <i class="fas fa-truck"></i>
                    </div>

                </div>

                <h2 class="titulo-tarjeta">Proveedores</h2>

                <p class="descripcion-menu">
                    Infomación de comtacto de proveedores.
                </p>

                <hr class="separador-menu">

                <div class="acciones-menu">
                    <a href="{{ route('suppliers.index') }}" class="boton-ver">
                        <i class="fas fa-folder-open"></i>
                        Ver Proveedores
                    </a>

                    <a href="{{ route('suppliers.create') }}"
                       class="boton-agregar" title="Agregar proveedor">
                        <i class="fas fa-plus"></i>
                    </a>
                </div>

            </div>

            <!-- ALIMENTOS -->
            <div class="tarjeta-menu">

                <div class="tarjeta-encabezado">
                    <div class="icono-menu">
                        <i class="fas fa-utensils"></i>
                    </div>

                </div>

                <h2 class="titulo-tarjeta">Alimentos</h2>

                <p class="descripcion-menu">
                    Control y administración de alimentos
                    destinados a los animales.
                </p>

                <hr class="separador-menu">

                <div class="acciones-menu">
                    <a href="{{ route('food.index') }}" class="boton-ver">
                        <i class="fas fa-folder-open"></i>
                        Ver Alimentos
                    </a>

                    <a href="{{ route('food.create') }}"
                       class="boton-agregar" title="Agregar alimento">
                        <i class="fas fa-plus"></i>
                    </a>
                </div>

            </div>

            <!-- LOTES -->
            <div class="tarjeta-menu">

                <div class="tarjeta-encabezado">
                    <div class="icono-menu">
                        <i class="fas fa-layer-group"></i>
                    </div>

                </div>

                <h2 class="titulo-tarjeta">Lotes</h2>

                <p class="descripcion-menu">
                    Organización y seguimiento de lotes
                    y registros relacionados.
                </p>

                <hr class="separador-menu">

                <div class="acciones-menu">
                    <a href="{{ route('lots.index') }}" class="boton-ver">
                        <i class="fas fa-folder-open"></i>
                        Ver Lotes
                    </a>

                    <a href="{{ route('lots.create') }}"
                       class="boton-agregar" title="Agregar lote">
                        <i class="fas fa-plus"></i>
                    </a>
                </div>

            </div>

            <!-- CUIDADOS -->
            <div class="tarjeta-menu">

                <div class="tarjeta-encabezado">
                    <div class="icono-menu">
                        <i class="fas fa-heartbeat"></i>
                    </div>

                </div>

                <h2 class="titulo-tarjeta">Cuidados</h2>

                <p class="descripcion-menu">
                    Administración de cuidados, atención
                    y seguimiento del bienestar animal.
                </p>

                <hr class="separador-menu">

                <div class="acciones-menu">
                    <a href="{{ route('care.index') }}" class="boton-ver">
                        <i class="fas fa-folder-open"></i>
                        Ver Cuidados
                    </a>

                    <a href="{{ route('care.create') }}"
                       class="boton-agregar" title="Agregar cuidado">
                        <i class="fas fa-plus"></i>
                    </a>
                </div>

            </div>

            <!-- TURNOS -->
            <div class="tarjeta-menu">

                <div class="tarjeta-encabezado">
                    <div class="icono-menu">
                        <i class="fas fa-clock"></i>
                    </div>

                </div>

                <h2 class="titulo-tarjeta">Turnos</h2>

                <p class="descripcion-menu">
                    Gestión y organización de los horarios
                    y turnos de trabajo.
                </p>

                <hr class="separador-menu">

                <div class="acciones-menu">
                    <a href="{{ route('turns.index') }}" class="boton-ver">
                        <i class="fas fa-folder-open"></i>
                        Ver Turnos
                    </a>

                    <a href="{{ route('turns.create') }}"
                       class="boton-agregar" title="Agregar turno">
                        <i class="fas fa-plus"></i>
                    </a>
                </div>

            </div>

            <!-- DATOS DE TURNOS -->
            <div class="tarjeta-menu">

                <div class="tarjeta-encabezado">
                    <div class="icono-menu">
                        <i class="fas fa-clipboard-list"></i>
                    </div>

                </div>

                <h2 class="titulo-tarjeta">Datos de turnos</h2>

                <p class="descripcion-menu">
                    Consulta y administración de las asignaciones
                    de turnos del personal.
                </p>

                <hr class="separador-menu">

                <div class="acciones-menu">
                    <a href="{{ route('empturns.index') }}" class="boton-ver">
                        <i class="fas fa-folder-open"></i>
                        Ver Datos de Turnos
                    </a>

                    <a href="{{ route('empturns.create') }}"
                       class="boton-agregar" title="Agregar registro">
                        <i class="fas fa-plus"></i>
                    </a>
                </div>

            </div>

            <!-- EMPLEADOS -->
            <div class="tarjeta-menu">

                <div class="tarjeta-encabezado">
                    <div class="icono-menu">
                        <i class="fas fa-user-friends"></i>
                    </div>

                </div>

                <h2 class="titulo-tarjeta">Empleados</h2>

                <p class="descripcion-menu">
                    Registro y administración de los empleados
                    que forman parte del zoológico.
                </p>

                <hr class="separador-menu">

                <div class="acciones-menu">
                    <a href="{{ route('employees.index') }}" class="boton-ver">
                        <i class="fas fa-folder-open"></i>
                        Ver Empleados
                    </a>

                    <a href="{{ route('employees.create') }}"
                       class="boton-agregar" title="Agregar empleado">
                        <i class="fas fa-plus"></i>
                    </a>
                </div>

            </div>

        </div>

    </div>

</div>

@endsection
