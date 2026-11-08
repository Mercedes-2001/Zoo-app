<div class="row padding-1 p-1">
    <div class="col-md-12">

        @if(isset($food) && $food->exists)
        <div class="form-group mb-2 mb20">
            <label for="cod_alim" class="form-label fw-bold fs-6">{{ __('Codigo Alimento') }}</label>
            <input type="text" name="cod_alim" class="form-control" value="{{  $food->cod_alim}}" id="cod_alim" readonly>
        </div>
        @endif


        <div class="form-group mb-2 mb20">
            <label for="nom_alim" class="form-label fw-bold fs-6">{{ __('Nombre Alimento') }}</label>
            <input type="text" name="nom_alim" class="form-control @error('nom_alim') is-invalid @enderror" value="{{ old('nom_alim', $food?->nom_alim) }}" id="nom_alim" placeholder="Nombre del Alimento">
            {!! $errors->first('nom_alim', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="peso_alim" class="form-label fw-bold fs-6">{{ __('Peso Alimento (Kg)') }}</label>
            <input type="text" name="peso_alim" class="form-control @error('peso_alim') is-invalid @enderror" value="{{ old('peso_alim', $food?->peso_alim) }}" id="peso_alim" placeholder="Peso del Alimento">
            {!! $errors->first('peso_alim', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="contenido_alim" class="form-label fw-bold fs-6">{{ __('Contenido Alimento') }}</label>
            <input type="text" name="contenido_alim" class="form-control @error('contenido_alim') is-invalid @enderror" value="{{ old('contenido_alim', $food?->contenido_alim) }}" id="contenido_alim" placeholder="Contenido del Alimento">
            {!! $errors->first('contenido_alim', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="cant_total" class="form-label fw-bold fs-6">{{ __('Cantidad Total (Kg)') }}</label>
            <input type="text" name="cant_total" class="form-control @error('cant_total') is-invalid @enderror" value="{{ old('cant_total', $food?->cant_total) }}" id="cant_total" placeholder="Cantidad Total">
            {!! $errors->first('cant_total', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="costo" class="form-label fw-bold fs-6">{{ __('Costo ($)') }}</label>
            <input type="text" name="costo" class="form-control @error('costo') is-invalid @enderror" value="{{ old('costo', $food?->costo) }}" id="costo" placeholder="$">
            {!! $errors->first('costo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="fk_prov" class="form-label fw-bold fs-6">{{ __('Proveedor') }}</label>
            <select name="fk_prov" id="fk_prov" class="form-control @error('fk_prov') is-invalid @enderror">
                <option value="">-- Selecciona un proveedor --</option>
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->rfc }}" data.nombre="{{ $supplier ->nom_prov }}"
                        {{ old('fk_prov', $food->fk_prov)==$supplier->rfc ? 'selected' : ''}}>
                        {{ $supplier->rfc }} - {{$supplier->nom_prov}}
                    </option>
            @endforeach
            </select>
            {!! $errors->first('fk_prov', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    
</div>