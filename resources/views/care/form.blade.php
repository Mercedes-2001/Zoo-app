<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        @if(isset($care) && $care->exists)
            <div class="form-group mb-2 mb20">
                <label for="id_cuidados" class="form-label fw-bold fs-6">{{ __('ID Cuidado') }}</label>
                <input type="text" name="id_cuidados" class="form-control" value="{{ $care->id_cuidados }}" id="id_cuidados" readonly>
            </div>
        @endif

        <div class="form-group mb-2 mb20">
            <label for="fecha_inicio_cuidado" class="form-label fw-bold fs-6">{{ __('Fecha de Inicio') }}</label>
            <input type="date" name="fecha_inicio_cuidado" class="form-control @error('fecha_inicio_cuidado') is-invalid @enderror" value="{{ old('fecha_inicio_cuidado', $care?->fecha_inicio_cuidado) }}" min="{{ now()->toDateString() }}" id="fecha_inicio_cuidado">
            {!! $errors->first('fecha_inicio_cuidado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="hora_cuidado" class="form-label fw-bold fs-6">{{ __('Hora de Cuidado (HH:MM)') }}</label>
            <input type="text" name="hora_cuidado" class="form-control @error('hora_cuidado') is-invalid @enderror" value="{{ old('hora_cuidado', $care?->hora_cuidado) }}" id="hora_cuidado" placeholder="HH:MM ó HH:MM:SS">
            {!! $errors->first('hora_cuidado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tratamiento" class="form-label fw-bold fs-6">{{ __('Tratamiento') }}</label>
            <input type="text" name="tratamiento" class="form-control @error('tratamiento') is-invalid @enderror" value="{{ old('tratamiento', $care?->tratamiento) }}" id="tratamiento" placeholder="Tratamiento">
            {!! $errors->first('tratamiento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="cantidad_alimento" class="form-label fw-bold fs-6">{{ __('Cantidad de Alimento') }}</label>
            <input type="text" name="cantidad_alimento" class="form-control @error('cantidad_alimento') is-invalid @enderror" value="{{ old('cantidad_alimento', $care?->cantidad_alimento) }}" id="cantidad_alimento" placeholder="Cantidad Alimento">
            {!! $errors->first('cantidad_alimento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="fk_alimento" class="form-label fw-bold fs-6">{{ __('Alimento') }}</label>
            <select name="fk_alimento" id='fk_alimento' class="form-select @error('fk_alimento') is-invalid @enderror">
             <option value="">-- Selecciona el ID del Alimento --</option>
             @foreach($foods as $food)
                <option value="{{ $food->cod_alim }}" {{ old('fk_alimento', $care?->fk_alimento)== $food->cod_alim ? 'selected' : ''}}>
                    {{$food->cod_alim}}-{{$food->nom_alim}}
                </option>
                 @endforeach
            </select>       
            {!! $errors->first('fk_alimento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="fk_empleado" class="form-label fw-bold fs-6">{{ __('Empleado') }}</label>
            <select name="fk_empleado" id="fk_empleado" class="form-select @error('fk_empleado') is-invalid @enderror">
                <option value="">-- Selecciona un Empleado --</option>
                @foreach($employees as $employee)
                    <option value="{{ $employee->num_trabajador }}" {{ old('fk_empleado', $care?->fk_empleado) == $employee->num_trabajador ? 'selected' : '' }}>
                        {{ $employee->num_trabajador }} - {{ $employee->nom }} {{ $employee->apat }} {{ $employee->apmat }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('fk_empleado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="fk_animal" class="form-label fw-bold fs-6">{{ __('Animal') }}</label>
            <select name="fk_animal" id="fk_animal" class="form-select @error('fk_animal') is-invalid @enderror">
             <option value="">-- Selecciona el ID del Animal --</option>
             @foreach($animals as $animal)
                <option value="{{ $animal->id_ani }}" {{ old('fk_animal', $care?->fk_animal)== $animal->id_ani ? 'selected' : ''}}>
                    {{$animal->id_ani}}-{{$animal->nombre_ani}} ({{ $animal->species->nom_comun ?? 'Sin especie'}})
                </option>
                 @endforeach
            </select> 
            {!! $errors->first('fk_animal', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>

</div>