<!-- カレンダーパターン情報入力   -->


<?php $__env->startSection('title','カレンダーパターン情報入力 '); ?>

<?php $__env->startSection('content'); ?>
<div id="contents-stage">
    <form action="" method="get" id="form">
        <?php echo csrf_field(); ?>
        <table class="BaseContainerStyle1">
            <tbody>
                <tr>
                    <td>
                        <div id="UpdatePanel1">

                            <p class="FunctionMenu1">
                                <a id="hlAddCalendarPtn" href="<?php echo e(route('MT02.storeIndex')); ?>">新規カレンダーパターン登録</a>
                            </p>
                            <div class="line"></div>
                            <div class="GridViewStyle1">
                                <table style="border-collapse: separate;">
                                    <tbody>
                                        <tr>
                                            <th>
                                                カレンダーパターン
                                            </th>
                                            <th>
                                                カレンダーパターン
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <?php if(isset($calendar_ptns)): ?>
                            <div class="GridViewStyle1">
                                <div>
                                    <table class="GridViewSpace" id="gvEmp" border="1" cellspacing="0">
                                        <tbody>
                                            <?php for($i = 0; $i < count($calendar_ptns) && $i < 20; $i++): ?>
                                            <tr>
                                                <td class="col-sm-4">
                                                    <a href="<?php echo e(url('master/MT02CalendarPtnEditor/'. $calendar_ptns[$i]->CALENDAR_CD )); ?>">
                                                        <?php echo e($calendar_ptns[$i]->CALENDAR_CD); ?> : <?php echo e($calendar_ptns[$i]->CALENDAR_NAME); ?>

                                                    </a>
                                                </td>
                                                <td class="col-sm-4">
                                                    <?php if($calendar_ptns[$i + 20] != null ): ?>
                                                    <a href="<?php echo e(url('master/MT02CalendarPtnEditor/'. $calendar_ptns[$i + 20]->CALENDAR_CD )); ?>">
                                                        <?php echo e($calendar_ptns[$i + 20]->CALENDAR_CD); ?> : <?php echo e($calendar_ptns[$i + 20]->CALENDAR_NAME); ?>

                                                    </a>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <?php endfor; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php if(isset($calendar_ptns)): ?>
                            <div class="line"></div>
                            <div class="d-flex justify-content-center mx-auto" id="pegination">
                                <?php echo e($calendar_ptns->links()); ?>

                            </div>
                            <?php endif; ?>
                        </div>

                    </td>
                </tr>

            </tbody>
        </table>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('menu.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\06_SVN\resources\views/master/MT02CalendarPtnReference.blade.php ENDPATH**/ ?>