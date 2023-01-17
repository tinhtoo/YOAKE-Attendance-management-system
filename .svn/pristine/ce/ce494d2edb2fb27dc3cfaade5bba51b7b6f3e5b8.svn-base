<?php
namespace App\WorkTmSvc;

use App\Repositories\Master\MT07FractionRepository;
use App\Repositories\Master\MT10EmpRefRepository;
use App\Repositories\MT01ControlRepository;
use App\Repositories\MT05WorkptnRepository;
use App\Repositories\MT06OvertmLmtRepository;
use App\Repositories\MT09ReasonRepository;
use App\Repositories\MT94WorkDescRepository;

/**
 * 各就業時間算出用クラス
 * このクラスでは例外処理は行わない。呼び出し元で例外を捕捉する。
 *
 * vb->PHPへの移植に際し、以下変更
 * ・PHPに構造体が無いため、代替として連想配列を使う
 * 　　(連想)配列は代入するとコピーが作成されるため、newやcloneは不要
 * ・TimeSpanが無いため、分を表す数値を設定する。
 * 　　PHPのパッケージ「Carbon」のaddMinutes、addMinutesは日付を跨いでくれる。
 * ・オーバーロード（引数の数がことなる同一の関数名の定義）ができないため、
 * 　　関数名が同一の場合は引数の数を関数名の後ろにつける。
 */
class CalculateWorkTime
{
    // 日付、時刻範囲の開始、終了の判別
    private const RANGE_OPTION = [
        'Start' => 0,
        'End' => 1,
    ];

    // 外出１、２フラグ
    private const OUT_TIME_MODE = [
        'Out1' => 0,
        'Out2' => 1,
    ];

    /** 時間算出用時刻 */
    private const CALCULATE_DATE_TIME_TYPE = [
        'OFC' => null, // Date
        'LEV' => null, // Date
        'OUT1' => null, // Date
        'IN1' => null, // Date
        'OUT2' => null, // Date
        'IN2' => null, // Date
    ];

    /** 時刻範囲 */
    private const TIME_RANGE_TYPE = [
        'START' => null, // Date
        'END' => null, // Date
    ];

    /** 時間算出処理実行フラグ */
    private const CALCULATION_PROCESS_FLG_TYPE = [
        'IsWorkTime' => false,
        'IsOut1Time' => false,
        'IsOut2Time' => false,
    ];

    /** 時間、分 */
    private const HOUR_MINUTE_TYPE = [
        'Hour' => 0, // short
        'Minute' => 0, // short
    ];

    /** 時間帯・勤怠項目 */
    private const WORK_PTN_P_TIME_WK_TYPE = [
        'Cd' => '', // string
        'StartTime' => null, // Date
        'EndTime' => null, // Date
    ];

    /** 時間帯・割増対象 */
    private const WORK_PTN_P_TIME_EXT_TYPE = [
        'Cd' => '', // string
        'StartTime' => null, // Date
        'EndTime' => null, // Date
        'BreakTimePriority' => '', // string
    ];

    /** 時間帯・休憩時刻 */
    private const WORK_PTN_P_BRK_TYPE = [
        'StartTime' => null, // Date
        'EndTime' => null, // Date
    ];

    /** 時間数・勤怠項目 */
    private const WORK_PTN_N_TIME_WK_TYPE = [
        'Cd' => '', // string
        'DclsCd' => '', // string
        'StartNTime' => null, // TimeSpan(PHP化に伴いint化)
        'EndNTime' => null, // TimeSpan(PHP化に伴いint化)
        'StartPTime' => null, // Date
        'EndPTime' => null, // Date
    ];

    /** 残業項目端数処理 */
    private const FRC_OVTM_TYPE = [
        'Cd' => '', // string
        'UnderMi' => 0, // integer
        'FrcClsCd' => '', // string
    ];

    /** 割増対象端数処理 */
    private const FRC_EXT_TYPE = [
        'Cd' => '', // string
        'UnderMi' => 0, // integer
        'FrcClsCd' => '', // string
    ];

    /** 勤怠項目時間情報 */
    private const WORK_TIME_INFO = [
        'WorkTimeRange' => self::TIME_RANGE_TYPE, // 勤怠項目開始・終了時刻
        'BreakTime' => null,                      // 勤怠項目内総休憩時間 TimeSpan(PHP化に伴いint化)
        'OutTime' => null,                        // 勤怠項目内総外出時間 TimeSpan(PHP化に伴いint化)
    ];


    private $work;           // 処理対象の就業情報レコード
    private $work_ptn;       // 勤務体系情報レコード
    private $over_tm_lmt;    // 残業上限情報レコード
    private $fraction;       // 端数処理情報レコード
    private $reason;         // 事由情報レコード

    private $calc_proc_flg = self::CALCULATION_PROCESS_FLG_TYPE;   // 時間算出処理実行フラグ

    private $calc_time = self::CALCULATE_DATE_TIME_TYPE;           // 時間算出用時刻
    private $work_ptn_time = self::TIME_RANGE_TYPE;                // 勤務体系時刻

    // ※プログラム内で同じ項目の参照を多用するため、勤務体系情報の項目をcollectionに格納すること
    //   collectionに格納することでループ処理が効率的にできる
    private $work_ptn_p_time_wk_list = null;    // 勤務体系情報の 時間帯・勤怠項目CD & 時刻範囲collection
    private $work_ptn_p_time_ext_list = null;   // 勤務体系情報の 時間帯・割増対象CD & 時刻範囲collection
    private $work_ptn_p_brk_list = null;        // 勤務体系情報の 時間帯・休憩時刻範囲collection
    private $work_ptn_n_time_wk_list = null;    // 勤務体系情報の 時間数・職務種別CD & 勤怠項目CD & 時間範囲collection

    // ※プログラム内で同じ項目の参照を多用するため、端数処理情報の項目をcollectionに格納すること
    //   collectionに格納することでループ処理が効率的にできる
    private $frc_ovtm_list = null;              // 端数処理情報の 残業項目端数処理collection
    private $frc_ext_list = null;               // 端数処理情報の 割増対象端数処理collection

    private $work_time_info_list = null;        // 勤怠項目時間情報連想配列

    private $total_out_time_by_work = [];     // 勤怠項目別外出時間
    private $total_out_time_by_ext = [];      // 割増対象別外出時間

    private $mt01; // MT01ControlRepository
    private $mt94; // MT94WorkDescRepository

    /**
     * クラスの新しいインスタンスを初期化します。
     */
    public function __construct($work_row)
    {
        // 初期値設定
        $this->mt01 = new MT01ControlRepository;
        $this->mt94 = new MT94WorkDescRepository;

        // 編集対象の就業情報 取得
        $this->work = $work_row;

        // 勤務体系情報 取得
        $this->work_ptn = (new MT05WorkptnRepository())->getWorkPtnWithPrimaryKey($this->work->WORKPTN_CD);

        // 残業上限情報 取得
        $mt06 = new MT06OvertmLmtRepository();
        $mt10 = new MT10EmpRefRepository();
        $this->over_tm_lmt = $mt06->getWithPrimary($mt10->getEmp($this->work->EMP_CD)->CALENDAR_CD);
        if (is_null($this->over_tm_lmt)) {
            // 該当データが無ければ、"999"(共通)の残業上限情報を使用。
            $this->over_tm_lmt = $mt06->getWithPrimary('999');
        }

        // 端数処理情報 取得
        $mt07 = new MT07FractionRepository();
        $this->fraction = $mt07->getDataWithPrimaryKey($this->work->WORKPTN_CD);
        if (is_null($this->fraction)) {
            // 該当データが無ければ、"999"(共通)の端数処理情報を使用。
            $this->fraction = $mt07->getDataWithPrimaryKey('999');
        }

        // 事由情報 取得
        $this->reason = (new MT09ReasonRepository())->getWithPrimary($this->work->REASON_CD);

        // 残業項目端数処理リストの設定
        $this->setFrcOvtmList();

        // 割増項目端数処理リストの設定
        $this->setFrcExtList();

        // 時間算出用時刻初期値設定
        $this->initializeCalculateDateTime();

        // 勤務体系の開始、終了時刻の設定
        $this->setWorkPtnDateTime();

        // 勤務時間算出処理フラグ
        $this->calc_proc_flg['IsWorkTime'] = false;

        // 外出１時間算出処理フラグ
        $this->calc_proc_flg['IsOut1Time'] = false;

        // 外出２時間算出処理フラグ
        $this->calc_proc_flg['IsOut2Time'] = false;
    }

    /**
     * 就業情報の編集対象項目の初期化
     *
     * @return array
     */
    private function initializeWorkRow()
    {
        $this->work->WORK_TIME_HH = 0;       // 出勤時間
        $this->work->WORK_TIME_MI = 0;
        $this->work->TARD_TIME_HH = 0;       // 遅刻時間
        $this->work->TARD_TIME_MI = 0;
        $this->work->LEAVE_TIME_HH = 0;      // 早退時間
        $this->work->LEAVE_TIME_MI = 0;
        $this->work->OUT_TIME_HH = 0;        // 外出時間
        $this->work->OUT_TIME_MI = 0;
        $this->work->OVTM1_TIME_HH = 0;      // 残業時間
        $this->work->OVTM1_TIME_MI = 0;
        $this->work->OVTM2_TIME_HH = 0;
        $this->work->OVTM2_TIME_MI = 0;
        $this->work->OVTM3_TIME_HH = 0;
        $this->work->OVTM3_TIME_MI = 0;
        $this->work->OVTM4_TIME_HH = 0;
        $this->work->OVTM4_TIME_MI = 0;
        $this->work->OVTM5_TIME_HH = 0;
        $this->work->OVTM5_TIME_MI = 0;
        $this->work->OVTM6_TIME_HH = 0;
        $this->work->OVTM6_TIME_MI = 0;
        $this->work->EXT1_TIME_HH = 0;       // 割増時間
        $this->work->EXT1_TIME_MI = 0;
        $this->work->EXT2_TIME_HH = 0;
        $this->work->EXT2_TIME_MI = 0;
        $this->work->EXT3_TIME_HH = 0;
        $this->work->EXT3_TIME_MI = 0;
        $this->work->RSV1_TIME_HH = 0;       // 休憩時間
        $this->work->RSV1_TIME_MI = 0;
        $this->work->WORKDAY_CNT = 0;        // 出勤日数
        $this->work->HOLWORK_CNT = 0;        // 休出日数
        $this->work->SPCHOL_CNT = 0;         // 特休日数
        $this->work->PADHOL_CNT = 0;         // 有休日数
        $this->work->ABCWORK_CNT = 0;        // 欠勤日数
        $this->work->COMPDAY_CNT = 0;        // 代休日数
        $this->work->SUBHOL_CNT = 0;         // 振休日数
        $this->work->SUBWORK_CNT = 0;        // 振出日数
        $this->work->RSV1_CNT = 0;           // 無特日数

        //  未使用項目
        // ,'OVTM7_TIME_HH' => 0
        // ,'OVTM7_TIME_MI' => 0
        // ,'OVTM8_TIME_HH' => 0
        // ,'OVTM8_TIME_MI' => 0
        // ,'OVTM9_TIME_HH' => 0
        // ,'OVTM9_TIME_MI' => 0
        // ,'OVTM10_TIME_HH' => 0
        // ,'OVTM10_TIME_MI' => 0
        // ,'EXT4_TIME_HH' => 0
        // ,'EXT4_TIME_MI' => 0
        // ,'EXT5_TIME_HH' => 0
        // ,'EXT5_TIME_MI' => 0
        // ,'RSV2_TIME_HH' => 0
        // ,'RSV2_TIME_MI' => 0
        // ,'RSV3_TIME_HH' => 0
        // ,'RSV3_TIME_MI' => 0
        // ,'RSV2_CNT' => 0
        // ,'RSV3_CNT' => 0
        return ;
    }

    /**
     * 就業情報の各日数項目の初期化
     * 日数計算処理を単体で呼び出すために作成。
     *
     * @return array
     */
    private function initializeDayCountFieldInWorkRow()
    {
        $this->work->WORKDAY_CNT = 0;        // 出勤日数
        $this->work->HOLWORK_CNT = 0;        // 休出日数
        $this->work->SPCHOL_CNT = 0;         // 特休日数
        $this->work->PADHOL_CNT = 0;         // 有休日数
        $this->work->ABCWORK_CNT = 0;        // 欠勤日数
        $this->work->COMPDAY_CNT = 0;        // 代休日数
        $this->work->SUBHOL_CNT = 0;         // 振休日数
        $this->work->SUBWORK_CNT = 0;        // 振出日数
        $this->work->RSV1_CNT = 0;           // 無特日数
        return ;
    }

    /**
     * 時間算出用時刻変数[calc_time]に初期値の設定を行います。
     *
     * @return void
     */
    private function initializeCalculateDateTime()
    {
        // カレンダー日付 + 時間 + 分 を連結し日付型にして、計算用時刻を生成
        $this->calc_time = [
            'OFC' => null,
            'LEV' => null,
            'OUT1' => null,
            'IN1' => null,
            'OUT2' => null,
            'IN2' => null
        ];

        // 出勤時刻
        if (!is_nullorwhitespace($this->work->OFC_TIME_HH) && !is_nullorwhitespace($this->work->OFC_TIME_MI)) {
            $this->calc_time['OFC'] = UtilCommon::combineDateTime(
                $this->work->CALD_DATE,
                $this->work->OFC_TIME_HH,
                $this->work->OFC_TIME_MI
            );
        }

        // 退出時刻
        if (!is_nullorwhitespace($this->work->LEV_TIME_HH) && !is_nullorwhitespace($this->work->LEV_TIME_MI)) {
            $this->calc_time['LEV'] = UtilCommon::combineDateTime(
                $this->work->CALD_DATE,
                $this->work->LEV_TIME_HH,
                $this->work->LEV_TIME_MI
            );
        }

        // 外出１時刻
        if (!is_nullorwhitespace($this->work->OUT1_TIME_HH) && !is_nullorwhitespace($this->work->OUT1_TIME_MI)) {
            $this->calc_time['OUT1'] = UtilCommon::combineDateTime(
                $this->work->CALD_DATE,
                $this->work->OUT1_TIME_HH,
                $this->work->OUT1_TIME_MI
            );
        }

        // 再入１時刻
        if (!is_nullorwhitespace($this->work->IN1_TIME_HH) && !is_nullorwhitespace($this->work->IN1_TIME_MI)) {
            $this->calc_time['IN1'] = UtilCommon::combineDateTime(
                $this->work->CALD_DATE,
                $this->work->IN1_TIME_HH,
                $this->work->IN1_TIME_MI
            );
        }

        // 外出２時刻
        if (!is_nullorwhitespace($this->work->OUT2_TIME_HH) && !is_nullorwhitespace($this->work->OUT2_TIME_MI)) {
            $this->calc_time['OUT2'] = UtilCommon::combineDateTime(
                $this->work->CALD_DATE,
                $this->work->OUT2_TIME_HH,
                $this->work->OUT2_TIME_MI
            );
        }

        // 再入２時刻
        if (!is_nullorwhitespace($this->work->IN2_TIME_HH) && !is_nullorwhitespace($this->work->IN2_TIME_MI)) {
            $this->calc_time['IN2'] = UtilCommon::combineDateTime(
                $this->work->CALD_DATE,
                $this->work->IN2_TIME_HH,
                $this->work->IN2_TIME_MI
            );
        }

        // 端数処理情報.出退勤端数処理区分="01"(時刻)のときのみ、端数処理を行う
        if ($this->fraction->FRACTION_CLS_CD === "01") {
            // 出勤時刻 端数処理
            if ($this->calc_time['OFC'] != null && !is_null($this->fraction->WTTM_UNDER_MI)) {
                $this->calc_time['OFC'] = $this->calcFractionTime(
                    $this->calc_time['OFC'],
                    $this->fraction->WTTM_UNDER_MI,
                    $this->fraction->WTTM_FRC_CLS_CD
                );
            }

            // 退出時刻 端数処理
            if ($this->calc_time['LEV'] != null && !is_null($this->fraction->LVTM_UNDER_MI)) {
                $this->calc_time['LEV'] = $this->calcFractionTime(
                    $this->calc_time['LEV'],
                    $this->fraction->LVTM_UNDER_MI,
                    $this->fraction->LVTM_FRC_CLS_CD
                );
            }

            // 外出１時刻 端数処理
            if ($this->calc_time['OUT1'] != null && !is_null($this->fraction->OTTM_UNDER_MI)) {
                $this->calc_time['OUT1'] = $this->calcFractionTime(
                    $this->calc_time['OUT1'],
                    $this->fraction->OTTM_UNDER_MI,
                    $this->fraction->OTTM_FRC_CLS_CD
                );
            }

            // 再入１時刻 端数処理
            if ($this->calc_time['IN1'] != null && !is_null($this->fraction->RETM_UNDER_MI)) {
                $this->calc_time['IN1'] = $this->calcFractionTime(
                    $this->calc_time['IN1'],
                    $this->fraction->RETM_UNDER_MI,
                    $this->fraction->RETM_FRC_CLS_CD
                );
            }

            // 外出２勤時刻 端数処理
            if ($this->calc_time['OUT2'] != null && !is_null($this->fraction->OTTM_UNDER_MI)) {
                $this->calc_time['OUT2'] = $this->calcFractionTime(
                    $this->calc_time['OUT2'],
                    $this->fraction->OTTM_UNDER_MI,
                    $this->fraction->OTTM_FRC_CLS_CD
                );
            }

            // 再入２時刻 端数処理
            if ($this->calc_time['IN2'] != null && !is_null($this->fraction->RETM_UNDER_MI)) {
                $this->calc_time['IN2'] = $this->calcFractionTime(
                    $this->calc_time['IN2'],
                    $this->fraction->RETM_UNDER_MI,
                    $this->fraction->RETM_FRC_CLS_CD
                );
            }
        }

        return ;
    }

    /**
     *  端数処理情報の残業項目１～６の残業項目コード/分未満/端数処理区分コードを[FrcOvtmList](残業項目端数処理リスト)に設定します。
     */
    private function setFrcOvtmList()
    {
        // 残業項目端数処理リスト 初期化
        $this->frc_ovtm_list = collect();

        // 残業項目１
        if (!is_null($this->fraction->OVTM1_UNDER_MI)) {
            $frc_ovtm = self::FRC_OVTM_TYPE;
            // 残業項目１コード
            $frc_ovtm['Cd'] = $this->fraction->OVTM1_CD;
            // 残業項目１分未満
            $frc_ovtm['UnderMi'] = $this->fraction->OVTM1_UNDER_MI;
            // 残業項目１端数処理区分コード
            $frc_ovtm['FrcClsCd'] = $this->fraction->OVTM1_FRC_CLS_CD;
            // 残業項目端数処理リストに残業項目１のデータを追加
            $this->frc_ovtm_list->push($frc_ovtm);
        }

        // 残業項目２
        if (!is_null($this->fraction->OVTM2_UNDER_MI)) {
            $frc_ovtm = self::FRC_OVTM_TYPE;
            $frc_ovtm['Cd'] = $this->fraction->OVTM2_CD;
            $frc_ovtm['UnderMi'] = $this->fraction->OVTM2_UNDER_MI;
            $frc_ovtm['FrcClsCd'] = $this->fraction->OVTM2_FRC_CLS_CD;
            $this->frc_ovtm_list->push($frc_ovtm);
        }

        // 残業項目３
        if (!is_null($this->fraction->OVTM3_UNDER_MI)) {
            $frc_ovtm = self::FRC_OVTM_TYPE;
            $frc_ovtm['Cd'] = $this->fraction->OVTM3_CD;
            $frc_ovtm['UnderMi'] = $this->fraction->OVTM3_UNDER_MI;
            $frc_ovtm['FrcClsCd'] = $this->fraction->OVTM3_FRC_CLS_CD;
            $this->frc_ovtm_list->push($frc_ovtm);
        }

        // 残業項目４
        if (!is_null($this->fraction->OVTM4_UNDER_MI)) {
            $frc_ovtm = self::FRC_OVTM_TYPE;
            $frc_ovtm['Cd'] = $this->fraction->OVTM4_CD;
            $frc_ovtm['UnderMi'] = $this->fraction->OVTM4_UNDER_MI;
            $frc_ovtm['FrcClsCd'] = $this->fraction->OVTM4_FRC_CLS_CD;
            $this->frc_ovtm_list->push($frc_ovtm);
        }

        // 残業項目５
        if (!is_null($this->fraction->OVTM5_UNDER_MI)) {
            $frc_ovtm = self::FRC_OVTM_TYPE;
            $frc_ovtm['Cd'] = $this->fraction->OVTM5_CD;
            $frc_ovtm['UnderMi'] = $this->fraction->OVTM5_UNDER_MI;
            $frc_ovtm['FrcClsCd'] = $this->fraction->OVTM5_FRC_CLS_CD;
            $this->frc_ovtm_list->push($frc_ovtm);
        }

        // 残業項目６
        if (!is_null($this->fraction->OVTM6_UNDER_MI)) {
            $frc_ovtm = self::FRC_OVTM_TYPE;
            $frc_ovtm['Cd'] = $this->fraction->OVTM6_CD;
            $frc_ovtm['UnderMi'] = $this->fraction->OVTM6_UNDER_MI;
            $frc_ovtm['FrcClsCd'] = $this->fraction->OVTM6_FRC_CLS_CD;
            $this->frc_ovtm_list->push($frc_ovtm);
        }
    }

    /**
     *  端数処理情報の割増対象１～３の割増対象コード/分未満/端数処理区分コードを[FrcExtList](割増対象端数処理リスト)に設定します。
     */
    private function setFrcExtList()
    {
        $frc_ext = self::FRC_EXT_TYPE;

        // 割増対象端数処理リスト 初期化
        $this->frc_ext_list = collect();

        // 割増対象１
        if (!is_null($this->fraction->EXT1_UNDER_MI)) {
            // 割増対象１コード
            $frc_ext['Cd'] = $this->fraction->EXT1_CD;
            // 割増対象１分未満
            $frc_ext['UnderMi'] = $this->fraction->EXT1_UNDER_MI;
            // 割増対象１端数処理区分コード
            $frc_ext['FrcClsCd'] = $this->fraction->EXT1_FRC_CLS_CD;
            // 割増対象端数処理リストに割増対象１のデータを追加
            $this->frc_ext_list->push($frc_ext);
        }

        // 割増対象２
        if (!is_null($this->fraction->EXT2_UNDER_MI)) {
            $frc_ext['Cd'] = $this->fraction->EXT2_CD;
            $frc_ext['UnderMi'] = $this->fraction->EXT2_UNDER_MI;
            $frc_ext['FrcClsCd'] = $this->fraction->EXT2_FRC_CLS_CD;
            $this->frc_ext_list->push($frc_ext);
        }

        // 割増対象３
        if (!is_null($this->fraction->EXT3_UNDER_MI)) {
            $frc_ext['Cd'] = $this->fraction->EXT3_CD;
            $frc_ext['UnderMi'] = $this->fraction->EXT3_UNDER_MI;
            $frc_ext['FrcClsCd'] = $this->fraction->EXT3_FRC_CLS_CD;
            $this->frc_ext_list->push($frc_ext);
        }
    }

    /**
     *  勤務体系の各種開始、終了時刻の設定を行います。
     *  ・WorkPtnPTimeWkList  (時間帯・勤怠項目リスト)
     *  ・WorkPtnPTimeExtList (時間帯・割増対象リスト)
     *  ・WorkPtnPBrkList     (休憩時間帯・休憩時間リスト)
     *  ・work_ptn_n_time_wk_list  (時間数・勤怠項目リスト)
     *  ・WorkPtnTime         (勤務体系時刻)
     *  上記、変数の初期化処理を行います。
     *
     *  ※① LINQを使用し時間帯・勤怠項目リストの開始時刻を昇順で並べ替えて、先頭にきたリストの開始時刻を設定
     *  ※② LINQを使用し時間帯・勤怠項目リストの終了時刻を降順で並べ替えて、先頭にきたリストの終了時刻を設定
     *  ※③ 勤務体系の時間数・始業開始時刻に値が設定されていなければ、就業情報の適用開始時間を開始時間とする。
     *  ※④ 勤務体系の時間数・始業開始時刻に値が設定されていれば、その時刻を開始時間とする。
     */
    private function setWorkPtnDateTime()
    {

        // 時間帯・勤怠項目リスト作成
        $this->setWorkPtnPTimeWkList();

        // 時間帯・割増対象リスト作成
        $this->setWorkPtnPTimeExtList();

        // 休憩時間帯・休憩時間リスト作成
        $this->setWorkPtnPBrkList();

        // 時間数・勤怠項目リスト作成
        $this->setWorkPtnNTimeWkList();

        if ($this->work_ptn->DUTY_CLS_CD == "00") {       // 職務種別:時間帯
            // 勤務体系の開始時刻の設定 ※①
            $first_p_time_wk = $this->work_ptn_p_time_wk_list->sortBy('StartTime')->first();
            $this->work_ptn_time['START'] = $first_p_time_wk['StartTime'];

            // 勤務体系の終了時刻の設定 ※②
            $first_p_time_wk = $this->work_ptn_p_time_wk_list->sortByDesc('EndTime')->first();
            $this->work_ptn_time['END'] = $first_p_time_wk['EndTime'];
        } elseif ($this->work_ptn->DUTY_CLS_CD == "01") {   // 職務種別:時間数
            // 勤務体系の開始時刻の設定
            if (is_null($this->work_ptn->NTIME_START_HH) || is_null($this->work_ptn->NTIME_START_MI)) {
                $this->work_ptn_time['START'] = $this->work->WORKPTN_STR_TIME;     // ※③
            } else {
                // ※④
                $this->work_ptn_time['START'] = UtilCommon::combineDateTime(
                    $this->work->CALD_DATE,
                    $this->work_ptn->NTIME_START_HH,
                    $this->work_ptn->NTIME_START_MI
                );
            }

            // 勤務体系の終了時刻に終了情報の適用終了時間を設定
            $this->work_ptn_time['END'] = $this->work->WORKPTN_END_TIME;
        }
    }

