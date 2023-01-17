<?php
namespace App\WorkTmSvc;

use App\Repositories\Master\MT10EmpRefRepository;
use App\Repositories\TR01WorkRepository;
use App\Repositories\TR50WorkTimeRepository;
use Carbon\Carbon;

/**
 * TR50_WORKTIME(出退勤情報)に登録された時刻を基に各種就労時間を算出し、TR01_WORK(就業情報)へ登録する処理を行うクラス
 */
class SetWorkTimeToWorkUtility
{
    // TR01_WORK(就業情報)のキー項目
    private const TR01_WORK_PRIMARY_KEY_COLMN = [
        'EmpCd' => null, // String
        'CaldDate' => null, // Date
    ];

    // 各種就労時間算出対象の[TR01_WORK(就業情報)]のキーリスト
    private $tr01_work_key_list = [];

    /**
     * 未書込みの出退勤情報を基に、就業情報の出勤、退出、外出、再入時刻を登録します。
     *
     * tr50がループし終わったら、tr50の書込みフラグを立てる。
     * このメソッド外で、tr01の算出処理が正常に終わってから書込みフラグを立てると不整合が起きる可能性がある。
     * tr01の算出処理が終わる前にtr50に未書込みの新規データが作成されてしまったら、
     * このメソッドで取得した未書込みのtr50と再度取得するtr50の未書込みデータが不一致になる。
     * そのため、tr01の算出をしていないのに書込み済みになってしまう
     */
    private function setWorkTime0()
    {
        $tr01 = new TR01WorkRepository();
        $tr50 = new TR50WorkTimeRepository();
        // 未書込みの出退勤情報を取得
        $tr50_work_time = $tr50->getNoOuted();
        $tr50_update_data = [];

        // 処理対象となる就業情報の主キーを格納する用のリストを初期化
        $this->tr01_work_key_list = [];

        $today = date('Ymd');

        // 未書込みの出退勤情報をループ
        foreach ($tr50_work_time as $tr50_row) {
            // 出退勤情報の社員CD, 登録日時をキーに就業情報を取得
            $work = $tr01->getWithEmpAndDate($tr50_row->EMP_CD, $tr50_row->CRT_DATE);

            // 就業情報の取得レコードがない場合は、就業情報、勤怠情報の変更はせずに、次の勤怠情報のレコードに進む
            if ($work == null) {
                continue;
            }

            // 取得した(処理対象となった)就業情報の主キーリストを作成
            $tr01_pk = self::TR01_WORK_PRIMARY_KEY_COLMN;
            $tr01_pk['EmpCd'] = $work->EMP_CD;
            $tr01_pk['CaldDate'] = $work->CALD_DATE->format('Y-m-d');
            if (!in_array($tr01_pk, $this->tr01_work_key_list, true)) {
                $this->tr01_work_key_list[] = $tr01_pk;
            }

            // 出退勤情報の登録日時がカレンダー日付より大きい場合は、時刻に24を加算する
            $work_time_hh = 0;
            if ($work->CALD_DATE->format('Y-m-d') < explode(' ', $tr50_row->CRT_DATE)[0]) {
                $work_time_hh = (int) $tr50_row->WORK_TIME_HH + 24;
            } else {
                $work_time_hh = (int) $tr50_row->WORK_TIME_HH;
            }

            // 出退勤情報の時刻を就業情報の該当項目へセット
            $tr01_update_data = null;
            switch ($tr50_row->WORKTIME_CLS_CD) {
                case "00":   // 出勤
                    if ($work->OFC_CNT === 0 || $work->OFC_CNT === '0') {
                        $tr01_update_data = [
                            'OFC_TIME_HH' => $work_time_hh,
                            'OFC_TIME_MI' => $tr50_row->WORK_TIME_MI,
                            'OFC_CNT' => 1,
                        ];
                    } else {
                        $tr01_update_data = [
                            'OFC_TIME_HH' => null,
                            'OFC_TIME_MI' => null,
                            'OFC_CNT' => (int) ($work->OFC_CNT + 1),
                        ];
                    }
                    break;

                case "01":   // 退出
                    if ($work->LEV_CNT === 0 || $work->LEV_CNT === '0') {
                        $tr01_update_data = [
                            'LEV_TIME_HH' => $work_time_hh,
                            'LEV_TIME_MI' => $tr50_row->WORK_TIME_MI,
                            'LEV_CNT' => 1,
                        ];
                    } else {
                        $tr01_update_data = [
                            'LEV_TIME_HH' => null,
                            'LEV_TIME_MI' => null,
                            'LEV_CNT' => (int) ($work->LEV_CNT + 1),
                        ];
                    }
                    break;

                case "02":   // 外出
                    if ($work->OUT1_CNT === 0 || $work->OUT1_CNT === '0') {
                        $tr01_update_data = [
                            'OUT1_TIME_HH' => $work_time_hh,
                            'OUT1_TIME_MI' => $tr50_row->WORK_TIME_MI,
                            'OUT1_CNT' => 1,
                        ];
                    } else {
                        if ($work->OUT2_CNT === 0 || $work->OUT2_CNT === '0') {
                            $tr01_update_data = [
                                'OUT2_TIME_HH' => $work_time_hh,
                                'OUT2_TIME_MI' => $tr50_row->WORK_TIME_MI,
                                'OUT2_CNT' => 1,
                            ];
                        } else {
                            $tr01_update_data = [
                                'OUT2_TIME_HH' => null,
                                'OUT2_TIME_MI' => null,
                                'OUT2_CNT' => (int) ($work->OUT2_CNT + 1),
                            ];
                        }
                    }
                    break;

                case "03":   // 再入
                    if ($work->IN1_CNT === 0 || $work->IN1_CNT === '0') {
                        $tr01_update_data = [
                            'IN1_TIME_HH' => $work_time_hh,
                            'IN1_TIME_MI' => $tr50_row->WORK_TIME_MI,
                            'IN1_CNT' => 1,
                        ];
                    } else {
                        if ($work->IN2_CNT === 0 || $work->IN2_CNT === '0') {
                            $tr01_update_data = [
                                'IN2_TIME_HH' => $work_time_hh,
                                'IN2_TIME_MI' => $tr50_row->WORK_TIME_MI,
                                'IN2_CNT' => 1,
                            ];
                        } else {
                            $tr01_update_data = [
                                'IN2_TIME_HH' => null,
                                'IN2_TIME_MI' => null,
                                'IN2_CNT' => (int) ($work->IN2_CNT + 1),
                            ];
                        }
                    }
                    break;
            }

            // 就業情報に各種時刻(出勤,退出,外出,再入)を登録する
            if ($tr01_update_data != null) {
                $tr01->updateWithKey($work->EMP_CD, $work->CALD_DATE, $tr01_update_data);
            }

            // 勤怠情報の処理レコードを書込み済みにする
            $tr50_update_data[] = [
                'EMP_CD' => $tr50_row->EMP_CD,
                'CRT_DATE' => $tr50_row->CRT_DATE,
                'TERM_NO' => $tr50_row->TERM_NO,
                'WORKTIME_CLS_CD' => $tr50_row->WORKTIME_CLS_CD,
                'WORK_DATE' => $tr50_row->WORK_DATE,
                'WORK_TIME_HH' => $tr50_row->WORK_TIME_HH,
                'WORK_TIME_MI' => $tr50_row->WORK_TIME_MI,
                'DATA_OUT_CLS_CD' => "01",
                'DATA_OUT_DATE' => $today,
                'CALD_DATE' => $work->CALD_DATE,
            ];
        }

        // 出退勤情報更新
        if (!empty($tr50_update_data)) {
            foreach (array_chunk($tr50_update_data, 50) as $tr50_update_chunk) {
                $tr50->upsertRecords($tr50_update_chunk);
            }
        }
    }

