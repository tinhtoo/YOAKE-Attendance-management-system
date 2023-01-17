<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MT10Emp;
use App\Repositories\Master\MT10EmpRefRepository;
use App\Repositories\MT93PgRepository;
use App\Filters\MT10EmpRefFilter;
use App\Http\Requests\MT10EmpRefRequest;

class MT10EmpReferenceController extends Controller
{
    private $EmpRef_repository;
    /**
     * コンストラクタ
     * リポジトリのインスタンスを生成、格納
     *
     * @param  UserRepository  $EmpRef_repository
     * @return void
     */
    public function __construct(
        MT10EmpRefRepository $EmpRef_repository,
        MT93PgRepository $pg_repository
    ) {
        $this->EmpRef_repository = $EmpRef_repository;
        parent::__construct($pg_repository, '000001');
    }

    /**
     * 検索
     *
     * @param Request $request
     * @return void
     */
    public function search(MT10EmpRefRequest $request, MT10EmpRefFilter $filter)
    {
        $request_data = $request->all();
        $search_data = $request->input(['filter']);
        $search_results = $this->EmpRef_repository->search($filter, session('id'));

        return parent::viewWithMenu(
            'master.MT10EmpReference',
            compact('request_data', 'search_data', 'search_results')
        );
    }
}
