<?php

namespace App\Http\Controllers\Work_Time;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WorkTimeDeptEditorRequest;
use App\Repositories\Work_Time\WorkTimeDeptEditorRepository;
use App\Filters\WorkTimeDeptEditorFilter;
use App\Repositories\MT93PgRepository;
use App\Repositories\MT05WorkptnRepository;
use App\Repositories\MT23CompanyRepository;
use App\Repositories\MT09ReasonRepository;
use App\Repositories\MT94WorkDescRepository;
use App\Http\Requests\WorkTimeUpdateRequest;
use App\Repositories\Work_Time\WorkTimeRepository;
use App\Models\TR01Work;
use App\Repositories\TR01WorkRepository;
use Carbon\Carbon;

class WorkTimeDeptEditorController extends Controller
{
    protected $wtimedept_rep;
    protected $mt05_workptn;
    protected $mt23_company;
    protected $mt09_reason;
    protected $work_desc;
    protected $wtime_repository;
    protected $tr01;

    /**
     * コントローラインスタンスの生成
     * @param
     * @return void
     */
    public function __construct(
        WorkTimeDeptEditorRepository $wtimedept_rep,
        MT93PgRepository $pg_repository,
        MT05WorkptnRepository $mt05_workptn_rep,
        MT23CompanyRepository $mt23_company_rep,
        MT09ReasonRepository $mt09_reason_rep,
        MT94WorkDescRepository $work_desc_repository,
        WorkTimeRepository $wtime_repository,
        TR01WorkRepository $work_repository
    ) {
        parent::__construct($pg_repository, '010005');
        $this->wtimedept_rep = $wtimedept_rep;
        $this->mt05_workptn = $mt05_workptn_rep;
        $this->mt23_company = $mt23_company_rep;
        $this->mt09_reason = $mt09_reason_rep;
        $this->work_desc = $work_desc_repository;
        $this->wtime_repository = $wtime_repository;
        $this->tr01 = $work_repository;
    }

    /**
     * 出退勤入力(部門別) 画面表示
     * @return view
     */
    public function workTimeDeptEditor(Request $request)
    {
        $haken_company = $this->mt23_company->getDisp(); // 会社所属情報
        $ovtm_header_names = $this->work_desc->getOvtms()->toArray(); // テーブルヘッダー（残業）
        $ext_header_names = $this->work_desc->getExts()->toArray(); // テーブルヘッダー（割増）
        $input_search_data['txtDeptCd'] = '';
        $is_index = true;

        return parent::viewWithMenu('work_time.WorkTimeDeptEditor', compact(
            'haken_company',
            'ovtm_header_names',
            'ext_header_names',
            'input_search_data',
            'is_index'
        ));
    }

    /**
     * 指定部門の詳細データの表示
     * @param $request
     * @return Response
     */
    public function search(WorkTimeDeptEditorRequest $request, WorkTimeDeptEditorFilter $filter)
    {
        $input_search_data = $request->all();
        $filterData = $input_search_data['filter'];

        $results = $this->wtimedept_rep->select($request, $filter); // 対象データ検索
        $haken_company = $this->mt23_company->getDisp(); // 会社所属情報
        $workptn_names = $this->mt05_workptn->workptnsNormal(); // 勤務体系
        $reason_names = $this->mt09_reason->reasons(); // 事由

        $ovtm_header_names = $this->work_desc->getOvtms()->toArray(); // テーブルヘッダー（残業）
        $ext_header_names = $this->work_desc->getExts()->toArray(); // テーブルヘッダー（割増）

        $request->session()->put('ymd_date', $input_search_data['ddlDate']); // 対象年月日

        return parent::viewWithMenu('work_time.WorkTimeDeptEditor', compact(
            'input_search_data',
            'filterData',
            'results',
            'haken_company',
            'workptn_names',
            'reason_names',
            'ovtm_header_names',
            'ext_header_names'
        ));
    }