    /**
     * 引数の就業情報レコードの適用勤務時間範囲内の未書込みの出退勤情報を基に、就業情報の出勤、退出、外出、再入時刻を登録します。
     * @param $work
     * @return boolean
     */
    private function setWorkTime1($work)
    {
        $tr50_update_data = [];
        $tr50 = new TR50WorkTimeRepository();
        // 適用勤務時間範囲内のTR50_WORKTIMEを取得
        $tr50_work_time = $tr50->getWithEmpAndCrtRange($work->EMP_CD, $work->WORKPTN_STR_TIME, $work->WORKPTN_END_TIME);

        // 処理対象となる出退勤情報がない場合は処理を抜ける
        if ($tr50_work_time->count() === 0) {
            return false;
        }

        $today = date('Ymd');

        // 未書込みの出退勤情報をループ
        foreach ($tr50_work_time as $tr50_row) {
            $work_time_hh = 0;
            // 出退勤情報の登録日時がカレンダー日付より大きい場合は、時刻に24を加算する
            if ($work->CALD_DATE->format('Y-m-d') < explode(' ', $tr50_row->CRT_DATE)[0]) {
                $work_time_hh = (int) ($tr50_row->WORK_TIME_HH + 24);
            } else {
                $work_time_hh = (int) ($tr50_row->WORK_TIME_HH);
            }

            // 出退勤情報の時刻を就業情報の該当項目へセット
            switch ($tr50_row->WORKTIME_CLS_CD) {
                case "00":   // 出勤
                    if ($work->OFC_CNT === 0 || $work->OFC_CNT === '0') {
                        $work->OFC_TIME_HH = $work_time_hh;
                        $work->OFC_TIME_MI = $tr50_row->WORK_TIME_MI;
                        $work->OFC_CNT = 1;
                    } else {
                        $work->OFC_TIME_HH = null;
                        $work->OFC_TIME_MI = null;
                        $work->OFC_CNT = (int) ($work->OFC_CNT + 1);
                    }
                    break;

                case "01":   // 退出
                    if ($work->LEV_CNT === 0 || $work->LEV_CNT === '0') {
                        $work->LEV_TIME_HH = $work_time_hh;
                        $work->LEV_TIME_MI = $tr50_row->WORK_TIME_MI;
                        $work->LEV_CNT = 1;
                    } else {
                        $work->LEV_TIME_HH = null;
                        $work->LEV_TIME_MI = null;
                        $work->LEV_CNT = (int) ($work->LEV_CNT + 1);
                    }
                    break;

                case "02":   // 外出
                    if ($work->OUT1_CNT === 0 || $work->OUT1_CNT === '0') {
                        $work->OUT1_TIME_HH = $work_time_hh;
                        $work->OUT1_TIME_MI = $tr50_row->WORK_TIME_MI;
                        $work->OUT1_CNT = 1;
                    } else {
                        if ($work->OUT2_CNT === 0 || $work->OUT2_CNT === '0') {
                            $work->OUT2_TIME_HH = $work_time_hh;
                            $work->OUT2_TIME_MI = $tr50_row->WORK_TIME_MI;
                            $work->OUT2_CNT = 1;
                        } else {
                            $work->OUT2_TIME_HH = null;
                            $work->OUT2_TIME_MI = null;
                            $work->OUT2_CNT = (int) ($work->OUT2_CNT + 1);
                        }
                    }
                    break;

                case "03":   // 再入
                    if ($work->IN1_CNT === 0 || $work->IN1_CNT === '0') {
                        $work->IN1_TIME_HH = $work_time_hh;
                        $work->IN1_TIME_MI = $tr50_row->WORK_TIME_MI;
                        $work->IN1_CNT = 1;
                    } else {
                        if ($work->IN2_CNT === 0 || $work->IN2_CNT === '0') {
                            $work->IN2_TIME_HH = $work_time_hh;
                            $work->IN2_TIME_MI = $tr50_row->WORK_TIME_MI;
                            $work->IN2_CNT = 1;
                        } else {
                            $work->IN2_TIME_HH = null;
                            $work->IN2_TIME_MI = null;
                            $work->IN2_CNT = (int) ($work->IN2_CNT + 1);
                        }
                    }
                    break;
            }

            // 勤怠情報の処理レコードを書込み済みにする
            $tr50_update_data[] = [
                'EMP_CD' => $tr50_row->EMP_CD,
                'CRT_DATE' => $tr50_row->CRT_DATE,
                'TERM_NO' => $tr50_row->TERM_NO,
                'WORKTIME_CLS_CD' => $tr50_row->WORKTIME_CLS_CD,
                'WORK_DATE' => $tr50_row->WORK_DATE,
                'WORK_TIME_HH' => $tr50_row->WORK_TIME_HH,
                'WORK_TIME_MI' => $tr50_row->WORK_TIME_MI,
                'DATA_OUT_CLS_CD' => "01",
                'DATA_OUT_DATE' => $today,
                'CALD_DATE' => $work->CALD_DATE,
            ];
        }

        // 出退勤情報更新
        if (!empty($tr50_update_data)) {
            foreach (array_chunk($tr50_update_data, 50) as $tr50_update_chunk) {
                $tr50->upsertRecords($tr50_update_chunk);
            }
        }
        return true;
    }

