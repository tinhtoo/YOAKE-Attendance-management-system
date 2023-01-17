<!-- 組織変更参照   -->


<?php $__env->startSection('title', '組織変更参照 '); ?>

<?php $__env->startSection('content'); ?>
    <div id="contents-stage">
        <table class="BaseContainerStyle1">
            <tbody>
                <tr>
                    <td>
                        <div id="ctl00_cphContentsArea_UpdatePanel1">

                            <div class="GridViewStyle1">
                                <div>
                                    <table id="ctl00_cphContentsArea_gvDept" style="border-collapse: collapse;" border="1"
                                        rules="all" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <th scope="col">
                                                    部門
                                                </th>
                                            </tr>
                                            <?php $__currentLoopData = $paginateOrg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dept_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <a href="<?php echo e(url('master/MT12OrgEditor/'.$dept_item->DEPT_CD )); ?>">
                                                    <?php echo e($dept_item->DEPT_CD); ?> :
                                                        <?php for($i=0 ; $i< ( $dept_item->LEVEL_NO ); $i++): ?>
                                                        　　　
                                                        <?php endfor; ?>
                                                    <?php echo e($dept_item->DEPT_NAME); ?>

                                                    </a>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="line"></div>
                            <tr class="ButtonField1">
                                <td>
                                    <div class="d-flex justify-content-center" id="pegination">
                                    <?php echo e($paginateOrg->links()); ?>

                                    </div>
                                </td>
                            </tr>

                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('menu.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\06_SVN\resources\views/master/MT12OrgReference.blade.php ENDPATH**/ ?>