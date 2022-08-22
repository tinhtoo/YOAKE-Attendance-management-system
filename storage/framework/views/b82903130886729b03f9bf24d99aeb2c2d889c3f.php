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
            .header {
                font-size:large;
                margin-bottom:2%;
            }
            .workTable tr th{
                padding-top: 6px;
                padding-bottom: 6px;
                border-bottom: 1px solid black;
                border-top: 1px solid black;
                border-left: none;
                border-right: none;
                text-align: left;
            }
            .table-border{
                border-top-style: dotted;
            }
            .table-bottom-border{
                border-bottom-style: dotted;
            }
            .workTable tr td{
                padding-top: 5px;
                padding-bottom: 5px;
                border-bottom: 1px black;
                border-top: 1px black;
                border-left: none;
                border-right: none;
                text-align: left;
            }
            .date{
                position: relative;
                margin-left:80%;
                margin-bottom:2%;
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
    <?php if(count($time_stamp_datas) < 1): ?>
    <body>
        <div class="date">
            <span>作成日：</span>
            <span><?php echo e($now_date); ?></span>
            <span style="margin-left:5px">1 / 1</span>
        </div>
        <div class="header">
            <span>未打刻・二重打刻</span>
            <span>一覧表</span>
        </div>
        <div class="record">
            <span style="margin-left:10px;">対象日</span>
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
                    <th style="padding-left: 5px;">未・二</th>
                    <th style="padding-left: 10px;">社員</th>
                    <th></th>
                    <th>日付</th>
                    <th style="padding-left: 5px;">勤務体系</th>
                    <th style="padding-left: 5px;">事由</th>
                    <th style="padding-left: 5px;">出勤</th>
                    <th style="padding-left: 5px;">退出 </th>
                    <th style="padding-left: 5px;">外出</th>
                    <th style="padding-left: 5px;">再入</th>
                </tr>
            </thead>
            <tbody>
                    <tr style="width: 100%;">
                        <td style="padding-left: 15px; text-align: left; border-bottom-style: dotted;"></td>
                        <td style="padding-left: 10px; border-bottom-style: dotted;"></td>
                        <td style="border-bottom-style: dotted;"></td>
                        <td style="border-bottom-style: dotted;"></td>
                        <td style="padding-left: 5px; border-bottom-style: dotted;"></td>
                        <td style="padding-left: 5px; border-bottom-style: dotted;"></td>
                        <td style="padding-left: 5px; border-bottom-style: dotted;"></td>
                        <td style="padding-left: 5px; border-bottom-style: dotted;"></td>
                        <td style="padding-left: 5px; border-bottom-style: dotted;"></td>
                        <td style="padding-left: 5px; border-bottom-style: dotted;"></td>
                    </tr>
            </tbody>
        </table>
    </body>
    <?php else: ?>
    <?php $__currentLoopData = $time_stamp_datas->unique('DEPT_CD'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $time_stamp_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <body>
        <div class="date">
            <span>作成日：</span>
            <span><?php echo e($now_date); ?></span>
            <span style="margin-left:5px"><?php echo e($loop->iteration); ?> / <?php echo e($loop->count); ?></span>
        </div>
        <div class="header">
            <span>未打刻・二重打刻</span>
            <span>一覧表</span>
        </div>
        <div class="record">
            <span style="margin-left:10px;">対象日</span>
            <span>:</span>
            <span><?php echo e(date('Y/m/d', strtotime($str_date))); ?>(<?php echo e(config('consts.weeks')[date('w', strtotime($str_date))]); ?>)</span>
            <span>～</span>
            <span><?php echo e(date('Y/m/d', strtotime($end_date))); ?>(<?php echo e(config('consts.weeks')[date('w', strtotime($end_date))]); ?>)</span><br>
        </div>
        <div class="record">
            <span style="margin-left:20px;">部門</span>
            <span>:</span>
            <span><?php echo e($time_stamp_data['DEPT_CD']); ?></span>
            <span><?php echo e($time_stamp_data['DEPT_NAME']); ?></span>
        </div>
        <table class="workTable" style="width: 100%;">
            <thead>
                <tr style="width: 100%;">
                    <th style="padding-left: 5px;">未・二</th>
                    <th style="padding-left: 10px;">社員</th>
                    <th></th>
                    <th>日付</th>
                    <th style="padding-left: 5px;">勤務体系</th>
                    <th style="padding-left: 5px;">事由</th>
                    <th style="padding-left: 5px;">出勤</th>
                    <th style="padding-left: 5px;">退出 </th>
                    <th style="padding-left: 5px;">外出</th>
                    <th style="padding-left: 5px;">再入</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $previous_cd = '';
                    $previous_date = '';
                    $border = '';
                    $border_bottom = '';
                    $time_stamp_data = $time_stamp_datas->where('DEPT_CD', $time_stamp_data['DEPT_CD']);
                    $time_stamp_data = array_values($time_stamp_data->toArray());  
                ?>
                <?php $__currentLoopData = $time_stamp_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $date = date('Y/m/d', strtotime($data['CALD_DATE']));
                        $week = config('consts.weeks');
                    ?>
                    <?php
                        if ($previous_cd != "" && $previous_cd != $data['EMP_CD']) {
                            $border = 'table-border';
                        }
                        if (count($time_stamp_data)-1 == $key) {
                            $border_bottom = 'table-bottom-border';
                        }
                    ?>
                    
                    <tr style="width: 100%;">
                        <td class="<?php echo e($border); ?> <?php echo e($border_bottom); ?>" style="padding-left: 15px; text-align: left;">
                        <?php echo e((($data['OFC_CNT'] >= 2 && !$data['OFC_TIME_HH']) || ($data['LEV_CNT'] >= 2 && !$data['LEV_TIME_HH']) ||
                        ($data['OUT1_CNT'] >= 2 && !$data['OUT1_TIME_HH']) || ($data['IN1_CNT'] >= 2 && !$data['IN1_TIME_HH']) ||
                        ($data['OUT2_CNT'] >= 2 && !$data['OUT2_TIME_HH']) || ($data['IN2_CNT'] >= 2 && !$data['IN2_TIME_HH'])) ? '二' : '未'); ?>

                        </td>
                        <td class="<?php echo e($border); ?> <?php echo e($border_bottom); ?>" style="padding-left: 10px;"><?php echo e($data['EMP_CD'] == $previous_cd ? '' : $data['EMP_CD']); ?>

                        </td>
                        <td class="<?php echo e($border); ?> <?php echo e($border_bottom); ?>"><?php echo e($data['EMP_CD'] == $previous_cd ? '' : $data['EMP_NAME']); ?></td>
                        <td class="<?php echo e($border); ?> <?php echo e($border_bottom); ?>"><?php echo e(($data['EMP_CD'] == $previous_cd && $date == $previous_date) ? '' : $date . '('. $week[date("w", strtotime($data['CALD_DATE']))]. ')'); ?></td>
                        <td class="<?php echo e($border); ?> <?php echo e($border_bottom); ?>" style="padding-left: 5px;"><?php echo e(($data['EMP_CD'] == $previous_cd && $date == $previous_date) ? '' : $data['WORKPTN_NAME']); ?></td>
                        <td class="<?php echo e($border); ?> <?php echo e($border_bottom); ?>" style="padding-left: 5px;"><?php echo e(($data['EMP_CD'] == $previous_cd && $date == $previous_date) ? '' : $data['REASON_NAME']); ?></td>
 
                        <?php if(isset($input_datas['chkNoTime'])): ?>
                        <td class="<?php echo e($border); ?> <?php echo e($border_bottom); ?>" style="padding-left: 5px;">
                            <?php echo e((!getTimeRecord($data, $data['time_records'], '00') && !getTimeRecord($data, $data['time_records'], '01')) || (!getTimeRecord($data, $data['time_records'], '00') && getTimeRecord($data, $data['time_records'], '01'))? '未打刻' : getTimeRecord($data, $data['time_records'], '00')); ?>

                        </td>
                        <td class="<?php echo e($border); ?> <?php echo e($border_bottom); ?>" style="padding-left: 5px;">
                            <?php echo e((!getTimeRecord($data, $data['time_records'], '01') && !getTimeRecord($data, $data['time_records'], '00')) || (!getTimeRecord($data, $data['time_records'], '01') && getTimeRecord($data, $data['time_records'], '00'))? '未打刻' : getTimeRecord($data, $data['time_records'], '01')); ?>

                        </td>
                        <?php else: ?>
                        <td class="<?php echo e($border); ?> <?php echo e($border_bottom); ?>" style="padding-left: 5px;">
                            <?php echo e((!getTimeRecord($data, $data['time_records'], '00') && getTimeRecord($data, $data['time_records'], '01')) ? '未打刻' : getTimeRecord($data, $data['time_records'], '00')); ?>

                        </td>
                        <td class="<?php echo e($border); ?> <?php echo e($border_bottom); ?>" style="padding-left: 5px;">
                            <?php echo e((!getTimeRecord($data, $data['time_records'], '01') && getTimeRecord($data, $data['time_records'], '00')) ? '未打刻' : getTimeRecord($data, $data['time_records'], '01')); ?>

                        </td>
                        <?php endif; ?>

                        <td class="<?php echo e($border); ?> <?php echo e($border_bottom); ?>" style="padding-left: 5px;">
                        <?php echo e((!getTimeRecord($data, $data['time_records'], '02') && getTimeRecord($data, $data['time_records'], '03')) ? '未打刻' : getTimeRecord($data, $data['time_records'], '02')); ?>

                        </td>
                        <td class="<?php echo e($border); ?> <?php echo e($border_bottom); ?>" style="padding-left: 5px;">
                        <?php echo e((!getTimeRecord($data, $data['time_records'], '03') && getTimeRecord($data, $data['time_records'], '02')) ? '未打刻' : getTimeRecord($data, $data['time_records'], '03')); ?>

                        </td>
                        <?php
                        $previous_cd =  $data['EMP_CD'];
                        $previous_date =  $date;
                        ?>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </body>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?> 
</html><?php /**PATH C:\xampp\htdocs\06_SVN\resources\views/form_print/templates/TimeStampPdf.blade.php ENDPATH**/ ?>