    /**
     *  勤務体系情報の時間帯・勤怠項目１～７の勤怠項目コード/開始時刻/終了時刻を[WorkPtnPTimeWkList](時間帯・勤怠項目リスト)に設定します。
     *  格納する勤怠項目コードがNullの場合はリストに格納しません。
     *  開始時刻は処理対象の[就業情報.カレンダー日付]+[勤務体系情報.時間帯・勤怠項目開始時間]+[勤務体系情報.時間帯・勤怠項目開始分]を連結し日付型として登録。
     *  終了時刻も開始時刻と同様。
     *
     *  勤務体系情報の時間帯・勤怠項目１～７をリストに格納する理由はプログラム内で勤怠項目１～７の参照を多用するため、
     *  リストに格納することでループ処理ができ効率的に処理ができるから
     *
     *  ※① 対象となる勤怠項目コードの勤怠項目区分が"00:就業時間"で、就業情報の事由が"03:前休"、"06:前代"、"17:振後"、"19:前振"のときは開始時刻に勤務体系情報の後半開始時刻を設定
     *  ※② 対象となる勤怠項目コードの勤怠項目区分が"00:就業時間"で、就業情報の事由が"04:後休"、"07:後代"、"16:振前"、"20:後振"のときは終了時刻に勤務体系情報の前半終了時刻を設定
     */
    private function setWorkPtnPTimeWkList()
    {
        // 勤務体系情報の時間帯・勤怠項目リスト 初期化
        $this->work_ptn_p_time_wk_list = collect();

        // 職務種別が"00"(時間帯)でない場合は処理を抜ける
        if (!$this->work_ptn->DUTY_CLS_CD == "00") {
            return ;
        }

        $use_scd_prd_start_time = false;        // 後半開始時間使用判定フラグ
        $use_fst_prd_end_time = false;          // 前半終了時間使用判定フラグ

        // 事由が前休、前代、振後、前振の場合
        if ($this->work->REASON_CD == "03"
                || $this->work->REASON_CD == "06"
                || $this->work->REASON_CD == "17"
                || $this->work->REASON_CD == "19") {
            $use_scd_prd_start_time = true;
        }

        // 事由が後休、後代、振前、後振の場合
        if ($this->work->REASON_CD == "04"
                || $this->work->REASON_CD == "07"
                || $this->work->REASON_CD == "16"
                || $this->work->REASON_CD == "20") {
            $use_fst_prd_end_time = true;
        }

        // 時間帯・勤怠項目１
        if (!is_null($this->work_ptn->PTIME_WK1_CD)) {
            $p_time_wk = self::WORK_PTN_P_TIME_WK_TYPE;  // 時間帯・勤怠項目
            // 勤怠項目コード設定
            $p_time_wk['Cd'] = $this->work_ptn->PTIME_WK1_CD;

            // 開始時刻設定
            if ($this->mt94->isRegularWork($this->work_ptn->PTIME_WK1_CD) && $use_scd_prd_start_time) {  // ※①
                $p_time_wk['StartTime'] = UtilCommon::combineDateTime(
                    $this->work->CALD_DATE,
                    $this->work_ptn->PTIME_SCDPRD_STR_HH,
                    $this->work_ptn->PTIME_SCDPRD_STR_MI
                );
            } else {
                $p_time_wk['StartTime'] = UtilCommon::combineDateTime(
                    $this->work->CALD_DATE,
                    $this->work_ptn->PTIME_WK1_STR_HH,
                    $this->work_ptn->PTIME_WK1_STR_MI
                );
            }

            // 終了時刻設定
            if ($this->mt94->isRegularWork($this->work_ptn->PTIME_WK1_CD) && $use_fst_prd_end_time) {    // ※②
                $p_time_wk['EndTime'] = UtilCommon::combineDateTime(
                    $this->work->CALD_DATE,
                    $this->work_ptn->PTIME_FSTPRD_END_HH,
                    $this->work_ptn->PTIME_FSTPRD_END_MI
                );
            } else {
                $p_time_wk['EndTime'] = UtilCommon::combineDateTime(
                    $this->work->CALD_DATE,
                    $this->work_ptn->PTIME_WK1_END_HH,
                    $this->work_ptn->PTIME_WK1_END_MI
                );
            }

            // 時間帯・勤怠項目リストに勤怠項目１のデータを追加
            $this->work_ptn_p_time_wk_list->push($p_time_wk);
        }

        // 時間帯・勤怠項目２
        if (!is_null($this->work_ptn->PTIME_WK2_CD)) {
            $p_time_wk = self::WORK_PTN_P_TIME_WK_TYPE;  // 時間帯・勤怠項目
            $p_time_wk['Cd'] = $this->work_ptn->PTIME_WK2_CD;

            if ($this->mt94->isRegularWork($this->work_ptn->PTIME_WK2_CD) && $use_scd_prd_start_time) {
                $p_time_wk['StartTime'] = UtilCommon::combineDateTime(
                    $this->work->CALD_DATE,
                    $this->work_ptn->PTIME_SCDPRD_STR_HH,
                    $this->work_ptn->PTIME_SCDPRD_STR_MI
                );
            } else {
                $p_time_wk['StartTime'] = UtilCommon::combineDateTime(
                    $this->work->CALD_DATE,
                    $this->work_ptn->PTIME_WK2_STR_HH,
                    $this->work_ptn->PTIME_WK2_STR_MI
                );
            }

            if ($this->mt94->isRegularWork($this->work_ptn->PTIME_WK2_CD) && $use_fst_prd_end_time) {
                $p_time_wk['EndTime'] = UtilCommon::combineDateTime(
                    $this->work->CALD_DATE,
                    $this->work_ptn->PTIME_FSTPRD_END_HH,
                    $this->work_ptn->PTIME_FSTPRD_END_MI
                );
            } else {
                $p_time_wk['EndTime'] = UtilCommon::combineDateTime(
                    $this->work->CALD_DATE,
                    $this->work_ptn->PTIME_WK2_END_HH,
                    $this->work_ptn->PTIME_WK2_END_MI
                );
            }

            $this->work_ptn_p_time_wk_list->push($p_time_wk);
        }

        // 時間帯・勤怠項目３
        if (!is_null($this->work_ptn->PTIME_WK3_CD)) {
            $p_time_wk = self::WORK_PTN_P_TIME_WK_TYPE;  // 時間帯・勤怠項目
            $p_time_wk['Cd'] = $this->work_ptn->PTIME_WK3_CD;

            if ($this->mt94->isRegularWork($this->work_ptn->PTIME_WK3_CD) && $use_scd_prd_start_time) {
                $p_time_wk['StartTime'] = UtilCommon::combineDateTime(
                    $this->work->CALD_DATE,
                    $this->work_ptn->PTIME_SCDPRD_STR_HH,
                    $this->work_ptn->PTIME_SCDPRD_STR_MI
                );
            } else {
                $p_time_wk['StartTime'] = UtilCommon::combineDateTime(
                    $this->work->CALD_DATE,
                    $this->work_ptn->PTIME_WK3_STR_HH,
                    $this->work_ptn->PTIME_WK3_STR_MI
                );
            }

            if ($this->mt94->isRegularWork($this->work_ptn->PTIME_WK3_CD) && $use_fst_prd_end_time) {
                $p_time_wk['EndTime'] = UtilCommon::combineDateTime(
                    $this->work->CALD_DATE,
                    $this->work_ptn->PTIME_FSTPRD_END_HH,
                    $this->work_ptn->PTIME_FSTPRD_END_MI
                );
            } else {
                $p_time_wk['EndTime'] = UtilCommon::combineDateTime(
                    $this->work->CALD_DATE,
                    $this->work_ptn->PTIME_WK3_END_HH,
                    $this->work_ptn->PTIME_WK3_END_MI
                );
            }

            $this->work_ptn_p_time_wk_list->push($p_time_wk);
        }

        // 時間帯・勤怠項目４
        if (!is_null($this->work_ptn->PTIME_WK4_CD)) {
            $p_time_wk = self::WORK_PTN_P_TIME_WK_TYPE;  // 時間帯・勤怠項目
            $p_time_wk['Cd'] = $this->work_ptn->PTIME_WK4_CD;

            if ($this->mt94->isRegularWork($this->work_ptn->PTIME_WK4_CD) && $use_scd_prd_start_time) {
                $p_time_wk['StartTime'] = UtilCommon::combineDateTime(
                    $this->work->CALD_DATE,
                    $this->work_ptn->PTIME_SCDPRD_STR_HH,
                    $this->work_ptn->PTIME_SCDPRD_STR_MI
                );
            } else {
                $p_time_wk['StartTime'] = UtilCommon::combineDateTime(
                    $this->work->CALD_DATE,
                    $this->work_ptn->PTIME_WK4_STR_HH,
                    $this->work_ptn->PTIME_WK4_STR_MI
                );
            }

            if ($this->mt94->isRegularWork($this->work_ptn->PTIME_WK4_CD) && $use_fst_prd_end_time) {
                $p_time_wk['EndTime'] = UtilCommon::combineDateTime(
                    $this->work->CALD_DATE,
                    $this->work_ptn->PTIME_FSTPRD_END_HH,
                    $this->work_ptn->PTIME_FSTPRD_END_MI
                );
            } else {
                $p_time_wk['EndTime'] = UtilCommon::combineDateTime(
                    $this->work->CALD_DATE,
                    $this->work_ptn->PTIME_WK4_END_HH,
                    $this->work_ptn->PTIME_WK4_END_MI
                );
            }

            $this->work_ptn_p_time_wk_list->push($p_time_wk);
        }

        // 時間帯・勤怠項目５
        if (!is_null($this->work_ptn->PTIME_WK5_CD)) {
            $p_time_wk = self::WORK_PTN_P_TIME_WK_TYPE;  // 時間帯・勤怠項目
            $p_time_wk['Cd'] = $this->work_ptn->PTIME_WK5_CD;

            if ($this->mt94->isRegularWork($this->work_ptn->PTIME_WK5_CD) && $use_scd_prd_start_time) {
                $p_time_wk['StartTime'] = UtilCommon::combineDateTime(
                    $this->work->CALD_DATE,
                    $this->work_ptn->PTIME_SCDPRD_STR_HH,
                    $this->work_ptn->PTIME_SCDPRD_STR_MI
                );
            } else {
                $p_time_wk['StartTime'] = UtilCommon::combineDateTime(
                    $this->work->CALD_DATE,
                    $this->work_ptn->PTIME_WK5_STR_HH,
                    $this->work_ptn->PTIME_WK5_STR_MI
                );
            }

            if ($this->mt94->isRegularWork($this->work_ptn->PTIME_WK5_CD) && $use_fst_prd_end_time) {
                $p_time_wk['EndTime'] = UtilCommon::combineDateTime(
                    $this->work->CALD_DATE,
                    $this->work_ptn->PTIME_FSTPRD_END_HH,
                    $this->work_ptn->PTIME_FSTPRD_END_MI
                );
            } else {
                $p_time_wk['EndTime'] = UtilCommon::combineDateTime(
                    $this->work->CALD_DATE,
                    $this->work_ptn->PTIME_WK5_END_HH,
                    $this->work_ptn->PTIME_WK5_END_MI
                );
            }

            $this->work_ptn_p_time_wk_list->push($p_time_wk);
        }

        // 時間帯・勤怠項目６
        if (!is_null($this->work_ptn->PTIME_WK6_CD)) {
            $p_time_wk = self::WORK_PTN_P_TIME_WK_TYPE;  // 時間帯・勤怠項目
            $p_time_wk['Cd'] = $this->work_ptn->PTIME_WK6_CD;

            if ($this->mt94->isRegularWork($this->work_ptn->PTIME_WK6_CD) && $use_scd_prd_start_time) {
                $p_time_wk['StartTime'] = UtilCommon::combineDateTime(
                    $this->work->CALD_DATE,
                    $this->work_ptn->PTIME_SCDPRD_STR_HH,
                    $this->work_ptn->PTIME_SCDPRD_STR_MI
                );
            } else {
                $p_time_wk['StartTime'] = UtilCommon::combineDateTime(
                    $this->work->CALD_DATE,
                    $this->work_ptn->PTIME_WK6_STR_HH,
                    $this->work_ptn->PTIME_WK6_STR_MI
                );
            }

            if ($this->mt94->isRegularWork($this->work_ptn->PTIME_WK6_CD) && $use_fst_prd_end_time) {
                $p_time_wk['EndTime'] = UtilCommon::combineDateTime(
                    $this->work->CALD_DATE,
                    $this->work_ptn->PTIME_FSTPRD_END_HH,
                    $this->work_ptn->PTIME_FSTPRD_END_MI
                );
            } else {
                $p_time_wk['EndTime'] = UtilCommon::combineDateTime(
                    $this->work->CALD_DATE,
                    $this->work_ptn->PTIME_WK6_END_HH,
                    $this->work_ptn->PTIME_WK6_END_MI
                );
            }

            $this->work_ptn_p_time_wk_list->push($p_time_wk);
        }

        // 時間帯・勤怠項目７
        if (!is_null($this->work_ptn->PTIME_WK7_CD)) {
            $p_time_wk = self::WORK_PTN_P_TIME_WK_TYPE;  // 時間帯・勤怠項目
            $p_time_wk['Cd'] = $this->work_ptn->PTIME_WK7_CD;

            if ($this->mt94->isRegularWork($this->work_ptn->PTIME_WK7_CD) && $use_scd_prd_start_time) {
                $p_time_wk['StartTime'] = UtilCommon::combineDateTime(
                    $this->work->CALD_DATE,
                    $this->work_ptn->PTIME_SCDPRD_STR_HH,
                    $this->work_ptn->PTIME_SCDPRD_STR_MI
                );
            } else {
                $p_time_wk['StartTime'] = UtilCommon::combineDateTime(
                    $this->work->CALD_DATE,
                    $this->work_ptn->PTIME_WK7_STR_HH,
                    $this->work_ptn->PTIME_WK7_STR_MI
                );
            }

            if ($this->mt94->isRegularWork($this->work_ptn->PTIME_WK7_CD) && $use_fst_prd_end_time) {
                $p_time_wk['EndTime'] = UtilCommon::combineDateTime(
                    $this->work->CALD_DATE,
                    $this->work_ptn->PTIME_FSTPRD_END_HH,
                    $this->work_ptn->PTIME_FSTPRD_END_MI
                );
            } else {
                $p_time_wk['EndTime'] = UtilCommon::combineDateTime(
                    $this->work->CALD_DATE,
                    $this->work_ptn->PTIME_WK7_END_HH,
                    $this->work_ptn->PTIME_WK7_END_MI
                );
            }

            $this->work_ptn_p_time_wk_list->push($p_time_wk);
        }
    }

    /**
     *  勤務体系情報の時間帯・割増対象１～３の割増対象コード/開始時刻/終了時刻を[WorkPtnPTimeExtList](時間帯・割増対象リスト)に設定します。
     *  格納する割増対象コードがNullの場合はリストに格納しません。
     *  開始時刻は処理対象の[就業情報.カレンダー日付]+[勤務体系情報.時間帯・割増対象開始時間]+[勤務体系情報.時間帯・割増対象開始分]を連結し日付型として登録。
     *  終了時刻も開始時刻と同様。
     *
     *  勤務体系情報の時間帯・割増対象１～３をリストに格納する理由はプログラム内で割増対象１～３の参照を多用するため、
     *  リストに格納することでループ処理ができ効率的に処理ができるから
     *  勤務体系情報入力で割増時間帯が、職務種別にかかわらず設定できるように仕様変更。
     *  （変更前は職務種別が"00"(時間数)のときのみ割増時間の設定ができ、"01"(時間数)のときは設定できなかった）
     *
     *  職務種別"00"(時間帯)：割増対象時刻範囲は、事由により開始・終了時刻が変動する。
     *  職務種別"01"(時間数)：割増対象時刻範囲は、マスタに登録された値をそのまま使用する。
     *  </history>
     *  WorkPtnPTimeExtTypeのBreakTimePriority(休憩時間優先順序)へMT94_WORK_DESC.RSV1_CLS_CDを登録。
     *  </history>
     *  後半開始時刻を使用する事由に"17:振後"、"19:前振"を追加。
     *  前半終了時刻を使用する事由に"16:振前"、"20:後振"を追加。
     *  </history>
     */
    private function setWorkPtnPTimeExtList()
    {

        // 勤務体系情報の時間帯・割増対象リスト 初期化
        $this->work_ptn_p_time_ext_list = collect();

        foreach ([1, 2, 3] as $i) {
            // 時間帯割増対象
            $p_time_ext = self::WORK_PTN_P_TIME_EXT_TYPE;
            switch ($i) {
                case 1:
                    // 時間帯・割増対象１
                    if (is_null($this->work_ptn->PTIME_EXT1_CD)) {
                        continue 2;
                    } else {
                        // 割増対象１コード
                        $p_time_ext['Cd'] = $this->work_ptn->PTIME_EXT1_CD;
                        // 割増対象１開始時刻
                        $p_time_ext['StartTime'] = UtilCommon::combineDateTime(
                            $this->work->CALD_DATE,
                            $this->work_ptn->PTIME_EXT1_STR_HH,
                            $this->work_ptn->PTIME_EXT1_STR_MI
                        );
                        // 割増対象１終了時刻
                        $p_time_ext['EndTime'] = UtilCommon::combineDateTime(
                            $this->work->CALD_DATE,
                            $this->work_ptn->PTIME_EXT1_END_HH,
                            $this->work_ptn->PTIME_EXT1_END_MI
                        );
                        // 休憩時間優先順序
                        $p_time_ext['BreakTimePriority'] = $this->mt94->getBreakTimePriority(
                            $this->work_ptn->PTIME_EXT1_CD
                        );
                    }
                    break;

                case 2:
                    // 時間帯・割増対象２
                    if (is_null($this->work_ptn->PTIME_EXT2_CD)) {
                        continue 2;
                    } else {
                        $p_time_ext['Cd'] = $this->work_ptn->PTIME_EXT2_CD;
                        $p_time_ext['StartTime'] = UtilCommon::combineDateTime(
                            $this->work->CALD_DATE,
                            $this->work_ptn->PTIME_EXT2_STR_HH,
                            $this->work_ptn->PTIME_EXT2_STR_MI
                        );
                        $p_time_ext['EndTime'] = UtilCommon::combineDateTime(
                            $this->work->CALD_DATE,
                            $this->work_ptn->PTIME_EXT2_END_HH,
                            $this->work_ptn->PTIME_EXT2_END_MI
                        );
                        $p_time_ext['BreakTimePriority'] = $this->mt94->getBreakTimePriority(
                            $this->work_ptn->PTIME_EXT2_CD
                        );
                    }
                    break;

                case 3:
                    // 時間帯・割増対象３
                    if (is_null($this->work_ptn->PTIME_EXT3_CD)) {
                        continue 2;
                    } else {
                        $p_time_ext['Cd'] = $this->work_ptn->PTIME_EXT3_CD;
                        $p_time_ext['StartTime'] = UtilCommon::combineDateTime(
                            $this->work->CALD_DATE,
                            $this->work_ptn->PTIME_EXT3_STR_HH,
                            $this->work_ptn->PTIME_EXT3_STR_MI
                        );
                        $p_time_ext['EndTime'] = UtilCommon::combineDateTime(
                            $this->work->CALD_DATE,
                            $this->work_ptn->PTIME_EXT3_END_HH,
                            $this->work_ptn->PTIME_EXT3_END_MI
                        );
                        $p_time_ext['BreakTimePriority'] = $this->mt94->getBreakTimePriority(
                            $this->work_ptn->PTIME_EXT3_CD
                        );
                    }
            }

            // 時間帯・割増対象リストに割増対象のデータを追加
            $this->work_ptn_p_time_ext_list->push($p_time_ext);
        }

        // 職務種別が"00"(時間帯)でない場合は処理を抜ける
        if ($this->work_ptn->DUTY_CLS_CD != "00") {
            return ;
        }

        $use_scd_prd_start_time = false; // 後半開始時間使用判定フラグ
        $use_fst_prd_end_time = false;  // 前半終了時間使用判定フラグ
        $scd_prd_start_time = null;           // 後半開始時間
        $fst_prd_end_time = null;             // 前半終了時間


        // 事由が前休、前代の場合
        if ($this->work->REASON_CD == "03"
                || $this->work->REASON_CD == "06"
                || $this->work->REASON_CD == "17"
                || $this->work->REASON_CD == "19") {
            $use_scd_prd_start_time = true;
            $scd_prd_start_time = UtilCommon::combineDateTime(
                $this->work->CALD_DATE,
                $this->work_ptn->PTIME_SCDPRD_STR_HH,
                $this->work_ptn->PTIME_SCDPRD_STR_MI
            );
        }

        // 事由が後休、後代の場合
        if ($this->work->REASON_CD == "04"
                || $this->work->REASON_CD == "07"
                || $this->work->REASON_CD == "16"
                || $this->work->REASON_CD == "20") {
            $use_fst_prd_end_time = true;
            $fst_prd_end_time = UtilCommon::combineDateTime(
                $this->work->CALD_DATE,
                $this->work_ptn->PTIME_FSTPRD_END_HH,
                $this->work_ptn->PTIME_FSTPRD_END_MI
            );
        }

        // 事由をもとに、時間帯割増対象リストに設定された開始・終了時刻を再設定
        foreach ($this->work_ptn_p_time_ext_list as $p_time_ext) {
            if ($use_scd_prd_start_time) {      // 事由が前休、前代のとき
                // 後半開始時刻より後に割増対象終了時刻があるときのみ、割増時刻を設定する
                if ($scd_prd_start_time->lt($p_time_ext['EndTime'])) {
                    // 割増対象開始時刻が後半開始時刻より前にあるときは、後半開始時刻を割増対象開始時刻に設定する
                    if ($p_time_ext['StartTime']->lt($scd_prd_start_time)) {
                        $p_time_ext['StartTime'] = $scd_prd_start_time;
                    }
                }
            } elseif ($use_fst_prd_end_time) {    // 事由が後休、後代のとき
                // 前半終了時刻より前に割増対象開始時刻があるときのみ、割増時刻を設定する
                if ($p_time_ext['StartTime']->lt($fst_prd_end_time)) {
                    // 割増対象終了時刻が前半終了時刻より後にあるときは、前半終了時刻を割増対象終了時刻に設定する
                    if ($fst_prd_end_time->lt($p_time_ext['EndTime'])) {
                        $p_time_ext['EndTime'] = $fst_prd_end_time;
                    }
                }
            }
        }
    }

    /**
     *  勤務体系情報の休憩時間帯・休憩時間１～５の開始時刻/終了時刻を[WorkPtnPBrkList](休憩時間帯・休憩時間リスト)に設定します。
     *  格納する勤怠項目コードがNullの場合はリストに格納しません。
     *  開始時刻は処理対象の[就業情報.カレンダー日付]+[勤務体系情報.休憩時間帯・休憩開始時間]+[勤務体系情報.休憩時間帯・休憩開始分]を連結し日付型として登録。
     *  終了時刻も開始時刻と同様。
     *
     *  勤務体系情報の休憩時間帯・休憩時間１～５をリストに格納する理由はプログラム内で休憩時間１～５の参照を多用するため、
     *  リストに格納することでループ処理ができ効率的に処理ができるから
     */
    private function setWorkPtnPBrkList()
    {
        // 休憩時間設定区分が"00"(時間帯)でない場合は処理を抜ける
        if ($this->work_ptn->BREAK_CLS_CD != "00") {
            return ;
        }

        // 勤務体系情報の休憩時間帯・休憩時間リスト 初期化
        $this->work_ptn_p_brk_list = collect();

        // 休憩時間帯・休憩時間１
        if (!is_null($this->work_ptn->PBRK1_TIME)) {
            $p_brk = self::WORK_PTN_P_BRK_TYPE;     // 休憩時間帯・休憩時間
    
            // 休憩開始時刻
            $p_brk['StartTime'] = UtilCommon::combineDateTime(
                $this->work->CALD_DATE,
                $this->work_ptn->PBRK1_STR_HH,
                $this->work_ptn->PBRK1_STR_MI
            );
            // 休憩終了時刻
            $p_brk['EndTime'] = UtilCommon::combineDateTime(
                $this->work->CALD_DATE,
                $this->work_ptn->PBRK1_END_HH,
                $this->work_ptn->PBRK1_END_MI
            );
            // 休憩時間帯・休憩時間リストに休憩時間１のデータを追加
            $this->work_ptn_p_brk_list->push($p_brk);
        }

        // 休憩時間帯・休憩時間２
        if (!is_null($this->work_ptn->PBRK2_TIME)) {
            $p_brk = self::WORK_PTN_P_BRK_TYPE;     // 休憩時間帯・休憩時間
    
            $p_brk['StartTime'] = UtilCommon::combineDateTime(
                $this->work->CALD_DATE,
                $this->work_ptn->PBRK2_STR_HH,
                $this->work_ptn->PBRK2_STR_MI
            );
            $p_brk['EndTime'] = UtilCommon::combineDateTime(
                $this->work->CALD_DATE,
                $this->work_ptn->PBRK2_END_HH,
                $this->work_ptn->PBRK2_END_MI
            );
            $this->work_ptn_p_brk_list->push($p_brk);
        }

        // 休憩時間帯・休憩時間３
        if (!is_null($this->work_ptn->PBRK3_TIME)) {
            $p_brk = self::WORK_PTN_P_BRK_TYPE;     // 休憩時間帯・休憩時間
    
            $p_brk['StartTime'] = UtilCommon::combineDateTime(
                $this->work->CALD_DATE,
                $this->work_ptn->PBRK3_STR_HH,
                $this->work_ptn->PBRK3_STR_MI
            );
            $p_brk['EndTime'] = UtilCommon::combineDateTime(
                $this->work->CALD_DATE,
                $this->work_ptn->PBRK3_END_HH,
                $this->work_ptn->PBRK3_END_MI
            );
            $this->work_ptn_p_brk_list->push($p_brk);
        }

        // 休憩時間帯・休憩時間４
        if (!is_null($this->work_ptn->PBRK4_TIME)) {
            $p_brk = self::WORK_PTN_P_BRK_TYPE;     // 休憩時間帯・休憩時間
    
            $p_brk['StartTime'] = UtilCommon::combineDateTime(
                $this->work->CALD_DATE,
                $this->work_ptn->PBRK4_STR_HH,
                $this->work_ptn->PBRK4_STR_MI
            );
            $p_brk['EndTime'] = UtilCommon::combineDateTime(
                $this->work->CALD_DATE,
                $this->work_ptn->PBRK4_END_HH,
                $this->work_ptn->PBRK4_END_MI
            );
            $this->work_ptn_p_brk_list->push($p_brk);
        }

        // 休憩時間帯・休憩時間５
        if (!is_null($this->work_ptn->PBRK5_TIME)) {
            $p_brk = self::WORK_PTN_P_BRK_TYPE;     // 休憩時間帯・休憩時間
    
            $p_brk['StartTime'] = UtilCommon::combineDateTime(
                $this->work->CALD_DATE,
                $this->work_ptn->PBRK5_STR_HH,
                $this->work_ptn->PBRK5_STR_MI
            );
            $p_brk['EndTime'] = UtilCommon::combineDateTime(
                $this->work->CALD_DATE,
                $this->work_ptn->PBRK5_END_HH,
                $this->work_ptn->PBRK5_END_MI
            );
            $this->work_ptn_p_brk_list->push($p_brk);
        }
    }

    /**
     *  勤務体系情報の時間数・勤怠項目１～７の開始時刻/終了時刻を[work_ptn_n_time_wk_list](時間数・勤怠項目リスト)に設定します。
     *  格納する勤怠項目コードがNullの場合はリストに格納しません。
     *  開始時刻は処理対象の[就業情報.カレンダー日付]+[勤務体系情報.時間数・休憩開始時間]+[勤務体系情報.時間数・休憩開始分]を連結し日付型として登録。
     *  終了時刻も開始時刻と同様。
     *
     *  勤務体系情報の休憩時間帯・休憩時間１～５をリストに格納する理由はプログラム内で休憩時間１～５の参照を多用するため、
     *  リストに格納することでループ処理ができ効率的に処理ができるから
     *
     *  ※① 仮想の勤怠項目を追加しないと、時間帯で設定した勤怠項目の勤務時間が算出されないため。
     *       計算されない理由は、時間帯の勤怠項目の勤務時間を計算するには、何かしらの時間数の勤怠項目時間に含まれなければならないため。
     *       そのため、「何かしらの時間数の勤怠項目」として仮想の勤怠項目を設定し計算をしている。
     *  構造体[WorkPtnNTimeWkType]に追加された項目[DclsCd(職務種別コード)]/[StartPTime(時間帯開始時刻)]/[EndPTime(時間帯終了時刻)]の代入処理を追加。
     *  </history>
     *  「就業時間」以降の勤怠項目がない場合、仮想の勤怠項目をwork_ptn_n_time_wk_listに追加。※①
     *  </history>
     */
    private function setWorkPtnNTimeWkList()
    {
        // 勤務体系情報の時間数・勤怠項目リスト 初期化
        $this->work_ptn_n_time_wk_list = collect();

        // 職務種別が"01"(時間数)でない場合は処理を抜ける
        if ($this->work_ptn->DUTY_CLS_CD != "01") {
            return ;
        }

        // 時間数・勤怠項目１
        if (!is_null($this->work_ptn->NTIME_WK1_CD)) {
            $n_time_wk = self::WORK_PTN_N_TIME_WK_TYPE;   // 時間数・勤怠項目
            // 勤怠項目コード設定
            $n_time_wk['Cd'] = $this->work_ptn->NTIME_WK1_CD;
            // 職務種別コード
            $n_time_wk['DclsCd'] = $this->work_ptn->NTIME_WK1_DCLS_CD;

            if ($n_time_wk['DclsCd'] == "00") {   // 時間帯
                // 時間帯時刻設定
                $n_time_wk['StartPTime'] = UtilCommon::combineDateTime(
                    $this->work->CALD_DATE,
                    $this->work_ptn->NTIME_WK1_STR_HH,
                    $this->work_ptn->NTIME_WK1_STR_MI
                );
                $n_time_wk['EndPTime'] = UtilCommon::combineDateTime(
                    $this->work->CALD_DATE,
                    $this->work_ptn->NTIME_WK1_END_HH,
                    $this->work_ptn->NTIME_WK1_END_MI
                );
            } elseif ($n_time_wk['DclsCd'] == "01") {   // 時間数
                // 時間数時刻設定
                $n_time_wk['StartNTime'] = (int) $this->work_ptn->NTIME_WK1_STR_HH * 60
                                            + (int) $this->work_ptn->NTIME_WK1_STR_MI; // 分
                $n_time_wk['EndNTime'] = (int) $this->work_ptn->NTIME_WK1_END_HH * 60
                                            + (int) $this->work_ptn->NTIME_WK1_END_MI; // 分
            }

            // 時間数・勤怠項目リストに勤怠項目１のデータを追加
            $this->work_ptn_n_time_wk_list->push($n_time_wk);
        }

        // 時間数・勤怠項目２
        if (!is_null($this->work_ptn->NTIME_WK2_CD)) {
            $n_time_wk = self::WORK_PTN_N_TIME_WK_TYPE;   // 時間数・勤怠項目
            $n_time_wk['Cd'] = $this->work_ptn->NTIME_WK2_CD;
            $n_time_wk['DclsCd'] = $this->work_ptn->NTIME_WK2_DCLS_CD;
            if ($n_time_wk['DclsCd'] == "00") {
                $n_time_wk['StartPTime'] = UtilCommon::combineDateTime(
                    $this->work->CALD_DATE,
                    $this->work_ptn->NTIME_WK2_STR_HH,
                    $this->work_ptn->NTIME_WK2_STR_MI
                );
                $n_time_wk['EndPTime'] = UtilCommon::combineDateTime(
                    $this->work->CALD_DATE,
                    $this->work_ptn->NTIME_WK2_END_HH,
                    $this->work_ptn->NTIME_WK2_END_MI
                );
            } elseif ($n_time_wk['DclsCd'] == "01") {
                $n_time_wk['StartNTime'] = (int) $this->work_ptn->NTIME_WK2_STR_HH * 60
                                            + (int) $this->work_ptn->NTIME_WK2_STR_MI; // 分
                $n_time_wk['EndNTime'] = (int) $this->work_ptn->NTIME_WK2_END_HH * 60
                                            + (int) $this->work_ptn->NTIME_WK2_END_MI; // 分
            }
            $this->work_ptn_n_time_wk_list->push($n_time_wk);
        }

        // 時間数・勤怠項目３
        if (!is_null($this->work_ptn->NTIME_WK3_CD)) {
            $n_time_wk = self::WORK_PTN_N_TIME_WK_TYPE;   // 時間数・勤怠項目
            $n_time_wk['Cd'] = $this->work_ptn->NTIME_WK3_CD;
            $n_time_wk['DclsCd'] = $this->work_ptn->NTIME_WK3_DCLS_CD;
            if ($n_time_wk['DclsCd'] == "00") {
                $n_time_wk['StartPTime'] = UtilCommon::combineDateTime(
                    $this->work->CALD_DATE,
                    $this->work_ptn->NTIME_WK3_STR_HH,
                    $this->work_ptn->NTIME_WK3_STR_MI
                );
                $n_time_wk['EndPTime'] = UtilCommon::combineDateTime(
                    $this->work->CALD_DATE,
                    $this->work_ptn->NTIME_WK3_END_HH,
                    $this->work_ptn->NTIME_WK3_END_MI
                );
            } elseif ($n_time_wk['DclsCd'] == "01") {
                $n_time_wk['StartNTime'] = (int) $this->work_ptn->NTIME_WK3_STR_HH * 60
                                            + (int) $this->work_ptn->NTIME_WK3_STR_MI; // 分
                $n_time_wk['EndNTime'] = (int) $this->work_ptn->NTIME_WK3_END_HH * 60
                                            + (int) $this->work_ptn->NTIME_WK3_END_MI; // 分
            }
            $this->work_ptn_n_time_wk_list->push($n_time_wk);
        }

        // 時間数・勤怠項目４
        if (!is_null($this->work_ptn->NTIME_WK4_CD)) {
            $n_time_wk = self::WORK_PTN_N_TIME_WK_TYPE;   // 時間数・勤怠項目
            $n_time_wk['Cd'] = $this->work_ptn->NTIME_WK4_CD;
            $n_time_wk['DclsCd'] = $this->work_ptn->NTIME_WK4_DCLS_CD;
            if ($n_time_wk['DclsCd'] == "00") {
                $n_time_wk['StartPTime'] = UtilCommon::combineDateTime(
                    $this->work->CALD_DATE,
                    $this->work_ptn->NTIME_WK4_STR_HH,
                    $this->work_ptn->NTIME_WK4_STR_MI
                );
                $n_time_wk['EndPTime'] = UtilCommon::combineDateTime(
                    $this->work->CALD_DATE,
                    $this->work_ptn->NTIME_WK4_END_HH,
                    $this->work_ptn->NTIME_WK4_END_MI
                );
            } elseif ($n_time_wk['DclsCd'] == "01") {
                $n_time_wk['StartNTime'] = (int) $this->work_ptn->NTIME_WK4_STR_HH * 60
                                            + (int) $this->work_ptn->NTIME_WK4_STR_MI; // 分
                $n_time_wk['EndNTime'] = (int) $this->work_ptn->NTIME_WK4_END_HH * 60
                                            + (int) $this->work_ptn->NTIME_WK4_END_MI; // 分
            }
            $this->work_ptn_n_time_wk_list->push($n_time_wk);
        }

        // 時間数・勤怠項目５
        if (!is_null($this->work_ptn->NTIME_WK5_CD)) {
            $n_time_wk = self::WORK_PTN_N_TIME_WK_TYPE;   // 時間数・勤怠項目
            $n_time_wk['Cd'] = $this->work_ptn->NTIME_WK5_CD;
            $n_time_wk['DclsCd'] = $this->work_ptn->NTIME_WK5_DCLS_CD;
            if ($n_time_wk['DclsCd'] == "00") {
                $n_time_wk['StartPTime'] = UtilCommon::combineDateTime(
                    $this->work->CALD_DATE,
                    $this->work_ptn->NTIME_WK5_STR_HH,
                    $this->work_ptn->NTIME_WK5_STR_MI
                );
                $n_time_wk['EndPTime'] = UtilCommon::combineDateTime(
                    $this->work->CALD_DATE,
                    $this->work_ptn->NTIME_WK5_END_HH,
                    $this->work_ptn->NTIME_WK5_END_MI
                );
            } else {
                $n_time_wk['StartNTime'] = (int) $this->work_ptn->NTIME_WK5_STR_HH * 60
                                            + (int) $this->work_ptn->NTIME_WK5_STR_MI; // 分
                $n_time_wk['EndNTime'] = (int) $this->work_ptn->NTIME_WK5_END_HH * 60
                                            + (int) $this->work_ptn->NTIME_WK5_END_MI; // 分
            }
            $this->work_ptn_n_time_wk_list->push($n_time_wk);
        }

        // 時間数・勤怠項目６
        if (!is_null($this->work_ptn->NTIME_WK6_CD)) {
            $n_time_wk = self::WORK_PTN_N_TIME_WK_TYPE;   // 時間数・勤怠項目
            $n_time_wk['Cd'] = $this->work_ptn->NTIME_WK6_CD;
            $n_time_wk['DclsCd'] = $this->work_ptn->NTIME_WK6_DCLS_CD;
            if ($n_time_wk['DclsCd'] == "00") {
                $n_time_wk['StartPTime'] = UtilCommon::combineDateTime(
                    $this->work->CALD_DATE,
                    $this->work_ptn->NTIME_WK6_STR_HH,
                    $this->work_ptn->NTIME_WK6_STR_MI
                );
                $n_time_wk['EndPTime'] = UtilCommon::combineDateTime(
                    $this->work->CALD_DATE,
                    $this->work_ptn->NTIME_WK6_END_HH,
                    $this->work_ptn->NTIME_WK6_END_MI
                );
            } elseif ($n_time_wk['DclsCd'] == "01") {
                $n_time_wk['StartNTime'] = (int) $this->work_ptn->NTIME_WK6_STR_HH * 60
                                            + (int) $this->work_ptn->NTIME_WK6_STR_MI; // 分
                $n_time_wk['EndNTime'] = (int) $this->work_ptn->NTIME_WK6_END_HH * 60
                                            + (int) $this->work_ptn->NTIME_WK6_END_MI; // 分
            }
            $this->work_ptn_n_time_wk_list->push($n_time_wk);
        }

        // 時間数・勤怠項目７
        if (!is_null($this->work_ptn->NTIME_WK7_CD)) {
            $n_time_wk = self::WORK_PTN_N_TIME_WK_TYPE;   // 時間数・勤怠項目
            $n_time_wk['Cd'] = $this->work_ptn->NTIME_WK7_CD;
            $n_time_wk['DclsCd'] = $this->work_ptn->NTIME_WK7_DCLS_CD;
            if ($n_time_wk['DclsCd'] == "00") {
                $n_time_wk['StartPTime'] = UtilCommon::combineDateTime(
                    $this->work->CALD_DATE,
                    $this->work_ptn->NTIME_WK7_STR_HH,
                    $this->work_ptn->NTIME_WK7_STR_MI
                );
                $n_time_wk['EndPTime'] = UtilCommon::combineDateTime(
                    $this->work->CALD_DATE,
                    $this->work_ptn->NTIME_WK7_END_HH,
                    $this->work_ptn->NTIME_WK7_END_MI
                );
            } elseif ($n_time_wk['DclsCd'] == "01") {
                $n_time_wk['StartNTime'] = (int) $this->work_ptn->NTIME_WK7_STR_HH * 60
                                            + (int) $this->work_ptn->NTIME_WK7_STR_MI; // 分
                $n_time_wk['EndNTime'] = (int) $this->work_ptn->NTIME_WK7_END_HH * 60
                                            + (int) $this->work_ptn->NTIME_WK7_END_MI; // 分
            }
            $this->work_ptn_n_time_wk_list->push($n_time_wk);
        }

        // 「就業時間」以降の勤怠項目がない場合、仮想の勤怠項目をwork_ptn_n_time_wk_listに追加。※①
        $last_n_time_wk_ptn = $this->work_ptn_n_time_wk_list->where('DclsCd', "01")->sortByDesc('StartNTime')->first();
        if ($this->mt94->isRegularWork($last_n_time_wk_ptn['Cd'])) {
            $n_time_wk = self::WORK_PTN_N_TIME_WK_TYPE;   // 時間数・勤怠項目
            $n_time_wk['Cd'] = "9998";
            $n_time_wk['DclsCd'] = "01";
            $n_time_wk['StartNTime'] = $last_n_time_wk_ptn['EndNTime'];
            $n_time_wk['EndNTime'] = 24 * 60;
            $this->work_ptn_n_time_wk_list->push($n_time_wk);
        }
    }

