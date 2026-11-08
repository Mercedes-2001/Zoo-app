<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataRequest extends FormRequest
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
			'num_trabajador' => 'required',
			'tel' => 'required|digits:10',
			'correo_elec' => 'required|email|string',
			'calle' => 'required|string',
			'col' => 'required|string',
			'cp' => 'required|string',
			'n_I' => 'nullable|string',
			'n_E' => 'required|string',
			'estado' => 'required|string',
        ];
    }
     public function messages(): array
    {
        return [
            'tel.required' => 'Este campo es obligatorio.',
            'tel_prov.digits' => 'Debe contener 10 caracteres numéricos.',
            'correo_elec' => 'Este campo es obligatorio.',
            'correo_elect.email' => 'El correo debe tener un formato válido.',
            'calle.required' => 'Este campo es obligatorio.',
            'col.required'      => 'Este campo es obligatorio.',
            'cp.required'      => 'Este campo es obligatorio.',
            'n_E.required' => 'Este campo es obligatorio.',
            'estado.required' => 'Este campo es obligatorio.',
            
        ];
    }
}
