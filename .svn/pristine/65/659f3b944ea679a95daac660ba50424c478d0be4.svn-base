<?php

namespace App\Http\Controllers\Work_Time;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WorkTimeRequest;
use App\Models\TR01Work;
use App\Repositories\MT08HolidayRepository;
use App\Repositories\Work_Time\WorkTimeRepository;
use App\Repositories\MT93PgRepository;
use App\Repositories\MT94WorkDescRepository;
use App\Repositories\TR01WorkRepository;
use Carbon\Carbon;

class WorkTimeEditorController extends Controller
{
    protected $wtime_repository;
    protected $work_desc;
    protected $mt08_holiday;
    protected $tr01;
    /**
     * 新しいコントローラインスタンスの生成
     *
     * @param
     * @return void
     */
    public function __construct(
        WorkTimeRepository $wtime_repository,
        MT08HolidayRepository $mt08_holiday_repository,
        MT94WorkDescRepository $work_desc_repository,
        MT93PgRepository $pg_repository,
        TR01WorkRepository $work_repository
    ) {
        parent::__construct($pg_repository, '010001');
        $this->wtime_repository = $wtime_repository;
        $this->work_desc = $work_desc_repository;
        $this->mt08_holiday = $mt08_holiday_repository;
        $this->tr01 = $work_repository;
    }

    /**
     * 指定画面の表示
     *
     * @param $request
     * @return view
     */
    public function worktimeeditor(Request $request)
    {
        $ovtm_header_names = $this->work_desc->getOvtms()->toArray(); // テーブルヘッダー（残業）
        $ext_header_names = $this->work_desc->getExts()->toArray(); // テーブルヘッダー（割増）
        $search_data['txtEmpCd'] = '';
        $is_index = true;
        return parent::viewWithMenu(
            'work_time.WorkTimeEditor',
            compact('ovtm_header_names', 'ext_header_names', 'search_data', 'is_index')
        );
    }