    /**
     *  時間算出用時刻の出勤(OFC)、退出(LEV)時刻をセットします。
     *  正常に時刻の設定ができたらTrueを返します。
     *  true  : 出勤、退出時刻を正常にセット
     *  false : 出勤、退出時刻未設定
     */
    private function setOfcLevTime()
    {
        // 出勤時刻入力チェック
        if ($this->calc_time['OFC'] == null) {
            return false;
        }

        // 退出時刻入力チェック
        if ($this->calc_time['LEV'] == null) {
            return false;
        }

        // 出勤、退出時刻大小チェック
        if ($this->calc_time['LEV']->lt($this->calc_time['OFC'])) {
            return false;
        }

        if ($this->work_ptn->DUTY_CLS_CD == "00") {       // 職務種別区分 == 00:時間帯
            // 勤務体系終了時刻以降の出勤(遅すぎる出勤)
            if ($this->work_ptn_time['END']->lte($this->calc_time['OFC'])) {
                return false;
            }

            // 勤務体系開始時刻より前の退出(早すぎる退出)
            if ($this->calc_time['LEV']->lte($this->work_ptn_time['START'])) {
                return false;
            }

            // **************************************************
            // 時間算出用出勤時刻再設定
            // **************************************************
            // 勤務体系開始時刻より前に出勤(早すぎる出勤)のときは、勤務体系開始時刻を出勤時刻とする
            if ($this->calc_time['OFC']->lt($this->work_ptn_time['START'])) {
                $this->calc_time['OFC'] = $this->work_ptn_time['START'];
            }

            // 出勤時刻切上げ処理
            $pre_ofc = null;
            do {
                // 切上げ処理前の出勤時刻を退避。(do～whileの終了条件)
                $pre_ofc = $this->calc_time['OFC'];

                // 出勤時刻がどの勤怠項目時刻範囲にも含まれていない場合、
                // 出勤時刻よりも大きい直近の勤怠項目開始日を出勤時刻に設定する。
                if (!$this->isIncludeWorkPtnPTimeRange($this->calc_time['OFC'], self::RANGE_OPTION['Start'])) {
                    $this->calc_time['OFC'] = $this->getNearWorkPtnPTime(
                        $this->calc_time['OFC'],
                        self::RANGE_OPTION['Start']
                    );
                }

                // 勤務体系情報の休憩時間設定区分が"00"(時間帯)
                if ($this->work_ptn->BREAK_CLS_CD == "00") {
                    // 時間算出用出勤時刻がいずれかの休憩時間時刻範囲に含まれている場合は、休憩終了時刻を出勤時刻とします。
                    $this->calc_time['OFC'] = $this->getPBrkTime(
                        $this->calc_time['OFC'],
                        self::RANGE_OPTION['Start']
                    );
                }
            } while ($pre_ofc != $this->calc_time['OFC']);     // 処理前と処理後の出勤時刻が同じなら処理を抜ける

            // **************************************************
            // 時間算出用退出時刻再設定
            // **************************************************
            // 勤務体系終了時刻より後に退出(遅すぎる退出)のときは、勤務体系終了時刻を退出時刻とする
            if ($this->work_ptn_time['END']->lt($this->calc_time['LEV'])) {
                $this->calc_time['LEV'] = $this->work_ptn_time['END'];
            }

            // 退出時刻切捨て処理
            $pre_lev = null;
            do {
                // 切捨て処理前の退出時刻を退避。(do～whileの終了条件)
                $pre_lev = $this->calc_time['LEV'];

                // 退出時刻がどの勤怠項目時刻範囲にも含まれていない場合、
                // 退出時刻よりも小さい直近の勤怠項目終了日を退出時刻に設定する。
                if (!$this->isIncludeWorkPtnPTimeRange($this->calc_time['LEV'], self::RANGE_OPTION['End'])) {
                    $this->calc_time['LEV'] = $this->getNearWorkPtnPTime(
                        $this->calc_time['LEV'],
                        self::RANGE_OPTION['End']
                    );
                }

                // 勤務体系情報の休憩時間設定区分が"00"(時間帯)
                if ($this->work_ptn->BREAK_CLS_CD == "00") {
                    // 時間算出用退出時刻がいずれかの休憩時間時刻範囲に含まれている場合は、休憩開始時刻を退出時刻とします。
                    $this->calc_time['LEV'] = $this->getPBrkTime(
                        $this->calc_time['LEV'],
                        self::RANGE_OPTION['End']
                    );
                }
            } while ($pre_lev != $this->calc_time['LEV']);     // 処理前と処理後の退出時刻が同じなら処理を抜ける
        } elseif ($this->work_ptn->DUTY_CLS_CD == "01") {   // 職務種別区分 = 01:時間数
            // 勤務体系開始時刻より前の退出(早すぎる退出)
            if ($this->calc_time['LEV']->lt($this->work_ptn_time['START'])) {
                return false;
            }

            // **************************************************
            // 時間算出用出勤時刻再設定
            // **************************************************
            if ($this->calc_time['OFC']->lt($this->work_ptn_time['START'])) {
                // 勤務体系開始時刻より前に出勤(早すぎる出勤)のときは、勤務体系開始時刻を出勤時刻とする。
                $this->calc_time['OFC'] = $this->work_ptn_time['START'];
            } else {
                // 勤務体系情報の時間数・始業刻み時間が入力されている場合、
                // 時間算出用出勤時刻を時間数・始業刻み時間の分単位で切り上げる
                if (!is_null($this->work_ptn->NTIME_START_TK_TIME)) {
                    $this->calc_time['OFC'] = $this->calcFractionTime(
                        $this->calc_time['OFC'],
                        $this->work_ptn->NTIME_START_TK_TIME,
                        "00"
                    );
                }
            }

            // 勤務体系情報の休憩時間設定区分が"00"(時間帯)
            if ($this->work_ptn->BREAK_CLS_CD == "00") {
                // 出勤時刻切上げ、退出時刻切捨て処理
                $pre_ofc = null;
                $pre_lev = null;
                $is_loop_break = false;
                do {
                    $pre_ofc = $this->calc_time['OFC'];    // 切上げ処理前の出勤時刻を退避
                    $pre_lev = $this->calc_time['LEV'];    // 切捨て処理前の退出時刻を退避

                    // 時間算出用出勤時刻がいずれかの休憩時間時刻範囲に含まれている場合は、休憩終了時刻を出勤時刻とします。
                    $this->calc_time['OFC'] = $this->getPBrkTime(
                        $this->calc_time['OFC'],
                        self::RANGE_OPTION['Start']
                    );

                    // 時間算出用退出時刻がいずれかの休憩時間時刻範囲に含まれている場合は、休憩開始時刻を退出時刻とします。
                    $this->calc_time['LEV'] = $this->getPBrkTime(
                        $this->calc_time['LEV'],
                        self::RANGE_OPTION['End']
                    );

                    if ($pre_ofc == $this->calc_time['OFC'] && $pre_lev == $this->calc_time['LEV']) {
                        $is_loop_break = true;
                    }
                } while (!$is_loop_break);
            }
        }

        // 出勤時刻切上げ処理、退出時刻切捨て処理後に再度、出勤、退出時刻大小チェック
        if ($this->calc_time['LEV']->lte($this->calc_time['OFC'])) {
            return false;
        }

        return true;
    }

    /**
     *  時間算出用時刻の外出１(OUT1)、再入１(IN1)時刻をセットします。
     *  正常に時刻の設定ができたらTrueを返します。
     *  true  : 外出１、再入１時刻を正常にセット
     *  false : 外出１、再入１時刻未設定
     */
    private function setOut1In1Time()
    {
        // 外出時刻１入力チェック
        if ($this->calc_time['OUT1'] == null) {
            return false;
        }

        // 再入時刻１入力チェック
        if ($this->calc_time['IN1'] == null) {
            return false;
        }

        // 外出時刻１、再入時刻１大小チェック
        if ($this->calc_time['IN1']->lt($this->calc_time['OUT1'])) {
            return false;
        }

        // 出勤時刻が入力されている場合
        if ($this->calc_time['OFC'] <> null) {
            // 出勤時刻、外出時刻１大小チェック
            if ($this->calc_time['OUT1']->lt($this->calc_time['OFC'])) {
                return false;
            }
            // 出勤時刻、再入時刻１大小チェック
            if ($this->calc_time['IN1']->lte($this->calc_time['OFC'])) {
                return false;
            }
        }

        // 退出時刻が入力されている場合
        if ($this->calc_time['LEV'] <> null) {
            // 退出時刻、外出時刻１大小チェック
            if ($this->calc_time['LEV']->lte($this->calc_time['OUT1'])) {
                return false;
            }
            // 退出時刻、再入時刻１大小チェック
            if ($this->calc_time['LEV']->lte($this->calc_time['IN1'])) {
                return false;
            }
        }

        if ($this->work_ptn->DUTY_CLS_CD == "00") {       // 職務種別区分 == 00:時間帯
            // 勤務体系終了時刻以降の外出
            if ($this->work_ptn_time['END']->lte($this->calc_time['OUT1'])) {
                return false;
            }

            // 勤務体系開始時刻より前の再入
            if ($this->calc_time['IN1']->lte($this->work_ptn_time['START'])) {
                return false;
            }


            // **************************************************
            // 時間算出用外出時刻１再設定
            // **************************************************
            // 勤務体系開始時刻より前に外出(早すぎる外出)のときは、勤務体系開始時刻を外出時刻１とする
            if ($this->calc_time['OUT1']->lt($this->work_ptn_time['START'])) {
                $this->calc_time['OUT1'] = $this->work_ptn_time['START'];
            }

            // 外出時刻１切上げ処理
            $pre_out1 = null;
            do {
                // 切上げ処理前の外出時刻１を退避。(do～whileの終了条件)
                $pre_out1 = $this->calc_time['OUT1'];

                // 外出時刻１がどの勤務項目時刻範囲にも含まれていない場合、
                // 外出時刻１よりも大きい直近の勤務項目開始日を外出時刻１に設定する。
                if (!$this->isIncludeWorkPtnPTimeRange($this->calc_time['OUT1'], self::RANGE_OPTION['Start'])) {
                    $this->calc_time['OUT1'] = $this->getNearWorkPtnPTime(
                        $this->calc_time['OUT1'],
                        self::RANGE_OPTION['Start']
                    );
                }

                // 勤務体系情報の休憩時間設定区分が"00"(時間帯)
                if ($this->work_ptn->BREAK_CLS_CD == "00") {
                    // 時間算出用外出時刻１がいずれかの休憩時間時刻範囲に含まれている場合は、休憩終了時刻を外出時刻１とします。
                    $this->calc_time['OUT1'] = $this->getPBrkTime(
                        $this->calc_time['OUT1'],
                        self::RANGE_OPTION['Start']
                    );
                }
            } while ($pre_out1 != $this->calc_time['OUT1']);     // 処理前と処理後の外出時刻１が同じなら処理を抜ける

            // **************************************************
            // 時間算出用再入時刻１再設定
            // **************************************************
            // 勤務体系終了時刻より後に再入(遅すぎる再入)のときは、勤務体系終了時刻を再入時刻１とする
            if ($this->work_ptn_time['END']->lt($this->calc_time['IN1'])) {
                $this->calc_time['IN1'] = $this->work_ptn_time['END'];
            }

            // 再入時刻１切捨て処理
            $pre_in1 = null;
            do {
                // 切捨て処理前の再入時刻１を退避。(do～whileの終了条件)
                $pre_in1 = $this->calc_time['IN1'];

                // 再入時刻１がどの勤怠項目時刻範囲にも含まれていない場合、
                // 再入時刻１よりも小さい直近の勤怠項目終了日を再入時刻１に設定する。
                if (!$this->isIncludeWorkPtnPTimeRange($this->calc_time['IN1'], self::RANGE_OPTION['End'])) {
                    $this->calc_time['IN1'] = $this->getNearWorkPtnPTime(
                        $this->calc_time['IN1'],
                        self::RANGE_OPTION['End']
                    );
                }

                // 勤務体系情報の休憩時間設定区分が"00"(時間帯)
                if ($this->work_ptn->BREAK_CLS_CD == "00") {
                    // 時間算出用再入時刻１がいずれかの休憩時間時刻範囲に含まれている場合は、休憩開始時刻を再入時刻１とします。
                    $this->calc_time['IN1'] = $this->getPBrkTime(
                        $this->calc_time['IN1'],
                        self::RANGE_OPTION['End']
                    );
                }
            } while ($pre_in1 != $this->calc_time['IN1']);     // 処理前と処理後の再入時刻１が同じなら処理を抜ける
        } elseif ($this->work_ptn->DUTY_CLS_CD == "01") {   // 職務種別区分 = 01:時間数
            // 勤務体系情報の休憩時間設定区分が"00"(時間帯)
            if ($this->work_ptn->BREAK_CLS_CD == "00") {
                // 外出時刻１切上げ、再入時刻１切捨て処理
                $pre_out1 = null;
                $pre_in1 = null;
                $is_loopbreak = false;
                do {
                    $pre_out1 = $this->calc_time['OUT1'];  // 切上げ処理前の外出時刻１を退避
                    $pre_in1 = $this->calc_time['IN1'];    // 切捨て処理前の再入時刻１を退避

                    // 時間算出用外出時刻１がいずれかの休憩時間時刻範囲に含まれている場合は、休憩終了時刻を外出時刻１とします。
                    $this->calc_time['OUT1'] = $this->getPBrkTime(
                        $this->calc_time['OUT1'],
                        self::RANGE_OPTION['Start']
                    );

                    // 時間算出用再入時刻１がいずれかの休憩時間時刻範囲に含まれている場合は、休憩開始時刻を再入時刻１とします。
                    $this->calc_time['IN1'] = $this->getPBrkTime(
                        $this->calc_time['IN1'],
                        self::RANGE_OPTION['End']
                    );

                    if ($pre_out1 == $this->calc_time['OUT1'] && $pre_in1 == $this->calc_time['IN1']) {
                        $is_loopbreak = true;
                    }
                } while (!$is_loopbreak);
            }
        }

        // 外出時刻１切上げ処理、再入時刻１切捨て処理後に再度、外出時刻１、再入時刻１大小チェック
        if ($this->calc_time['IN1']->lte($this->calc_time['OUT1'])) {
            return false;
        }

        return true;
    }

    /**
     *  時間算出用時刻の外出２(OUT1)、再入２(IN1)時刻をセットします。
     *  正常に時刻の設定ができたらTrueを返します。
     *  true  : 外出２、再入２時刻を正常にセット
     *  false : 外出２、再入２時刻未設定
     */
    private function setOut2In2Time()
    {
        // 外出時刻２入力チェック
        if ($this->calc_time['OUT2'] == null) {
            return false;
        }

        // 再入時刻２入力チェック
        if ($this->calc_time['IN2'] == null) {
            return false;
        }

        // 外出時刻２、再入時刻１大小チェック
        if ($this->calc_time['OUT2']->lt($this->calc_time['IN1'])) {
            return false;
        }

        // 外出時刻２、再入時刻２大小チェック
        if ($this->calc_time['IN2']->lt($this->calc_time['OUT2'])) {
            return false;
        }

        // 出勤時刻が入力されている場合
        if ($this->calc_time['OFC'] <> null) {
            // 出勤時刻、外出時刻２大小チェック
            if ($this->calc_time['OUT2']->lt($this->calc_time['OFC'])) {
                return false;
            }
            // 出勤時刻、再入時刻２大小チェック
            if ($this->calc_time['IN2']->lte($this->calc_time['OFC'])) {
                return false;
            }
        }

        // 退出時刻が入力されている場合
        if ($this->calc_time['LEV'] <> null) {
            // 退出時刻、外出時刻２大小チェック
            if ($this->calc_time['LEV']->lte($this->calc_time['OUT2'])) {
                return false;
            }
            // 退出時刻、再入時刻２大小チェック
            if ($this->calc_time['LEV']->lte($this->calc_time['IN2'])) {
                return false;
            }
        }

        if ($this->work_ptn->DUTY_CLS_CD == "00") {       // 職務種別区分 == 00:時間帯
            // 勤務体系終了時刻以降の外出
            if ($this->work_ptn_time['END']->lte($this->calc_time['OUT2'])) {
                return false;
            }

            // 勤務体系開始時刻より前の再入
            if ($this->calc_time['IN2']->lte($this->work_ptn_time['START'])) {
                return false;
            }


            // **************************************************
            // 時間算出用外出時刻２再設定
            // **************************************************
            // 勤務体系開始時刻より前に外出(早すぎる外出)のときは、勤務体系開始時刻を外出時刻２とする
            if ($this->calc_time['OUT2']->lt($this->work_ptn_time['START'])) {
                $this->calc_time['OUT2'] = $this->work_ptn_time['START'];
            }

            // 外出時刻２切上げ処理
            $pre_out2 = null;
            do {
                // 切上げ処理前の外出時刻２を退避。(do～whileの終了条件)
                $pre_out2 = $this->calc_time['OUT2'];

                // 外出時刻２がどの勤務項目時刻範囲にも含まれていない場合、
                // 外出時刻２よりも大きい直近の勤務項目開始日を外出時刻２に設定する。
                if (!$this->isIncludeWorkPtnPTimeRange($this->calc_time['OUT2'], self::RANGE_OPTION['Start'])) {
                    $this->calc_time['OUT2'] = $this->getNearWorkPtnPTime(
                        $this->calc_time['OUT2'],
                        self::RANGE_OPTION['Start']
                    );
                }

                // 勤務体系情報の休憩時間設定区分が"00"(時間帯)
                if ($this->work_ptn->BREAK_CLS_CD == "00") {
                    // 時間算出用外出時刻２がいずれかの休憩時間時刻範囲に含まれている場合は、休憩終了時刻を外出時刻２とします。
                    $this->calc_time['OUT2'] = $this->getPBrkTime(
                        $this->calc_time['OUT2'],
                        self::RANGE_OPTION['Start']
                    );
                }
            } while ($pre_out2 != $this->calc_time['OUT2']);     // 処理前と処理後の外出時刻２が同じなら処理を抜ける


            // **************************************************
            // 時間算出用再入時刻２再設定
            // **************************************************
            // 勤務体系終了時刻より後に再入(遅すぎる再入)のときは、勤務体系終了時刻を再入時刻２とする
            if ($this->work_ptn_time['END']->lt($this->calc_time['IN2'])) {
                $this->calc_time['IN2'] = $this->work_ptn_time['END'];
            }

            // 再入時刻２切捨て処理
            $pre_in2 = null;
            do {
                // 切捨て処理前の再入時刻２を退避。(do～whileの終了条件)
                $pre_in2 = $this->calc_time['IN2'];

                // 再入時刻２がどの勤怠項目時刻範囲にも含まれていない場合、
                // 再入時刻２よりも小さい直近の勤怠項目終了日を再入時刻２に設定する。
                if (!$this->isIncludeWorkPtnPTimeRange($this->calc_time['IN2'], self::RANGE_OPTION['End'])) {
                    $this->calc_time['IN2'] = $this->getNearWorkPtnPTime(
                        $this->calc_time['IN2'],
                        self::RANGE_OPTION['End']
                    );
                }

                // 勤務体系情報の休憩時間設定区分が"00"(時間帯)
                if ($this->work_ptn->BREAK_CLS_CD == "00") {
                    // 時間算出用再入時刻２がいずれかの休憩時間時刻範囲に含まれている場合は、休憩開始時刻を再入時刻２とします。
                    $this->calc_time['IN2'] = $this->getPBrkTime(
                        $this->calc_time['IN2'],
                        self::RANGE_OPTION['End']
                    );
                }
            } while ($pre_in2 != $this->calc_time['IN2']);     // 処理前と処理後の再入時刻２が同じなら処理を抜ける
        } elseif ($this->work_ptn->DUTY_CLS_CD == "01") {   // 職務種別区分 = 01:時間数
            // 勤務体系情報の休憩時間設定区分が"00"(時間帯)
            if ($this->work_ptn->BREAK_CLS_CD == "00") {
                // 外出時刻２切上げ、再入時刻２切捨て処理
                $pre_out2 = null;
                $pre_in2 = null;
                $is_loopbreak = false;
                do {
                    $pre_out2 = $this->calc_time['OUT2'];  // 切上げ処理前の外出時刻２を退避
                    $pre_in2 = $this->calc_time['IN2'];    // 切捨て処理前の再入時刻２を退避


                    // 時間算出用外出時刻２がいずれかの休憩時間時刻範囲に含まれている場合は、休憩終了時刻を外出時刻２とします。
                    $this->calc_time['OUT2'] = $this->getPBrkTime(
                        $this->calc_time['OUT2'],
                        self::RANGE_OPTION['Start']
                    );

                    // 時間算出用再入時刻２がいずれかの休憩時間時刻範囲に含まれている場合は、休憩開始時刻を再入時刻２とします。
                    $this->calc_time['IN2'] = $this->getPBrkTime(
                        $this->calc_time['IN2'],
                        self::RANGE_OPTION['End']
                    );

                    if ($pre_out2 == $this->calc_time['OUT2'] && $pre_in2 == $this->calc_time['IN2']) {
                        $is_loopbreak = true;
                    }
                } while (!$is_loopbreak);
            }
        }

        // 外出時刻２切上げ処理、再入時刻２切捨て処理後に再度、外出時刻２、再入時刻２大小チェック
        if ($this->calc_time['IN2']->lte($this->calc_time['OUT2'])) {
            return false;
        }

        return true;
    }

    /**
     *  勤怠項目時間情報リストを設定します。
     */
    private function setWorkTimeInfoList()
    {
        // 職務種別が"01"(時間数)でない場合は処理を抜ける
        if (!$this->work_ptn->DUTY_CLS_CD == "01") {
            return ;
        }

        // 勤怠項目時間情報リスト生成
        $this->work_time_info_list = [];

        // 前の勤怠項目終了時刻退避用変数。初期値として出勤時刻をセット
        $pre_work_end_time = $this->calc_time['OFC'];

        // 前の勤怠項目終了時間退避用変数。初期値として0時間をセット
        $pre_work_end_time_span = 0;

        // 職務種別が時間数(01)の勤怠項目を開始時間順で取得
        $n_time_wk_query = $this->work_ptn_n_time_wk_list->where('DclsCd', "01")->sortBy('StartNTime');

        foreach ($n_time_wk_query as $n_time_wk) {
            $wk_cd = $n_time_wk['Cd'];
            $work_time_info = self::WORK_TIME_INFO;

            // 勤怠項目開始時刻
            $work_start_time = (clone $pre_work_end_time)
                    ->addMinutes($n_time_wk['StartNTime'] - $pre_work_end_time_span);

            // 隙間時間で退出
            if ($pre_work_end_time->lte($this->calc_time['LEV']) && $this->calc_time['LEV']->lte($work_start_time)) {
                break;
            }

            // 勤怠項目開始・終了時刻、休憩時間、外出時間の初期値設定
            $work_time_info['WorkTimeRange']['START'] = $work_start_time;
            $work_time_info['WorkTimeRange']['END'] = (clone $work_start_time)
                        ->addMinutes($n_time_wk['EndNTime'] - $n_time_wk['StartNTime']);
            $work_time_info['BreakTime'] = 0;
            $work_time_info['OutTime'] = 0;

            // 勤怠項目終了時刻調整処理
            switch ($this->work_ptn->BREAK_CLS_CD) {
                case "00":   // 時間帯
                    $this->adjustWorkEndTimeForBreakTimeZone($wk_cd, $work_time_info);
                    break;

                case "01":   // 時間数
                    $this->adjustWorkEndTimeForBreakTimeNum($wk_cd, $work_time_info);
                    break;

                case "02":   // 時間毎
                    $this->adjustWorkEndTimeForBreakTimePeriod($wk_cd, $work_time_info);
                    break;
            }

            if ($work_time_info['WorkTimeRange']['START']->lt($work_time_info['WorkTimeRange']['END'])) {
                // 勤怠項目時間情報リストに追加
                $this->work_time_info_list[$wk_cd] = $work_time_info;
            } else {
                // 開始・終了時刻が同一(休憩時間数で就業時間が休憩時間数未満の場合、このような値になる。このとき休憩時間中の退出とみなし、ループを抜ける。)
                break;
            }

            // 勤怠項目終了時刻が退出時刻と同一の場合、以降の勤怠項目時刻を算出する必要がないため、ループを抜ける
            if ($work_time_info['WorkTimeRange']['END'] == $this->calc_time['LEV']) {
                break;
            }

            // 前の勤怠項目終了時刻退避用変数に終了 "時刻" をセット
            $pre_work_end_time = $work_time_info['WorkTimeRange']['END'];
            // 前の勤怠項目終了時間退避用変数に終了 "時間" をセット
            $pre_work_end_time_span = $n_time_wk['EndNTime'];
        }
    }


    /**
     *  休憩時間帯
     *  @param wk_cd 勤怠CD
     *  @param workTimeInfo 勤怠項目時間情報
     */
    private function adjustWorkEndTimeForBreakTimeZone($wk_cd, &$work_time_info)
    {
        // 拡張時刻範囲
        $extension_wk_time_range = self::TIME_RANGE_TYPE;
        $extension_wk_time_range['START'] = $work_time_info['WorkTimeRange']['START'];
        $extension_wk_time_range['END'] = $work_time_info['WorkTimeRange']['END'];

        $break_time = 0;
        do {
            // 拡張した時刻範囲内の休憩時間取得
            $break_time = $this->getPBrkTimeInTargetTime(
                $extension_wk_time_range['START'],
                $extension_wk_time_range['END']
            );

            // 休憩時間分の拡張した時刻範囲
            $extension_wk_time_range['START'] = $extension_wk_time_range['END'];
            $extension_wk_time_range['END']->addMinutes($break_time);

            // 休憩時間分、勤怠項目終了時刻をずらす
            $work_time_info['WorkTimeRange']['END'] = $extension_wk_time_range['END'];
        } while ($break_time <> 0);    // 拡張した時刻範囲内に休憩時間がなくなるまでループ


        foreach ([1, 2] as $out_count) {
            // 外出時刻範囲取得
            $out_time_range = self::TIME_RANGE_TYPE;
            $is_out = null;
            switch ($out_count) {
                case 1:
                    $out_time_range['START'] = $this->calc_time['OUT1'];
                    $out_time_range['END'] = $this->calc_time['IN1'];
                    $is_out = $this->calc_proc_flg['IsOut1Time'];
                    break;

                case 2:
                    $out_time_range['START'] = $this->calc_time['OUT2'];
                    $out_time_range['END'] = $this->calc_time['IN2'];
                    $is_out = $this->calc_proc_flg['IsOut2Time'];
                    break;
            }

            // 外出打刻がない場合は次ループ
            if (!$is_out) {
                continue;
            }

            // 外出時間算出用
            $target_end_time = null;
            if ($work_time_info['WorkTimeRange']['START']->lte($out_time_range['START'])
                    && $work_time_info['WorkTimeRange']['END']->gt($out_time_range['START'])
                    && $work_time_info['WorkTimeRange']['END']->lt($out_time_range['END'])) {
                // 外出時間が勤怠項目時刻範囲内にあり、再入時刻が勤怠項目終了時刻より後にある場合は、再入時刻
                $target_end_time = $out_time_range['END'];
            } else {
                $target_end_time = $work_time_info['WorkTimeRange']['END'];  // 勤怠項目終了時刻
            }

            // 休憩時間を除いた外出時間を取得
            $out_time = $this->getOutTimeInTargetTime4(
                $work_time_info['WorkTimeRange']['START'],
                $target_end_time,
                $out_time_range['START'],
                $out_time_range['END']
            );

            // 外出時間分拡張した時刻範囲を取得
            $extension_wk_time_range['START'] = $work_time_info['WorkTimeRange']['END'];
            $extension_wk_time_range['END'] = (clone $work_time_info['WorkTimeRange']['END'])->addMinutes($out_time);

            // 外出時間分、勤怠項目終了時刻をずらす
            $work_time_info['WorkTimeRange']['END'] = $extension_wk_time_range['END'];

            do {
                // 拡張した時刻範囲内の休憩時間取得
                $break_time = $this->getPBrkTimeInTargetTime(
                    $extension_wk_time_range['START'],
                    $extension_wk_time_range['END']
                );

                // 休憩時間分の拡張した時刻範囲
                $extension_wk_time_range['START'] = $extension_wk_time_range['END'];
                $extension_wk_time_range['END']->addMinutes($break_time);

                // 休憩時間分、勤怠項目終了時刻をずらす
                $work_time_info['WorkTimeRange']['END'] = $extension_wk_time_range['END'];
            } while ($break_time <> 0);    // 拡張した時刻範囲内に休憩時間がなくなるまでループ
        }

        // 退出時刻と勤怠項目終了時刻を比較
        if ($this->calc_time['LEV']->lte($work_time_info['WorkTimeRange']['END'])) {
            // 現在処理中の勤怠項目時刻内で退出した場合
            $work_time_info['WorkTimeRange']['END'] = $this->calc_time['LEV'];

            foreach ($this->work_ptn_p_brk_list as $brk) {
                // かつ、休憩時間中の退出の場合
                if ($brk['StartTime']->lte($this->calc_time['LEV']) && $this->calc_time['LEV']->lte($brk['EndTime'])) {
                    $work_time_info['WorkTimeRange']['END'] = $brk['StartTime'];
                    break;
                }
            }
        }

        // 休憩時間算出
        $work_time_info['BreakTime'] =  $this->getPBrkTimeInTargetTime(
            $work_time_info['WorkTimeRange']['START'],
            $work_time_info['WorkTimeRange']['END']
        );
    }

