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
                margin: 25px 15px 9px 15px;
            }
            body {
                font-family: "MS Pゴシック";
                line-height: 8px;
                text-align: center;
                font-size: 9px;
            }
            .workTable {
                border-collapse: collapse;
                width: 100%;
            }
            .workTable tr th{
                height: 20px;
                width: 30px;
                border-top: 1px solid black;
                border-bottom: 1px solid black;
                border-right: 1px dotted black;
                text-align: center;
                font-weight: unset;
            }
            .workTable tr td{
                height: 19px;
                width: 15px;
                border: 1px black;
                text-align: center;
                border-style: dotted;
            }
            tbody .last-record td{
                border-bottom: 1px solid black;
                border-bottom-style: solid;
            }
            tbody .worktime-sum{
                text-align: left;
                border-top: none;
                border-right: 1px solid black;
                border-left: none;
                border-bottom: none;
            }
            tbody .wt-desc-name {
                text-align: left;
                border-top: none;
                border-right: none;
                border-left: none;
                border-bottom: 1px solid black;
            }
            tbody .last-worktime-sum {
                border-top: none;
                border-right: 1px solid black;
                border-left: none;
                border-bottom: 1px solid black;
                text-align: left;
            }
            .date {
                position: relative;
                margin-left:70%;
                font-size: xx-small;
            }
            .record {
                padding-bottom: 5px;
                text-align:justify;
                font-size: xx-small;
                position: relative;
            }
            .date .page-number:after { 
                content: counter(page);
            }
        </style>
    </head>
    <!-- 該当データがない場合 -->
    <?php if(isset($wtLandscapeKey)): ?>
    <?php if(count($wtLandscapeKey) < 1): ?>
    <body>
        <!-- ページ番号表示 -->
        <script type="text/php">
            if(isset($pdf)) {
                $x = 1130;
                $y = 18;
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
                    <td colspan="33" style="border: none; height: 2px; text-align: right; padding-bottom: 10px;">
                        作表日：
                    </td>
                    <td colspan="3" style="border: none; height: 2px; text-align: left; padding-bottom: 10px;">
                        <?php echo e(date('Y/m/d', strtotime($now_date))); ?>

                    </td>
                </tr>
                <tr>
                    <td colspan="36" style="border: none; height: 7px; font-size: 25px; text-align: center;">
                        勤務実績表(社員別月報)
                    </td>
                </tr>
                <tr>
                    <td style="border: none; height:4px; text-align:right;">対象月度 : &nbsp;</td>
                    <td colspan="34" style="border: none; height:4px; text-align:left;">
                        <?php echo e($year); ?>/<?php echo e(substr('00'. $month, -2)); ?>&nbsp;&nbsp;月度
                    </td>
                </tr>
                <tr>
                    <td style="border: none; height:4px; text-align:right; padding-bottom: 3px;">部門 : &nbsp;</td>
                    <td colspan="33" style="border: none; height:4px; text-align:left; padding-bottom: 3px;">
                    </td>
                </tr>
                <tr>
                    <th style="width:65px; border-left: 1px solid black; text-align: left;">社員</th>
                    <th></th>
                    <?php $__currentLoopData = $period; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <th>
                        <?php echo e((int)$day->format('d')); ?>

                    </th>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php for($i; $i < 30; $i++): ?>
                    <th></th>
                    <?php endfor; ?>
                    <th style="border-right: none; width: 70px;"></th>
                    <th style="border-right: none;"></th>
                    <th style="border-right: 1px solid black; width: 60px;"></th>
                </tr>
            </thead>
            <tbody>
                <tr class="last-record">
                    <td style="border-left: 1px solid black; border-top: none;"></td>
                    <?php for($i = 0; $i <= 31; $i++): ?>
                    <td></td>
                    <?php endfor; ?>
                    <td style="border-right: none; border-top: none;"></td>
                    <td class="wt-desc-name"></td>
                    <td class="last-worktime-sum"></td>
                </tr>
            </tbody>
        </table>
    </body>
    <?php else: ?>
    <!-- 該当データが有る場合 -->
    <!-- 部門リスト順で帳票の表示 -->
    <?php $__currentLoopData = $wtLandscapeKey->unique('DEPT_CD'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reportData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <body>
        <!-- ページ番号表示 -->
        <script type="text/php">
            if(isset($pdf)) {
                $x = 1130;
                $y = 18;
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
                    <td colspan="33" style="border: none; height: 2px; text-align: right; padding-bottom: 10px;">
                        作表日：
                    </td>
                    <td colspan="3" style="border: none; height: 2px; text-align: left; padding-bottom: 10px;">
                        <?php echo e(date('Y/m/d', strtotime($now_date))); ?>

                    </td>
                </tr>
                <tr>
                    <td colspan="36" style="border: none; height: 7px; font-size: 25px; text-align: center;">
                        勤務実績表(社員別月報)
                    </td>
                </tr>
                <tr>
                    <td style="border: none; height:4px; text-align:right;">対象月度 : &nbsp;</td>
                    <td colspan="34" style="border: none; height:4px; text-align:left;">
                        <?php echo e($year); ?>/<?php echo e(substr('00'. $month, -2)); ?>&nbsp;&nbsp;月度
                    </td>
                </tr>
                <tr>
                    <td style="border: none; height:4px; text-align:right; padding-bottom: 3px;">部門 : &nbsp;</td>
                    <td colspan="33" style="border: none; height:4px; text-align:left; padding-bottom: 3px;">
                        <?php echo e($reportData['DEPT_CD']); ?>&nbsp;&nbsp;
                        <?php echo e($reportData['DEPT_NAME']); ?>

                    </td>
                </tr>
                <tr>
                    <th style="width:65px; border-left: 1px solid black; text-align: left;">社員</th>
                    <th></th>
                    <?php $__currentLoopData = $period; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <th>
                        <?php echo e((int)$day->format('d')); ?>

                    </th>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php for($i; $i < 30; $i++): ?>
                    <th></th>
                    <?php endfor; ?>
                    <th style="border-right: none; width: 70px;"></th>
                    <th style="border-right: none;"></th>
                    <th style="border-right: 1px solid black; width: 60px;"></th>
                </tr>
            </thead>
            <tbody>
                <!-- 同じ部門の社員詳細データ表示 -->
                <?php
                $emp_worktime_list = $wtLandscapeKey->where('DEPT_CD', $reportData['DEPT_CD'])->unique('EMP_CD');
                ?>
                <?php $__currentLoopData = $emp_worktime_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wt_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td style="border-left: 1px solid black; border-top: none; border-bottom: none; text-align: left;">
                        <?php echo e($wt_data['EMP_CD']); ?>

                    </td>
                    <td>出勤</td>
                    <?php $__currentLoopData = $wt_data['time_records']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $record_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <td><?php echo e($record_data['OFC_TIME']); ?></td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php for($i; $i < 30; $i++): ?>
                    <td></td>
                    <?php endfor; ?>
                    <td style="border: none; text-align: left;">
                        出勤&nbsp; : &nbsp;<?php echo e($record_data['SUM_WORKDAY_CNT']); ?>

                    </td>
                    <td style="border: none; text-align: left; width: 20px;">
                        <?php echo e($record_data['WORK_DESC_NAME_100']); ?>

                    </td>
                    <td class="worktime-sum">
                        : &nbsp;<?php echo e($record_data['SUM_OVTM1_TIME']); ?>

                    </td>
                </tr>
                <tr>
                    <td style="border-left: 1px solid black; border-top: none; border-bottom: none; text-align: left;">
                        <?php echo e($wt_data['EMP_NAME']); ?>

                    </td>
                    <td>退出</td>
                    <?php $__currentLoopData = $wt_data['time_records']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $record_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <td><?php echo e($record_data['LEV_TIME']); ?></td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php for($i; $i < 30; $i++): ?>
                    <td></td>
                    <?php endfor; ?>
                    <td style="border: none; text-align: left;">
                        有休&nbsp; : &nbsp;<?php echo e($record_data['SUM_PADHOL_CNT']); ?>&nbsp;&nbsp;&nbsp;
                    </td>
                    <td style="border: none; text-align: left; width: 20px;">
                        <?php echo e($record_data['WORK_DESC_NAME_101']); ?>

                    </td>
                    <td class="worktime-sum">
                        : &nbsp;<?php echo e($record_data['SUM_OVTM2_TIME']); ?>

                    </td>
                </tr>
                <tr>
                    <td style="border-left: 1px solid black; border-top: none; border-bottom: none;"></td>
                    <td>遅刻</td>
                    <?php $__currentLoopData = $wt_data['time_records']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $record_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <td><?php echo e($record_data['TARD_TIME']); ?></td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php for($i; $i < 30; $i++): ?>
                    <td></td>
                    <?php endfor; ?>
                    <td style="border: none; text-align: left;">
                        代休&nbsp; : &nbsp;<?php echo e($record_data['SUM_COMPDAY_CNT']); ?>&nbsp;&nbsp;&nbsp;
                    </td>
                    <td style="border: none; text-align: left; width: 20px;">
                        <?php echo e($record_data['WORK_DESC_NAME_102']); ?>

                    </td>
                    <td class="worktime-sum">
                        : &nbsp;<?php echo e($record_data['SUM_OVTM3_TIME']); ?>

                    </td>
                </tr>
                <tr>
                    <td style="border-left: 1px solid black; border-top: none; border-bottom: none;"></td>
                    <td>早退</td>
                    <?php $__currentLoopData = $wt_data['time_records']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $record_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <td><?php echo e($record_data['LEAVE_TIME']); ?></td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php for($i; $i < 30; $i++): ?>
                    <td></td>
                    <?php endfor; ?>
                    <td style="border: none; text-align: left;">
                        特休&nbsp; : &nbsp;<?php echo e($record_data['SUM_SPCHOL_CNT']); ?>&nbsp;&nbsp;&nbsp;
                    </td>
                    <td style="border: none; text-align: left; width: 20px;">
                        <?php echo e($record_data['WORK_DESC_NAME_103']); ?>

                    </td>
                    <td class="worktime-sum">
                        : &nbsp;<?php echo e($record_data['SUM_OVTM4_TIME']); ?>

                    </td>
                </tr>
                <tr class="last-record">
                    <td style="border-left: 1px solid black; border-top: none;"></td>
                    <td>残業</td>
                    <?php $__currentLoopData = $wt_data['time_records']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $record_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <td><?php echo e($record_data['OVTM_TIME']); ?></td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php for($i; $i < 30; $i++): ?>
                    <td></td>
                    <?php endfor; ?>
                    <td style="border-right: none; border-top: none;">
                    </td>
                    <td class="wt-desc-name">
                        <?php echo e($record_data['WORK_DESC_NAME_200']); ?>

                    </td>
                    <td class="last-worktime-sum">
                        : &nbsp;<?php echo e($record_data['SUM_EXT1_TIME']); ?>

                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </body>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <?php endif; ?>
</html><?php /**PATH C:\xampp\htdocs\06_SVN\resources\views/form_print/templates/WorktimeLandscapePdf.blade.php ENDPATH**/ ?>