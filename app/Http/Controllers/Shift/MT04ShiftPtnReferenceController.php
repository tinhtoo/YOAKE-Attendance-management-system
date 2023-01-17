<?php

namespace App\Http\Controllers\Shift;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\MT93PgRepository;
use App\Repositories\MT04ShiftPtnRepository;

/**
 * シフトパターン情報入力 処理
 */
class MT04ShiftPtnReferenceController extends Controller
{
    /**
     * コントローラインスタンスの生成
     * @param
     * @return void
     */
    public function __construct(
        MT93PgRepository $pg_repository,
        MT04ShiftPtnRepository $mt04_shiftptn_rep
    ) {
        parent::__construct($pg_repository, '030001');
        $this->mt04_shiftptn = $mt04_shiftptn_rep;
    }

    /**
     * シフトパターン情報入力 処理 画面表示
     * @return view
     */
    public function index(Request $request)
    {
        $shiftptn_data = $this->mt04_shiftptn->getShiftPtnPage();
        return parent::viewWithMenu('shift.MT04ShiftPtnReference', compact('shiftptn_data'));
    }
}
