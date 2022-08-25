<?php

namespace App\Http\Controllers\Shift;

use App\Http\Controllers\Controller;
use App\Http\Requests\MonthShiftUpdateRequest;
use App\Http\Requests\MonthShiftViewRequest;
use App\Models\MT16DeptShiftCalendar;
use App\Repositories\Master\MT10EmpRefRepository;
use App\Repositories\MT01ControlRepository;
use App\Repositories\MT05WorkptnRepository;
use App\Repositories\MT08HolidayRepository;
use App\Repositories\MT16DeptShiftCalendarRepository;
use App\Repositories\MT22ClosingDateRepository;
use Illuminate\Http\Request;
use App\Repositories\MT93PgRepository;
use App\Repositories\TR01WorkRepository;
use App\Repositories\TR02EmpCalendarRepository;
use App\Repositories\TR03DeptCalendarRepository;
use App\Repositories\TR04WorkTimeFixRepository;
use App\Repositories\TR50WorkTimeRepository;
use Carbon\Carbon;

/**
 * 月別シフト入力 処理
 */
class MonthShiftEditorController extends Controller
{
    private $mt01;
    private $mt05;
    private $mt08;
    private $mt10;
    private $mt16;
    private $mt22;
    private $tr01;
    private $tr02;
    private $tr03;
    private $tr04;
    private $tr50;
    /**
     * コントローラインスタンスの生成
     * @param
     * @return void
     */
    public function __construct(
        MT93PgRepository $pg_repository,
        MT01ControlRepository $mt01_control_rep,
        MT05WorkptnRepository $mt05_workptn_rep,
        MT08HolidayRepository $mt08_holiday_rep,
        MT10EmpRefRepository $mt10_emp_ref_rep,
        MT16DeptShiftCalendarRepository $mt16_dept_shift_calendar_rep,
        MT22ClosingDateRepository $mt22_closing_date_rep,
        TR01WorkRepository $tr01_work_rep,
        TR02EmpCalendarRepository $tr02_emp_calendar_rep,
        TR03DeptCalendarRepository $tr03_dept_calendar_rep,
        TR04WorkTimeFixRepository $tr04_work_time_fix_rep,
        TR50WorkTimeRepository $tr50_work_time_rep
    ) {
        parent::__construct($pg_repository, '030003');
        $this->mt01 = $mt01_control_rep;
        $this->mt05 = $mt05_workptn_rep;
        $this->mt08 = $mt08_holiday_rep;
        $this->mt10 = $mt10_emp_ref_rep;
        $this->mt16 = $mt16_dept_shift_calendar_rep;
        $this->mt22 = $mt22_closing_date_rep;
        $this->tr01 = $tr01_work_rep;
        $this->tr02 = $tr02_emp_calendar_rep;
        $this->tr03 = $tr03_dept_calendar_rep;
        $this->tr04 = $tr04_work_time_fix_rep;
        $this->tr50 = $tr50_work_time_rep;
    }

    /**
     * 月別シフト入力 処理 画面表示
     * @return view
     */
    public function index(Request $request)
    {
        return parent::viewWithMenu('shift.MonthShiftEditor', $this->createViewData());
    }

    /**
     * 画面初期表示用データを作成して配列で返す
     *
     * @return array
     */
    private function createViewData()
    {
        $control = $this->mt01->getMt01();
        $today = date('Y-m-d');
        // 月の初期値設定
        $year_and_month = getYearAndMonthWithControl($today, $control->MONTH_CLS_CD, $control->CLOSING_DATE);
        $def_cald_year = $year_and_month['year'];
        $def_cald_month = $year_and_month['month'];

        $closing_dates = $this->mt22->getMt22();
        $def_closing_date_cd = $closing_dates->firstWhere('RSV1_CLS_CD', '01')->CLOSING_DATE_CD;
        return compact('closing_dates', 'def_cald_year', 'def_cald_month', 'def_closing_date_cd');
    }

