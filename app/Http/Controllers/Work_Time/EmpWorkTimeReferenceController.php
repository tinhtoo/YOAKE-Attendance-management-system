<?php

namespace App\Http\Controllers\Work_Time;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\EmpWorkTimeReferenceRequest;
use App\Repositories\Work_Time\EmpWorkTimeReferenceRepository;

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
    public function EmpWorkTimeReference(Request $request)
    {
        return view('work_time.EmpWorkTimeReference');   
    }

    /**
     * 指定ユーザーのプロファイル表示
     *
     * @param  int  $request
     * @return Response
     */
    public function search(EmpWorkTimeReferenceRequest $request)
    {

        $results = $this->emp_repo->select($request);
        $messages = $this->emp_repo->messages();
        

        
        $week = array( "日", "月", "火", "水", "木", "金", "土" );

        
        return view('work_time.EmpWorkTimeReference',compact('results','week','messages'));
        
    }

    
    
}
