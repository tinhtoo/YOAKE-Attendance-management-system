<?php

namespace App\Http\Controllers\Mng_Oprt;

use App\Http\Controllers\Controller;
use App\Repositories\MT93PgRepository;

/**
 * 有休情報更新処理画面
 *
 * 凍結（開発対象外）
 */
class PdHolidayCarryOverController extends Controller
{
    /**
     * コントローラインスタンスの生成
     * @param
     * @return void
     */
    public function __construct(MT93PgRepository $pg_repository)
    {
        parent::__construct($pg_repository, '040004');
    }

    /**
     * 有休情報更新処理画面表示
     * @return view
     */
    public function index()
    {
        return parent::viewWithMenu('mng_oprt.PdHolidayCarryOver');
    }

}
