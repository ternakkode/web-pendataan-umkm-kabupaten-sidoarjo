<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Register extends FormRequest
{
    public function rules()
    {
        return [
            'nama' => 'bail|required|max:100',
            'email' => 'bail|required|unique:user,email',
            'username' => 'bail|required|unique:user,username',
            'password' => 'bail|required|confirmed'
        ];
    }
}
