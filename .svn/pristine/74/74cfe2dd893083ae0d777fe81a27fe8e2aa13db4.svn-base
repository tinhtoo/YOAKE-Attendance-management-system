<?php

namespace App\Http\Controllers\Mng_Oprt;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MT03Calendar;
use App\Repositories\MT93PgRepository;
use App\Repositories\MT01ControlRepository;
use App\Repositories\Master\MT02CalendarPtnRepository;
use App\Repositories\MT03CalendarRepository;
use App\Repositories\MT05WorkptnRepository;
use App\Repositories\MT08HolidayRepository;
use App\Repositories\Master\MT10EmpRefRepository;
use App\Repositories\Master\MT11LoginRefRepository;
use App\Repositories\MT22ClosingDateRepository;
use App\Repositories\TR01WorkRepository;
use App\Repositories\TR50WorkTimeRepository;
use App\Http\Requests\MT03CalendarEditorRequest;
use App\Filters\MT03CalendarEditorFilter;
use App\Http\Requests\MT03CalendarSearchRequest;
use Carbon\Carbon;

/**
 * カレンダー情報入力画面
 */
class MT03CalendarEditorController extends Controller
{
    private $mt01_control;
    private $mt02_cal_ptn;
    private $mt03_calendar;
    private $mt05_workptn;
    private $mt08_holiday;
    private $mt10_emp;
    private $mt11_login;
    private $mt22_closing_date;
    private $tr01_work;
    private $tr50_work_time;
    /**
     * コントローラインスタンスの生成
     * @param
     * @return void
     */
    public function __construct(
        MT93PgRepository $pg_repository,
        MT01ControlRepository $mt01_control_rep,
        MT02CalendarPtnRepository $mt02_cal_ptn_rep,
        MT03CalendarRepository $mt03_calendar_rep,
        MT05WorkptnRepository $mt05_workptn_rep,
        MT08HolidayRepository $mt08_holiday_rep,
        MT10EmpRefRepository $mt10_emp_rep,
        MT11LoginRefRepository $mt11_login_rep,
        MT22ClosingDateRepository $mt22_closing_date_rep,
        TR01WorkRepository $tr01_work_rep,
        TR50WorkTimeRepository $tr50_work_time_rep
    ) {
        parent::__construct($pg_repository, '040001');
        $this->mt01_control = $mt01_control_rep;
        $this->mt02_cal_ptn = $mt02_cal_ptn_rep;
        $this->mt03_calendar = $mt03_calendar_rep;
        $this->mt05_workptn = $mt05_workptn_rep;
        $this->mt08_holiday = $mt08_holiday_rep;
        $this->mt10_emp = $mt10_emp_rep;
        $this->mt11_login = $mt11_login_rep;
        $this->mt22_closing_date = $mt22_closing_date_rep;
        $this->tr01_work = $tr01_work_rep;
        $this->tr50_work_time = $tr50_work_time_rep;
    }

    /**
     * カレンダー情報入力画面表示
     * @return view
     */
    public function index(Request $request)
    {
        return parent::viewWithMenu('mng_oprt.MT03CalendarEditor', $this->createViewData());
    }

    /**
     * カレンダーを検索して表示
     *
     * @param MT03CalendarSearchRequest $request
     * @param MT03CalendarEditorFilter $filter
     * @return void
     */
    public function view(MT03CalendarSearchRequest  $request, MT03CalendarEditorFilter $filter)
    {
        $search_data = $request->input(['filter']);
        $search_results = $this->mt03_calendar->search($filter);
        if ($search_results->isEmpty()) {
            $search_results = $this->createCalendar($search_data);
        }
        $workptn_names = $this->mt05_workptn->workptnsNormal();
        $holidays = $this->mt08_holiday->getHolidays();

        return parent::viewWithMenu(
            'mng_oprt.MT03CalendarEditor',
            array_merge(
                $this->createViewData(),
                compact('search_data', 'search_results', 'workptn_names', 'holidays')
            )
        );
    }

