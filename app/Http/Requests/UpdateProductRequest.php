<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'string|max:255',
            'description' => 'string|max:255',
            'price' => 'numeric'
        ];
    }

    public function messages()
    {
        return [
            'name.string' => 'O nome deve ser uma string.',
            'name.max' => 'O nome deve ter no máximo 255 caracteres.',
            'description.string' => 'A descrição deve ser uma string.',
            'description.max' => 'A descrição do produto deve ter no máximo 255 caracteres.',
            'price.numeric' => 'O preço do produto deve ser um numero.'
        ];
    }
}