    /**
     * 時間計算処理
     *
     * @param Request $request
     * @return 時間計算データ
     */
    public function timeCal(Request $request)
    {
        $results = $this->wtime_repository->timeCal($request->all()); // 対象データ表示
        return $results;
    }

    /**
     * 日数計算処理
     *
     * @param Request $request
     * @return 日数計算データ
     */
    public function dayCal(Request $request)
    {
        $results = $this->wtime_repository->dayCal($request); // 対象データ表示
        return $results;
    }

    /**
     * 更新処理
     *
     * @param Request $request
     * @return TR01_Work
     */
    public function update(Request $request)
    {
        $today = date('Y-m-d H:i:s');
        $input_year = substr(session('ymd_date'), 0, 4);
        $input_month = substr(session('ymd_date'), 7, 2);
        $input_day = mb_substr(session('ymd_date'), 8, 2);
        $date = $input_year . '-' . $input_month . '-' . $input_day;

        try {
            \DB::beginTransaction();
            $this->updateRecords($request, $date, $today);
            \DB::commit();
        } catch (\Throwable $e) {
            \Log::debug($e);
            \DB::rollBack();
        }
        return redirect()->route('wtde.search');
    }

    private function updateRecords($request, $date, $today)
    {
        $input_worktime = $request->input('worktime');
        // 入力データ無し(該当カレンダー情報無し)の場合は何もしない
        if (!$input_worktime) {
            return ;
        }

        $emp_cd_list = array_column($input_worktime, 'EMP_CD');

        $tr01_records = $this->wtimedept_rep
                    ->getWithEmpsAndDate($emp_cd_list, $date)
                    ->pluck(null, "EMP_CD");

        $update_records = [];
        foreach ($input_worktime as $index => $data) {
            // 更新前データを取得
            $tr01_record = $tr01_records[$data['EMP_CD']];

            // 時間計算、日数計算を実行
            $data['CALD_DATE'] = $date;
            $cald_work = $this->wtime_repository->dayCal($data, $tr01_record);

            $record = [
                'EMP_CD' => $cald_work['EMP_CD'],
                'CALD_DATE' => $cald_work->CALD_DATE,
                'WORKPTN_CD' => $cald_work['WORKPTN_CD'],
                'WORKPTN_STR_TIME' => $cald_work->WORKPTN_STR_TIME,
                'WORKPTN_END_TIME' => $cald_work->WORKPTN_END_TIME,
                'REASON_CD' => $cald_work['REASON_CD'],
                'OFC_TIME_HH' => !is_nullorempty($cald_work['OFC_TIME_HH']) ? $cald_work['OFC_TIME_HH'] : null,
                'OFC_TIME_MI' => !is_nullorempty($cald_work['OFC_TIME_MI']) ? $cald_work['OFC_TIME_MI'] : null,
                'OFC_CNT' => is_nullorempty($cald_work['OFC_TIME_HH']) ? (int) $cald_work['OFC_CNT'] : 1,
                'LEV_TIME_HH' => !is_nullorempty($cald_work['LEV_TIME_HH']) ? $cald_work['LEV_TIME_HH'] : null,
                'LEV_TIME_MI' => !is_nullorempty($cald_work['LEV_TIME_MI']) ? $cald_work['LEV_TIME_MI'] : null,
                'LEV_CNT' => is_nullorempty($cald_work['LEV_TIME_HH']) ? (int) $cald_work['LEV_CNT'] : 1,
                'OUT1_TIME_HH' => !is_nullorempty($cald_work['OUT1_TIME_HH']) ? $cald_work['OUT1_TIME_HH'] : null,
                'OUT1_TIME_MI' => !is_nullorempty($cald_work['OUT1_TIME_MI']) ? $cald_work['OUT1_TIME_MI'] : null,
                'OUT1_CNT' => is_nullorempty($cald_work['OUT1_TIME_HH']) ? (int) $cald_work['OUT1_CNT'] : 1,
                'IN1_TIME_HH' => !is_nullorempty($cald_work['IN1_TIME_HH']) ? $cald_work['IN1_TIME_HH'] : null,
                'IN1_TIME_MI' => !is_nullorempty($cald_work['IN1_TIME_MI']) ? $cald_work['IN1_TIME_MI'] : null,
                'IN1_CNT' => is_nullorempty($cald_work['IN1_TIME_HH']) ? (int) $cald_work['IN1_CNT'] : 1,
                'OUT2_TIME_HH' => !is_nullorempty($cald_work['OUT2_TIME_HH']) ? $cald_work['OUT2_TIME_HH'] : null,
                'OUT2_TIME_MI' => !is_nullorempty($cald_work['OUT2_TIME_MI']) ? $cald_work['OUT2_TIME_MI'] : null,
                'OUT2_CNT' => is_nullorempty($cald_work['OUT2_TIME_HH']) ? (int) $cald_work['OUT2_CNT'] : 1,
                'IN2_TIME_HH' => !is_nullorempty($cald_work['IN2_TIME_HH']) ? $cald_work['IN2_TIME_HH'] : null,
                'IN2_TIME_MI' => !is_nullorempty($cald_work['IN2_TIME_MI']) ? $cald_work['IN2_TIME_MI'] : null,
                'IN2_CNT' => is_nullorempty($cald_work['IN2_TIME_HH']) ? (int) $cald_work['IN2_CNT'] : 1,
                'WORK_TIME_HH' => !is_nullorempty($cald_work['WORK_TIME_HH']) ? $cald_work['WORK_TIME_HH'] : 0,
                'WORK_TIME_MI' => !is_nullorempty($cald_work['WORK_TIME_MI']) ? $cald_work['WORK_TIME_MI'] : 0,
                'TARD_TIME_HH' => !is_nullorempty($cald_work['TARD_TIME_HH']) ? $cald_work['TARD_TIME_HH'] : 0,
                'TARD_TIME_MI' => !is_nullorempty($cald_work['TARD_TIME_MI']) ? $cald_work['TARD_TIME_MI'] : 0,
                'LEAVE_TIME_HH' => !is_nullorempty($cald_work['LEAVE_TIME_HH']) ? $cald_work['LEAVE_TIME_HH'] : 0,
                'LEAVE_TIME_MI' => !is_nullorempty($cald_work['LEAVE_TIME_MI']) ? $cald_work['LEAVE_TIME_MI'] : 0,
                'OUT_TIME_HH' => !is_nullorempty($cald_work['OUT_TIME_HH']) ? $cald_work['OUT_TIME_HH'] : 0,
                'OUT_TIME_MI' => !is_nullorempty($cald_work['OUT_TIME_MI']) ? $cald_work['OUT_TIME_MI'] : 0,
                'OVTM1_TIME_HH' => !is_nullorempty($cald_work['OVTM1_TIME_HH']) ? $cald_work['OVTM1_TIME_HH'] : 0,
                'OVTM1_TIME_MI' => !is_nullorempty($cald_work['OVTM1_TIME_MI']) ? $cald_work['OVTM1_TIME_MI'] : 0,
                'OVTM2_TIME_HH' => !is_nullorempty($cald_work['OVTM2_TIME_HH']) ? $cald_work['OVTM2_TIME_HH'] : 0,
                'OVTM2_TIME_MI' => !is_nullorempty($cald_work['OVTM2_TIME_MI']) ? $cald_work['OVTM2_TIME_MI'] : 0,
                'OVTM3_TIME_HH' => !is_nullorempty($cald_work['OVTM3_TIME_HH']) ? $cald_work['OVTM3_TIME_HH'] : 0,
                'OVTM3_TIME_MI' => !is_nullorempty($cald_work['OVTM3_TIME_MI']) ? $cald_work['OVTM3_TIME_MI'] : 0,
                'OVTM4_TIME_HH' => !is_nullorempty($cald_work['OVTM4_TIME_HH']) ? $cald_work['OVTM4_TIME_HH'] : 0,
                'OVTM4_TIME_MI' => !is_nullorempty($cald_work['OVTM4_TIME_MI']) ? $cald_work['OVTM4_TIME_MI'] : 0,
                'OVTM5_TIME_HH' => !is_nullorempty($cald_work['OVTM5_TIME_HH']) ? $cald_work['OVTM5_TIME_HH'] : 0,
                'OVTM5_TIME_MI' => !is_nullorempty($cald_work['OVTM5_TIME_MI']) ? $cald_work['OVTM5_TIME_MI'] : 0,
                'OVTM6_TIME_HH' => !is_nullorempty($cald_work['OVTM6_TIME_HH']) ? $cald_work['OVTM6_TIME_HH'] : 0,
                'OVTM6_TIME_MI' => !is_nullorempty($cald_work['OVTM6_TIME_MI']) ? $cald_work['OVTM6_TIME_MI'] : 0,
                'OVTM7_TIME_HH' => $cald_work->OVTM7_TIME_HH,
                'OVTM7_TIME_MI' => $cald_work->OVTM7_TIME_MI,
                'OVTM8_TIME_HH' => $cald_work->OVTM8_TIME_HH,
                'OVTM8_TIME_MI' => $cald_work->OVTM8_TIME_MI,
                'OVTM9_TIME_HH' => $cald_work->OVTM9_TIME_HH,
                'OVTM9_TIME_MI' => $cald_work->OVTM9_TIME_MI,
                'OVTM10_TIME_HH' => $cald_work->OVTM10_TIME_HH,
                'OVTM10_TIME_MI' => $cald_work->OVTM10_TIME_MI,
                'EXT1_TIME_HH' => !is_nullorempty($cald_work['EXT1_TIME_HH']) ? $cald_work['EXT1_TIME_HH'] : 0,
                'EXT1_TIME_MI' => !is_nullorempty($cald_work['EXT1_TIME_MI']) ? $cald_work['EXT1_TIME_MI'] : 0,
                'EXT2_TIME_HH' => !is_nullorempty($cald_work['EXT2_TIME_HH']) ? $cald_work['EXT2_TIME_HH'] : 0,
                'EXT2_TIME_MI' => !is_nullorempty($cald_work['EXT2_TIME_MI']) ? $cald_work['EXT2_TIME_MI'] : 0,
                'EXT3_TIME_HH' => !is_nullorempty($cald_work['EXT3_TIME_HH']) ? $cald_work['EXT3_TIME_HH'] : 0,
                'EXT3_TIME_MI' => !is_nullorempty($cald_work['EXT3_TIME_MI']) ? $cald_work['EXT3_TIME_MI'] : 0,
                'EXT4_TIME_HH' => $cald_work->EXT4_TIME_HH,
                'EXT4_TIME_MI' => $cald_work->EXT4_TIME_MI,
                'EXT5_TIME_HH' => $cald_work->EXT5_TIME_HH,
                'EXT5_TIME_MI' => $cald_work->EXT5_TIME_MI,
                'RSV1_TIME_HH' => $cald_work->RSV1_TIME_HH,
                'RSV1_TIME_MI' => $cald_work->RSV1_TIME_MI,
                'RSV2_TIME_HH' => $cald_work->RSV2_TIME_HH,
                'RSV2_TIME_MI' => $cald_work->RSV2_TIME_MI,
                'RSV3_TIME_HH' => $cald_work->RSV3_TIME_HH,
                'RSV3_TIME_MI' => $cald_work->RSV3_TIME_MI,
                'WORKDAY_CNT' => (float) $cald_work->WORKDAY_CNT,
                'HOLWORK_CNT' => (float) $cald_work->HOLWORK_CNT,
                'SPCHOL_CNT' => (float) $cald_work->SPCHOL_CNT,
                'PADHOL_CNT' => (float) $cald_work->PADHOL_CNT,
                'ABCWORK_CNT' => (float) $cald_work->ABCWORK_CNT,
                'COMPDAY_CNT' => (float) $cald_work->COMPDAY_CNT,
                'RSV1_CNT' => (float) $cald_work->RSV1_CNT,
                'RSV2_CNT' => (float) $cald_work->RSV2_CNT,
                'RSV3_CNT' => (float) $cald_work->RSV3_CNT,
                'UPD_CLS_CD' => '01',
                'FIX_CLS_CD' => $cald_work->FIX_CLS_CD,
                'RSV1_CLS_CD' => $cald_work->RSV1_CLS_CD,
                'RSV2_CLS_CD' => $cald_work->RSV2_CLS_CD,
                'ADD_DATE' => $today,
                'UPD_DATE' => $today,
                'REMARK' => $data['REMARK'] ?? "",
                'SUBHOL_CNT' => (float) $cald_work->SUBHOL_CNT,
                'SUBWORK_CNT' => (float) $cald_work->SUBWORK_CNT
            ];

            // 変更されていなければ更新しない
            if (!$this->isChangedTr01($tr01_record, $record)) {
                continue;
            }

            // 前日の終了時間を更新
            $this->tr01->updateWithKey(
                $tr01_record->EMP_CD,
                (new Carbon($data['CALD_DATE']))->subDay(),
                [
                    'WORKPTN_END_TIME' => $tr01_record->WORKPTN_STR_TIME,
                    'UPD_DATE' => $today,
                ]
            );

            // 登録用配列に格納する
            $update_records[] = $record;
        }
        foreach (array_chunk($update_records, 20) as $record) {
            TR01Work::upsert($record, ['EMP_CD', 'CALD_DATE'], $this->udpateCols());
        }
        return ;
    }

