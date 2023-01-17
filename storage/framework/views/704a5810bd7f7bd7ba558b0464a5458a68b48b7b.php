<!-- シフトパターン情報入力画面 -->

<?php $__env->startSection('title', 'シフトパターン情報入力'); ?>
<?php $__env->startSection('content'); ?>
    <div id="contents-stage">
        <table class="BaseContainerStyle1">
            <tbody>
                <tr>
                    <td>

                        <div id="ctl00_cphContentsArea_UpdatePanel1">

                            <p class="FunctionMenu1">
                                <a id="addShipPtn" style="font-size: 12px;"
                                    href="<?php echo e(url('/shift/MT04ShiftPtnEditorAddNew')); ?>">新規シフトパターン登録</a>
                            </p>

                            <div class="line"></div>

                            <div class="GridViewStyle1">
                                <div>
                                    <table class="GridViewSpace" id="ctl00_cphContentsArea_gvShiftPtn"
                                        style="border-collapse: collapse;" border="1" rules="all" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <th scope="col">
                                                    シフトパターン
                                                </th>
                                                <th scope="col">
                                                    シフトパターン
                                                </th>
                                            </tr>
                                            <?php for($i = 0; $i < count($shiftptn_data) && $i < 20; $i++): ?>
                                            <tr style="background-color: white;">
                                                <td class="col-sm-4">
                                                    <a href="<?php echo e(url('/shift/MT04ShiftPtnEditor/'. $shiftptn_data[$i]->SHIFTPTN_CD )); ?>">
                                                        <?php echo e($shiftptn_data[$i]->SHIFTPTN_CD); ?> : <?php echo e($shiftptn_data[$i]->SHIFTPTN_NAME); ?>

                                                    </a>
                                                </td>
                                                <td class="col-sm-4">
                                                    <?php if($shiftptn_data[$i + 20] != null ): ?>
                                                    <a href="<?php echo e(url('/shift/MT04ShiftPtnEditor/'. $shiftptn_data[$i + 20]->SHIFTPTN_CD )); ?>">
                                                        <?php echo e($shiftptn_data[$i + 20]->SHIFTPTN_CD); ?> : <?php echo e($shiftptn_data[$i + 20]->SHIFTPTN_NAME); ?>

                                                    </a>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <?php endfor; ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center" id="pegination">
                                <?php echo e($shiftptn_data->links()); ?>

                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('menu.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\06_SVN\resources\views/shift/MT04ShiftPtnReference.blade.php ENDPATH**/ ?>