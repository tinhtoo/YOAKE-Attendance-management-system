<?php

namespace App\Http\Controllers\Work_Time;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WorkTimeDeptEditorRequest;
use App\Repositories\Work_Time\WorkTimeDeptEditorRepository;
use App\Filters\WorkTimeDeptEditorFilter;

class WorkTimeDeptEditorController extends Controller
{
    //** WorkTimeDeptEditorリポジトリの実装 */
    /**
     * @var WorkTimeDeptEditorRepository
     */
    protected $wtimedepedit_Repository;

    //** コントローラインスタンスの生成 */
    /**
     * @param  UserRepository $wtimedepedit_Repository
     * @return void
     */
    public function __construct(WorkTimeDeptEditorRepository $wtimedepedit_Repository)
    {
        $this->wtimedepedit_Repository = $wtimedepedit_Repository;
    }

    //**出退勤入力(部門別) 画面表示 **//
    /**
     * @return view
     */
    public function WorkTimeDeptEditor(Request $request)
    {
        //$request->session()->forget('deptname', $request->input('deptname')); //sessionの削除

        $haken_company = $this->wtimedepedit_Repository->companyName(); //会社所属情報

        $request->session()->put('deptcd', $request->input('txtDeptCd'));
        $request->session()->put('deptname', $request->input('deptName'));

        return view('work_time.WorkTimeDeptEditor', compact('haken_company'));
    }

    /**
     * 指定部門の詳細データの表示
     *
     * @param  int  $request
     * @return Response
     */

    public function search(WorkTimeDeptEditorRequest $request, WorkTimeDeptEditorFilter $filter)
    {
        $inputSearchData = $request->all();
        $filterData = $inputSearchData['filter'];
        //dd($inputSearchData);
        //$request->session()->put('deptname', $inputSearchData['deptname']); //sessionを渡す

        $results = $this->wtimedepedit_Repository->select($request, $filter); //対象データ検索
        $errMsg_4029 = $this->wtimedepedit_Repository->messages(); //メッセージ4029
        $haken_company = $this->wtimedepedit_Repository->companyName(); //会社所属情報
        
        $name = $this->wtimedepedit_Repository->name($request);
        // dd($name);
        // $request->session()->put('year', $inputSearchData['ddlTargetYear']);
        // $request->session()->put('month', $inputSearchData['ddlTargetMonth']);
        // $request->session()->put('day', $inputSearchData['ddlTargetDay']);
        $request->session()->put('deptcd', $inputSearchData['txtDeptCd']);
        $request->session()->put('deptname', $inputSearchData['deptName']);
        $request->session()->put('startcompany', $request->input('COMPANY'));
        $request->session()->put('endcompany', $request->input('filter.ddlEndCompany'));

        return view('work_time.WorkTimeDeptEditor', compact('inputSearchData', 'filterData', 'results', 'errMsg_4029', 'haken_company', 'name'));
    }

    public function edited(WorkTimeDeptEditorRequest $request, WorkTimeDeptEditorFilter $filter)
    {
        $inputSearchData = $request->all();
        $filterData = $inputSearchData['filter'];

        $request->session()->put('deptname', $inputSearchData['deptName']); //sessionを渡す

        $results = $this->wtimedepedit_Repository->select($request, $filter); //対象データ検索
        $errMsg_4029 = $this->wtimedepedit_Repository->messages(); //メッセージ4029
        $haken_company = $this->wtimedepedit_Repository->companyName(); //会社所属情報
        $workptn_names = $this->wtimedepedit_Repository->workptns(); //勤務体系
        $reason_names = $this->wtimedepedit_Repository->reasons(); //事由
        
        return view('work_time.WorkTimeDeptEditorEdit', compact('inputSearchData', 'filterData', 'results', 'errMsg_4029', 'haken_company', 'workptn_names', 'reason_names'));
    }

    public function edit(WorkTimeDeptEditorRequest $request, WorkTimeDeptEditorFilter $filter)
    {
        $inputSearchData = $request->all();
        $filterData = $inputSearchData['filter'];

        $request->session()->put('deptname', $inputSearchData['deptName']); //sessionを渡す

        $results = $this->wtimedepedit_Repository->select($request, $filter); //対象データ検索
        $errMsg_4029 = $this->wtimedepedit_Repository->messages(); //メッセージ4029
        $haken_company = $this->wtimedepedit_Repository->companyName(); //会社所属情報
        $workptn_names = $this->wtimedepedit_Repository->workptns(); //勤務体系
        $reason_names = $this->wtimedepedit_Repository->reasons(); //事由
        
        return view('work_time.WorkTimeDeptEditorEdit', compact('inputSearchData', 'filterData', 'results', 'errMsg_4029', 'haken_company', 'workptn_names', 'reason_names'));
    }

    public function cancel(Request $request)
    {
        $request->session()->forget('deptname', $request->input('deptName')); //sessionの削除
        return redirect()->back()->withInput($request->only([
            'ddlTargetYear',
            'ddlTargetMonth',
            'ddlTargetDay'
        ]));
    }

    public function update(WorkTimeUpdateRequest $request)
    {
        // if ($request->isMethod('GET')) {
        //     return view('work_time.WorkTimeEditorEdit');
        // }

        //dd($request->all());
        $data = $request->all();
        //dd($data);
        if (!empty($data['worktime'])) {
            foreach ($data['worktime'] as $worktime) {
                $worktime = getTimeToHhMm($worktime, 'OFC_TIME');
                $worktime = getTimeToHhMm($worktime, 'LEV_TIME');
                $worktime = getTimeToHhMm($worktime, 'OUT1_TIME');
                $worktime = getTimeToHhMm($worktime, 'IN1_TIME');
                $worktime = getTimeToHhMm($worktime, 'OUT2_TIME');
                $worktime = getTimeToHhMm($worktime, 'IN2_TIME');
                $worktime = getTimeToHhMm($worktime, 'WORK_TIME');
                $worktime = getTimeToHhMm($worktime, 'TARD_TIME');
                $worktime = getTimeToHhMm($worktime, 'LEAVE_TIME');
                $worktime = getTimeToHhMm($worktime, 'OUT_TIME');
                $worktime = getTimeToHhMm($worktime, 'OVTM1_TIME');
                $worktime = getTimeToHhMm($worktime, 'OVTM2_TIME');
                $worktime = getTimeToHhMm($worktime, 'OVTM3_TIME');
                $worktime = getTimeToHhMm($worktime, 'OVTM4_TIME');
                $worktime = getTimeToHhMm($worktime, 'OVTM5_TIME');
                $worktime = getTimeToHhMm($worktime, 'OVTM6_TIME');
                $worktime = getTimeToHhMm($worktime, 'EXT1_TIME');
                $worktime = getTimeToHhMm($worktime, 'EXT2_TIME');
                $worktime = getTimeToHhMm($worktime, 'EXT3_TIME');
                $worktime = getTimeToHhMm($worktime, 'RSV1_TIME');

                TR01Work::where('EMP_CD', $data['txtEmpCd'])
                    ->where('CALD_DATE', $worktime['CALD_DATE'])
                    ->update($worktime);
                
            }
            return redirect('/work_time/WorkTimeEditor');
        }
        

    }
}