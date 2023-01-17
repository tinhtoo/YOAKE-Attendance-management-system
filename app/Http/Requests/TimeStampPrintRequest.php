<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;

class TimeStampPrintRequest extends BaseRequest
{
    public function rules()
    {
        $rules = [];

        $data = $this->all();
        $check = $data['OutputCls'];

        // 出力区分「月度」
        if ($check == 'rbMonthCls') {
            $rules = [
                'filter.yearMonthDate' => 'required',
                'filter.txtStartDeptCd' => ['nullable'
                                        ,parent::existDeptCdWithAuth('01', true)
                                        ,parent::startEndCheck('txtStartDeptCd', 'txtEndDeptCd')],
                'filter.txtEndDeptCd' => ['nullable'
                                        ,parent::existDeptCdWithAuth('01', true)
                                        ,parent::startEndCheck('txtStartDeptCd', 'txtEndDeptCd')],
                'filter.txtStartEmpCd' => ['nullable'
                                        ,function ($attribute, $value, $fail) {
                                            $input_data = $this->all();
                                            if (key_exists('chkRegCls', $input_data['filter'])) {
                                                (parent::existEmpCdWithAuth('00', true))($attribute, $value, $fail);
                                            } else {
                                                (parent::existEmpCdWithAuth(null, true))($attribute, $value, $fail);
                                            }
                                        }
                                        ,parent::startEndCheck('txtStartEmpCd', 'txtEndEmpCd')],
                'filter.txtEndEmpCd' => ['nullable'
                                        ,function ($attribute, $value, $fail) {
                                            $input_data = $this->all();
                                            if (key_exists('chkRegCls', $input_data['filter'])) {
                                                (parent::existEmpCdWithAuth('00', true))($attribute, $value, $fail);
                                            } else {
                                                (parent::existEmpCdWithAuth(null, true))($attribute, $value, $fail);
                                            }
                                        }
                                        ,parent::startEndCheck('txtStartEmpCd', 'txtEndEmpCd')]
            ];
            return $rules;
        }

        // 出力区分「日付範囲」
        if ($check == 'rbDateRange') {
            $rules = [
                'filter.startDate' => ['required'
                                    ,parent::startEndCheck('startDate', 'endDate')],
                'filter.endDate' => ['required'
                                    ,parent::startEndCheck('startDate', 'endDate')],
                'filter.txtStartDeptCd' => ['nullable'
                                        ,parent::existDeptCdWithAuth('01', true)
                                        ,parent::startEndCheck('txtStartDeptCd', 'txtEndDeptCd')],
                'filter.txtEndDeptCd' => ['nullable'
                                        ,parent::existDeptCdWithAuth('01', true)
                                        ,parent::startEndCheck('txtStartDeptCd', 'txtEndDeptCd')],
                'filter.txtStartEmpCd' => ['nullable'
                                        ,function ($attribute, $value, $fail) {
                                            $input_data = $this->all();
                                            if (key_exists('regCls', $input_data['filter'])) {
                                                (parent::existEmpCdWithAuth('00', true))($attribute, $value, $fail);
                                            } else {
                                                (parent::existEmpCdWithAuth(null, true))($attribute, $value, $fail);
                                            }
                                        }
                                        ,parent::startEndCheck('txtStartEmpCd', 'txtEndEmpCd')],
                'filter.txtEndEmpCd' => ['nullable'
                                        ,function ($attribute, $value, $fail) {
                                            $input_data = $this->all();
                                            if (key_exists('regCls', $input_data['filter'])) {
                                                (parent::existEmpCdWithAuth('00', true))($attribute, $value, $fail);
                                            } else {
                                                (parent::existEmpCdWithAuth(null, true))($attribute, $value, $fail);
                                            }
                                        }
                                        ,parent::startEndCheck('txtStartEmpCd', 'txtEndEmpCd')]
            ];
            return $rules;
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'filter.startDate.required' => '2002',
            'filter.endDate.required' => '2002',
            'filter.yearMonthDate.required' => '2002',
        ];
    }
}
