<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\MT05Workptn;
use App\Repositories\MT93PgRepository;
use App\Models\MT94WorkDesc;
use App\Repositories\MT05WorkptnRepository;
use App\Http\Requests\MT05WorkPtnRequest;
use App\Http\Requests\MT05WorkPtnDeleteRequest;
use Illuminate\Support\Facades\DB;
use Arr;

/**
 * 勤務体系情報入力 処理
 */
class MT05WorkPtnEditorController extends Controller
{
    /**
     * コントローラインスタンスの生成
     * @param
     * @return void
     */
    public function __construct(
        MT05WorkptnRepository $mt05_workptn,
        MT93PgRepository $pg_repository
    ) {
        parent::__construct($pg_repository, '000006');
        $this->mt05_workptn = $mt05_workptn;
    }

    /**
     * 勤務体系情報入力 処理 画面表示
     * @return view
     */
    public function index($id = null)
    {
        $dataWorkPtn = new MT05Workptn();
        if ($id != null) {
            $dataWorkPtn = $this->mt05_workptn->getWorkPtnWithPrimaryKey($id);
        }
        // 勤怠項目
        $dataWorkDescExp02 = $this->mt05_workptn->getWorkDescExcepting02();
        // 割増
        $dataExtraPayClsCd = '02';
        $dataExtraPay = $this->mt05_workptn->getWithWorkDesc($dataExtraPayClsCd);
        // 職務種別
        $clsDetailCd = '08';
        $clsDetails = $this->mt05_workptn->getClsDetail($clsDetailCd);

        return parent::viewWithMenu('master.MT05WorkPtnEditor', compact(
            'dataWorkPtn',
            'dataWorkDescExp02',
            'dataExtraPay',
            'clsDetails'
        ));
    }

