<!-- 部門権限情報入力 -->

<?php $__env->startSection('title', '部門権限情報入力'); ?>
<?php $__env->startSection('content'); ?>
    <div id="contents-stage">
        <table class="BaseContainerStyle1">
            <tbody>
                <tr>
                    <td>
                        <div id="UpdatePanel1">
                            <form action="" method="post" id="form">
                                <?php echo csrf_field(); ?>
                                <table class="InputFieldStyle1">
                                    <tbody>
                                        <tr>
                                            <th>部門権限コード</th>
                                            <td>
                                                <input type="text" name="txtDeptAuthCd" id="txtDeptAuthCd" maxlength="6"
                                                    value="<?php echo e(old('txtDeptAuthCd') ?? $dept_auth_data->DEPT_AUTH_CD); ?>" tabindex="1"
                                                    style="width: 80px;" onFocus="this.select()" oninput="value = onlyHalfWord(value)"
                                                    <?php if(isset($dept_auth_data->DEPT_AUTH_CD)): ?>
                                                    disabled
                                                    <?php else: ?>
                                                    autofocus
                                                    onFocus="this.select()"
                                                    <?php endif; ?>
                                                    >
                                                    <?php $__errorArgs = ['txtDeptAuthCd'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger"><?php echo e(getArrValue($error_messages, $message)); ?></span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                <?php if(isset($dept_auth_data->DEPT_AUTH_CD)): ?>
                                                <input type="hidden" name="txtDeptAuthCd" value="<?php echo e($dept_auth_data->DEPT_AUTH_CD); ?>">
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>部門権限名</th>
                                            <td>
                                                <input type="search" name="txtDeptAuthName" id="txtDeptAuthName" maxlength="20"
                                                value="<?php echo e(old('txtDeptAuthName') ?? $dept_auth_data->DEPT_AUTH_NAME); ?>" tabindex="2"
                                                style="width: 300px;" onFocus="this.select()" oninput="value = ngVerticalBar(value)"
                                                <?php if(isset($dept_auth_data->DEPT_AUTH_NAME)): ?>
                                                autofocus
                                                onFocus="this.select()"
                                                <?php endif; ?>>
                                                <?php $__errorArgs = ['txtDeptAuthName'];
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

                            <input name="btnAllCheck" tabindex="3" id="btnAllCheck" type="button" value="全選択" >
                            <input name="btnAllNotCheck" tabindex="4" id="btnAllNotCheck" type="button" value="全解除">
                            <?php $__errorArgs = ['chkListSelect'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger"><?php echo e(getArrValue($error_messages, $message)); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                            <div class="GridViewStyle1 mg10" id="gridview-container">
                                <div class="GridViewPanelStyle7" id="pnlDeptAuth">

                                    <div>
                                        <table class="GridViewBorder GridViewPadding" id="gvDeptAuth"
                                            style="border-collapse: collapse;" border="1" rules="all" cellspacing="0">
                                            <tbody tabindex="5">
                                                <tr>
                                                    <th scope="col">&nbsp;</th>
                                                    <th scope="col">部門</th>
                                                </tr>
                                                <?php $__currentLoopData = $all_dept_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $num => $dept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                        <input type="checkbox" name="chkListSelect[<?php echo e($num); ?>]" id="chkListSelect"
                                                        value="<?php echo e($dept->DEPT_CD); ?>"
                                                        <?php $__currentLoopData = $dept_auth; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dept_cd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if((!old() && $dept->DEPT_CD === $dept_cd) || (old('chkListSelect.'.$num) === $dept->DEPT_CD)): ?>
                                                        checked
                                                        <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if((!isset($dept_auth_data->DEPT_AUTH_CD))): ?>
                                                        <?php echo e(old('chkListSelect.'.$num) === $dept->DEPT_CD ? ' checked' : ''); ?>

                                                        <?php endif; ?>
                                                        >
                                                    </td>
                                                    <td class="GridViewRowLeft">
                                                        <?php for($i = 0; $i < ($dept->LEVEL_NO); $i++): ?>
                                                        　　　
                                                        <?php endfor; ?>
                                                        <?php echo e($dept->DEPT_NAME); ?>

                                                    </td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                            <input type="hidden" name="hideDeptAuthCd" value="<?php echo e($dept_auth_data->DEPT_AUTH_CD); ?>">
                            <div class="line"></div>

                            <p class="ButtonField1">
                                <input type="button" value="更新" name="btnUpdate" tabindex="6" id="btnUpdate"
                                            class="ButtonStyle1 update"
                                            data-url="<?php echo e(url('master/MT13DeptAuthUpsert')); ?>">
                                <input type="button" name="btnCancel" tabindex="7" id="btnCancel"
                                            class="ButtonStyle1" value="キャンセル"
                                            onclick="location.reload();">
                                <input type="button" value="削除" name="btnDelete" tabindex="8" id="btnDelete"
                                            class="ButtonStyle1 delete"
                                            <?php if(!isset($dept_auth_data->DEPT_AUTH_CD)): ?>
                                            disabled
                                            <?php else: ?>
                                            data-url="<?php echo e(url('master/MT13DeptAuthDelete')); ?>"
                                            <?php endif; ?>
                                            >
                            </p>

                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>

// 全選択・全解除ボタン
$(document).ready(function () {

    $('#btnAllCheck').on('click', function () {
      $('input[type=checkbox]').prop( 'checked', true );
    });

    $('#btnAllNotCheck').on('click', function () {
      $('input[type=checkbox]').prop( 'checked', false );
    });

});

$(function() {
     // ENTER時に送信されないようにする
     $('input').not('[type="button"]').keypress(function(e) {
        if (e.which == 13) {
            return false;
        }
    });

    // 更新submit-form
    $(document).on('click', '.update', function() {
        if (!window.confirm("<?php echo e(getArrValue($error_messages, '1005')); ?>")) {
            return false;
        }
        var url = $(this).data('url');
        $('#form').attr('action', url);
        $('#form').submit();
    });

    // 削除処理submit-form
    $(document).on('click', '.delete', function() {
        if (!window.confirm("<?php echo e(getArrValue($error_messages, '1004')); ?>")) {
            return false;
        }
        var url = $(this).data('url');
        $('#form').attr('action', url);
        $('#form').submit();

    });

    // 機能権限名入力不可能文字：|
    ngVerticalBar = n => n.replace(/\|/g, '');

    // 機能権限コード英数半角のみ入力可
    onlyHalfWord = n => n.replace(/[０-９Ａ-Ｚａ-ｚ]/g, s => String.fromCharCode(s.charCodeAt(0) - 65248))
            .replace(/[^0-9a-zA-Z]/g, '');

});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('menu.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\06_SVN\resources\views/master/MT13DeptAuthEditor.blade.php ENDPATH**/ ?>