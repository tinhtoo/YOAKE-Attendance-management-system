<?php use Carbon\CarbonPeriod; ?>
<html lang="ja">
    <head>
        <title>印刷</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <style>
            @font-face {
                font-family: "MS Pゴシック";
                font-style: normal;
                font-weight: normal;
                src: url("{{ public_path('fonts/migmix-2p-regular.ttf')}}") format('truetype');
            }
            @page {
                margin: 23px 15px 2px 15px;
            }
            body {
                font-family: "MS Pゴシック";
                line-height: 80%;
                text-align: center;
                font-size: 9px;
            }
            table .table-head1 th {
                border-bottom: none;
                padding-bottom: 0px;
            }
            table .table-head2 th {
                border-top: none;
                padding-top: 0px;
            }
            table .table-head-plane th {
                border-bottom: 2px solid black;
                padding-top: 20px;
                padding-bottom: 1px;
            }
            table .record-data td {
                height: 20px;
            }
            table .record-sum td {
                border-top: 1px solid black;
                border-bottom: none;
                height: 20px;
                padding-bottom: 15px;
            }
            .workTable {
                border-collapse: collapse;
                width: 100%;
            }
            .workTable tr th {
                height:20px;
                border-bottom: 2px solid black;
                border-top: 2px solid black;
                border-left: none;
                border-right: none;
                text-align: right;
                font-weight: unset;
            }
            .workTable tr td {
                height:18px;
                border-bottom: 1px black;
                border-top: 1px black;
                border-left: none;
                border-right: none;
                text-align: right;
                border-bottom-style: dotted;
            }
            .date {
                position: relative;
                margin-left:70%;
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
    @isset($wtPortraitDatas)
    <!-- 該当データがない場合 -->
    @if (count($wtPortraitDatas) < 1)
    <body>
        <!-- ページ番号作成 -->
        <script type="text/php">
            if(isset($pdf)) {
                $x = 800;
                $y = 15;
                $text = "{PAGE_NUM} / {PAGE_COUNT}";
                $font = $fontMetrics->get_font("MS Pゴシック, メイリオ", "normal");
                $size = 6;
                $color = [0,0,0];
                $pdf->page_text($x, $y, $text, $font, $size, $color);
            }
        </script>
        <div class="date">
            <span style="margin-left:80px; margin-top:0px;">作表日：</span>
            <span style="margin-right:60px;">{{ $now_date }}</span>
        </div>
        <div style="font-size:large; margin-top:30px;">
            <span>勤務実績表(社員別月報)</span>
        </div>
        <div class="record">
            <span>対象月度</span>
            <span>:</span>
            <span>
                {{ $year }}/{{ substr('00'. $month, -2) }}
            </span>
            <span>月度</span>
        </div>
        <div class="record">
            <span style="margin-left:20px;">部門</span>
            <span>:</span>
            <span></span>
            <span></span>
        </div> 
        <table class="workTable">
            <thead>
                <tr class="table-head-plane">
                    <th style="width: 60px; padding-left: 5px; text-align: left;">日付</th>
                    <th style="width: 70px; padding-left: 20px; text-align: left;">勤務体系</th>
                    <th style="width: 23px; text-align: right;">事由</th>
                    <th style="width: 25px;">出勤</th>
                    <th style="width: 25px;">退出</th>
                    <th style="width: 25px;">外出1</th>
                    <th style="width: 25px;">再入1</th>
                    <th style="width: 25px;">外出2</th>
                    <th style="width: 25px;">再入2</th>
                    <th style="width: 50px;">出勤時間</th>
                    <th style="width: 50px;">遅刻時間</th>
                    <th style="width: 50px;">早退時間</th>
                    <th style="width: 50px;">外出時間</th>
                    <th style="width: 50px;"></th>
                    <th style="width: 50px;"></th>
                    <th style="width: 50px;"></th>
                    <th style="width: 50px;"></th>
                    <th style="width: 50px; padding-right: 5px;"></th>
                </tr>
            </thead>
            <tbody>
                <tr class="record-data">
                    <td colspan="18"></td>
                </tr>
                <tr class="record-sum">
                    <td colspan="8"></td>
                    <td>社員計</td>
                    <td colspan="9"></td>
                </tr>
            </tbody>
        </table>
    </body>
    @else
    @php
        $emp_list = $wtPortraitDatas->unique('EMP_CD');
        $dept_list = $emp_list->unique('DEPT_CD');
    @endphp
    <!-- 部門リスト順で帳票出力 -->
    @foreach ($dept_list as $dept)
    <body>
        <!-- ページ番号作成 -->
        <script type="text/php">
            if(isset($pdf)) {
                $x = 800;
                $y = 15;
                $text = "{PAGE_NUM} / {PAGE_COUNT}";
                $font = $fontMetrics->get_font("MS Pゴシック, メイリオ", "normal");
                $size = 6;
                $color = [0,0,0];
                $pdf->page_text($x, $y, $text, $font, $size, $color);
            }
        </script>
        <!-- 同じ部門の社員ごとで帳票作成 -->
        @php
            $same_dept_emp_list = $wtPortraitDatas->where('DEPT_CD', $dept->DEPT_CD)->unique('EMP_CD');
        @endphp
        @foreach ($same_dept_emp_list as $key => $wt_data)
        <!-- 社員２人毎に設定し帳票のタイトルを表示する -->
        @if (($loop->iteration) % 2 != 0)
        <div class="date">
            <span style="margin-left:80px;">作表日：</span>
            <span style="margin-right:60px;">{{ $now_date }}</span>
        </div>
        <div style="font-size:large; margin-top:20px;">
            <span>勤務実績表(社員別月報)</span>
        </div>
        <div class="record">
            <span>対象月度</span>
            <span>:</span>
            <span>
                {{ $year }}/{{ substr('00'. $month, -2) }}
            </span>
            <span>月度</span>
        </div>
        <div class="record">
            <span style="margin-left:20px;">部門</span>
            <span>:</span>
            <span>{{ $dept->DEPT_CD }}</span>
            <span>{{ $dept->DEPT_NAME }}</span>
        </div>   
        @endif
        <table class="workTable">
            <thead>
                <tr class="table-head1">
                    <th colspan="4" style="padding-left: 5px; text-align: left;">
                    {{ $wt_data->EMP_CD }}&nbsp;&nbsp;&nbsp;{{ $wt_data->EMP_NAME }}
                    </th>
                    <th colspan="1" style="width: 30px;">出勤:{{ $wt_data->SUM_WORKDAY_CNT }}</th>
                    <th colspan="1" style="width: 0px;"></th>
                    <th colspan="1" style="width: 30px;">有休:{{ $wt_data->SUM_PADHOL_CNT }}</th>
                    <th colspan="1" style="width: 0px;"></th>
                    <th colspan="1" style="width: 30px;">代休:{{ $wt_data->SUM_COMPDAY_CNT }}</th>
                    <th colspan="1" style="width: 30px;">特休:{{ $wt_data->SUM_SPCHOL_CNT }}</th>
                    <th colspan="1" style="width: 30px;">休出:{{ $wt_data->SUM_HOLWORK_CNT }}</th>
                    <th colspan="1" style="width: 30px;">欠勤:{{ $wt_data->SUM_ABCWORK_CNT }}</th>
                    <th colspan="1" style="width: 30px;">遅刻:{{ $wt_data->SUM_TARD_CNT }}</th>
                    <th colspan="1" style="width: 30px;">早退:{{ $wt_data->SUM_LEAVE_CNT }}</th>
                    <th colspan="4" style="width: 10px;"></th>
                </tr>
                <tr class="table-head2" style="width: 100%;">
                    <th style="width: 60px; padding-left: 5px; text-align: left;">日付</th>
                    <th style="width: 30px; text-align: left;">勤務体系</th>
                    <th style="width: 25px; text-align: left;">事由</th>
                    <th style="width: 30px;">出勤</th>
                    <th style="width: 30px;">退出</th>
                    <th style="width: 30px;">外出1</th>
                    <th style="width: 30px;">再入1</th>
                    <th style="width: 30px;">外出2</th>
                    <th style="width: 30px;">再入2</th>
                    <th style="width: 60px;">出勤時間</th>
                    <th style="width: 60px;">遅刻時間</th>
                    <th style="width: 60px;">早退時間</th>
                    <th style="width: 60px;">外出時間</th>
                    <th style="width: 60px;">
                        {{ mb_substr($wt_data->WORK_DESC_NAME_100, 0, 4) }}
                    </th>
                    <th style="width: 60px;">
                        {{ mb_substr($wt_data->WORK_DESC_NAME_101, 0, 4) }}
                    </th>
                    <th style="width: 60px;">
                        {{ mb_substr($wt_data->WORK_DESC_NAME_102, 0, 4) }}
                    </th>
                    <th style="width: 60px;">
                        {{ mb_substr($wt_data->WORK_DESC_NAME_103, 0, 4) }}
                    </th>
                    <th style="width: 60px; padding-right: 5px;">
                        {{ mb_substr($wt_data->WORK_DESC_NAME_200, 0, 4) }}
                    </th>
                </tr>
            </thead>
            <!-- 社員詳細データ -->
            @php
                $emp_worktime_list = $wtPortraitDatas->where('DEPT_CD', $wt_data->DEPT_CD)
                                                     ->where('EMP_CD', $wt_data->EMP_CD);
            @endphp
            @foreach ($emp_worktime_list as $w_time)
            <tbody>
                <tr style="width: 100%;">
                    <td style="width:20px; padding-left: 5px; text-align: left;">
                        {{ date('m/d', strtotime($w_time->CALD_DATE)) }}
                        ({{ config('consts.weeks')[date('w', strtotime($w_time->CALD_DATE))] }})
                    </td>
                    <td style="width:150px; text-align: left;">{{ $w_time->WORKPTN_NAME }}</td>
                    <td style="width:25px; text-align: left;">{{ $w_time->REASON_NAME }}</td>
                    <td>{{ $w_time->OFC_TIME }}</td>
                    <td>{{ $w_time->LEV_TIME }}</td>
                    <td>{{ $w_time->OUT1_TIME }}</td>
                    <td>{{ $w_time->IN1_TIME }}</td>
                    <td>{{ $w_time->OUT2_TIME }}</td>
                    <td>{{ $w_time->IN2_TIME }}</td>
                    <td>
                        {{ $w_time->WORK_TIME_HH .':'. substr('00'.$w_time->WORK_TIME_MI, -2) }}
                    </td>
                    <td>
                        {{ $w_time->TARD_TIME_HH .':'. substr('00'.$w_time->TARD_TIME_MI, -2) }}
                    </td>
                    <td>
                        {{ $w_time->LEAVE_TIME_HH .':'. substr('00'.$w_time->LEAVE_TIME_MI, -2) }}
                    </td>
                    <td>
                        {{ $w_time->OUT_TIME_HH .':'. substr('00'.$w_time->OUT_TIME_MI, -2) }}
                    </td>
                    <td>
                        {{ $w_time->OVTM1_TIME_HH .':'. substr('00'.$w_time->OVTM1_TIME_MI, -2) }}
                    </td>
                    <td>
                        {{ $w_time->OVTM2_TIME_HH .':'. substr('00'.$w_time->OVTM2_TIME_MI, -2) }}
                    </td>
                    <td>
                        {{ $w_time->OVTM3_TIME_HH .':'. substr('00'.$w_time->OVTM3_TIME_MI, -2) }}
                    </td>
                    <td>
                        {{ $w_time->OVTM4_TIME_HH .':'. substr('00'.$w_time->OVTM4_TIME_MI, -2) }}
                    </td>
                    <td style="padding-right: 5px;">
                        {{ $w_time->EXT1_TIME_HH .':'. substr('00'.$w_time->EXT1_TIME_MI, -2) }}
                    </td>
                </tr>
            @endforeach
                <!-- 社員詳細データの集計 -->
                @php
                    $sum_wt_hh = $emp_worktime_list->sum('WORK_TIME_HH') + 
                                floor($emp_worktime_list->sum('WORK_TIME_MI') / 60);
                    $sum_wt_mi = substr('00'. $emp_worktime_list->sum('WORK_TIME_MI') % 60, -2);
                    $sum_tard_hh = $emp_worktime_list->sum('TARD_TIME_HH') + 
                                    floor($emp_worktime_list->sum('TARD_TIME_MI') / 60);
                    $sum_tard_mi = substr('00'. $emp_worktime_list->sum('TARD_TIME_MI') % 60, -2);
                    $sum_leave_hh = $emp_worktime_list->sum('LEAVE_TIME_HH') + 
                                    floor($emp_worktime_list->sum('LEAVE_TIME_MI') / 60);
                    $sum_leave_mi = substr('00'. $emp_worktime_list->sum('LEAVE_TIME_MI') % 60, -2);
                    $sum_out_hh = $emp_worktime_list->sum('OUT_TIME_HH') + 
                                floor($emp_worktime_list->sum('OUT_TIME_MI') / 60);
                    $sum_out_mi = substr('00'. $emp_worktime_list->sum('OUT_TIME_MI') % 60, -2);
                    $sum_ovtm1_hh = $emp_worktime_list->sum('OVTM1_TIME_HH') + 
                                floor($emp_worktime_list->sum('OVTM1_TIME_MI') / 60);
                    $sum_ovtm1_mi = substr('00'. $emp_worktime_list->sum('OVTM1_TIME_MI') % 60, -2);
                    $sum_ovtm2_hh = $emp_worktime_list->sum('OVTM2_TIME_HH') + 
                                    floor($emp_worktime_list->sum('OVTM2_TIME_MI') / 60);
                    $sum_ovtm2_mi = substr('00'. $emp_worktime_list->sum('OVTM2_TIME_MI') % 60, -2);
                    $sum_ovtm3_hh = $emp_worktime_list->sum('OVTM3_TIME_HH') + 
                                floor($emp_worktime_list->sum('OVTM3_TIME_MI') / 60);
                    $sum_ovtm3_mi = substr('00'. $emp_worktime_list->sum('OVTM3_TIME_MI') % 60, -2);
                    $sum_ovtm4_hh = $emp_worktime_list->sum('OVTM4_TIME_HH') + 
                                floor($emp_worktime_list->sum('OVTM4_TIME_MI') / 60);
                    $sum_ovtm4_mi = substr('00'. $emp_worktime_list->sum('OVTM4_TIME_MI') % 60, -2);
                    $sum_ext1_hh = $emp_worktime_list->sum('EXT1_TIME_HH') + 
                                floor($emp_worktime_list->sum('EXT1_TIME_MI') / 60);
                    $sum_ext1_mi = substr('00'. $emp_worktime_list->sum('EXT1_TIME_MI') % 60, -2);
                @endphp
                <tr class="record-sum">
                    <td colspan="8"></td>
                    <td>社員計</td>
                    <td>{{ $sum_wt_hh . ':'. $sum_wt_mi }}</td> <!-- 出勤時間 -->
                    <td>{{ $sum_tard_hh . ':' . $sum_tard_mi }}</td> <!-- 遅刻時間 -->
                    <td>{{ $sum_leave_hh . ':' . $sum_leave_mi }}</td> <!-- 早退時間 -->
                    <td>{{ $sum_out_hh . ':' . $sum_out_mi }}</td> <!-- 外出時間 -->
                    <td>{{ $sum_ovtm1_hh . ':' . $sum_ovtm1_mi }}</td> <!-- 残業項目１ -->
                    <td>{{ $sum_ovtm2_hh . ':' . $sum_ovtm2_mi }}</td> <!-- 残業項目２ -->
                    <td>{{ $sum_ovtm3_hh . ':' . $sum_ovtm3_mi }}</td> <!-- 残業項目３ -->
                    <td>{{ $sum_ovtm4_hh . ':' . $sum_ovtm4_mi }}</td> <!-- 残業項目４ -->
                    <td style="padding-right: 5px;">{{ $sum_ext1_hh . ':' . $sum_ext1_mi }}</td> <!-- 割増対象１ -->
                </tr>
            </tbody>
        </table>    
        @endforeach
    </body>
    @endforeach
    @endif
    @endisset
</html>