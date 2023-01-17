<?php

namespace App\Repositories\Work_Time;

use Illuminate\Http\Request;

use App\Models\TR01Work;
use App\Models\MT10Emp;
use App\Models\TR04WorkTimeFix;
use App\Models\MT22ClosingDate;
use App\Filters\EmpWorkTimeRefFilter;

class EmpWorkTimeReferenceRepository
{
    /**
     * 管理者用の勤務状況を取得
     *
     * @param EmpWorkTimeRefFilter $filter
     * @return
     */
    public function select(EmpWorkTimeRefFilter $filter)
    {
        return TR01Work::join('MT10_EMP', 'TR01_WORK.EMP_CD', '=', 'MT10_EMP.EMP_CD')
            ->leftjoin('MT02_CALENDAR_PTN', 'MT10_EMP.CALENDAR_CD', '=', 'MT02_CALENDAR_PTN.CALENDAR_CD')
            ->leftjoin('MT12_DEPT', 'MT10_EMP.DEPT_CD', '=', 'MT12_DEPT.DEPT_CD')
            ->leftjoin('MT22_CLOSING_DATE', 'MT10_EMP.CLOSING_DATE_CD', '=', 'MT22_CLOSING_DATE.CLOSING_DATE_CD')
            ->filter($filter)
            ->selectRaw('TR01_WORK.EMP_CD')
            ->selectRaw('MT10_EMP.DEPT_CD')
            ->selectRaw('MT12_DEPT.DEPT_NAME')
            ->selectRaw('MT10_EMP.EMP_NAME')
            ->selectRaw('MT02_CALENDAR_PTN.CALENDAR_NAME')
            ->selectRaw(('Sum(WORKDAY_CNT) as SUM_WORKDAY_CNT'))
            ->selectRaw(('Sum(HOLWORK_CNT) as SUM_HOLWORK_CNT'))
            ->selectRaw(('Sum(SPCHOL_CNT) as SUM_SPCHOL_CNT'))
            ->selectRaw(('Sum(PADHOL_CNT) as SUM_PADHOL_CNT'))
            ->selectRaw(('Sum(ABCWORK_CNT) as SUM_ABCWORK_CNT'))
            ->selectRaw(('Sum(COMPDAY_CNT) as SUM_COMPDAY_CNT'))
            ->selectRaw(("Cast(Sum(WORK_TIME_HH)  + Sum(WORK_TIME_MI)  / 60 As VarChar)"
                        . " + ':' + RIGHT('00' + Cast(Sum(WORK_TIME_MI)  % 60 As VarChar), 2) SUM_WORK_TIME"))
            ->selectRaw(("Cast(Sum(TARD_TIME_HH)  + Sum(TARD_TIME_MI)  / 60 As VarChar)"
                        . " + ':' + RIGHT('00' + Cast(Sum(TARD_TIME_MI)  % 60 As VarChar), 2) SUM_TARD_TIME"))
            ->selectRaw(("Cast(Sum(LEAVE_TIME_HH) + Sum(LEAVE_TIME_MI) / 60 As VarChar)"
                        . " + ':' + RIGHT('00' + Cast(Sum(LEAVE_TIME_MI) % 60 As VarChar), 2) SUM_LEAVE_TIME"))
            ->selectRaw(("Cast(Sum(OUT_TIME_HH)   + Sum(OUT_TIME_MI)   / 60 As VarChar)"
                        . " + ':' + RIGHT('00' + Cast(Sum(OUT_TIME_MI)   % 60 As VarChar), 2) SUM_OUT_TIME"))
            ->selectRaw(("Cast(Sum(OVTM1_TIME_HH) + Sum(OVTM1_TIME_MI) / 60 As VarChar)"
                        . " + ':' + RIGHT('00' + Cast(Sum(OVTM1_TIME_MI) % 60 As VarChar), 2) SUM_OVTM1_TIME"))
            ->selectRaw(("Cast(Sum(OVTM2_TIME_HH) + Sum(OVTM2_TIME_MI) / 60 As VarChar)"
                        . " + ':' + RIGHT('00' + Cast(Sum(OVTM2_TIME_MI) % 60 As VarChar), 2) SUM_OVTM2_TIME"))
            ->selectRaw(("Cast(Sum(OVTM3_TIME_HH) + Sum(OVTM3_TIME_MI) / 60 As VarChar)"
                        . " + ':' + RIGHT('00' + Cast(Sum(OVTM3_TIME_MI) % 60 As VarChar), 2) SUM_OVTM3_TIME"))
            ->selectRaw(("Cast(Sum(OVTM4_TIME_HH) + Sum(OVTM4_TIME_MI) / 60 As VarChar)"
                        . " + ':' + RIGHT('00' + Cast(Sum(OVTM4_TIME_MI) % 60 As VarChar), 2) SUM_OVTM4_TIME"))
            ->selectRaw(("Cast(Sum(OVTM5_TIME_HH) + Sum(OVTM5_TIME_MI) / 60 As VarChar)"
                        . " + ':' + RIGHT('00' + Cast(Sum(OVTM5_TIME_MI) % 60 As VarChar), 2) SUM_OVTM5_TIME"))
            ->selectRaw(("Cast(Sum(OVTM6_TIME_HH) + Sum(OVTM6_TIME_MI) / 60 As VarChar)"
                        . " + ':' + RIGHT('00' + Cast(Sum(OVTM6_TIME_MI) % 60 As VarChar), 2) SUM_OVTM6_TIME"))
            ->selectRaw(("Cast(Sum(EXT1_TIME_HH)  + Sum(EXT1_TIME_MI)  / 60 As VarChar)"
                        . " + ':' + RIGHT('00' + Cast(Sum(EXT1_TIME_MI)  % 60 As VarChar), 2) SUM_EXT1_TIME"))
            ->selectRaw(("Cast(Sum(EXT2_TIME_HH)  + Sum(EXT2_TIME_MI)  / 60 As VarChar)"
                        . " + ':' + RIGHT('00' + Cast(Sum(EXT2_TIME_MI)  % 60 As VarChar), 2) SUM_EXT2_TIME"))
            ->selectRaw(("Cast(Sum(EXT3_TIME_HH)  + Sum(EXT3_TIME_MI)  / 60 As VarChar)"
                        . " + ':' + RIGHT('00' + Cast(Sum(EXT3_TIME_MI)  % 60 As VarChar), 2) SUM_EXT3_TIME"))
            ->groupBy(
                'TR01_WORK.EMP_CD',
                'MT10_EMP.DEPT_CD',
                'MT12_DEPT.DEPT_NAME',
                'MT10_EMP.EMP_NAME',
                'MT02_CALENDAR_PTN.CALENDAR_NAME'
            )
            ->get();
    }

