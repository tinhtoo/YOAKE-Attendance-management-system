<!-- ログイン情報入力 -->


<?php $__env->startSection('title', 'ログイン情報入力'); ?>

<?php $__env->startSection('content'); ?>
    <div id="contents-stage">
        <table class="BaseContainerStyle1">
            <tbody>
                <tr>
                    <td>

                        <div id="UpdatePanel1">

                            <form action="" method="POST" id="form" autocomplete="off">
                                <?php echo csrf_field(); ?>
                                <table class="InputFieldStyle1">
                                    <tbody>
                                        <tr>
                                            <th>社員番号</th>
                                            <td>
                                                <input name="txtEmpCd" tabindex="1" disabled="disabled"
                                                    id="txtEmpCd" style="width: 80px;" type="text"
                                                    maxlength="10" value="<?php echo e($emp_data->EMP_CD); ?>">
                                                <input type="hidden" name="txtEmpCd" value="<?php echo e($emp_data->EMP_CD); ?>">
                                                <span id="lblEmpName"
                                                    style="width: 230px; display: inline-block;">
                                                    <?php echo e($emp_data->EMP_NAME); ?>

                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>ログインID</th>
                                            <td>
                                                <input name="txtLoginId" tabindex="2" id="txtLoginId"
                                                    style="width: 80px; ime-mode:disabled;" type="text" maxlength="10"
                                                    oninput="value = ngVerticalBar(value)" onfocus="this.select();"
                                                    value="<?php echo e(old('txtLoginId',!empty($request_data['txtLoginId']) ? $request_data['txtLoginId'] : $login_datas->LOGIN_ID ?? '')); ?>">
                                                <?php if($errors->has('txtLoginId')): ?>
                                                    <span class="text-danger"><?php echo e($errors->first('txtLoginId')); ?></span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>変更後パスワード</th>
                                            <td>
                                                <input name="txtNewPassword" tabindex="3" onfocus="this.select();"
                                                    id="txtNewPassword" style="width: 90px;" type="password" maxlength="10"
                                                    oninput="value = ngVerticalBar(value)">

                                                <?php if($errors->has('txtNewPassword')): ?>
                                                    <span
                                                        class="text-danger"><?php echo e($errors->first('txtNewPassword')); ?></span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>パスワード再入力</th>
                                            <td>
                                                <input name="txtNewPassword2" tabindex="4" onfocus="this.select();"
                                                    id="txtNewPassword2" style="width: 90px;" type="password"
                                                    maxlength="10">
                                                <?php if($errors->has('txtNewPassword2')): ?>
                                                    <span
                                                        class="text-danger"><?php echo e($errors->first('txtNewPassword2')); ?></span>
                                                <?php endif; ?>

                                            </td>
                                        </tr>
                                        <tr>
                                            <th>機能権限</th>
                                            <td>
                                                <select name="ddlPgAuth" tabindex="5" id="ddlPgAuth" style="width: 170px;"
                                                    value="<?php echo e(old('ddlPgAuth', !empty($auth_cd['PG_AUTH_CD']) ? $auth_cd['PG_AUTH_CD'] : '')); ?>">

                                                    <option value=""></option>
                                                    <?php $__currentLoopData = $pg_auth->unique('PG_AUTH_CD'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $auth_cd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($auth_cd->PG_AUTH_CD); ?>"
                                                            <?php echo e(($auth_cd->PG_AUTH_CD == $emp_data->PG_AUTH_CD && !empty($login_datas->LOGIN_ID) ? 'selected' : '') ??old('ddlPgAuth')); ?>>
                                                            <?php echo e($auth_cd->PG_AUTH_NAME); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php if($errors->has('ddlPgAuth')): ?>
                                                    <span
                                                        class="text-danger"><?php echo e($errors->first('ddlPgAuth')); ?></span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="line"></div>
                                <p class="ButtonField1"><input name="btnSearch" id="btnSearch"
                                        class="SearchButton submit-form" type="button" value="更新"
                                        data-url="<?php echo e(route('MT11LoginEdit.update', ['id' => $emp_data->EMP_CD])); ?>"
                                        onclick="return checkSubmit(this)">
                                    <input name="btnCancel" tabindex="7" id="btnCancel" onclick="location.reload();"
                                        type="button" value="キャンセル">
                                </p>

                            </form>
                        </div>

                    </td>
                </tr>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        //キャンセルボタン
        function Cancel() {
            $("#txtEmpCd, #txtEmpKana, #txtDeptCd, #deptName").val('');
        }

        // 全角なら自動で半角へ変更
        $(document).on("change", 'input', function() {
            let str = $(this).val()
            str = str.replace(/[Ａ-Ｚａ-ｚ０-９]/g, function(s) {
                return String.fromCharCode(s.charCodeAt(0) - 0xFEE0);
            });
            str = str.replace(/[^!-~]/g, "");
            $(this).val(str);
        });

        // 入力不可能文字：|
        ngVerticalBar = n => n.replace(/\|/g, '').replace(/[｜]/g, '');

        // 確認ダイアル
        function checkSubmit() {
            if (window.confirm("<?php echo e(getArrValue($error_messages, '1005')); ?>")) {
                //formボタンクリック
                $(document).on('click', '.submit-form', function() {
                    var url = $(this).data('url');
                    $('#form').attr('action', url);
                    $('#form').submit();
                });
            } else {
                return false;
            }
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('menu.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\06_SVN\resources\views/master/MT11LoginEditor.blade.php ENDPATH**/ ?>