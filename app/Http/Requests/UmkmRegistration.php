<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UmkmRegistration extends FormRequest
{

    public function rules()
    {
        return [
            'nib' => 'bail|nullable|max:11',
            'npwp' => 'bail|nullable|max:20',
            'nama_usaha' => 'bail|required|string',
            'kecamatan' => 'bail|required|exists:kecamatan,id',
            'desa' => 'bail|required|exists:desa,id',
            'detail_alamat' => 'bail|required|string',
            'jenis_usaha' => 'bail|required|exists:jenis_usaha,id',
            'lama_usaha' => 'bail|required|exists:lama_usaha,id',
            'legalitas' => 'bail|nullable|array',
            'modal' => 'bail|required|exists:modal,id'
        ];
    }
}