    private function udpateCols()
    {
        return [
            'WORKPTN_CD',
            'WORKPTN_STR_TIME',
            'WORKPTN_END_TIME',
            'REASON_CD',
            'OFC_TIME_HH',
            'OFC_TIME_MI',
            'OFC_CNT',
            'LEV_TIME_HH',
            'LEV_TIME_MI',
            'LEV_CNT',
            'OUT1_TIME_HH',
            'OUT1_TIME_MI',
            'OUT1_CNT',
            'IN1_TIME_HH',
            'IN1_TIME_MI',
            'IN1_CNT',
            'OUT2_TIME_HH',
            'OUT2_TIME_MI',
            'OUT2_CNT',
            'IN2_TIME_HH',
            'IN2_TIME_MI',
            'IN2_CNT',
            'WORK_TIME_HH',
            'WORK_TIME_MI',
            'TARD_TIME_HH',
            'TARD_TIME_MI',
            'LEAVE_TIME_HH',
            'LEAVE_TIME_MI',
            'OUT_TIME_HH',
            'OUT_TIME_MI',
            'OVTM1_TIME_HH',
            'OVTM1_TIME_MI',
            'OVTM2_TIME_HH',
            'OVTM2_TIME_MI',
            'OVTM3_TIME_HH',
            'OVTM3_TIME_MI',
            'OVTM4_TIME_HH',
            'OVTM4_TIME_MI',
            'OVTM5_TIME_HH',
            'OVTM5_TIME_MI',
            'OVTM6_TIME_HH',
            'OVTM6_TIME_MI',
            'OVTM7_TIME_HH',
            'OVTM7_TIME_MI',
            'OVTM8_TIME_HH',
            'OVTM8_TIME_MI',
            'OVTM9_TIME_HH',
            'OVTM9_TIME_MI',
            'OVTM10_TIME_HH',
            'OVTM10_TIME_MI',
            'EXT1_TIME_HH',
            'EXT1_TIME_MI',
            'EXT2_TIME_HH',
            'EXT2_TIME_MI',
            'EXT3_TIME_HH',
            'EXT3_TIME_MI',
            'EXT4_TIME_HH',
            'EXT4_TIME_MI',
            'EXT5_TIME_HH',
            'EXT5_TIME_MI',
            'RSV1_TIME_HH',
            'RSV1_TIME_MI',
            'RSV2_TIME_HH',
            'RSV2_TIME_MI',
            'RSV3_TIME_HH',
            'RSV3_TIME_MI',
            'WORKDAY_CNT',
            'HOLWORK_CNT',
            'SPCHOL_CNT',
            'PADHOL_CNT',
            'ABCWORK_CNT',
            'COMPDAY_CNT',
            'RSV1_CNT',
            'RSV2_CNT',
            'RSV3_CNT',
            'UPD_CLS_CD',
            'FIX_CLS_CD',
            'RSV1_CLS_CD',
            'RSV2_CLS_CD',
            'ADD_DATE',
            'UPD_DATE',
            'REMARK',
            'SUBHOL_CNT',
            'SUBWORK_CNT'
        ];
    }

