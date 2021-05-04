<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateInformasi extends FormRequest
{
    public function rules()
    {
        return [
            'judul' => 'bail|required|max:100',
            'foto' => 'bail|required|image',
            'deskripsi' => 'bail|required',
            'publish' => 'bail|nullable'
        ];
    }
}
