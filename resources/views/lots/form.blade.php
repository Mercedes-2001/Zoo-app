<div class="row padding-1 p-1">
    <div class="col-md-12">
        

        @if(isset($lot) && $lot->exists)
            <div class="form-group mb-2 mb20">
                <label for="cod_lote" class="form-label fw-bold fs-6">{{ __('Codido de Lote') }}</label>
                <input type="text" name="cod_lote" class="form-control" value="{{  $lot->cod_lote }}" id="cod_lote" readonly>
                {!! $errors->first('cod_lote', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        @endif

        <div class="form-group mb-2 mb20">
            <label for="fecha_caduc" class="form-label fw-bold fs-6">{{ __('Fecha de Caducidad') }}</label>
            <input type="date" name="fecha_caduc" class="form-control @error('fecha_caduc') is-invalid @enderror" value="{{ old('fecha_caduc', $lot?->fecha_caduc) }}" min="{{ now()->toDateString() }}" id="fecha_caduc" >
            {!! $errors->first('fecha_caduc', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="porcion" class="form-label fw-bold fs-6">{{ __('Porcion (kg)') }}</label>
            <input type="text" name="porcion" class="form-control @error('porcion') is-invalid @enderror" value="{{ old('porcion', $lot?->porcion) }}" id="porcion" placeholder="Porcion">
            {!! $errors->first('porcion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_compra" class="form-label fw-bold fs-6">{{ __('Fecha de Compra') }}</label>
            <input type="date" name="fecha_compra" class="form-control @error('fecha_compra') is-invalid @enderror" value="{{ old('fecha_compra', $lot?->fecha_compra) }}" max="{{ now()->toDateString() }}" id="fecha_compra">
            {!! $errors->first('fecha_compra', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fk_alimento" class="form-label fw-bold fs-6">{{ __('Alimento') }}</label>
            <select name="fk_alimento" class="form-control @error('fk_alimento') is-invalid @enderror">
                <option value="">-- Selecciona ID Alimento --</option>
                @foreach($foods as $food)
                    <option value="{{ $food->cod_alim }}" data-nombre="{{ $food->nom_alim }}"
                        {{ old('fk_alimento', $lot?->fk_alimento) == $food->cod_alim ? 'selected' : '' }}>
                        {{ $food->cod_alim }} - {{ $food->nom_alim }}
                    </option>
                @endforeach
                </select>
            {!! $errors->first('fk_alimento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    
</div>