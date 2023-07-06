<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'price' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O título é obrigatório.',
            'name.max' => 'O título deve ter no máximo 255 caracteres.',
            'description.required' => 'O conteúdo é obrigatório.',
            'description.max' => 'O conteúdo deve ter no máximo 255 caracteres.',
            'price.required' => 'O preço é obrigatório.',
            'price.numeric' => 'O preço deve ser um número.'
        ];
    }
}
