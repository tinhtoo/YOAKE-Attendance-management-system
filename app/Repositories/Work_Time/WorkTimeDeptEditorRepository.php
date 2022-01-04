<?php

namespace App\Repositories\Work_Time;

use Illuminate\Http\Request;

use App\Models\TR01Work;
use App\Models\MT99Msg;
use App\Models\MT23Company;
use App\Models\MT05Workptn;
use App\Models\MT09Reason;
use App\Http\Requests\WorkTimeDeptEditorRequest;
use App\Filters\WorkTimeDeptEditorFilter;

class WorkTimeDeptEditorRepository
{
    //** 出退勤入力（部門別） 処理 */
    /**
     * ヘッダーの検索条件表示
     * @return WorkTimeDeptEditorController
     */
    public function select(WorkTimeDeptEditorRequest $request, WorkTimeDeptEditorFilter $filter)
    {
        $inputEmpData = $request->all();
        $inputReason = $request->Input(['filter']);
        $inputYear = $inputEmpData['ddlTargetYear'];
        $inputMonth = $inputEmpData['ddlTargetMonth'];
        
        $inputDay = $inputEmpData['ddlTargetDay'];
        $totalDate = $inputYear . '-' . $inputMonth . '-' . $inputDay;
        $changeDateType = date('Y-m-d H:i:s', strtotime($totalDate));
        //dd($changeDateType);
        
        $targetdata_search = TR01Work::join('MT10_EMP', 'TR01_WORK.EMP_CD', '=','MT10_EMP.EMP_CD')
            ->join('MT05_WORKPTN', 'TR01_WORK.WORKPTN_CD', '=', 'MT05_WORKPTN.WORKPTN_CD')
            ->join('MT09_REASON', 'TR01_WORK.REASON_CD', '=', 'MT09_REASON.REASON_CD')
            ->leftjoin('MT12_DEPT', 'MT10_EMP.DEPT_CD', '=', 'MT12_DEPT.DEPT_CD')
            ->where('MT10_EMP.REG_CLS_CD', '=', '00' )
            ->where('TR01_WORK.CALD_DATE', '=', $changeDateType)
            ->where('MT10_EMP.DEPT_CD', $inputEmpData['txtDeptCd'])
            ->filter($filter)
            ->select('TR01_WORK.*', 'MT10_EMP.DEPT_CD', 'MT12_DEPT.DEPT_NAME', 'MT10_EMP.EMP_CD', 'MT10_EMP.EMP_NAME', 'MT05_WORKPTN.WORKPTN_NAME', 'MT05_WORKPTN.WORK_CLS_CD', 'MT09_REASON.REASON_NAME', 'MT09_REASON.REASON_PTN_CD')
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
            //->groupBy('TR01_WORK.EMP_CD','MT10_EMP.DEPT_CD', 'MT12_DEPT.DEPT_NAME', 'MT10_EMP.EMP_CD', 'MT10_EMP.EMP_NAME')
            ->get();

        return $targetdata_search;
    }

    //** 該当データ無し時エラーメッセージ表示 */
    /**
     * カレンダー情報が作成されていません。
     * @return WorkTimeDeptEditorController
     */
    public function messages()
    {
        $errMsg_4029 = MT99Msg::where('MSG_NO', '4029')->pluck('MSG_CONT')->first();
        return $errMsg_4029;
    }

    //** 所属情報取得 */
    /**
     * A派遣、B派遣、C派遣など
     * @return WorkTimeDeptEditorController
     */
    public function companyName()
    {
        $company = MT23Company::all();
        return $company;
    }

    // 勤務体系の取得 
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
}
