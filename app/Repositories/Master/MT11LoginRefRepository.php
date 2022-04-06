<?php

namespace App\Repositories\Master;

use Illuminate\Http\Request;

// use App\Models\TR01Work;
use App\Models\MT10Emp;
use App\Models\MT99Msg;
use App\Models\MT11Login;
use App\Models\MT14PgAuth;
// use App\Models\MT13DeptAuth;
// use App\Models\MT12Dept;
use App\Filters\MT11LoginRefFilter;
use App\Http\Requests\MT11LoginRefRequest;
// use App\Http\Requests\MT11LoginEditRequest;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class MT11LoginRefRepository
{
    public function search(MT11LoginRefFilter $filter)
    {
        // if (Session()->exists('id')){
            //** SessionでログインIDの取得 */
            // $loginId = session('id');

            //** ログイン社員の取得（Ⅰ） */
            // $Emp_Cd = MT11Login::where('LOGIN_ID', $loginId)
            // ->pluck('EMP_CD');

            // //** ログイン社員の所属部門取得（Ⅱ） */
            //     //** ログインIDより社員CD取得（１）　*/
            // $emp_cd = MT11Login::where(['LOGIN_ID' => $loginId])->pluck('EMP_CD')->first();
            // //dd($emp_cd);

            //     //** ログイン社員の部門権限取得（２） */
            // $dept_auth_cd = MT10Emp::where('EMP_CD', $emp_cd)->pluck('DEPT_AUTH_CD')->first();

            //     //** ログイン社員の部門権限がある部門の取得（３） */
            // $dept_auth = MT13DeptAuth::where('DEPT_AUTH_CD', $dept_auth_cd)->pluck('DEPT_CD')->all();

            // //** MT10_EMPの取得 (4)*/
            // //ログインした社員で部門権限を取得し、その部門権限に含まれる部門に所属する社員の取得（固定条件Ⅱ）
            // $query = MT10Emp::join('MT12_DEPT', 'MT10_EMP.DEPT_CD', '=', 'MT12_DEPT.DEPT_CD')
            // ->whereIn('MT10_EMP.DEPT_CD', $dept_auth)
            // ->where('MT10_EMP.REG_CLS_CD', '<>', 02)
            // ->filter($filter)
            // ->orderBy('EMP_CD');

            //ログインした社員の取得（固定条件Ⅰ）
            // if($query->count() <= 0){
                $query = MT10Emp::filter($filter)
                ->orderBy('EMP_CD');
            // }

            if (isset($_GET['button_A'])) {

                $Agyou = '[ァ-オ]';

                $query->where('MT10_EMP.EMP_KANA', 'like', "{$Agyou}%");
            }

            if (isset($_GET['button_KA'])) {

                $KAgyou = '[カ-ゴ]';

                $query->where('EMP_KANA', 'like', "{$KAgyou}%");
            }

            if (isset($_GET['button_SA'])) {

                $SAgyou = '[サ-ゾ]';

                $query->where('EMP_KANA', 'like', "{$SAgyou}%");
            }

            if (isset($_GET['button_TA'])) {

                $TAgyou = '[タ-ド]';

                $query->where('EMP_KANA', 'like', "{$TAgyou}%");
            }

            if (isset($_GET['button_NA'])) {

                $NAgyou = '[ナ-ノ]';

                $query->where('EMP_KANA', 'like', "{$NAgyou}%");
            }

            if (isset($_GET['button_HA'])) {

                $HAgyou = '[ハ-ポ]';

                $query->where('EMP_KANA', 'like', "{$HAgyou}%");
            }

            if (isset($_GET['button_MA'])) {

                $MAgyou = '[マ-モ]';

                $query->where('EMP_KANA', 'like', "{$MAgyou}%");
            }

            if (isset($_GET['button_YA'])) {

                $YAgyou = '[ャ-ヨ]';

                $query->where('EMP_KANA', 'like', "{$YAgyou}%");
            }

            if (isset($_GET['button_RA'])) {

                $RAgyou = '[ラ-ロ]';

                $query->where('EMP_KANA', 'like', "{$RAgyou}%");
            }

            if (isset($_GET['button_WA'])) {

                $WAgyou = '[ヮ-ン]';

                $query->where('EMP_KANA', 'like', "{$WAgyou}%");
            }

            if (isset($_GET['button_EN'])) {

                $EN = '[a-zA-Z]';

                $query->where('EMP_KANA', 'like', "{$EN}%");
            }

            $query_results = $query->paginate(40);
            //dd($query_results);
            return $query_results;
    
        // }else{
            //$query_results = '...no session...';
            //return $query_results;
            //return $query_results($request);
            //return redirect('work_time.WorkTimeEditor'); 
            // return redirect()->back();
        // }

    }        

    public function edit($id)
    {
        // $emp_cd = MT10Emp::find($id);
        // dd($emp_cd);
        $emp_cd = MT10Emp::join('MT14_PG_AUTH', 'MT10_EMP.PG_AUTH_CD', 'MT14_PG_AUTH.PG_AUTH_CD')
        ->where('MT10_EMP.EMP_CD', $id)->first();
        // $emp_cd = MT10Emp::join('MT11_LOGIN', 'MT10_EMP.EMP_CD', 'MT11_LOGIN.EMP_CD')
        // ->join('MT14_PG_AUTH', 'MT10_EMP.PG_AUTH_CD', 'MT14_PG_AUTH.PG_AUTH_CD')
        // ->where('MT10_EMP.EMP_CD', $id)
        // ->orwhere('MT11_LOGIN.EMP_CD', $id)
        // ->first();
        // dd($id);
        // dd($emp_cd);
        return $emp_cd;
    }

    public function user($id)
    {
        // $emp_cd = MT10Emp::find($id);
        // dd($emp_cd);
        // $user_id = MT10Emp::join('MT11_LOGIN', 'MT10_EMP.EMP_CD', 'MT11_LOGIN.EMP_CD')
        // ->where('MT10_EMP.EMP_CD', $id)->first();
        //dd($id);
        $emp_cd = MT11Login::where('EMP_CD', $id)->first();
        // if($emp_cd){
        //     return $emp_cd;
        // }else{
        //     $emp_cd = '';
        //     return $emp_cd;
        // }
        return $emp_cd;
    }

    // public function authname($id)
    // {
    //     // $emp_cd = MT14PgAuth::join('MT10_EMP', 'MT14_PG_AUTH.PG_AUTH_CD', 'MT10_EMP.PG_AUTH_CD')
    //     // ->where('MT10_EMP.EMP_CD', $id)->first();
    //     $auth_cd = MT10Emp::where('MT10_EMP.EMP_CD', $id)->get('PG_AUTH_NAME');
    //     // $auth_name = MT14PgAuth::where('PG_AUTH_CD', $auth_cd[0])->get();
    //     //$auth_name = MT14PgAuth::get()->groupBy('PG_AUTH_CD');
    //     //dd($auth_cd);
    //     return $auth_cd;
    // }

    public function pgauth()
    {
        $pg_auth = MT14PgAuth::select('MT14_PG_AUTH.*')->get();

        return $pg_auth;
    }

    public function messages()
    {
        $msg_2000 = MT99Msg::where('MSG_NO', '2000')->pluck('MSG_CONT')->first();
        return $msg_2000;
    }

    // public function update(MT11LoginEditRequest $request)
    // {
    //     // $request_data = $request->all();
    //     // $search_data = $request->input(['filter']);
    //     // $dept_name = $request->input('deptName');
    //     // $search_results = $this->LoginRef_repository->search($request, $filter);
    //     // $messages = $this->LoginRef_repository->messages();
        
    //     // return view('master.MT11LoginReference', compact('request_data','search_data', 'search_results', 'messages'));

    //     $inputData = $request->all();
    //     // dd($inputData);
    //     // dd($inputData['txtEmpCd']);
    //     // dd($id);
    //     // $update_info = MT11Login::where('EMP_CD', $inputData['txtLoginId'])->first();
    //     // $update_info = MT11Login::find($inputData['txtEmpCd']);
    //     $update_info2 = MT10Emp::where('EMP_CD', $inputData['txtEmpCd'])->pluck('EMP_CD');
    //     // dd($update_info2);
    //     // $update_info->EMP_CD = $id;
    //     try {
    //         $update_info = MT11Login::find($inputData['txtEmpCd']);
    //         $update_info2 = MT10Emp::find($inputData['txtEmpCd']);
    //         if($update_info == null){
    //             $update_info = new MT11Login;
    //             $update_info->EMP_CD = $inputData['txtEmpCd'];
    //             $update_info->LOGIN_ID = $inputData['txtLoginId'];
    //             $update_info->PASSWORD = $inputData['txtNewPassword'];
    //             //登録日付（TimeZone->Asia/Tokyo)
    //             date_default_timezone_set('Asia/Tokyo');
    //             $update_info->UPD_DATE = now();
    //             $update_info->timestamps = false;
    //             $update_info->save();

    //             // if($update_info == $update_info2){
    //             $update_info2->PG_AUTH_CD = $inputData['ddlPgAuth'];
    //             $update_info2->UPD_DATE = now();
    //             $update_info2->timestamps = false;
    //             $update_info2->save();
    //             // }
                

    //             // $success = 'the patient has been created successfully';
    //             // return redirect('/master/MT11LoginReference');
    //         } 
    //         if(!empty($update_info)){
    //             // $update_info = new MT11Login;
    //             // $update_info->EMP_CD = $inputData['txtEmpCd'];
    //             $update_info->LOGIN_ID = $inputData['txtLoginId'];
    //             $update_info->PASSWORD = $inputData['txtNewPassword'];
    //             //登録日付（TimeZone->Asia/Tokyo)
    //             date_default_timezone_set('Asia/Tokyo');
    //             $update_info->UPD_DATE = now();
    //             $update_info->timestamps = false;
    //             $update_info->save();

    //             // if($update_info == $update_info2){
    //             $update_info2->PG_AUTH_CD = $inputData['ddlPgAuth'];
    //             $update_info2->UPD_DATE = now();
    //             $update_info2->timestamps = false;
    //             $update_info2->save();
    //             // }
                

    //             // $success = 'the patient has been created successfully';
    //             // return redirect('/master/MT11LoginReference');
    //         } 
    //     }catch (\Throwable $e) {
    //         abort(500);
    //     }
    //     return true;
    //     // return redirect('/master/MT11LoginReference')->with('success', $success);
    //     // return redirect()->route('MT11LoginRef.search', compact('request_data','search_data', 'search_results', 'messages'));
    //     // return view('master.MT11LoginReference', compact('request_data','search_data', 'search_results', 'messages'));
        
        
        
    //     // $update_info->LOGIN_ID = $inputData['txtLoginId'];
    //     // $update_info->PASSWORD = $inputData['txtNewPassword'];
    //     // $update_info2->PG_AUTH_CD = $inputData['ddlPgAuth'];
    //     // // date_default_timezone_set('Asia/Tokyo');
    //     // $update_info->UPD_DATE = now();
    //     // $update_info2->UPD_DATE = now();

    //     // $update_info->save();
    //     // $update_info2->save();
    //     // return $update_info;
    // }
}
