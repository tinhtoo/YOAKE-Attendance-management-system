<?php

namespace App\Http\Controllers\Work_Time;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        return view('work_time.worktimeeditor');   
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
        $results = $this->wtime_Repository->select($request);
        $messages = $this->wtime_Repository->messages();
        $workptn_names = $this->wtime_Repository->workptns();
        $reason_names = $this->wtime_Repository->reasons();
        return view('work_time.WorkTimeEditor',compact('results','messages','workptn_names','reason_names', 'search_data'));
    }

    // public function edit(WorkTimeRequest $request, $emp_cd)
    // {   
    //     $results_edit = $this->wtime_Repository->select($request);
    //     $messages_edit = $this->wtime_Repository->messages();
    //     $workptn_names_edit = $this->wtime_Repository->workptns();
    //     $reason_names_edit = $this->wtime_Repository->reasons();
    //     $edit_datas_edit = $this->wtime_Repository->wte_edit($request, $emp_cd);

    //     //dd($emp_cd);
    //     return view('work_time.WorkTimeEditorEdit',compact('results_edit','week_edit','messages_edit','workptn_names_edit','reason_names_edit','edit_datas_edit'));
    // }

    // public function update(Request $request)
    // {
    //     $post = new WorkTimeRepository;
    //     $data_up = $post->select($request);
    //     //dd($data_up);
    //     $data_up->WORKPTN_NAME = $request['WORKPTN_NAME'];
    //     $data_up->save();

    //     dd($data_up);
    
    //     //dd($name);
    //     return redirect('work_time.WorkTimeEditor');
    // }

    
}
