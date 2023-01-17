<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;

class EmpExportRequest extends BaseRequest
{
    public function rules()
    {
        return $rules = [
            'filter.txtStartDeptCd' => [
                'nullable',
                parent::existDeptCdWithAuth(null, true),
                parent::startEndCheck('txtStartDeptCd', 'txtEndDeptCd'),
            ],
            'filter.txtEndDeptCd' => [
                'nullable',
                parent::existDeptCdWithAuth(null, true),
                parent::startEndCheck('txtStartDeptCd', 'txtEndDeptCd')
            ],
            'filter.txtStartEmpCd' => [
                'nullable',
                parent::existEmpCdWithAuth(null, true, null),
                parent::startEndCheck('txtStartEmpCd', 'txtEndEmpCd')
            ],
            'filter.txtEndEmpCd' => [
                'nullable',
                parent::existEmpCdWithAuth(null, true, null),
                parent::startEndCheck('txtStartEmpCd', 'txtEndEmpCd')
            ],
        ];
    }

    public function messages()
    {
        return [];
    }
}
