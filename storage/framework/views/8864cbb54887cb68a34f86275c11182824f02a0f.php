<!-- 所属情報入力 -->


<?php $__env->startSection('title', '所属情報入力'); ?>

<?php $__env->startSection('content'); ?>
    <div id="contents-stage">
        <table class="BaseContainerStyle1">
            <tbody>
                <tr>
                    <td>
                        <div id="UpdatePanel1">
                            <p class="FunctionMenu1">
                                <a id="AddSplyer" href="<?php echo e(route('MT23.registerIndex')); ?>">新規所属登録</a>
                            </p>
                            <div class="line"></div>
                            <div class="GridViewStyle1">
                                <table style="border-collapse: separate;">
                                    <tbody>
                                        <tr>
                                            <th>
                                                所属
                                            </th>
                                            <th>
                                                所属
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="GridViewStyle1">
                                <div>
                                    <?php echo e(csrf_field()); ?>

                                    <?php if(session('err_msg')): ?>
                                        )
                                        <p class="text-danger">
                                            <?php echo e(session('err_msg')); ?>

                                        </p>
                                    <?php endif; ?>
                                    <table tabindex="7" class="GridViewSpace" id="gvEmp" style="border-collapse: collapse;"
                                        border="1" rules="all" cellspacing="0">
                                        <tbody>
                                            <?php if(!empty($haken_company)): ?>
                                                <?php for($i = 0; $i < count($haken_company) && $i < 20; $i++): ?>
                                                <tr>
                                                    <td class="col-sm-4">
                                                        <a href="<?php echo e(url('master/MT23CompanyEditor/'. $haken_company[$i]->COMPANY_CD )); ?>">
                                                            <?php echo e($haken_company[$i]->COMPANY_CD); ?> : <?php echo e($haken_company[$i]->COMPANY_NAME); ?>

                                                        </a>
                                                    </td>
                                                    <td class="col-sm-4">
                                                        <?php if($haken_company[$i + 20] != null ): ?>
                                                        <a href="<?php echo e(url('master/MT23CompanyEditor/'. $haken_company[$i + 20]->COMPANY_CD )); ?>">
                                                            <?php echo e($haken_company[$i + 20]->COMPANY_CD); ?> : <?php echo e($haken_company[$i + 20]->COMPANY_NAME); ?>

                                                        </a>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <?php endfor; ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="line"></div>
                            <div class="d-flex justify-content-center">
                                <?php echo e($haken_company->appends(request()->input())->render('pagination::bootstrap-4')); ?>

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
        $(document).on('click', '.submit-form', function() {
            var url = $(this).data('url');
            $('#form').attr('action', url);
            $('#form').submit();
        });

        //F5キーによるリロードを禁止
        document.addEventListener("keydown", function(e) {
            if ((e.which || e.keyCode) == 116) {
                e.preventDefault();
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('menu.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\06_SVN\resources\views/master/MT23CompanyReference.blade.php ENDPATH**/ ?>