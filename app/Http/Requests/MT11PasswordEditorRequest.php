<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\MT11Login;
use App\Models\MT99Msg;

class MT11PasswordEditorRequest extends FormRequest
{
    public function rules()
    {
        $rules = [];

        $rules = [
            // E-1(必須入力)
            'txtPassword' => [
                'required',
                function ($attribute, $value, $fail) {

                    // SessionでログインIDの取得
                    $loginUserId = session('id');

                    // E-2(ログインID、現パスワードがDBに存在するかチェック)
                    $check = MT11Login::select('PASSWORD')
                                      ->where(['PASSWORD' => $value])
                                      ->where(['LOGIN_ID' =>  $loginUserId])
                                      ->exists();

                    // 2000メッセージ取得（該当データが存在しません)
                    $msg_2000 = MT99Msg::where('MSG_NO', '2000')->pluck('MSG_CONT')->first();
                    // 確認処理
                    if ($check == false) {
                        $fail($msg_2000);
                    }
                }
            ],

            // E-3 チェック1(必須入力)
            'txtNewPassword' => [
               'required',
                function ($attribute, $value, $fail) {
                    // SessionでログインIDの取得
                    $loginUserId = session('id');
                    // 現パスワード取得
                    $Pass1 =  FormRequest::get('txtPassword');
                    // E-3チェック2 [MT11_LOGIN.PASSWORD]取得
                    $check2 = MT11Login::where(['LOGIN_ID' =>  $loginUserId])
                                       ->where(['PASSWORD' => $Pass1])
                                       ->pluck('PASSWORD')
                                       ->first();

                    // 4023メッセージ取得（現Passと異なるPassを入力)
                    $msg_4024 = MT99Msg::where('MSG_NO', '4024')->pluck('MSG_CONT')->first();

                    // $value= 入力した変更時Pass
                    // [MT11_LOGIN.PASSWORD]と入力された変更時Passが同一時エラー
                    if ($check2 === $value) {
                        $fail($msg_4024);
                    }
                },
            ],

            // E-4(必須入力), E-5(Pass一致)
            'txtRePassword' => ['required' , 'same:txtNewPassword' ]
        ];

        return $rules;
    }

    public function messages()
    {
        // 2002メッセージ取得（必須入力項目です)
        $msg_2002 = MT99Msg::where('MSG_NO', '2002')->pluck('MSG_CONT')->first();
        // 4024メッセージ(同じPassを入力してください)
        $msg_4023 = MT99Msg::where('MSG_NO', '4023')->pluck('MSG_CONT')->first();

        return [
            'txtPassword.required' => $msg_2002,
            'txtNewPassword.required' => $msg_2002,
            'txtRePassword.required' => $msg_2002 ,
            'txtRePassword.same' => $msg_4023
        ];
    }
}
