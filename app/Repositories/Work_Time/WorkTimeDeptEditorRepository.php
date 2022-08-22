<?php

namespace App\Repositories\Work_Time;

use Illuminate\Http\Request;

use App\Http\Requests\WorkTimeDeptEditorRequest;
use App\Filters\WorkTimeDeptEditorFilter;
use App\Models\TR01Work;
use App\WorkTmSvc\SetWorkTimeToWorkUtility;

class WorkTimeDeptEditorRepository
{
    /**
     * 出退勤入力（部門別） 処理
     * ヘッダーの検索条件表示
     */
    public function select(WorkTimeDeptEditorRequest $request, WorkTimeDeptEditorFilter $filter)
    {
        $input = $request->all();
        $year = substr(($input['ddlDate']), 0, 4);
        $month = substr(($input['ddlDate']), 7, 2);
        $day = mb_substr(($input['ddlDate']), 8, 2);
        $date = $year . '/' . $month . '/' . $day;
        $dept_cd = $input['txtDeptCd'];

        $target_work = TR01Work::from('TR01_WORK as TR01')
            ->join('MT10_EMP as MT10', 'TR01.EMP_CD', '=', 'MT10.EMP_CD')
            ->where('TR01.CALD_DATE', '=', $date)
            ->where('MT10.REG_CLS_CD', '=', '00')
            ->where('MT10.DEPT_CD', '=', $dept_cd)
            ->filter($filter)
            ->get();

        foreach ($target_work as $work) {
            $work_util = new SetWorkTimeToWorkUtility();
            $work_util->setWorkTimeToWork3($work->EMP_CD, $work->CALD_YEAR, $work->CALD_MONTH);
        }

        $targetdata_search = TR01Work::from('TR01_WORK as TR01')
            ->join('MT10_EMP as MT10', 'TR01.EMP_CD', '=', 'MT10.EMP_CD')
            ->join('MT05_WORKPTN as MT05', 'TR01.WORKPTN_CD', '=', 'MT05.WORKPTN_CD')
            ->join('MT09_REASON as MT09', 'TR01.REASON_CD', '=', 'MT09.REASON_CD')
            ->leftjoin('MT12_DEPT as MT12', 'MT10.DEPT_CD', '=', 'MT12.DEPT_CD')
            ->where('MT10.REG_CLS_CD', '=', '00')
            ->where('TR01.CALD_DATE', $date)
            ->where('MT12.DEPT_CD', $dept_cd)
            ->filter($filter)
            ->select(
                'TR01.*',
                'MT10.DEPT_CD',
                'MT12.DEPT_NAME',
                'MT10.EMP_NAME',
                'MT05.WORKPTN_NAME',
                'MT05.WORK_CLS_CD',
                'MT09.REASON_NAME',
                'MT09.REASON_PTN_CD'
            )
            ->selectRaw("Case When TR01.OFC_TIME_HH = '0' OR TR01.OFC_TIME_HH Is Null THEN ''
                Else Cast(TR01.OFC_TIME_HH As VarChar) + ':' + RIGHT('00' + Cast(TR01.OFC_TIME_MI As VarChar), 2)
                End As OFC_TIME")
            ->selectRaw("Case When TR01.LEV_TIME_HH = '0' OR TR01.LEV_TIME_HH Is Null Then ''
                Else Cast(TR01.LEV_TIME_HH As VarChar) + ':' + RIGHT('00' + Cast(TR01.LEV_TIME_MI As VarChar), 2)
                End As LEV_TIME")
            ->selectRaw("Case When TR01.OUT1_TIME_HH = '0' OR TR01.OUT1_TIME_HH Is Null Then ''
                Else Cast(TR01.OUT1_TIME_HH As VarChar) + ':' + RIGHT('00' + Cast(TR01.OUT1_TIME_MI As VarChar), 2)
                End As OUT1_TIME")
            ->selectRaw("Case When TR01.IN1_TIME_HH = '0' OR TR01.IN1_TIME_HH Is Null Then ''
                Else Cast(TR01.IN1_TIME_HH As VarChar) + ':' + RIGHT('00' + Cast(TR01.IN1_TIME_MI As VarChar), 2)
                End As IN1_TIME")
            ->selectRaw("Case When TR01.OUT2_TIME_HH = '0' OR TR01.OUT2_TIME_HH Is Null Then ''
                Else Cast(TR01.OUT2_TIME_HH As VarChar) + ':' + RIGHT('00' + Cast(TR01.OUT2_TIME_MI As VarChar), 2)
                End As OUT2_TIME")
            ->selectRaw("Case When TR01.IN2_TIME_HH = '0' OR TR01.IN2_TIME_HH Is Null Then ''
                Else Cast(TR01.IN2_TIME_HH As VarChar) + ':' + RIGHT('00' + Cast(TR01.IN2_TIME_MI As VarChar), 2)
                End As IN2_TIME")
            ->selectRaw("Case When TR01.WORK_TIME_HH + TR01.WORK_TIME_MI = 0 Then ''
                Else Cast(TR01.WORK_TIME_HH  As VarChar) + ':' + RIGHT('00' + Cast(TR01.WORK_TIME_MI  As VarChar), 2)
                End As WORK_TIME")
            ->selectRaw("Case When TR01.TARD_TIME_HH + TR01.TARD_TIME_MI = 0 Then ''
                Else Cast(TR01.TARD_TIME_HH  As VarChar) + ':' + RIGHT('00' + Cast(TR01.TARD_TIME_MI  As VarChar), 2)
                End As TARD_TIME")
            ->selectRaw("Case When TR01.LEAVE_TIME_HH + TR01.LEAVE_TIME_MI = 0 Then ''
                Else Cast(TR01.LEAVE_TIME_HH As VarChar) + ':' + RIGHT('00' + Cast(TR01.LEAVE_TIME_MI As VarChar), 2)
                End As LEAVE_TIME")
            ->selectRaw("Case When TR01.OUT_TIME_HH + TR01.OUT_TIME_MI = 0 Then ''
                Else Cast(TR01.OUT_TIME_HH   As VarChar) + ':' + RIGHT('00' + Cast(TR01.OUT_TIME_MI   As VarChar), 2)
                End As OUT_TIME")
            ->selectRaw("Case When TR01.OVTM1_TIME_HH + TR01.OVTM1_TIME_MI = 0 Then ''
                Else Cast(TR01.OVTM1_TIME_HH As VarChar) + ':' + RIGHT('00' + Cast(TR01.OVTM1_TIME_MI As VarChar), 2)
                End As OVTM1_TIME")
            ->selectRaw("Case When TR01.OVTM2_TIME_HH + TR01.OVTM2_TIME_MI = 0 Then ''
                Else Cast(TR01.OVTM2_TIME_HH As VarChar) + ':' + RIGHT('00' + Cast(TR01.OVTM2_TIME_MI As VarChar), 2)
                End As OVTM2_TIME")
            ->selectRaw("Case When TR01.OVTM3_TIME_HH + TR01.OVTM3_TIME_MI = 0 Then ''
                Else Cast(TR01.OVTM3_TIME_HH As VarChar) + ':' + RIGHT('00' + Cast(TR01.OVTM3_TIME_MI As VarChar), 2)
                End As OVTM3_TIME")
            ->selectRaw("Case When TR01.OVTM4_TIME_HH + TR01.OVTM4_TIME_MI = 0 Then ''
                Else Cast(TR01.OVTM4_TIME_HH As VarChar) + ':' + RIGHT('00' + Cast(TR01.OVTM4_TIME_MI As VarChar), 2)
                End As OVTM4_TIME")
            ->selectRaw("Case When TR01.OVTM5_TIME_HH + TR01.OVTM5_TIME_MI = 0 Then ''
                Else Cast(TR01.OVTM5_TIME_HH As VarChar) + ':' + RIGHT('00' + Cast(TR01.OVTM5_TIME_MI As VarChar), 2)
                End As OVTM5_TIME")
            ->selectRaw("Case When TR01.OVTM6_TIME_HH + TR01.OVTM6_TIME_MI = 0 Then ''
                Else Cast(TR01.OVTM6_TIME_HH As VarChar) + ':' + RIGHT('00' + Cast(TR01.OVTM6_TIME_MI As VarChar), 2)
                End As OVTM6_TIME")
            ->selectRaw("Case When TR01.EXT1_TIME_HH + TR01.EXT1_TIME_MI = 0 Then ''
                Else Cast(TR01.EXT1_TIME_HH As VarChar) + ':' + RIGHT('00' + Cast(TR01.EXT1_TIME_MI As VarChar), 2)
                End As EXT1_TIME")
            ->selectRaw("Case When TR01.EXT2_TIME_HH + TR01.EXT2_TIME_MI = 0 Then ''
                Else Cast(TR01.EXT2_TIME_HH As VarChar) + ':' + RIGHT('00' + Cast(TR01.EXT2_TIME_MI As VarChar), 2)
                End As EXT2_TIME")
            ->selectRaw("Case When TR01.EXT3_TIME_HH + TR01.EXT3_TIME_MI = 0 Then ''
                Else Cast(TR01.EXT3_TIME_HH As VarChar) + ':' + RIGHT('00' + Cast(TR01.EXT3_TIME_MI As VarChar), 2)
                End As EXT3_TIME")
            ->get();
        return $targetdata_search;
    }

    /**
     * 該当日付のデータを社員コードリストで絞って取得
     *
     */
    public function getWithEmpsAndDate($emp_cd_list, $date)
    {
        return TR01Work::whereIn('EMP_CD', $emp_cd_list)
            ->where('CALD_DATE', $date)
            ->get();
    }
}
