<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Document</title>
</head>
<body>
勤務実績表(社員別月報)A3縦PTN2用
WorktimeDailyPortrait2Pdf
    <table>
        <?php
        $seconddata = 0;
        $record = 0;
        ?>
            
        <?php $__currentLoopData = $wtEmpDailyLandscapeKey->unique('DEPT_CD'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <th>DEPTCD</th>
                <th>DEPTNAME</th>
                <th>EMPCD</th>
            </tr>
                <?php $__currentLoopData = $data['time_records']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($val['DEPT_CD']); ?></td>
                    <td><?php echo e($val['DEPT_NAME']); ?></td>
                    <td><?php echo e($val['EMP_CD']); ?> </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
</body>
</html><?php /**PATH C:\xampp\htdocs\06_SVN\resources\views/form_print/templates/WorktimeDailyPortrait2Pdf.blade.php ENDPATH**/ ?>