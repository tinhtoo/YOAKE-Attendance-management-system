<?php

namespace App\Repositories\Master;

use App\Models\MT02CalendarPtn;
use App\Models\MT10Emp;
use App\Models\MT13DeptAuth;
use App\Models\MT23Company;
use App\Models\MT91ClsDetail;
use App\Models\MT92DescDetail;
use App\Models\TR01Work;
use App\Filters\MT10EmpRefFilter;
use App\Repositories\MT13DeptAuthRepository;
use Illuminate\Support\Facades\DB;

class MT10EmpRefRepository extends MT10Emp
{
    public function search(MT10EmpRefFilter $filter, $login_id)
    {
        $query = MT10Emp::filter($filter)
            ->orderBy('EMP_CD');

        $login_emp_cd = (new MT11LoginRefRepository())->getEmpCd($login_id);
        $view_dept = (new MT13DeptAuthRepository())->getChangeableDept($login_id);
        $query->where(function ($q) use ($view_dept, $login_emp_cd) {
            $q->whereIn('MT10_EMP.DEPT_CD', $view_dept)
                ->orWhere('MT10_EMP.EMP_CD', $login_emp_cd);
        });

        $head_filter = null;
        if (isset($_GET['button_A'])) {
            $head_filter = '[ァ-オ]';
        } elseif (isset($_GET['button_KA'])) {
            $head_filter = '[カ-ゴ]';
        } elseif (isset($_GET['button_SA'])) {
            $head_filter = '[サ-ゾ]';
        } elseif (isset($_GET['button_TA'])) {
            $head_filter = '[タ-ド]';
        } elseif (isset($_GET['button_NA'])) {
            $head_filter = '[ナ-ノ]';
        } elseif (isset($_GET['button_HA'])) {
            $head_filter = '[ハ-ポ]';
        } elseif (isset($_GET['button_MA'])) {
            $head_filter = '[マ-モ]';
        } elseif (isset($_GET['button_YA'])) {
            $head_filter = '[ャ-ヨ]';
        } elseif (isset($_GET['button_RA'])) {
            $head_filter = '[ラ-ロ]';
        } elseif (isset($_GET['button_WA'])) {
            $head_filter = '[ヮ-ン]';
        } elseif (isset($_GET['button_EN'])) {
            $head_filter = '[a-zA-Z]';
        }
        if ($head_filter != null) {
            $query->where('EMP_KANA', 'like', "{$head_filter}%");
        }
        $query_results = $query->paginate(40);

        return $query_results;
    }

    public function getEmp($id)
    {
        return MT10Emp::where('EMP_CD', $id)->first();
    }

    public function getRegClsCd()
    {
        return MT91ClsDetail::select('CLS_DETAIL_CD', 'CLS_DETAIL_NAME')
                    ->where('CLS_CD', '02')
                    ->orderBy('CLS_DETAIL_CD')
                    ->get();
    }

    public function getSexClsCd()
    {
        return MT91ClsDetail::select('CLS_DETAIL_CD', 'CLS_DETAIL_NAME')
                    ->where('CLS_CD', '03')
                    ->orderBy('CLS_DETAIL_CD')
                    ->get();
    }

    public function getEmpCsl1Cd()
    {
        return MT92DescDetail::select('DESC_DETAIL_CD', 'DESC_DETAIL_NAME')
                    ->where('CLS_CD', '50')
                    ->orderBy('DESC_DETAIL_CD')
                    ->get();
    }

    public function getEmpCsl2Cd()
    {
        return MT92DescDetail::select('DESC_DETAIL_CD', 'DESC_DETAIL_NAME')
                    ->where('CLS_CD', '51')
                    ->orderBy('DESC_DETAIL_CD')
                    ->get();
    }

    public function getCalendarCd()
    {
        return MT02CalendarPtn::select('CALENDAR_CD', 'CALENDAR_NAME')
                    ->WHERE('CALENDAR_CD', '<>', '999')
                    ->orderBy('CALENDAR_CD')
                    ->get();
    }

    public function canChengeDept($login_id)
    {
        return MT13DeptAuth::join('MT10_EMP', 'MT13_DEPT_AUTH.DEPT_AUTH_CD', '=', 'MT10_EMP.DEPT_AUTH_CD')
                    ->join('MT11_LOGIN', 'MT10_EMP.EMP_CD', '=', 'MT11_LOGIN.EMP_CD')
                    ->leftJoin('MT12_DEPT', 'MT13_DEPT_AUTH.DEPT_CD', '=', 'MT12_DEPT.DEPT_CD')
                    ->wHERE('MT11_LOGIN.LOGIN_ID', '=', $login_id)
                    ->WHERE('MT12_DEPT.LEVEL_NO', '=', '0')
                    ->exists();
    }

    public function getDeptAuthCd()
    {
        return MT13DeptAuth::distinct()->select('DEPT_AUTH_CD', 'DEPT_AUTH_NAME')
                    ->orderBy('DEPT_AUTH_CD')
                    ->get();
    }

