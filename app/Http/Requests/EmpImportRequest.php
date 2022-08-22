<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;
use App\Models\MT01Control;

class EmpImportRequest extends BaseRequest
{
    public function rules()
    {
        return $rules = [
            'csvFile' => [ 'required',
                function ($attribute, $value, $fail) {
                    // 拡張子がCSVであるかの確認
                    if ($this->file('csvFile')->getClientOriginalExtension() !== "csv") {
                        // 4038'拡張子が違います。'
                        $fail('4038');
                        return;
                    }
                    // ファイルのパスを取得
                    $mt01_control_path = MT01Control::where('CONTROL_CD', '=', '1')
                                    ->pluck('EMPFILE_PATH')
                                    ->first();

                    if (!\is_dir($mt01_control_path)) {
                        // '4037' 取込先のパスが存在しません。
                        $fail('4037');
                        return;
                    }
                }
            ],
        ];
    }

    public function messages()
    {
        // 「2011:ファイルが存在しません。」
        return [
            'csvFile.required' => '2011',
        ];
    }
}
