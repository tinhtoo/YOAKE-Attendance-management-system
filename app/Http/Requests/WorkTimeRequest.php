<?php

namespace App\Http\Requests;

use App\Models\MT99Msg;
use App\Models\MT10Emp;
use App\Models\MT11Login;
use App\Models\MT12Dept;
use App\Models\MT13DeptAuth;
use Illuminate\Foundation\Http\FormRequest;

class WorkTimeRequest extends FormRequest
{


    public function rules()
    {

        $rules = [];

        $rules = [
            'txtEmpCd' => [
                'required',
                function ($attribute, $value, $fail) {

                    //** SessionでログインIDの取得 */
                    $loginUser2 = session('id');
                    //dd($loginUser2);

                    //** ログインIDより社員CD取得 */
                    $emp_cd = MT11Login::where(['LOGIN_ID' => $loginUser2])->pluck('EMP_CD')->first();

                    //** ログイン社員の所属部門取得（A-2） */
                    $dept_cd = MT10Emp::join('MT11_LOGIN', 'MT10_EMP.EMP_CD', '=', 'MT11_LOGIN.EMP_CD')
                        ->where('MT11_LOGIN.EMP_CD', $emp_cd)
                        ->pluck('DEPT_CD')->first();

                    //** ログイン社員の部門権限取得（A-3） */
                    $dept_auth_cd = MT10Emp::join('MT11_LOGIN', 'MT10_EMP.EMP_CD', '=', 'MT11_LOGIN.EMP_CD')
                        ->where('MT11_LOGIN.EMP_CD', $emp_cd)
                        ->pluck('DEPT_AUTH_CD')->first();

                    //** ログイン社員の権限部門の取得（A-4） */
                    $dispcls_cd = MT12Dept::where('MT12_DEPT.DEPT_CD', $dept_cd)
                        ->where('DISP_CLS_CD', '=', '01')
                        ->pluck('DISP_CLS_CD')->first();

                    $dept_auth = MT13DeptAuth::leftjoin('MT12_DEPT', 'MT13_DEPT_AUTH.DEPT_CD', '=', 'MT12_DEPT.DEPT_CD')
                        ->where('DISP_CLS_CD', $dispcls_cd)
                        ->pluck('MT13_DEPT_AUTH.DEPT_CD')->all();

                    //**チェック２処理（E-2） */
                    $check_2 = MT10Emp::select('EMP_CD')->where(['EMP_CD' => $value])->where('REG_CLS_CD', '<>', '02')->exists();

                    //**チェック３処理（E-3） */
                    $for_check2 = MT10Emp::where(['EMP_CD' => $value])->pluck('DEPT_CD')->first();

                    $array_2 = array($for_check2);

                    $DeptCdCompare = array_intersect($dept_auth, $array_2);

                    $msg_2000 = MT99Msg::where('MSG_NO', '2000')->pluck('MSG_CONT')->first();
                    
                    //** 判定処理 */
                    if ((!$check_2) && (($value <> $emp_cd) && (empty($DeptCdCompare)))) {
                        $fail($msg_2000);
                    }
                },
            ]
        ];
        return $rules;
    }

    public function messages()
    {
        $msg_2002 = MT99Msg::where('MSG_NO', '2002')->pluck('MSG_CONT')->first();
        return [
            'txtEmpCd.required' => $msg_2002

        ];
    }
}
