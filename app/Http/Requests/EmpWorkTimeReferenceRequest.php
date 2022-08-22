<?php

namespace App\Http\Requests;

use App\Models\MT99Msg;
use App\Models\MT10Emp;
use App\Models\MT13DeptAuth;
use App\Http\Requests\BaseRequest;

class EmpWorkTimeReferenceRequest extends BaseRequest
{

    public function rules()
    {

        $rules = [
            'filter.ddlDate' => [
                'required',
                parent::validYM(),
            ],
        ];

        $data = $this->all();
        $prepare = $data['filter'];
        $chk = $prepare['SearchCondition'];

        if ($chk == 'rbSearchDept') {
            $rules['filter.txtDeptCd'] = [
                'required',
                parent::existDeptCdWithAuth('01', true),
            ];
        }
        if ($chk == 'rbSearchEmp') {
            $rules['filter.txtEmpCd'] = [
                'required',
                parent::existEmpCdWithAuth('00', true),
            ];
        }

        return $rules;
    }


    public function messages()
    {
        return [
            'filter.ddlDate.required' => '2002',
            'filter.txtEmpCd.required' => '2002',
            'filter.txtDeptCd.required' => '2002'

        ];
    }
}
