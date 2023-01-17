<!-- 月次確定状況照会画面 -->

<?php $__env->startSection('title', '月次確定状況照会'); ?>
<?php $__env->startSection('content'); ?>
    <div id="contents-stage">
        <table class="BaseContainerStyle1">
            <tbody>
                <tr>
                    <td>
                        <div id="ctl00_cphContentsArea_upWorkTimeFix">
                            <form action="" method="post" id="form">
                                <?php echo csrf_field(); ?>
                                <table class="InputFieldStyle1">
                                    <tbody>
                                        <tr>
                                            <th>対象月度</th>
                                            <td>
                                                <input type="text" id="yearMonth" class="yearMonth" name="yearMonth" autocomplete="off" onfocus="this.select();"
                                                    tabindex="1" style="width: 100px;"
                                                    value="<?php echo e(((isset($search_data) ? $search_data['yearMonth'] : null ) ?? $view_data['def_year'].'年'.sprintf('%02d', $view_data['def_month']).'月')); ?>" />
                                                <span class="text-danger error" id="dateError">
                                                <?php $__errorArgs = ['yearMonth'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <?php echo e(getArrValue($error_messages, $message)); ?>

                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>締日</th>
                                            <td>
                                                <select name="closingDateCd" tabindex="3"
                                                    id="closingDateCd" style="width: 150px;">
                                                    <?php $__currentLoopData = $view_data['closing_dates']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $closing_date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($closing_date->CLOSING_DATE_CD); ?>"
                                                        <?php echo e($closing_date->CLOSING_DATE_CD == (( isset($search_data) ? $search_data['closingDateCd'] : null ) ?? $view_data['def_closing_date_cd']) ? 'selected' : ''); ?>>
                                                        <?php echo e($closing_date->CLOSING_DATE_NAME); ?>

                                                    </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <label for="noFix" style="position:relative;padding-left:1.5em;line-height:1.4em;">
                                    <input name="noFix" tabindex="4" id="noFix" type="checkbox" <?php echo e(isset($search_data) && !key_exists('noFix', $search_data) ? '' : 'checked'); ?>

                                        style = "position:absolute;top:2px;bottom:0;left:2px;margin:auto;">
                                    未確定のみ表示
                                </label>

                                <div class="line"></div>
                                <p class="ButtonField2">
                                    <input type="button" value="表示" tabindex="5"
                                        id="btnView" name="btnView" class="ButtonStyle1 view"
                                        data-url="<?php echo e(url('mng_oprt/WorkTimeFixReference')); ?>">
                                    <input type="button" value="キャンセル" tabindex="6"
                                        id="btnCancel" name="btnCancel" class="ButtonStyle1"
                                        onclick="location.href='<?php echo e(url('mng_oprt/WorkTimeFixReference')); ?>'">
                                </p>
                            </form>

                            <div class="GridViewStyle1 mg10" id="gridview-container">
                                <div class="GridViewPanelStyle5" id="ctl00_cphContentsArea_pnlWorkTimeFixReference">
                                    <div>
                                        <table tabindex="7" class="GridViewBorder" id="ctl00_cphContentsArea_gvWorkTimeFixReference" style="border-collapse: collapse;" border="1" rules="all" cellspacing="0">
                                            <tbody>
                                                <?php if(isset($results)): ?>
                                                    <?php if($results->isEmpty()): ?>
                                                        <tr style="width:70px;">
                                                            <td><span><?php echo e(getArrValue($error_messages, '4029')); ?></span></td>
                                                        </tr>
                                                    <?php else: ?>
                                                        <tr class="sticky-head">
                                                            <th class="fixed01" scope="col" style="width: 60px; background: #4682B4; left: 0px;">
                                                                部門コード
                                                            </th>
                                                            <th class="fixed01" scope="col" style="width: 140px; background: #4682B4; left: 0px;">
                                                                部門名
                                                            </th>
                                                            <th class="fixed01" scope="col" style="width: 60px; background: #4682B4; left: 0px;">
                                                                社員番号
                                                            </th>
                                                            <th class="fixed01" scope="col" style="width: 140px; background: #4682B4; left: 0px;">
                                                                社員名
                                                            </th>
                                                            <th class="fixed01" scope="col" style="width: 40px; background: #4682B4; left: 0px;">
                                                                確定
                                                            </th>
                                                        </tr>
                                                        <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td class="fixed01" style="left: 0px;">
                                                                <?php echo e($result->DEPT_CD); ?>

                                                            </td>
                                                            <td class="fixed01" style="left: 0px;">
                                                                <?php echo e($result->DEPT_NAME); ?>

                                                            </td>
                                                            <td class="fixed01" style="left: 0px;">
                                                                <?php echo e($result->EMP_CD); ?>

                                                            </td>
                                                            <td class="fixed01" style="left: 0px;">
                                                                <?php echo e($result->EMP_NAME); ?>

                                                            </td>
                                                            <td class="fixed01" style="left: 0px;">
                                                                <?php echo e($result->FIXED); ?>

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

                            <div class="line"></div>
                            <p class="ButtonField2">
                                <input type="button" value="キャンセル" tabindex="8"
                                    id="btnCancel" name="btnCancel" class="ButtonStyle1"
                                    onclick="location.href='<?php echo e(url('mng_oprt/WorkTimeFixReference')); ?>'">
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
            $('#form').attr('action', url);
            $('#form').submit();
        });

        // カレンダー機能の設定
        $('#yearMonth').datepicker({
            format: 'yyyy年mm月',
            autoclose: true,
            language: 'ja',
            minViewMode: 1,
            startDate: '<?php echo e($view_data['def_year'] - 1); ?>年01月',
            endDate: '<?php echo e($view_data['def_year']); ?>年12月'
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('menu.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\06_SVN\resources\views/mng_oprt/WorkTimeFixReference.blade.php ENDPATH**/ ?>