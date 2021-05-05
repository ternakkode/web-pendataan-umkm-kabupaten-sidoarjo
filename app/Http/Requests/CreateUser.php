<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUser extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'bail|required|unique:user,email',
            'username' => 'bail|required|unique:user,username',
            'password' => 'bail|required',
            'nama' => 'bail|required|max:100',
            'nik' => 'bail|required|numeric',
            'no_hp' => 'bail|required|numeric',
            'password' => 'bail|nullable',
            'pendidikan_terakhir' => 'bail|required|in:sd,smp,sma,diploma,s1,s2,s3',
            'foto_profil' => 'bail|image',
            'kecamatan' => 'bail|required|exists:kecamatan,id',
            'desa' => 'bail|required|exists:desa,id',
            'detail_alamat' => 'bail|required|string',
        ];
    }
}
