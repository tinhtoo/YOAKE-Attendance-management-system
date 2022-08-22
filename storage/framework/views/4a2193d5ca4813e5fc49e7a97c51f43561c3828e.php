<!--ログイン画面-->


<?php $__env->startSection('title', '勤怠管理システム_login'); ?>

<?php $__env->startSection('login'); ?>
<!-- ヘッダーの共通部分 -->
<div id="header">
    <div id="header-inner">
        <span>
            <img src="../images/WorkTmMng-corporate.jpg" alt="Corporate-Logo" />
        </span>
        <span>
            <img src="../images/WorkTmMng-title.gif" alt="勤怠管理システム" width="250" height="50">
        </span>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="contents-login">
                <div class="login-innere">
                    <form method="POST" action="<?php echo e(route('auth.check')); ?>">
                        <?php echo csrf_field(); ?>
                        <strong class="title" style="margin-bottom: 30px;">
                            <span id="login_title" class="gutters"><?php echo e(__('ログインIDとパスワードを入力してください。')); ?></span>
                        </strong>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end"><?php echo e(__('ログインID：')); ?></label>

                            <div class="col-md-6">
                                <input id="txtLoginId" type="text" class="form-control border <?php $__errorArgs = ['txtLoginId'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="txtLoginId" value="<?php echo e(old('txtLoginId')); ?>" autocomplete="txtLoginId" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end"><?php echo e(__('パスワード：')); ?></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control border <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" autocomplete="current-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-6">
                                <button type="submit" class="btn btn-secondary rounded-0" style="margin-bottom: 30px;">
                                    <?php echo e(__('ログイン')); ?>

                                </button>

                                <?php if(Session::get('fail')): ?>
                                    <div class="text-danger"><?php echo e(Session::get('fail')); ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('common.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\06_SVN\resources\views/auth/login.blade.php ENDPATH**/ ?>