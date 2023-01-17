<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;
use App\Models\MT99Msg;

class MonthShiftUpdateRequest extends BaseRequest
{
    public function rules()
    {
        $rules = [
            'caldYM' => parent::validYM(),
            'calendarData.*.workPtnCd' => 'required'
        ];

        if ($this->input('searchCondition')) {
            $rules['txtEmpCd'] = [
                'required',
                parent::existEmpCdWithAuth('00,01', true, '01')
            ];
        } else {
            $rules['closingDateCd'] = [
                'required'
            ];
            $rules['txtDeptCd'] = [
                'required',
                parent::existDeptCdWithAuth('01', true)
            ];
        }
        return $rules;
    }

    public function messages()
    {
        $msg_2002 = MT99Msg::where('MSG_NO', '2002')->pluck('MSG_CONT')->first();
        return [
            'txtEmpCd.required' => $msg_2002,
            'txtDeptCd.required' => $msg_2002,
            'calendarData.*.workPtnCd.required' => $msg_2002,
        ];
    }
}
