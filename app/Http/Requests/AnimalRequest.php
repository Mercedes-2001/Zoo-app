<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnimalRequest extends FormRequest
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
			'nombre_ani' => 'required|string|regex:/^[\pL\s\-]+$/u',
			'edad_ani' => 'required|integer',
			'peso_ani' => 'required|regex:/^\d+(\.\d{1,3})?$/',
			'altura' => 'required|regex:/^\d+(\.\d{1,2})?$/',
			'sexo_ani' => 'required',
			'fecha_nac' => 'required',
			'descripcion_ani' => 'required|string',
			'lugar_origen' => 'required|string|regex:/^[\pL\s\-]+$/u',
			'fk_especie' => 'required',
			'fk_zona' => 'required',
			'fk_nombre_zona' => 'required|string',
        ];
    }
    public function messages(): array
    {
        return [
            'nombre_ani.required' => 'Este campo es obligatorio.',
            'nombre_ani.regex' => 'El nombre solo puede contener letras.',
            'edad_ani.required' => 'Este campo es obligatorio.',
            'edad_ani.integer' => 'Ingresa solo caracteres númericos.',
            'peso_ani.required' => 'Este campo es obligatorio.',
            'peso_ani.regex' => 'Ingresa solo caracteres númericos.',
            'altura.required' => 'Este campo es obligatorio.',
            'altura.regex' => 'Ingresa solo caracteres númericos.',
            'sexo_ani.required' => 'Por favor, selecciona una opción.',
            'fecha_nac.required' => 'Este campo es obligatorio.',
            'descripcion_ani.required' => 'Este campo es obligatorio.',
            'lugar_origen.required' => 'Este campo es obligatorio.',
            'lugar_origen.regex' => 'El nombre solo puede contener letras.',
            'fk_especie.required' => 'Este campo es obligatorio.',
            'fk_zona.required' => 'Este campo es obligatorio.',
            'fk_nombre_zona.required' => 'Este campo es obligatorio.',
            
        ];
    }
}
