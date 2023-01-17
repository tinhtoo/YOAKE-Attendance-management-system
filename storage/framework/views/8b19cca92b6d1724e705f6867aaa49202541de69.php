<!-- 残業申請書作表画面 -->


<?php $__env->startSection('title', '残業申請書作表'); ?>

<?php $__env->startSection('content'); ?>
    <div id="contents-stage">
        <table class="BaseContainerStyle2">
            <tbody>
                <tr>
                    <td>
                        <div id="UpdatePanel4">
                            <form action="" method="post" id="form">
                                <?php echo e(csrf_field()); ?>

                                <table class="InputFieldStyle1">
                                    <tbody>
                                        <tr>
                                            <th>対象年月</th>
                                            <td>
                                                <input name="ddlDate"
                                                    type="text"
                                                    tabindex="1"
                                                    id="YearMonth"
                                                    autocomplete="off"
                                                    value="<?php echo e(old('ddlDate', !empty($input_datas['ddlDate']) ? $input_datas['ddlDate'] : $def_ddlDate )); ?>"
                                                />
                                                <?php $__errorArgs = ['ddlDate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span id="error-message" class="text-danger"><?php echo e(getArrValue($error_messages, $message)); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>開始部門コード</th>
                                            <td>
                                                <input name="filter[txtStartDeptCd]"
                                                    type="text"
                                                    tabindex="2"
                                                    id="txtDeptCd"
                                                    class="txtDeptCd searchDeptCd startDeptCd"
                                                    style="width: 50px;"
                                                    onfocus="this.select();"
                                                    oninput="value=onlyHalfWord(value)"
                                                    autocomplete="off"
                                                    maxlength="6"
                                                    value="<?php echo e(old('filter.txtStartDeptCd', !empty( $input_datas['filter']['txtStartDeptCd'])? $input_datas['filter']['txtStartDeptCd'] : '')); ?>"
                                                >
                                                <input name="btnSearchStartDeptCd"
                                                    type="button"
                                                    tabindex="3"
                                                    id="btnSearchStartDeptCd"
                                                    class="SearchButton"
                                                    onclick="SearchDept(this);return false"
                                                    value="?"
                                                >
                                                <input class="txtDeptName" id="deptName"
                                                    data-dispclscd=01 data-isdeptauth=true
                                                    style="width: 200px; display: inline-block;">
                                                <span class="text-danger" id="deptNameError"></span>
                                                <?php $__errorArgs = ['filter.txtStartDeptCd'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger" id="DeptCdValidError"><?php echo e(getArrValue($error_messages, $errors->first('filter.txtStartDeptCd'))); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>終了部門コード</th>
                                            <td>
                                                <input name="filter[txtEndDeptCd]"
                                                    type="text"
                                                    tabindex="4"
                                                    id="txtDeptCd"
                                                    class="txtDeptCd searchDeptCd endDeptCd"
                                                    style="width: 50px;"
                                                    onfocus="this.select();"
                                                    oninput="value=onlyHalfWord(value)"
                                                    autocomplete="off"
                                                    maxlength="6"
                                                    value="<?php echo e(old('filter.txtEndDeptCd', !empty( $input_datas['filter']['txtEndDeptCd'])? $input_datas['filter']['txtEndDeptCd'] : '')); ?>"
                                                >
                                                <input name="btnSearchEndDeptCd"
                                                    type="button"
                                                    tabindex="5"
                                                    id="btnSearchEndDeptCd"
                                                    class="SearchButton"
                                                    onclick="SearchDept(this);return false"
                                                    value="?"
                                                >
                                                <input class="txtDeptName" id="deptName"
                                                    data-dispclscd=01 data-isdeptauth=true
                                                    style="width: 200px; display: inline-block;">
                                                <span class="text-danger" id="deptNameError"></span>
                                                <?php $__errorArgs = ['filter.txtEndDeptCd'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger" id="DeptCdValidError"><?php echo e(getArrValue($error_messages, $errors->first('filter.txtEndDeptCd'))); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>開始社員番号 </th>
                                            <td>
                                                <input name="filter[txtStartEmpCd]"
                                                    type="text"
                                                    tabindex="6"
                                                    id="txtEmpCd"
                                                    class="txtEmpCd searchEmpCd"
                                                    style="width: 80px;"
                                                    onfocus="this.select();"
                                                    oninput="value=onlyHalfWord(value)"
                                                    autocomplete="off"
                                                    maxlength="10"
                                                    value="<?php echo e(old('filter.txtStartEmpCd', !empty( $input_datas['filter']['txtStartEmpCd'])? $input_datas['filter']['txtStartEmpCd'] : '')); ?>"
                                                >
                                                <input name="btnSearchStartEmpCd"
                                                    type="button"
                                                    tabindex="7"
                                                    id="btnSearchStartEmpCd"
                                                    class="SearchButton"
                                                    onclick="SearchEmp(this);return false"
                                                    value="?"
                                                >
                                                <input class="txtEmpName" id="empName"
                                                    data-regclscd=00 data-isdeptauth=true
                                                    style="width: 200px; display: inline-block;">
                                                <span class="text-danger" id="EmpCdError"></span>
                                                <?php $__errorArgs = ['filter.txtStartEmpCd'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger" id="EmpCdValidError"><?php echo e(getArrValue($error_messages, $errors->first('filter.txtStartEmpCd'))); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>終了社員番号</th>
                                            <td>
                                                <input name="filter[txtEndEmpCd]"
                                                    type="text"
                                                    tabindex="8"
                                                    id="txtEmpCd"
                                                    class="txtEmpCd searchEmpCd"
                                                    style="width: 80px;"
                                                    onfocus="this.select();"
                                                    oninput="value=onlyHalfWord(value)"
                                                    autocomplete="off"
                                                    maxlength="10"
                                                    value="<?php echo e(old('filter.txtEndEmpCd', !empty( $input_datas['filter']['txtEndEmpCd'])? $input_datas['filter']['txtEndEmpCd'] : '')); ?>"
                                                >
                                                <input name="btnSearchEndEmpCd"
                                                    type="button"
                                                    tabindex="9"
                                                    id="btnSearchEndEmpCd"
                                                    class="SearchButton"
                                                    onclick="SearchEmp(this);return false"
                                                    value="?"
                                                >
                                                <input class="txtEmpName" id="empName"
                                                    data-regclscd=00 data-isdeptauth=true
                                                    style="width: 200px; display: inline-block;">
                                                <span class="text-danger" id="EmpCdError"></span>
                                                <?php $__errorArgs = ['filter.txtEndEmpCd'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger" id="EmpCdValidError"><?php echo e(getArrValue($error_messages, $errors->first('filter.txtEndEmpCd'))); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="line"></div>
                                <p class="ButtonField1">
                                    <input name="btnPrint"
                                        type="button"
                                        tabindex="10"
                                        id="btnPrint"
                                        class="ButtonStyle1 print"
                                        value="印刷"
                                        data-url="<?php echo e(route('OvertimeAplPdf.print')); ?>"
                                    >
                                    <input name="btnCancel"
                                        type="button"
                                        tabindex="11"
                                        id="btnCancel"
                                        class="ButtonStyle1"
                                        value="キャンセル"
                                        onclick=" location.href='<?php echo e(route('OvertimeAplPrint.index')); ?>' "
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
$(function() {
    // 印刷
    $(document).on('click', '.print', function() {
        var message = "<?php echo e(getArrValue($error_messages, 1011)); ?>";
        if (window.confirm(message.replace('{0}','残業申請書'))) {
            var url = $(this).data('url');
            $('#form').attr('action', url);
            $('#form').submit();
        }
        return false;
    });

    $(function() {
        $('#YearMonth').datepicker({
            format: 'yyyy年mm月',
            autoclose: true,
            language: 'ja',
            minViewMode : 1
        });
    })

    $(function() {
    // 入力可能文字：半角英文字・数字のみ
    onlyHalfWord = n => n.replace(/[０-９Ａ-Ｚａ-ｚ]/g, s => String.fromCharCode(s.charCodeAt(0) - 65248))
                        .replace(/[^0-9a-zA-Z]/g, '');
    })

})
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('menu.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\06_SVN\resources\views/form_print/OvertimeAplPrint.blade.php ENDPATH**/ ?>