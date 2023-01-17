<!-- 出退勤情報クリア処理画面 -->

<?php $__env->startSection('title', '出退勤情報クリア処理'); ?>
<?php $__env->startSection('content'); ?>
    <div id="contents-stage">
        <table class="BaseContainerStyle1">
            <tbody>
                <tr>
                    <td>
                        <div id="UpdatePanel1">

                            <table class="InputFieldStyle1">
                                <tbody>
                                    <tr>
                                        <th>削除区分</th>
                                        <td>
                                            <div class="GroupBox1">
                                                <input type="radio" name="clearCategory"  id="rbEmpCls" value="0" tabindex="1" class="clearCategory" data-category="#emp"
                                                    <?php echo e(!old('clearCategory', !empty($input_data['clearCategory']) ? $input_data['clearCategory'] : '') ? 'checked' : ''); ?>>
                                                <label for="rbEmpCls">社員</label>
                                                <input type="radio" name="clearCategory"  id="rbDeptCls" value="1" tabindex="2" class="clearCategory" data-category="#dept"
                                                    <?php echo e(old('clearCategory', !empty($input_data['clearCategory']) ? $input_data['clearCategory'] : '') ? 'checked' : ''); ?>>
                                                <label for="rbDeptCls">部門</label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="InputFieldStyle1">
                                <tbody>
                                    <tr>
                                        <th>開始対象日</th>
                                        <td>
                                            <input type="text"
                                                    name="startDate"
                                                    id="YearMonth"
                                                    class="date"
                                                    autocomplete="off"
                                                    onfocus="this.select();"
                                                    tabindex="3"
                                                    value="<?php echo e(old('startDate', !empty(Session::get('ymd_date')) ? Session::get('ymd_date'): date('Y年n月j日') )); ?>"
                                                    <?php if(!empty($results)): ?>
                                                    disabled="disabled"
                                                    <?php endif; ?>
                                            />
                                            <?php $__errorArgs = ['startDate'];
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
                                        <th>終了対象日</th>
                                        <td>
                                            <input type="text"
                                                    name="endDate"
                                                    id="YearMonth"
                                                    class="date"
                                                    autocomplete="off"
                                                    onfocus="this.select();"
                                                    tabindex="4"
                                                    value="<?php echo e(old('endDate', !empty(Session::get('ymd_date')) ? Session::get('ymd_date'): date('Y年n月j日') )); ?>"
                                                    <?php if(!empty($results)): ?>
                                                    disabled="disabled"
                                                    <?php endif; ?>
                                            />
                                            <?php $__errorArgs = ['endDate'];
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

                            <div id="emp"
                                <?php echo e(!old('clearCategory', !empty($input_data['clearCategory']) ? $input_data['clearCategory'] : '') ? '' : 'style=display:none'); ?>>
                                <table class="InputFieldStyle1">
                                    <tbody>
                                        <tr>
                                            <th>社員番号</th>
                                            <td>
                                                <input name="txtEmpCd"
                                                    id="txtEmpCd"
                                                    class="searchEmpCd txtEmpCd"
                                                    style="width: 80px;"
                                                    type="text"
                                                    maxlength="10"
                                                    value="<?php echo e(old('txtEmpCd', !empty($search_data['txtEmpCd'])?$search_data['txtEmpCd']:'')); ?>"
                                                    oninput="value=onlyHalfNumWord(value)"
                                                    tabindex="5"
                                                    >
                                                <input name="btnSearchEmpCd"
                                                    class="SearchButton"
                                                    id="btnSearchEmpCd"
                                                    type="button"
                                                    value="?"
                                                    onclick="SearchEmp(this);return false"
                                                    tabindex="6"
                                                >
                                                <input name="empName"
                                                    class="txtEmpName"
                                                    type="text"
                                                    style="width: 200px; display: inline-block;"
                                                    id="empName"
                                                    data-regclscd=00,01 data-isdeptauth=true
                                                    disabled="disabled"
                                                >
                                                <?php $__errorArgs = ['txtEmpCd'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e(getArrValue($error_messages, $message)); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                <span class="text-danger" id="EmpCdError"></span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div id="dept" 
                                <?php echo e(old('clearCategory', !empty($input_data['clearCategory']) ? $input_data['clearCategory'] : '') ? '' : 'style=display:none'); ?>>
                                <input type="button" onclick="changeAllCheckBoxStates(true)" value="全選択"  tabindex="7">
                                <input type="button" onclick="changeAllCheckBoxStates(false)" value="全解除"  tabindex="8">
                                <span id="deptError" class="text-danger">
                                </span>

                                <div class="GridViewStyle1 mg10" id="gridview-container">
                                    <div class="GridViewPanelStyle7" style="height: 645px;">

                                        <div>
                                            <table class="GridViewBorder GridViewPadding" style="border-collapse: collapse;" border="1" rules="all" cellspacing="0">
                                                <tbody>
                                                    <tr>
                                                        <th scope="col">&nbsp;</th>
                                                        <th scope="col">部門</th>
                                                    </tr>
                                                    <?php $__currentLoopData = $dept_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap; padding-top: 3px;">
                                                            <?php if(in_array($dept->DEPT_CD, $changeable_dept_cd_list)): ?>
                                                            <input type="checkbox" class="deptCheckbox"
                                                                name="dept_cd[]" tabindex="6" value="<?php echo e($dept->DEPT_CD); ?>"
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
                            </div>

                            <div class="line"></div>

                            <p class="ButtonField1">
                                <input name="btnDataClear" tabindex="15"
                                    id="btnDataClear"
                                    class="clear"
                                    data-url = "<?php echo e(route('WorkTimeClear.clear')); ?>"
                                    type="button" value="データクリア">
                                <input name="btnCancel" tabindex="16"
                                    id="btnCancel"
                                    class="cancel"
                                    data-url = "<?php echo e(route('WorkTimeClear.index')); ?>"
                                    type="button" value="キャンセル">
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
$(function() {
    // formボタンクリック
    $(document).on('click', '.submit-form', function(){
        var url = $(this).data('url');
        $('#form').attr('action', url);
        $('#form').submit();
    });

    // 更新時ダイアログ
    $(document).on('click', '.clear', function() {
        if (window.confirm("<?php echo e(getArrValue($error_messages, 3001)); ?>")) {
            var url = $(this).data('url');
            $('#form').attr('action', url);
            $('#form').submit();
        } 
        return false;
    });

    // キャンセル
    $(document).on('click', '.cancel', function() {
        var url = $(this).data('url');
        $('#form').attr('action', url);
        $('#form').submit();
    });

    $('.date').datepicker({
        format: 'yyyy年m月d日',
        autoclose: true,
        language: 'ja', // カレンダー日本語化のため
        minViewMode : 1
    });

    $(document).on('click', '#rbEmpCls', function() {
        $("#emp").show();
        $("#dept").hide();
    });

    $(document).on('click', '#rbDeptCls', function() {
        $("#emp").hide();
        $("#dept").show();
    });
})
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('menu.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\06_SVN\resources\views/mng_oprt/WorkTimeClear.blade.php ENDPATH**/ ?>