<?php

namespace App\Repositories\Work_Time;

use Illuminate\Http\Request;

use App\Models\TR01Work;
use App\Models\MT99Msg;
use App\Models\MT10Emp;
use App\Models\MT12Dept;
use App\Models\TR04WorkTimeFix;
use App\Models\MT23Company;
use App\Models\MT22ClosingDate;
use App\Http\Requests\EmpWorkTimeReferenceRequest;
use App\Filters\EmpWorkTimeRefFilter;


class EmpWorkTimeReferenceRepository
{

    public function select(EmpWorkTimeReferenceRequest $request, EmpWorkTimeRefFilter $filter)
    {
        $input = $request->all();

        $sql = TR01Work::join('MT10_EMP', 'TR01_WORK.EMP_CD', '=','MT10_EMP.EMP_CD')
            ->leftjoin('MT02_CALENDAR_PTN', 'MT10_EMP.CALENDAR_CD', '=', 'MT02_CALENDAR_PTN.CALENDAR_CD')
            ->leftjoin('MT12_DEPT', 'MT10_EMP.DEPT_CD', '=', 'MT12_DEPT.DEPT_CD')
            ->leftjoin('MT22_CLOSING_DATE', 'MT10_EMP.CLOSING_DATE_CD', '=', 'MT22_CLOSING_DATE.CLOSING_DATE_CD')
            ->filter($filter)
            ->selectRaw('MT10_EMP.DEPT_CD')
            ->selectRaw('MT12_DEPT.DEPT_NAME')
            ->selectRaw('MT10_EMP.EMP_CD')
            ->selectRaw('MT10_EMP.EMP_NAME')
            ->selectRaw('MT02_CALENDAR_PTN.CALENDAR_NAME')
            ->selectRaw(('Sum(WORKDAY_CNT) as SUM_WORKDAY_CNT'))
            ->selectRaw(('Sum(HOLWORK_CNT) as SUM_HOLWORK_CNT'))
            ->selectRaw(('Sum(SPCHOL_CNT) as SUM_SPCHOL_CNT'))
            ->selectRaw(('Sum(PADHOL_CNT) as SUM_PADHOL_CNT'))
            ->selectRaw(('Sum(ABCWORK_CNT) as SUM_ABCWORK_CNT'))
            ->selectRaw(('Sum(COMPDAY_CNT) as SUM_COMPDAY_CNT'))
            ->selectRaw(("Cast(Sum(WORK_TIME_HH)  + Sum(WORK_TIME_MI)  / 60 As VarChar) + ':' + RIGHT('00' + Cast(Sum(WORK_TIME_MI)  % 60 As VarChar), 2) SUM_WORK_TIME"))
            ->selectRaw(("Cast(Sum(TARD_TIME_HH)  + Sum(TARD_TIME_MI)  / 60 As VarChar) + ':' + RIGHT('00' + Cast(Sum(TARD_TIME_MI)  % 60 As VarChar), 2) SUM_TARD_TIME"))
            ->selectRaw(("Cast(Sum(LEAVE_TIME_HH) + Sum(LEAVE_TIME_MI) / 60 As VarChar) + ':' + RIGHT('00' + Cast(Sum(LEAVE_TIME_MI) % 60 As VarChar), 2) SUM_LEAVE_TIME"))
            ->selectRaw(("Cast(Sum(OUT_TIME_HH)   + Sum(OUT_TIME_MI)   / 60 As VarChar) + ':' + RIGHT('00' + Cast(Sum(OUT_TIME_MI)   % 60 As VarChar), 2) SUM_OUT_TIME"))
            ->selectRaw(("Cast(Sum(OVTM1_TIME_HH) + Sum(OVTM1_TIME_MI) / 60 As VarChar) + ':' + RIGHT('00' + Cast(Sum(OVTM1_TIME_MI) % 60 As VarChar), 2) SUM_OVTM1_TIME"))
            ->selectRaw(("Cast(Sum(OVTM2_TIME_HH) + Sum(OVTM2_TIME_MI) / 60 As VarChar) + ':' + RIGHT('00' + Cast(Sum(OVTM2_TIME_MI) % 60 As VarChar), 2) SUM_OVTM2_TIME"))
            ->selectRaw(("Cast(Sum(OVTM3_TIME_HH) + Sum(OVTM3_TIME_MI) / 60 As VarChar) + ':' + RIGHT('00' + Cast(Sum(OVTM3_TIME_MI) % 60 As VarChar), 2) SUM_OVTM3_TIME"))
            ->selectRaw(("Cast(Sum(OVTM4_TIME_HH) + Sum(OVTM4_TIME_MI) / 60 As VarChar) + ':' + RIGHT('00' + Cast(Sum(OVTM4_TIME_MI) % 60 As VarChar), 2) SUM_OVTM4_TIME"))
            ->selectRaw(("Cast(Sum(OVTM5_TIME_HH) + Sum(OVTM5_TIME_MI) / 60 As VarChar) + ':' + RIGHT('00' + Cast(Sum(OVTM5_TIME_MI) % 60 As VarChar), 2) SUM_OVTM5_TIME"))
            ->selectRaw(("Cast(Sum(OVTM6_TIME_HH) + Sum(OVTM6_TIME_MI) / 60 As VarChar) + ':' + RIGHT('00' + Cast(Sum(OVTM6_TIME_MI) % 60 As VarChar), 2) SUM_OVTM6_TIME"))
            ->selectRaw(("Cast(Sum(EXT1_TIME_HH)  + Sum(EXT1_TIME_MI)  / 60 As VarChar) + ':' + RIGHT('00' + Cast(Sum(EXT1_TIME_MI)  % 60 As VarChar), 2) SUM_EXT1_TIME"))
            ->selectRaw(("Cast(Sum(EXT2_TIME_HH)  + Sum(EXT2_TIME_MI)  / 60 As VarChar) + ':' + RIGHT('00' + Cast(Sum(EXT2_TIME_MI)  % 60 As VarChar), 2) SUM_EXT2_TIME"))
            ->selectRaw(("Cast(Sum(EXT3_TIME_HH)  + Sum(EXT3_TIME_MI)  / 60 As VarChar) + ':' + RIGHT('00' + Cast(Sum(EXT3_TIME_MI)  % 60 As VarChar), 2) SUM_EXT3_TIME"))
            ->groupBy('TR01_WORK.EMP_CD', 'MT10_EMP.DEPT_CD', 'MT12_DEPT.DEPT_NAME', 'MT10_EMP.EMP_CD', 'MT10_EMP.EMP_NAME', 'MT02_CALENDAR_PTN.CALENDAR_NAME')            
            ->get();
           
        return $sql;
    }

