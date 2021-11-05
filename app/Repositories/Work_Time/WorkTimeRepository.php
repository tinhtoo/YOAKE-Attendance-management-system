<?php

namespace App\Repositories\Work_Time;

use Illuminate\Http\Request;

use App\Models\TR01Work;
use App\Models\MT05Workptn;
use App\Models\MT09Reason;
use App\Models\MT99Msg;


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
            ->selectRaw("Case When TR01_WORK.OFC_TIME_HH Is Null THEN '' 
                        Else Cast(TR01_WORK.OFC_TIME_HH As VarChar) + ':' + RIGHT('00' + Cast(TR01_WORK.OFC_TIME_MI As VarChar), 2)
                    End As OFC_TIME")
            ->selectRaw("Case When TR01_WORK.LEV_TIME_HH Is Null Then ''
                        Else Cast(TR01_WORK.LEV_TIME_HH As VarChar) + ':' + RIGHT('00' + Cast(TR01_WORK.LEV_TIME_MI As VarChar), 2)
                    End As LEV_TIME")
            ->selectRaw("Case When TR01_WORK.OUT1_TIME_HH Is Null Then ''
                        Else Cast(TR01_WORK.OUT1_TIME_HH As VarChar) + ':' + RIGHT('00' + Cast(TR01_WORK.OUT1_TIME_MI As VarChar), 2)
                    End As OUT1_TIME")
            ->selectRaw("Case When TR01_WORK.IN1_TIME_HH Is Null Then ''
                        Else Cast(TR01_WORK.IN1_TIME_HH As VarChar) + ':' + RIGHT('00' + Cast(TR01_WORK.IN1_TIME_MI As VarChar), 2)
                    End As IN1_TIME")
            ->selectRaw("Case When TR01_WORK.OUT2_TIME_HH Is Null Then ''
                        Else Cast(TR01_WORK.OUT2_TIME_HH As VarChar) + ':' + RIGHT('00' + Cast(TR01_WORK.OUT2_TIME_MI As VarChar), 2)
                    End As OUT2_TIME")
            ->selectRaw("Case When TR01_WORK.IN2_TIME_HH Is Null Then ''
                        Else Cast(TR01_WORK.IN2_TIME_HH As VarChar) + ':' + RIGHT('00' + Cast(TR01_WORK.IN2_TIME_MI As VarChar), 2)
                    End As IN2_TIME")
            ->selectRaw("Case When TR01_WORK.WORK_TIME_HH + TR01_WORK.WORK_TIME_MI = 0 Then ''
                        Else Cast(TR01_WORK.WORK_TIME_HH  As VarChar) + ':' + RIGHT('00' + Cast(TR01_WORK.WORK_TIME_MI  As VarChar), 2)
                    End AS WORK_TIME")
            ->selectRaw("Case When TR01_WORK.TARD_TIME_HH + TR01_WORK.TARD_TIME_MI = 0 Then ''
                        Else Cast(TR01_WORK.TARD_TIME_HH  As VarChar) + ':' + RIGHT('00' + Cast(TR01_WORK.TARD_TIME_MI  As VarChar), 2)
                    End AS TARD_TIME")
            ->selectRaw("Case When TR01_WORK.LEAVE_TIME_HH + TR01_WORK.LEAVE_TIME_MI = 0 Then ''
                        Else Cast(TR01_WORK.LEAVE_TIME_HH As VarChar) + ':' + RIGHT('00' + Cast(TR01_WORK.LEAVE_TIME_MI As VarChar), 2)
                    End AS LEAVE_TIME")
            ->selectRaw("Case When TR01_WORK.OUT_TIME_HH + TR01_WORK.OUT_TIME_MI = 0 Then ''
                        Else Cast(TR01_WORK.OUT_TIME_HH   As VarChar) + ':' + RIGHT('00' + Cast(TR01_WORK.OUT_TIME_MI   As VarChar), 2)
                    End AS OUT_TIME")
            ->selectRaw("Case When TR01_WORK.OVTM1_TIME_HH + TR01_WORK.OVTM1_TIME_MI = 0 Then ''
                        Else Cast(TR01_WORK.OVTM1_TIME_HH As VarChar) + ':' + RIGHT('00' + Cast(TR01_WORK.OVTM1_TIME_MI As VarChar), 2)
                    End AS OVTM1_TIME")
            ->selectRaw("Case When TR01_WORK.OVTM2_TIME_HH + TR01_WORK.OVTM2_TIME_MI = 0 Then ''
                        Else Cast(TR01_WORK.OVTM2_TIME_HH As VarChar) + ':' + RIGHT('00' + Cast(TR01_WORK.OVTM2_TIME_MI As VarChar), 2)
                    End AS OVTM2_TIME")
            ->selectRaw("Case When TR01_WORK.OVTM3_TIME_HH + TR01_WORK.OVTM3_TIME_MI = 0 Then ''
                        Else Cast(TR01_WORK.OVTM3_TIME_HH As VarChar) + ':' + RIGHT('00' + Cast(TR01_WORK.OVTM3_TIME_MI As VarChar), 2)
                    End AS OVTM3_TIME")
            ->selectRaw("Case When TR01_WORK.OVTM4_TIME_HH + TR01_WORK.OVTM4_TIME_MI = 0 Then ''
                        Else Cast(TR01_WORK.OVTM4_TIME_HH As VarChar) + ':' + RIGHT('00' + Cast(TR01_WORK.OVTM4_TIME_MI As VarChar), 2)
                    End AS OVTM4_TIME")
            ->selectRaw("Case When TR01_WORK.OVTM5_TIME_HH + TR01_WORK.OVTM5_TIME_MI = 0 Then ''
                        Else Cast(TR01_WORK.OVTM5_TIME_HH As VarChar) + ':' + RIGHT('00' + Cast(TR01_WORK.OVTM5_TIME_MI As VarChar), 2)
                    End AS OVTM5_TIME")
            ->selectRaw("Case When TR01_WORK.OVTM6_TIME_HH + TR01_WORK.OVTM6_TIME_MI = 0 Then ''
                        Else Cast(TR01_WORK.OVTM6_TIME_HH As VarChar) + ':' + RIGHT('00' + Cast(TR01_WORK.OVTM6_TIME_MI As VarChar), 2)
                    End AS OVTM6_TIME")
            ->selectRaw("Case When TR01_WORK.EXT1_TIME_HH + TR01_WORK.EXT1_TIME_MI = 0 Then ''
                        Else Cast(TR01_WORK.EXT1_TIME_HH As VarChar) + ':' + RIGHT('00' + Cast(TR01_WORK.EXT1_TIME_MI As VarChar), 2)
                    End AS EXT1_TIME")
            ->selectRaw("Case When TR01_WORK.EXT2_TIME_HH + TR01_WORK.EXT2_TIME_MI = 0 Then ''
                        Else Cast(TR01_WORK.EXT2_TIME_HH As VarChar) + ':' + RIGHT('00' + Cast(TR01_WORK.EXT2_TIME_MI As VarChar), 2)
                    End AS EXT2_TIME")
            ->selectRaw("Case When TR01_WORK.EXT3_TIME_HH + TR01_WORK.EXT3_TIME_MI = 0 Then ''
                        Else Cast(TR01_WORK.EXT3_TIME_HH As VarChar) + ':' + RIGHT('00' + Cast(TR01_WORK.EXT3_TIME_MI As VarChar), 2)
                    End AS EXT3_TIME")
            ->selectRaw("Case When TR01_WORK.RSV1_TIME_HH + TR01_WORK.RSV1_TIME_MI = 0 Then ''
                        Else Cast(TR01_WORK.RSV1_TIME_HH As VarChar) + ':' + RIGHT('00' + Cast(TR01_WORK.RSV1_TIME_MI As VarChar), 2)
                    End AS RSV1_TIME")

            ->get();

        //dd($targetdata);
        return $targetdata;
    }
    public function messages()
    {
        $msg_4029 = MT99Msg::where('MSG_NO', '4029')->pluck('MSG_CONT')->first();
        return $msg_4029;
    }

    // public function edit($request,$EMP_CD,$CALD_DATE)
    // {
        
    //     $foredit = $this->select($request);
    //     $wte_edit = $foredit->EMP_CD; 
    //     // ->update([]);
    //     //dd($foredit);
    //     return $wte_edit;
    // }

    public function workptns()
    {
        $workptn_names = MT05Workptn::all();
        return $workptn_names;
    }

    public function reasons()
    {
        $reason_names = MT09Reason::all();
        return $reason_names;

    }

    public function wte_edit(Request $request, $emp_cd)
    {
        $input = $request->all();

        $edit_data = TR01Work::join('MT05_WORKPTN', 'TR01_WORK.WORKPTN_CD', '=', 'MT05_WORKPTN.WORKPTN_CD')
        ->join('MT09_REASON', 'TR01_WORK.REASON_CD', '=', 'MT09_REASON.REASON_CD')
        ->where('CALD_YEAR', $input['ddlTargetYear'])
        ->where('CALD_MONTH', $input['ddlTargetMonth'])
        ->where('EMP_CD', $input['txtEmpCd'])
        ->find($emp_cd);

        return $edit_data;

    }

    public function wte_update(Request $request)
    {
        $post = new WorkTimeRepository;
        $data_up = $post->select($request);

        $data_up->WORKPTN_NAME = $request->WORKPTN_NAME;
        $data_up->save();

        
        //dd($name);
        
    }
}
