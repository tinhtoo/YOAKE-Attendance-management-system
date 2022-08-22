<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;

class MT03CalendarSearchRequest extends BaseRequest
{
    public function rules()
    {
        return $rules = [
            'filter.caldYearMonth' => ['required', parent::validYM()],
        ];
    }


    public function messages()
    {
        return [
            'filter.caldYearMonth.required' => '2002',
        ];
    }
}
