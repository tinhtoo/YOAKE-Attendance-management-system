<!-- 勤務体系情報照会 -->


<?php $__env->startSection('title','勤務体系情報照会'); ?>

<?php $__env->startSection('content'); ?>
<div id="contents-stage">
    <table class="BaseContainerStyle1">
        <tbody>
            <tr>
                <td>
                    <div id="ctl00_cphContentsArea_UpdatePanel1">

                        <p class="FunctionMenu1"><a id="ctl00_cphContentsArea_hlAddEmp" href="MT05WorkPtnEditorAddNew">新規勤務体系登録</a></p>

                        <div class="line"></div>

                        <div class="GridViewStyle1">
                            <div>
                                <table class="GridViewSpace" id="ctl00_cphContentsArea_gvWorkPtn" style="border-collapse: collapse;" border="1" rules="all" cellspacing="0">
                                    <tbody>

                                        <tr class="GridViewHeaderTitle1 Nowrap">
                                            <th scope="col">
                                                勤務体系
                                            </th>
                                            <th scope="col">
                                                勤務体系
                                            </th>
                                        </tr>

                                        <?php for($i = 0; $i < count($allWorkPtn) && $i < 20; $i++): ?>
                                            <tr style="background-color: white;">
                                                <td class="col-sm-4">
                                                        <a href="<?php echo e(url('master/MT05WorkPtnEditor/'. $allWorkPtn[$i]->WORKPTN_CD )); ?>">
                                                            <?php echo e($allWorkPtn[$i]->WORKPTN_CD); ?> : <?php echo e($allWorkPtn[$i]->WORKPTN_NAME); ?>

                                                        </a>
                                                </td>
                                                <td class="col-sm-4">
                                                    <?php if($allWorkPtn[$i + 20] != null ): ?>
                                                    <a href="<?php echo e(url('master/MT05WorkPtnEditor/'. $allWorkPtn[$i + 20]->WORKPTN_CD )); ?>">
                                                        <?php echo e($allWorkPtn[$i + 20]->WORKPTN_CD); ?> : <?php echo e($allWorkPtn[$i + 20]->WORKPTN_NAME); ?>

                                                    </a>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <?php endfor; ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="line"></div>
                        <div class="d-flex justify-content-center" id="pegination">
                                <?php echo e($allWorkPtn->links()); ?>

                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('menu.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\06_SVN\resources\views/master/MT05WorkPtnReference.blade.php ENDPATH**/ ?>