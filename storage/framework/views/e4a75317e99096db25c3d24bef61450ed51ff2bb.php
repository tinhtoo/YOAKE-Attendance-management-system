<!-- シフト月次更新処理画面 -->

<?php $__env->startSection('title', 'シフト月次更新処理'); ?>
<?php $__env->startSection('content'); ?>
<div id="contents-stage">
    <table class="BaseContainerStyle2">
        <tbody>
            <tr>
                <td>
                    <div id="ctl00_cphContentsArea_UpdatePanel1">
                        <form action="" method="post" id="form">
                            <?php echo csrf_field(); ?>
                            <table class="InputFieldStyle1">
                                <tbody>
                                    <tr>
                                        <th>対象月度</th>
                                        <td>
                                            <input type="text" id="yearMonth" class="yearMonth" name="yearMonth" autocomplete="off" onfocus="this.select();"
                                                tabindex="1" style="width: 100px;" value="<?php echo e($def_year.'年'.sprintf('%02d', $def_month).'月'); ?>" />
                                            <span class="text-danger error" id="dateError">
                                            <?php $__errorArgs = ['yearMonth'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <?php echo e(getArrValue($error_messages, $message)); ?>

                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>締日</th>
                                        <td>
                                            <select name="closingDateCd" tabindex="3"
                                                id="closingDateCd" style="width: 150px;">
                                                <?php $__currentLoopData = $closing_dates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $closing_date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($closing_date->CLOSING_DATE_CD); ?>"
                                                    <?php echo e($closing_date->CLOSING_DATE_CD == $def_closing_date_cd ? 'selected' : ''); ?>>
                                                    <?php echo e($closing_date->CLOSING_DATE_NAME); ?>

                                                </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="line"></div>

                            <input name="ctl00$cphContentsArea$btnSelectAll" tabindex="4"
                                onclick="changeAllCheckBoxStates(true)"
                                type="button" value="全選択">
                            <input name="ctl00$cphContentsArea$btnNotSelectAll" tabindex="5"
                                onclick="changeAllCheckBoxStates(false)"
                                type="button" value="全解除">
                            <span id="error" class="text-danger error">
                                <?php $__errorArgs = ['dept_cd'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <?php echo e(getArrValue($error_messages, $message)); ?>

                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </span>

                            <div class="GridViewStyle1 mg10" id="gridview-container">
                                <div class="GridViewPanelStyle7" id="ctl00_cphContentsArea_pnlDeptAuth"
                                    style="height: 645px;">

                                    <div>
                                        <table class="GridViewBorder GridViewPadding"
                                            id="ctl00_cphContentsArea_gvShiftCalendarCarryOver"
                                            style="border-collapse: collapse;" border="1" rules="all" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <th scope="col">&nbsp;</th>
                                                    <th scope="col">部門</th>
                                                </tr>
                                                <?php $__currentLoopData = $dept_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap; padding-top: 3px;">
                                                        <?php if(in_array($dept->DEPT_CD, $changeable_dept_cd_list)): ?>
                                                        <input type="checkbox" class="deptCheckbox" tabindex="6"
                                                            name="dept_cd[]" value="<?php echo e($dept->DEPT_CD); ?>"
                                                            id="checkbox<?php echo e($dept->DEPT_CD); ?>">
                                                        <?php endif; ?>
                                                    </td>
                                                    <td class="GridViewRowLeft">
                                                        <label class="OutlineLabel"
                                                            style="width: 100%; height: 17px; display: inline-block;
                                                            <?php if(in_array($dept->DEPT_CD, $changeable_dept_cd_list)): ?>
                                                            cursor: pointer;" for="checkbox<?php echo e($dept->DEPT_CD); ?><?php endif; ?>">
                                                        <?php for($i = 0; $i < $dept->LEVEL_NO; $i++): ?>
                                                        　　　
                                                        <?php endfor; ?>
                                                        <?php echo e($dept->DEPT_NAME); ?>

                                                        </span>
                                                    </td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="line"></div>
                            <p class="ButtonField1">
                                <input type="button" value="更新" tabindex="7"
                                    id="btnUpdate" name="btnUpdate" class="ButtonStyle1 update"
                                    data-url="<?php echo e(url('mng_oprt/ShiftCalendarCarryOver')); ?>">
                                <input type="button" value="キャンセル" tabindex="8"
                                    id="btnCancel" name="btnCancel" class="ButtonStyle1"
                                    onclick="location.href='<?php echo e(url('mng_oprt/ShiftCalendarCarryOver')); ?>'">
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
    $(function() {
        // ENTER時に送信されないようにする
        $('input').not('[type="button"]').keypress(function(e) {
            if (e.which == 13) {
                return false;
            }
        });

        // 更新
        $(document).on('click', '.update', function() {
            if (!window.confirm("<?php echo e(getArrValue($error_messages, 1005)); ?>")) {
                $("#btnUpdate").focus()
                return false;
            }

            var noChecked = $(".deptCheckbox:checked").length === 0;
            if (noChecked) {
                $('#error').text("<?php echo e(getArrValue($error_messages, 4002)); ?>")
            }

            var noDate = !$(".yearMonth").val();
            if (noDate) {
                $('#dateError').text("<?php echo e(getArrValue($error_messages, 2002)); ?>")
            }

            if (noChecked || noDate) {
                $("#btnUpdate").focus()
                return false;
            }

            var url = $(this).data('url');
            $('#form').attr('action', url);
            $('#form').submit();
        });

        // 値選択後、エラー文言削除
        $('#yearMonth').change(function() {
            if ($('.error').text()) {
                $('.error').text("");
            }
        });

        // 全チェックor全チェック外し
        changeAllCheckBoxStates = function(check) {
            $(".deptCheckbox").prop("checked", check);
        }

        // カレンダー機能の設定
        $('.yearMonth').datepicker({
            format: 'yyyy年mm月',
            autoclose: true,
            language: 'ja',
            minViewMode: 1,
            startDate: '<?php echo e($def_year - 1); ?>年01月',
            endDate: '<?php echo e($def_year + 1); ?>年12月'
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('menu.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\06_SVN\resources\views/mng_oprt/ShiftCalendarCarryOver.blade.php ENDPATH**/ ?>