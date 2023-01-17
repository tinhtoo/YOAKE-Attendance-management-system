<?php

namespace App\Http\Controllers\Form_Print;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\MT93PgRepository;
use App\Repositories\MT22ClosingDateRepository;
use App\Repositories\MT23CompanyRepository;
use App\Repositories\MT01ControlRepository;
use App\Http\Requests\WorkTimePrintRequest;
use App\Filters\WorkTimePrintFilter;
use App\Repositories\WorkTimePrintRepository;
use Carbon\Carbon;
use PDF;

/**
 * 勤務実績表(日・週・月別) 処理
 */
class WorkTimePrintController extends Controller
{
    private $mt22_closing_date;
    private $mt23;
    private $mt01_control;
    private $wt_print_rep;

    /**
     * コントローラインスタンスの生成
     * @param
     * @return void
     */
    public function __construct(
        MT93PgRepository $pg_repository,
        MT22ClosingDateRepository $mt22_closing_date_rep,
        MT23CompanyRepository $mt23_rep,
        MT01ControlRepository $mt01_control_rep,
        WorkTimePrintRepository $work_time_print_repository
    ) {
            parent::__construct($pg_repository, '020002');
            $this->mt22_closing_date = $mt22_closing_date_rep;
            $this->mt23 = $mt23_rep;
            $this->mt01_control = $mt01_control_rep;
            $this->wt_print_rep = $work_time_print_repository;
    }

    /**
     * 勤務実績表(日・週・月別) 処理 画面表示
     * @return view
     */
    public function index(Request $request)
    {
        $closing_dates = $this->mt22_closing_date->getMt22(); // 締日;
        $company_list = $this->mt23->getDisp(); // 会社所属情報;

        return parent::viewWithMenu('form_print.WorkTimePrint', compact('closing_dates', 'company_list'));
    }

