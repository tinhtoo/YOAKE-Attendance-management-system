<!-- 社員情報取込処理 -->


<?php $__env->startSection('title', '社員情報取込処理'); ?>

<?php $__env->startSection('content'); ?>
    <div id="contents-stage">
        <table>
            <tbody>
                <tr>
                    <td>
                        <div id="ctl00_cphContentsArea_UpdatePanel1">

                            <!-- header -->
                            <table class="InputFieldStyle1">
                                <tbody>
                                    <tr>
                                        <th>ファイル</th>
                                        <td>
                                            <span id="ctl00_cphContentsArea_afuEmpImport"
                                                style="display: inline-block;"><input
                                                    name="ctl00$cphContentsArea$afuEmpImport$ctl00"
                                                    id="ctl00_cphContentsArea_afuEmpImport_ctl00" type="hidden">
                                                <div id="ctl00_cphContentsArea_afuEmpImport_ctl01"
                                                    name="ctl00_cphContentsArea_afuEmpImport_ctl01"><input
                                                        name="ctl00$cphContentsArea$afuEmpImport$ctl02"
                                                        id="ctl00_cphContentsArea_afuEmpImport_ctl02"
                                                        style="width: 700px; background-color: white;"
                                                        onmousedown="return false;" onkeydown="return false;"
                                                        onkeypress="return false;" type="file"></div>
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="line"></div>

                            <table class="mg10">
                                <tbody>
                                    <tr>
                                        <td>
                                            <input name="ctl00$cphContentsArea$btnImport" tabindex="2" class="ButtonStyle1"
                                                id="ctl00_cphContentsArea_btnImport"
                                                onclick="javascript:__doPostBack('ctl00$cphContentsArea$btnImport','')"
                                                type="button" value="取込開始">
                                            <input name="ctl00$cphContentsArea$btnUpdate" tabindex="3" disabled="disabled"
                                                class="ButtonStyle1" id="ctl00_cphContentsArea_btnUpdate" type="button"
                                                value="更新">
                                            <input name="ctl00$cphContentsArea$btnCancel" tabindex="4" class="ButtonStyle1"
                                                id="ctl00_cphContentsArea_btnCancel"
                                                onclick="javascript:__doPostBack('ctl00$cphContentsArea$btnCancel','')"
                                                type="button" value="キャンセル">
                                        </td>
                                        <td>
                                            &nbsp;

                                        </td>
                                        <td>
                                            &nbsp;
                                            <span class="font-style1" id="ctl00_cphContentsArea_lblErrorCnt"></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <!-- detail -->
                            <div class="GridViewStyle1" id="gridview-container">
                                <div class="GridViewPanelStyle1">
                                    <div id="ctl00_cphContentsArea_pnl">

                                        <div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('menu.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\06_SVN\resources\views/master/EmpImport.blade.php ENDPATH**/ ?>