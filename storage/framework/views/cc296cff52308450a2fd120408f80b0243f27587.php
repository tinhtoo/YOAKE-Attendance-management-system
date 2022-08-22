<!-- カレンダー情報入力画面 -->

<?php $__env->startSection('title','カレンダー情報入力'); ?>
<?php $__env->startSection('content'); ?>
    <div id="contents-stage">
        <table class="BaseContainerStyle2">
            <tbody>
                <tr>
                    <td>
                        <div id="ctl00_cphContentsArea_UpdatePanel1">
                            <form action="" method="post" id="searchForm">
                                <?php echo csrf_field(); ?>
                                <table class="InputFieldStyle1">
                                    <tbody>
                                        <tr>
                                            <th>カレンダー</th>
                                            <td>
                                                <select name="filter[calendarCd]" tabindex="1"
                                                    id="calendarCd" style="width: 280px;" autofocus
                                                    <?php if(isset($search_results)): ?> disabled="disabled" <?php endif; ?>>
                                                    <?php $__currentLoopData = $calendar_ptns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $calendar_ptn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($calendar_ptn->CALENDAR_CD); ?>"
                                                        <?php echo e($calendar_ptn->CALENDAR_CD == (old('calendarCd', isset($search_data) ? $search_data['calendarCd'] : '' )) ? 'selected' : ''); ?>>
                                                        <?php echo e($calendar_ptn->CALENDAR_NAME); ?>

                                                    </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>対象月度</th>
                                            <td>
                                                <input type="text" class="yearMonth" name="filter[caldYearMonth]" autocomplete="off" onfocus="this.select();"
                                                    tabindex="2" style="width: 100px;" <?php if(isset($search_results)): ?> disabled="disabled" <?php endif; ?>
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
                                            <th>締日</th>
                                            <td>
                                                <select name="filter[closingDateCd]" tabindex="4"
                                                    id="closingDateCd" style="width: 150px;"
                                                    <?php if(isset($search_results)): ?> disabled="disabled" <?php endif; ?>>
                                                    <?php $__currentLoopData = $closing_dates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $closing_date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($closing_date->CLOSING_DATE_CD); ?>"
                                                        <?php echo e($closing_date->CLOSING_DATE_CD == (old('closingDateCd', isset($search_data) ? $search_data['closingDateCd'] : null ) ?? $def_closing_date_cd) ? 'selected' : ''); ?>>
                                                        <?php echo e($closing_date->CLOSING_DATE_NAME); ?>

                                                    </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>

                            <div class="line"></div>

                            <p>
                                <input type="button" value="表示" tabindex="5"
                                    id="btnView" name="btnView" class="ButtonStyle1 view"
                                    data-url="<?php echo e(url('mng_oprt/MT03CalendarEditor')); ?>"
                                    <?php if(isset($search_results)): ?> disabled="disabled" <?php endif; ?>>
                                <input type="button" value="更新" tabindex="6"
                                    id="btnUpdate" name="btnUpdate" class="ButtonStyle1 update"
                                    data-url="<?php echo e(url('mng_oprt/MT03CalendarUpdate')); ?>"
                                    <?php if(!isset($search_results)): ?> disabled="disabled" <?php endif; ?>>
                                <input type="button" value="キャンセル" tabindex="7"
                                    id="btnCancel" name="btnCancel" class="ButtonStyle1"
                                    onclick="location.href='<?php echo e(url('mng_oprt/MT03CalendarEditor')); ?>'">
                                <input type="button" value="削除" tabindex="8"
                                    id="btnDelete" name="btnDelete" class="ButtonStyle1 delete"
                                    data-url="<?php echo e(url('mng_oprt/MT03CalendarDelete')); ?>"
                                    <?php if(!isset($search_results)): ?> disabled="disabled" <?php endif; ?>>
                            </p>

                            <div class="GridViewStyle1 GridViewPanelStyle2">
                                <?php if(isset($search_results)): ?>
                                <div class="flow">
                                    <div>
                                        <table class="GridViewRowCenter GridViewBorder" id="ctl00_cphContentsArea_gvCalendar1" style="border-collapse: collapse;" border="1" rules="all" cellspacing="0">
                                            <tbody>
                                                <tr class="GridViewHeaderTitle1"><th scope="col">日付</th><th scope="col">曜日</th><th scope="col">勤務体系</th></tr>
                                                <?php for($i = 0; $i < 15; $i++): ?>
                                                <tr class="calendar_left">
                                                    <td align="center" style="width: 80px;">
                                                        <span <?php echo e($search_results[$i]->CALD_DATE->format('w') == '0'
                                                            || $search_results[$i]->CALD_DATE->format('w') == '6'
                                                            || $holidays->contains($search_results[$i]->CALD_DATE->format('md')) ? 'class=text-danger' : ''); ?>

                                                            style="width: 80px; display: inline-block;">
                                                            <?php echo e($search_results[$i]->CALD_DATE->format('Y/m/d')); ?>

                                                        </span>
                                                        <input type="hidden" class="calDate" name="calendar[<?php echo e($i); ?>][CALD_DATE]"
                                                                value="<?php echo e($search_results[$i]->CALD_DATE->format('Y/m/d')); ?>"/>
                                                    </td>
                                                    <td align="center" style="width: 30px;">
                                                        <span <?php echo e($search_results[$i]->CALD_DATE->format('w') == '0'
                                                            || $search_results[$i]->CALD_DATE->format('w') == '6'
                                                            || $holidays->contains($search_results[$i]->CALD_DATE->format('md')) ? 'class=text-danger' : ''); ?>

                                                            style="width: 30px; display: inline-block;">
                                                            <?php echo e(config('consts.weeks')[$search_results[$i]->CALD_DATE->format('w')]); ?>

                                                        </span>
                                                    </td>
                                                    <td class="GridViewRowLeft" style="width: 280px;">
                                                        <select name="calendar[<?php echo e($i); ?>][WORKPTN_CD]" id="txtWorkPtnCd<?php echo e($i); ?>"
                                                            class="workPtnCd coloredSelect" style="width: 276px;" tabindex="9">
                                                            <option style=color:black; value=""></option>
                                                            <?php $__currentLoopData = $workptn_names; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workptn_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option
                                                                value="<?php echo e($workptn_name->WORKPTN_CD); ?>"
                                                                <?php echo e($workptn_name->WORK_CLS_CD == '00' ? 'class=text-danger' : 'style=color:black;'); ?>

                                                                <?php echo e($workptn_name->WORKPTN_CD == $search_results[$i]->WORKPTN_CD ? "selected" : ""); ?>

                                                            >
                                                                <?php echo e($workptn_name->WORKPTN_NAME); ?>

                                                            </option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                        <br>
                                                        <span class="text-danger" id="calendarData<?php echo e($i); ?>workPtnCd"></span>
                                                    </td>
                                                </tr>
                                                <?php endfor; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="flow">
                                    <div>
                                        <table class="GridViewRowCenter GridViewBorder" id="ctl00_cphContentsArea_gvCalendar2" style="border-collapse: collapse;" border="1" rules="all" cellspacing="0">
                                            <tbody>
                                                <tr class="GridViewHeaderTitle1"><th scope="col">日付</th><th scope="col">曜日</th><th scope="col">勤務体系</th></tr>
                                                <?php for($i = 15; $i < count($search_results); $i++): ?>
                                                <tr class="calendar_right">
                                                    <td align="center" style="width: 80px;">
                                                        <span <?php echo e($search_results[$i]->CALD_DATE->format('w') == '0'
                                                            || $search_results[$i]->CALD_DATE->format('w') == '6'
                                                            || $holidays->contains($search_results[$i]->CALD_DATE->format('md')) ? 'class=text-danger' : ''); ?>

                                                            style="width: 80px; display: inline-block;">
                                                            <?php echo e($search_results[$i]->CALD_DATE->format('Y/m/d')); ?>

                                                        </span>
                                                        <input type="hidden" class="calDate" name="calendar[<?php echo e($i); ?>][CALD_DATE]"
                                                                value="<?php echo e($search_results[$i]->CALD_DATE->format('Y/m/d')); ?>"/>
                                                    </td>
                                                    <td align="center" style="width: 30px;">
                                                        <span <?php echo e($search_results[$i]->CALD_DATE->format('w') == '0'
                                                            || $search_results[$i]->CALD_DATE->format('w') == '6'
                                                            || $holidays->contains($search_results[$i]->CALD_DATE->format('md')) ? 'class=text-danger' : ''); ?>

                                                            style="width: 30px; display: inline-block;">
                                                            <?php echo e(config('consts.weeks')[$search_results[$i]->CALD_DATE->format('w')]); ?>

                                                        </span>
                                                    </td>
                                                    <td class="GridViewRowLeft" style="width: 280px;">
                                                        <select name="calendar[<?php echo e($i); ?>][WORKPTN_CD]" id="txtWorkPtnCd<?php echo e($i); ?>"
                                                            class="workPtnCd coloredSelect" style="width: 276px;" tabindex="10">
                                                            <option style=color:black; value=""></option>
                                                            <?php $__currentLoopData = $workptn_names; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workptn_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option
                                                                value="<?php echo e($workptn_name->WORKPTN_CD); ?>"
                                                                <?php echo e($workptn_name->WORK_CLS_CD == '00' ? 'class=text-danger' : 'style=color:black;'); ?>

                                                                <?php echo e($workptn_name->WORKPTN_CD == $search_results[$i]->WORKPTN_CD ? "selected" : ""); ?>

                                                            >
                                                                <?php echo e($workptn_name->WORKPTN_NAME); ?>

                                                            </option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                        <br>
                                                        <span class="text-danger" id="calendarData<?php echo e($i); ?>workPtnCd"></span>
                                                    </td>
                                                </tr>
                                            <?php endfor; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="clearBoth"></div>
                                <form action="" method="post" id="deleteForm">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="calendarCd" id="calendarCd" value="<?php echo e($search_data['calendarCd']); ?>"/>
                                    <input type="hidden" name="caldYear" id="caldYear" value="<?php echo e(substr($search_data['caldYearMonth'], 0, 4)); ?>"/>
                                    <input type="hidden" name="caldMonth" id="caldMonth" value="<?php echo e(substr($search_data['caldYearMonth'], 7, 2)); ?>"/>
                                    <input type="hidden" name="closingDateCd" id="closingDateCd" value="<?php echo e($search_data['closingDateCd']); ?>"/>
                                </form>
                                <script type="text/javascript">
                                    document.getElementById('txtWorkPtnCd0').focus()
                                </script>
                                <?php endif; ?>
                            </div>


                            <div class="line"></div>
                            <p class="ButtonField2">
                                <input type="button" name="btnCancel" tabindex="11"
                                    id="btnCancel" onclick="location.href='<?php echo e(url('mng_oprt/MT03CalendarEditor')); ?>'"
                                    value="キャンセル">
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
                    'calDate': $(element).find('.calDate').val(),
                    'workPtnCd': $(element).find('.workPtnCd').val(),
                };
            })
            $('.calendar_right').each(function(i,element) {
                calendarData[i + 15] = {
                    'calDate': $(element).find('.calDate').val(),
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
                    'calendarCd':$('#calendarCd').val(),
                    'caldYear':$('#caldYear').val(),
                    'caldMonth':$('#caldMonth').val(),
                    'closingDateCd':$('#closingDateCd').val(),
                    'calendarData':calendarData
                }
            })
            .done((data, textStatus, jqXHR) => {
                location.href='<?php echo e(url('mng_oprt/MT03CalendarEditor')); ?>';
            })
            .fail ((jqXHR, textStatus, errorThrown) => {
                $.each(jqXHR.responseJSON.errors, function(i, value) {
                    $('#' + i.replaceAll('.', '')).text(value[0]);
                });
                disableFlg = false;
                $('#btnUpdate').focus();
            });

            return false;
        });

        // 削除処理
        $(document).on('click', '.delete', function() {
            if (disableFlg || window.confirm("<?php echo e(getArrValue($error_messages, 1004)); ?>")) {
                var url = $(this).data('url');
                $('#deleteForm').attr('action', url);
                $('#deleteForm').submit();
            }
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
        $(function() {
            $('.yearMonth').datepicker({
                format: 'yyyy年mm月',
                autoclose: true,
                language: 'ja',
                minViewMode: 1,
                startDate: '<?php echo e($def_cald_year - 1); ?>年01月',
                endDate: '<?php echo e($def_cald_year + 1); ?>年12月'
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('menu.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\06_SVN\resources\views/mng_oprt/MT03CalendarEditor.blade.php ENDPATH**/ ?>