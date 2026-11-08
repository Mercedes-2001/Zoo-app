<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="rfc" class="form-label fw-bold fs-6">{{ __('RFC') }}</label>
            <input type="text" name="rfc" class="form-control @error('rfc') is-invalid @enderror" value="{{ old('rfc', $supplier?->rfc) }}" id="rfc" placeholder="RFC">
            {!! $errors->first('rfc', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nom_prov" class="form-label fw-bold fs-6">{{ __('Nombre') }}</label>
            <input type="text" name="nom_prov" class="form-control @error('nom_prov') is-invalid @enderror" value="{{ old('nom_prov', $supplier?->nom_prov) }}" id="nom_prov" placeholder="Nombre del Proveedor">
            {!! $errors->first('nom_prov', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tel_prov" class="form-label fw-bold fs-6">{{ __('Telefono') }}</label>
            <input type="text" name="tel_prov" class="form-control @error('tel_prov') is-invalid @enderror" value="{{ old('tel_prov', $supplier?->tel_prov) }}" id="tel_prov" placeholder="Telefefono del Proveedor">
            {!! $errors->first('tel_prov', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="correo_prov" class="form-label fw-bold fs-6">{{ __('Correo') }}</label>
            <input type="text" name="correo_prov" class="form-control @error('correo_prov') is-invalid @enderror" value="{{ old('correo_prov', $supplier?->correo_prov) }}" id="correo_prov" placeholder="Correo del Proveedor">
            {!! $errors->first('correo_prov', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="calle_prov" class="form-label fw-bold fs-6">{{ __('Calle') }}</label>
            <input type="text" name="calle_prov" class="form-control @error('calle_prov') is-invalid @enderror" value="{{ old('calle_prov', $supplier?->calle_prov) }}" id="calle_prov" placeholder="Calle del Proveedor">
            {!! $errors->first('calle_prov', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="col_prov" class="form-label fw-bold fs-6">{{ __('Colonia') }}</label>
            <input type="text" name="col_prov" class="form-control @error('col_prov') is-invalid @enderror" value="{{ old('col_prov', $supplier?->col_prov) }}" id="col_prov" placeholder="Colonia del Proveedor">
            {!! $errors->first('col_prov', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="cp_prov" class="form-label fw-bold fs-6">{{ __('C.P') }}</label>
            <input type="text" name="cp_prov" class="form-control @error('cp_prov') is-invalid @enderror" value="{{ old('cp_prov', $supplier?->cp_prov) }}" id="cp_prov" placeholder="Codigo postal del Proveedor">
            {!! $errors->first('cp_prov', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="numext_prov" class="form-label fw-bold fs-6">{{ __('# Exterior') }}</label>
            <input type="text" name="numext_prov" class="form-control @error('numext_prov') is-invalid @enderror" value="{{ old('numext_prov', $supplier?->numext_prov) }}" id="numext_prov" placeholder="Numero exterior del Proveedor">
            {!! $errors->first('numext_prov', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="numint_prov" class="form-label fw-bold fs-6">{{ __('# Interior') }}</label>
            <input type="text" name="numint_prov" class="form-control @error('numint_prov') is-invalid @enderror" value="{{ old('numint_prov', $supplier?->numint_prov) }}" id="numint_prov" placeholder="Numero interior del Proveedor">
            {!! $errors->first('numint_prov', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tipo_prov" class="form-label fw-bold fs-6">{{ __('Tipo Proveedor') }}</label>
            <input type="text" name="tipo_prov" class="form-control @error('tipo_prov') is-invalid @enderror" value="{{ old('tipo_prov', $supplier?->tipo_prov) }}" id="tipo_prov" placeholder="Tipo de Proveedor">
            {!! $errors->first('tipo_prov', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    
</div>