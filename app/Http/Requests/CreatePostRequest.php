<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'O título é obrigatório.',
            'title.string' => 'O título deve ser uma string.',
            'title.max' => 'O título deve ter no máximo 255 caracteres.',
            'content.required' => 'O conteúdo é obrigatório.',
            'content.string' => 'O conteúdo deve ser uma string.',
        ];
    }
}
