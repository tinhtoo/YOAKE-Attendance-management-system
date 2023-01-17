<?php

namespace App\Http\Controllers\Master;
use App\Repositories\Search\MT12DeptSearchRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\MT93PgRepository;

class MT12DeptReferenceController extends Controller
{
    protected $mt12dept_repository;

    /**
     * コンストラクタ
     * リポジトリのインスタンスを生成、格納
     *
     * @param  UserRepository  $mt12dept_repository
     * @return
     */
    public function __construct(MT12DeptSearchRepository $mt12dept_repository
                                            ,MT93PgRepository $pg_repository)
    {
        parent::__construct($pg_repository, '000004');
        $this->mt12dept_repository = $mt12dept_repository;
    }

    /**
     * 照会画面表示
     *
     * @param [type] $id
     * @return void
     */
    public function index(Request $request)
    {
        $paginateDept = $this->mt12dept_repository
                        ->getPage($request->page, $request->url());
        return parent::viewWithMenu('master.MT12DeptReference',compact('paginateDept'));
    }

}
