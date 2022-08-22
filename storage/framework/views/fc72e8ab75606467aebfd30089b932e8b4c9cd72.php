<!-- 勤務状況照会(管理者用)   -->

<?php $__env->startSection('title', '勤務状況照会(管理者用) '); ?>
<?php $__env->startSection('content'); ?>
    <div id="contents-stage">
        <table>
            <tbody>
                <tr>
                    <td>
                        <div id="UpdatePanel1">
                            <!-- header -->
                            <form action="" method="post" id="form">
                                <?php echo csrf_field(); ?>
                                <table class="InputFieldStyle1">
                                    <tbody>
                                        <tr>
                                            <th>対象月度</th>
                                            <td>
                                                <input name="filter[ddlDate]" id="YearMonth" type="text" style="width: 90px;" onfocus="this.select();" autocomplete="off"
                                                    <?php if(!isset($results) || $results->isEmpty()): ?> autofocus <?php endif; ?>
                                                    value="<?php echo e(old('filter.ddlDate', !empty($search_data['ddlDate']) ? $search_data['ddlDate'] : $def_ddlDate)); ?>" />
                                                <?php $__errorArgs = ['filter.ddlDate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger">
                                                <?php echo e(getArrValue($error_messages, $message)); ?>

                                                </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>表示区分</th>
                                            <td>
                                                <div class="GroupBox1" style="width: 220px;">
                                                    <input name="filter[SearchCondition]" id="rbSearchDept" type="radio"
                                                        value="rbSearchDept"
                                                        <?php echo e(old('filter.SearchCondition',!empty($search_data['SearchCondition']) ? $search_data['SearchCondition'] : '') == 'rbSearchDept'? 'checked': ''); ?>

                                                        checked>
                                                    <label for="rbSearchDept">部門</label>
                                                    <input name="filter[SearchCondition]" id="rbSearchEmp" type="radio"
                                                        value="rbSearchEmp" class="rbSearchEmp"
                                                        <?php echo e(old('filter.SearchCondition',!empty($search_data['SearchCondition']) ? $search_data['SearchCondition'] : '') == 'rbSearchEmp'? 'checked': ''); ?>>
                                                    <label for="rbSearchEmp">社員</label>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>締日</th>
                                            <td>
                                                <select name="filter[ddlClosingDate]" id="ddlClosingDate"
                                                    style="width: 150px;">
                                                    <?php if(isset($closing_dates)): ?>
                                                        <?php $__currentLoopData = $closing_dates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $closing_date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($closing_date->CLOSING_DATE_CD); ?>"
                                                                <?php echo e(old('filter.ddlClosingDate', !empty($search_data['ddlClosingDate']) ? $search_data['ddlClosingDate'] : '') ==$closing_date->CLOSING_DATE_CD? 'selected': ''); ?>>
                                                                <?php echo e($closing_date->CLOSING_DATE_NAME); ?>

                                                            </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </select>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>部門</th>
                                            <td>
                                                <input name="filter[txtDeptCd]" class="searchDeptCd txtDeptCd" onfocus="this.select();"
                                                    style="width: 50px;" type="text" id="txtDeptCd" oninput="value=onlyHalfWord(value)"
                                                    value="<?php echo e(old('filter.txtDeptCd', !empty($search_data['txtDeptCd']) ? $search_data['txtDeptCd'] : '')); ?>"
                                                    maxlength="6">
                                                <input name="btnSearchDeptCd" class="SearchButton" id="btnSearchDeptCd"
                                                    type="button" value="?" onclick="SearchDept(this);return false">
                                                <input class="txtDeptName" name="deptName" type="text" data-dispclscd=01 data-isdeptauth=true
                                                    style="width: 200px; display: inline-block;" id="deptName"
                                                    readonly="readonly">
                                                <?php $__errorArgs = ['filter.txtDeptCd'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger" id="DeptCdValidError"><?php echo e(getArrValue($error_messages, $message)); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                <span class="text-danger" id="deptNameError"></span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>開始所属</th>
                                            <td>
                                                <select name="filter[ddlStartCompany]" id="ddlStartCompany"
                                                    style="width: 300px;">
                                                    <option value=""></option>
                                                    <?php if(isset($company_list)): ?>
                                                        <?php $__currentLoopData = $company_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($company->COMPANY_CD); ?>"
                                                                <?php echo e(old('filter.ddlStartCompany',!empty($search_data['ddlStartCompany']) ? $search_data['ddlStartCompany'] : '') == $company->COMPANY_CD? 'selected': ''); ?>>
                                                                <?php echo e($company->COMPANY_ABR); ?>

                                                            </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </select>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>終了所属</th>
                                            <td>
                                                <select name="filter[ddlEndCompany]" id="ddlEndCompany"
                                                    style="width: 300px;">
                                                    <option value=""></option>
                                                    <?php if(isset($company_list)): ?>
                                                        <?php $__currentLoopData = $company_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($company->COMPANY_CD); ?>"
                                                                <?php echo e(old('filter.ddlEndCompany', !empty($search_data['ddlEndCompany']) ? $search_data['ddlEndCompany'] : '') ==$company->COMPANY_CD? 'selected': ''); ?>>
                                                                <?php echo e($company->COMPANY_ABR); ?>

                                                            </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </select>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>社員番号</th>
                                            <td>
                                                <input name="filter[txtEmpCd]" class="searchEmpCd txtEmpCd" id="txtEmpCd" onfocus="this.select();"
                                                    value="<?php echo e(old('filter.txtEmpCd', !empty($search_data['txtEmpCd']) ? $search_data['txtEmpCd'] : '')); ?>"
                                                    style="width: 80px;" type="text" maxlength="10" oninput="value=onlyHalfWord(value)">
                                                <input name="btnSearchEmpCd" class="SearchButton" id="btnSearchEmpCd"
                                                    type="button" value="?" onclick="SearchEmp(this);return false">
                                                <input name="empName" class="txtEmpName" type="text"
                                                    style="width: 200px; display: inline-block;" id="empName"
                                                    readonly="readonly" data-regclscd=00 data-isdeptauth=true>
                                                <?php $__errorArgs = ['filter.txtEmpCd'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger" id="EmpCdValidError"><?php echo e(getArrValue($error_messages, $message)); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                <span class="text-danger" id="EmpCdError">
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="line"></div>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td style="width: auto;">
                                                <input name="btnDisp" id="btnShow" class="ButtonStyle1 submit-form"
                                                    type="button" value="表示" data-url="<?php echo e(route('ewtr.search')); ?>">
                                                <input name="btnCancel2" class="ButtonStyle1 submit-form" id="btnCancel2"
                                                    type="button" value="キャンセル" data-url="<?php echo e(route('ewtr.cancel')); ?>">
                                                &nbsp;
                                                <?php if(isset($results)): ?>
                                                    <?php if(count($results) > 0): ?>
                                                        <?php if(isset($confirm_check) && $confirm_check): ?>
                                                            <span class="font-style2">確定済</span>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <!-- detail -->
                                <div class="GridViewStyle1" id="gridview-container">
                                    <div class="GridViewPanelStyle1" id="pnlEmpWorkTime" style="width: 911px;">
                                        <div id="pnlWorkTime">
                                            <div>
                                                <table
                                                    class="GridViewBorder GridViewPadding GridViewRowCenter GridViewRowCut fixRowCol"
                                                    id="gvEmpWorkTime" style="border-collapse:separate;" border="1"
                                                    rules="all" cellspacing="0">
                                                    <tbody id="gridview-warp">
                                                        <?php if(isset($results)): ?>
                                                            <?php if($results->isEmpty()): ?>
                                                                <tr style="width:70px;">
                                                                    <td><span><?php echo e(getArrValue($error_messages, '4029')); ?></span></td>
                                                                </tr>
                                                            <?php else: ?>
                                                                <tr class="sticky-top">
                                                                    <th class="fixedcol" scope="col" style="background: #4682B4; left: 0px;">部門コード</th>
                                                                    <th class="fixedcol" scope="col" style="background: #4682B4; left: 80px;">部門名</th>
                                                                    <th class="fixedcol" scope="col" style="background: #4682B4; left: 210px;">社員番号</th>
                                                                    <th class="fixedcol" scope="col" style="background: #4682B4; left: 290px;">社員名</th>
                                                                    <th class="fixedcol" scope="col" style="background: #4682B4; left: 420px;">カレンダー名称</th>
                                                                    <th scope="col">出勤</th>
                                                                    <th scope="col">休出</th>
                                                                    <th scope="col">特休</th>
                                                                    <th scope="col">有休</th>
                                                                    <th scope="col">欠勤</th>
                                                                    <th scope="col">代休</th>
                                                                    <th scope="col">出勤時間</th>
                                                                    <th scope="col">遅刻時間</th>
                                                                    <th scope="col">早退時間</th>
                                                                    <th scope="col">外出時間</th>
                                                                    <?php for($i = 0; $i < 6; $i++): ?>
                                                                    <th scope="col">
                                                                        <?php if(key_exists($i, $ovtm_header_names)): ?>
                                                                        <?php echo e($ovtm_header_names[$i]['WORK_DESC_NAME']); ?>

                                                                        <?php endif; ?>
                                                                    </th>
                                                                    <?php endfor; ?>
                                                                    <?php for($i = 0; $i < 3; $i++): ?>
                                                                    <th scope="col">
                                                                        <?php if(key_exists($i, $ext_header_names)): ?>
                                                                        <?php echo e($ext_header_names[$i]['WORK_DESC_NAME']); ?>

                                                                        <?php endif; ?>
                                                                    </th>
                                                                    <?php endfor; ?>
                                                                </tr>
                                                                <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <tr>
                                                                        <td class="fixedcol" style="width: 80px; left: 0;">
                                                                            <span id="lblDeptCd" style="text-align: left!important;text-indent: 3px!important;width: 80px; display: inline-block;">
                                                                                <?php echo e($result->DEPT_CD); ?>

                                                                            </span>
                                                                        </td>
                                                                        <td class="fixedcol" style="width: 130px; left: 80px;">
                                                                            <span id="lblDeptName" style="text-align: left!important;text-indent: 3px!important;width: 130px; display: inline-block;">
                                                                                <?php echo e($result->DEPT_NAME); ?>

                                                                            </span>
                                                                        </td>
                                                                        <td class="fixedcol" style="width: 80px; left: 210px;">
                                                                            <span id="lblEmpCd" style="text-align: left!important;text-indent: 3px!important;width: 80px; display: inline-block;">
                                                                                <?php echo e($result->EMP_CD); ?>

                                                                            </span>
                                                                        </td>
                                                                        <td class="fixedcol" style="width: 130px; left: 290px;">
                                                                            <span id="lblEmpName" style="text-align: left!important;text-indent: 3px!important;width: 130px; display: inline-block;">
                                                                                <?php echo e($result->EMP_NAME); ?>

                                                                            </span>
                                                                        </td>
                                                                        <td class="fixedcol" style="width: 130px; left: 420px;">
                                                                            <span id="lblCalendarName" style="text-align: left!important;text-indent: 3px!important;width: 150px; display: inline-block;">
                                                                                <?php echo e($result->CALENDAR_NAME); ?>

                                                                            </span>
                                                                        </td>
                                                                        <td>
                                                                            <span id="lblSumWorkdayCnt" style="width: 50px; display: inline-block;"><?php echo e($result->SUM_WORKDAY_CNT); ?></span>
                                                                        </td>
                                                                        <td>
                                                                            <span id="lblSumHolworkCnt" style="width: 50px; display: inline-block;"><?php echo e($result->SUM_HOLWORK_CNT); ?></span>
                                                                        </td>
                                                                        <td>
                                                                            <span id="lblSumSpcholCnt" style="width: 50px; display: inline-block;"><?php echo e($result->SUM_SPCHOL_CNT); ?></span>
                                                                        </td>
                                                                        <td>
                                                                            <span id="lblSumPadholCnt" style="width: 50px; display: inline-block;"><?php echo e($result->SUM_PADHOL_CNT); ?></span>
                                                                        </td>
                                                                        <td>
                                                                            <span id="lblSumAbcdCnt" style="width: 50px; display: inline-block;"><?php echo e($result->SUM_ABCWORK_CNT); ?></span>
                                                                        </td>
                                                                        <td>
                                                                            <span id="lblSumCompdayCnt" style="width: 50px; display: inline-block;"><?php echo e($result->SUM_COMPDAY_CNT); ?></span>
                                                                        </td>
                                                                        <td>
                                                                            <span id="lblSumWorkTime" style="width: 60px; display: inline-block;"><?php echo e($result->SUM_WORK_TIME); ?></span>
                                                                        </td>
                                                                        <td>
                                                                            <span id="lblSumTardTime" style="width: 60px; display: inline-block;"><?php echo e($result->SUM_TARD_TIME); ?></span>
                                                                        </td>
                                                                        <td>
                                                                            <span id="lblSumLeaveTime" style="width: 60px; display: inline-block;"><?php echo e($result->SUM_LEAVE_TIME); ?></span>
                                                                        </td>
                                                                        <td>
                                                                            <span id="lblSumOutTime" style="width: 60px; display: inline-block;"><?php echo e($result->SUM_OUT_TIME); ?></span>
                                                                        </td>
                                                                        <td>
                                                                            <span id="lblSumOvtm1Time" style="width: 60px; display: inline-block;"><?php echo e($result->SUM_OVTM1_TIME); ?></span>
                                                                        </td>
                                                                        <td>
                                                                            <span id="lblSumOvtm2Time" style="width: 60px; display: inline-block;"><?php echo e($result->SUM_OVTM2_TIME); ?></span>
                                                                        </td>
                                                                        <td>
                                                                            <span id="lblSumOvtm3Time" style="width: 60px; display: inline-block;"><?php echo e($result->SUM_OVTM3_TIME); ?></span>
                                                                        </td>
                                                                        <td>
                                                                            <span id="lblSumOvtm4Time" style="width: 60px; display: inline-block;"><?php echo e($result->SUM_OVTM4_TIME); ?></span>
                                                                        </td>
                                                                        <td>
                                                                            <span id="lblSumOvtm5Time" style="width: 60px; display: inline-block;"><?php echo e($result->SUM_OVTM5_TIME); ?></span>
                                                                        </td>
                                                                        <td>
                                                                            <span id="lblSumOvtm6Time" style="width: 60px; display: inline-block;"><?php echo e($result->SUM_OVTM6_TIME); ?></span>
                                                                        </td>
                                                                        <td>
                                                                            <span id="lblSumExt1Time" style="width: 60px; display: inline-block;"><?php echo e($result->SUM_EXT1_TIME); ?></span>
                                                                        </td>
                                                                        <td>
                                                                            <span id="lblSumExt2Time" style="width: 60px; display: inline-block;"><?php echo e($result->SUM_EXT2_TIME); ?></span>
                                                                        </td>
                                                                        <td>
                                                                            <span id="lblSumExt3Time" style="width: 60px; display: inline-block;"><?php echo e($result->SUM_EXT3_TIME); ?></span>
                                                                        </td>
                                                                    </tr>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- footer -->
                                    <div class="line"></div>
                                    <p class="ButtonField2">
                                        <input name="btnCancel2" class="ButtonStyle1 submit-form" id="btnCancel2"
                                            <?php if(isset($results) && !$results->isEmpty()): ?> autofocus <?php endif; ?>
                                            type="button" value="キャンセル" data-url="<?php echo e(route('ewtr.cancel')); ?>">
                                    </p>
                                </div>
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
        function toggleRadio(ele, first=false) {
            $("#txtEmpCd, #btnSearchEmpCd").prop("disabled", true);
            $("#txtDeptCd, #ddlStartCompany, #ddlEndCompany, #ddlClosingDate, #btnSearchDeptCd").prop("disabled", false);
            if (!first) {
                $("#deptNameError, #DeptCdValidError, #EmpCdError, #EmpCdValidError").text('');
            }
            if (ele.hasClass('rbSearchEmp')) {
                $("#txtEmpCd, #btnSearchEmpCd").prop("disabled", false);
                $("#txtDeptCd, #ddlStartCompany, #ddlEndCompany, #ddlClosingDate, #btnSearchDeptCd").prop("disabled", true);
                $("#txtDeptCd, #deptName, #ddlStartCompany, #ddlEndCompany").val('');
            } else {
                $("#txtEmpCd, #empName").val('');
            }
        }
        toggleRadio($("input[type='radio']:checked"), true);

        // ボタンクリック
        $(document).on('click', '.submit-form', function() {
            var url = $(this).data('url');
            $('#form').attr('action', url);
            $('#form').submit();
        });
        // 無効化
        $('input:radio').on('click', function() {
            toggleRadio($(this));
        })

        $('#YearMonth').datepicker({
            format: 'yyyy年mm月',
            autoclose: true,
            language: 'ja',
            minViewMode: 1
        });

        // 入力可能文字：半角英数
        onlyHalfWord = n => n.replace(/[０-９Ａ-Ｚａ-ｚ]/g, s => String.fromCharCode(s.charCodeAt(0) - 65248))
            .replace(/[^0-9a-zA-Z]/g, '');
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('menu.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\06_SVN\resources\views/work_time/EmpWorkTimeReference.blade.php ENDPATH**/ ?>