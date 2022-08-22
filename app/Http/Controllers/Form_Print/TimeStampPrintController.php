<?php

namespace App\Http\Controllers\Form_Print;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\MT93PgRepository;
use App\Http\Requests\TimeStampPrintRequest;
use App\Filters\TimeStampPrintFilter;
use App\Repositories\TR01WorkRepository;
use App\Repositories\MT01ControlRepository;
use App\Repositories\MT13DeptAuthRepository;
use App\Repositories\TR50WorkTimeRepository;
use Carbon\Carbon;
use PDF;

/**
 * 未打刻／二重打刻一覧表 処理
 */
class TimeStampPrintController extends Controller
{
    private $tr01_work;
    private $mt01_control;
    private $mt13;
    private $tr50_worktime;
    /**
     * コントローラインスタンスの生成
     * @param
     * @return void
     */
    public function __construct(
        MT93PgRepository $pg_repository,
        TR01WorkRepository $tr01_work_rep,
        MT01ControlRepository $mt01_control_rep,
        MT13DeptAuthRepository $mt13_dept_auth_rep,
        TR50WorkTimeRepository $tr50_work_time_repository
    ) {
        parent::__construct($pg_repository, '020003');
        $this->tr01_work = $tr01_work_rep;
        $this->mt01_control = $mt01_control_rep;
        $this->mt13 = $mt13_dept_auth_rep;
        $this->tr50_worktime = $tr50_work_time_repository;
    }

    /**
     * 未打刻／二重打刻一覧表 処理　画面表示
     * @return view
     */
    public function index(Request $request)
    {
        return parent::viewWithMenu('form_print.TimeStampPrint');
    }

    /**
     * 未打刻／二重打刻一覧表のデータを取得
     *
     * @param TimeStampPrintRequest $request
     * @param TimeStampPrintFilter $filter
     * @return TimeStampPdf
     */
    public function print(TimeStampPrintRequest $request, TimeStampPrintFilter $filter)
    {
        ini_set('max_execution_time', 120);
        $input_datas = $request->all();
        $now_date = Carbon::now()->format('Y/m/d'); // 現在の日付

        $control = $this->mt01_control->getMt01();
        $closing_date = $control->CLOSING_DATE;
        $month_cls_cd = $control->MONTH_CLS_CD;

        // 日付範囲
        if ($input_datas['OutputCls'] == 'rbDateRange') {
            $str_date = (substr($input_datas['filter']['startDate'], 0, 4)
                    . '-' . (substr($input_datas['filter']['startDate'], 7, 2))
                    . '-' . (substr($input_datas['filter']['startDate'], 12, 2)));
            $end_date = (substr($input_datas['filter']['endDate'], 0, 4)
                    . '-' . (substr($input_datas['filter']['endDate'], 7, 2))
                    . '-' . (substr($input_datas['filter']['endDate'], 12, 2)));
        }

        // 月度
        if ($input_datas['OutputCls'] == 'rbMonthCls') {
            $year = substr(($input_datas['filter']['yearMonthDate']), 0, 4);
            $month = abs(substr(($input_datas['filter']['yearMonthDate']), 7, 2));

            $str_date =  getStartDateAtMonth($year, $month, $closing_date, $month_cls_cd);
            $end_date =  getEndDateAtMonth($year, $month, $closing_date, $month_cls_cd);
        }
        if (!empty($input_datas['chkNoTime'])) {
            $chkNoTime = true;
        } else {
            $chkNoTime = false;
        }
        $visibleDeptList = $this->mt13->getChangeableDept(session('id'));
        $time_stamp_datas = $this->tr01_work->getNoDbTimeStampReportData($chkNoTime, $filter, $str_date, $end_date);

        if (!empty($time_stamp_datas)) {
            foreach ($time_stamp_datas as $key => $record) {
                $time_stamp_datas[$key]->time_records = $this->tr50_worktime->getWorkTimeRecords($record->EMP_CD, $record->WORKPTN_STR_TIME, $record->WORKPTN_END_TIME);
            }
        }
        $pdf = PDF::loadView(
            'form_print.templates.TimeStampPdf',
            compact('input_datas', 'time_stamp_datas', 'now_date', 'str_date', 'end_date')
        );
        $pdf->setPaper('A4');
        return $pdf->stream();

    }
}
