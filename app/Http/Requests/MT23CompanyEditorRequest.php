<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * 更新の時入力された所属情報入力内容確認
 * @return エラーメッセージ(msg_2002)
 */
class MT23CompanyEditorRequest extends FormRequest
{
    public function rules()
    {

        $rules = [];

        $rules = [
            'companyName' => ['required'],
            'companyKana' => ['required'],
            'companyAbr' => ['required'],
        ];
        return $rules;
    }

    public function messages()
    {
        // 2002メッセージ取得（必須入力項目です)

        return [
            'companyName.required' => '2002',
            'companyKana.required' => '2002',
            'companyAbr.required' => '2002'
        ];
    }
}