    /**
     * 登録更新
     *
     * @param MT03CalendarEditorRequest $request
     * @return void
     */
    public function update(MT03CalendarEditorRequest $request)
    {
        $today = date('Y-m-d H:i:s');
        $calendar_cd = $request['calendarCd'];
        $cald_year = $request['caldYear'];
        $cald_month = $request['caldMonth'];
        $closing_date_cd = $request['closingDateCd'];
        $calendar_data = $request['calendarData'];
        $mt03_records = [];
        foreach ($calendar_data as $calendar) {
            $mt03_record = [
                'CALENDAR_CD' => $calendar_cd,
                'CALD_YEAR' => $cald_year,
                'CALD_MONTH' => (int)$cald_month,
                'CALD_DATE' => new Carbon($calendar['calDate']),
                'WORKPTN_CD' => $calendar['workPtnCd'],
                'RSV1_CLS_CD' => '',
                'RSV2_CLS_CD' => '',
                'UPD_DATE' => $today,
                'CLOSING_DATE_CD' => $closing_date_cd,
            ];
            $mt03_records[] = $mt03_record;
        }

        try {
            \DB::beginTransaction();
            // MT03_CALENDAR
            $this->mt03_calendar->upsertCalendar($mt03_records, ['WORKPTN_CD', 'UPD_DATE']);

            // TR01_WORK
            $emp_cd_list = $this->mt10_emp->getWithCalendarCdAndClosingDateCdWithoutTaishoku(
                $calendar_cd,
                $closing_date_cd
            )->pluck('EMP_CD');

            foreach ($emp_cd_list as $emp_cd) {
                $work_records = $this->tr01_work->getWithEmpAndCaldYearMonth($emp_cd, $cald_year, $cald_month);
                if ($work_records->isEmpty()) {
                    $this->insertWork($emp_cd, $request, $today);
                } else {
                    foreach ($work_records as $work_record) {
                        $i = 0;
                        // 同じ日付まで移動
                        for ($i; $calendar_data[$i]['calDate'] !== str_replace('-', '/', substr($work_record->CALD_DATE, 0, 10)); $i++);
                        if ($calendar_data[$i]['workPtnCd'] === $work_record->WORKPTN_CD) {
                            // 変更なしの場合、更新しない
                            continue;
                        }

                        if ($work_record->UPD_CLS_CD === '00' && $work_record->FIX_CLS_CD === '00') {
                            // TR01_WORK 初期化
                            // 対象日
                            $this->updateWorkForClear($emp_cd, $request, $i, $today);
                            // TR50_WORKTIME 初期化
                            $this->tr50_work_time->update50WorkWithEmpCdCaldDate(
                                $emp_cd,
                                $calendar_data[$i]['calDate'],
                                $this->createUpdateDataForWorkTimeClear()
                            );
                        } elseif ($work_record->UPD_CLS_CD === '01' || $work_record->FIX_CLS_CD === '01') {
                            // TR01_WORK 再計算
                            $work = $this->tr01->recalcWork($work_record);
                            $this->updateWorkForCalk($work);
                        }
                    }
                }
            }

            \DB::commit();
        } catch (\Throwable $e) {
            \Log::debug($e);
            \DB::rollBack();
        }

        return ;
    }

    /**
     * 削除
     *
     * @param Request $request
     * @return void
     */
    public function delete(Request $request)
    {
        $calendarCd = $request['calendarCd'];
        $caldYear = $request['caldYear'];
        $caldMonth = $request['caldMonth'];
        $closingDateCd = $request['closingDateCd'];

        // 値が無い場合は処理しない（削除対象が拡大してしまうため）
        if (!is_nullorempty($calendarCd)
                && !is_nullorempty($caldYear)
                && !is_nullorempty($caldMonth)
                && !is_nullorempty($closingDateCd)) {
            $this->mt03_calendar->deleteCalendar(
                $calendarCd,
                $caldYear,
                (int)$caldMonth,
                $closingDateCd
            );
        }
        return redirect('mng_oprt/MT03CalendarEditor');
    }

    /**
     * 画面初期表示用データを作成して配列で返す
     *
     * @return void
     */
    private function createViewData()
    {
        $calendar_ptns = $this->mt02_cal_ptn->getNormalCalendarCd();
        $control = $this->mt01_control->getMt01();
        $today = date('Y-m-d');
        // 月の初期値設定
        $year_and_month = getYearAndMonthWithControl($today, $control->MONTH_CLS_CD, $control->CLOSING_DATE);
        $def_cald_year = $year_and_month['year'];
        $def_cald_month = $year_and_month['month'];

        $closing_dates = $this->mt22_closing_date->getMt22();
        $def_closing_date_cd = $closing_dates->firstWhere('RSV1_CLS_CD', '01')->CLOSING_DATE_CD;
        return compact('calendar_ptns', 'closing_dates', 'def_cald_year', 'def_cald_month', 'def_closing_date_cd');
    }

