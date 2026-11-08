<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        @if(isset($species) && $species->exists)
            <div class="form-group mb-2 mb20">
                <label for="id_esp" class="form-label fw-bold fs-6">{{ __('ID Especie') }}</label>
                <input type="text" name="id_esp" class="form-control" value="{{ $species->id_esp }}" id="id_esp" readonly>
            </div>
        @endif

        <div class="form-group mb-2 mb20">
            <label for="nom_cientf" class="form-label fw-bold fs-6">{{ __('Nombre Científico') }}</label>
            <input type="text" name="nom_cientf" class="form-control @error('nom_cientf') is-invalid @enderror" value="{{ old('nom_cientf', $species?->nom_cientf) }}" id="nom_cientf" placeholder="Nombre Científico">
            {!! $errors->first('nom_cientf', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nom_comun" class="form-label fw-bold fs-6">{{ __('Nombre Común') }}</label>
            <input type="text" name="nom_comun" class="form-control @error('nom_comun') is-invalid @enderror" value="{{ old('nom_comun', $species?->nom_comun) }}" id="nom_comun" placeholder="Nombre Común">
            {!! $errors->first('nom_comun', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tipo_nac" class="form-label fw-bold fs-6">{{ __('Tipo de Nacimiento') }}</label>
            <input type="text" name="tipo_nac" class="form-control @error('tipo_nac') is-invalid @enderror" value="{{ old('tipo_nac', $species?->tipo_nac) }}" id="tipo_nac" placeholder="Tipo de Nacimiento">
            {!! $errors->first('tipo_nac', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="familia" class="form-label fw-bold fs-6">{{ __('Familia') }}</label>
            <input type="text" name="familia" class="form-control @error('familia') is-invalid @enderror" value="{{ old('familia', $species?->familia) }}" id="familia" placeholder="Familia">
            {!! $errors->first('familia', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    
    
</div>