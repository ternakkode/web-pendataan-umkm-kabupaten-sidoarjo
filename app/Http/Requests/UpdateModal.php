<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateModal extends FormRequest
{
    public function rules()
    {
        return [
            'nama' => 'bail|required|max:100',
        ];
    }
}
