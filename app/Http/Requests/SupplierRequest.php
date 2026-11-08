<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'rfc'          => ['required', 'string'],
            // Letras (incluye acentos), espacios, puntos y guiones
            'nom_prov'     => ['required', 'string', 'max:50', 'regex:/^[\pL\.\s\-]+$/u'],
            'tel_prov'     => ['required', 'digits:10'],
            'correo_prov'  => ['required', 'email', 'string', 'max:100'],
            'calle_prov'   => ['required', 'string', 'max:50'],
            'col_prov'     => ['required', 'string', 'max:50'],
            'cp_prov'      => ['required', 'string', 'max:8'],
            'numext_prov'  => ['required', 'string'],
            'numint_prov'  => ['nullable', 'string'],
            'tipo_prov'    => ['required', 'string', 'max:50', 'regex:/^[\pL\.\s\-]+$/u'],
        ];
    }

    public function messages(): array
    {
        return [
            // RFC
            'rfc.required'          => 'Este campo es obligatorio.',

            // nom_prov
            'nom_prov.required'     => 'Este campo es obligatorio.',
            'nom_prov.string'       => 'Introduce solo texto.',
            'nom_prov.max'          => 'No puede exceder 50 caracteres.',
            'nom_prov.regex'        => 'No se permiten números',

            // tel_prov
            'tel_prov.required'     => 'Este campo es obligatorio.',
            'tel_prov.digits'       => 'Debe contener 10 caracteres numéricos.',

            // correo_prov
            'correo_prov.required'  => 'Este campo es obligatorio.',
            'correo_prov.email'     => 'El correo debe tener un formato válido.',
            'correo_prov.max'       => 'No puede exceder 100 caracteres.',

            // calle_prov
            'calle_prov.required'   => 'Este campo es obligatorio.',
            'calle_prov.max'        => 'No puede exceder 50 caracteres.',

            // col_prov
            'col_prov.required'     => 'Este campo es obligatorio.',
            'col_prov.max'          => 'No puede exceder 50 caracteres.',

            // cp_prov
            'cp_prov.required'      => 'Este campo es obligatorio.',
            'cp_prov.max'           => 'No puede exceder 8 caracteres.',

            // numext_prov
            'numext_prov.required'  => 'Este campo es obligatorio.',

            // tipo_prov
            'tipo_prov.required'    => 'Este campo es obligatorio.',
            'tipo_prov.max'         => 'No puede exceder 50 caracteres.',
            'tipo_prov.regex'        => 'No se permiten números',
        ];
    }
}
