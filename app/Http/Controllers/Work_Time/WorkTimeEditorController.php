<?php

namespace App\Http\Controllers\Work_Time;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

use App\Models\TR01_Work;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\VarDumper\Cloner\Data;

class WorkTimeEditorController extends Controller
{
    //////***** 勤怠管理 *****//////
    /**
     * 出退勤入力処理
     *
     * @return view
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    // public function check(Request $request)
    // {
    //     $request->validate(['emp_no' => 'required']);
    // }
    public function WorkTimeEditor()
    {
        $id = Auth::id();
        
        //?? A-1 ??//
        $emp_cd = DB::table('MT11_LOGIN')
        -> where('LOGIN_ID','=','9999')
        -> get('EMP_CD');
         //  dd($emp_cd);
        //$emp = (string)$emp_cd;
        //$emp = strval($emp_cd);
        //$emp = trim($emp_cd);
        //$emp_c = '9999';
        //dd($emp);
        //?? A-2 ??//
        $dept_id = DB::table('MT10_EMP')
        //-> select('DEPT_CD')
        -> join('MT11_LOGIN','MT10_EMP.EMP_CD','=','MT11_LOGIN.EMP_CD')
        -> where('LOGIN_ID',$emp_cd->pluck('EMP_CD'))
        -> get('DEPT_CD');
        //dd($dept_id);
        
        //?? A-3 ??//
        $dept_cd = DB::table('MT10_EMP')
        -> join('MT11_LOGIN','MT10_EMP.EMP_CD','=','MT11_LOGIN.EMP_CD')
        -> where('LOGIN_ID',$emp_cd->pluck('EMP_CD')) 
        -> get('DEPT_AUTH_CD');
        //dd($dept_cd);

        //?? A-4 ??//        
        $dept_auth_cd = DB::table('MT13_DEPT_AUTH')
        -> where('DEPT_AUTH_CD',$dept_cd->pluck('DEPT_AUTH_CD'))
        //-> where('DISP_CLS_CD','=','01') 
        -> get('DEPT_CD');
        //dd($dept_cds);

        //$rules =['emp_no' => 'required'];
        //$request->validate(['emp_no' => 'required']);
        // $validated = $request->validate([
        //     'emp_no' => 'required|unique:posts|max:255'   
        // ]);
        //dd($validated);
        
        //?? A-5 ??// 

        return view('work_time.WorkTimeEditor',compact('dept_auth_cd'));
        //return view('work_time.WorkTimeEditor');
    }

    public function WTE(Request $request){
        //$posts = $request->all();
        // $validated = $request->validate([
        //     'emp_no' => 'required|unique:posts|max:255'   
        // ]);
        
        // $check1 = DB::table('MT10_EMP')
        // -> where('EMP_CD',);
        //$emp_data = Input::get('emp_no');
        
        $emp_data = $request->get('emp_no');
        dd($emp_data);
        DB::transaction(function()  {
                 $check1 = TR01_Work::select('MT10_EMP')->where('EMP_CD','=','$emp_data')->where('REG_CLS_CD','<>','02');
                dd($check1);
        if(($check1 == true)){
            // dd('error');
            $error_msg = DB::table('MT99_MSG')->where('MSG_NO','=','2000')->get('MSG_CONT');
            dd($error_msg);
        }else{
            $error_msg = DB::table('MT99_MSG')->where('MSG_NO','=','2002')->get('MSG_CONT');
            dd($error_msg);
        }
        });

        return view('work_time.WorkTimeEditor');
    }

    // 未入力チェック //
    // public function Emp_Check()
    // {
    //     $emp = DB::table('MT99_MSG')
    //     -> where('MSG_NO','2002')
    //     ->get('MSG_CONT');
    //     dd($emp);

    //     return view('work_time.WorkTimeEditor');
    // }
    // public function post(Request $request)
    // {  
        

    // }

}
