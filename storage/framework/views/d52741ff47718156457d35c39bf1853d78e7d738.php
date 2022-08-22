<!-- 社員番号一括変換 -->


<?php $__env->startSection('title', '社員番号一括変換 '); ?>

<?php $__env->startSection('content'); ?>
    <div id="contents-stage">
        <table class="BaseContainerStyle1">
            <tbody>
                <tr>
                    <td>
                        <div id="UpdatePanel1">
                            <form action="<?php echo e(route('MT10EmpCnvert.update')); ?>" method="post"
                                onsubmit="return checkSubmit()">
                                <?php echo csrf_field(); ?>
                                <table class="InputFieldStyle1">
                                    <tbody>
                                        <tr>
                                            <th>旧社員番号</th>
                                            <td>
                                                <input name="txtEmpCd" id="txtEmpCd" class="searchEmpCd txtEmpCd" tabindex="1" onfocus="this.select();"
                                                    oninput="value = onlyNumbers(value)" style="width: 80px;" type="text"
                                                    maxlength="10" value="<?php echo e(old('txtEmpCd')); ?>" autofocus>
                                                <input name="btnSearchEmpCd" class="SearchButton" id="btnSearchEmpCd"
                                                    tabindex="2" type="button" value="?" onclick="SearchEmp(this);return false">
                                                <input name="empName" type="text" data-isdeptauth=true
                                                    style="width: 200px; display: inline-block;" id="empName"
                                                    disabled="disabled" class="txtEmpName">
                                                <span class="text-danger" id="EmpCdError"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>新社員番号</th>
                                            <td>
                                                <input name="txtNewEmpCd" tabindex="3" tabindex="3" onfocus="this.select();"
                                                    oninput="value = onlyNumbers(value)" id="txtNewEmpCd"
                                                    style="width: 80px;" type="text" maxlength="10" value="<?php echo e(old('txtNewEmpCd')); ?>">
                                                <?php if($errors->has('txtNewEmpCd')): ?>
                                                    <span class="text-danger">
                                                        <?php echo e($errors->first('txtNewEmpCd')); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="line"></div>
                                <p class="ButtonField1">
                                    <input name="btnUpdate" tabindex="4" id="btnUpdate" onclick="" type="submit" value="更新">
                                    <input name="btnCancel" tabindex="5" id="btnCancel"
                                        onclick="location.href='MT10EmpCnvert'" type="button" value="キャンセル">
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
        // キャンセル、削除処理submit-form
        $(document).on('click', '.submit-form', function() {
            var url = $(this).data('url');
            $('#form').attr('action', url);
            $('#form').submit();
        });

        function checkSubmit() {
            $checked = confirm("<?php echo e(getArrValue($error_messages, '1005')); ?>")
            if ($checked == true) {
                return true;
            } else {
                return false;
            }
        }
        $(function() {
            // 旧社員番号英数半角のみ入力可
            onlyHalfWord = n => n.replace(/[０-９Ａ-Ｚａ-ｚ]/g, s => String.fromCharCode(s.charCodeAt(0) - 65248))
                .replace(/[^0-9a-zA-Z]/g, '');

            // 入力不可能文字：|
            ngVerticalBar = n => n.replace(/\|/g, '');
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('menu.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\06_SVN\resources\views/master/MT10EmpCnvert.blade.php ENDPATH**/ ?>