    /**
     * デフォルトのカレンダーを作成して返す
     *
     * @param [type] $filter
     * @return
     */
    private function createCalendar($input)
    {
        $year = substr($input['caldYearMonth'], 0, 4);
        $month = substr($input['caldYearMonth'], 7, 2);
        $closing_date_cd = $input['closingDateCd'];

        $month_cls_cd = $this->mt01_control->getMt01()->MONTH_CLS_CD;
        $calendar_ptn = $this->mt02_cal_ptn->CalendarPtnsEdit($input['calendarCd']);
        $holidays = $this->mt08_holiday->getHolidays();
        $closing_date = $this->mt22_closing_date->getFirst($closing_date_cd)->CLOSING_DATE;

        $period = getDatesToClosingDate($year, $month, $closing_date, $month_cls_cd);
        $result = [];

        foreach ($period as $day) {
            $mt03_calendar = new MT03Calendar();
            $mt03_calendar->CALD_DATE = $day;
            if ($holidays->contains($day->format('md'))) {
                $mt03_calendar->WORKPTN_CD = $calendar_ptn['HLD_WORKPTN_CD'];
            } else {
                $mt03_calendar->WORKPTN_CD = $calendar_ptn[strtoupper($day->format('D')). '_WORKPTN_CD'];
            }
            $result[] = $mt03_calendar;
        }
        return $result;
    }

