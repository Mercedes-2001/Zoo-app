<form id="form-employee"
      method="POST"
      action="{{ $employee->exists
                  ? route('employees.update', $employee)   {{-- editar --}}
                  : route('employees.store.todo') }}">      {{-- crear --}}
    @csrf
    @if ($employee->exists)
        @method('PUT')
    @endif

    <div class="row padding-1 p-1">
        <div class="col-md-12">

            <div class="form-group mb-2 mb20">
                <label for="nom" class="form-label">{{ __('Nombre') }}</label>
                <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom', $employee?->nom) }}" id="nom" placeholder="Ingrese el nombre">
                {!! $errors->first('nom', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
            <div class="form-group mb-2 mb20">
                <label for="nom_s" class="form-label">{{ __('Segundo Nombre (opcional)') }}</label>
                <input type="text" name="nom_s" class="form-control @error('nom_s') is-invalid @enderror" value="{{ old('nom_s', $employee?->nom_s) }}" id="nom_s" placeholder="Ingrese el segundo nombre">
                {!! $errors->first('nom_s', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
            <div class="form-group mb-2 mb20">
                <label for="apat" class="form-label">{{ __('Apellido Paterno') }}</label>
                <input type="text" name="apat" class="form-control @error('apat') is-invalid @enderror" value="{{ old('apat', $employee?->apat) }}" id="apat" placeholder="Ingrese el apellido paterno">
                {!! $errors->first('apat', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
            <div class="form-group mb-2 mb20">
                <label for="apmat" class="form-label">{{ __('Apellido Materno') }}</label>
                <input type="text" name="apmat" class="form-control @error('apmat') is-invalid @enderror" value="{{ old('apmat', $employee?->apmat) }}" id="apmat" placeholder="Ingrese el apellido materno">
                {!! $errors->first('apmat', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
            <div class="form-group mb-2 mb20">
                <label for="edad" class="form-label">{{ __('Edad') }}</label>
                <input type="text" name="edad" class="form-control @error('edad') is-invalid @enderror" value="{{ old('edad', $employee?->edad) }}" id="edad" placeholder="Ingrese la edad">
                {!! $errors->first('edad', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
            <div class="form-group mb-2 mb20">
                <label for="sexo" class="form-label">{{ __('Sexo') }}</label>
                <select class="form-control @error('sexo') is-invalid @enderror" id="sexo" name="sexo" required>
                    <option value="" disabled selected>Seleccione el sexo</option>
                    @foreach ($sexos as $valor => $etiqueta)
                        <option value="{{ $valor }}" {{ old('sexo', $employee?->sexo) == $valor ? 'selected' : '' }}>{{ $etiqueta }}</option>
                    @endforeach
                </select>
                {!! $errors->first('sexo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
            <div class="form-group mb-2 mb20">
                <label for="tipo_em" class="form-label">{{ __('Tipo de Empleado') }}</label>
                <select class="form-control @error('tipo_em') is-invalid @enderror" id="tipo_em" name="tipo_em" required>
                    <option value="" disabled selected>Seleccione el tipo de empleado</option>
                    @foreach ($tiposEmpleado as $valor => $etiqueta)
                        <option value="{{ $valor }}" {{ old('tipo_em', $employee?->tipo_em) == $valor ? 'selected' : '' }}>{{ $etiqueta }}</option>
                    @endforeach
                </select>
                {!! $errors->first('tipo_em', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
            <div class="form-group mb-2 mb20">
                <label for="fk_turno" class="form-label">{{ __('Turno') }}</label>
                <select class="form-control @error('fk_turno') is-invalid @enderror" id="fk_turno" name="fk_turno" required>
                    <option value="" disabled selected>Seleccione el turno</option>
                    @foreach ($turnos as $id => $valor)
                        <option value="{{ $id }}" {{ old('fk_turno', $employee?->fk_turno) == $id ? 'selected' : '' }}>{{ $valor }}</option>
                    @endforeach
                </select>
                {!! $errors->first('fk_turno', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
            <div class="form-group mb-2 mb20">
                <label for="fk_jefe" class="form-label">{{ __('Jefe (Opcional)') }}</label>
                <select class="form-control @error('fk_jefe') is-invalid @enderror" id="fk_jefe" name="fk_jefe">
                    <option value="" disabled selected>Seleccione el jefe (Opcional)</option>
                    @foreach ($jefes as $id => $valor)
                        <option value="{{ $id }}" {{ old('fk_jefe', $employee?->fk_jefe) == $id ? 'selected' : '' }}>{{ $valor }}</option>
                    @endforeach
                </select>
                {!! $errors->first('fk_jefe', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>

            <input type="hidden" name="tipo_guardado" id="tipo_guardado" value="empleado">

            <div class="col-md-12 mt20 mt-2">
                <button type="submit" class="btn btn-primary">
                Guardar solo Empleado
            </button>
            </div>

            <hr class="mt-3 mb-3">

            <button type="button" id="desplegar-datos" class="btn btn-secondary">Desplegar Datos Adicionales</button>

            <div id="formulario-datos" style="display: none; margin-top: 20px; border: 1px solid #ccc; padding: 15px;">
                <h2>Datos Adicionales del Empleado</h2>

                <div class="form-group mb-2 mb20">
                    <label for="tel" class="form-label">{{ __('Teléfono') }}</label>
                    <input type="text" name="datos[tel]" class="form-control @error('datos.tel') is-invalid @enderror" value="{{ old('datos.tel', $data?->tel) }}" id="tel" placeholder="Ingrese el número de teléfono">
                    {!! $errors->first('datos.tel', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
                <div class="form-group mb-2 mb20">
                    <label for="correo_elec" class="form-label">{{ __('Correo Electrónico') }}</label>
                    <input type="text" name="datos[correo_elec]" class="form-control @error('datos.correo_elec') is-invalid @enderror" value="{{ old('datos.correo_elec', $data?->correo_elec) }}" id="correo_elec" placeholder="Ingrese el correo electónico">
                    {!! $errors->first('datos.correo_elec', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
                <div class="form-group mb-2 mb20">
                    <label for="calle" class="form-label">{{ __('Calle') }}</label>
                    <input type="text" name="datos[calle]" class="form-control @error('datos.calle') is-invalid @enderror" value="{{ old('datos.calle', $data?->calle) }}" id="calle" placeholder="Ingrese la calle">
                    {!! $errors->first('datos.calle', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
                <div class="form-group mb-2 mb20">
                    <label for="col" class="form-label">{{ __('Colonia') }}</label>
                    <input type="text" name="datos[col]" class="form-control @error('datos.col') is-invalid @enderror" value="{{ old('datos.col', $data?->col) }}" id="col" placeholder="Ingrese la colonia">
                    {!! $errors->first('datos.col', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
                <div class="form-group mb-2 mb20">
                    <label for="cp" class="form-label">{{ __('Código Postal') }}</label>
                    <input type="text" name="datos[cp]" class="form-control @error('datos.cp') is-invalid @enderror" value="{{ old('datos.cp', $data?->cp) }}" id="cp" placeholder="Ingrese el código postal">
                    {!! $errors->first('datos.cp', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
                <div class="form-group mb-2 mb20">
                    <label for="n_i" class="form-label">{{ _('Número Interior (Opcional)') }}</label>
                    <input type="text" name="datos[n_I]" class="form-control @error('datos.n_I') is-invalid @enderror" value="{{ old('datos.n_I', $data?->n_I) }}" id="n__i" placeholder="Número interior del domicilio">
                    {!! $errors->first('datos.n_I', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
                <div class="form-group mb-2 mb20">
                    <label for="n_e" class="form-label">{{ _('Número Exterior') }}</label>
                    <input type="text" name="datos[n_E]" class="form-control @error('datos.n_E') is-invalid @enderror" value="{{ old('datos.n_E', $data?->n_E) }}" id="n__e" placeholder="Número exterior del domicilio">
                    {!! $errors->first('datos.n_E', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
                <div class="form-group mb-2 mb20">
                    <label for="estado" class="form-label">{{ __('Estado') }}</label>
                    <input type="text" name="datos[estado]" class="form-control @error('datos.estado') is-invalid @enderror" value="{{ old('datos.estado', $data?->estado) }}" id="estado" placeholder="Ingrese el estado">
                    {!! $errors->first('datos.estado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>

                <div id="mensaje-error" style="color: #b30000; background-color: #ffe6e6; padding: 10px; margin-bottom: 15px; border-radius: 5px; display: none;"></div>
                <button type="button" id="guardar-todo" class="btn btn-success">{{ __('Guardar Empleado y Datos') }}</button>
            </div>

        </div>
    </div>
</form>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const desplegarBtn   = document.getElementById('desplegar-datos');
    const divDatos       = document.getElementById('formulario-datos');
    const guardarTodoBtn = document.getElementById('guardar-todo');
    const form           = document.getElementById('form-employee');
    const tipoGuardado   = document.getElementById('tipo_guardado');

       /* ── TOGGLE de la sección de datos ───────────────────────── */
    desplegarBtn.addEventListener('click', () => {
        const visible = divDatos.style.display === 'block';

        /* alternar visibilidad  */
        divDatos.style.display   = visible ? 'none'  : 'block';
        /* alternar texto del botón (opcional) */
        desplegarBtn.textContent = visible ? 'Desplegar Datos Adicionales'
                                           : 'Ocultar Datos Adicionales';

        /* habilitar / deshabilitar campos según visibilidad */
        divDatos.querySelectorAll('input,select,textarea')
                .forEach(el => el.disabled = visible);
    });

    /* ── Validar y enviar empleado + datos ─────────────────────────────────── */
    guardarTodoBtn.addEventListener('click', () => {

        /* 1️⃣  Campos obligatorios del EMPLEADO */
        const camposEmpleado = [
            'nom', 'apat', 'apmat', 'edad',
            'sexo', 'tipo_em', 'fk_turno'
        ];

        /* 2️⃣  Campos obligatorios de DATOS ADICIONALES */
        const camposDatos = [
            'tel', 'correo_elec', 'calle', 'col',
            'cp', 'n_E', 'estado'
        ];

        let valido = true;

        /* ── Verificar campos de EMPLEADO ── */
        camposEmpleado.forEach(nombre => {
            const input = document.querySelector(`[name="${nombre}"]`);
            if (!input || input.value.trim() === '') {
                valido = false;
                input.classList.add('is-invalid');
            } else {
                input.classList.remove('is-invalid');
            }
        });

        /* ── Verificar campos de DATOS ── */
        camposDatos.forEach(nombre => {
            const input = document.querySelector(`[name="datos[${nombre}]"]`);
            if (!input || input.value.trim() === '') {
                valido = false;
                input.classList.add('is-invalid');
            } else {
                input.classList.remove('is-invalid');
            }
        });

        if (!valido) {
            /* Los mensajes de error individuales ya los maneja Laravel
               con invalid-feedback; sólo evitamos enviar el formulario. */
            return;
        }

        // Todo OK ➜ enviamos
        tipoGuardado.value = 'empleado_y_datos';
        form.submit();
    });
});
</script>
