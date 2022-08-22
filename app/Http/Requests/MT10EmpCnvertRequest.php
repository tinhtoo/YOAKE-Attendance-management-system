<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\MT99Msg;
use App\Models\MT10Emp;
use App\Models\MT11Login;
use App\Models\MT13DeptAuth;

class MT10EmpCnvertRequest extends FormRequest
{
    public function rules()
    {

        $rules = [];

        $rules = [
            'txtEmpCd' => [
                'required',
                function ($attribute, $value, $fail) {
                    $loginUser = session('id');

                    // FormRequestで入力された社員番号の取得 */
                    $oldEmpCd = FormRequest::get('txtEmpCd');

                    // 入力された社員番号より在籍区分コードを全取得 */
                    $empRegClsCd = MT10Emp::where('MT10_EMP.EMP_CD', $value)->pluck('EMP_NAME')->all();

                    // ログインIDより社員CD取得-(1)
                    $emp_cd = MT11Login::where(['LOGIN_ID' => $loginUser])->pluck('EMP_CD')->first();

                    // ログイン社員の所属部門取得-(2)
                    $dept_authCd = MT10Emp::join('MT11_LOGIN', 'MT10_EMP.EMP_CD', '=', 'MT11_LOGIN.EMP_CD')
                        ->where('MT10_EMP.EMP_CD', $emp_cd)
                        ->pluck('DEPT_AUTH_CD')->first();

                    // ログイン社員の部門権限コード取得-(3)
                    $dept_Cd = MT13DeptAuth::where('MT13_DEPT_AUTH.DEPT_AUTH_CD', $dept_authCd)
                                            ->pluck('DEPT_CD')
                                            ->all();

                    // {旧社員番号}で部門コードを取得-(4)
                    $searchDepCd = MT10Emp::where(['EMP_CD' => $oldEmpCd])->pluck('DEPT_CD')->first();
                    $arrSearhDep = array($searchDepCd);

                    // エラーチェック「該当データの抽出」(5)
                    $check3 = array_intersect($dept_Cd, $arrSearhDep);

                    // 各エラーメッセージの取得
                    $msg_2000 = MT99Msg::where('MSG_NO', '2000')->pluck('MSG_CONT')->first();
                    $msg_2002 = MT99Msg::where('MSG_NO', '2002')->pluck('MSG_CONT')->first();
                    $msg_4034 = MT99Msg::where('MSG_NO', '4034')->pluck('MSG_CONT')->first();

                    // 空白の場合2002メッセージエラー
                    if (empty($oldEmpCd)) {
                        $fail($msg_2002);
                    }

                    // {旧社員番号}で該当データ有無の確認
                    if (empty($empRegClsCd)) {
                        $fail($msg_2000);
                    }

                    // 該当データ存在確認処理
                    if (empty($check3)) {
                        $fail($msg_2000);
                    };

                    // ログイン中社員IDと入力した社員IDの確認
                    if ($oldEmpCd === $emp_cd) {
                        $fail($msg_4034);
                    }
                }

            ],

            'txtNewEmpCd' => [
                'required',
                function ($attribute, $value, $fail) {
                    $newEmpCd = FormRequest::get('txtNewEmpCd');
                    // {新社員番号}で検索し社員名取得
                    $newEmpRegClsCd = MT10Emp::where('MT10_EMP.EMP_CD', $newEmpCd)->pluck('EMP_NAME')->all();
                    // dd($newEmpRegClsCd);
                    $msg_4033 = MT99Msg::where('MSG_NO', '4033')->pluck('MSG_CONT')->first();
                    // {新社員番号}で検索し該当データの確認
                    if ($newEmpRegClsCd) {
                        $fail($msg_4033);
                    }
                }
            ]

        ];

        return $rules;
    }

    public function messages()
    {
        // 2001メッセージ取得（該当データ存在しません。)
        $msg_2000 = MT99Msg::where('MSG_NO', '2000')->pluck('MSG_CONT')->first();
        // 2002メッセージ取得（必須入力項目です)
        $msg_2002 = MT99Msg::where('MSG_NO', '2002')->pluck('MSG_CONT')->first();
        // 4034メッセージ取得(ログイン中の社員番号です。)
        $msg_4034 = MT99Msg::where('MSG_NO', '4034')->pluck('MSG_CONT')->first();
        // 4033メッセージ取得(登録済みの社員番号です。)
        $msg_4033 = MT99Msg::where('MSG_NO', '4033')->pluck('MSG_CONT')->first();

        return [
            'txtEmpCd.required' => $msg_2002,
            'txtEmpCd' => $msg_2000,
            'txtEmpCd' => $msg_4034,
            'txtNewEmpCd.required' => $msg_2002,
            'txtNewEmpCd' => $msg_4033
        ];
    }
}
