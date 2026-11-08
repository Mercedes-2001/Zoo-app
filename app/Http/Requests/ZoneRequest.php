<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ZoneRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre_zona' => [
                'required',
                'string',
                'max:50',
                'regex:/^[\pL\s\-]+$/u'   // Solo letras, espacios y guiones
            ],
            'ubicacion'   => ['required', 'string', 'max:50'],
            'capacidad'   => ['required', 'integer', 'min:0'],
            'tipo_zona'   => ['required', 'string', 'max:50'],
            'clima'       => ['required', 'string', 'max:50'],
            'status'      => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            // Campos obligatorios (todos)
            'nombre_zona.required' => 'Este campo es obligatorio.',
            'ubicacion.required'   => 'Este campo es obligatorio.',
            'capacidad.required'   => 'Este campo es obligatorio.',
            'tipo_zona.required'   => 'Este campo es obligatorio.',
            'clima.required'       => 'Este campo es obligatorio.',
            'status.required'      => 'Este campo es obligatorio.',

            // nombre_zona
            'nombre_zona.string'   => 'El nombre de zona debe ser texto.',
            'nombre_zona.max'      => 'El nombre de zona no puede exceder 50 caracteres.',
            'nombre_zona.regex'    => 'Este campo no permite números ni símbolos especiales',

            // ubicacion
            'ubicacion.string'     => 'La ubicación debe ser texto.',
            'ubicacion.max'        => 'La ubicación no puede exceder 50 caracteres.',

            // capacidad
            'capacidad.integer'    => 'La capacidad debe ser un número entero.',
            'capacidad.min'        => 'La capacidad no puede ser negativa.',

            // tipo_zona
            'tipo_zona.string'     => 'El tipo de zona debe ser texto.',
            'tipo_zona.max'        => 'El tipo de zona no puede exceder 50 caracteres.',

            // clima
            'clima.string'         => 'El clima debe ser texto.',
            'clima.max'            => 'El clima no puede exceder 50 caracteres.',
        ];
    }
}
