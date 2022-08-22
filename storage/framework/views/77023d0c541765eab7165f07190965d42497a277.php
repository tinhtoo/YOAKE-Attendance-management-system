<!-- 所属情報入力 -->


<?php $__env->startSection('title', '所属情報入力'); ?>

<?php $__env->startSection('content'); ?>
    <div id="contents-stage">
        <table class="BaseContainerStyle1">
            <tbody>
                <tr>
                    <td>
                        <div id="UpdatePanel1">
                            <form action="" method="POST" id="form">
                                <?php echo csrf_field(); ?>
                                <table class="InputFieldStyle1">
                                    <tbody>
                                        <tr>
                                            <th>所属番号</th>
                                            <td>
                                                <input type="hidden" name="COMPANY_CD"
                                                    value="<?php echo e($query_data->COMPANY_CD); ?>">
                                                <input name="editCompanyCd" tabindex="1"
                                                    id="editCompanyCd" style="width: 80px;" type="text"
                                                    maxlength="6" onfocus="this.select();"
                                                    disabled="<?php echo e((!empty($query_data->COMPANY_CD) ? $query_data->COMPANY_CD : $query_data->COMPANY_CD) ? 'disabled' : ''); ?>"
                                                    value="<?php echo e($query_data->COMPANY_CD ?? old('editCompanyCd')); ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>所属先名</th>
                                            <td>
                                                <input name="editCompanyName" tabindex="2" onfocus="this.select();"
                                                    id="editCompanyName" style="width: 370px;" type="text"
                                                    maxlength="20" autofocus oninput="value = ngVerticalBar(value)"
                                                    value="<?php echo e($query_data->COMPANY_NAME ?? old('editCompanyName')); ?>">
                                                <?php if($errors->has('editCompanyName')): ?>
                                                    <span class="text-danger">
                                                    <?php echo e(getArrValue($error_messages, $errors->first('editCompanyName'))); ?>

                                                    </span>
                                                <?php endif; ?>

                                            </td>
                                        </tr>
                                        <tr>
                                            <th>所属先カナ名</th>
                                            <td>
                                                <input name="editCompanyKana" tabindex="3" onfocus="this.select();"
                                                    id="editCompanyKana" style="width: 370px;" type="text"
                                                    maxlength="20"
                                                    value="<?php echo e($query_data->COMPANY_KANA ?? old('editCompanyKana')); ?>">
                                                <?php if($errors->has('editCompanyKana')): ?>
                                                    <span class="text-danger">
                                                    <?php echo e(getArrValue($error_messages, $errors->first('editCompanyKana'))); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>所属先略名</th>
                                            <td>
                                                <input name="editCompanyAbr" tabindex="4"  onfocus="this.select();"
                                                    id="editCompanyAbr" style="width: 180px;" type="text"
                                                    maxlength="10"
                                                    value="<?php echo e($query_data->COMPANY_ABR ?? old('editCompanyAbr')); ?>">
                                                <?php if($errors->has('editCompanyAbr')): ?>
                                                    <span class="text-danger">
                                                    <?php echo e(getArrValue($error_messages, $errors->first('editCompanyAbr'))); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>郵便番号</th>
                                            <td>
                                                <input name="txtPostCd" tabindex="5" id="txtPostCd" onfocus="this.select();"
                                                    style="width: 70px;"  type="text" maxlength="8"
                                                    value="<?php echo e($query_data->POST_CD ?? old('txtPostCd')); ?>"
                                                    oninput="value = onlyNubersBar(value)">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>住所１</th>
                                            <td>
                                                <input name="txtAddress1" tabindex="6" onfocus="this.select();"
                                                    id="txtAddress1" style="width: 430px;" type="text"
                                                    maxlength="30"
                                                    value="<?php echo e($query_data->ADDRESS1 ?? old('txtAddress1')); ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>住所２</th>
                                            <td>
                                                <input name="txtAddress2" tabindex="7" onfocus="this.select();"
                                                    id="txtAddress2" style="width: 430px;" type="text"
                                                    maxlength="30"
                                                    value="<?php echo e($query_data->ADDRESS2 ?? old('txtAddress2')); ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>住所３</th>
                                            <td>
                                                <input name="txtAddress3" tabindex="8" onfocus="this.select();"
                                                    id="txtAddress3" style="width: 430px;" type="text"
                                                    maxlength="30"
                                                    value="<?php echo e($query_data->ADDRESS3 ?? old('txtAddress3')); ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>電話番号</th>
                                            <td>
                                                <input name="txtTel" tabindex="9" id="txtTel" onfocus="this.select();"
                                                    style="width: 120px;" type="text" maxlength="15"
                                                    value="<?php echo e($query_data->TEL ?? old('txtTel')); ?>"
                                                    oninput="value = onlyNubersBarParen(value)">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>ＦＡＸ番号</th>
                                            <td>
                                                <input name="txtFax" tabindex="10" id="txtFax" onfocus="this.select();"
                                                    style="width: 120px;" type="text" maxlength="15"
                                                    value="<?php echo e($query_data->FAX ?? old('txtFax')); ?>"
                                                    oninput="value = onlyNubersBarParen(value)">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>表示区分</th>
                                            <td>
                                                <select name="ddlDispCls" tabindex="11" id="ddlDispCls"
                                                    style="width: 100px;">
                                                    <?php $__currentLoopData = $dispcls_cd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dispclsCd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($dispclsCd->CLS_DETAIL_CD); ?>"
                                                            <?php echo e($dispclsCd->CLS_DETAIL_CD == $query_data->DISP_CLS_CD ? 'selected' : ''); ?>>
                                                            <?php echo e($dispclsCd->CLS_DETAIL_NAME); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>

                                <div class="line"></div>

                                <div class="ButtonField1">
                                    <input type="button" class="ButtonStyle1 cancel-form" id="btnUpdate" name="btnUpdate"
                                        onclick="return checkSubmit();" tabindex="12" value="更新"
                                        data-url="<?php echo e(route('MT23.update', ['id' => $query_data->COMPANY_CD])); ?>">

                                    <input name="btnCancel" tabindex="13" id="btnCancel" onclick="" type="button"
                                        class="ButtonStyle1 submit-form" value="キャンセル"
                                        data-url="<?php echo e(url('master/MT23CompanyEditor/' . $query_data->COMPANY_CD)); ?>">

                                    <input type="button" name="btnDelete" tabindex="14" id="btnDelete"
                                        class="ButtonStyle1 submit-form" value="削除"
                                        onclick="return checkDelete(this)"
                                        data-url="<?php echo e(route('MT23.delete', $query_data->COMPANY_CD)); ?>">
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

        // 確認ダイアログ(更新処理)
        function checkSubmit() {
            var check = window.confirm("<?php echo e(getArrValue($error_messages, '1005')); ?>");
            if (check == true) {
                $(document).on('click', '.cancel-form', function() {
                    var url = $(this).data('url');
                    $('#form').attr('action', url);
                    $('#form').submit();
                });
            } else {
                return false;
            }
        }

        //確認ダイアログ（削除処理）
        function checkDelete() {
            if (window.confirm("<?php echo e(getArrValue($error_messages, '1004')); ?>")) {
                // ボタンクリック
                $(document).on('click', '.submit-form', function(){
                    var url = $(this).data('url');
                    $('#form').attr('action', url);
                    $('#form').submit();
                });
            } else {
            return false;
            }
        }

        $(function() {
            // 入力可能文字：数値、ハイフン
            onlyNubersBar = n => n.replace(/[０-９]/g, s => String.fromCharCode(s.charCodeAt(0) - 65248))
                .replace(/[ー]/g, '-')
                .replace(/[^-\d]/g, '');

            // 入力不可能文字：|
            ngVerticalBar = n => n.replace(/\|/g, '');

            // 入力可能文字：数値、ハイフン、括弧
            onlyNubersBarParen = n => n.replace(/[０-９（）]/g, s => String.fromCharCode(s.charCodeAt(0) - 65248))
                .replace(/[ー]/g, '-')
                .replace(/[^-()\d]/g, '');
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('menu.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\06_SVN\resources\views/master/MT23CompanyEditor.blade.php ENDPATH**/ ?>