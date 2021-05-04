<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdmin extends FormRequest
{
    public function rules()
    {
        return [
            'nama' => 'bail|required|max:100',
            'username' => 'bail|required|max:100',
            'password' => 'bail|nullable|max:100'
        ];
    }
}
