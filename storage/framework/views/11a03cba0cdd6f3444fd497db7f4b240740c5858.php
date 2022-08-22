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
                margin: 30px 15px 19px 15px;
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
            .workTable tr th{
                height: 24px;
                border-bottom: 2px solid black;
                border-top: 2px solid black;
                border-left: none;
                border-right: none;
                text-align: left;
            }
            .workTable tr td{
                height: 23px;
                border-bottom: 1px black;
                border-top: 1px black;
                border-left: none;
                border-right: none;
                text-align: left;
                border-bottom-style: dotted;
            }
            .date .page-number:after { 
                content: counter(page);
            }
            .footer-line1 {
                border-top: #000000 1px solid;
                border-right: #000000 0px solid;
                border-left: #000000 0px solid;
                border-bottom: #000000 0px solid;
                width: 1092px;
                left: 0px;
                position: fixed;
                bottom: 2px;
            }
            .footer-line2 {
                border-top: #000000 1px solid;
                border-right: #000000 0px solid;
                border-left: #000000 0px solid;
                border-bottom: #000000 0px solid;
                width: 1558px;
                left: 0px;
                position: fixed;
                bottom: 15px;
            }
        </style>
    </head>
    <?php if(isset($work_plan_reports)): ?>
    <!-- 対象データがない場合 -->
    <?php if(count($work_plan_reports) < 1): ?>
    <body>
        <!-- ページ番号表示 -->
        <!-- 勤務予定表（週間）のページ番号-->
        <?php if($input_data['ReportCategory'] == 'rbWeek'): ?>
        <script type="text/php">
            if(isset($pdf)) {
                $x = 800;
                $y = 23;
                $font = $fontMetrics->get_font("MS Pゴシック, メイリオ", "normal");
                $size = 6;
                $pdf->page_text($x, $y, "{PAGE_NUM} / {PAGE_COUNT}", $font, $size, [0,0,0]);
            }
        </script>
        <?php else: ?>
        <!-- 勤務予定表（月間）のページ番号-->
        <script type="text/php">
            if(isset($pdf)) {
                $x = 1120;
                $y = 23;
                $font = $fontMetrics->get_font("MS Pゴシック, メイリオ", "normal");
                $size = 6;
                $pdf->page_text($x, $y, "{PAGE_NUM} / {PAGE_COUNT}", $font, $size, [0,0,0]);
            }
        </script>
        <?php endif; ?>
        <table class="workTable" style="width: 100%;">
            <thead>
                <?php if($input_data['ReportCategory'] == 'rbWeek'): ?>
                <tr>
                    <td colspan="8" style="border: none; height:2px; text-align: right; padding-bottom:15px;">作表日：</td>
                    <td style="border: none; height:2px; text-align: left; padding-bottom:15px;">
                        <?php echo e(date('Y/m/d', strtotime($now_date))); ?>

                    </td>
                </tr>
                <tr>
                    <td colspan="10" style="border: none; height: 7px; font-size: 25px; text-align: center;">
                        勤務予定表(週間)
                    </td>
                </tr>
                <tr>
                    <td style="border: none; height:4px; text-align:right;">対象日 : &nbsp;</td>
                    <td colspan="9" style="border: none; height:4px; text-align:left;">
                        <?php echo e(date('Y/m/d', strtotime($str_date))); ?>

                        (<?php echo e(config('consts.weeks')[date('w', strtotime($str_date))]); ?>) ～
                        <?php echo e(date('Y/m/d', strtotime($end_date))); ?>

                        (<?php echo e(config('consts.weeks')[date('w', strtotime($end_date))]); ?>)
                    </td>
                </tr>
                <tr>
                    <td style="border: none; height:4px; text-align:right; padding-bottom:9px;">部門 : &nbsp;</td>
                    <td colspan="9" style="border: none; height:4px; text-align:left; padding-bottom:9px;">
                    </td>
                </tr>
                <?php else: ?>
                <tr>
                    <td colspan="29" style="border: none; height:2px; text-align: right; padding-bottom:15px;">作表日：</td>
                    <td colspan="4" style="border: none; height:2px; text-align: left; padding-bottom:15px;">
                        <?php echo e(date('Y/m/d', strtotime($now_date))); ?>

                    </td>
                </tr>
                <tr>
                    <td colspan="33" style="border: none; height: 7px; font-size: 25px; text-align: center;">
                        勤務予定表(月間)
                    </td>
                </tr>
                <tr>
                    <td style="border: none; height:4px; text-align:right;">対象月度 : &nbsp;</td>
                    <td colspan="33" style="border: none; height:4px; text-align:left;">
                        <?php echo e(date('Y/m/d', strtotime($str_date))); ?>

                        (<?php echo e(config('consts.weeks')[date('w', strtotime($str_date))]); ?>) ～
                        <?php echo e(date('Y/m/d', strtotime($end_date))); ?>

                        (<?php echo e(config('consts.weeks')[date('w', strtotime($end_date))]); ?>)
                    </td>
                </tr>
                <tr>
                    <td style="border: none; height:4px; text-align:right; padding-bottom:9px;">部門 : &nbsp;</td>
                    <td colspan="32" style="border: none; height:4px; text-align:left; padding-bottom:9px;">
                    </td>
                </tr>
                <?php endif; ?>
                <tr style="width: 100%;">
                    <th>社員</th>
                    <th style="width:60px"></th>
                    <?php if($input_data['ReportCategory'] == 'rbWeek'): ?>
                        
                        <?php $__currentLoopData = CarbonPeriod::start($str_date)->days(1)->end($end_date, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <th><?php echo e($day->format('m/d')); ?>(<?php echo e(config('consts.weeks')[date('w', strtotime($day))]); ?>)</th>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        
                        <?php $__currentLoopData = CarbonPeriod::start($str_date)->days(1)->end($end_date, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <th>
                                <?php if($i == 0): ?>
                                <?php echo e((int)$day->format('m')); ?>月<br>
                                <?php elseif($day->format('d') === "01"): ?>
                                <?php echo e((int)$day->format('m')); ?>月<br>
                                <?php else: ?>
                                <br>
                                <?php endif; ?>
                                <?php echo e((int)$day->format('d')); ?>(<?php echo e(config('consts.weeks')[date('w', strtotime($day))]); ?>)
                            </th>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                <?php for($i = 0; $i < ($input_data['ReportCategory'] == 'rbWeek' ? 8 : 31); $i++): ?>
                    <td><?php echo e($i++ > 0 ? '' : ''); ?></td>
                    <td></td>
                <?php endfor; ?>
                </tr>
            </tbody>
        </table>
        <!-- フッター -->
        <?php
            if ($input_data['ReportCategory'] == 'rbWeek') {
                $line = "footer-line1";
            } else { 
                $line = "footer-line2";
            }
        ?>
        <footer class="<?php echo e($line); ?>">
        </footer>
    </body>

    <?php else: ?>

    <!-- 該当データがある場合 -->
    <?php $__currentLoopData = $work_plan_reports->unique('DEPT_CD'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dept_work_plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <body>
        <!-- ページ番号表示 -->
        <!-- 勤務予定表（週間）のページ番号-->
        <?php if($input_data['ReportCategory'] == 'rbWeek'): ?>
        <script type="text/php">
            if(isset($pdf)) {
                $x = 800;
                $y = 23;
                $text = "{PAGE_NUM} / {PAGE_COUNT}";
                $font = $fontMetrics->get_font("MS Pゴシック, メイリオ", "normal");
                $size = 6;
                $color = [0,0,0];
                $pdf->page_text($x, $y, $text, $font, $size, $color);
            }
        </script>
        <?php else: ?>
        <!-- 勤務予定表（月間）のページ番号-->
        <script type="text/php">
            if(isset($pdf)) {
                $x = 1120;
                $y = 23;
                $text = "{PAGE_NUM} / {PAGE_COUNT}";
                $font = $fontMetrics->get_font("MS Pゴシック, メイリオ", "normal");
                $size = 6;
                $color = [0,0,0];
                $pdf->page_text($x, $y, $text, $font, $size, $color);
            }
        </script>
        <?php endif; ?>
        <table class="workTable" style="width: 100%;">
            <thead>
                <!-- 勤務予定表（週間）のヘッダ-->
                <?php if($input_data['ReportCategory'] == 'rbWeek'): ?>
                <tr>
                    <td colspan="8" style="border: none; height:2px; text-align: right; padding-bottom:15px;">作表日：</td>
                    <td style="border: none; height:2px; text-align: left; padding-bottom:15px;">
                        <?php echo e(date('Y/m/d', strtotime($now_date))); ?>

                    </td>
                </tr>
                <tr>
                    <td colspan="10" style="border: none; height: 7px; font-size: 25px; text-align: center;">
                        勤務予定表(週間)
                    </td>
                </tr>
                <tr>
                    <td style="border: none; height:4px; text-align:right;">対象日 : &nbsp;</td>
                    <td colspan="9" style="border: none; height:4px; text-align:left;">
                        <?php echo e(date('Y/m/d', strtotime($str_date))); ?>

                        (<?php echo e(config('consts.weeks')[date('w', strtotime($str_date))]); ?>) ～
                        <?php echo e(date('Y/m/d', strtotime($end_date))); ?>

                        (<?php echo e(config('consts.weeks')[date('w', strtotime($end_date))]); ?>)
                    </td>
                </tr>
                <tr>
                    <td style="border: none; height:4px; text-align:right; padding-bottom:9px;">部門 : &nbsp;</td>
                    <td colspan="9" style="border: none; height:4px; text-align:left; padding-bottom:9px;">
                        <?php echo e($dept_work_plan['DEPT_CD']); ?>&nbsp;&nbsp;
                        <?php echo e($dept_work_plan['DEPT_NAME']); ?>

                    </td>
                </tr>
                <?php else: ?>
                <!-- 勤務予定表（月間）のヘッダ-->
                <tr>
                    <td colspan="29" style="border: none; height:2px; text-align: right; padding-bottom:15px;">作表日：</td>
                    <td colspan="4" style="border: none; height:2px; text-align: left; padding-bottom:15px;">
                        <?php echo e(date('Y/m/d', strtotime($now_date))); ?>

                    </td>
                </tr>
                <tr>
                    <td colspan="33" style="border: none; height: 7px; font-size: 25px; text-align: center;">
                        勤務予定表(月間)
                    </td>
                </tr>
                <tr>
                    <td style="border: none; height:4px; text-align:right;">対象月度 : &nbsp;</td>
                    <td colspan="33" style="border: none; height:4px; text-align:left;">
                        <?php echo e(date('Y/m/d', strtotime($str_date))); ?>

                        (<?php echo e(config('consts.weeks')[date('w', strtotime($str_date))]); ?>) ～
                        <?php echo e(date('Y/m/d', strtotime($end_date))); ?>

                        (<?php echo e(config('consts.weeks')[date('w', strtotime($end_date))]); ?>)
                    </td>
                </tr>
                <tr>
                    <td style="border: none; height:4px; text-align:right; padding-bottom:9px;">部門 : &nbsp;</td>
                    <td colspan="32" style="border: none; height:4px; text-align:left; padding-bottom:9px;">
                        <?php echo e($dept_work_plan['DEPT_CD']); ?>&nbsp;&nbsp;
                        <?php echo e($dept_work_plan['DEPT_NAME']); ?>

                    </td>
                </tr>
                <?php endif; ?>
                <tr>
                    <th style="width: 60px; padding-left: 5px;">社員</th>
                    <th></th>
                    <?php if($input_data['ReportCategory'] == 'rbWeek'): ?>
                        
                        <?php $__currentLoopData = CarbonPeriod::start($str_date)->days(1)->end($end_date, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <th style="width: 90px;">
                                <?php echo e($day->format('m/d')); ?>(<?php echo e(config('consts.weeks')[date('w', strtotime($day))]); ?>)
                            </th>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        
                        <?php $__currentLoopData = CarbonPeriod::start($str_date)->days(1)->end($end_date, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <th style="width: 41px; line-height: 15px; padding-bottom: 5px; font-size: 10px;">
                                <?php if($i == 0): ?>
                                <?php echo e((int)$day->format('m')); ?>月<br>
                                <?php elseif($day->format('d') === "01"): ?>
                                <?php echo e((int)$day->format('m')); ?>月<br>
                                <?php else: ?>
                                <br>
                                <?php endif; ?>
                                <?php echo e((int)$day->format('d')); ?>(<?php echo e(config('consts.weeks')[date('w', strtotime($day))]); ?>)
                                <br>
                            </th>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <!-- 勤務予定表詳細データ表示 -->
                <?php
                    $report_data = $work_plan_reports->where('DEPT_CD', $dept_work_plan['DEPT_CD'])->unique('EMP_CD');
                ?>
                <?php $__currentLoopData = $report_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td style="padding-left: 5px;"><?php echo e($emp['EMP_CD']); ?></td>
                    <td><?php echo e($emp['EMP_NAME']); ?></td>
                    <?php $__currentLoopData = CarbonPeriod::start($str_date)->days(1)->end($end_date, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td>
                            <?php echo e(getWorkPlanData($work_plan_reports, $emp['EMP_CD'], $day->format('Y-m-d H:i:s'))); ?>   
                        </td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <!-- フッター -->
        <?php
            if ($input_data['ReportCategory'] == 'rbWeek') {
                $line = "footer-line1";
            } else { 
                $line = "footer-line2";
            }
        ?>
        <footer class="<?php echo e($line); ?>">
        </footer>
    </body>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <?php endif; ?>
</html><?php /**PATH C:\xampp\htdocs\06_SVN\resources\views/form_print/templates/WorkPlanPdf.blade.php ENDPATH**/ ?>