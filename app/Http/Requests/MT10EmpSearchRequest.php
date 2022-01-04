<?php

namespace App\Http\Requests;

use App\Models\MT99Msg;
use App\Models\MT12Dept;
use Illuminate\Foundation\Http\FormRequest;

class MT10EmpSearchRequest extends FormRequest
{

    public function rules()
    {

        $rules = [];

        $rules = [
            'filter.txtDeptCd' =>[ 
                'nullable',
                function ($attribute, $value, $fail) {

                    //**チェック1処理（E-1） */
                    $check = MT12Dept::where(['DEPT_CD' => $value])->exists();

                    $msg_2000 = MT99Msg::where('MSG_NO', '2000')->pluck('MSG_CONT')->first();
                    
                    //** 判定処理 */
                    if (!($check)) {
                        $fail($msg_2000);
                    }
                },
            ],
            'filter.txtEmpKana' =>[ 
                'nullable'
            ]    
        ];
        return $rules;
    }
    

    public function messages()
    {
        return [

        ];
    }
}