    /**
     * カレンダーを表示する
     *
     * @return array
     */
    public function view(MonthShiftViewRequest $request)
    {
        $search_data = $request->input(['filter']);
        $year = (int)substr($search_data['caldYearMonth'], 0, 4);
        $month = (int)substr($search_data['caldYearMonth'], 7, 2);
        $last_shift_ptn_cd = '';
        $last_day_no = '';
        if ($search_data['searchCondition']) {
            $emp_cd = $search_data['txtEmpCd'];
            $emp = $this->mt10->getEmp($emp_cd);
            $dept_cd = $emp->DEPT_CD;
            $closing_date_cd = $emp->CLOSING_DATE_CD;
            // 社員
            $search_results = $this->tr01->getWithEmpAndCaldYearMonth(
                $emp_cd,
                $year,
                $month
            );
            if ($search_results->isEmpty()) {
                $closing_date_cd = $this->mt10->getEmp($emp_cd)->CLOSING_DATE_CD;
                $search_results = $this->createCalendar($year, $month, $closing_date_cd);
            }
            $tr02_record = $this->tr02->getWithPrimary($year, $month, $emp_cd);
            if ($tr02_record) {
                // 該当データがあれば初期値に設定
                $last_shift_ptn_cd = $tr02_record->LAST_PTN_CD;
                $last_day_no = $tr02_record->LAST_DAY_NO;
            }
        } else {
            // 部門
            $dept_cd = $search_data['txtDeptCd'];
            $closing_date_cd = $search_data['closingDateCd'];
            $search_results = $this->mt16->getWithDeptYearMonthAndClosing(
                $year,
                $month,
                $dept_cd,
                $closing_date_cd
            );
            if ($search_results->isEmpty()) {
                $search_results = $this->createCalendar($year, $month, $closing_date_cd);
            }
            $tr03_record = $this->tr03->getWithPrimary($year, $month, $dept_cd, $closing_date_cd);
            if ($tr03_record) {
                // 該当データがあれば初期値に設定
                $last_shift_ptn_cd = $tr03_record->LAST_PTN_CD;
                $last_day_no = $tr03_record->LAST_DAY_NO;
            }
        }
        $workptn_names = $this->mt05->workptnsNormal();
        $holidays = $this->mt08->getHolidays();

        // 確定済みチェック
        $fix_flg = $this->tr04->existWithDeptAndYM($dept_cd, $year, $month, $closing_date_cd);

        return parent::viewWithMenu(
            'shift.MonthShiftEditor',
            array_merge(
                $this->createViewData(),
                compact('search_data', 'search_results', 'workptn_names', 'holidays', 'fix_flg', 'last_shift_ptn_cd', 'last_day_no')
            )
        );
    }

    /**
     * デフォルトのカレンダーを作成して返す
     *
     * @param [type] $filter
     * @return
     */
    private function createCalendar($year, $month, $closing_date_cd)
    {
        $month_cls_cd = $this->mt01->getMt01()->MONTH_CLS_CD;
        $closing_date = $this->mt22->getFirst($closing_date_cd)->CLOSING_DATE;

        $period = getDatesToClosingDate($year, $month, $closing_date, $month_cls_cd);
        $result = [];

        foreach ($period as $day) {
            $calendar = new MT16DeptShiftCalendar();
            $calendar->CALD_DATE = $day;
            $result[] = $calendar;
        }
        return $result;
    }

