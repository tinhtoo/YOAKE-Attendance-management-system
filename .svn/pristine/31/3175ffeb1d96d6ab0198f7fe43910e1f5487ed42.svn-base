<?php

namespace App\Http\Requests;

use App\Models\MT10Emp;
use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class MT10EmpEditRequest extends BaseRequest
{
    public function rules()
    {
        return $rules = [
            'EMP_CD' => [
                'required',
                'regex:/^[a-zA-Z0-9]+$/',
                function ($attribute, $value, $fail) {
                    $input_data = $this->all();
                    $changeEmpCd = $input_data['change'];
                    $check = MT10Emp::where('EMP_CD', $value)->exists();
                    if ($changeEmpCd == null && $check) {
                        // 2001メッセージ取得（該当データが存在します。)
                        $fail('2001');
                    } elseif ($changeEmpCd != null && !$check) {
                        // 更新時、更新前データなし
                        // 2000メッセージ取得（該当データが存在しません。)
                        $fail('2000');
                    }
                }
            ],
            'EMP_NAME' => [
                'required',
                'regex:/^[^|]+$/',
            ],
            'EMP_KANA' => ['required',],
            'DEPT_CD' => [
                'required',
                parent::existDeptCdWithAuth('01', false),
            ],
            'ENT_DATE' => ['nullable', parent::validYear()],
            'RET_DATE' => ['nullable', parent::validYear()],
            'REG_CLS_CD' => ['required',],
            'BIRTH_DATE' => ['nullable', parent::validYear()],
            'SEX_CLS_CD' => ['required',],
            'EMP_CLS1_CD' => ['required',],
            'EMP_CLS2_CD' => ['required',],
            'CALENDAR_CD' => ['required',],
            'PH_GRANT_YM' => ['nullable', parent::validYM()],
            'CLOSING_DATE_CD' => ['required',],
        ];
    }


    public function messages()
    {
        // 2002（必須入力項目です。）
        // 2025（英数字以外の文字が含まれています。）
        // 4001（禁則文字([|])が含まれています。）

        return [
            'EMP_CD.required' => '2002',
            'EMP_CD.regex' => '2025',
            'EMP_NAME.required' => '2002',
            'EMP_NAME.regex' => '4001',
            'EMP_KANA.required' => '2002',
            'DEPT_CD.required' => '2002',
            'REG_CLS_CD.required' => '2002',
            'SEX_CLS_CD.required' => '2002',
            'EMP_CLS1_CD.required' => '2002',
            'EMP_CLS2_CD.required' => '2002',
            'CALENDAR_CD.required' => '2002',
            'CLOSING_DATE_CD.required' => '2002',
        ];
    }
}
