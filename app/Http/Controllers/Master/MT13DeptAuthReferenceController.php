<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Repositories\MT13DeptAuthRepository;
use App\Repositories\MT93PgRepository;
use Illuminate\Support\Facades\DB;

/**
 * 部門権限情報照会 処理
 */
class MT13DeptAuthReferenceController extends Controller
{
    private $mt13_dept_auth;
    /**
     * コントローラインスタンスの生成
     * @param
     * @return void
     */
    public function __construct(MT13DeptAuthRepository $mt13_dept_auth_repository,
                                            MT93PgRepository $pg_repository)
    {
        parent::__construct($pg_repository, '000005');
        $this->mt13_dept_auth = $mt13_dept_auth_repository;
    }

    /**
     * 部門権限情報照会 処理 画面表示
     * @return view
     */
    public function index()
    {
        $dept_data = $this->mt13_dept_auth->getDeptAuthPage();
        return parent::viewWithMenu('master.MT13DeptAuthReference', compact('dept_data'));
    }
}
