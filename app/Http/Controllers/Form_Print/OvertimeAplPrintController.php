<?php

namespace App\Http\Controllers\Form_Print;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\MT93PgRepository;
use App\Repositories\MT01ControlRepository;
use App\Http\Requests\OvertimeAplPrintRequest;
use App\Repositories\Master\MT10EmpRefRepository;
use App\Filters\WorkPlanPrintFilter;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

/**
 * 残業申請書 処理
 */
class OvertimeAplPrintController extends Controller
{
    private $mt01_control;
    private $mt10_emp;

    /**
     * コントローラインスタンスの生成
     * @param
     * @return void
     */
    public function __construct(
        MT93PgRepository $pg_repository,
        MT01ControlRepository $mt01_control_rep,
        MT10EmpRefRepository $mt10_emp_rep
    ) {
        parent::__construct($pg_repository, '020005');
        $this->mt01_control = $mt01_control_rep;
        $this->mt10_emp = $mt10_emp_rep;
    }

    /**
     * 残業申請書 処理 画面表示
     * @return view
     */
    public function index(Request $request)
    {
        // 年月の初期値設定
        $control = $this->mt01_control->getMt01();
        $today = date('Y-m-d');
        // 月の初期値設定
        // 今月を取得
        $year_and_month = getYearAndMonthWithControl($today, $control->MONTH_CLS_CD, $control->CLOSING_DATE);
        $def_year = $year_and_month['year'];
        // 翌月にする
        $def_month = $year_and_month['month'] + 1;
        if ($def_month === 13) {
            $def_year++;
            $def_month = 1;
        }
        $def_ddlDate = $def_year. "年". sprintf('%02d', $def_month). "月";
        return parent::viewWithMenu('form_print.OvertimeAplPrint', compact('def_ddlDate'));
    }

    /**
     * 印刷
     *
     * @param OvertimeAplPrintRequest $request
     * @param WorkPlanPrintFilter $filter
     * @return OvertimeAplPdf
     */
    public function print(OvertimeAplPrintRequest $request, WorkPlanPrintFilter $filter)
    {
        ini_set('memory_limit', '300M');
        ini_set('max_execution_time', 300);
        $input_datas = $request->all();
        $year = substr(($input_datas['ddlDate']), 0, 4);
        $month = substr(($input_datas['ddlDate']), 7, 2);
        $target_date = $year . '/' . $month;

        $now_date = Carbon::now()->format('Y/m/d'); // 現在の日付

        $control = $this->mt01_control->getMt01();
        $closing_date = $control->CLOSING_DATE;
        $month_cls_cd = $control->MONTH_CLS_CD;

        $period = getDatesToClosingDate($year, $month, $closing_date, $month_cls_cd); // 日付を取得

        $overtime_datas = $this->mt10_emp->getOvertimeAplReportData($filter); // 残業申請書用情報の取得

        $pdf = PDF::loadView('form_print.templates.OvertimeAplPdf', compact(
            'input_datas',
            'target_date',
            'period',
            'overtime_datas',
            'now_date'
        ));
        $pdf->setPaper('A4');
        return $pdf->stream();
    }
}