    /**
     * 未書込みの出退勤情報を基に就業情報の各種時刻、時間を設定します。
     * </summary>
     * <remarks>
     * 主に、タイムレコーダー連動処理で使用。
     * TR50_WORKTIME.DATA_OUT_CLS_CD="00"のデータをループし、該当するTR01_WORKに対し
     * 各フィールドに算出した時間を入れる。
     * </remarks>
     */
    public function setWorkTimeToWork0()
    {
        $mt10 = new MT10EmpRefRepository();
        try {
            // FIXME: トランザクションタイムアウト時間の設定(5分)
            \DB::beginTransaction();

            // 出退勤情報を就業情報へ登録
            $this->setWorkTime0();

            // 処理対象が無ければ終了
            if (empty($this->tr01_work_key_list)) {
                \DB::commit();
                return ;
            }

            $tr01 = new TR01WorkRepository();
            $works = [];
            // 処理対象の就業情報取得し、就業情報の各時間の算出を行う
            foreach ($this->tr01_work_key_list as $tr01_pk) {
                // 社員CDが社員情報に存在しなければ更新しない
                if (!$mt10->existTr01Work($tr01_pk['EmpCd'])) {
                    continue;
                }

                $work = $tr01->getWithPrimaryKey($tr01_pk['EmpCd'], $tr01_pk['CaldDate']);
                if ($work == null) {
                    // 該当データはあるはずだが、念のため
                    continue;
                }

                // 就業情報時間算出メソッドを呼び出す
                $works[] = $this->calceWorkToArray($work);
            }

            // 就業情報更新
            foreach (array_chunk($works, 20) as $work) {
                $tr01->upsertRecord($work);
            }

            // コミット
            \DB::commit();
        } catch (\Throwable $ex) {
            UtilCommon::writeErrorLog($ex);
            \DB::rollBack();
        }
    }

