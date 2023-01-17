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
                src: url("<?php echo e(public_path('fonts/migmix-2p-regular.ttf')); ?>") format('truetype');
            }
            @page  {
                margin: 23px 16px 2px 16px;
            }
            body {
                font-family: "MS Pゴシック";
                line-height: 50%;
                text-align: center;
                font-size: 9px;
                padding-top: 0px;
                margin:1px;
            }
            table tbody .sum-data td {
                border-top: 2px;
                text-align: center;
            }
            .workTable {
                border-collapse: collapse;
                width: 100%;
            }
            .workTable tr th {
                height: 17px;
                border: 1px solid black;
                font-weight: unset;
                text-align: center;
            }
            .workTable tr td {
                height: 16px;
                border: 1px solid black;
                text-align: right;
            }
            .row1 td {
                background-color: lightgray;
            }
            .bg-color {
                background-color: lightgray;
            }
            .date {
                position: relative;
                margin-left:70%;
                font-size: xx-small;
            }
            .record {
                width: 100%;
                padding-bottom: 5px;
                text-align:justify;
                font-size: xx-small;
                position: relative;
            }
            .footerTable {
                border-collapse: collapse;
                width: 100%;
                padding-top: 3px;
            }
            .footerTable .footer tr th {
                height: 17px;
                border: 1px solid black;
                font-weight: unset;
                text-align: center;
                width: 60px;
            }
            .footerTable .footer tr td {
                height: 30px;
                border: 1px solid black;
                text-align: center;
            }
        </style>
    </head>
    <?php if(isset($wtLandscape3Datas)): ?>
    <!-- 対象データがない場合 -->
    <?php if(count($wtLandscape3Datas) < 1): ?>
    <body>
        <!-- ページ番号作成 -->
        <script type="text/php">
            if(isset($pdf)) {
                $x = 800;
                $y = 13;
                $text = "{PAGE_NUM} / {PAGE_COUNT}";
                $font = $fontMetrics->get_font("MS Pゴシック, メイリオ", "normal");
                $size = 6;
                $color = [0,0,0];
                $pdf->page_text($x, $y, $text, $font, $size, $color);
            }
        </script>
        <div class="date">
            <span style="margin-left:10px; margin-top:0px; padding-top:0px;">作表日：</span>
            <span style="margin-right:50px;"><?php echo e(date('Y/m/d', strtotime($now_date))); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
        </div>
        <div style="font-size:large; margin-top:0px; padding-top:0px;">
            <span>勤務実績表(社員別月報)</span>
        </div>
        <div class="record">
            <?php if($input_datas['OutputCls'] == 'rbDateRange'): ?>
            <span style="margin-left:10px;">対象日</span>
            <span>:</span>
            <span><?php echo e(date('Y/m/d', strtotime($str_date))); ?></span>
            <span>～</span>
            <span><?php echo e(date('Y/m/d', strtotime($end_date))); ?></span><br>
            <?php else: ?>
            <span>対象月度</span>
            <span>:</span>
            <span>
                <?php echo e($year); ?>/<?php echo e($month); ?>

            </span>
            <span>月度</span>
            <?php endif; ?> 
        </div>
        <div class="record">
            <span style="margin-left:20px;">社員</span>
            <span>:</span>
            <span style="margin-left:260px; padding-left: 120px;">部門</span>
            <span>:</span>
            <span style="margin-left:0px; padding-left: 170px;">所属先</span>
            <span>:</span>
        </div>
        <table class="workTable">
            <thead>
                <tr>
                    <th style="width: 50px;">日付</th>
                    <th style="width: 20px;">休</th>
                    <th style="width: 150px;">勤務体系</th>
                    <th style="width: 34px;">届け</th>
                    <th style="width: 34px;">出勤</th>
                    <th style="width: 34px;">退出</th>
                    <th style="width: 34px;">遅早残</th>
                    <th style="width: 34px;">外出１</th>
                    <th style="width: 34px;">再入１</th>
                    <th style="width: 34px;">実働</th>
                    <th style="width: 34px;">所定</th>
                    <th style="width: 34px;">深割</th>
                    <th style="width: 34px;">普残</th>
                    <th style="width: 34px;">深残</th>
                    <th style="width: 34px;">法休</th>
                    <th style="width: 34px;">法深残</th>
                    <th style="width: 34px;">休出</th>
                    <th style="width: 34px;">休残</th>
                    <th style="width: 34px;">休深残</th>
                    <th style="width: 34px;">遅早</th>
                    <th style="width: 34px;">外出</th>
                    <th>備考</th>
                </tr>
            </thead>
            <tbody>
            <?php for($j = 1; $j < 31; $j++): ?>
                <tr class="row<?php echo e($j); ?>">
                    <?php for($i = 0; $i <= 21; $i++): ?>
                    <td></td>
                    <?php endfor; ?>
                </tr>
            <?php endfor; ?>
                <tr class="sum-data">
                    <td style="border-left: 1px;">合計</td>
                    <?php for($i = 0; $i <= 19; $i++): ?>
                    <td></td>
                    <?php endfor; ?>
                    <td style="border-right: 1px; text-align: left;"></td>
                </tr>
            </tbody>
        </table>
        <table class="footerTable">
            <tbody class="footer">
                <tr>
                    <th>出勤日数</th>
                    <th>所定時間</th>
                    <th>欠勤日数</th>
                    <th>有休日数</th>
                    <th>特休日数</th>
                    <th>深夜割増日数</th>
                    <th>深夜割増</th>
                    <th>普通残業</th>
                    <th>深夜残業</th>
                    <th>法休</th>
                    <th>法休深夜</th>
                    <th>休日出勤</th>
                    <th>休日残業</th>
                    <th>休日深夜</th>
                    <th>遅早</th>
                    <th>外出</th>
                </tr>
                <tr>
                    <?php for($i = 0; $i <= 15; $i++): ?>
                    <td></td>
                    <?php endfor; ?>
                </tr>
            </tbody>
        </table>
    </body>
    <?php else: ?>

    <!-- 社員コード毎で帳票出力 -->
    <?php $__currentLoopData = $wtLandscape3Datas->unique('EMP_CD'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reportData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
        $sunday_hh = 0;
        $sunday_mi = 0;
        $sunday_mi_d60 = 0;
        $sum_ext1_day = 0;
    ?>
    <body>
        <!-- ページ番号作成 -->
        <script type="text/php">
            if(isset($pdf)) {
                $x = 800;
                $y = 13;
                $text = "{PAGE_NUM} / {PAGE_COUNT}";
                $font = $fontMetrics->get_font("MS Pゴシック, メイリオ", "normal");
                $size = 6;
                $color = [0,0,0];
                $pdf->page_text($x, $y, $text, $font, $size, $color);
            }
        </script>
        <div class="date">
            <span style="margin-left:80px; margin-top:0px; padding-top:0px;">作表日：</span>
            <span><?php echo e(date('Y/m/d', strtotime($now_date))); ?></span>
        </div>
        <div style="font-size:large; margin-top:0px; padding-top:0px;">
            <span>勤務実績表(社員別月報)</span>
        </div>
        <div class="record">
            <?php if($input_datas['OutputCls'] == 'rbDateRange'): ?>
            <span style="margin-left:10px;">対象日</span>
            <span>:</span>
            <span><?php echo e(date('Y/m/d', strtotime($str_date))); ?></span>
            <span>～</span>
            <span><?php echo e(date('Y/m/d', strtotime($end_date))); ?></span><br>
            <?php else: ?>
            <span>対象月度</span>
            <span>:</span>
            <span>
                <?php echo e($year); ?>/<?php echo e($month); ?>

            </span>
            <span>月度</span>
            <?php endif; ?>
            
        </div>
        <div class="record">
            <span style="margin-left:20px;">社員</span>
            <span>:</span>
            <span style="margin-left:5px;"><?php echo e($reportData['EMP_CD']); ?></span>
            <span style="margin-left:30px;"><?php echo e($reportData['EMP_NAME']); ?></span>
            <?php if($reportData['EMP2_CD']): ?>
            <span style="margin-left:20px;">(<?php echo e($reportData['EMP2_CD']); ?>)</span>
            <?php endif; ?>
            <span style="margin-left:80px; padding-left: 110px;">部門</span>
            <span>:</span>
            <span style="margin-left:5px;"><?php echo e($reportData['DEPT_CD']); ?></span>
            <span style="margin-left:5px;"><?php echo e($reportData['DEPT_NAME']); ?></span>
            <span style="margin-left:120px; padding-left: 20px;">所属先</span>
            <span>:</span>
            <span style="margin-left:5px;"><?php echo e($reportData['COMPANY_CD']); ?></span>
            <span style="margin-left:5px;"><?php echo e($reportData['COMPANY_NAME']); ?></span>
        </div>
        <table class="workTable">
            <thead>
                <tr>
                    <th style="width: 50px;">日付</th>
                    <th style="width: 20px;">休</th>
                    <th style="width: 150px;">勤務体系</th>
                    <th style="width: 34px;">届け</th>
                    <th style="width: 34px;">出勤</th>
                    <th style="width: 34px;">退出</th>
                    <th style="width: 34px;">遅早残</th>
                    <th style="width: 34px;">外出１</th>
                    <th style="width: 34px;">再入１</th>
                    <th style="width: 34px;">実働</th>
                    <th style="width: 34px;">所定</th>
                    <th style="width: 34px;">深割</th>
                    <th style="width: 34px;">普残</th>
                    <th style="width: 34px;">深残</th>
                    <th style="width: 34px;">法休</th>
                    <th style="width: 34px;">法深残</th>
                    <th style="width: 34px;">休出</th>
                    <th style="width: 34px;">休残</th>
                    <th style="width: 34px;">休深残</th>
                    <th style="width: 34px;">遅早</th>
                    <th style="width: 34px;">外出</th>
                    <th>備考</th>
                </tr>
            </thead>
            <!-- 同じ部門の社員データ -->
            <?php
                $emp_wt_list = $wtLandscape3Datas->where('DEPT_CD', $reportData['DEPT_CD'])
                                                      ->where('EMP_CD', $reportData['EMP_CD'])
                                                      ->values();
            ?>
            <tbody>
            <?php $__currentLoopData = $emp_wt_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $wt_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $back_color = '';

                // (祝祭日・会社休日情報.祝祭日・会社休日)と土曜、日曜の場合用背景色の設定
                if ($wt_data['HOLDAY_MARK']) {
                    $back_color = 'bg-color';
                } else {
                    $back_color = 'color';
                }
            ?>
            <!-- 社員詳細のデータ -->
            <?php
                $total_time = $wt_data['TOTAL_WORK_TIME_HH'] . ':' .
                            substr('00'. $wt_data['TOTAL_WORK_TIME_MI'], -2);
                $def_time = $wt_data['DEF_WORK_TIME_HH'] . ':' .
                            substr('00'. $wt_data['DEF_WORK_TIME_MI'], -2);
                $ext1_time = $wt_data['EXT1_TIME_HH'] . ':' .
                            substr('00'. $wt_data['EXT1_TIME_MI'], -2);
                $normal_time = $wt_data['NORMAL_OVTM_TIME_HH'] . ':' .
                            substr('00'. $wt_data['NORMAL_OVTM_TIME_MI'], -2);
                $late_night_ovtm_time = $wt_data['LATE_NIGHT_OVTM_TIME_HH'] . ':' .
                                        substr('00'. $wt_data['LATE_NIGHT_OVTM_TIME_MI'], -2);
                $hol_in_time = $wt_data['HOL_IN_WORK_TIME_HH'] . ':' .
                            substr('00'. $wt_data['HOL_IN_WORK_TIME_MI'], -2);
                $hol_in_ovtm_time = $wt_data['HOL_IN_OVTM_TIME_HH'] . ':' .
                                    substr('00'. $wt_data['HOL_IN_OVTM_TIME_MI'], -2);
                $hol_out_time = $wt_data['HOL_OUT_WORK_TIME_HH'] . ':' .
                                substr('00'. $wt_data['HOL_OUT_WORK_TIME_MI'], -2);
                $hol_out_ovtm_time = $wt_data['HOL_OUT_OVTM_TIME_HH'] . ':' .
                                    substr('00'. $wt_data['HOL_OUT_OVTM_TIME_MI'], -2);
                $hol_out_late_night_ovtm_time = $wt_data['HOL_OUT_LATE_NIGHT_OVTM_TIME_HH'] . ':' .
                                                substr('00'.$wt_data['HOL_OUT_LATE_NIGHT_OVTM_TIME_MI'], -2);
                $tard_leave_time = $wt_data['TARD_LEAVE_TIME_HH'] . ':' .
                                substr('00'. $wt_data['TARD_LEAVE_TIME_MI'], -2);
                $out_time = $wt_data['OUT_TIME_HH'] . ':' .
                            substr('00'. $wt_data['OUT_TIME_MI'], -2);
            ?>
                <tr>
                    <td class="<?php echo e($back_color); ?>" style="padding-left: 4px; text-align: center;">
                        <?php echo e(date('n/d', strtotime($wt_data['CALD_DATE']))); ?>

                        (<?php echo e(config('consts.weeks')[date('w', strtotime($wt_data['CALD_DATE']))]); ?>)
                    </td> <!-- 日付 -->
                    <td class="<?php echo e($back_color); ?>" style="text-align: center;">
                        <?php echo e($wt_data['HOLDAY_MARK']); ?>

                    </td> <!-- 休 -->
                    <td class="<?php echo e($back_color); ?>" style="text-align: left;">
                        <?php echo e($wt_data['WORKPTN_NAME']); ?>

                    </td> <!-- 勤務体系 -->
                    <td class="<?php echo e($back_color); ?>" style="text-align: center;"><?php echo e($wt_data['REASON_NAME']); ?>

                    </td> <!-- 届け -->
                    <td class="<?php echo e($back_color); ?>">
                        <?php echo e($wt_data['OFC_TIME'] == '0:00' ? '' : $wt_data['OFC_TIME']); ?>

                    </td> <!-- 出勤 -->
                    <td class="<?php echo e($back_color); ?>" style="text-align: left;">
                        <?php echo e($wt_data['LEV_TIME'] == '0:00' ? '' : $wt_data['LEV_TIME']); ?>

                    </td> <!-- 退出 -->
                    <td class="<?php echo e($back_color); ?>" style="text-align: left;">
                        <?php echo e($wt_data['TLO_MARK']); ?>

                    </td> <!--　遅早残 -->
                    <td class="<?php echo e($back_color); ?>">
                        <?php echo e($wt_data['OUT1_TIME'] == '0:00' ? '' : $wt_data['OUT1_TIME']); ?>

                    </td> <!--　外出１ -->
                    <td class="<?php echo e($back_color); ?>">
                        <?php echo e($wt_data['IN1_TIME'] == '0:00' ? '' : $wt_data['IN1_TIME']); ?>

                    </td> <!--　再入１ -->
                    <td class="<?php echo e($back_color); ?>">
                        <?php echo e($total_time == '0:00' ? '' : $total_time); ?>

                    </td> <!-- 実働 -->
                    <td class="<?php echo e($back_color); ?>">
                        <?php echo e($def_time == '0:00' ? '' : $def_time); ?>

                    </td> <!-- 所定 -->
                    <td class="<?php echo e($back_color); ?>">
                        <?php echo e($ext1_time == '0:00' ? '' : $ext1_time); ?>

                    </td> <!-- 深割 -->
                    <td class="<?php echo e($back_color); ?>">
                        <?php echo e($normal_time == '0:00' ? '' : $normal_time); ?>

                    </td> <!-- 普残 -->
                    <td class="<?php echo e($back_color); ?>">
                        <?php echo e($late_night_ovtm_time == '0:00' ? '' : $late_night_ovtm_time); ?>

                    </td> <!-- 深残 -->
                    <td class="<?php echo e($back_color); ?>">
                        <?php echo e($hol_in_time == '0:00' ? '' : $hol_in_time); ?>

                    </td> <!-- 法休 -->
                    <td class="<?php echo e($back_color); ?>">
                        <?php echo e($hol_in_ovtm_time == '0:00' ? '' : $hol_in_ovtm_time); ?>

                    </td> <!-- 法深残 -->
                    <td class="<?php echo e($back_color); ?>">
                        <?php echo e($hol_out_time == '0:00' ? '' : $hol_out_time); ?>

                    </td> <!-- 休出 -->
                    <td class="<?php echo e($back_color); ?>">
                        <?php echo e($hol_out_ovtm_time == '0:00' ? '' : $hol_out_ovtm_time); ?>

                    </td> <!-- 休残 -->
                    <td class="<?php echo e($back_color); ?>">
                        <?php echo e($hol_out_late_night_ovtm_time == '0:00' ? '' : $hol_out_late_night_ovtm_time); ?>

                    </td> <!-- 休深残 -->
                    <td class="<?php echo e($back_color); ?>">
                        <?php echo e($tard_leave_time == '0:00' ? '' : $tard_leave_time); ?>

                    </td> <!-- 遅早 -->
                    <td class="<?php echo e($back_color); ?>">
                        <?php echo e($out_time == '0:00' ? '' : $out_time); ?>

                    </td> <!-- 外出 -->
                    <td class="<?php echo e($back_color); ?>" style="text-align: left;">
                        <?php echo e($wt_data['REMARK']); ?>

                    </td> <!-- 備考 -->
                </tr>
                <?php
                    if (config('consts.weeks')[date('w', strtotime($wt_data['CALD_DATE']))] == '日') {
                        $sunday_hh += $wt_data['TOTAL_WORK_TIME_HH'];
                        $sunday_mi += $wt_data['TOTAL_WORK_TIME_MI'];
                        $sunday_mi_d60 += $wt_data['TOTAL_WORK_TIME_MI']/60;
                    }

                    if ($wt_data['EXT1_TIME_HH'] !== '0' && $wt_data['EXT1_TIME_MI'] !== '0') {
                        $ext1_day = 1;
                        $sum_ext1_day += $ext1_day;
                    }
                ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <!-- 該当データの日付数が31日以下の場合空テーブル作成 -->
                <?php for($i; $i < 30; $i++): ?>
                    <tr>
                        <?php for($j = 0; $j <= 21; $j++): ?>
                        <td></td>
                        <?php endfor; ?>
                    </tr>
                <?php endfor; ?>
            <!-- 社員詳細データの集計 -->
            <?php

            $total_hh = $emp_wt_list->sum('TOTAL_WORK_TIME_HH') + 
                        floor($emp_wt_list->sum('TOTAL_WORK_TIME_MI') / 60);
            $total_mi = substr('00'. $emp_wt_list->sum('TOTAL_WORK_TIME_MI') % 60, -2);

            $def_hh = $emp_wt_list->sum('DEF_WORK_TIME_HH') + 
                      floor($emp_wt_list->sum('DEF_WORK_TIME_MI') / 60);
            $def_mi = substr('00'. $emp_wt_list->sum('DEF_WORK_TIME_MI') % 60, -2);

            $ext1_hh = $emp_wt_list->sum('EXT1_TIME_HH') + 
                        floor($emp_wt_list->sum('EXT1_TIME_MI') / 60);
            $ext1_mi = substr('00'. $emp_wt_list->sum('EXT1_TIME_MI') % 60, -2);

            $normal_hh = $emp_wt_list->sum('NORMAL_OVTM_TIME_HH') + 
                           floor($emp_wt_list->sum('NORMAL_OVTM_TIME_MI') / 60);
            $normal_mi = substr('00'. $emp_wt_list->sum('NORMAL_OVTM_TIME_MI') % 60, -2);

            $late_night_hh = $emp_wt_list->sum('LATE_NIGHT_OVTM_TIME_HH') + 
                               floor($emp_wt_list->sum('LATE_NIGHT_OVTM_TIME_MI') / 60);
            $late_night_mi = substr('00'. $emp_wt_list->sum('LATE_NIGHT_OVTM_TIME_MI') % 60, -2);

            $hol_in_hh = $emp_wt_list->sum('HOL_IN_WORK_TIME_HH') + 
                           floor($emp_wt_list->sum('HOL_IN_WORK_TIME_MI') / 60);
            $hol_in_mi = substr('00'. $emp_wt_list->sum('HOL_IN_WORK_TIME_MI') % 60, -2);

            $hol_in_ovtm_hh = $emp_wt_list->sum('HOL_IN_OVTM_TIME_HH') + 
                               floor($emp_wt_list->sum('HOL_IN_OVTM_TIME_MI') / 60);
            $hol_in_ovtm_mi = substr('00'. $emp_wt_list->sum('HOL_IN_OVTM_TIME_MI') % 60, -2);

            $hol_out_hh = $emp_wt_list->sum('HOL_OUT_WORK_TIME_HH') + 
                          floor($emp_wt_list->sum('HOL_OUT_WORK_TIME_MI') / 60);
            $hol_out_mi = substr('00'. $emp_wt_list->sum('HOL_OUT_WORK_TIME_MI') % 60, -2);

            $hol_out_ovtm_hh = $emp_wt_list->sum('HOL_OUT_OVTM_TIME_HH') + 
                               floor($emp_wt_list->sum('HOL_OUT_OVTM_TIME_MI') / 60);
            $hol_out_ovtm_mi = substr('00'. $emp_wt_list->sum('HOL_OUT_OVTM_TIME_MI') % 60, -2);

            $hol_out_late_night_ovtm_hh = $emp_wt_list->sum('HOL_OUT_LATE_NIGHT_OVTM_TIME_HH') + 
                                          floor($emp_wt_list->sum('HOL_OUT_LATE_NIGHT_OVTM_TIME_MI') / 60);
            $hol_out_late_night_ovtm_mi = substr('00'. $emp_wt_list->sum('HOL_OUT_LATE_NIGHT_OVTM_TIME_MI') % 60, -2);

            $tard_leave_time_hh = $emp_wt_list->sum('TARD_LEAVE_TIME_HH') + 
                                  floor($emp_wt_list->sum('TARD_LEAVE_TIME_MI') / 60);
            $tard_leave_time_mi = substr('00'. $emp_wt_list->sum('TARD_LEAVE_TIME_MI') % 60, -2);
            
            $out_time_hh = $emp_wt_list->sum('OUT_TIME_HH') + 
                           floor($emp_wt_list->sum('OUT_TIME_MI') / 60);
            $out_time_mi = substr('00'. $emp_wt_list->sum('OUT_TIME_MI') % 60, -2);

            $total_sunday_hh = floor($sunday_hh + $sunday_mi_d60);
            $total_sunday_mi = substr('00'. ($sunday_mi) % 60, -2);

            $sum_total = $total_hh . ':' . $total_mi;
            $sum_def = $def_hh . ':' . $def_mi;

            $sum_ext1 = $ext1_hh . ':' . $ext1_mi;

            $sum_normal = $normal_hh . ':' . $normal_mi;

            $sum_late_night_ovtm = $late_night_hh . ':' . $late_night_mi;

            $sum_hol_in = $hol_in_hh . ':' .$hol_in_mi;

            $sum_hol_in_ovtm = $hol_in_ovtm_hh . ':' . $hol_in_ovtm_mi;

            $sum_hol_out = $hol_out_hh . ':' . $hol_out_mi;

            $sum_hol_out_ovtm = $hol_out_ovtm_hh . ':' . $hol_out_ovtm_mi;

            $sum_hol_out_late_night_ovtm = $hol_out_late_night_ovtm_hh . ':' . $hol_out_late_night_ovtm_mi;

            $sum_tard_leave_time = $tard_leave_time_hh . ':' . $tard_leave_time_mi;

            $sum_out_time = $out_time_hh . ':' . $out_time_mi;

            $sum_total_sunday = $total_sunday_hh . ':' . $total_sunday_mi;
            ?>
                <tr class="sum-data">
                    <td>合計</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><?php echo e($sum_total == '0:00' ? '' : $sum_total); ?></td> <!-- 実働計 -->
                    <td><?php echo e($sum_def == '0:00' ? '' : $sum_def); ?></td> <!-- 出勤計 -->
                    <td><?php echo e($sum_ext1 == '0:00' ? '' : $sum_ext1); ?></td> <!-- 深割計 -->
                    <td><?php echo e($sum_normal == '0:00' ? '' : $sum_normal); ?></td> <!-- 普残計 -->
                    <td><?php echo e($sum_late_night_ovtm == '0:00' ? '' : $sum_late_night_ovtm); ?></td> <!-- 深残計 -->
                    <td><?php echo e($sum_hol_in == '0:00' ? '' : $sum_hol_in); ?></td> <!-- 法休計 -->
                    <td><?php echo e($sum_hol_in_ovtm == '0:00' ? '' : $sum_hol_in_ovtm); ?></td> <!-- 法深残計 -->
                    <td><?php echo e($sum_hol_out == '0:00' ? '' : $sum_hol_out); ?></td> <!-- 休出計 -->
                    <td><?php echo e($sum_hol_out_ovtm == '0:00' ? '' : $sum_hol_out_ovtm); ?></td> <!-- 休残計 -->
                    <td>
                        <?php echo e($sum_hol_out_late_night_ovtm == '0:00' ? '' : $sum_hol_out_late_night_ovtm); ?>

                    </td><!-- 休深計 -->
                    <td><?php echo e($sum_tard_leave_time == '0:00' ? '' : $sum_tard_leave_time); ?></td> <!-- 遅早計 -->
                    <td><?php echo e($sum_out_time == '0:00' ? '' : $sum_out_time); ?></td> <!-- 外出計 -->
                    <td style="text-align: left;">日曜 : <?php echo e($sum_total_sunday); ?></td> <!-- 日曜出勤時間 -->
                </tr>
            </tbody>
        </table>
        <table class="footerTable">
            <tbody class="footer">
                <tr>
                    <th>出勤日数</th>
                    <th>所定時間</th>
                    <th>欠勤日数</th>
                    <th>有休日数</th>
                    <th>特休日数</th>
                    <th>深夜割増日数</th>
                    <th>深夜割増</th>
                    <th>普通残業</th>
                    <th>深夜残業</th>
                    <th>法休</th>
                    <th>法休深夜</th>
                    <th>休日出勤</th>
                    <th>休日残業</th>
                    <th>休日深夜</th>
                    <th>遅早</th>
                    <th>外出</th>
                </tr>
                <tr>
                    <td>
                        <?php echo e($wt_data['SUM_WORKDAY_CNT'] == '0.0' ? '' : $wt_data['SUM_WORKDAY_CNT']); ?>

                    </td><!-- 出勤日数 -->
                    <td>
                        <?php echo e($sum_def == '0:00' ? '' : $sum_def); ?>

                    </td><!-- 所定時間 -->
                    <td>
                        <?php echo e($wt_data['SUM_ABCWORK_CNT'] == '0.0' ? '' : $wt_data['SUM_ABCWORK_CNT']); ?>

                    </td><!-- 欠勤日数 -->
                    <td>
                        <?php echo e($wt_data['SUM_PADHOL_CNT'] == '0.0' ? '' : $wt_data['SUM_PADHOL_CNT']); ?>

                    </td><!-- 有休日数 -->
                    <td>
                        <?php echo e($wt_data['SUM_SPCHOL_CNT'] == '0.0' ? '' : $wt_data['SUM_SPCHOL_CNT']); ?>

                    </td><!-- 特休日数 -->
                    <td>
                        <?php echo e($sum_ext1_day == '0' ? '' : $sum_ext1_day); ?>

                    </td><!-- 深夜割増日数 -->
                    <td>
                        <?php echo e($sum_ext1 == '0:00' ? '' : $sum_ext1); ?>

                    </td><!-- 深夜割増 -->
                    <td>
                        <?php echo e($sum_normal == '0:00' ? '' : $sum_normal); ?>

                    </td><!-- 普通残業 -->
                    <td>
                        <?php echo e($sum_late_night_ovtm == '0:00' ? '' : $sum_late_night_ovtm); ?>

                    </td><!-- 深夜残業 -->
                    <td>
                        <?php echo e($sum_hol_in == '0:00' ? '' : $sum_hol_in); ?>

                    </td><!-- 法休 -->
                    <td>
                        <?php echo e($sum_hol_in_ovtm == '0:00' ? '' : $sum_hol_in_ovtm); ?>

                    </td><!-- 法休深夜 -->
                    <td>
                        <?php echo e($sum_hol_out == '0:00' ? '' : $sum_hol_out); ?>

                    </td><!-- 休日出勤 -->
                    <td>
                        <?php echo e($sum_hol_out_ovtm == '0:00' ? '' : $sum_hol_out_ovtm); ?>

                    </td><!-- 休日残業 -->
                    <td>
                        <?php echo e($sum_hol_out_late_night_ovtm == '0:00' ? '' : $sum_hol_out_late_night_ovtm); ?>

                    </td><!-- 休日深夜 -->
                    <td>
                        <?php echo e($sum_tard_leave_time == '0:00' ? '' : $sum_tard_leave_time); ?>

                    </td><!-- 遅早 -->
                    <td>
                        <?php echo e($sum_out_time == '0:00' ? '' : $sum_out_time); ?>

                    </td><!-- 外出 -->
                </tr>
            </tbody>
        </table>
    </body>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <?php endif; ?>
</html><?php /**PATH C:\xampp\htdocs\06_SVN\resources\views/form_print/templates/WorktimeLandscape3Pdf.blade.php ENDPATH**/ ?>