    public function existTr01Work($emp_cd)
    {
        return TR01Work::where('EMP_CD', $emp_cd)
                    ->exists();
    }

    public function getCompanyCd()
    {
        return MT23Company::select('COMPANY_CD', 'COMPANY_ABR')
                    ->orderBy('COMPANY_CD')
                    ->where('DISP_CLS_CD', '01')
                    ->get();
    }

    public function upsertEmp($record)
    {
        return DB::table($this->table)
                ->upsert($record, $this->primaryKey, $this->fillable);
    }

    public function deleteEmp($id)
    {
        return DB::table($this->table)
                ->where('EMP_CD', $id)
                ->delete();
    }

    public function getWithCalendarCdAndClosingDateCdWithoutTaishoku($calendar_cd, $closing_date_cd)
    {
        return MT10Emp::where('REG_CLS_CD', '<>', '02')
                        ->where('CALENDAR_CD', $calendar_cd)
                        ->where('CLOSING_DATE_CD', $closing_date_cd)
                        ->get();
    }

    /**
     * ログインIDから部門コードを取得
     *
     * @param $login_id
     * @return
     */
    public function getDeptWithLoginCd($login_id)
    {
        return MT10Emp::select('DEPT_CD')
                ->join('MT11_LOGIN', 'MT10_EMP.EMP_CD', '=', 'MT11_LOGIN.EMP_CD')
                ->where('MT11_LOGIN.LOGIN_ID', $login_id)
                ->first();
    }

    /**
     * 残業申請書用情報を取得
     *
     * @return void
     */
    public function getOvertimeAplReportData($filter)
    {
        return MT10Emp::from('MT10_EMP as MT10')
                        ->leftJoin('MT12_DEPT as MT12', 'MT10.DEPT_CD', 'MT12.DEPT_CD')
                        ->where('MT10.REG_CLS_CD', '<>', '02')
                        ->filter($filter)
                        ->select('MT10.DEPT_CD', 'MT12.DEPT_NAME', 'MT10.EMP_CD', 'MT10.EMP_NAME')
                        ->orderBy('MT10.DEPT_CD')
                        ->get();
    }

