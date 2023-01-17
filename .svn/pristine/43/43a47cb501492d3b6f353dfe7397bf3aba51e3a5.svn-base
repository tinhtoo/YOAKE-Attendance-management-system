<?php

namespace App\Http\Requests;

class WorkTimeReferenceRequest extends BaseRequest
{
    public function rules()
    {
        $rules = [
            'ddlDate' => [
                'required',
                parent::validYM(),
            ],
            'txtEmpCd' => [
                'required',
                parent::existEmpCdWithAuth('00', true),
            ]
        ];
        return $rules;
    }

    public function messages()
    {
        return [
            'ddlDate.required' => '2002',
            'txtEmpCd.required' => '2002',
        ];
    }
}
