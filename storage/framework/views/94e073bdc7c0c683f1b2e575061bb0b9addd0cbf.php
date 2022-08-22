<!-- 社員情報照会 -->



<?php $__env->startSection('title', '社員情報照会'); ?>

<?php $__env->startSection('content'); ?>
    <div id="contents-stage">
        <table class="BaseContainerStyle1">
            <tbody>
                <tr>
                    <td>
                        <div id="UpdatePanel1">


                            <form method="GET" action="<?php echo e(route('LabelSearch')); ?>">
                                <table class="InputFieldStyle1">
                                    <tbody>
                                        <tr>
                                            <th>社員番号</th>
                                            <td>
                                                <input name="cdsearch" style="width: 80px;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>社員カナ名</th>
                                            <td>
                                                <input name="kanasearch" style="width: 160px;" type="text" maxlength="20"
                                                    placeholder="カタカナで入力してください">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>部門</th>
                                            <td>
                                                <input name="deptsearch" style="width: 50px;" type="text" maxlength="6"
                                                    id="deptcd">
                                                <input class="SearchButton" type="button" id="MT12DeptSearch"
                                                    onclick="SetDeptItem();" value="?">
                                                <input class="OutlineLabel" type="text"
                                                    style="width: 200px; height: 17px; display: inline-block;" id="deptname"
                                                    disabled="disabled">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <p class="FunctionMenu1">
                                    <a class="left" id="hlAddEmp" href="MT10EmpEditor?Id=Add">新規社員登録</a>
                                    <input class="SearchButton" type="submit" value="検索">
                                    <input class="CancelButton" type="reset" value="キャンセル">
                                </p>


                                <div class="clearBoth"></div>

                                <div class="line"></div>

                                <div class="mb-2 mt-4 text-center">
                                    <link rel="stylesheet" type="text/css"
                                        href="<?php echo e(asset('assets\css\MT10EmpReference.css')); ?>">
                                    <ul class="HolizonListMenu1" style="text-align: left">
                                        <li><input type="submit" name="button_ALL" value="全件" class="buttonTest"></li>
                                        <li><input type="submit" name="button_A" value="あ" class="buttonTest"></li>
                                        <li><input type="submit" name="button_KA" value="か" class="buttonTest"></li>
                                        <li><input type="submit" name="button_SA" value="さ" class="buttonTest"></li>
                                        <li><input type="submit" name="button_TA" value="た" class="buttonTest"></li>
                                        <li><input type="submit" name="button_NA" value="な" class="buttonTest"></li>
                                        <li><input type="submit" name="button_HA" value="は" class="buttonTest"></li>
                                        <li><input type="submit" name="button_MA" value="ま" class="buttonTest"></li>
                                        <li><input type="submit" name="button_YA" value="や" class="buttonTest"></li>
                                        <li><input type="submit" name="button_RA" value="ら" class="buttonTest"></li>
                                        <li><input type="submit" name="button_WA" value="わ" class="buttonTest"></li>
                                        <li><input type="submit" name="button_EN" value="英字" class="buttonTest"></li>
                                    </ul>
                                </div>
                            </form>

                            <div class="clearBoth"></div>
                            <div class="line"></div>

                            <div class="GridViewStyle1">
                                <table>
                                    <tbody>
                                        <tr>
                                            <th>
                                                社員
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="GridViewStyle1">
                                <div class="two-col">
                                    <table tabindex="7" class="GridViewSpace" id="gvEmp" style="border-collapse: collapse;"
                                        border="1" rules="all" cellspacing="0">
                                        <tbody>
                                            <?php if(!empty($data)): ?>
                                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td class="col-sm-4">
                                                            <a href=""><?php echo e($item->EMP_CD); ?> :
                                                                <?php echo e($item->EMP_NAME); ?>(<?php echo e($item->EMP_KANA); ?>)</a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="line"></div>
                            <div class="d-flex justify-content-center">
                                <?php echo e($data->appends(request()->input())->render('pagination::bootstrap-4')); ?>

                            </div>
                        </div>
                        <div class="line"></div>

                        <form class="mb-2 mt-4 text-center" method="GET" action="<?php echo e(route('LabelSearch')); ?>">
                            <p class="ButtonField1">
                                <input class="CancelButton2" type="submit" name="btn_cancel" value="キャンセル">
                            </p>
                        </form>
                    </td>
                </tr>



                
            </tbody>
        </table>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('menu.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\06_SVN\resources\views/master/MT10EmpReference.blade.php ENDPATH**/ ?>