    /**
     *  休憩時間数
     *  @param wk_cd 勤怠CD
     *  @param workTimeInfo 勤怠項目時間情報
     */
    private function adjustWorkEndTimeForBreakTimeNum($wk_cd, &$work_time_info)
    {
        $is_regular_work = $this->mt94->isRegularWork($wk_cd);

        // 勤怠項目が就業時間の場合、勤怠項目終了時刻に休憩時間を加算
        if ($is_regular_work) {
            $break_time = $this->convertTimeToMinute($this->work_ptn->NBRK_TIME, $this->work_ptn->NBRK_MINUTE);
            $work_time_info['WorkTimeRange']['END']->addMinutes($break_time);
            $work_time_info['BreakTime'] = $break_time;
        }

        foreach ([1, 2] as $out_count) {
            $out_time_range = self::TIME_RANGE_TYPE;
            $is_out = false;

            // 外出時刻範囲取得
            switch ($out_count) {
                case 1:
                    $out_time_range['START'] = $this->calc_time['OUT1'];
                    $out_time_range['END'] = $this->calc_time['IN1'];
                    $is_out = $this->calc_proc_flg['IsOut1Time'];
                    break;

                case 2:
                    $out_time_range['START'] = $this->calc_time['OUT2'];
                    $out_time_range['END'] = $this->calc_time['IN2'];
                    $is_out = $this->calc_proc_flg['IsOut2Time'];
                    break;
            }

            // 外出した場合、勤怠項目終了時刻に外出時間を加算。総外出時間に外出時間を加算。
            if ($is_out) {
                // 外出時間算出用
                $target_end_time = $work_time_info['WorkTimeRange']['END'];

                // 外出時間が勤怠項目時刻範囲内にあり、再入時刻が勤怠項目終了時刻より後にある場合
                if ($work_time_info['WorkTimeRange']['START']->lte($out_time_range['START'])
                        && $work_time_info['WorkTimeRange']['END']->gt($out_time_range['START'])
                        && $work_time_info['WorkTimeRange']['END']->lt($out_time_range['END'])) {
                    $target_end_time = $out_time_range['END'];
                }

                // 休憩時間を除いた外出時間を取得
                $out_time = $this->getOutTimeInTargetTime4(
                    $work_time_info['WorkTimeRange']['START'],
                    $target_end_time,
                    $out_time_range['START'],
                    $out_time_range['END']
                );
                $work_time_info['WorkTimeRange']['END']->addMinutes($out_time);
                $work_time_info['OutTime'] = $work_time_info['OutTime'] + $out_time;
            }
        }

        // 退出時刻と勤怠項目終了時刻を比較
        if ($this->calc_time['LEV']->lte($work_time_info['WorkTimeRange']['END'])) {
            // 現在処理中の勤怠項目時刻内で退出した場合
            $work_time_info['WorkTimeRange']['END'] = $this->calc_time['LEV'];

            if ($is_regular_work) {
                if ($work_time_info['WorkTimeRange']['END']->diffInMinutes($work_time_info['WorkTimeRange']['START'])
                        <= $work_time_info['BreakTime']) {
                    // 就業時間の勤務時間が休憩時間以下の場合は、勤怠項目終了時刻を、開始時刻と同じにする
                    $work_time_info['WorkTimeRange']['END'] = $work_time_info['WorkTimeRange']['START'];
                }
            }
        }
    }

    /**
     *  休憩時間毎
     *  @param wk_cd 勤怠CD
     *  @param workTimeInfo 勤怠項目時間情報
     */
    private function adjustWorkEndTimeForBreakTimePeriod($wk_cd, &$work_time_info)
    {
        $is_regular_work = $this->mt94->isRegularWork($wk_cd);

        // 勤怠項目が就業時間の場合、勤怠項目終了時刻に休憩時間を加算
        if ($is_regular_work) {
            $regular_work_time = floor(
                $work_time_info['WorkTimeRange']['START']->diffInMinutes($work_time_info['WorkTimeRange']['END'])
            );
            $break_time = intdiv($regular_work_time, ($this->work_ptn->EBRK_PTIME * 60)) * $this->work_ptn->EBRK_MINUTE;
            $work_time_info['WorkTimeRange']['END']->addMinutes($break_time);
            $work_time_info['BreakTime'] = $break_time;
        }

        foreach ([1, 2] as $out_count) {
            $out_time_range = self::TIME_RANGE_TYPE;
            $is_out = false;

            // 外出時刻範囲取得
            switch ($out_count) {
                case 1:
                    $out_time_range['START'] = $this->calc_time['OUT1'];
                    $out_time_range['END'] = $this->calc_time['IN1'];
                    $is_out = $this->calc_proc_flg['IsOut1Time'];
                    break;

                case 2:
                    $out_time_range['START'] = $this->calc_time['OUT2'];
                    $out_time_range['END'] = $this->calc_time['IN2'];
                    $is_out = $this->calc_proc_flg['IsOut2Time'];
                    break;
            }

            // 外出した場合、勤怠項目終了時刻に外出時間を加算。総外出時間に外出時間を加算。
            if ($is_out) {
                // 外出時間算出用
                $target_end_time = $work_time_info['WorkTimeRange']['END'];

                // 外出時間が勤怠項目時刻範囲内にあり、再入時刻が勤怠項目終了時刻より後にある場合
                if ($work_time_info['WorkTimeRange']['START']->lte($out_time_range['START'])
                        && $work_time_info['WorkTimeRange']['END']->gt($out_time_range['START'])
                        && $work_time_info['WorkTimeRange']['END']->lt($out_time_range['END'])) {
                    $target_end_time = $out_time_range['END'];
                }

                // 休憩時間を除いた外出時間を取得
                $out_time = $this->getOutTimeInTargetTime4(
                    $work_time_info['WorkTimeRange']['START'],
                    $target_end_time,
                    $out_time_range['START'],
                    $out_time_range['END']
                );
                $work_time_info['WorkTimeRange']['END']->addMinutes($out_time);
                $work_time_info['OutTime'] += $out_time;
            }
        }

        // 勤怠項目終了時刻前の退出
        if ($this->calc_time['LEV']->lte($work_time_info['WorkTimeRange']['END'])) {
            $work_time_info['WorkTimeRange']['END'] = $this->calc_time['LEV'];

            // 就業時間の場合、休憩時間の計算
            if ($is_regular_work) {
                $work_time_minute = floor(
                    $work_time_info['WorkTimeRange']['START']->diffInMinutes($work_time_info['WorkTimeRange']['END'])
                );
                $break_period = $this->work_ptn->EBRK_PTIME * 60;
                $break_minute = $this->work_ptn->EBRK_MINUTE;
                $total_break_period = 0;
                $total_break = 0;

                do {
                    // 休憩区切り時間の合計
                    $total_break_period += $break_period;

                    // 休憩区切り時間帯での退出
                    if ($work_time_minute <= $total_break_period + $total_break) {
                        break;
                    }

                    // 休憩時間の合計
                    $total_break += $break_minute;

                    // 合計した休憩区切り時間と休憩時間の合計が就業時間を超える場合
                    if ($work_time_minute <= $total_break_period + $total_break) {
                        // 休憩時間の調整
                        $total_break -= $total_break_period + $total_break - $work_time_minute;
                        break;
                    }
                } while (1);

                // 休憩時間
                $work_time_info['BreakTime'] = $total_break;
            }
        }
    }


    /**
     *  就業情報の外出時間を設定します。
     *  勤怠項目別時間の算出に使用する勤怠項目別外出時間退避用変数、
     *  割増対象別時間の算出に使用する割増対象別外出時間退避用変数の設定も行っています。
     *  勤務体系情報入力で割増時間帯が、職務種別にかかわらず設定できるように仕様変更。
     *  それに伴い、職務種別が"01"時間数でも、割増時間帯別外出時間の算出するように変更。
     *
     *  勤務体系情報入力で、職務種別が"01"時間数のとき、勤怠項目ごとに職務種別が設定できるように仕様変更。
     *  それに伴い、職務種別が"01"時間数のとき、勤怠項目別職務種別がすべて"01"時間数の場合と、"00"時間帯を含む場合で処理を分岐。
     *  "00"時間帯を含む場合、最初に総外出時間を算出、勤怠項目別外出時間を算出し、総外出時間から勤怠項目別外出時間を引く。
     *  こうすることで、"01"時間数部分の外出時間と、勤怠項目別外出時間を算出。
     *  </history>
     */
    private function setOutTime()
    {
        $out_time_in_work = 0;        // 勤怠項目時刻範囲内での外出時間(分)
        $out_time_in_ext = 0;         // 割増対象時間範囲内での外出時間(分)
        $total_out1_time = 0;        // 外出１時間の合計
        $total_out2_time = 0;        // 外出２時間の合計
        $total_out_time = 0;         // 外出１時間、外出２時間の合計
        // 職務種別が時間数で、勤怠項目別の職務種別に時間帯が設定されているか否か。true：時間帯に設定されている勤怠項目が1件以上ある。false：時間帯に設定されている勤怠項目が0件。
        $has_period_dcls = false;

        // 外出１時刻、外出２時刻の時間算出処理を行わない場合は処理を抜ける
        if (!$this->calc_proc_flg['IsOut1Time'] && !$this->calc_proc_flg['IsOut2Time']) {
            return ;
        }

        if ($this->work_ptn_n_time_wk_list != null) {
            // 勤務体系情報の 時間数・勤怠項目CD & 時間範囲リストをLinqを使って、勤怠項目別の職務種別が"00"(時間帯)の件数を取得
            $period_dcls_cnt = $this->work_ptn_n_time_wk_list->where('DclsCd', "00")->count();
            if (1 <= $period_dcls_cnt) {
                $has_period_dcls = true;
            }
        }

        if ($this->work_ptn->DUTY_CLS_CD == "00") {       // 職務種別区分 == 00:時間帯
            // 勤怠項目毎に外出時間を算出
            foreach ($this->work_ptn_p_time_wk_list as $p_time_wk) {
                // 勤怠項目別外出時間退避用ハッシュテーブルに該当する勤怠項目コードが存在しない場合は、項目を追加する
                if (!key_exists($p_time_wk['Cd'], $this->total_out_time_by_work)) {
                    $this->total_out_time_by_work[$p_time_wk['Cd']] = 0;
                }

                if ($this->calc_proc_flg['IsOut1Time']) {
                    // 外出１の時間算出をし勤怠項目別外出時間退避用ハッシュテーブルに外出時間を加算する
                    $out_time_in_work = $this->getOutTimeInTargetTime4(
                        $p_time_wk['StartTime'],
                        $p_time_wk['EndTime'],
                        $this->calc_time['OUT1'],
                        $this->calc_time['IN1']
                    );
                    $this->total_out_time_by_work[$p_time_wk['Cd']] += $out_time_in_work;
                    // 外出１時間合計
                    $total_out1_time += $out_time_in_work;
                }

                if ($this->calc_proc_flg['IsOut2Time']) {
                    // 外出２の時間算出をし勤怠項目別外出時間退避用ハッシュテーブルに外出時間を加算する
                    $out_time_in_work = $this->getOutTimeInTargetTime4(
                        $p_time_wk['StartTime'],
                        $p_time_wk['EndTime'],
                        $this->calc_time['OUT2'],
                        $this->calc_time['IN2']
                    );
                    $this->total_out_time_by_work[$p_time_wk['Cd']] += $out_time_in_work;
                    // 外出２時間合計
                    $total_out2_time += $out_time_in_work;
                }
            }

            // 割増対象別外出時間を算出し、割増対象別外出時間退避用ハッシュテーブルを作成する
            foreach ($this->work_ptn_p_time_ext_list as $p_time_ext) {
                // 割増対象別外出時間退避用ハッシュテーブルに該当する割増対象コードが存在しない場合は、項目を追加する
                if (!key_exists($p_time_ext['Cd'], $this->total_out_time_by_ext)) {
                    $this->total_out_time_by_ext[$p_time_ext['Cd']] = 0;
                }

                if ($this->calc_proc_flg['IsOut1Time']) {
                    // 外出１の時間算出をし割増対象別外出時間退避用ハッシュテーブルに外出時間を加算する
                    $out_time_in_ext = $this->getOutTimeInTargetTime4(
                        $p_time_ext['StartTime'],
                        $p_time_ext['EndTime'],
                        $this->calc_time['OUT1'],
                        $this->calc_time['IN1']
                    );
                    $this->total_out_time_by_ext[$p_time_ext['Cd']] += $out_time_in_ext;
                }

                if ($this->calc_proc_flg['IsOut2Time']) {
                    // 外出２の時間算出をし割増対象別外出時間退避用ハッシュテーブルに外出時間を加算する
                    $out_time_in_ext = $this->getOutTimeInTargetTime4(
                        $p_time_ext['StartTime'],
                        $p_time_ext['EndTime'],
                        $this->calc_time['OUT2'],
                        $this->calc_time['IN2']
                    );
                    $this->total_out_time_by_ext[$p_time_ext['Cd']] += $out_time_in_ext;
                }
            }
        } elseif ($this->work_ptn->DUTY_CLS_CD == "01" && !$has_period_dcls) {
            // 職務種別区分 = 01:時間数、勤怠項目別の職務種別がすべて"01"(時間数)

            // 勤怠項目別外出時間退避用ハッシュテーブルに"9999"をキーに項目を追加する
            // 職務種別が"01:時間数"のときは、勤怠項目別に外出時間を保持する必要がないため、"9999"固定のキーを使用する
            $this->total_out_time_by_work["9999"] = 0;
            $out_time_in_interval = 0;

            if ($this->calc_proc_flg['IsOut1Time']) {
                // 外出１の時間算出をし勤怠項目別外出時間退避用ハッシュテーブルに外出時間を加算する
                $out_time_in_work = $this->getOutTimeInTargetTime2($this->calc_time['OUT1'], $this->calc_time['IN1']);
                // 外出１の時刻範囲内にある隙間時間取得
                $out_time_in_interval = $this->getOutTimeInIntervalTime(1);
                // 外出時間から隙間時間を引く
                $out_time_in_work -= $out_time_in_interval;

                $this->total_out_time_by_work["9999"] += $out_time_in_work;
                // 外出１時間合計
                $total_out1_time += $out_time_in_work;
            }

            if ($this->calc_proc_flg['IsOut2Time']) {
                // 外出２の時間算出をし勤怠項目別外出時間退避用ハッシュテーブルに外出時間を加算する
                $out_time_in_work = $this->getOutTimeInTargetTime2($this->calc_time['OUT2'], $this->calc_time['IN2']);
                // 外出２の時刻範囲内にある隙間時間取得
                $out_time_in_interval = $this->getOutTimeInIntervalTime(2);
                // 外出時間から隙間時間を引く
                $out_time_in_work -= $out_time_in_interval;

                $this->total_out_time_by_work["9999"] += $out_time_in_work;
                // 外出２時間合計
                $total_out2_time += $out_time_in_work;
            }


            // 割増対象別外出時間を算出し、割増対象別外出時間退避用ハッシュテーブルを作成する
            foreach ($this->work_ptn_p_time_ext_list as $p_time_ext) {
                // 割増対象別外出時間退避用ハッシュテーブルに該当する割増対象コードが存在しない場合は、項目を追加する
                if (!key_exists($p_time_ext['Cd'], $this->total_out_time_by_ext)) {
                    $this->total_out_time_by_ext[$p_time_ext['Cd']] = 0;
                }

                // 割増時刻の調整
                $ext_time_range = self::TIME_RANGE_TYPE;
                $ext_time_in_regular_work = false;
                $ext_time_range['START'] = $p_time_ext['StartTime'];
                $ext_time_range['END'] = $p_time_ext['EndTime'];
                $ext_time_in_regular_work = $this->adjustExtTimeRange($ext_time_range);

                if ($this->calc_proc_flg['IsOut1Time'] && $ext_time_in_regular_work) {
                    // 外出１の時間算出をし割増対象別外出時間退避用ハッシュテーブルに外出時間を加算する
                    $out_time_in_ext = $this->getOutTimeInTargetTime4(
                        $ext_time_range['START'],
                        $ext_time_range['END'],
                        $this->calc_time['OUT1'],
                        $this->calc_time['IN1']
                    );
                    $this->total_out_time_by_ext[$p_time_ext['Cd']] += $out_time_in_ext;
                }

                if ($this->calc_proc_flg['IsOut2Time'] && $ext_time_in_regular_work) {
                    // 外出２の時間算出をし割増対象別外出時間退避用ハッシュテーブルに外出時間を加算する
                    $out_time_in_ext = $this->getOutTimeInTargetTime4(
                        $ext_time_range['START'],
                        $ext_time_range['END'],
                        $this->calc_time['OUT2'],
                        $this->calc_time['IN2']
                    );
                    $this->total_out_time_by_ext[$p_time_ext['Cd']] += $out_time_in_ext;
                }
            }
        } elseif ($this->work_ptn->DUTY_CLS_CD == "01" && $has_period_dcls) {
            // 職務種別区分 = 01:時間数、勤怠項目別の職務種別に"00"(時間帯)が1件以上含まれる

            // 勤怠項目別外出時間退避用ハッシュテーブルに"9999"をキーに項目を追加する
            // 職務種別が"01:時間数"のときは、勤怠項目別に外出時間を保持する必要がないため、"9999"固定のキーを使用する
            $this->total_out_time_by_work["9999"] = 0;

            $out_time_in_interval = 0;

            if ($this->calc_proc_flg['IsOut1Time']) {
                // 外出１の時間算出をし勤怠項目別外出時間退避用ハッシュテーブルに外出時間を加算する
                $out_time_in_work = $this->getOutTimeInTargetTime2($this->calc_time['OUT1'], $this->calc_time['IN1']);
                // 外出１の時刻範囲内にある隙間時間取得
                $out_time_in_interval = $this->getOutTimeInIntervalTime(1);
                // 外出時間から隙間時間を引く
                $out_time_in_work -= $out_time_in_interval;

                $this->total_out_time_by_work["9999"] += $out_time_in_work;
                // 外出１時間合計
                $total_out1_time += $out_time_in_work;
            }

            if ($this->calc_proc_flg['IsOut2Time']) {
                // 外出２の時間算出をし勤怠項目別外出時間退避用ハッシュテーブルに外出時間を加算する
                $out_time_in_work = $this->getOutTimeInTargetTime2($this->calc_time['OUT2'], $this->calc_time['IN2']);
                // 外出２の時刻範囲内にある隙間時間取得
                $out_time_in_interval = $this->getOutTimeInIntervalTime(2);
                // 外出時間から隙間時間を引く
                $out_time_in_work -= $out_time_in_interval;

                $this->total_out_time_by_work["9999"] += $out_time_in_work;
                // 外出２時間合計
                $total_out2_time += $out_time_in_work;
            }

            // 勤怠項目毎に外出時間を算出
            foreach ($this->work_ptn_n_time_wk_list as $n_time_wk) {
                // 勤怠項目別職務種別が"01"(時間数)の場合は処理を飛ばす
                if ($n_time_wk['DclsCd'] == "01") {
                    continue;
                }

                // 勤怠項目別外出時間退避用ハッシュテーブルに該当する勤怠項目コードが存在しない場合は、項目を追加する
                if (!key_exists($n_time_wk['Cd'], $this->total_out_time_by_work)) {
                    $this->total_out_time_by_work[$n_time_wk['Cd']] = 0;
                }

                if ($this->calc_proc_flg['IsOut1Time']) {
                    // 外出１の時間算出をし勤怠項目別外出時間退避用ハッシュテーブルに外出時間を加算する
                    $out_time_in_work = $this->getOutTimeInNTimeWork(
                        $n_time_wk['StartPTime'],
                        $n_time_wk['EndPTime'],
                        $this->calc_time['OUT1'],
                        $this->calc_time['IN1']
                    );
                    $this->total_out_time_by_work[$n_time_wk['Cd']] += $out_time_in_work;
                    // 勤怠項目別外出時間を総外出時間から引く
                    $this->total_out_time_by_work["9999"] -= $out_time_in_work;
                }

                if ($this->calc_proc_flg['IsOut2Time']) {
                    // 外出２の時間算出をし勤怠項目別外出時間退避用ハッシュテーブルに外出時間を加算する
                    $out_time_in_work = $this->getOutTimeInNTimeWork(
                        $n_time_wk['StartPTime'],
                        $n_time_wk['EndPTime'],
                        $this->calc_time['OUT2'],
                        $this->calc_time['IN2']
                    );
                    $this->total_out_time_by_work[$n_time_wk['Cd']] += $out_time_in_work;
                    // 勤怠項目別外出時間を総外出時間から引く
                    $this->total_out_time_by_work["9999"] -= $out_time_in_work;
                }
            }

            // 割増対象別外出時間を算出し、割増対象別外出時間退避用ハッシュテーブルを作成する
            foreach ($this->work_ptn_p_time_ext_list as $p_time_ext) {
                // 割増対象別外出時間退避用ハッシュテーブルに該当する割増対象コードが存在しない場合は、項目を追加する
                if (!key_exists($p_time_ext['Cd'], $this->total_out_time_by_ext)) {
                    $this->total_out_time_by_ext[$p_time_ext['Cd']] = 0;
                }

                // 割増時刻の調整
                $ext_time_range = self::TIME_RANGE_TYPE;
                $ext_time_in_regular_work = false;
                $ext_time_range['START'] = $p_time_ext['StartTime'];
                $ext_time_range['END'] = $p_time_ext['EndTime'];
                $ext_time_in_regular_work = $this->adjustExtTimeRange($ext_time_range);

                if ($this->calc_proc_flg['IsOut1Time'] && $ext_time_in_regular_work) {
                    // 外出１の時間算出をし割増対象別外出時間退避用ハッシュテーブルに外出時間を加算する
                    $out_time_in_ext = $this->getOutTimeInTargetTime4(
                        $ext_time_range['START'],
                        $ext_time_range['END'],
                        $this->calc_time['OUT1'],
                        $this->calc_time['IN1']
                    );
                    $this->total_out_time_by_ext[$p_time_ext['Cd']] += $out_time_in_ext;
                }

                if ($this->calc_proc_flg['IsOut2Time']) {
                    // 外出２の時間算出をし割増対象別外出時間退避用ハッシュテーブルに外出時間を加算する
                    $out_time_in_ext = $this->getOutTimeInTargetTime4(
                        $ext_time_range['START'],
                        $ext_time_range['END'],
                        $this->calc_time['OUT2'],
                        $this->calc_time['IN2']
                    );
                    $this->total_out_time_by_ext[$p_time_ext['Cd']] += $out_time_in_ext;
                }
            }
        }

        // 外出１時間、外出２時間の合計
        $total_out_time = $total_out1_time + $total_out2_time;

        // 出退勤端数処理区分 = 00:時間 のとき、外出時間の端数処理を行う
        if ($this->fraction->FRACTION_CLS_CD == "00") {
            // 外出時間の端数処理
            if (!is_null($this->fraction->OTHR_UNDER_MI)) {
                $total_out_time = $this->calcFractionMinute(
                    $total_out_time,
                    $this->fraction->OTHR_UNDER_MI,
                    $this->fraction->OTHR_FRC_CLS_CD
                );
            }
        }

        // 就業情報の外出時間に登録
        $out_time_hm = $this->convertMinuteToTime($total_out_time);
        $this->work->OUT_TIME_HH = $out_time_hm['Hour'];
        $this->work->OUT_TIME_MI = $out_time_hm['Minute'];
    }

    /**
     *  就業情報の各勤怠項目別時間を設定します。
     *  職務種別区分"01"(時間数)の処理を変更。
     *  勤怠項目別職務種別に"00"(時間帯)が含まれるケース(Case5,Case6)への分岐を追加。
     *  </history>
     */
    private function setWorkTime()
    {
        // DUTY_CLS_CD(職務種別区分)      : 00(時間帯) / 01(時間数)
        // BREAK_CLS_CD(休憩時間設定区分) : 00(時間帯) / 01(時間数) / 02(時間毎)

        if ($this->work_ptn->DUTY_CLS_CD == "00" && $this->work_ptn->BREAK_CLS_CD == "00") {
            // 勤怠項目別時間計算(時間帯・時間帯)
            $this->setWorkTimeCase1();
        } elseif ($this->work_ptn->DUTY_CLS_CD == "00" && $this->work_ptn->BREAK_CLS_CD <> "00") {
            // 勤怠項目別時間計算(時間帯・時間数/時間毎)
            $this->setWorkTimeCase2();
        } elseif ($this->work_ptn->DUTY_CLS_CD == "01") {
            // 勤務体系情報の 時間数・勤怠項目CD & 時間範囲リストをLinqを使って、勤怠項目別の職務種別が"00"(時間帯)の件数を取得し、$has_period_dclsの値を設定。
            // 職務種別が時間数で、勤怠項目別の職務種別に時間帯が設定されているか否か。true：時間帯に設定されている勤怠項目が1件以上ある。false：時間帯に設定されている勤怠項目が0件。
            $has_period_dcls = false;
            $period_dcls_cnt = $this->work_ptn_n_time_wk_list->where('DclsCd', '00')->count();
            if (1 <= $period_dcls_cnt) {
                $has_period_dcls = true;
            }

            if (!$has_period_dcls && $this->work_ptn->BREAK_CLS_CD == "00") {
                // 勤怠項目別時間計算(時間数(勤怠項目別職務種別が時間数のみ)・時間帯)
                $this->setWorkTimeCase3();
            } elseif (!$has_period_dcls && $this->work_ptn->BREAK_CLS_CD <> "00") {
                // 勤怠項目別時間計算(時間数(勤怠項目別職務種別が時間数のみ)・時間数/時間毎)
                $this->setWorkTimeCase4();
            } elseif ($has_period_dcls && $this->work_ptn->BREAK_CLS_CD == "00") {
                // 勤怠項目別時間計算(時間数(勤怠項目別職務種別に時間帯が含まれる)・時間帯)
                $this->setWorkTimeCase5();
            } elseif ($has_period_dcls && $this->work_ptn->BREAK_CLS_CD <> "00") {
                // 勤怠項目別時間計算(時間数(勤怠項目別職務種別に時間帯が含まれる)・時間数/時間毎)
                $this->setWorkTimeCase6();
            }
        }
    }

    /**
     *  勤怠項目別時間計算(時間帯・時間帯)
     *  勤務体系情報.遅刻算出区分(MT05_WORKPTN.RSV3_CLS_CD)が"01"(する)のときのみ、遅刻時間を設定する。
     *  勤務体系情報.早退算出区分(MT05_WORKPTN.RSV4_CLS_CD)が"01"(する)のときのみ、早退時間を設定する。
     *  </history>
     *  TR01.RSV1_TIME_HH, RSV1_TIME_MIに休憩時間を登録
     *  </history>
     */
    private function setWorkTimeCase1()
    {
        $total_brk_time_minute = 0;   // 総休憩時間(分単位)

        // 勤務体系情報に登録されている勤怠項目分ループ
        foreach ($this->work_ptn_p_time_wk_list as $p_time_wk) {
            $calc_p_time_wk = self::TIME_RANGE_TYPE;        // 計算用勤怠項目時刻範囲

            // 計算用勤怠項目時刻に勤怠項目時刻をセット
            $calc_p_time_wk['START'] = $p_time_wk['StartTime'];
            $calc_p_time_wk['END'] = $p_time_wk['EndTime'];

            // 勤怠項目時刻内に出退勤時刻が含まれない
            if ($this->calc_time['LEV']->lte($p_time_wk['StartTime'])
                    || $p_time_wk['EndTime']->lte($this->calc_time['OFC'])) {
                continue;
            }
            // 勤怠項目時刻内での出勤時刻を取得
            if ($p_time_wk['StartTime']->lte($this->calc_time['OFC'])
                    && $this->calc_time['OFC']->lt($p_time_wk['EndTime'])) {
                $calc_p_time_wk['START'] = $this->calc_time['OFC'];
            }
            // 勤怠項目時刻内での退出時刻を取得
            if ($p_time_wk['StartTime']->lt($this->calc_time['LEV'])
                    && $this->calc_time['LEV']->lte($p_time_wk['EndTime'])) {
                $calc_p_time_wk['END'] = $this->calc_time['LEV'];
            }


            // ********************************************************************************
            //  勤務時間算出処理
            // ********************************************************************************

            // 出勤時間、残業時間算出処理で共通で使用
            $out_time_minute = 0;    // 外出時間(分単位)
            $brk_time_minute = 0;    // 休憩時間(分単位)

            // 外出時間取得  ※外出時間算出時に勤怠項目別の外出時間を退避したハッシュテーブルより勤怠項目CDをキーに取得
            if (key_exists($p_time_wk['Cd'], $this->total_out_time_by_work)) {
                $out_time_minute = $this->total_out_time_by_work[$p_time_wk['Cd']];
            }

            // 勤怠項目が[就業時間]の場合、出勤、遅刻、早退、割増時間の算出を行う
            if ($this->mt94->isRegularWork($p_time_wk['Cd'])) {
                $work_time_minute = 0;   // 出勤時間(分単位)
                $tard_time_minute = 0;   // 遅刻時間(分単位)
                $leave_time_minute = 0;  // 早退時間(分単位)

                // 休憩時間取得
                $brk_time_minute = $this->getPBrkTimeInTargetTime($p_time_wk['StartTime'], $p_time_wk['EndTime']);
                $total_brk_time_minute += $brk_time_minute;

                // **************************************************
                //  遅刻時間算出
                // **************************************************
                // 遅刻時間(分)取得  ※遅刻時間を算出するときは、計算用勤怠項目時刻ではなく勤怠項目時刻を使用する。
                $tard_time_minute = $this->getTardTime($p_time_wk['StartTime']);

                // 端数処理情報.出退勤端数処理区分 = 00:時間 かつ 遅刻の端数処理区分が設定されている場合
                if ($this->fraction->FRACTION_CLS_CD == "00" && !is_null($this->fraction->LTHR_UNDER_MI)) {
                    // 遅刻時間の端数処理
                    $tard_time_minute = $this->calcFractionMinute(
                        $tard_time_minute,
                        $this->fraction->LTHR_UNDER_MI,
                        $this->fraction->LTHR_FRC_CLS_CD
                    );
                }

                // 勤務体系の遅刻算出区分が"01"(する)の場合、就業情報.遅刻時間 登録
                if ($this->work_ptn->RSV3_CLS_CD == "01") {
                    $tard_time = $this->convertMinuteToTime($tard_time_minute);   // 遅刻時間を時間と分に分ける
                    $this->work->TARD_TIME_HH = $tard_time['Hour'];
                    $this->work->TARD_TIME_MI = $tard_time['Minute'];
                }

                // **************************************************
                //  早退時間算出
                // **************************************************
                // 早退時間(分)取得  ※早退時間を算出するときは、計算用勤怠項目時刻ではなく勤怠項目時刻を使用する。
                $leave_time_minute = $this->getLeaveTime($p_time_wk['EndTime']);

                // 端数処理情報.出退勤端数処理区分 = 00:時間 かつ 早退の端数処理区分が設定されている場合
                if ($this->fraction->FRACTION_CLS_CD == "00" && !is_null($this->fraction->ERHR_UNDER_MI)) {
                    // 早退時間の端数処理
                    $leave_time_minute = $this->calcFractionMinute(
                        $leave_time_minute,
                        $this->fraction->ERHR_UNDER_MI,
                        $this->fraction->ERHR_FRC_CLS_CD
                    );
                }

                // 勤務体系の早退算出区分が"01"(する)の場合、就業情報.早退時間 登録
                if ($this->work_ptn->RSV4_CLS_CD == "01") {
                    $leave_time = $this->convertMinuteToTime($leave_time_minute); // 早退時間を時間と分に分ける
                    $this->work->LEAVE_TIME_HH = $leave_time['Hour'];
                    $this->work->LEAVE_TIME_MI = $leave_time['Minute'];
                }


                // **************************************************
                //  出勤時間算出
                // **************************************************
                // 出勤時間
                $work_time_minute = floor($p_time_wk['StartTime']->diffInMinutes($p_time_wk['EndTime']));
                $work_time_minute -= $out_time_minute;     // 外出時間を引く
                $work_time_minute -= $brk_time_minute;     // 休憩時間を引く
                $work_time_minute -= $tard_time_minute;    // 遅刻時間を引く
                $work_time_minute -= $leave_time_minute;   // 早退時間を引く
                if ($work_time_minute < 0) {
                    $work_time_minute = 0;
                }

                // 端数処理情報.出退勤端数処理区分 = 00:時間 かつ 出勤の端数処理区分が設定されている場合
                if ($this->fraction->FRACTION_CLS_CD == "00" && !is_null($this->fraction->WTHR_UNDER_MI)) {
                    // 出勤時間の端数処理
                    $work_time_minute = $this->calcFractionMinute(
                        $work_time_minute,
                        $this->fraction->WTHR_UNDER_MI,
                        $this->fraction->WTHR_FRC_CLS_CD
                    );
                }

                // 出勤時間を時間と分に分ける
                $work_time = $this->convertMinuteToTime($work_time_minute);

                // 就業情報.出勤時間 登録
                $this->work->WORK_TIME_HH = $work_time['Hour'];
                $this->work->WORK_TIME_MI = $work_time['Minute'];


                // **************************************************
                //  割増対象時間算出
                // **************************************************
                foreach ($this->work_ptn_p_time_ext_list as $p_time_ext) {
                    $ex_time_minute = 0; // 割増対象時間(分単位)

                    // 割増対象時刻内に出退勤時刻が含まれない
                    if ($p_time_ext['EndTime']->lte($this->calc_time['OFC'])
                            || $this->calc_time['LEV']->lte($p_time_ext['StartTime'])) {
                        continue;
                    }
                    // 割増対象時刻内での出勤時刻を取得
                    if ($p_time_ext['StartTime']->lte($this->calc_time['OFC'])
                            && $this->calc_time['OFC']->lt($p_time_ext['EndTime'])) {
                        $p_time_ext['StartTime'] = $this->calc_time['OFC'];
                    }
                    // 割増対象時刻内での退出時刻を取得
                    if ($p_time_ext['StartTime']->lt($this->calc_time['LEV'])
                            && $this->calc_time['LEV']->lte($p_time_ext['EndTime'])) {
                        $p_time_ext['EndTime'] = $this->calc_time['LEV'];
                    }

                    // 割増対象時間(分)取得
                    $ex_time_minute = $this->getExTime(
                        $p_time_ext['Cd'],
                        $p_time_ext['StartTime'],
                        $p_time_ext['EndTime']
                    );

                    // 端数処理情報.出退勤端数処理区分 = 00:時間
                    if ($this->fraction->FRACTION_CLS_CD == "00") {
                        // 端数処理情報の割増対象コードと勤務体系情報の割増対象コードが一致する、分未満、端数処理区分コードを取得
                        foreach ($this->frc_ext_list as $frc_ext) {
                            if ($frc_ext['Cd'] == $p_time_ext['Cd']) {
                                // 割増対象の端数処理
                                $ex_time_minute = $this->calcFractionMinute(
                                    $ex_time_minute,
                                    $frc_ext['UnderMi'],
                                    $frc_ext['FrcClsCd']
                                );
                                break;
                            }
                        }
                    }

                    // 割増対象時間を時間と分に分ける
                    $ex_time = $this->convertMinuteToTime($ex_time_minute);
                    switch ($p_time_ext['Cd']) {
                        case "200":
                            // 就業情報.割増項目１時間 登録
                            $this->work->EXT1_TIME_HH += $ex_time['Hour'];
                            $this->work->EXT1_TIME_MI += $ex_time['Minute'];
                            break;

                        case "201":
                            // 就業情報.割増項目２時間 登録
                            $this->work->EXT2_TIME_HH += $ex_time['Hour'];
                            $this->work->EXT2_TIME_MI += $ex_time['Minute'];
                            break;

                        case "202":
                            // 就業情報.割増項目３時間 登録
                            $this->work->EXT3_TIME_HH += $ex_time['Hour'];
                            $this->work->EXT3_TIME_MI += $ex_time['Minute'];
                            break;
                    }
                }
            } else {
                // **************************************************
                // 残業項目時間算出
                // **************************************************
                $over_time_minute = 0;   // 残業項目時間

                // 休憩時間取得
                $brk_time_minute = $this->getPBrkTimeInTargetTime($calc_p_time_wk['START'], $calc_p_time_wk['END']);
                $total_brk_time_minute += $brk_time_minute;

                // 勤怠時間
                $over_time_minute = floor($calc_p_time_wk['START']->diffInMinutes($calc_p_time_wk['END']));
                $over_time_minute -= $out_time_minute;     // 外出時間を引く
                $over_time_minute -= $brk_time_minute;     // 休憩時間を引く

                // 端数処理情報.出退勤端数処理区分 = 00:時間
                if ($this->fraction->FRACTION_CLS_CD == "00") {
                    // 端数処理情報の残業項目コードと勤務体系情報の残業項目コードが一致する、分未満、端数処理区分コードを取得
                    foreach ($this->frc_ovtm_list as $frc_ovtm) {
                        if ($frc_ovtm['Cd'] == $p_time_wk['Cd']) {
                            // 残業項目時間の端数処理
                            $over_time_minute = $this->calcFractionMinute(
                                $over_time_minute,
                                $frc_ovtm['UnderMi'],
                                $frc_ovtm['FrcClsCd']
                            );
                        }
                    }
                }

                // 残業項目時間を時間と分に分ける
                $over_time = $this->convertMinuteToTime($over_time_minute);
                switch ($p_time_wk['Cd']) {
                    case "100":
                        // 就業情報.残業項目１時間(普通残業時間) 登録
                        $this->work->OVTM1_TIME_HH = $over_time['Hour'];
                        $this->work->OVTM1_TIME_MI = $over_time['Minute'];
                        break;

                    case "101":
                        // 就業情報.残業項目２時間(深夜残業時間) 登録
                        $this->work->OVTM2_TIME_HH = $over_time['Hour'];
                        $this->work->OVTM2_TIME_MI = $over_time['Minute'];
                        break;

                    case "102":
                        // 就業情報.残業項目３時間(休日残業時間) 登録
                        $this->work->OVTM3_TIME_HH = $over_time['Hour'];
                        $this->work->OVTM3_TIME_MI = $over_time['Minute'];
                        break;

                    case "103":
                        // 就業情報.残業項目４時間(休日深夜残業時間) 登録
                        $this->work->OVTM4_TIME_HH = $over_time['Hour'];
                        $this->work->OVTM4_TIME_MI = $over_time['Minute'];
                        break;

                    case "104":
                        // 就業情報.残業項目５時間 登録
                        $this->work->OVTM5_TIME_HH = $over_time['Hour'];
                        $this->work->OVTM5_TIME_MI = $over_time['Minute'];
                        break;

                    case "105":
                        // 就業情報.残業項目６時間 登録
                        $this->work->OVTM6_TIME_HH = $over_time['Hour'];
                        $this->work->OVTM6_TIME_MI = $over_time['Minute'];
                        break;
                }
            }
        }

        // 休憩時間を登録
        $brk_time = $this->convertMinuteToTime($total_brk_time_minute);
        $this->work->RSV1_TIME_HH = $brk_time['Hour'];
        $this->work->RSV1_TIME_MI = $brk_time['Minute'];

        // 残業時間を集計
        $total_over_time = 0;
        $total_over_time += $this->convertTimeToMinute($this->work->OVTM1_TIME_HH, $this->work->OVTM1_TIME_MI); // 残業項目１
        $total_over_time += $this->convertTimeToMinute($this->work->OVTM2_TIME_HH, $this->work->OVTM2_TIME_MI); // 残業項目２
        $total_over_time += $this->convertTimeToMinute($this->work->OVTM3_TIME_HH, $this->work->OVTM3_TIME_MI); // 残業項目３
        $total_over_time += $this->convertTimeToMinute($this->work->OVTM4_TIME_HH, $this->work->OVTM4_TIME_MI); // 残業項目４
        $total_over_time += $this->convertTimeToMinute($this->work->OVTM5_TIME_HH, $this->work->OVTM5_TIME_MI); // 残業項目５
        $total_over_time += $this->convertTimeToMinute($this->work->OVTM6_TIME_HH, $this->work->OVTM6_TIME_MI); // 残業項目６

        // 残業未対応時間 判定処理
        if ($total_over_time < $this->over_tm_lmt->NO_OVERTM_MI) {
            // 残業時間の合計が残業未対応時間未満の場合は残業項目時間に0をセット
            $this->work->OVTM1_TIME_HH = 0;   // 残業項目１
            $this->work->OVTM1_TIME_MI = 0;
            $this->work->OVTM2_TIME_HH = 0;   // 残業項目２
            $this->work->OVTM2_TIME_MI = 0;
            $this->work->OVTM3_TIME_HH = 0;   // 残業項目３
            $this->work->OVTM3_TIME_MI = 0;
            $this->work->OVTM4_TIME_HH = 0;   // 残業項目４
            $this->work->OVTM4_TIME_MI = 0;
            $this->work->OVTM5_TIME_HH = 0;   // 残業項目５
            $this->work->OVTM5_TIME_MI = 0;
            $this->work->OVTM6_TIME_HH = 0;   // 残業項目６
            $this->work->OVTM6_TIME_MI = 0;
        }
    }

