
@extends('layouts.app')

@section('template_title')
    {{ __('Crear Turno') }}
@endsection

@section('content')

<section class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow rounded-4"
                style="border: none; border-radius: 18px; overflow: hidden;">

                <div class="card-header text-white text-center rounded-top-4"
                    style="background-color: #2e5d20; padding: 1rem;">
                    <h4 class="mb-0">{{ __('Crear Turno') }}</h4>
                </div>

                <form method="POST" action="{{ route('turns.store') }}"
                    role="form" enctype="multipart/form-data"
                    style="color: #2e5d20;">
                    @csrf

                    @include('turn.form')

                    <div class="card-footer d-flex justify-content-center gap-3"
                        style="background-color: white; border-top: 1px solid #ffe2a5; padding: 1rem;">

                        <button type="submit" class="btn px-4"
                            style="background-color: #2e5d20; color: white; border: none; border-radius: 8px; font-weight: 600;">
                            <i class="fas fa-save"></i> Guardar
                        </button>

                        <a href="{{ route('turns.index') }}" class="btn px-4"
                            style="background-color: #ffa24b; color: white; border: none; border-radius: 8px; font-weight: 600; text-decoration: none;">
                            <i class="fas fa-times-circle"></i> Cancelar
                        </a>

                    </div>

                </form>
            </div>

        </div>
    </div>
</section>
@endsection