    public function cancel(Request $request)
    {
        $data = $request->session()->all();

        if (key_exists('ymd_date', $data) && !is_nullorwhitespace($data['ymd_date'])) {
            return redirect()->back()->with('ymd_date', $data['ymd_date']);
        } else {
            return redirect()->back();
        }
    }

    /**
     * tr01workが変更されているか確認する。
     * 変更されている場合、更新対象とする。
     *
     * @param object $before
     * @param array $update
     * @return boolean
     */
    private function isChangedTr01($before, $update) : bool
    {
        return $before->WORKPTN_CD !== $update['WORKPTN_CD']
            || $before->WORKPTN_STR_TIME !== $update['WORKPTN_STR_TIME']
            || $before->WORKPTN_END_TIME !== $update['WORKPTN_END_TIME']
            || $before->REASON_CD !== $update['REASON_CD']
            || ($before->OFC_TIME_HH ?? '' ) !== strval($update['OFC_TIME_HH'])
            || ($before->OFC_TIME_MI ?? '' ) !== strval($update['OFC_TIME_MI'])
            || $before->OFC_CNT != $update['OFC_CNT']
            || ($before->LEV_TIME_HH ?? '' ) !== strval($update['LEV_TIME_HH'])
            || ($before->LEV_TIME_MI ?? '' ) !== strval($update['LEV_TIME_MI'])
            || $before->LEV_CNT != $update['LEV_CNT']
            || ($before->OUT1_TIME_HH ?? '' ) !== strval($update['OUT1_TIME_HH'])
            || ($before->OUT1_TIME_MI ?? '' ) !== strval($update['OUT1_TIME_MI'])
            || $before->OUT1_CNT != $update['OUT1_CNT']
            || ($before->IN1_TIME_HH ?? '' ) !== strval($update['IN1_TIME_HH'])
            || ($before->IN1_TIME_MI ?? '' ) !== strval($update['IN1_TIME_MI'])
            || $before->IN1_CNT != $update['IN1_CNT']
            || ($before->OUT2_TIME_HH ?? '' ) !== strval($update['OUT2_TIME_HH'])
            || ($before->OUT2_TIME_MI ?? '' ) !== strval($update['OUT2_TIME_MI'])
            || $before->OUT2_CNT != $update['OUT2_CNT']
            || ($before->IN2_TIME_HH ?? '' ) !== strval($update['IN2_TIME_HH'])
            || ($before->IN2_TIME_MI ?? '' ) !== strval($update['IN2_TIME_MI'])
            || $before->IN2_CNT != $update['IN2_CNT']
            || $before->WORK_TIME_HH != $update['WORK_TIME_HH']
            || $before->WORK_TIME_MI != $update['WORK_TIME_MI']
            || $before->TARD_TIME_HH != $update['TARD_TIME_HH']
            || $before->TARD_TIME_MI != $update['TARD_TIME_MI']
            || $before->LEAVE_TIME_HH != $update['LEAVE_TIME_HH']
            || $before->LEAVE_TIME_MI != $update['LEAVE_TIME_MI']
            || $before->OUT_TIME_HH != $update['OUT_TIME_HH']
            || $before->OUT_TIME_MI != $update['OUT_TIME_MI']
            || $before->OVTM1_TIME_HH != $update['OVTM1_TIME_HH']
            || $before->OVTM1_TIME_MI != $update['OVTM1_TIME_MI']
            || $before->OVTM2_TIME_HH != $update['OVTM2_TIME_HH']
            || $before->OVTM2_TIME_MI != $update['OVTM2_TIME_MI']
            || $before->OVTM3_TIME_HH != $update['OVTM3_TIME_HH']
            || $before->OVTM3_TIME_MI != $update['OVTM3_TIME_MI']
            || $before->OVTM4_TIME_HH != $update['OVTM4_TIME_HH']
            || $before->OVTM4_TIME_MI != $update['OVTM4_TIME_MI']
            || $before->OVTM5_TIME_HH != $update['OVTM5_TIME_HH']
            || $before->OVTM5_TIME_MI != $update['OVTM5_TIME_MI']
            || $before->OVTM6_TIME_HH != $update['OVTM6_TIME_HH']
            || $before->OVTM6_TIME_MI != $update['OVTM6_TIME_MI']
            || $before->OVTM7_TIME_HH != $update['OVTM7_TIME_HH']
            || $before->OVTM7_TIME_MI != $update['OVTM7_TIME_MI']
            || $before->OVTM8_TIME_HH != $update['OVTM8_TIME_HH']
            || $before->OVTM8_TIME_MI != $update['OVTM8_TIME_MI']
            || $before->OVTM9_TIME_HH != $update['OVTM9_TIME_HH']
            || $before->OVTM9_TIME_MI != $update['OVTM9_TIME_MI']
            || $before->OVTM10_TIME_HH != $update['OVTM10_TIME_HH']
            || $before->OVTM10_TIME_MI != $update['OVTM10_TIME_MI']
            || $before->EXT1_TIME_HH != $update['EXT1_TIME_HH']
            || $before->EXT1_TIME_MI != $update['EXT1_TIME_MI']
            || $before->EXT2_TIME_HH != $update['EXT2_TIME_HH']
            || $before->EXT2_TIME_MI != $update['EXT2_TIME_MI']
            || $before->EXT3_TIME_HH != $update['EXT3_TIME_HH']
            || $before->EXT3_TIME_MI != $update['EXT3_TIME_MI']
            || $before->EXT4_TIME_HH != $update['EXT4_TIME_HH']
            || $before->EXT4_TIME_MI != $update['EXT4_TIME_MI']
            || $before->EXT5_TIME_HH != $update['EXT5_TIME_HH']
            || $before->EXT5_TIME_MI != $update['EXT5_TIME_MI']
            || $before->RSV1_TIME_HH != $update['RSV1_TIME_HH']
            || $before->RSV1_TIME_MI != $update['RSV1_TIME_MI']
            || $before->RSV2_TIME_HH != $update['RSV2_TIME_HH']
            || $before->RSV2_TIME_MI != $update['RSV2_TIME_MI']
            || $before->RSV3_TIME_HH != $update['RSV3_TIME_HH']
            || $before->RSV3_TIME_MI != $update['RSV3_TIME_MI']
            || $before->WORKDAY_CNT != $update['WORKDAY_CNT']
            || $before->HOLWORK_CNT != $update['HOLWORK_CNT']
            || $before->SPCHOL_CNT != $update['SPCHOL_CNT']
            || $before->PADHOL_CNT != $update['PADHOL_CNT']
            || $before->ABCWORK_CNT != $update['ABCWORK_CNT']
            || $before->COMPDAY_CNT != $update['COMPDAY_CNT']
            || $before->RSV1_CNT != $update['RSV1_CNT']
            || $before->RSV2_CNT != $update['RSV2_CNT']
            || $before->RSV3_CNT != $update['RSV3_CNT']
            || $before->FIX_CLS_CD !== $update['FIX_CLS_CD']
            || $before->RSV1_CLS_CD !== $update['RSV1_CLS_CD']
            || $before->RSV2_CLS_CD !== $update['RSV2_CLS_CD']
            || $before->REMARK !== $update['REMARK']
            || $before->SUBHOL_CNT != $update['SUBHOL_CNT']
            || $before->SUBWORK_CNT != $update['SUBWORK_CNT'];
    }
}
