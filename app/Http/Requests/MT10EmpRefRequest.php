<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MT10EmpRefRequest extends FormRequest
{

    public function rules()
    {
        // チェック無し
        return $rules = [];
    }


    public function messages()
    {
        return [
        ];
    }
}
