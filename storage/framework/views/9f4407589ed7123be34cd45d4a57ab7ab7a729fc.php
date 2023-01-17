<?php $__env->startSection('header'); ?>
    <!-- ヘッダーの共通部分 -->
    <div id="header" style="text-align: right;">
        <div id="header-inner">
            <span>
                <img src="<?php echo e(asset('../images/WorkTmMng-corporate.jpg')); ?>" alt="Corporate-Logo" />
            </span>
            <span>
                <img src="<?php echo e(asset('../images/WorkTmMng-title.gif')); ?>" alt="勤怠管理システム" width="250" height="50">
            </span>
            <span id="header-welcom" style="float: right!important; padding:10px;">
                ようこそ <?php echo e(session('name')); ?> さん
                <br>
                <a class="signout" id="ctl00_lbLogout" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <?php echo e(__('Logout')); ?>

                </a>
                <form id="logout-form" action="<?php echo e(route('logout.form')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                </form>
            </span>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php /**PATH C:\xampp\htdocs\06_SVN\resources\views/common/header.blade.php ENDPATH**/ ?>