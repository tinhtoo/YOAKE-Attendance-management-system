<?php

namespace App\Http\Controllers\Mng_Oprt;

use App\Http\Controllers\Controller;
use App\Repositories\LG01WorktimeconvRepository;
use App\Repositories\MT93PgRepository;
use App\WorkTmSvc\GetWorkTimeDataUtility;
use App\WorkTmSvc\SetWorkTimeToWorkUtility;

/**
 * 最新打刻情報取得処理画面
 */
class WorkTimeConvertController extends Controller
{
    private $lg01_worktimeconv;
    /**
     * コントローラインスタンスの生成
     * @param
     * @return void
     */
    public function __construct(
        MT93PgRepository $pg_repository,
        LG01WorktimeconvRepository $lg01_worktimeconv_repository
    ) {
        parent::__construct($pg_repository, '040003');
        $this->lg01_worktimeconv = $lg01_worktimeconv_repository;
    }

    /**
     * 最新打刻情報取得処理画面表示
     * @return view
     */
    public function index()
    {
        $result = $this->lg01_worktimeconv->getList();
        return parent::viewWithMenu('mng_oprt.WorkTimeConvert', compact('result'));
    }

    /**
     * 最新打刻情報を取得
     *
     * @return view
     */
    public function search()
    {
        GetWorkTimeDataUtility::getWorkTimeDataFromAllTerminalToServer();

        // 就業情報の各種時間の算出を行います。
        $setWorkTimeUtil = new SetWorkTimeToWorkUtility();
        $setWorkTimeUtil->setWorkTimeToWork0();

        $success = true;
        $result = $this->lg01_worktimeconv->getList();
        return parent::viewWithMenu('mng_oprt.WorkTimeConvert', compact('success', 'result'));
    }
}