    /**
     * シフトカレンダーの作成
     *
     * @param MonthShiftUpdateRequest $request
     * @return void 入力エラーはRequestクラスでエラーメッセージを返すため、ここでは何も返さない。
     */
    public function update(MonthShiftUpdateRequest $request)
    {
        $today = date('Y-m-d H:i:s');
        $year = substr($request['caldYM'], 0, 4);
        $month = (int) substr($request['caldYM'], 7, 2);
        $search_condition = $request['searchCondition'];
        $closing_date_cd = $request['closingDateCd'];
        $dept_cd = $request['txtDeptCd'];
        $emp_cd = $request['txtEmpCd'];
        $calendar_data = $request['calendarData'];
        $end_shiftptn_cd = $request['endShiftptnCd'];
        $end_day_no = $request['endDayNo'];

        try {
            \DB::beginTransaction();

            if ($search_condition) {
                // 社員
                // TR02_EMPCALENDAR
                $this->tr02Update($year, $month, $emp_cd, $end_shiftptn_cd, $end_day_no);
                // TR01_WORK
                $this->tr01Update($year, $month, $emp_cd, $calendar_data, $today, $dept_cd, $closing_date_cd);
            } else {
                // 部門
                // MT16から変更されている場合にTR01を更新するケースがあるため、MT16を更新する前にTR01を更新する。
                foreach ($this->mt10->getShiftEmpWithDeptAndClosing($dept_cd, $closing_date_cd) as $emp) {
                    // TR02_EMPCALENDAR
                    $this->tr02Update($year, $month, $emp->EMP_CD, $end_shiftptn_cd, $end_day_no);
                    // TR01_WORK
                    $this->tr01Update($year, $month, $emp->EMP_CD, $calendar_data, $today, $dept_cd, $closing_date_cd);
                }
                // MT16_DEPTSHIFTCALENDAR
                $this->mt16Update($year, $month, $closing_date_cd, $dept_cd, $calendar_data, $today);

                // TR03_DEPTCALENDAR
                $this->tr03Update($year, $month, $closing_date_cd, $dept_cd, $end_shiftptn_cd, $end_day_no);
            }

            \DB::commit();
        } catch (\Throwable $e) {
            \Log::debug($e);
            \DB::rollBack();
        }

        return ;
    }

    private function mt16Update($year, $month, $closing_date_cd, $dept_cd, $calendar_data, $today)
    {
        // MT16_DEPTSHIFTCALENDARをupseart
        $records = [];
        foreach ($calendar_data as $calendar) {
            $records[] = [
                'CALD_YEAR' => $year,
                'CALD_MONTH' => $month,
                'DEPT_CD' => $dept_cd,
                'CALD_DATE' => $calendar['caldDate'],
                'WORKPTN_CD' => $calendar['workPtnCd'],
                'RSV1_CLS_CD' => '',
                'RSV2_CLS_CD' => '',
                'UPD_DATE' => $today,
                'CLOSING_DATE_CD' => $closing_date_cd,
            ];
        }
        $update_target = [
            'WORKPTN_CD',
            'UPD_DATE',
        ];
        $this->mt16->upsertMt16($records, $update_target);
    }

    private function tr03Update($year, $month, $closing_date_cd, $dept_cd, $end_shiftptn_cd, $end_day_no)
    {
        // TR03_DEPTCALENDARをupseart
        $record = [
            'CALD_YEAR' => $year,
            'CALD_MONTH' => $month,
            'DEPT_CD' => $dept_cd,
            'LAST_PTN_CD' => $end_shiftptn_cd,
            'LAST_DAY_NO' => $end_day_no,
            'CLOSING_DATE_CD' => $closing_date_cd,
        ];
        $update_target = [
            'LAST_PTN_CD',
            'LAST_DAY_NO'
        ];
        $this->tr03->upsertRecord($record, $update_target);
    }

    private function tr02Update($year, $month, $emp_cd, $end_shiftptn_cd, $end_day_no)
    {
        // TR02_EMPCALENDARをupseart
        $record = [
            'CALD_YEAR' => $year,
            'CALD_MONTH' => $month,
            'EMP_CD' => $emp_cd,
            'LAST_PTN_CD' => $end_shiftptn_cd,
            'LAST_DAY_NO' => $end_day_no
        ];

        $update_target = [
            'LAST_PTN_CD',
            'LAST_DAY_NO'
        ];
        $this->tr02->upsertRecord($record, $update_target);
    }

