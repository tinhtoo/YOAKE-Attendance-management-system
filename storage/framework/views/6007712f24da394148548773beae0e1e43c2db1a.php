<!-- 社員別月別シフト入力画面 -->

<?php $__env->startSection('title', '社員別月別シフト入力'); ?>
<?php $__env->startSection('content'); ?>
    <div id="contents-stage">
        <table class="BaseContainerStyle2">
            <tbody>
                <tr>
                    <td>
                        <div id="UpdatePanel1">
                            <form action="" method="post" id="searchForm">
                            <?php echo csrf_field(); ?>
                                <table class="InputFieldStyle1">
                                    <tbody>
                                        <tr>
                                            <th>対象月度</th>
                                            <td>
                                                <input type="text" class="yearMonth" name="filter[caldYearMonth]" id="yearMonth" autocomplete="off"
                                                    onfocus="this.select();" autofocus tabindex="1" style="width: 100px;" 
                                                    <?php if(isset($search_results)): ?> disabled="disabled" <?php endif; ?>
                                                    value="<?php echo e(old('filter.caldYearMonth', isset($search_data) ? $search_data['caldYearMonth'] : $def_cald_year.'年'.sprintf('%02d', $def_cald_month).'月')); ?>" />
                                                <?php $__errorArgs = ['filter.caldYearMonth'];
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
                                            <th>表示区分</th>
                                            <td>
                                                <div class="GroupBox1" style="width:220px">
                                                    <input type="radio" name="filter[searchCondition]" id="searchDept"
                                                        class="searchCondition" tabindex="2" value="0"
                                                        <?php if(isset($search_results)): ?> disabled="disabled" <?php endif; ?>
                                                        <?php echo e(old('filter.searchCondition', isset($search_data) && $search_data['searchCondition']) ? '' : 'checked="checked"' ); ?> >
                                                    <label for="searchDept" style="padding: 1.5px;">部門</label>
                                                    <input type="radio" name="filter[searchCondition]" id="searchEmp"
                                                        class="searchCondition" tabindex="3" value="1"
                                                        <?php if(isset($search_results)): ?> disabled="disabled" <?php endif; ?>
                                                        <?php echo e(old('filter.searchCondition', isset($search_data) && $search_data['searchCondition']) ? 'checked="checked"' : '' ); ?> >
                                                    <label for="searchEmp" style="padding: 1.5px;">社員</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>締日</th>
                                            <td>
                                                <select name="filter[closingDateCd]" tabindex="4"
                                                    id="closingDateCd" style="width: 150px;"
                                                    <?php if(old('filter.searchCondition', isset($search_data))): ?> disabled="disabled" <?php endif; ?>>
                                                    <?php $__currentLoopData = $closing_dates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $closing_date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($closing_date->CLOSING_DATE_CD); ?>"
                                                        <?php echo e($closing_date->CLOSING_DATE_CD == (old('closingDateCd', isset($search_data) && !$search_data['searchCondition'] ? $search_data['closingDateCd'] : null ) ?? $def_closing_date_cd) ? 'selected' : ''); ?>>
                                                        <?php echo e($closing_date->CLOSING_DATE_NAME); ?>

                                                    </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php if(!isset($search_data)): ?> <div style="display:none" id="defClosing"><?php echo e($def_closing_date_cd); ?></div> <?php endif; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>部門</th>
                                            <td>
                                                <input name="filter[txtDeptCd]" tabindex="5" class="txtDeptCd searchDeptCd"
                                                    id="txtDeptCd" style="width: 50px;" type="text" maxlength="6"
                                                    oninput="value=onlyHalfWord(value)" onfocus="this.select();"
                                                    <?php if(old('filter.searchCondition', isset($search_data))): ?> disabled="disabled" <?php endif; ?>
                                                    value="<?php echo e(old('filter.txtDeptCd' , (!empty($search_data) && !$search_data['searchCondition'] ? $search_data['txtDeptCd'] : ''))); ?>">
                                                <input type="button" name="btnSearchDeptCd" class="SearchButton" id="btnSearchDeptCd"
                                                    <?php if(old('filter.searchCondition', isset($search_data))): ?> disabled="disabled" <?php endif; ?>
                                                    tabindex="6" value="?" onclick="SearchDept(this);return false">
                                                <input type="text" name="deptName" id="deptName" class="txtDeptName"
                                                    data-dispclscd=01 data-isdeptauth=true
                                                    style="width: 200px; display: inline-block;"
                                                    disabled="disabled">
                                                <?php $__errorArgs = ['filter.txtDeptCd'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger" id="DeptCdValidError"><?php echo e(getArrValue($error_messages, $message)); ?></span>
                                                <?php endif; ?>
                                                <span class="text-danger" id="deptNameError"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>社員番号</th>
                                            <td>
                                                <input type="text" name="filter[txtEmpCd]" tabindex="7" class="txtEmpCd searchEmpCd"
                                                    id="txtEmpCd" style="width: 80px;" maxlength="10"
                                                    oninput="value=onlyHalfWord(value)" onfocus="this.select();"
                                                    <?php if(!old('filter.searchCondition') || isset($search_data)): ?>) disabled="disabled" <?php endif; ?>
                                                    value="<?php echo e(old('filter.txtEmpCd', !empty($search_data) && $search_data['searchCondition'] ? $search_data['txtEmpCd'] : '')); ?>">
                                                <input type="button" name="btnSearchEmpCd" tabindex="8" class="SearchButton"
                                                    id="btnSearchEmpCd" onclick="SearchEmp(this);return false" value="?"
                                                    <?php if(!old('filter.searchCondition') || isset($search_data)): ?>) disabled="disabled" <?php endif; ?>>
                                                <input name="empName" id="empName" class="txtEmpName" type="text"
                                                    data-regclscd=00,01 data-isdeptauth=true data-calendarclscd=01
                                                    style="width: 200px; display: inline-block;"
                                                    disabled="disabled">
                                                <?php $__errorArgs = ['filter.txtEmpCd'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger" id="EmpCdValidError"><?php echo e(getArrValue($error_messages, $message)); ?></span>
                                                <?php endif; ?>
                                                <span class="text-danger" id="EmpCdError"></span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>

                            <div class="line"></div>
                            <p>
                                <input type="button" name="view" class="ButtonStyle1 view" id="view1"
                                    tabindex="9" value="表示"
                                    data-url="<?php echo e(url('shift/MonthShiftEmpEditor')); ?>"
                                    <?php if(isset($search_results)): ?> disabled="disabled" <?php endif; ?>>
                                <input type="button" name="update" class="ButtonStyle1 update" id="update"  
                                    tabindex="10" value="更新"
                                    data-url="<?php echo e(url('shift/MonthShiftEmpUpdate')); ?>"
                                    <?php if(!isset($search_results)): ?> disabled="disabled" <?php endif; ?>>
                                <input type="button" name="cancel2" class="ButtonStyle1" id="cancel2"
                                    tabindex="11" value="キャンセル"
                                    onclick="location.href='<?php echo e(url('shift/MonthShiftEmpEditor')); ?>'">
                                &nbsp;
                                <?php if(isset($fix_flg) && $fix_flg): ?>
                                <span class="font-style2" id="lblFixMsg"><?php echo e(config('consts.fix_msg')); ?></span>
                                <?php endif; ?>
                            </p>
    

                            <!-- detail -->
                            <div class="GridViewStyle1" id="gridview-container">
                                <div class="GridViewPanelStyle1" id="ctl00_cphContentsArea_pnlWorkTime"
                                    style="width: 1158px;">

                                    <?php if(isset($records)): ?>
                                    <?php if($records->count() === 0): ?>)
                                    <tr style="width:70px;">
                                        <td><span><?php echo e(getArrValue($error_messages, 2000)); ?></span></td>
                                    </tr>
                                    <?php else: ?>
                                    <input name="startCaldDate" id="startCaldDate" type="hidden" value="<?php echo e(}}">
                                    <input name="endCaldDate" id="endCaldDate" type="hidden" value="{{); ?>">

                                    <div>
                                        <table tabindex="12" class="GridViewRowCut GridViewBorder GridViewRowCenter"
                                            id="ctl00_cphContentsArea_gvMonthShiftEmp" style="border-collapse: collapse;"
                                            border="1" rules="all" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <th>部門名</th>
                                                    <th>社員名</th>
                                                    <th></th>
                                                    <?php $__currentLoopData = $caldDays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <th>
                                                        <span id="caldDate" class="<?php echo e(in_array($day->format('md')), $holidays) || $day->format('w') == 0 || $day->format('w') == 6 ? 'text-danger' : ''); ?>"
                                                            style="width: 80px; display: inline-block;">
                                                            <?php echo e($day->format('m/d')); ?>(<?php echo e(config('consts.weeks')[$day->format('m/d')]); ?>)
                                                        </span>
                                                    </th>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tr>
                                                <?php $__currentLoopData = $emp_records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td>$emp->DEPT_NAME</td>
                                                    <td>$emp->EMP_NAME</td>
                                                    <td><input type="button" name="shiftPtn" class="shiftPtn" id="shiftPtn" value="パターン"></td>
                                                    <?php $__currentLoopData = $shiftCalendars[$emp->EMP_CD]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shiftCal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <td>
                                                        <select name="calendar[<?php echo e($i); ?>][WORKPTN_CD]" id="txtWorkPtnCd<?php echo e($i); ?>"
                                                            class="workPtnCd coloredSelect" style="width: 276px;" tabindex="13">
                                                            <option style=color:black; value=""></option>
                                                            <?php $__currentLoopData = $workptn_names; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workptn_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option
                                                                value="<?php echo e($workptn_name->WORKPTN_CD); ?>"
                                                                <?php echo e($workptn_name->WORK_CLS_CD === '00' ? 'class=text-danger' : 'style=color:black;'); ?>

                                                                <?php echo e($workptn_name->WORKPTN_CD ===  $shiftCal->WORKPTN_CD ? "selected" : ""); ?>

                                                            >
                                                                <?php echo e($workptn_name->WORKPTN_NAME); ?>

                                                            </option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </td>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <input name="endShiftptnCd" id="endShiftptnCd" type="hidden">
                                                    <input name="endDayNo" id="endDayNo" type="hidden">
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <?php endif; ?>
                                    <?php endif; ?>

                                </div>
                            </div>

                            <div class="line"></div>
                            <p class="ButtonField2">
                                <input type="button" name="cancel2" class="ButtonStyle1" id="cancel2"
                                    tabindex="12" value="キャンセル"
                                    onclick="location.href='<?php echo e(url('shift/MonthShiftEmpEditor')); ?>'">
                            </p>
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
        // ENTER時に送信されないようにする
        $('input').not('[type="button"]').keypress(function(e) {
            if (e.which == 13) {
                return false;
            }
        });

        // 検索条件制御
        $('.searchCondition').change(function(ele) {
            if (ele.target.value === '1') {
                // 社員
                $('#closingDateCd').val($('#defClosing').text());
                $('#closingDateCd').attr('disabled', 'disabled');
                $('#txtDeptCd').attr('disabled', 'disabled');
                $('#btnSearchDeptCd').attr('disabled', 'disabled');
                $('#txtDeptCd').val('');
                $('#deptName').val('');
                $('#beforeDept').val('');
                $('#txtEmpCd').attr('disabled', false);
                $('#btnSearchEmpCd').attr('disabled', false);
            } else {
                // 部門
                $('#closingDateCd').attr('disabled', false);
                $('#txtDeptCd').attr('disabled', false);
                $('#btnSearchDeptCd').attr('disabled', false);
                $('#txtEmpCd').val('');
                $('#empName').val('');
                $('#beforeEmp').val('');
                $('#txtEmpCd').attr('disabled', 'disabled');
                $('#btnSearchEmpCd').attr('disabled', 'disabled');
            }
            $('.text-danger').text('');
        });

        // 明細表示
        $(document).on('click', '.view', function() {
            var url = $(this).data('url');
            $('#searchForm').attr('action', url);
            $('#searchForm').submit();
        });

        // 更新
        var disableFlg = false;
        $(document).on('click', '.update', function() {
            if (disableFlg || !window.confirm("<?php echo e(getArrValue($error_messages, 1005)); ?>")) {
                return false;
            }
            disableFlg = true;
            var calendarData = [];
            $('.calendar_left').each(function(i,element) {
                calendarData[i] = {
                    'caldDate': $(element).find('.caldDate').val(),
                    'workPtnCd': $(element).find('.workPtnCd').val(),
                };
            })
            $('.calendar_right').each(function(i,element) {
                calendarData[i + 15] = {
                    'caldDate': $(element).find('.caldDate').val(),
                    'workPtnCd': $(element).find('.workPtnCd').val(),
                };
            })
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:$(this).data('url'),
                type:'POST',
                data:{
                    'caldYM':$("#yearMonth").val(),
                    'searchCondition':$('.searchCondition:checked').val(),
                    'closingDateCd':$('#closingDateCd').val(),
                    'txtDeptCd':$('#txtDeptCd').val(),
                    'txtEmpCd':$('#txtEmpCd').val(),
                    'calendarData':calendarData,
                    'endShiftptnCd':$('#endShiftptnCd').val(),
                    'endDayNo':$('#endDayNo').val(),
                }
            })
            .done((data, textStatus, jqXHR) => {
                location.href='<?php echo e(url('shift/MonthShiftEmpEditor')); ?>';
            })
            .fail ((jqXHR, textStatus, errorThrown) => {
                $.each(jqXHR.responseJSON.errors, function(i, value) {
                    if (!i.startsWith('calendarData.')) {
                        location.href='<?php echo e(url('shift/MonthShiftEmpEditor')); ?>';
                    }
                    $('#' + i.replaceAll('.', '')).text(value[0]);
                });
                disableFlg = false;
                $('#btnUpdate').focus();
            });

            return false;
        });

        // 値選択後、エラー文言削除
        $('.workPtnCd').change(function() {
            if ($(this).val() && $(this).parent().find('span').text()) {
                $(this).parent().find('span').text("");
            }
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

        // カレンダー機能の設定
        $('.yearMonth').datepicker({
            format: 'yyyy年mm月',
            autoclose: true,
            language: 'ja',
            minViewMode: 1,
            startDate: '<?php echo e($def_cald_year - 1); ?>年01月',
            endDate: '<?php echo e($def_cald_year + 1); ?>年12月'
        });

        // 入力可能文字：半角英文字・数字のみ
        onlyHalfWord = n => n.replace(/[０-９Ａ-Ｚａ-ｚ]/g, s => String.fromCharCode(s.charCodeAt(0) - 65248))
                            .replace(/[^0-9a-zA-Z]/g, '');

        // パターンダイアログ表示
        $('.shiftPtn').click(function(element) {
            // パターン選択　子ウィンドウ表示
            $(element).closest('td').append("<input type='hidden' class='clickedTableRecord'>");
            var paramObject = {};
            paramObject['startDate'] = $('#startDate').val();
            paramObject['endDate'] = $('#endDate').val();
            var searchParam = new URLSearchParams(paramObject).toString();
            var param = '?' + searchParam;
            var url = '/shift/ShiftPtnSearch' + param;
            popupPtn = window.open(url, 'シフトパターン選択', 'height=635,width=500,left=400,top=90,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');
            window.focus();
            popupPtn.focus();
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('menu.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\06_SVN\resources\views/shift/MonthShiftEmpEditor.blade.php ENDPATH**/ ?>