    public function print(WorkTimePrintRequest $request, WorkTimePrintFilter $filter)
    {
        ini_set('memory_limit', '300M');
        ini_set('max_execution_time', 300);
        $input_datas = $request->all();
        $now_date = Carbon::now()->format('Y/m/d'); // 現在の日付

        $control = $this->mt01_control->getMt01();
        $closing_date = $control->CLOSING_DATE;
        $month_cls_cd = $control->MONTH_CLS_CD;

        // 日付範囲
        if ($input_datas['OutputCls'] == 'rbDateRange') {
            $str_date = (substr($input_datas['filter']['startDate'], 0, 4) . '-'
                        . (substr($input_datas['filter']['startDate'], 7, 2)) . '-'
                        . (substr($input_datas['filter']['startDate'], 12, 2)));
            $end_date = (substr($input_datas['filter']['endDate'], 0, 4) . '-'
                        . (substr($input_datas['filter']['endDate'], 7, 2)) . '-'
                        . (substr($input_datas['filter']['endDate'], 12, 2)));
            $year = '';
            $month = '';
        }
        // 月度
        if ($input_datas['OutputCls'] == 'rbMonthCls') {
            $year = substr(($input_datas['filter']['yearMonthDate']), 0, 4);
            $month = abs(substr(($input_datas['filter']['yearMonthDate']), 7, 2));
            $str_date = '';
            $end_date = '';
            $closing_date_cd = $input_datas['filter']['ddlClosingDate'];
            $period = getDatesToClosingDate($year, $month, $closing_date_cd, $month_cls_cd); // 日付を取得
        }

        // 勤務実績表(日報)
        if ($input_datas['ReportCategory'] == 'rbWorkTimeDaily') {
            $dailyReportDatas = $this->wt_print_rep->getWorkTimeDailyData($filter, $str_date, $end_date);
            $pdf = PDF::loadView('form_print.templates.WorkTimeDailyPdf', compact(
                'input_datas',
                'dailyReportDatas',
                'now_date',
                'str_date',
                'end_date'
            ));
            $pdf->setPaper('A4', 'landscape');
            return $pdf->stream();
        }

        // 勤務実績表(社員別月報)A3縦 PTN1
        if ($input_datas['ReportCategory'] == 'rbWorkTimeEmpDailyPortrait') {
            $wtPortraitDatas = $this->wt_print_rep->getWorkTimePortraitData($filter, $year, $month);
            $pdf = PDF::loadView('form_print.templates.WorktimePortraitPdf', compact(
                'input_datas',
                'wtPortraitDatas',
                'now_date',
                'year',
                'month'
            ));
            $pdf->setPaper('A3', 'portrait');
            return $pdf->stream();
        }

        // 勤務実績表(社員別月報)A3縦 PTN2
        if ($input_datas['ReportCategory'] == 'rbWorkTimeEmpDailyPortrait2') {
            $wtPortrait2Datas = $this->wt_print_rep->getWorkTimePortrait2Data($filter, $year, $month);
            $pdf = PDF::loadView('form_print.templates.WorktimePortrait2Pdf', compact(
                'input_datas',
                'wtPortrait2Datas',
                'now_date',
                'year',
                'month'
            ));
            $pdf->setPaper('A3', 'portrait');
            return $pdf->stream();
        }

        // 勤務実績表(社員別日報)A3横
        if ($input_datas['ReportCategory'] == 'rbWorkTimeEmpDailyLandscape') {
            $wtLandscapeKey = $this->wt_print_rep->getWorkTimeLandscapeKeyData($filter, $year, $month);
            if (!empty($wtLandscapeKey)) {
                foreach ($wtLandscapeKey as $key => $record) {
                    $wtLandscapeKey[$key]->time_records = $this->wt_print_rep
                            ->getWorkTimeLandscapeData($record->EMP_CD, $year, $month);
                }
                $pdf = PDF::loadView('form_print.templates.WorktimeLandscapePdf', compact(
                    'input_datas',
                    'wtLandscapeKey',
                    'now_date',
                    'year',
                    'month',
                    'period'
                ));
                $pdf->setPaper('A3', 'landscape');
                return $pdf->stream();
            }
        }

        // 勤務実績表(社員別月報)A4横PTN1
        if ($input_datas['ReportCategory'] == 'rbWorkTimeEmpDailyLandscape2') {
            $wtLandscape2Datas = $this->wt_print_rep->getWorkTimeLandscape2Data($filter, $year, $month);
            $pdf = PDF::loadView('form_print.templates.WorktimeLandscape2Pdf', compact(
                'input_datas',
                'wtLandscape2Datas',
                'now_date',
                'year',
                'month'
            ));
            $pdf->setPaper('A4', 'landscape');
            return $pdf->stream();
        }

        // 勤務実績表(社員別月報)A4横PTN2用
        if ($input_datas['ReportCategory'] == 'rbWorkTimeEmpDailyLandscape3') {
            $wtLandscape3Datas = $this->wt_print_rep
                                 ->getWorkTimeLandscape3Data(
                                     $input_datas,
                                     $filter,
                                     $str_date,
                                     $end_date,
                                     $year,
                                     $month
                                 );
            $pdf = PDF::loadView('form_print.templates.WorktimeLandscape3Pdf', compact(
                'input_datas',
                'wtLandscape3Datas',
                'now_date',
                'str_date',
                'end_date',
                'year',
                'month'
            ));
            $pdf->setPaper('A4', 'landscape');
            return $pdf->stream();
        }

        // 勤務実績集計表用情報
        if ($input_datas['ReportCategory'] == 'rbWorkTimeSum') {
            $wtSumReportDatas = $this->wt_print_rep->getWorkTimeSumData($filter, $str_date, $end_date);
            $pdf = PDF::loadView('form_print.templates.WorkTimeSumPdf', compact(
                'input_datas',
                'wtSumReportDatas',
                'now_date',
                'str_date',
                'end_date'
            ));
            $pdf->setPaper('A4', 'landscape');
            return $pdf->stream();
        }
    }
}
