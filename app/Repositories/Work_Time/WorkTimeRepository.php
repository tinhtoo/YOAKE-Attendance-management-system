<?php

namespace App\Repositories\Work_Time;

use Illuminate\Http\Request;

use App\Models\TR01Work;
use App\Models\MT05Workptn;
use App\Models\MT09Reason;
use App\Models\MT99Msg;
use App\Models\MT08Holiday;


class WorkTimeRepository
{

    public function select(Request $request)
    {
        $input = $request->all();
        // $targetdata = TR01Work::where('CALD_YEAR', $input['ddlTargetYear'])
        //     ->where('CALD_MONTH', $input['ddlTargetMonth'])
        //     ->where('EMP_CD', $input['txtEmpCd'])->get();

        $targetdata = TR01Work::join('MT05_WORKPTN', 'TR01_WORK.WORKPTN_CD', '=', 'MT05_WORKPTN.WORKPTN_CD')
            ->join('MT09_REASON', 'TR01_WORK.REASON_CD', '=', 'MT09_REASON.REASON_CD')
            ->where('CALD_YEAR', $input['ddlTargetYear'])
            ->where('CALD_MONTH', $input['ddlTargetMonth'])
            ->where('EMP_CD', $input['txtEmpCd'])
            ->select('TR01_WORK.*', 'MT05_WORKPTN.WORKPTN_NAME', 'MT05_WORKPTN.WORK_CLS_CD', 'MT09_REASON.REASON_NAME', 'MT09_REASON.REASON_PTN_CD')
            ->selectRaw("Case When TR01_WORK.OFC_TIME_HH = '0' OR TR01_WORK.OFC_TIME_HH Is Null THEN ''
                        Else Cast(TR01_WORK.OFC_TIME_HH As VarChar) + ':' + RIGHT('00' + Cast(TR01_WORK.OFC_TIME_MI As VarChar), 2)
                    End As OFC_TIME")
            ->selectRaw("Case When TR01_WORK.LEV_TIME_HH = '0' OR TR01_WORK.LEV_TIME_HH Is Null Then ''
                        Else Cast(TR01_WORK.LEV_TIME_HH As VarChar) + ':' + RIGHT('00' + Cast(TR01_WORK.LEV_TIME_MI As VarChar), 2)
                    End As LEV_TIME")
            ->selectRaw("Case When TR01_WORK.OUT1_TIME_HH = '0' OR TR01_WORK.OUT1_TIME_HH Is Null Then ''
                        Else Cast(TR01_WORK.OUT1_TIME_HH As VarChar) + ':' + RIGHT('00' + Cast(TR01_WORK.OUT1_TIME_MI As VarChar), 2)
                    End As OUT1_TIME")
            ->selectRaw("Case When TR01_WORK.IN1_TIME_HH = '0' OR TR01_WORK.IN1_TIME_HH Is Null Then ''
                        Else Cast(TR01_WORK.IN1_TIME_HH As VarChar) + ':' + RIGHT('00' + Cast(TR01_WORK.IN1_TIME_MI As VarChar), 2)
                    End As IN1_TIME")
            ->selectRaw("Case When TR01_WORK.OUT2_TIME_HH = '0' OR TR01_WORK.OUT2_TIME_HH Is Null Then ''
                        Else Cast(TR01_WORK.OUT2_TIME_HH As VarChar) + ':' + RIGHT('00' + Cast(TR01_WORK.OUT2_TIME_MI As VarChar), 2)
                    End As OUT2_TIME")
            ->selectRaw("Case When TR01_WORK.IN2_TIME_HH = '0' OR TR01_WORK.IN2_TIME_HH Is Null Then ''
                        Else Cast(TR01_WORK.IN2_TIME_HH As VarChar) + ':' + RIGHT('00' + Cast(TR01_WORK.IN2_TIME_MI As VarChar), 2)
                    End As IN2_TIME")
            ->selectRaw("Case When TR01_WORK.WORK_TIME_HH + TR01_WORK.WORK_TIME_MI = 0 Then ''
                        Else Cast(TR01_WORK.WORK_TIME_HH  As VarChar) + ':' + RIGHT('00' + Cast(TR01_WORK.WORK_TIME_MI  As VarChar), 2)
                    End As WORK_TIME")
            ->selectRaw("Case When TR01_WORK.TARD_TIME_HH + TR01_WORK.TARD_TIME_MI = 0 Then ''
                        Else Cast(TR01_WORK.TARD_TIME_HH  As VarChar) + ':' + RIGHT('00' + Cast(TR01_WORK.TARD_TIME_MI  As VarChar), 2)
                    End As TARD_TIME")
            ->selectRaw("Case When TR01_WORK.LEAVE_TIME_HH + TR01_WORK.LEAVE_TIME_MI = 0 Then ''
                        Else Cast(TR01_WORK.LEAVE_TIME_HH As VarChar) + ':' + RIGHT('00' + Cast(TR01_WORK.LEAVE_TIME_MI As VarChar), 2)
                    End As LEAVE_TIME")
            ->selectRaw("Case When TR01_WORK.OUT_TIME_HH + TR01_WORK.OUT_TIME_MI = 0 Then ''
                        Else Cast(TR01_WORK.OUT_TIME_HH   As VarChar) + ':' + RIGHT('00' + Cast(TR01_WORK.OUT_TIME_MI   As VarChar), 2)
                    End As OUT_TIME")
            ->selectRaw("Case When TR01_WORK.OVTM1_TIME_HH + TR01_WORK.OVTM1_TIME_MI = 0 Then ''
                        Else Cast(TR01_WORK.OVTM1_TIME_HH As VarChar) + ':' + RIGHT('00' + Cast(TR01_WORK.OVTM1_TIME_MI As VarChar), 2)
                    End As OVTM1_TIME")
            ->selectRaw("Case When TR01_WORK.OVTM2_TIME_HH + TR01_WORK.OVTM2_TIME_MI = 0 Then ''
                        Else Cast(TR01_WORK.OVTM2_TIME_HH As VarChar) + ':' + RIGHT('00' + Cast(TR01_WORK.OVTM2_TIME_MI As VarChar), 2)
                    End As OVTM2_TIME")
            ->selectRaw("Case When TR01_WORK.OVTM3_TIME_HH + TR01_WORK.OVTM3_TIME_MI = 0 Then ''
                        Else Cast(TR01_WORK.OVTM3_TIME_HH As VarChar) + ':' + RIGHT('00' + Cast(TR01_WORK.OVTM3_TIME_MI As VarChar), 2)
                    End As OVTM3_TIME")
            ->selectRaw("Case When TR01_WORK.OVTM4_TIME_HH + TR01_WORK.OVTM4_TIME_MI = 0 Then ''
                        Else Cast(TR01_WORK.OVTM4_TIME_HH As VarChar) + ':' + RIGHT('00' + Cast(TR01_WORK.OVTM4_TIME_MI As VarChar), 2)
                    End As OVTM4_TIME")
            ->selectRaw("Case When TR01_WORK.OVTM5_TIME_HH + TR01_WORK.OVTM5_TIME_MI = 0 Then ''
                        Else Cast(TR01_WORK.OVTM5_TIME_HH As VarChar) + ':' + RIGHT('00' + Cast(TR01_WORK.OVTM5_TIME_MI As VarChar), 2)
                    End As OVTM5_TIME")
            ->selectRaw("Case When TR01_WORK.OVTM6_TIME_HH + TR01_WORK.OVTM6_TIME_MI = 0 Then ''
                        Else Cast(TR01_WORK.OVTM6_TIME_HH As VarChar) + ':' + RIGHT('00' + Cast(TR01_WORK.OVTM6_TIME_MI As VarChar), 2)
                    End As OVTM6_TIME")
            ->selectRaw("Case When TR01_WORK.EXT1_TIME_HH + TR01_WORK.EXT1_TIME_MI = 0 Then ''
                        Else Cast(TR01_WORK.EXT1_TIME_HH As VarChar) + ':' + RIGHT('00' + Cast(TR01_WORK.EXT1_TIME_MI As VarChar), 2)
                    End As EXT1_TIME")
            ->selectRaw("Case When TR01_WORK.EXT2_TIME_HH + TR01_WORK.EXT2_TIME_MI = 0 Then ''
                        Else Cast(TR01_WORK.EXT2_TIME_HH As VarChar) + ':' + RIGHT('00' + Cast(TR01_WORK.EXT2_TIME_MI As VarChar), 2)
                    End As EXT2_TIME")
            ->selectRaw("Case When TR01_WORK.EXT3_TIME_HH + TR01_WORK.EXT3_TIME_MI = 0 Then ''
                        Else Cast(TR01_WORK.EXT3_TIME_HH As VarChar) + ':' + RIGHT('00' + Cast(TR01_WORK.EXT3_TIME_MI As VarChar), 2)
                    End As EXT3_TIME")
            ->selectRaw("Case When TR01_WORK.RSV1_TIME_HH + TR01_WORK.RSV1_TIME_MI = 0 Then ''
                        Else Cast(TR01_WORK.RSV1_TIME_HH As VarChar) + ':' + RIGHT('00' + Cast(TR01_WORK.RSV1_TIME_MI As VarChar), 2)
                    End As RSV1_TIME")

            ->get();

        //dd($targetdata);
        return $targetdata;
    }

    //出勤回数の合計
    public function workdaycnt(Request $request)
    {
        $input = $request->all();

        $workdaycnt = TR01Work::where('CALD_YEAR', $input['ddlTargetYear'])
            ->where('CALD_MONTH', $input['ddlTargetMonth'])
            ->where('EMP_CD', $input['txtEmpCd'])
            ->selectraw('Sum(WORKDAY_CNT) as SUM_WORKDAY_CNT')
            // ->selectRaw("Case When WORKDAY_CNT = 0 THEN ''
            //             Else (Sum(WORKDAY_CNT))End As SUM_WORKDAY_CNT")
            //->groupBy('WORKDAY_CNT')
            ->first();
            
        //dd($workdaycnt);
        return $workdaycnt;
    }

    //休出回数の合計
    public function holworkcnt(Request $request)
    {
        $input = $request->all();

        $holworkcnt = TR01Work::where('CALD_YEAR', $input['ddlTargetYear'])
            ->where('CALD_MONTH', $input['ddlTargetMonth'])
            ->where('EMP_CD', $input['txtEmpCd'])
            // ->selectRaw("Case When TR01_WORK.OVTM1_TIME_HH + TR01_WORK.OVTM1_TIME_MI = 0 Then ''
            //             Else Cast(TR01_WORK.OVTM1_TIME_HH As VarChar) + ':' + RIGHT('00' + Cast(TR01_WORK.OVTM1_TIME_MI As VarChar), 2)
            //         End AS OVTM1_TIME")
            // ->selectRaw("Case When HOLWORK_CNT = 0 THEN ''
            //             Else (Sum(HOLWORK_CNT) )End As SUM_HOLWORK_CNT")
            ->selectRaw('Sum(HOLWORK_CNT) as SUM_HOLWORK_CNT')
            //->groupBy('HOLWORK_CNT')
            ->first();
        //dd($holworkcnt);
        return $holworkcnt;
    }

    //特休回数の合計
    public function spcholcnt(Request $request)
    {
        $input = $request->all();

        $spcholcnt = TR01Work::where('CALD_YEAR', $input['ddlTargetYear'])
            ->where('CALD_MONTH', $input['ddlTargetMonth'])
            ->where('EMP_CD', $input['txtEmpCd'])
            ->selectRaw('Sum(SPCHOL_CNT) as SUM_SPCHOL_CNT')
            ->first();

        return $spcholcnt;
    }

    //有休回数の合計
    public function padholcnt(Request $request)
    {
        $input = $request->all();

        $padholcnt = TR01Work::where('CALD_YEAR', $input['ddlTargetYear'])
            ->where('CALD_MONTH', $input['ddlTargetMonth'])
            ->where('EMP_CD', $input['txtEmpCd'])
            ->selectRaw('Sum(PADHOL_CNT) as SUM_PADHOL_CNT')
            ->first();

        return $padholcnt;
    }

    //欠勤回数の合計
    public function abcworkcnt(Request $request)
    {
        $input = $request->all();

        $abcworkcnt = TR01Work::where('CALD_YEAR', $input['ddlTargetYear'])
            ->where('CALD_MONTH', $input['ddlTargetMonth'])
            ->where('EMP_CD', $input['txtEmpCd'])
            ->selectRaw('Sum(ABCWORK_CNT) as SUM_ABCWORK_CNT')
            ->first();
            
        return $abcworkcnt;
    }

    //代休回数の合計
    public function compdaycnt(Request $request)
    {
        $input = $request->all();

        $compdaycnt = TR01Work::where('CALD_YEAR', $input['ddlTargetYear'])
            ->where('CALD_MONTH', $input['ddlTargetMonth'])
            ->where('EMP_CD', $input['txtEmpCd'])
            ->selectRaw('Sum(COMPDAY_CNT) as SUM_COMPDAY_CNT')
            ->first();

        return $compdaycnt;
    }

    //出勤時間の合計
    public function worktime(Request $request)
    {
        $input = $request->all();

        $worktime = TR01Work::where('CALD_YEAR', $input['ddlTargetYear'])
            ->where('CALD_MONTH', $input['ddlTargetMonth'])
            ->where('EMP_CD', $input['txtEmpCd'])
            ->selectRaw("Cast(IsNull(Sum(WORK_TIME_HH), 0) + IsNull(Sum(WORK_TIME_MI) / 60, 0) As VarChar) + ':' + Right('00' + Cast(IsNull(Sum(WORK_TIME_MI) % 60, 0) As VarChar), 2) SUM_WORK_TIME")
            ->first();

        return $worktime;
    }

    //遅刻時間の合計
    public function tardtime(Request $request)
    {
        $input = $request->all();

        $tardtime = TR01Work::where('CALD_YEAR', $input['ddlTargetYear'])
            ->where('CALD_MONTH', $input['ddlTargetMonth'])
            ->where('EMP_CD', $input['txtEmpCd'])
            ->selectRaw("Cast(IsNull(Sum(TARD_TIME_HH), 0) + IsNull(Sum(TARD_TIME_MI) / 60, 0) As VarChar) + ':' + Right('00' + Cast(IsNull(Sum(TARD_TIME_MI) % 60, 0) As VarChar), 2) SUM_TARD_TIME")
            ->first();
            
        return $tardtime;
    }

    //早退時間の合計
    public function leavetime(Request $request)
    {
        $input = $request->all();

        $leavetime = TR01Work::where('CALD_YEAR', $input['ddlTargetYear'])
            ->where('CALD_MONTH', $input['ddlTargetMonth'])
            ->where('EMP_CD', $input['txtEmpCd'])
            ->selectRaw("Cast(IsNull(Sum(LEAVE_TIME_HH), 0) + IsNull(Sum(LEAVE_TIME_MI) / 60, 0) As VarChar) + ':' + Right('00' + Cast(IsNull(Sum(LEAVE_TIME_MI) % 60, 0) As VarChar), 2) SUM_LEAVE_TIME")
            ->first();
            
        return $leavetime;
    }

    //外出時間の合計
    public function outtime(Request $request)
    {
        $input = $request->all();

        $outtime = TR01Work::where('CALD_YEAR', $input['ddlTargetYear'])
            ->where('CALD_MONTH', $input['ddlTargetMonth'])
            ->where('EMP_CD', $input['txtEmpCd'])
            ->selectRaw("Cast(IsNull(Sum(OUT_TIME_HH), 0) + IsNull(Sum(OUT_TIME_MI) / 60, 0) As VarChar) + ':' + Right('00' + Cast(IsNull(Sum(OUT_TIME_MI) % 60, 0) As VarChar), 2) SUM_OUT_TIME")
            ->first();
            
        return $outtime;
    }

    //早出時間の合計
    public function ovtm1time(Request $request)
    {
        $input = $request->all();

        $ovtm1time = TR01Work::where('CALD_YEAR', $input['ddlTargetYear'])
            ->where('CALD_MONTH', $input['ddlTargetMonth'])
            ->where('EMP_CD', $input['txtEmpCd'])
            ->selectRaw("Cast(IsNull(Sum(OVTM1_TIME_HH), 0) + IsNull(Sum(OVTM1_TIME_MI) / 60, 0) As VarChar) + ':' + Right('00' + Cast(IsNull(Sum(OVTM1_TIME_MI) % 60, 0) As VarChar), 2) SUM_OVTM1_TIME")
            ->first();
            
        return $ovtm1time;
    }

    //普通残業時間の合計
    public function ovtm2time(Request $request)
    {
        $input = $request->all();

        $ovtm2time = TR01Work::where('CALD_YEAR', $input['ddlTargetYear'])
            ->where('CALD_MONTH', $input['ddlTargetMonth'])
            ->where('EMP_CD', $input['txtEmpCd'])
            ->selectRaw("Cast(IsNull(Sum(OVTM2_TIME_HH), 0) + IsNull(Sum(OVTM2_TIME_MI) / 60, 0) As VarChar) + ':' + Right('00' + Cast(IsNull(Sum(OVTM2_TIME_MI) % 60, 0) As VarChar), 2) SUM_OVTM2_TIME")
            ->first();
            
        return $ovtm2time;
    }

    //深夜残業時間の合計
    public function ovtm3time(Request $request)
    {
        $input = $request->all();

        $ovtm3time = TR01Work::where('CALD_YEAR', $input['ddlTargetYear'])
            ->where('CALD_MONTH', $input['ddlTargetMonth'])
            ->where('EMP_CD', $input['txtEmpCd'])
            ->selectRaw("Cast(IsNull(Sum(OVTM3_TIME_HH), 0) + IsNull(Sum(OVTM3_TIME_MI) / 60, 0) As VarChar) + ':' + Right('00' + Cast(IsNull(Sum(OVTM3_TIME_MI) % 60, 0) As VarChar), 2) SUM_OVTM3_TIME")
            ->first();
            
        return $ovtm3time;
    }

    //休日残業時間の合計
    public function ovtm4time(Request $request)
    {
        $input = $request->all();

        $ovtm4time = TR01Work::where('CALD_YEAR', $input['ddlTargetYear'])
            ->where('CALD_MONTH', $input['ddlTargetMonth'])
            ->where('EMP_CD', $input['txtEmpCd'])
            ->selectRaw("Cast(IsNull(Sum(OVTM4_TIME_HH), 0) + IsNull(Sum(OVTM4_TIME_MI) / 60, 0) As VarChar) + ':' + Right('00' + Cast(IsNull(Sum(OVTM4_TIME_MI) % 60, 0) As VarChar), 2) SUM_OVTM4_TIME")
            ->first();
            
        return $ovtm4time;
    }

    //休日深夜残業時間の合計
    public function ovtm5time(Request $request)
    {
        $input = $request->all();

        $ovtm5time = TR01Work::where('CALD_YEAR', $input['ddlTargetYear'])
            ->where('CALD_MONTH', $input['ddlTargetMonth'])
            ->where('EMP_CD', $input['txtEmpCd'])
            ->selectRaw("Cast(IsNull(Sum(OVTM5_TIME_HH), 0) + IsNull(Sum(OVTM5_TIME_MI) / 60, 0) As VarChar) + ':' + Right('00' + Cast(IsNull(Sum(OVTM5_TIME_MI) % 60, 0) As VarChar), 2) SUM_OVTM5_TIME")
            ->first();
            
        return $ovtm5time;
    }

    //残業項目６の合計(空)
    public function ovtm6time(Request $request)
    {
        $input = $request->all();

        $ovtm6time = TR01Work::where('CALD_YEAR', $input['ddlTargetYear'])
            ->where('CALD_MONTH', $input['ddlTargetMonth'])
            ->where('EMP_CD', $input['txtEmpCd'])
            ->selectRaw("Cast(IsNull(Sum(OVTM6_TIME_HH), 0) + IsNull(Sum(OVTM6_TIME_MI) / 60, 0) As VarChar) + ':' + Right('00' + Cast(IsNull(Sum(OVTM6_TIME_MI) % 60, 0) As VarChar), 2) SUM_OVTM6_TIME")
            ->first();
            
        return $ovtm6time;
    }

    //深夜割増
    public function ext1time(Request $request)
    {
        $input = $request->all();

        $ext1time = TR01Work::where('CALD_YEAR', $input['ddlTargetYear'])
            ->where('CALD_MONTH', $input['ddlTargetMonth'])
            ->where('EMP_CD', $input['txtEmpCd'])
            ->selectRaw("Cast(IsNull(Sum(EXT1_TIME_HH), 0) + IsNull(Sum(EXT1_TIME_MI) / 60, 0) As VarChar) + ':' + Right('00' + Cast(IsNull(Sum(EXT1_TIME_MI) % 60, 0) As VarChar), 2) SUM_EXT1_TIME")
            ->first();
            
        return $ext1time;
    }

    //割増項目２の合計(空)
    public function ext2time(Request $request)
    {
        $input = $request->all();

        $ext2time = TR01Work::where('CALD_YEAR', $input['ddlTargetYear'])
            ->where('CALD_MONTH', $input['ddlTargetMonth'])
            ->where('EMP_CD', $input['txtEmpCd'])
            ->selectRaw("Cast(IsNull(Sum(EXT2_TIME_HH), 0) + IsNull(Sum(EXT2_TIME_MI) / 60, 0) As VarChar) + ':' + Right('00' + Cast(IsNull(Sum(EXT2_TIME_MI) % 60, 0) As VarChar), 2) SUM_EXT2_TIME")
            ->first();
            
        return $ext2time;
    }

    //割増項目3の合計(空)
    public function ext3time(Request $request)
    {
        $input = $request->all();

        $ext3time = TR01Work::where('CALD_YEAR', $input['ddlTargetYear'])
            ->where('CALD_MONTH', $input['ddlTargetMonth'])
            ->where('EMP_CD', $input['txtEmpCd'])
            ->selectRaw("Cast(IsNull(Sum(EXT3_TIME_HH), 0) + IsNull(Sum(EXT3_TIME_MI) / 60, 0) As VarChar) + ':' + Right('00' + Cast(IsNull(Sum(EXT3_TIME_MI) % 60, 0) As VarChar), 2) SUM_EXT3_TIME")
            ->first();
            
        return $ext3time;
    }

    //出勤時間、残業項目１～ｎの合計
    public function GetSumTime(Request $request)
    {
        $input = $request->all();

        $sumtime = TR01Work::where('CALD_YEAR', $input['ddlTargetYear'])
            ->where('CALD_MONTH', $input['ddlTargetMonth'])
            ->where('EMP_CD', $input['txtEmpCd'])
            ->selectRaw("Cast(IsNull(Sum(WORK_TIME_HH) + Sum(OVTM1_TIME_HH) + Sum(OVTM2_TIME_HH) + Sum(OVTM3_TIME_HH) + Sum(OVTM4_TIME_HH) + Sum(OVTM5_TIME_HH) + Sum(OVTM6_TIME_HH),0) +
                         IsNull((Sum(WORK_TIME_MI) + Sum(OVTM1_TIME_MI)  + Sum(OVTM2_TIME_MI) + Sum(OVTM3_TIME_MI) + Sum(OVTM4_TIME_MI) + Sum(OVTM5_TIME_MI) + Sum(OVTM6_TIME_MI)) /60, 0) As VarChar) + ':' + 
                         Right('00' + Cast(IsNull((Sum(WORK_TIME_MI) + Sum(OVTM1_TIME_MI)  + Sum(OVTM2_TIME_MI) + Sum(OVTM3_TIME_MI) + Sum(OVTM4_TIME_MI) + Sum(OVTM5_TIME_MI) + Sum(OVTM6_TIME_MI)) % 60, 0) As VarChar), 2) SUM_TIMES")
            ->first();
            
        return $sumtime;
    }
    
    //割増項目１～ｎの合計
    public function GetSumExtTimes(Request $request)
    {
        $input = $request->all();

        $sumext_time = TR01Work::where('CALD_YEAR', $input['ddlTargetYear'])
            ->where('CALD_MONTH', $input['ddlTargetMonth'])
            ->where('EMP_CD', $input['txtEmpCd'])
            ->selectRaw("Cast(IsNull(Sum(EXT1_TIME_HH) + Sum(EXT2_TIME_HH) + Sum(EXT3_TIME_HH),0) +
                         IsNull((Sum(EXT1_TIME_MI) + Sum(EXT2_TIME_MI)  + Sum(EXT3_TIME_MI)) /60, 0) As VarChar) + ':' + 
                         Right('00' + Cast(IsNull((Sum(EXT1_TIME_MI) + Sum(EXT2_TIME_MI)  + Sum(EXT3_TIME_MI)) % 60, 0) As VarChar), 2) SUM_EXT_TIMES")
            ->first();
            
        return $sumext_time;
    }

    //メッセージ表示
    public function messages()
    {
        $msg_4029 = MT99Msg::where('MSG_NO', '4029')->pluck('MSG_CONT')->first();
        return $msg_4029;
    }

    //勤務体系の取得 
    public function workptns()
    {
        $workptn_names = MT05Workptn::all();
        return $workptn_names;
    }

    //自由の取得
    public function reasons()
    {
        $reason_names = MT09Reason::all();
        return $reason_names;
    }

    //フォント色更新処理
    public function holidays()
    {
        $hld_dates = MT08Holiday::pluck('HLD_DATE');

        return $hld_dates;
    }


    // public function wte_edit(Request $request, $emp_cd)
    // {
    //     $input = $request->all();

    //     $edit_data = TR01Work::join('MT05_WORKPTN', 'TR01_WORK.WORKPTN_CD', '=', 'MT05_WORKPTN.WORKPTN_CD')
    //     ->join('MT09_REASON', 'TR01_WORK.REASON_CD', '=', 'MT09_REASON.REASON_CD')
    //     ->where('CALD_YEAR', $input['ddlTargetYear'])
    //     ->where('CALD_MONTH', $input['ddlTargetMonth'])
    //     ->where('EMP_CD', $input['txtEmpCd'])
    //     ->find($emp_cd);

    //     return $edit_data;

    // }

    // public function wte_update(Request $request)
    // {
    //     $post = new WorkTimeRepository;
    //     $data_up = $post->select($request);

    //     $data_up->WORKPTN_NAME = $request->WORKPTN_NAME;
    //     $data_up->save();

        
    //     //dd($name);
        
    // }

    // public function date(Request $request)
    // {
    //     $dates = [];
    //     $input = $request->all();
    //     $date = TR01Work::join('MT05_WORKPTN', 'TR01_WORK.WORKPTN_CD', '=', 'MT05_WORKPTN.WORKPTN_CD')
    //         ->join('MT09_REASON', 'TR01_WORK.REASON_CD', '=', 'MT09_REASON.REASON_CD')
    //         //->join('MT08_HOLIDAY', 'date(TR01_WORK.CALD_DATE)', '=' ,'MT08_HOLIDAY.HLD_DATE')
    //         ->where('CALD_YEAR', $input['ddlTargetYear'])
    //         ->where('CALD_MONTH', $input['ddlTargetMonth'])
    //         ->where('EMP_CD', $input['txtEmpCd'])
    //         ->select('TR01_WORK.CALD_DATE')
    //         ->get();
    //         //dd($date);
    //         foreach($date as $hld_dates){
    //             $dates[] =  (date('md', strtotime($hld_dates['CALD_DATE']))); 
    //         }
                  
    //         return $dates;
    // }
}
