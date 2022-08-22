<?php

namespace App\Repositories\Work_Time;

use Illuminate\Http\Request;

use App\Models\TR01Work;
use App\Models\MT05Workptn;
use App\Models\MT09Reason;
use App\Models\MT99Msg;
use App\Models\MT10Emp;
use App\Models\TR04WorkTimeFix;
use App\WorkTmSvc\CalculateWorkTime;
use App\WorkTmSvc\SetWorkTimeToWorkUtility;
use Carbon\Carbon;

class WorkTimeRepository
{

    public function select(Request $request)
    {
        $input = $request->all();
        $emp_cd = $input['txtEmpCd'];
        $year = substr(($input['ddlDate']), 0, 4);
        $month = abs(substr(($input['ddlDate']), 7, 2));

        $work_util = new SetWorkTimeToWorkUtility();
        $work_util->setWorkTimeToWork3($emp_cd, $year, $month);

        $targetdata = TR01Work::from('TR01_WORK as TR01')
            ->join('MT05_WORKPTN as MT05', 'TR01.WORKPTN_CD', '=', 'MT05.WORKPTN_CD')
            ->join('MT09_REASON as MT09', 'TR01.REASON_CD', '=', 'MT09.REASON_CD')
            ->where('CALD_YEAR', (int)$year)
            ->where('CALD_MONTH', (int)$month)
            ->where('EMP_CD', $input['txtEmpCd'])
            ->select('TR01.*', 'MT05.WORKPTN_NAME', 'MT05.WORK_CLS_CD', 'MT09.REASON_NAME', 'MT09.REASON_PTN_CD')
            ->selectRaw("Case When TR01.OFC_TIME_HH = '0' OR TR01.OFC_TIME_HH Is Null THEN ''
                Else Cast(TR01.OFC_TIME_HH as VarChar) + ':' + RIGHT('00' + Cast(TR01.OFC_TIME_MI as VarChar), 2)
                End as OFC_TIME")
            ->selectRaw("Case When TR01.LEV_TIME_HH = '0' OR TR01.LEV_TIME_HH Is Null Then ''
                Else Cast(TR01.LEV_TIME_HH as VarChar) + ':' + RIGHT('00' + Cast(TR01.LEV_TIME_MI as VarChar), 2)
                End as LEV_TIME")
            ->selectRaw("Case When TR01.OUT1_TIME_HH = '0' OR TR01.OUT1_TIME_HH Is Null Then ''
                Else Cast(TR01.OUT1_TIME_HH as VarChar) + ':' + RIGHT('00' + Cast(TR01.OUT1_TIME_MI as VarChar), 2)
                End as OUT1_TIME")
            ->selectRaw("Case When TR01.IN1_TIME_HH = '0' OR TR01.IN1_TIME_HH Is Null Then ''
                Else Cast(TR01.IN1_TIME_HH as VarChar) + ':' + RIGHT('00' + Cast(TR01.IN1_TIME_MI as VarChar), 2)
                End as IN1_TIME")
            ->selectRaw("Case When TR01.OUT2_TIME_HH = '0' OR TR01.OUT2_TIME_HH Is Null Then ''
                Else Cast(TR01.OUT2_TIME_HH as VarChar) + ':' + RIGHT('00' + Cast(TR01.OUT2_TIME_MI as VarChar), 2)
                End as OUT2_TIME")
            ->selectRaw("Case When TR01.IN2_TIME_HH = '0' OR TR01.IN2_TIME_HH Is Null Then ''
                Else Cast(TR01.IN2_TIME_HH as VarChar) + ':' + RIGHT('00' + Cast(TR01.IN2_TIME_MI as VarChar), 2)
                End as IN2_TIME")
            ->selectRaw("Case When TR01.WORK_TIME_HH + TR01.WORK_TIME_MI = 0 Then ''
                Else Cast(TR01.WORK_TIME_HH as VarChar) + ':' + RIGHT('00' + Cast(TR01.WORK_TIME_MI as VarChar), 2)
                End as WORK_TIME")
            ->selectRaw("Case When TR01.TARD_TIME_HH + TR01.TARD_TIME_MI = 0 Then ''
                Else Cast(TR01.TARD_TIME_HH as VarChar) + ':' + RIGHT('00' + Cast(TR01.TARD_TIME_MI as VarChar), 2)
                End as TARD_TIME")
            ->selectRaw("Case When TR01.LEAVE_TIME_HH + TR01.LEAVE_TIME_MI = 0 Then ''
                Else Cast(TR01.LEAVE_TIME_HH as VarChar) + ':' + RIGHT('00' + Cast(TR01.LEAVE_TIME_MI as VarChar), 2)
                End as LEAVE_TIME")
            ->selectRaw("Case When TR01.OUT_TIME_HH + TR01.OUT_TIME_MI = 0 Then ''
                Else Cast(TR01.OUT_TIME_HH   as VarChar) + ':' + RIGHT('00' + Cast(TR01.OUT_TIME_MI   as VarChar), 2)
                End as OUT_TIME")
            ->selectRaw("Case When TR01.OVTM1_TIME_HH + TR01.OVTM1_TIME_MI = 0 Then ''
                Else Cast(TR01.OVTM1_TIME_HH as VarChar) + ':' + RIGHT('00' + Cast(TR01.OVTM1_TIME_MI as VarChar), 2)
                End as OVTM1_TIME")
            ->selectRaw("Case When TR01.OVTM2_TIME_HH + TR01.OVTM2_TIME_MI = 0 Then ''
                Else Cast(TR01.OVTM2_TIME_HH as VarChar) + ':' + RIGHT('00' + Cast(TR01.OVTM2_TIME_MI as VarChar), 2)
                End as OVTM2_TIME")
            ->selectRaw("Case When TR01.OVTM3_TIME_HH + TR01.OVTM3_TIME_MI = 0 Then ''
                Else Cast(TR01.OVTM3_TIME_HH as VarChar) + ':' + RIGHT('00' + Cast(TR01.OVTM3_TIME_MI as VarChar), 2)
                End as OVTM3_TIME")
            ->selectRaw("Case When TR01.OVTM4_TIME_HH + TR01.OVTM4_TIME_MI = 0 Then ''
                Else Cast(TR01.OVTM4_TIME_HH as VarChar) + ':' + RIGHT('00' + Cast(TR01.OVTM4_TIME_MI as VarChar), 2)
                End as OVTM4_TIME")
            ->selectRaw("Case When TR01.OVTM5_TIME_HH + TR01.OVTM5_TIME_MI = 0 Then ''
                Else Cast(TR01.OVTM5_TIME_HH as VarChar) + ':' + RIGHT('00' + Cast(TR01.OVTM5_TIME_MI as VarChar), 2)
                End as OVTM5_TIME")
            ->selectRaw("Case When TR01.OVTM6_TIME_HH + TR01.OVTM6_TIME_MI = 0 Then ''
                Else Cast(TR01.OVTM6_TIME_HH as VarChar) + ':' + RIGHT('00' + Cast(TR01.OVTM6_TIME_MI as VarChar), 2)
                End as OVTM6_TIME")
            ->selectRaw("Case When TR01.EXT1_TIME_HH + TR01.EXT1_TIME_MI = 0 Then ''
                Else Cast(TR01.EXT1_TIME_HH as VarChar) + ':' + RIGHT('00' + Cast(TR01.EXT1_TIME_MI as VarChar), 2)
                End as EXT1_TIME")
            ->selectRaw("Case When TR01.EXT2_TIME_HH + TR01.EXT2_TIME_MI = 0 Then ''
                Else Cast(TR01.EXT2_TIME_HH as VarChar) + ':' + RIGHT('00' + Cast(TR01.EXT2_TIME_MI as VarChar), 2)
                End as EXT2_TIME")
            ->selectRaw("Case When TR01.EXT3_TIME_HH + TR01.EXT3_TIME_MI = 0 Then ''
                Else Cast(TR01.EXT3_TIME_HH as VarChar) + ':' + RIGHT('00' + Cast(TR01.EXT3_TIME_MI as VarChar), 2)
                End as EXT3_TIME")
            ->get();
        return $targetdata;
    }

    /**
     * 時間計算処理
     *
     * @param Request $request
     * @return TR01Work
     */
    public function timeCal($input)
    {
        // 入力値を取得
        $emp_cd = $input['EMP_CD'];
        $cald_date = $input['CALD_DATE'];
        $ofcTimeHHmm = inputToHHmm($input, 'OFC_TIME');
        $levTimeHHmm = inputToHHmm($input, 'LEV_TIME');
        $out1TimeHHmm = inputToHHmm($input, 'OUT1_TIME');
        $in1TimeHHmm = inputToHHmm($input, 'IN1_TIME');
        $out2TimeHHmm = inputToHHmm($input, 'OUT2_TIME');
        $in2TimeHHmm = inputToHHmm($input, 'IN2_TIME');

        // 計算対象レコードを取得
        $work_row = TR01Work::where('EMP_CD', $emp_cd)->where('CALD_DATE', $cald_date)->first();

        // 入力値を設定
        $this->setNewStrEndTime($emp_cd, $work_row, $input['WORKPTN_CD']);
        $work_row->WORKPTN_CD = $input['WORKPTN_CD'];
        $work_row->REASON_CD = $input['REASON_CD'];
        $work_row->OFC_TIME_HH = $ofcTimeHHmm['OFC_TIME_HH'];
        $work_row->OFC_TIME_MI = $ofcTimeHHmm['OFC_TIME_mm'] != "" ? abs($ofcTimeHHmm['OFC_TIME_mm']) : "";
        $work_row->LEV_TIME_HH = $levTimeHHmm['LEV_TIME_HH'];
        $work_row->LEV_TIME_MI = $levTimeHHmm['LEV_TIME_mm'] != "" ? abs($levTimeHHmm['LEV_TIME_mm']) : "";
        $work_row->OUT1_TIME_HH = $out1TimeHHmm['OUT1_TIME_HH'];
        $work_row->OUT1_TIME_MI = $out1TimeHHmm['OUT1_TIME_mm'] != "" ? abs($out1TimeHHmm['OUT1_TIME_mm']) : "";
        $work_row->IN1_TIME_HH = $in1TimeHHmm['IN1_TIME_HH'];
        $work_row->IN1_TIME_MI = $in1TimeHHmm['IN1_TIME_mm'] != "" ? abs($in1TimeHHmm['IN1_TIME_mm']) : "";
        $work_row->OUT2_TIME_HH = $out2TimeHHmm['OUT2_TIME_HH'];
        $work_row->OUT2_TIME_MI = $out2TimeHHmm['OUT2_TIME_mm'] != "" ? abs($out2TimeHHmm['OUT2_TIME_mm']) : "";
        $work_row->IN2_TIME_HH = $in2TimeHHmm['IN2_TIME_HH'];
        $work_row->IN2_TIME_MI = $in2TimeHHmm['IN2_TIME_mm'] != "" ? abs($in2TimeHHmm['IN2_TIME_mm']) : "";

        // 時間計算
        $calc = new CalculateWorkTime($work_row);
        $calced_work = $calc->caluclateWorkTime();
        return $calced_work;
    }

    /**
     * 日数計算処理
     *
     * @param $input
     * @return TR01Work
     */
    public function dayCal($input, $work = null)
    {
        if (!$work instanceof TR01Work) {
            // 引数がTR01_WORKのレコードでない場合、該当レコードを取得
            $emp_cd = $input['EMP_CD'];
            $cald_date = $input['CALD_DATE'];
            $work_row = TR01Work::where('EMP_CD', $emp_cd)->where('CALD_DATE', $cald_date)->first();
        } else {
            $work_row = clone $work;
        }

        // 開始時間、終了時間を設定
        $this->setNewStrEndTime($work_row->EMP_CD, $work_row, $input['WORKPTN_CD']);
        $work_row->WORKPTN_CD = $input['WORKPTN_CD'];
        $work_row->REASON_CD = $input['REASON_CD'];

        // 入力値を設定
        $ofcTimeHHmm = inputToHHmm($input, 'OFC_TIME');
        $levTimeHHmm = inputToHHmm($input, 'LEV_TIME');
        $out1TimeHHmm = inputToHHmm($input, 'OUT1_TIME');
        $in1TimeHHmm = inputToHHmm($input, 'IN1_TIME');
        $out2TimeHHmm = inputToHHmm($input, 'OUT2_TIME');
        $in2TimeHHmm = inputToHHmm($input, 'IN2_TIME');
        $workTimeHHmm = inputToHHmm($input, 'WORK_TIME');
        $tardTimeHHmm = inputToHHmm($input, 'TARD_TIME');
        $leaveTimeHHmm = inputToHHmm($input, 'LEAVE_TIME');
        $outTimeHHmm = inputToHHmm($input, 'OUT_TIME');
        $ext1TimeHHmm = inputToHHmm($input, 'EXT1_TIME');
        $ext2TimeHHmm = inputToHHmm($input, 'EXT2_TIME');
        $ext3TimeHHmm = inputToHHmm($input, 'EXT3_TIME');
        $ovtm1TimeHHmm = inputToHHmm($input, 'OVTM1_TIME');
        $ovtm2TimeHHmm = inputToHHmm($input, 'OVTM2_TIME');
        $ovtm3TimeHHmm = inputToHHmm($input, 'OVTM3_TIME');
        $ovtm4TimeHHmm = inputToHHmm($input, 'OVTM4_TIME');
        $ovtm5TimeHHmm = inputToHHmm($input, 'OVTM5_TIME');
        $ovtm6TimeHHmm = inputToHHmm($input, 'OVTM6_TIME');
        $work_row->OFC_TIME_HH = $ofcTimeHHmm['OFC_TIME_HH'];
        $work_row->OFC_TIME_MI = $ofcTimeHHmm['OFC_TIME_mm'] != "" ? abs($ofcTimeHHmm['OFC_TIME_mm']) : "";
        $work_row->LEV_TIME_HH = $levTimeHHmm['LEV_TIME_HH'];
        $work_row->LEV_TIME_MI = $levTimeHHmm['LEV_TIME_mm'] != "" ? abs($levTimeHHmm['LEV_TIME_mm']) : "";
        $work_row->OUT1_TIME_HH = $out1TimeHHmm['OUT1_TIME_HH'];
        $work_row->OUT1_TIME_MI = $out1TimeHHmm['OUT1_TIME_mm'] != "" ? abs($out1TimeHHmm['OUT1_TIME_mm']) : "";
        $work_row->IN1_TIME_HH = $in1TimeHHmm['IN1_TIME_HH'];
        $work_row->IN1_TIME_MI = $in1TimeHHmm['IN1_TIME_mm'] != "" ? abs($in1TimeHHmm['IN1_TIME_mm']) : "";
        $work_row->OUT2_TIME_HH = $out2TimeHHmm['OUT2_TIME_HH'];
        $work_row->OUT2_TIME_MI = $out2TimeHHmm['OUT2_TIME_mm'] != "" ? abs($out2TimeHHmm['OUT2_TIME_mm']) : "";
        $work_row->IN2_TIME_HH = $in2TimeHHmm['IN2_TIME_HH'];
        $work_row->IN2_TIME_MI = $in2TimeHHmm['IN2_TIME_mm'] != "" ? abs($in2TimeHHmm['IN2_TIME_mm']) : "";
        $work_row->WORK_TIME_HH = $workTimeHHmm['WORK_TIME_HH'];
        $work_row->WORK_TIME_MI = $workTimeHHmm['WORK_TIME_mm'] != "" ? abs($workTimeHHmm['WORK_TIME_mm']) : "";
        $work_row->TARD_TIME_HH = $tardTimeHHmm['TARD_TIME_HH'];
        $work_row->TARD_TIME_MI = $tardTimeHHmm['TARD_TIME_mm'] != "" ? abs($tardTimeHHmm['TARD_TIME_mm']) : "";
        $work_row->LEAVE_TIME_HH = $leaveTimeHHmm['LEAVE_TIME_HH'];
        $work_row->LEAVE_TIME_MI = $leaveTimeHHmm['LEAVE_TIME_mm'] != "" ? abs($leaveTimeHHmm['LEAVE_TIME_mm']) : "";
        $work_row->OUT_TIME_HH = $outTimeHHmm['OUT_TIME_HH'];
        $work_row->OUT_TIME_MI = $outTimeHHmm['OUT_TIME_mm'] != "" ? abs($outTimeHHmm['OUT_TIME_mm']) : "";
        $work_row->OVTM1_TIME_HH = $ovtm1TimeHHmm['OVTM1_TIME_HH'];
        $work_row->OVTM1_TIME_MI = $ovtm1TimeHHmm['OVTM1_TIME_mm'] != "" ? abs($ovtm1TimeHHmm['OVTM1_TIME_mm']) : "";
        $work_row->OVTM2_TIME_HH = $ovtm2TimeHHmm['OVTM2_TIME_HH'];
        $work_row->OVTM2_TIME_MI = $ovtm2TimeHHmm['OVTM2_TIME_mm'] != "" ? abs($ovtm2TimeHHmm['OVTM2_TIME_mm']) : "";
        $work_row->OVTM3_TIME_HH = $ovtm3TimeHHmm['OVTM3_TIME_HH'];
        $work_row->OVTM3_TIME_MI = $ovtm3TimeHHmm['OVTM3_TIME_mm'] != "" ? abs($ovtm3TimeHHmm['OVTM3_TIME_mm']) : "";
        $work_row->OVTM4_TIME_HH = $ovtm4TimeHHmm['OVTM4_TIME_HH'];
        $work_row->OVTM4_TIME_MI = $ovtm4TimeHHmm['OVTM4_TIME_mm'] != "" ? abs($ovtm4TimeHHmm['OVTM4_TIME_mm']) : "";
        $work_row->OVTM5_TIME_HH = $ovtm5TimeHHmm['OVTM5_TIME_HH'];
        $work_row->OVTM5_TIME_MI = $ovtm5TimeHHmm['OVTM5_TIME_mm'] != "" ? abs($ovtm5TimeHHmm['OVTM5_TIME_mm']) : "";
        $work_row->OVTM6_TIME_HH = $ovtm6TimeHHmm['OVTM6_TIME_HH'];
        $work_row->OVTM6_TIME_MI = $ovtm6TimeHHmm['OVTM6_TIME_mm'] != "" ? abs($ovtm6TimeHHmm['OVTM6_TIME_mm']) : "";
        $work_row->EXT1_TIME_HH = $ext1TimeHHmm['EXT1_TIME_HH'];
        $work_row->EXT1_TIME_MI = $ext1TimeHHmm['EXT1_TIME_mm'] != "" ? abs($ext1TimeHHmm['EXT1_TIME_mm']) : "";
        $work_row->EXT2_TIME_HH = $ext2TimeHHmm['EXT2_TIME_HH'];
        $work_row->EXT2_TIME_MI = $ext2TimeHHmm['EXT2_TIME_mm'] != "" ? abs($ext2TimeHHmm['EXT2_TIME_mm']) : "";
        $work_row->EXT3_TIME_HH = $ext3TimeHHmm['EXT3_TIME_HH'];
        $work_row->EXT3_TIME_MI = $ext3TimeHHmm['EXT3_TIME_mm'] != "" ? abs($ext3TimeHHmm['EXT3_TIME_mm']) : "";


        // 日数計算
        $calc = new CalculateWorkTime($work_row);
        $calced_work = $calc->CaluclateDayCount();
        return $calced_work;
    }

    /**
     * 確定済チェック
     * @return
     */
    public function confirmCheck(Request $request)
    {
        $input = $request->all();
        $year = substr(($input['ddlDate']), 0, 4);
        $month = abs(substr(($input['ddlDate']), 7, 2));
        $deptClsDate1 = MT10Emp::where('MT10_EMP.EMP_CD', $input['txtEmpCd'])->pluck('DEPT_CD')->first();
        $deptClsDate2 = MT10Emp::where('MT10_EMP.EMP_CD', $input['txtEmpCd'])->pluck('CLOSING_DATE_CD')->first();

        $confirmCheck = TR04WorkTimeFix::where('CALD_YEAR', (int)$year)
            ->where('CALD_MONTH', (int)$month)
            ->where('CLOSING_DATE_CD', $deptClsDate2)
            ->where('DEPT_CD', $deptClsDate1)
            ->first();
        return $confirmCheck;
    }


    /**
     * 社員番号と対象年月度で検索
     *
     * @param Request $request
     * @return
     */
    public function getWithEmpAndYearMonth($emp_cd, $cald_year, $cald_month)
    {
        return TR01Work::where('CALD_YEAR', $cald_year)
            ->where('CALD_MONTH', $cald_month)
            ->where('EMP_CD', $emp_cd)
            ->get();
    }

    // 出勤回数の合計
    public function workdaycnt(Request $request)
    {
        $input = $request->all();
        $year = substr(($input['ddlDate']), 0, 4);
        $month = abs(substr(($input['ddlDate']), 7, 2));

        $workdaycnt = TR01Work::where('CALD_YEAR', (int)$year)
            ->where('CALD_MONTH', (int)$month)
            ->where('EMP_CD', $input['txtEmpCd'])
            ->selectraw('Sum(WORKDAY_CNT) as SUM_WORKDAY_CNT')
            ->first();
        return $workdaycnt;
    }

    // 休出回数の合計
    public function holworkcnt(Request $request)
    {
        $input = $request->all();
        $year = substr(($input['ddlDate']), 0, 4);
        $month = abs(substr(($input['ddlDate']), 7, 2));

        $holworkcnt = TR01Work::where('CALD_YEAR', (int)$year)
            ->where('CALD_MONTH', (int)$month)
            ->where('EMP_CD', $input['txtEmpCd'])
            ->selectRaw('Sum(HOLWORK_CNT) as SUM_HOLWORK_CNT')
            ->first();
        return $holworkcnt;
    }

    // 特休回数の合計
    public function spcholcnt(Request $request)
    {
        $input = $request->all();
        $year = substr(($input['ddlDate']), 0, 4);
        $month = abs(substr(($input['ddlDate']), 7, 2));

        $spcholcnt = TR01Work::where('CALD_YEAR', (int)$year)
            ->where('CALD_MONTH', (int)$month)
            ->where('EMP_CD', $input['txtEmpCd'])
            ->selectRaw('Sum(SPCHOL_CNT) as SUM_SPCHOL_CNT')
            ->first();

        return $spcholcnt;
    }

    // 有休回数の合計
    public function padholcnt(Request $request)
    {
        $input = $request->all();
        $year = substr(($input['ddlDate']), 0, 4);
        $month = abs(substr(($input['ddlDate']), 7, 2));

        $padholcnt = TR01Work::where('CALD_YEAR', (int)$year)
            ->where('CALD_MONTH', (int)$month)
            ->where('EMP_CD', $input['txtEmpCd'])
            ->selectRaw('Sum(PADHOL_CNT) as SUM_PADHOL_CNT')
            ->first();

        return $padholcnt;
    }

    // 欠勤回数の合計
    public function abcworkcnt(Request $request)
    {
        $input = $request->all();
        $year = substr(($input['ddlDate']), 0, 4);
        $month = abs(substr(($input['ddlDate']), 7, 2));

        $abcworkcnt = TR01Work::where('CALD_YEAR', (int)$year)
            ->where('CALD_MONTH', (int)$month)
            ->where('EMP_CD', $input['txtEmpCd'])
            ->selectRaw('Sum(ABCWORK_CNT) as SUM_ABCWORK_CNT')
            ->first();

        return $abcworkcnt;
    }

    // 代休回数の合計
    public function compdaycnt(Request $request)
    {
        $input = $request->all();
        $year = substr(($input['ddlDate']), 0, 4);
        $month = abs(substr(($input['ddlDate']), 7, 2));

        $compdaycnt = TR01Work::where('CALD_YEAR', (int)$year)
            ->where('CALD_MONTH', (int)$month)
            ->where('EMP_CD', $input['txtEmpCd'])
            ->selectRaw('Sum(COMPDAY_CNT) as SUM_COMPDAY_CNT')
            ->first();

        return $compdaycnt;
    }

    // 出勤時間の合計
    public function worktime(Request $request)
    {
        $input = $request->all();
        $year = substr(($input['ddlDate']), 0, 4);
        $month = abs(substr(($input['ddlDate']), 7, 2));

        $worktime = TR01Work::where('CALD_YEAR', (int)$year)
            ->where('CALD_MONTH', (int)$month)
            ->where('EMP_CD', $input['txtEmpCd'])
            ->selectRaw("Cast(IsNull(Sum(WORK_TIME_HH), 0) + IsNull(Sum(WORK_TIME_MI) / 60, 0) As VarChar)
                    + ':' + Right('00' + Cast(IsNull(Sum(WORK_TIME_MI) % 60, 0) As VarChar), 2) SUM_WORK_TIME")
            ->first();

        return $worktime;
    }

    // 遅刻時間の合計
    public function tardtime(Request $request)
    {
        $input = $request->all();
        $year = substr(($input['ddlDate']), 0, 4);
        $month = abs(substr(($input['ddlDate']), 7, 2));

        $tardtime = TR01Work::where('CALD_YEAR', (int)$year)
            ->where('CALD_MONTH', (int)$month)
            ->where('EMP_CD', $input['txtEmpCd'])
            ->selectRaw("Cast(IsNull(Sum(TARD_TIME_HH), 0) + IsNull(Sum(TARD_TIME_MI) / 60, 0) As VarChar)
                    + ':' + Right('00' + Cast(IsNull(Sum(TARD_TIME_MI) % 60, 0) As VarChar), 2) SUM_TARD_TIME")
            ->first();

        return $tardtime;
    }

    // 早退時間の合計
    public function leavetime(Request $request)
    {
        $input = $request->all();
        $year = substr(($input['ddlDate']), 0, 4);
        $month = abs(substr(($input['ddlDate']), 7, 2));

        $leavetime = TR01Work::where('CALD_YEAR', (int)$year)
            ->where('CALD_MONTH', (int)$month)
            ->where('EMP_CD', $input['txtEmpCd'])
            ->selectRaw("Cast(IsNull(Sum(LEAVE_TIME_HH), 0) + IsNull(Sum(LEAVE_TIME_MI) / 60, 0) As VarChar)
                    + ':' + Right('00' + Cast(IsNull(Sum(LEAVE_TIME_MI) % 60, 0) As VarChar), 2) SUM_LEAVE_TIME")
            ->first();

        return $leavetime;
    }

    // 外出時間の合計
    public function outtime(Request $request)
    {
        $input = $request->all();
        $year = substr(($input['ddlDate']), 0, 4);
        $month = abs(substr(($input['ddlDate']), 7, 2));

        $outtime = TR01Work::where('CALD_YEAR', (int)$year)
            ->where('CALD_MONTH', (int)$month)
            ->where('EMP_CD', $input['txtEmpCd'])
            ->selectRaw("Cast(IsNull(Sum(OUT_TIME_HH), 0) + IsNull(Sum(OUT_TIME_MI) / 60, 0) As VarChar)
                    + ':' + Right('00' + Cast(IsNull(Sum(OUT_TIME_MI) % 60, 0) As VarChar), 2) SUM_OUT_TIME")
            ->first();

        return $outtime;
    }

    // 早出時間の合計
    public function ovtm1time(Request $request)
    {
        $input = $request->all();
        $year = substr(($input['ddlDate']), 0, 4);
        $month = abs(substr(($input['ddlDate']), 7, 2));

        $ovtm1time = TR01Work::where('CALD_YEAR', (int)$year)
            ->where('CALD_MONTH', (int)$month)
            ->where('EMP_CD', $input['txtEmpCd'])
            ->selectRaw("Cast(IsNull(Sum(OVTM1_TIME_HH), 0) + IsNull(Sum(OVTM1_TIME_MI) / 60, 0) As VarChar)
                     + ':' + Right('00' + Cast(IsNull(Sum(OVTM1_TIME_MI) % 60, 0) As VarChar), 2) SUM_OVTM1_TIME")
            ->first();

        return $ovtm1time;
    }

    // 普通残業時間の合計
    public function ovtm2time(Request $request)
    {
        $input = $request->all();
        $year = substr(($input['ddlDate']), 0, 4);
        $month = abs(substr(($input['ddlDate']), 7, 2));

        $ovtm2time = TR01Work::where('CALD_YEAR', (int)$year)
            ->where('CALD_MONTH', (int)$month)
            ->where('EMP_CD', $input['txtEmpCd'])
            ->selectRaw("Cast(IsNull(Sum(OVTM2_TIME_HH), 0) + IsNull(Sum(OVTM2_TIME_MI) / 60, 0) As VarChar)
                     + ':' + Right('00' + Cast(IsNull(Sum(OVTM2_TIME_MI) % 60, 0) As VarChar), 2) SUM_OVTM2_TIME")
            ->first();

        return $ovtm2time;
    }

    // 深夜残業時間の合計
    public function ovtm3time(Request $request)
    {
        $input = $request->all();
        $year = substr(($input['ddlDate']), 0, 4);
        $month = abs(substr(($input['ddlDate']), 7, 2));

        $ovtm3time = TR01Work::where('CALD_YEAR', (int)$year)
            ->where('CALD_MONTH', (int)$month)
            ->where('EMP_CD', $input['txtEmpCd'])
            ->selectRaw("Cast(IsNull(Sum(OVTM3_TIME_HH), 0) + IsNull(Sum(OVTM3_TIME_MI) / 60, 0) As VarChar)
                     + ':' + Right('00' + Cast(IsNull(Sum(OVTM3_TIME_MI) % 60, 0) As VarChar), 2) SUM_OVTM3_TIME")
            ->first();

        return $ovtm3time;
    }

    // 休日残業時間の合計
    public function ovtm4time(Request $request)
    {
        $input = $request->all();
        $year = substr(($input['ddlDate']), 0, 4);
        $month = abs(substr(($input['ddlDate']), 7, 2));

        $ovtm4time = TR01Work::where('CALD_YEAR', (int)$year)
            ->where('CALD_MONTH', (int)$month)
            ->where('EMP_CD', $input['txtEmpCd'])
            ->selectRaw("Cast(IsNull(Sum(OVTM4_TIME_HH), 0) + IsNull(Sum(OVTM4_TIME_MI) / 60, 0) As VarChar)
                     + ':' + Right('00' + Cast(IsNull(Sum(OVTM4_TIME_MI) % 60, 0) As VarChar), 2) SUM_OVTM4_TIME")
            ->first();

        return $ovtm4time;
    }

    // 休日深夜残業時間の合計
    public function ovtm5time(Request $request)
    {
        $input = $request->all();
        $year = substr(($input['ddlDate']), 0, 4);
        $month = abs(substr(($input['ddlDate']), 7, 2));

        $ovtm5time = TR01Work::where('CALD_YEAR', (int)$year)
            ->where('CALD_MONTH', (int)$month)
            ->where('EMP_CD', $input['txtEmpCd'])
            ->selectRaw("Cast(IsNull(Sum(OVTM5_TIME_HH), 0) + IsNull(Sum(OVTM5_TIME_MI) / 60, 0) As VarChar)
                     + ':' + Right('00' + Cast(IsNull(Sum(OVTM5_TIME_MI) % 60, 0) As VarChar), 2) SUM_OVTM5_TIME")
            ->first();

        return $ovtm5time;
    }

    // 残業項目６の合計(空)
    public function ovtm6time(Request $request)
    {
        $input = $request->all();
        $year = substr(($input['ddlDate']), 0, 4);
        $month = abs(substr(($input['ddlDate']), 7, 2));

        $ovtm6time = TR01Work::where('CALD_YEAR', (int)$year)
            ->where('CALD_MONTH', (int)$month)
            ->where('EMP_CD', $input['txtEmpCd'])
            ->selectRaw("Cast(IsNull(Sum(OVTM6_TIME_HH), 0) + IsNull(Sum(OVTM6_TIME_MI) / 60, 0) As VarChar)
                     + ':' + Right('00' + Cast(IsNull(Sum(OVTM6_TIME_MI) % 60, 0) As VarChar), 2) SUM_OVTM6_TIME")
            ->first();

        return $ovtm6time;
    }

    // 深夜割増
    public function ext1time(Request $request)
    {
        $input = $request->all();
        $year = substr(($input['ddlDate']), 0, 4);
        $month = abs(substr(($input['ddlDate']), 7, 2));

        $ext1time = TR01Work::where('CALD_YEAR', (int)$year)
            ->where('CALD_MONTH', (int)$month)
            ->where('EMP_CD', $input['txtEmpCd'])
            ->selectRaw("Cast(IsNull(Sum(EXT1_TIME_HH), 0) + IsNull(Sum(EXT1_TIME_MI) / 60, 0) As VarChar)
                     + ':' + Right('00' + Cast(IsNull(Sum(EXT1_TIME_MI) % 60, 0) As VarChar), 2) SUM_EXT1_TIME")
            ->first();

        return $ext1time;
    }

    // 割増項目２の合計(空)
    public function ext2time(Request $request)
    {
        $input = $request->all();
        $year = substr(($input['ddlDate']), 0, 4);
        $month = abs(substr(($input['ddlDate']), 7, 2));

        $ext2time = TR01Work::where('CALD_YEAR', (int)$year)
            ->where('CALD_MONTH', (int)$month)
            ->where('EMP_CD', $input['txtEmpCd'])
            ->selectRaw("Cast(IsNull(Sum(EXT2_TIME_HH), 0) + IsNull(Sum(EXT2_TIME_MI) / 60, 0) As VarChar)
                     + ':' + Right('00' + Cast(IsNull(Sum(EXT2_TIME_MI) % 60, 0) As VarChar), 2) SUM_EXT2_TIME")
            ->first();

        return $ext2time;
    }

    // 割増項目3の合計(空)
    public function ext3time(Request $request)
    {
        $input = $request->all();
        $year = substr(($input['ddlDate']), 0, 4);
        $month = (substr(($input['ddlDate']), 7, 2));

        $ext3time = TR01Work::where('CALD_YEAR', (int)$year)
            ->where('CALD_MONTH', (int)$month)
            ->where('EMP_CD', $input['txtEmpCd'])
            ->selectRaw("Cast(IsNull(Sum(EXT3_TIME_HH), 0) + IsNull(Sum(EXT3_TIME_MI) / 60, 0) As VarChar)
                     + ':' + Right('00' + Cast(IsNull(Sum(EXT3_TIME_MI) % 60, 0) As VarChar), 2) SUM_EXT3_TIME")
            ->first();

        return $ext3time;
    }

    // 出勤時間、残業項目１～ｎの合計
    public function getSumTime(Request $request)
    {
        $input = $request->all();
        $year = substr(($input['ddlDate']), 0, 4);
        $month = abs(substr(($input['ddlDate']), 7, 2));

        $sumtime = TR01Work::where('CALD_YEAR', (int)$year)
            ->where('CALD_MONTH', (int)$month)
            ->where('EMP_CD', $input['txtEmpCd'])
            ->selectRaw("Cast(IsNull(Sum(WORK_TIME_HH) + Sum(OVTM1_TIME_HH) + Sum(OVTM2_TIME_HH)
                             + Sum(OVTM3_TIME_HH) + Sum(OVTM4_TIME_HH) + Sum(OVTM5_TIME_HH) + Sum(OVTM6_TIME_HH),0) +
                         IsNull((Sum(WORK_TIME_MI) + Sum(OVTM1_TIME_MI) + Sum(OVTM2_TIME_MI) + Sum(OVTM3_TIME_MI)
                             + Sum(OVTM4_TIME_MI) + Sum(OVTM5_TIME_MI) + Sum(OVTM6_TIME_MI)) /60, 0) As VarChar) + ':' +
                         Right('00' + Cast(IsNull((Sum(WORK_TIME_MI) + Sum(OVTM1_TIME_MI)
                             + Sum(OVTM2_TIME_MI) + Sum(OVTM3_TIME_MI) + Sum(OVTM4_TIME_MI)
                             + Sum(OVTM5_TIME_MI) + Sum(OVTM6_TIME_MI)) % 60, 0) As VarChar), 2) SUM_TIMES")
            ->first();

        return $sumtime;
    }

    // 割増項目１～ｎの合計
    public function getSumExtTimes(Request $request)
    {
        $input = $request->all();
        $year = substr(($input['ddlDate']), 0, 4);
        $month = abs(substr(($input['ddlDate']), 7, 2));

        $sumext_time = TR01Work::where('CALD_YEAR', (int)$year)
            ->where('CALD_MONTH', (int)$month)
            ->where('EMP_CD', $input['txtEmpCd'])
            ->selectRaw("Cast(IsNull(Sum(EXT1_TIME_HH) + Sum(EXT2_TIME_HH) + Sum(EXT3_TIME_HH),0) +
                         IsNull((Sum(EXT1_TIME_MI) + Sum(EXT2_TIME_MI) + Sum(EXT3_TIME_MI)) /60, 0) As VarChar) + ':' +
                         Right('00' + Cast(IsNull((Sum(EXT1_TIME_MI) + Sum(EXT2_TIME_MI) + Sum(EXT3_TIME_MI)) % 60, 0) As VarChar), 2) SUM_EXT_TIMES")
            ->first();

        return $sumext_time;
    }

    // メッセージ取得
    public function messages()
    {
        $msg_4029 = MT99Msg::where('MSG_NO', '4029')->pluck('MSG_CONT')->first();
        return $msg_4029;
    }

    // 勤務体系の取得
    public function workptns()
    {
        $workptn_names = MT05Workptn::all();
        return $workptn_names;
    }

    // 事由の取得
    public function reasons()
    {
        $reason_names = MT09Reason::all();
        return $reason_names;
    }

    /**
     * 勤務体系が変更されているとき、
     * 適用開始時間と適用終了時間を変更後の勤務体系でセットしなおす
     * パラメータ「$work」を上書きする。
     *
     * @param $emp_cd
     * @param $old_work_ptn
     * @param $work
     * @return void
     */
    public function setNewStrEndTime($emp_cd, $work, $new_work_ptn)
    {
        if ($new_work_ptn !== $work->WORKPTN_CD) {
            $workptn = MT05Workptn::where('WORKPTN_CD', $new_work_ptn)->first();
            $cald_carbon = new Carbon($work->CALD_DATE);
            $str_time = (clone $cald_carbon)->addHours($workptn->TIME_DAILY_HH)->addMinutes($workptn->TIME_DAILY_MI);
            $end_time = null;

            $next_day = (clone $cald_carbon)->addDay();
            $next_work = TR01Work::where('EMP_CD', $emp_cd)->where('CALD_DATE', $next_day)->first();
            if ($next_work != null) {
                $end_time = $next_work->WORKPTN_STR_TIME;
            } else {
                $end_time = (clone $str_time->addDay());
            }
            $work->WORKPTN_STR_TIME = $str_time;
            $work->WORKPTN_END_TIME = $end_time;
        }
        return ;
    }
}
