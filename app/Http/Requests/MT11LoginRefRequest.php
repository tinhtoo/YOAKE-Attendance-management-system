<?php

namespace App\Http\Requests;

use App\Models\MT99Msg;
use App\Models\MT10Emp;
use App\Models\MT11Login;
use Illuminate\Foundation\Http\FormRequest;

class MT11LoginRefRequest extends FormRequest
{

    public function rules()
    {

        $rules = [];

        $rules = [
             'filter.txtDeptCd' => [
                'nullable',
                function ($attribute, $value, $fail) {

                    // チェック1処理（E-1）
                    $check = MT10Emp::where(['DEPT_CD' => $value])->exists();

                    $msg_2000 = MT99Msg::where('MSG_NO', '2000')->pluck('MSG_CONT')->first();

                    // 判定処理
                    if (!($check)) {
                        $fail($msg_2000);
                    }
                },
            ],

        ];
        return $rules;
    }


    public function messages()
    {
        // 2000メッセージ取得該当データが存在しません
        $msg_2000 = MT99Msg::where('MSG_NO', '2000')->pluck('MSG_CONT')->first();

        return [
            'filter.txtDeptCd.nullable' => $msg_2000,
            ];
    }
}
