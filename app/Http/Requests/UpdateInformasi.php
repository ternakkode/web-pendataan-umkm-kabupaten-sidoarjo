<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInformasi extends FormRequest
{
    public function rules()
    {
        return [
            'judul' => 'bail|required|max:100',
            'foto' => 'bail|nullable|image',
            'deskripsi' => 'bail|required',
            'publish' => 'bail|nullable'
        ];
    }
}