    /**
     *  勤怠項目別時間計算(時間帯・時間数/時間毎)
     *  勤務体系情報.遅刻算出区分(MT05_WORKPTN.RSV3_CLS_CD)が"01"(する)のときのみ、遅刻時間を設定する。
     *  勤務体系情報.早退算出区分(MT05_WORKPTN.RSV4_CLS_CD)が"01"(する)のときのみ、早退時間を設定する。
     *  </history>
     *  TR01.RSV1_TIME_HH, RSV1_TIME_MIに休憩時間を登録
     *  </history>
     */
    private function setWorkTimeCase2()
    {
        // 勤務体系情報に登録されている勤怠項目分ループ
        foreach ($this->work_ptn_p_time_wk_list as $p_time_wk) {
            $calc_p_time_wk = self::TIME_RANGE_TYPE;        // 計算用勤怠項目時刻範囲

            // 計算用勤怠項目時刻に勤怠項目時刻をセット
            $calc_p_time_wk['START'] = $p_time_wk['StartTime'];
            $calc_p_time_wk['END'] = $p_time_wk['EndTime'];

            // 勤怠項目時刻内に出退勤時刻が含まれない
            if ($this->calc_time['LEV']->lte($p_time_wk['StartTime'])
                    || $p_time_wk['EndTime']->lte($this->calc_time['OFC'])) {
                continue;
            }
            // 勤怠項目時刻内での出勤時刻を取得
            if ($p_time_wk['StartTime']->lte($this->calc_time['OFC'])
                    && $this->calc_time['OFC']->lt($p_time_wk['EndTime'])) {
                $calc_p_time_wk['START'] = $this->calc_time['OFC'];
            }
            // 勤怠項目時刻内での退出時刻を取得
            if ($p_time_wk['StartTime']->lt($this->calc_time['LEV'])
                    && $this->calc_time['LEV']->lte($p_time_wk['EndTime'])) {
                $calc_p_time_wk['END'] = $this->calc_time['LEV'];
            }

            // ********************************************************************************
            //  勤務時間算出処理
            // ********************************************************************************
            // 出勤時間、残業時間算出処理で共通で使用

            $out_time_minute = 0;    // 外出時間(分単位)

            // 外出時間取得  ※外出時間算出時に勤怠項目別の外出時間を退避したハッシュテーブルより勤怠項目CDをキーに取得
            if (key_exists($p_time_wk['Cd'], $this->total_out_time_by_work)) {
                $out_time_minute = $this->total_out_time_by_work[$p_time_wk['Cd']];
            }

            // 勤怠項目が[就業時間]の場合、出勤、遅刻、早退、割増時間の算出を行う
            if ($this->mt94->isRegularWork($p_time_wk['Cd'])) {
                $work_time_minute = 0;   // 出勤時間(分単位)
                $tard_time_minute = 0;   // 遅刻時間(分単位)
                $leave_time_minute = 0;  // 早退時間(分単位)
                $brk_time_minute = 0;    // 休憩時間(分単位)

                // **************************************************
                //  遅刻時間算出
                // **************************************************
                // 遅刻時間(分)取得  ※遅刻時間を算出するときは、計算用勤怠項目時刻ではなく勤怠項目時刻を使用する。
                $tard_time_minute = $this->getTardTime($p_time_wk['StartTime']);

                // 端数処理情報.出退勤端数処理区分 = 00:時間 かつ 遅刻の端数処理区分が設定されている場合
                if ($this->fraction->FRACTION_CLS_CD == "00" && !is_null($this->fraction->LTHR_UNDER_MI)) {
                    // 遅刻時間の端数処理
                    $tard_time_minute = $this->calcFractionMinute(
                        $tard_time_minute,
                        $this->fraction->LTHR_UNDER_MI,
                        $this->fraction->LTHR_FRC_CLS_CD
                    );
                }

                // 勤務体系の遅刻算出区分が"01"(する)の場合、就業情報.遅刻時間 登録
                if ($this->work_ptn->RSV3_CLS_CD == "01") {
                    $tard_time = $this->convertMinuteToTime($tard_time_minute);   // 遅刻時間を時間と分に分ける
                    $this->work->TARD_TIME_HH = $tard_time['Hour'];
                    $this->work->TARD_TIME_MI = $tard_time['Minute'];
                }


                // **************************************************
                //  早退時間算出
                // **************************************************
                // 早退時間(分)取得  ※早退時間を算出するときは、計算用勤怠項目時刻ではなく勤怠項目時刻を使用する。
                $leave_time_minute = $this->getLeaveTime($p_time_wk['EndTime']);

                // 端数処理情報.出退勤端数処理区分 = 00:時間 かつ 早退の端数処理区分が設定されている場合
                if ($this->fraction->FRACTION_CLS_CD == "00" && !is_null($this->fraction->ERHR_UNDER_MI)) {
                    // 早退時間の端数処理
                    $leave_time_minute = $this->calcFractionMinute(
                        $leave_time_minute,
                        $this->fraction->ERHR_UNDER_MI,
                        $this->fraction->ERHR_FRC_CLS_CD
                    );
                }

                // 勤務体系の早退算出区分が"01"(する)の場合、就業情報.早退時間 登録
                if ($this->work_ptn->RSV4_CLS_CD == "01") {
                    $leave_time = $this->convertMinuteToTime($leave_time_minute); // 早退時間を時間と分に分ける
                    $this->work->LEAVE_TIME_HH = $leave_time['Hour'];
                    $this->work->LEAVE_TIME_MI = $leave_time['Minute'];
                }


                // **************************************************
                //  出勤時間算出
                // **************************************************
                // 出勤時間
                $work_time_minute = floor($p_time_wk['StartTime']->diffInMinutes($p_time_wk['EndTime']));
                $work_time_minute -= $out_time_minute;     // 外出時間を引く
                $work_time_minute -= $tard_time_minute;    // 遅刻時間を引く
                $work_time_minute -= $leave_time_minute;   // 早退時間を引く


                // 休憩時間取得
                if ($this->work_ptn->BREAK_CLS_CD == "01") {      // 休憩時間区分 == 01:時間数
                    $brk_time_minute = $this->work_ptn->NBRK_TIME * 60 + $this->work_ptn->NBRK_MINUTE;
                } elseif ($this->work_ptn->BREAK_CLS_CD == "02") {  // 休憩時間区分 = 02:時間毎
                    $break_period = $this->work_ptn->EBRK_PTIME * 60;
                    $break_minute = $this->work_ptn->EBRK_MINUTE;
                    $wk_time = 0;
                    do {
                        $wk_time += $break_period;
                        // 合計した休憩区切り時間が勤務時間を超えるとき
                        if ($work_time_minute <= $wk_time) {
                            break;
                        }

                        $brk_time_minute += $break_minute;
                        $wk_time += $break_minute;
                        // 合計した休憩区切り時間と休憩時間の分の合計が勤務時間を超えるとき
                        if ($work_time_minute <= $wk_time) {
                            $brk_time_minute -= $wk_time - $work_time_minute;
                            break;
                        }
                    } while (1);
                }

                $work_time_minute -= $brk_time_minute;     // 休憩時間を引く
                if ($work_time_minute < 0) {
                    $work_time_minute = 0;
                }

                // 休憩時間
                $brk_time = $this->convertMinuteToTime($brk_time_minute);
                $this->work->RSV1_TIME_HH = $brk_time['Hour'];
                $this->work->RSV1_TIME_MI = $brk_time['Minute'];

                // 端数処理情報.出退勤端数処理区分 = 00:時間 かつ 早退の端数処理区分が設定されている場合
                if ($this->fraction->FRACTION_CLS_CD == "00" && !is_null($this->fraction->WTHR_UNDER_MI)) {
                    // 出勤時間の端数処理
                    $work_time_minute = $this->calcFractionMinute(
                        $work_time_minute,
                        $this->fraction->WTHR_UNDER_MI,
                        $this->fraction->WTHR_FRC_CLS_CD
                    );
                }

                // 出勤時間を時間と分に分ける
                $work_time = $this->convertMinuteToTime($work_time_minute);

                // 就業情報.出勤時間 登録
                $this->work->WORK_TIME_HH = $work_time['Hour'];
                $this->work->WORK_TIME_MI = $work_time['Minute'];


                // **************************************************
                //  割増対象時間算出
                // **************************************************
                foreach ($this->work_ptn_p_time_ext_list as $p_time_ext) {
                    $ex_time_minute = 0; // 割増対象時間(分単位)

                    // 割増対象時刻内に出退勤時刻が含まれない
                    if ($p_time_ext['EndTime']->lte($this->calc_time['OFC'])
                            || $this->calc_time['LEV']->lte($p_time_ext['StartTime'])) {
                        continue;
                    }
                    // 割増対象時刻内での出勤時刻を取得
                    if ($p_time_ext['StartTime']->lte($this->calc_time['OFC'])
                            && $this->calc_time['OFC']->lt($p_time_ext['EndTime'])) {
                        $p_time_ext['StartTime'] = $this->calc_time['OFC'];
                    }
                    // 割増対象時刻内での退出時刻を取得
                    if ($p_time_ext['StartTime']->lt($this->calc_time['LEV'])
                            && $this->calc_time['LEV']->lte($p_time_ext['EndTime'])) {
                        $p_time_ext['EndTime'] = $this->calc_time['LEV'];
                    }

                    // 割増対象時間(分)取得
                    $ex_time_minute = $this->getExTime(
                        $p_time_ext['Cd'],
                        $p_time_ext['StartTime'],
                        $p_time_ext['EndTime']
                    );

                    // 端数処理情報.出退勤端数処理区分 = 00:時間
                    if ($this->fraction->FRACTION_CLS_CD == "00") {
                        // 端数処理情報の割増対象コードと勤務体系情報の割増対象コードが一致する、分未満、端数処理区分コードを取得
                        foreach ($this->frc_ext_list as $frc_ext) {
                            if ($frc_ext['Cd'] == $p_time_ext['Cd']) {
                                // 割増対象の端数処理
                                $ex_time_minute = $this->calcFractionMinute(
                                    $ex_time_minute,
                                    $frc_ext['UnderMi'],
                                    $frc_ext['FrcClsCd']
                                );
                                break;
                            }
                        }
                    }

                    // 割増対象時間を時間と分に分ける
                    $ex_time = $this->convertMinuteToTime($ex_time_minute);
                    switch ($p_time_ext['Cd']) {
                        case "200":
                            // 就業情報.割増項目１時間 登録
                            $this->work->EXT1_TIME_HH += $ex_time['Hour'];
                            $this->work->EXT1_TIME_MI += $ex_time['Minute'];
                            break;

                        case "201":
                            // 就業情報.割増項目２時間 登録
                            $this->work->EXT2_TIME_HH += $ex_time['Hour'];
                            $this->work->EXT2_TIME_MI += $ex_time['Minute'];
                            break;

                        case "202":
                            // 就業情報.割増項目３時間 登録
                            $this->work->EXT3_TIME_HH += $ex_time['Hour'];
                            $this->work->EXT3_TIME_MI += $ex_time['Minute'];
                            break;
                    }
                }
            } else {
                // **************************************************
                // 残業項目時間算出
                // **************************************************
                $over_time_minute = 0;   // 残業項目時間

                // 勤怠時間
                $over_time_minute = floor($calc_p_time_wk['START']->diffInMinutes($calc_p_time_wk['END']));
                $over_time_minute -= $out_time_minute;     // 外出時間を引く


                // 端数処理情報.出退勤端数処理区分 = 00:時間
                if ($this->fraction->FRACTION_CLS_CD == "00") {
                    // 端数処理情報の残業項目コードと勤務体系情報の残業項目コードが一致する、分未満、端数処理区分コードを取得
                    foreach ($this->frc_ovtm_list as $frc_ovtm) {
                        if ($frc_ovtm['Cd'] == $p_time_wk['Cd']) {
                            // 残業項目時間の端数処理
                            $over_time_minute = $this->calcFractionMinute(
                                $over_time_minute,
                                $frc_ovtm['UnderMi'],
                                $frc_ovtm['FrcClsCd']
                            );
                        }
                    }
                }

                // 割増対象時間を時間と分に分ける
                $over_time = $this->convertMinuteToTime($over_time_minute);
                switch ($p_time_wk['Cd']) {
                    case "100":
                        // 就業情報.残業項目１時間(普通残業時間) 登録
                        $this->work->OVTM1_TIME_HH = $over_time['Hour'];
                        $this->work->OVTM1_TIME_MI = $over_time['Minute'];
                        break;

                    case "101":
                        // 就業情報.残業項目２時間(深夜残業時間) 登録
                        $this->work->OVTM2_TIME_HH = $over_time['Hour'];
                        $this->work->OVTM2_TIME_MI = $over_time['Minute'];
                        break;

                    case "102":
                        // 就業情報.残業項目３時間(休日残業時間) 登録
                        $this->work->OVTM3_TIME_HH = $over_time['Hour'];
                        $this->work->OVTM3_TIME_MI = $over_time['Minute'];
                        break;

                    case "103":
                        // 就業情報.残業項目４時間(休日深夜残業時間) 登録
                        $this->work->OVTM4_TIME_HH = $over_time['Hour'];
                        $this->work->OVTM4_TIME_MI = $over_time['Minute'];
                        break;

                    case "104":
                        // 就業情報.残業項目５時間 登録
                        $this->work->OVTM5_TIME_HH = $over_time['Hour'];
                        $this->work->OVTM5_TIME_MI = $over_time['Minute'];
                        break;

                    case "105":
                        // 就業情報.残業項目６時間 登録
                        $this->work->OVTM6_TIME_HH = $over_time['Hour'];
                        $this->work->OVTM6_TIME_MI = $over_time['Minute'];
                        break;
                }
            }
        }

        // 残業時間を集計
        $total_over_time = 0;
        $total_over_time += $this->convertTimeToMinute($this->work->OVTM1_TIME_HH, $this->work->OVTM1_TIME_MI); // 残業項目１
        $total_over_time += $this->convertTimeToMinute($this->work->OVTM2_TIME_HH, $this->work->OVTM2_TIME_MI); // 残業項目２
        $total_over_time += $this->convertTimeToMinute($this->work->OVTM3_TIME_HH, $this->work->OVTM3_TIME_MI); // 残業項目３
        $total_over_time += $this->convertTimeToMinute($this->work->OVTM4_TIME_HH, $this->work->OVTM4_TIME_MI); // 残業項目４
        $total_over_time += $this->convertTimeToMinute($this->work->OVTM5_TIME_HH, $this->work->OVTM5_TIME_MI); // 残業項目５
        $total_over_time += $this->convertTimeToMinute($this->work->OVTM6_TIME_HH, $this->work->OVTM6_TIME_MI); // 残業項目６

        // 残業未対応時間 判定処理
        if ($total_over_time < $this->over_tm_lmt->NO_OVERTM_MI) {
            // 残業時間の合計が残業未対応時間未満の場合は残業項目時間に0をセット
            $this->work->OVTM1_TIME_HH = 0;   // 残業項目１
            $this->work->OVTM1_TIME_MI = 0;
            $this->work->OVTM2_TIME_HH = 0;   // 残業項目２
            $this->work->OVTM2_TIME_MI = 0;
            $this->work->OVTM3_TIME_HH = 0;   // 残業項目３
            $this->work->OVTM3_TIME_MI = 0;
            $this->work->OVTM4_TIME_HH = 0;   // 残業項目４
            $this->work->OVTM4_TIME_MI = 0;
            $this->work->OVTM5_TIME_HH = 0;   // 残業項目５
            $this->work->OVTM5_TIME_MI = 0;
            $this->work->OVTM6_TIME_HH = 0;   // 残業項目６
            $this->work->OVTM6_TIME_MI = 0;
        }
    }

    /**
     *  勤怠項目別時間計算(時間数・時間帯)
     *  ※① 外出時間算出時に勤怠項目別の外出時間を退避したハッシュテーブルより勤怠項目CDをキーに取得
     *
     *  ※② 早退算出条件 : 就業時間よりも勤怠時間が短く、かつ、勤務体系の早退算出区分が[01:する]の場合
     *  勤務体系情報入力で割増時間帯が、職務種別にかかわらず設定できるように仕様変更。
     *  それに伴い、職務種別が"01"時間数でも、割増時間の算出するように変更。
     *  </history>
     *  TR01.RSV1_TIME_HH, RSV1_TIME_MIに休憩時間を登録
     *  </history>
     */
    private function setWorkTimeCase3()
    {
        $work_time_minute = 0;       // 勤務時間(分単位)
        $brk_time_minute = 0;        // 休憩時間(分単位)
        $out_time_minute = 0;        // 外出時間(分単位)

        // 勤務時間取得
        $work_time_minute = floor($this->calc_time['OFC']->diffInMinutes($this->calc_time['LEV']));

        // 休憩時間取得
        $brk_time_minute = $this->getPBrkTimeInTargetTime($this->calc_time['OFC'], $this->calc_time['LEV']);

        // 外出時間取得  ※①
        if (key_exists("9999", $this->total_out_time_by_work)) {
            $out_time_minute = $this->total_out_time_by_work["9999"];
        }

        // 勤務時間から休憩時間、外出時間を引く
        $work_time_minute -= $brk_time_minute;
        $work_time_minute -= $out_time_minute;

        // 休憩時間
        $brk_time = $this->convertMinuteToTime($brk_time_minute);
        $this->work->RSV1_TIME_HH = $brk_time['Hour'];
        $this->work->RSV1_TIME_MI = $brk_time['Minute'];

        // **************************************************
        // 勤怠時間算出
        // **************************************************

        // 勤怠時間を昇順で並び換え
        $n_time_wk_query = $this->work_ptn_n_time_wk_list->sortBy('StartNTime');

        // 開始時刻を退避
        $pre_end_time = $n_time_wk_query->first()['StartNTime'];

        foreach ($n_time_wk_query as $n_time_wk) {
            // 開始時刻と前の終了時間との間があいている場合は就業時間からその分の分を引く
            if ($pre_end_time !== $n_time_wk['StartNTime']) {
                $wk_interval = 0;

                // 勤怠項目間の時間を取得
                $wk_interval = floor($n_time_wk['StartNTime'] - $pre_end_time);

                // 勤怠項目間に間がある場合は就業時間からその分の分を引く
                $work_time_minute -= $wk_interval;

                // 開始時刻と前の終了時間との間で退出しているときは処理を抜ける
                if ($work_time_minute <= 0) {
                    break;
                }
            }

            // 勤怠項目別の勤怠時間を分単位で取得
            $n_time_wk_span = floor($n_time_wk['EndNTime'] - $n_time_wk['StartNTime']);
            $n_time_wk_minute = 0;

            // 対象の勤怠項目内での就業時間を取得
            if ($n_time_wk_span < $work_time_minute) {
                $n_time_wk_minute = $n_time_wk_span;
            } else {
                $n_time_wk_minute = $work_time_minute;
            }

            // 出勤時間

            // 勤怠項目が[就業時間]の場合、早退時間の算出を行う
            if ($this->mt94->isRegularWork($n_time_wk['Cd'])) {
                // **************************************************
                //  出勤時間算出
                // **************************************************
                // 端数処理情報.出退勤端数処理区分 = 00:時間 かつ 出勤の端数処理区分が設定されている場合
                if ($this->fraction->FRACTION_CLS_CD == "00" && !is_null($this->fraction->WTHR_UNDER_MI)) {
                    // 出勤時間の端数処理
                    $n_time_wk_minute = $this->calcFractionMinute(
                        $n_time_wk_minute,
                        $this->fraction->WTHR_UNDER_MI,
                        $this->fraction->WTHR_FRC_CLS_CD
                    );
                }

                // 出勤時間を時間と分に分ける
                $work_time = $this->convertMinuteToTime($n_time_wk_minute);

                // 就業情報.出勤時間 登録
                $this->work->WORK_TIME_HH = $work_time['Hour'];
                $this->work->WORK_TIME_MI = $work_time['Minute'];


                // **************************************************
                //  早退時間算出 ※②
                // **************************************************
                if ($n_time_wk_minute < $n_time_wk_span && $this->work_ptn->NTIME_LEAVE_CLS_CD == "01") {
                    $leave_time_minute = 0;  // 早退時間(分単位)

                    // 早退時間(分)取得
                    $leave_time_minute = $n_time_wk_span - $n_time_wk_minute;

                    // 端数処理情報.出退勤端数処理区分 = 00:時間 かつ 早退の端数処理区分が設定されている場合
                    if ($this->fraction->FRACTION_CLS_CD == "00" && !is_null($this->fraction->ERHR_UNDER_MI)) {
                        // 早退時間の端数処理
                        $leave_time_minute = $this->calcFractionMinute(
                            $leave_time_minute,
                            $this->fraction->ERHR_UNDER_MI,
                            $this->fraction->ERHR_FRC_CLS_CD
                        );
                    }

                    // 早退時間を時間と分に分ける
                    $leave_time = $this->convertMinuteToTime($leave_time_minute);

                    // 就業情報.早退時間 登録
                    $this->work->LEAVE_TIME_HH = $leave_time['Hour'];
                    $this->work->LEAVE_TIME_MI = $leave_time['Minute'];
                }

                // **************************************************
                //  割増対象時間算出
                // **************************************************
                foreach ($this->work_ptn_p_time_ext_list as $p_time_ext) {
                    $ex_time_minute = 0; // 割増対象時間(分単位)

                    // 割増対象時刻内に出退勤時刻が含まれない
                    if ($p_time_ext['EndTime']->lte($this->calc_time['OFC'])
                            || $this->calc_time['LEV']->lte($p_time_ext['StartTime'])) {
                        continue;
                    }
                    // 割増対象時刻内での出勤時刻を取得
                    if ($p_time_ext['StartTime']->lte($this->calc_time['OFC'])
                            && $this->calc_time['OFC']->lt($p_time_ext['EndTime'])) {
                        $p_time_ext['StartTime'] = $this->calc_time['OFC'];
                    }
                    // 割増対象時刻内での退出時刻を取得
                    if ($p_time_ext['StartTime']->lt($this->calc_time['LEV'])
                            && $this->calc_time['LEV']->lte($p_time_ext['EndTime'])) {
                        $p_time_ext['EndTime'] = $this->calc_time['LEV'];
                    }

                    // 割増対象時間(分)取得
                    $ex_time_minute = $this->getExTime(
                        $p_time_ext['Cd'],
                        $p_time_ext['StartTime'],
                        $p_time_ext['EndTime']
                    );

                    // 端数処理情報.出退勤端数処理区分 = 00:時間
                    if ($this->fraction->FRACTION_CLS_CD == "00") {
                        // 端数処理情報の割増対象コードと勤務体系情報の割増対象コードが一致する、分未満、端数処理区分コードを取得
                        foreach ($this->frc_ext_list as $frc_ext) {
                            if ($frc_ext['Cd'] == $p_time_ext['Cd']) {
                                // 割増対象の端数処理
                                $ex_time_minute = $this->calcFractionMinute(
                                    $ex_time_minute,
                                    $frc_ext['UnderMi'],
                                    $frc_ext['FrcClsCd']
                                );
                                break;
                            }
                        }
                    }

                    // 割増対象時間を時間と分に分ける
                    $ex_time = $this->convertMinuteToTime($ex_time_minute);
                    switch ($p_time_ext['Cd']) {
                        case "200":
                            // 就業情報.割増項目１時間 登録
                            $this->work->EXT1_TIME_HH += $ex_time['Hour'];
                            $this->work->EXT1_TIME_MI += $ex_time['Minute'];
                            break;

                        case "201":
                            // 就業情報.割増項目２時間 登録
                            $this->work->EXT2_TIME_HH += $ex_time['Hour'];
                            $this->work->EXT2_TIME_MI += $ex_time['Minute'];
                            break;

                        case "202":
                            // 就業情報.割増項目３時間 登録
                            $this->work->EXT3_TIME_HH += $ex_time['Hour'];
                            $this->work->EXT3_TIME_MI += $ex_time['Minute'];
                            break;
                    }
                }
            } else {
                // **************************************************
                // 残業項目時間算出
                // **************************************************

                // 端数処理情報.出退勤端数処理区分 = 00:時間
                if ($this->fraction->FRACTION_CLS_CD == "00") {
                    // 端数処理情報の残業項目コードと勤務体系情報の残業項目コードが一致する、分未満、端数処理区分コードを取得
                    foreach ($this->frc_ovtm_list as $frc_ovtm) {
                        if ($frc_ovtm['Cd'] == $n_time_wk['Cd']) {
                            // 残業項目時間の端数処理
                            $n_time_wk_minute = $this->calcFractionMinute(
                                $n_time_wk_minute,
                                $frc_ovtm['UnderMi'],
                                $frc_ovtm['FrcClsCd']
                            );
                        }
                    }
                }

                // 残業項目時間を時間と分に分ける
                $over_time = $this->convertMinuteToTime($n_time_wk_minute);
                switch ($n_time_wk['Cd']) {
                    case "100":
                        // 就業情報.残業項目１時間(普通残業時間) 登録
                        $this->work->OVTM1_TIME_HH = $over_time['Hour'];
                        $this->work->OVTM1_TIME_MI = $over_time['Minute'];
                        break;

                    case "101":
                        // 就業情報.残業項目２時間(深夜残業時間) 登録
                        $this->work->OVTM2_TIME_HH = $over_time['Hour'];
                        $this->work->OVTM2_TIME_MI = $over_time['Minute'];
                        break;

                    case "102":
                        // 就業情報.残業項目３時間(休日残業時間) 登録
                        $this->work->OVTM3_TIME_HH = $over_time['Hour'];
                        $this->work->OVTM3_TIME_MI = $over_time['Minute'];
                        break;

                    case "103":
                        // 就業情報.残業項目４時間(休日深夜残業時間) 登録
                        $this->work->OVTM4_TIME_HH = $over_time['Hour'];
                        $this->work->OVTM4_TIME_MI = $over_time['Minute'];
                        break;

                    case "104":
                        // 就業情報.残業項目５時間 登録
                        $this->work->OVTM5_TIME_HH = $over_time['Hour'];
                        $this->work->OVTM5_TIME_MI = $over_time['Minute'];
                        break;

                    case "105":
                        // 就業情報.残業項目６時間 登録
                        $this->work->OVTM6_TIME_HH = $over_time['Hour'];
                        $this->work->OVTM6_TIME_MI = $over_time['Minute'];
                        break;
                }
            }

            // 勤怠項目の勤怠時間が残りの勤務時間以上ならば処理を抜ける
            if ($n_time_wk_span < $work_time_minute) {
                // 終了時刻を退避
                $pre_end_time = $n_time_wk['EndNTime'];

                // 勤務時間から勤怠項目時間を引く
                $work_time_minute -= $n_time_wk_minute;
            } else {
                break;
            }
        }


        // 残業時間を集計
        $total_over_time = 0;
        $total_over_time += $this->convertTimeToMinute($this->work->OVTM1_TIME_HH, $this->work->OVTM1_TIME_MI); // 残業項目１
        $total_over_time += $this->convertTimeToMinute($this->work->OVTM2_TIME_HH, $this->work->OVTM2_TIME_MI); // 残業項目２
        $total_over_time += $this->convertTimeToMinute($this->work->OVTM3_TIME_HH, $this->work->OVTM3_TIME_MI); // 残業項目３
        $total_over_time += $this->convertTimeToMinute($this->work->OVTM4_TIME_HH, $this->work->OVTM4_TIME_MI); // 残業項目４
        $total_over_time += $this->convertTimeToMinute($this->work->OVTM5_TIME_HH, $this->work->OVTM5_TIME_MI); // 残業項目５
        $total_over_time += $this->convertTimeToMinute($this->work->OVTM6_TIME_HH, $this->work->OVTM6_TIME_MI); // 残業項目６

        // 残業未対応時間 判定処理
        if ($total_over_time < $this->over_tm_lmt->NO_OVERTM_MI) {
            // 残業時間の合計が残業未対応時間未満の場合は残業項目時間に0をセット
            $this->work->OVTM1_TIME_HH = 0;   // 残業項目１
            $this->work->OVTM1_TIME_MI = 0;
            $this->work->OVTM2_TIME_HH = 0;   // 残業項目２
            $this->work->OVTM2_TIME_MI = 0;
            $this->work->OVTM3_TIME_HH = 0;   // 残業項目３
            $this->work->OVTM3_TIME_MI = 0;
            $this->work->OVTM4_TIME_HH = 0;   // 残業項目４
            $this->work->OVTM4_TIME_MI = 0;
            $this->work->OVTM5_TIME_HH = 0;   // 残業項目５
            $this->work->OVTM5_TIME_MI = 0;
            $this->work->OVTM6_TIME_HH = 0;   // 残業項目６
            $this->work->OVTM6_TIME_MI = 0;
        }
    }

