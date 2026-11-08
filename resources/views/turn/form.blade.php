<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        @if(isset($turn) && $turn->exists)
        <div class="form-group mb-2 mb20">
            <label for="cod_turno" class="form-label fw-bold fs-6">{{ __('Código Turno') }}</label>
            <input type="text" name="cod_turno" class="form-control" value="{{$turn->cod_turno}}" id="cod_turno" readonly>
        </div>
        @endif

        <div class="form-group mb-2 mb20">
            <label for="descripcion" class="form-label fw-bold fs-6">{{ __('Descripcion') }}</label>
            <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" value="{{ old('descripcion', $turn?->descripcion) }}" id="descripcion" placeholder="Descripcion">
            {!! $errors->first('descripcion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="hora_inicio" class="form-label fw-bold fs-6">{{ __('Hora de Inicio') }}</label>
            <input type="text" name="hora_inicio" class="form-control @error('hora_inicio') is-invalid @enderror" value="{{ old('hora_inicio', $turn?->hora_inicio) }}" id="hora_inicio" placeholder="Hora Inicio">
            {!! $errors->first('hora_inicio', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="hora_salida" class="form-label fw-bold fs-6">{{ __('Hora de Salida') }}</label>
            <input type="text" name="hora_salida" class="form-control @error('hora_salida') is-invalid @enderror" value="{{ old('hora_salida', $turn?->hora_salida) }}" id="hora_salida" placeholder="Hora Salida">
            {!! $errors->first('hora_salida', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    
</div>