<?php $__env->startSection('header'); ?>
    <!-- ヘッダーの共通部分 -->
    <div id="header" style="text-align: right;">
        <div id="header-inner">
            <span>
                <img src="../images/WorkTmMng-corporate.jpg" alt="Corporate-Logo" />
            </span>
            <span>
                <img src="../images/WorkTmMng-title.gif" alt="勤怠管理システム" width="250" height="50">
            </span>
            <span style="float: right!important; padding:10px;">
                
                <br>
                <a href="<?php echo e(route('logout')); ?>" style="text-decoration: none; float: right;" class="" onclick="event.preventDefault();
                            if(confirm('ログアウトします。よろしいですか？')){document.getElementById('logout-form').submit()}">
                    <?php echo e(__('ログアウト')); ?>

                </a>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none">
                    <?php echo csrf_field(); ?>
                </form>
            </span>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\06_SVN\resources\views/common/header.blade.php ENDPATH**/ ?>