    /**
     * 締日情報取得
     * @return EmpWorkTimeReferenceController
     */
    public function shimebi()
    {
        $close_date = MT22ClosingDate::all();
        return $close_date;
    }

    /**
     * 確定済みチェック
     * @return EmpWorkTimeReferenceController
     */
    public function confirm(Request $request)
    {
        $input = $request->Input(['filter']);
        $chk = $input['SearchCondition'];
        $year = substr(($input['ddlDate']), 0, 4);
        $month = substr(($input['ddlDate']), 7, 2);

        if ($chk ='rbSearchEmp' && $chk != 'rbSearchDept') {
            // 社員選択時
            $emp = MT10Emp::where('MT10_EMP.EMP_CD', $input['txtEmpCd'])->first();
            $closing_date = $emp->CLOSING_DATE_CD;
            $dept_cd = $emp->DEPT_CD;
        } else {
            // 部門選択時
            $closing_date = $input['ddlClosingDate'];
            $dept_cd = $input['txtDeptCd'];
        }

        $confirm = TR04WorkTimeFix::where('CALD_YEAR', (int)$year)
            ->where('CALD_MONTH', (int)$month)
            ->where('CLOSING_DATE_CD', $closing_date)
            ->where('DEPT_CD', $dept_cd)
            ->exists();
        return $confirm;
    }
}
