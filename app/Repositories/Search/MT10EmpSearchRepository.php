<?php

namespace App\Repositories\Search;

use Illuminate\Http\Request;

use App\Models\MT10Emp;
use App\Filters\MT10EmpSearchFilter;
use App\Repositories\Master\MT11LoginRefRepository;
use App\Repositories\MT13DeptAuthRepository;

class MT10EmpSearchRepository
{
    public function search(MT10EmpSearchFilter $filter, $reg_cls_cd = null, $is_dept_auth = false, $calendar_cls_cd = null)
    {
        // 社員検索条件を作成
        $query = MT10Emp::join('MT12_DEPT', 'MT10_EMP.DEPT_CD', '=', 'MT12_DEPT.DEPT_CD')
        ->when(!is_null($calendar_cls_cd), function ($q) use ($calendar_cls_cd) {
            $q->join('MT02_CALENDAR_PTN', 'MT10_EMP.CALENDAR_CD', '=', 'MT02_CALENDAR_PTN.CALENDAR_CD')
              ->where('MT02_CALENDAR_PTN.CALENDAR_CLS_CD', $calendar_cls_cd);
        })
        ->when(!is_null($reg_cls_cd), function ($q) use ($reg_cls_cd) {
            $q->whereIn('MT10_EMP.REG_CLS_CD', explode(",", $reg_cls_cd));
        })
        ->when($is_dept_auth, function ($query) {
            // 部門権限チェック
            $login_id = session('id');
            $login_emp_cd = (new MT11LoginRefRepository())->getEmpCd($login_id);
            $view_dept = (new MT13DeptAuthRepository())->getChangeableDept($login_id);

            $query->where(function ($q) use ($view_dept, $login_emp_cd) {
                $q->whereIn('MT10_EMP.DEPT_CD', $view_dept)
                    ->orWhere('MT10_EMP.EMP_CD', $login_emp_cd);
            });
        })
        ->filter($filter)
        ->orderBy('EMP_CD');

        if (isset($_GET['button_A'])) {
            $query->where('MT10_EMP.EMP_KANA', 'like', "[ァ-オ]%");
        } elseif (isset($_GET['button_KA'])) {
            $query->where('MT10_EMP.EMP_KANA', 'like', "[カ-ゴ]%");
        } elseif (isset($_GET['button_SA'])) {
            $query->where('MT10_EMP.EMP_KANA', 'like', "[サ-ゾ]%");
        } elseif (isset($_GET['button_TA'])) {
            $query->where('MT10_EMP.EMP_KANA', 'like', "[タ-ド]%");
        } elseif (isset($_GET['button_NA'])) {
            $query->where('MT10_EMP.EMP_KANA', 'like', "[ナ-ノ]%");
        } elseif (isset($_GET['button_HA'])) {
            $query->where('MT10_EMP.EMP_KANA', 'like', "[ハ-ポ]%");
        } elseif (isset($_GET['button_MA'])) {
            $query->where('MT10_EMP.EMP_KANA', 'like', "[マ-モ]%");
        } elseif (isset($_GET['button_YA'])) {
            $query->where('MT10_EMP.EMP_KANA', 'like', "[ャ-ヨ]%");
        } elseif (isset($_GET['button_RA'])) {
            $query->where('MT10_EMP.EMP_KANA', 'like', "[ラ-ロ]%");
        } elseif (isset($_GET['button_WA'])) {
            $query->where('MT10_EMP.EMP_KANA', 'like', "[ヮ-ン]%");
        } elseif (isset($_GET['button_EN'])) {
            $query->where('MT10_EMP.EMP_KANA', 'like', "[a-zA-Z]%");
        }

        return $query->select('MT10_EMP.EMP_CD', 'MT10_EMP.EMP_NAME', 'MT12_DEPT.DEPT_NAME')->paginate(20);
    }

    /**
     * 社員番号から社員名と部門名を取得して返す
     *
     * @param [type] $input_emp_cd
     * @param [type] $reg_cls_cd　初期値：null
     * @param boolean $is_dept_auth　初期値：false
     * @param [type] $calendar_cls_cd　初期値：null
     * @return 社員名（該当なしの場合null）
     */
    public function getName($input_emp_cd, $reg_cls_cd = null, $is_dept_auth = false, $calendar_cls_cd = null)
    {
        return MT10Emp::select('MT10_EMP.EMP_NAME', 'MT12_DEPT.DEPT_NAME')
                    ->leftJoin('MT12_DEPT', 'MT10_EMP.DEPT_CD', '=', 'MT12_DEPT.DEPT_CD')
                    ->when(!is_null($calendar_cls_cd), function ($q) use ($calendar_cls_cd) {
                        $q->leftJoin('MT02_CALENDAR_PTN', 'MT10_EMP.CALENDAR_CD', '=', 'MT02_CALENDAR_PTN.CALENDAR_CD')
                          ->where('MT02_CALENDAR_PTN.CALENDAR_CLS_CD', $calendar_cls_cd);
                    })
                    ->when(!is_null($reg_cls_cd), function ($q) use ($reg_cls_cd) {
                        $q->whereIn('MT10_EMP.REG_CLS_CD', explode(",", $reg_cls_cd));
                    })
                    ->when($is_dept_auth, function ($query) {
                        // 部門権限チェック
                        $login_id = session('id');
                        $login_emp_cd = (new MT11LoginRefRepository())->getEmpCd($login_id);
                        $view_dept = (new MT13DeptAuthRepository())->getChangeableDept($login_id);
                        $query->where(function ($q) use ($view_dept, $login_emp_cd) {
                            $q->whereIn('MT10_EMP.DEPT_CD', $view_dept)
                                ->orWhere('MT10_EMP.EMP_CD', $login_emp_cd);
                        });
                    })
                    ->where('MT10_EMP.EMP_CD', '=', $input_emp_cd)
                    ->first();
    }
}
