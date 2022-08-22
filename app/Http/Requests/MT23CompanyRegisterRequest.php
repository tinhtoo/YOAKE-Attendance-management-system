<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\MT23Company;

/**
 * 登録の時入力された所属情報入力内容確認
 * @return エラーメッセージ(msg_2001,msg_2002)
 */
class MT23CompanyRegisterRequest extends FormRequest
{
    public function rules()
    {

        $rules = [];

        $rules = [
            'companyCd' => [
                'required',
                function ($attribute, $value, $fail) {

                    // Sessionで入力された所属番号の取得
                    $regCompanyCd = FormRequest::get('companyCd');

                    // 入力された所属番号より所属CDをチェック
                    $companyCd = MT23Company::where('COMPANY_CD', $regCompanyCd)->pluck('COMPANY_CD')->first();

                    // 該当データ存在確認処理
                    if ($regCompanyCd == $companyCd) {
                        $fail('2001');
                    };
                },
            ],
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
            'companyCd.required' => '2002',
            'companyName.required' => '2002',
            'companyKana.required' => '2002',
            'companyAbr.required' => '2002',
        ];
    }
}
