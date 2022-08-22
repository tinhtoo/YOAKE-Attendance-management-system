<!--カレンダーパターン情報入力 -->


<?php $__env->startSection('title','カレンダーパターン情報入力 '); ?>

<?php $__env->startSection('content'); ?>
<div id="contents-stage">
    <form action="" method="post" id="form">
        <?php echo csrf_field(); ?>
        <table class="BaseContainerStyle1">
            <tbody>
                <tr>
                    <td>
                        <div id="UpdatePanel1">
                            <table class="InputFieldStyle1">
                                <tbody>
                                    <tr>
                                        <th>カレンダーコード</th>
                                        <td>
                                            <input name="CalendarCd"
                                                tabindex="1"
                                                id="txtCalendarCd"
                                                style="width: 30px;"
                                                type="text"
                                                onfocus="this.select();"
                                                maxlength="3"
                                                oninput="value=onlyHalfWord(value)"
                                                <?php if(isset($MT02calendarPtnEdit)): ?>
                                                value="<?php echo e(old('CalendarCd', !empty($request_data['CalendarCd']) ? $request_data['CalendarCd'] : $MT02calendarPtnEdit->CALENDAR_CD)); ?>"
                                                disabled
                                                <?php else: ?>
                                                autofocus
                                                <?php endif; ?>
                                                value="<?php echo e(old('CalendarCd')); ?>"
                                            >
                                            <?php if(isset($MT02calendarPtnEdit)): ?>
                                            <input type="hidden" name="CalendarCd" value="<?php echo e($MT02calendarPtnEdit->CALENDAR_CD); ?>">
                                            <?php endif; ?>
                                            <?php if($errors->has('CalendarCd')): ?>
                                            <span class="text-danger"><?php echo e(getArrValue($error_messages, $errors->first('CalendarCd'))); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>カレンダー名</th>
                                        <td>
                                            <input name="CalendarPtnName"
                                                tabindex="2"
                                                id="txtCalendarPtnName"
                                                style="width: 300px;"
                                                type="search"
                                                onfocus="this.select();"
                                                maxlength="20"
                                                oninput="value = ngVerticalBar(value)"
                                                <?php if(isset($MT02calendarPtnEdit)): ?>
                                                value="<?php echo e(old('CalendarPtnName', !empty($request_data['CalendarPtnName']) ? $request_data['CalendarPtnName'] : $MT02calendarPtnEdit->CALENDAR_NAME)); ?>"
                                                <?php endif; ?>
                                                value="<?php echo e(old('CalendarPtnName')); ?>"
                                            >
                                            <?php if($errors->has('CalendarPtnName')): ?>
                                            <span class="text-danger"><?php echo e(getArrValue($error_messages, $errors->first('CalendarPtnName'))); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <p class="CategoryTitle1">カレンダー区分</p>
                            <table class="GroupBox1">
                                <tbody>
                                    <tr>
                                        <td>
                                            <input name="WorkPtn"
                                                tabindex="3"
                                                id="rbUsuallyWork"
                                                type="radio"
                                                checked="checked"
                                                value="rbUsuallyWork" <?php echo e(old("WorkPtn", !empty($search_data["WorkPtn"]) ? $search_data["WorkPtn"] : "" ) == 'rbUsuallyWork' ? "checked" : ""); ?>

                                                <?php if(isset($MT02calendarPtnEdit)): ?>
                                                <?php echo e(($MT02calendarPtnEdit->CALENDAR_CLS_CD == "00") ? "checked" : ""); ?>

                                                <?php endif; ?>
                                            >
                                            <label for="rbUsuallyWork">通常勤務用</label>
                                            <input name="WorkPtn"
                                                tabindex="4"
                                                id="rbShiftWork"
                                                class="rbShiftWork"
                                                type="radio"
                                                value="rbShiftWork" <?php echo e(old("WorkPtn", !empty($search_data["WorkPtn"]) ? $search_data["WorkPtn"] : "" ) == 'rbShiftWork' ? "checked" : ""); ?>

                                                <?php if(isset($MT02calendarPtnEdit)): ?>
                                                <?php echo e(($MT02calendarPtnEdit->CALENDAR_CLS_CD == "01") ? "checked" : ""); ?>

                                                <?php endif; ?>
                                            >
                                            <label for="rbShiftWork">シフト勤務用</label>
                                            <div class="clearBoth"></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="GridViewStyle2 mg10">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <th>勤務体系</th>
                                        </tr>
                                        <tr>
                                            <th class="RowTitle">月曜日</th>
                                            <td>
                                                <select name="ddlMonWorkPtn"
                                                    tabindex="5"
                                                    id="ddlMonWorkPtn"
                                                    style="width: 260px;"
                                                    class="coloredSelect"
                                                >
                                                    <option style=color:black; value=""></option>
                                                    <?php if(isset($workptns)): ?>
                                                    <?php $__currentLoopData = $workptns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workptn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($workptn->WORKPTN_CD); ?>"
                                                        <?php echo e($workptn->WORK_CLS_CD == '00' ? 'class=text-danger' : 'style=color:black;'); ?>

                                                        <?php if(isset($MT02calendarPtnEdit)): ?>
                                                        <?php echo e(old('ddlMonWorkPtn', ($workptn->WORKPTN_CD == $MT02calendarPtnEdit->MON_WORKPTN_CD ? "selected" : ""))); ?>

                                                    <?php endif; ?>
                                                        <?php echo e(old('ddlMonWorkPtn') == $workptn->WORKPTN_CD ? "selected" : ""); ?>

                                                    >
                                                        <?php echo e($workptn->WORKPTN_NAME); ?>

                                                   </option>
                                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                   <?php endif; ?>
                                                </select>
                                            </td>
                                            <td class="errMessage">
                                            <?php if($errors->has('ddlMonWorkPtn')): ?>
                                            <span class="text-danger"><?php echo e(getArrValue($error_messages, $errors->first('ddlMonWorkPtn'))); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="RowTitle">火曜日</th>
                                            <td>
                                                <select name="ddlTueWorkPtn"
                                                    tabindex="6"
                                                    id="ddlTueWorkPtn"
                                                    style="width: 260px;"
                                                    class="coloredSelect"
                                                >
                                                    <option style=color:black; value=""></option>
                                                    <?php if(isset($workptns)): ?>
                                                    <?php $__currentLoopData = $workptns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workptn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($workptn->WORKPTN_CD); ?>"
                                                        <?php echo e($workptn->WORK_CLS_CD == '00' ? 'class=text-danger' : 'style=color:black;'); ?>

                                                    <?php if(isset($MT02calendarPtnEdit)): ?>
                                                        <?php echo e(old('ddlTueWorkPtn', ($workptn->WORKPTN_CD == $MT02calendarPtnEdit->TUE_WORKPTN_CD ? "selected" : ""))); ?>

                                                    <?php endif; ?>
                                                        <?php echo e(old('ddlTueWorkPtn') == $workptn->WORKPTN_CD ? "selected" : ""); ?>>
                                                        <?php echo e($workptn->WORKPTN_NAME); ?>

                                                    </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </select>
                                            </td>
                                            <td class="errMessage">
                                            <?php if($errors->has('ddlTueWorkPtn')): ?>
                                            <span class="text-danger"><?php echo e(getArrValue($error_messages, $errors->first('ddlTueWorkPtn'))); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="RowTitle">水曜日</th>
                                            <td>
                                                <select name="ddlWedWorkPtn"
                                                    tabindex="7"
                                                    id="ddlWedWorkPtn"
                                                    style="width: 260px;"
                                                    class="coloredSelect"
                                                >
                                                    <option style=color:black; value=""></option>
                                                    <?php if(isset($workptns)): ?>
                                                    <?php $__currentLoopData = $workptns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workptn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($workptn->WORKPTN_CD); ?>"
                                                        <?php echo e($workptn->WORK_CLS_CD == '00' ? 'class=text-danger' : 'style=color:black;'); ?>

                                                    <?php if(isset($MT02calendarPtnEdit)): ?>
                                                        <?php echo e(old('ddlWedWorkPtn', ($workptn->WORKPTN_CD == $MT02calendarPtnEdit->WED_WORKPTN_CD ? "selected" : ""))); ?>

                                                    <?php endif; ?>
                                                        <?php echo e(old('ddlWedWorkPtn') == $workptn->WORKPTN_CD ? "selected" : ""); ?>

                                                    >
                                                        <?php echo e($workptn->WORKPTN_NAME); ?>

                                                    </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </select>
                                            </td>
                                            <td class="errMessage">
                                            <?php if($errors->has('ddlWedWorkPtn')): ?>
                                            <span class="text-danger"><?php echo e(getArrValue($error_messages, $errors->first('ddlWedWorkPtn'))); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="RowTitle">木曜日</th>
                                            <td>
                                                <select name="ddlThuWorkPtn"
                                                    tabindex="8"
                                                    id="ddlThuWorkPtn"
                                                    style="width: 260px;"
                                                    class="coloredSelect"
                                                >
                                                    <option style=color:black; value=""></option>
                                                    <?php if(isset($workptns)): ?>
                                                    <?php $__currentLoopData = $workptns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workptn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($workptn->WORKPTN_CD); ?>"
                                                        <?php echo e($workptn->WORK_CLS_CD == '00' ? 'class=text-danger' : 'style=color:black;'); ?>

                                                    <?php if(isset($MT02calendarPtnEdit)): ?>
                                                        <?php echo e(old('ddlThuWorkPtn', ($workptn->WORKPTN_CD == $MT02calendarPtnEdit->THU_WORKPTN_CD ? "selected" : ""))); ?>

                                                    <?php endif; ?>
                                                        <?php echo e(old('ddlThuWorkPtn') == $workptn->WORKPTN_CD ? "selected" : ""); ?>

                                                    >
                                                        <?php echo e($workptn->WORKPTN_NAME); ?>

                                                    </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </select>
                                            </td>
                                            <td class="errMessage">
                                            <?php if($errors->has('ddlThuWorkPtn')): ?>
                                            <span class="text-danger"><?php echo e(getArrValue($error_messages, $errors->first('ddlThuWorkPtn'))); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="RowTitle">金曜日</th>
                                            <td>
                                                <select name="ddlFriWorkPtn"
                                                    tabindex="9"
                                                    id="ddlFriWorkPtn"
                                                    style="width: 260px;"
                                                    class="coloredSelect"
                                                >
                                                    <option style=color:black; value=""></option>
                                                    <?php if(isset($workptns)): ?>
                                                    <?php $__currentLoopData = $workptns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workptn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($workptn->WORKPTN_CD); ?>"
                                                        <?php echo e($workptn->WORK_CLS_CD == '00' ? 'class=text-danger' : 'style=color:black;'); ?>

                                                    <?php if(isset($MT02calendarPtnEdit)): ?>
                                                        <?php echo e(old('ddlFriWorkPtn', ($workptn->WORKPTN_CD == $MT02calendarPtnEdit->FRI_WORKPTN_CD ? "selected" : ""))); ?>

                                                    <?php endif; ?>
                                                        <?php echo e(old('ddlFriWorkPtn') == $workptn->WORKPTN_CD ? "selected" : ""); ?>

                                                    >
                                                        <?php echo e($workptn->WORKPTN_NAME); ?>

                                                    </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </select>
                                            </td>
                                            <td class="errMessage">
                                            <?php if($errors->has('ddlFriWorkPtn')): ?>
                                            <span class="text-danger"><?php echo e(getArrValue($error_messages, $errors->first('ddlFriWorkPtn'))); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="RowTitle">土曜日</th>
                                            <td>
                                                <select name="ddlSatWorkPtn"
                                                    tabindex="10"
                                                    id="ddlSatWorkPtn"
                                                    style="width: 260px;"
                                                    class="coloredSelect"
                                                >
                                                    <option style=color:black; value=""></option>
                                                    <?php if(isset($workptns)): ?>
                                                    <?php $__currentLoopData = $workptns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workptn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($workptn->WORKPTN_CD); ?>"
                                                        <?php echo e($workptn->WORK_CLS_CD == '00' ? 'class=text-danger' : 'style=color:black;'); ?>

                                                    <?php if(isset($MT02calendarPtnEdit)): ?>
                                                        <?php echo e(old('ddlSatWorkPtn', ($workptn->WORKPTN_CD == $MT02calendarPtnEdit->SAT_WORKPTN_CD ? "selected" : ""))); ?>

                                                    <?php endif; ?>
                                                        <?php echo e(old('ddlSatWorkPtn') == $workptn->WORKPTN_CD ? "selected" : ""); ?>

                                                    >
                                                        <?php echo e($workptn->WORKPTN_NAME); ?>

                                                    </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </select>
                                            </td>
                                            <td class="errMessage">
                                            <?php if($errors->has('ddlSatWorkPtn')): ?>
                                            <span class="text-danger"><?php echo e(getArrValue($error_messages, $errors->first('ddlSatWorkPtn'))); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="RowTitle">日曜日</th>
                                            <td>
                                                <select name="ddlSunWorkPtn"
                                                    tabindex="11"
                                                    id="ddlSunWorkPtn"
                                                    style="width: 260px;"
                                                    class="coloredSelect"
                                                >
                                                    <option style=color:black; value=""></option>
                                                    <?php if(isset($workptns)): ?>
                                                    <?php $__currentLoopData = $workptns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workptn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($workptn->WORKPTN_CD); ?>"
                                                        <?php echo e($workptn->WORK_CLS_CD == '00' ? 'class=text-danger' : 'style=color:black;'); ?>

                                                    <?php if(isset($MT02calendarPtnEdit)): ?>
                                                        <?php echo e(old('ddlSunWorkPtn', ($workptn->WORKPTN_CD == $MT02calendarPtnEdit->SUN_WORKPTN_CD ? "selected" : ""))); ?>

                                                    <?php endif; ?>
                                                        <?php echo e(old('ddlSunWorkPtn') == $workptn->WORKPTN_CD ? "selected" : ""); ?>

                                                    >
                                                        <?php echo e($workptn->WORKPTN_NAME); ?>

                                                    </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </select>
                                            </td>
                                            <td class="errMessage">
                                            <?php if($errors->has('ddlSunWorkPtn')): ?>
                                            <span class="text-danger"><?php echo e(getArrValue($error_messages, $errors->first('ddlSunWorkPtn'))); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="RowTitle">祝日</th>
                                            <td>
                                                <select name="ddlHldWorkPtn"
                                                    tabindex="12"
                                                    id="ddlHldWorkPtn"
                                                    style="width: 260px;"
                                                    class="coloredSelect"
                                                >
                                                    <option style=color:black; value=""></option>
                                                    <?php if(isset($workptns)): ?>
                                                    <?php $__currentLoopData = $workptns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workptn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($workptn->WORKPTN_CD); ?>"
                                                        <?php echo e($workptn->WORK_CLS_CD == '00' ? 'class=text-danger' : 'style=color:black;'); ?>

                                                    <?php if(isset($MT02calendarPtnEdit)): ?>
                                                        <?php echo e(old('ddlHldWorkPtn', ($workptn->WORKPTN_CD == $MT02calendarPtnEdit->HLD_WORKPTN_CD ? "selected" : ""))); ?>

                                                    <?php endif; ?>
                                                        <?php echo e(old('ddlHldWorkPtn') == $workptn->WORKPTN_CD ? "selected" : ""); ?>

                                                    >
                                                        <?php echo e($workptn->WORKPTN_NAME); ?>

                                                    </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </select>
                                            </td>
                                            <td class="errMessage">
                                            <?php if($errors->has('ddlHldWorkPtn')): ?>
                                            <span class="text-danger"><?php echo e(getArrValue($error_messages, $errors->first('ddlHldWorkPtn'))); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="line"></div>
                            <p class="ButtonField1">
                                <input name="btnUpdate"
                                    tabindex="13"
                                    id="btnUpdate"
                                    class="SearchButton submit-button"
                                    type="button"
                                    value="更新"
                                >
                                <input name="btnCancel"
                                    tabindex="14" id="btnCancel"
                                    type="button"
                                    onclick="window.location.reload(false)"
                                    value="キャンセル"
                                >
                                <input type="button" name="btnDelete" tabindex="15" id="btnDelete"
                                    class="ButtonStyle1 delete" value="削除"
                                    <?php if(empty($MT02calendarPtnEdit->CALENDAR_CD)): ?>
                                    disabled="disabled"
                                    <?php else: ?>
                                    data-url="<?php echo e(url('master/MT02CalendarPtnDelete')); ?>"
                                    <?php endif; ?>
                                >
                            </p>
                        </div>

                    </td>
                </tr>
            </tbody>
        </table>

        <?php if(isset($MT02calendarPtnEdit)): ?>
        <input type="hidden" name="changeCd" value="<?php echo e($MT02calendarPtnEdit->CALENDAR_CD); ?>">
        <?php endif; ?>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
    $(document).ready(function () {
        toggleRadio( $("input[type='radio']:checked") );
        // 無効化
        $('input:radio').on('click', function () {
            toggleRadio($(this));
        })

    });

    function toggleRadio(ele) {
        $("#ddlMonWorkPtn, #ddlTueWorkPtn, #ddlWedWorkPtn, #ddlThuWorkPtn, #ddlFriWorkPtn, #ddlSatWorkPtn, #ddlSunWorkPtn, #ddlHldWorkPtn").prop("disabled", false);
        if (ele.hasClass('rbShiftWork')) {
            $("#ddlMonWorkPtn, #ddlTueWorkPtn, #ddlWedWorkPtn, #ddlThuWorkPtn, #ddlFriWorkPtn, #ddlSatWorkPtn, #ddlSunWorkPtn, #ddlHldWorkPtn").prop("disabled", true);
            $("#ddlMonWorkPtn, #ddlTueWorkPtn, #ddlWedWorkPtn, #ddlThuWorkPtn, #ddlFriWorkPtn, #ddlSatWorkPtn, #ddlSunWorkPtn, #ddlHldWorkPtn").val('');
            $(".errMessage").remove();
        }
    }

    // 確認ダイアログ（更新・修正処理）
    $(document).on('click', '.submit-button', function(){
        if (window.confirm("<?php echo e(getArrValue($error_messages, 1005)); ?>")) {
            var url = $(this).data('url');
            $('#form').attr('action', url);
            $('#form').submit();
        }
        return false;
    });

    // 確認ダイアログ（削除処理）
    $(document).on('click', '.delete', function() {
        if (window.confirm("<?php echo e(getArrValue($error_messages, 1004)); ?>")) {
            var url = $(this).data('url');
            $('#form').attr('action', url);
            $('#form').submit();
        }
        return false;
    });

    $(function() {
        // 入力可能文字：半角英数
        onlyHalfWord = n => n.replace(/[０-９Ａ-Ｚａ-ｚ]/g, s => String.fromCharCode(s.charCodeAt(0) - 65248))
                            .replace(/[^0-9a-zA-Z]/g, '');

        // 入力不可能文字：|
        ngVerticalBar = n => n.replace(/\|/g, '').replace(/[｜]/g, '');


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

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('menu.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\06_SVN\resources\views/master/MT02CalendarPtnEditor.blade.php ENDPATH**/ ?>