    private function insertWork($emp_cd, $input_data, $today)
    {
        $cald_year = $input_data['caldYear'];
        $cald_month = $input_data['caldMonth'];
        $calendar_data = $input_data['calendarData'];
        $last_index = count($calendar_data) - 1;
        $workptns = $this->mt05_workptn->getAll()->pluck(null, 'WORKPTN_CD');
        $work_records = [];
        foreach ($calendar_data as $i => $calendar) {
            $workptn = $workptns[$calendar['workPtnCd']];
            $str_time = $calendar['calDate']. " ". $workptn->TIME_DAILY_HH. ":". $workptn->TIME_DAILY_MI;
            $next_day = (new Carbon($calendar['calDate']))->addDay();

            if (0 === $i) {
                // 月度の初日の場合、前日の終了時間を初日の開始時間に更新する
                $this->tr01_work->updateWithKeyAndNotFix(
                    $emp_cd,
                    (new Carbon($calendar['calDate']))->subDay(),
                    ['WORKPTN_END_TIME' => $str_time,]
                );
            }
            if ($last_index !== $i) {
                $next_ptn = $workptns[$calendar_data[$i + 1]['workPtnCd']];
                $end_time = $next_day->format("Y/m/d"). " ". $next_ptn->TIME_DAILY_HH. ":". $next_ptn->TIME_DAILY_MI;
            } else {
                // 月度の最終日の場合、データがあれば翌日の開始時間を終了時間にする
                $next_month_first = $this->tr01_work->getWithPrimaryKey($emp_cd, $next_day);
                if ($next_month_first != null) {
                    $end_time = $next_month_first->WORKPTN_STR_TIME;
                } else {
                    $end_time = $next_day->format("Y/m/d"). " ". $workptn->TIME_DAILY_HH. ":". $workptn->TIME_DAILY_MI;
                }
            }

            $work_records[] = [
                'EMP_CD' => $emp_cd,
                'CALD_YEAR' => $cald_year,
                'CALD_MONTH' => (int)$cald_month,
                'CALD_DATE' => $calendar['calDate'],
                'WORKPTN_CD' => $calendar['workPtnCd'],
                'WORKPTN_STR_TIME' => $str_time,
                'WORKPTN_END_TIME' => $end_time,
                'REASON_CD' => '01',
                'OFC_TIME_HH' => null,
                'OFC_TIME_MI' => null,
                'OFC_CNT' => 0,
                'LEV_TIME_HH' => null,
                'LEV_TIME_MI' => null,
                'LEV_CNT' => 0,
                'OUT1_TIME_HH' => null,
                'OUT1_TIME_MI' => null,
                'OUT1_CNT' => 0,
                'IN1_TIME_HH' => null,
                'IN1_TIME_MI' => null,
                'IN1_CNT' => 0,
                'OUT2_TIME_HH' => null,
                'OUT2_TIME_MI' => null,
                'OUT2_CNT' => 0,
                'IN2_TIME_HH' => null,
                'IN2_TIME_MI' => null,
                'IN2_CNT' => 0,
                'WORK_TIME_HH' => 0,
                'WORK_TIME_MI' => 0,
                'TARD_TIME_HH' => 0,
                'TARD_TIME_MI' => 0,
                'LEAVE_TIME_HH' => 0,
                'LEAVE_TIME_MI' => 0,
                'OUT_TIME_HH' => 0,
                'OUT_TIME_MI' => 0,
                'OVTM1_TIME_HH' => 0,
                'OVTM1_TIME_MI' => 0,
                'OVTM2_TIME_HH' => 0,
                'OVTM2_TIME_MI' => 0,
                'OVTM3_TIME_HH' => 0,
                'OVTM3_TIME_MI' => 0,
                'OVTM4_TIME_HH' => 0,
                'OVTM4_TIME_MI' => 0,
                'OVTM5_TIME_HH' => 0,
                'OVTM5_TIME_MI' => 0,
                'OVTM6_TIME_HH' => 0,
                'OVTM6_TIME_MI' => 0,
                'OVTM7_TIME_HH' => 0,
                'OVTM7_TIME_MI' => 0,
                'OVTM8_TIME_HH' => 0,
                'OVTM8_TIME_MI' => 0,
                'OVTM9_TIME_HH' => 0,
                'OVTM9_TIME_MI' => 0,
                'OVTM10_TIME_HH' => 0,
                'OVTM10_TIME_MI' => 0,
                'EXT1_TIME_HH' => 0,
                'EXT1_TIME_MI' => 0,
                'EXT2_TIME_HH' => 0,
                'EXT2_TIME_MI' => 0,
                'EXT3_TIME_HH' => 0,
                'EXT3_TIME_MI' => 0,
                'EXT4_TIME_HH' => 0,
                'EXT4_TIME_MI' => 0,
                'EXT5_TIME_HH' => 0,
                'EXT5_TIME_MI' => 0,
                'RSV1_TIME_HH' => 0,
                'RSV1_TIME_MI' => 0,
                'RSV2_TIME_HH' => 0,
                'RSV2_TIME_MI' => 0,
                'RSV3_TIME_HH' => 0,
                'RSV3_TIME_MI' => 0,
                'WORKDAY_CNT' => 0,
                'HOLWORK_CNT' => 0,
                'SPCHOL_CNT' => 0,
                'PADHOL_CNT' => 0,
                'ABCWORK_CNT' => 0,
                'COMPDAY_CNT' => 0,
                'RSV1_CNT' => 0,
                'RSV2_CNT' => 0,
                'RSV3_CNT' => 0,
                'UPD_CLS_CD' => '00',
                'FIX_CLS_CD' => '00',
                'RSV1_CLS_CD' => '',
                'RSV2_CLS_CD' => '',
                'ADD_DATE' => $today,
                'UPD_DATE' => $today,
                'REMARK' => '',
                'SUBHOL_CNT' => 0,
                'SUBWORK_CNT' => 0,
            ];
        }
        foreach (array_chunk($work_records, 20) as $record_chunk) {
            $this->tr01_work->insertWork($record_chunk);
        }
        return ;
    }

