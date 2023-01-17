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
                padding-top: 5px;
                padding-bottom: 5px;
                border-bottom: 2px solid black;
                border-top: 2px solid black;
                border-left: none;
                border-right: none;
                text-align: right;
            }
            .workTable tr td{
                padding-top: 5px;
                padding-bottom: 5px;
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
                padding-bottom: 10px;
                text-align:justify;
                font-size: xx-small;
                position: relative;
            }

        </style>
    </head>
    <?php if(isset($dailyReportDatas)): ?>
    <?php if(count($dailyReportDatas) < 1): ?>
    <body>
        <div class="date">
            <span style="margin-left:80px">作成日：</span>
            <span><?php echo e(date('Y/m/d', strtotime($now_date))); ?></span>
            <span style="margin-left:70px">1 / 1</span>
        </div>
        <div style="font-size:large;">
            <span>勤務実績表(日報)</span>
        </div>
        <div class="record">
            <span style="margin-left:10px;">対象日</span>
            <span>:</span>    
        </div>
        <div class="record">
            <span style="margin-left:20px;">部門</span>
            <span>:</span>
        </div>
        <table class="workTable" style="width: 100%;">
            <thead>
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
                    <td></td>
                    <td style="height:30px;"></td>
                </tr>
                <tr>
                <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>部門計</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="height:30px;"></td>
                </tr>
            </tbody>
        </table>
    </body>
    <?php else: ?>
    
    <?php
        $WK_HH = 0;
        $WK_MI = 0;
        $TARD_HH = 0;
        $TARD_MI = 0;
        $LEAVE_HH = 0;
        $LEAVE_MI = 0;
        $OUT_HH = 0;
        $OUT_MI = 0;
        $OVTM1_HH = 0;
        $OVTM1_MI = 0;
        $OVTM2_HH = 0;
        $OVTM2_MI = 0;
        $OVTM3_HH = 0;
        $OVTM3_MI = 0;
        $OVTM4_HH = 0;
        $OVTM4_MI = 0;
        $OVTM5_HH = 0;
        $OVTM5_MI = 0;
        $OVTM6_HH = 0;
        $OVTM6_MI = 0;
        $EXT1_HH = 0;
        $EXT1_MI = 0;
        $EXT2_HH = 0;
        $EXT2_MI = 0;
        $EXT3_HH = 0;
        $EXT3_MI = 0;

        $WK_MI_D60 = 0;
        $TARD_MI_D60 = 0;
        $LEAVE_MI_D60 = 0;
        $OUT_MI_D60 = 0;
        $OVTM1_MI_D60 = 0;
        $OVTM2_MI_D60 = 0;
        $OVTM3_MI_D60 = 0;
        $OVTM4_MI_D60 = 0;
        $OVTM5_MI_D60 = 0;
        $OVTM6_MI_D60 = 0;
        $EXT1_MI_D60 = 0;
        $EXT2_MI_D60 = 0;
        $EXT3_MI_D60 = 0;

        $previous_dep = 0;
    ?>
    <?php $__currentLoopData = $dailyReportDatas->groupBy('CALD_DATE'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dailyReportData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php $__currentLoopData = $dailyReportData->unique('DEPT_CD'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reportData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <body>
        <div class="date">
            <span style="margin-left:80px">作成日：</span>
            <span><?php echo e(date('Y/m/d', strtotime($now_date))); ?></span>
            <span style="margin-left:70px"><?php echo e($loop->iteration); ?> / <?php echo e($loop->count); ?></span>
        </div>
        <div style="font-size:large;">
            <span>勤務実績表(日報)</span>
        </div>
        <div class="record">
            <span style="margin-left:10px;">対象日</span>
            <span>:</span>
            <span>
                <?php echo e(date('Y/m/d', strtotime($reportData['CALD_DATE']))); ?>

                (<?php echo e(config('consts.weeks')[date('w', strtotime($reportData['CALD_DATE']))]); ?>)
            </span>
        </div>
        <div class="record">
            <span style="margin-left:20px;">部門</span>
            <span>:</span>
            <span><?php echo e($reportData['DEPT_CD']); ?></span>
            <span><?php echo e($reportData['DEPT_NAME']); ?></span>
        </div>
        <table class="workTable" style="width: 100%;">
            <thead>
                <tr style="width: 100%;">
                    <th style="padding-left: 5px; text-align: left;">社員<br>&nbsp;&nbsp;</th>
                    <th style="width:140px; text-align: left;"></th>
                    <th style="width:140px; text-align: left;">勤務体系<br>事由</th>
                    <th style="width:40px;">出勤<br>退出</th>
                    <th style="width:40px;">外出１<br>再入１</th>
                    <th style="width:40px;">外出２<br>再入２</th>
                    <th style="width:60px;">出勤時間<br>遅刻時間</th>
                    <th style="width:60px;">早退時間<br>外出時間</th>
                    <th>
                        <?php echo e($reportData['WORK_DESC_NAME_100']); ?><br>
                        <?php echo e($reportData['WORK_DESC_NAME_101']); ?>

                    </th>
                    <th>
                        <?php echo e($reportData['WORK_DESC_NAME_102']); ?><br>
                        <?php echo e($reportData['WORK_DESC_NAME_103']); ?>

                    </th>
                    <th>
                        <?php echo e($reportData['WORK_DESC_NAME_104']); ?><br>&nbsp;&nbsp;
                        <?php echo e($reportData['WORK_DESC_NAME_105']); ?>

                    </th>
                    <th>
                        <?php echo e($reportData['WORK_DESC_NAME_200']); ?><br>&nbsp;&nbsp;
                        <?php echo e($reportData['WORK_DESC_NAME_201']); ?>

                    </th>
                    <th style="padding-right: 5px;">
                        <?php echo e($reportData['WORK_DESC_NAME_202']); ?><br>&nbsp;&nbsp;
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $empDailyReportData = $dailyReportDatas->where('DEPT_CD', $reportData['DEPT_CD'])
                                                        ->where('CALD_DATE', $reportData['CALD_DATE']);
                    $empDailyReportData = array_values($empDailyReportData->toArray());
                ?>
                <?php $__currentLoopData = $empDailyReportData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr style="width: 100%;">
                    <td style="padding-left: 5px; text-align: left;"><?php echo e($data['EMP_CD']); ?><br>&nbsp;&nbsp;</td>
                    <td style="text-align: left;"><?php echo e($data['EMP_NAME']); ?><br>&nbsp;&nbsp;</td>
                    <td style="text-align: left;"><?php echo e($data['WORKPTN_NAME']); ?><br><?php echo e($data['REASON_NAME']); ?></td>
                    <td><?php echo e($data['OFC_TIME']); ?><br>&nbsp;&nbsp;<?php echo e($data['LEV_TIME']); ?></td>
                    <td><?php echo e($data['OUT1_TIME']); ?><br>&nbsp;&nbsp;<?php echo e($data['IN1_TIME']); ?></td>
                    <td><?php echo e($data['OUT2_TIME']); ?><br>&nbsp;&nbsp;<?php echo e($data['IN2_TIME']); ?></td>
                    <td>
                    <?php echo e($data['WORK_TIME_HH']); ?> : <?php echo e($data['WORK_TIME_MI'] == '0' ? '00' : $data['WORK_TIME_MI']); ?>

                    <br>
                    <?php echo e($data['TARD_TIME_HH']); ?> : <?php echo e($data['TARD_TIME_MI'] == '0' ? '00' : $data['TARD_TIME_MI']); ?>

                    </td>
                    <td>
                    <?php echo e($data['LEAVE_TIME_HH']); ?> : <?php echo e($data['LEAVE_TIME_MI'] == '0' ? '00' : $data['LEAVE_TIME_MI']); ?>

                    <br>
                    <?php echo e($data['OUT_TIME_HH']); ?> : <?php echo e($data['OUT_TIME_MI'] == '0' ? '00' : $data['OUT_TIME_MI']); ?>

                    </td>
                    <td>
                    <?php echo e($data['OVTM1_TIME_HH']); ?> : <?php echo e($data['OVTM1_TIME_MI'] == '0' ? '00' : $data['OVTM1_TIME_MI']); ?>

                    <br>
                    <?php echo e($data['OVTM2_TIME_HH']); ?> : <?php echo e($data['OVTM2_TIME_MI'] == '0' ? '00' : $data['OVTM2_TIME_MI']); ?>

                    </td>
                    <td>
                    <?php echo e($data['OVTM3_TIME_HH']); ?> : <?php echo e($data['OVTM3_TIME_MI'] == '0' ? '00' : $data['OVTM3_TIME_MI']); ?>

                    <br>
                    <?php echo e($data['OVTM4_TIME_HH']); ?> : <?php echo e($data['OVTM4_TIME_MI'] == '0' ? '00' : $data['OVTM4_TIME_MI']); ?>

                    </td>
                    <td>
                    <?php echo e($data['OVTM5_TIME_HH']); ?> : <?php echo e($data['OVTM5_TIME_MI'] == '0' ? '00' : $data['OVTM5_TIME_MI']); ?>

                    <br>
                    <?php echo e($data['OVTM6_TIME_HH']); ?> : <?php echo e($data['OVTM6_TIME_MI'] == '0' ? '00' : $data['OVTM6_TIME_MI']); ?>

                    </td>
                    <td>
                    <?php echo e($data['EXT1_TIME_HH']); ?> : <?php echo e($data['EXT1_TIME_MI'] == '0' ? '00' : $data['EXT1_TIME_MI']); ?>

                    <br>
                    <?php echo e($data['EXT2_TIME_HH']); ?> : <?php echo e($data['EXT2_TIME_MI'] == '0' ? '00' : $data['EXT2_TIME_MI']); ?>

                    </td>
                    <td style="padding-right: 5px;">
                    <?php echo e($data['EXT3_TIME_HH']); ?> : <?php echo e($data['EXT3_TIME_MI'] == '0' ? '00' : $data['EXT3_TIME_MI']); ?>

                    <br>&nbsp;&nbsp;
                    </td>
                </tr>
                
                <?php
                    $WK_HH += $data['WORK_TIME_HH'];
                    $WK_MI += $data['WORK_TIME_MI'];
                    $WK_MI_D60 += $data['WORK_TIME_MI']/60;
                    
                    $TARD_HH += $data['TARD_TIME_HH'];
                    $TARD_MI += $data['TARD_TIME_MI'];
                    $TARD_MI_D60 += $data['TARD_TIME_MI']/60;

                    $LEAVE_HH += $data['LEAVE_TIME_HH'];
                    $LEAVE_MI += $data['LEAVE_TIME_MI'];
                    $LEAVE_MI_D60 += $data['LEAVE_TIME_MI']/60;

                    $OUT_HH += $data['OUT_TIME_HH'];
                    $OUT_MI += $data['OUT_TIME_MI'];
                    $OUT_MI_D60 += $data['OUT_TIME_MI']/60;

                    $OVTM1_HH += $data['OVTM1_TIME_HH'];
                    $OVTM1_MI += $data['OVTM1_TIME_MI'];
                    $OVTM1_MI_D60 += $data['OVTM1_TIME_MI']/60;

                    $OVTM2_HH += $data['OVTM2_TIME_HH'];
                    $OVTM2_MI += $data['OVTM2_TIME_MI'];
                    $OVTM2_MI_D60 += $data['OVTM2_TIME_MI']/60;

                    $OVTM3_HH += $data['OVTM3_TIME_HH'];
                    $OVTM3_MI += $data['OVTM3_TIME_MI'];
                    $OVTM3_MI_D60 += $data['OVTM3_TIME_MI']/60;

                    $OVTM4_HH += $data['OVTM4_TIME_HH'];
                    $OVTM4_MI += $data['OVTM4_TIME_MI'];
                    $OVTM4_MI_D60 += $data['OVTM4_TIME_MI']/60;

                    $OVTM5_HH += $data['OVTM5_TIME_HH'];
                    $OVTM5_MI += $data['OVTM5_TIME_MI'];
                    $OVTM5_MI_D60 += $data['OVTM5_TIME_MI']/60;

                    $OVTM6_HH += $data['OVTM6_TIME_HH'];
                    $OVTM6_MI += $data['OVTM6_TIME_MI'];
                    $OVTM6_MI_D60 += $data['OVTM6_TIME_MI']/60;

                    $EXT1_HH += $data['EXT1_TIME_HH'];
                    $EXT1_MI += $data['EXT1_TIME_MI'];
                    $EXT1_MI_D60 += $data['EXT1_TIME_MI']/60;

                    $EXT2_HH += $data['EXT2_TIME_HH'];
                    $EXT2_MI += $data['EXT2_TIME_MI'];
                    $EXT2_MI_D60 += $data['EXT2_TIME_MI']/60;

                    $EXT3_HH += $data['EXT3_TIME_HH'];
                    $EXT3_MI += $data['EXT3_TIME_MI'];
                    $EXT3_MI_D60 += $data['EXT3_TIME_MI']/60;
                    
                ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php
                $WK_HOUR = floor(($WK_HH == 'null' && $WK_MI == 'null')? '0' : ($WK_HH + $WK_MI_D60));
                $WK_MIN = ($WK_MI == 'null') ? '00' : (substr('00'.($WK_MI)%60, -2));

                $TARD_HOUR = floor(($TARD_HH == 'null' && $TARD_MI == 'null')? '0' : ($TARD_HH + $TARD_MI_D60));
                $TARD_MIN = ($TARD_MI == 'null') ? '00' : (substr('00'.($TARD_MI)%60, -2));

                $LEAVE_HOUR = floor(($LEAVE_HH == 'null' && $LEAVE_MI == 'null')? '0' : ($LEAVE_HH + $LEAVE_MI_D60));
                $LEAVE_MIN = ($LEAVE_MI == 'null') ? '00' : (substr('00'.($LEAVE_MI)%60, -2));

                $OUT_HOUR = floor(($OUT_HH == 'null' && $OUT_MI == 'null')? '0' : ($OUT_HH + $OUT_MI_D60));
                $OUT_MIN = ($OUT_MI == 'null') ? '00' : (substr('00'.($OUT_MI)%60, -2));

                $OVTM1_HOUR = floor(($OVTM1_HH == 'null' && $OVTM1_MI == 'null')? '0' : ($OVTM1_HH + $OVTM1_MI_D60));
                $OVTM1_MIN = ($OVTM1_MI == 'null') ? '00' : (substr('00'.($OVTM1_MI)%60, -2));

                $OVTM2_HOUR = floor(($OVTM2_HH == 'null' && $OVTM2_MI == 'null')? '0' : ($OVTM2_HH + $OVTM2_MI_D60));
                $OVTM2_MIN = ($OVTM2_MI == 'null') ? '00' : (substr('00'.($OVTM2_MI)%60, -2));

                $OVTM3_HOUR = floor(($OVTM3_HH == 'null' && $OVTM3_MI == 'null')? '0' : ($OVTM3_HH + $OVTM3_MI_D60));
                $OVTM3_MIN = ($OVTM3_MI == 'null') ? '00' : (substr('00'.($OVTM3_MI)%60, -2));

                $OVTM4_HOUR = floor(($OVTM4_HH == 'null' && $OVTM4_MI == 'null')? '0' : ($OVTM4_HH + $OVTM4_MI_D60));
                $OVTM4_MIN = ($OVTM4_MI == 'null') ? '00' : (substr('00'.($OVTM4_MI)%60, -2));

                $OVTM5_HOUR = floor(($OVTM5_HH == 'null' && $OVTM5_MI == 'null')? '0' : ($OVTM5_HH + $OVTM5_MI_D60));
                $OVTM5_MIN = ($OVTM5_MI == 'null') ? '00' : (substr('00'.($OVTM5_MI)%60, -2));

                $OVTM6_HOUR = floor(($OVTM6_HH == 'null' && $OVTM6_MI == 'null')? '0' : ($OVTM6_HH + $OVTM6_MI_D60));
                $OVTM6_MIN = ($OVTM6_MI == 'null') ? '00' : (substr('00'.($OVTM6_MI)%60, -2));

                $EXT1_HOUR = floor(($EXT1_HH == 'null' && $EXT1_MI == 'null')? '0' : ($EXT1_HH + $EXT1_MI_D60));
                $EXT1_MIN = ($EXT1_MI == 'null') ? '00' : (substr('00'.($EXT1_MI)%60, -2));

                $EXT2_HOUR = floor(($EXT2_HH == 'null' && $EXT2_MI == 'null')? '0' : ($EXT2_HH + $EXT2_MI_D60));
                $EXT2_MIN = ($EXT2_MI == 'null') ? '00' : (substr('00'.($EXT2_MI)%60, -2));

                $EXT3_HOUR = floor(($EXT3_HH == 'null' && $EXT3_MI == 'null')? '0' : ($EXT3_HH + $EXT3_MI_D60));
                $EXT3_MIN = ($EXT3_MI == 'null') ? '00' : (substr('00'.($EXT3_MI)%60, -2));

                $SUM_WORK_TIME = $WK_HOUR . ' : ' . $WK_MIN;
                $SUM_TARD_TIME = $TARD_HOUR . ' : ' . $TARD_MIN;
                $SUM_LEAVE_TIME = $LEAVE_HOUR . ' : ' . $LEAVE_MIN; 
                $SUM_OUT_TIME = $OUT_HOUR . ' : ' . $OUT_MIN; 
                $SUM_OVTM1_TIME = $OVTM1_HOUR . ' : ' . $OVTM1_MIN; 
                $SUM_OVTM2_TIME = $OVTM2_HOUR . ' : ' . $OVTM2_MIN; 
                $SUM_OVTM3_TIME = $OVTM3_HOUR . ' : ' . $OVTM3_MIN; 
                $SUM_OVTM4_TIME = $OVTM4_HOUR . ' : ' . $OVTM4_MIN; 
                $SUM_OVTM5_TIME = $OVTM5_HOUR . ' : ' . $OVTM5_MIN; 
                $SUM_OVTM6_TIME = $OVTM6_HOUR . ' : ' . $OVTM6_MIN; 
                $SUM_EXT1_TIME = $EXT1_HOUR . ' : ' . $EXT1_MIN; 
                $SUM_EXT2_TIME = $EXT2_HOUR . ' : ' . $EXT2_MIN; 
                $SUM_EXT3_TIME = $EXT3_HOUR . ' : ' . $EXT3_MIN;
                 
                ?>
                <tr>
                    <td style="border-bottom: none;"></td>
                    <td style="border-bottom: none;"></td>
                    <td style="border-bottom: none;"></td>
                    <td style="border-bottom: none;"></td>
                    <td style="border-bottom: none;"></td>
                    <td style="border-bottom: none;">部門計</td>
                    <td style="border-bottom: none;"><?php echo e($SUM_WORK_TIME); ?><br>&nbsp;<?php echo e($SUM_TARD_TIME); ?></td>
                    <td style="border-bottom: none;"><?php echo e($SUM_LEAVE_TIME); ?><br>&nbsp;<?php echo e($SUM_OUT_TIME); ?></td>
                    <td style="border-bottom: none;"><?php echo e($SUM_OVTM1_TIME); ?><br>&nbsp;<?php echo e($SUM_OVTM2_TIME); ?></td>
                    <td style="border-bottom: none;"><?php echo e($SUM_OVTM3_TIME); ?><br>&nbsp;<?php echo e($SUM_OVTM4_TIME); ?></td>
                    <td style="border-bottom: none;"><?php echo e($SUM_OVTM5_TIME); ?><br>&nbsp;<?php echo e($SUM_OVTM6_TIME); ?></td>
                    <td style="border-bottom: none;"><?php echo e($SUM_EXT1_TIME); ?><br>&nbsp;<?php echo e($SUM_EXT2_TIME); ?></td>
                    <td style="border-bottom: none; padding-right: 5px;"><?php echo e($SUM_EXT3_TIME); ?><br>&nbsp;</td>
                </tr>
                <?php
                    if ($data['DEPT_CD'] != $previous_dep) {
                        $WK_HH = '0';
                        $WK_MI = '0';
                        $TARD_HH = '0';
                        $TARD_MI = '0';
                        $LEAVE_HH = '0';
                        $LEAVE_MI = '0';
                        $OUT_HH = '0';
                        $OUT_MI = '0';
                        $OVTM1_HH = '0';
                        $OVTM1_MI = '0';
                        $OVTM2_HH = '0';
                        $OVTM2_MI = '0';
                        $OVTM3_HH = '0';
                        $OVTM3_MI = '0';
                        $OVTM4_HH = '0';
                        $OVTM4_MI = '0';
                        $OVTM5_HH = '0';
                        $OVTM5_MI = '0';
                        $OVTM6_HH = '0';
                        $OVTM6_MI = '0';
                        $EXT1_HH = '0';
                        $EXT1_MI = '0';
                        $EXT2_HH = '0';
                        $EXT2_MI = '0';
                        $EXT3_HH = '0';
                        $EXT3_MI = '0';

                        $WK_MI_D60 = '0';
                        $TARD_MI_D60 = '0';
                        $LEAVE_MI_D60 = '0';
                        $OUT_MI_D60 = '0';
                        $OVTM1_MI_D60 = '0';
                        $OVTM2_MI_D60 = '0';
                        $OVTM3_MI_D60 = '0';
                        $OVTM4_MI_D60 = '0';
                        $OVTM5_MI_D60 = '0';
                        $OVTM6_MI_D60 = '0';
                        $EXT1_MI_D60 = '0';
                        $EXT2_MI_D60 = '0';
                        $EXT3_MI_D60 = '0';
                    }
                ?>
            </tbody>
        </table>
    </body>
    <?php
        $previous_dep = $reportData['DEPT_CD'];
    ?> 
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <?php endif; ?>
</html><?php /**PATH C:\xampp\htdocs\06_SVN\resources\views/form_print/templates/WorktimePdf.blade.php ENDPATH**/ ?>