<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;

class MonthShiftViewRequest extends BaseRequest
{
    public function rules()
    {
        $rules = [
            'filter.caldYearMonth' => parent::validYM(),
            'filter.searchCondition' => 'required',
        ];

        if (is_array($this->input('filter')) && key_exists('searchCondition', $this->input('filter'))) {
            if ($this->input('filter')['searchCondition']) {
                $rules['filter.txtEmpCd'] = [
                    'required',
                    parent::existEmpCdWithAuth('00,01', true, '01')
                ];
            } else {
                $rules['filter.closingDateCd'] = [
                    'required'
                ];
                $rules['filter.txtDeptCd'] = [
                    'required',
                    parent::existDeptCdWithAuth('01', true)
                ];
            }
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'filter.txtEmpCd.required' => '2002',
            'filter.txtDeptCd.required' => '2002'
        ];
    }
}
