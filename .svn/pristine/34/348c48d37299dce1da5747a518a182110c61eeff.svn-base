<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;
use App\Models\MT04ShiftPtn;
use App\Models\MT99Msg;

class MT04ShiftPtnUpdateRequest extends BaseRequest
{
    public function rules()
    {
        return $rules = [
            'shiftPtnCd' => ['required',
                function ($attribute, $value, $fail) {
                    $input_data = $this->all();
                    $hide_shift_ptn_cd = $input_data['hideShiftPtnCd'];
                    if ($hide_shift_ptn_cd != null) {
                        return;
                    }
                    // チェック　2001,'該当データが存在します。'
                    $check_shift_ptn_cd = MT04ShiftPtn::where('SHIFTPTN_CD', $value)->exists();
                    if ($check_shift_ptn_cd) {
                        $msg_2001 = MT99Msg::where('MSG_NO', '2001')->pluck('MSG_CONT')->first();
                        $fail($msg_2001);
                    }
                }
            ],
            'shiftPtnName' => [
                'required',
                'regex:/^[^|]+$/',
            ],
            'shiftPtn.*.workPtn' => ['required'],
            'shiftPtn' => ['required'],
        ];
    }

    public function messages()
    {
        // 2002メッセージ取得（必須入力項目です)
        $msg_2002 = MT99Msg::where('MSG_NO', '2002')->pluck('MSG_CONT')->first();
        // 4007 最低１項目は必須入力です。
        $msg_4007 = MT99Msg::where('MSG_NO', '4007')->pluck('MSG_CONT')->first();
        // 4001 禁則文字([|])が含まれています。
        $msg_4001 = MT99Msg::where('MSG_NO', '4001')->pluck('MSG_CONT')->first();

        return [
            'shiftPtnCd.required' => $msg_2002,
            'shiftPtnName.required' => $msg_2002,
            'shiftPtnName.regex' => $msg_4001,
            'shiftPtn.*.workPtn.required' => $msg_2002,
            'shiftPtn.required' => $msg_4007,
        ];
    }
}
