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
                margin: 28px 18px 15px 20px;
            }
            body {
                font-family: "MS Pゴシック";
                line-height: 65%;
                text-align: center;
                font-size: 9px;
            }
            table .table-head1 th{
                border-bottom: none;
                padding-bottom: 0px;
            }
            table .table-head2 th{
                border-top: none;
                padding-top: 1px;
            }
            table .table-head-plane th{
                border-bottom: none;
                height: 15px;
            }
            table tbody .record-data td{
                padding-top: 20px;
            }
            table tbody .record-sum td{
                border-top: 1px solid black;
                border-bottom: none;
            }
            .workTable {
                border-collapse: collapse;
                width: 100%;
            }
            .workTable tr th{
                height:17px;
                border-bottom: 2px solid black;
                border-top: 2px solid black;
                border-left: none;
                border-right: none;
                text-align: right;
                font-weight: unset;
            }
            .workTable tr td{
                height:16px;
                border-bottom: 1px black;
                border-top: 1px black;
                border-left: none;
                border-right: none;
                text-align: right;
                border-bottom-style: dotted;
            }
            .date{
                position: relative;
                margin-left:70%;
                font-size: xx-small;
            }
            .record{
                padding-bottom: 5px;
                text-align:justify;
                font-size: xx-small;
                position: relative;
            }
        </style>
    </head>
    <!-- 該当データがない場合 -->
    @isset($wtLandscape2Datas)
    @if (count($wtLandscape2Datas) < 1)
    <body>
        <!-- ページ番号作成 -->
        <script type="text/php">
            if(isset($pdf)) {
                $x = 800;
                $y = 18;
                $text = "{PAGE_NUM} / {PAGE_COUNT}";
                $font = $fontMetrics->get_font("MS Pゴシック, メイリオ", "normal");
                $size = 6;
                $color = [0,0,0];
                $pdf->page_text($x, $y, $text, $font, $size, $color);
            }
        </script>
        <div class="date">
            <span style="margin-left:80px; margin-top:0px;">作表日：</span>
            <span style="margin-right:50px;">{{ date('Y/m/d', strtotime($now_date)) }}</span>
        </div>
        <div style="font-size:large; margin-top:0px;">
            <span>勤務実績表(社員別月報)</span>
        </div>
        <div class="record">
            <span>対象月度</span>
            <span>:</span>
            <span>
                {{ $year }}/{{ $month }}
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
                    <th colspan="19"></th>
                </tr>
                <tr class="table-head2">
                    <th style="width: 50px; padding-left: 5px; text-align: left;">日付</th>
                    <th style="width: 150px; text-align: left;">勤務体系</th>
                    <th style="width: 20px; text-align: left;">事由</th>
                    <th style="width: 20px;">出勤</th>
                    <th style="width: 30px;">退出</th>
                    <th style="width: 30px;">外出1</th>
                    <th style="width: 30px;">再入1</th>
                    <th style="width: 50px;">出勤時間</th>
                    <th style="width: 50px;">休日出勤</th>
                    <th style="width: 50px;">休外出勤</th>
                    <th style="width: 50px;">遅刻時間</th>
                    <th style="width: 50px;">早退時間</th>
                    <th style="width: 50px;">外出時間</th>
                    <th style="width: 50px;"></th>
                    <th style="width: 50px;"></th>
                    <th style="width: 50px;"></th>
                    <th style="width: 50px;"></th>
                    <th style="width: 50px;"></th>
                    <th style="width: 50px; padding-right: 5px;"></th>
                </tr>
            </thead>
            <tbody>
                <tr class="record-data" style="width: 100%;">
                    @for ($i = 0; $i <= 18; $i++)
                    <td></td>
                    @endfor
                </tr>
                <tr class="record-sum">
                    @for ($i = 0; $i <= 5; $i++)
                    <td></td>
                    @endfor
                    <td>社員計</td>
                    @for ($i = 0; $i <= 11; $i++)
                    <td></td>
                    @endfor
                </tr>
            </tbody>
        </table>
    </body>
    @else
    <!-- 社員コード順で帳票の表示 -->
    @php
        $emp_worktime_list = $wtLandscape2Datas->unique('EMP_CD')
    @endphp
    @foreach ($emp_worktime_list as $emp)
    <body>
        <!-- ページ番号作成 -->
        <script type="text/php">
            if(isset($pdf)) {
                $x = 800;
                $y = 18;
                $text = "{PAGE_NUM} / {PAGE_COUNT}";
                $font = $fontMetrics->get_font("MS Pゴシック, メイリオ", "normal");
                $size = 6;
                $color = [0,0,0];
                $pdf->page_text($x, $y, $text, $font, $size, $color);
            }
        </script>
        <div class="date">
            <span style="margin-left:80px; margin-top:0px;">作表日：</span>
            <span>{{ date('Y/m/d', strtotime($now_date)) }}</span>
        </div>
        <div style="font-size:large; margin-top:0px;">
            <span>勤務実績表(社員別月報)</span>
        </div>
        <div class="record">
            <span>対象月度</span>
            <span>:</span>
            <span>
                {{ $year }}/{{ $month }}
            </span>
            <span>月度</span>
        </div>
        <div class="record">
            <span style="margin-left:20px;">部門</span>
            <span>:</span>
            <span>{{ $emp->DEPT_CD }}</span>
            <span>{{ $emp->DEPT_NAME }}</span>
        </div>
        <table class="workTable" style="width: 100%;">
            <thead>
                <tr class="table-head1" style="width: 100%;">
                    <th style="width:60px; padding-left: 5px; text-align: left;">{{ $emp->EMP_CD }}</th>
                    <th colspan="4" style="text-align: left;">{{ $emp->EMP_NAME }}</th>
                    <th style="width: 40px;">出勤:{{ $emp->SUM_WORKDAY_CNT }}</th>
                    <th style="width: 40px;">有休:{{ $emp->SUM_PADHOL_CNT }}</th>
                    <th style="width: 40px;">代休:{{ $emp->SUM_COMPDAY_CNT }}</th>
                    <th style="width: 40px;">特休:{{ $emp->SUM_SPCHOL_CNT }}</th>
                    <th style="width: 40px;">休出:{{ $emp->SUM_HOLWORK_CNT }}</th>
                    <th style="width: 40px;">欠勤:{{ $emp->SUM_ABCWORK_CNT }}</th>
                    <th style="width: 40px;">遅刻:{{ $emp->SUM_TARD_CNT }}</th>
                    <th style="width: 40px;">早退:{{ $emp->SUM_LEAVE_CNT }}</th>
                    <th style="width: 40px;"></th>
                    <th style="width: 40px;"></th>
                    <th style="width: 40px;"></th>
                    <th style="width: 40px;"></th>
                    <th style="width: 40px;"></th>
                    <th style="width: 50px; padding-right: 5px;"></th>
                </tr>
                <tr class="table-head2" style="width: 100%;">
                    <th style="width: 15px; padding-left: 5px; text-align: left;">日付</th>
                    <th style="width: 150px; text-align: left;">勤務体系</th>
                    <th style="width: 20px; text-align: left;">事由</th>
                    <th style="width: 20px;">出勤</th>
                    <th style="width: 30px;">退出</th>
                    <th style="width: 30px;">外出1</th>
                    <th style="width: 30px;">再入1</th>
                    <th style="width: 50px;">出勤時間</th>
                    <th style="width: 50px;">休日出勤</th>
                    <th style="width: 50px;">休外出勤</th>
                    <th style="width: 50px;">遅刻時間</th>
                    <th style="width: 50px;">早退時間</th>
                    <th style="width: 50px;">外出時間</th>
                    <th style="width: 50px;">
                        {{ mb_substr($emp->WORK_DESC_NAME_100, 0, 4) }}
                    </th>
                    <th style="width: 50px;">
                        {{ mb_substr($emp->WORK_DESC_NAME_101, 0, 4) }}
                    </th>
                    <th style="width: 50px;">
                        {{ mb_substr($emp->WORK_DESC_NAME_102, 0, 4) }}
                    </th>
                    <th style="width: 50px;">
                        {{ mb_substr($emp->WORK_DESC_NAME_103, 0, 4) }}
                    </th>
                    <th style="width: 50px;">
                        {{ mb_substr($emp->WORK_DESC_NAME_104, 0, 4) }}
                    </th>
                    <th style="width: 50px; padding-right: 5px;">
                        {{ mb_substr($emp->WORK_DESC_NAME_105, 0, 4) }}
                    </th>
                </tr>
            </thead>
            <!-- 社員詳細データ -->
            @php
                $emp_worktime_datas = $wtLandscape2Datas->where('DEPT_CD', $emp->DEPT_CD)
                                                       ->where('EMP_CD', $emp->EMP_CD)
                                                       ->unique('CALD_DATE');
            @endphp
            @foreach ($emp_worktime_datas->unique('CALD_DATE') as $w_time)
            @php
                $def_wt_hh = $w_time->DEF_WORK_TIME_HH == null ? '' : $w_time->DEF_WORK_TIME_HH;
                $def_wt_mi = $w_time->DEF_WORK_TIME_MI == null ? '' : substr('00' . $w_time->DEF_WORK_TIME_MI, -2);
                $hol_wt_hh = $w_time->HOL_WORK_TIME_HH == null ? '' : $w_time->HOL_WORK_TIME_HH;
                $hol_wt_mi = $w_time->HOL_WORK_TIME_MI == null ? '' : substr('00' . $w_time->HOL_WORK_TIME_MI, -2);
                $hol_out_wt_hh = $w_time->HOL_OUT_WORK_TIME_HH == null ? '' : $w_time->HOL_OUT_WORK_TIME_HH;
                $hol_out_wt_mi = $w_time->HOL_OUT_WORK_TIME_MI == null ? '' :
                                 substr('00' . $w_time->HOL_OUT_WORK_TIME_MI, -2);

                $def_work_time = $def_wt_hh . ':' . $def_wt_mi;
                $hol_work_time = $hol_wt_hh . ':' . $hol_wt_mi;
                $hol_out_work_time = $hol_out_wt_hh . ':' . $hol_out_wt_mi;
            @endphp
            <tbody>
                <tr style="width: 100%;">
                    <td style="width:20px; padding-left: 5px; text-align: left;">
                    {{ date('m/d', strtotime($w_time->CALD_DATE)) }}
                    ({{ config('consts.weeks')[date('w', strtotime($w_time->CALD_DATE))] }})
                    </td>
                    <td style="width:110px; text-align: left;">{{ $w_time->WORKPTN_NAME }}</td>
                    <td style="width:25px; text-align: left;">{{ $w_time->REASON_NAME }}</td>
                    <td>{{ $w_time->OFC_TIME }}</td>
                    <td>{{ $w_time->LEV_TIME }}</td>
                    <td>{{ $w_time->OUT1_TIME }}</td>
                    <td>{{ $w_time->IN1_TIME }}</td>
                    <td>
                        {{ ($def_wt_hh || $def_wt_mi) ? $def_work_time : '' }}
                    </td>
                    <td>
                        {{ ($hol_wt_hh || $hol_wt_mi) ? $hol_work_time : '' }}
                    </td>
                    <td>
                        {{ ($hol_out_wt_hh || $hol_out_wt_mi) ? $hol_out_work_time : '' }}
                    </td>
                    <td>
                        {{ $w_time->TARD_TIME_HH . ':' . substr('00'. $w_time->TARD_TIME_MI, -2) }}
                    </td>
                    <td>
                        {{ $w_time->LEAVE_TIME_HH . ':' . substr('00'. $w_time->LEAVE_TIME_MI, -2) }}
                    </td>
                    <td>
                        {{ $w_time->OUT_TIME_HH . ':' . substr('00'. $w_time->OUT_TIME_MI, -2) }}
                    </td>
                    <td>
                        {{ $w_time->OVTM1_TIME_HH . ':' . substr('00'. $w_time->OVTM1_TIME_MI, -2) }}
                    </td>
                    <td>
                        {{ $w_time->OVTM2_TIME_HH . ':' . substr('00'. $w_time->OVTM2_TIME_MI, -2) }}
                    </td>
                    <td>
                        {{ $w_time->OVTM3_TIME_HH . ':' . substr('00'. $w_time->OVTM3_TIME_MI, -2) }}
                    </td>
                    <td>
                        {{ $w_time->OVTM4_TIME_HH . ':' . substr('00'. $w_time->OVTM4_TIME_MI, -2) }}
                    </td>
                    <td>
                        {{ $w_time->OVTM5_TIME_HH . ':' . substr('00'. $w_time->OVTM5_TIME_MI, -2) }}
                    </td>
                    <td style="padding-right: 5px;">
                        {{ $w_time->OVTM6_TIME_HH . ':' . substr('00'. $w_time->OVTM6_TIME_MI, -2) }}
                    </td>
                </tr>
                @endforeach
                <!-- 社員詳細データの集計 -->
                @php
                    $sum_def_hh = $emp_worktime_datas->sum('DEF_WORK_TIME_HH') + 
                                floor($emp_worktime_datas->sum('DEF_WORK_TIME_MI') / 60);
                    $sum_def_mi = substr('00'. $emp_worktime_datas->sum('DEF_WORK_TIME_MI') % 60, -2);

                    $sum_hol_hh = $emp_worktime_datas->sum('HOL_WORK_TIME_HH') +
                                floor($emp_worktime_datas->sum('HOL_WORK_TIME_MI') / 60);
                    $sum_hol_mi = substr('00'. $emp_worktime_datas->sum('HOL_WORK_TIME_MI') % 60, -2);

                    $sum_hol_out_hh = $emp_worktime_datas->sum('HOL_OUT_WORK_TIME_HH') +
                                    floor($emp_worktime_datas->sum('HOL_OUT_WORK_TIME_MI') / 60);
                    $sum_hol_out_mi = substr('00'. $emp_worktime_datas->sum('HOL_OUT_WORK_TIME_MI') % 60, -2);

                    $sum_tard_hh = $emp_worktime_datas->sum('TARD_TIME_HH') +
                                floor($emp_worktime_datas->sum('TARD_TIME_MI') / 60);
                    $sum_tard_mi = substr('00'. $emp_worktime_datas->sum('TARD_TIME_MI') % 60, -2);

                    $sum_leave_hh = $emp_worktime_datas->sum('LEAVE_TIME_HH') +
                                    floor($emp_worktime_datas->sum('LEAVE_TIME_MI') / 60);
                    $sum_leave_mi = substr('00'. $emp_worktime_datas->sum('LEAVE_TIME_MI') % 60, -2);

                    $sum_out_hh = $emp_worktime_datas->sum('OUT_TIME_HH') +
                                floor($emp_worktime_datas->sum('OUT_TIME_MI') / 60);
                    $sum_out_mi = substr('00'. $emp_worktime_datas->sum('OUT_TIME_MI') % 60, -2);

                    $sum_ovtm1_hh = $emp_worktime_datas->sum('OVTM1_TIME_HH') +
                                    floor($emp_worktime_datas->sum('OVTM1_TIME_MI') / 60);
                    $sum_ovtm1_mi = substr('00'. $emp_worktime_datas->sum('OVTM1_TIME_MI') % 60, -2);

                    $sum_ovtm2_hh = $emp_worktime_datas->sum('OVTM2_TIME_HH') + 
                                    floor($emp_worktime_datas->sum('OVTM2_TIME_MI') / 60);
                    $sum_ovtm2_mi = substr('00'. $emp_worktime_datas->sum('OVTM2_TIME_MI') % 60, -2);

                    $sum_ovtm3_hh = $emp_worktime_datas->sum('OVTM3_TIME_HH') +
                                    floor($emp_worktime_datas->sum('OVTM3_TIME_MI') / 60);
                    $sum_ovtm3_mi = substr('00'. $emp_worktime_datas->sum('OVTM3_TIME_MI') % 60, -2);

                    $sum_ovtm4_hh = $emp_worktime_datas->sum('OVTM4_TIME_HH') +
                                    floor($emp_worktime_datas->sum('OVTM4_TIME_MI') / 60);
                    $sum_ovtm4_mi = substr('00'. $emp_worktime_datas->sum('OVTM4_TIME_MI') % 60, -2);

                    $sum_ovtm5_hh = $emp_worktime_datas->sum('OVTM5_TIME_HH') +
                                    floor($emp_worktime_datas->sum('OVTM5_TIME_MI') / 60);
                    $sum_ovtm5_mi = substr('00'. $emp_worktime_datas->sum('OVTM5_TIME_MI') % 60, -2);

                    $sum_ovtm6_hh= $emp_worktime_datas->sum('OVTM6_TIME_HH') +
                                floor($emp_worktime_datas->sum('OVTM6_TIME_MI') / 60);
                    $sum_ovtm6_mi = substr('00'. $emp_worktime_datas->sum('OVTM6_TIME_MI') % 60, -2);
                @endphp
                <tr class="record-sum">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>社員計</td>
                    <td>
                        @if ($emp_worktime_datas->whereNotNull('DEF_WORK_TIME_HH')->count())
                        {{ $sum_def_hh . ':' . $sum_def_mi }}
                        @endif
                    </td>
                    <td>
                        @if ($emp_worktime_datas->whereNotNull('HOL_WORK_TIME_HH')->count())
                        {{ $sum_hol_hh . ':' . $sum_hol_mi }}
                        @endif
                    </td>
                    <td>
                        @if ($emp_worktime_datas->whereNotNull('HOL_OUT_WORK_TIME_HH')->count())
                        {{ $sum_hol_out_hh . ':' . $sum_hol_out_mi }}
                        @endif
                    </td>
                    <td>
                        {{ $sum_tard_hh . ':' . $sum_tard_mi }}
                    </td>
                    <td>
                        {{ $sum_leave_hh . ':' . $sum_leave_mi }}
                    </td>
                    <td>
                        {{ $sum_out_hh . ':' . $sum_out_mi }}
                    </td>
                    <td>
                        {{ $sum_ovtm1_hh . ':' . $sum_ovtm1_mi }}
                    </td>
                    <td>
                        {{ $sum_ovtm2_hh . ':' . $sum_ovtm2_mi }}
                    </td>
                    <td>
                        {{ $sum_ovtm3_hh . ':' . $sum_ovtm3_mi }}
                    </td>
                    <td>
                        {{ $sum_ovtm4_hh . ':' . $sum_ovtm4_mi }}
                    </td>
                    <td>
                        {{ $sum_ovtm5_hh . ':' . $sum_ovtm5_mi }}
                    </td>
                    <td style="padding-right: 5px;">
                        {{ $sum_ovtm6_hh . ':' . $sum_ovtm6_mi }}
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
    @endforeach
    @endif
    @endisset
</html>