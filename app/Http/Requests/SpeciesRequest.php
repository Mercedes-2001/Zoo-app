<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SpeciesRequest extends FormRequest
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
            /*  ──────────  Reglas generales ──────────
             *  - required      → el campo no puede venir vacío
             *  - string        → debe ser texto
             *  - min / max     → control de longitud
             *  - regex         → solo letras, espacios y signos diacríticos (sin números)
             */
            'nom_cientf' => [
                'required',
                'string',
                'min:5',
                'max:100',
                'regex:/^[\pL\s\-]+$/u'
            ],
            'nom_comun'  => [
                'required',
                'string',
                'min:5',
                'max:100',
                'regex:/^[\pL\s\-]+$/u'
            ],
            'tipo_nac'   => [
                'required',
                'string',
                'min:5',
                'max:50',
                'regex:/^[\pL\s\-]+$/u'
            ],
            'familia'    => [
                'required',
                'string',
                'min:5',
                'max:60',
                'regex:/^[\pL\s\-]+$/u'
            ],
        ];
    }

    public function messages(): array
    {
        return [
            // nom_cientf
            'nom_cientf.required' => 'El nombre científico es obligatorio.',
            
            'nom_cientf.min'      => 'El nombre científico debe tener al menos :min caracteres.',
            'nom_cientf.max'      => 'El nombre científico no debe superar :max caracteres.',
            'nom_cientf.regex'    => 'El nombre científico no puede contener números ni símbolos extraños.',

            // nom_comun
            'nom_comun.required'  => 'El nombre común es obligatorio.',
            
            'nom_comun.min'       => 'El nombre común debe tener al menos :min caracteres.',
            'nom_comun.max'       => 'El nombre común no debe superar :max caracteres.',
            'nom_comun.regex'     => 'El nombre común no puede contener números ni símbolos extraños.',

            // tipo_nac
            'tipo_nac.required'   => 'El tipo de nacimiento es obligatorio.',
            
            'tipo_nac.min'        => 'El tipo de nacimiento debe tener al menos :min caracteres.',
            'tipo_nac.max'        => 'El tipo de nacimiento no debe superar :max caracteres.',
            'tipo_nac.regex'      => 'El tipo de nacimiento no puede contener números ni símbolos extraños.',

            // familia
            'familia.required'    => 'La familia es obligatoria.',
            
            'familia.min'         => 'La familia debe tener al menos :min caracteres.',
            'familia.max'         => 'La familia no debe superar :max caracteres.',
            'familia.regex'       => 'La familia no puede contener números ni símbolos extraños.',
        ];
    }
}
