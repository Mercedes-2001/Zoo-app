<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CareRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'fecha_inicio_cuidado' => 'required|date',
            'hora_cuidado' => ['required', 'regex:/^([01]\d|2[0-3]):[0-5]\d(:[0-5]\d)?$/'],
            'cantidad_alimento' => 'nullable|integer',
            'tratamiento' => 'string',
            'fk_alimento' => 'required',
            'fk_empleado' => 'required',
            'fk_animal' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'fecha_inicio_cuidado.required' => 'Este campo es obligatorio.',
            'fecha_inicio_cuidado.date' => 'Debe ingresar una fecha válida.',
            
            'hora_cuidado.required' => 'Este campo es obligatorio.',
            'hora_cuidado.regex' => 'Formato de hora incorrecto. Usa el formato de 24 horas ',

            'cantidad_alimento.required' => 'Este campo es obligatorio.',
            'cantidad_alimento.integer' => 'Ingresa un numero entero.',
            'tratamiento.required' => 'Este campo es obligatorio.',
            'fk_alimento.required' => 'Este campo es obligatorio.',
            'fk_empleado.required' => 'Este campo es obligatorio.',
            'fk_animal.required' => 'Por favor, seleeciona una opcion.',
        ];
    }
}