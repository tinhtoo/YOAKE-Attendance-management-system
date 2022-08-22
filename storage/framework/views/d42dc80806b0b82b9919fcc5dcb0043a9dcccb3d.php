<!-- 出退勤入力画面 -->


<?php $__env->startSection('title','出退勤入力'); ?>
<?php $__env->startSection('content'); ?>
<div id="contents-stage">
    <table>
        <tbody>
            <tr>
                <td>
                    <div id="UpdatePanel1">
                        <!-- header -->
                        <form action="" method="post" id="form">
                            <?php echo e(csrf_field()); ?>

                            <table class="InputFieldStyle1">
                                <tbody>
                                    <tr>
                                        <th>対象月度</th>
                                        <td>
                                            <input name="ddlDate"
                                            id="ddlDate"
                                            type="text"
                                            autocomplete="off"
                                            value="<?php echo e(old('ddlDate', !is_nullorwhitespace(Session::get('date')) ? Session::get('date') : date('Y年m月') )); ?>"
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
                                        <th>社員番号</th>
                                        <td>
                                            <input name="txtEmpCd"
                                                id="txtEmpCd"
                                                class="searchEmpCd txtEmpCd"
                                                style="width: 80px;"
                                                type="text"
                                                maxlength="10"
                                                value="<?php echo e(old('txtEmpCd', !is_nullorwhitespace($search_data['txtEmpCd']) ? $search_data['txtEmpCd'] : '')); ?>"
                                                oninput="value = onlyHalfNumWord(value)"
                                                autocomplete="off"
                                                <?php if(!empty($results)): ?>
                                                disabled="disabled"
                                                <?php else: ?>
                                                autofocus
                                                <?php endif; ?>
                                                >
                                            <input name="btnSearchEmpCd"
                                                class="SearchButton"
                                                id="btnSearchEmpCd"
                                                type="button"
                                                value="?"
                                                onclick="SearchEmp(this);return false"
                                                <?php if(!empty($results)): ?>
                                                disabled="disabled"
                                                <?php endif; ?>
                                            >
                                            <input name="empName"
                                                class="OutlineLabel txtEmpName"
                                                type="text"
                                                style="width: 200px; display: inline-block;"
                                                id="empName"
                                                value="<?php echo e(old('empName')); ?>"
                                                readonly="readonly"
                                                data-regclscd=00 data-isdeptauth=true
                                                <?php if(!empty($results)): ?>
                                                disabled="disabled"
                                                <?php endif; ?>
                                            >
                                            <?php $__errorArgs = ['txtEmpCd'];
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
                                        <td>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th>部門</th>
                                        <td>
                                        <input name ="deptName"
                                            class="OutlineLabel"
                                            type="text"
                                            style="width: 200px; display: inline-block;"
                                            id="deptNameWithEmp"
                                            value="<?php echo e(old('deptName')); ?>"
                                            readonly="readonly"
                                            <?php if(!empty($results)): ?>
                                            disabled="disabled"
                                            <?php endif; ?>
                                        >
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
                                            <input
                                                name="btnDisp"
                                                id="btnShow"
                                                class="ButtonStyle1 submit-form"
                                                type="button"
                                                value="表示"
                                                data-url = "<?php echo e(route('wte.search')); ?>"
                                                onclick="return (!$('#empCdError').text())"
                                                <?php if(!empty($results)): ?>
                                                disabled="disabled"
                                                <?php endif; ?>
                                            >
                                            <?php if(!empty($results)): ?>
                                                <input
                                                name="btnEdit"
                                                id="btnUpdate"
                                                type="button"
                                                value="更新"
                                                class="ButtonStyle1 update"
                                                data-url = "<?php echo e(route('wte.update')); ?>"
                                            >
                                            <?php endif; ?>
                                            <input
                                                name="btnCancel2"
                                                class="ButtonStyle1 submit-form"
                                                id="btnCancel2"
                                                type="button"
                                                value="キャンセル"
                                                data-url = "<?php echo e(route('wte.cancel')); ?>"
                                            >
                                            &nbsp;
                                            <span id="lblNoStampColor" style="background-color: tomato;">　　　</span>
                                            <span id="lblNoStamp">未打刻</span>
                                            &nbsp;
                                            <span id="lblDbStampColor" style="background-color: lightskyblue;">　　　</span>
                                            <span id="lblDbStamp">二重打刻</span>
                                            &nbsp;
                                            <?php if(isset($results)): ?>
                                            <?php if(count($results) > 1): ?>
                                            <?php if(isset($confirmCheck)): ?>
                                            <span class="font-style2" id="lblFixMsg"><?php echo e(config('consts.fix_msg')); ?></span>
                                            <?php endif; ?>
                                            <?php endif; ?>
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
                            <input name="hdnCvClientIdList" id="hdnCvClientIdList" type="hidden" value="">
                            <div class="GridViewStyle1" id="gridview-container">
                                <div class="GridViewPanelStyle1">
                                    <div id="pnlWorkTime">
                                        <div>
                                            <table class="GridViewBorder GridViewRowCenter GridViewPadding fixRowCol" id="gvWorkTime" style="border-collapse: separate;" border="1" rules="all" cellspacing="0">
                                                <tbody id="gridview-warp">
                                                    <?php if(isset($results)): ?>
                                                        <?php if(count($results) < 1): ?>
                                                            <tr style="width:70px;">
                                                                <td><span><?php echo e($messages); ?></span></td>
                                                            </tr>
                                                        <?php else: ?>
                                                            <tr class="sticky-head">
                                                                <th class="fixedcol" scope="col" style="background: #4682B4; left: 0px;">
                                                                    日付
                                                                </th>
                                                                <th class="fixedcol" scope="col" style="background: #4682B4; left: 80px;">
                                                                    曜日
                                                                </th>
                                                                <th class="fixedcol" scope="col" style="background: #4682B4; left: 110px;">
                                                                    勤務体系
                                                                </th>
                                                                <th class="fixedcol" scope="col" style="background: #4682B4; left: 260px;">
                                                                    事由
                                                                </th>
                                                                <th scope="col">
                                                                    出勤
                                                                </th>
                                                                <th scope="col">
                                                                    退出
                                                                </th>
                                                                <th scope="col">
                                                                    外出1
                                                                </th>
                                                                <th scope="col">
                                                                    再入１
                                                                </th>
                                                                <th scope="col">
                                                                    外出２
                                                                </th>
                                                                <th scope="col">
                                                                    再入２
                                                                </th>
                                                                <th scope="col">
                                                                    出勤時間
                                                                </th>
                                                                <th scope="col">
                                                                    遅刻時間
                                                                </th>
                                                                <th scope="col">
                                                                    早退時間
                                                                </th>
                                                                <th scope="col">
                                                                    外出時間
                                                                </th>
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
                                                                <th scope="col">
                                                                    備考
                                                                </th>
                                                            </tr>
                                                            <?php $__currentLoopData = $results->unique('CALD_DATE'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i=>$result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                <td class="fixedcol" style="width: 80px; left: 0px;">
                                                                    <span id="lblCaldDate" class="<?php echo e(in_array(date('md', strtotime($result->CALD_DATE)), $holidays) || config('consts.weeks')[date('w', strtotime($result->CALD_DATE))] == '土' || config('consts.weeks')[date('w', strtotime($result->CALD_DATE))] == '日'? 'text-danger':''); ?>" style="width: 80px; display: inline-block;">
                                                                        <?php echo e(date('Y/m/d', strtotime($result->CALD_DATE))); ?>

                                                                    </span>
                                                                    <input type="hidden" class="calDate" name="worktime[<?php echo e($i); ?>][CALD_DATE]" value="<?php echo e(date('Y-m-d', strtotime($result->CALD_DATE))); ?>"/>
                                                                </td>
                                                                <td class="fixedcol dayOfWeek" style="width: 30px; left: 80px;">
                                                                    <span id="lblDayOfWeek" class="<?php echo e(in_array(date('md', strtotime($result->CALD_DATE)), $holidays) || config('consts.weeks')[date('w', strtotime($result->CALD_DATE))] == '土' || config('consts.weeks')[date('w', strtotime($result->CALD_DATE))] == '日'? 'text-danger':''); ?>" style="width: 30px; display: inline-block;">
                                                                        <?php echo e(config('consts.weeks')[date('w', strtotime($result->CALD_DATE))]); ?>

                                                                    </span>
                                                                </td>
                                                                <td class="" style="position:sticky; background:#fff; border-right: 1px solid #aaa; width: 150px; left: 110px;">
                                                                    <select
                                                                        name="worktime[<?php echo e($i); ?>][WORKPTN_CD]"
                                                                        id="txtWorkPtnCd"
                                                                        class="workPtnCd coloredSelect"
                                                                        style="width: 150px;"
                                                                    >
                                                                        <?php $__currentLoopData = $workptn_names; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workptn_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option
                                                                                value="<?php echo e($workptn_name->WORKPTN_CD); ?>"
                                                                                <?php echo e($workptn_name->WORK_CLS_CD == '00' ? 'class=text-danger' : 'style=color:black;'); ?>

                                                                                <?php echo e($workptn_name->WORKPTN_NAME == $result->WORKPTN_NAME ? "selected" : ""); ?>

                                                                            >
                                                                                <?php echo e($workptn_name->WORKPTN_NAME); ?>

                                                                            </option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>
                                                                </td>
                                                                <td class="" style="position:sticky; background:#fff; border-right: 1px solid #aaa; width: 70px; left: 260px;">
                                                                    <select
                                                                        name="worktime[<?php echo e($i); ?>][REASON_CD]"
                                                                        id="txtReasonCd"
                                                                        class="reasonCd coloredSelect"
                                                                        style="width: 70px;"
                                                                    >
                                                                        <?php $__currentLoopData = $reason_names; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reason_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option
                                                                                value="<?php echo e($reason_name->REASON_CD); ?>"
                                                                                <?php if($reason_name->REASON_PTN_CD == '01'): ?> class="text-danger"
                                                                                <?php elseif($reason_name->REASON_PTN_CD == '02'): ?> class="text-primary"
                                                                                <?php else: ?> style="color:black;"
                                                                                <?php endif; ?>
                                                                                <?php echo e($reason_name->REASON_NAME == $result->REASON_NAME ? "selected" : ""); ?>

                                                                            >
                                                                                <?php echo e($reason_name->REASON_NAME); ?>

                                                                            </option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>
                                                                </td>
                                                                <td style="white-space: nowrap;">
                                                                    <input
                                                                        name="worktime[<?php echo e($i); ?>][OFC_TIME]"
                                                                        class="ofcTime"
                                                                        id="txtOfcTime"
                                                                        type="text"
                                                                        maxlength="5"
                                                                        oninput="value=onlyHalfWord(value)"
                                                                        value="<?php echo e($result->OFC_TIME); ?>"
                                                                        <?php if( $result->OFC_CNT >= 2 && !$result->OFC_TIME_HH ): ?>
                                                                        style="width: 40px; background-color: lightskyblue;"
                                                                        <?php elseif( !$result->OFC_TIME_HH && $result->LEV_TIME_HH ): ?>
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
                                                                    <input
                                                                        name="worktime[<?php echo e($i); ?>][LEV_TIME]"
                                                                        class="levTime"
                                                                        id="txtLevTime"
                                                                        type="text"
                                                                        maxlength="5"
                                                                        oninput="value=onlyHalfWord(value)"
                                                                        value="<?php echo e($result->LEV_TIME); ?>"
                                                                        <?php if( $result->LEV_CNT >= 2 && !$result->LEV_TIME_HH ): ?>
                                                                        style="width: 40px; background-color: lightskyblue;"
                                                                        <?php elseif( $result->OFC_TIME_HH && !($result->LEV_TIME_HH) ): ?>
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
                                                                    <input
                                                                        name="worktime[<?php echo e($i); ?>][OUT1_TIME]"
                                                                        class="out1Time"
                                                                        id="txtOut1Time"
                                                                        type="text"
                                                                        maxlength="5"
                                                                        oninput="value=onlyHalfWord(value)"
                                                                        value="<?php echo e($result->OUT1_TIME); ?>"
                                                                        <?php if( $result->OUT1_CNT >= 2 && !$result->OUT1_TIME_HH ): ?>
                                                                        style="width: 40px; background-color: lightskyblue;"
                                                                        <?php elseif( !$result->OUT1_TIME_HH && $result->IN1_TIME_HH ): ?>
                                                                        style="width: 40px; background-color: tomato;"
                                                                        <?php elseif( !$result->OUT1_TIME_HH && !$result->IN1_TIME_HH ): ?>
                                                                        style="width: 40px;"
                                                                        <?php else: ?>
                                                                        style="width: 40px;"
                                                                        <?php endif; ?>
                                                                    >
                                                                    <span class="text-danger timeError"></span>
                                                                </td>
                                                                <td style="white-space: nowrap;">
                                                                    <input
                                                                        name="worktime[<?php echo e($i); ?>][IN1_TIME]"
                                                                        class="in1Time"
                                                                        id="txtIn1Time"
                                                                        type="text"
                                                                        maxlength="5"
                                                                        oninput="value=onlyHalfWord(value)"
                                                                        value="<?php echo e($result->IN1_TIME); ?>"
                                                                        <?php if( $result->IN1_CNT >= 2 && !$result->IN1_TIME_HH ): ?>
                                                                        style="width: 40px; background-color: lightskyblue;"
                                                                        <?php elseif( $result->OUT1_TIME_HH && !($result->IN1_TIME_HH) ): ?>
                                                                        style="width: 40px; background-color: tomato;"
                                                                        <?php elseif( !$result->OUT1_TIME_HH && !$result->IN1_TIME_HH ): ?>
                                                                        style="width: 40px;"
                                                                        <?php else: ?>
                                                                        style="width: 40px;"
                                                                        <?php endif; ?>
                                                                    >
                                                                    <span class="text-danger timeError"></span>
                                                                </td>
                                                                <td style="white-space: nowrap;">
                                                                    <input
                                                                        name="worktime[<?php echo e($i); ?>][OUT2_TIME]"
                                                                        class="out2Time"
                                                                        id="txtOut2Time"
                                                                        type="text"
                                                                        maxlength="5"
                                                                        oninput="value=onlyHalfWord(value)"
                                                                        value="<?php echo e($result->OUT2_TIME); ?>"
                                                                        <?php if( $result->OUT2_CNT >= 2 && !$result->OUT2_TIME_HH ): ?>
                                                                        style="width: 40px; background-color: lightskyblue;"
                                                                        <?php elseif( !$result->OUT2_TIME_HH && $result->IN2_TIME_HH ): ?>
                                                                        style="width: 40px; background-color: tomato;"
                                                                        <?php elseif( !$result->OUT2_TIME_HH && !$result->IN2_TIME_HH ): ?>
                                                                        style="width: 40px;"
                                                                        <?php else: ?>
                                                                        style="width: 40px;"
                                                                        <?php endif; ?>
                                                                    >
                                                                    <span class="text-danger timeError"></span>
                                                                </td>
                                                                <td style="white-space: nowrap;">
                                                                    <input
                                                                        name="worktime[<?php echo e($i); ?>][IN2_TIME]"
                                                                        class="in2Time"
                                                                        id="txtIn2Time"
                                                                        type="text"
                                                                        maxlength="5"
                                                                        oninput="value=onlyHalfWord(value)"
                                                                        value="<?php echo e($result->IN2_TIME); ?>"
                                                                        <?php if( $result->IN2_CNT >= 2 && !$result->IN2_TIME_HH ): ?>
                                                                        style="width: 40px; background-color: lightskyblue;"
                                                                        <?php elseif( $result->OUT2_TIME_HH && !($result->IN2_TIME_HH) ): ?>
                                                                        style="width: 40px; background-color: tomato;"
                                                                        <?php elseif( !$result->OUT2_TIME_HH && !$result->IN2_TIME_HH ): ?>
                                                                        style="width: 40px;"
                                                                        <?php else: ?>
                                                                        style="width: 40px;"
                                                                        <?php endif; ?>
                                                                    >
                                                                    <span class="text-danger timeError"></span>
                                                                </td>
                                                                <td style="white-space: nowrap;">
                                                                    <input
                                                                        name="worktime[<?php echo e($i); ?>][WORK_TIME]"
                                                                        class="workTime noCalc"
                                                                        id="txtWorkTime"
                                                                        style="width: 40px;"
                                                                        type="text"
                                                                        maxlength="5"
                                                                        oninput="value=onlyHalfWord(value)"
                                                                        value="<?php echo e($result->WORK_TIME); ?>"
                                                                    >
                                                                    <span class="text-danger timeError"></span>
                                                                </td>
                                                                <td style="white-space: nowrap;">
                                                                    <input
                                                                        name="worktime[<?php echo e($i); ?>][TARD_TIME]"
                                                                        class="tardTime noCalc"
                                                                        id="txtTardTime"
                                                                        style="width: 40px;"
                                                                        type="text"
                                                                        maxlength="5"
                                                                        oninput="value=onlyHalfWord(value)"
                                                                        value="<?php echo e($result->TARD_TIME); ?>"
                                                                    >
                                                                    <span class="text-danger timeError"></span>
                                                                </td>
                                                                <td style="white-space: nowrap;">
                                                                    <input
                                                                        name="worktime[<?php echo e($i); ?>][LEAVE_TIME]"
                                                                        class="leaveTime noCalc"
                                                                        id="txtLeaveTime"
                                                                        style="width: 40px;"
                                                                        type="text"
                                                                        maxlength="5"
                                                                        oninput="value=onlyHalfWord(value)"
                                                                        value="<?php echo e($result->LEAVE_TIME); ?>"
                                                                    >
                                                                    <span class="text-danger timeError"></span>
                                                                </td>
                                                                <td style="white-space: nowrap;">
                                                                    <input
                                                                        name="worktime[<?php echo e($i); ?>][OUT_TIME]"
                                                                        class="outTime noCalc"
                                                                        id="txtOutTime"
                                                                        style="width: 40px;"
                                                                        type="text"
                                                                        maxlength="5"
                                                                        oninput="value=onlyHalfWord(value)"
                                                                        value="<?php echo e($result->OUT_TIME); ?>"
                                                                    >
                                                                    <span class="text-danger timeError"></span>
                                                                </td>
                                                                <td style="white-space: nowrap;">
                                                                    <input
                                                                        name="worktime[<?php echo e($i); ?>][OVTM1_TIME]"
                                                                        class="ovtm1Time noCalc"
                                                                        id="txtOvtm1Time"
                                                                        style="width: 40px;"
                                                                        type="text"
                                                                        maxlength="5"
                                                                        oninput="value=onlyHalfWord(value)"
                                                                        value="<?php echo e($result->OVTM1_TIME); ?>"
                                                                    >
                                                                    <span class="text-danger timeError"></span>
                                                                </td>
                                                                <td style="white-space: nowrap;">
                                                                    <input
                                                                        name="worktime[<?php echo e($i); ?>][OVTM2_TIME]"
                                                                        class="ovtm2Time noCalc"
                                                                        id="txtOvtm2Time"
                                                                        style="width: 40px;"
                                                                        type="text"
                                                                        maxlength="5"
                                                                        oninput="value=onlyHalfWord(value)"
                                                                        value="<?php echo e($result->OVTM2_TIME); ?>"
                                                                    >
                                                                    <span class="text-danger timeError"></span>
                                                                </td>
                                                                <td style="white-space: nowrap;">
                                                                    <input
                                                                        name="worktime[<?php echo e($i); ?>][OVTM3_TIME]"
                                                                        class="ovtm3Time noCalc"
                                                                        id="txtOvtm3Time"
                                                                        style="width: 40px;"
                                                                        type="text"
                                                                        maxlength="5"
                                                                        oninput="value=onlyHalfWord(value)"
                                                                        value="<?php echo e($result->OVTM3_TIME); ?>"
                                                                    >
                                                                    <span class="text-danger timeError"></span>
                                                                </td>
                                                                <td style="white-space: nowrap;">
                                                                    <input
                                                                        name="worktime[<?php echo e($i); ?>][OVTM4_TIME]"
                                                                        class="ovtm4Time noCalc"
                                                                        id="txtOvtm4Time"
                                                                        style="width: 40px;"
                                                                        type="text"
                                                                        maxlength="5"
                                                                        oninput="value=onlyHalfWord(value)"
                                                                        value="<?php echo e($result->OVTM4_TIME); ?>"
                                                                    >
                                                                    <span class="text-danger timeError"></span>
                                                                </td>
                                                                <td style="white-space: nowrap;">
                                                                    <input
                                                                        name="worktime[<?php echo e($i); ?>][OVTM5_TIME]"
                                                                        class="ovtm5Time noCalc"
                                                                        id="txtOvtm5Time"
                                                                        style="width: 40px;"
                                                                        type="text"
                                                                        maxlength="5"
                                                                        oninput="value=onlyHalfWord(value)"
                                                                        value="<?php echo e($result->OVTM5_TIME); ?>"
                                                                    >
                                                                    <span class="text-danger timeError"></span>
                                                                </td>
                                                                <td style="white-space: nowrap;">
                                                                    <input
                                                                        name="worktime[<?php echo e($i); ?>][OVTM6_TIME]"
                                                                        class="ovtm6Time noCalc"
                                                                        id="txtOvtm6Time"
                                                                        style="width: 40px;"
                                                                        type="text"
                                                                        maxlength="5"
                                                                        oninput="value=onlyHalfWord(value)"
                                                                        value="<?php echo e($result->OVTM6_TIME); ?>"
                                                                    >
                                                                    <span class="text-danger timeError"></span>
                                                                </td>
                                                                <td style="white-space: nowrap;">
                                                                    <input
                                                                        name="worktime[<?php echo e($i); ?>][EXT1_TIME]"
                                                                        class="ext1Time noCalc"
                                                                        id="txtExt1Time"
                                                                        style="width: 40px;"
                                                                        type="text"
                                                                        maxlength="5"
                                                                        oninput="value=onlyHalfWord(value)"
                                                                        value="<?php echo e($result->EXT1_TIME); ?>"
                                                                    >
                                                                    <span class="text-danger timeError"></span>
                                                                </td>
                                                                <td style="white-space: nowrap;">
                                                                    <input
                                                                        name="worktime[<?php echo e($i); ?>][EXT2_TIME]"
                                                                        class="ext2Time noCalc"
                                                                        id="txtExt2Time"
                                                                        style="width: 40px;"
                                                                        type="text"
                                                                        maxlength="5"
                                                                        oninput="value=onlyHalfWord(value)"
                                                                        value="<?php echo e($result->EXT2_TIME); ?>"
                                                                    >
                                                                    <span class="text-danger timeError"></span>
                                                                </td>
                                                                <td style="white-space: nowrap;">
                                                                    <input
                                                                        name="worktime[<?php echo e($i); ?>][EXT3_TIME]"
                                                                        class="ext3Time noCalc"
                                                                        id="txtExt3Time"
                                                                        style="width: 40px;"
                                                                        type="text"
                                                                        maxlength="5"
                                                                        oninput="value=onlyHalfWord(value)"
                                                                        value="<?php echo e($result->EXT3_TIME); ?>"
                                                                    >
                                                                    <span class="text-danger timeError"></span>
                                                                </td>
                                                                <td class="GridViewRowLeft" style="white-space: nowrap;">
                                                                    <input
                                                                        name="worktime[<?php echo e($i); ?>][REMARK]"
                                                                        class="remark"
                                                                        id="txtRemark"
                                                                        style="width: 250px;"
                                                                        type="text"
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
                                <div>
                                    <!-- ErrorMessage -->
                                    <span class="text-danger" id="timeFormatError"></span><br>
                                    <span class="text-danger" id="sizeError"></span>
                                </div>
                                <br>
                                <!-- footer -->
                                <div class="GridViewStyle3">
                                <?php if(Session::has('id')): ?>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th>出勤</th>
                                                <th>休出</th>
                                                <th>特休</th>
                                                <th>有休</th>
                                                <th>欠勤</th>
                                                <th>代休</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span id="lblSumWorkdayCnt" style="display: inline-block;"><?php if(isset($workdaycnt)): ?><?php echo e(($workdaycnt['SUM_WORKDAY_CNT'] == 0 ? '' :($workdaycnt['SUM_WORKDAY_CNT'] ? $workdaycnt['SUM_WORKDAY_CNT'] : ''))); ?> <?php endif; ?></span>
                                                </td>
                                                <td>
                                                    <span id="lblSumHolworkCnt" style="display: inline-block;"><?php if(isset($holdaycnt)): ?><?php echo e(($holdaycnt['SUM_HOLWORK_CNT'] == 0 ? '' :($holdaycnt['SUM_HOLWORK_CNT'] ? $holdaycnt['SUM_HOLWORK_CNT'] : ''))); ?> <?php endif; ?></span>
                                                </td>
                                                <td>
                                                    <span id="lblSumSpcholCnt" style="display: inline-block;"><?php if(isset($spcholcnt)): ?><?php echo e(($spcholcnt['SUM_SPCHOL_CNT'] == 0 ? '' :($spcholcnt['SUM_SPCHOL_CNT'] ? $spcholcnt['SUM_SPCHOL_CNT'] : ''))); ?> <?php endif; ?></span>
                                                </td>
                                                <td>
                                                    <span id="lblSumPadholCnt" style="display: inline-block;"><?php if(isset($padholcnt)): ?><?php echo e(($padholcnt['SUM_PADHOL_CNT'] == 0 ? '' :($padholcnt['SUM_PADHOL_CNT'] ? $padholcnt['SUM_PADHOL_CNT'] : ''))); ?> <?php endif; ?></span>
                                                </td>
                                                <td>
                                                    <span id="lblSumAbcworkCnt" style="display: inline-block;"><?php if(isset($abcworkcnt)): ?><?php echo e(($abcworkcnt['SUM_ABCWORK_CNT'] == 0 ? '' :($abcworkcnt['SUM_ABCWORK_CNT'] ? $abcworkcnt['SUM_ABCWORK_CNT'] : ''))); ?> <?php endif; ?></span>
                                                </td>
                                                <td>
                                                    <span id="lblSumCompdayCnt" style="display: inline-block;"><?php if(isset($compdaycnt)): ?><?php echo e(($compdaycnt['SUM_COMPDAY_CNT'] == 0 ? '' :($compdaycnt['SUM_COMPDAY_CNT'] ? $compdaycnt['SUM_COMPDAY_CNT'] : ''))); ?> <?php endif; ?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>出勤時間</th>
                                                <th>遅刻時間</th>
                                                <th>早退時間</th>
                                                <th>外出時間</th>
                                                <?php for($i = 0; $i < 6; $i++): ?>
                                                <th>
                                                    <?php if(key_exists($i, $ovtm_header_names)): ?>
                                                    <?php echo e($ovtm_header_names[$i]['WORK_DESC_NAME']); ?>

                                                    <?php endif; ?>
                                                </th>
                                                <?php endfor; ?>
                                                <th>合計</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span id="lblSumWorkTime" style="display: inline-block;"><?php if(isset($worktime)): ?><?php echo e(($worktime['SUM_WORK_TIME'] == '0:00' ? '' : ($worktime['SUM_WORK_TIME'] ? $worktime['SUM_WORK_TIME'] : ''))); ?> <?php endif; ?></span>
                                                </td>
                                                <td>
                                                    <span id="lblSumTardTime" style="display: inline-block;"><?php if(isset($tardtime)): ?><?php echo e(($tardtime['SUM_TARD_TIME'] == '0:00' ? '' : ($tardtime['SUM_TARD_TIME'] ? $tardtime['SUM_TARD_TIME'] : ''))); ?> <?php endif; ?></span>
                                                </td>
                                                <td>
                                                    <span id="lblSumLeaveTime" style="display: inline-block;"><?php if(isset($leavetime)): ?><?php echo e(($leavetime['SUM_LEAVE_TIME'] == '0:00' ? '' : ($leavetime['SUM_LEAVE_TIME'] ? $leavetime['SUM_LEAVE_TIME'] : ''))); ?> <?php endif; ?></span>
                                                </td>
                                                <td>
                                                    <span id="lblSumOut1Time" style="display: inline-block;"><?php if(isset($out1time)): ?><?php echo e(($out1time['SUM_OUT_TIME'] == '0:00' ? '' : ($out1time['SUM_OUT_TIME'] ? $out1time['SUM_OUT_TIME'] : ''))); ?> <?php endif; ?></span>
                                                </td>
                                                <td>
                                                    <span id="lblSumOvtm1Time" style="display: inline-block;"><?php if(isset($ovtm1time)): ?><?php echo e(($ovtm1time['SUM_OVTM1_TIME'] == '0:00' ? '' : ($ovtm1time['SUM_OVTM1_TIME'] ? $ovtm1time['SUM_OVTM1_TIME'] : ''))); ?> <?php endif; ?></span>
                                                </td>
                                                <td>
                                                    <span id="lblSumOvtm2Time" style="display: inline-block;"><?php if(isset($ovtm2time)): ?><?php echo e(($ovtm2time['SUM_OVTM2_TIME'] == '0:00' ? '' : ($ovtm2time['SUM_OVTM2_TIME'] ? $ovtm2time['SUM_OVTM2_TIME'] : ''))); ?> <?php endif; ?></span>
                                                </td>
                                                <td>
                                                    <span id="lblSumOvtm3Time" style="display: inline-block;"><?php if(isset($ovtm3time)): ?><?php echo e(($ovtm3time['SUM_OVTM3_TIME'] == '0:00' ? '' : ($ovtm3time['SUM_OVTM3_TIME'] ? $ovtm3time['SUM_OVTM3_TIME'] : ''))); ?> <?php endif; ?></span>
                                                </td>
                                                <td>
                                                    <span id="lblSumOvtm4Time" style="display: inline-block;"><?php if(isset($ovtm4time)): ?><?php echo e(($ovtm4time['SUM_OVTM4_TIME'] == '0:00' ? '' : ($ovtm4time['SUM_OVTM4_TIME'] ? $ovtm4time['SUM_OVTM4_TIME'] : ''))); ?> <?php endif; ?></span>
                                                </td>
                                                <td>
                                                    <span id="lblSumOvtm5Time" style="display: inline-block;"><?php if(isset($ovtm5time)): ?><?php echo e(($ovtm5time['SUM_OVTM5_TIME'] == '0:00' ? '' : ($ovtm5time['SUM_OVTM5_TIME'] ? $ovtm5time['SUM_OVTM5_TIME'] : ''))); ?> <?php endif; ?></span>
                                                </td>
                                                <td>
                                                    <span id="lblSumOvtm6Time" style="display: inline-block;"><?php if(isset($ovtm6time)): ?><?php echo e(($ovtm6time['SUM_OVTM6_TIME'] == '0:00' ? '' : ($ovtm6time['SUM_OVTM6_TIME'] ? $ovtm6time['SUM_OVTM6_TIME'] : ''))); ?> <?php endif; ?></span>
                                                </td>
                                                <td>
                                                    <span id="lblSumTimes" style="display: inline-block;"><?php if(isset($getSumTimes)): ?><?php echo e(($getSumTimes['SUM_TIMES'] == '0:00' ? '' : ($getSumTimes['SUM_TIMES'] ? $getSumTimes['SUM_TIMES'] : ''))); ?> <?php endif; ?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <?php for($i = 0; $i < 3; $i++): ?>
                                                <th scope="col">
                                                    <?php if(key_exists($i, $ext_header_names)): ?>
                                                    <?php echo e($ext_header_names[$i]['WORK_DESC_NAME']); ?>

                                                    <?php endif; ?>
                                                </th>
                                                <?php endfor; ?>
                                                <th>合計</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span id="lblSumExt1Time" style="display: inline-block;"><?php if(isset($ext1time)): ?><?php echo e(($ext1time['SUM_EXT1_TIME'] == '0:00' ? '' : ($ext1time['SUM_EXT1_TIME'] ? $ext1time['SUM_EXT1_TIME'] : ''))); ?> <?php endif; ?></span>
                                                </td>
                                                <td>
                                                    <span id="lblSumExt2Time" style="display: inline-block;"><?php if(isset($ext2time)): ?><?php echo e(($ext2time['SUM_EXT2_TIME'] == '0:00' ? '' : ($ext2time['SUM_EXT2_TIME'] ? $ext2time['SUM_EXT2_TIME'] : ''))); ?> <?php endif; ?></span>
                                                </td>
                                                <td>
                                                    <span id="lblSumExt3Time" style="display: inline-block;"><?php if(isset($ext3time)): ?><?php echo e(($ext3time['SUM_EXT3_TIME'] == '0:00' ? '' : ($ext3time['SUM_EXT3_TIME'] ? $ext3time['SUM_EXT3_TIME'] : ''))); ?> <?php endif; ?></span>
                                                </td>
                                                <td>
                                                    <span id="lblSumExtTimes" style="display: inline-block;"><?php if(isset($getSumExtTimes)): ?><?php echo e(($getSumExtTimes['SUM_EXT_TIMES'] == '0:00' ? '' : ($getSumExtTimes['SUM_EXT_TIMES'] ? $getSumExtTimes['SUM_EXT_TIMES'] : ''))); ?> <?php endif; ?></span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php endif; ?>
                                </div>
                                <div class="line"><hr></div>
                                <p class="ButtonField2">
                                    <input
                                        name="btnCancel2"
                                        class="ButtonStyle1 submit-form"
                                        id="btnCancel2"
                                        type="button"
                                        value="キャンセル"
                                        data-url = "<?php echo e(route('wte.cancel')); ?>"
                                    >
                                </p>
                            </div>
                        </form>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<input type="hidden" id="timeCalUrl" value="<?php echo e(url('/work_time/WorkTimeEditorTimeCal')); ?>">
<input type="hidden" id="dayCalUrl" value="<?php echo e(url('/work_time/WorkTimeEditorDayCal')); ?>">
<input type="hidden" id="formatError" value="<?php echo e(getArrValue($error_messages, 2003)); ?>">
<input type="hidden" id="dataSizeError" value="<?php echo e(getArrValue($error_messages, 2009)); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
var emp_cd = "<?php echo e($search_data['txtEmpCd']); ?>";

// formボタンクリック
$(document).on('click', '.submit-form', function(){
    var url = $(this).data('url');
    $('#form').attr('action', url);
    $('#form').submit();
});

// 更新の時ダイアログ
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
    $('#ddlDate').datepicker({
        format: 'yyyy年mm月',
        autoclose: true,
        language: 'ja',
        minViewMode : 1
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
})

// ローディング設定
var gotoSearch = function(e) {
    var is_index = "<?php echo e(!empty($is_index) ? true : false); ?>";
    if(emp_cd != "" && is_index) {
        $.LoadingOverlay("show");
        $("#btnShow").click();
    }
};
</script>
<script src="<?php echo e(asset('js/work_time/WorkTimeEditor.js')); ?>" defer></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('menu.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\06_SVN\resources\views/work_time/WorkTimeEditor.blade.php ENDPATH**/ ?>