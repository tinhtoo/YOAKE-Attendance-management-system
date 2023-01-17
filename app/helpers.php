<?php
use Illuminate\Support\Str;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

if (!function_exists("getTimeToHhMm")) {
    function getTimeToHhMm($arr, $key)
    {
        $arr[$key.'_HH'] = "";
        $arr[$key.'_MI'] = "";
        if (!empty($arr[$key])) {
            $tmp = explode(":", $arr[$key]);
            if (count($tmp) === 2) {
                $arr[$key.'_HH'] = $tmp[0];
                $arr[$key.'_MI'] = $tmp[1];
            }
        }
        unset($arr[$key]);
        return $arr;
    }
}

if (!function_exists('getArrValue')) {
    function getArrValue($array, $key, $default = '')
    {
        if (isset($array[$key])) {
            return $array[$key];
        }
        return $default;
    }
}

if (!function_exists("inputToHHmm")) {
    function inputToHHmm($arr, $key)
    {
        $arr[$key.'_HH'] = "";
        $arr[$key.'_mm'] = "";
        if (!empty($arr[$key])) {
            $tmp = explode(":", $arr[$key]);
            if (count($tmp) === 2) {
                $arr[$key.'_HH'] = $tmp[0];
                $arr[$key.'_mm'] = $tmp[1];
            }
        }
        unset($arr[$key]);
        return $arr;
    }
}

/**
 * 処理日付と基本情報（MT01_CONTROL）の設定を受け取り、年月度を返す。
 * param : 処理日付、当月度の設定、締日の設定
 */
if (!function_exists("getYearAndMonthWithControl")) {
    function getYearAndMonthWithControl($today, $month_cls_cd, $closing_date)
    {
        $year = (int)substr($today, 0, 4);
        $month = (int)substr($today, 5, 2);
        $day = (int)substr($today, 8, 2);
        if ($month_cls_cd === '01' && $day <= $closing_date) {
            // 「締日以降を当月度とする」（＝締日以前は先月度）設定をしていて、且つ締日以前の場合
            if ($month != 1) {
                $month--;
            } else {
                // 1月の場合は前年の12月にする
                $year--;
                $month = 12;
            }
        } elseif ($month_cls_cd === '00' && $day > $closing_date) {
            // 「締日以前を当月度とする」（＝締日過ぎは来月度）設定をしていて、且つ締日過ぎの場合
            if ($month != 12) {
                $month++;
            } else {
                // 12月の場合は翌年の1月にする
                $year++;
                $month = 1;
            }
        }

        return [
            'year' => $year,
            'month'=> $month
        ];
    }
}

/**
 * 締日までの日付を返す
 * param : 処理日付、当月度の設定、締日の設定
 */
if (!function_exists("getDatesToClosingDate")) {
    function getDatesToClosingDate($year, $month, $closing_date, $month_cls_cd) : iterable
    {
        $start_date = $start_date = (new Carbon($year."/". $month."/". "1"))->addMonth(1);

        // 締日が末(31)ではない場合
        if ($closing_date < 31) {
            $start_date = new Carbon($year."/". $month."/". ($closing_date + 1));
        }

        // 「締日以前を当月度とする」（＝締日過ぎは来月度）場合
        if ($month_cls_cd === '00') {
            $start_date->subMonth(1);
        }

        return CarbonPeriod::start($start_date)->days(1)->end($start_date->addMonth(1), false);
    }
}


/**
 * 打刻取込、時間計算処理 EXE実行
 * 実行に必要な項目を設定した連想配列を受け取り、EXEを実行する。
 */
if (!function_exists("execSw")) {
    function execSw($param)
    {
        $proc_cd = 'SW';
        $login_emp_cd = $param['LOGIN_EMP_CD'];
        $emp_cd = $param['EMP_CD'];
        $year = $param['YEAR'];
        $month = $param['MONTH'];

        $total_string = '"' . $proc_cd . "," . $login_emp_cd . "," . $emp_cd . "," . $year . "," . $month . '"';
        $command = ".\\WorkTmCon\WorkTmCon " . $total_string;
        exec($command, $output, $result_code);
        return ;
    }
}


/**
 * 時間計算処理 EXE実行
 * 実行に必要な項目を設定した連想配列を受け取り、EXEを実行する。
 */
