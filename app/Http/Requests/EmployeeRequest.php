<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
			'nom' => 'required|string',
			'nom_s' => 'nullable|string',
			'apat' => 'required|string',
			'apmat' => 'required|string',
			'edad' => 'required|integer|min:18|max:120',
			'sexo' => 'required',
			'tipo_em' => 'required',
			'fk_turno' => 'required|exists:turns,cod_turno',
            'fk_jefe'  => 'nullable|exists:employees,num_trabajador',
        ];
    }
    public function messages(): array
    {
        return [
            'nom.required' => 'Este campo es obligatorio.',
            'apat.required' => 'Este campo es obligatorio.',
            'apmat.required' => 'Este campo es obligatorio.',
            'edad.required' => 'Este campo es obligatorio.',
            'edad.integer' => 'Ingresa solo caracteres númericos.',
            'edad.max'      => 'La edad debe ser menor de 100 años.',
            'edad.min'      => 'Debes ser mayor de 18 años.',
            'sexo.required' => 'Por favor, selecciona una opción.',
            'tipo_em.required' => 'Por favor, selecciona una opción.',
            'fk_turno.required' => 'Por favor, selecciona una opción.',
            

            
        ];
    }
}
