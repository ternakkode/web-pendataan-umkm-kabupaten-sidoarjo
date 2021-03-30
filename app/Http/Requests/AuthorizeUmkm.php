<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorizeUmkm extends FormRequest
{
    public function rules()
    {
        return [
            'id_umkm' => 'bail|required|numeric'
        ];
    }
}
