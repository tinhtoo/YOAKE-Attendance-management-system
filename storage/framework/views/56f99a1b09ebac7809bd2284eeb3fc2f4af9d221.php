<!-- 部門情報検索  -->


<?php $__env->startSection('title','部門情報検索'); ?>

<?php $__env->startSection('content_search'); ?>
<div id="search-container">
    <form id="DeptModal" runat="server" name="DeptModal">
        <div id="contents-stage">
            <input name="btnBack" id="btnBack" style="width: 80px; height: 21px;" onclick="window.close();" type="button" value="戻る">

            <div class="GridViewStyle1 mg10" id="search-gridview-container">
                <div class="GridViewPanelStyle3" id="pnlCalendarPtn">
                        
                    <div>
                        <table class="GridViewPadding" id="gvDept" style="border-collapse: collapse;" border="1" rules="all" cellspacing="0">
                            <tbody>
                                <tr>
                                    <th scope="col">
                                        選択
                                    </th>
                                    <th scope="col">
                                        部門
                                    </th>
                                </tr>
                                <?php if(isset($dept_search)): ?>
                                <?php $__currentLoopData = $dept_search; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr style="cursor: pointer;" backgroundColor="transparent">
                                    <td style="width: 20px;">
                                        <input type="radio" name="dept" value="<?php echo e($item->DEPT_CD); ?>" id="<?php echo e($item->DEPT_NAME); ?>" onclick="Deptfunc();">
                                    </td>
                                    <td>
                                        <span id=""><?php echo e($item->DEPT_CD); ?> : <?php echo e($item->DEPT_NAME); ?></span>
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
        for (var i = 0; i < Depts.length; i++) {
            if (Depts[i].checked) {
                //console.log("選択された値：", Depts[i].value);
                deptCD = Depts[i].value
                deptName = Depts[i].id
            }
        }

        var MT10sendCD = window.opener.document.getElementById('txtDeptCd'); //値をセットするオブジェクトを取得
        if (MT10sendCD != null) { //値をセットする先が存在する場合は値をセットする
            MT10sendCD.value = deptCD
        }
        var MT10sendName = window.opener.document.getElementById('deptName');
        if (MT10sendName != null) { 
            MT10sendName.value = deptName
        }
        window.close();
    }
    Deptfunc();
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('common.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\06_SVN\resources\views/search/MT12DeptSearch.blade.php ENDPATH**/ ?>