<?php

namespace App\Http\Controllers\Work_Time;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

use App\Models\TR01Work;
use App\Models\MT10Emp;
use App\Models\MT11Login;
use App\Models\MT99Msg;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\VarDumper\Cloner\Data;
use App\Http\Controllers\Work_Time\TempController;

use function PHPUnit\Framework\returnSelf;

class WorkTimeEditorController extends Controller
{
    //////***** 勤怠管理 *****//////
    public $emp_data = '';
    /**
     * 出退勤入力処理
     *
     * @return view
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function WorkTimeEditor()
    {
        
    }

    public function WTE(Request $request)
    {

        //$loginUser = MT11Login::WHERE('LOGIN_ID', '=', $request->txtLoginId)->first();

        // $request->session()->all();
        // $request->session()->regenerate();
        $loginUser2 = session('id');
        //dd($loginUser2);

        //$loginUser = $request->input('txtLoginId');

        //$loginUser2 = '0001';
        //dd($loginUser2);
        //$login_id = (new UserAuthController)-> check($request);

        $emp_cd = DB::table('MT11_LOGIN')->where(['LOGIN_ID' => $loginUser2])->pluck('EMP_CD')->first();
        //$emp_cd = DB::table('MT11_LOGIN')-> where('LOGIN_ID','=','9999')-> pluck('EMP_CD')->first();
        //dd($emp_cd);

        //** ログイン社員の所属部門取得（A-2） */
        $dept_cd = DB::table('MT10_EMP')
            ->join('MT11_LOGIN', 'MT10_EMP.EMP_CD', '=', 'MT11_LOGIN.EMP_CD')
            ->where('MT11_LOGIN.EMP_CD', $emp_cd)
            ->pluck('DEPT_CD')->first();
        //dd($dept_cd);

        //** ログイン社員の部門権限取得（A-3） */
        $dept_auth_cd = DB::table('MT10_EMP')
            ->join('MT11_LOGIN', 'MT10_EMP.EMP_CD', '=', 'MT11_LOGIN.EMP_CD')
            ->where('MT11_LOGIN.EMP_CD', $emp_cd)
            ->pluck('DEPT_AUTH_CD')->first();
        //dd($dept_auth_cd);

        //?? A-4 ??//        
        // $dept_auth = DB::table('MT13_DEPT_AUTH')
        // -> select('DEPT_CD')
        // //-> where('DEPT_AUTH_CD',$dept_auth_cd->pluck('DEPT_AUTH_CD'))
        // -> leftjoin('MT12_DEPT',function($join){
        //     $join->on('MT13_DEPT_AUTH.DEPT_CD','=','MT12_DEPT.DEPT_CD')
        //     -> where('DMT12_DEPT.DISP_CLS_CD','=','01');
        // })
        //  -> get();
        //** ログイン社員の権限部門の取得（A-4） */
        $dispcls_cd = DB::table('MT12_DEPT')
            ->where('MT12_DEPT.DEPT_CD', $dept_cd)
            ->where('DISP_CLS_CD', '=', '01')
            ->pluck('DISP_CLS_CD')->first();
        //->get();
        //dd($dispcls_cd);

        $dept_auth = DB::table('MT13_DEPT_AUTH')
            //-> where('DEPT_AUTH_CD',$dept_auth_cd->pluck('DEPT_AUTH_CD'))
            ->leftjoin('MT12_DEPT', 'MT13_DEPT_AUTH.DEPT_CD', '=', 'MT12_DEPT.DEPT_CD')
            ->where('DISP_CLS_CD', $dispcls_cd)
            ->pluck('MT13_DEPT_AUTH.DEPT_CD')->all();

        // $request->session()->put('dept_auth',$dept_auth);
        // $request->session()->put('key',$emp_cd);
        //dd(session('dept_auth'));


        // }

        // public function WTE(Request $request)
        // {   

        //** tempcontroller test */
        //$data = (new TempController)->login_data($request);

        //dd($emp_cd);

        // $loginUser = $loginUser = MT11Login::WHERE('LOGIN_ID', '=', $request->txtLoginId)->first();
        // dd($loginUser);

        // $id = MT11Login::WHERE('LOGIN_ID', '=', $request->input('txtLoginId'))->first();
        // dd($id);
        //** ログインIDより社員CD取得（A-1） */
        // $emp_cd = DB::table('MT11_LOGIN')-> where('LOGIN_ID','=','9999')-> pluck('EMP_CD')->first();
        // dd($emp_cd);
        // $emp = (string)$emp_cd;
        // $emp = strval($emp_cd);
        // $emp = trim($emp_cd);
        // $emp_c = '9999';
        // dd($emp);


        // $array_1 = array($dept_auth);
        // dd($array_1);
        // dd($dept_auth);

        // return view('work_time.WorkTimeEditor',compact('dept_auth'));
        // return view('work_time.WorkTimeEditor');

        //$this->login_data($request);

        // $request->session()->all();
        // $request->session()->regenerate();

