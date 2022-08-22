<!-- 出退勤照会画面 -->

<?php $__env->startSection('title', '出退勤照会'); ?>
<?php $__env->startSection('content'); ?>
    <div id="contents-stage">
        <table>
            <tbody>
                <tr>
                    <td>
                        <div id="UpdatePanel1">
                            <form action="" method="POST" id="form">
                                <?php echo e(csrf_field()); ?>

                                <table class="InputFieldStyle1">
                                    <tbody>
                                        <tr>
                                            <th>対象年月日</th>
                                            <td>
                                                <?php echo e(csrf_field()); ?>

                                                <input type="text" id="YearMonthDay" name="filter[ddlDate]" tabindex="1"
                                                    <?php if(!isset($empWorkTimeResults) || $empWorkTimeResults->isEmpty()): ?> autofocus <?php endif; ?>
                                                    value="<?php echo e(old('filter.ddlDate', !empty($search_data['filter']) ? $search_data['filter']['ddlDate'] : date('Y年m月d日'))); ?>" />
                                                <span class="text-danger ">
                                                <?php $__errorArgs = ['filter.ddlDate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <?php echo e(getArrValue($error_messages, $message)); ?>

                                                <?php endif; ?>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>部門</th>
                                            <td>
                                                <input name="filter[txtDeptCd]" tabindex="2" class="txtDeptCd searchDeptCd"
                                                    id="txtDeptCd" style="width: 50px;" type="text" maxlength="6" oninput="value=onlyHalfWord(value)"
                                                    value="<?php echo e(old('filter.txtDeptCd', (!empty($search_data['filter']) ? $search_data['filter']['txtDeptCd'] : ''))); ?>">
                                                <input name="btnSearchDeptCd" class="SearchButton" id="btnSearchDeptCd"
                                                    tabindex="3" type="button" value="?" onclick="SearchDept(this);return false">
                                                <input name="deptName" id="deptName" class="txtDeptName" type="text"
                                                    data-dispclscd=01 data-isdeptauth=True
                                                    style="width: 200px; display: inline-block;"
                                                    disabled="disabled">
                                                <span class="text-danger" id="deptNameError"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>開始所属</th>
                                            <td>
                                                <select name="filter[ddlStartCompany]" tabindex="4"
                                                    id="ddlStartCompany" style="width: 300px;">
                                                    <option value=""></option>
                                                    <?php if(isset($haken_company)): ?>
                                                        <?php $__currentLoopData = $haken_company; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $companyName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($companyName->COMPANY_CD); ?>"
                                                                <?php echo e(old('filter.ddlStartCompany', !empty($search_data['filter']) ? $search_data['filter']['ddlStartCompany'] : '') == $companyName->COMPANY_CD ? 'selected' : ''); ?>>
                                                                <?php echo e($companyName->COMPANY_ABR); ?>

                                                            </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </select>


                                            </td>
                                        </tr>
                                        <tr>
                                            <th>終了所属</th>
                                            <td>
                                                <select name="filter[ddlEndCompany]" tabindex="5" 
                                                    id="ddlEndCompany" style="width: 300px;">
                                                    <option value=""></option>
                                                    <?php if(isset($haken_company)): ?>
                                                        <?php $__currentLoopData = $haken_company; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $companyName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($companyName->COMPANY_CD); ?>"
                                                                <?php echo e(old('filter.ddlEndCompany', !empty($search_data['filter']) ? $search_data['filter']['ddlEndCompany'] : '') == $companyName->COMPANY_CD ? 'selected' : ''); ?>>
                                                                <?php echo e($companyName->COMPANY_ABR); ?>

                                                            </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </select>

                                            </td>
                                        </tr>
                                        <tr>
                                            <th>社員番号</th>
                                            <td>
                                                <input name="filter[txtEmpCd]" tabindex="6" class="txtEmpCd searchEmpCd"
                                                    id="txtEmpCd" style="width: 80px;" type="text" maxlength="10" oninput="value=onlyHalfWord(value)"
                                                    value="<?php echo e(old('filter.txtEmpCd', !empty($search_data['filter']) ? $search_data['filter']['txtEmpCd'] : '')); ?>">
                                                <input name="btnSearchEmpCd" tabindex="7" class="SearchButton"
                                                    id="btnSearchEmpCd" onclick="SearchEmp(this);return false" type="button"
                                                    value="?">
                                                <input name="empName" id="empName" class="txtEmpName" type="text"
                                                    data-regclscd=00 data-isdeptauth=true
                                                    style="width: 200px; display: inline-block;"
                                                    disabled="disabled">
                                                &nbsp;
                                                <span class="text-danger" id="EmpCdError"></span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>


                                <div class="mg10" style="text-align:left;border-bottom: 4px solid #fff;">
                                    <input tabindex="7" id="btnSelectAll" onclick="changeAllCheckBoxStates(true);"
                                        type="button" value="全選択">
                                    <input tabindex="8" id="btnNotSelectAll" onclick="changeAllCheckBoxStates(false);"
                                        type="button" value="全解除">
                                </div>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <form action="" name="checkform" method="GET">
                                                    <table class="GroupBox3">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <input type="checkbox" name="filter[check][ckWorkd]" value="01"
                                                                        <?php echo e((!empty($errors->all()) && !old('filter.check.ckWorkd') || 
                                                                            !empty($search_data['filter']) && !empty($search_data['filter']['check']) && !key_exists('ckWorkd', $search_data['filter']['check']))
                                                                             ? '' : 'checked'); ?>

                                                                        id="ckWorkd" tabindex="9" class="check">
                                                                    <label for="ckWorkd">通常</label>
                                                                    <input type="checkbox" name="filter[check][ckPadh]" value="02"
                                                                        <?php echo e((!empty($errors->all()) && !old('filter.check.ckPadh') || 
                                                                            !empty($search_data['filter']) && !empty($search_data['filter']['check']) && !key_exists('ckPadh', $search_data['filter']['check']))
                                                                             ? '' : 'checked'); ?>

                                                                        id="ckPadh" tabindex="10" class="check">
                                                                    <label for="ckPadh">有休</label>

                                                                    <input type="checkbox" name="filter[check][ckPadbh]" value="03"
                                                                        <?php echo e((!empty($errors->all()) && !old('filter.check.ckPadbh') || 
                                                                            !empty($search_data['filter']) && !empty($search_data['filter']['check']) && !key_exists('ckPadbh', $search_data['filter']['check']))
                                                                             ? '' : 'checked'); ?>

                                                                        id="ckPadbh" tabindex="11" class="check">
                                                                    <label for="ckPadbh">前休</label>

                                                                    <input type="checkbox" name="filter[check][ckPadah]" value="04"
                                                                        <?php echo e((!empty($errors->all()) && !old('filter.check.ckPadah') || 
                                                                            !empty($search_data['filter']) && !empty($search_data['filter']['check']) && !key_exists('ckPadah', $search_data['filter']['check']))
                                                                             ? '' : 'checked'); ?>

                                                                        id="ckPadah" tabindex="12" class="check">
                                                                    <label for="ckPadah">後休</label>

                                                                    <input type="checkbox" name="filter[check][ckCompd]" value="05"
                                                                        <?php echo e((!empty($errors->all()) && !old('filter.check.ckCompd') || 
                                                                            !empty($search_data['filter']) && !empty($search_data['filter']['check']) && !key_exists('ckCompd', $search_data['filter']['check']))
                                                                             ? '' : 'checked'); ?>

                                                                        id="ckCompd" tabindex="13" class="check">
                                                                    <label for="ckCompd">代休</label>

                                                                    <input type="checkbox" name="filter[check][ckCompbd]" value="06"
                                                                        <?php echo e((!empty($errors->all()) && !old('filter.check.ckCompbd') || 
                                                                            !empty($search_data['filter']) && !empty($search_data['filter']['check']) && !key_exists('ckCompbd', $search_data['filter']['check']))
                                                                             ? '' : 'checked'); ?>

                                                                        id="ckCompbd" tabindex="14" class="check">
                                                                    <label for="ckCompbd">前代</label>

                                                                    <input type="checkbox" name="filter[check][ckCompad]" value="07"
                                                                        <?php echo e((!empty($errors->all()) && !old('filter.check.ckCompad') || 
                                                                            !empty($search_data['filter']) && !empty($search_data['filter']['check']) && !key_exists('ckCompad', $search_data['filter']['check']))
                                                                             ? '' : 'checked'); ?>

                                                                        id="ckCompad" tabindex="15" class="check">
                                                                    <label for="ckCompad">後代</label>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="checkbox" name="filter[check][ckSpch]" value="08"
                                                                        <?php echo e((!empty($errors->all()) && !old('filter.check.ckSpch') || 
                                                                            !empty($search_data['filter']) && !empty($search_data['filter']['check']) && !key_exists('ckSpch', $search_data['filter']['check']))
                                                                             ? '' : 'checked'); ?>

                                                                        id="ckSpch" tabindex="16" class="check">
                                                                    <label for="ckSpch">特休</label>

                                                                    <input type="checkbox" name="filter[check][ckAbcd]" value="09"
                                                                        <?php echo e((!empty($errors->all()) && !old('filter.check.ckAbcd') || 
                                                                            !empty($search_data['filter']) && !empty($search_data['filter']['check']) && !key_exists('ckAbcd', $search_data['filter']['check']))
                                                                             ? '' : 'checked'); ?>

                                                                        id="ckAbcd" tabindex="17" class="check">
                                                                    <label for="ckAbcd">欠勤</label>

                                                                    <input type="checkbox" name="filter[check][ckDirg]" value="10"
                                                                        <?php echo e((!empty($errors->all()) && !old('filter.check.ckDirg') || 
                                                                            !empty($search_data['filter']) && !empty($search_data['filter']['check']) && !key_exists('ckDirg', $search_data['filter']['check']))
                                                                             ? '' : 'checked'); ?>

                                                                        id="ckDirg" tabindex="18" class="check">
                                                                    <label for="ckDirg">直行</label>

                                                                    <input type="checkbox" name="filter[check][ckDirr]" value="11"
                                                                        <?php echo e((!empty($errors->all()) && !old('filter.check.ckDirr') || 
                                                                            !empty($search_data['filter']) && !empty($search_data['filter']['check']) && !key_exists('ckDirr', $search_data['filter']['check']))
                                                                             ? '' : 'checked'); ?>

                                                                        id="ckDirr" tabindex="19" class="check">
                                                                    <label for="ckDirr">直帰</label>

                                                                    <input type="checkbox" name="filter[check][ckDirqr]" value="12"
                                                                        <?php echo e((!empty($errors->all()) && !old('filter.check.ckDirqr') || 
                                                                            !empty($search_data['filter']) && !empty($search_data['filter']['check']) && !key_exists('ckDirqr', $search_data['filter']['check']))
                                                                             ? '' : 'checked'); ?>

                                                                        id="ckDirqr" tabindex="20" class="check">
                                                                    <label for="ckDirqr">直直</label>

                                                                    <input type="checkbox" name="filter[check][ckBusj]" value="13"
                                                                        <?php echo e((!empty($errors->all()) && !old('filter.check.ckBusj') || 
                                                                            !empty($search_data['filter']) && !empty($search_data['filter']['check']) && !key_exists('ckBusj', $search_data['filter']['check']))
                                                                             ? '' : 'checked'); ?>

                                                                        id="ckBusj" tabindex="21" class="check">
                                                                    <label for="ckBusj">出張</label>

                                                                    <input type="checkbox" name="filter[check][ckDelay]" value="14"
                                                                        <?php echo e((!empty($errors->all()) && !old('filter.check.ckDelay') || 
                                                                            !empty($search_data['filter']) && !empty($search_data['filter']['check']) && !key_exists('ckDelay', $search_data['filter']['check']))
                                                                             ? '' : 'checked'); ?>

                                                                        id="ckDelay" tabindex="22" class="check">
                                                                    <label for="ckDelay">遅延</label>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </form>
                                            </td>
                                            <td class="pd5Left">
                                                <?php $__errorArgs = ['filter.check'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span
                                                    <span class="text-danger"><?php echo e(getArrValue($error_messages, $message)); ?></span>
                                                </span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="line">
                                    <hr>
                                </div>

                                <table>
                                    <tbody>
                                        <tr>
                                            <td style="width: auto;">
                                                <input name="btnDisp" class="ButtonStyle1 submit-form" id="btnShow"
                                                    type="button" value="表示" onclick="return" tabindex="23"
                                                    data-url="<?php echo e(route('empworkstatusRef.search')); ?>"
                                                    style="width: 80px;">
                                                <input name="btnCancel2" class="ButtonStyle1 cancel-submit" id="btnCancel2"
                                                    type="button" value="キャンセル" tabindex="24"
                                                    data-url="<?php echo e(route('empworkstatusRef.cancel')); ?>"
                                                    style="width: 80px;">
                                                &nbsp;
                                                <span id="lblNoStampColor" style="background-color: tomato;">　　　</span>
                                                <span id="lblNoStamp">未打刻</span>
                                                &nbsp;
                                                <span id="lblDbStampColor"
                                                    style="background-color: lightskyblue;">　　　</span>
                                                <span id="lblDbStamp">二重打刻</span>
                                                <?php if(isset($work_count)): ?>
                                                <span class="font-style2" id="lblFixMsg" style="margin-left:20em"><?php echo e($work_count); ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="right">
                                                <span class="font-style1" id="lblDispCaldDate"></span>
                                                &nbsp;
                                                <span class="font-style1" id="lblDispOfcTime"></span>
                                                &nbsp;
                                                <span class="font-style1" id="lblDispLevTime"></span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <!-- detail -->
                                <div class="GridViewStyle1" id="gridview-container">
                                    <div class="GridViewPanelStyle2" id="pnlEmpWorkStatus" style="width: 990px;">
                                        <div>
                                            <table tabindex="25" class="GridViewBorder" id="gvEmpWorkStatus"
                                                style="border-collapse: collapse;" border="1" rules="all" cellspacing="0">
                                                <tbody>
                                                    <?php if(isset($empWorkTimeResults)): ?>
                                                        <?php if($empWorkTimeResults->isEmpty()): ?>
                                                            <tr style="width: 70px;">
                                                                <td><span><?php echo e(getArrValue($error_messages, '4029')); ?></span></td>
                                                            </tr>
                                                        <?php else: ?>
                                                            <tr>
                                                                <th scope="col">部門コード</th>
                                                                <th scope="col">部門名</th>
                                                                <th scope="col">社員番号</th>
                                                                <th scope="col">社員名</th>
                                                                <th scope="col">勤務体系</th>
                                                                <th scope="col">事由</th>
                                                                <th scope="col">出勤打刻場所</th>
                                                                <th scope="col">出勤</th>
                                                                <th scope="col">退出</th>
                                                                <th scope="col">退出打刻場所</th>                                                               
                                                            </tr>
                                                            <?php $__currentLoopData = $empWorkTimeResults; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $empWorkTimeResult): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr>
                                                                    <td style="width: 70px;">
                                                                        <span id="lblDeptCd"><?php echo e($empWorkTimeResult->DEPT_CD); ?></span>
                                                                    </td>
                                                                    <td style="width: 130px;">
                                                                        <span id="lblDeptName"><?php echo e($empWorkTimeResult->DEPT_NAME); ?></span>
                                                                    </td>
                                                                    <td style="width: 80px;">
                                                                        <span id="lblEmpCd"><?php echo e($empWorkTimeResult->EMP_CD); ?></span>
                                                                    </td>
                                                                    <td style="width: 130px;">
                                                                        <span id="lblEmpName"><?php echo e($empWorkTimeResult->EMP_NAME); ?></span>
                                                                    </td>
                                                                    <td style="width: 130px;">
                                                                        <span id="lblWorkPtn" <?php if($empWorkTimeResult->WORK_CLS_CD == '00'): ?>class="text-danger"<?php endif; ?>
                                                                            style="width: 160px; display: inline-block;"><?php echo e($empWorkTimeResult->WORKPTN_NAME); ?></span>
                                                                    </td>
                                                                    <td class="GridViewRowCenter" style="width: 50px;">
                                                                        <span id="lblReason"
                                                                            class="<?php echo e($empWorkTimeResult->REASON_PTN_CD == '01' ? 'text-danger' : ''); ?> &&
                                                                            <?php echo e($empWorkTimeResult->REASON_PTN_CD == '02' ? 'text-primary' : ''); ?>">
                                                                            <?php echo e($empWorkTimeResult->REASON_NAME); ?>

                                                                        </span>
                                                                    </td>
                                                                    <td class="GridViewRowCenter" style="width: 130px;">
                                                                        <span id="lblTeamName"><?php echo e($empWorkTimeResult->OFC_TERM_NAME); ?></span>
                                                                    </td>

                                                                    
                                                                    <td style="width: 40px; 
                                                                        <?php if($empWorkTimeResult->OFC_CNT >= 2 && empty($empWorkTimeResult->OFC_TIME_HH)): ?>
                                                                        background-color: lightskyblue;
                                                                        <?php elseif(empty($empWorkTimeResult->OFC_TIME_HH) && isset($empWorkTimeResult->LEV_TIME_HH)): ?>    
                                                                        background-color: tomato;
                                                                        <?php endif; ?>
                                                                        ">
                                                                        <span id="lblOfcTime"><?php echo e($empWorkTimeResult->OFC_TIME); ?></span>
                                                                    </td>
                                                                    <td style="width: 40px; 
                                                                        <?php if($empWorkTimeResult->LEV_CNT >= 2 && empty($empWorkTimeResult->LEV_TIME_HH)): ?>
                                                                        background-color: lightskyblue;
                                                                        <?php elseif(isset($empWorkTimeResult->OFC_TIME_HH) && empty($empWorkTimeResult->LEV_TIME_HH)): ?>
                                                                        background-color: tomato;"
                                                                        <?php endif; ?>
                                                                        ">
                                                                        <span id="lblLevTime"><?php echo e($empWorkTimeResult->LEV_TIME); ?></span>
                                                                    </td>
                                                                    <td class="GridViewRowCenter" style="width: 130px;">
                                                                        <span id="lblTeamName"><?php echo e($empWorkTimeResult->LEV_TERM_NAME); ?></span>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>

                                    <!-- footer -->
                                    <div class="line"><hr></div>
                                    <p class="ButtonField2">
                                        <input type="button" value="キャンセル" name="btnCancel1"
                                            tabindex="26" id="btnCancel1" class="ButtonStyle1 cancel-submit"
                                            data-url="<?php echo e(route('empworkstatusRef.cancel')); ?>"
                                            <?php if(isset($empWorkTimeResults) && !$empWorkTimeResults->isEmpty()): ?> autofocus <?php endif; ?>
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
        $(document).on('click', '.submit-form', function() {
            if ($("#deptNameError,#EmpCdError").text()) {
                return false;
            }
            $('#btnShow').attr('disabled', true);
            var url = $(this).data('url');
            $('#form').attr('action', url);
            $('#form').submit();
        });

        $(document).on('click', '.cancel-submit', function() {
            var url = $(this).data('url');
            $('#form').attr('action', url);
            $('#form').submit();
        });

        // 全チェックor全チェック外し
        changeAllCheckBoxStates = function(check) {
            $(".check").prop("checked", check);
        }

        // カレンダーの設定
        $(function() {
            $('#YearMonthDay').datepicker({
                format: 'yyyy年mm月dd日',
                autoclose: true,
                language: 'ja', // カレンダー日本語化のため
            });
        });
        
        // 入力可能文字：半角英数
        onlyHalfWord = n => n.replace(/[０-９Ａ-Ｚａ-ｚ]/g, s => String.fromCharCode(s.charCodeAt(0) - 65248))
            .replace(/[^0-9a-zA-Z]/g, '');
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('menu.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\06_SVN\resources\views/work_time/EmpWorkStatusReference.blade.php ENDPATH**/ ?>