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

    <div class="contents-login">
        <div class="login-innere">
            <form method="POST" action="<?php echo e(route('auth.check')); ?>">
                <?php echo csrf_field(); ?>
                <strong class="title">
                    <span id="login_title"><?php echo e(__('ログインIDとパスワードを入力してください。')); ?></span>
                </strong>
                <!-- ユーザID入力とパスワード入力 -->
                <table>
                    <tr>
                        <th>
                            <label for="loginId"><?php echo e(__('ログインID：')); ?></label>
                        </th>
                        <td>
                            <input name="txtLoginId" class="input-txt imeoff" type="text" style="width: 90px;" maxlength="10">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <label for="loginPwd"><?php echo e(__('パスワード：')); ?></label>
                        </th>
                        <td>
                            <input name="password" class="input-txt imeoff" type="password" style="width: 90px" maxlength="10">
                            <br />
                            <div class="button">
                                <button type="submit" class="btn btn-secondary" name="login-btn">
                                    <?php echo e(__('ログイン')); ?>

                                </button>
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('common.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\06_SVN\resources\views/auth/login.blade.php ENDPATH**/ ?>