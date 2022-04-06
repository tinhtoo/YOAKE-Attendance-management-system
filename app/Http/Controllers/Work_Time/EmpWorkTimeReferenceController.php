<?php

namespace App\Http\Controllers\Work_Time;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\EmpWorkTimeReferenceRequest;
use App\Repositories\Work_Time\EmpWorkTimeReferenceRepository;
use App\Filters\EmpWorkTimeRefFilter;


class EmpWorkTimeReferenceController extends Controller
{
    /**
     * EmpWorkTimeReferenceリポジトリの実装
     *
     * @var EmpWorkTimeReferenceRepository
     */
    
    protected $emp_repo;

    /**
     * 新しいコントローラインスタンスの生成
     *
     * @param  UserRepository  $emp_repo
     * @return void
     */
    public function __construct(EmpWorkTimeReferenceRepository $emp_repo)
    {
        $this->emp_repo = $emp_repo;
    }

    /**
     * 指定画面の表示
     *
     * @param  int  $request
     * @return view
     */
    public function empworktime_ref(Request $request)
    {
        $haken_kaisha = $this->emp_repo->kaisha();
        $closing_dates = $this->emp_repo->shimebi();

        // $request->session()->forget('deptname', $request->input('deptname')); //sessionの削除
        // $request->session()->forget('empname',$request->input('empName')); //sessionの削除

        return view('work_time.EmpWorkTimeReference',compact('closing_dates', 'haken_kaisha'));  
    }

    /**
     * 指定ユーザーの詳細データの表示
     *
     * @param  int  $request
     * @return Response
     */
    public function search(EmpWorkTimeReferenceRequest $request, EmpWorkTimeRefFilter $filter)
    {
        //$fix_message = '確定済み';
        $input_datas = $request->all();
        // dd($input_datas);
        $data = $request->only('filter');
        $search_data = $data['filter'];
        $results = $this->emp_repo->select($request, $filter);
        $messages = $this->emp_repo->messages();
        $haken_kaisha = $this->emp_repo->kaisha();
        $closing_dates = $this->emp_repo->shimebi();
        $confirm_check = $this->emp_repo->confirm($request);
        //$Confirm_check2 = $this->emp_repo->ConfirmFromDep($request);
        // $request->session()->put('deptName', $request->input('deptName'));
        // $request->session()->put('empName',$request->input('empName'));
        // dd(session()->get('empname'));
        // dd($search_data);
        // $empNamenew = MT10Emp::where('MT10_EMP.EMP_CD', $search_data['txtEmpCd'])->pluck('EMP_NAME');

        // $empName = $this->emp_repo->empName($request);
        // $deptName = $this->emp_repo->deptName($request);
        $name = $this->emp_repo->name($request);
        // dd($name);
        return view('work_time.EmpWorkTimeReference',compact('input_datas', 'search_data', 'results', 'messages', 'closing_dates', 
        'haken_kaisha', 'confirm_check', 'name'));    
    }

    public function cancel(Request $request)
    {
        // $request->session()->forget('deptname', $request->input('deptname')); //sessionの削除
        // $request->session()->forget('empname',$request->input('empName')); //sessionの削除

        return redirect()->back()->withInput($request->only([
            'filter.ddlTargetYear',
            'filter.ddlTargetMonth'
        ]));
    }
    
}
