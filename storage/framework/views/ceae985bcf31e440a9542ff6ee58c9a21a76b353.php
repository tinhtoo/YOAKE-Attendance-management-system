<!-- 部門情報検索 -->

<?php $__env->startSection('title', '部門情報検索'); ?>
<?php $__env->startSection('content_search'); ?>
    <div id="search-container">
        <form id="DeptModal" runat="server" name="DeptModal">
            <?php echo e(csrf_field()); ?>

            <?php if(key_exists('dispClsCd', $request_data)): ?><input type="hidden" name="dispClsCd" value="<?php echo e($request_data['dispClsCd']); ?>"><?php endif; ?>
            <?php if(key_exists('isDeptAuth', $request_data)): ?><input type="hidden" name="isDeptAuth" value="<?php echo e($request_data['isDeptAuth']); ?>"><?php endif; ?>
            <div id="contents-stage">
                <input name="btnBack" id="btnBack" style="width: 80px; height: 21px;" onclick="window.close();"
                    type="button" value="戻る">

                <div class="GridViewStyle1 mg10" id="search-gridview-container">
                    <div class="GridViewPanelStyle3" id="pnlCalendarPtn">

                        <div>
                            <table class="GridViewPadding" id="gvDept" style="border-collapse: collapse;" border="1"
                                rules="all" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <th scope="col">
                                            選択
                                        </th>
                                        <th scope="col">
                                            部門
                                        </th>
                                    </tr>
                                    <?php if(isset($dept_list)): ?>
                                        <?php $__currentLoopData = $dept_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="bkcolor" backgroundColor="transparent">
                                                <td style="width: 15px;">
                                                    <?php if(!$selectable_dept || in_array($dept->DEPT_CD, $selectable_dept)): ?>
                                                    <input type="radio" name="dept" value="<?php echo e($dept->DEPT_CD); ?>"
                                                        id="<?php echo e($dept->DEPT_NAME); ?>" onclick="Deptfunc();">
                                                    <?php endif; ?>
                                                </td>
                                                <td style="width: 200px; white-space: nowrap;">
                                                    <label for="<?php echo e($dept->DEPT_NAME); ?>"
                                                        style="width: 13%;<?php if(!$selectable_dept || in_array($dept->DEPT_CD, $selectable_dept)): ?>cursor: pointer;<?php endif; ?>">
                                                        <span><?php echo e($dept->DEPT_CD); ?>

                                                    </label>
                                                    <label for="<?php echo e($dept->DEPT_NAME); ?>"
                                                        style="width: 87%;<?php if(!$selectable_dept || in_array($dept->DEPT_CD, $selectable_dept)): ?>cursor: pointer;<?php endif; ?>">
                                                        <span>:&nbsp;
                                                            <?php echo e(str_pad($dept->DEPT_NAME, strlen($dept->DEPT_NAME) + 9 * $dept->LEVEL_NO, '　　　', STR_PAD_LEFT)); ?></span>
                                                    </label>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
    function Deptfunc() {
        if (!window.opener || window.opener.closed) {
            alert("呼び出し元が既に閉じられています。");
            return false;
        }

        var Depts = document.getElementsByName("dept");
        var parentTd;
        var txtDeptCd;
        var txtDeptName;

        var deptCd = $("[name=dept]:checked").val();
        var deptName = $("[name=dept]:checked").attr("id");

        if (window.opener.$(".clickedTableRecord").length) {
            parentTd = window.opener.$(".clickedTableRecord").closest("td");
            txtDeptCd = parentTd.find('.txtDeptCd');
            txtDeptName = parentTd.find('.txtDeptName');
            parentTd.find("#deptNameError").text("");
        } else {
            parentTd = window.opener.$('#txtDeptCd').closest("td");
            txtDeptCd = parentTd.find('#txtDeptCd');
            txtDeptName = parentTd.find('#deptName');
            parentTd.find("#deptNameError").text("");
        }

        if (parentTd.length) {
            txtDeptCd.val(deptCd);
        }

        if (parentTd.length) {
            txtDeptName.val(deptName);
        }
        window.close();
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('common.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\06_SVN\resources\views/search/MT12DeptSearch.blade.php ENDPATH**/ ?>