    public function update(MT05WorkPtnRequest $request)
    {
        // 時間帯設定
        if ($request['dutyClass'] == '00') {
            // 勤怠項目
            $pTimes = $request['pTime'];
            foreach ($pTimes as $pTime) {
                if (!is_nullorwhitespace($pTime['pTimeCds'].
                                         $pTime['StrHH'].
                                         $pTime['StrMI'].
                                         $pTime['EndHH'].
                                         $pTime['EndMI'])) {
                    $p_time_data[] = array(
                        'pTCd' => $pTime['pTimeCds'],
                        'pTStrHH' => $pTime['StrHH'],
                        'pTStrMI' => $pTime['StrMI'],
                        'pTEndHH' => $pTime['EndHH'],
                        'pTEndMI' => $pTime['EndMI'],
                    );
                }
            }
            if (isset($p_time_data)) {
                // 開始時間が早い順に並び替え
                $p_time_data_sort = Arr::sort($p_time_data, function ($values) {
                    return substr('0' . $values['pTStrHH'], -2).
                           substr('0' . $values['pTStrMI'], -2).
                           substr('0' . $values['pTEndHH'], -2).
                           substr('0' . $values['pTEndMI'], -2); // このデータを元に並べ替える
                });
                // 並べ替えた後の配列キーの書き換え
                $new_p_time  = array_values($p_time_data_sort);
            }
            // 割増対象
            $ext_times = $request['extTime'];
            foreach ($ext_times as $ext_time) {
                if (!is_nullorwhitespace($ext_time['excCd'].
                                         $ext_time['extStrHH'].
                                         $ext_time['extStrMI'].
                                         $ext_time['extEndHH'].
                                         $ext_time['extEndMI'])) {
                    $ext_time_data[] = array(
                        'extTCd' => $ext_time['excCd'],
                        'extTStrHH' => $ext_time['extStrHH'],
                        'extTStrMI' => $ext_time['extStrMI'],
                        'extTEndHH' => $ext_time['extEndHH'],
                        'extTEndMI' => $ext_time['extEndMI'],
                    );
                }
            }
            if (isset($ext_time_data)) {
                // 開始時間が早い順に並び替え
                $ext_time_data_sort = Arr::sort($ext_time_data, function ($values) {
                    return substr('0' . $values['extTStrHH'], -2).
                           substr('0' . $values['extTStrMI'], -2).
                           substr('0' . $values['extTEndHH'], -2).
                           substr('0' . $values['extTEndMI'], -2); // このデータを元に並べ替える
                });
                // 並べ替えた後の配列キーの書き換え
                $new_ext_time  = array_values($ext_time_data_sort);
            }
            // 勤怠項目区分コードが '00'(就業時間) の時分を取得
            $p_time_str = '';
            foreach ($new_p_time as $p_time_cd) {
                if (MT94WorkDesc::where('WORK_DESC_CD', $p_time_cd['pTCd'])
                                ->pluck('WORK_DESC_CLS_CD')
                                ->first() == '00') {
                    $p_time_str = substr('0'.$p_time_cd['pTStrHH'], -2).substr('0'.$p_time_cd['pTStrMI'], -2);
                    break;
                }
            }
            // '00'(就業時間) の時分が17:00～23:00       -> 02(夜勤)
            // '00'(就業時間) の時分が17:00～23:00以外 -> 01(通常)
            if ($p_time_str >= 1700 && $p_time_str <= 2300) {
                $nwork1_cls_cd = '02';
            } else {
                $nwork1_cls_cd = '01';
            }
            // 時間帯・勤務時間
            $rsv1_hh = $request['rsvTime'][0];
            $rsv1_mi = $request['rsvTime'][1];
            // 時間帯・日替時刻
            $time_daily_hh = $request['tmDailyTime'][0];
            $time_daily_mi = $request['tmDailyTime'][1];
        }
        // 時間数設定
        if ($request['dutyClass'] == '01') {
            $ntime_wk1_dcls_cd = '01';
            // 勤怠項目
            $n_times = $request['nTime'];
            for ($i = 1; $i < count($n_times); $i++) {
                if (!is_nullorwhitespace($n_times[$i]['nTimeDclsCd'].
                                                $n_times[$i]['nTimeCd'].
                                                $n_times[$i]['nTimeStrHH'].
                                                $n_times[$i]['nTimeStrMI'].
                                                $n_times[$i]['nTimeEndHH'].
                                                $n_times[$i]['nTimeEndMI'])) {
                    $nTimeData[] = array(
                        'nTimeDclsCd' => $n_times[$i]['nTimeDclsCd'],
                        'nTimeCd' => $n_times[$i]['nTimeCd'],
                        'nTimeStrHH' => $n_times[$i]['nTimeStrHH'],
                        'nTimeStrMI' => $n_times[$i]['nTimeStrMI'],
                        'nTimeEndHH' => $n_times[$i]['nTimeEndHH'],
                        'nTimeEndMI' => $n_times[$i]['nTimeEndMI'],
                    );
                }
            }
            if (isset($nTimeData)) {
                // 職務種別が"時間数"が先、かつ開始時間が早い順に並び替え
                $newNTimeArr = collect($nTimeData)->sort(function ($first, $second) {
                    if ($first['nTimeDclsCd'] === $second['nTimeDclsCd']) {
                        return substr('0' . $first['nTimeStrHH'], -2).
                               substr('0' . $first['nTimeStrMI'], -2).
                               substr('0' . $first['nTimeEndHH'], -2).
                               substr('0' . $first['nTimeEndMI'], -2) >
                               substr('0' . $second['nTimeStrHH'], -2).
                               substr('0' . $second['nTimeStrMI'], -2).
                               substr('0' . $second['nTimeEndHH'], -2).
                               substr('0' . $second['nTimeEndMI'], -2) ?
                            1 : -1;
                    }
                    return $first['nTimeDclsCd'] < $second['nTimeDclsCd'] ? 1 : -1;
                })->toArray();
                // 並べ替えた後の配列キーの書き換え
                $newNTime  = array_values($newNTimeArr);
            }

            // 割増対象
            $ext_times = $request['extHour'];
            foreach ($ext_times as $ext_time) {
                if (!is_nullorwhitespace($ext_time['excCdH'].
                                         $ext_time['extHourStrHH'].
                                         $ext_time['extHourStrMI'].
                                         $ext_time['extHourEndHH'].
                                         $ext_time['extHourEndMI'])) {
                    $ext_time_data[] = array(
                        'extTCd' => $ext_time['excCdH'],
                        'extTStrHH' => $ext_time['extHourStrHH'],
                        'extTStrMI' => $ext_time['extHourStrMI'],
                        'extTEndHH' => $ext_time['extHourEndHH'],
                        'extTEndMI' => $ext_time['extHourEndMI'],
                    );
                }
            }
            if (isset($ext_time_data)) {
                // 開始時間が早い順に並び替え
                $ext_time_data_sort = Arr::sort($ext_time_data, function ($values) {
                    return substr('0' . $values['extTStrHH'], -2).
                           substr('0' . $values['extTStrMI'], -2).
                           substr('0' . $values['extTEndHH'], -2).
                           substr('0' . $values['extTEndMI'], -2); // このデータを元に並べ替える
                });
                // 並べ替えた後の配列キーの書き換え
                $new_ext_time  = array_values($ext_time_data_sort);
            }
            // {職務種別}が01:時間数　01(通常)
            $nwork1_cls_cd = '01';

            // 時間数・勤務時間
            $rsv1_hh = $request['rsvHour'][0];
            $rsv1_mi = $request['rsvHour'][1];

            // 時間数・日替時刻
            $time_daily_hh = $request['tmDailyHour'][0];
            $time_daily_mi = $request['tmDailyHour'][1];
        }

        // 休憩時間設定
        if (!empty($request['breakTimeData'])) {
            $breakTimes = $request['breakTimeData'];
            foreach ($breakTimes as $breakTime) {
                if (!(in_array(null, $breakTime, true))) {
                    $breakTimeData[] = array(
                        'brstrHH' => $breakTime['brstrHH'],
                        'brstrMI' => $breakTime['brstrMI'],
                        'brendHH' => $breakTime['brendHH'],
                        'brendMI' => $breakTime['brendMI'],
                        'brTime' => $breakTime['brTime'],
                    );
                }
            }
            if (isset($breakTimeData)) {
                // 開始時間が早い順に並び替え
                $breakTimeDataSort = Arr::sort($breakTimeData, function ($values) {
                    return substr('0' . $values['brstrHH'], -2).
                           substr('0' . $values['brstrMI'], -2).
                           substr('0' . $values['brendHH'], -2).
                           substr('0' . $values['brendMI'], -2);// このデータを元に並べ替える
                });
                // 並べ替えた後の配列キーの書き換え
                $newBreakTime  = array_values($breakTimeDataSort);
            }
        }

        // 出勤区分が'01'(通常出勤)の時は空白、'00'(通常出勤)の特は"法定":'00' または "法定外":'01'。
        if ($request['workClass'] == '01') {
            $rsv1_cls_cd = '';
        } else {
            $rsv1_cls_cd = $request['rsv1ClsCd'];
        }

        $today = date('Y-m-d H:i:s');
        $param = [
            'WORKPTN_CD' => $request['workPtnCd'],
            'WORKPTN_NAME' => $request['workPtnName'],
            'WORKPTN_ABR_NAME' => $request['workPtnAbrName'],
            'WORK_CLS_CD' => $request['workClass'],
            'DUTY_CLS_CD' => $request['dutyClass'],
            'PTIME_WK1_CD' => $new_p_time[0]['pTCd'] ?? null,
            'PTIME_WK1_STR_HH' => $new_p_time[0]['pTStrHH'] ?? null,
            'PTIME_WK1_STR_MI' => $new_p_time[0]['pTStrMI'] ?? null,
            'PTIME_WK1_END_HH' => $new_p_time[0]['pTEndHH'] ?? null,
            'PTIME_WK1_END_MI' => $new_p_time[0]['pTEndMI'] ?? null,
            'PTIME_WK2_CD' => $new_p_time[1]['pTCd'] ?? null,
            'PTIME_WK2_STR_HH' => $new_p_time[1]['pTStrHH'] ?? null,
            'PTIME_WK2_STR_MI' => $new_p_time[1]['pTStrMI'] ?? null,
            'PTIME_WK2_END_HH' => $new_p_time[1]['pTEndHH'] ?? null,
            'PTIME_WK2_END_MI' => $new_p_time[1]['pTEndMI'] ?? null,
            'PTIME_WK3_CD' => $new_p_time[2]['pTCd'] ?? null,
            'PTIME_WK3_STR_HH' => $new_p_time[2]['pTStrHH'] ?? null,
            'PTIME_WK3_STR_MI' => $new_p_time[2]['pTStrMI'] ?? null,
            'PTIME_WK3_END_HH' => $new_p_time[2]['pTEndHH'] ?? null,
            'PTIME_WK3_END_MI' => $new_p_time[2]['pTEndMI'] ?? null,
            'PTIME_WK4_CD' => $new_p_time[3]['pTCd'] ?? null,
            'PTIME_WK4_STR_HH' => $new_p_time[3]['pTStrHH'] ?? null,
            'PTIME_WK4_STR_MI' => $new_p_time[3]['pTStrMI'] ?? null,
            'PTIME_WK4_END_HH' => $new_p_time[3]['pTEndHH'] ?? null,
            'PTIME_WK4_END_MI' => $new_p_time[3]['pTEndMI'] ?? null,
            'PTIME_WK5_CD' => $new_p_time[4]['pTCd'] ?? null,
            'PTIME_WK5_STR_HH' => $new_p_time[4]['pTStrHH'] ?? null,
            'PTIME_WK5_STR_MI' => $new_p_time[4]['pTStrMI'] ?? null,
            'PTIME_WK5_END_HH' => $new_p_time[4]['pTEndHH'] ?? null,
            'PTIME_WK5_END_MI' => $new_p_time[4]['pTEndMI'] ?? null,
            'PTIME_WK6_CD' => $new_p_time[5]['pTCd'] ?? null,
            'PTIME_WK6_STR_HH' => $new_p_time[5]['pTStrHH'] ?? null,
            'PTIME_WK6_STR_MI' => $new_p_time[5]['pTStrMI'] ?? null,
            'PTIME_WK6_END_HH' => $new_p_time[5]['pTEndHH'] ?? null,
            'PTIME_WK6_END_MI' => $new_p_time[5]['pTEndMI'] ?? null,
            'PTIME_WK7_CD' => $new_p_time[6]['pTCd'] ?? null,
            'PTIME_WK7_STR_HH' => $new_p_time[6]['pTStrHH'] ?? null,
            'PTIME_WK7_STR_MI' => $new_p_time[6]['pTStrMI'] ?? null,
            'PTIME_WK7_END_HH' => $new_p_time[6]['pTEndHH'] ?? null,
            'PTIME_WK7_END_MI' => $new_p_time[6]['pTEndMI'] ?? null,
            'PTIME_WK8_CD' => null,
            'PTIME_WK8_STR_HH' => null,
            'PTIME_WK8_STR_MI' => null,
            'PTIME_WK8_END_HH' => null,
            'PTIME_WK8_END_MI' => null,
            'PTIME_WK9_CD' => null,
            'PTIME_WK9_STR_HH' => null,
            'PTIME_WK9_STR_MI' => null,
            'PTIME_WK9_END_HH' => null,
            'PTIME_WK9_END_MI' => null,
            'PTIME_WK10_CD' => null,
            'PTIME_WK10_STR_HH' => null,
            'PTIME_WK10_STR_MI' => null,
            'PTIME_WK10_END_HH' => null,
            'PTIME_WK10_END_MI' => null,
            'PTIME_EXT1_CD' => $new_ext_time[0]['extTCd'] ?? null,
            'PTIME_EXT1_STR_HH' => $new_ext_time[0]['extTStrHH'] ?? null,
            'PTIME_EXT1_STR_MI' => $new_ext_time[0]['extTStrMI'] ?? null,
            'PTIME_EXT1_END_HH' => $new_ext_time[0]['extTEndHH'] ?? null,
            'PTIME_EXT1_END_MI' => $new_ext_time[0]['extTEndMI'] ?? null,
            'PTIME_EXT2_CD' => $new_ext_time[1]['extTCd'] ?? null,
            'PTIME_EXT2_STR_HH' => $new_ext_time[1]['extTStrHH'] ?? null,
            'PTIME_EXT2_STR_MI' => $new_ext_time[1]['extTStrMI'] ?? null,
            'PTIME_EXT2_END_HH' => $new_ext_time[1]['extTEndHH'] ?? null,
            'PTIME_EXT2_END_MI' => $new_ext_time[1]['extTEndMI'] ?? null,
            'PTIME_EXT3_CD' => $new_ext_time[2]['extTCd'] ?? null,
            'PTIME_EXT3_STR_HH' => $new_ext_time[2]['extTStrHH'] ?? null,
            'PTIME_EXT3_STR_MI' => $new_ext_time[2]['extTStrMI'] ?? null,
            'PTIME_EXT3_END_HH' => $new_ext_time[2]['extTEndHH'] ?? null,
            'PTIME_EXT3_END_MI' => $new_ext_time[2]['extTEndMI'] ?? null,
            'PTIME_EXT4_CD' => null,
            'PTIME_EXT4_STR_HH' => null,
            'PTIME_EXT4_STR_MI' => null,
            'PTIME_EXT4_END_HH' => null,
            'PTIME_EXT4_END_MI' => null,
            'PTIME_EXT5_CD' => null,
            'PTIME_EXT5_STR_HH' => null,
            'PTIME_EXT5_STR_MI' => null,
            'PTIME_EXT5_END_HH' => null,
            'PTIME_EXT5_END_MI' => null,
            'PTIME_FSTPRD_END_HH' => $request['fstrdTime'][0] ?? null,
            'PTIME_FSTPRD_END_MI' => $request['fstrdTime'][1] ?? null,
            'PTIME_SCDPRD_STR_HH' => $request['scdprdTime'][0] ?? null,
            'PTIME_SCDPRD_STR_MI' => $request['scdprdTime'][1] ?? null,
            'TIME_DAILY_HH' => $time_daily_hh ?? null,
            'TIME_DAILY_MI' => $time_daily_mi ?? null,
            'NTIME_WK1_CD' => $request['nTime'][0]['nTimeCd'] ?? null,
            'NTIME_WK1_STR_HH' => $request['nTime'][0]['nTimeStrHH'] ?? null,
            'NTIME_WK1_STR_MI' => $request['nTime'][0]['nTimeStrMI'] ?? null,
            'NTIME_WK1_END_HH' => $request['nTime'][0]['nTimeEndHH'] ?? null,
            'NTIME_WK1_END_MI' => $request['nTime'][0]['nTimeEndMI'] ?? null,
            'NTIME_WK2_CD' => $newNTime[0]['nTimeCd'] ?? null,
            'NTIME_WK2_STR_HH' => $newNTime[0]['nTimeStrHH'] ?? null,
            'NTIME_WK2_STR_MI' => $newNTime[0]['nTimeStrMI'] ?? null,
            'NTIME_WK2_END_HH' => $newNTime[0]['nTimeEndHH'] ?? null,
            'NTIME_WK2_END_MI' => $newNTime[0]['nTimeEndMI'] ?? null,
            'NTIME_WK3_CD' => $newNTime[1]['nTimeCd'] ?? null,
            'NTIME_WK3_STR_HH' => $newNTime[1]['nTimeStrHH'] ?? null,
            'NTIME_WK3_STR_MI' => $newNTime[1]['nTimeStrMI'] ?? null,
            'NTIME_WK3_END_HH' => $newNTime[1]['nTimeEndHH'] ?? null,
            'NTIME_WK3_END_MI' => $newNTime[1]['nTimeEndMI'] ?? null,
            'NTIME_WK4_CD' => $newNTime[2]['nTimeCd'] ?? null,
            'NTIME_WK4_STR_HH' => $newNTime[2]['nTimeStrHH'] ?? null,
            'NTIME_WK4_STR_MI' => $newNTime[2]['nTimeStrMI'] ?? null,
            'NTIME_WK4_END_HH' => $newNTime[2]['nTimeEndHH'] ?? null,
            'NTIME_WK4_END_MI' => $newNTime[2]['nTimeEndMI'] ?? null,
            'NTIME_WK5_CD' => $newNTime[3]['nTimeCd'] ?? null,
            'NTIME_WK5_STR_HH' => $newNTime[3]['nTimeStrHH'] ?? null,
            'NTIME_WK5_STR_MI' => $newNTime[3]['nTimeStrMI'] ?? null,
            'NTIME_WK5_END_HH' => $newNTime[3]['nTimeEndHH'] ?? null,
            'NTIME_WK5_END_MI' => $newNTime[3]['nTimeEndMI'] ?? null,
            'NTIME_WK6_CD' => $newNTime[4]['nTimeCd'] ?? null,
            'NTIME_WK6_STR_HH' => $newNTime[4]['nTimeStrHH'] ?? null,
            'NTIME_WK6_STR_MI' => $newNTime[4]['nTimeStrMI'] ?? null,
            'NTIME_WK6_END_HH' => $newNTime[4]['nTimeEndHH'] ?? null,
            'NTIME_WK6_END_MI' => $newNTime[4]['nTimeEndMI'] ?? null,
            'NTIME_WK7_CD' => $newNTime[5]['nTimeCd'] ?? null,
            'NTIME_WK7_STR_HH' => $newNTime[5]['nTimeStrHH'] ?? null,
            'NTIME_WK7_STR_MI' => $newNTime[5]['nTimeStrMI'] ?? null,
            'NTIME_WK7_END_HH' => $newNTime[5]['nTimeEndHH'] ?? null,
            'NTIME_WK7_END_MI' => $newNTime[5]['nTimeEndMI'] ?? null,
            'NTIME_WK8_CD' => null,
            'NTIME_WK8_STR_HH' => null,
            'NTIME_WK8_STR_MI' => null,
            'NTIME_WK8_END_HH' => null,
            'NTIME_WK8_END_MI' => null,
            'NTIME_WK9_CD' => null,
            'NTIME_WK9_STR_HH' => null,
            'NTIME_WK9_STR_MI' => null,
            'NTIME_WK9_END_HH' => null,
            'NTIME_WK9_END_MI' => null,
            'NTIME_WK10_CD' => null,
            'NTIME_WK10_STR_HH' => null,
            'NTIME_WK10_STR_MI' => null,
            'NTIME_WK10_END_HH' => null,
            'NTIME_WK10_END_MI' => null,
            'NTIME_LEAVE_CLS_CD' => $request['nTimeLeaveClsCd'] ?? null,
            'NTIME_START_HH' => $request['nTimeStr']['nTimeStrHH'] ?? null,
            'NTIME_START_MI' => $request['nTimeStr']['nTimeStrMI'] ?? null,
            'NTIME_START_TK_TIME' => $request['nTimeStartTkTime'] ?? null,
            'BREAK_CLS_CD' => $request['BreakClsCd'] ?? null,
            'PBRK1_STR_HH' => $newBreakTime[0]['brstrHH'] ?? null,
            'PBRK1_STR_MI' => $newBreakTime[0]['brstrMI'] ?? null,
            'PBRK1_END_HH' => $newBreakTime[0]['brendHH'] ?? null,
            'PBRK1_END_MI' => $newBreakTime[0]['brendMI'] ?? null,
            'PBRK1_TIME' => $newBreakTime[0]['brTime'] ?? null,
            'PBRK2_STR_HH' => $newBreakTime[1]['brstrHH'] ?? null,
            'PBRK2_STR_MI' => $newBreakTime[1]['brstrMI'] ?? null,
            'PBRK2_END_HH' => $newBreakTime[1]['brendHH'] ?? null,
            'PBRK2_END_MI' => $newBreakTime[1]['brendMI'] ?? null,
            'PBRK2_TIME' => $newBreakTime[1]['brTime'] ?? null,
            'PBRK3_STR_HH' => $newBreakTime[2]['brstrHH'] ?? null,
            'PBRK3_STR_MI' => $newBreakTime[2]['brstrMI'] ?? null,
            'PBRK3_END_HH' => $newBreakTime[2]['brendHH'] ?? null,
            'PBRK3_END_MI' => $newBreakTime[2]['brendMI'] ?? null,
            'PBRK3_TIME' => $newBreakTime[2]['brTime'] ?? null,
            'PBRK4_STR_HH' => $newBreakTime[3]['brstrHH'] ?? null,
            'PBRK4_STR_MI' => $newBreakTime[3]['brstrMI'] ?? null,
            'PBRK4_END_HH' => $newBreakTime[3]['brendHH'] ?? null,
            'PBRK4_END_MI' => $newBreakTime[3]['brendMI'] ?? null,
            'PBRK4_TIME' => $newBreakTime[3]['brTime'] ?? null,
            'PBRK5_STR_HH' => $newBreakTime[4]['brstrHH'] ?? null,
            'PBRK5_STR_MI' => $newBreakTime[4]['brstrMI'] ?? null,
            'PBRK5_END_HH' => $newBreakTime[4]['brendHH'] ?? null,
            'PBRK5_END_MI' => $newBreakTime[4]['brendMI'] ?? null,
            'PBRK5_TIME' => $newBreakTime[4]['brTime'] ?? null,
            'PBRK6_STR_HH' => null,
            'PBRK6_STR_MI' => null,
            'PBRK6_END_HH' => null,
            'PBRK6_END_MI' => null,
            'PBRK6_TIME' => null,
            'PBRK7_STR_HH' => null,
            'PBRK7_STR_MI' => null,
            'PBRK7_END_HH' => null,
            'PBRK7_END_MI' => null,
            'PBRK7_TIME' => null,
            'NBRK_TIME' => $request['breakHour'][0] ?? null,
            'NBRK_MINUTE' => $request['breakHour'][1] ?? null,
            'EBRK_PTIME' => $request['brHourly'][0] ?? null,
            'EBRK_MINUTE' => $request['brHourly'][1] ?? null,
            'COM_CLS_CD' => '01',
            'RSV1_CLS_CD' => $rsv1_cls_cd,
            'RSV2_CLS_CD' => '',
            'UPD_DATE' => $today,
            'NWORK1_CLS_CD' => $nwork1_cls_cd,
            'RSV3_CLS_CD' => $request['rsv3ClsCd'] ?? '',
            'RSV4_CLS_CD' => $request['rsv4ClsCd'] ?? '',
            'RSV5_CLS_CD' => '',
            'RSV1_HH' => $rsv1_hh ?? null,
            'RSV1_MI' => $rsv1_mi ?? null,
            'RSV2_HH' => null,
            'RSV2_MI' => null,
            'RSV3_HH' => null,
            'RSV3_MI' => null,
            'NTIME_WK1_DCLS_CD' => $ntime_wk1_dcls_cd ?? null,
            'NTIME_WK2_DCLS_CD' => $newNTime[0]['nTimeDclsCd'] ?? null,
            'NTIME_WK3_DCLS_CD' => $newNTime[1]['nTimeDclsCd'] ?? null,
            'NTIME_WK4_DCLS_CD' => $newNTime[2]['nTimeDclsCd'] ?? null,
            'NTIME_WK5_DCLS_CD' => $newNTime[3]['nTimeDclsCd'] ?? null,
            'NTIME_WK6_DCLS_CD' => $newNTime[4]['nTimeDclsCd'] ?? null,
            'NTIME_WK7_DCLS_CD' => $newNTime[5]['nTimeDclsCd'] ?? null,
            'NTIME_WK8_DCLS_CD' => null,
            'NTIME_WK9_DCLS_CD' => null,
            'NTIME_WK10_DCLS_CD' => null,
        ];
        DB::beginTransaction();
        try {
            $this->mt05_workptn->upsertWorkPtn($param);
            DB::commit();
        } catch (\Exception $e) {
            \Log::debug($e);
            DB::rollback();
        }
        return;
    }

    public function delete(MT05WorkPtnDeleteRequest $request)
    {
        $workptn_cd = $request['WORKPTN_CD'];
        DB::beginTransaction();
        try {
            $this->mt05_workptn->deleteWorkPtn($workptn_cd);
            DB::commit();
        } catch (\Exception $e) {
            \Log::debug($e);
            DB::rollback();
        }
        return redirect('master/MT05WorkPtnReference');
    }
}
