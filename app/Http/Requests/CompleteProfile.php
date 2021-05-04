<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompleteProfile extends FormRequest
{
    public function rules()
    {
        return [
            'nama' => 'bail|required|max:100',
            'nik' => 'bail|required|numeric',
            'no_hp' => 'bail|required|numeric',
            'pendidikan_terakhir' => 'bail|required|in:sd,smp,sma,diploma,s1,s2,s3',
            'foto_profil' => 'bail|required|image',
            'kecamatan' => 'bail|required|exists:kecamatan,id',
            'desa' => 'bail|required|exists:desa,id',
            'detail_alamat' => 'bail|required|string',
        ];
    }
}
