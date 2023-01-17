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
        $data = $request->only('filter');
        $search_data = $data['filter'];
        $results = $this->emp_repo->select($request, $filter);
        $messages = $this->emp_repo->messages();
        $haken_kaisha = $this->emp_repo->kaisha();
        $closing_dates = $this->emp_repo->shimebi();

        return view('work_time.EmpWorkTimeReference',compact('search_data', 'results', 'messages', 'closing_dates', 'haken_kaisha'));    
    }

    public function cancel(Request $request)
    {
        return redirect()->back()->withInput($request->only([
            'filter.ddlTargetYear',
            'filter.ddlTargetMonth'
        ]));
    }
    
}
