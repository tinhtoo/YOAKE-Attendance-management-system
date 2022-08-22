<?php use Carbon\CarbonPeriod; ?>
<html lang="ja">
    <head>
        <?php $__env->startSection('title', '印刷'); ?>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <style>
            @font-face{
                font-family: "MS Pゴシック";
                font-style: normal;
                font-weight: normal;
                src: url("<?php echo e(storage_path('fonts/migmix-2p-regular.ttf')); ?>") format('truetype');
            }
            @font-face{
                font-family: "MS Pゴシック";
                font-style: bold;
                font-weight: bold;
                src: url("<?php echo e(storage_path('fonts/migmix-2p-bold.ttf')); ?>") format('truetype');
            }
            body {
                font-family: "MS Pゴシック";
                line-height: 80%;
                text-align: center;
                font-size: 8px;
            }
            .workTable {
                border-collapse: collapse;
                width: 100%;
            }
            .workTable tr th{
                padding: 5px;
                border-bottom: 2px solid black;
                border-top: 2px solid black;
                border-left: none;
                border-right: none;
                text-align: left;
            }
            .workTable tr td{
                padding: 5px;
                border-bottom: 1px black;
                border-top: 1px black;
                border-left: none;
                border-right: none;
                text-align: left;
                border-bottom-style: dotted;
            }
            .date{
                position: relative;
                margin-left:70%;
                font-size: xx-small;
            }
            .record{
                padding-bottom: 10px;
                text-align:justify;
                font-size: xx-small;
                position: relative;
            }

        </style>
    </head>
    <?php if(isset($WorkPlanReports)): ?>
    <?php if(count($WorkPlanReports) < 1): ?>
    <body>
        <div class="date">
            <span>作成日：</span>
            <span><?php echo e(date('Y/m/d', strtotime($now_date))); ?></span>
            <span style="margin-left:10%;">1 / 1</span>
        </div>
        <div style="font-size:large;">
            <span>勤務予定表</span>
            <?php if($input_data['ReportCategory'] == 'rbWeek'): ?>
            <span>（週間）</span>
            <?php else: ?>
            <span>（月間）</span>
            <?php endif; ?>
        </div>
        <div class="record">
            <?php if($input_data['ReportCategory'] == 'rbWeek'): ?>
            <span style="margin-left:10px;">対象日</span>
            <?php else: ?>
            <span>対象月度</span>
            <?php endif; ?>
            <span>:</span>
            <span><?php echo e(date('Y/m/d', strtotime($str_date))); ?>(<?php echo e(config('consts.weeks')[date('w', strtotime($str_date))]); ?>)</span>
            <span>～</span>
            <span><?php echo e(date('Y/m/d', strtotime($end_date))); ?>(<?php echo e(config('consts.weeks')[date('w', strtotime($end_date))]); ?>)</span><br>
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
    </body>
    <?php else: ?>
    <?php $__currentLoopData = $WorkPlanReports->unique('DEPT_CD'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $WorkPlanReport): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <body>
        <div class="date">
            <span>作成日：</span>
            <span><?php echo e(date('Y/m/d', strtotime($now_date))); ?></span>
            <span style="margin-left:10%;"><?php echo e($loop->iteration); ?> / <?php echo e($loop->count); ?></span>
        </div>
        <div style="font-size:large;">
            <span>勤務予定表</span>
            <?php if($input_data['ReportCategory'] == 'rbWeek'): ?>
            <span>（週間）</span>
            <?php else: ?>
            <span>（月間）</span>
            <?php endif; ?>
        </div>
        <div class="record">
            <?php if($input_data['ReportCategory'] == 'rbWeek'): ?>
            <span style="margin-left:10px;">対象日</span>
            <?php else: ?>
            <span>対象月度</span>
            <?php endif; ?>
            <span>:</span>
            <span><?php echo e(date('Y/m/d', strtotime($str_date))); ?>(<?php echo e(config('consts.weeks')[date('w', strtotime($str_date))]); ?>)</span>
            <span>～</span>
            <span><?php echo e(date('Y/m/d', strtotime($end_date))); ?>(<?php echo e(config('consts.weeks')[date('w', strtotime($end_date))]); ?>)</span><br>
        </div>
        <div class="record">
            <span style="margin-left:20px;">部門</span>
            <span>:</span>
            <span><?php echo e($WorkPlanReport['DEPT_CD']); ?></span>
            <span><?php echo e($WorkPlanReport['DEPT_NAME']); ?></span>
        </div>
        <table class="workTable" style="width: 100%;">
            <thead>
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
                <?php $__currentLoopData = $WorkPlanReports->where('DEPT_CD', $WorkPlanReport['DEPT_CD'])->unique('EMP_CD'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr style="width: 100%;">
                    <td><?php echo e($emp['EMP_CD']); ?></td>
                    <td><?php echo e($emp['EMP_NAME']); ?></td>
                <?php for($i = 0; $i < ($input_data['ReportCategory'] == 'rbWeek' ? 8 : 31); $i++): ?>
                <?php if(count($WorkPlanReports->where('EMP_CD', $emp['EMP_CD'])) > $i): ?>
                <?php $__currentLoopData = $WorkPlanReports->where('EMP_CD', $emp['EMP_CD']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workptn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <td><?php echo e(++$i > 0 ? $workptn['WORKPTN_ABR_NAME'] : ''); ?></td>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                    <td></td>
                <?php endfor; ?>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </body>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>   
    <?php endif; ?>
</html><?php /**PATH C:\xampp\htdocs\06_SVN\resources\views/form_print/WorkPlanPdf.blade.php ENDPATH**/ ?>