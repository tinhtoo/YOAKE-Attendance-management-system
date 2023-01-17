<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;

class CalendarClearRequest extends BaseRequest
{
    public function rules()
    {
        $rules = [
            'ym' => [
                    'required',
                    parent::validYM(),
                ],
            'txtEmpCd' => [
                    'required',
                    parent::existEmpCdWithAuth("00,01", true),
                ]
        ];
        return $rules;
    }

    public function messages()
    {
        return [
            'ym.required' => '2002',
            'txtEmpCd.required' => '2002',
        ];
    }
}
