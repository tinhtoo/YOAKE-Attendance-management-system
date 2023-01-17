<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;

class MT07FractionRequest extends BaseRequest
{
    public function rules()
    {
        return $rules = [
            'overTime.*' =>[
                // 必須入力項目です。
                parent::fractionRequiredThereIsNoInput('ovtCD', 'ovtUnderMi', 'ovtFrcClsCd'),
                // '項目が重複しています。'
                parent::fractionDuplicateItems('ovtCD', 'overTime'),
            ],
            'extraTime.*' =>[
                // 必須入力項目です。
                parent::fractionRequiredThereIsNoInput('extCD', 'extUnderMi', 'extFrcClsCd'),
                // '項目が重複しています。'
                parent::fractionDuplicateItems('extCD', 'extraTime'),
            ],
            'wthrOverTime' =>
                // 必須入力項目です。
                parent::fractionCheckRequiredAll(),
            'lthrOverTime' =>
                // 必須入力項目です。
                parent::fractionCheckRequiredAll(),
            'erhrOverTime' =>
                // 必須入力項目です。
                parent::fractionCheckRequiredAll(),
            'othrOverTime' =>
                // 必須入力項目です。
                parent::fractionCheckRequiredAll(),
            'wttmExtraTime' =>
                // 必須入力項目です。
                parent::fractionCheckRequiredAll(),
            'lvtmExtraTime' =>
                // 必須入力項目です。
                parent::fractionCheckRequiredAll(),
            'ottmExtraTime' =>
                // 必須入力項目です。
                parent::fractionCheckRequiredAll(),
            'retmExtraTime' =>
                // 必須入力項目です。
                parent::fractionCheckRequiredAll(),
        ];
    }
}
