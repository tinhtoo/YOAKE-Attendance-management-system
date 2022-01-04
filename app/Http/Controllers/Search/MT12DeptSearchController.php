<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use App\Repositories\Search\MT12DeptSearchRepository;

class MT12DeptSearchController extends Controller
{
    /**
     * Work_Timeリポジトリの実装
     *
     * @var MT12DeptSearchRepository
     */

    protected $dep_repository;

    /**
     * 新しいコントローラインスタンスの生成
     *
     * @param  UserRepository  $dep_Repository
     * @return void
     */
    public function __construct(MT12DeptSearchRepository $dep_Repository)
    {
        $this->dep_repository = $dep_Repository;
    }


    /**
     * 指定ユーザーのプロファイル表示
     *
     * @param  int  $request
     * @return Response
     */
    
    public function search()
    { 
        $dept_search = $this->dep_repository->data_search();
        //$dept_search = MT12Dept::all();
        //dd($dept_search);
        return view('search.MT12DeptSearch', compact('dept_search'));
    }
}
