<?php

namespace App\Http\Controllers\Shift;

use App\Http\Controllers\Controller;
use App\Models\MT04ShiftPtn;
use App\Repositories\MT01ControlRepository;
use App\Repositories\MT04ShiftPtnRepository;
use App\Repositories\MT08HolidayRepository;
use App\Repositories\MT22ClosingDateRepository;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

/**
 * シフトパターン検索
 */
class ShiftPtnSearchController extends Controller
{
    private $mt04;
    private $mt08;

    /**
     * コントローラインスタンスの生成
     * @param
     * @return void
     */
    public function __construct(
        MT04ShiftPtnRepository $m_t04_shift_ptn_rep,
        MT08HolidayRepository $mt08_holiday_rep,
        MT22ClosingDateRepository $mt22_closing_date_rep
    ) {
        $this->mt04 = $m_t04_shift_ptn_rep;
        $this->mt08 = $mt08_holiday_rep;
        $this->mt22 = $mt22_closing_date_rep;
    }

    /**
     * シフトパターン検索 画面表示
     * @return view
     */
    public function index(Request $request)
    {
        // パターンコードの選択肢
        $shift_ptns = $this->mt04->getShiftPtn();
        // 起点日の選択肢
        $start_date = new Carbon($request->startDate);
        $end_date = new Carbon($request->endDate);
        $cald_days = CarbonPeriod::start($start_date)->days(1)->end($end_date->addDays(1), false);
        $holidays = $this->mt08->getHolidays();
        return view('shift.ShiftPtnSearch', compact('shift_ptns', 'cald_days', 'holidays'));
    }

    /**
     * シフトパターンを検索
     *
     * @return array
     */
    public function search(Request $request)
    {
        $search_result = $this->mt04->getJoinWorkptn($request->shiftPtn);
        return compact('search_result');
    }
}
