<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Login extends FormRequest
{

    public function rules()
    {
        return [
            'username' => 'required',
            'password' => 'required',
            'role' => 'required|in:user,admin'
        ];
    }
}
