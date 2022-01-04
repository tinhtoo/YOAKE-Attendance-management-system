<?php

namespace App\Repositories\Search;

use Illuminate\Http\Request;

use App\Models\TR01Work;
use App\Models\MT10Emp;
use App\Models\MT99Msg;
use App\Models\MT11Login;
use App\Models\MT13DeptAuth;
use App\Models\MT12Dept;
use App\Filters\MT10EmpSearchFilter;
use App\Http\Requests\MT10EmpSearchRequest;


class MT10EmpSearchRepository
{
    // public function initialsearch()
    // {
    //     //** SessionでログインIDの取得 */
    //     $loginUser = session('id');
    //     //dd($loginUser2);

    //     //** ログインIDより社員CD取得 */
    //     $emp_cd = MT11Login::where(['LOGIN_ID' => $loginUser])->pluck('EMP_CD')->first();
        
    //     //** ログイン社員の所属部門取得（1） */
    //     $dept_auth_cd = MT10Emp::where('EMP_CD', $emp_cd)
    //         ->pluck('DEPT_AUTH_CD')->first();
    //     //dd($dept_auth_cd);
    //     //** DEPT_CDを取得する(2) */
    //     $dept_cd = MT13DeptAuth::where('DEPT_AUTH_CD', $dept_auth_cd)
    //         ->pluck('DEPT_CD')->first();
        
    //     //** 登録している社員チェック */
    //     $emp_check = MT10Emp::where('MT10_EMP.DEPT_CD', $dept_cd)
    //         ->get();
            
    //     return $emp_check;
    //     // dd($emp_check);

        
    // }

    // public function initialsearch()
    // {
        // //** SessionでログインIDの取得 */
        // $loginUser = session('id');

        // //** ログインIDより社員CD取得 */
        // $emp_cd = MT11Login::where(['LOGIN_ID' => $loginUser])->pluck('EMP_CD')->first();
        
        // //** ログイン社員の所属部門取得（1） */
        // $dept_auth_cd = MT10Emp::where('EMP_CD', $emp_cd)
        //     ->pluck('DEPT_AUTH_CD')->first();

        // //** DEPT_CDを取得する(2) */
        // $dept_cd = MT13DeptAuth::where('DEPT_AUTH_CD', $dept_auth_cd)
        //     ->pluck('DEPT_CD')->first();
        
        // //** 登録している社員チェック */
        // $emp_check = MT10Emp::where('MT10_EMP.DEPT_CD', $dept_cd)
        //     ->get();

    //     $ini_search = MT10Emp::join('MT12_DEPT', 'MT10_EMP.DEPT_CD', '=', 'MT12_DEPT.DEPT_CD')
    //         ->join('MT02_CALENDAR_PTN', 'MT10_EMP.CALENDAR_CD', '=', 'MT02_CALENDAR_PTN.CALENDAR_CD')
    //         ->where('REG_CLS_CD', '<>', 02)
    //         ->select('MT10_EMP.*','MT12_DEPT.DEPT_NAME')
    //         ->get();
            
    //     return $ini_search;
    // }

    public function search(MT10EmpSearchRequest $request, MT10EmpSearchFilter $filter)
    {
        $query = MT10Emp::join('MT12_DEPT', 'MT10_EMP.DEPT_CD', '=', 'MT12_DEPT.DEPT_CD')
        ->join('MT02_CALENDAR_PTN', 'MT10_EMP.CALENDAR_CD', '=', 'MT02_CALENDAR_PTN.CALENDAR_CD')
        ->where('MT10_EMP.REG_CLS_CD', '<>', 02)
        ->filter($filter)
        ->orderBy('EMP_CD');
        if (isset($_GET['button_A'])) {

            $Agyou = '[ァ-オ]';

            $query->where('MT10_EMP.EMP_KANA', 'like', "{$Agyou}%");
        }

        if (isset($_GET['button_KA'])) {

            $KAgyou = '[カ-ゴ]';

            $query->where('EMP_KANA', 'like', "{$KAgyou}%");
        }

        if (isset($_GET['button_SA'])) {

            $SAgyou = '[サ-ゾ]';

            $query->where('EMP_KANA', 'like', "{$SAgyou}%");
        }

        if (isset($_GET['button_TA'])) {

            $TAgyou = '[タ-ド]';

            $query->where('EMP_KANA', 'like', "{$TAgyou}%");
        }

        if (isset($_GET['button_NA'])) {

            $NAgyou = '[ナ-ノ]';

            $query->where('EMP_KANA', 'like', "{$NAgyou}%");
        }

        if (isset($_GET['button_HA'])) {

            $HAgyou = '[ハ-ポ]';

            $query->where('EMP_KANA', 'like', "{$HAgyou}%");
        }

        if (isset($_GET['button_MA'])) {

            $MAgyou = '[マ-モ]';

            $query->where('EMP_KANA', 'like', "{$MAgyou}%");
        }

        if (isset($_GET['button_YA'])) {

            $YAgyou = '[ャ-ヨ]';

            $query->where('EMP_KANA', 'like', "{$YAgyou}%");
        }

        if (isset($_GET['button_RA'])) {

            $RAgyou = '[ラ-ロ]';

            $query->where('EMP_KANA', 'like', "{$RAgyou}%");
        }

        if (isset($_GET['button_WA'])) {

            $WAgyou = '[ヮ-ン]';

            $query->where('EMP_KANA', 'like', "{$WAgyou}%");
        }

        if (isset($_GET['button_EN'])) {

            $EN = '[a-zA-Z]';

            $query->where('EMP_KANA', 'like', "{$EN}%");
        }


        $query_results = $query->select('MT10_EMP.*','MT12_DEPT.DEPT_NAME')->paginate(20);
        return $query_results;
    }

    public function messages()
    {
        $msg_2000 = MT99Msg::where('MSG_NO', '2000')->pluck('MSG_CONT')->first();
        return $msg_2000;
    }
}
