<!-- 社員情報照会 -->



<?php $__env->startSection('title', '社員情報照会'); ?>

<?php $__env->startSection('content'); ?>
<div id="contents-stage">
    <table class="BaseContainerStyle1">
        <tbody>
            <tr>
                <td>
                    <div id="UpdatePanel1">
                        <form method="GET" action="<?php echo e(route('MT10EmpRef.search')); ?>">
                            <?php echo e(csrf_field()); ?>

                            <table class="InputFieldStyle1">
                                <tbody>
                                    <tr>
                                        <th>社員番号</th>
                                        <td>
                                            <input name="filter[txtEmpCd]" style="width: 80px;"
                                                id="txtEmpCd" autofocus onfocus="this.select();"
                                                type="search" maxlength="10"
                                                oninput="value = onlyHalfWord(value)"
                                                value="<?php echo e(old('txtEmpCd', isset($search_data) && key_exists('txtEmpCd', $search_data) ? $search_data['txtEmpCd'] : '')); ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>社員カナ名</th>
                                        <td>
                                            <input name="filter[txtEmpKana]" style="width: 160px;"
                                            id="txtEmpKana" type="search" maxlength="20" onfocus="this.select();"
                                            value="<?php echo e(old('txtEmpKana', isset($search_data) && key_exists('txtEmpKana', $search_data) ? $search_data['txtEmpKana'] : '')); ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>部門</th>
                                        <td>
                                            <input name="filter[txtDeptCd]" id="txtDeptCd" style="width: 50px;" class="searchDeptCd txtDeptCd"
                                                type="text" maxlength="6" style="ime-inactive;" onfocus="this.select();"
                                                value="<?php echo e(old('filter[txtDeptCd]', isset($search_data) && key_exists('txtDeptCd', $search_data) ? $search_data['txtDeptCd']:'')); ?>"
                                                oninput="value = onlyHalfWord(value)"
                                            >
                                            <input name="btnSearchDeptCd" class="SearchButton" id="btnSearchDeptCd" type="button" value="?" onclick="SearchDept(this);return false">
                                            <input name="deptName" type="text" class="txtDeptName" style="width: 200px; height: 23px; display: inline-block;"
                                                id="deptName" value="<?php echo e(old('deptName', !empty($request_data['deptName']) ? $request_data['deptName']:'')); ?>"
                                                readonly="readonly" data-dispclscd=01 data-isdeptauth=true
                                            >
                                            <span class="text-danger" id="deptNameError"></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div>
                                <p class="FunctionMenu1">
                                    <a class="left" id="hlAddEmp" href="<?php echo e(url('/master/MT10EmpEditor')); ?>">新規社員登録</a>
                                    <input class="SearchButton" type="submit" value="検索" onclick="return (!$('#deptNameError').text())">
                                    <input class="SearchButton" name="CancelButton" type="submit" value="キャンセル" onClick="Cancel()">
                                </p>
                            </div>
                            <div class="clearBoth"></div>
                            <div class="line"></div>
                            <ul class="HolizonListMenu1" style="text-align: left">
                                <li><input type="submit" name="button_ALL" value="全件" onclick="return (!$('#deptNameError').text())"></li>
                                <li><input type="submit" name="button_A" value="あ" onclick="return (!$('#deptNameError').text())"></li>
                                <li><input type="submit" name="button_KA" value="か" onclick="return (!$('#deptNameError').text())"></li>
                                <li><input type="submit" name="button_SA" value="さ" onclick="return (!$('#deptNameError').text())"></li>
                                <li><input type="submit" name="button_TA" value="た" onclick="return (!$('#deptNameError').text())"></li>
                                <li><input type="submit" name="button_NA" value="な" onclick="return (!$('#deptNameError').text())"></li>
                                <li><input type="submit" name="button_HA" value="は" onclick="return (!$('#deptNameError').text())"></li>
                                <li><input type="submit" name="button_MA" value="ま" onclick="return (!$('#deptNameError').text())"></li>
                                <li><input type="submit" name="button_YA" value="や" onclick="return (!$('#deptNameError').text())"></li>
                                <li><input type="submit" name="button_RA" value="ら" onclick="return (!$('#deptNameError').text())"></li>
                                <li><input type="submit" name="button_WA" value="わ" onclick="return (!$('#deptNameError').text())"></li>
                                <li><input type="submit" name="button_EN" value="英字" onclick="return (!$('#deptNameError').text())"></li>
                            </ul>
                            <div class="line"></div>
                            <div class="GridViewStyle1">
                                <table style="border-collapse: separate;">
                                    <tbody>
                                        <tr>
                                            <th>
                                                社員
                                            </th>
                                            <th>
                                                社員
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="GridViewStyle1">
                                <div>
                                    <table tabindex="7" class="GridViewSpace" id="gvEmp"
                                        style="border-collapse: collapse;" border="1" rules="all" cellspacing="0">
                                        <tbody>
                                            <?php if(count($search_results) < 1): ?>
                                                <tr style="width:70px; text-align:center;">
                                                    <td><span><?php echo e(getArrValue($error_messages,'2000')); ?></span></td>
                                                </tr>
                                            <?php elseif(!empty($search_results)): ?>
                                            <?php for($i = 0; $i < count($search_results) && $i < 20; $i++): ?>
                                            <tr>
                                                <td class="col-sm-4">
                                                    <a href="<?php echo e(url('master/MT10EmpEditor/'. $search_results[$i]->EMP_CD )); ?>">
                                                        <?php echo e($search_results[$i]->EMP_CD); ?> : <?php echo e($search_results[$i]->EMP_NAME); ?>

                                                    </a>
                                                </td>
                                                <td class="col-sm-4">
                                                    <?php if($search_results[$i + 20] != null ): ?>
                                                    <a href="<?php echo e(url('master/MT10EmpEditor/'. $search_results[$i + 20]->EMP_CD )); ?>">
                                                        <?php echo e($search_results[$i + 20]->EMP_CD); ?> : <?php echo e($search_results[$i + 20]->EMP_NAME); ?>

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
                                <?php echo e($search_results->appends(request()->query())->links()); ?>

                            </div>
                            <div class="line"></div>
                            <div class="mb-2 mt-4 text-center">
                                <p class="ButtonField1">
                                    <input class="CancelButton" name="CancelButton" type="submit" value="キャンセル" onClick="Cancel()">
                                </p>
                            </div>
                        </form>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
    // キャンセルボタン
    function Cancel(){
        $("#txtEmpCd, #txtEmpKana, #txtDeptCd, #deptName").val('');
    }

    $(function() {
        // 入力可能文字：半角英数
        onlyHalfWord = n => n.replace(/[０-９Ａ-Ｚａ-ｚ]/g, s => String.fromCharCode(s.charCodeAt(0) - 65248))
                            .replace(/[^0-9a-zA-Z]/g, '');
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('menu.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\06_SVN\resources\views/master/MT10EmpReference.blade.php ENDPATH**/ ?>