    //** ?????????????????????????????????????????????????????? */
    /**
     * ??????????????????????????????????????????????????????
     * @return EmpWorkTimeReferenceController
     */
    public function messages()
    {
        $msg_4029 = MT99Msg::where('MSG_NO', '4029')->pluck('MSG_CONT')->first();
        return $msg_4029;
    }

    //** ?????????????????? */
    /**
     * A?????????B?????????C????????????
     * @return EmpWorkTimeReferenceController
     */
    public function kaisha()
    {
        $haken_company = MT23Company::all();
        return $haken_company;
    }

    /**?????????????????? */
    /**
     * @return EmpWorkTimeReferenceController
     */
    public function shimebi()
    {
        $close_date = MT22ClosingDate::all();
        return $close_date;
    }

    /**
     *  ??????????????????????????????
     *
     * @param Request $request
     * @return void
     */
    public function name(Request $request){
        $search_name =  $request->Input(['filter']);
        if(!empty($search_name['txtEmpCd'])){
            $empName = MT10Emp::where('EMP_CD', $search_name['txtEmpCd'])->pluck('EMP_NAME');
            return $empName;
        }

        if($search_name['txtDeptCd']){
            $deptName = MT12Dept::where('DEPT_CD', $search_name['txtDeptCd'])->pluck('DEPT_NAME');
            return $deptName;
        }
    }
    
    // public function empName(Request $request){

    //     $search_name =  $request->Input(['filter']);
    //     $empName = MT10Emp::where('EMP_CD', $search_name['txtEmpCd'])->pluck('EMP_NAME');
    //     return $empName;
    // }

    // public function deptName(Request $request){

    //     $search_name =  $request->Input(['filter']);
    //     $deptName = MT12Dept::where('DEPT_CD', $search_name['txtDeptCd'])->pluck('DEPT_NAME');
    //     return $deptName;
    // }
    
    /**
     * ????????????????????????
     * @return EmpWorkTimeReferenceController
     */
    public function confirm(Request $request){
        //$datas = $this->all();
        //dd($data);
        $prepare =  $request->Input(['filter']);
        //dd($prepare);
        $chk = $prepare['SearchCondition'];
        //dd($chk);
        if ($chk ='rbSearchEmp' && $chk != 'rbSearchDept'){

                $input = $request->Input(['filter']);
                /** 2022/03/03 tin ?????????start */
                // $all_input = $request->all();
                $year = substr(($input['ddlDate']), 0, 4);
                $month = substr(($input['ddlDate']), 5, 2);
                // dd($month);
                /** 2022/03/03 tin ?????????end */

                $deptCd = MT10Emp::where('MT10_EMP.EMP_CD', $input['txtEmpCd'])->pluck('DEPT_CD')->first();
                $closingDate = MT10Emp::where('MT10_EMP.EMP_CD', $input['txtEmpCd'])->pluck('CLOSING_DATE_CD')->first();
                //dd($closingDate);
                $Confirm = TR04WorkTimeFix::where('CALD_YEAR', (int)$year)
                    ->where('CALD_MONTH', (int)$month)
                    ->where('CLOSING_DATE_CD', $closingDate )
                    ->where('DEPT_CD', $deptCd)
                    //->get();
                    //->exists();
                    ->first();
                    //dd($Confirm);
                return $Confirm;
            }

        if ($chk = 'rbSearchDept' && $chk != 'rbSearchEmp'){
            $input = $request->Input(['filter']);
            // dd($input);
            /** 2022/03/03 tin ?????????start */
            // $all_input = $request->all();
            $year = substr(($input['ddlDate']), 0, 4);
            $month = substr(($input['ddlDate']), 5, 2);
            // dd($month);
            /** 2022/03/03 tin ?????????end */

            $Confirm = TR04WorkTimeFix::where('CALD_YEAR', (int)$year)
                ->where('CALD_MONTH', (int)$month)
                ->where('CLOSING_DATE_CD', $input['ddlClosingDate'])
                ->where('DEPT_CD', $input['txtDeptCd'])
                //->get();
                //->exists();
                ->first();
                //dd($Confirm);
            return $Confirm;
        }
    }

        
}
        

