<!-- 社員情報入力 -->


<?php $__env->startSection('title', '社員情報入力'); ?>

<?php $__env->startSection('content'); ?>
    <div id="contents-stage">
        <table class="BaseContainerStyle1">
            <form action="" method="post" id="form">
                <?php echo csrf_field(); ?>
                <div id="ctl00_cphContentsArea_UpdatePanel1">
                    <table class="InputFieldStyle1">
                        <tbody>
                            <tr>
                                <th class="required">社員番号</th>
                                <td>
                                    <input type="text" name="EMP_CD" id="EMP_CD"
                                        value="<?php echo e(old('EMP_CD') ?? $emp_data->EMP_CD); ?>"
                                        style="width: 80px;" maxlength="10" tabindex="1"
                                        oninput="value = onlyHalfWord(value)" onfocus="this.select();"
                                        <?php if(!is_nullorwhitespace($emp_data->EMP_CD)): ?>
                                        disabled
                                        <?php else: ?>
                                        autofocus
                                        <?php endif; ?>
                                    >
                                    <?php if(!is_nullorwhitespace($emp_data->EMP_CD)): ?>
                                    <input type="hidden" name="EMP_CD" value=<?php echo e($emp_data->EMP_CD); ?>>
                                    <?php endif; ?>
                                    <?php $__errorArgs = ['EMP_CD'];
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
                                <th class="required">社員名</th>
                                <td>
                                    <input type="text" name="EMP_NAME" id="EMP_NAME"
                                        value="<?php echo e(old('EMP_NAME') ?? $emp_data->EMP_NAME); ?>"
                                        style="width: 300px;" maxlength="20" tabindex="2"
                                        oninput="value = ngVerticalBar(value)" onfocus="this.select();"
                                        <?php if(!is_nullorwhitespace($emp_data->EMP_CD)): ?>
                                        autofocus
                                        <?php endif; ?>
                                        >
                                    <?php $__errorArgs = ['EMP_NAME'];
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
                                <th class="required">社員カナ名</th>
                                <td>
                                    <input name="EMP_KANA" id="EMP_KANA" tabindex="3"
                                        value="<?php echo e(old('EMP_KANA') ?? $emp_data->EMP_KANA); ?>"
                                        style="width: 160px;" onfocus="this.select();" type="text" maxlength="20">
                                    <?php $__errorArgs = ['EMP_KANA'];
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
                                <th class="required">部門</th>
                                <td>
                                    <input name="DEPT_CD" id="txtDeptCd" style="width: 50px;" class="searchDeptCd txtDeptCd"
                                        type="text" tabindex="4" maxlength="6" oninput="value = onlyHalf(value)" onfocus="this.select();"
                                        value="<?php echo e(old('DEPT_CD', !empty($search_data['DEPT_CD']) ? $search_data['DEPT_CD'] : $emp_data->DEPT_CD)); ?>">
                                    <input name="btnSearchDeptCd" class="SearchButton" id="btnSearchDeptCd"
                                        tabindex="5" type="button" value="?" onclick="SearchDept(this);return false">
                                    <input name="deptName" type="text" class="txtDeptName" style="width: 200px; height: 23px; display: inline-block;"
                                        id="deptName" value="<?php echo e(old('deptName', !empty($request_data['deptName']) ? $request_data['deptName']:'')); ?>"
                                        disabled data-dispclscd=01>
                                    <?php $__errorArgs = ['DEPT_CD'];
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
                                <th>入社年月日</th>
                                <td>
                                    <input type="text"
                                        name="ENT_DATE"
                                        class="yearMonthDay"
                                        autocomplete="off"
                                        onfocus="this.select();"
                                        tabindex="6"
                                        value="<?php echo e(old('ENT_DATE', (!empty($emp_data->ENT_YEAR) ? $emp_data->ENT_YEAR.'年'.sprintf('%02d', $emp_data->ENT_MONTH).'月'.sprintf('%02d', $emp_data->ENT_DAY).'日' : ''))); ?>"
                                    >
                                    <?php $__errorArgs = ['ENT_DATE'];
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
                                <th>退職年月日</th>
                                <td>
                                    <input type="text"
                                        name="RET_DATE"
                                        class="yearMonthDay"
                                        autocomplete="off"
                                        onfocus="this.select();"
                                        tabindex="7"
                                        value="<?php echo e(old('RET_DATE', (!empty($emp_data->RET_YEAR) ? $emp_data->RET_YEAR.'年'.sprintf('%02d', $emp_data->RET_MONTH).'月'.sprintf('%02d', $emp_data->RET_DAY).'日' : ''))); ?>"
                                    >
                                    <?php $__errorArgs = ['RET_DATE'];
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
                                <th class="required">在籍区分</th>
                                <td>
                                    <select name="REG_CLS_CD" tabindex="8"
                                        id="REG_CLS_CD" style="width: 80px;">
                                        <option value=""></option>
                                    <?php $__currentLoopData = $reg_cls_cd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $regClsCd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($regClsCd->CLS_DETAIL_CD); ?>"
                                            <?php echo e($regClsCd->CLS_DETAIL_CD == (old('REG_CLS_CD') ?? $emp_data->REG_CLS_CD) ? 'selected' : ''); ?>>
                                            <?php echo e($regClsCd->CLS_DETAIL_NAME); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['REG_CLS_CD'];
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
                                <th>生年月日</th>
                                <td>
                                    <input type="text"
                                        name="BIRTH_DATE"
                                        class="yearMonthDay"
                                        autocomplete="off"
                                        onfocus="this.select();"
                                        tabindex="9"
                                        value="<?php echo e(old('BIRTH_DATE', (!empty($emp_data->BIRTH_YEAR) ? $emp_data->BIRTH_YEAR.'年'.sprintf('%02d', $emp_data->BIRTH_MONTH).'月'.sprintf('%02d', $emp_data->BIRTH_DAY).'日' : ''))); ?>"
                                    >
                                    <?php $__errorArgs = ['BIRTH_DATE'];
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
                                <th class="required">性別</th>
                                <td>
                                    <select name="SEX_CLS_CD" tabindex="10" id="SEX_CLS_CD" style="width:50px;">
                                        <option value=""></option>
                                    <?php $__currentLoopData = $sex_cls_cd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sexClsCd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($sexClsCd->CLS_DETAIL_CD); ?>"
                                            <?php echo e($sexClsCd->CLS_DETAIL_CD == (old('SEX_CLS_CD') ?? $emp_data->SEX_CLS_CD) ? 'selected' : ''); ?>>
                                            <?php echo e($sexClsCd->CLS_DETAIL_NAME); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['SEX_CLS_CD'];
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
                                <th class="required">社員区分</th>
                                <td>
                                    <select name="EMP_CLS1_CD" tabindex="11" id="EMP_CLS1_CD" style="width: 300px;">
                                        <option value=""></option>
                                    <?php $__currentLoopData = $emp_csl1_cd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $empCls1Cd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>)
                                        <option value="<?php echo e($empCls1Cd->DESC_DETAIL_CD); ?>"
                                            <?php echo e($empCls1Cd->DESC_DETAIL_CD == (old('EMP_CLS1_CD') ?? $emp_data->EMP_CLS1_CD) ? 'selected' : ''); ?>>
                                            <?php echo e($empCls1Cd->DESC_DETAIL_NAME); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['EMP_CLS1_CD'];
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
                                <th class="required">使用カレンダー</th>
                                <td>
                                    <select name="CALENDAR_CD" tabindex="12" id="CALENDAR_CD" style="width: 300px;">
                                        <option value=""></option>
                                    <?php $__currentLoopData = $calendar_cd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $calendarCd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>)
                                        <option value="<?php echo e($calendarCd->CALENDAR_CD); ?>"
                                            <?php echo e($calendarCd->CALENDAR_CD == (old('CALENDAR_CD') ?? $emp_data->CALENDAR_CD) ? 'selected' : ''); ?>>
                                            <?php echo e($calendarCd->CALENDAR_NAME); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['CALENDAR_CD'];
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
                                <th>部門権限</th>
                                <td>
                                    <select name="DEPT_AUTH_CD" tabindex="13" id="DEPT_AUTH_CD" style="width: 300px;"
                                    <?php if(!$can_change_dept): ?>
                                    disabled
                                    <?php endif; ?>
                                    >
                                        <option value=""></option>
                                    <?php $__currentLoopData = $dept_auth_cd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deptAuthCd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($deptAuthCd->DEPT_AUTH_CD); ?>"
                                            <?php echo e($deptAuthCd->DEPT_AUTH_CD == (old('DEPT_AUTH_CD') ?? $emp_data->DEPT_AUTH_CD) ? 'selected' : ''); ?>>
                                            <?php echo e($deptAuthCd->DEPT_AUTH_NAME); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if(!$can_change_dept): ?>
                                    <input type=hidden name='DEPT_AUTH_CD' value=<?php echo e($emp_data->DEPT_AUTH_CD); ?>>
                                    <?php endif; ?>
                                    <?php $__errorArgs = ['DEPT_AUTH_CD'];
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
                                <th>郵便番号</th>
                                <td>
                                    <input name="POST_CD" tabindex="14" id="POST_CD"
                                        oninput="value = onlyNubersBar(value)" onfocus="this.select();"
                                        value="<?php echo e(old('POST_CD') ?? $emp_data->POST_CD); ?>"
                                        style="width:70px;" type="text" maxlength="8">
                                    <?php $__errorArgs = ['POST_CD'];
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
                                <th>住所１</th>
                                <td>
                                    <input name="ADDRESS1" tabindex="15" id="ADDRESS1" onfocus="this.select();"
                                        value="<?php echo e(old('ADDRESS1') ?? $emp_data->ADDRESS1); ?>"
                                        style="width: 430px;" type="text" maxlength="30">
                                    <?php $__errorArgs = ['ADDRESS1'];
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
                                <th>住所２</th>
                                <td>
                                    <input name="ADDRESS2" tabindex="16" id="ADDRESS2" onfocus="this.select();"
                                        value="<?php echo e(old('ADDRESS2') ?? $emp_data->ADDRESS2); ?>"
                                        style="width: 430px;" type="text" maxlength="30">
                                    <?php $__errorArgs = ['ADDRESS2'];
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
                                <th>電話番号</th>
                                <td>
                                    <input type="text" name="TEL" id="TEL" tabindex="17"
                                        oninput="value = onlyNubersBar(value)" onfocus="this.select();"
                                        value="<?php echo e(old('TEL') ?? $emp_data->TEL); ?>"
                                        style="width: 120px;" maxlength="15">
                                    <?php $__errorArgs = ['TEL'];
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
                                <th>携帯番号</th>
                                <td>
                                    <input type="text" name="CELLULAR" id="CELLULAR" tabindex="18"
                                        oninput="value = onlyNubersBar(value)" onfocus="this.select();"
                                        value="<?php echo e(old('CELLULAR') ?? $emp_data->CELLULAR); ?>"
                                        style="width: 120px;" maxlength="15">
                                    <?php $__errorArgs = ['CELLULAR'];
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
                                <th>Ｅメール</th>
                                <td>
                                    <input type="text" name="MAIL" id="MAIL" tabindex="19"
                                        oninput="value = onlyHalf(value)" onfocus="this.select();"
                                        value="<?php echo e(old('MAIL') ?? $emp_data->MAIL); ?>"
                                        style="width: 360px;" maxlength="50">
                                    <?php $__errorArgs = ['MAIL'];
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
                                <th>有休付与算出基準年月</th>
                                <td>
                                    <input
                                        type="text"
                                        class="yearMonth"
                                        name="PH_GRANT_YM"
                                        autocomplete="off"
                                        onfocus="this.select();"
                                        style="width: 100px;"
                                        tabindex="20"
                                        id="PH_GRANT_YM"
                                        value="<?php echo e(old('PH_GRANT_YM', (!empty($emp_data->PH_GRANT_YEAR) ? $emp_data->PH_GRANT_YEAR.'年'.sprintf('%02d', $emp_data->PH_GRANT_MONTH).'月' : ''))); ?>"
                                    >
                                    <?php $__errorArgs = ['PH_GRANT_YM'];
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
                                <th class="required">職種区分</th>
                                <td>
                                    <select name="EMP_CLS2_CD" id="EMP_CLS2_CD" tabindex="21" style="width: 300px;">
                                        <option value=""></option>
                                    <?php $__currentLoopData = $emp_csl2_cd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $empCls2Cd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>)
                                        <option value="<?php echo e($empCls2Cd->DESC_DETAIL_CD); ?>"
                                            <?php echo e($empCls2Cd->DESC_DETAIL_CD == (old('EMP_CLS2_CD') ?? $emp_data->EMP_CLS2_CD) ? 'selected' : ''); ?>>
                                            <?php echo e($empCls2Cd->DESC_DETAIL_NAME); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['EMP_CLS2_CD'];
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
                                <th class="required">締日</th>
                                <td>
                                    <select name="CLOSING_DATE_CD" id="CLOSING_DATE_CD" tabindex="22" style="width: 150px;"
                                    <?php if($closing_date_disable): ?>
                                    disabled
                                    <?php endif; ?>
                                    >
                                        <option value=""></option>
                                    <?php $__currentLoopData = $closing_date_cd_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $closing_date_cd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>)
                                        <option value="<?php echo e($closing_date_cd->CLOSING_DATE_CD); ?>"
                                            <?php echo e($closing_date_cd->CLOSING_DATE_CD == (old('CLOSING_DATE_CD', isset($emp_data) ? $emp_data['CLOSING_DATE_CD'] : null ) ?? $def_closing_date_cd) ? 'selected' : ''); ?>>
                                            <?php echo e($closing_date_cd->CLOSING_DATE_NAME); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['CLOSING_DATE_CD'];
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
                                <?php if($closing_date_disable): ?>
                                <input type=hidden name='CLOSING_DATE_CD' value=<?php echo e($emp_data->CLOSING_DATE_CD); ?>>
                                <?php endif; ?>
                            </tr>
                            <tr>
                                <th>所属</th>
                                <td>
                                    <select name="COMPANY_CD" id="COMPANY_CD" tabindex="23" style="width: 150px;">
                                        <option value=""></option>
                                    <?php $__currentLoopData = $company_cd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $companyCd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>)
                                        <option value="<?php echo e($companyCd->COMPANY_CD); ?>"
                                            <?php echo e($companyCd->COMPANY_CD == (old('COMPANY_CD') ?? $emp_data->COMPANY_CD) ? 'selected' : ''); ?>>
                                            <?php echo e($companyCd->COMPANY_ABR); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['COMPANY_CD'];
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
                                <th>社員番号２</th>
                                <td>
                                    <input type="text" name="EMP2_CD" id="EMP2_CD" tabindex="24"
                                        oninput="value = onlyHalfWord(value)" onfocus="this.select();"
                                        value="<?php echo e(old('EMP2_CD') ?? $emp_data->EMP2_CD); ?>"
                                        style="width: 80px;" maxlength="10"
                                    >
                                    <?php $__errorArgs = ['EMP2_CD'];
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
                        </tbody>
                    </table>

                    <input type="hidden" name="change" value="<?php echo e($emp_data->EMP_CD); ?>">
                    <div class="line"></div>

                    <p class="ButtonField1">
                        <input type="button" value="更新" name="btnUpdate" tabindex="25" id="btnUpdate"
                            class="ButtonStyle1 update"
                            data-url="<?php echo e(url('master/MT10EmpUpdate')); ?>">

                        <input type="button" name="btnCancel" tabindex="26" id="btnCancel"
                            class="ButtonStyle1" value="キャンセル"
                            onclick="location.reload();"
                        >
                        <input type="button" name="btnDelete" tabindex="27" id="btnDelete"
                            class="ButtonStyle1 delete" value="削除"
                            <?php if(is_nullorwhitespace($emp_data->EMP_CD)): ?>
                            disabled="disabled"
                            <?php else: ?>
                            data-url="<?php echo e(url('master/MT10EmpDelete')); ?>"
                            <?php endif; ?>
                        >
                    </p>
                </div>
            </form>
        </table>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
    $(function() {
        // ENTER時に送信されないようにする
        $('input').not('[type="button"]').keypress(function(e) {
            if (e.which == 13) {
                return false;
            }
        });

        // カレンダー機能の設定
        $(function() {
            $('.yearMonth').datepicker({
                format: 'yyyy年mm月',
                autoclose: true,
                language: 'ja',
                minViewMode: 1,
                startDate: '1900年01月',
                endDate: '2100年12月'
            });
        });
        $('.yearMonthDay').datepicker({
            format: 'yyyy年mm月dd日',
            autoclose: true,
            language: 'ja',
            startDate: '1900年01月01日',
            endDate: '2100年12月31日'
        });

        // 入力制御関連
        // 入力可能文字：半角
        onlyHalf = n => n.replace(/[０-９Ａ-Ｚａ-ｚ]/g, s => String.fromCharCode(s.charCodeAt(0) - 65248))
            .replace(/[^-a-zA-Z0-9+=^$*.\[\]{}()?\"\'!@#%&\/\\\\,><:;_~|`+=]/g, '');
        // 入力可能文字：半角英数
        onlyHalfWord = n => n.replace(/[０-９Ａ-Ｚａ-ｚ]/g, s => String.fromCharCode(s.charCodeAt(0) - 65248))
            .replace(/[^0-9a-zA-Z]/g, '');
        // 所属番号英数半角のみ入力可
        onlyHalfNumber = n => n.replace(/[０-９]/g, s => String.fromCharCode(s.charCodeAt(0) - 65248))
            .replace(/\D/g, '');
        // 入力可能文字：数値、ハイフン
        onlyNubersBar = n => n.replace(/[０-９]/g, s => String.fromCharCode(s.charCodeAt(0) - 65248))
            .replace(/[ー]/g, '-')
            .replace(/[^-\d]/g, '');
        // 入力不可能文字：|
        ngVerticalBar = n => n.replace(/\|/g, '');

        // 更新submit-form
        $(document).on('click', '.update', function() {
            if (window.confirm("<?php echo e(getArrValue($error_messages, 1005)); ?>")) {
                var url = $(this).data('url');
                $('#form').attr('action', url);
                $('#form').submit();
            }
            return false;
        });

        // 削除処理submit-form
        $(document).on('click', '.delete', function() {
            if (window.confirm("<?php echo e(getArrValue($error_messages, 1004)); ?>")) {
                var url = $(this).data('url');
                $('#form').attr('action', url);
                $('#form').submit();
            }
            return false;
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('menu.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\06_SVN\resources\views/master/MT10EmpEditor.blade.php ENDPATH**/ ?>