if (!function_exists("execCw")) {
    function execCw($param)
    {
        // 前処理
        $ofc_time_hh_mm = inputToHHmm($param, 'OFC_TIME');
        $lev_time_hh_mm = inputToHHmm($param, 'LEV_TIME');
        $out1_time_hh_mm = inputToHHmm($param, 'OUT1_TIME');
        $in1_time_hh_mm = inputToHHmm($param, 'IN1_TIME');
        $out2_time_hh_mm = inputToHHmm($param, 'OUT2_TIME');
        $in2_time_hh_mm = inputToHHmm($param, 'IN2_TIME');

        $proc_cd = 'CW';
        $login_emp_cd = $param['LOGIN_EMP_CD'];
        $emp_cd = $param['EMP_CD'];
        $year = $param['YEAR'];
        $month = $param['MONTH'];
        $cald_date = $param['CALD_DATE'];
        $workptn_cd = $param['WORKPTN_CD'];
        $reason_cd = $param['REASON_CD'];
        $ofc_time_hh = $ofc_time_hh_mm['OFC_TIME_HH'];
        $ofc_time_mm = $ofc_time_hh_mm['OFC_TIME_mm'] != "" ? abs($ofc_time_hh_mm['OFC_TIME_mm']) : "";
        $lev_time_hh = $lev_time_hh_mm['LEV_TIME_HH'];
        $lev_time_mm = $lev_time_hh_mm['LEV_TIME_mm'] != "" ? abs($lev_time_hh_mm['LEV_TIME_mm']) : "";
        $out1_time_hh = $out1_time_hh_mm['OUT1_TIME_HH'];
        $out1_time_mm = $out1_time_hh_mm['OUT1_TIME_mm'] != "" ? abs($out1_time_hh_mm['OUT1_TIME_mm']) : "";
        $in1_time_hh = $in1_time_hh_mm['IN1_TIME_HH'];
        $in1_time_mm = $in1_time_hh_mm['IN1_TIME_mm'] != "" ? abs($in1_time_hh_mm['IN1_TIME_mm']) : "";
        $out2_time_hh = $out2_time_hh_mm['OUT2_TIME_HH'];
        $out2_time_mm = $out2_time_hh_mm['OUT2_TIME_mm'] != "" ? abs($out2_time_hh_mm['OUT2_TIME_mm']) : "";
        $in2_time_hh = $in2_time_hh_mm['IN2_TIME_HH'];
        $in2_time_mm = $in2_time_hh_mm['IN2_TIME_mm'] != "" ? abs($in2_time_hh_mm['IN2_TIME_mm']) : "";
        
        $total_string = '"' . $proc_cd . "," . $login_emp_cd . "," . $emp_cd . "," . $year . "," . $month . ","
                       . $cald_date . "," . $workptn_cd . "," .  $reason_cd . ","
                       .  $ofc_time_hh . "," .  $ofc_time_mm . "," // 出社
                       .  $lev_time_hh . "," .  $lev_time_mm . "," // 退出
                       .  $out1_time_hh . "," .  $out1_time_mm . "," // 外出1
                       .  $in1_time_hh . "," .  $in1_time_mm . "," // 再入1
                       .  $out2_time_hh . "," .  $out2_time_mm . "," // 外出2
                       .  $in2_time_hh . "," .  $in2_time_mm . '"'; // 再入2

        $command = ".\\WorkTmCon\WorkTmCon " . $total_string;
        exec($command, $output, $result_code);
        return ;
    }
}


/**
 * 日数計算処理 EXE実行
 * 実行に必要な項目を設定した連想配列を受け取り、EXEを実行する。
 */
