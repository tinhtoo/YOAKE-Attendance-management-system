<?php use Carbon\CarbonPeriod; ?>

<html lang="ja">
    <head>
        <title>印刷</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <style>
            @font-face{
                font-family: "MS Pゴシック";
                font-style: normal;
                font-weight: normal;
                src: url("{{ public_path('fonts/migmix-2p-regular.ttf')}}") format('truetype');
            }
            body {
                font-family: "MS Pゴシック";
                line-height: 80%;
                text-align: center;
                font-size: 10px;
            }
            .workTable {
                border-collapse: collapse;
                width: 100%;
            }
            .header {
                font-size:large;
                margin-bottom:2%;
            }
            .workTable tr th {
                padding-top: 6px;
                padding-bottom: 6px;
                border-bottom: 1px solid black;
                border-top: 1px solid black;
                border-left: none;
                border-right: none;
                text-align: left;
            }
            .table-bottom-border {
                border-left: none;
                border-right: none;
                border-bottom: 1px black dotted;
            }
            .workTable tr td {
                padding-top: 5px;
                padding-bottom: 5px;
                text-align: left;
                vertical-align:top;
            }
            .date {
                position: relative;
                margin-left:80%;
                margin-bottom:2%;
                font-size: xx-small;
            }
            .record {
                padding-bottom: 10px;
                text-align:justify;
                font-size: xx-small;
                position: relative;
            }
        </style>
    </head>
    @if (count($time_stamp_datas) < 1)
    <body>
        <div class="date">
            <span>作成日：</span>
            <span>{{ $now_date }}</span>
            <span style="margin-left:5px">1 / 1</span>
        </div>
        <div class="header">
            <span>未打刻・二重打刻</span>
            <span>一覧表</span>
        </div>
        <div class="record">
            <span style="margin-left:10px;">対象日</span>
            <span>:</span>
            <span>{{ date('Y/m/d', strtotime($str_date)) }}({{ config('consts.weeks')[date('w', strtotime($str_date))] }})</span>
            <span>～</span>
            <span>{{ date('Y/m/d', strtotime($end_date)) }}({{ config('consts.weeks')[date('w', strtotime($end_date))] }})</span><br>
        </div>
        <div class="record">
            <span style="margin-left:20px;">部門</span>
            <span>:</span>
            <span></span>
            <span></span>
        </div>
        <table class="workTable" style="width: 100%;">
            <thead>
                <tr style="width: 100%;">
                    <th style="padding-left: 5px;">未・二</th>
                    <th style="padding-left: 10px;">社員</th>
                    <th></th>
                    <th>日付</th>
                    <th style="padding-left: 5px;">勤務体系</th>
                    <th style="padding-left: 5px;">事由</th>
                    <th style="padding-left: 5px;">出勤</th>
                    <th style="padding-left: 5px;">退出 </th>
                    <th style="padding-left: 5px;">外出</th>
                    <th style="padding-left: 5px;">再入</th>
                </tr>
            </thead>
            <tbody>
                    <tr style="width: 100%;">
                        <td style="padding-left: 15px; text-align: left; border-bottom-style: dotted;"></td>
                        <td style="padding-left: 10px; border-bottom-style: dotted;"></td>
                        <td style="border-bottom-style: dotted;"></td>
                        <td style="border-bottom-style: dotted;"></td>
                        <td style="padding-left: 5px; border-bottom-style: dotted;"></td>
                        <td style="padding-left: 5px; border-bottom-style: dotted;"></td>
                        <td style="padding-left: 5px; border-bottom-style: dotted;"></td>
                        <td style="padding-left: 5px; border-bottom-style: dotted;"></td>
                        <td style="padding-left: 5px; border-bottom-style: dotted;"></td>
                        <td style="padding-left: 5px; border-bottom-style: dotted;"></td>
                    </tr>
            </tbody>
        </table>
    </body>
    @else
    @php
        function getTimeRecord($time_stamp, $records, $code)
        {
            if (count($records) == 0) {
                return '';
            }

            $returnStr = '';
            foreach ($records as $r) {
                if ($r['WORKTIME_CLS_CD'] == $code) {

                    if ($returnStr !== '') {
                        $returnStr = $returnStr . '<br>';
                    }
                    // 日付(出退勤情報)が日付(就業情報)を超える場合、時間を+24する
                    if (explode(' ', $time_stamp['CALD_DATE'])[0] < explode(' ', $r['WORK_DATE'])[0]) {
                        $returnStr = $returnStr . ((int)$r['WORK_TIME_HH'] + 24) . ':' . sprintf('%02d', $r['WORK_TIME_MI']);
                    } else {
                        $returnStr = $returnStr .  (int)$r['WORK_TIME_HH'] . ':' . sprintf('%02d', $r['WORK_TIME_MI']);
                    }
                }
            }
            return $returnStr;
        }
    @endphp
    @foreach ($time_stamp_datas->unique('DEPT_CD') as $time_stamp_data)
    <body>
        <div class="date">
            <span>作成日：</span>
            <span>{{ $now_date }}</span>
            <span style="margin-left:5px">{{ $loop->iteration }} / {{ $loop->count }}</span>
        </div>
        <div class="header">
            <span>未打刻・二重打刻</span>
            <span>一覧表</span>
        </div>
        <div class="record">
            <span style="margin-left:10px;">対象日</span>
            <span>:</span>
            <span>{{ date('Y/m/d', strtotime($str_date)) }}({{ config('consts.weeks')[date('w', strtotime($str_date))] }})</span>
            <span>～</span>
            <span>{{ date('Y/m/d', strtotime($end_date)) }}({{ config('consts.weeks')[date('w', strtotime($end_date))] }})</span><br>
        </div>
        <div class="record">
            <span style="margin-left:20px;">部門</span>
            <span>:</span>
            <span>{{ $time_stamp_data['DEPT_CD'] }}</span>
            <span>{{ $time_stamp_data['DEPT_NAME'] }}</span>
        </div>
        <table class="workTable" style="width: 100%;">
            <thead>
                <tr style="width: 100%;">
                    <th style="padding-left: 5px;">未・二</th>
                    <th style="padding-left: 10px;">社員</th>
                    <th></th>
                    <th>日付</th>
                    <th style="padding-left: 5px;">勤務体系</th>
                    <th style="padding-left: 5px;">事由</th>
                    <th style="padding-left: 5px;">出勤</th>
                    <th style="padding-left: 5px;">退出 </th>
                    <th style="padding-left: 5px;">外出</th>
                    <th style="padding-left: 5px;">再入</th>
                </tr>
            </thead>
            <tbody>
                @php 
                    $pre_cd = '';
                    $pre_date = '';
                    $border = '';
                    $border_bottom = '';
                    $time_stamp_data = $time_stamp_datas->where('DEPT_CD', $time_stamp_data['DEPT_CD']);
                    $time_stamp_array = array_values($time_stamp_data->toArray());  
                @endphp
                @foreach ($time_stamp_array as $key => $time_stamp)
                    @php
                        $date = date('Y/m/d', strtotime($time_stamp['CALD_DATE']));
                        $week = config('consts.weeks');
                    @endphp
                    @php
                        if (count($time_stamp_array) === $key + 1 || $time_stamp['EMP_CD'] !== $time_stamp_array[$key + 1]['EMP_CD']) {
                            $border_bottom = 'table-bottom-border';
                        } else {
                            $border_bottom = '';
                        }
                    @endphp
                    
                    @if($time_stamp['EMP_CD'] == $pre_cd)
                    <tr style="width: 100%;">
                    @else
                    <tr style="width: 100%;">
                    @endif
                        <td class="{{ $border_bottom }}" style="padding-left: 15px; text-align: left;">
                        {{ (($time_stamp['OFC_CNT'] >= 2 && !$time_stamp['OFC_TIME_HH']) || ($time_stamp['LEV_CNT'] >= 2 && !$time_stamp['LEV_TIME_HH'])
                            || ($time_stamp['OUT1_CNT'] >= 2 && !$time_stamp['OUT1_TIME_HH']) || ($time_stamp['IN1_CNT'] >= 2 && !$time_stamp['IN1_TIME_HH'])
                            || ($time_stamp['OUT2_CNT'] >= 2 && !$time_stamp['OUT2_TIME_HH']) || ($time_stamp['IN2_CNT'] >= 2 && !$time_stamp['IN2_TIME_HH'])) ? '二' : '未' }}
                        </td>
                        <td class="{{ $border_bottom }}" style="padding-left: 10px;">{{ $time_stamp['EMP_CD'] == $pre_cd ? '' : $time_stamp['EMP_CD'] }}
                        </td>
                        <td class="{{ $border_bottom }}">{{ $time_stamp['EMP_CD'] == $pre_cd ? '' : $time_stamp['EMP_NAME'] }}</td>
                        <td class="{{ $border_bottom }}">{{ ($time_stamp['EMP_CD'] == $pre_cd && $date == $pre_date) ? '' : $date . '('. $week[date("w", strtotime($time_stamp['CALD_DATE']))]. ')' }}</td>
                        <td class="{{ $border_bottom }}" style="padding-left: 5px;">{{ ($time_stamp['EMP_CD'] == $pre_cd && $date == $pre_date) ? '' : $time_stamp['WORKPTN_NAME'] }}</td>
                        <td class="{{ $border_bottom }}" style="padding-left: 5px;">{{ ($time_stamp['EMP_CD'] == $pre_cd && $date == $pre_date) ? '' : $time_stamp['REASON_NAME'] }}</td>
 
                        @if (isset($input_datas['chkNoTime']))
                        <td class="{{ $border_bottom }}" style="padding-left: 5px;">
                            {!! (!getTimeRecord($time_stamp, $time_stamp['time_records'], '00') && !getTimeRecord($time_stamp, $time_stamp['time_records'], '01')) || (!getTimeRecord($time_stamp, $time_stamp['time_records'], '00') && getTimeRecord($time_stamp, $time_stamp['time_records'], '01'))? '未打刻' : getTimeRecord($time_stamp, $time_stamp['time_records'], '00') !!}
                        </td>
                        <td class="{{ $border_bottom }}" style="padding-left: 5px;">
                            {!! (!getTimeRecord($time_stamp, $time_stamp['time_records'], '01') && !getTimeRecord($time_stamp, $time_stamp['time_records'], '00')) || (!getTimeRecord($time_stamp, $time_stamp['time_records'], '01') && getTimeRecord($time_stamp, $time_stamp['time_records'], '00'))? '未打刻' : getTimeRecord($time_stamp, $time_stamp['time_records'], '01') !!}
                        </td>
                        @else
                        <td class="{{ $border_bottom }}" style="padding-left: 5px;">
                            {!! (!getTimeRecord($time_stamp, $time_stamp['time_records'], '00') && getTimeRecord($time_stamp, $time_stamp['time_records'], '01')) ? '未打刻' : getTimeRecord($time_stamp, $time_stamp['time_records'], '00') !!}
                        </td>
                        <td class="{{ $border_bottom }}" style="padding-left: 5px;">
                            {!! (!getTimeRecord($time_stamp, $time_stamp['time_records'], '01') && getTimeRecord($time_stamp, $time_stamp['time_records'], '00')) ? '未打刻' : getTimeRecord($time_stamp, $time_stamp['time_records'], '01') !!}
                        </td>
                        @endif

                        <td class="{{ $border_bottom }}" style="padding-left: 5px;">
                        {!! (!getTimeRecord($time_stamp, $time_stamp['time_records'], '02') && getTimeRecord($time_stamp, $time_stamp['time_records'], '03')) ? '未打刻' : getTimeRecord($time_stamp, $time_stamp['time_records'], '02') !!}
                        </td>
                        <td class="{{ $border_bottom }}" style="padding-left: 5px;">
                        {!! (!getTimeRecord($time_stamp, $time_stamp['time_records'], '03') && getTimeRecord($time_stamp, $time_stamp['time_records'], '02')) ? '未打刻' : getTimeRecord($time_stamp, $time_stamp['time_records'], '03') !!}
                        </td>
                        @php
                        $pre_cd = $time_stamp['EMP_CD'];
                        $pre_date = $date;
                        @endphp
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
    @endforeach
    @endif 
</html>