<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use App\Repositories\Search\MT10EmpSearchRepository;
use App\Filters\MT10EmpSearchFilter;
use App\Http\Requests\MT10EmpSearchRequest;
use Illuminate\Http\Request;
use App\Models\MT10Emp;

class MT10EmpSearchController extends Controller
{
    /**
     * Work_Timeリポジトリの実装
     *
     * @var MT10EmpSearchRepository
     */

    protected $emp_repository;

    /**
     * 新しいコントローラインスタンスの生成
     *
     * @param  UserRepository  $emp_Repository
     * @return void
     */
    public function __construct(MT10EmpSearchRepository $emp_Repository)
    {
        $this->emp_repository = $emp_Repository;
    }

    /**
     * 指定画面の表示
     *
     * @param  int  $request
     * @return view
     */
    // public function inisearch(Request $request)
    // {
        //$emp_search = $this->emp_repository->initialsearch();
        
        //dd($emp_search);
        //return view('search.MT10EmpSearch', compact('emp_search'));
    //     return view('search.MT10EmpSearch');
    // }

    /**
     * 指定ユーザーのプロファイル表示
     *
     * @param  int  $request
     * @return Response
     */
    
    public function search(MT10EmpSearchRequest $request, MT10EmpSearchFilter $filter)
    {
        $search_data = $request->input(['filter']);
        $dept_name=$request->input('deptName');
        $search_result = $this->emp_repository->search($request, $filter);
        $messages = $this->emp_repository->messages();

        $request->session()->put('deptname',$dept_name);

        //dd($dept_name);
        
        return view('search.MT10EmpSearch', compact('search_data', 'search_result', 'messages', 'dept_name'));
        //return view('search.MT10EmpSearch', compact('messages'));
    }


}
