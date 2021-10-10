<?php
namespace App\Http\Requests;
use App\Models\MT99Msg;
use Illuminate\Foundation\Http\FormRequest;

class WorkTimeRequest extends FormRequest
{


    public function rules() {

        $rules = [];

        $rules = [
            'txtEmpCd' => 'required',
        ];
        return $rules;
    }

    public function messages() {
        return [
            'txtEmpCd.required' => MT99Msg::where('MSG_NO', '2000')->pluck('MSG_CONT')->first()
        ];
    }

}
