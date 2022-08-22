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
                margin: 35px 20px 15px 20px;
            }
            body {
                font-family: "MS Pゴシック";
                line-height: 9px;
                text-align: center;
                font-size: 9px;
            }
            .workTable {
                border-collapse: collapse;
                width: 100%;
            }
            .header {
                font-size:large;
            }
            .workTable tr th{
                height: 25px;
                border-bottom: 1px solid black;
                border-top: 1px solid black;
                border-left: none;
                border-right: none;
                text-align: right;
                font-size: 10px;
            }
            .workTable tr td{
                height: 23px;
                border-bottom: 1px black;
                border-top: 1px black;
                border-left: none;
                border-right: none;
                text-align: right;
                border-bottom-style: dotted;
            }
            tbody .reason-list td {
                padding-right: 5px;
            }
            tbody .reason-list-sum td {
                border-bottom: none;
                padding-right: 5px;
            }
            .record {
                padding-bottom: 10px;
                text-align: justify;
                font-size: xx-small;
                position: relative;
            }
            .footer-line {
                border-top: #000000 1px solid;
                border-right: #000000 0px solid;
                border-left: #000000 0px solid;
                border-bottom: #000000 0px solid;
                width: 1082px;
                left: 0px;
                position: fixed;
                bottom: 2px;
            }
        </style>
    </head>

    <!-- 事由/勤怠の対象データがない場合 -->
    <?php if(!isset($work_ptn_datas) && count($reason_datas) < 1 || !isset($reason_datas) && count($work_ptn_datas) < 1): ?>
    <body>
        <!-- ページ番号表示 -->
        <script type="text/php">
            if(isset($pdf)) {
                $x = 800;
                $y = 27;
                $text = "{PAGE_NUM} / {PAGE_COUNT}";
                $font = $fontMetrics->get_font("MS Pゴシック, メイリオ", "normal");
                $size = 6;
                $color = [0,0,0];
                $pdf->page_text($x, $y, $text, $font, $size, $color);
            }
        </script>
        <table class="workTable">
            <thead>
            
            <?php if($input_datas['ReportCategory'] == 'rbReason'): ?>
                <tr>
                    <td colspan="14" style="border: none; height:2px; text-align: right; padding-bottom:15px;">作表日：</td>
                    <td colspan="3" style="border: none; height:2px; text-align: left; padding-bottom:15px;">
                        <?php echo e($now_date); ?>

                    </td>
                </tr>
                <tr>
                    <td colspan="17" style="border: none; height: 7px; font-size: 25px; text-align: center;">
                        事由一覧表
                    </td>
                </tr>
                <tr>
                    <td style="border: none; height:4px; text-align:right;">対象日 : &nbsp;</td>
                    <td colspan="16" style="border: none; height:4px; text-align:left;">
                        <?php echo e(date('Y/m/d', strtotime($str_date))); ?>

                        (<?php echo e(config('consts.weeks')[date('w', strtotime($str_date))]); ?>) ～
                        <?php echo e(date('Y/m/d', strtotime($end_date))); ?>

                        (<?php echo e(config('consts.weeks')[date('w', strtotime($end_date))]); ?>)
                    </td>
                </tr>
                <tr>
                    <td style="border: none; height:4px; text-align:right; padding-bottom:9px;">部門 : &nbsp;</td>
                    <td colspan="16" style="border: none; height:4px; padding-bottom:9px;"></td>
                </tr>
                <tr>
                    <th style="width:60px; padding-left: 5px; text-align: left;">社員</th>
                    <th></th>
                    <th style="width:10px"></th>
                    <?php $__currentLoopData = $reason_names; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reason_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <th style="width:50px; padding-right: 5px;"><?php echo e($reason_name['REASON_NAME']); ?></th>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
            
            <?php else: ?>
                <tr>
                    <td colspan="9" style="border: none; height:2px; text-align: right; padding-bottom:15px;">作表日：</td>
                    <td colspan="2" style="border: none; height:2px; text-align: left; padding-bottom:15px;">
                        <?php echo e($now_date); ?>

                    </td>
                </tr>
                <tr>
                    <td colspan="11" style="border: none; height: 7px; font-size: 25px; text-align: center;">
                        勤怠一覧表
                    </td>
                </tr>
                <tr>
                    <td style="border: none; height:4px; text-align:right;">対象日 : &nbsp;</td>
                    <td colspan="10" style="border: none; height:4px; text-align:left;">
                        <?php echo e(date('Y/m/d', strtotime($str_date))); ?>

                        (<?php echo e(config('consts.weeks')[date('w', strtotime($str_date))]); ?>) ～
                        <?php echo e(date('Y/m/d', strtotime($end_date))); ?>

                        (<?php echo e(config('consts.weeks')[date('w', strtotime($end_date))]); ?>)
                    </td>
                </tr>
                <tr>
                    <td style="border: none; height:4px; text-align:right; padding-bottom:9px;">部門 : &nbsp;</td>
                    <td colspan="10" style="border: none; height:4px; padding-bottom:9px;"></td>
                </tr>
                <tr>
                    <th style="width: 50px; padding-left: 5px; text-align: left;">社員</th>
                    <th></th>
                    <th style="width: 10px"></th>
                    <th style="width: 85px;">出勤日数</th>
                    <th style="width: 85px;">休出日数</th>
                    <th style="width: 85px;">特休日数</th>
                    <th style="width: 85px;">有休日数</th>
                    <th style="width: 85px;">欠勤日数</th>
                    <th style="width: 85px;">代休日数</th>
                    <th style="width: 85px;">遅刻回数</th>
                    <th style="width: 85px; padding-right: 5px;">早退回数</th>
                </tr>
            <?php endif; ?>
            </thead>
            <tbody>
                <tr class="reason-list">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    
                    <?php if($input_datas['ReportCategory'] == 'rbReason'): ?>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <?php endif; ?>
                </tr>
                <tr class="reason-list-sum">
                    <td colspan="3">部門計</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    
                    <?php if($input_datas['ReportCategory'] == 'rbReason'): ?>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <?php endif; ?>
                </tr>
            </tbody>
        </table>
        <!-- フッター -->
        <footer class="footer-line">
        </footer>
    </body>
    <?php endif; ?>
    <!-- 帳票区分が"事由"の場合 -->
    <?php if(isset($reason_datas)): ?>
    <?php $__currentLoopData = $reason_datas->unique('DEPT_CD'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reason_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <body>
    <!-- 事由一覧表ページ番号表示 -->
        <script type="text/php">
            if(isset($pdf)) {
                $x = 800;
                $y = 27;
                $text = "{PAGE_NUM} / {PAGE_COUNT}";
                $font = $fontMetrics->get_font("MS Pゴシック, メイリオ", "normal");
                $size = 6;
                $color = [0,0,0];
                $pdf->page_text($x, $y, $text, $font, $size, $color);
            }
        </script>
        <table class="workTable">
            <thead>
                <tr>
                    <td colspan="14" style="border: none; height:2px; text-align: right; padding-bottom:15px;">作表日：</td>
                    <td colspan="3" style="border: none; height:2px; text-align: left; padding-bottom:15px;">
                        <?php echo e($now_date); ?>

                    </td>
                </tr>
                <tr>
                    <td colspan="17" style="border: none; height: 7px; font-size: 25px; text-align: center;">
                        事由一覧表
                    </td>
                </tr>
                <tr>
                    <td style="border: none; height:4px; text-align:right;">対象日 : &nbsp;</td>
                    <td colspan="16" style="border: none; height:4px; text-align:left;">
                        <?php echo e(date('Y/m/d', strtotime($str_date))); ?>

                        (<?php echo e(config('consts.weeks')[date('w', strtotime($str_date))]); ?>) ～
                        <?php echo e(date('Y/m/d', strtotime($end_date))); ?>

                        (<?php echo e(config('consts.weeks')[date('w', strtotime($end_date))]); ?>)
                    </td>
                </tr>
                <tr>
                    <td style="border: none; height:4px; text-align:right; padding-bottom:9px;">部門 : &nbsp;</td>
                    <td colspan="16" style="border: none; height:4px; text-align:left; padding-bottom:9px;">
                        <?php echo e($reason_data['DEPT_CD']); ?>&nbsp;&nbsp;
                        <?php echo e($reason_data['DEPT_NAME']); ?>

                    </td>
                </tr>
                <tr>
                    <th style="width: 50px; padding-left: 5px; text-align: left;">社員</th>
                    <th></th>
                    <th style="width: 10px"></th>
                    
                    <?php $__currentLoopData = $reason_names; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reason_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <th style="width: 50px; padding-right: 5px;"><?php echo e($reason_name['REASON_NAME']); ?></th>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
            </thead>
            <!-- 事由詳細データの表示 -->
            <?php if($input_datas['ReportCategory'] == 'rbReason'): ?>
            <tbody>
                <?php
                    $reason_list = $reason_datas->where('DEPT_CD', $reason_data['DEPT_CD'])->unique('EMP_CD');
                ?>
                <?php $__currentLoopData = $reason_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wt_reason_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="reason-list">
                    <td style="padding-left: 5px; text-align: left;"><?php echo e($wt_reason_data['EMP_CD']); ?></td>
                    <td style="text-align: left;"><?php echo e($wt_reason_data['EMP_NAME']); ?></td>
                    <td></td>
                    <td><?php echo e(($wt_reason_data['WORKD_COUNT'] == 0 ? '' : $wt_reason_data['WORKD_COUNT'])); ?></td>
                    <td><?php echo e(($wt_reason_data['PADH_COUNT'] == 0 ? '' : $wt_reason_data['PADH_COUNT'])); ?></td>
                    <td><?php echo e(($wt_reason_data['PADBH_COUNT'] == 0 ? '' : $wt_reason_data['PADBH_COUNT'])); ?></td>
                    <td><?php echo e(($wt_reason_data['PADAH_COUNT'] == 0 ? '' : $wt_reason_data['PADAH_COUNT'])); ?></td>
                    <td><?php echo e(($wt_reason_data['COMPD_COUNT'] == 0 ? '' : $wt_reason_data['COMPD_COUNT'])); ?></td>
                    <td><?php echo e(($wt_reason_data['COMPBD_COUNT'] == 0 ? '' : $wt_reason_data['COMPBD_COUNT'])); ?></td>
                    <td><?php echo e(($wt_reason_data['COMPAD_COUNT'] == 0 ? '' : $wt_reason_data['COMPAD_COUNT'])); ?></td>
                    <td><?php echo e(($wt_reason_data['SPCH_COUNT'] == 0 ? '' : $wt_reason_data['SPCH_COUNT'])); ?></td>
                    <td><?php echo e(($wt_reason_data['ABCD_COUNT'] == 0 ? '' : $wt_reason_data['ABCD_COUNT'])); ?></td>
                    <td><?php echo e(($wt_reason_data['DIRG_COUNT'] == 0 ? '' : $wt_reason_data['DIRG_COUNT'])); ?></td>
                    <td><?php echo e(($wt_reason_data['DIRR_COUNT'] == 0 ? '' : $wt_reason_data['DIRR_COUNT'])); ?></td>
                    <td><?php echo e(($wt_reason_data['DIRQR_COUNT'] == 0 ? '' : $wt_reason_data['DIRQR_COUNT'])); ?></td>
                    <td><?php echo e(($wt_reason_data['BUSJ_COUNT'] == 0 ? '' : $wt_reason_data['BUSJ_COUNT'])); ?></td>
                    <td><?php echo e(($wt_reason_data['DELAY_COUNT'] == 0 ? '' : $wt_reason_data['DELAY_COUNT'])); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <!-- 事由詳細データの集計 -->
                <tr class="reason-list-sum">
                    <td colspan="3" style="text-align: right;">部門計</td>
                    <td><?php echo e($reason_list->sum('WORKD_COUNT')); ?></td>
                    <td><?php echo e($reason_list->sum('PADH_COUNT')); ?></td>
                    <td><?php echo e($reason_list->sum('PADBH_COUNT')); ?></td>
                    <td><?php echo e($reason_list->sum('PADAH_COUNT')); ?></td>
                    <td><?php echo e($reason_list->sum('COMPD_COUNT')); ?></td>
                    <td><?php echo e($reason_list->sum('COMPBD_COUNT')); ?></td>
                    <td><?php echo e($reason_list->sum('COMPAD_COUNT')); ?></td>
                    <td><?php echo e($reason_list->sum('SPCH_COUNT')); ?></td>
                    <td><?php echo e($reason_list->sum('ABCD_COUNT')); ?></td>
                    <td><?php echo e($reason_list->sum('DIRG_COUNT')); ?></td>
                    <td><?php echo e($reason_list->sum('DIRR_COUNT')); ?></td>
                    <td><?php echo e($reason_list->sum('DIRQR_COUNT')); ?></td>
                    <td><?php echo e($reason_list->sum('BUSJ_COUNT')); ?></td>
                    <td><?php echo e($reason_list->sum('DELAY_COUNT')); ?></td>
                </tr>
            </tbody>
            <?php endif; ?>
        </table>
        <!-- フッター -->
        <footer class="footer-line">
        </footer>
    </body>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

    <!-- 帳票区分が"勤怠"の場合 -->
    <?php if(isset($work_ptn_datas)): ?>
    <?php $__currentLoopData = $work_ptn_datas->unique('DEPT_CD'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $work_ptn_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <body>
        <!-- 勤怠一覧表のページ番号表示 -->
        <script type="text/php">
            if(isset($pdf)) {
                $x = 800;
                $y = 27;
                $text = "{PAGE_NUM} / {PAGE_COUNT}";
                $font = $fontMetrics->get_font("MS Pゴシック, メイリオ", "normal");
                $size = 6;
                $color = [0,0,0];
                $pdf->page_text($x, $y, $text, $font, $size, $color);
            }
        </script>
        <table class="workTable">
            <thead>
                <tr>
                    <td colspan="9" style="border: none; height:2px; text-align: right; padding-bottom:15px;">作表日：</td>
                    <td colspan="2" style="border: none; height:2px; text-align: left; padding-bottom:15px;">
                        <?php echo e($now_date); ?>

                    </td>
                </tr>
                <tr>
                    <td colspan="11" style="border: none; height: 7px; font-size: 25px; text-align: center;">
                        勤怠一覧表
                    </td>
                </tr>
                <tr>
                    <td style="border: none; height:4px; text-align:right;">対象日 : &nbsp;</td>
                    <td colspan="10" style="border: none; height:4px; text-align:left;">
                        <?php echo e(date('Y/m/d', strtotime($str_date))); ?>

                        (<?php echo e(config('consts.weeks')[date('w', strtotime($str_date))]); ?>) ～
                        <?php echo e(date('Y/m/d', strtotime($end_date))); ?>

                        (<?php echo e(config('consts.weeks')[date('w', strtotime($end_date))]); ?>)
                    </td>
                </tr>
                <tr>
                    <td style="border: none; height:4px; text-align:right; padding-bottom:9px;">部門 : &nbsp;</td>
                    <td colspan="10" style="border: none; height:4px; text-align:left; padding-bottom:9px;">
                        <?php echo e($work_ptn_data['DEPT_CD']); ?>&nbsp;&nbsp;
                        <?php echo e($work_ptn_data['DEPT_NAME']); ?>

                    </td>
                </tr>
                <tr>
                    <th style="width: 60px; padding-left: 5px; text-align: left;">社員</th>
                    <th></th>
                    <th style="width: 10px"></th>
                    <th style="width: 85px">出勤日数</th>
                    <th style="width: 85px">休出日数</th>
                    <th style="width: 85px">特休日数</th>
                    <th style="width: 85px">有休日数</th>
                    <th style="width: 85px">欠勤日数</th>
                    <th style="width: 85px">代休日数</th>
                    <th style="width: 85px">遅刻回数</th>
                    <th style="width: 85px; padding-right: 5px;">早退回数</th>
                </tr>
            </thead>
            <tbody>
            <!-- 勤怠詳細データ表示 -->
                <?php
                $work_ptn_list = $work_ptn_datas->where('DEPT_CD', $work_ptn_data['DEPT_CD'])->unique('EMP_CD');
                ?>
                <?php $__currentLoopData = $work_ptn_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wt_ptn_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="reason-list">
                    <td style="padding-left: 5px; text-align: left;"><?php echo e($wt_ptn_data['EMP_CD']); ?></td>
                    <td style="text-align: left;"><?php echo e($wt_ptn_data['EMP_NAME']); ?></td>
                    <td></td>
                    <td><?php echo e(($wt_ptn_data['SUM_WORKDAY_CNT'] == 0 ? '' : $wt_ptn_data['SUM_WORKDAY_CNT'])); ?></td>
                    <td><?php echo e(($wt_ptn_data['SUM_HOLWORK_CNT'] == 0 ? '' : $wt_ptn_data['SUM_HOLWORK_CNT'])); ?></td>
                    <td><?php echo e(($wt_ptn_data['SUM_SPCHOL_CNT'] == 0 ? '' : $wt_ptn_data['SUM_SPCHOL_CNT'])); ?></td>
                    <td><?php echo e(($wt_ptn_data['SUM_PADHOL_CNT'] == 0 ? '' : $wt_ptn_data['SUM_PADHOL_CNT'])); ?></td>
                    <td><?php echo e(($wt_ptn_data['SUM_ABCWORK_CNT'] == 0 ? '' : $wt_ptn_data['SUM_ABCWORK_CNT'])); ?></td>
                    <td><?php echo e(($wt_ptn_data['SUM_COMPDAY_CNT'] == 0 ? '' : $wt_ptn_data['SUM_COMPDAY_CNT'])); ?></td>
                    <td><?php echo e(($wt_ptn_data['SUM_TARD_CNT'] == 0 ? '' : $wt_ptn_data['SUM_TARD_CNT'])); ?></td>
                    <td style="padding-right: 5px;">
                        <?php echo e(($wt_ptn_data['SUM_LEAVE_CNT'] == 0 ? '' : $wt_ptn_data['SUM_LEAVE_CNT'])); ?>

                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <!-- 勤怠詳細データ集計 -->
                <tr class="reason-list-sum">
                    <td colspan="3">部門計</td>
                    <td><?php echo e(number_format($work_ptn_list->sum('SUM_WORKDAY_CNT'), 1)); ?></td>
                    <td><?php echo e(number_format($work_ptn_list->sum('SUM_HOLWORK_CNT'), 1)); ?></td>
                    <td><?php echo e(number_format($work_ptn_list->sum('SUM_SPCHOL_CNT'), 1)); ?></td>
                    <td><?php echo e(number_format($work_ptn_list->sum('SUM_PADHOL_CNT'), 1)); ?></td>
                    <td><?php echo e(number_format($work_ptn_list->sum('SUM_ABCWORK_CNT'), 1)); ?></td>
                    <td><?php echo e(number_format($work_ptn_list->sum('SUM_COMPDAY_CNT'), 1)); ?></td>
                    <td><?php echo e($work_ptn_list->sum('SUM_TARD_CNT')); ?></td>
                    <td style="padding-right: 5px;"><?php echo e($work_ptn_list->sum('SUM_LEAVE_CNT')); ?></td>
                </tr>
            </tbody>
        </table>
        <!-- フッター -->
        <footer class="footer-line">
        </footer>
    </body>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</html><?php /**PATH C:\xampp\htdocs\06_SVN\resources\views/form_print/templates/ReasonWorkPtnPdf.blade.php ENDPATH**/ ?>