    /**
     *  勤怠項目別時間計算(時間数・時間数/時間毎)
     *  ※① 外出時間算出時に勤怠項目別の外出時間を退避したハッシュテーブルより勤怠項目CDをキーに取得
     *  ※② 休憩時間は就業時間帯から引く
     *  ※③ 早退算出条件 : 就業時間よりも勤怠時間が短く、かつ、勤務体系の早退算出区分が[01:する]の場合
     *  勤務体系情報入力で割増時間帯が、職務種別にかかわらず設定できるように仕様変更。
     *  それに伴い、職務種別が"01"時間数でも、割増時間の算出するように変更。
     *  </history>
     *  TR01.RSV1_TIME_HH, RSV1_TIME_MIに休憩時間を登録
     *  </history>
     */
    private function setWorkTimeCase4()
    {
        $work_time_minute = 0;   // 勤務時間(分単位)
        $out_time_minute = 0;    // 外出時間(分単位)

        // 勤務時間取得
        $work_time_minute = floor($this->calc_time['OFC']->diffInMinutes($this->calc_time['LEV']));

        // 外出時間取得  ※①
        if (key_exists("9999", $this->total_out_time_by_work)) {
            $out_time_minute = $this->total_out_time_by_work["9999"];
        }

        // 勤務時間から外出時間を引く
        $work_time_minute -= $out_time_minute;

        // **************************************************
        //  勤怠時間算出
        // **************************************************
        // 勤怠時間を昇順で並び換え
        $n_time_wk_query = $this->work_ptn_n_time_wk_list->sortBy('StartNTime');
        // 開始時刻を退避
        $pre_end_time = $n_time_wk_query->first()['StartNTime'];

        // 勤怠項目をループ
        foreach ($n_time_wk_query as $n_time_wk) {
            // 開始時刻と前の終了時間との間があいている場合は勤務時間からその分の分を引く
            if ($pre_end_time !== $n_time_wk['StartNTime']) {
                $wk_interval = 0;

                // 勤怠項目間の時間を取得
                $wk_interval = floor($n_time_wk['StartNTime'] - $pre_end_time);

                // 勤怠項目間の時間を勤務時間から引く
                $work_time_minute -= $wk_interval;

                // 勤務時間がなくなったら処理を抜ける(開始時刻と前の終了時間との間で退出)
                if ($work_time_minute <= 0) {
                    break;
                }
            }

            $n_time_wk_span = 0;            // 勤怠項目別の勤怠時間
            $work_minute_in_n_time_wk = 0;       // 勤怠項目毎の勤務時間

            // 勤怠項目別の勤怠時間を分単位で取得
            $n_time_wk_span = floor($n_time_wk['EndNTime'] - $n_time_wk['StartNTime']);

            // 勤怠項目が[就業時間]の場合、休憩時間、早退時間の算出を行う
            if ($this->mt94->isRegularWork($n_time_wk['Cd'])) {
                $total_break = 0;
                $brk_time_minute = 0;

                // **************************************************
                //  休憩時間算出 ※②
                // **************************************************
                // 休憩時間の取得
                if ($this->work_ptn->BREAK_CLS_CD == "01") {      // 休憩時間区分 == 01:時間数
                    // 休憩時間(分単位)
                    $break_minute = $this->work_ptn->NBRK_TIME * 60 + $this->work_ptn->NBRK_MINUTE;
                    $brk_time_minute = $break_minute;

                    // 残勤務時間から休憩時間を引く
                    $work_time_minute -= $break_minute;

                    // 勤務時間がなくなったら処理を抜ける(休憩時間中に退出)
                    if ($work_time_minute <= 0) {
                        break;
                    }

                    // 対象の勤怠項目内での就業時間を取得
                    if ($n_time_wk_span < $work_time_minute) {
                        $work_minute_in_n_time_wk = $n_time_wk_span;
                    } else {
                        $work_minute_in_n_time_wk = $work_time_minute;
                    }
                } elseif ($this->work_ptn->BREAK_CLS_CD == "02") {  // 休憩時間区分 = 02:時間毎
                    $break_period = $this->work_ptn->EBRK_PTIME * 60;
                    $break_minute = $this->work_ptn->EBRK_MINUTE;
                    $total_break_period = 0;

                    do {
                        // 休憩区切り時間の合計
                        $total_break_period += $break_period;

                        // 休憩区切り時間帯での退出
                        if ($work_time_minute <= $total_break_period + $total_break) {
                            if ($n_time_wk_span <= $work_time_minute - $total_break) {
                                $work_minute_in_n_time_wk = $n_time_wk_span + $total_break;
                                break;
                            } else {
                                $work_minute_in_n_time_wk = $work_time_minute;
                                break;
                            }
                        }

                        // 休憩区切り時間の合計が就業時間を超えた場合
                        if ($n_time_wk_span < $total_break_period) {
                            $work_minute_in_n_time_wk = $n_time_wk_span + $total_break;
                            break;
                        }

                        // 休憩時間の合計
                        $total_break += $break_minute;
                        $brk_time_minute = $total_break;

                        // 合計した休憩区切り時間と休憩時間の合計が残勤務時間を超える場合
                        if ($work_time_minute <= ($total_break_period + $total_break)) {
                            $total_break -= $total_break_period + $total_break - $work_time_minute;
                            $brk_time_minute = $total_break;
                            $work_minute_in_n_time_wk = $work_time_minute;
                            break;
                        }
                    } while (1);
                }

                // 休憩時間
                $brk_time = $this->convertMinuteToTime($brk_time_minute);
                $this->work->RSV1_TIME_HH = $brk_time['Hour'];
                $this->work->RSV1_TIME_MI = $brk_time['Minute'];

                // **************************************************
                //  出勤時間算出
                // **************************************************
                // 勤務時間から休憩時間を引く
                $office_hour = $work_minute_in_n_time_wk - $total_break;
                if ($office_hour < 0) {
                    $office_hour = 0;
                }

                // 端数処理情報.出退勤端数処理区分 = 00:時間 かつ 出勤の端数処理区分が設定されている場合
                if ($this->fraction->FRACTION_CLS_CD == "00" && !is_null($this->fraction->WTHR_UNDER_MI)) {
                    // 出勤時間の端数処理
                    $office_hour = $this->calcFractionMinute(
                        $office_hour,
                        $this->fraction->WTHR_UNDER_MI,
                        $this->fraction->WTHR_FRC_CLS_CD
                    );
                }

                // 出勤時間を時間と分に分ける
                $work_time = $this->convertMinuteToTime($office_hour);

                // 就業情報.出勤時間 登録
                $this->work->WORK_TIME_HH = $work_time['Hour'];
                $this->work->WORK_TIME_MI = $work_time['Minute'];


                // **************************************************
                //  早退時間算出 ※③
                // **************************************************
                if (($work_minute_in_n_time_wk - $total_break) < $n_time_wk_span
                        && $this->work_ptn->NTIME_LEAVE_CLS_CD == "01") {
                    $leave_time_minute = 0;          // 早退時間(分単位)

                    // 早退時間(分)取得
                    $leave_time_minute = $n_time_wk_span - ($work_minute_in_n_time_wk - $total_break);

                    // 端数処理情報.出退勤端数処理区分 = 00:時間 かつ 早退の端数処理区分が設定されている場合
                    if ($this->fraction->FRACTION_CLS_CD == "00" && !is_null($this->fraction->ERHR_UNDER_MI)) {
                        // 早退時間の端数処理
                        $leave_time_minute = $this->calcFractionMinute(
                            $leave_time_minute,
                            $this->fraction->ERHR_UNDER_MI,
                            $this->fraction->ERHR_FRC_CLS_CD
                        );
                    }

                    // 早退時間を時間と分に分ける
                    $leave_time = $this->convertMinuteToTime($leave_time_minute);

                    // 就業情報.早退時間 登録
                    $this->work->LEAVE_TIME_HH = $leave_time['Hour'];
                    $this->work->LEAVE_TIME_MI = $leave_time['Minute'];
                }

                // **************************************************
                //  割増対象時間算出
                // **************************************************
                foreach ($this->work_ptn_p_time_ext_list as $p_time_ext) {
                    $ex_time_minute = 0; // 割増対象時間(分単位)

                    // 割増対象時刻内に出退勤時刻が含まれない
                    if ($p_time_ext['EndTime']->lte($this->calc_time['OFC'])
                            || $this->calc_time['LEV']->lte($p_time_ext['StartTime'])) {
                        continue;
                    }
                    // 割増対象時刻内での出勤時刻を取得
                    if ($p_time_ext['StartTime']->lte($this->calc_time['OFC'])
                            && $this->calc_time['OFC']->lt($p_time_ext['EndTime'])) {
                        $p_time_ext['StartTime'] = $this->calc_time['OFC'];
                    }
                    // 割増対象時刻内での退出時刻を取得
                    if ($p_time_ext['StartTime']->lt($this->calc_time['LEV'])
                            && $this->calc_time['LEV']->lte($p_time_ext['EndTime'])) {
                        $p_time_ext['EndTime'] = $this->calc_time['LEV'];
                    }

                    // 割増対象時間(分)取得
                    $ex_time_minute = $this->getExTime(
                        $p_time_ext['Cd'],
                        $p_time_ext['StartTime'],
                        $p_time_ext['EndTime']
                    );

                    // 端数処理情報.出退勤端数処理区分 = 00:時間
                    if ($this->fraction->FRACTION_CLS_CD == "00") {
                        // 端数処理情報の割増対象コードと勤務体系情報の割増対象コードが一致する、分未満、端数処理区分コードを取得
                        foreach ($this->frc_ext_list as $frc_ext) {
                            if ($frc_ext['Cd'] == $p_time_ext['Cd']) {
                                // 割増対象の端数処理
                                $ex_time_minute = $this->calcFractionMinute(
                                    $ex_time_minute,
                                    $frc_ext['UnderMi'],
                                    $frc_ext['FrcClsCd']
                                );
                                break;
                            }
                        }
                    }

                    // 割増対象時間を時間と分に分ける
                    $ex_time = $this->convertMinuteToTime($ex_time_minute);
                    switch ($p_time_ext['Cd']) {
                        case "200":
                            // 就業情報.割増項目１時間 登録
                            $this->work->EXT1_TIME_HH += $ex_time['Hour'];
                            $this->work->EXT1_TIME_MI += $ex_time['Minute'];
                            break;

                        case "201":
                            // 就業情報.割増項目２時間 登録
                            $this->work->EXT2_TIME_HH += $ex_time['Hour'];
                            $this->work->EXT2_TIME_MI += $ex_time['Minute'];
                            break;

                        case "202":
                            // 就業情報.割増項目３時間 登録
                            $this->work->EXT3_TIME_HH += $ex_time['Hour'];
                            $this->work->EXT3_TIME_MI += $ex_time['Minute'];
                            break;
                    }
                }
            } else {
                // 対象の勤怠項目内での勤務時間を取得
                if ($n_time_wk_span < $work_time_minute) {
                    $work_minute_in_n_time_wk = $n_time_wk_span;
                } else {
                    $work_minute_in_n_time_wk = $work_time_minute;
                }

                // **************************************************
                //  残業項目時間算出
                // **************************************************

                // 端数処理情報.出退勤端数処理区分 = 00:時間
                if ($this->fraction->FRACTION_CLS_CD == "00") {
                    // 端数処理情報の残業項目コードと勤務体系情報の残業項目コードが一致する、分未満、端数処理区分コードを取得
                    foreach ($this->frc_ovtm_list as $frc_ovtm) {
                        if ($frc_ovtm['Cd'] == $n_time_wk['Cd']) {
                            // 残業項目時間の端数処理
                            $work_minute_in_n_time_wk = $this->calcFractionMinute(
                                $work_minute_in_n_time_wk,
                                $frc_ovtm['UnderMi'],
                                $frc_ovtm['FrcClsCd']
                            );
                        }
                    }
                }

                // 残業項目時間を時間と分に分ける
                $over_time = $this->convertMinuteToTime($work_minute_in_n_time_wk);
                switch ($n_time_wk['Cd']) {
                    case "100":
                        // 就業情報.残業項目１時間(普通残業時間) 登録
                        $this->work->OVTM1_TIME_HH = $over_time['Hour'];
                        $this->work->OVTM1_TIME_MI = $over_time['Minute'];
                        break;

                    case "101":
                        // 就業情報.残業項目２時間(深夜残業時間) 登録
                        $this->work->OVTM2_TIME_HH = $over_time['Hour'];
                        $this->work->OVTM2_TIME_MI = $over_time['Minute'];
                        break;

                    case "102":
                        // 就業情報.残業項目３時間(休日残業時間) 登録
                        $this->work->OVTM3_TIME_HH = $over_time['Hour'];
                        $this->work->OVTM3_TIME_MI = $over_time['Minute'];
                        break;

                    case "103":
                        // 就業情報.残業項目４時間(休日深夜残業時間) 登録
                        $this->work->OVTM4_TIME_HH = $over_time['Hour'];
                        $this->work->OVTM4_TIME_MI = $over_time['Minute'];
                        break;

                    case "104":
                        // 就業情報.残業項目５時間 登録
                        $this->work->OVTM5_TIME_HH = $over_time['Hour'];
                        $this->work->OVTM5_TIME_MI = $over_time['Minute'];
                        break;

                    case "105":
                        // 就業情報.残業項目６時間 登録
                        $this->work->OVTM6_TIME_HH = $over_time['Hour'];
                        $this->work->OVTM6_TIME_MI = $over_time['Minute'];
                        break;
                }
            }

            // 勤怠項目の勤怠時間が残りの勤務時間以上ならば処理を抜ける
            if ($n_time_wk_span < $work_time_minute) {
                // 終了時刻を退避
                $pre_end_time = $n_time_wk['EndNTime'];

                // 勤務時間から勤怠項目時間を引く
                $work_time_minute -= $work_minute_in_n_time_wk;
                if ($work_time_minute <= 0) {
                    break;
                }
            } else {
                break;
            }
        }


        // 残業時間を集計
        $total_over_time = 0;
        $total_over_time += $this->convertTimeToMinute($this->work->OVTM1_TIME_HH, $this->work->OVTM1_TIME_MI); // 残業項目１
        $total_over_time += $this->convertTimeToMinute($this->work->OVTM2_TIME_HH, $this->work->OVTM2_TIME_MI); // 残業項目２
        $total_over_time += $this->convertTimeToMinute($this->work->OVTM3_TIME_HH, $this->work->OVTM3_TIME_MI); // 残業項目３
        $total_over_time += $this->convertTimeToMinute($this->work->OVTM4_TIME_HH, $this->work->OVTM4_TIME_MI); // 残業項目４
        $total_over_time += $this->convertTimeToMinute($this->work->OVTM5_TIME_HH, $this->work->OVTM5_TIME_MI); // 残業項目５
        $total_over_time += $this->convertTimeToMinute($this->work->OVTM6_TIME_HH, $this->work->OVTM6_TIME_MI); // 残業項目６

        // 残業未対応時間 判定処理
        if ($total_over_time < $this->over_tm_lmt->NO_OVERTM_MI) {
            // 残業時間の合計が残業未対応時間未満の場合は残業項目時間に0をセット
            $this->work->OVTM1_TIME_HH = 0;   // 残業項目１
            $this->work->OVTM1_TIME_MI = 0;
            $this->work->OVTM2_TIME_HH = 0;   // 残業項目２
            $this->work->OVTM2_TIME_MI = 0;
            $this->work->OVTM3_TIME_HH = 0;   // 残業項目３
            $this->work->OVTM3_TIME_MI = 0;
            $this->work->OVTM4_TIME_HH = 0;   // 残業項目４
            $this->work->OVTM4_TIME_MI = 0;
            $this->work->OVTM5_TIME_HH = 0;   // 残業項目５
            $this->work->OVTM5_TIME_MI = 0;
            $this->work->OVTM6_TIME_HH = 0;   // 残業項目６
            $this->work->OVTM6_TIME_MI = 0;
        }
    }

    /**
     *  勤怠項目別時間計算(時間数(時間帯含)・時間帯)
     *  ※① 外出時間算出時に勤怠項目別の外出時間を退避したハッシュテーブルより勤怠項目CDをキーに取得
     *  ※② 早退算出条件 : 就業時間よりも勤怠時間が短く、かつ、勤務体系の早退算出区分が[01:する]の場合
     *  職務種別が時間帯の勤怠項目(残業項目)時間を時間数の残業項目時間に含めないように時間計算方法変更。
     *  就業時間範囲内の割増時間のみを計算するように変更。
     *  </history>
     *  TR01.RSV1_TIME_HH, RSV1_TIME_MIに休憩時間を登録
     *  </history>
     */
    private function setWorkTimeCase5()
    {
        $work_time_minute = 0;   // 勤務時間(分単位)
        $brk_time_minute = 0;    // 休憩時間(分単位)
        $out_time_minute = 0;    // 外出時間(分単位)

        // 勤務時間取得
        $work_time_minute = floor($this->calc_time['OFC']->diffInMinutes($this->calc_time['LEV']));

        // 時間数の勤怠項目時間情報リスト
        foreach ($this->work_time_info_list as $work_time_info) {
            // 勤怠項目別の休憩時間を全体の休憩時間から引く
            $brk_time_minute += $this->getPBrkTimeInTargetTime(
                $work_time_info['WorkTimeRange']['START'],
                $work_time_info['WorkTimeRange']['END']
            );
        }

        // 外出時間取得(隙間時間中の外出時間は含まない)
        foreach ($this->total_out_time_by_work as $out_time) {
            $out_time_minute += $out_time;
        }

        // 勤務時間から休憩時間、外出時間を引く
        $work_time_minute -= $brk_time_minute;
        $work_time_minute -= $out_time_minute;

        // 休憩時間登録
        $brk_time = $this->convertMinuteToTime($brk_time_minute);
        $this->work->RSV1_TIME_HH = $brk_time['Hour'];
        $this->work->RSV1_TIME_MI = $brk_time['Minute'];

        // **************************************************
        // 勤怠時間算出(職務種別：時間数)
        // **************************************************

        // 勤怠時間を昇順で並び換え
        $n_time_wk_query = $this->work_ptn_n_time_wk_list->where('DclsCd', "01")->sortBy('StartNTime');

        // 開始時刻を退避
        $pre_end_time = $n_time_wk_query->first()['StartNTime'];

        foreach ($n_time_wk_query as $n_time_wk) {
            // 開始時刻と前の終了時間との間があいている場合は就業時間からその分の分を引く
            if ($pre_end_time !== $n_time_wk['StartNTime']) {
                $wk_interval = 0;

                // 勤怠項目間の時間を取得
                $wk_interval = floor($n_time_wk['StartNTime'] - $pre_end_time);

                // 勤怠項目間に間がある場合は就業時間からその分の分を引く
                $work_time_minute -= $wk_interval;

                // 開始時刻と前の終了時間との間で退出しているときは処理を抜ける
                if ($work_time_minute <= 0) {
                    break;
                }
            }

            // 勤怠項目別の勤怠時間を分単位で取得
            $n_time_wk_span = floor($n_time_wk['EndNTime'] - $n_time_wk['StartNTime']);
            $n_time_wk_minute = 0;

            // 対象の勤怠項目内での就業時間を取得
            if ($n_time_wk_span < $work_time_minute) {
                $n_time_wk_minute = $n_time_wk_span;
            } else {
                $n_time_wk_minute = $work_time_minute;
            }

            // 出勤時間

            // 勤怠項目が[就業時間]の場合、早退時間の算出を行う
            if ($this->mt94->isRegularWork($n_time_wk['Cd'])) {
                // **************************************************
                //  出勤時間算出
                // **************************************************
                // 端数処理情報.出退勤端数処理区分 = 00:時間 かつ 出勤の端数処理区分が設定されている場合
                if ($this->fraction->FRACTION_CLS_CD == "00" && !is_null($this->fraction->WTHR_UNDER_MI)) {
                    // 出勤時間の端数処理
                    $n_time_wk_minute = $this->calcFractionMinute(
                        $n_time_wk_minute,
                        $this->fraction->WTHR_UNDER_MI,
                        $this->fraction->WTHR_FRC_CLS_CD
                    );
                }

                // 出勤時間を時間と分に分ける
                $work_time = $this->convertMinuteToTime($n_time_wk_minute);

                // 就業情報.出勤時間 登録
                $this->work->WORK_TIME_HH = $work_time['Hour'];
                $this->work->WORK_TIME_MI = $work_time['Minute'];

                // **************************************************
                //  早退時間算出 ※②
                // **************************************************
                if ($n_time_wk_minute < $n_time_wk_span && $this->work_ptn->NTIME_LEAVE_CLS_CD == "01") {
                    $leave_time_minute = 0;  // 早退時間(分単位)

                    // 早退時間(分)取得
                    $leave_time_minute = $n_time_wk_span - $n_time_wk_minute;

                    // 端数処理情報.出退勤端数処理区分 = 00:時間 かつ 早退の端数処理区分が設定されている場合
                    if ($this->fraction->FRACTION_CLS_CD == "00" && !is_null($this->fraction->ERHR_UNDER_MI)) {
                        // 早退時間の端数処理
                        $leave_time_minute = $this->calcFractionMinute(
                            $leave_time_minute,
                            $this->fraction->ERHR_UNDER_MI,
                            $this->fraction->ERHR_FRC_CLS_CD
                        );
                    }

                    // 早退時間を時間と分に分ける
                    $leave_time = $this->convertMinuteToTime($leave_time_minute);

                    // 就業情報.早退時間 登録
                    $this->work->LEAVE_TIME_HH = $leave_time['Hour'];
                    $this->work->LEAVE_TIME_MI = $leave_time['Minute'];
                }

                // **************************************************
                //  割増対象時間算出
                // **************************************************
                $regular_time_range = $this->work_time_info_list[$n_time_wk['Cd']]['WorkTimeRange'];
                foreach ($this->work_ptn_p_time_ext_list as $p_time_ext) {
                    $ext_range = self::TIME_RANGE_TYPE;
                    $ext_range['START'] = $p_time_ext['StartTime'];
                    $ext_range['END'] = $p_time_ext['EndTime'];

                    // 就業時間に含まれる割増時間の時刻調整
                    $ret = $this->adjustIncludTimeRange2($regular_time_range, $ext_range);
                    // 就業時間範囲内に、割増時間が含まれない場合
                    if (!$ret) {
                        continue;
                    }
                    // 就業時間内の割増時間を取得
                    $ex_time_minute = $this->getExTime($p_time_ext['Cd'], $ext_range['START'], $ext_range['END']);

                    // 割増時間の端数処理
                    if ($this->fraction->FRACTION_CLS_CD == "00") {
                        foreach ($this->frc_ext_list as $frc_ext) {
                            if ($frc_ext['Cd'] == $p_time_ext['Cd']) {
                                $ex_time_minute = $this->calcFractionMinute(
                                    $ex_time_minute,
                                    $frc_ext['UnderMi'],
                                    $frc_ext['FrcClsCd']
                                );
                                break;
                            }
                        }
                    }

                    // 就業情報.割増項目時間 登録
                    $ex_time = $this->convertMinuteToTime($ex_time_minute); // 割増対象時間を時間と分に分ける
                    switch ($p_time_ext['Cd']) {
                        case "200":
                            $this->work->EXT1_TIME_HH += $ex_time['Hour'];
                            $this->work->EXT1_TIME_MI += $ex_time['Minute'];
                            break;

                        case "201":
                            $this->work->EXT2_TIME_HH += $ex_time['Hour'];
                            $this->work->EXT2_TIME_MI += $ex_time['Minute'];
                            break;

                        case "202":
                            $this->work->EXT3_TIME_HH += $ex_time['Hour'];
                            $this->work->EXT3_TIME_MI += $ex_time['Minute'];
                            break;
                    }
                }
            } else {
                // **************************************************
                // 残業項目時間算出
                // **************************************************
                $n_time_minute1 = $n_time_wk_minute;
                $n_time_minute2 = 0;

                // 現在の残業項目の時刻範囲を勤怠項目時間情報リストより取得
                $over_time_range = $this->work_time_info_list[$n_time_wk['Cd']]['WorkTimeRange'];

                // 時間数の残業項目に含まれる、時間帯の残業項目時間を算出
                $tai_wk_query = $this->work_ptn_n_time_wk_list->where('DclsCd', '00')->sortBy('StartPTime');
                foreach ($tai_wk_query as $tai_wk) {
                    $tai_wk_range = self::TIME_RANGE_TYPE;
                    $tai_wk_range['START'] = $tai_wk['StartPTime'];
                    $tai_wk_range['END'] = $tai_wk['EndPTime'];

                    // 時間帯の残業項目時刻を、時間数の残業項目時間を基に調整
                    $ret = $this->adjustIncludTimeRange2($over_time_range, $tai_wk_range);
                    // 時間数の残業項目時間範囲内に、時間の帯残業項目時刻が含まれない場合
                    if (!$ret) {
                        continue;
                    }

                    // 時間数の残業項目時間内の時間帯の残業項目時間を取得
                    $tai_wk_minutes = floor($tai_wk_range['START']->diffInMinutes($tai_wk_range['END']));
                    // 時間帯残業時間から外出時間を引く
                    if (key_exists($tai_wk['Cd'], $this->total_out_time_by_work)) {
                        $tai_wk_minutes -= $this->total_out_time_by_work[$tai_wk['Cd']];
                    }
                    // 時間帯残業時間から休憩時間を引く
                    $tai_wk_minutes -= $this->getPBrkTimeInTargetTime($tai_wk_range['START'], $tai_wk_range['END']);
                    // 残業項目時間の端数処理
                    if ($this->fraction->FRACTION_CLS_CD == "00") {
                        foreach ($this->frc_ovtm_list as $frc_ovtm) {
                            if ($frc_ovtm['Cd'] == $tai_wk['Cd']) {
                                $tai_wk_minutes = $this->calcFractionMinute(
                                    $tai_wk_minutes,
                                    $frc_ovtm['UnderMi'],
                                    $frc_ovtm['FrcClsCd']
                                );
                            }
                        }
                    }

                    // 時間帯の残業項目時間を登録
                    $ovtm_minutes = 0;
                    switch ($tai_wk['Cd']) {
                        case "100":
                            $ovtm_minutes = $this->convertTimeToMinute(
                                $this->work->OVTM1_TIME_HH,
                                $this->work->OVTM1_TIME_MI
                            );
                            $tai_over_time = $this->convertMinuteToTime($ovtm_minutes + $tai_wk_minutes);
                            $this->work->OVTM1_TIME_HH = $tai_over_time['Hour'];
                            $this->work->OVTM1_TIME_MI = $tai_over_time['Minute'];
                            break;

                        case "101":
                            $ovtm_minutes = $this->convertTimeToMinute(
                                $this->work->OVTM2_TIME_HH,
                                $this->work->OVTM2_TIME_MI
                            );
                            $tai_over_time = $this->convertMinuteToTime($ovtm_minutes + $tai_wk_minutes);
                            $this->work->OVTM2_TIME_HH = $tai_over_time['Hour'];
                            $this->work->OVTM2_TIME_MI = $tai_over_time['Minute'];
                            break;

                        case "102":
                            $ovtm_minutes = $this->convertTimeToMinute(
                                $this->work->OVTM3_TIME_HH,
                                $this->work->OVTM3_TIME_MI
                            );
                            $tai_over_time = $this->convertMinuteToTime($ovtm_minutes + $tai_wk_minutes);
                            $this->work->OVTM3_TIME_HH = $tai_over_time['Hour'];
                            $this->work->OVTM3_TIME_MI = $tai_over_time['Minute'];
                            break;

                        case "103":
                            $ovtm_minutes = $this->convertTimeToMinute(
                                $this->work->OVTM4_TIME_HH,
                                $this->work->OVTM4_TIME_MI
                            );
                            $tai_over_time = $this->convertMinuteToTime($ovtm_minutes + $tai_wk_minutes);
                            $this->work->OVTM4_TIME_HH = $tai_over_time['Hour'];
                            $this->work->OVTM4_TIME_MI = $tai_over_time['Minute'];
                            break;

                        case "104":
                            $ovtm_minutes = $this->convertTimeToMinute(
                                $this->work->OVTM5_TIME_HH,
                                $this->work->OVTM5_TIME_MI
                            );
                            $tai_over_time = $this->convertMinuteToTime($ovtm_minutes + $tai_wk_minutes);
                            $this->work->OVTM5_TIME_HH = $tai_over_time['Hour'];
                            $this->work->OVTM5_TIME_MI = $tai_over_time['Minute'];
                            break;

                        case "105":
                            $ovtm_minutes = $this->convertTimeToMinute(
                                $this->work->OVTM6_TIME_HH,
                                $this->work->OVTM6_TIME_MI
                            );
                            $tai_over_time = $this->convertMinuteToTime($ovtm_minutes + $tai_wk_minutes);
                            $this->work->OVTM6_TIME_HH = $tai_over_time['Hour'];
                            $this->work->OVTM6_TIME_MI = $tai_over_time['Minute'];
                            break;
                    }

                    // 時間数の勤怠項目に含まれる、時間帯の勤怠項目時間を合計
                    $n_time_minute2 += $tai_wk_minutes;
                }

                // 時間数の残業時間から時間帯の残業時間を引く
                $n_time_minute1 -= $n_time_minute2;

                // 残業項目時間の端数処理
                if ($this->fraction->FRACTION_CLS_CD == "00") {
                    foreach ($this->frc_ovtm_list as $frc_ovtm) {
                        if ($frc_ovtm['Cd'] == $n_time_wk['Cd']) {
                            $n_time_minute1 = $this->calcFractionMinute(
                                $n_time_minute1,
                                $frc_ovtm['UnderMi'],
                                $frc_ovtm['FrcClsCd']
                            );
                        }
                    }
                }

                // 時間数の残業項目時間を登録
                $over_time = $this->convertMinuteToTime($n_time_minute1);
                switch ($n_time_wk['Cd']) {
                    case "100":
                        $this->work->OVTM1_TIME_HH = $over_time['Hour'];
                        $this->work->OVTM1_TIME_MI = $over_time['Minute'];
                        break;

                    case "101":
                        $this->work->OVTM2_TIME_HH = $over_time['Hour'];
                        $this->work->OVTM2_TIME_MI = $over_time['Minute'];
                        break;

                    case "102":
                        $this->work->OVTM3_TIME_HH = $over_time['Hour'];
                        $this->work->OVTM3_TIME_MI = $over_time['Minute'];
                        break;

                    case "103":
                        $this->work->OVTM4_TIME_HH = $over_time['Hour'];
                        $this->work->OVTM4_TIME_MI = $over_time['Minute'];
                        break;

                    case "104":
                        $this->work->OVTM5_TIME_HH = $over_time['Hour'];
                        $this->work->OVTM5_TIME_MI = $over_time['Minute'];
                        break;

                    case "105":
                        $this->work->OVTM6_TIME_HH = $over_time['Hour'];
                        $this->work->OVTM6_TIME_MI = $over_time['Minute'];
                        break;
                }
                $n_time_wk_minute = $n_time_minute1 + $n_time_minute2;
            }

            // 勤怠項目の勤怠時間が残りの勤務時間以上ならば処理を抜ける
            if ($n_time_wk_span < $work_time_minute) {
                // 終了時刻を退避
                $pre_end_time = $n_time_wk['EndNTime'];

                // 勤務時間から勤怠項目時間を引く
                $work_time_minute -= $n_time_wk_minute;
            } else {
                break;
            }
        }

        // 残業時間を集計
        $total_over_time = 0;
        $total_over_time += $this->convertTimeToMinute($this->work->OVTM1_TIME_HH, $this->work->OVTM1_TIME_MI); // 残業項目１
        $total_over_time += $this->convertTimeToMinute($this->work->OVTM2_TIME_HH, $this->work->OVTM2_TIME_MI); // 残業項目２
        $total_over_time += $this->convertTimeToMinute($this->work->OVTM3_TIME_HH, $this->work->OVTM3_TIME_MI); // 残業項目３
        $total_over_time += $this->convertTimeToMinute($this->work->OVTM4_TIME_HH, $this->work->OVTM4_TIME_MI); // 残業項目４
        $total_over_time += $this->convertTimeToMinute($this->work->OVTM5_TIME_HH, $this->work->OVTM5_TIME_MI); // 残業項目５
        $total_over_time += $this->convertTimeToMinute($this->work->OVTM6_TIME_HH, $this->work->OVTM6_TIME_MI); // 残業項目６

        // 残業未対応時間 判定処理
        if ($total_over_time < $this->over_tm_lmt->NO_OVERTM_MI) {
            // 残業時間の合計が残業未対応時間未満の場合は残業項目時間に0をセット
            $this->work->OVTM1_TIME_HH = 0;   // 残業項目１
            $this->work->OVTM1_TIME_MI = 0;
            $this->work->OVTM2_TIME_HH = 0;   // 残業項目２
            $this->work->OVTM2_TIME_MI = 0;
            $this->work->OVTM3_TIME_HH = 0;   // 残業項目３
            $this->work->OVTM3_TIME_MI = 0;
            $this->work->OVTM4_TIME_HH = 0;   // 残業項目４
            $this->work->OVTM4_TIME_MI = 0;
            $this->work->OVTM5_TIME_HH = 0;   // 残業項目５
            $this->work->OVTM5_TIME_MI = 0;
            $this->work->OVTM6_TIME_HH = 0;   // 残業項目６
            $this->work->OVTM6_TIME_MI = 0;
        }
    }

