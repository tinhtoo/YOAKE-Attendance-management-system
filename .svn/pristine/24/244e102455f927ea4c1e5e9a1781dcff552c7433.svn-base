<?php

namespace App\Http\Requests;

use App\Models\MT99Msg;
use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class WorkTimeFixUpdateRequest extends BaseRequest
{
    public function rules()
    {
        return $rules = [
            'year' => ['required', parent::ymCheckForAjax('year', 'month')],
            'closingDateCd' => ['required',],
            'dept_cd' => ['required',],
        ];
    }

    public function messages()
    {
        // 2002メッセージ取得（必須入力項目です)
        $required_msg = MT99Msg::where('MSG_NO', '2002')->pluck('MSG_CONT')->first();
        // 4002メッセージ取得（チェックが全てオフの時は更新できません。)
        $no_check_msg = MT99Msg::where('MSG_NO', '4002')->pluck('MSG_CONT')->first();
        // 年月締日が無い場合不正なリクエストのため、エラー表示なしで終了する。
        return [
            'year.required' => $required_msg,
            'month.required' => $required_msg,
            'closingDateCd.required' => $required_msg,
            'dept_cd.required' => $no_check_msg,
        ];
    }
}
