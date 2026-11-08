<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LotRequest extends FormRequest
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
			
			'fecha_caduc'   => ['required', 'date', 'after:fecha_compra'],    // ← aquí
            'porcion'       => ['required'],
            'fecha_compra'  => ['required', 'date'],
            'fk_alimento'   => ['required'],
        ];
    }
        public function messages(): array
    {
        return [
            '*.required'         => 'Este campo es obligatorio',
            'fecha_caduc.after' => 'La fecha de caducidad debe ser posterior a la fecha de compra.',
        ];
    }   
}
