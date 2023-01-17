<!-- 勤務状況照会(個人用)  -->


<?php $__env->startSection('title', '勤務状況照会(個人用) '); ?>
<?php $__env->startSection('content'); ?>
    <div id="contents-stage">
        <table>
            <tbody>
                <tr>
                    <td>
                        <div id="UpdatePanel1">
                            <!-- header -->
                            <form action="" method="POST" id="form">
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
                                                <select name="ddlTargetMonth" tabindex="2" class="imeDisabled" id="ddlTargetMonth">
                                                    <?php for($month = 1; $month <= 12; $month++): ?>
                                                        <option value="<?php echo e($month); ?>"
                                                            <?php echo e(old('ddlTargetMonth', !empty($inputSearchData['ddlTargetMonth']) ? $inputSearchData['ddlTargetMonth'] : date('m')) == $month ? 'selected' : ''); ?>>
                                                            <?php echo e($month); ?>

                                                        </option>
                                                    <?php endfor; ?>
                                                </select>
                                                &nbsp;月度
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>社員番号</th>
                                            <td>
                                                <input name="txtEmpCd" tabindex="3" class="imeDisabled" id="txtEmpCd"
                                                    style="width: 80px;" type="text" maxlength="10"
                                                    value="<?php echo e(old('txtEmpCd', !empty($inputSearchData['txtEmpCd']) ? $inputSearchData['txtEmpCd'] : '')); ?>">

                                                
                                                <input name="btnSearchEmpCd" tabindex="4" class="SearchButton"
                                                    id="btnSearchEmpCd"
                                                    onclick="SetEmpItem();__doPostBack('ctl00$cphContentsArea$btnSearchEmpCd','')"
                                                    type="button" value="?">

                                                <span class="OutlineLabel" id="lblEmpName"
                                                    style="width: 200px; height: 17px; display: inline-block;"></span>
                                                &nbsp;
                                                <?php if($errors->has('txtEmpCd')): ?>
                                                    <span class="alert-danger"><?php echo e($errors->first('txtEmpCd')); ?></span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>部門</th>
                                            <td>
                                                <span class="OutlineLabel" id="lblDeptName"
                                                    style="width: 200px; height: 17px; display: inline-block;"></span>
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
                                                    type="button" value="表示" data-url="<?php echo e(route('worktimeRef.search')); ?>"
                                                    style="width: 80px;">
                                                <input name="btnCancel2" id="btnCancel2" class="ButtonStyle1 submit-form"
                                                    type="button" value="キャンセル"
                                                    data-url="<?php echo e(route('worktimeRef.cancel')); ?>" style="width: 80px;">
                                                &nbsp;
                                                <span id="lblNoStampColor" style="background-color: tomato;">　　　 </span>
                                                <span id="lblNoStamp">未打刻</span>
                                                &nbsp;
                                                <span id="lblDbStampColor"
                                                    style="background-color: lightskyblue;">　　　</span>
                                                <span id="lblDbStamp">二重打刻</span>
                                                &nbsp;
                                                <span class="font-style2" id="lblFixMsg"></span>
                                                <?php if(isset($workTimeFix)): ?>
                                                    <span class="font-style2"><?php echo e($FIX_MSG); ?></span>
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
                                    <div class="GridViewPanelStyle5" id="ctl00_cphContentsArea_pnlWorkTime">
                                        <div>
                                            <table class="GridViewBorder GridViewPadding GridViewRowCenter"
                                                id="ctl00_cphContentsArea_gvWorkTime" style="border-collapse: collapse;"
                                                border="1" rules="all" cellspacing="0">
                                                <tbody id="gridview-warp">
                                                    <?php if(isset($empWorkTimeResults)): ?>
                                                        <?php if(count($empWorkTimeResults) < 1): ?>
                                                            <tr style="width: 70px;">
                                                                <td><span><?php echo e($errMsg_4029); ?></span></td>
                                                            </tr>
                                                        <?php else: ?>
                                                            <tr>
                                                                <th scope="col">日付</th>
                                                                <th scope="col">曜日</th>
                                                                <th scope="col">勤務体系</th>
                                                                <th scope="col">事由</th>
                                                                <th scope="col">出勤</th>
                                                                <th scope="col">退出</th>
                                                                <th scope="col">外出1</th>
                                                                <th scope="col">再入１</th>
                                                                <th scope="col">外出２</th>
                                                                <th scope="col">再入２</th>
                                                            </tr>
                                                            <?php $__currentLoopData = $empWorkTimeResults->unique('CALD_DATE'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $empWorkTimeResult): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr>
                                                                    <?php if($empWorkTimeResult->HLD_DATE == date('md', strtotime($empWorkTimeResult->CALD_DATE)) || $weekday[date('w', strtotime($empWorkTimeResult->CALD_DATE))] == '日' || $weekday[date('w', strtotime($empWorkTimeResult->CALD_DATE))] == '土'): ?>
                                                                        <td style="width: 70px;">
                                                                            <span id="lblCaldDate"
                                                                                style="width: 70px; display: inline-block; color: red">
                                                                                <?php echo e(date('Y/m/d', strtotime($empWorkTimeResult->CALD_DATE))); ?>

                                                                            </span>
                                                                        </td>
                                                                        <td style="width: 30px;">
                                                                            <span id="lblCaldDate"
                                                                                style="width: 30px; display: inline-block; color: red">
                                                                                <?php echo e($weekday[date('w', strtotime($empWorkTimeResult->CALD_DATE))]); ?>

                                                                            </span>
                                                                        </td>
                                                                    <?php else: ?>
                                                                        <td style="width: 70px;">
                                                                            <span id="lblCaldDate"
                                                                                style="width: 70px; display: inline-block;">
                                                                                <?php echo e(date('Y/m/d', strtotime($empWorkTimeResult->CALD_DATE))); ?>

                                                                            </span>
                                                                        </td>
                                                                        <td style="width: 30px;">
                                                                            <span id="lblCaldDate"
                                                                                style="width: 30px; display: inline-block;">
                                                                                <?php echo e($weekday[date('w', strtotime($empWorkTimeResult->CALD_DATE))]); ?>

                                                                            </span>
                                                                        </td>
                                                                    <?php endif; ?>

                                                                    <td class="GridViewRowLeft" style="width: 160px;">
                                                                        <span id="lblWorkptnName"
                                                                            class="<?php echo e($empWorkTimeResult->WORK_CLS_CD == '00' ? 'text-danger' : ''); ?>"
                                                                            style="width: 160px; display: inline-block;"><?php echo e($empWorkTimeResult->WORKPTN_NAME); ?></span>
                                                                    </td>
                                                                    <td style="width: 50px;">
                                                                        <span id="lblReasonName"
                                                                            class="<?php echo e($empWorkTimeResult->REASON_PTN_CD == '01' ? 'text-danger' : ''); ?> &&
                                                                            <?php echo e($empWorkTimeResult->REASON_PTN_CD == '02' ? 'text-primary' : ''); ?>">
                                                                            <?php echo e($empWorkTimeResult->REASON_NAME); ?>

                                                                        </span>
                                                                    </td>

                                                                    <?php if($empWorkTimeResult->OFC_CNT >= 2 && empty($empWorkTimeResult->OFC_TIME_HH)): ?>
                                                                        <td style="width: 40px; background-color: lightskyblue;"
                                                                            <span id="hlLevTime">
                                                                            <?php echo e($empWorkTimeResult->OFC_TIME); ?></span>
                                                                        </td>
                                                                    <?php elseif(empty($empWorkTimeResult->OFC_TIME_HH) &&
                                                                        isset($empWorkTimeResult->LEV_TIME_HH)): ?>
                                                                        <td style="width: 40px; background-color: tomato;" <span
                                                                            id="hlLevTime">
                                                                            <?php echo e($empWorkTimeResult->OFC_TIME); ?></span>
                                                                        </td>
                                                                    <?php elseif(empty($empWorkTimeResult->OFC_TIME_HH) &&
                                                                        empty($empWorkTimeResult->LEV_TIME_HH)): ?>
                                                                        <td style="width: 40px;" <span id="hlLevTime">
                                                                            <?php echo e($empWorkTimeResult->OFC_TIME); ?></span>
                                                                        </td>
                                                                    <?php else: ?>
                                                                        <td style="width: 40px;" <span id="hlLevTime">
                                                                            <?php echo e($empWorkTimeResult->OFC_TIME); ?></span>
                                                                        </td>
                                                                    <?php endif; ?>

                                                                    <?php if($empWorkTimeResult->LEV_CNT >= 2 && empty($empWorkTimeResult->LEV_TIME_HH)): ?>
                                                                        <td style="width: 40px; background-color: lightskyblue;"
                                                                            <span id="hlLevTime">
                                                                            <?php echo e($empWorkTimeResult->LEV_TIME); ?></span>
                                                                        </td>
                                                                    <?php elseif(isset($empWorkTimeResult->OFC_TIME_HH) &&
                                                                        empty($empWorkTimeResult->LEV_TIME_HH)): ?>
                                                                        <td style="width: 40px; background-color: tomato;" <span
                                                                            id="hlLevTime">
                                                                            <?php echo e($empWorkTimeResult->LEV_TIME); ?></span>
                                                                        </td>
                                                                    <?php elseif(empty($empWorkTimeResult->OFC_TIME_HH) &&
                                                                        empty($empWorkTimeResult->LEV_TIME_HH)): ?>
                                                                        <td style="width: 40px;" <span id="hlLevTime">
                                                                            <?php echo e($empWorkTimeResult->LEV_TIME); ?></span>
                                                                        </td>
                                                                    <?php else: ?>
                                                                        <td style="width: 40px;" <span id="hlLevTime">
                                                                            <?php echo e($empWorkTimeResult->LEV_TIME); ?></span>
                                                                        </td>
                                                                    <?php endif; ?>

                                                                    <?php if($empWorkTimeResult->OUT1_CNT >= 2 && empty($empWorkTimeResult->OUT1_TIME_HH)): ?>
                                                                        <td style="width: 40px; background-color: lightskyblue;"
                                                                            <span id="hlLevTime">
                                                                            <?php echo e($empWorkTimeResult->OUT1_TIME); ?></span>
                                                                        </td>
                                                                    <?php elseif(empty($empWorkTimeResult->OUT1_TIME_HH) &&
                                                                        isset($empWorkTimeResult->IN1_TIME_HH)): ?>
                                                                        <td style="width: 40px; background-color: tomato;" <span
                                                                            id="hlLevTime">
                                                                            <?php echo e($empWorkTimeResult->OUT1_TIME); ?></span>
                                                                        </td>
                                                                    <?php elseif(empty($empWorkTimeResult->OUT1_TIME_HH) &&
                                                                        empty($empWorkTimeResult->IN1_TIME_HH)): ?>
                                                                        <td style="width: 40px;" <span id="hlLevTime">
                                                                            <?php echo e($empWorkTimeResult->OUT1_TIME); ?></span>
                                                                        </td>
                                                                    <?php else: ?>
                                                                        <td style="width: 40px;" <span id="hlLevTime">
                                                                            <?php echo e($empWorkTimeResult->OUT1_TIME); ?></span>
                                                                        </td>
                                                                    <?php endif; ?>

                                                                    <?php if($empWorkTimeResult->IN1_CNT >= 2 && empty($empWorkTimeResult->IN1_TIME_HH)): ?>
                                                                        <td style="width: 40px; background-color: lightskyblue;"
                                                                            <span id="hlLevTime">
                                                                            <?php echo e($empWorkTimeResult->IN1_TIME); ?></span>
                                                                        </td>
                                                                    <?php elseif(isset($empWorkTimeResult->OUT1_TIME_HH) &&
                                                                        empty($empWorkTimeResult->IN1_TIME_HH)): ?>
                                                                        <td style="width: 40px; background-color: tomato;" <span
                                                                            id="hlLevTime">
                                                                            <?php echo e($empWorkTimeResult->IN1_TIME); ?></span>
                                                                        </td>
                                                                    <?php elseif(empty($empWorkTimeResult->OUT1_TIME_HH) &&
                                                                        empty($empWorkTimeResult->IN1_TIME_HH)): ?>
                                                                        <td style="width: 40px;" <span id="hlLevTime">
                                                                            <?php echo e($empWorkTimeResult->IN1_TIME); ?></span>
                                                                        </td>
                                                                    <?php else: ?>
                                                                        <td style="width: 40px;" <span id="hlLevTime">
                                                                            <?php echo e($empWorkTimeResult->IN1_TIME); ?></span>
                                                                        </td>
                                                                    <?php endif; ?>

                                                                    <?php if($empWorkTimeResult->OUT2_CNT >= 2 && empty($empWorkTimeResult->OUT2_TIME_HH)): ?>
                                                                        <td style="width: 40px; background-color: lightskyblue;"
                                                                            <span id="hlLevTime">
                                                                            <?php echo e($empWorkTimeResult->OUT2_TIME); ?></span>
                                                                        </td>
                                                                    <?php elseif(empty($empWorkTimeResult->OUT2_TIME_HH) &&
                                                                        isset($empWorkTimeResult->IN2_TIME_HH)): ?>
                                                                        <td style="width: 40px; background-color: tomato;" <span
                                                                            id="hlLevTime">
                                                                            <?php echo e($empWorkTimeResult->OUT2_TIME); ?></span>
                                                                        </td>
                                                                    <?php elseif(empty($empWorkTimeResult->OUT2_TIME_HH) &&
                                                                        empty($empWorkTimeResult->IN2_TIME_HH)): ?>
                                                                        <td style="width: 40px;" <span id="hlLevTime">
                                                                            <?php echo e($empWorkTimeResult->OUT2_TIME); ?></span>
                                                                        </td>
                                                                    <?php else: ?>
                                                                        <td style="width: 40px;" <span id="hlLevTime">
                                                                            <?php echo e($empWorkTimeResult->OUT2_TIME); ?></span>
                                                                        </td>
                                                                    <?php endif; ?>

                                                                    <?php if($empWorkTimeResult->IN2_CNT >= 2 && empty($empWorkTimeResult->IN2_TIME_HH)): ?>
                                                                        <td style="width: 40px; background-color: lightskyblue;"
                                                                            <span id="hlLevTime">
                                                                            <?php echo e($empWorkTimeResult->IN2_TIME); ?></span>
                                                                        </td>
                                                                    <?php elseif(isset($empWorkTimeResult->OUT2_TIME_HH) &&
                                                                        empty($empWorkTimeResult->IN2_TIME_HH)): ?>
                                                                        <td style="width: 40px; background-color: tomato;" <span
                                                                            id="hlLevTime">
                                                                            <?php echo e($empWorkTimeResult->IN2_TIME); ?></span>
                                                                        </td>
                                                                    <?php elseif(empty($empWorkTimeResult->OUT2_TIME_HH) &&
                                                                        empty($empWorkTimeResult->IN2_TIME_HH)): ?>
                                                                        <td style="width: 40px;" <span id="hlLevTime">
                                                                            <?php echo e($empWorkTimeResult->IN2_TIME); ?></span>
                                                                        </td>
                                                                    <?php else: ?>
                                                                        <td style="width: 40px;" <span id="hlLevTime">
                                                                            <?php echo e($empWorkTimeResult->IN2_TIME); ?></span>
                                                                        </td>
                                                                    <?php endif; ?>
                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <!-- footer -->
                                    <div class="line"></div>
                                    <p class="ButtonField2">
                                        <input name="btnCancel" id="btnCancel" class="ButtonStyle1 submit-form"
                                            onclick="CloseSubWindow();__doPostBack('btnCancel','')" type="button"
                                            value="キャンセル" data-url="<?php echo e(route('worktimeRef.cancel')); ?>">
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

        $(document).on('click', '.submit-form', function() {
            var url = $(this).data('url');
            $('#form').attr('action', url);
            $('#form').submit();
        });

        //検索の際ボンタン機能無効
        $(document).on('click', '#btnShow', function load() {
            $('#btnShow, #ddlTargetYear, #ddlTargetMonth, #txtEmpCd, #btnSearchEmpCd').attr('disabled', true);
        });

        //F5キーによるリロードを禁止
        document.addEventListener("keydown", function(e) {
            if ((e.which || e.keyCode) == 116) {
                e.preventDefault();
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('menu.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\06_SVN\resources\views/work_time/WorkTimeReference.blade.php ENDPATH**/ ?>