    /**
     * 対象年月度の就業情報に対応する未書込みの出退勤情報を基に就業情報の各種時刻、時間を設定します。
     * @param emp_cd 社員CD
     * @param cald_year 対象年度
     * @param cald_month 対象月度
     */
    public function setWorkTimeToWork3($emp_cd, $cald_year, $cald_month)
    {
        try {
            $tr01 = new TR01WorkRepository();
            $tr01_work = $tr01->getWithEmpAndCaldYearMonth($emp_cd, $cald_year, $cald_month);

            $works = [];
            foreach ($tr01_work as $work) {
                // 未書込みの出退勤情報を基に、就業情報の出勤、退出、外出、再入時刻を登録
                if (!$this->setWorkTime1($work)) {
                    // 就業情報に対応する未書出しの勤怠情報が存在しない場合は次の就業情報へ
                    continue;
                }

                // 就業情報時間算出メソッドを呼び出す
                $works[] = $this->calceWorkToArray($work);
            }

            // 就業情報更新
            foreach (array_chunk($works, 20) as $work) {
                $tr01->upsertRecord($work);
            }

            // コミット
            \DB::commit();
        } catch (\Throwable $ex) {
            UtilCommon::writeErrorLog($ex);
            \DB::rollBack();
        }
    }

    /**
     * 時間計算を行い、upsert用の配列に変換する
     *
     * @param  $work
     * @return array
     */
    private function calceWorkToArray($work) : array
    {
        $calc_work_time = new CalculateWorkTime($work);
        $calced_work = $calc_work_time->caluclateWorkTime()->toArray();
        $calced_work['WORKDAY_CNT'] = (float) $calced_work['WORKDAY_CNT'];
        $calced_work['HOLWORK_CNT'] = (float) $calced_work['HOLWORK_CNT'];
        $calced_work['SPCHOL_CNT'] = (float) $calced_work['SPCHOL_CNT'];
        $calced_work['PADHOL_CNT'] = (float) $calced_work['PADHOL_CNT'];
        $calced_work['ABCWORK_CNT'] = (float) $calced_work['ABCWORK_CNT'];
        $calced_work['COMPDAY_CNT'] = (float) $calced_work['COMPDAY_CNT'];
        $calced_work['RSV1_CNT'] = (float) $calced_work['RSV1_CNT'];
        $calced_work['RSV2_CNT'] = (float) $calced_work['RSV2_CNT'];
        $calced_work['RSV3_CNT'] = (float) $calced_work['RSV3_CNT'];
        $calced_work['SUBHOL_CNT'] = (float) $calced_work['SUBHOL_CNT'];
        $calced_work['SUBWORK_CNT'] = (float) $calced_work['SUBWORK_CNT'];
        return $calced_work;
    }
}
