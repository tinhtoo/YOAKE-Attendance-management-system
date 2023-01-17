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
    <?php if(isset($wtPortrait2Datas)): ?>
    <!-- 該当データがない場合 -->
    <?php if(count($wtPortrait2Datas) < 1): ?>
    <body>
        <!-- ページ番号作成 -->
        <script type="text/php">
            if(isset($pdf)) {
                $x = 800;
                $y = 21;
                $text = "{PAGE_NUM} / {PAGE_COUNT}";
                $font = $fontMetrics->get_font("MS Pゴシック, メイリオ", "normal");
                $size = 6;
                $color = [0,0,0];
                $pdf->page_text($x, $y, $text, $font, $size, $color);
            }
        </script>
        <div class="date">
            <span style="margin-left:80px;">作表日：</span>
            <span style="margin-right:50px;"><?php echo e($now_date); ?></span>
        </div>
        <div style="font-size:large; margin-top:20px;">
            <span>勤務実績表(社員別月報)</span>
        </div>
        <div class="record">
            <span>対象月度</span>
            <span>:</span>
            <span>
                <?php echo e($year); ?>/<?php echo e($month); ?>

            </span>
            <span>月度</span>
        </div>
        <div class="record">
            <span style="margin-left:19px;">部門</span>
            <span>:</span>
        </div>
        <table class="workTable">
            <thead>
                <tr class="table-head-plane">
                    <th style="width: 20px; padding-left: 5px; text-align: left;">日付</th>
                    <th style="width: 70px; padding-left: 20px; text-align: left;">勤務体系</th>
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
                <tr class="record-data" style="width: 100%; height:20px;">
                    <td colspan="19"></td>
                </tr>
                <tr class="record-sum">
                    <td colspan="6"></td>
                    <td>社員計</td>
                    <td colspan="12"></td>
                </tr>
            </tbody>
        </table>
    </body>
    <?php else: ?>
    <!-- 該当データ有 -->
    <?php
        $emp_list = $wtPortrait2Datas->unique('EMP_CD');
        $dept_list = $emp_list->unique('DEPT_CD');
    ?>
    <!-- 部門リスト順で帳票出力 -->
    <?php $__currentLoopData = $dept_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
        <!-- 同じ部門の社員ごとで帳票出力 -->
        <?php
            $same_dept_emp_list = $wtPortrait2Datas->where('DEPT_CD', $dept->DEPT_CD)->unique('EMP_CD');
        ?>
        <?php $__currentLoopData = $same_dept_emp_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $wt_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <!-- 社員２人毎に設定し帳票のタイトル表示する -->
        <?php if(($loop->iteration) % 2 != 0): ?>
        <div class="date">
            <span style="margin-left:80px;">作表日：</span>
            <span style="margin-right:60px;"><?php echo e($now_date); ?></span>
        </div>
        <div style="font-size:large; margin-top:20px;">
            <span>勤務実績表(社員別月報)</span>
        </div>
        <div class="record">
            <span>対象月度</span>
            <span>:</span>
            <span>
                <?php echo e($year); ?>/<?php echo e(substr('00'. $month, -2)); ?>

            </span>
            <span>月度</span>
        </div>
        <div class="record">
            <span style="margin-left:19px;">部門</span>
            <span>:</span>
            <span><?php echo e($dept->DEPT_CD); ?></span>
            <span><?php echo e($dept->DEPT_NAME); ?></span>
        </div>
        <?php endif; ?>
        <table class="workTable" style="width: 100%;">
            <thead>
                <tr class="table-head1" style="width: 100%;">
                    <th colspan="6" style="padding-left: 5px; text-align: left;">
                    <?php echo e($wt_data->EMP_CD); ?>&nbsp;&nbsp;&nbsp;<?php echo e($wt_data->EMP_NAME); ?>

                    </th>
                    <th colspan="1" style="width: 30px;">出勤:<?php echo e($wt_data->SUM_WORKDAY_CNT); ?></th>
                    <th colspan="1" style="width: 30px;">有休:<?php echo e($wt_data->SUM_PADHOL_CNT); ?></th>
                    <th colspan="1" style="width: 30px;">代休:<?php echo e($wt_data->SUM_COMPDAY_CNT); ?></th>
                    <th colspan="1" style="width: 30px;">特休:<?php echo e($wt_data->SUM_SPCHOL_CNT); ?></th>
                    <th colspan="1" style="width: 30px;">休出:<?php echo e($wt_data->SUM_HOLWORK_CNT); ?></th>
                    <th colspan="1" style="width: 30px;">欠勤:<?php echo e($wt_data->SUM_ABCWORK_CNT); ?></th>
                    <th colspan="1" style="width: 30px;">遅刻:<?php echo e($wt_data->SUM_TARD_CNT); ?></th>
                    <th colspan="1" style="width: 30px;">早退:<?php echo e($wt_data->SUM_LEAVE_CNT); ?></th>
                    <th colspan="5"></th>
                </tr>
                <tr class="table-head2" style="width: 100%;">
                    <th style="width: 50px; padding-left: 5px; text-align: left;">日付</th>
                    <th style="width: 140px; text-align: left;">勤務体系</th>
                    <th style="width: 8px; text-align: right;">事由</th>
                    <th style="width: 35px;">出勤</th>
                    <th style="width: 35px;">退出</th>
                    <th style="width: 35px;">外出1</th>
                    <th style="width: 35px;">再入1</th>
                    <th style="width: 50px;">出勤時間</th>
                    <th style="width: 50px;">休日出勤</th>
                    <th style="width: 50px;">休外出勤</th>
                    <th style="width: 50px;">遅刻時間</th>
                    <th style="width: 50px;">早退時間</th>
                    <th style="width: 50px;">外出時間</th>
                    <th style="width: 50px;">
                        <?php echo e(mb_substr($wt_data->WORK_DESC_NAME_100, 0, 4)); ?>

                    </th>
                    <th style="width: 50px;">
                        <?php echo e(mb_substr($wt_data->WORK_DESC_NAME_101, 0, 4)); ?>

                    </th>
                    <th style="width: 50px;">
                        <?php echo e(mb_substr($wt_data->WORK_DESC_NAME_102, 0, 4)); ?>

                    </th>
                    <th style="width: 50px;">
                        <?php echo e(mb_substr($wt_data->WORK_DESC_NAME_103, 0, 4)); ?>

                    </th>
                    <th style="width: 50px;">
                        <?php echo e(mb_substr($wt_data->WORK_DESC_NAME_104, 0, 4)); ?>

                    </th>
                    <th style="width: 50px; padding-right: 5px;">
                        <?php echo e(mb_substr($wt_data->WORK_DESC_NAME_105, 0, 4)); ?>

                    </th>
                </tr>
            </thead>
            <!-- 社員詳細データ -->
            <?php
                $emp_worktime_list = $wtPortrait2Datas->where('DEPT_CD', $wt_data->DEPT_CD)
                                                      ->where('EMP_CD', $wt_data->EMP_CD);
            ?>
            <?php $__currentLoopData = $emp_worktime_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $w_time): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $def_wt_hh = $w_time->DEF_WORK_TIME_HH == null ? '' : $w_time->DEF_WORK_TIME_HH;
                $def_wt_mi = $w_time->DEF_WORK_TIME_MI == null ? '' : substr('00' . $w_time->DEF_WORK_TIME_MI, -2);
                $hol_wt_hh = $w_time->HOL_WORK_TIME_HH == null ? '' : $w_time->HOL_WORK_TIME_HH;
                $hol_wt_mi = $w_time->HOL_WORK_TIME_MI == null ? '' : substr('00' . $w_time->HOL_WORK_TIME_MI, -2);
                $hol_out_wt_hh = $w_time->HOL_OUT_WORK_TIME_HH == null ? '' : $w_time->HOL_OUT_WORK_TIME_HH;
                $hol_out_wt_mi = $w_time->HOL_OUT_WORK_TIME_MI == null ? '' :
                                 substr('00' . $w_time->HOL_OUT_WORK_TIME_MI, -2);

                $def_work_time = $def_wt_hh . ':' . $def_wt_mi; // 出勤時間
                $hol_work_time = $hol_wt_hh . ':' . $hol_wt_mi; // 休日出勤
                $hol_out_work_time = $hol_out_wt_hh . ':' . $hol_out_wt_mi; // 休外出勤
            ?>
            <tbody>
                <tr style="width: 100%;">
                    <td style="width:20px; padding-left: 5px; text-align: left;">
                    <?php echo e(date('m/d', strtotime($w_time->CALD_DATE))); ?>

                    (<?php echo e(config('consts.weeks')[date('w', strtotime($w_time->CALD_DATE))]); ?>)
                    </td>
                    <td style="width:110px; text-align: left;"><?php echo e($w_time->WORKPTN_NAME); ?></td>
                    <td style="width:25px; text-align: right;"><?php echo e($w_time->REASON_NAME); ?></td>
                    <td><?php echo e($w_time->OFC_TIME); ?></td>
                    <td><?php echo e($w_time->LEV_TIME); ?></td>
                    <td><?php echo e($w_time->OUT1_TIME); ?></td>
                    <td><?php echo e($w_time->IN1_TIME); ?></td>
                    <td>
                        <?php echo e(($def_wt_hh || $def_wt_mi) ? $def_work_time : ''); ?>

                    </td>
                    <td>
                        <?php echo e(($hol_wt_hh || $hol_wt_mi) ? $hol_work_time : ''); ?>

                    </td>
                    <td>
                        <?php echo e(($hol_out_wt_hh || $hol_out_wt_mi) ? $hol_out_work_time : ''); ?>

                    </td>
                    <td>
                        <?php echo e($w_time->TARD_TIME_HH . ':' . substr('00'.$w_time->TARD_TIME_MI, -2)); ?>

                    </td>
                    <td>
                        <?php echo e($w_time->LEAVE_TIME_HH . ':' . substr('00'.$w_time->LEAVE_TIME_MI, -2)); ?>

                    </td>
                    <td>
                        <?php echo e($w_time->OUT_TIME_HH . ':' . substr('00'.$w_time->OUT_TIME_MI, -2)); ?>

                    </td>
                    <td>
                        <?php echo e($w_time->OVTM1_TIME_HH . ':' . substr('00'.$w_time->OVTM1_TIME_MI, -2)); ?>

                    </td>
                    <td>
                        <?php echo e($w_time->OVTM2_TIME_HH . ':' . substr('00'.$w_time->OVTM2_TIME_MI, -2)); ?>

                    </td>
                    <td>
                        <?php echo e($w_time->OVTM3_TIME_HH . ':' . substr('00'.$w_time->OVTM3_TIME_MI, -2)); ?>

                    </td>
                    <td>
                        <?php echo e($w_time->OVTM4_TIME_HH . ':' . substr('00'.$w_time->OVTM4_TIME_MI, -2)); ?>

                    </td>
                    <td>
                        <?php echo e($w_time->OVTM5_TIME_HH . ':' . substr('00'.$w_time->OVTM5_TIME_MI, -2)); ?>

                    </td>
                    <td style="padding-right: 5px;">
                        <?php echo e($w_time->OVTM6_TIME_HH . ':' . substr('00'.$w_time->OVTM6_TIME_MI, -2)); ?>

                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <!-- 社員詳細データの集計 -->
                <?php
                    $sum_def_hh = $emp_worktime_list->sum('DEF_WORK_TIME_HH') + 
                                  floor($emp_worktime_list->sum('DEF_WORK_TIME_MI') / 60);
                    $sum_def_mi = substr('00'. $emp_worktime_list->sum('DEF_WORK_TIME_MI') % 60, -2);
                    $sum_hol_hh = $emp_worktime_list->sum('HOL_WORK_TIME_HH') +
                                  floor($emp_worktime_list->sum('HOL_WORK_TIME_MI') / 60);
                    $sum_hol_mi = substr('00'. $emp_worktime_list->sum('HOL_WORK_TIME_MI') % 60, -2);
                    $sum_hol_out_hh = $emp_worktime_list->sum('HOL_OUT_WORK_TIME_HH') +
                                      floor($emp_worktime_list->sum('HOL_OUT_WORK_TIME_MI') / 60);
                    $sum_hol_out_mi = substr('00'. $emp_worktime_list->sum('HOL_OUT_WORK_TIME_MI') % 60, -2);
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
                    $sum_ovtm5_hh = $emp_worktime_list->sum('OVTM5_TIME_HH') +
                                    floor($emp_worktime_list->sum('OVTM5_TIME_MI') / 60);
                    $sum_ovtm5_mi = substr('00'. $emp_worktime_list->sum('OVTM5_TIME_MI') % 60, -2);
                    $sum_ovtm6_hh= $emp_worktime_list->sum('OVTM6_TIME_HH') +
                                   floor($emp_worktime_list->sum('OVTM6_TIME_MI') / 60);
                    $sum_ovtm6_mi = substr('00'. $emp_worktime_list->sum('OVTM6_TIME_MI') % 60, -2);
                ?>
                <tr class="record-sum">
                    <td colspan="6"></td>
                    <td>社員計</td>
                    <td>
                        <?php if($emp_worktime_list->whereNotNull('DEF_WORK_TIME_HH')->count()): ?>
                        <?php echo e($sum_def_hh . ':' . $sum_def_mi); ?>

                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if($emp_worktime_list->whereNotNull('HOL_WORK_TIME_HH')->count()): ?>
                        <?php echo e($sum_hol_hh . ':' . $sum_hol_mi); ?>

                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if($emp_worktime_list->whereNotNull('HOL_OUT_WORK_TIME_HH')->count()): ?>
                        <?php echo e($sum_hol_out_hh . ':' . $sum_hol_out_mi); ?>

                        <?php endif; ?>
                    </td>
                    <td>
                        <?php echo e($sum_tard_hh . ':' . $sum_tard_mi); ?>

                    </td>
                    <td>
                        <?php echo e($sum_leave_hh . ':' . $sum_leave_mi); ?>

                    </td>
                    <td>
                        <?php echo e($sum_out_hh . ':' . $sum_out_mi); ?>

                    </td>
                    <td>
                        <?php echo e($sum_ovtm1_hh . ':' . $sum_ovtm1_mi); ?>

                    </td>
                    <td>
                        <?php echo e($sum_ovtm2_hh . ':' . $sum_ovtm2_mi); ?>

                    </td>
                    <td>
                        <?php echo e($sum_ovtm3_hh . ':' . $sum_ovtm3_mi); ?>

                    </td>
                    <td>
                        <?php echo e($sum_ovtm4_hh . ':' . $sum_ovtm4_mi); ?>

                    </td>
                    <td>
                        <?php echo e($sum_ovtm5_hh . ':' . $sum_ovtm5_mi); ?>

                    </td>
                    <td style="padding-right: 5px;">
                        <?php echo e($sum_ovtm6_hh . ':' . $sum_ovtm6_mi); ?>

                    </td>
                </tr>
            </tbody>
        </table>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </body>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <?php endif; ?>
</html><?php /**PATH C:\xampp\htdocs\06_SVN\resources\views/form_print/templates/WorktimePortrait2Pdf.blade.php ENDPATH**/ ?>