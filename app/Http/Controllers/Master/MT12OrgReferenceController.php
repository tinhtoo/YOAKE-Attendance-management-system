<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Search\MT12DeptSearchRepository;
use App\Repositories\MT93PgRepository;

class MT12OrgReferenceController extends Controller
{
    protected $mt12dept_repository;

    /**
     * コンストラクタ
     * リポジトリのインスタンスを生成、格納
     *
     * @param  $mt12dept_repository
     * @return
     */
    public function __construct(
        MT12DeptSearchRepository $mt12dept_repository,
        MT93PgRepository $pg_repository
    ) {
        parent::__construct($pg_repository, '000018');
        $this->mt12dept_repository = $mt12dept_repository;
    }

    /**
     * 画面表示
     *
     * @param
     * @return
     */
    public function index(Request $request)
    {
        $paginateOrg = $this->mt12dept_repository
                        ->getPage($request->page, $request->url());
        return parent::viewWithMenu('master.MT12OrgReference', compact('paginateOrg'));
    }
}