    private function updateWorkForClear($emp_cd, $input_data, $index, $today)
    {
        $calendar = $input_data['calendarData'][$index];
        $calendar_count = count($input_data['calendarData']);
        $workptns = $this->mt05_workptn->getAll()->pluck(null, 'WORKPTN_CD');
        $workptn = $workptns[$calendar['workPtnCd']];
        $str_time = $calendar['calDate']. " ". $workptn->TIME_DAILY_HH. ":". $workptn->TIME_DAILY_MI;
        $next_day = (new Carbon($calendar['calDate']))->addDay()->format("Y/m/d");
        $end_time = $next_day. " ". $workptn->TIME_DAILY_HH. ":". $workptn->TIME_DAILY_MI;
        if ($calendar_count === $index) {
            // 月度の最終日の場合、データがあれば翌日の開始時間を終了時間にする
            $next_month_first = $this->tr01_work->getWithPrimaryKey($emp_cd, $next_day);
            if (!$next_month_first->empty()) {
                $end_time = $next_month_first->WORKPTN_STR_TIME;
            }
        }
        $update_data = [
            'WORKPTN_CD' => $calendar['workPtnCd'],
            'WORKPTN_STR_TIME' => $str_time,
            'WORKPTN_END_TIME' => $end_time,
            'OFC_TIME_HH' => null,
            'OFC_TIME_MI' => null,
            'OFC_CNT' => 0,
            'LEV_TIME_HH' => null,
            'LEV_TIME_MI' => null,
            'LEV_CNT' => 0,
            'OUT1_TIME_HH' => null,
            'OUT1_TIME_MI' => null,
            'OUT1_CNT' => 0,
            'IN1_TIME_HH' => null,
            'IN1_TIME_MI' => null,
            'IN1_CNT' => 0,
            'OUT2_TIME_HH' => null,
            'OUT2_TIME_MI' => null,
            'OUT2_CNT' => 0,
            'IN2_TIME_HH' => null,
            'IN2_TIME_MI' => null,
            'IN2_CNT' => 0,
            'WORK_TIME_HH' => 0,
            'WORK_TIME_MI' => 0,
            'TARD_TIME_HH' => 0,
            'TARD_TIME_MI' => 0,
            'LEAVE_TIME_HH' => 0,
            'LEAVE_TIME_MI' => 0,
            'OUT_TIME_HH' => 0,
            'OUT_TIME_MI' => 0,
            'OVTM1_TIME_HH' => 0,
            'OVTM1_TIME_MI' => 0,
            'OVTM2_TIME_HH' => 0,
            'OVTM2_TIME_MI' => 0,
            'OVTM3_TIME_HH' => 0,
            'OVTM3_TIME_MI' => 0,
            'OVTM4_TIME_HH' => 0,
            'OVTM4_TIME_MI' => 0,
            'OVTM5_TIME_HH' => 0,
            'OVTM5_TIME_MI' => 0,
            'OVTM6_TIME_HH' => 0,
            'OVTM6_TIME_MI' => 0,
            'OVTM7_TIME_HH' => 0,
            'OVTM7_TIME_MI' => 0,
            'OVTM8_TIME_HH' => 0,
            'OVTM8_TIME_MI' => 0,
            'OVTM9_TIME_HH' => 0,
            'OVTM9_TIME_MI' => 0,
            'OVTM10_TIME_HH' => 0,
            'OVTM10_TIME_MI' => 0,
            'EXT1_TIME_HH' => 0,
            'EXT1_TIME_MI' => 0,
            'EXT2_TIME_HH' => 0,
            'EXT2_TIME_MI' => 0,
            'EXT3_TIME_HH' => 0,
            'EXT3_TIME_MI' => 0,
            'EXT4_TIME_HH' => 0,
            'EXT4_TIME_MI' => 0,
            'EXT5_TIME_HH' => 0,
            'EXT5_TIME_MI' => 0,
            'RSV1_TIME_HH' => 0,
            'RSV1_TIME_MI' => 0,
            'RSV2_TIME_HH' => 0,
            'RSV2_TIME_MI' => 0,
            'RSV3_TIME_HH' => 0,
            'RSV3_TIME_MI' => 0,
            'WORKDAY_CNT' => 0,
            'HOLWORK_CNT' => 0,
            'SPCHOL_CNT' => 0,
            'PADHOL_CNT' => 0,
            'ABCWORK_CNT' => 0,
            'COMPDAY_CNT' => 0,
            'RSV1_CNT' => 0,
            'RSV2_CNT' => 0,
            'RSV3_CNT' => 0,
            'UPD_DATE' => $today,
            'SUBHOL_CNT' => 0,
            'SUBWORK_CNT' => 0,
        ];
        $this->tr01_work->updateWithKey($emp_cd, $calendar['calDate'], $update_data);

        $before_day = (new Carbon($calendar['calDate']))->subDay()->format("Y/m/d");
        $update_data = [
            'WORKPTN_END_TIME' => $str_time,
            'UPD_DATE' => $today,
        ];
        $this->tr01_work->updateWithKeyAndNotFix($emp_cd, $before_day, $update_data);
        return ;
    }

    private function updateWorkForCalk($work)
    {
        $this->tr01->upsertRecord($work);
    }

    private function createUpdateDataForWorkTimeClear()
    {
        return [
            'DATA_OUT_CLS_CD' => '00',
            'DATA_OUT_DATE' => '',
            'CALD_DATE' => null,
        ];
    }
}
