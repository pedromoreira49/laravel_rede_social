<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'string|max:255',
            'password' => 'string|min:6|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'name.string' => 'O nome deve ser uma string.',
            'name.max' => 'O nome deve ter no máximo 255 caracteres.',
            'password.min' => 'A senha precisa ter no minimo 6 caracteres.',
            'password.string' => 'A senha deve ser uma string.',
            'password.confirmed' => 'É necessário confirmar a senha.'
        ];
    }
}