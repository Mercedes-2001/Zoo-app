@extends('layouts.app')

@section('template_title')
    {{ $data->name ?? __('Show') . " " . __('Data') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Data</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('data.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Num Trabajador:</strong>
                                    {{ $data->num_trabajador }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tel:</strong>
                                    {{ $data->tel }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Correo Elec:</strong>
                                    {{ $data->correo_elec }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Calle:</strong>
                                    {{ $data->calle }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Col:</strong>
                                    {{ $data->col }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Cp:</strong>
                                    {{ $data->cp }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>N I:</strong>
                                    {{ $data->n_I }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>N E:</strong>
                                    {{ $data->n_E }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Estado:</strong>
                                    {{ $data->estado }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
