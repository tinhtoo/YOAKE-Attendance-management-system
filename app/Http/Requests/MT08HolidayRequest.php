<?php

namespace App\Http\Requests;

use App\Models\MT99Msg;
use App\Http\Requests\BaseRequest;

class MT08HolidayRequest extends BaseRequest
{
    public function rules()
    {
        return $rules = [
            'nationalHolidays.*.nameNat' => ['required'],
            'companyHolidays.*.nameCom' => ['required'],
            'nationalHolidays.*' => [
                function ($attribute, $value, $fail) {
                    if (empty($value)) {
                        return;
                    }

                    $inputdata = $this->all();
                    $dataNationalHolidays = $inputdata['nationalHolidays'];

                    $count = 0;

                    foreach ($dataNationalHolidays as $dataNationalHoliday) {
                        if ($dataNationalHoliday['monthNat'].$dataNationalHoliday['dayNat'] === $value['monthNat'].$value['dayNat']) {
                            $count++;
                            if ($count > 1) {
                                // 4000,'日付が重複しています。'
                                $msg_4000 = MT99Msg::where('MSG_NO', '4000')->pluck('MSG_CONT')->first();
                                $fail($msg_4000);
                                return;
                            }
                        }
                    }
                }
            ],
            'companyHolidays.*' => [
                function ($attribute, $value, $fail) {
                    if (empty($value)) {
                        return;
                    }

                    $inputdata = $this->all();
                    $dataCompanyHolidays = $inputdata['companyHolidays'];

                    $count = 0;

                    foreach ($dataCompanyHolidays as $dataCompanyHoliday) {
                        if ($dataCompanyHoliday['monthCom'].$dataCompanyHoliday['dayCom'] === $value['monthCom'].$value['dayCom']) {
                            $count++;
                            // 4000,'日付が重複しています。'
                            if ($count > 1) {
                                $msg_4000 = MT99Msg::where('MSG_NO', '4000')->pluck('MSG_CONT')->first();
                                $fail($msg_4000);
                                return;
                            }
                        }
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
            'nationalHolidays.*.nameNat.required' => $msg_2002,
            'companyHolidays.*.nameCom.required' => $msg_2002
         ];
    }
}
