<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class ShiftCalendarCarryOverUpdateRequest extends BaseRequest
{
    public function rules()
    {
        return $rules = [
            'yearMonth' => ['required', parent::validYM()],
            'closingDateCd' => ['required',],
            'dept_cd' => ['required',],
        ];
    }

    public function messages()
    {
        // 2002メッセージ取得（必須入力項目です)
        // 4002メッセージ取得（チェックが全てオフの時は更新できません。)
        // 年月締日が無い場合不正なリクエストのため、エラー表示なしで終了する。
        return [
            'yearMonth.required' => '2002',
            'closingDateCd.required' => '2002',
            'dept_cd.required' => '4002',
        ];
    }
}