    /**
     *  勤怠項目別時間計算(時間数(時間帯含)・時間数/時間毎)
     *  職務種別が時間帯の勤怠項目(残業項目)時間を時間数の残業項目時間に含めないように時間計算方法変更。
     *  就業時間範囲内の割増時間のみを計算するように変更。
     *  TR01.RSV1_TIME_HH, RSV1_TIME_MIに休憩時間を登録
     *  </history>
     *  「時間数の勤怠項目に含まれる、時間帯の勤怠項目時間を合計」する処理を、
     *  「時間数の勤怠項目に含まれる時間」が端数処理される前の値で合計されるように、処理の記述順序を変更。
     *  </history>
     */
    private function setWorkTimeCase6()
    {
        $work_time_minute = 0;   // 勤務時間(分単位)
        $out_time_minute = 0;    // 外出時間(分単位)

        // 勤務時間取得
        $work_time_minute = floor($this->calc_time['OFC']->diffInMinutes($this->calc_time['LEV']));

        // 外出時間取得(隙間時間中の外出時間は含まない)
        foreach ($this->total_out_time_by_work as $out_time) {
            $out_time_minute += $out_time;
        }

        // 勤務時間から外出時間、時間帯勤務時間を引く
        $work_time_minute -= $out_time_minute;


        // **************************************************
        // 勤怠時間算出(職務種別：時間数)
        // **************************************************

        // 勤怠時間を昇順で並び換え
        $n_time_wk_query = $this->work_ptn_n_time_wk_list->where('DclsCd', '01')->sortBy('StartNTime');

        // 開始時刻を退避
        $pre_end_time = $n_time_wk_query->first()['StartNTime'];

        foreach ($n_time_wk_query as $n_time_wk) {
            // 開始時刻と前の終了時間との間があいている場合は就業時間からその分の分を引く
            if ($pre_end_time !== $n_time_wk['StartNTime']) {
                $wk_interval = 0;

                // 勤怠項目間の時間を取得
                $wk_interval = floor($n_time_wk['StartNTime'] - $pre_end_time);

                // 勤怠項目間に間がある場合は就業時間からその分の分を引く
                $work_time_minute -= $wk_interval;

                // 開始時刻と前の終了時間との間で退出しているときは処理を抜ける
                if ($work_time_minute <= 0) {
                    break;
                }
            }

            // 勤怠項目別の勤怠時間を分単位で取得
            $n_time_wk_span = floor($n_time_wk['EndNTime'] - $n_time_wk['StartNTime']);
            // $n_time_wk_minute = 0;
            $work_minute_in_n_time_wk = 0;  // 勤怠項目毎の勤務時間


            // 勤怠項目が[就業時間]の場合、休憩時間、早退時間の算出を行う
            if ($this->mt94->isRegularWork($n_time_wk['Cd'])) {
                $total_break = 0;
                $brk_time_minute = 0;

                // **************************************************
                //  休憩時間算出 ※②
                // **************************************************
                // 休憩時間の取得
                if ($this->work_ptn->BREAK_CLS_CD == "01") {      // 休憩時間区分 == 01:時間数
                    // 休憩時間(分単位)
                    $break_minute = $this->work_ptn->NBRK_TIME * 60 + $this->work_ptn->NBRK_MINUTE;
                    $brk_time_minute = $break_minute;

                    // 残勤務時間から休憩時間を引く
                    $work_time_minute -= $break_minute;

                    // 勤務時間がなくなったら処理を抜ける(休憩時間中に退出)
                    if ($work_time_minute <= 0) {
                        break;
                    }

                    // 対象の勤怠項目内での就業時間を取得
                    if ($n_time_wk_span < $work_time_minute) {
                        $work_minute_in_n_time_wk = $n_time_wk_span;
                    } else {
                        $work_minute_in_n_time_wk = $work_time_minute;
                    }
                } elseif ($this->work_ptn->BREAK_CLS_CD == "02") {  // 休憩時間区分 = 02:時間毎
                    $break_period = $this->work_ptn->EBRK_PTIME * 60;
                    $break_minute = $this->work_ptn->EBRK_MINUTE;
                    $total_break_period = 0;

                    do {
                        // 休憩区切り時間の合計
                        $total_break_period += $break_period;

                        // 休憩区切り時間帯での退出
                        if ($work_time_minute <= $total_break_period + $total_break) {
                            if ($n_time_wk_span <= $work_time_minute - $total_break) {
                                $work_minute_in_n_time_wk = $n_time_wk_span + $total_break;
                                break;
                            } else {
                                $work_minute_in_n_time_wk = $work_time_minute;
                                break;
                            }
                        }

                        // 休憩区切り時間の合計が就業時間を超えた場合
                        if ($n_time_wk_span < $total_break_period) {
                            $work_minute_in_n_time_wk = $n_time_wk_span + $total_break;
                            break;
                        }

                        // 休憩時間の合計
                        $total_break += $break_minute;
                        $brk_time_minute = $total_break;

                        // 合計した休憩区切り時間と休憩時間の合計が残勤務時間を超える場合
                        if ($work_time_minute <= $total_break_period + $total_break) {
                            $total_break -= $total_break_period + $total_break - $work_time_minute;
                            $brk_time_minute = $total_break;
                            $work_minute_in_n_time_wk = $work_time_minute;
                            break;
                        }
                    } while (1);
                }

                // 休憩時間
                $brk_time = $this->convertMinuteToTime($brk_time_minute);
                $this->work->RSV1_TIME_HH = $brk_time['Hour'];
                $this->work->RSV1_TIME_MI = $brk_time['Minute'];

                // **************************************************
                //  出勤時間算出
                // **************************************************
                // 勤務時間から休憩時間を引く
                $office_hour = $work_minute_in_n_time_wk - $total_break;
                if ($office_hour < 0) {
                    $office_hour = 0;
                }

                // 端数処理情報.出退勤端数処理区分 = 00:時間 かつ 出勤の端数処理区分が設定されている場合
                if ($this->fraction->FRACTION_CLS_CD == "00" && !is_null($this->fraction->WTHR_UNDER_MI)) {
                    // 出勤時間の端数処理
                    $office_hour = $this->calcFractionMinute(
                        $office_hour,
                        $this->fraction->WTHR_UNDER_MI,
                        $this->fraction->WTHR_FRC_CLS_CD
                    );
                }

                // 出勤時間を時間と分に分ける
                $work_time = $this->convertMinuteToTime($office_hour);

                // 就業情報.出勤時間 登録
                $this->work->WORK_TIME_HH = $work_time['Hour'];
                $this->work->WORK_TIME_MI = $work_time['Minute'];


                // **************************************************
                //  早退時間算出 ※③
                // **************************************************
                if (($work_minute_in_n_time_wk - $total_break) < $n_time_wk_span
                        && $this->work_ptn->NTIME_LEAVE_CLS_CD == "01") {
                    $leave_time_minute = 0;  // 早退時間(分単位)

                    // 早退時間(分)取得
                    $leave_time_minute = $n_time_wk_span - ($work_minute_in_n_time_wk - $total_break);

                    // 端数処理情報.出退勤端数処理区分 = 00:時間 かつ 早退の端数処理区分が設定されている場合
                    if ($this->fraction->FRACTION_CLS_CD == "00" && !is_null($this->fraction->ERHR_UNDER_MI)) {
                        // 早退時間の端数処理
                        $leave_time_minute = $this->calcFractionMinute(
                            $leave_time_minute,
                            $this->fraction->ERHR_UNDER_MI,
                            $this->fraction->ERHR_FRC_CLS_CD
                        );
                    }

                    // 早退時間を時間と分に分ける
                    $leave_time = $this->convertMinuteToTime($leave_time_minute);

                    // 就業情報.早退時間 登録
                    $this->work->LEAVE_TIME_HH = $leave_time['Hour'];
                    $this->work->LEAVE_TIME_MI = $leave_time['Minute'];
                }

                // **************************************************
                //  割増対象時間算出
                // **************************************************
                $regular_in_ext_time_list = collect();
                $total_ext_time = 0;

                $regular_time_range = $this->work_time_info_list[$n_time_wk['Cd']]['WorkTimeRange'];
                foreach ($this->work_ptn_p_time_ext_list as $p_time_ext) {
                    $ext_range = self::TIME_RANGE_TYPE;
                    $ext_range['START'] = $p_time_ext['StartTime'];
                    $ext_range['END'] = $p_time_ext['EndTime'];

                    // 就業時間に含まれる割増時間の時刻調整
                    $ret = $this->adjustIncludTimeRange2($regular_time_range, $ext_range);
                    // 就業時間範囲内に、割増時間が含まれない場合
                    if (!$ret) {
                        continue;
                    }
                    // 就業時間内の割増時間を取得
                    $ex_time_minute = $this->getExTime($p_time_ext['Cd'], $ext_range['START'], $ext_range['END']);

                    $regular_in_ext_time_list->push($p_time_ext['Cd'], $ex_time_minute);

                    // 割増時間の端数処理
                    if ($this->fraction->FRACTION_CLS_CD == "00") {
                        foreach ($this->frc_ext_list as $frc_ext) {
                            if ($frc_ext['Cd'] == $p_time_ext['Cd']) {
                                $ex_time_minute = $this->calcFractionMinute(
                                    $ex_time_minute,
                                    $frc_ext['UnderMi'],
                                    $frc_ext['FrcClsCd']
                                );
                                break;
                            }
                        }
                    }

                    $total_ext_time += $ex_time_minute;

                    // 就業情報.割増項目時間 登録
                    $ex_time = $this->convertMinuteToTime($ex_time_minute); // 割増対象時間を時間と分に分ける
                    switch ($p_time_ext['Cd']) {
                        case "200":
                            $this->work->EXT1_TIME_HH += $ex_time['Hour'];
                            $this->work->EXT1_TIME_MI += $ex_time['Minute'];
                            break;

                        case "201":
                            $this->work->EXT2_TIME_HH += $ex_time['Hour'];
                            $this->work->EXT2_TIME_MI += $ex_time['Minute'];
                            break;

                        case "202":
                            $this->work->EXT3_TIME_HH += $ex_time['Hour'];
                            $this->work->EXT3_TIME_MI += $ex_time['Minute'];
                            break;
                    }
                }

                // (休憩時間を除いた)就業時間より割増時間の合計が大きい場合は、割増時間から休憩時間を引く
                if ($office_hour < $total_ext_time) {
                    $total_break_for_ext_adjust = $total_ext_time - $office_hour;
                    if ($this->mt01->getMt01->RSV1_CLS_CD == "00") {
                        // 休憩時間優先順序
                        $brk_priority_query = $this->work_ptn_p_time_ext_list->sortBy('BreakTimePriority');
                        foreach ($brk_priority_query as $x) {
                            $this->subtractBrkFromExt($x['Cd'], $total_break_for_ext_adjust);
                            if ($total_break_for_ext_adjust == 0) {
                                break;
                            }
                        }
                    } else {
                        // 割増時間の多い順
                        $regular_in_ext_time_query = $regular_in_ext_time_list->sortByDesc('Value');
                        foreach ($regular_in_ext_time_query as $x) {
                            $this->subtractBrkFromExt($x['Key'], $total_break_for_ext_adjust);
                            if ($total_break_for_ext_adjust == 0) {
                                break;
                            }
                        }
                    }
                }
            } else {
                // 対象の勤怠項目内での勤務時間を取得
                if ($n_time_wk_span < $work_time_minute) {
                    $work_minute_in_n_time_wk = $n_time_wk_span;
                } else {
                    $work_minute_in_n_time_wk = $work_time_minute;
                }

                // **************************************************
                // 残業項目時間算出
                // **************************************************
                $n_time_minute1 = $work_minute_in_n_time_wk;
                $n_time_minute2 = 0;

                // 現在の残業項目の時刻範囲を勤怠項目時間情報リストより取得
                $over_time_range = $this->work_time_info_list[$n_time_wk['Cd']]['WorkTimeRange'];

                // 時間数の残業項目に含まれる、時間帯の残業項目時間を算出
                $tai_wk_query = $this->work_ptn_n_time_wk_list->where('DclsCd', '00')->sortBy('StartPTime');
                foreach ($tai_wk_query as $tai_wk) {
                    $tai_wk_range = self::TIME_RANGE_TYPE;
                    $tai_wk_range['START'] = $tai_wk['StartPTime'];
                    $tai_wk_range['END'] = $tai_wk['EndPTime'];

                    // 時間帯の残業項目時刻を、時間数の残業項目時間を基に調整
                    $ret = $this->adjustIncludTimeRange2($over_time_range, $tai_wk_range);
                    // 時間数の残業項目時間範囲内に、時間の帯残業項目時刻が含まれない場合
                    if (!$ret) {
                        continue;
                    }

                    // 時間数の残業項目時間内の時間帯の残業項目時間を取得
                    $tai_wk_minutes = floor($tai_wk_range['START']->diffInMinutes($tai_wk_range['END']));
                    // 時間帯残業時間から外出時間を引く
                    if (key_exists($tai_wk['Cd'], $this->total_out_time_by_work)) {
                        $tai_wk_minutes -= $this->total_out_time_by_work[$tai_wk['Cd']];
                    }

                    // 時間数の勤怠項目に含まれる、時間帯の勤怠項目時間を合計
                    $n_time_minute2 += $tai_wk_minutes;

                    // 残業項目時間の端数処理
                    if ($this->fraction->FRACTION_CLS_CD == "00") {
                        foreach ($this->frc_ovtm_list as $frc_ovtm) {
                            if ($frc_ovtm['Cd'] == $tai_wk['Cd']) {
                                $tai_wk_minutes = $this->calcFractionMinute(
                                    $tai_wk_minutes,
                                    $frc_ovtm['UnderMi'],
                                    $frc_ovtm['FrcClsCd']
                                );
                            }
                        }
                    }

                    // 時間帯の残業項目時間を登録
                    $ovtm_minutes = 0;
                    switch ($tai_wk['Cd']) {
                        case "100":
                            $ovtm_minutes = $this->convertTimeToMinute(
                                $this->work->OVTM1_TIME_HH,
                                $this->work->OVTM1_TIME_MI
                            );
                            $tai_over_time = $this->convertMinuteToTime($ovtm_minutes + $tai_wk_minutes);
                            $this->work->OVTM1_TIME_HH = $tai_over_time['Hour'];
                            $this->work->OVTM1_TIME_MI = $tai_over_time['Minute'];
                            break;

                        case "101":
                            $ovtm_minutes = $this->convertTimeToMinute(
                                $this->work->OVTM2_TIME_HH,
                                $this->work->OVTM2_TIME_MI
                            );
                            $tai_over_time = $this->convertMinuteToTime($ovtm_minutes + $tai_wk_minutes);
                            $this->work->OVTM2_TIME_HH = $tai_over_time['Hour'];
                            $this->work->OVTM2_TIME_MI = $tai_over_time['Minute'];
                            break;

                        case "102":
                            $ovtm_minutes = $this->convertTimeToMinute(
                                $this->work->OVTM3_TIME_HH,
                                $this->work->OVTM3_TIME_MI
                            );
                            $tai_over_time = $this->convertMinuteToTime($ovtm_minutes + $tai_wk_minutes);
                            $this->work->OVTM3_TIME_HH = $tai_over_time['Hour'];
                            $this->work->OVTM3_TIME_MI = $tai_over_time['Minute'];
                            break;

                        case "103":
                            $ovtm_minutes = $this->convertTimeToMinute(
                                $this->work->OVTM4_TIME_HH,
                                $this->work->OVTM4_TIME_MI
                            );
                            $tai_over_time = $this->convertMinuteToTime($ovtm_minutes + $tai_wk_minutes);
                            $this->work->OVTM4_TIME_HH = $tai_over_time['Hour'];
                            $this->work->OVTM4_TIME_MI = $tai_over_time['Minute'];
                            break;

                        case "104":
                            $ovtm_minutes = $this->convertTimeToMinute(
                                $this->work->OVTM5_TIME_HH,
                                $this->work->OVTM5_TIME_MI
                            );
                            $tai_over_time = $this->convertMinuteToTime($ovtm_minutes + $tai_wk_minutes);
                            $this->work->OVTM5_TIME_HH = $tai_over_time['Hour'];
                            $this->work->OVTM5_TIME_MI = $tai_over_time['Minute'];
                            break;

                        case "105":
                            $ovtm_minutes = $this->convertTimeToMinute(
                                $this->work->OVTM6_TIME_HH,
                                $this->work->OVTM6_TIME_MI
                            );
                            $tai_over_time = $this->convertMinuteToTime($ovtm_minutes + $tai_wk_minutes);
                            $this->work->OVTM6_TIME_HH = $tai_over_time['Hour'];
                            $this->work->OVTM6_TIME_MI = $tai_over_time['Minute'];
                            break;
                    }
                }

                // 時間数の残業時間から時間帯の残業時間を引く
                $n_time_minute1 -= $n_time_minute2;

                // 残業項目時間の端数処理
                if ($this->fraction->FRACTION_CLS_CD == "00") {
                    foreach ($this->frc_ovtm_list as $frc_ovtm) {
                        if ($frc_ovtm['Cd'] == $n_time_wk['Cd']) {
                            $n_time_minute1 = $this->calcFractionMinute(
                                $n_time_minute1,
                                $frc_ovtm['UnderMi'],
                                $frc_ovtm['FrcClsCd']
                            );
                        }
                    }
                }

                // 時間数の残業項目時間を登録
                $over_time = $this->convertMinuteToTime($n_time_minute1);
                switch ($n_time_wk['Cd']) {
                    case "100":
                        $this->work->OVTM1_TIME_HH = $over_time['Hour'];
                        $this->work->OVTM1_TIME_MI = $over_time['Minute'];
                        break;

                    case "101":
                        $this->work->OVTM2_TIME_HH = $over_time['Hour'];
                        $this->work->OVTM2_TIME_MI = $over_time['Minute'];
                        break;

                    case "102":
                        $this->work->OVTM3_TIME_HH = $over_time['Hour'];
                        $this->work->OVTM3_TIME_MI = $over_time['Minute'];
                        break;

                    case "103":
                        $this->work->OVTM4_TIME_HH = $over_time['Hour'];
                        $this->work->OVTM4_TIME_MI = $over_time['Minute'];
                        break;

                    case "104":
                        $this->work->OVTM5_TIME_HH = $over_time['Hour'];
                        $this->work->OVTM5_TIME_MI = $over_time['Minute'];
                        break;

                    case "105":
                        $this->work->OVTM6_TIME_HH = $over_time['Hour'];
                        $this->work->OVTM6_TIME_MI = $over_time['Minute'];
                        break;
                }
                $work_minute_in_n_time_wk = $n_time_minute1 + $n_time_minute2;
            }

            // 勤怠項目の勤怠時間が残りの勤務時間以上ならば処理を抜ける
            if ($n_time_wk_span < $work_time_minute) {
                // 終了時刻を退避
                $pre_end_time = $n_time_wk['EndNTime'];

                // 勤務時間から勤怠項目時間を引く
                $work_time_minute -= $work_minute_in_n_time_wk;
                if ($work_time_minute <= 0) {
                    break;
                }
            } else {
                break;
            }
        }

        // 残業時間を集計
        $total_over_time = 0;
        $total_over_time += $this->convertTimeToMinute($this->work->OVTM1_TIME_HH, $this->work->OVTM1_TIME_MI); // 残業項目１
        $total_over_time += $this->convertTimeToMinute($this->work->OVTM2_TIME_HH, $this->work->OVTM2_TIME_MI); // 残業項目２
        $total_over_time += $this->convertTimeToMinute($this->work->OVTM3_TIME_HH, $this->work->OVTM3_TIME_MI); // 残業項目３
        $total_over_time += $this->convertTimeToMinute($this->work->OVTM4_TIME_HH, $this->work->OVTM4_TIME_MI); // 残業項目４
        $total_over_time += $this->convertTimeToMinute($this->work->OVTM5_TIME_HH, $this->work->OVTM5_TIME_MI); // 残業項目５
        $total_over_time += $this->convertTimeToMinute($this->work->OVTM6_TIME_HH, $this->work->OVTM6_TIME_MI); // 残業項目６

        // 残業未対応時間 判定処理
        if ($total_over_time < $this->over_tm_lmt->NO_OVERTM_MI) {
            // 残業時間の合計が残業未対応時間未満の場合は残業項目時間に0をセット
            $this->work->OVTM1_TIME_HH = 0;   // 残業項目１
            $this->work->OVTM1_TIME_MI = 0;
            $this->work->OVTM2_TIME_HH = 0;   // 残業項目２
            $this->work->OVTM2_TIME_MI = 0;
            $this->work->OVTM3_TIME_HH = 0;   // 残業項目３
            $this->work->OVTM3_TIME_MI = 0;
            $this->work->OVTM4_TIME_HH = 0;   // 残業項目４
            $this->work->OVTM4_TIME_MI = 0;
            $this->work->OVTM5_TIME_HH = 0;   // 残業項目５
            $this->work->OVTM5_TIME_MI = 0;
            $this->work->OVTM6_TIME_HH = 0;   // 残業項目６
            $this->work->OVTM6_TIME_MI = 0;
        }
    }

    /**
     *  各種日数の設定をします。
     *  ※① 勤務体系情報の出勤区分が"01:通常出勤"かつ、出勤区分時間参照ありで、出勤時間が設定されている場合。または、出勤区分時間参照なし。
     *  ※② 勤務体系情報の出勤区分が"02:休日出勤"かつ、休出区分時間参照ありで、出勤時間が設定されている場合。または、休出区分時間参照なし。
     *  ※③ 特休区分時間参照ありで、出勤時間または残業時間が設定されている場合。または、特休区分時間参照なし。
     *  ※④ 有休区分時間参照ありで、出勤時間または残業時間が設定されている場合。または、有休区分時間参照なし。
     *  ※⑤ 欠勤区分時間参照ありで、出勤時間または残業時間が設定されている場合。または、欠勤区分時間参照なし。
     *  ※⑥ 代休区分時間参照ありで、出勤時間または残業時間が設定されている場合。または、代休区分時間参照なし。
     *  ※⑦ 振休区分時間参照ありで、出勤時間または残業時間が設定されている場合。または、振休区分時間参照なし。
     *  ※⑧ 振出区分時間参照ありで、出勤時間または残業時間が設定されている場合。または、振出区分時間参照なし。
     *  ※⑨ 無特区分時間参照ありで、出勤時間または残業時間が設定されている場合。または、無特区分時間参照なし。
     */
    private function setDayCount()
    {
        // 出勤時間フラグ
        $is_exist_work_time = false;

        // 出勤時間が設定されていればフラグを立てる
        if (0 < $this->work->WORK_TIME_HH || 0 < $this->work->WORK_TIME_MI
            || 0 < $this->work->OVTM1_TIME_HH || 0 < $this->work->OVTM1_TIME_MI
            || 0 < $this->work->OVTM2_TIME_HH || 0 < $this->work->OVTM2_TIME_MI
            || 0 < $this->work->OVTM3_TIME_HH || 0 < $this->work->OVTM3_TIME_MI
            || 0 < $this->work->OVTM4_TIME_HH || 0 < $this->work->OVTM4_TIME_MI
            || 0 < $this->work->OVTM5_TIME_HH || 0 < $this->work->OVTM5_TIME_MI
            || 0 < $this->work->OVTM6_TIME_HH || 0 < $this->work->OVTM6_TIME_MI
        ) {
            $is_exist_work_time = true;
        }

        // 出勤日数 ※①
        if ($this->work_ptn->WORK_CLS_CD == "01") {
            if (($this->reason->WORKDAY_CLS_CD == "01" && $is_exist_work_time)
                    || $this->reason->WORKDAY_CLS_CD == "02") {
                $this->work->WORKDAY_CNT = $this->reason->WORKDAY_NO;
            }
        }

        // 休出日数 ※②
        if ($this->work_ptn->WORK_CLS_CD == "00") {
            if (($this->reason->HOLWORK_CLS_CD == "01" && $is_exist_work_time)
                    || $this->reason->HOLWORK_CLS_CD == "02") {
                $this->work->HOLWORK_CNT = $this->reason->WORKDAY_NO;
            }
        }

        // 特休日数 ※③
        if (($this->reason->SPCHOL_CLS_CD == "01" && $is_exist_work_time) || $this->reason->SPCHOL_CLS_CD == "02") {
            $this->work->SPCHOL_CNT = $this->reason->WORKDAY_NO;
        }

        // 有休日数 ※④
        if (($this->reason->PADHOL_CLS_CD == "01" && $is_exist_work_time) || $this->reason->PADHOL_CLS_CD == "02") {
            $this->work->PADHOL_CNT = $this->reason->WORKDAY_NO;
        }

        // 欠勤日数 ※⑤
        if (($this->reason->ABCWORK_CLS_CD == "01" && $is_exist_work_time) || $this->reason->ABCWORK_CLS_CD == "02") {
            $this->work->ABCWORK_CNT = $this->reason->WORKDAY_NO;
        }

        // 代休日数 ※⑥
        if (($this->reason->COMPDAY_CLS_CD == "01" && $is_exist_work_time) || $this->reason->COMPDAY_CLS_CD == "02") {
            $this->work->COMPDAY_CNT = $this->reason->WORKDAY_NO;
        }

        // 振休日数 ※⑦
        if (($this->reason->SUBHOL_CLS_CD == "01" && $is_exist_work_time) || $this->reason->SUBHOL_CLS_CD == "02") {
            $this->work->SUBHOL_CNT = $this->reason->WORKDAY_NO;
        }

        // 振出日数 ※⑧
        if (($this->reason->SUBWORK_CLS_CD == "01" && $is_exist_work_time) || $this->reason->SUBWORK_CLS_CD == "02") {
            $this->work->SUBWORK_CNT = $this->reason->WORKDAY_NO;
        }

        // 無特日数 ※⑨
        if (($this->reason->RSV1_CLS_CD == "01" && $is_exist_work_time) || $this->reason->RSV1_CLS_CD == "02") {
            $this->work->RSV1_CNT = $this->reason->WORKDAY_NO;
        }
    }

    /**
     * 引数を基に分を端数処理をした時刻を返します。
     * 当処理では、under_miには[0,5,10,15,20,30,60]しか入ってこないものと想定している。
     *
     * @param [type] $target_time 端数処理対象の時刻
     * @param [type] $under_mi 端数単位の分
     * @param [type] $frc_cls_cd 端数処理区分コード
     *               00 : 切上げ
     *               01 : 切捨て
     *               02 : 四捨五入
     * @return object 端数処理後の時刻
     */
    private function calcFractionTime($target_time, $under_mi, $frc_cls_cd)
    {
        // 戻り値
        $return_date = $target_time;

        // まるめ対象の時刻から[分]を取得
        $frc_mi = $target_time->minute;

        // 端数単位が"0"のときは端数処理を行わない
        if ($under_mi == 0) {
            return $return_date;
        }

        // 端数単位で分が割切れる場合は端数処理を行う必要がない
        $mod_result = $frc_mi % $under_mi;
        if ($mod_result == 0) {
            return $return_date;
        }

        // 端数処理
        switch ($frc_cls_cd) {
            // 切上げ
            case "00":
                $frc_mi = $frc_mi + $under_mi - $mod_result;
                // 端数処理した分が60を超える場合は0に設定する。
                if (60 <= $frc_mi) {
                    $frc_mi = 0;
                }
                // 端数処理した分を設定
                $return_date->minute = $frc_mi;
                // 端数処理した分が0の場合は1時間足す
                if ($frc_mi == 0) {
                    $return_date->addHour();
                }
                break;

            // 切捨て
            case "01":
                // 端数処理した分を設定
                $return_date->minute = $frc_mi - $mod_result;
                break;

            // 四捨五入
            case "02":
                $is_hour_up = false;
                $round_value = intdiv($under_mi, 2);
                $round_value += $frc_mi;
                $frc_mi = intdiv($round_value, $under_mi) * $under_mi;
                // 端数処理した分が60以上の場合は0に設定する。
                if (60 <= $frc_mi) {
                    $frc_mi = 0;
                    $is_hour_up = true;
                }
                // 端数処理した分を設定
                $return_date->minute = $frc_mi;
                // 端数処理した分が60を超えていた場合($is_hour_up=true)には1時間足す
                if ($is_hour_up) {
                    $return_date->addHour();
                }
                break;
        }

        return $return_date;
    }