if (!function_exists("execCd")) {
    function execCd($param)
    {
        // 前処理
        $work_time_hh_mm = inputToHHmm($param, 'workTime');
        $ovtm1_time_hh_mm = inputToHHmm($param, 'ovtm1Time');
        $ovtm2_time_hh_mm = inputToHHmm($param, 'ovtm2Time');
        $ovtm3_time_hh_mm = inputToHHmm($param, 'ovtm3Time');
        $ovtm4_time_hh_mm = inputToHHmm($param, 'ovtm4Time');
        $ovtm5_time_hh_mm = inputToHHmm($param, 'ovtm5Time');
        $ovtm6_time_hh_mm = inputToHHmm($param, 'ovtm6Time');
           
        $proc_cd = 'CD';
        $login_emp_cd = $param['LOGIN_EMP_CD'];
        $emp_cd = $param['EMP_CD'];
        $year = $param['YEAR'];
        $month = $param['MONTH'];
        $cald_date = $param['CALD_DATE'];
        $workptn_cd = $param['WORKPTN_CD'];
        $reason_cd = $param['REASON_CD'];
        $work_time_hh = $work_time_hh_mm['workTime_HH'];
        $work_time_mm = $work_time_hh_mm['workTime_mm'] != "" ? abs($work_time_hh_mm['workTime_mm']) : "";
        $ovtm1_time_hh = $ovtm1_time_hh_mm['ovtm1Time_HH'];
        $ovtm1_time_mm = $ovtm1_time_hh_mm['ovtm1Time_mm'] != "" ? abs($ovtm1_time_hh_mm['ovtm1Time_mm']) : "";
        $ovtm2_time_hh = $ovtm2_time_hh_mm['ovtm2Time_HH'];
        $ovtm2_time_mm = $ovtm2_time_hh_mm['ovtm2Time_mm'] != "" ? abs($ovtm2_time_hh_mm['ovtm2Time_mm']) : "";
        $ovtm3_time_hh = $ovtm3_time_hh_mm['ovtm3Time_HH'];
        $ovtm3_time_mm = $ovtm3_time_hh_mm['ovtm3Time_mm'] != "" ? abs($ovtm3_time_hh_mm['ovtm3Time_mm']) : "";
        $ovtm4_time_hh = $ovtm4_time_hh_mm['ovtm4Time_HH'];
        $ovtm4_time_mm = $ovtm4_time_hh_mm['ovtm4Time_mm'] != "" ? abs($ovtm4_time_hh_mm['ovtm4Time_mm']) : "";
        $ovtm5_time_hh = $ovtm5_time_hh_mm['ovtm5Time_HH'];
        $ovtm5_time_mm = $ovtm5_time_hh_mm['ovtm5Time_mm'] != "" ? abs($ovtm5_time_hh_mm['ovtm5Time_mm']) : "";
        $ovtm6_time_hh = $ovtm6_time_hh_mm['ovtm6Time_HH'];
        $ovtm6_time_mm = $ovtm6_time_hh_mm['ovtm6Time_mm'] != "" ? abs($ovtm6_time_hh_mm['ovtm6Time_mm']) : "";
        
        $total_string = '"' . $proc_cd . "," . $login_emp_cd . "," . $emp_cd . "," . $year . "," . $month . ","
                        . $cald_date . "," . $workptn_cd . "," .  $reason_cd . ","
                        .  $work_time_hh . "," .  $work_time_mm . ","
                        .  $ovtm1_time_hh . "," .  $ovtm1_time_mm . ","
                        .  $ovtm2_time_hh . "," .  $ovtm2_time_mm . ","
                        .  $ovtm3_time_hh . "," .  $ovtm3_time_mm . ","
                        .  $ovtm4_time_hh . "," .  $ovtm4_time_mm . ","
                        .  $ovtm5_time_hh . "," .  $ovtm5_time_mm . '"'
                        .  $ovtm6_time_hh . "," .  $ovtm6_time_mm . '"';

        $command = ".\\WorkTmCon\WorkTmCon " . $total_string;
        exec($command, $output, $result_code);

        return ;
    }
}


if (!function_exists("execCWT")) {
    /**
     * exe 'CWT'実行
     * ログインユーザのEMP_CDと処理対象レコードを引数に、処理コード'CWT'でexeを実行する。
     */
    function execCWT($login_emp_cd, $tr01_record)
    {
        $proc_cd = 'CWT';
        $login_emp_cd = $login_emp_cd;
        $emp_cd = $tr01_record->EMP_CD;
        $cald_year = $tr01_record->CALD_YEAR;
        $cald_month = $tr01_record->CALD_MONTH;
        $cald_date = $tr01_record->CALD_DATE;
        $workptn_cd = $tr01_record->WORKPTN_CD;
        $reason_cd = $tr01_record->REASON_CD;
        $ofc_time_hh = $tr01_record->OFC_TIME_HH ?? "";
        $ofc_time_mm = $tr01_record->OFC_TIME_MI ?? "";
        $lev_time_hh = $tr01_record->LEV_TIME_HH ?? "";
        $lev_time_mm = $tr01_record->LEV_TIME_MI ?? "";
        $out1_time_hh = $tr01_record->OUT1_TIME_HH ?? "";
        $out1_time_mm = $tr01_record->OUT1_TIME_MI ?? "";
        $in1_time_hh = $tr01_record->IN1_TIME_HH ?? "";
        $in1_time_mm = $tr01_record->IN1_TIME_MI ?? "";
        $out2_time_hh = $tr01_record->OUT2_TIME_HH ?? "";
        $out2_time_mm = $tr01_record->OUT2_TIME_MI ?? "";
        $in2_time_hh = $tr01_record->IN2_TIME_HH ?? "";
        $in2_time_mm = $tr01_record->IN2_TIME_MI ?? "";

        $total_string = '"' . $proc_cd . "," . $login_emp_cd . "," . $emp_cd . ","
                        . $cald_year . "," . $cald_month . ",". $cald_date . ","
                        . $workptn_cd . "," .  $reason_cd . ","
                        . $ofc_time_hh . "," . $ofc_time_mm . "," // 出社
                        . $lev_time_hh . "," . $lev_time_mm . "," // 退出
                        . $out1_time_hh . "," . $out1_time_mm . "," // 外出1
                        . $in1_time_hh . "," . $in1_time_mm . "," // 再入1
                        . $out2_time_hh . "," . $out2_time_mm . "," // 外出2
                        . $in2_time_hh . "," . $in2_time_mm . '"'; // 再入2
        $command = ".\\WorkTmCon\WorkTmCon " . $total_string;
        // EXE実行にあまりにも時間がかかる（1回35秒ほど）ため、タイムアウトをしないようにする。
        ini_set("max_execution_time", 0); // タイムアウトしない
        ini_set("max_input_time", 0); // パース時間を設定しない
        exec($command, $output, $result_code);
        return ;
    }
}


