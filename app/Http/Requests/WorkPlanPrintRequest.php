<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;

class WorkPlanPrintRequest extends BaseRequest
{
    public function rules()
    {
        $rules = [];

        $rules = [
            'txtStartTargetDate' => ['required'
                                     ,parent::validYear()],
            'filter.txtStartDeptCd' => ['nullable'
                                        ,parent::existDeptCdWithAuth('01', true)
                                        ,parent::startEndCheck('txtStartDeptCd', 'txtEndDeptCd')],
            'filter.txtEndDeptCd' => ['nullable'
                                        ,parent::existDeptCdWithAuth('01', true)
                                        ,parent::startEndCheck('txtStartDeptCd', 'txtEndDeptCd')],
            'filter.txtStartEmpCd' => ['nullable'
                                        ,parent::existEmpCdWithAuth(null, true, null)
                                        ,parent::startEndCheck('txtStartEmpCd', 'txtEndEmpCd')],
            'filter.txtEndEmpCd' => ['nullable'
                                        ,parent::existEmpCdWithAuth(null, true, null)
                                        ,parent::startEndCheck('txtStartEmpCd', 'txtEndEmpCd')]
        ];
        return $rules;
    }

    public function messages()
    {
        return [
            'txtStartTargetDate.required' => '2002',
        ];
    }
}