    /**
     * 社員情報の詳細情報を取得
     */
    public function getEmpDetailCursor($request, $login_emp_cd, $enable_dept_list)
    {
        $input = $request->all()['filter'];
        $start_dept = $input['txtStartDeptCd'] ?? '';
        $end_dept = $input['txtEndDeptCd'] ?? '';
        $start_emp = $input['txtStartEmpCd'] ?? '';
        $end_emp = $input['txtEndEmpCd'] ?? '';

        return \DB::table('MT10_EMP as MT10')
                    ->selectRaw("DISTINCT MT10.EMP_CD, MT10.EMP_NAME,
                                        MT10.EMP_KANA, MT11.LOGIN_ID,
                                        MT11.PASSWORD, MT10.DEPT_CD,
                                        MT12.DEPT_NAME, MT10.ENT_YEAR,
                                        MT10.ENT_MONTH, MT10.ENT_DAY,
                                        MT10.RET_YEAR, MT10.RET_MONTH,
                                        MT10.RET_DAY, MT10.REG_CLS_CD,
                                        MT91_REG.CLS_DETAIL_NAME CLS_DETAIL_NAME1,
                                        MT10.BIRTH_YEAR, MT10.BIRTH_MONTH,
                                        MT10.BIRTH_DAY, MT10.SEX_CLS_CD,
                                        MT91_SEX.CLS_DETAIL_NAME CLS_DETAIL_NAME2,
                                        MT10.EMP_CLS1_CD, MT92_CLS1.DESC_DETAIL_NAME DESC_DETAIL_NAME1,
                                        MT10.EMP_CLS2_CD, MT92_CLS2.DESC_DETAIL_NAME DESC_DETAIL_NAME2,
                                        MT10.CALENDAR_CD, MT02.CALENDAR_NAME,
                                        MT10.DEPT_AUTH_CD, MT13.DEPT_AUTH_NAME,
                                        MT10.PG_AUTH_CD, MT14.PG_AUTH_NAME,
                                        MT10.POST_CD, MT10.ADDRESS1,
                                        MT10.ADDRESS2, MT10.TEL,
                                        MT10.CELLULAR, MT10.MAIL,
                                        MT10.PH_GRANT_YEAR, MT10.PH_GRANT_MONTH,
                                        MT10.CLOSING_DATE_CD, MT22.CLOSING_DATE_NAME,
                                        MT10.COMPANY_CD, MT23.COMPANY_NAME,
                                        MT10.EMP2_CD")
                    ->leftJoin('MT11_LOGIN as MT11', 'MT10.EMP_CD', '=', 'MT11.EMP_CD')
                    ->leftJoin('MT12_DEPT as MT12', 'MT10.DEPT_CD', '=', 'MT12.DEPT_CD')
                    ->leftJoin('MT02_CALENDAR_PTN as MT02', 'MT10.CALENDAR_CD', '=', 'MT02.CALENDAR_CD')
                    ->leftJoin('MT13_DEPT_AUTH as MT13', 'MT10.DEPT_AUTH_CD', '=', 'MT13.DEPT_AUTH_CD')
                    ->leftJoin('MT14_PG_AUTH as MT14', 'MT10.PG_AUTH_CD', '=', 'MT14.PG_AUTH_CD')
                    ->leftJoin('MT22_CLOSING_DATE as MT22', 'MT10.CLOSING_DATE_CD', '=', 'MT22.CLOSING_DATE_CD')
                    ->leftJoin('MT23_COMPANY as MT23', 'MT10.COMPANY_CD', '=', 'MT23.COMPANY_CD')
                    ->leftJoin('MT91_CLS_DETAIL as MT91_REG', function ($join) {
                        $join->on('MT10.REG_CLS_CD', '=', 'MT91_REG.CLS_DETAIL_CD')
                             ->where('MT91_REG.CLS_CD', '=', '02');
                    })
                    ->leftJoin('MT91_CLS_DETAIL as MT91_SEX', function ($join) {
                        $join->on('MT10.SEX_CLS_CD', '=', 'MT91_SEX.CLS_DETAIL_CD')
                             ->where('MT91_SEX.CLS_CD', '=', '03');
                    })
                    ->leftJoin('MT92_DESC_DETAIL as MT92_CLS1', function ($join) {
                        $join->on('MT10.EMP_CLS1_CD', '=', 'MT92_CLS1.DESC_DETAIL_CD')
                             ->where('MT92_CLS1.CLS_CD', '=', '50');
                    })
                    ->leftJoin('MT92_DESC_DETAIL as MT92_CLS2', function ($join) {
                        $join->on('MT10.EMP_CLS2_CD', '=', 'MT92_CLS2.DESC_DETAIL_CD')
                             ->where('MT92_CLS2.CLS_CD', '=', '51');
                    })
                    ->where(function ($q) use ($enable_dept_list, $login_emp_cd) {
                        $q->whereIn('MT10.DEPT_CD', $enable_dept_list)
                            ->orWhere('MT10.EMP_CD', $login_emp_cd);
                    })
                    ->when(!is_nullorwhitespace($start_dept), function ($q) use ($start_dept) {
                        $q->where("MT10.DEPT_CD", ">=", $start_dept);
                    })
                    ->when(!is_nullorwhitespace($end_dept), function ($q) use ($end_dept) {
                        $q->where("MT10.DEPT_CD", "<=", $end_dept);
                    })
                    ->when(!is_nullorwhitespace($start_emp), function ($q) use ($start_emp) {
                        $q->where("MT10.EMP_CD", ">=", $start_emp);
                    })
                    ->when(!is_nullorwhitespace($end_emp), function ($q) use ($end_emp) {
                        $q->where("MT10.EMP_CD", "<=", $end_emp);
                    })
                    ->orderBy('MT10.EMP_CD')
                    ->cursor();
    }

    /**
     * シフト勤務者を部門コードと締日で抽出
     *
     * @param $dept_cd
     * @param $closing_date_cd
     * @return object
     */
    public function getShiftEmpWithDeptAndClosing($dept_cd, $closing_date_cd)
    {
        return MT10Emp::select('MT10.EMP_CD')
            ->from('MT10_EMP as MT10')
            ->join('MT02_CALENDAR_PTN as MT02', function ($q) {
                $q->on('MT02.CALENDAR_CD', '=', 'MT10.CALENDAR_CD')
                ->where('MT02.CALENDAR_CLS_CD', '01');
            })
            ->where('MT10.CLOSING_DATE_CD', $closing_date_cd)
            ->where('MT10.DEPT_CD', $dept_cd)
            ->where('MT10.REG_CLS_CD', '<>', '02')
            ->get();
    }

    public function upsertEmpImport($record)
    {
        return DB::table($this->table)
                ->upsert($record, $this->primaryKey, ['EMP_NAME', 'EMP_KANA', 'DEPT_CD', 'ENT_DATE', 'ENT_YEAR',
                                                    'ENT_MONTH', 'ENT_DAY', 'RET_DATE', 'RET_YEAR',
                                                    'RET_MONTH', 'RET_DAY', 'REG_CLS_CD', 'BIRTH_DATE',
                                                    'BIRTH_YEAR', 'BIRTH_MONTH', 'BIRTH_DAY', 'SEX_CLS_CD',
                                                    'EMP_CLS1_CD', 'EMP_CLS2_CD', 'CALENDAR_CD', 'DEPT_AUTH_CD',
                                                    'PG_AUTH_CD', 'POST_CD', 'ADDRESS1', 'ADDRESS2', 'TEL', 'CELLULAR',
                                                    'MAIL', 'UPD_DATE', 'PH_GRANT', 'PH_GRANT_YEAR', 'PH_GRANT_MONTH',
                                                    'COMPANY_CD', 'EMP2_CD']);
    }

    public function updateWithEmpCd($emp_cd, $udpate_data)
    {
        return MT10Emp::where('EMP_CD', $emp_cd)
                        ->update($udpate_data);
    }
}
