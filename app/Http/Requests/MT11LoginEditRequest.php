<?php

namespace App\Http\Requests;

use App\Models\MT99Msg;
use App\Models\MT10Emp;
use App\Models\MT11Login;
use Illuminate\Foundation\Http\FormRequest;

class MT11LoginEditRequest extends FormRequest
{

    public function rules()
    {

        $rules = [];

        $rules = [
            'txtLoginId' =>[
                'required',
                'regex:/^[a-zA-Z0-9ａ-ｚA-Z\-+=^$*.\[\]{}()?\"!@#%&\/\\\\,><\':;_~`\-+=]+$/',
                function ($attribute, $value, $fail) {
                    // 現パスワード取得
                    $empCd =  FormRequest::get('txtEmpCd');
                    $check = MT11Login::where('LOGIN_ID', $value)->where('EMP_CD', '<>', $empCd)->exists();
                    // 2022メッセージ取得（既に使用されているログインIDです。)
                    $msg_2022 = MT99Msg::where('MSG_NO', '2022')->pluck('MSG_CONT')->first();
                    // 2002メッセージ取得（必須入力項目です)
                    $msg_2002 = MT99Msg::where('MSG_NO', '2002')->pluck('MSG_CONT')->first();

                    // [MT11_LOGIN.LOGIN_ID]と入力された変更時Passが同一時エラー
                    if ($check) {
                        $fail($msg_2022);
                    }

                    // 空白の場合2002メッセージエラー （必須入力項目です)*/
                    if (!isset($value)) {
                        $fail($msg_2002);
                    }
                }
            ],
            'txtNewPassword' => ['required'],
            'txtNewPassword2' => ['required', 'same:txtNewPassword'],
            'ddlPgAuth' => ['required'],
        ];
        return $rules;
    }


    public function messages()
    {
        // 2002メッセージ取得（必須入力項目です)
        $msg_2002 = MT99Msg::where('MSG_NO', '2002')->pluck('MSG_CONT')->first();
        // 2022メッセージ取得（既に使用されているログインIDです。)
        $msg_2022 = MT99Msg::where('MSG_NO', '2022')->pluck('MSG_CONT')->first();
        // 4001メッセージ取得(禁則文字([|])が含まれています。)
        $msg_4001 = MT99Msg::where('MSG_NO', '4001')->pluck('MSG_CONT')->first();
        // 4024メッセージ(同じPassを入力してください)
        $msg_4023 = MT99Msg::where('MSG_NO', '4023')->pluck('MSG_CONT')->first();

        return [
            'txtLoginId.required' => $msg_2022,
            'txtLoginId.required' => $msg_2002,
            'txtLoginId.regex' => $msg_4001,
            'txtNewPassword.required' => $msg_2002,
            'txtNewPassword2.required' => $msg_2002,
            'txtNewPassword2.same' => $msg_4023,
            'ddlPgAuth.required' => $msg_2002,
            ];
    }
}
