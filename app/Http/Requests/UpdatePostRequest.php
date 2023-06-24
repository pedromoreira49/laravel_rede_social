<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'max:255',
            'content' => 'max:255',
        ];
    }

    public function messages()
    {
        return [
            'title.string' => 'O título deve ser uma string.',
            'title.max' => 'O título deve ter no máximo 255 caracteres.',
            'content.string' => 'O conteúdo deve ser uma string.',
            'content.max' => 'O conteudo do post deve ter no máximo 255 caracteres.',
        ];
    }
}