        //**メッセージの取得 */
        $msg_2002 = DB::table('MT99_MSG')->where('MSG_NO', '2002')->pluck('MSG_CONT')->first();

        //dd($msg_2002);
        $msg_2000 = DB::table('MT99_MSG')->where('MSG_NO', '2000')->pluck('MSG_CONT')->first();

        //**インプットの習得（E-1）・未入力チェック */
        $intput_val = $request->input('txtEmpCd');
        //dd($intput_val);

        $request->session()->put('txtEmpCd', $intput_val);

        //**チェック２処理（E-2） */
        $check_2 = MT10Emp::select('EMP_CD')->where(['EMP_CD' => $intput_val])->where('REG_CLS_CD', '<>', '02')->exists();

        //**チェック３処理（E-3） */
        //$for_check = MT10Emp::select('DEPT_CD')->where(['EMP_CD'=>$intput_val])->first();
        $for_check2 = DB::table('MT10_EMP')->where(['EMP_CD' => $intput_val])->pluck('DEPT_CD')->first();
        //dd($for_check2);
        $array_2 = array($for_check2);

        // $dept_auth = session('dept_auth');
        //    //dd($dept_auth);
        // $emp_cd = session('key');
        //dd($array_2);
        $DeptCdCompare = array_intersect($dept_auth, $array_2);
        //dd($DeptCdCompare);

        //** adding */

        if ((!$check_2) && (($intput_val <> $emp_cd) && (empty($DeptCdCompare)))) {
            $check_messsage = $msg_2000;
            //dd($check_messsage);

        }
        if (empty($intput_val)) {
            $check_messsage = $msg_2002;
            //dd($check_messsage);

        }

        if (isset($_GET['btnDisp'])) {           
            //return view('work_time.WorkTimeEditor',compact('check_messsage'));
            if (!empty($check_messsage)) {
                $request->session()->flash('error', $check_messsage);
            }
            //dd(session('error'));
        }


        return view('work_time.WorkTimeEditor');

        //** ---------------------------------------------------------------------------------------- */

        // $intput_val = $request->all();
        // // $intput_val_1 = array($intput_val);

        // //$intput_val_1 = $request->input('txtEmpCd');

        // //dd($intput_val_1);

        // DB::transaction(function ($request) use($intput_val) {
        //     //$this->login_data($request);

        //     // $request->session()->all();
        //     // $request->session()->regenerate();

        //     //**メッセージの取得 */
        //     $msg_2002 = DB::table('MT99_MSG')->where('MSG_NO', '2002')->pluck('MSG_CONT')->first();

        //     //dd($msg_2002);
        //     $msg_2000 = DB::table('MT99_MSG')->where('MSG_NO', '2000')->pluck('MSG_CONT')->first();

        //     // //**インプットの習得（E-1）・未入力チェック */
        //     // //$intput_val = $request->input('txtEmpCd');
        //     // // $intput_val = $request->all();
        //     // // $intput_val_1 = array($intput_val);
        //     // // dd($intput_val);
        //     // //**チェック２処理（E-2） */
        //     // //dd($intput_val_2);
        //     //$check_2 = MT10Emp::select('EMP_CD')->where(['EMP_CD' => $intput_val])->where('REG_CLS_CD', '<>', '02')->exists();

        //     // //**チェック３処理（E-3） */
        //     // //$for_check = MT10Emp::select('DEPT_CD')->where(['EMP_CD'=>$intput_val])->first();
        //     // $for_check3 = DB::table('MT10_EMP')->where(['EMP_CD' => $intput_val])->pluck('DEPT_CD')->first();
        //     // //dd($for_check3);
        //     // $array_2 = array($for_check3);

        //     // $dept_auth = session('dept_auth');
        //     // //dd($dept_auth);
        //     // $emp_cd = session('key');

        //     // $DeptCdCompare = array_intersect($dept_auth, $array_2);
        //     if($intput_val){
        //         if(!empty($intput_val['txtEmpCd'])){
        //             $check_messsage = $msg_2000;
        //             //dd($check_messsage);

        //         }else{
        //             $check_messsage = $msg_2002;
        //             //dd($check_messsage);

        //         }
        //     }

        //     // if ((!$check_2) && (($intput_val <> $emp_cd) && (empty($DeptCdCompare)))) {
        //     //     $this->check_messsage = $msg_2000;
        //     // };
        //     // if (empty($intput_val)) {
        //     //     $this->check_messsage = $msg_2002;
        //     // }
        //     // return $check_messsage;
        //     // dd($check_messsage);
        //     return $check_messsage;
        //     //dd($check_messsage);

        //     //return view('work_time.WorkTimeEditor',compact('check_messsage'));
        // });


        //return view('work_time.WorkTimeEditor',compact('check_messsage'));
        //return view('work_time.WorkTimeEditor',compact('check_2','msg_2000','msg_2002','intput_val','DeptCdCompare','emp_cd'));
    }
}
