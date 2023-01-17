<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\BaseRequest;

use function PHPUnit\Framework\isEmpty;

class WorkTimeClearRequest extends BaseRequest
{
    public function rules()
    {
        $rules = [
            'filter.startDate' => [
                            'required',
                            parent::validYear(),
                            parent::startEndCheck('startDate', 'endDate')
                        ],
            'filter.endDate' => [
                            'required',
                            parent::validYear(),
                            parent::startEndCheck('startDate', 'endDate'),
                            parent::withinAMonth('startDate')
                        ]
        ];
        if ($this->input('clearCategory')) {
            $rules['deptCd'] = ['required'];
        } else {
            $rules['txtEmpCd'] = [
                    'required',
                    parent::existEmpCdWithAuth('00,01', true)
                ];
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'filter.startDate.required' => '2002',
            'filter.endDate.required' => '2002',
            'txtEmpCd.required' => '2002',
            'deptCd.required' => '4002',
        ];
    }
}
