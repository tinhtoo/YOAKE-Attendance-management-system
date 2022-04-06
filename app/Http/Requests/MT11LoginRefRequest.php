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
            'filter.txtDeptCd' =>[ 
                'nullable',
                function ($attribute, $value, $fail) {

                    //**チェック1処理（E-1） */
                    $check = MT10Emp::where(['DEPT_CD' => $value])->exists();

                    $msg_2000 = MT99Msg::where('MSG_NO', '2000')->pluck('MSG_CONT')->first();
                    
                    //** 判定処理 */
                    if (!($check)) {
                        $fail($msg_2000);
                    }
                },
            ],
            // 'txtLoginId' =>[
            //     // 'required',
            //     // 'regex:/^[a-zA-Z0-9ａ-ｚA-Z\-+=^$*.\[\]{}()?\"!@#%&\/\\\\,><\':;_~`\-+=]+$/',
            //     // 'regex:(?=.*[\-+=^$*.\[\]{}()?\"!@#%&\/\\\\,><\':;|_~`\-+=])',
            //     function($attribute, $value, $fail){
            //         //現パスワード取得
            //         $empCd =  FormRequest::get('txtEmpCd');
            //         // dd($empId);
            //         $check = MT11Login::where('LOGIN_ID', $value)->where('EMP_CD', '<>', $empCd)->exists();
            //         // dd($check);
            //         //2022メッセージ取得（既に使用されているログインIDです。)
            //         $msg_2022 = MT99Msg::where('MSG_NO', '2022')->pluck('MSG_CONT')->first();
            //         //2002メッセージ取得（必須入力項目です)
            //         $msg_2002 = MT99Msg::where('MSG_NO', '2002')->pluck('MSG_CONT')->first();

            //         //[MT11_LOGIN.LOGIN_ID]と入力された変更時Passが同一時エラー
            //         if ($check) {                        
            //             $fail($msg_2022);
            //         }

            //         //空白の場合2002メッセージエラー （必須入力項目です)*/
            //         if (empty($value)) {
            //             $fail($msg_2002);
            //         }
            //     }
            // ],
            // 'txtLoginId' =>
            //     ' regex:/^[a-zA-Z0-9]+$/'
            
            // 'txtNewPassword' =>[
            //     'required'
            // ],
            // 'txtNewPassword1' =>[
            //     'required',
            //     function(){
            //         $password_1 =  FormRequest::get('txtNewPassword');
            //         dd($password_1);
            //     }
            // ],
            

            // 'filter.txtEmpKana' =>[ 
            //     'nullable'
            // ]    
        ];
        return $rules;
    }
    

    public function messages()
    {
        //2000メッセージ取得該当データが存在しません
        $msg_2000 = MT99Msg::where('MSG_NO', '2000')->pluck('MSG_CONT')->first();
        //2002メッセージ取得（必須入力項目です)
        $msg_2002 = MT99Msg::where('MSG_NO', '2002')->pluck('MSG_CONT')->first(); 
        //2022メッセージ取得（既に使用されているログインIDです。)
        $msg_2022 = MT99Msg::where('MSG_NO', '2022')->pluck('MSG_CONT')->first();

        $msg_4001 = MT99Msg::where('MSG_NO', '4001')->pluck('MSG_CONT')->first();
        // dd($msg_all);
        // return [
        //     'txtPassword.required' => $msg_2002,           
        //     'txtLoginId' => $msg_2022,
        //     // 'txtRePassword.required' => $msg_2002 ,
        //     // 'txtRePassword.same' => $msg_4023   
        // ];
        return [
            'filter.txtDeptCd.nullable' => $msg_2000,
            // 'txtPassword.required' => $msg_2002,
            'txtLoginId.required' => $msg_2022,
            'txtLoginId.required' => $msg_2002,
            // 'txtNewPassword.required' => $msg_2002
            'txtLoginId.regex' => $msg_4001,
            ];
    }
}
