<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\MT99Msg;
use App\Models\MT10Emp;

class MT02CalendarPtnDelRequest extends FormRequest
{
    public function rules()
    {
        $rules = [];

        $rules = [
            'CalendarCd' => [
                function ($attribute, $value, $fail) {
                    // チェック２処理（CD-4017）'社員情報で使用されているので削除できません。'
                    $exitCheck = MT10Emp::where(['CALENDAR_CD' => $value])->exists();
                    if ($exitCheck) {
                        $fail('4017');
                    }
                },
            ]
        ];
        return $rules;
    }
}
