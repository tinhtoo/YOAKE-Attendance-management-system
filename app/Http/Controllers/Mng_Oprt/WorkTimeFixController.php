<?php

namespace App\Http\Controllers\Mng_Oprt;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\MT01ControlRepository;
use App\Repositories\Search\MT12DeptSearchRepository;
use App\Repositories\MT13DeptAuthRepository;
use App\Repositories\MT22ClosingDateRepository;
use App\Repositories\MT93PgRepository;
use App\Repositories\TR01WorkRepository;
use App\Repositories\TR04WorkTimeFixRepository;
use App\http\Requests\WorkTimeFixUpdateRequest;

/**
 * 月次確定処理画面
 */

class WorkTimeFixController extends Controller
{
    private $mt01_control;
    private $mt12_dept_search;
    private $mt13_dept_auth;
    private $mt22_closing_date;
    private $tr01_work;
    private $tr04_worktimefix;
    /**
     * コントローラインスタンスの生成
     * @param
     * @return void
     */
    public function __construct(
        MT01ControlRepository $mt01_control_rep,
        MT12DeptSearchRepository $mt12_dept_search_rep,
        MT13DeptAuthRepository $mt13_dept_auth_rep,
        MT22ClosingDateRepository $mt22_closing_date_rep,
        MT93PgRepository $pg_repository,
        TR01WorkRepository $tr01_work_rep,
        TR04WorkTimeFixRepository $tr04_work_time_fix_rep
    ) {
        $this->mt01_control = $mt01_control_rep;
        $this->mt12_dept_search = $mt12_dept_search_rep;
        $this->mt13_dept_auth = $mt13_dept_auth_rep;
        $this->mt22_closing_date = $mt22_closing_date_rep;
        $this->tr01_work = $tr01_work_rep;
        $this->tr04_worktimefix = $tr04_work_time_fix_rep;
        parent::__construct($pg_repository, '040006');
    }

    /**
     * 月次確定処理画面表示
     * @return view
     */
    public function index(Request $request)
    {
        return parent::viewWithMenu('mng_oprt.WorkTimeFix', $this->createViewData());
    }

    /**
     * 画面表示用データを返す
     *
     * @return array
     */
    private function createViewData(): array
    {
        $control = $this->mt01_control->getMt01();
        $today = date('Y-m-d');
        // 月の初期値設定
        // 今月を取得
        $year_and_month = getYearAndMonthWithControl($today, $control->MONTH_CLS_CD, $control->CLOSING_DATE);
        $def_year = $year_and_month['year'];
        // 前月にする
        $def_month = $year_and_month['month'] - 1;
        if ($def_month === 0) {
            $def_year--;
            $def_month = 12;
        }
        $disp_cls_cd = '01';
        $dept_list = $this->mt12_dept_search->getSorted($disp_cls_cd);
        $changeable_dept_cd_list = $this->mt13_dept_auth->getChangeableDept(session('id'), $disp_cls_cd)->pluck('DEPT_CD')->toArray();
        $closing_dates = $this->mt22_closing_date->getMt22();
        $def_closing_date_cd = $closing_dates->firstWhere('RSV1_CLS_CD', '01')->CLOSING_DATE_CD;

        return compact(
            'def_year',
            'def_month',
            'dept_list',
            'changeable_dept_cd_list',
            'closing_dates',
            'def_closing_date_cd'
        );
    }

    /**
     * 就業情報の確定処理を行う
     *
     * @param WorkTimeFixUpdateRequest $request
     * @return 成功時data.successに1を設定
     */
    public function update(WorkTimeFixUpdateRequest $request)
    {
        $today = date('Y-m-d H:i:s');
        $year = $request['year'];
        $month = (int)$request['month'];
        $closing_date_cd = $request['closingDateCd'];
        $dept_cd_list = $request['dept_cd'];

        // 権限チェック
        // 権限外のdept_cdが送られてきた場合、最新の権限を反映するため、画面の再表示を行う
        $disp_cls_cd = '01';
        $changeable_dept_cd_list = $this->mt13_dept_auth->getChangeableDept(session('id'), $disp_cls_cd)->pluck('DEPT_CD')->toArray();
        foreach ($dept_cd_list as $checked_dept_cd) {
            if (!in_array($checked_dept_cd, $changeable_dept_cd_list, true)) {
                // JavaScriptでリダイレクトを行う
                return 0;
            }
        }

        \DB::beginTransaction();
        try {
            // TR01_WORK更新
            $this->tr01_work->updateForFix($year, $month, $closing_date_cd, $dept_cd_list, $today);

            // TR04_WORKTIMEFIXの登録または更新
            $this->upsertWorkTimeFixRecords($year, $month, $dept_cd_list, $closing_date_cd, $today);

            \DB::commit();
        } catch (\Throwable $e) {
            \Log::debug($e);
            \DB::rollBack();
        }

        // JavaScriptで成功表示をする
        return ['success' => 1];
    }

    private function upsertWorkTimeFixRecords($year, $month, $dept_cd_list, $closing_date_cd, $today)
    {
        $records = $this->createWorkTimeFixRecords($year, $month, $dept_cd_list, $closing_date_cd, $today);
        foreach ((collect($records))->chunk(30) as $record_chunk) {
            $this->tr04_worktimefix->upsertRecord($record_chunk->toArray(), ['FIX_CNT', 'UPD_DATE']);
        }
        return ;
    }

    private function createWorkTimeFixRecords($year, $month, $dept_cd_list, $closing_date_cd, $today):array
    {
        $upsert_records = [];
        $tr04_dept = $this->tr04_worktimefix->getWithDeptListAndPrimary($year, $month, $closing_date_cd, $dept_cd_list)
                        ->pluck('FIX_CNT', 'DEPT_CD')->toArray();
        foreach ($dept_cd_list as $dept_cd) {
            $upsert_records[] = [
                'CALD_YEAR' => $year,
                'CALD_MONTH' => $month,
                'DEPT_CD' => $dept_cd,
                'FIX_CNT' => key_exists($dept_cd, $tr04_dept) ? $tr04_dept[$dept_cd] + 1 : 1,
                'UPD_DATE' => $today,
                'CLOSING_DATE_CD' => $closing_date_cd
            ];
        }
        return $upsert_records;
    }
}
