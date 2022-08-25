<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Repositories\MT93PgRepository;
use App\Repositories\MT05WorkptnRepository;

/**
 * 勤務体系情報照会 処理
 */
class MT05WorkPtnReferenceController extends Controller
{
    /**
     * コントローラインスタンスの生成
     * @param
     * @return void
     */
    public function __construct(
        MT05WorkptnRepository $mt05_workptn,
        MT93PgRepository $pg_repository
    ) {
        parent::__construct($pg_repository, '000006');
        $this->mt05_workptn = $mt05_workptn;
    }

    /**
     * 勤務体系情報照会 処理 画面表示
     * @return view
     */
    public function index()
    {
        $com_cls_cd = '01';
        $allWorkPtn = $this->mt05_workptn->getCdNameWorkPtnWithComCls($com_cls_cd);
        return parent::viewWithMenu('master.MT05WorkPtnReference', compact('allWorkPtn'));
    }
}