    private function tr01Update($year, $month, $emp_cd, $calendar_data, $today, $dept_cd, $closing_date_cd)
    {
        // TR01_WORKを更新
        $work_records = $this->tr01->getWithEmpAndCaldYearMonth($emp_cd, $year, $month);
        if ($work_records->isEmpty()) {
            $this->insertWork($emp_cd, $calendar_data, $today, $year, $month);
        } else {
            $calc_indexs = [];
            $workptns = $this->mt05->getAll()->pluck(null, 'WORKPTN_CD');
            $last_index = count($calendar_data) - 1;
            $update_records = [];
            foreach ($work_records as $work_i => $work_record) {
                $cal_i = 0;
                // 同じ日付まで移動
                for ($cal_i; $calendar_data[$cal_i]['caldDate'] !== str_replace('-', '/', substr($work_record->CALD_DATE, 0, 10)); $cal_i++);
                if ($calendar_data[$cal_i]['workPtnCd'] === $work_record->WORKPTN_CD) {
                    // 変更なしの場合、更新しない
                    continue;
                } elseif (($work_record->UPD_CLS_CD === '01' || $work_record->FIX_CLS_CD === '01') && $dept_cd) {
                    // 元のカレンダーから変更しておらず、且つ変更済みの場合更新しない
                    $before_calendar = $this->mt16->getWithPrimary($year, $month, $closing_date_cd, $dept_cd, $work_record->CALD_DATE);
                    if ($before_calendar
                        && $calendar_data[$cal_i]['workPtnCd'] === $before_calendar->WORKPTN_CD) {
                        continue;
                    }
                }

                // 共通部分設定
                $calendar = $calendar_data[$cal_i];
                $workptn = $workptns[$calendar['workPtnCd']];
                $str_hm = $workptn->TIME_DAILY_HH. ":". $workptn->TIME_DAILY_MI;
                $str_time = (new Carbon($calendar['caldDate']))->format("Y/m/d"). " ". $str_hm;
                $next_day = (new Carbon($calendar['caldDate']))->addDay();
                $end_time = $next_day->format("Y/m/d"). " ". $str_hm;

                if (0 === $cal_i) {
                    // 月度の初日の場合、前日の終了時間を初日の開始時間に更新する
                    $this->tr01->updateWithKey(
                        $emp_cd,
                        (new Carbon($calendar['caldDate']))->subDay(),
                        [
                            'WORKPTN_END_TIME' => $str_time,
                            'UPD_DATE' => $today
                        ]
                    );
                } elseif ($work_records[$work_i - 1]->UPD_DATE !== $today) {
                    // 月度の初日以外且つ前日が更新対象でない場合、処理日の開始時間で前日の終了時間を更新する
                    $bef_work = $work_records[$work_i - 1];
                    $this->tr01->updateWithKey(
                        $bef_work->EMP_CD,
                        $bef_work->CALD_DATE,
                        [
                            'WORKPTN_END_TIME' => $str_time,
                            'UPD_DATE' => $today
                        ]
                    );
                }
                if ($last_index !== $cal_i) {
                    // 月度の末日以外は、適用終了時間には翌日の適用開始時間を設定する
                    $next_ptn = $workptns[$calendar_data[$cal_i + 1]['workPtnCd']];
                    $end_time = $next_day->format("Y/m/d"). " ". $next_ptn->TIME_DAILY_HH. ":". $next_ptn->TIME_DAILY_MI;
                } else {
                    // 月度の末日の場合、データがあれば翌日の開始時間を終了時間にする
                    $next_month_first = $this->tr01->getWithPrimaryKey($emp_cd, $next_day);
                    if ($next_month_first != null) {
                        // 最終日かつ翌日のレコードがある場合、適用終了時間には翌日の適用開始時間を設定する
                        $end_time = $next_month_first->WORKPTN_STR_TIME;
                    }
                    // 最終日かつ翌日のレコードがない場合、適用終了時間には適用開始時間 + 1日の日次を設定する（初期値）
                }
                $work_records[$work_i]->WORKPTN_CD = $calendar['workPtnCd'];
                $work_records[$work_i]->WORKPTN_STR_TIME = $str_time;
                $work_records[$work_i]->WORKPTN_END_TIME = $end_time;
                $work_records[$work_i]->UPD_DATE = $today;

                if ($work_record->UPD_CLS_CD === '00' && $work_record->FIX_CLS_CD === '00') {
                    // TR01_WORK 初期化
                    // 対象日
                    $update_records[$work_i] = $this->setWorkForClear($work_records[$work_i])->toArray();
                    // TR50_WORKTIME 初期化
                    $this->tr50->update50WorkWithEmpCdCaldDate(
                        $emp_cd,
                        $calendar_data[$cal_i]['caldDate'],
                        $this->createUpdateDataForWorkTimeClear()
                    );
                } else {
                    // 再計算用の初期化
                    $update_records[$work_i] = $this->setWorkForCalc($work_records[$work_i]);
                    // 再計算対象にセット
                    $calc_indexs[] = $work_i;
                }
            }
            foreach ($calc_indexs as $calc_index) {
                // TR01_WORK 再計算
                $update_records[$calc_index] = $this->tr01->recalcWork($update_records[$calc_index])->toArray();
            }

            foreach (array_chunk($update_records, 20) as $record_chunk) {
                $this->tr01->upsertRecord($record_chunk);
            }
        }
    }

