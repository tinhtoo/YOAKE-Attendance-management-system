<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;
use App\Models\MT99Msg;
use App\Models\TR02EmpCalendar;
use App\Models\TR03DeptCalendar;
use Carbon\Carbon;

class MT04ShiftPtnDeleteRequest extends BaseRequest
{
    public function rules()
    {
        return $rules = [
            'shiftPtnCd' => [ 'required',
                function ($attribute, $value, $fail) {
                    $date3 = Carbon::now()->startOfMonth()->subMonth(3);
                    $date2 = Carbon::now()->startOfMonth()->subMonth(2);
                    $date1 = Carbon::now()->startOfMonth()->subMonth(1);
                    $now = Carbon::now()->startOfMonth();

                    // 4031 シフト月次更新処理で使用するため削除できません。
                    $tr02_exist = TR02EmpCalendar::where('LAST_PTN_CD', $value)
                                                ->where(function ($q) use ($date3) {
                                                    $q->where('CALD_YEAR', $date3->year)
                                                    ->orWhere('CALD_MONTH', $date3->month);
                                                })
                                                ->where(function ($q) use ($date2) {
                                                    $q->where('CALD_YEAR', $date2->year)
                                                    ->orWhere('CALD_MONTH', $date2->month);
                                                })
                                                ->where(function ($q) use ($date1) {
                                                    $q->where('CALD_YEAR', $date1->year)
                                                    ->orWhere('CALD_MONTH', $date1->month);
                                                })
                                                ->where(function ($q) use ($now) {
                                                    $q->where('CALD_YEAR', $now->year)
                                                    ->orWhere('CALD_MONTH', $now->month);
                                                })
                                                ->exists();
                    if ($tr02_exist) {
                        // 社員別カレンダー情報存在チェック
                        $msg_4031 = MT99Msg::where('MSG_NO', '4031')->pluck('MSG_CONT')->first();
                        $fail($msg_4031);
                        return ;
                    }
                    $tr03_exist = TR03DeptCalendar::where('LAST_PTN_CD', $value)
                                                ->where(function ($q) use ($date3) {
                                                    $q->where('CALD_YEAR', $date3->year)
                                                    ->orWhere('CALD_MONTH', $date3->month);
                                                })
                                                ->where(function ($q) use ($date2) {
                                                    $q->where('CALD_YEAR', $date2->year)
                                                    ->orWhere('CALD_MONTH', $date2->month);
                                                })
                                                ->where(function ($q) use ($date1) {
                                                    $q->where('CALD_YEAR', $date1->year)
                                                    ->orWhere('CALD_MONTH', $date1->month);
                                                })
                                                ->where(function ($q) use ($now) {
                                                    $q->where('CALD_YEAR', $now->year)
                                                    ->orWhere('CALD_MONTH', $now->month);
                                                })
                                                ->exists();
                    if ($tr03_exist) {
                        // 部門別カレンダー情報存在チェック
                        $msg_4031 = MT99Msg::where('MSG_NO', '4031')->pluck('MSG_CONT')->first();
                        $fail($msg_4031);
                        return ;
                    }
                }
            ],
        ];
    }

    public function messages()
    {
        // 2002メッセージ取得（必須入力項目です)
        $msg_2002 = MT99Msg::where('MSG_NO', '2002')->pluck('MSG_CONT')->first();
        return [
            'shiftPtnCd.required' => $msg_2002,
        ];
    }
}
