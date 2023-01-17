<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MT01ControlEditorRequest extends FormRequest
{
    public function rules()
    {
        $rules = [
            'COMPANY_NAME' => ['required'],
            'COMPANY_KANA' => ['required'],
            'COMPANY_ABR_NAME' => ['required'],
        ];

        return $rules;
    }
    public function messages()
    {
        return [
            'COMPANY_NAME.required' => '2002',
            'COMPANY_KANA.required' => '2002',
            'COMPANY_ABR_NAME.required' => '2002',
        ];
    }
}
