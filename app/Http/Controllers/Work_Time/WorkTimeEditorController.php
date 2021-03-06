<?php

namespace App\Http\Controllers\Work_Time;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TR01Work;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

use App\Models\MT10Emp;
use App\Models\MT11Login;
use App\Models\MT99Msg;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\VarDumper\Cloner\Data;
use App\Http\Controllers\Work_Time\TempController;

use function PHPUnit\Framework\returnSelf;

use App\Http\Requests\WorkTimeRequest;
use App\Http\Requests\WorkTimeUpdateRequest;
use App\Repositories\Work_Time\WorkTimeRepository;

class WorkTimeEditorController extends Controller
{
    /**
     * Work_Timeリポジトリの実装
     *
     * @var WorkTimeRepository
     */

    protected $wtime_Repository;

    /**
     * 新しいコントローラインスタンスの生成
     *
     * @param  UserRepository  $wtime_Repository
     * @return void
     */
    public function __construct(WorkTimeRepository $wtime_Repository)
    {
        $this->wtime_Repository = $wtime_Repository;
    }

    /**
     * 指定画面の表示
     *
     * @param  int  $request
     * @return view
     */
    public function worktimeeditor(Request $request)
    {
        //$request->session()->flush();
        $request->session()->put('empname',$request->input('empName'));
        $request->session()->put('deptname',$request->input('deptName'));
        return view('work_time.WorkTimeEditor');
    }

    /**
     * 指定ユーザーのプロファイル表示
     *
     * @param  int  $request
     * @return Response
     */
    public function search(WorkTimeRequest $request)
    {
        $search_data = $request->all();
        // $emp_name=$request->input('empName');
        // $dept_name=$request->input('deptName');
        //dd($search_data);
        // $year = substr(($search_data['ddlDate']), 0, 4);
        // $month = substr(($search_data['ddlDate']), 7, 2);
        // dd($year);

        $results = $this->wtime_Repository->select($request); //対象データ表示
        // dd($results);
        $workdaycnt = $this->wtime_Repository->workdaycnt($request); //出勤回数の合計
        $holdaycnt = $this->wtime_Repository->holworkcnt($request); //休出回数の合計
        $spcholcnt = $this->wtime_Repository->spcholcnt($request); //特休回数の合計
        $padholcnt = $this->wtime_Repository->padholcnt($request); //有休回数の合計
        $abcworkcnt = $this->wtime_Repository->abcworkcnt($request); //欠勤回数の合計
        $compdaycnt = $this->wtime_Repository->compdaycnt($request); //代休回数の合計

        $worktime = $this->wtime_Repository->worktime($request); //出勤時間
        $tardtime = $this->wtime_Repository->tardtime($request); //遅刻時間
        $leavetime = $this->wtime_Repository->leavetime($request); //早退時間
        $outtime = $this->wtime_Repository->outtime($request); //外出時間
        $ovtm1time = $this->wtime_Repository->ovtm1time($request); //早出時間
        $ovtm2time = $this->wtime_Repository->ovtm2time($request); //普通残業時間
        $ovtm3time = $this->wtime_Repository->ovtm3time($request); //深夜残業時間
        $ovtm4time = $this->wtime_Repository->ovtm4time($request); //休日残業時間
        $ovtm5time = $this->wtime_Repository->ovtm5time($request); //休日深夜残業時間
        $ovtm6time = $this->wtime_Repository->ovtm6time($request); //空
        $ext1time = $this->wtime_Repository->ext1time($request); //深夜割増
        $ext2time = $this->wtime_Repository->ext2time($request); //空
        $ext3time = $this->wtime_Repository->ext3time($request); //空

        $GetSumTimes = $this->wtime_Repository->GetSumTime($request); //出勤時間、残業項目１～ｎの合計
        $GetSumExtTimes = $this->wtime_Repository->GetSumExtTimes($request); //割増項目１～ｎの合計

        $messages = $this->wtime_Repository->messages(); //メッセージ表示
        $workptn_names = $this->wtime_Repository->workptns(); //勤務体系
        $reason_names = $this->wtime_Repository->reasons(); //事由

        $name = $this->wtime_Repository->name($request);

        // $emp_dates = $this->wtime_Repository->date($request);
        // $hld_dates = $this->wtime_Repository->holidays()->toArray();

        // $dateCompare = array_intersect($emp_dates, $hld_dates);
        
        $request->session()->put('empname',$request->input('empName'));
        $request->session()->put('deptname',$request->input('deptName'));
        // $request->session()->put('year',$year);
        // $request->session()->put('month',$month);
        $request->session()->put('date', $search_data['ddlDate']);
        $request->session()->put('emp_cd',$search_data['txtEmpCd']);
        
        //dd($workdaycnt);
        //dd(compact('results','messages','workptn_names','reason_names', 'search_data','dateCompare','hld_dates'));
        return view('work_time.WorkTimeEditor', compact('results', 'messages', 'workptn_names', 'reason_names', 'search_data', 
                                                        'workdaycnt', 'holdaycnt', 'spcholcnt', 'padholcnt', 'abcworkcnt', 'compdaycnt',
                                                        'worktime', 'tardtime', 'leavetime', 'outtime', 'ovtm1time', 'ovtm2time', 'ovtm3time', 'ovtm4time', 'ovtm5time', 'ovtm6time',
                                                        'ext1time', 'ext2time', 'ext3time', 'GetSumTimes', 'GetSumExtTimes', 'name'));
    }

