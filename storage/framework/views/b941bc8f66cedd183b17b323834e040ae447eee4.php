<!-- 出退勤入力（部門別）画面 -->


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
                                        <th>対象月度</th>
                                        <td>
                                            <select name="ddlTargetYear" tabindex="1" class="imeDisabled"
                                                id="ddlTargetYear" style="width: 70px;">
                                                <?php for($year = date('Y') - 3; $year <= date('Y') + 3; $year++): ?>
                                                    <option value="<?php echo e($year); ?>"
                                                        <?php echo e(old('ddlTargetYear', !empty($inputSearchData['ddlTargetYear']) ? $inputSearchData['ddlTargetYear'] : date('Y')) == $year ? 'selected' : ''); ?>>
                                                        <?php echo e($year); ?>

                                                    </option>
                                                <?php endfor; ?>
                                            </select>
                                            &nbsp;年
                                            <select name="ddlTargetMonth" tabindex="2" class="imeDisabled"
                                                id="ddlTargetMonth">
                                                <?php for($month = 01; $month <= 12; $month++): ?>
                                                    <option value="<?php echo e($month); ?>"
                                                        <?php echo e(old('ddlTargetMonth', !empty($inputSearchData['ddlTargetMonth']) ? $inputSearchData['ddlTargetMonth'] : date('m')) == $month ? 'selected' : ''); ?>>
                                                        <?php echo e($month); ?>

                                                    </option>
                                                <?php endfor; ?>
                                            </select>
                                            &nbsp;月
                                            <select name="ddlTargetDay" tabindex="3" class="imeDisabled"
                                                id="ddlTargetDay">
                                                <?php for($day = 01; $day <= 31; $day++): ?>
                                                    <option value="<?php echo e($day); ?>"
                                                        <?php echo e(old('ddlTargetDay', !empty($inputSearchData['ddlTargetDay']) ? $inputSearchData['ddlTargetDay'] : date('d')) == $day ? 'selected' : ''); ?>>
                                                        <?php echo e($day); ?>

                                                    </option>
                                                <?php endfor; ?>
                                            </select>
                                            &nbsp;日
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>部門</th>
                                        <td>
                                            <input name="txtDeptCd" 
                                                class="imeDisabled"
                                                id="txtDeptCd" 
                                                style="width: 80px;" 
                                                type="text"
                                                maxlength="10"
                                                value="<?php echo e(old('txtDeptCd', !empty($inputSearchData['txtDeptCd']) ? $inputSearchData['txtDeptCd'] : '')); ?>"
                                                >
                                            <input name="btnSearchDeptCd" class="SearchButton" id="btnSearchDeptCd" type="button" value="?" >
                                            <!-- <input class="SearchButton" type="button" id="MT12DeptSearch" onclick="SetDeptItem();" value="?"> -->
                                            <input class="OutlineLabel"
                                                name="deptName" 
                                                type="text"
                                                style="width: 200px; height: 17px; display: inline-block;" 
                                                id="deptName"
                                                value="<?php echo e(old('deptName', !empty($inputSearchData['deptName']) ? $inputSearchData['deptName']:'')); ?>"
                                                readonly="readonly"
                                                >
                                            <?php if($errors->has('txtDeptCd')): ?>
                                                <span class="alert-danger"><?php echo e($errors->first('txtDeptCd')); ?></span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>開始所属</th>
                                        <td>
                                            <select name="filter[ddlStartCompany]" tabindex="6" id="ddlStartCompany"
                                                style="width: 300px;">
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
                                            <select name="filter[ddlEndCompany]" tabindex="7" id="ddlEndCompany"
                                                style="width: 300px;">
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
                                            <input name="btnDisp" 
                                                class="ButtonStyle1 submit-form" 
                                                id="btnShow"
                                                type="button" 
                                                value="表示"
                                                data-url = "<?php echo e(route('wtde.search')); ?>"
                                                style="width: 80px;"
                                            >
                                            <input name="btnCancel2" 
                                                class="ButtonStyle1 submit-form" 
                                                id="btnCancel2"
                                                type="button" value="キャンセル"
                                                data-url = "<?php echo e(route('wtde.cancel')); ?>"
                                                style="width: 80px;"
                                            >
                                            <?php if(!empty($results)): ?>
                                                <input 
                                                    name="btnEdit" 
                                                    class="submit-form"
                                                    type="button" 
                                                    value="編集"
                                                    data-url = "<?php echo e(route('wtde.edit')); ?>"
                                            >
                                                <!-- <input 
                                                    name="btnEdit" 
                                                    id="btnUpdate" 
                                                    type="button"
                                                    value="更新" 
                                                    style="display: none;"
                                                    class="submit-form" 
                                                    data-url = "<?php echo e(route('wtde.update')); ?>"
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
                                <div class="GridViewPanelStyle1" style="width: 1084px;">
                                    <div id="pnlWorkTime">
                                        <div>
                                            <table class="GridViewBorder GridViewRowCenter GridViewPadding" id="gvWorkTime" style="border-collapse: collapse;" border="1" rules="all" cellspacing="0">
                                                <tbody id="gridview-warp">
                                                    <?php if(isset($results)): ?>
                                                        <?php if(count($results) < 1): ?> 
                                                            <tr style="width:70px;">
                                                                <td><span><?php echo e($errMsg_4029); ?></span></td>
                                                            </tr>
                                                        <?php else: ?>
                                                            <tr>
                                                                <th scope="col"> 部門コード </th>
                                                                <th scope="col"> 部門名  </th>
                                                                <th scope="col"> 社員番号 </th>
                                                                <th scope="col"> 社員名 </th>
                                                                <th scope="col"> 勤務体系 </th>
                                                                <th scope="col"> 事由 </th>
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
                                                                <th scope="col"> 早出時間 </th>
                                                                <th scope="col"> 普通残業時間 </th>
                                                                <th scope="col"> 深夜残業時間 </th>
                                                                <th scope="col"> 休日残業時間 </th>
                                                                <th scope="col"> 休日深夜残業時間 </th>
                                                                <th scope="col"> </th>
                                                                <th scope="col"> 深夜割増 </th>
                                                                <th scope="col"> </th>
                                                                <th scope="col"> </th>
                                                                <th scope="col"> 備考 </th>
                                                            </tr>
                                                            <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr>
                                                                    <td class="GridViewRowLeft">
                                                                        <span id="lblDeptCd" style="width: 80px; display: inline-block;"><?php echo e($result->DEPT_CD); ?></span>
                                                                    </td>
                                                                    <td class="GridViewRowLeft">
                                                                        <span id="lblDeptName" style="width: 130px; display: inline-block;"><?php echo e($result->DEPT_NAME); ?></span>
                                                                    </td>
                                                                    <td class="GridViewRowLeft">
                                                                        <span id="lblEmpCd" style="width: 80px; display: inline-block;"><?php echo e($result->EMP_CD); ?></span>
                                                                    </td>
                                                                    <td class="GridViewRowLeft">
                                                                        <span id="lblEmpName" style="width: 130px; display: inline-block;"><?php echo e($result->EMP_NAME); ?></span>
                                                                    </td>
                                                                    <td id="b" style="width: 150px;">
                                                                        <span id="lblWorkPtnName" name="lblWorkPtnName" class="<?php echo e($result->WORK_CLS_CD == '00'?'text-danger':''); ?>" style="width: 150px; display: inline-block;"><?php echo e($result->WORKPTN_NAME); ?></span>

                                                                    </td>
                                                                    <td id="b" style="width: 70px;">
                                                                        <span id="lblReasonName" class="<?php echo e($result->REASON_PTN_CD == '01'?'text-danger':''); ?> && <?php echo e($result->REASON_PTN_CD == '02'?'text-primary':''); ?>" style="width: 70px; display: inline-block;"><?php echo e($result->REASON_NAME); ?></span>
                                                                    
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
                            </div>

                            <div>
                                <!-- ErrorMessage -->
                                <span id="lblErrMsg" style="color: red;"></span>
                            </div>

                            <br>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<script>
    //ボタンクリック
    $(document).on('click', '.submit-form', function(){
        var url = $(this).data('url');
        $('#form').attr('action', url);
        $('#form').submit();
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('menu.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\06_SVN\resources\views/work_time/WorkTimeDeptEditor.blade.php ENDPATH**/ ?>