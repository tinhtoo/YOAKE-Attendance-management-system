<!-- 最新打刻情報取得処理画面 -->

<?php $__env->startSection('title', '最新打刻情報取得処理'); ?>
<?php $__env->startSection('content'); ?>
    <div id="contents-stage">
        <table class="BaseContainerStyle2">
            <tbody>
                <tr>
                    <td>
                        <table class="style1" style="width: 100%">
                            <tbody>
                                <tr>
                                    <td style="text-align: center">
                                        <br>
                                        <br>
                                        <br>
                                        打刻用端末から最新の打刻データを取得します。<br>
                                        取得ボタンを押してください。<br>
                                        <br>
                                        <br>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: center">
                                        <input class="search" type="submit" style="width: 200px; height: 40px;" value="取得">
                                        <form action="<?php echo e(url('mng_oprt/WorkTimeConvert')); ?>" method="post" id="form">
                                            <?php echo csrf_field(); ?>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: center">
                                        <br>
                                        <br>
                                        <?php if(isset($success) && $success): ?>
                                        <span><?php echo e(getArrValue($error_messages, '1007')); ?></span>
                                        <?php endif; ?>
                                        <br>
                                        <br>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div>

                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            <span>前回取得状況</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="line"></div>

                            <div class="GridViewStyle1" id="gridview-container">
                                <div class="GridViewPanelStyle1" style="width: 1200px;">
                                    <div>

                                        <div>
                                            <table tabindex="2" class="GridViewBorder GridViewPadding GridViewRowCenter"
                                                style="border-collapse: collapse;" border="1" rules="all" cellspacing="0">
                                                <tbody>
                                                    <tr>
                                                        <th scope="col">端末番号</th>
                                                        <th scope="col">設置場所</th>
                                                        <th scope="col">結果</th>
                                                        <th scope="col">取得開始日</th>
                                                        <th scope="col">取得開始時刻</th>
                                                        <th scope="col">取得終了日</th>
                                                        <th scope="col">取得終了時刻</th>
                                                        <th scope="col">エラー内容</th>
                                                    </tr>
                                                    <?php if(isset($result)): ?>
                                                    <?php if($result->isEmpty()): ?>
                                                    <tr>
                                                    </tr>
                                                    <?php else: ?>
                                                    <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td class="GridViewRowLeft" style="width: 70px;">
                                                            <span id="termNo"><?php echo e($record->TERM_NO); ?></span>
                                                        </td>
                                                        <td class="GridViewRowLeft" style="width: 110px;">
                                                            <span id="termName"><?php echo e($record->TERM_NAME); ?></span>
                                                        </td>
                                                        <td style="width: 50px; <?php if($record->GET_FLG != '1'): ?>background-color: red;<?php endif; ?>">
                                                            <span id="getFlg"><?php echo e($record->GET_FLG === '1' ? '○' : '×'); ?></span>
                                                        </td>
                                                        <td class="GridViewRowLeft" style="width: 85px;">
                                                            <span id="strDate"><?php echo e(date('Y/m/d', strtotime($record->STR_DATE))); ?></span>
                                                        </td>
                                                        <td class="GridViewRowLeft" style="width: 90px;">
                                                            <span id="strTime"><?php echo e(date('h:m:s', strtotime($record->STR_DATE))); ?></span>
                                                        </td>
                                                        <td class="GridViewRowLeft" style="width: 85px;">
                                                            <span id="endDate"><?php echo e($record->END_DATE ? date('Y/m/d', strtotime($record->END_DATE)) : '' ); ?></span>
                                                        </td>
                                                        <td class="GridViewRowLeft" style="width: 90px;">
                                                            <span id="endTime"><?php echo e($record->END_DATE ? date('h:m:s', strtotime($record->END_DATE)) : '' ); ?></span>
                                                        </td>
                                                        <td class="GridViewRowLeft" style="width: 355px;">
                                                            <span id="errCont"><?php echo e($record->ERR_CONT); ?></span>
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
                            </div>
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
    // 更新submit-form
    $(document).on('click', '.search', function() {
        $('#form').submit();
    });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('menu.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\06_SVN\resources\views/mng_oprt/WorkTimeConvert.blade.php ENDPATH**/ ?>