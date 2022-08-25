<?php

namespace App\Repositories\Work_Time;

use Illuminate\Http\Request;
use App\Models\MT10Emp;
use App\Models\MT12Dept;
use App\Models\TR01Work;
use App\Models\MT99Msg;
use App\Models\TR04WorkTimeFix;
use Illuminate\Support\Facades\DB;

/**
 * 勤務状況照会(個人用)
 */

class WorkTimeReferenceRepository
{
    /**
     * 勤務状況照会(個人用) 処理
     * ヘッダーの検索条件表示
     * 「日付、曜日、勤務体系、事由、出勤、退勤、外出１、再入１、外出２、再入２」データ取得
     * @return WorkTimeReferenceController
     */
    public function empInput(Request $request)
    {
        $inputEmpData = $request->all();
        $calYear = substr(($inputEmpData['ddlDate']), 0, 4);
        $calMonth = substr(($inputEmpData['ddlDate']), 7, 2);

        $empWorkTimeResults = TR01Work::select(
            'TR01_WORK.CALD_DATE',
            'TR01_WORK.IN1_CNT',
            'TR01_WORK.IN1_TIME_HH',
            'TR01_WORK.IN2_CNT',
            'TR01_WORK.IN2_TIME_HH',
            'TR01_WORK.LEV_CNT',
            'TR01_WORK.LEV_TIME_HH',
            'TR01_WORK.OFC_CNT',
            'TR01_WORK.OFC_TIME_HH',
            'TR01_WORK.OUT1_CNT',
            'TR01_WORK.OUT1_TIME_HH',
            'TR01_WORK.OUT2_CNT',
            'TR01_WORK.OUT2_TIME_HH',
            'MT05_WORKPTN.WORKPTN_NAME',
            'MT05_WORKPTN.WORK_CLS_CD',
            'MT09_REASON.REASON_NAME',
            'MT09_REASON.REASON_PTN_CD',
        )
            ->selectRaw("Case When TR01_WORK.OFC_TIME_HH Is Null THEN ''
                        Else Cast(TR01_WORK.OFC_TIME_HH As VarChar) + "
                            . "':' + RIGHT('00' + Cast(TR01_WORK.OFC_TIME_MI As VarChar), 2)
                        End As OFC_TIME")
            ->selectRaw("Case When TR01_WORK.LEV_TIME_HH Is Null Then ''
                        Else Cast(TR01_WORK.LEV_TIME_HH As VarChar) + "
                            . "':' + RIGHT('00' + Cast(TR01_WORK.LEV_TIME_MI As VarChar), 2)
                        End As LEV_TIME")
            ->selectRaw("Case When TR01_WORK.OUT1_TIME_HH Is Null Then ''
                        Else Cast(TR01_WORK.OUT1_TIME_HH As VarChar) + "
                            . "':' + RIGHT('00' + Cast(TR01_WORK.OUT1_TIME_MI As VarChar), 2)
                        End As OUT1_TIME")
            ->selectRaw("Case When TR01_WORK.IN1_TIME_HH Is Null Then ''
                        Else Cast(TR01_WORK.IN1_TIME_HH As VarChar) + "
                            . "':' + RIGHT('00' + Cast(TR01_WORK.IN1_TIME_MI As VarChar), 2)
                        End As IN1_TIME")
            ->selectRaw("Case When TR01_WORK.OUT2_TIME_HH Is Null Then ''
                        Else Cast(TR01_WORK.OUT2_TIME_HH As VarChar) + "
                            . "':' + RIGHT('00' + Cast(TR01_WORK.OUT2_TIME_MI As VarChar), 2)
                        End As OUT2_TIME")
            ->selectRaw("Case When TR01_WORK.IN2_TIME_HH Is Null Then ''
                        Else Cast(TR01_WORK.IN2_TIME_HH As VarChar) + "
                            . "':' + RIGHT('00' + Cast(TR01_WORK.IN2_TIME_MI As VarChar), 2)
                        End As IN2_TIME")
            ->join('MT05_WORKPTN', 'TR01_WORK.WORKPTN_CD', 'MT05_WORKPTN.WORKPTN_CD')
            ->join('MT09_REASON', 'TR01_WORK.REASON_CD', 'MT09_REASON.REASON_CD')
            ->join('MT10_EMP', 'TR01_WORK.EMP_CD', 'MT10_EMP.EMP_CD')
            ->where('TR01_WORK.CALD_YEAR', (int)$calYear)
            ->where('TR01_WORK.CALD_MONTH', (int)$calMonth)
            ->where('TR01_WORK.EMP_CD', $inputEmpData['txtEmpCd'])
            ->where('MT10_EMP.REG_CLS_CD', '=', '00')
            ->get();
        return $empWorkTimeResults;
    }

    /**
     * 社員名の取得、表示
     *
     * @param Request $request
     * @return void
     */
    public function depEmpName(Request $request)
    {
        $inputSearchName =  $request->Input();
        if (!empty($inputSearchName['txtEmpCd'])) {
            $emp_dep_name = MT10Emp::join('MT12_DEPT', 'MT10_EMP.DEPT_CD', 'MT12_DEPT.DEPT_CD')
                ->where('EMP_CD', $inputSearchName['txtEmpCd'])->get();
            return $emp_dep_name;
        }
    }

    /**
     * 確定済みのチェック
     * @return $workTimeFix
     */
    public function check(Request $request)
    {
        $inputEmpData = $request->all();
        $calYear = substr($inputEmpData['ddlDate'], 0, 4);
        $calMonth = substr($inputEmpData['ddlDate'], 7, 2);
        $emp = MT10Emp::where('MT10_EMP.EMP_CD', $inputEmpData['txtEmpCd'])->first();

        $workTimeFix = TR04WorkTimeFix::where('CALD_YEAR', (int)$calYear)
            ->where('CALD_MONTH', (int)$calMonth)
            ->where('CLOSING_DATE_CD', $emp->CLOSING_DATE_CD)
            ->where('DEPT_CD', $emp->DEPT_CD)
            ->exists();

        return $workTimeFix;
    }
}
