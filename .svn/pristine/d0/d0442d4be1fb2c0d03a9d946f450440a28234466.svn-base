<?php

namespace App\Http\Requests;

/**
 * 出退勤照会
 */
class EmpWorkStatusReferenceRequest extends BaseRequest
{
    public function rules()
    {
        $rules = [];
        $rules = [
            'filter.ddlDate' => [
                'required',
                parent::validYear(),
            ],
            'filter.txtDeptCd' => [
                'nullable',
                parent::existDeptCdWithAuth('01', true),
            ],
            'filter.txtEmpCd' => [
                'nullable',
                parent::existEmpCdWithAuth('00', true),
            ],
            'filter.check' => 'required',
        ];
        return $rules;
    }

    public function messages()
    {
        // 2002：（必須入力項目です。）
        // 4005：（事由区分が選択されていません。）
        return [
            'filter.ddlDate.required' => '2002',
            'filter.check.required' => '4005'
        ];
    }
}