    /**
     * 引数を基に分を端数処理をした分を返します。
     *
     * @param [type] $target_mi 端数処理対象の分
     * @param [type] $under_mi 端数単位の分
     * @param [type] $frc_cls_cd 端数処理区分コード
     * 00 : 切上げ
     * 01 : 切捨て
     * 02 : 四捨五入
     * @return int 端数処理後の分
     */
    private function calcFractionMinute($target_mi, $under_mi, $frc_cls_cd)
    {
        // 戻り値設定
        $return_mi = $target_mi;

        // まるめ対象の[分]を取得
        $frc_mi = $target_mi;

        // 端数単位が"0"のときは端数処理を行わない
        if ($under_mi == 0) {
            return $return_mi;
        }

        // 端数単位で分が割切れる場合は端数処理を行う必要がない
        $mod_result = $frc_mi % $under_mi;
        if ($mod_result == 0) {
            return $return_mi;
        }

        // 端数処理
        switch ($frc_cls_cd) {
            // 切上げ
            case "00":
                $return_mi = $frc_mi + $under_mi - $mod_result;
                break;

            // 切捨て
            case "01":
                $return_mi = $frc_mi - $mod_result;
                break;

            // 四捨五入
            case "02":
                $round_value = intdiv($under_mi, 2);
                $round_value += $frc_mi;
                $return_mi = intdiv($round_value, $under_mi) * $under_mi;
                break;
        }

        return $return_mi;
    }

    /**
     * 引数の分を時間と分に分割した値を返します。
     *
     * @param [type] $target_mi 処理対象の分
     * @return array 時間と分を格納した配列
     */
    private function convertMinuteToTime($target_mi)
    {
        $hm = self::HOUR_MINUTE_TYPE;
        $hm['Hour'] = intdiv($target_mi, 60);
        $hm['Minute'] = $target_mi % 60;
        return $hm;
    }

    /**
     * 引数の時、分を分にした値を返します。
     *
     * @param [type] $target_hour 時
     * @param [type] $target_minute 分
     * @return int 分
     */
    private function convertTimeToMinute($target_hour, $target_minute)
    {
        return $target_hour * 60 + $target_minute;
    }

    /**
     * 対象の時刻がいづれかの時間帯・勤怠項目時刻範囲に含まれるか否かを返します。
     *
     * @param [type] $target_time 比較する時刻
     * @param [type] $target_time_mode 比較する時刻が開始時刻か終了時刻か
     * @return boolean
     */
    private function isIncludeWorkPtnPTimeRange($target_time, $target_time_mode)
    {
        $exist = false;
        if ($target_time_mode == self::RANGE_OPTION['Start']) {
            // 開始時刻以上、終了時刻未満の範囲
            foreach ($this->work_ptn_p_time_wk_list as $p_time_wk) {
                if ($p_time_wk['StartTime']->lte($target_time) && $target_time->lt($p_time_wk['EndTime'])) {
                    $exist = true;
                    break;
                }
            }
        } else {
            // 開始時刻より大きく、終了時刻以下の範囲
            foreach ($this->work_ptn_p_time_wk_list as $p_time_wk) {
                if ($p_time_wk['StartTime']->lt($target_time) && $target_time->lte($p_time_wk['EndTime'])) {
                    $exist = true;
                    break;
                }
            }
        }
        return $exist;
    }

    /**
     * 対象時刻の直近の勤怠項目時刻を返します。
     *
     * @param [type] $target_time 対象時刻
     * @param [type] $compaer_mode 対象時刻の比較モード
     * Start : 対象時刻よりも大きい直近の勤怠項目開始時刻を検索します。
     * End   : 対象時刻よりも小さい直近の勤怠項目終了時刻を検索します。
     * @return 比較モードでStart選択時 : 対象時刻よりも大きい直近の勤怠項目開始時刻
     *         比較モードでEnd選択時   : 対象時刻よりも小さい直近の勤怠項目終了時刻
     */
    private function getNearWorkPtnPTime($target_time, $compaer_mode)
    {
        $near_p_time = null;
        // 直近の勤怠項目開始時刻検索
        if ($compaer_mode == self::RANGE_OPTION['Start']) {
            // 時間帯・勤怠項目リストを対象時刻より大きい時刻で絞り込み、開始時刻を昇順で並び変えたリストを取得
            $p_time_wk_query = $this->work_ptn_p_time_wk_list
                ->where('StartTime', '>', $target_time)
                ->sortBy('StartTime');

            // 昇順で並び変えたリストの最初の開始時刻(絞り込んだリスト内で最小)を取得
            $near_p_time = $p_time_wk_query->first()['StartTime'];

        // 直近の勤怠項目終了時刻検索
        } elseif ($compaer_mode == self::RANGE_OPTION['End']) {
            // 時間帯・勤怠項目リストを対象時刻より小さい時刻で絞り込み、終了時刻を降順で並び変えたリストを取得
            $p_time_wk_query = $this->work_ptn_p_time_wk_list
                ->where('EndTime', '<', $target_time)
                ->sortByDesc('EndTime');

            // 降順で並び変えたリストの最初の終了時刻(絞り込んだリスト内で最大)を取得
            $near_p_time = $p_time_wk_query->first()['EndTime'];
        }

        // 直近の勤怠項目時刻
        return $near_p_time;
    }

    /**
     * 引数の時刻がいずれかの休憩時間時刻範囲に含まれる場合、休憩時刻を返します。
     *
     * @param $target_time 休憩時間時刻範囲に含まれる時刻
     * @param $target_time_mode 時刻が開始時刻か終了時刻か
     * @return object
     * targetTimeMode=Start(開始時刻) : 該当する休憩時刻の休憩終了時刻
     * targetTimeMode=End(終了時刻)   : 該当する休憩時刻の休憩開始時刻
     * どの休憩時間時刻範囲にも含まれない場合は、targetTimeを返します。
     */
    private function getPBrkTime($target_time, $target_time_mode)
    {
        // 対象の時刻が休憩時間時刻範囲に含まれる場合は休憩時刻を返し、処理終了
        if ($target_time_mode == self::RANGE_OPTION['Start']) {
            // 開始時刻以上、終了時刻未満の範囲
            $p_brk_query = $this->work_ptn_p_brk_list
                ->where('StartTime', '<=', $target_time)
                ->where('EndTime', '>', $target_time);

            // 該当リストがあれば、休憩終了時刻を返す
            if (1 <= $p_brk_query->count()) {
                return $p_brk_query->first()['EndTime'];
            }
        } else {
            // 開始時刻より大きく、終了時刻以下の範囲
            $p_brk_query = $this->work_ptn_p_brk_list
                ->where('StartTime', '<', $target_time)
                ->where('EndTime', '>=', $target_time);

            // 該当リストがあれば、休憩開始時刻を返す
            if (1 <= $p_brk_query->count()) {
                return $p_brk_query->first()['StartTime'];
            }
        }

        // どの休憩時間時刻範囲にも含まれなかった場合は、引数で送られてきた値を返す
        return $target_time;
    }

    /**
     * 対象時刻内での外出時間を分単位で返します。
     *
     * @param $out_start_time 外出開始時刻
     * @param $out_end_time 外出終了時刻
     * @return int 外出時間(分)
     * 勤務体系情報.休憩時間設定区分が00:時間帯の場合は、休憩時間を含めない外出時間を算出する。
     * 対象時刻には、勤怠項目時刻 / 割増対象時刻 / 勤務体系時刻 のいずれかが設定します。
     */
    private function getOutTimeInTargetTime2($out_start_time, $out_end_time)
    {
        // 対象時刻内の外出時間を分で取得
        $total_out_time_minute = floor($out_start_time->diffInMinutes($out_end_time));

        // 外出時間から休憩時間を引かない場合(休憩時間設定区分が"00:時間帯"以外)
        if ($this->work_ptn->BREAK_CLS_CD !== "00") {
            return $total_out_time_minute;
        }

        // -- 外出時間から休憩時間を引く --
        foreach ($this->work_ptn_p_brk_list as $p_brk) {
            $brk_time = 0;

            // 外出時刻内に休憩時刻がない
            if ($out_end_time->lte($p_brk['StartTime'])) {
                continue;
            }
            if ($p_brk['EndTime']->lte($out_start_time)) {
                continue;
            }

            // 外出時刻内での休憩開始時刻を取得
            if ($p_brk['StartTime']->lte($out_start_time)) {
                $p_brk['StartTime'] = $out_start_time;
            }

            // 外出時刻内での休憩終了時刻を取得
            if ($out_end_time->lt($p_brk['EndTime'])) {
                $p_brk['EndTime'] = $out_end_time;
            }

            // 外出時刻内の休憩時間を分で取得
            $brk_time = floor($p_brk['StartTime']->diffInMinutes($p_brk['EndTime']));

            // 外出時間から休憩時間を引く
            $total_out_time_minute -= $brk_time;
        }

        return $total_out_time_minute;
    }

    /**
     * 対象時刻内での休憩時間帯・休憩時間の合計を分単位で返します。
     *
     * @param $target_start_time 対象開始時刻
     * @param $target_end_time 対象終了時刻
     * @param $out_start_time 外出開始時刻
     * @param $out_end_time 外出終了時刻
     * @return int 外出時間(分)
     * 勤務体系情報.休憩時間設定区分が00:時間帯の場合は、休憩時間を含めない外出時間を算出する。
     * 対象時刻には、勤怠項目時刻 / 割増対象時刻 / 勤務体系時刻 のいずれかが設定します。
     */
    private function getOutTimeInTargetTime4(
        $target_start_time,
        $target_end_time,
        $out_start_time,
        $out_end_time
    ) {
        $calc_out_time = self::TIME_RANGE_TYPE;    // 外出時間計算用
        $total_out_time_minute = 0;   // 外出時間

        // 対象時刻内に外出時刻がない
        if ($target_end_time->lte($out_start_time) || $out_end_time->lte($target_start_time)) {
            return 0;
        }

        // 対象時刻内での外出開始時刻を取得
        if ($out_start_time->lte($target_start_time)) {
            $calc_out_time['START'] = $target_start_time;
        } else {
            $calc_out_time['START'] = $out_start_time;
        }

        // 対象時刻内での外出終了時刻を取得
        if ($out_end_time->lte($target_end_time)) {
            $calc_out_time['END'] = $out_end_time;
        } else {
            $calc_out_time['END'] = $target_end_time;
        }

        // 対象時刻内の外出時間を分で取得
        $total_out_time_minute = floor($calc_out_time['START']->diffInMinutes($calc_out_time['END']));

        // 外出時間から休憩時間を引かない場合(休憩時間設定区分が"00:時間帯"以外)
        if ($this->work_ptn->BREAK_CLS_CD <> "00") {
            return $total_out_time_minute;
        }

        // -- 外出時間から休憩時間を引く --
        foreach ($this->work_ptn_p_brk_list as $p_brk) {
            $brk_time = 0;

            // 外出時刻内に休憩時刻がない
            if ($calc_out_time['END']->lte($p_brk['StartTime'])) {
                continue;
            }
            if ($p_brk['EndTime']->lte($calc_out_time['START'])) {
                continue;
            }

            // 外出時刻内での休憩開始時刻を取得
            if ($p_brk['StartTime']->lte($calc_out_time['START'])) {
                $p_brk['StartTime'] = $calc_out_time['START'];
            }

            // 外出時刻内での休憩終了時刻を取得
            if ($calc_out_time['END']->lt($p_brk['EndTime'])) {
                $p_brk['EndTime'] = $calc_out_time['END'];
            }

            // 外出時刻内の休憩時間を分で取得
            $brk_time = floor($p_brk['StartTime']->diffInMinutes($p_brk['EndTime']));

            // 外出時間から休憩時間を引く
            $total_out_time_minute -= $brk_time;
        }

        return $total_out_time_minute;
    }

    /**
     * 対象時刻内での休憩時間帯・休憩時間の合計を分単位で返します。
     *
     * @param [type] $target_start_time 対象開始時刻
     * @param [type] $target_end_time 対象終了時刻
     * @return int 合計休憩時間(分)
     * 対象となる休憩時間は休憩時間帯・休憩時間になります。
     * 休憩時間数・休憩時間、休憩時間毎・休憩時間は処理対象外となります。
     */
    private function getPBrkTimeInTargetTime($target_start_time, $target_end_time)
    {
        $total_break_time = 0;

        foreach ($this->work_ptn_p_brk_list as $p_brk) {
            $calc_brk_time = self::TIME_RANGE_TYPE;

            $calc_brk_time['START'] = $p_brk['StartTime'];
            $calc_brk_time['END'] = $p_brk['EndTime'];

            // 対象時刻内に休憩時刻がない
            if ($target_end_time->lte($calc_brk_time['START']) || $calc_brk_time['END']->lte($target_start_time)) {
                continue;
            }

            // 対象時刻内での休憩開始時刻を取得
            if ($calc_brk_time['START']->lte($target_start_time)) {
                $calc_brk_time['START'] = $target_start_time;
            }

            // 対象時刻内での休憩終了時刻を取得
            if ($target_end_time->lt($calc_brk_time['END'])) {
                $calc_brk_time['END'] = $target_end_time;
            }

            // 対象時刻内の休憩時間を分で取得し、合計休憩時間に足す
            $total_break_time += floor($calc_brk_time['START']->diffInMinutes($calc_brk_time['END']));
        }

        return $total_break_time;
    }

    /**
     * 遅刻時間を分単位で返します。
     *
     * @param [type] $regular_wk_start_time 就業開始時刻
     * @return int 遅刻時間(分)
     * 勤務体系情報.休憩時間設定区分が00:時間帯の場合は、休憩時間を含めない遅刻時間を算出する。
     */
    private function getTardTime($regular_wk_start_time)
    {
        $tard_time_minute = 0;

        // 就業開始時刻以前に出勤した場合は、無遅刻
        if ($this->calc_time['OFC']->lte($regular_wk_start_time)) {
            return $tard_time_minute;
        }

        // 遅刻時間を分で取得
        $tard_time_minute = floor($regular_wk_start_time->diffInMinutes($this->calc_time['OFC']));

        // 遅刻時間から休憩時間を引かない場合(休憩時間設定区分が"00:時間帯"以外)
        if ($this->work_ptn->BREAK_CLS_CD <> "00") {
            return $tard_time_minute;
        }

        // 遅刻時間から休憩時間を引く
        foreach ($this->work_ptn_p_brk_list as $p_brk) {
            $calc_brk_time = self::TIME_RANGE_TYPE;
            $calc_brk_time['START'] = $p_brk['StartTime'];
            $calc_brk_time['END'] = $p_brk['EndTime'];

            // 遅刻時刻内に休憩時刻がない
            if ($this->calc_time['OFC']->lte($calc_brk_time['START'])
                    || $calc_brk_time['END']->lte($regular_wk_start_time)) {
                continue;
            }

            // 遅刻時刻内での休憩開始時刻を取得
            if ($calc_brk_time['START']->lte($regular_wk_start_time)) {
                $calc_brk_time['START'] = $regular_wk_start_time;
            }

            // 遅刻時刻内での休憩終了時刻を取得
            if ($this->calc_time['OFC']->lt($calc_brk_time['END'])) {
                $calc_brk_time['END'] = $this->calc_time['OFC'];
            }

            // 遅刻時刻内の休憩時間を分で取得し、遅刻時間から休憩時間を引く
            $tard_time_minute -= floor($calc_brk_time['START']->diffInMinutes($calc_brk_time['END']));
        }

        return $tard_time_minute;
    }

    /**
     * 早退時間を分単位で返します。
     *
     * @param [type] $regular_wk_end_time 就業終了時刻
     * @return int 早退時間(分)
     * 勤務体系情報.休憩時間設定区分が00:時間帯の場合は、休憩時間を含めない早退時間を算出する。
     */
    private function getLeaveTime($regular_wk_end_time)
    {
        $leave_time_minute = 0;

        // 就業終了時刻以降に退出した場合は、無早退
        if ($regular_wk_end_time->lte($this->calc_time['LEV'])) {
            return $leave_time_minute;
        }

        // 早退時間を分で取得
        $leave_time_minute = floor($this->calc_time['LEV']->diffInMinutes($regular_wk_end_time));

        // 早退時間から休憩時間を引かない場合(休憩時間設定区分が"00:時間帯"以外)
        if ($this->work_ptn->BREAK_CLS_CD <> "00") {
            return $leave_time_minute;
        }

        // 遅刻時間から休憩時間を引く
        foreach ($this->work_ptn_p_brk_list as $p_brk) {
            $calc_brk_time = self::TIME_RANGE_TYPE;

            $calc_brk_time['START'] = $p_brk['StartTime'];
            $calc_brk_time['END'] = $p_brk['EndTime'];

            // 早退時刻内に休憩時刻がない
            if ($regular_wk_end_time->lte($calc_brk_time['START'])
                    || $calc_brk_time['END']->lte($this->calc_time['LEV'])) {
                continue;
            }

            // 早退時刻内での休憩開始時刻を取得
            if ($calc_brk_time['START']->lte($this->calc_time['LEV'])) {
                $calc_brk_time['START'] = $this->calc_time['LEV'];
            }

            // 早退時刻内での休憩終了時刻を取得
            if ($regular_wk_end_time->lt($calc_brk_time['END'])) {
                $calc_brk_time['END'] = $regular_wk_end_time;
            }

            // 早退時刻内の休憩時間を分で取得し、早退時間から休憩時間を引く
            $leave_time_minute -= floor($calc_brk_time['START']->diffInMinutes($calc_brk_time['END']));
        }

        return $leave_time_minute;
    }

    /**
     * 割増時間を分単位で返します。
     *
     * @param $ext_cd 割増対象コード
     * @param $ex_start_time 割増対象開始時刻
     * @param $ex_end_time 割増対象終了時刻
     * @return int 割増時間(分)
     * 勤務体系情報.休憩時間設定区分が00:時間帯の場合は、休憩時間を含めない外出時間を算出する。
     */
    private function getExTime(
        $ext_cd,
        $ex_start_time,
        $ex_end_time
    ) {
        // 外出時間、休憩時間の引かれていない割増時間を算出
        $total_ex_time_minute = floor($ex_start_time->diffInMinutes($ex_end_time));

        // 対象の割増対象時刻範囲内に外出時間が存在したら、外出時間を引く
        if (key_exists($ext_cd, $this->total_out_time_by_ext)) {
            $total_ex_time_minute -= $this->total_out_time_by_ext[$ext_cd];
        }

        // 割増対象時間から休憩時間を引かない場合(休憩時間設定区分が"00:時間帯"以外)
        if ($this->work_ptn->BREAK_CLS_CD <> "00") {
            return $total_ex_time_minute;
        }

        // -- 割増対象時間から休憩時間を引く --
        foreach ($this->work_ptn_p_brk_list as $p_brk) {
            $calc_brk_time = self::TIME_RANGE_TYPE;
            $calc_brk_time['START'] = $p_brk['StartTime'];
            $calc_brk_time['END'] = $p_brk['EndTime'];

            // 割増対象時刻内に休憩時刻がない
            if ($ex_end_time->lte($calc_brk_time['START']) || $calc_brk_time['END']->lte($ex_start_time)) {
                continue;
            }

            // 割増対象時刻内での休憩開始時刻を取得
            if ($calc_brk_time['START']->lte($ex_start_time)) {
                $calc_brk_time['START'] = $ex_start_time;
            }

            // 割増対象時刻内での休憩終了時刻を取得
            if ($ex_end_time->lt($calc_brk_time['END'])) {
                $calc_brk_time['END'] = $ex_end_time;
            }

            // 割増対象時刻内の休憩時間を分で取得し、割増対象時間から休憩時間を引く
            $total_ex_time_minute -= floor($calc_brk_time['START']->diffInMinutes($calc_brk_time['END']));
        }

        return $total_ex_time_minute;
    }

    /**
     * 対象外出時刻内にある勤怠項目間の隙間時間を返します。
     *
     * @param $out_num 外出１に含まれる隙間時間を取得したい場合は、1を設定。外出２の隙間時間は、2を設定。
     * @return int 対象外出時間内にある勤怠項目間の隙間時間
     */
    private function getOutTimeInIntervalTime($out_num)
    {
        $out_time = self::TIME_RANGE_TYPE;
        switch ($out_num) {
            case 1:
                if (!$this->calc_proc_flg['IsOut1Time']) {
                    return 0; // 外出1の打刻がないので処理終了
                }
                $out_time['START'] = $this->calc_time['OUT1'];
                $out_time['END'] = $this->calc_time['IN1'];
                break;

            case 2:
                if (!$this->calc_proc_flg['IsOut2Time']) {
                    return 0; // 外出1の打刻がないので処理終了
                }
                $out_time['START'] = $this->calc_time['OUT2'];
                $out_time['END'] = $this->calc_time['IN2'];
                break;

            default:
                return 0;
        }

        // 外出開始時刻が勤怠項目時刻範囲内なら、隙間時間は必ず0
        $total_out_time = 0;
        $pre_end_time = null;
        foreach ($this->work_time_info_list as $work_time_info) {
            if ($work_time_info['WorkTimeRange']['START']->lte($out_time['START'])
                    && $out_time['START']->lt($work_time_info['WorkTimeRange']['END'])) {
                return 0;
            }

            if ($pre_end_time == null) {
                $pre_end_time = $work_time_info['WorkTimeRange']['END'];
            }

            if ($pre_end_time->lte($out_time['START'])
                    && $out_time['START']->lt($work_time_info['WorkTimeRange']['START'])) {
                // 隙間時間に外出開始
                $total_out_time = floor($out_time['START']->diffInMinutes($work_time_info['WorkTimeRange']['START']));

                // 休憩時間帯の場合は、隙間時間内の休憩時間を引く
                if ($this->work_ptn->BREAK_CLS_CD === "00") {
                    $total_out_time -= $this->getPBrkTimeInTargetTime(
                        $out_time['START'],
                        $work_time_info['WorkTimeRange']['START']
                    );
                }
                break;
            } else {
                $pre_end_time = $work_time_info['WorkTimeRange']['END'];
            }
        }
        return $total_out_time;
    }

    /**
     * 割増時刻範囲を就業時刻に合わせます。
     *
     * @param $ext_time_range 割増時刻範囲
     * @return boolean
     * true : 就業時刻範囲内に割増時刻が含まれる
     * false : 就業時刻範囲内に割増時刻が含まれない
     */
    private function adjustExtTimeRange(&$ext_time_range)
    {
        // 就業時間の時刻取得
        $regular_work_time_range = self::TIME_RANGE_TYPE;
        foreach ($this->work_time_info_list as $key => $work_time_info) {
            if ($this->mt94->isRegularWork($key)) {
                $regular_work_time_range = $work_time_info['WorkTimeRange'];
                break;
            }
        }

        // 就業時間外の割増(割増開始時刻が就業時間終了後または、割増終了時刻が就業時間開始時刻前)
        if ($regular_work_time_range['END']->lte($ext_time_range['START'])
                || $ext_time_range['END']->lte($regular_work_time_range['START'])) {
            return false;
        }

        // 就業時間内に含まれる割増(割増時刻の変更はなし)
        if ($regular_work_time_range['START']->lte($ext_time_range['START'])
                && $ext_time_range['END']->lte($regular_work_time_range['END'])) {
            return true;
        }

        // 就業開始時刻より早い、割増開始時刻
        if ($ext_time_range['START']->lt($regular_work_time_range['START'])) {
            $ext_time_range['START'] = $regular_work_time_range['START'];
        }

        // 就業終了時刻より遅い、割増終了時刻
        if ($regular_work_time_range['END']->lt($ext_time_range['END'])) {
            $ext_time_range['END'] = $regular_work_time_range['END'];
        }

        return true;
    }

    /**
     * 職務種別が時間数で時間帯の勤怠項目である残業時間帯の外出時間を分単位で取得します
     *
     * @param $n_time_start
     * @param $n_time_end
     * @param $out_start_time 外出開始時刻
     * @param $out_end_time 外出終了時刻
     * @return int 外出時間(分)
     */
    private function getOutTimeInNTimeWork($n_time_start, $n_time_end, $out_start_time, $out_end_time)
    {
        $out_time_in_work = 0;

        // 就業時間の時刻取得
        foreach ($this->work_time_info_list as $key => $work_time_info) {
            $wk_time = $work_time_info['WorkTimeRange'];

            if ($this->mt94->isRegularWork($key)) {
                // 就業時間内の残業項目は計算対象外なので処理終了
                if ($wk_time['START']->lte($n_time_start) && $n_time_end->lte($wk_time['END'])) {
                    return 0;
                }
            } else {
                // 勤怠項目時間帯に掛かる、残業時間帯時刻を設定
                $n_time_range_in_wk_time = ['START' => $n_time_start, 'END' => $n_time_end];

                // 勤怠項目時間外の残業項目の場合は、次の勤怠項目へ
                if ($n_time_range_in_wk_time['END']->lte($wk_time['START'])
                        || $wk_time['END']->lte($n_time_range_in_wk_time['START'])) {
                    continue;
                }

                // 勤怠項目開始時刻より早い、残業開始時刻
                if ($n_time_range_in_wk_time['START']->lt($wk_time['START'])) {
                    $n_time_range_in_wk_time['START'] = $wk_time['START'];
                }

                // 勤怠項目終了時刻より遅い、残業終了時刻
                if ($wk_time['END']->lt($n_time_range_in_wk_time['END'])) {
                    $n_time_range_in_wk_time['END'] = $wk_time['END'];
                }

                // 勤怠項目時間帯に掛かる、残業時間帯の外出時刻を取得
                $out_time_in_work += $this->getOutTimeInTargetTime4(
                    $n_time_range_in_wk_time['START'],
                    $n_time_range_in_wk_time['END'],
                    $out_start_time,
                    $out_end_time
                );
            }
        }

        return $out_time_in_work;
    }

    /**
     * 調整元時刻範囲に調整対象の時刻範囲の一部またはすべてが含まれる場合、
     * 調整元時刻範囲に収まるように、調整対象の時刻範囲を調整する、trueを返す。
     * 調整元時刻範囲に調整対象の時刻範囲の一部またはすべてが含まれない場合は、falseを返す。
     *
     * @param $base_start_time
     * @param $base_end_time
     * @param $adjust_target_start_time
     * @param $adjust_target_end_time
     * @return boolean
     * true  : 調整元の時刻範囲に調整対象の時刻範囲の一部またはすべてが含まれる
     * false : 調整元の時刻範囲に調整対象の時刻範囲の一部またはすべてが含まれない
     */
    private function adjustIncludTimeRange4(
        $base_start_time,
        $base_end_time,
        &$adjust_target_start_time,
        &$adjust_target_end_time
    ) {
        $base_time_range = ['START' => $base_start_time, 'END' => $base_end_time];

        $adjust_target_time_range = ['START' => $adjust_target_start_time, 'END' => $adjust_target_end_time];

        $ret = $this->adjustIncludTimeRange2($base_time_range, $adjust_target_time_range);
        if ($ret) {
            $adjust_target_start_time = $adjust_target_time_range['START'];
            $adjust_target_end_time = $adjust_target_time_range['END'];
        }

        return $ret;
    }

    /**
     * 調整元時刻範囲に調整対象の時刻範囲の一部またはすべてが含まれる場合、
     * 調整元時刻範囲に収まるように、調整対象の時刻範囲を調整する、trueを返す。
     * 調整元時刻範囲に調整対象の時刻範囲の一部またはすべてが含まれない場合は、falseを返す。
     *
     * @param $base_time_range 調整元時刻範囲
     * @param $adjust_target_time_range 調整対象の時刻範囲
     * @return boolean
     * true  : 調整元の時刻範囲に調整対象の時刻範囲の一部またはすべてが含まれる
     * false : 調整元の時刻範囲に調整対象の時刻範囲の一部またはすべてが含まれない
     */
    private function adjustIncludTimeRange2($base_time_range, &$adjust_target_time_range)
    {
        // base時刻範囲内に、adjustTarget時刻範囲が含まれていない
        if ($adjust_target_time_range['END']->lte($base_time_range['START'])
                || $base_time_range['END']->lte($adjust_target_time_range['START'])) {
            return false;
        }

        // base開始時刻より早い、adjustTarget開始時刻の場合は、adjustTarget開始時刻をbase開始時刻に変更
        if ($adjust_target_time_range['START']->lt($base_time_range['START'])) {
            $adjust_target_time_range['START'] = $base_time_range['START'];
        }

        // base終了時刻より遅い、adjustTarget終了時刻の場合は、adjustTarget終了時刻をbase終了時刻に変更
        if ($base_time_range['END']->lt($adjust_target_time_range['END'])) {
            $adjust_target_time_range['END'] = $base_time_range['END'];
        }

        return true;
    }

    /**
     * @param $ext_cd
     * @param $brk_minute
     * @return
     */
    private function subtractBrkFromExt($ext_cd, &$brk_minute)
    {
        $ext_time = 0;
        $ext_hm = ['Hour' => 0, 'Minute' => 0];
        switch ($ext_cd) {
            case "200":
                $ext_time = $this->convertTimeToMinute($this->work->EXT1_TIME_HH, $this->work->EXT1_TIME_MI);
                if ($ext_time <= $brk_minute) {
                    $brk_minute -= $ext_time;
                    $ext_time = 0;
                } else {
                    $ext_time -= $brk_minute;
                    $brk_minute = 0;
                }
                $ext_hm = $this->convertMinuteToTime($ext_time);
                $this->work->EXT1_TIME_HH = $ext_hm['Hour'];
                $this->work->EXT1_TIME_MI = $ext_hm['Minute'];
                break;

            case "201":
                $ext_time = $this->convertTimeToMinute($this->work->EXT2_TIME_HH, $this->work->EXT2_TIME_MI);
                if ($ext_time <= $brk_minute) {
                    $brk_minute -= $ext_time;
                    $ext_time = 0;
                } else {
                    $ext_time -= $brk_minute;
                    $brk_minute = 0;
                }
                $ext_hm = $this->convertMinuteToTime($ext_time);
                $this->work->EXT2_TIME_HH = $ext_hm['Hour'];
                $this->work->EXT2_TIME_MI = $ext_hm['Minute'];
                break;

            case "202":
                $ext_time = $this->convertTimeToMinute($this->work->EXT3_TIME_HH, $this->work->EXT3_TIME_MI);
                if ($ext_time <= $brk_minute) {
                    $brk_minute -= $ext_time;
                    $ext_time = 0;
                } else {
                    $ext_time -= $brk_minute;
                    $brk_minute = 0;
                }
                $ext_hm = $this->convertMinuteToTime($ext_time);
                $this->work->EXT3_TIME_HH = $ext_hm['Hour'];
                $this->work->EXT3_TIME_MI = $ext_hm['Minute'];
                break;
        }
    }

    /**
     * 時間算出処理
     * 勤怠項目別の開始・終了時刻算出処理の呼び出し
     * SetWorkTimeInfoListメソッドで作成される[WorkTimeInfoList]は、SetOutTime、SetWorkTime_Case5、SetWorkTime_Case6での使用される
     * @return object 更新後のwork
     */
    public function caluclateWorkTime()
    {
        // 就業情報の編集対象の初期化
        $this->initializeWorkRow();

        // 出勤、退出時刻をセットし、戻り値を勤務時間算出処理実行フラグに設定
        $this->calc_proc_flg['IsWorkTime'] = $this->setOfcLevTime();
        if (!$this->calc_proc_flg['IsWorkTime']) {
            return $this->work;
        }

        // 外出１、退出１時刻をセットし、戻り値を外出１時間算出処理実行フラグに設定
        $this->calc_proc_flg['IsOut1Time'] = $this->setOut1In1Time();

        // 外出２、退出２時刻をセットし、戻り値を外出２時間算出処理実行フラグに設定
        $this->calc_proc_flg['IsOut2Time'] = $this->setOut2In2Time();

        // 勤怠項目別の開始・終了時刻を算出
        $this->setWorkTimeInfoList();

        // 外出時間算出
        $this->setOutTime();

        // 勤怠項目別時間計算
        if ($this->calc_proc_flg['IsWorkTime']) {
            $this->setWorkTime();
        }

        // 日数設定
        $this->setDayCount();

        // Debgu用メソッド。上記処理で算出された値を保持する変数内容の表示
        // FIXME: デバッグ、テスト系については一旦保留
        // $this->Debug_DispVariable()
        return $this->work;
    }

    /**
     * 日数算出処理
     * @return object 更新後のwork
     */
    public function caluclateDayCount()
    {
        // 就業情報の日数項目の初期化
        $this->initializeDayCountFieldInWorkRow();

        // 日数設定
        $this->setDayCount();

        return $this->work;
    }
}
