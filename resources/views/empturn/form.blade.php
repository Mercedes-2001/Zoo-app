<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        @if(isset($empturn) && $empturn->exists)
            <div class="form-group mb-2 mb20">
                <label for="cod_empturn" class="form-label fw-bold fs-">{{ __('Codigo Dato de Turno') }}</label>
                <input type="text" name="cod_empturn" class="form-control" value="{{  $empturn->cod_empturn }}" id="cod_empturn" readonly>
            </div>
        @endif

        <div class="form-group mb-2 mb20">
            <label for="fk_turno" class="form-label fw-bold fs-">{{ __('Codigo Turno') }}</label>
            <select name="fk_turno" id="fk_turno" class="form-select @error('fk_turno') is-invalid @enderror">
                <option value="">-- Selecciona un Turno --</option>
                @foreach($turns as $turn)
                <option value="{{ $turn->cod_turno }}" {{ old('fk_turno', $empturn?->fk_turno) == $turn->cod_turno ? 'selected' : '' }}>
                            {{ $turn->cod_turno }} - {{ $turn->descripcion }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('fk_turno', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="fk_empleado" class="form-label fw-bold fs-">{{ __('Empleado') }}</label>
            <select name="fk_empleado" id="fk_empleado" class="form-select @error('fk_empleado') is-invalid @enderror">
               <option value="">-- Selecciona un Empleado --</option>
                @foreach($employees as $employee)
                    <option value="{{ $employee->num_trabajador }}" {{ old('fk_empleado', $empturn?->fk_empleado) == $employee->num_trabajador ? 'selected' : '' }}>
                            {{ $employee->num_trabajador }} - {{ $employee->nom }}
                    </option>
                @endforeach
            </select> 
            {!! $errors->first('fk_empleado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="horas_trabajadas" class="form-label fw-bold fs-">{{ __('Horas Trabajadas') }}</label>
            <input type="text" name="horas_trabajadas" class="form-control @error('horas_trabajadas') is-invalid @enderror" value="{{ old('horas_trabajadas', $empturn?->horas_trabajadas) }}" id="horas_trabajadas" placeholder="Horas Trabajadas">
            {!! $errors->first('horas_trabajadas', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="motivo" class="form-label fw-bold fs-">{{ __('Motivo') }}</label>
            <input type="text" name="motivo" class="form-control @error('motivo') is-invalid @enderror" value="{{ old('motivo', $empturn?->motivo) }}" id="motivo" placeholder="Motivo">
            {!! $errors->first('motivo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
   
</div>