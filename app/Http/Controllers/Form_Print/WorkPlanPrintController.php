<?php

namespace App\Http\Controllers\Form_Print;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\MT93PgRepository;
use App\Http\Requests\WorkPlanPrintRequest;
use App\Repositories\TR01WorkRepository;
use App\Filters\WorkPlanPrintFilter;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

/**
 * 勤務予定表(週・月別) 処理
 */
class WorkPlanPrintController extends Controller
{
    private $tr01_work;

    /**
     * コントローラインスタンスの生成
     * @param
     * @return void
     */
    public function __construct(
        MT93PgRepository $pg_repository,
        TR01WorkRepository $tr01_work_rep
    ) {
        parent::__construct($pg_repository, '020001');
        $this->tr01_work = $tr01_work_rep;
    }

    /**
     * 勤務予定表(週・月別) 処理 画面表示
     * @return view
     */
    public function index(Request $request)
    {
        return parent::viewWithMenu('form_print.WorkPlanPrint');
    }

    /**
     * 印刷用帳票 画面表示
     * @return view
     */
    public function print(WorkPlanPrintRequest $request, WorkPlanPrintFilter $filter)
    {
        ini_set('memory_limit', '300M');
        ini_set('max_execution_time', 300);
        $date = new Carbon('today');
        $input_data = $request->all();
        $input_ymd = $input_data['txtStartTargetDate'];
        $str_date = substr($input_ymd, 0, 4).'-'.substr($input_ymd, 7, 2).'-'.substr($input_ymd, 12, 2);
        $now_date = Carbon::now()->format('Y-m-d');

        if ($input_data['ReportCategory'] == 'rbWeek') {
            $end_date = date('Y-m-d', (strtotime('+7 day'. $str_date)));
        } else {
            $end_date = date('Y-m-d', (strtotime('+30 day'. $str_date)));
        }
        $work_plan_reports = $this->tr01_work->getWorkPlanReportData($str_date, $end_date, $filter);
        $pdf = PDF::loadView('form_print.templates.WorkPlanPdf', compact(
            'input_data',
            'work_plan_reports',
            'str_date',
            'end_date',
            'now_date'
        ));

        if ($input_data['ReportCategory'] == 'rbWeek') {
            $pdf->setPaper('A4', 'landscape');
        } else {
            $pdf->setPaper('A3', 'landscape');
        }
        return $pdf->stream();
    }
}
