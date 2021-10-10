<?php
namespace App\Http\Requests;
use App\Models\MT99Msg;
use App\Models\MT10Emp;
use Illuminate\Foundation\Http\FormRequest;

class WorkTimeRequest extends FormRequest
{


    public function rules() {

        $rules = [];

        $rules = [
            'txtEmpCd' => [
                'required',
                function ($attribute, $value, $fail) {
                    $emp = MT10Emp::where('EMP_CD', $value)->first();
                    $err =  MT99Msg::where('MSG_NO', '2001')->pluck('MSG_CONT')->first();
                    if (empty($emp)) {
                        $fail($err);
                    }
                },
            ]
        ];
        return $rules;
    }

    public function messages() {
        return [
            'txtEmpCd.required' => MT99Msg::where('MSG_NO', '2000')->pluck('MSG_CONT')->first()
           
        ];
    }

}
