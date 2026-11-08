<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FoodRequest extends FormRequest
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
			'nom_alim' => 'required|string',
			'peso_alim' => 'required',
			'contenido_alim' => 'required|string',
			'cant_total' => 'required',
			'costo' => 'required',
			'fk_prov' => 'required|string',

            'peso_alim' => 'required|regex:/^\d{1,4}(\.\d{1,2})?$/',
            'cant_total' => 'required|regex:/^\d{1,4}(\.\d{1,2})?$/',
            'costo' => 'required|regex:/^\d{1,5}(\.\d{1,2})?$/',
        ];
    }
     public function messages(): array
    {
        return [
            'nom_alim.required' => 'Este campo es obligatorio.',
            'nom_alim.max' => 'El nombre no debe superar los 50 caracteres.',
            
            'peso_alim.required' => 'Este campo es obligatorio.',
            'peso_alim.regex' => 'Ingresa solo caracteres númericos que no excedan de los 9999.99 .',

            'contenido_alim.required' => 'Este campo es obligatorio.',
            'contenido_alim.max' => 'Este campo no debe exceder los 255 caracteres.',

            'cant_total.required' => 'Este campo es obligatorio.',
            'cant_total.regex' => 'Ingresa solo caracteres númericos que no excedan de los 9999.99 ',

            'costo.required' => 'Este campo es obligatorio.',
            'costo.regex' => 'Ingresa solo caracteres númericos que no excedan de los 99999.99 ',


            'fk_prov.required' => 'Por favor, selecciona un proveedor',


        ];
    }

}
