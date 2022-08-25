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
            @page {
                margin: 25px 20px 7px 20px;
            }
            .date .page-number:after { 
                content: counter(page);
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
                padding-bottom:4.2em;
                border-left: none;
                border-right: none;
                border-bottom: 1px black dotted;
            }
            .workTable tr td {
                padding-top: 0px;
                padding-bottom: 0px;
                text-align: left;
                vertical-align:top;
                line-height:175%;
            }
            .date {
                padding-right: 8em;
                position: relative;
                text-align: right;
                margin-bottom:2%;
                font-size: xx-small;
            }
            .record {
                padding-bottom: 10px;
                text-align:justify;
                font-size: xx-small;
                position: relative;
            }
            .line {
                margin-top:0.4em;
                border-top: #000000 1px solid;
                border-right: #000000 0px solid;
                border-left: #000000 0px solid;
                border-bottom: #000000 0px solid;
                width: 100%;
            }
        </style>
    </head>
    @php
        $target_date_str = date('Y/m/d', strtotime($str_date)) . '(' . config('consts.weeks')[date('w', strtotime($str_date))] . ')'
            . ' ～ ' . date('Y/m/d', strtotime($end_date)) . '(' . config('consts.weeks')[date('w', strtotime($end_date))] . ')';
    @endphp
    @if (count($time_stamp_datas) < 1)
    <body>
        <div class="date">
            <span>作表日：</span>
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
            <span>{{ $target_date_str }}</span><br>
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
                    <th style="padding-left: 5px;width:3em">未・二</th>
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
                return [];
            }

            $time_array = [];
            foreach ($records as $r) {
                if ($r['WORKTIME_CLS_CD'] == $code) {
                    // 日付(出退勤情報)が日付(就業情報)を超える場合、時間を+24する
                    if (explode(' ', $time_stamp['CALD_DATE'])[0] < explode(' ', $r['WORK_DATE'])[0]) {
                        $time_array[] = ((int)$r['WORK_TIME_HH'] + 24) . ':' . sprintf('%02d', $r['WORK_TIME_MI']);
                    } else {
                        $time_array[] = (int)$r['WORK_TIME_HH'] . ':' . sprintf('%02d', $r['WORK_TIME_MI']);
                    }
                }
            }
            return $time_array;
        }
    @endphp
    @foreach ($time_stamp_datas->unique('DEPT_CD') as $time_stamp_in_dept)
    @php 
        $MAX_RECORD_NUM_IN_PAGE = 32;
        $pre_emp_cd = '';
        $pre_date = '';
        $border = '';
        $border_bottom = '';
        $time_stamp_data = $time_stamp_datas->where('DEPT_CD', $time_stamp_in_dept['DEPT_CD']);
        $time_stamp_array = array_values($time_stamp_data->toArray());
        $record_count = 0;
    @endphp
    <body>
        <script type="text/php">
            if(isset($pdf)) {
                $x = 550;
                $y = 17;
                $font = $fontMetrics->get_font("MS Pゴシック, メイリオ", "normal");
                $size = 6;
                $color = [0,0,0];
                $pdf->page_text($x, $y, "{PAGE_NUM} / {PAGE_COUNT}", $font, $size, $color);
            }
        </script>
        <div class="date">
            <span>作表日：{{ $now_date }}</span>
        </div>
        <div class="header">
            <span>未打刻・二重打刻</span>
            <span>一覧表</span>
        </div>
        <div class="record">
            <span style="margin-left:10px;">対象日</span>
            <span>:</span>
            <span>{{ $target_date_str }}</span><br>
        </div>
        <div class="record">
            <span style="margin-left:20px;">部門</span>
            <span>:</span>
            <span>{{ $time_stamp_in_dept['DEPT_CD'] }}</span>
            <span>{{ $time_stamp_in_dept['DEPT_NAME'] }}</span>
        </div>
        <table class="workTable" style="width: 100%;">
            <thead>
                <tr style="width: 100%;">
                    <th style="padding-left: 5px;width:3em">未・二</th>
                    <th style="padding-left: 5px;">社員</th>
                    <th>日付</th>
                    <th style="padding-left: 3px;">勤務体系</th>
                    <th style="padding-left: 3px;">事由</th>
                    <th style="padding-left: 3px;text-align:right;">出勤</th>
                    <th style="padding-left: 3px;text-align:right;">退出 </th>
                    <th style="padding-left: 3px;text-align:right;">外出</th>
                    <th style="padding-left: 3px;text-align:right;">再入</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($time_stamp_array as $key => $time_stamp)
                    @php
                        $date = date('Y/m/d', strtotime($time_stamp['CALD_DATE']));
                        $week = config('consts.weeks');

                        // 時間種別ごとに配列に格納
                        $ofc_time_records = getTimeRecord($time_stamp, $time_stamp['time_records'], '00');
                        $lev_time_records = getTimeRecord($time_stamp, $time_stamp['time_records'], '01');
                        $in_time_records = getTimeRecord($time_stamp, $time_stamp['time_records'], '02');
                        $out_time_records = getTimeRecord($time_stamp, $time_stamp['time_records'], '03');

                        // 一方に値が無ければ、「未打刻」を設定する
                        $sub_records_num = count($lev_time_records) - count($ofc_time_records);
                        for ($i = 0; $i < $sub_records_num; $i++) {
                            $ofc_time_records[] = '未打刻';
                        }
                        $sub_records_num = count($ofc_time_records) - count($lev_time_records);
                        for ($i = 0; $i < $sub_records_num; $i++) {
                            $lev_time_records[] = '未打刻';
                        }
                        $sub_records_num = count($out_time_records) - count($in_time_records);
                        for ($i = 0; $i < $sub_records_num; $i++) {
                            $in_time_records[] = '未打刻';
                        }
                        $sub_records_num = count($in_time_records) - count($out_time_records);
                        for ($i = 0; $i < $sub_records_num; $i++) {
                            $out_time_records[] = '未打刻';
                        }

                        // 出力行数のカウント
                        // 出退、外出再入はそれぞれ同じ行数に揃えるため、一方のみカウント
                        // 両方未打刻の場合、出退、外出再入が0になるため、最低１を加算
                        $time_stamp_count = max(count($ofc_time_records), count($in_time_records), 1);
                    @endphp

                    @for($record_num = 0; $record_num < $time_stamp_count; $record_num++)
                    @php
                        $view_emp_name = $record_count === 0 || $pre_emp_cd !== $time_stamp['EMP_CD'];
                        $is_first_record_of_date = $view_emp_name || $date !== $pre_date;

                        $pre_emp_cd = $time_stamp['EMP_CD'];
                        $pre_date = $date;
                        $record_count++;

                        // 以下を満たす場合、社員を区切りる破線を表示
                        // 1. ページの最後ではない
                        // 2. 最後のレコード、または次のレコードが別の社員のレコード
                        $is_not_page_end = $record_count !== $MAX_RECORD_NUM_IN_PAGE;
                        $is_last_record = $record_num + 1 == $time_stamp_count
                                            && (count($time_stamp_array) === $key + 1
                                                || $time_stamp['EMP_CD'] !== $time_stamp_array[$key + 1]['EMP_CD']);
                        if ($is_not_page_end && $is_last_record) {
                            $border_bottom = 'table-bottom-border';
                        } else {
                            $border_bottom = '';
                        }
                    @endphp
                    <tr style="width: 100%;">
                        <td class="{{ $border_bottom }}" style="text-align: center;">
                        @if($is_first_record_of_date)
                        {{ (($time_stamp['OFC_CNT'] >= 2 && !$time_stamp['OFC_TIME_HH']) || ($time_stamp['LEV_CNT'] >= 2 && !$time_stamp['LEV_TIME_HH'])
                            || ($time_stamp['OUT1_CNT'] >= 2 && !$time_stamp['OUT1_TIME_HH']) || ($time_stamp['IN1_CNT'] >= 2 && !$time_stamp['IN1_TIME_HH'])
                            || ($time_stamp['OUT2_CNT'] >= 2 && !$time_stamp['OUT2_TIME_HH']) || ($time_stamp['IN2_CNT'] >= 2 && !$time_stamp['IN2_TIME_HH'])) ? '二' : '未' }}
                        @endif
                        </td>
                        <td class="{{ $border_bottom }}" style="padding-left: 5px;">
                            {{ $view_emp_name ? $time_stamp['EMP_CD'] . '　　' . $time_stamp['EMP_NAME'] : '' }}
                        </td>
                        <td class="{{ $border_bottom }}">{{ $is_first_record_of_date ? $date . '('. $week[date("w", strtotime($time_stamp['CALD_DATE']))]. ')' : '' }}</td>
                        <td class="{{ $border_bottom }}" style="padding-left: 3px;">{{ $is_first_record_of_date ? $time_stamp['WORKPTN_NAME'] : '' }}</td>
                        <td class="{{ $border_bottom }}" style="padding-left: 3px;">{{ $is_first_record_of_date ? $time_stamp['REASON_NAME'] : '' }}</td>
 
                        @if (isset($input_datas['chkNoTime']))
                        <td class="{{ $border_bottom }}" style="padding-left: 3px;text-align:right">
                            @if (count($ofc_time_records) === 0 && $record_num === 0)
                            未打刻
                            @elseif(key_exists($record_num, $ofc_time_records))
                            {{ $ofc_time_records[$record_num] }}
                            @endif
                        </td>
                        <td class="{{ $border_bottom }}" style="padding-left: 3px;text-align:right">
                            @if (count($lev_time_records) === 0 && $record_num === 0)
                            未打刻
                            @elseif(key_exists($record_num, $lev_time_records))
                            {{ $lev_time_records[$record_num] }}
                            @endif
                        </td>
                        @else
                        <td class="{{ $border_bottom }}" style="padding-left: 3px;text-align:right">
                            @if(key_exists($record_num, $ofc_time_records))
                            {{ $ofc_time_records[$record_num] }}
                            @endif
                        </td>
                        <td class="{{ $border_bottom }}" style="padding-left: 3px;text-align:right">
                            @if(key_exists($record_num, $lev_time_records))
                            {{ $lev_time_records[$record_num] }}
                            @endif
                        </td>
                        @endif

                        <td class="{{ $border_bottom }}" style="padding-left: 3px;text-align:right">
                            @if(key_exists($record_num, $in_time_records))
                            {{ $in_time_records[$record_num] }}
                            @endif
                        </td>
                        <td class="{{ $border_bottom }}" style="padding-left: 3px;text-align:right">
                            @if(key_exists($record_num, $out_time_records))
                            {{ $out_time_records[$record_num] }}
                            @endif
                        </td>
                    </tr>

                    @if($record_count % $MAX_RECORD_NUM_IN_PAGE === 0)
                    @php
                    $record_count = 0;
                    @endphp
                </tbody>
            </table>
            <div class="line"></div>
        </body>
        <body>
            <div class="date">
                <span>作表日：{{ $now_date }}</span>
            </div>
            <div class="header">
                <span>未打刻・二重打刻</span>
                <span>一覧表</span>
            </div>
            <div class="record">
                <span style="margin-left:10px;">対象日</span>
                <span>:</span>
                <span>{{ $target_date_str }}</span><br>
            </div>
            <div class="record">
                <span style="margin-left:20px;">部門</span>
                <span>:</span>
                <span>{{ $time_stamp_in_dept['DEPT_CD'] }}</span>
                <span>{{ $time_stamp_in_dept['DEPT_NAME'] }}</span>
            </div>
            <table class="workTable" style="width: 100%;">
                <thead>
                    <tr style="width: 100%;">
                        <th style="padding-left: 5px;width:3em">未・二</th>
                        <th style="padding-left: 5px;">社員</th>
                        <th>日付</th>
                        <th style="padding-left: 3px;">勤務体系</th>
                        <th style="padding-left: 3px;">事由</th>
                        <th style="padding-left: 3px;text-align:right;">出勤</th>
                        <th style="padding-left: 3px;text-align:right;">退出 </th>
                        <th style="padding-left: 3px;text-align:right;">外出</th>
                        <th style="padding-left: 3px;text-align:right;">再入</th>
                    </tr>
                </thead>
                <tbody>
                        @endif
                    @endfor
                @endforeach
            </tbody>
        </table>
    </body>
    @endforeach
    @endif 
</html>