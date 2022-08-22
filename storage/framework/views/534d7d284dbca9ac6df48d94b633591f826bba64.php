<!-- 出退勤入力（部門別）画面 -->


<?php $__env->startSection('title', '出退勤入力(部門別)'); ?>

<?php $__env->startSection('content'); ?>
    <div id="contents-stage">
        <table>
            <tbody>
                <tr>
                    <td>
                        <div id="UpdatePanel1">
                            <!-- header -->
                            <form action="" method="POST" id="form">
                                <?php echo e(csrf_field()); ?>

                                <table class="InputFieldStyle1">
                                    <tbody>
                                        <tr>
                                            <th>対象年月日</th>
                                            <td>
                                                <select name="ddlTargetYear" tabindex="1" class="imeDisabled"
                                                    id="ddlTargetYear" style="width: 70px;">
                                                    <?php for($year = date('Y') - 3; $year <= date('Y') + 3; $year++): ?>
                                                        <option value="<?php echo e($year); ?>"
                                                            <?php echo e(old('ddlTargetYear', !empty($inputSearchData['ddlTargetYear']) ? $inputSearchData['ddlTargetYear'] : date('Y')) == $year ? 'selected' : ''); ?>>
                                                            <?php echo e($year); ?>

                                                        </option>
                                                    <?php endfor; ?>
                                                </select>
                                                &nbsp;年
                                                <select name="ddlTargetMonth" tabindex="2" class="imeDisabled"
                                                    id="ddlTargetMonth">
                                                    <?php for($month = 01; $month <= 12; $month++): ?>
                                                        <option value="<?php echo e($month); ?>"
                                                            <?php echo e(old('ddlTargetMonth', !empty($inputSearchData['ddlTargetMonth']) ? $inputSearchData['ddlTargetMonth'] : date('m')) == $month ? 'selected' : ''); ?>>
                                                            <?php echo e($month); ?>

                                                        </option>
                                                    <?php endfor; ?>
                                                </select>
                                                &nbsp;月
                                                <select name="ddlTargetDay" tabindex="3" class="imeDisabled"
                                                    id="ddlTargetDay">
                                                    <?php for($day = 01; $day <= 31; $day++): ?>
                                                        <option value="<?php echo e($day); ?>"
                                                            <?php echo e(old('ddlTargetDay', !empty($inputSearchData['ddlTargetDay']) ? $inputSearchData['ddlTargetDay'] : date('d')) == $day ? 'selected' : ''); ?>>
                                                            <?php echo e($day); ?>

                                                        </option>
                                                    <?php endfor; ?>
                                                </select>
                                                &nbsp;日
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>部門</th>
                                            <td>
                                                <input name="filter[txtDeptCd]" tabindex="3" class="OutlineLabel"
                                                    id="deptcd" style="width: 80px;" type="text" maxlength="10"
                                                    value="<?php echo e(old('txtDeptCd', !empty($inputSearchData['txtDeptCd']) ? $inputSearchData['txtDeptCd'] : '')); ?>">
                                                <input class="SearchButton" type="button" id="MT12DeptSearch"
                                                    onclick="SetDeptItem();" value="?">
                                                <input class="OutlineLabel" type="text"
                                                    style="width: 200px; height: 17px; display: inline-block;" id="deptname"
                                                    disabled="disabled">
                                                <?php if($errors->has('txtDeptCd')): ?>
                                                    <span class="alert-danger"><?php echo e($errors->first('txtDeptCd')); ?></span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>開始所属</th>
                                            <td>
                                                <select name="filter[ddlStartCompany]" tabindex="6" id="ddlStartCompany"
                                                    style="width: 300px;">
                                                    <option value=""></option>
                                                    <?php $__currentLoopData = $companyNames; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $companyName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($companyName->COMPANY_ABR); ?>"
                                                            <?php echo e(old('ddlStartCompany'), (!empty($inputSearchData['ddlStartCompany']) ? $inputSearchData['ddlStartCompany'] : '') == $companyName->COMPANY_ABR ? 'selected' : ''); ?>>
                                                            <?php echo e($companyName->COMPANY_ABR); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>


                                            </td>
                                        </tr>
                                        <tr>
                                            <th>終了所属</th>
                                            <td>
                                                <select name="filter[ddlEndCompany]" tabindex="7" id="ddlEndCompany"
                                                    style="width: 300px;">
                                                    <option value=""></option>
                                                    <?php $__currentLoopData = $companyNames; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $companyName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($companyName->COMPANY_ABR); ?>"
                                                            <?php echo e(old('ddlEndCompany'), (!empty($inputSearchData['ddlEndCompany']) ? $inputSearchData['ddlEndCompany'] : '') == $companyName->COMPANY_ABR ? 'selected' : ''); ?>>
                                                            <?php echo e($companyName->COMPANY_ABR); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>

                                            </td>
                                        </tr>
                                        <tr>
                                            <th>社員番号</th>
                                            <td>
                                                <input name="filter[txtEmpCd]" tabindex="3" class="OutlineLabel"
                                                    id="txtEmpCd" style="width: 80px;" type="text" maxlength="10"
                                                    value="<?php echo e(old('txtEmpCd', !empty($inputSearchData['txtEmpCd']) ? $inputSearchData['txtEmpCd'] : '')); ?>">
                                                <input name="btnSearchEmpCd" tabindex="4" class="SearchButton"
                                                    id="btnSearchEmpCd"
                                                    onclick="SetEmpItem();__doPostBack('ctl00$cphContentsArea$btnSearchEmpCd','')"
                                                    type="button" value="?">
                                                <input class="OutlineLabel" type="text"
                                                    style="width: 200px; height: 17px; display: inline-block;" id="EmpName"
                                                    disabled="disabled">
                                                &nbsp;
                                                <?php if($errors->has('txtEmpCd')): ?>
                                                    <span class="alert-danger"><?php echo e($errors->first('txtEmpCd')); ?></span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>


                                <div class="mg10" style="text-align:left;border-bottom: 4px solid #fff;">
                                    <input tabindex="10" id="btnSelectAll" onclick="ChangeAllCheckBoxStates1();"
                                        type="button" value="全選択">
                                    <input tabindex="11" id="btnNotSelectAll" onclick="ChangeAllCheckBoxStates2();"
                                        type="button" value="全解除">
                                </div>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <form action="" name="checkform">
                                                    <table class="GroupBox3">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <label for="ckWorkd"><input name="filter[ckWorkd]"
                                                                            value="01" id="ckWorkd" tabindex="12"
                                                                            class="check" type="checkbox"
                                                                            checked>通常</label>

                                                                    <label for="ckPadh"><input name="filter[ckPadh]"
                                                                            value="02" id="ckPadh" tabindex="13"
                                                                            class="check" type="checkbox"
                                                                            checked>有休</label>

                                                                    <label for="ckPadbh"><input name="filter[ckPadbh]"
                                                                            value="03" id="ckPadbh" tabindex="14"
                                                                            class="check" type="checkbox"
                                                                            checked>前休</label>

                                                                    <label for="ckPadah"><input name="filter[ckPadah]"
                                                                            value="04" id="ckPadah" tabindex="15"
                                                                            class="check" type="checkbox"
                                                                            checked>後休</label>

                                                                    <label for="ckCompd"><input name="filter[ckCompd]"
                                                                            value="05" id="ckCompd" tabindex="16"
                                                                            class="check" type="checkbox"
                                                                            checked>代休</label>

                                                                    <label for="ckCompbd"><input name="filter[ckCompbd]"
                                                                            value="06" id="ckCompbd" tabindex="17"
                                                                            class="check" type="checkbox"
                                                                            checked>前代</label>

                                                                    <label for="ckCompad"><input name="filter[ckCompad]"
                                                                            value="07" id="ckCompad" tabindex="18"
                                                                            class="check" type="checkbox"
                                                                            checked>後代</label>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <label for="ckSpch"><input name="filter[ckSpch]"
                                                                            value="08" id="ckSpch" tabindex="19"
                                                                            class="check" type="checkbox"
                                                                            checked>特休</label>

                                                                    <label for="ckAbcd"><input name="filter[ckAbcd]"
                                                                            value="09" id="ckAbcd" tabindex="20"
                                                                            class="check" type="checkbox"
                                                                            checked>欠勤</label>

                                                                    <label for="ckDirg"><input name="filter[ckDirg]"
                                                                            value="10" id="ckDirg" tabindex="21"
                                                                            class="check" type="checkbox"
                                                                            checked>直行</label>

                                                                    <label for="ckDirr"><input name="filter[ckDirr]"
                                                                            value="11" id="ckDirr" tabindex="22"
                                                                            class="check" type="checkbox"
                                                                            checked>直帰</label>

                                                                    <label for="ckDirqr"><input name="filter[ckDirqr]"
                                                                            value="12" id="ckDirqr" tabindex="23"
                                                                            class="check" type="checkbox"
                                                                            checked>直直</label>

                                                                    <label for="ckBusj"><input name="filter[ckBusj]"
                                                                            value="13" id="ckBusj" tabindex="24"
                                                                            class="check" type="checkbox"
                                                                            checked>出張</label>

                                                                    <label for="ckDelay"><input name="filter[ckDelay]"
                                                                            value="14" id="ckDelay" tabindex="25"
                                                                            class="check" type="checkbox"
                                                                            checked>遅延</label>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </form>
                                            </td>
                                            <td class="pd5Left">

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="line">
                                    <hr>
                                </div>

                                <table>
                                    <tbody>
                                        <tr>
                                            <td style="width: auto;">
                                                <input name="btnDisp" class="ButtonStyle1 submit-form" id="btnShow"
                                                    type="button" value="表示"
                                                    data-url="<?php echo e(route('empworkstatusRef.search')); ?>"
                                                    style="width: 80px;">
                                                <input name="btnCancel2" class="ButtonStyle1 submit-form" id="btnCancel2"
                                                    type="button" value="キャンセル"
                                                    data-url="<?php echo e(route('empworkstatusRef.cancel')); ?>"
                                                    style="width: 80px;">
                                                &nbsp;
                                                <span id="ctl00_cphContentsArea_lblNoStampColor"
                                                    style="background-color: tomato;">　　　</span>
                                                <span id="ctl00_cphContentsArea_lblNoStamp">未打刻</span>
                                                &nbsp;
                                                <span id="ctl00_cphContentsArea_lblDbStampColor"
                                                    style="background-color: lightskyblue;">　　　</span>
                                                <span id="ctl00_cphContentsArea_lblDbStamp">二重打刻</span>
                                                &nbsp;
                                                <span class="font-style2" id="ctl00_cphContentsArea_lblFixMsg"></span>
                                            </td>
                                            <td class="right">
                                                <span class="font-style1"
                                                    id="ctl00_cphContentsArea_lblDispCaldDate"></span>
                                                &nbsp;
                                                <span class="font-style1"
                                                    id="ctl00_cphContentsArea_lblDispOfcTime"></span>
                                                &nbsp;
                                                <span class="font-style1"
                                                    id="ctl00_cphContentsArea_lblDispLevTime"></span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <!-- detail -->
                                <div class="GridViewStyle1" id="gridview-container">
                                    <div class="GridViewPanelStyle2" id="ctl00_cphContentsArea_pnlEmpWorkStatus"
                                        style="width: 990px;">
                                        <div>
                                            <table tabindex="28" class="GridViewBorder GridViewPadding"
                                                id="ctl00_cphContentsArea_gvEmpWorkStatus"
                                                style="border-collapse: collapse;" border="1" rules="all" cellspacing="0">
                                                <tbody>
                                                    <?php if(isset($empWorkTimeResults)): ?>
                                                        <?php if(count($empWorkTimeResults) < 1): ?>
                                                            <tr style="width: 70px;">
                                                                <td><span><?php echo e($errMsg_4029); ?></span></td>
                                                            </tr>
                                                        <?php else: ?>
                                                            <tr>
                                                                <th scope="col">
                                                                    部門コード
                                                                </th>
                                                                <th scope="col">
                                                                    部門名
                                                                </th>
                                                                <th scope="col">
                                                                    社員番号
                                                                </th>
                                                                <th scope="col">
                                                                    社員名
                                                                </th>
                                                                <th scope="col">
                                                                    勤務体系
                                                                </th>
                                                                <th scope="col">
                                                                    事由
                                                                </th>
                                                                <th scope="col">
                                                                    出勤打刻場所
                                                                </th>
                                                                <th scope="col">
                                                                    出勤
                                                                </th>
                                                                <th scope="col">
                                                                    退出
                                                                </th>
                                                                <th scope="col">
                                                                    退出打刻場所
                                                                </th>
                                                            </tr>
                                                            <?php $__currentLoopData = $empWorkTimeResults; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $empWorkTimeResult): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr>
                                                                    <td style="width: 70px;">
                                                                        <span
                                                                            id="ctl00_cphContentsArea_gvEmpWorkStatus_ctl02_lblDeptCd">000000</span>
                                                                    </td>
                                                                    <td style="width: 130px;">
                                                                        <span
                                                                            id="ctl00_cphContentsArea_gvEmpWorkStatus_ctl02_lblDeptName">アイティーエス</span>
                                                                    </td>
                                                                    <td style="width: 80px;">
                                                                        <span
                                                                            id="ctl00_cphContentsArea_gvEmpWorkStatus_ctl02_lblEmpCd">9999</span>
                                                                    </td>
                                                                    <td style="width: 130px;">
                                                                        <span
                                                                            id="ctl00_cphContentsArea_gvEmpWorkStatus_ctl02_lblEmpName">管理者</span>
                                                                    </td>
                                                                    <td style="width: 130px;">
                                                                        <span
                                                                            id="ctl00_cphContentsArea_gvEmpWorkStatus_ctl02_lblWorkPtn"
                                                                            style="color: red;">休日勤務</span>
                                                                    </td>
                                                                    <td class="GridViewRowCenter" style="width: 50px;">
                                                                        <span
                                                                            id="ctl00_cphContentsArea_gvEmpWorkStatus_ctl02_lblReason">通常</span>
                                                                    </td>
                                                                    <td class="GridViewRowCenter" style="width: 130px;">
                                                                        <span
                                                                            id="ctl00_cphContentsArea_gvEmpWorkStatus_ctl02_lblTeamName"></span>
                                                                    </td>
                                                                    <td class="GridViewRowCenter" style="width: 40px;">
                                                                        <span
                                                                            id="ctl00_cphContentsArea_gvEmpWorkStatus_ctl02_lblOfcTime"></span>
                                                                    </td>
                                                                    <td class="GridViewRowCenter" style="width: 40px;">
                                                                        <span
                                                                            id="ctl00_cphContentsArea_gvEmpWorkStatus_ctl02_lblLevTime"></span>
                                                                    </td>
                                                                    <td class="GridViewRowCenter" style="width: 130px;">
                                                                        <span
                                                                            id="ctl00_cphContentsArea_gvEmpWorkStatus_ctl02_lblTeamName"></span>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>

                                    <div class="line"></div>
                                    <p class="ButtonField2">
                                        <input name="ctl00$cphContentsArea$btnCancel" tabindex="29"
                                            id="ctl00_cphContentsArea_btnCancel"
                                            onclick="CloseSubWindow();__doPostBack('ctl00$cphContentsArea$btnCancel','')"
                                            type="button" value="キャンセル">
                                    </p>

                                </div>

                                <div>
                                    <!-- ErrorMessage -->
                                    <span id="ctl00_cphContentsArea_lblErrMsg" style="color: red;"></span>
                                </div>

                                <br>
                                <!-- footer -->
                                <div class="line">
                                    <hr>
                                </div>
                                <p class="ButtonField2">
                                    <input name="ctl00$cphContentsArea$btnCancel" tabindex="9"
                                        id="ctl00_cphContentsArea_btnCancel"
                                        onclick="CloseSubWindow();__doPostBack('ctl00$cphContentsArea$btnCancel','')"
                                        type="button" value="キャンセル">
                                </p>
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
        $(document).on('click', '.submit-form', function() {
            var url = $(this).data('url');
            $('#form').attr('action', url);
            $('#form').submit();
        });

        //検索の際ボンタン機能無効
        $(document).on('click', '#btnShow', function load() {
            $('#btnShow, #ddlTargetYear, #ddlTargetMonth, #ddlTargetDay, #txtEmpCd, #btnSearchEmpCd').attr(
                'disabled', true);
        });

        function ChangeAllCheckBoxStates1() {
            //チャックボックスのid
            const ElementsCount = document.getElementsByClassName("check");
            //全選択を切り替え
            for (let i = 0; i < ElementsCount.length; i++) {
                ElementsCount[i].checked = true;
            }
        }

        function ChangeAllCheckBoxStates2() {
            //チャックボックスのid
            const ElementsCount = document.getElementsByClassName("check");
            //全解除を切り替え
            for (let i = 0; i < ElementsCount.length; i++) {
                ElementsCount[i].checked = false;
            }
        }

        //フレームボックスが一つも選択されていないときエラー処理
        //参考⇒https://memo.ag2works.tokyo/post-2215/
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('menu.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\06_SVN\resources\views/work_time/EmpWorkStatusReference.blade.php ENDPATH**/ ?>