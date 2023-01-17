<?php

namespace App\Http\Requests;

class WorkTimeDeptEditorRequest extends BaseRequest
{
    public function rules()
    {
        $rules = [];

        $rules = [
            'ddlDate' => [
                'required',
                parent::validYear(),

            ],
            'txtDeptCd' => [
                'required',
                parent::existDeptCdWithAuth('01', true),
            ]
        ];
        return $rules;
    }

    public function messages()
    {
        return [
            'ddlDate.required' => '2002',
            'txtDeptCd.required' => '2002',
        ];
    }
}
