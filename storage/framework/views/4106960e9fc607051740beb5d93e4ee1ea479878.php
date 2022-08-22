<!-- 出退勤入力（部門別） -->


<?php $__env->startSection('title','出退勤入力(部門別)'); ?>

<?php $__env->startSection('content'); ?>
<div id="contents-stage">
    <table>
        <tbody>
            <tr>
                <td>
                    <div id="UpdatePanel1">
                        <!-- header -->
                        <form action="" method="POST" id="form" >
                            <?php echo e(csrf_field()); ?>

                            <table class="InputFieldStyle1">
                                <tbody>
                                    <tr>
                                        <th>対象年月日度</th>
                                        <td>
                                            <input type="text"
                                                name="ddlDate"
                                                id="YearMonth"
                                                autocomplete="off"
                                                value="<?php echo e(old('ddlDate', !is_nullorwhitespace(Session::get('ymd_date')) ? Session::get('ymd_date'): date('Y年m月d日') )); ?>"
                                                <?php if(!empty($results)): ?>
                                                disabled="disabled"
                                                <?php endif; ?>
                                            />
                                            <?php $__errorArgs = ['ddlDate'];
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
                                        <th>部門</th>
                                        <td>
                                            <input type="text"
                                                name="txtDeptCd"
                                                id="txtDeptCd"
                                                class="searchDeptCd txtDeptCd"
                                                style="width: 50px;"
                                                maxlength="6"
                                                onfocus="this.select();"
                                                value="<?php echo e(old('txtDeptCd', !is_nullorwhitespace($input_search_data['txtDeptCd']) ? $input_search_data['txtDeptCd'] : '')); ?>"
                                                oninput="value = onlyHalfNumWord(value)"
                                                autocomplete="off"
                                                <?php if(!empty($results)): ?>
                                                disabled="disabled"
                                                <?php else: ?>
                                                autofocus
                                                <?php endif; ?>
                                            >
                                            <input name="btnSearchDeptCd"
                                                class="SearchButton"
                                                id="btnSearchDeptCd"
                                                type="button"
                                                value="?"
                                                onclick="SearchDept(this);return false"
                                                <?php if(!empty($results)): ?>
                                                disabled="disabled"
                                                <?php endif; ?>
                                            >
                                            <input type="text"
                                                name="deptName"
                                                id="deptName"
                                                class="txtDeptName"
                                                style="width: 200px; display: inline-block;"
                                                value="<?php echo e(old('deptName')); ?>"
                                                data-dispclscd=01 data-isdeptauth=true
                                                readonly="readonly"
                                                <?php if(!empty($results)): ?>
                                                disabled="disabled"
                                                <?php endif; ?>
                                            >
                                            <?php $__errorArgs = ['txtDeptCd'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger" id="DeptCdValidError"><?php echo e(getArrValue($error_messages, $message)); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            <span class="text-danger" id="deptNameError">
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>開始所属</th>
                                        <td>
                                            <select name="filter[ddlStartCompany]"
                                                id="ddlStartCompany"
                                                style="width: 300px;"
                                                <?php if(!empty($results)): ?>
                                                disabled="disabled"
                                                <?php endif; ?>
                                            >
                                                <option value=""></option>
                                                <?php if(isset($haken_company)): ?>
                                                <?php $__currentLoopData = $haken_company; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $companyName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($companyName->COMPANY_CD); ?>"
                                                        <?php echo e(old('filter.ddlStartCompany', !empty($filterData['ddlStartCompany']) ? $filterData['ddlStartCompany'] : '') == $companyName->COMPANY_CD ? 'selected' : ''); ?>>
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
                                            <select name="filter[ddlEndCompany]"
                                                id="ddlEndCompany"
                                                style="width: 300px;"
                                                <?php if(!empty($results)): ?>
                                                disabled="disabled"
                                                <?php endif; ?>
                                            >
                                                <option value=""></option>
                                                <?php if(isset($haken_company)): ?>
                                                <?php $__currentLoopData = $haken_company; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $companyName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($companyName->COMPANY_CD); ?>"
                                                        <?php echo e(old('filter.ddlEndCompany', !empty($filterData['ddlEndCompany']) ? $filterData['ddlEndCompany'] : '') == $companyName->COMPANY_CD ? 'selected' : ''); ?>>
                                                        <?php echo e($companyName->COMPANY_ABR); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
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
                                            <input type="button"
                                                name="btnDisp"
                                                id="btnShow"
                                                class="ButtonStyle1 submit-form"
                                                style="width: 80px;"
                                                value="表示"
                                                data-url = "<?php echo e(route('wtde.search')); ?>"
                                                <?php if(!empty($results)): ?>
                                                disabled="disabled"
                                                <?php endif; ?>
                                            >
                                            <?php if(!empty($results)): ?>
                                            <input type="button"
                                                name="btnUpdate"
                                                id="btnUpdate"
                                                class="update"
                                                style="width: 80px;"
                                                value="更新"
                                                data-url = "<?php echo e(route('wtde.update')); ?>"
                                            >
                                            <?php endif; ?>
                                            <input type="button"
                                                name="btnCancel2"
                                                id="btnCancel2"
                                                class="ButtonStyle1 submit-form"
                                                style="width: 80px;"
                                                value="キャンセル"
                                                data-url = "<?php echo e(route('wtde.cancel')); ?>"
                                            >
                                            &nbsp;
                                            <span id="lblNoStampColor" style="background-color: tomato;">　　　</span>
                                            <span id="lblNoStamp">未打刻</span>
                                            &nbsp;
                                            <span id="lblDbStampColor" style="background-color: lightskyblue;">　　　</span>
                                            <span id="lblDbStamp">二重打刻</span>
                                            &nbsp;
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <!-- detail -->
                            <input type="hidden" name="hdnCvClientIdList" id="hdnCvClientIdList" value="">
                            <div class="GridViewStyle1" id="gridview-container">
                                <div class="GridViewPanelStyle1" style="width: 1084px;">
                                    <div id="pnlWorkTime">
                                        <div>
                                            <table class="GridViewBorder GridViewRowCenter GridViewPadding fixRowCol"
                                                   id="gvWorkTime" style="border-collapse: separate;" border="1" rules="all" cellspacing="0">
                                                <tbody id="gridview-warp">
                                                    <?php if(isset($results)): ?>
                                                        <?php if(count($results) < 1): ?>
                                                            <tr style="width:70px;">
                                                                <td><span><?php echo e(getArrValue($error_messages, 4029)); ?></span></td>
                                                            </tr>
                                                        <?php else: ?>
                                                            <tr class="sticky-top">
                                                                <th class="fixedcol" scope="col" style="background: #4682B4; left: 0px;"> 部門コード </th>
                                                                <th class="fixedcol" scope="col" style="background: #4682B4; left: 80px;"> 部門名 </th>
                                                                <th class="fixedcol" scope="col" style="background: #4682B4; left: 210px;"> 社員番号 </th>
                                                                <th class="fixedcol" scope="col" style="background: #4682B4; left: 290px;"> 社員名 </th>
                                                                <th class="fixedcol" scope="col" style="background: #4682B4; left: 420px;"> 勤務体系 </th>
                                                                <th class="fixedcol" scope="col" style="background: #4682B4; left: 570px;"> 事由 </th>
                                                                <th scope="col"> 出勤 </th>
                                                                <th scope="col"> 退出 </th>
                                                                <th scope="col"> 外出1 </th>
                                                                <th scope="col"> 再入１ </th>
                                                                <th scope="col"> 外出２ </th>
                                                                <th scope="col"> 再入２ </th>
                                                                <th scope="col"> 出勤時間 </th>
                                                                <th scope="col"> 遅刻時間 </th>
                                                                <th scope="col"> 早退時間 </th>
                                                                <th scope="col"> 外出時間 </th>
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
                                                                <th scope="col"> 備考 </th>
                                                            </tr>
                                                            <?php $__currentLoopData = $results->unique('EMP_CD'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i=>$result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr>
                                                                    <td class="fixedcol" style="width: 80px; left: 0px;">
                                                                        <span id="lblDeptCd" style="width: 80px; display: inline-block;"><?php echo e($result->DEPT_CD); ?></span>
                                                                        <input type="hidden" name="worktime[<?php echo e($i); ?>][DEPT_CD]" value="<?php echo e($result->DEPT_CD); ?>"/>
                                                                    </td>
                                                                    <td class="fixedcol" style="width: 130px; left: 80px;">
                                                                        <span id="lblDeptName" style="width: 130px; display: inline-block;"><?php echo e($result->DEPT_NAME); ?></span>
                                                                        <input type="hidden" name="worktime[<?php echo e($i); ?>][DEPT_NAME]" value="<?php echo e($result->DEPT_NAME); ?>"/>
                                                                    </td>
                                                                    <td class="fixedcol" style="width: 80px; left: 210px;" >
                                                                        <span id="txtEmpCd" class="txtEmpCd" style="width: 80px; display: inline-block;"><?php echo e($result->EMP_CD); ?></span>
                                                                        <input type="hidden" name="worktime[<?php echo e($i); ?>][EMP_CD]" value="<?php echo e($result->EMP_CD); ?>"/>
                                                                    </td>
                                                                    <td class="fixedcol" style="width: 130px; left: 290px;">
                                                                        <span id="lblEmpName" style="width: 130px; display: inline-block;"><?php echo e($result->EMP_NAME); ?></span>
                                                                        <input type="hidden" name="worktime[<?php echo e($i); ?>][EMP_NAME]" value="<?php echo e($result->EMP_NAME); ?>"/>
                                                                    </td>
                                                                    <td class="" style="position:sticky; background:#fff; width: 150px; left: 420px;">
                                                                        <select name="worktime[<?php echo e($i); ?>][WORKPTN_CD]" class="workPtnCd coloredSelect" style="width: 150px;">
                                                                            <?php $__currentLoopData = $workptn_names; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workptn_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <option value="<?php echo e($workptn_name->WORKPTN_CD); ?>"
                                                                                    <?php echo e($workptn_name->WORK_CLS_CD == '00' ? 'class=text-danger' : 'style=color:black;'); ?>

                                                                                    <?php echo e($workptn_name->WORKPTN_CD == $result->WORKPTN_CD ? "selected" : ""); ?>

                                                                                >
                                                                                    <?php echo e($workptn_name->WORKPTN_NAME); ?>

                                                                                </option>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </select>
                                                                    </td>
                                                                    <td class="" style="position:sticky; background:#fff; width: 70px; left: 570px;">
                                                                        <select name="worktime[<?php echo e($i); ?>][REASON_CD]" class="reasonCd coloredSelect" style="width: 70px;">
                                                                            <?php $__currentLoopData = $reason_names; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reason_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <option
                                                                                    value="<?php echo e($reason_name->REASON_CD); ?>"
                                                                                    <?php if($reason_name->REASON_PTN_CD == '01'): ?> class="text-danger"
                                                                                    <?php elseif($reason_name->REASON_PTN_CD == '02'): ?> class="text-primary"
                                                                                    <?php else: ?> style="color:black;"
                                                                                    <?php endif; ?>
                                                                                    <?php echo e($reason_name->REASON_CD == $result->REASON_CD ? "selected" : ""); ?>

                                                                                >
                                                                                    <?php echo e($reason_name->REASON_NAME); ?>

                                                                                </option>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </select>
                                                                    </td>
                                                                    <td style="white-space: nowrap;">
                                                                        <input type="text"
                                                                            name="worktime[<?php echo e($i); ?>][OFC_TIME]"
                                                                            class="ofcTime"
                                                                            maxlength="5"
                                                                            value="<?php echo e($result->OFC_TIME); ?>"
                                                                            oninput="value=onlyHalfWord(value)"
                                                                            <?php if( $result->OFC_CNT >= 2 && !$result->OFC_TIME_HH ): ?>
                                                                            style="width: 40px; background-color: lightskyblue;"
                                                                            <?php elseif( !$result->OFC_TIME_HH && $result->LEV_TIME_HH ): ?>
                                                                            style="width: 40px; background-color: tomato;"
                                                                            <?php else: ?>
                                                                            style="width: 40px;"
                                                                            <?php endif; ?>
                                                                        >
                                                                        <span class="text-danger timeError"></span>
                                                                    </td>
                                                                    <td style="white-space: nowrap;">
                                                                        <input type="text"
                                                                            name="worktime[<?php echo e($i); ?>][LEV_TIME]"
                                                                            class="levTime"
                                                                            maxlength="5"
                                                                            value="<?php echo e($result->LEV_TIME); ?>"
                                                                            oninput="value=onlyHalfWord(value)"
                                                                            <?php if( $result->LEV_CNT >= 2 && !$result->LEV_TIME_HH ): ?>
                                                                            style="width: 40px; background-color: lightskyblue;"
                                                                            <?php elseif( $result->OFC_TIME_HH && !$result->LEV_TIME ): ?>
                                                                            style="width: 40px; background-color: tomato;"
                                                                            <?php elseif( !$result->OFC_TIME_HH && !$result->LEV_TIME_HH ): ?>
                                                                            style="width: 40px;"
                                                                            <?php else: ?>
                                                                            style="width: 40px;"
                                                                            <?php endif; ?>
                                                                        >
                                                                        <span class="text-danger timeError"></span>
                                                                    </td>
                                                                    <td style="white-space: nowrap;">
                                                                        <input type="text"
                                                                            name="worktime[<?php echo e($i); ?>][OUT1_TIME]"
                                                                            class="out1Time"
                                                                            maxlength="5"
                                                                            value="<?php echo e($result->OUT1_TIME); ?>"
                                                                            oninput="value=onlyHalfWord(value)"
                                                                            <?php if( $result->OUT1_CNT >= 2 && !$result->OUT1_TIME_HH ): ?>
                                                                            style="width: 40px; background-color: lightskyblue;"
                                                                            <?php elseif( !$result->OUT1_TIME_HH && $result->IN1_TIME_HH ): ?>
                                                                            style="width: 40px; background-color: tomato;"
                                                                            <?php else: ?>
                                                                            style="width: 40px;"
                                                                            <?php endif; ?>
                                                                        >
                                                                        <span class="text-danger timeError"></span>
                                                                    </td>
                                                                    <td style="white-space: nowrap;">
                                                                        <input type="text"
                                                                            name="worktime[<?php echo e($i); ?>][IN1_TIME]"
                                                                            class="in1Time"
                                                                            maxlength="5"
                                                                            value="<?php echo e($result->IN1_TIME); ?>"
                                                                            oninput="value=onlyHalfWord(value)"
                                                                            <?php if( $result->IN1_CNT >= 2 && !$result->IN1_TIME_HH ): ?>
                                                                            style="width: 40px; background-color: lightskyblue;"
                                                                            <?php elseif( $result->OUT1_TIME_HH && !$result->IN1_TIME_HH ): ?>
                                                                            style="width: 40px; background-color: tomato;"
                                                                            <?php else: ?>
                                                                            style="width: 40px;"
                                                                            <?php endif; ?>
                                                                        >
                                                                        <span class="text-danger timeError"></span>
                                                                    </td>
                                                                    <td style="white-space: nowrap;">
                                                                        <input type="text"
                                                                            name="worktime[<?php echo e($i); ?>][OUT2_TIME]"
                                                                            class="out2Time"
                                                                            maxlength="5"
                                                                            value="<?php echo e($result->OUT2_TIME); ?>"
                                                                            oninput="value=onlyHalfWord(value)"
                                                                            <?php if( $result->OUT2_CNT >= 2 && !$result->OUT2_TIME_HH ): ?>
                                                                            style="width: 40px; background-color: lightskyblue;"
                                                                            <?php elseif( !$result->OUT2_TIME_HH && $result->IN2_TIME_HH ): ?>
                                                                            style="width: 40px; background-color: tomato;"
                                                                            <?php else: ?>
                                                                            style="width: 40px;"
                                                                            <?php endif; ?>
                                                                        >
                                                                        <span class="text-danger timeError"></span>
                                                                    </td>
                                                                    <td style="white-space: nowrap;">
                                                                        <input type="text"
                                                                            name="worktime[<?php echo e($i); ?>][IN2_TIME]"
                                                                            class="in2Time"
                                                                            maxlength="5"
                                                                            value="<?php echo e($result->IN2_TIME); ?>"
                                                                            oninput="value=onlyHalfWord(value)"
                                                                            <?php if( $result->IN2_CNT >= 2 && !$result->IN2_TIME_HH ): ?>
                                                                            style="width: 40px; background-color: lightskyblue;"
                                                                            <?php elseif( $result->OUT2_TIME_HH && !$result->IN2_TIME_HH ): ?>
                                                                            style="width: 40px; background-color: tomato;"
                                                                            <?php else: ?>
                                                                            style="width: 40px;"
                                                                            <?php endif; ?>
                                                                        >
                                                                        <span class="text-danger timeError"></span>
                                                                    </td>
                                                                    <td style="white-space: nowrap;">
                                                                        <input type="text"
                                                                            name="worktime[<?php echo e($i); ?>][WORK_TIME]"
                                                                            class="workTime noCalc"
                                                                            style="width: 40px;"
                                                                            maxlength="5"
                                                                            value="<?php echo e($result->WORK_TIME); ?>"
                                                                            oninput="value=onlyHalfWord(value)"
                                                                        >
                                                                        <span class="text-danger timeError"></span>
                                                                    </td>
                                                                    <td style="white-space: nowrap;">
                                                                        <input type="text"
                                                                            name="worktime[<?php echo e($i); ?>][TARD_TIME]"
                                                                            class="tardTime noCalc"
                                                                            style="width: 40px;"
                                                                            maxlength="5"
                                                                            value="<?php echo e($result->TARD_TIME); ?>"
                                                                            oninput="value=onlyHalfWord(value)"
                                                                        >
                                                                        <span class="text-danger timeError"></span>
                                                                    </td>
                                                                    <td style="white-space: nowrap;">
                                                                        <input type="text"
                                                                            name="worktime[<?php echo e($i); ?>][LEAVE_TIME]"
                                                                            class="leaveTime noCalc"
                                                                            style="width: 40px;"
                                                                            maxlength="5"
                                                                            value="<?php echo e($result->LEAVE_TIME); ?>"
                                                                            oninput="value=onlyHalfWord(value)"
                                                                        >
                                                                        <span class="text-danger timeError"></span>
                                                                    </td>
                                                                    <td style="white-space: nowrap;">
                                                                        <input type="text"
                                                                            name="worktime[<?php echo e($i); ?>][OUT_TIME]"
                                                                            class="outTime noCalc"
                                                                            style="width: 40px;"
                                                                            maxlength="5"
                                                                            value="<?php echo e($result->OUT_TIME); ?>"
                                                                            oninput="value=onlyHalfWord(value)"
                                                                        >
                                                                        <span class="text-danger timeError"></span>
                                                                    </td>
                                                                    <td style="white-space: nowrap;">
                                                                        <input type="text"
                                                                            name="worktime[<?php echo e($i); ?>][OVTM1_TIME]"
                                                                            class="ovtm1Time noCalc"
                                                                            style="width: 40px;"
                                                                            maxlength="5"
                                                                            value="<?php echo e($result->OVTM1_TIME); ?>"
                                                                            oninput="value=onlyHalfWord(value)"
                                                                        >
                                                                        <span class="text-danger timeError"></span>
                                                                    </td>
                                                                    <td style="white-space: nowrap;">
                                                                        <input type="text"
                                                                            name="worktime[<?php echo e($i); ?>][OVTM2_TIME]"
                                                                            class="ovtm2Time noCalc"
                                                                            style="width: 40px;"
                                                                            maxlength="5"
                                                                            value="<?php echo e($result->OVTM2_TIME); ?>"
                                                                            oninput="value=onlyHalfWord(value)"
                                                                        >
                                                                        <span class="text-danger timeError"></span>
                                                                    </td>
                                                                    <td style="white-space: nowrap;">
                                                                        <input type="text"
                                                                            name="worktime[<?php echo e($i); ?>][OVTM3_TIME]"
                                                                            class="ovtm3Time noCalc"
                                                                            style="width: 40px;"
                                                                            maxlength="5"
                                                                            value="<?php echo e($result->OVTM3_TIME); ?>"
                                                                            oninput="value=onlyHalfWord(value)"
                                                                        >
                                                                        <span class="text-danger timeError"></span>
                                                                    </td>
                                                                    <td style="white-space: nowrap;">
                                                                        <input type="text"
                                                                            name="worktime[<?php echo e($i); ?>][OVTM4_TIME]"
                                                                            class="ovtm4Time noCalc"
                                                                            style="width: 40px;"
                                                                            maxlength="5"
                                                                            value="<?php echo e($result->OVTM4_TIME); ?>"
                                                                            oninput="value=onlyHalfWord(value)"
                                                                        >
                                                                        <span class="text-danger timeError"></span>
                                                                    </td>
                                                                    <td style="white-space: nowrap;">
                                                                        <input type="text"
                                                                            name="worktime[<?php echo e($i); ?>][OVTM5_TIME]"
                                                                            class="ovtm5Time noCalc"
                                                                            style="width: 40px;"
                                                                            maxlength="5"
                                                                            value="<?php echo e($result->OVTM5_TIME); ?>"
                                                                            oninput="value=onlyHalfWord(value)"
                                                                        >
                                                                        <span class="text-danger timeError"></span>
                                                                    </td>
                                                                    <td style="white-space: nowrap;">
                                                                        <input type="text"
                                                                            name="worktime[<?php echo e($i); ?>][OVTM6_TIME]"
                                                                            class="ovtm6Time noCalc"
                                                                            style="width: 40px;"
                                                                            maxlength="5"
                                                                            value="<?php echo e($result->OVTM6_TIME); ?>"
                                                                            oninput="value=onlyHalfWord(value)"
                                                                        >
                                                                        <span class="text-danger timeError"></span>
                                                                    </td>
                                                                    <td style="white-space: nowrap;">
                                                                        <input type="text"
                                                                            name="worktime[<?php echo e($i); ?>][EXT1_TIME]"
                                                                            class="ext1Time noCalc"
                                                                            style="width: 40px;"
                                                                            maxlength="5"
                                                                            value="<?php echo e($result->EXT1_TIME); ?>"
                                                                            oninput="value=onlyHalfWord(value)"
                                                                        >
                                                                        <span class="text-danger timeError"></span>
                                                                    </td>
                                                                    <td style="white-space: nowrap;">
                                                                        <input type="text"
                                                                            name="worktime[<?php echo e($i); ?>][EXT2_TIME]"
                                                                            class="ext2Time noCalc"
                                                                            style="width: 40px;"
                                                                            maxlength="5"
                                                                            value="<?php echo e($result->EXT2_TIME); ?>"
                                                                            oninput="value=onlyHalfWord(value)"
                                                                        >
                                                                        <span class="text-danger timeError"></span>
                                                                    </td>
                                                                    <td style="white-space: nowrap;">
                                                                        <input type="text"
                                                                            name="worktime[<?php echo e($i); ?>][EXT3_TIME]"
                                                                            class="ext3Time noCalc"
                                                                            style="width: 40px;"
                                                                            maxlength="5"
                                                                            value="<?php echo e($result->EXT3_TIME); ?>"
                                                                            oninput="value=onlyHalfWord(value)"
                                                                        >
                                                                        <span class="text-danger timeError"></span>
                                                                    </td>
                                                                    <td class="GridViewRowLeft" style="white-space: nowrap;">
                                                                        <input type="text"
                                                                            name="worktime[<?php echo e($i); ?>][REMARK]"
                                                                            class="remark"
                                                                            style="width: 250px;"
                                                                            maxlength="30"
                                                                            value="<?php echo e($result->REMARK); ?>"
                                                                        >
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
                            </div>
                            <!-- ErrorMessage -->
                            <?php if(isset($results)): ?>
                            <span class="text-danger" id="timeFormatError"></span><br>
                            <span class="text-danger" id="sizeError"></span>
                            <?php endif; ?>
                            <!-- footer -->
                            <div class="line">
                                <hr>
                            </div>
                            <p class="ButtonField2">
                                <input name="btnCancel2"
                                    class="ButtonStyle1 submit-form"
                                    id="btnCancel2"
                                    type="button" value="キャンセル"
                                    data-url = "<?php echo e(route('wtde.cancel')); ?>"
                                    style="width: 80px;"
                                >
                            </p>
                        </form>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<input type="hidden" id="timeCalUrl" value="<?php echo e(url('work_time/WorkTimeDeptEditorTimeCal/')); ?>">
<input type="hidden" id="dayCalUrl" value="<?php echo e(url('work_time/WorkTimeDeptEditorDayCal/')); ?>">
<input type="hidden" id="formatError" value="<?php echo e(getArrValue($error_messages, 2003)); ?>">
<input type="hidden" id="dataSizeError" value="<?php echo e(getArrValue($error_messages, 2009)); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('js/work_time/WorkTimeEditor.js')); ?>" defer></script>
<script>
var dept_cd = "<?php echo e($input_search_data['txtDeptCd']); ?>";
// ボタンクリック
$(document).on('click', '.submit-form', function(){
    var url = $(this).data('url');
    $('#form').attr('action', url);
    $('#form').submit();
});

// 更新submit-form
$(document).on('click', '.update', function() {
    if (window.confirm("<?php echo e(getArrValue($error_messages, 1005)); ?>")) {
        var url = $(this).data('url');
        $('#form').attr('action', url);
        $('#form').submit();
    }
    return false;
});

$(function() {
    gotoSearch();
    $('#YearMonth').datepicker({
        format: 'yyyy年mm月dd日',
        autoclose: true,
        language: 'ja',
    });

    // プルダウンの色設定
    var changeColor = function() {
        $(".coloredSelect").each(function(i,e){
            $(e).css('color', $(e).children("option:selected").css("color"))
        });
    };
    changeColor();
    $(".coloredSelect").on('change', (ele) => {
        $(ele.target).css('color', $(ele.target).children("option:selected").css("color"))
    });
});

// ローディング設定
var gotoSearch = function(e) {
    var is_index = "<?php echo e(!empty($is_index) ? true : false); ?>";
    if(dept_cd != "" && is_index) {
        $.LoadingOverlay("show");
        $("#btnShow").click();
    }
};
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('menu.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\06_SVN\resources\views/work_time/WorkTimeDeptEditor.blade.php ENDPATH**/ ?>