    private function insertWork($emp_cd, $calendar_data, $today, $year, $month)
    {
        $last_index = count($calendar_data) - 1;
        $workptns = $this->mt05->getAll()->pluck(null, 'WORKPTN_CD');
        $work_records = [];
        foreach ($calendar_data as $i => $calendar) {
            $workptn = $workptns[$calendar['workPtnCd']];
            $str_time = $calendar['caldDate']. " ". $workptn->TIME_DAILY_HH. ":". $workptn->TIME_DAILY_MI;
            $next_day = (new Carbon($calendar['caldDate']))->addDay();
            $end_time = $next_day->format("Y/m/d"). " ". $workptn->TIME_DAILY_HH. ":". $workptn->TIME_DAILY_MI;

            if (0 === $i) {
                // 月度の初日の場合、前日の終了時間を初日の開始時間に更新する
                $this->tr01->updateWithKey(
                    $emp_cd,
                    (new Carbon($calendar['caldDate']))->subDay(),
                    ['WORKPTN_END_TIME' => $str_time,]
                );
            }
            if ($last_index !== $i) {
                // 最終日以外は、適用終了時間には翌日の適用開始時間を設定する
                $next_ptn = $workptns[$calendar_data[$i + 1]['workPtnCd']];
                $end_time = $next_day->format("Y/m/d"). " ". $next_ptn->TIME_DAILY_HH. ":". $next_ptn->TIME_DAILY_MI;
            } else {
                // 月度の最終日の場合、データがあれば翌日の開始時間を終了時間にする
                $next_month_first = $this->tr01->getWithPrimaryKey($emp_cd, $next_day);
                if ($next_month_first != null) {
                    // 最終日かつ翌日のレコードがある場合、適用終了時間には翌日の適用開始時間を設定する
                    $end_time = $next_month_first->WORKPTN_STR_TIME;
                }
                // 最終日かつ翌日のレコードがない場合、適用終了時間には適用開始時間 + 1日の日次を設定する（初期値）
            }

            $work_records[] = [
                'EMP_CD' => $emp_cd,
                'CALD_YEAR' => $year,
                'CALD_MONTH' => $month,
                'CALD_DATE' => $calendar['caldDate'],
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
            $this->tr01->insertWork($record_chunk);
        }
        return ;
    }

    private function setWorkForClear($work)
    {
        $work->OFC_TIME_HH = null;
        $work->OFC_TIME_MI = null;
        $work->OFC_CNT = 0;
        $work->LEV_TIME_HH = null;
        $work->LEV_TIME_MI = null;
        $work->LEV_CNT = 0;
        $work->OUT1_TIME_HH = null;
        $work->OUT1_TIME_MI = null;
        $work->OUT1_CNT = 0;
        $work->IN1_TIME_HH = null;
        $work->IN1_TIME_MI = null;
        $work->IN1_CNT = 0;
        $work->OUT2_TIME_HH = null;
        $work->OUT2_TIME_MI = null;
        $work->OUT2_CNT = 0;
        $work->IN2_TIME_HH = null;
        $work->IN2_TIME_MI = null;
        $work->IN2_CNT = 0;
        $work->WORK_TIME_HH = 0;
        $work->WORK_TIME_MI = 0;
        $work->TARD_TIME_HH = 0;
        $work->TARD_TIME_MI = 0;
        $work->LEAVE_TIME_HH = 0;
        $work->LEAVE_TIME_MI = 0;
        $work->OUT_TIME_HH = 0;
        $work->OUT_TIME_MI = 0;
        $work->OVTM1_TIME_HH = 0;
        $work->OVTM1_TIME_MI = 0;
        $work->OVTM2_TIME_HH = 0;
        $work->OVTM2_TIME_MI = 0;
        $work->OVTM3_TIME_HH = 0;
        $work->OVTM3_TIME_MI = 0;
        $work->OVTM4_TIME_HH = 0;
        $work->OVTM4_TIME_MI = 0;
        $work->OVTM5_TIME_HH = 0;
        $work->OVTM5_TIME_MI = 0;
        $work->OVTM6_TIME_HH = 0;
        $work->OVTM6_TIME_MI = 0;
        $work->OVTM7_TIME_HH = 0;
        $work->OVTM7_TIME_MI = 0;
        $work->OVTM8_TIME_HH = 0;
        $work->OVTM8_TIME_MI = 0;
        $work->OVTM9_TIME_HH = 0;
        $work->OVTM9_TIME_MI = 0;
        $work->OVTM10_TIME_HH = 0;
        $work->OVTM10_TIME_MI = 0;
        $work->EXT1_TIME_HH = 0;
        $work->EXT1_TIME_MI = 0;
        $work->EXT2_TIME_HH = 0;
        $work->EXT2_TIME_MI = 0;
        $work->EXT3_TIME_HH = 0;
        $work->EXT3_TIME_MI = 0;
        $work->EXT4_TIME_HH = 0;
        $work->EXT4_TIME_MI = 0;
        $work->EXT5_TIME_HH = 0;
        $work->EXT5_TIME_MI = 0;
        $work->RSV1_TIME_HH = 0;
        $work->RSV1_TIME_MI = 0;
        $work->RSV2_TIME_HH = 0;
        $work->RSV2_TIME_MI = 0;
        $work->RSV3_TIME_HH = 0;
        $work->RSV3_TIME_MI = 0;
        $work->WORKDAY_CNT = 0;
        $work->HOLWORK_CNT = 0;
        $work->SPCHOL_CNT = 0;
        $work->PADHOL_CNT = 0;
        $work->ABCWORK_CNT = 0;
        $work->COMPDAY_CNT = 0;
        $work->RSV1_CNT = 0;
        $work->RSV2_CNT = 0;
        $work->RSV3_CNT = 0;
        $work->SUBHOL_CNT = 0;
        $work->SUBWORK_CNT = 0;
        return $work;
    }

    private function setWorkForCalc($work)
    {
        $work->WORK_TIME_HH = 0;
        $work->WORK_TIME_MI = 0;
        $work->TARD_TIME_HH = 0;
        $work->TARD_TIME_MI = 0;
        $work->LEAVE_TIME_HH = 0;
        $work->LEAVE_TIME_MI = 0;
        $work->OUT_TIME_HH = 0;
        $work->OUT_TIME_MI = 0;
        $work->OVTM1_TIME_HH = 0;
        $work->OVTM1_TIME_MI = 0;
        $work->OVTM2_TIME_HH = 0;
        $work->OVTM2_TIME_MI = 0;
        $work->OVTM3_TIME_HH = 0;
        $work->OVTM3_TIME_MI = 0;
        $work->OVTM4_TIME_HH = 0;
        $work->OVTM4_TIME_MI = 0;
        $work->OVTM5_TIME_HH = 0;
        $work->OVTM5_TIME_MI = 0;
        $work->OVTM6_TIME_HH = 0;
        $work->OVTM6_TIME_MI = 0;
        $work->EXT1_TIME_HH = 0;
        $work->EXT1_TIME_MI = 0;
        $work->EXT2_TIME_HH = 0;
        $work->EXT2_TIME_MI = 0;
        $work->EXT3_TIME_HH = 0;
        $work->EXT3_TIME_MI = 0;
        $work->WORKDAY_CNT = 0;
        $work->HOLWORK_CNT = 0;
        $work->SPCHOL_CNT = 0;
        $work->PADHOL_CNT = 0;
        $work->ABCWORK_CNT = 0;
        $work->COMPDAY_CNT = 0;
        $work->RSV1_CNT = 0;
        $work->SUBHOL_CNT = 0;
        $work->SUBWORK_CNT = 0;
        return $work;
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
