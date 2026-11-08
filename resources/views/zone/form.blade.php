<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        @if(isset($zone) && $zone->exists)
        <div class="form-group mb-2 mb20">
            <label for="id_zona" class="form-label fw-bold fs-6">{{ __('Id Zona') }}</label>
            <input type="text" name="id_zona" class="form-control" value="{{ old('id_zona', $zone?->id_zona) }}" id="id_zona" readonly>

        </div>
        @endif

        <div class="form-group mb-2 mb20">
            <label for="nombre_zona" class="form-label fw-bold fs-6">{{ __('Nombre Zona') }}</label>
            <input type="text" name="nombre_zona" class="form-control @error('nombre_zona') is-invalid @enderror" value="{{ old('nombre_zona', $zone?->nombre_zona) }}" id="nombre_zona" placeholder="Nombre Zona">
            {!! $errors->first('nombre_zona', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="ubicacion" class="form-label fw-bold fs-6">{{ __('Ubicacion') }}</label>
            <input type="text" name="ubicacion" class="form-control @error('ubicacion') is-invalid @enderror" value="{{ old('ubicacion', $zone?->ubicacion) }}" id="ubicacion" placeholder="Ubicacion">
            {!! $errors->first('ubicacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="capacidad" class="form-label fw-bold fs-6">{{ __('Capacidad') }}</label>
            <input type="text" name="capacidad" class="form-control @error('capacidad') is-invalid @enderror" value="{{ old('capacidad', $zone?->capacidad) }}" id="capacidad" placeholder="Solo número (ej: 5)">
            {!! $errors->first('capacidad', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tipo_zona" class="form-label fw-bold fs-6">{{ __('Tipo Zona') }}</label>
            <input type="text" name="tipo_zona" class="form-control @error('tipo_zona') is-invalid @enderror" value="{{ old('tipo_zona', $zone?->tipo_zona) }}" id="tipo_zona" placeholder="Tipo Zona">
            {!! $errors->first('tipo_zona', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="clima" class="form-label fw-bold fs-6">{{ __('Clima') }}</label>
            <input type="text" name="clima" class="form-control @error('clima') is-invalid @enderror" value="{{ old('clima', $zone?->clima) }}" id="clima" placeholder="Clima">
            {!! $errors->first('clima', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="status" class="form-label fw-bold fs-6">{{ __('Estado') }}</label>
            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                <option value="">-- Selecciona una opcion --</option>
                <option value="ACTIVA" {{ old('status', $zone?->status) == 'ACTIVA' ? 'selected' : '' }}>ACTIVA</option>
                <option value="INACTIVA" {{ old('status', $zone?->status) == 'INACTIVA' ? 'selected' : '' }}>INACTIVA</option>
            </select>
            {!! $errors->first('status', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
</div>