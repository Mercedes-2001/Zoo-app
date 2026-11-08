<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="num_trabajador" class="form-label fw-bold fs-6">{{ __('Numero Trabajador') }}</label>
            <select name="num_trabajador" id="num_trabajador" class="form-select @error('num_trabajador') is-invalid @enderror">
                <option value="">-- Selecciona un Empleado --</option>
                @foreach($employees as $employee)         
                    <option value="{{ $employee->num_trabajador }}" {{ old('num_trabajador', $data?->num_trabajador) == $employee->num_trabajador ? 'selected' : '' }}>
                        {{ $employee->num_trabajador }} - {{ $employee->nom }} {{ $employee->apat }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('num_trabajador', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        
        <div class="form-group mb-2 mb20">
            <label for="tel" class="form-label fw-bold fs-6">{{ __('Tel') }}</label>
            <input type="text" name="tel" class="form-control @error('tel') is-invalid @enderror" value="{{ old('Telefono', $data?->tel) }}" id="tel" placeholder="Tel">
            {!! $errors->first('tel', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="correo_elec" class="form-label fw-bold fs-6">{{ __('Correo Electrónico') }}</label>
            <input type="text" name="correo_elec" class="form-control @error('correo_elec') is-invalid @enderror" value="{{ old('correo_elec', $data?->correo_elec) }}" id="correo_elec" placeholder="Correo Elec">
            {!! $errors->first('correo_elec', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="calle" class="form-label fw-bold fs-6">{{ __('Calle') }}</label>
            <input type="text" name="calle" class="form-control @error('calle') is-invalid @enderror" value="{{ old('calle', $data?->calle) }}" id="calle" placeholder="Calle">
            {!! $errors->first('calle', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="col" class="form-label fw-bold fs-6">{{ __('Colonia') }}</label>
            <input type="text" name="col" class="form-control @error('col') is-invalid @enderror" value="{{ old('col', $data?->col) }}" id="col" placeholder="Col">
            {!! $errors->first('col', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="cp" class="form-label fw-bold fs-6">{{ __('Codigo Postal') }}</label>
            <input type="text" name="cp" class="form-control @error('cp') is-invalid @enderror" value="{{ old('cp', $data?->cp) }}" id="cp" placeholder="Cp">
            {!! $errors->first('cp', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="n__i" class="form-label fw-bold fs-6">{{ __('# Interior') }}</label>
            <input type="text" name="n_I" class="form-control @error('n_I') is-invalid @enderror" value="{{ old('n_I', $data?->n_I) }}" id="n__i" placeholder="N I">
            {!! $errors->first('n_I', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="n__e" class="form-label fw-bold fs-6">{{ __('# Exterior') }}</label>
            <input type="text" name="n_E" class="form-control @error('n_E') is-invalid @enderror" value="{{ old('n_E', $data?->n_E) }}" id="n__e" placeholder="N E">
            {!! $errors->first('n_E', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="estado" class="form-label fw-bold fs-6">{{ __('Estado') }}</label>
            <input type="text" name="estado" class="form-control @error('estado') is-invalid @enderror" value="{{ old('estado', $data?->estado) }}" id="estado" placeholder="Estado">
            {!! $errors->first('estado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-12 text-center mt-4">
        <button type="submit" class="btn px-5" style="background-color: rgb(51, 134, 182)">
        <i class="fas fa-save me-2"></i> {{ __('Guardar') }}</button>
    </div>
</div>