    /**
     * 指定ユーザーのプロファイル表示
     *
     * @param $request
     * @return Response
     */
    public function search(WorkTimeRequest $request)
    {
        $search_data = $request->all();

        $results = $this->wtime_repository->select($request); // 対象データ表示
        $confirmCheck = $this->wtime_repository->confirmCheck($request); // 確定済みチェック
        $workdaycnt = $this->wtime_repository->workdaycnt($request); // 出勤回数の合計
        $holdaycnt = $this->wtime_repository->holworkcnt($request); // 休出回数の合計
        $spcholcnt = $this->wtime_repository->spcholcnt($request); // 特休回数の合計
        $padholcnt = $this->wtime_repository->padholcnt($request); // 有休回数の合計
        $abcworkcnt = $this->wtime_repository->abcworkcnt($request); // 欠勤回数の合計
        $compdaycnt = $this->wtime_repository->compdaycnt($request); // 代休回数の合計

        $worktime = $this->wtime_repository->worktime($request); // 出勤時間
        $tardtime = $this->wtime_repository->tardtime($request); // 遅刻時間
        $leavetime = $this->wtime_repository->leavetime($request); // 早退時間
        $outtime = $this->wtime_repository->outtime($request); // 外出時間
        $ovtm1time = $this->wtime_repository->ovtm1time($request); // 早出時間
        $ovtm2time = $this->wtime_repository->ovtm2time($request); // 普通残業時間
        $ovtm3time = $this->wtime_repository->ovtm3time($request); // 深夜残業時間
        $ovtm4time = $this->wtime_repository->ovtm4time($request); // 休日残業時間
        $ovtm5time = $this->wtime_repository->ovtm5time($request); // 休日深夜残業時間
        $ovtm6time = $this->wtime_repository->ovtm6time($request); // 空
        $ext1time = $this->wtime_repository->ext1time($request); // 深夜割増
        $ext2time = $this->wtime_repository->ext2time($request); // 空
        $ext3time = $this->wtime_repository->ext3time($request); // 空

        $getSumTimes = $this->wtime_repository->getSumTime($request); // 出勤時間、残業項目１～ｎの合計
        $getSumExtTimes = $this->wtime_repository->getSumExtTimes($request); // 割増項目１～ｎの合計

        $messages = $this->wtime_repository->messages(); // メッセージ表示
        $workptn_names = $this->wtime_repository->workptns(); // 勤務体系
        $reason_names = $this->wtime_repository->reasons(); // 事由

        $request->session()->put('date', $search_data['ddlDate']);
        $emp_cd = ($request->all())['txtEmpCd'];

        $ovtm_header_names = $this->work_desc->getOvtms()->toArray(); // テーブルヘッダー（残業）
        $ext_header_names = $this->work_desc->getExts()->toArray(); // テーブルヘッダー（割増）

        $holidays = $this->mt08_holiday->getHolidays()->toArray();

        return parent::viewWithMenu(
            'work_time.WorkTimeEditor',
            compact(
                'emp_cd',
                'results',
                'confirmCheck',
                'messages',
                'workptn_names',
                'reason_names',
                'search_data',
                'workdaycnt',
                'holdaycnt',
                'spcholcnt',
                'padholcnt',
                'abcworkcnt',
                'compdaycnt',
                'worktime',
                'tardtime',
                'leavetime',
                'outtime',
                'ovtm1time',
                'ovtm2time',
                'ovtm3time',
                'ovtm4time',
                'ovtm5time',
                'ovtm6time',
                'ext1time',
                'ext2time',
                'ext3time',
                'getSumTimes',
                'getSumExtTimes',
                'ovtm_header_names',
                'ext_header_names',
                'holidays'
            )
        );
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
     * キャンセルボタン
     *
     * @param Request $request
     * @return back
     */
    public function cancel(Request $request)
    {
        $data = $request->session()->all();
        if (key_exists('date', $data) && !is_nullorwhitespace($data['date'])) {
            return redirect()->back()->with('date', $data['date']);
        } else {
            return redirect()->back();
        }
    }

    public function update(Request $request)
    {
        $today = date('Y-m-d H:i:s');
        $date = session('date');
        $year = (int)substr($date, 0, 4);
        $month = (int)abs(substr($date, 7, 2));
        $input_emp = $request->only('empCd');

        // 社員番号が送信されていない（＝該当カレンダー情報無しの状態）場合、画面初期化
        if (!key_exists('empCd', $input_emp)) {
            return redirect()->route('wte.search');
        }

        $emp_cd = $input_emp['empCd'];
        try {
            \DB::beginTransaction();
            $this->updateRecords($request, $emp_cd, $year, $month, $today);
            \DB::commit();
        } catch (\Throwable $e) {
            \Log::debug($e);
            \DB::rollBack();
        }

        return redirect()->route('wte.search');
    }

    private function updateRecords($request, $emp_cd, $cald_year, $cald_month, $today)
    {
        $update_records = [];
        $tr01_records = $this->wtime_repository
                    ->getWithEmpAndYearMonth($emp_cd, $cald_year, $cald_month);

        $day_num = count($request->input('worktime'));
        foreach ($request->input('worktime') as $index => $data) {
            // 更新前データを取得
            $tr01_record = $tr01_records->where('CALD_DATE', '=', (new Carbon($data['CALD_DATE'])))->first();

            // 時間計算、日数計算を実行
            $data['EMP_CD'] = $emp_cd;
            $cald_work = $this->wtime_repository->dayCal($data, $tr01_record);
            $record = [
                'EMP_CD' => $emp_cd,
                'CALD_DATE' => $cald_work['CALD_DATE'],
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
                'UPD_CLS_CD' => $tr01_record->UPD_CLS_CD,
                'FIX_CLS_CD' => $cald_work->FIX_CLS_CD,
                'RSV1_CLS_CD' => $cald_work->RSV1_CLS_CD,
                'RSV2_CLS_CD' => $cald_work->RSV2_CLS_CD,
                'ADD_DATE' => $today,
                'UPD_DATE' => $tr01_record->UPD_DATE,
                'REMARK' => $data['REMARK'] ?? "",
                'SUBHOL_CNT' => (float) $cald_work->SUBHOL_CNT,
                'SUBWORK_CNT' => (float) $cald_work->SUBWORK_CNT
            ];

            // 変更されている場合、更新フラグを設定する
            if ($this->isChangedTr01($tr01_record, $record)) {
                $record['UPD_DATE'] = $today;
                $record['UPD_CLS_CD'] = '01';
            }
            $update_records[] = $record;

            // 開始、終了時間の設定、更新
            // 月初めの場合、前月末日の適用終了時間を更新
            if ($index === 0) {
                $this->tr01->updateWithKey(
                    $emp_cd,
                    (new Carbon($data['CALD_DATE']))->subDay(),
                    [
                        'WORKPTN_END_TIME' => $cald_work->WORKPTN_STR_TIME,
                        'UPD_DATE' => $today,
                    ]
                );
            } else {
                // 月初め以外の場合は、更新用配列の適用終了時間を更新
                $update_records[$index - 1]['WORKPTN_END_TIME'] = $cald_work->WORKPTN_STR_TIME;
            }
            // 月終わりの場合、翌月初日の適用開始日を適用終了時間に設定
            if ($day_num === $index + 1) {
                $next_day = (new Carbon($cald_work->CALD_DATE))->addDay();
                $early_next_month = $this->tr01->getWithPrimaryKey($cald_work->EMP_CD, $next_day);
                if (!is_null($early_next_month)) {
                    $update_records[$index]['WORKPTN_END_TIME'] = $early_next_month->WORKPTN_STR_TIME;
                }
            }
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
