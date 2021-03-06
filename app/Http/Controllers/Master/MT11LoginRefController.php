<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Repositories\Master\MT11LoginRefRepository;
use App\Filters\MT11LoginRefFilter;
use App\Http\Requests\MT11LoginRefRequest;
use App\Http\Requests\MT11LoginEditRequest;
use Illuminate\Http\Request;
use App\Models\MT10Emp;
use App\Models\MT99Msg;
use App\Models\MT11Login;
use App\Models\MT14PgAuth;

class MT11LoginRefController extends Controller
{
    /**
     * Work_Timeリポジトリの実装
     *
     * @var MT11LoginRefRepository
     */

    protected $LoginRef_repository;

    /**
     * 新しいコントローラインスタンスの生成
     *
     * @param  UserRepository  $LoginRef_repository
     * @return void
     */
    public function __construct(MT11LoginRefRepository $LoginRef_repository)
    {
        $this->LoginRef_repository = $LoginRef_repository;
    }
    /**
     * 指定ユーザーのプロファイル表示
     *
     * @param  int  $request
     * @return Response
     */
    
    public function search(MT11LoginRefRequest $request, MT11LoginRefFilter $filter)
    {
        $request_data = $request->all();
        $search_data = $request->input(['filter']);
        $dept_name = $request->input('deptName');
        $search_results = $this->LoginRef_repository->search($filter);
        $messages = $this->LoginRef_repository->messages();
        
        return view('master.MT11LoginReference', compact('request_data','search_data', 'search_results', 'messages'));
        // return view('master.MT11LoginReference', compact('search_results'));

    }

    public function edit($id)
    {
        $msg_1005 = MT99Msg::where('MSG_NO', '1005')->pluck('MSG_CONT')->first();
        $emp_data = $this->LoginRef_repository->edit($id);
        $login_datas = $this->LoginRef_repository->user($id);
        $pg_auth = $this->LoginRef_repository->pgauth();
        // $auth_name = $this->LoginRef_repository->authname($id);
        //$pg_auth_cd = $this->LoginRef_repository->authcd($id);
        // dd($emp_name);
        return view('master.MT11LoginEditor', compact('emp_data', 'login_datas', 'pg_auth', 'msg_1005'));
    }

    // public function update(MT11LoginEditRequest $request)
    // {
    //     $request_data = $request->all();
    //     $search_data = $request->input(['filter']);
    //     $dept_name = $request->input('deptName');
    //     $search_results = $this->LoginRef_repository->search($request, $filter);
    //     $messages = $this->LoginRef_repository->messages();
    //     $update = $this->LoginRef_repository->update($request);
    //     // dd($update);
    // }

    public function update(MT11LoginEditRequest $request, MT11LoginRefFilter $filter)
    {
        $request_data = $request->all();
        // dd($request_data);
        // $search_data = $request->input(['filter']);
        // $dept_name = $request->input('deptName');
        $search_results = $this->LoginRef_repository->search($filter);
        // $messages = $this->LoginRef_repository->messages();
        
        // return view('master.MT11LoginReference', compact('request_data','search_data', 'search_results', 'messages'));

        // $request_data = $request->all();
        // dd($request_data);
        // dd($request_data['txtEmpCd']);
        // dd($id);
        // $update_info = MT11Login::where('EMP_CD', $request_data['txtLoginId'])->first();
        // $update_info = MT11Login::find($request_data['txtEmpCd']);
        // $update_info2 = MT10Emp::where('EMP_CD', $request_data['txtEmpCd'])->pluck('EMP_CD');
        // dd($update_info2);
        // $update_info->EMP_CD = $id;
        try {
            $update_info = MT11Login::find($request_data['txtEmpCd']);
            $update_info2 = MT10Emp::find($request_data['txtEmpCd']);
            if($update_info == null){
                $update_info = new MT11Login;
                $update_info->EMP_CD = $request_data['txtEmpCd'];
                $update_info->LOGIN_ID = $request_data['txtLoginId'];
                $update_info->PASSWORD = $request_data['txtNewPassword'];
                //登録日付（TimeZone->Asia/Tokyo)
                date_default_timezone_set('Asia/Tokyo');
                $update_info->UPD_DATE = now();
                $update_info->timestamps = false;
                $update_info->save();

                $update_info2->PG_AUTH_CD = $request_data['ddlPgAuth'];
                $update_info2->UPD_DATE = now();
                $update_info2->timestamps = false;
                $update_info2->save();

            } 
            if(!empty($update_info)){

                $update_info->LOGIN_ID = $request_data['txtLoginId'];
                $update_info->PASSWORD = $request_data['txtNewPassword'];
                //登録日付（TimeZone->Asia/Tokyo)
                date_default_timezone_set('Asia/Tokyo');
                $update_info->UPD_DATE = now();
                $update_info->timestamps = false;
                $update_info->save();

                // if($update_info == $update_info2){
                $update_info2->PG_AUTH_CD = $request_data['ddlPgAuth'];
                $update_info2->UPD_DATE = now();
                $update_info2->timestamps = false;
                $update_info2->save();

            } 
        }catch (\Throwable $e) {
            abort(500);
        }
        return view('master.MT11LoginReference', compact('search_results', 'request_data'));
    }

}
