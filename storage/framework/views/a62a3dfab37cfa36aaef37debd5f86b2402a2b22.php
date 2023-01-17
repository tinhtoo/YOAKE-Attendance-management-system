<!-- 部門権限情報照会 -->


<?php $__env->startSection('title', '部門権限情報照会'); ?>

<?php $__env->startSection('content'); ?>
    <div id="contents-stage">
        <table class="BaseContainerStyle1">
            <tbody>
                <tr>
                    <td>
                        <div id="ctl00_cphContentsArea_UpdatePanel1">

                            <p class="FunctionMenu1">
                                <a id="ctl00_cphContentsArea_hlAddDeptAuth" href="MT13DeptAuthEditor?Id=Add">新規部門権限登録</a>
                            </p>

                            <div class="line"></div>
                            <div class="GridViewStyle1">
                                <div>
                                    <table class="GridViewSpace" id="ctl00_cphContentsArea_gvDeptAuth"
                                        style="border-collapse: collapse;" border="1" rules="all" cellspacing="0">
                                        <tbody>

                                            <tr>
                                                <th scope="col">
                                                    部門権限
                                                </th>
                                                <th scope="col">
                                                    部門権限
                                                </th>
                                            </tr>

                                            <?php for($i = 0; $i < count($dept_data) && $i < 20; $i++): ?>
                                            <tr style="background-color: white;">
                                                <td class="col-sm-4">
                                                        <a href="<?php echo e(url('master/MT13DeptAuthEditor/'. $dept_data[$i]->DEPT_AUTH_CD )); ?>">
                                                            <?php echo e($dept_data[$i]->DEPT_AUTH_CD); ?> : <?php echo e($dept_data[$i]->DEPT_AUTH_NAME); ?>

                                                        </a>
                                                </td>
                                                <td class="col-sm-4">
                                                    <?php if($dept_data[$i + 20] != null ): ?>
                                                    <a href="<?php echo e(url('master/MT13DeptAuthEditor/'. $dept_data[$i + 20]->DEPT_AUTH_CD )); ?>">
                                                        <?php echo e($dept_data[$i + 20]->DEPT_AUTH_CD); ?> : <?php echo e($dept_data[$i + 20]->DEPT_AUTH_NAME); ?>

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
                                    <?php echo e($dept_data->links()); ?>

                            </div>

                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('menu.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\06_SVN\resources\views/master/MT13DeptAuthReference.blade.php ENDPATH**/ ?>