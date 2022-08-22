<?php
namespace App\WorkTmSvc;

use App\Repositories\LG01WorktimeconvRepository;
use App\Repositories\Work_Time\MT95TermRepository;
use App\Repositories\TR50WorkTimeRepository;
use Illuminate\Support\Facades\Facade;

use App\WorkTmSvc\UtilCommon;
use function PHPUnit\Framework\isNull;

/**
 * 端末の出退勤情報を取得しサーバーの出退勤情報に登録する処理に関するクラス
 */
class GetWorkTimeDataUtility extends Facade
{
    /**
     * MT95_TERM(端末情報)に登録されているすべての端末のデータベースから出退勤データを取得します。
     */
    public static function getWorkTimeDataFromAllTerminalToServer()
    {
        $mt95 = new MT95TermRepository;
        try {
            // 端末情報全件取得
            $term_dt = $mt95->getList();
            if ($term_dt->count === 0) {
                throw new WorkTmSvcException("MT95_TERM(端末情報)が1件も登録されていません。");
            }

            // 端末情報より接続文字列を生成し、各端末の出退勤情報を取得
            foreach ($term_dt as $term_row) {
                // 接続文字列生成
                $db_connect = UtilCommon::combineDBConnectString(
                    $term_row->INSTANCE_NAME,
                    $term_row->DATABASE_NAME,
                    $term_row->USER_NAME,
                    $term_row->USER_PASSWORD
                );

                // 出退勤情報取得処理
                self::getWorkTimeDataFromSingleTerminalToServer2($term_row->TERM_NO, $db_connect);
            }
        } catch (\Throwable $e) {
            UtilCommon::writeErrorLog($e);
        }
    }

    /**
     * 引数で指定された接続先のデータベースから出退勤データを取得します。
     * @param termNo 端末番号
     */
    public function getWorkTimeDataFromSingleTerminalToServer1($term_no)
    {
        $mt95 = new MT95TermRepository;
        try {
            // 端末情報存在チェック
            if (!$mt95->termExist($term_no)) {
                throw new WorkTmSvcException("端末番号 " . $term_no . " がMT95_TERM(端末情報)に存在しません。");
            }

            // 端末情報取得
            $term = $mt95->getTerm($term_no);

            // 接続文字列生成
            $db_connect = UtilCommon::combineDBConnectString(
                $term->INSTANCE_NAME,
                $term->DATABASE_NAME,
                $term->USER_NAME,
                $term->USER_PASSWORD
            );

            // 出退勤情報取得処理
            $this->getWorkTimeDataFromSingleTerminalToServer2($term_no, $db_connect);
        } catch (\Throwable $ex) {
            UtilCommon::writeErrorLog($ex);
        }
    }

    /**
     * 引数で指定された接続先のデータベースから出退勤データを取得します。
     * </summary>
     * <param name="termNo">端末番号</param>
     * <param name="dbConnectionString">DB接続文字列</param>
     */
    private function getWorkTimeDataFromSingleTerminalToServer2($term_no, $db_connection)
    {
        $str_date = date('Y/m/d H:i:s.v');
        $lg01 = new LG01WorktimeconvRepository;
        $tr50 = new TR50WorkTimeRepository;

        try {
            // 端末打刻データ取得開始ログの登録
            $lg01->logStart($term_no, $str_date);

            \DB::beginTransaction();

            // 登録先の[TR50_WORKTIME(出退勤情報)]の登録用データテーブル取得
            $tr50_work_time = $tr50->getNoOuted();

            // 接続先のデータベースから[TR50_WORKTIME_TM(出退勤情報)]を全件取得
            $db_connection->transaction(function () use ($tr50, $tr50_work_time, $db_connection) {

                $tr50_new_records = [];
                $tr50_work_time_tm = $db_connection::from('TR50_WORKTIME_TM')->get();
                foreach ($tr50_work_time_tm as $tr50_tm_row) {
                    // 登録先の出退勤情報データテーブルの行を定義
                    // TR50_WORKTIME_TM(出退勤情報) → TR50_WORKTIME(出退勤情報)

                    // 同一レコードがあれば更新
                    if ($tr50_work_time->where('EMP_CD', $tr50_tm_row['EMP_CD'])
                                    ->where('CRT_DATE', $tr50_tm_row['CRT_DATE'])
                                    ->wehre('TERM_NO', $tr50_tm_row['TERM_NO'])
                                    ->exists()) {
                        $tr50->updateWithPrimary(
                            $tr50_tm_row['EMP_CD'],
                            $tr50_tm_row['CRT_DATE'],
                            $tr50_tm_row['TERM_NO'],
                            [
                                'WORKTIME_CLS_CD' => $tr50_tm_row['WORKTIME_CLS_CD'],
                                'WORK_DATE' => $tr50_tm_row['WORK_DATE'],
                                'WORK_TIME_HH' => $tr50_tm_row['WORK_TIME_HH'],
                                'WORK_TIME_MI' => $tr50_tm_row['WORK_TIME_MI'],
                                'DATA_OUT_CLS_CD' => "00",
                                'DATA_OUT_DATE' => '',
                            ]
                        );
                    } else {
                        // 新規行は登録を行う
                        $new_tr50 = [
                            'EMP_CD' => $tr50_tm_row['EMP_CD'],                    // 社員コード
                            'CRT_DATE' => $tr50_tm_row['CRT_DATE'],                // 登録日時
                            'TERM_NO' => $tr50_tm_row['TERM_NO'],                  // 端末番号
                            'WORKTIME_CLS_CD' => $tr50_tm_row['WORKTIME_CLS_CD'],  // 出退区分コード
                            'WORK_DATE' => $tr50_tm_row['WORK_DATE'],              // 日付
                            'WORK_TIME_HH' => $tr50_tm_row['WORK_TIME_HH'],        // 時刻(時間)
                            'WORK_TIME_MI' => $tr50_tm_row['WORK_TIME_MI'],        // 時刻(分)
                            'DATA_OUT_CLS_CD' => "00",                             // 勤怠システム書出区分コード(00:未,01:済)
                            'DATA_OUT_DATE' => '',                                 // 勤怠システム書出日付
                        ];
                        // 登録先の出退勤情報データテーブルの新規行を追加
                        $tr50_new_records[] = $new_tr50;
                    }
                }
                // [TR50_WORKTIME(出退勤情報)] 更新
                $tr50->insertRecords($tr50_new_records);
    
                // サーバー側の出退勤情報にデータを追加したら、端末側のレコードを削除
                $tr50_tm_row->truncate();
            });
            // トランザクションコミット
            \DB::commit();

            // 端末打刻データ取得正常終了ログの更新
            $lg01->logEnd($term_no, $str_date);
        } catch (\Throwable $ex) {
            UtilCommon::writeErrorLog($ex);
            \DB::rollBack();
            // 端末打刻データ取得異常終了ログの更新
            $lg01->abend($term_no, $str_date, $ex);
        }
    }
}
