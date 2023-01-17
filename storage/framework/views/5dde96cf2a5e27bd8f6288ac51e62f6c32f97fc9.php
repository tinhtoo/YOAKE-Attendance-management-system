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
                                            <select name="ddlTargetYear" id="ddlTargetYear" class="imeDisabled" style="width: 70px;">
                                                <?php for($y=date('Y')-3; $y<=date('Y')+3; $y++): ?> 
                                                <option 
                                                value="<?php echo e($y); ?>" <?php echo e(old("ddlTargetYear", !empty($search_data["ddlTargetYear"]) ? $search_data["ddlTargetYear"]: date('Y')) == $y ? "selected" : ""); ?>

                                                >
                                                <?php echo e($y); ?>

                                                </option>
                                                <?php endfor; ?>
                                            </select>
                                            &nbsp;年

                                            <select name="ddlTargetMonth"  id="ddlTargetMonth" class="imeDisabled">
                                                <?php for($m=1; $m<=12; $m++): ?> 
                                                <option value="<?php echo e($m); ?>" <?php echo e(old("ddlTargetMonth", !empty($search_data["ddlTargetMonth"]) ? $search_data["ddlTargetMonth"]: date('m')) == $m ? "selected" : ""); ?>

                                                >
                                                <?php echo e($m); ?>

                                                </option>
                                                <?php endfor; ?>
                                            </select>
                                            &nbsp;月度
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>社員番号</th>
                                        <td>
                                            <input name="txtEmpCd" class="imeDisabled" id="txtEmpCd" style="width: 80px;" type="text" maxlength="10" value="<?php echo e(old('txtEmpCd', !empty($search_data['txtEmpCd'])?$search_data['txtEmpCd']:'')); ?>">
                                            <input name="btnSearchEmpCd" class="SearchButton" id="btnSearchEmpCd" type="button" value="?">
                                            <input name="empName" class="OutlineLabel" type="text" style="width: 200px; height: 17px; display: inline-block;" id="empName" value="<?php echo e(session()->get('empname')); ?>" readonly="readonly">
                                            
                                            <?php if($errors->has('txtEmpCd')): ?>
                                            <span class="alert-danger"><?php echo e($errors->first('txtEmpCd')); ?></span>
                                            <?php endif; ?>


                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th>部門</th>
                                        <td>
                                        <input name ="deptName" class="OutlineLabel" type="text" style="width: 200px; height: 17px; display: inline-block;" id="lblDeptName" value="<?php echo e(session()->get('deptname')); ?>" readonly="readonly">
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
                                            >                                           
                                            <input 
                                                name="btnCancel2" 
                                                class="ButtonStyle1 submit-form" 
                                                id="btnCancel2"
                                                type="button" 
                                                value="キャンセル"
                                                data-url = "<?php echo e(route('wte.cancel')); ?>"
                                            >
                                            <?php if(!empty($results)): ?>
                                                <input 
                                                    name="btnEdit" 
                                                    class="submit-form"
                                                    type="button" 
                                                    value="編集"
                                                    data-url = "<?php echo e(route('wte.edit')); ?>"
                                                >
                                                <!-- <input 
                                                    name="btnEdit" 
                                                    id="btnUpdate" 
                                                    type="button"
                                                    value="更新" 
                                                    style="display: none;"
                                                    class="submit-form" 
                                                    data-url = "<?php echo e(route('wte.update')); ?>"
                                                > -->
                                            <?php endif; ?>
                                            &nbsp;
                                            <span id="lblNoStampColor" style="background-color: tomato;">　　　</span>
                                            <span id="lblNoStamp">未打刻</span>
                                            &nbsp;
                                            <span id="lblDbStampColor" style="background-color: lightskyblue;">　　　</span>
                                            <span id="lblDbStamp">二重打刻</span>
                                            &nbsp;
                                            <span class="font-style2" id="lblFixMsg"></span>


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
                                            <table class="GridViewBorder GridViewRowCenter GridViewPadding" id="gvWorkTime" style="border-collapse: collapse;" border="1" rules="all" cellspacing="0">
                                                <tbody id="gridview-warp">
                                                    <?php if(isset($results)): ?>
                                                        <?php if(count($results) < 1): ?> 
                                                            <tr style="width:70px;">
                                                                <td><span><?php echo e($messages); ?></span></td>
                                                            </tr>
                                                        <?php else: ?>
                                                            <tr>
                                                                <th scope="col">
                                                                    日付
                                                                </th>
                                                                <th scope="col">
                                                                    曜日
                                                                </th>
                                                                <!-- <th scope="col">&nbsp;</th> -->
                                                                <th scope="col">
                                                                    勤務体系
                                                                </th>
                                                                <th scope="col">
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
                                                                <th scope="col">早出時間</th>
                                                                <th scope="col">普通残業時間</th>
                                                                <th scope="col">深夜残業時間</th>
                                                                <th scope="col">休日残業時間</th>
                                                                <th scope="col">休日深夜残業時間</th>
                                                                <th scope="col"></th>
                                                                <th scope="col">深夜割増</th>
                                                                <th scope="col"></th>
                                                                <th scope="col"></th>
                                                                <th scope="col">
                                                                    備考
                                                                </th>
                                                                <!-- <th scope="col">&nbsp;</th> -->
                                                            </tr>
                                                            <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr>
                                                                    <td id="b" style="width: 80px;">
                                                                        <span id="lblCaldDate" class="<?php echo e($result->WORKPTN_CD == '002'?'text-danger':''); ?>" style="width: 80px; display: inline-block;"><?php echo e(date('Y/m/d', strtotime($result->CALD_DATE))); ?></span>
                                                                    </td>
                                                                    <td id="b" style="width: 30px;">
                                                                        <span id="lblDayOfWeek" class="<?php echo e(config('consts.weeks') == '土' && '日'?'text-danger':''); ?>" style="width: 30px; display: inline-block;"><?php echo e(config('consts.weeks')[date('w', strtotime($result->CALD_DATE))]); ?></span>
                                                                    </td>
                                                                    <!-- <td id="b">
                                                                                                            <input name="btnEdit" id="btnEdit" onclick="javascript:__doPostBack('btnEdit','')" type="button" value="編集">
                                                                                                        </td> -->
                                                                    <td id="b" style="width: 150px;">
                                                                        <span id="lblWorkPtnName" name="lblWorkPtnName" class="<?php echo e($result->WORK_CLS_CD == '00'?'text-danger':''); ?>" style="width: 150px; display: inline-block;"><?php echo e($result->WORKPTN_NAME); ?></span>

                                                                        <!-- <td id="a" style="width: 150px; display: none;">
                                                                                                                <select name="ddlWorkPtn" id="ddlWorkPtn" style="width: 150px;" onchange="javascript:setTimeout('__doPostBack(\'ddlWorkPtn\',\'\')', 0)">
                                                                                                                    <?php $__currentLoopData = $workptn_names; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workptn_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                                    <option value="<?php echo e($workptn_name->WORKPTN_CD); ?>" class="<?php echo e($workptn_name->WORK_CLS_CD == '00'?'text-danger':''); ?>" <?php echo e($workptn_name->WORKPTN_NAME ==  $result->WORKPTN_NAME ? "selected" : ""); ?>>
                                                                                                                        <?php echo e($workptn_name->WORKPTN_NAME); ?>

                                                                                                                    </option>
                                                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                                                </select>
                                                                                                            </td> -->
                                                                    </td>
                                                                    <td id="b" style="width: 70px;">
                                                                        <span id="lblReasonName" class="<?php echo e($result->REASON_PTN_CD == '01'?'text-danger':''); ?> && <?php echo e($result->REASON_PTN_CD == '02'?'text-primary':''); ?>" style="width: 70px; display: inline-block;"><?php echo e($result->REASON_NAME); ?></span>
                                                                        <!-- <td id="a" style="width: 70px; display: none;">
                                                                                                                <select name="ddlReason" id="ddlReason" style="width: 70px;" onchange="javascript:setTimeout('__doPostBack(\'ddlReason\',\'\')', 0)">
                                                                                                                    <?php $__currentLoopData = $reason_names; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reason_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                                    <option value="<?php echo e($reason_name->REASON_CD); ?>" class="<?php echo e($reason_name->REASON_PTN_CD == '01'?'text-danger':''); ?> && <?php echo e($reason_name->REASON_PTN_CD == '02'?'text-primary':''); ?>" <?php echo e($reason_name->REASON_NAME ==  $result->REASON_NAME ? "selected" : ""); ?>>
                                                                                                                        <?php echo e($reason_name->REASON_NAME); ?>

                                                                                                                    </option>
                                                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                                                </select>
                                                                                                            </td> -->
                                                                    </td>
                                                                    <td id="b" style="white-space: nowrap;">
                                                                        <span id="lblOfcTime" style="width: 40px; display: inline-block;"><?php echo e($result->OFC_TIME); ?></span>
                                                                        <!-- <td id="a" style="display: none;">
                                                                                                                                                <input name="txtOfcTime" class="imeDisabled" id="txtOfcTime" style="width: 40px;" type="text" maxlength="5" value="<?php echo e($result->OFC_TIME); ?>">
                                                                                                                                            </td> -->
                                                                    </td>
                                                                    <td id="b" style="white-space: nowrap;">
                                                                        <span id="lblLevTime" style="width: 40px; display: inline-block;"><?php echo e($result->LEV_TIME); ?></span>
                                                                        <!-- <td id="a" style="display: none;">
                                                                                                                                                    <input name="txtLevTime" class="imeDisabled" id="txtLevTime" style="width: 40px;" type="text" maxlength="5" value="<?php echo e($result->LEV_TIME); ?>">
                                                                                                                                                </td> -->
                                                                    </td>
                                                                    <td id="b" style="white-space: nowrap;">
                                                                        <span id="lblOut1Time" style="width: 40px; display: inline-block;"><?php echo e($result->OUT1_TIME); ?></span>
                                                                        <!-- <td id="a" style="display: none;">
                                                                                                                                                    <input name="txtIn1Time" class="imeDisabled" id="txtIn1Time" style="width: 40px;" type="text" maxlength="5" value="<?php echo e($result->OUT1_TIME); ?>">
                                                                                                                                                </td> -->
                                                                    </td>
                                                                    <td id="b" style="white-space: nowrap;">
                                                                        <span id="lblIn1Time" style="width: 40px; display: inline-block;"><?php echo e($result->IN1_TIME); ?></span>
                                                                        <!-- <td id="a" style="display: none;">
                                                                                                                                                    <input name="txtIn1Time" class="imeDisabled" id="txtIn1Time" style="width: 40px;" type="text" maxlength="5" value="<?php echo e($result->IN1_TIME); ?>">
                                                                                                                                                </td> -->
                                                                    </td>
                                                                    <td id="b" style="white-space: nowrap;">
                                                                        <span id="lblOut2Time" style="width: 40px; display: inline-block;"><?php echo e($result->OUT2_TIME); ?></span>
                                                                        <!-- <td id="a" style="display: none;">
                                                                                                                                                    <input name="txtOut2Time" class="imeDisabled" id="txtOut2Time" style="width: 40px;" type="text" maxlength="5" value="<?php echo e($result->OUT2_TIME); ?>">
                                                                                                                                                </td> -->
                                                                    </td>
                                                                    <td id="b" style="white-space: nowrap;">
                                                                        <span id="lblIn2Time" style="width: 40px; display: inline-block;"><?php echo e($result->IN2_TIME); ?></span>
                                                                        <!-- <td id="a" style="display: none;">
                                                                                                                                                    <input name="txtIn2Time" class="imeDisabled" id="txtIn2Time" style="width: 40px;" type="text" maxlength="5" value="<?php echo e($result->IN2_TIME); ?>">
                                                                                                                                                </td> -->
                                                                    </td>
                                                                    <td id="b" style="white-space: nowrap;">
                                                                        <span id="lblWorkTime" style="width: 40px; display: inline-block;"><?php echo e($result->WORK_TIME); ?></span>
                                                                        <!-- <td id="a" style="display: none;">
                                                                                                                                                    <input name="txtWorkTime" class="imeDisabled" id="txtWorkTime" style="width: 40px;" type="text" maxlength="5" value="<?php echo e($result->WORK_TIME); ?>">
                                                                                                                                                </td> -->
                                                                    </td>
                                                                    <td id="b" style="white-space: nowrap;">
                                                                        <span id="lblTardTime" style="width: 40px; display: inline-block;"><?php echo e($result->TARD_TIME); ?></span>
                                                                        <!-- <td id="a" style="display: none;">
                                                                                                                                                    <input name="txtTardTime" class="imeDisabled" id="txtTardTime" style="width: 40px;" type="text" maxlength="5" value="<?php echo e($result->TARD_TIME); ?>">
                                                                                                                                                </td> -->
                                                                    </td>
                                                                    <td id="b" style="white-space: nowrap;">
                                                                        <span id="lblLeaveTime" style="width: 40px; display: inline-block;"><?php echo e($result->LEAVE_TIME); ?></span>
                                                                        <!-- <td id="a" style="display: none;">
                                                                                                                                                    <input name="txtLeaveTime" class="imeDisabled" id="txtLeaveTime" style="width: 40px;" type="text" maxlength="5" value="<?php echo e($result->LEAVE_TIME); ?>">
                                                                                                                                                </td> -->
                                                                    </td>
                                                                    <td id="b" style="white-space: nowrap;">
                                                                        <span id="lblOutTime" style="width: 40px; display: inline-block;"><?php echo e($result->OUT_TIME); ?></span>
                                                                        <!-- <td id="a" style="display: none;">
                                                                                                                                                    <input name="txtOutTime" class="imeDisabled" id="txtOutTime" style="width: 40px;" type="text" maxlength="5" value="<?php echo e($result->OUT_TIME); ?>">
                                                                                                                                                </td> -->
                                                                    </td>
                                                                    <td id="b" style="white-space: nowrap;">
                                                                        <span id="lblOvtm1Time" style="width: 40px; display: inline-block;"><?php echo e($result->OVTM1_TIME); ?></span>
                                                                        <!-- <td id="a" style="display: none;">
                                                                                                                                                    <input name="txtOvtm1Time" class="imeDisabled" id="txtOvtm1Time" style="width: 40px;" type="text" maxlength="5" value="<?php echo e($result->OVTM1_TIME); ?>">
                                                                                                                                                </td> -->
                                                                    </td>
                                                                    <td id="b" style="white-space: nowrap;">
                                                                        <span id="lblOvtm2Time" style="width: 40px; display: inline-block;" autopostback="True" ontextchanged="WorkTimes_TextChanged"><?php echo e($result->OVTM2_TIME); ?></span>
                                                                        <!-- <td id="a" style="display: none;">
                                                                                                                                                    <input name="txtOvtm2Time" class="imeDisabled" id="txtOvtm2Time" style="width: 40px;" type="text" maxlength="5" value="<?php echo e($result->OVTM2_TIME); ?>">
                                                                                                                                                </td> -->
                                                                    </td>
                                                                    <td id="b" style="white-space: nowrap;">
                                                                        <span id="lblOvtm3Time" style="width: 40px; display: inline-block;" autopostback="True" ontextchanged="WorkTimes_TextChanged"><?php echo e($result->OVTM3_TIME); ?></span>
                                                                        <!-- <td id="a" style="display: none;">
                                                                                                                                                    <input name="txtOvtm3Time" class="imeDisabled" id="txtOvtm3Time" style="width: 40px;" type="text" maxlength="5" value="<?php echo e($result->OVTM3_TIME); ?>">
                                                                                                                                                </td> -->
                                                                    </td>
                                                                    <td id="b" style="white-space: nowrap;">
                                                                        <span id="lblOvtm4Time" style="width: 40px; display: inline-block;"><?php echo e($result->OVTM4_TIME); ?></span>
                                                                        <!-- <td id="a" style="display: none;">
                                                                                                                                                    <input name="txtOvtm4Time" class="imeDisabled" id="txtOvtm4Time" style="width: 40px;" type="text" maxlength="5" value="<?php echo e($result->OVTM4_TIME); ?>">
                                                                                                                                                </td> -->
                                                                    </td>
                                                                    <td id="b" style="white-space: nowrap;">
                                                                        <span id="lblOvtm5Time" style="width: 40px; display: inline-block;"><?php echo e($result->OVTM5_TIME); ?></span>
                                                                        <!-- <td id="a" style="display: none;">
                                                                                                                                                    <input name="txtOvtm5Time" class="imeDisabled" id="txtOvtm5Time" style="width: 40px;" type="text" maxlength="5" value="<?php echo e($result->OVTM5_TIME); ?>">
                                                                                                                                                </td> -->
                                                                    </td>
                                                                    <td id="b" style="white-space: nowrap;">
                                                                        <span id="lblOvtm6Time" style="width: 40px; display: inline-block;"><?php echo e($result->OVTM6_TIME); ?></span>
                                                                        <!-- <td id="a" style="display: none;">
                                                                                                                                                    <input name="txtOvtm6Time" class="imeDisabled" id="txtOvtm6Time" style="width: 40px;" type="text" maxlength="5" value="<?php echo e($result->OVTM6_TIME); ?>">
                                                                                                                                                </td> -->
                                                                    </td>
                                                                    <td id="b" style="white-space: nowrap;">
                                                                        <span id="lblExt1Time" style="width: 40px; display: inline-block;"><?php echo e($result->EXT1_TIME); ?></span>
                                                                        <!-- <td id="a" style="display: none;">
                                                                                                                                                    <input name="txtExt1Time" class="imeDisabled" id="txtExt1Time" style="width: 40px;" type="text" maxlength="5" value="<?php echo e($result->EXT1_TIME); ?>">
                                                                                                                                                </td> -->
                                                                    </td>
                                                                    <td id="b" style="white-space: nowrap;">
                                                                        <span id="lblExt2Time" style="width: 40px; display: inline-block;"><?php echo e($result->EXT2_TIME); ?></span>
                                                                        <!-- <td id="a" style="display: none;">
                                                                                                                                                    <input name="txtExt2Time" class="imeDisabled" id="txtExt2Time" style="width: 40px;" type="text" maxlength="5" value="<?php echo e($result->EXT2_TIME); ?>">
                                                                                                                                                </td> -->
                                                                    </td>
                                                                    <td id="b" style="white-space: nowrap;">
                                                                        <span id="lblExt3Time" style="width: 40px; display: inline-block;"><?php echo e($result->EXT3_TIME); ?></span>
                                                                        <!-- <td id="a" style="display: none;">
                                                                                                                                                    <input name="txtExt3Time" class="imeDisabled" id="txtExt3Time" style="width: 40px;" type="text" maxlength="5" value="<?php echo e($result->EXT3_TIME); ?>">
                                                                                                                                                </td> -->
                                                                    </td>
                                                                    <td id="b" class="GridViewRowLeft" style="white-space: nowrap;">
                                                                        <span id="lblRemark" style="width: 250px; display: inline-block;"><?php echo e($result->RSV1_TIME); ?></span>
                                                                        <!-- <td id="a" style="display: none;">
                                                                                                                                                    <input name="txtRemark" class="imeDisabled" id="txtRemark" style="width: 250px;" type="text" maxlength="" value="<?php echo e($result->RSV1_TIME); ?>">
                                                                                                                                                </td> -->
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
                                    <span id="lblErrMsg" style="color: red;"></span>
                                </div>
                                <br>
                                <!-- footer -->
                                <div class="GridViewStyle3">
                                <?php if(isset($results)): ?>
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
                                                    <span id="lblSumWorkdayCnt" style="display: inline-block;"><?php echo e($workdaycnt['SUM_WORKDAY_CNT'] > 0 ? $workdaycnt['SUM_WORKDAY_CNT'] : ''); ?></span>
                                                </td>
                                                <td>
                                                    <span id="lblSumHolworkCnt" style="display: inline-block;"><?php echo e($holdaycnt['SUM_HOLWORK_CNT'] > 0 ? $holdaycnt['SUM_HOLWORK_CNT'] : ''); ?></span>
                                                </td>
                                                <td>
                                                    <span id="lblSumSpcholCnt" style="display: inline-block;"><?php echo e($spcholcnt['SUM_SPCHOL_CNT'] > 0 ? $spcholcnt['SUM_SPCHOL_CNT'] : ''); ?></span>
                                                </td>
                                                <td>
                                                    <span id="lblSumPadholCnt" style="display: inline-block;"><?php echo e($padholcnt['SUM_PADHOL_CNT'] > 0 ? $padholcnt['SUM_PADHOL_CNT'] : ''); ?></span>
                                                </td>
                                                <td>
                                                    <span id="lblSumAbcworkCnt" style="display: inline-block;"><?php echo e($abcworkcnt['SUM_ABCWORK_CNT'] > 0 ? $abcworkcnt['SUM_ABCWORK_CNT'] : ''); ?></span>
                                                </td>
                                                <td>
                                                    <span id="lblSumCompdayCnt" style="display: inline-block;"><?php echo e($compdaycnt['SUM_COMPDAY_CNT'] > 0 ? $compdaycnt['SUM_COMPDAY_CNT'] : ''); ?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>出勤時間</th>
                                                <th>遅刻時間</th>
                                                <th>早退時間</th>
                                                <th>外出時間</th>
                                                <th>早出時間</th>
                                                <th>普通残業時間</th>
                                                <th>深夜残業時間</th>
                                                <th>休日残業時間</th>
                                                <th>休日深夜残業時間</th>
                                                <th></th>
                                                <th>合計</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span id="lblSumWorkTime" style="display: inline-block;"><?php echo e($worktime['SUM_WORK_TIME'] > 0 ? $worktime['SUM_WORK_TIME'] : ''); ?></span>
                                                </td>
                                                <td>
                                                    <span id="lblSumTardTime" style="display: inline-block;"><?php echo e($tardtime['SUM_TARD_TIME'] > 0 ? $tardtime['SUM_TARD_TIME'] : ''); ?></span>
                                                </td>
                                                <td>
                                                    <span id="lblSumLeaveTime" style="display: inline-block;"><?php echo e($leavetime['SUM_LEAVE_TIME'] > 0 ? $leavetime['SUM_LEAVE_TIME'] : ''); ?></span>
                                                </td>
                                                <td>
                                                    <span id="lblSumOutTime" style="display: inline-block;"><?php echo e($outtime['SUM_OUT_TIME'] > 0 ? $outtime['SUM_OUT_TIME'] : ''); ?></span>
                                                </td>
                                                <td>
                                                    <span id="lblSumOvtm1Time" style="display: inline-block;"><?php echo e($ovtm1time['SUM_OVTM1_TIME'] > 0 ? $ovtm1time['SUM_OVTM1_TIME'] : ''); ?></span>
                                                </td>
                                                <td>
                                                    <span id="lblSumOvtm2Time" style="display: inline-block;"><?php echo e($ovtm2time['SUM_OVTM2_TIME'] > 0 ? $ovtm2time['SUM_OVTM2_TIME'] : ''); ?></span>
                                                </td>
                                                <td>
                                                    <span id="lblSumOvtm3Time" style="display: inline-block;"><?php echo e($ovtm3time['SUM_OVTM3_TIME'] > 0 ? $ovtm3time['SUM_OVTM3_TIME'] : ''); ?></span>
                                                </td>
                                                <td>
                                                    <span id="lblSumOvtm4Time" style="display: inline-block;"><?php echo e($ovtm4time['SUM_OVTM4_TIME'] > 0 ? $ovtm4time['SUM_OVTM4_TIME'] : ''); ?></span>
                                                </td>
                                                <td>
                                                    <span id="lblSumOvtm5Time" style="display: inline-block;"><?php echo e($ovtm5time['SUM_OVTM5_TIME'] > 0 ? $ovtm5time['SUM_OVTM5_TIME'] : ''); ?></span>
                                                </td>
                                                <td>
                                                    <span id="lblSumOvtm6Time" style="display: inline-block;"><?php echo e($ovtm6time['SUM_OVTM6_TIME'] > 0 ? $ovtm6time['SUM_OVTM6_TIME'] : ''); ?></span>
                                                </td>
                                                <td>
                                                    <span id="lblSumTimes" style="display: inline-block;"><?php echo e($GetSumTimes['SUM_TIMES'] > 0 ? $GetSumTimes['SUM_TIMES'] : ''); ?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>深夜割増</th>
                                                <th></th>
                                                <th></th>
                                                <th>合計</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span id="lblSumExt1Time" style="display: inline-block;"><?php echo e($ext1time['SUM_EXT1_TIME'] > 0 ? $ext1time['SUM_EXT1_TIME'] : ''); ?></span>
                                                </td>
                                                <td>
                                                    <span id="lblSumExt2Time" style="display: inline-block;"><?php echo e($ext2time['SUM_EXT2_TIME'] > 0 ? $ext2time['SUM_EXT2_TIME'] : ''); ?></span>
                                                </td>
                                                <td>
                                                    <span id="lblSumExt3Time" style="display: inline-block;"><?php echo e($ext3time['SUM_EXT3_TIME'] > 0 ? $ext3time['SUM_EXT3_TIME'] : ''); ?></span>
                                                </td>
                                                <td>
                                                    <span id="lblSumExtTimes" style="display: inline-block;"><?php echo e($GetSumExtTimes['SUM_EXT_TIMES'] > 0 ? $GetSumExtTimes['SUM_EXT_TIMES'] : ''); ?></span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php else: ?>
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
                                                <td><span id="">　</span></td>
                                                <td><span id="">　</span></td>
                                                <td><span id="">　</span></td>
                                                <td><span id="">　</span></td>
                                                <td><span id="">　</span></td>
                                                <td><span id="">　</span></td>
                                            </tr>
                                            <tr>
                                                <th>出勤時間</th>
                                                <th>遅刻時間</th>
                                                <th>早退時間</th>
                                                <th>外出時間</th>
                                                <th>早出時間</th>
                                                <th>普通残業時間</th>
                                                <th>深夜残業時間</th>
                                                <th>休日残業時間</th>
                                                <th>休日深夜残業時間</th>
                                                <th></th>
                                                <th>合計</th>
                                            </tr>
                                            <tr>
                                                <td><span id="">　</span></td>
                                                <td><span id="">　</span></td>
                                                <td><span id="">　</span></td>
                                                <td><span id="">　</span></td>
                                                <td><span id="">　</span></td>
                                                <td><span id="">　</span></td>
                                                <td><span id="">　</span></td>
                                                <td><span id="">　</span></td>
                                                <td><span id="">　</span></td>
                                                <td><span id="">　</span></td>
                                                <td><span id="">　</span></td>
                                            </tr>
                                            <tr>
                                                <th>深夜割増</th>
                                                <th></th>
                                                <th></th>
                                                <th>合計</th>
                                            </tr>
                                            <tr>
                                                <td><span id="">　</span></td>
                                                <td><span id="">　</span></td>
                                                <td><span id="">　</span></td>
                                                <td><span id="">　</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php endif; ?>
                                </div>
                                <div class="line">
                                    <hr>
                                </div>
                                <p class="ButtonField2">
                                    <!-- <input name="btnCancel" id="btnCancel" onclick="CloseSubWindow();__doPostBack('btnCancel','')" type="button" value="キャンセル"> -->
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<script>
    //formボタンクリック
    $(document).on('click', '.submit-form', function(){
        var url = $(this).data('url');
        $('#form').attr('action', url);
        $('#form').submit();
    });

    //編集するデータをgridviewに渡す
    // $(document).on('click', '#btnEdit', function(){
    //     $(this).hide();
    //     $('#btnUpdate').show();
    //     let ddlTargetYear = $('#ddlTargetYear').val();
    //     let ddlTargetMonth = $('#ddlTargetMonth').val();
    //     let txtEmpCd = $('#txtEmpCd').val();
    //     $.ajax({
    //         url: '<?php echo e(route("wte.edit")); ?>',
    //         type: 'post',
    //         dataType:'json',
    //         data:{'ddlTargetYear': ddlTargetYear, 'ddlTargetMonth':ddlTargetMonth, 'txtEmpCd':txtEmpCd, '_token': '<?php echo e(csrf_token()); ?>' },
    //         success: function(response){
    //             $("#gridview-warp").empty();
    //             if(response.html) {
    //                 $('#gridview-warp').append(response.html);
    //             }
    //         },
    //         error: function(e){
    //             console.log(e)
    //         },
    // 　  })
        
    // });

    //input無効にする
    $(document).on('click', '#btnShow', function(){
        
        $('#btnShow, #ddlTargetYear, #ddlTargetMonth, #txtEmpCd, #btnSearchEmpCd').attr('disabled', true);
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('menu.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\06_SVN\resources\views/work_time/WorkTimeEditor.blade.php ENDPATH**/ ?>