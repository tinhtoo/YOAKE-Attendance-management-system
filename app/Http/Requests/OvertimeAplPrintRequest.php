<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;

class OvertimeAplPrintRequest extends BaseRequest
{
    public function rules()
    {
        $rules = [];

        $rules = [
            'ddlDate' => ['required', parent::validYM()],
            'filter.txtStartDeptCd' => ['nullable'
                                        ,parent::existDeptCdWithAuth('01', true)
                                        ,parent::startEndCheck('txtStartDeptCd', 'txtEndDeptCd')],
            'filter.txtEndDeptCd' => ['nullable'
                                        ,parent::existDeptCdWithAuth('01', true)
                                        ,parent::startEndCheck('txtStartDeptCd', 'txtEndDeptCd')],
            'filter.txtStartEmpCd' => ['nullable'
                                        ,parent::existEmpCdWithAuth('00', true, null)
                                        ,parent::startEndCheck('txtStartEmpCd', 'txtEndEmpCd')],
            'filter.txtEndEmpCd' => ['nullable'
                                        ,parent::existEmpCdWithAuth('00', true, null)
                                        ,parent::startEndCheck('txtStartEmpCd', 'txtEndEmpCd')]
        ];
        return $rules;
    }

    public function messages()
    {
        return [
            'ddlDate.required' => '2002',
        ];
    }
}
