<!-- 機能権限情報入力-->


<?php $__env->startSection('title', '機能権限情報入力'); ?>

<?php $__env->startSection('content'); ?>
    <div id="contents-stage">
        <table class="BaseContainerStyle1">
            <tbody>
                <tr>
                    <td>
                        <div id="ctl00_cphContentsArea_UpdatePanel1">
                            <form action="" method="post" id="form">
                                <?php echo csrf_field(); ?>
                                <table class="InputFieldStyle1">
                                    <tbody>
                                        <tr>
                                            <th >機能権限コード</th>
                                            <td>
                                                <input type="text" name="PG_AUTH_CD" id="PG_AUTH_CD" maxlength="6"
                                                        oninput="value = onlyHalfNumber(value)"
                                                        value="<?php echo e(old('PG_AUTH_CD') ?? $pgAuth_data->PG_AUTH_CD); ?>"
                                                        style="width: 80px;"  tabindex="1"
                                                        <?php if(isset($pgAuth_data->PG_AUTH_CD)): ?>
                                                        disabled
                                                        <?php else: ?>
                                                        autofocus
                                                        onFocus="this.select()"
                                                        <?php endif; ?>
                                                        >
                                                        <?php if(isset($pgAuth_data->PG_AUTH_CD)): ?>
                                                        <input type="hidden" name="PG_AUTH_CD" value=<?php echo e($pgAuth_data->PG_AUTH_CD); ?>>
                                                        <?php endif; ?>
                                                        <?php $__errorArgs = ['PG_AUTH_CD'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="text-danger"><?php echo e(getArrValue($error_messages, $message)); ?></span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>機能権限名</th>
                                            <td>
                                                <input type="search" name="PG_AUTH_NAME" id="PG_AUTH_NAME"
                                                    oninput="value = ngVerticalBar(value)"
                                                    value="<?php echo e(old('PG_AUTH_NAME') ?? $pgAuth_data->PG_AUTH_NAME); ?>"
                                                    style="width: 230px;" maxlength="20" tabindex="2"
                                                    <?php if(isset($pgAuth_data->PG_AUTH_NAME)): ?>
                                                    autofocus
                                                    onFocus="this.select()"
                                                    <?php endif; ?>
                                                    >
                                                    <?php $__errorArgs = ['PG_AUTH_NAME'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger"><?php echo e(getArrValue($error_messages, $message)); ?></span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="line"></div>
                                <div style="text-align: left;">
                                    <input name="SelectAll" tabindex="3"
                                        id="btn"
                                        type="button" value="全選択">
                                    <input name="NotSelectAll" tabindex="4"
                                        id="btn2"
                                        type="button" value="全解除">
                                    <?php $__errorArgs = ['checkList'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e(getArrValue($error_messages, $message)); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="GridViewStyle1 mg10" id="gridview-container">
                                    <div class="GridViewPanelStyle7" id="ctl00_cphContentsArea_pnlPgAuth">
                                        <div>
                                            <table tabindex="5" class="GridViewBorder GridViewPadding"
                                                id="ctl00_cphContentsArea_gvPgAuth" style="border-collapse: collapse;"
                                                border="1" rules="all" cellspacing="0">
                                                <tbody>
                                                    <tr>
                                                        <th scope="col">&nbsp;</th>
                                                        <th scope="col">
                                                            分類
                                                        </th>
                                                        <th style="white-space: nowrap;" scope="col">
                                                            プログラム名
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <?php $__currentLoopData = $pg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $checkB): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td>
                                                                <input type="checkbox" name="checkList[]" id="checkList"
                                                                value="<?php echo e($checkB->PG_CD); ?>" <?php echo e($checkB->PG_AUTH_CD != null ? 'checked' : ''); ?>

                                                                <?php if(!isset($pgAuth_data->PG_AUTH_CD)): ?>
                                                                <?php echo e(( is_array (old('checkList')) && in_array ($checkB->PG_CD, old('checkList')) ) ? ' checked' : ''); ?>

                                                                <?php endif; ?>
                                                                >
                                                            </td>
                                                            <td><?php echo e($checkB->MCLS_NAME); ?></td>
                                                            <td><?php echo e($checkB->PG_NAME); ?></td>
                                                        </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="change" value="<?php echo e($pgAuth_data->PG_AUTH_CD); ?>">

                                <div class="line"></div>
                                <p class="ButtonField1">
                                    <input type="button" value="更新" name="btnUpdate" tabindex="6" id="btnUpdate"
                                                        class="ButtonStyle1 update"
                                                        data-url="<?php echo e(url('master/MT14PgAuthUpdate')); ?>">
                                    <input type="button" name="btnCancel" tabindex="7" id="btnCancel"
                                                        class="ButtonStyle1" value="キャンセル"
                                                        onclick="location.reload();">
                                    <input type="button" value="削除" name="btnDelete" tabindex="8" id="btnDelete"
                                                        class="ButtonStyle1 delete"
                                                        <?php if(!isset($pgAuth_data->PG_AUTH_CD)): ?>
                                                        disabled="disabled"
                                                        <?php else: ?>
                                                        data-url="<?php echo e(url('master/MT14PgAuthDelete')); ?>"
                                                        <?php endif; ?>
                                                        >
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
    // ENTER時に送信されないようにする
    $('input').not('[type="button"]').keypress(function(e) {
        if (e.which == 13) {
            return false;
        }
    });

    // キャンセルボタン
    function Cancel() {
            $("#PG_AUTH_CD, #PG_AUTH_NAME, #checkList").val('');
        }

    // 全選択・全解除ボタン
    $(document).ready(function () {

        $('#btn').on('click', function () {
          $('input[type=checkbox]').prop( 'checked', true );
        });

        $('#btn2').on('click', function () {
          $('input[type=checkbox]').prop( 'checked', false );
        });

    });

    $(function() {
        // 更新submit-form
        $(document).on('click', '.update', function() {
            if (window.confirm("<?php echo e(getArrValue($error_messages, '1005')); ?>")) {
                var url = $(this).data('url');
                $('#form').attr('action', url);
                $('#form').submit();
            }
            return false;

        });

        // 削除処理submit-form
        $(document).on('click', '.delete', function() {
            if (window.confirm("<?php echo e(getArrValue($error_messages, '1004')); ?>")) {
                var url = $(this).data('url');
                $('#form').attr('action', url);
                $('#form').submit();
            }
            return false;
        });

        // 機能権限コード英数半角のみ入力可
        onlyHalfNumber = n => n.replace(/[０-９]/g, s => String.fromCharCode(s.charCodeAt(0) - 65248))
                                            .replace(/\D/g, '');
        // 入力不可能文字：|
        ngVerticalBar = n => n.replace(/\|/g, '');

    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('menu.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\06_SVN\resources\views/master/MT14PGAuthEditor.blade.php ENDPATH**/ ?>