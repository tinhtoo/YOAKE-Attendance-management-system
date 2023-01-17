<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MT06OverTmLmtEditorRequest extends BaseRequest
{
    public function rules(){
        $rules = [
            'Ovtm1Cd' => [$this->requiredOvtmCd('Ovtm1Cd', 'Ovtm1Hr')] ,
            'Ovtm2Cd' => [$this->requiredOvtmCd('Ovtm2Cd', 'Ovtm2Hr')] ,
            'Ovtm3Cd' => [$this->requiredOvtmCd('Ovtm3Cd', 'Ovtm3Hr')] ,
            'Ovtm4Cd' => [$this->requiredOvtmCd('Ovtm4Cd', 'Ovtm4Hr')] ,
            'Ovtm5Cd' => [$this->requiredOvtmCd('Ovtm5Cd', 'Ovtm5Hr')] ,
            'Ovtm6Cd' => [$this->requiredOvtmCd('Ovtm6Cd', 'Ovtm6Hr')] ,
        ];

        return $rules;
    }
}
