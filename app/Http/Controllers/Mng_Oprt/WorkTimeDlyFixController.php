<?php

namespace App\Http\Controllers\Mng_Oprt;

use App\Http\Controllers\Controller;
use App\Repositories\MT93PgRepository;

/**
 * 日次確定処理画面
 *
 * 凍結（開発対象外）
 */
class WorkTimeDlyFixController extends Controller
{
    private $lg01_worktimeconv;
    /**
     * コントローラインスタンスの生成
     * @param
     * @return void
     */
    public function __construct(MT93PgRepository $pg_repository)
    {
        parent::__construct($pg_repository, '040012');
    }

    /**
     * 日次確定処理画面表示
     * @return view
     */
    public function index()
    {
        return parent::viewWithMenu('mng_oprt.WorkTimeDlyFix');
    }

}
