<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;
use App\Models\MT99Msg;

class MonthShiftEmpUpdateRequest extends BaseRequest
{
    public function rules()
    {
        $rules = [
            'caldYM' => parent::validYM(),
            'calendarData.*.empCd' => ['required', parent::existEmpCdWithAuth('00', true, '01')],
            'calendarData.*.calendar.*.caldDate' => 'required|date_format:Y-m-d',
            'calendarData.*.calendar.*.workPtnCd' => 'required',
        ];
        return $rules;
    }

    public function messages()
    {
        // $msg_2002 = MT99Msg::where('MSG_NO', '2002')->pluck('MSG_CONT')->first();
        return [
            // エラーは通常発生しないため、画面のリロードを行う
            // ASP.NET版では勤務体系コンボボックスで空白が選択できるが、仕様書では「空白無し」となっている。
            // 一旦、仕様書に合わせるため、勤務体系が空白も発生しない想定。
            // 'calendarData.*.calendar.*.workPtnCd.required' => $msg_2002,
        ];
    }
}