    public function edit(WorkTimeRequest $request)
    {
        $search_data = $request->all();

        $results = $this->wtime_Repository->select($request); //対象データ表示

        $workdaycnt = $this->wtime_Repository->workdaycnt($request); //出勤回数の合計
        $holdaycnt = $this->wtime_Repository->holworkcnt($request); //休出回数の合計
        $spcholcnt = $this->wtime_Repository->spcholcnt($request); //特休回数の合計
        $padholcnt = $this->wtime_Repository->padholcnt($request); //有休回数の合計
        $abcworkcnt = $this->wtime_Repository->abcworkcnt($request); //欠勤回数の合計
        $compdaycnt = $this->wtime_Repository->compdaycnt($request); //代休回数の合計

        $worktime = $this->wtime_Repository->worktime($request); //出勤時間
        $tardtime = $this->wtime_Repository->tardtime($request); //遅刻時間
        $leavetime = $this->wtime_Repository->leavetime($request); //早退時間
        $outtime = $this->wtime_Repository->outtime($request); //外出時間
        $ovtm1time = $this->wtime_Repository->ovtm1time($request); //早出時間
        $ovtm2time = $this->wtime_Repository->ovtm2time($request); //普通残業時間
        $ovtm3time = $this->wtime_Repository->ovtm3time($request); //深夜残業時間
        $ovtm4time = $this->wtime_Repository->ovtm4time($request); //休日残業時間
        $ovtm5time = $this->wtime_Repository->ovtm5time($request); //休日深夜残業時間
        $ovtm6time = $this->wtime_Repository->ovtm6time($request); //空
        $ext1time = $this->wtime_Repository->ext1time($request); //深夜割増
        $ext2time = $this->wtime_Repository->ext2time($request); //空
        $ext3time = $this->wtime_Repository->ext3time($request); //空

        $GetSumTimes = $this->wtime_Repository->GetSumTime($request); //出勤時間、残業項目１～ｎの合計
        $GetSumExtTimes = $this->wtime_Repository->GetSumExtTimes($request); //割増項目１～ｎの合計

        $messages = $this->wtime_Repository->messages(); //メッセージ表示
        $workptn_names = $this->wtime_Repository->workptns(); //勤務体系
        $reason_names = $this->wtime_Repository->reasons(); //事由

       
        $request->session()->put('empname',$request->input('empName'));
        $request->session()->put('deptname',$request->input('deptName'));
        // $request->session()->put('year',$search_data['ddlTargetYear']);
        // $request->session()->put('month',$search_data['ddlTargetMonth']);
        // $request->session()->put('emp_cd',$search_data['txtEmpCd']);

        // return response()->json([
        //     'html' => view('work_time.WorkTimeEditorEdit', compact('results', 'messages', 'workptn_names', 'reason_names', 'search_data', 'dateCompare', 'hld_dates'))->render(),
        // ]);
        return view('work_time.WorkTimeEditorEdit', compact('results', 'messages', 'workptn_names', 'reason_names', 'search_data',
                                                            'workdaycnt', 'holdaycnt', 'spcholcnt', 'padholcnt', 'abcworkcnt', 'compdaycnt',
                                                            'worktime', 'tardtime', 'leavetime', 'outtime', 'ovtm1time', 'ovtm2time', 'ovtm3time', 'ovtm4time', 'ovtm5time', 'ovtm6time',
                                                            'ext1time', 'ext2time', 'ext3time', 'GetSumTimes', 'GetSumExtTimes'));
    }

    public function cancel(Request $request)
    {
        // $emp_name=$request->input('empName');
        // $dept_name=$request->input('deptName');

        // sessionの削除
        // $request->session()->flush('empname',$request->input('empName'));
        // $request->session()->flush('deptname',$request->input('deptName'));
        $request->session()->forget('empname',$request->input('empName'));
        $request->session()->forget('deptname',$request->input('deptName'));
        return redirect()->route('worktimeeditor')->withInput($request->only([
            'ddlTargetYear',
            'ddlTargetMonth'
            
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