if (!function_exists("execSA")) {
    /**
     * exe 'SA'実行
     * 処理コード'SA'でexeを実行する。
     */
    function execSA()
    {
        $proc_cd = 'SA';

        $total_string = '"' . $proc_cd . '"';
        $command = ".\\WorkTmCon\WorkTmCon " . $total_string;
        exec($command, $output, $result_code);
        return ;
    }
}


if (!function_exists('is_nullorempty')) {
    /**
     * 引数がnullまたは空文字だった場合trueを返す（" "など、スペースがあればfalse）
     */
    function is_nullorempty($obj)
    {
        if ($obj === 0 || $obj === "0") {
            return false;
        }

        return empty($obj);
    }
}

if (!function_exists('is_nullorwhitespace')) {
    /**
     * 引数がnullまたは空文字（空白のみも含む）だった場合trueを返す
     */
    function is_nullorwhitespace($obj)
    {
        if (is_nullorempty($obj) === true) {
            return true;
        }

        if (is_string($obj) && mb_ereg_match("^(\s|　)+$", $obj)) {
            return true;
        }

        return false;
    }
}

if (!function_exists('getStartDateAtMonth')) {
    /**
     * 対象年月の当月度開始日を返す
     * param : 対象年月度、当月度の設定、締日の設定
     */
    function getStartDateAtMonth($year, $month, $closing_date, $month_cls_cd)
    {
        // 締日が末(31)ではない場合
        if ($closing_date < 31) {
            $start_date = new Carbon($year. '-' . $month . '-'. ($closing_date + 1));
        } else {
            // 締日が末(31)の場合
            $start_date = new Carbon($year. '-' . $month . '-'. cal_days_in_month(CAL_GREGORIAN, $month, $year));
        }

        // 締日以前を当月度とする場合
        if ($month_cls_cd === '00') {
            $start_date->subMonth(1);
        }

        return $start_date->format('Y-m-d');
    }
}

if (!function_exists('getEndDateAtMonth')) {
    /**
     * 対象年月の当月度終了日を返す
     * param : 対象年月度、当月度の設定、締日の設定
     */
    function getEndDateAtMonth($year, $month, $closing_date, $month_cls_cd)
    {
        // 締日が末(31)ではない場合
        if ($closing_date < 31) {
            $end_date = new Carbon($year. '-' . $month . '-'. ($closing_date));
        } else {
            // 締日が末(31)の場合
            $end_date = new Carbon($year. '-' . $month . '-'. cal_days_in_month(CAL_GREGORIAN, $month, $year));
        }

        // 締日以降を当月度とする場合
        if ($month_cls_cd === '01') {
            $end_date->subMonth(1);
        }

        return $end_date->format('Y-m-d');
    }
}

/**
 * 勤務予定表(週・月別) 詳細データの表示
 * parm::勤務予定表(週・月別) の対象データ、社員コード、ヘッダのカレンダーデート
 */
if (!function_exists('getWorkPlanData')) {
    function getWorkPlanData($WorkPlanReports, $emp_cd, $cal_date)
    {
        $result = $WorkPlanReports->where('EMP_CD', $emp_cd)->where('CALD_DATE', $cal_date)->first();
        if (!empty($result)) {
            return $result['WORKPTN_ABR_NAME'];
        }
        return '';
    }
}
