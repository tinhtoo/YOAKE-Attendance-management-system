<?php

namespace App\Http\Requests;

use App\Models\MT10Emp;
use App\Http\Requests\BaseRequest;
use App\Models\MT99Msg;
use Illuminate\Foundation\Http\FormRequest;

class MT03CalendarEditorRequest extends BaseRequest
{
    public function rules()
    {
        return $rules = [
            'calendarData.*.workPtnCd' => ['required'],
        ];
    }


    public function messages()
    {
        // 2002メッセージ取得（必須入力項目です)
        $required_msg = MT99Msg::where('MSG_NO', '2002')->pluck('MSG_CONT')->first();
        return [
            'calendarData.*.workPtnCd.required' => $required_msg,
        ];
    }
}
