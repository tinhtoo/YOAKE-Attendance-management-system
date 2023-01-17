<!-- 勤務状況照会(管理者用)   -->


<?php $__env->startSection('title','勤務状況照会(管理者用) '); ?>

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
                                            <select name="filter[ddlTargetYear]" id="ddlTargetYear" tabindex="1" class="imeDisabled" style="width: 70px;">
                                                <?php for($y=date('Y')-3; $y<=date('Y')+3; $y++): ?> 
                                                <option 
                                                    value="<?php echo e($y); ?>"
                                                    <?php echo e(old("filter.ddlTargetYear", !empty($search_data["ddlTargetYear"]) ? $search_data["ddlTargetYear"] : date('Y')) ==  $y ? "selected" : ""); ?>

                                                >
                                                <?php echo e($y); ?>

                                                </option>
                                                <?php endfor; ?>
                                            </select>
                                            &nbsp;年
                                            <select name="filter[ddlTargetMonth]"  id="ddlTargetMonth" tabindex="2" class="imeDisabled">
                                                <?php for($m=1; $m<=12; $m++): ?> 
                                                <option 
                                                    value="<?php echo e($m); ?>" 
                                                    <?php echo e(old("filter.ddlTargetMonth", !empty($search_data["ddlTargetMonth"]) ? $search_data["ddlTargetMonth"] : date('m')) == $m ? "selected" : ""); ?>

                                                >
                                                <?php echo e($m); ?>

                                                </option>
                                                <?php endfor; ?>
                                            </select>
                                            &nbsp;月度
                                        </td>
                                    </tr>
                                
                                    <tr>
                                        <th>表示区分</th>
                                        <td>
                                            <div class="GroupBox1">
                                                <input 
                                                    name="filter[SearchCondition]" 
                                                    id="rbSearchDept" 
                                                    type="radio" 
                                                    value="rbSearchDept" <?php echo e(old("filter.SearchCondition", !empty($search_data["SearchCondition"]) ? $search_data["SearchCondition"] : "" ) == 'rbSearchDept' ? "checked" : ""); ?>

                                                    checked 
                                                >
                                                    <label for="rbSearchDept">部門</label>
                                                <input 
                                                    name="filter[SearchCondition]" 
                                                    id="rbSearchEmp" 
                                                    type="radio" 
                                                    value="rbSearchEmp" 
                                                    class="rbSearchEmp" <?php echo e(old("filter.SearchCondition", !empty($search_data["SearchCondition"]) ? $search_data["SearchCondition"] : "" ) == 'rbSearchEmp' ? "checked" : ""); ?>>
                                                    <label for="rbSearchEmp">社員</label>
                                            </div>
                                        </td>
                                    </tr>
                                
                                    <tr>
                                        <th>締日</th>
                                        <td>
                                            <select name="filter[ddlClosingDate]" id="ddlStartCompany" style="width: 300px;">
                                            <?php if(isset($closing_dates)): ?>
                                            <?php $__currentLoopData = $closing_dates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $closing_date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option 
                                                value="<?php echo e($closing_date->CLOSING_DATE_CD); ?>" 
                                                       <?php echo e(old("filter.ddlClosingDate", !empty($search_data["ddlClosingDate"]) ? $search_data["ddlClosingDate"] : "") == $closing_date->CLOSING_DATE_CD ? "selected" : ""); ?>

                                                > 
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
                                            <input name="filter[txtDeptCd]" 
                                                class="imeDisabled" 
                                                id="txtDeptCd" 
                                                style="width: 50px;" 
                                                type="text" 
                                                value="<?php echo e(old('filter[txtDeptCd]', !empty($search_data['txtDeptCd']) ? $search_data['txtDeptCd']:'')); ?>"
                                                maxlength="6"
                                            >
                                            <input name="btnSearchDeptCd" class="SearchButton" id="btnSearchDeptCd" type="button" value="?">
                                            <input class="OutlineLabel"
                                                name="deptName" 
                                                type="text"
                                                style="width: 200px; height: 17px; display: inline-block;" 
                                                id="deptName"
                                                value="<?php echo e(old('deptName', !empty($input_datas['deptName']) ? $input_datas['deptName']:'')); ?>"
                                                readonly="readonly"
                                            >

                                            <?php if($errors->has('filter.txtDeptCd')): ?>
                                            <span class="alert-danger"><?php echo e($errors->first('filter.txtDeptCd')); ?></span>
                                            <?php endif; ?>

                                        </td>
                                    </tr>
                                
                                    <tr>
                                        <th>開始所属</th>
                                        <td>
                                            <select name="filter[ddlStartCompany]" id="ddlStartCompany" style="width: 300px;">
                                                <option value=""></option>
                                            <?php if(isset($haken_kaisha)): ?> 
                                            <?php $__currentLoopData = $haken_kaisha; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option 
                                                value="<?php echo e($company->COMPANY_CD); ?>" 
                                                       <?php echo e(old("filter.ddlStartCompany", !empty($search_data["ddlStartCompany"]) ? $search_data["ddlStartCompany"] : "") == $company->COMPANY_CD ? "selected" : ""); ?>

                                                >
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
                                            <select name="filter[ddlEndCompany]" id="ddlEndCompany" style="width: 300px;">
                                                <option value=""></option>
                                            <?php if(isset($haken_kaisha)): ?>
                                            <?php $__currentLoopData = $haken_kaisha; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option 
                                                value="<?php echo e($company->COMPANY_CD); ?>" 
                                                       <?php echo e(old("filter.ddlEndCompany", !empty($search_data["ddlEndCompany"]) ? $search_data["ddlEndCompany"] : "") == $company->COMPANY_CD ? "selected" : ""); ?>

                                                >
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
                                            <input 
                                                name="filter[txtEmpCd]"
                                                class="imeDisabled" 
                                                id="txtEmpCd"
                                                value="<?php echo e(old('filter[txtEmpCd]', !empty($search_data['txtEmpCd']) ? $search_data['txtEmpCd']:'')); ?>" 
                                                style="width: 80px;" 
                                                type="text" maxlength="10">
                                            <input name="btnSearchEmpCd" class="SearchButton" id="btnSearchEmpCd" type="button" value="?">
                                            <input name="empName" 
                                                   class="OutlineLabel" 
                                                   type="text" 
                                                   style="width: 200px; height: 17px; display: inline-block;" 
                                                   id="empName" 
                                                   value="<?php echo e(old('empName', !empty($input_datas['empName']) ? $input_datas['empName']:'')); ?>" 
                                                   readonly="readonly"
                                            >

                                            <?php if($errors->has('filter.txtEmpCd')): ?>
                                            <span class="alert-danger"><?php echo e($errors->first('filter.txtEmpCd')); ?></span>
                                            <?php endif; ?>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="line"></div>
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
                                                data-url = "<?php echo e(route('ewtr.search')); ?>"
                                            >                                           
                                            <input 
                                                name="btnCancel2" 
                                                class="ButtonStyle1 submit-form" 
                                                id="btnCancel2"
                                                type="button" 
                                                value="キャンセル"
                                                data-url = "<?php echo e(route('ewtr.cancel')); ?>"
                                            >
                                            &nbsp;
                                            <span class="font-style2" id="lblFixMsg"></span>        
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            
                            <!-- detail -->
                            <div class="GridViewStyle1" id="gridview-container">
                                <div class="GridViewPanelStyle1" id="pnlEmpWorkTime" style="width: 911px;">
                                    <div id="pnlWorkTime">
                                        <div>
                                            <table class="GridViewBorder GridViewPadding GridViewRowCenter GridViewRowCut" id="gvEmpWorkTime" style="border-collapse: collapse;" border="1" rules="all" cellspacing="0">
                                                <tbody id="gridview-warp">
                                                    <?php if(isset($results)): ?>
                                                        <?php if(count($results) < 1): ?> 
                                                        <tr style="width:70px;">
                                                            <td><span><?php echo e($messages); ?></span></td>
                                                        </tr>
                                                        <?php else: ?>
                                                        <tr>
                                                            <th scope="col">
                                                                部門コード
                                                            </th>
                                                            <th scope="col">
                                                                部門名
                                                            </th>
                                                            <th scope="col">
                                                                社員番号
                                                            </th>
                                                            <th scope="col">
                                                                社員名
                                                            </th>
                                                            <th scope="col">
                                                                カレンダー名称
                                                            </th>
                                                            <th scope="col">
                                                                出勤
                                                            </th>
                                                            <th scope="col">
                                                                休出
                                                            </th>
                                                            <th scope="col">
                                                                特休
                                                            </th>
                                                            <th scope="col">
                                                                有休
                                                            </th>
                                                            <th scope="col">
                                                                欠勤
                                                            </th>
                                                            <th scope="col">
                                                                代休
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
                                                                <td class="GridViewRowLeft">
                                                                    <span id="lblCalendarName" style="width: 150px; display: inline-block;"><?php echo e($result->CALENDAR_NAME); ?></span>
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
                                    <input 
                                        name="btnCancel2" 
                                        class="ButtonStyle1 submit-form" 
                                        id="btnCancel2"
                                        type="button" 
                                        value="キャンセル"
                                        data-url = "<?php echo e(route('ewtr.cancel')); ?>"
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
   
    $(document).ready(function () { 
        toggleRadio( $("input[type='radio']:checked") );
       
        //ボタンクリック
        $(document).on('click', '.submit-form', function(){
            var url = $(this).data('url');
            $('#form').attr('action', url);
            $('#form').submit();
        });
        //無効化
        $('input:radio').on('click', function () {
            toggleRadio($(this));
        })

    }); 
    function toggleRadio(ele) {
        $("#txtEmpCd, #btnSearchEmpCd").prop("disabled", true);
        $("#txtDeptCd, #ddlStartCompany, #ddlEndCompany, #ddlClosingDate, #btnSearchDeptCd").prop("disabled", false);
        if (ele.hasClass('rbSearchEmp')) {
            $("#txtEmpCd, #btnSearchEmpCd").prop("disabled", false);
            $("#txtDeptCd, #ddlStartCompany, #ddlEndCompany, #ddlClosingDate, #btnSearchDeptCd").prop("disabled", true);
            $("#txtDeptCd, #deptName").val('');
        }else{
            $("#txtEmpCd, #empName").val('');
        }
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('menu.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\06_SVN\resources\views/work_time/EmpWorkTimeReference.blade.php ENDPATH**/ ?>