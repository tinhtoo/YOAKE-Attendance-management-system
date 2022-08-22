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
                src: url("<?php echo e(public_path('fonts/migmix-2p-regular.ttf')); ?>") format('truetype');
            }
            @page  {
                margin: 25px 23px 0px 23px;
            }
            body {
                font-family: "MS Pゴシック";
                text-align: center;
                font-size: 9px;
                line-height: 10px;
            }
            .workTable {
                border-collapse: collapse;
                width: 100%;
            }
            .workTable tr th{
                height:48px;
                border-bottom: 2px solid black;
                border-top: 2px solid black;
                border-left: none;
                border-right: none;
                text-align: right;
                font-weight: unset;
            }
            .workTable tr td{
                height:44px;
                border-bottom: 1px black;
                border-top: 1px black;
                border-left: none;
                border-right: none;
                text-align: right;
                border-bottom-style: dotted;
            }
            .page-number:after {
                content: counter(page);
            }
            tbody .record-sum td{
                border-bottom: none;
            }
            .line {
                border-top: #000000 1px solid;
                border-right: #000000 0px solid;
                border-left: #000000 0px solid;
                border-bottom: #000000 0px solid;
                width: 1075px;
                left: 0px;
                padding-bottom: 17px;
                position: fixed;
                bottom: 5px;
            }
        </style>
    </head>
    <?php if(isset($dailyReportDatas)): ?>
    <!-- 該当データがない場合 -->
    <?php if(count($dailyReportDatas) < 1): ?>
    <body>
        <script type="text/php">
            if(isset($pdf)) {
                $font = $fontMetrics->get_font("MS Pゴシック, メイリオ", "normal");
                $pdf->page_text(790, 20, "{PAGE_NUM} / {PAGE_COUNT}", $font, 6, [0,0,0]);
            }
        </script>
        <table class="workTable" style="width: 100%;">
            <thead>
                <tr>
                    <th colspan="11" style="border: none; height: 2px; text-align: right;">作表日：</th>
                    <th style="width: 100px; border: none; height: 2px; text-align: left;">
                        <?php echo e(date('Y/m/d', strtotime($now_date))); ?>

                    </th>
                </tr>
                <tr>
                    <th colspan="13" style="border: none; height:6px; font-size:large; text-align: center;">
                        勤務実績表(日報)
                    </th>
                </tr>
                <tr>
                    <th style="border: none; height:4px; text-align:right;">対象日 : </th>
                    <th colspan="12" style="border: none; height:4px; text-align:left;">
                    </th>
                </tr>
                <tr>
                    <th style="border: none; height:4px; text-align:right; padding-bottom:9px;">部門 : </th>
                    <th colspan="12" style="border: none; height:4px; text-align:left; padding-bottom:9px;">
                    </th>
                </tr>
                <tr style="width: 100%;">
                    <th style="padding-left: 5px; text-align: left;">社員<br>&nbsp;&nbsp;</th>
                    <th style="width:140px; text-align: left;"></th>
                    <th style="width:140px; text-align: left;">勤務体系<br>事由</th>
                    <th style="width:40px;">出勤<br>退出</th>
                    <th style="width:40px;">外出１<br>再入１</th>
                    <th style="width:40px;">外出２<br>再入２</th>
                    <th style="width:60px;">出勤時間<br>遅刻時間</th>
                    <th style="width:60px;">早退時間<br>外出時間</th>
                    <th style="width:110px;"></th>
                    <th style="width:110px;"></th>
                    <th style="width:110px;"></th>
                    <th style="width:110px;"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php for($i = 0; $i <= 11; $i++): ?>
                    <td></td>
                    <?php endfor; ?>
                    <td style="height:30px;"></td>
                </tr>
                <tr>
                    <?php for($i = 0; $i <= 4; $i++): ?>
                    <td style="border-bottom: none;"></td>
                    <?php endfor; ?>
                    <td style="border-bottom: none;">部門計</td>
                    <?php for($i = 0; $i <= 4; $i++): ?>
                    <td style="border-bottom: none;"></td>
                    <?php endfor; ?>
                    <td style="border-bottom: none; height:30px;"></td>
                </tr>
            </tbody>
        </table>
        <!-- フッター -->
        <footer class="line">
        </footer>
    </body>
    <?php else: ?>
    <!-- 該当データ有 -->
    <!-- 日付ごとでグループ化 -->
    <?php $__currentLoopData = $dailyReportDatas->groupBy('CALD_DATE_FOR_GROUP'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report_date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <!-- 同じ日付の部門ごとで表示 -->
        <?php
            $same_date_dept_list = $report_date->unique('DEPT_CD');
        ?>
        <?php $__currentLoopData = $same_date_dept_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <body>
            <!-- ページ番号表示 -->
            <script type="text/php">
                if(isset($pdf)) {
                    $font = $fontMetrics->get_font("MS Pゴシック, メイリオ", "normal");
                    $pdf->page_text(780, 20, "{PAGE_NUM} / {PAGE_COUNT}", $font, 6, [0,0,0]);
                }
            </script>
            <table class="workTable">
                <thead>
                    <tr>
                        <th colspan="11" style="border: none; height:2px; text-align: right;">作表日：</th>
                        <th style="border: none; height:2px; text-align: left;">
                            <?php echo e(date('Y/m/d', strtotime($now_date))); ?>

                        </th>
                    </tr>
                    <tr>
                        <th colspan="13" style="border: none; height:6px; font-size:large; text-align: center;">
                            勤務実績表(日報)
                        </th>
                    </tr>
                    <tr>
                        <th style="border: none; height:4px; text-align:right;">対象日 : </th>
                        <th colspan="12" style="border: none; height:4px; text-align:left;">
                            <?php echo e(date('Y/m/d', strtotime($dept->CALD_DATE))); ?>

                            (<?php echo e(config('consts.weeks')[date('w', strtotime($dept->CALD_DATE))]); ?>)
                        </th>
                    </tr>
                    <tr>
                        <th style="border: none; height:4px; text-align:right; padding-bottom:9px;">部門 : </th>
                        <th colspan="12" style="border: none; height:4px; text-align:left; padding-bottom:9px;">
                            <?php echo e($dept->DEPT_CD); ?>&nbsp;&nbsp;&nbsp;<?php echo e($dept->DEPT_NAME); ?>

                        </th>
                    </tr>
                    <tr style="width: 100%;">
                        <th style="padding-left: 5px; text-align: left;">社員<br>&nbsp;&nbsp;</th>
                        <th style=""></th>
                        <th style="width: 140px; text-align: left;">勤務体系<br>事由</th>
                        <th style="width: 50px;">出勤<br>退出</th>
                        <th style="width: 50px;">外出１<br>再入１</th>
                        <th style="width: 50px;">外出２<br>再入２</th>
                        <th style="width: 75px;">出勤時間<br>遅刻時間</th>
                        <th style="width: 75px;">早退時間<br>外出時間</th>
                        <th style="width: 75px;">
                            <?php echo e($dept->WORK_DESC_NAME_100); ?><br>
                            <?php echo e($dept->WORK_DESC_NAME_101); ?>

                        </th>
                        <th style="width: 75px;">
                            <?php echo e($dept->WORK_DESC_NAME_102); ?><br>
                            <?php echo e($dept->WORK_DESC_NAME_103); ?>

                        </th>
                        <th style="width: 75px;">
                            <?php echo e($dept->WORK_DESC_NAME_104); ?><br>&nbsp;&nbsp;
                            <?php echo e($dept->WORK_DESC_NAME_105); ?>

                        </th>
                        <th style="width: 75px;">
                            <?php echo e($dept->WORK_DESC_NAME_200); ?><br>&nbsp;&nbsp;
                            <?php echo e($dept->WORK_DESC_NAME_201); ?>

                        </th>
                        <th style="width: 75px; padding-right: 5px;">
                            <?php echo e($dept->WORK_DESC_NAME_202); ?><br>&nbsp;&nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <!-- 社員詳細データ -->
                    <?php
                        $emp_worktime_list = $dailyReportDatas->where('DEPT_CD', $dept->DEPT_CD)
                                                            ->where('CALD_DATE', $dept->CALD_DATE);
                    ?>
                    <?php $__currentLoopData = $emp_worktime_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $emp_wt_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr style="width: 100%;">
                        <td style="padding-left: 5px; text-align: left;">
                            <?php echo e($emp_wt_data->EMP_CD); ?><br>&nbsp;&nbsp;
                        </td>
                        <td style="text-align: left;">
                            <?php echo e($emp_wt_data->EMP_NAME); ?><br>&nbsp;&nbsp;
                        </td>
                        <td style="text-align: left;">
                            <?php echo e($emp_wt_data->WORKPTN_NAME); ?><br><?php echo e($emp_wt_data->REASON_NAME); ?>

                        </td>
                        <td>
                            <?php echo e($emp_wt_data->OFC_TIME); ?><br>&nbsp;&nbsp;<?php echo e($emp_wt_data->LEV_TIME); ?>

                        </td>
                        <td>
                            <?php echo e($emp_wt_data->OUT1_TIME); ?><br>&nbsp;&nbsp;<?php echo e($emp_wt_data->IN1_TIME); ?>

                        </td>
                        <td>
                            <?php echo e($emp_wt_data->OUT2_TIME); ?><br>&nbsp;&nbsp;<?php echo e($emp_wt_data->IN2_TIME); ?>

                        </td>
                        <td>
                            <?php echo e($emp_wt_data->WORK_TIME_HH . ':' . substr('00' . $emp_wt_data->WORK_TIME_MI, -2)); ?>

                        <br>
                            <?php echo e($emp_wt_data->TARD_TIME_HH . ':' . substr('00' . $emp_wt_data->TARD_TIME_MI, -2)); ?>

                        </td>
                        <td>
                            <?php echo e($emp_wt_data->LEAVE_TIME_HH . ':' . substr('00' . $emp_wt_data->LEAVE_TIME_MI, -2)); ?>

                        <br>
                            <?php echo e($emp_wt_data->OUT_TIME_HH . ':' . substr('00' . $emp_wt_data->OUT_TIME_MI, -2)); ?>

                        </td>
                        <td>
                            <?php echo e($emp_wt_data->OVTM1_TIME_HH . ':' . substr('00' . $emp_wt_data->OVTM1_TIME_MI, -2)); ?>

                        <br>
                            <?php echo e($emp_wt_data->OVTM2_TIME_HH . ':' . substr('00' . $emp_wt_data->OVTM2_TIME_MI, -2)); ?>

                        </td>
                        <td>
                            <?php echo e($emp_wt_data->OVTM3_TIME_HH . ':' . substr('00' . $emp_wt_data->OVTM3_TIME_MI, -2)); ?>

                        <br>
                            <?php echo e($emp_wt_data->OVTM4_TIME_HH . ':' . substr('00' . $emp_wt_data->OVTM4_TIME_MI, -2)); ?>

                        </td>
                        <td>
                            <?php echo e($emp_wt_data->OVTM5_TIME_HH . ':' . substr('00' . $emp_wt_data->OVTM5_TIME_MI, -2)); ?>

                        <br>
                            <?php echo e($emp_wt_data->OVTM6_TIME_HH . ':' . substr('00' . $emp_wt_data->OVTM6_TIME_MI, -2)); ?>

                        </td>
                        <td>
                            <?php echo e($emp_wt_data->EXT1_TIME_HH . ':' . substr('00' . $emp_wt_data->EXT1_TIME_MI, -2)); ?>

                        <br>
                            <?php echo e($emp_wt_data->EXT2_TIME_HH . ':' . substr('00' . $emp_wt_data->EXT2_TIME_MI, -2)); ?>

                        </td>
                        <td style="padding-right: 5px;">
                            <?php echo e($emp_wt_data->EXT3_TIME_HH . ':' . substr('00' . $emp_wt_data->EXT3_TIME_MI, -2)); ?>

                        <br>&nbsp;&nbsp;
                        </td>
                    </tr>   
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <!-- 社員詳細データの集計 -->
                    <?php
                    $wk_hh = $emp_worktime_list->sum('WORK_TIME_HH') + 
                            floor($emp_worktime_list->sum('WORK_TIME_MI') / 60);
                    $wk_mi = substr('00'. $emp_worktime_list->sum('WORK_TIME_MI') % 60, -2);

                    $tard_hh = $emp_worktime_list->sum('TARD_TIME_HH') + 
                               floor($emp_worktime_list->sum('TARD_TIME_MI') / 60);
                    $tard_mi = substr('00'. $emp_worktime_list->sum('TARD_TIME_MI') % 60, -2);
                    
                    $leave_hh = $emp_worktime_list->sum('LEAVE_TIME_HH') + 
                                floor($emp_worktime_list->sum('LEAVE_TIME_MI') / 60);
                    $leave_mi = substr('00'. $emp_worktime_list->sum('LEAVE_TIME_MI') % 60, -2);

                    $out_hh = $emp_worktime_list->sum('OUT_TIME_HH') + 
                                floor($emp_worktime_list->sum('OUT_TIME_MI') / 60);
                    $out_mi = substr('00'. $emp_worktime_list->sum('OUT_TIME_MI') % 60, -2);

                    $ovtm1_hh = $emp_worktime_list->sum('OVTM1_TIME_HH') + 
                                floor($emp_worktime_list->sum('OVTM1_TIME_MI') / 60);
                    $ovtm1_mi = substr('00'. $emp_worktime_list->sum('OVTM1_TIME_MI') % 60, -2);

                    $ovtm2_hh = $emp_worktime_list->sum('OVTM2_TIME_HH') + 
                                    floor($emp_worktime_list->sum('OVTM2_TIME_MI') / 60);
                    $ovtm2_mi = substr('00'. $emp_worktime_list->sum('OVTM2_TIME_MI') % 60, -2);

                    $ovtm3_hh = $emp_worktime_list->sum('OVTM3_TIME_HH') + 
                                floor($emp_worktime_list->sum('OVTM3_TIME_MI') / 60);
                    $ovtm3_mi = substr('00'. $emp_worktime_list->sum('OVTM3_TIME_MI') % 60, -2);

                    $ovtm4_hh = $emp_worktime_list->sum('OVTM4_TIME_HH') + 
                                floor($emp_worktime_list->sum('OVTM4_TIME_MI') / 60);
                    $ovtm4_mi = substr('00'. $emp_worktime_list->sum('OVTM4_TIME_MI') % 60, -2);

                    $ovtm5_hh = $emp_worktime_list->sum('OVTM5_TIME_HH') + 
                                floor($emp_worktime_list->sum('OVTM5_TIME_MI') / 60);
                    $ovtm5_mi = substr('00'. $emp_worktime_list->sum('OVTM5_TIME_MI') % 60, -2);

                    $ovtm6_hh = $emp_worktime_list->sum('OVTM6_TIME_HH') + 
                                    floor($emp_worktime_list->sum('OVTM6_TIME_MI') / 60);
                    $ovtm6_mi = substr('00'. $emp_worktime_list->sum('OVTM6_TIME_MI') % 60, -2);


                    $ext1_hh = $emp_worktime_list->sum('EXT1_TIME_HH') + 
                                floor($emp_worktime_list->sum('EXT1_TIME_MI') / 60);
                    $ext1_mi = substr('00'. $emp_worktime_list->sum('EXT1_TIME_MI') % 60, -2);

                    $ext2_hh = $emp_worktime_list->sum('EXT2_TIME_HH') + 
                                floor($emp_worktime_list->sum('EXT2_TIME_MI') / 60);
                    $ext2_mi = substr('00'. $emp_worktime_list->sum('EXT2_TIME_MI') % 60, -2);

                    $ext3_hh = $emp_worktime_list->sum('EXT3_TIME_HH') + 
                                floor($emp_worktime_list->sum('EXT3_TIME_MI') / 60);
                    $ext3_mi = substr('00'. $emp_worktime_list->sum('EXT3_TIME_MI') % 60, -2);

                    $sum_work_time = $wk_hh . ':' . $wk_mi;
                    $sum_tard_time = $tard_hh . ':' . $tard_mi;
                    $sum_leave_time = $leave_hh . ':' . $leave_mi;
                    $sum_out_time = $out_hh . ':' . $out_mi;
                    $sum_ovtm1_time = $ovtm1_hh . ':' . $ovtm1_mi;
                    $sum_ovtm2_time = $ovtm2_hh . ':' . $ovtm2_mi;
                    $sum_ovtm3_time = $ovtm3_hh . ':' . $ovtm3_mi;
                    $sum_ovtm4_time = $ovtm4_hh . ':' . $ovtm4_mi;
                    $sum_ovtm5_time = $ovtm5_hh . ':' . $ovtm5_mi;
                    $sum_ovtm6_time = $ovtm6_hh . ':' . $ovtm6_mi;
                    $sum_ext1_time = $ext1_hh . ':' . $ext1_mi;
                    $sum_ext2_time = $ext2_hh . ':' . $ext2_mi;
                    $sum_ext3_time = $ext3_hh . ':' . $ext3_mi;
                    ?>
                    <tr class="record-sum">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>部門計</td>
                        <td><?php echo e($sum_work_time); ?><br>&nbsp;<?php echo e($sum_tard_time); ?></td>
                        <td><?php echo e($sum_leave_time); ?><br>&nbsp;<?php echo e($sum_out_time); ?></td>
                        <td><?php echo e($sum_ovtm1_time); ?><br>&nbsp;<?php echo e($sum_ovtm2_time); ?></td>
                        <td><?php echo e($sum_ovtm3_time); ?><br>&nbsp;<?php echo e($sum_ovtm4_time); ?></td>
                        <td><?php echo e($sum_ovtm5_time); ?><br>&nbsp;<?php echo e($sum_ovtm6_time); ?></td>
                        <td><?php echo e($sum_ext1_time); ?><br>&nbsp;<?php echo e($sum_ext2_time); ?></td>
                        <td style="padding-right: 5px;"><?php echo e($sum_ext3_time); ?><br>&nbsp;</td>
                    </tr>
                </tbody>
            </table>
            <!-- フッター -->
            <footer class="line">
            </footer>
        </body>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <?php endif; ?>
</html><?php /**PATH C:\xampp\htdocs\06_SVN\resources\views/form_print/templates/WorkTimeDailyPdf.blade.php ENDPATH**/ ?>