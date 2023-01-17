<!-- 勤怠予定表(週・月別)画面 -->


<?php $__env->startSection('title', '勤務予定表(週・月別)'); ?>

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
                                            <th>帳票区分</th>
                                            <td>
                                                <div class="GroupBox1">
                                                    <input name="ReportCategory"
                                                        type="radio"
                                                        tabindex="1"
                                                        id="rbWeek"
                                                        class="rbWeek"
                                                        value="rbWeek"
                                                        <?php echo e(old('ReportCategory',!empty( $input_data['ReportCategory']) ? $input_data['ReportCategory'] : '') == 'rbWeek'? 'checked': ''); ?>

                                                        <?php if(empty( $input_data['ReportCategory'])): ?>
                                                        checked
                                                        <?php endif; ?>
                                                        >
                                                        <label for="rbWeek">週間</label>
                                                    <input name="ReportCategory"
                                                        type="radio"
                                                        tabindex="2"
                                                        id="rbMonth"
                                                        class="rbMonth"
                                                        value="rbMonth"
                                                        <?php echo e(old('ReportCategory',!empty( $input_data['ReportCategory']) ? $input_data['ReportCategory'] : '') == 'rbMonth'? 'checked': ''); ?>

                                                        >
                                                        <label for="rbMonth">月間</label>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="clearBoth"></div>

                                <table class="InputFieldStyle1">
                                    <tbody>
                                        <tr>
                                            <th>開始対象日</th>
                                            <td>
                                                <input type="text"
                                                    name="txtStartTargetDate"
                                                    class="yearMonthDay"
                                                    autocomplete="off"
                                                    tabindex="3"
                                                    value="<?php echo e(old('txtStartTargetDate', !empty( $input_data['txtStartTargetDate']) ? $input_data['txtStartTargetDate'] : '')); ?>"
                                                >
                                                <span name="range" id="lblDateRange"><?php echo e(old('range', !empty( $input_data['range'])? $input_data['range'] : config('consts.week_range'))); ?></span>
                                                <?php $__errorArgs = ['txtStartTargetDate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span id="error-message" class="text-danger" style="padding-left: 30px;"><?php echo e(getArrValue($error_messages, $message)); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                <input type="hidden" name="range" id="range" value="<?php echo e(old('range', config('consts.week_range'))); ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>開始部門コード</th>
                                            <td>
                                                <input name="filter[txtStartDeptCd]"
                                                    type="text"
                                                    tabindex="4"
                                                    id="txtDeptCd"
                                                    class="txtDeptCd searchDeptCd startDeptCd"
                                                    style="width: 50px;"
                                                    onfocus="this.select();"
                                                    oninput="value=onlyHalfWord(value)"
                                                    autocomplete="off"
                                                    maxlength="6"
                                                    value="<?php echo e(old('filter.txtStartDeptCd', !empty( $input_data['filter']['txtStartDeptCd'])? $input_data['filter']['txtStartDeptCd'] : '')); ?>"
                                                >
                                                <input name="btnSearchStartDeptCd"
                                                    type="button"
                                                    tabindex="5"
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
                                                    tabindex="6"
                                                    id="txtDeptCd"
                                                    class="txtDeptCd searchDeptCd endDeptCd"
                                                    style="width: 50px;"
                                                    onfocus="this.select();"
                                                    oninput="value=onlyHalfWord(value)"
                                                    autocomplete="off"
                                                    maxlength="6"
                                                    value="<?php echo e(old('filter.txtEndDeptCd', !empty( $input_data['filter']['txtEndDeptCd'])? $input_data['filter']['txtEndDeptCd'] : '')); ?>"
                                                >
                                                <input name="btnSearchEndDeptCd"
                                                    type="button"
                                                    tabindex="7"
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
                                                    tabindex="8"
                                                    id="txtEmpCd"
                                                    class="txtEmpCd searchEmpCd"
                                                    style="width: 80px;"
                                                    onfocus="this.select();"
                                                    oninput="value=onlyHalfWord(value)"
                                                    autocomplete="off"
                                                    maxlength="10"
                                                    value="<?php echo e(old('filter.txtStartEmpCd', !empty( $input_data['filter']['txtStartEmpCd'])? $input_data['filter']['txtStartEmpCd'] : '')); ?>"
                                                >
                                                <input name="btnSearchStartEmpCd"
                                                    type="button"
                                                    tabindex="9"
                                                    id="btnSearchStartEmpCd"
                                                    class="SearchButton"
                                                    onclick="SearchEmp(this);return false"
                                                    value="?"
                                                >
                                                <input class="txtEmpName" id="empName"
                                                    data-isdeptauth=true
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
                                                    tabindex="10"
                                                    id="txtEmpCd"
                                                    class="txtEmpCd searchEmpCd"
                                                    style="width: 80px;"
                                                    onfocus="this.select();"
                                                    oninput="value=onlyHalfWord(value)"
                                                    autocomplete="off"
                                                    maxlength="10"
                                                    value="<?php echo e(old('filter.txtEndEmpCd', !empty( $input_data['filter']['txtEndEmpCd'])? $input_data['filter']['txtEndEmpCd'] : '')); ?>"
                                                >
                                                <input name="btnSearchEndEmpCd"
                                                    type="button"
                                                    tabindex="11"
                                                    id="btnSearchEndEmpCd"
                                                    class="SearchButton"
                                                    onclick="SearchEmp(this);return false"
                                                    value="?"
                                                >
                                                <input class="txtEmpName" id="empName"
                                                    data-isdeptauth=true
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
                                        tabindex="12"
                                        id="btnPrint"
                                        class="ButtonStyle1 print"
                                        value="印刷"
                                        data-url="<?php echo e(route('WorkPlanPrint.print')); ?>"
                                    >
                                    <input name="btnCancel"
                                        type="button"
                                        tabindex="13"
                                        id="btnCancel"
                                        class="ButtonStyle1"
                                        value="キャンセル"
                                        onclick=" location.href='<?php echo e(route('WorkPlanPrint.index')); ?>' "
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
        var rbWeek = $('.rbWeek').prop('checked');
        var rbMonth = $('.rbMonth').prop('checked');
        var message = "<?php echo e(getArrValue($error_messages, 1011)); ?>";
        if (rbWeek) {
            $('#lblDateRange').text('<?php echo e(config("consts.week_range")); ?>');
            if (window.confirm(message.replace('{0}','勤務予定表(週間)'))) {
                var url = $(this).data('url');
                $('#form').attr('action', url);
                $('#form').submit();
            }
            return false;
        }

        if (rbMonth) {
            $('#lblDateRange').text('<?php echo e(config("consts.month_range")); ?>');
            if (window.confirm(message.replace('{0}','勤務予定表(月間)'))) {
                var url = $(this).data('url');
                $('#form').attr('action', url);
                $('#form').submit();
            }
            return false;
        }

    });

    // 帳票区分
    $('input:radio').on('click', function() {
        toggleRadio($(this));
        $('#error-message').text('');
    })

    function toggleRadio(ele) {
        if (ele.hasClass('rbWeek')) {
            $('#lblDateRange').text('<?php echo e(config("consts.week_range")); ?>');
            sessionStorage.setItem('range', '<?php echo e(config("consts.week_range")); ?>');
        }
        if (ele.hasClass('rbMonth')) {
            $('#lblDateRange').text('<?php echo e(config("consts.month_range")); ?>');
            sessionStorage.setItem('range', '<?php echo e(config("consts.month_range")); ?>');
        }
        getSession();
    }

    function getSession(){
            var ranges = window.sessionStorage.getItem(['range']);
            $('#range').val(ranges);
        }

    $(function() {
    // 入力可能文字：半角英文字・数字のみ
    onlyHalfWord = n => n.replace(/[０-９Ａ-Ｚａ-ｚ]/g, s => String.fromCharCode(s.charCodeAt(0) - 65248))
                        .replace(/[^0-9a-zA-Z]/g, '');

    // 入力可能文字：半角英数字のみ
    onlyHalfNumber = n => n.replace(/[０-９]/g, s => String.fromCharCode(s.charCodeAt(0) - 65248))
    .replace(/[^0-9]/g, '');
    })

    $('.yearMonthDay').datepicker({
        format: 'yyyy年mm月dd日',
        autoclose: true,
        language: 'ja',       // カレンダー日本語化のため
        startDate: '1900年01月01日',
        endDate: '2100年12月31日'
    });
})
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('menu.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\06_SVN\resources\views/form_print/WorkPlanPrint.blade.php ENDPATH**/ ?>