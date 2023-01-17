<!-- ログイン情報入力  -->


<?php $__env->startSection('title', 'ログイン情報入力 '); ?>

<?php $__env->startSection('content'); ?>
    <div id="contents-stage">
        <form action="" method="get" id="form">
            <?php echo csrf_field(); ?>
            <table class="BaseContainerStyle1">
                <tbody>
                    <tr>
                        <td>
                            <div id="UpdatePanel1">
                                <table class="InputFieldStyle1">
                                    <tbody>
                                        <tr>
                                            <th>社員番号</th>
                                            <td>
                                                <input name="filter[txtEmpCd]" id="txtEmpCd" onfocus="this.select();"
                                                    style="width: 80px;" type="search" style="ime-inactive;" maxlength="10"
                                                    value="<?php echo e(old('filter[txtEmpCd]', !empty($search_data['txtEmpCd']) ? $search_data['txtEmpCd'] : '')); ?>"
                                                    oninput="value = onlyHalfWord(value)">
                                                <?php if($errors->has('txtEmpCd')): ?>
                                                    <span class="text-danger"><?php echo e($errors->first('txtEmpCd')); ?></span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>社員カナ名</th>
                                            <td>
                                                <input name="filter[txtEmpKana]" id="txtEmpKana"
                                                    style="width: 160px;" type="search" maxlength="20" onfocus="this.select();"
                                                    value="<?php echo e(old('filter[txtEmpKana]', !empty($search_data['txtEmpKana']) ? $search_data['txtEmpKana'] : '')); ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>部門</th>
                                            <td>
                                                <input name="filter[txtDeptCd]" id="txtDeptCd" class="searchDeptCd" onfocus="this.select();"
                                                    style="width: 50px;" type="text" maxlength="6" style="ime-inactive;"
                                                    value="<?php echo e(old('filter[txtDeptCd]', !empty($search_data['txtDeptCd']) ? $search_data['txtDeptCd'] : '')); ?>"
                                                    oninput="value = onlyHalfWord(value)">
                                                <input name="btnSearchDeptCd" class="SearchButton" id="btnSearchDeptCd"
                                                    type="button" value="?" onclick="SearchDept(this);return false">
                                                <input name="deptName" type="text" data-dispclscd=01 data-isdeptauth=true
                                                    style="width: 200px; height: 23px; display: inline-block;" id="deptName"
                                                    value="<?php echo e(old('deptName', !empty($request_data['deptName']) ? $request_data['deptName'] : '')); ?>"
                                                    readonly="readonly">
                                                <?php if($errors->has('filter.txtDeptCd')): ?>
                                                    <span class="text-danger"><?php echo e($errors->first('filter.txtDeptCd')); ?></span>
                                                <?php endif; ?>
                                                <span class="text-danger" id="deptNameError"></span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <p class="FunctionMenu1">
                                    <input name="btnSearch" id="btnSearch" class="SearchButton submit-form" type="button"
                                        value="検索" data-url="<?php echo e(route('MT11LoginRef.search')); ?>">
                                    <input name="btnCancel" class="SearchButton" id="btnCancel" type="button"
                                        onclick="Cancel()" value="キャンセル">
                                </p>

                                <div class="clearBoth"></div>

                                <div class="line"></div>

                                <ul class="HolizonListMenu1">
                                    <li><input name="btnAll" id="btnAll" class="SearchButton submit-form" type="button"
                                            value="全件" data-url="<?php echo e(route('MT11LoginRef.search')); ?>"></li>
                                    <li><input type="submit" name="button_A" value="あ"></li>
                                    <li><input type="submit" name="button_KA" value="か"></li>
                                    <li><input type="submit" name="button_SA" value="さ"></li>
                                    <li><input type="submit" name="button_TA" value="た"></li>
                                    <li><input type="submit" name="button_NA" value="な"></li>
                                    <li><input type="submit" name="button_HA" value="は"></li>
                                    <li><input type="submit" name="button_MA" value="ま"></li>
                                    <li><input type="submit" name="button_YA" value="や"></li>
                                    <li><input type="submit" name="button_RA" value="ら"></li>
                                    <li><input type="submit" name="button_WA" value="わ"></li>
                                    <li><input type="submit" name="button_EN" value="英字"></li>
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
                                <?php if(isset($search_results)): ?>
                                    <div class="GridViewStyle1">
                                        <div>
                                            <table class="GridViewSpace" id="gvEmp" style="border-collapse: collapse;"
                                                border="1" cellspacing="0">
                                                <tbody>
                                                    <?php if(count($search_results) < 1): ?>
                                                        <tr style="width:70px; text-align:center;">
                                                            <td><span><?php echo e(getArrValue($error_messages, '2000')); ?></span></td>
                                                        </tr>
                                                    <?php else: ?>
                                                    <?php for($i = 0; $i < count($search_results) && $i < 20; $i++): ?>
                                                    <tr>
                                                        <td class="col-sm-4">
                                                            <a href="<?php echo e(url('master/MT11LoginEditor/'. $search_results[$i]->EMP_CD )); ?>">
                                                                <?php echo e($search_results[$i]->EMP_CD); ?> : <?php echo e($search_results[$i]->EMP_NAME); ?>

                                                            </a>
                                                        </td>
                                                        <td class="col-sm-4">
                                                            <?php if($search_results[$i + 20] != null ): ?>
                                                            <a href="<?php echo e(url('master/MT11LoginEditor/'. $search_results[$i + 20]->EMP_CD )); ?>">
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
                                <?php endif; ?>

                                <div class="line"></div>
                                <div class="d-flex justify-content-center" id="pegination">
                                    <?php if(isset($search_results)): ?>
                                        <?php echo e($search_results->appends(request()->query())->links()); ?>

                                    <?php endif; ?>
                                </div>
                                <div class="line"></div>
                                <p class="ButtonField1">
                                    <input name="btnCancel" class="SearchButton" id="btnCancel" type="button"
                                        onclick="Cancel();" value="キャンセル">
                                </p>

                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        //formボタンクリック
        $(document).on('click', '.submit-form', function() {
            var url = $(this).data('url');
            $('#form').attr('action', url);
            $('#form').submit();
        });

        //キャンセルボタン
        function Cancel() {
            $("#txtEmpCd, #txtEmpKana, #txtDeptCd, #deptName").val('');
            window.location.replace("MT11LoginReference");
        }

        $(function() {
            // 入力可能文字：半角英数
            onlyHalfWord = n => n.replace(/[０-９Ａ-Ｚａ-ｚ]/g, s => String.fromCharCode(s.charCodeAt(0) - 65248))
                .replace(/[^0-9a-zA-Z]/g, '');
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('menu.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\06_SVN\resources\views/master/MT11LoginReference.blade.php ENDPATH**/ ?>