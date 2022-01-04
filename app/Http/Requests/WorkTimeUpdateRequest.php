<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Models\MT99Msg;

class WorkTimeUpdateRequest extends FormRequest
{


    public function rules()
    {
        $rules = [];

        $rules = [
            
            'worktime.*.OFC_TIME' => 'date_format:H:i'
        ];
        return $rules;
    }

    public function messages()
    {
        $msg_2003 = MT99Msg::where('MSG_NO', '2003')->pluck('MSG_CONT')->first();
        return [
            'worktime.*.OFC_TIME.required' => $msg_2003

        ];
    }
}
