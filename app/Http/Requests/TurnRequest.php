<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TurnRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
			
			'descripcion' => 'string',
			'hora_inicio' => ['required', 'regex:/^([01]\d|2[0-3]):[0-5]\d(:[0-5]\d)?$/'],
			'hora_salida' => ['required', 'regex:/^([01]\d|2[0-3]):[0-5]\d(:[0-5]\d)?$/'],
        ];
    }
    public function messages(): array
    {
        return [
            'descripcion.required' => 'Este campo es obligatorio.',

            'hora_inicio.required' => 'Este campo es obligatorio.',
            
            'hora_salida.required' => 'Este campo es obligatorio.',
            
            'hora_inicio.regex' => 'Formato de hora incorrecto. Usa el formato de 24 horas',

            'hora_salida.regex' => 'Formato de hora incorrecto. Usa el formato de 24 horas',

            
        ];
    }
}
