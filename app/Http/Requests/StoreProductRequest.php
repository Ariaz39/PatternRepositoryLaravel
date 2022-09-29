<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|size:50|min:3',
            'description' => 'required|string|size:100',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nombre de producto',
            'description' => 'Descripcion del producto',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El :attribute es obligatorio',
            'name.strinf' => 'El :attribute debe ser una cadena de texto valida',
            'name.min' => 'El :attribute debe ser de minimo 3 caracteres',
            'descripton.required' => 'El :attribute es obligatorio',
            'descripton.alpha_dash' => 'El :attribute ser una cadena de texto valida',
        ];
    }
}
