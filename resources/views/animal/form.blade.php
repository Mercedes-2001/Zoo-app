<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        @if(isset($animal) && $animal->exists)
            <div class="form-group mb-2 mb20">
                <label for="id_ani" class="form-label fw-bold fs-6">{{ __('ID Animal') }}</label>
                <input type="text" name="id_ani" class="form-control" value="{{ $animal->id_ani }}" id="id_ani" readonly>
            </div>
        @endif

        <div class="form-group mb-2 mb20">
            <label for="nombre_ani" class="form-label fw-bold fs-6">{{ __('Nombre Animal') }}</label>
            <input type="text" name="nombre_ani" class="form-control @error('nombre_ani') is-invalid @enderror" value="{{ old('nombre_ani', $animal?->nombre_ani) }}" id="nombre_ani" placeholder="Nombre Animal">
            {!! $errors->first('nombre_ani', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="edad_ani" class="form-label fw-bold fs-6">{{ __('Edad Animal (Años)') }}</label>
            <input type="text" name="edad_ani" class="form-control @error('edad_ani') is-invalid @enderror" value="{{ old('edad_ani', $animal?->edad_ani) }}" id="edad_ani" placeholder="Años">
            {!! $errors->first('edad_ani', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="peso_ani" class="form-label fw-bold fs-6">{{ __('Peso Animal (kg)') }}</label>
            <input type="text" name="peso_ani" class="form-control @error('peso_ani') is-invalid @enderror" value="{{ old('peso_ani', $animal?->peso_ani) }}" id="peso_ani" placeholder="(kg)">
            {!! $errors->first('peso_ani', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="altura" class="form-label fw-bold fs-6">{{ __('Altura Animal (Mts)') }}</label>
            <input type="text" name="altura" class="form-control @error('altura') is-invalid @enderror" value="{{ old('altura', $animal?->altura) }}" id="altura" placeholder="(Mts)">
            {!! $errors->first('altura', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="sexo_ani" class="form-label fw-bold fs-6">{{ __('Sexo Animal') }}</label>
            <select name="sexo_ani" id="sexo_ani" class="form-select @error('sexo_ani') is-invalid @enderror">
                <option value="">-- Sexo --</option>
                <option value="Hembra" {{ old('sexo_ani', $animal?->sexo_ani) == 'Hembra' ? 'selected' : '' }}>Hembra</option>
                <option value="Macho" {{ old('sexo_ani', $animal?->sexo_ani) == 'Macho' ? 'selected' : '' }}>Macho</option>
                <option value="Macho" {{ old('sexo_ani', $animal?->sexo_ani) == 'Macho' ? 'selected' : '' }}>Indistinto</option>
            </select>
            {!! $errors->first('sexo_ani', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_nac" class="form-label fw-bold fs-6">{{ __('Fecha de Nacimiento') }}</label>
            <input type="date" name="fecha_nac" class="form-control @error('fecha_nac') is-invalid @enderror" value="{{ old('fecha_nac', $animal?->fecha_nac) }}" max="{{ now()->toDateString() }}" id="fecha_nac">

            {!! $errors->first('fecha_nac', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="descripcion_ani" class="form-label fw-bold fs-6">{{ __('Descripcion Animal') }}</label>
            <input type="text" name="descripcion_ani" class="form-control @error('descripcion_ani') is-invalid @enderror" value="{{ old('descripcion_ani', $animal?->descripcion_ani) }}" id="descripcion_ani" placeholder="Descripcion Animal">
            {!! $errors->first('descripcion_ani', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="lugar_origen" class="form-label fw-bold fs-6">{{ __('Lugar de Origen') }}</label>
            <input type="text" name="lugar_origen" class="form-control @error('lugar_origen') is-invalid @enderror" value="{{ old('lugar_origen', $animal?->lugar_origen) }}" id="lugar_origen" placeholder="Lugar de Origen">
            {!! $errors->first('lugar_origen', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        
        <div class="form-group mb-2 mb20">
            <label for="fk_especie" class="form-label fw-bold fs-6">{{ __('Especie') }}</label>
            <select name="fk_especie" id="fk_especie" class="form-select @error('fk_especie') is-invalid @enderror">
                <option value="">-- Selecciona una especie --</option>
                @foreach($species as $specie)
                    <option value="{{ $specie->id_esp }}" {{ old('fk_especie', $animal?->fk_especie) == $specie->id_esp ? 'selected' : '' }}>
                            {{ $specie->id_esp }} - {{ $specie->nom_comun }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('fk_especie', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="fk_zona" class="form-label fw-bold fs-6">{{ __('ID Zona') }}</label>
            <select name="fk_zona" id="fk_zona" class="form-select @error('fk_zona') is-invalid @enderror">
                <option value="">-- Selecciona ID Zona --</option>
                @foreach($zones as $zone)
                    <option value="{{ $zone->id_zona }}" data-nombre="{{ $zone->nombre_zona }}"
                        {{ old('fk_zona', $animal?->fk_zona) == $zone->id_zona ? 'selected' : '' }}>
                        {{ $zone->id_zona }} - {{ $zone->nombre_zona }}
                    </option>
            @endforeach
            </select>
            {!! $errors->first('fk_zona', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        
        <div class="form-group mb-2 mb20">
            <label for="fk_nombre_zona" class="form-label fw-bold fs-6">{{ __('Nombre de Zona') }}</label>
            <input type="text" name="fk_nombre_zona" class="form-control @error('fk_nombre_zona') is-invalid @enderror" 
                id="fk_nombre_zona" value="{{ old('fk_nombre_zona', $animal?->fk_nombre_zona) }}" readonly>
            {!! $errors->first('fk_nombre_zona', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        

    </div>
    


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const zonaSelect = document.getElementById('fk_zona');
            const nombreZonaInput = document.getElementById('fk_nombre_zona');
    
            zonaSelect.addEventListener('change', function () {
                const selectedOption = zonaSelect.options[zonaSelect.selectedIndex];
                const nombre = selectedOption.getAttribute('data-nombre');
                nombreZonaInput.value = nombre || '';
            });
    
            // Asignar el valor inicial si ya hay uno seleccionado
            const selected = zonaSelect.options[zonaSelect.selectedIndex];
            if (selected) {
                nombreZonaInput.value = selected.getAttribute('data-nombre') || '';
            }
        });
    </script>
     
</div>