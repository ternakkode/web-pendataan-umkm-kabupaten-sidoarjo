<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProduk extends FormRequest
{
    public function rules()
    {
        return [
            'nama' => 'bail|required|max:100',
            'deskripsi' => 'bail|required',
            'harga' => 'bail|required|numeric',
            'foto' => 'bail|required|array',
        ];
    }
}
