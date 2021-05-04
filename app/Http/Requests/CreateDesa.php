<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateDesa extends FormRequest
{
    public function rules()
    {
        return [
            'nama' => 'bail|required|max:100',
            'kecamatan' => 'bail|required|exists:kecamatan,id'
        ];
    }
}
