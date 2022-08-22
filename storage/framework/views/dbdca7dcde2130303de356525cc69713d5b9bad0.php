<!-- 社員情報入力  -->


<?php $__env->startSection('title','社員情報入力'); ?>

<?php $__env->startSection('content'); ?>
<div id="contents-stage">
    <table class="BaseContainerStyle1">
        <tbody>
            <tr>
                <td>
                    <div id="ctl00_cphContentsArea_UpdatePanel1">


                        <table class="InputFieldStyle1">
                            <tbody>
                                <tr>
                                    <th class="required">社員番号</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtEmpCd" tabindex="1" class="imeDisabled" id="ctl00_cphContentsArea_txtEmpCd" style="width: 80px;" onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;" onfocus="this.select();" onchange="javascript:setTimeout('__doPostBack(\'ctl00$cphContentsArea$txtEmpCd\',\'\')', 0)" type="text" maxlength="10">

                                        <span id="ctl00_cphContentsArea_cvEmpCd" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="required">社員名</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtEmpName" tabindex="2" class="imeOn" id="ctl00_cphContentsArea_txtEmpName" style="width: 300px;" onfocus="this.select();" type="text" maxlength="20">

                                        <span id="ctl00_cphContentsArea_cvEmpName" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="required">社員カナ名</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtEmpKana" tabindex="3" class="imeOn" id="ctl00_cphContentsArea_txtEmpKana" style="width: 160px;" onfocus="this.select();" type="text" maxlength="20">
                                        <span id="ctl00_cphContentsArea_cvEmpKana" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="required">部門</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtDeptCd" tabindex="4" class="imeDisabled" id="ctl00_cphContentsArea_txtDeptCd" style="width: 50px;" onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;" onfocus="this.select();" onchange="javascript:setTimeout('__doPostBack(\'ctl00$cphContentsArea$txtDeptCd\',\'\')', 0)" type="text" maxlength="6">
                                        <input name="ctl00$cphContentsArea$btnSearchDeptCd" tabindex="5" class="SearchButton" id="ctl00_cphContentsArea_btnSearchDeptCd" onclick="SetDeptItem();__doPostBack('ctl00$cphContentsArea$btnSearchDeptCd','')" type="button" value="?">
                                        <span class="OutlineLabel" id="ctl00_cphContentsArea_lblDeptName" style="width: 280px; display: inline-block;"></span>
                                        <span id="ctl00_cphContentsArea_cvDeptCd" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>入社年月日</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtEntYear" tabindex="6" class="imeDisabled" id="ctl00_cphContentsArea_txtEntYear" style="width: 40px;" onfocus="this.select();" onchange="AddDropDownList('ctl00_cphContentsArea_txtEntYear', 'ctl00_cphContentsArea_ddlEntMonth', 'ctl00_cphContentsArea_ddlEntDay')" type="text" maxlength="4">

                                        &nbsp;年&nbsp;
                                        <select name="ctl00$cphContentsArea$ddlEntMonth" tabindex="7" class="imeDisabled" id="ctl00_cphContentsArea_ddlEntMonth" style="width: 50px;" onchange="AddDropDownList('ctl00_cphContentsArea_txtEntYear', 'ctl00_cphContentsArea_ddlEntMonth', 'ctl00_cphContentsArea_ddlEntDay')">
                                            <option selected="selected" value=""></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>

                                        </select>
                                        &nbsp;月&nbsp;
                                        <select name="ctl00$cphContentsArea$ddlEntDay" tabindex="8" class="imeDisabled" id="ctl00_cphContentsArea_ddlEntDay" style="width: 50px;">
                                            <option selected="selected" value=""></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>

                                        </select>
                                        &nbsp;日&nbsp;
                                        <span id="ctl00_cphContentsArea_cvEntDate" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>退職年月日</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtRetYear" tabindex="9" class="imeDisabled" id="ctl00_cphContentsArea_txtRetYear" style="width: 40px;" onfocus="this.select();" onchange="AddDropDownList('ctl00_cphContentsArea_txtRetYear', 'ctl00_cphContentsArea_ddlRetMonth', 'ctl00_cphContentsArea_ddlRetDay')" type="text" maxlength="4">

                                        &nbsp;年&nbsp;
                                        <select name="ctl00$cphContentsArea$ddlRetMonth" tabindex="10" class="imeDisabled" id="ctl00_cphContentsArea_ddlRetMonth" style="width: 50px;" onchange="AddDropDownList('ctl00_cphContentsArea_txtRetYear', 'ctl00_cphContentsArea_ddlRetMonth', 'ctl00_cphContentsArea_ddlRetDay')">
                                            <option selected="selected" value=""></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>

                                        </select>
                                        &nbsp;月&nbsp;
                                        <select name="ctl00$cphContentsArea$ddlRetDay" tabindex="11" class="imeDisabled" id="ctl00_cphContentsArea_ddlRetDay" style="width: 50px;">
                                            <option selected="selected" value=""></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>

                                        </select>
                                        &nbsp;日&nbsp;
                                        <span id="ctl00_cphContentsArea_cvRetDate" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="required">在籍区分</th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlRegCls" tabindex="12" id="ctl00_cphContentsArea_ddlRegCls" style="width: 80px;">
                                            <option selected="selected" value=""></option>
                                            <option value="00">在籍</option>
                                            <option value="01">休職</option>
                                            <option value="02">退職</option>

                                        </select>
                                        <span id="ctl00_cphContentsArea_cvRegCls" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>生年月日</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtBirthYear" tabindex="13" class="imeDisabled" id="ctl00_cphContentsArea_txtBirthYear" style="width: 40px;" onfocus="this.select();" onchange="AddDropDownList('ctl00_cphContentsArea_txtBirthYear', 'ctl00_cphContentsArea_ddlBirthMonth', 'ctl00_cphContentsArea_ddlBirthDay')" type="text" maxlength="4">

                                        &nbsp;年&nbsp;
                                        <select name="ctl00$cphContentsArea$ddlBirthMonth" tabindex="14" class="imeDisabled" id="ctl00_cphContentsArea_ddlBirthMonth" style="width: 50px;" onchange="AddDropDownList('ctl00_cphContentsArea_txtBirthYear', 'ctl00_cphContentsArea_ddlBirthMonth', 'ctl00_cphContentsArea_ddlBirthDay')">
                                            <option selected="selected" value=""></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>

                                        </select>
                                        &nbsp;月&nbsp;
                                        <select name="ctl00$cphContentsArea$ddlBirthDay" tabindex="15" class="imeDisabled" id="ctl00_cphContentsArea_ddlBirthDay" style="width: 50px;">
                                            <option selected="selected" value=""></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>

                                        </select>
                                        &nbsp;日&nbsp;
                                        <span id="ctl00_cphContentsArea_cvBirthDate" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="required">性別</th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlSexCls" tabindex="16" id="ctl00_cphContentsArea_ddlSexCls" style="width: 50px;">
                                            <option selected="selected" value=""></option>
                                            <option value="00">男</option>
                                            <option value="01">女</option>

                                        </select>
                                        <span id="ctl00_cphContentsArea_cvSexCls" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="required">社員区分</th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlEmpCls" tabindex="17" id="ctl00_cphContentsArea_ddlEmpCls" style="width: 300px;">
                                            <option selected="selected" value=""></option>
                                            <option value="00">役員</option>
                                            <option value="01">正社員</option>
                                            <option value="02">派遣社員</option>
                                            <option value="03">パート</option>
                                            <option value="04">アルバイト</option>

                                        </select>
                                        <span id="ctl00_cphContentsArea_cvEmpCls" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="required">使用カレンダー</th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlCalendar" tabindex="18" id="ctl00_cphContentsArea_ddlCalendar" style="width: 300px;">
                                            <option selected="selected" value=""></option>
                                            <option value="001">通常１(8:00～17:00)</option>
                                            <option value="002">通常2(7:00～16:00)</option>
                                            <option value="003">通常3(9:00～1800)</option>
                                            <option value="010">夜勤Ⅰ(20:00～29:00)</option>
                                            <option value="011">夜勤Ⅱ(16:00～25:00)</option>
                                            <option value="100">シフト勤務用</option>

                                        </select>
                                        <span id="ctl00_cphContentsArea_cvCalendar" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>部門権限</th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlDeptAuth" tabindex="19" id="ctl00_cphContentsArea_ddlDeptAuth" style="width: 300px;">
                                            <option selected="selected" value=""></option>
                                            <option value="000010">営業部管理者</option>
                                            <option value="000020">製造部管理者</option>
                                            <option value="000030">経理部管理者</option>
                                            <option value="000040">総務部管理者</option>
                                            <option value="000050">購買部管理者</option>
                                            <option value="000060">資材部管理者</option>
                                            <option value="000070">品質保証部管理者</option>
                                            <option value="999999">管理者</option>

                                        </select>
                                        <span id="ctl00_cphContentsArea_cvDeptAuth" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>郵便番号</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtPostCd" tabindex="20" class="imeDisabled" id="ctl00_cphContentsArea_txtPostCd" style="width: 70px;" onfocus="this.select();" type="text" maxlength="8">

                                    </td>
                                </tr>
                                <tr>
                                    <th>住所１</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtAddress1" tabindex="21" class="imeOn" id="ctl00_cphContentsArea_txtAddress1" style="width: 430px;" onfocus="this.select();" type="text" maxlength="30">
                                    </td>
                                </tr>
                                <tr>
                                    <th>住所２</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtAddress2" tabindex="22" class="imeOn" id="ctl00_cphContentsArea_txtAddress2" style="width: 430px;" onfocus="this.select();" type="text" maxlength="30">
                                    </td>
                                </tr>
                                <tr>
                                    <th>電話番号</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtTel" tabindex="23" class="imeDisabled" id="ctl00_cphContentsArea_txtTel" style="width: 120px;" onfocus="this.select();" type="text" maxlength="15">


                                    </td>
                                </tr>
                                <tr>
                                    <th>携帯番号</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtCellular" tabindex="24" class="imeDisabled" id="ctl00_cphContentsArea_txtCellular" style="width: 120px;" onfocus="this.select();" type="text" maxlength="15">


                                    </td>
                                </tr>
                                <tr>
                                    <th>Ｅメール</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtMail" tabindex="25" class="imeOff" id="ctl00_cphContentsArea_txtMail" style="width: 360px;" onfocus="this.select();" type="text" maxlength="50">
                                    </td>
                                </tr>
                                <tr>
                                    <th>有休付与算出基準年月</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtPhGrantYear" tabindex="26" class="imeDisabled" id="ctl00_cphContentsArea_txtPhGrantYear" style="width: 40px;" onfocus="this.select();" type="text" maxlength="4">

                                        &nbsp;年度&nbsp;
                                        <select name="ctl00$cphContentsArea$ddlPhGrantMonth" tabindex="27" class="imeDisabled" id="ctl00_cphContentsArea_ddlPhGrantMonth" style="width: 50px;">
                                            <option selected="selected" value=""></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>

                                        </select>
                                        &nbsp;月&nbsp;
                                        <span id="ctl00_cphContentsArea_cvPhGrantDate" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="required">職種区分</th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlEmpCls2" tabindex="28" id="ctl00_cphContentsArea_ddlEmpCls2" style="width: 300px;">
                                            <option selected="selected" value=""></option>
                                            <option value="00">管理者</option>
                                            <option value="01">部長</option>
                                            <option value="02">課長</option>
                                            <option value="05">一般</option>

                                        </select>
                                        <span id="ctl00_cphContentsArea_cvEmpCls2" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="required">締日</th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlClosingDate" tabindex="29" id="ctl00_cphContentsArea_ddlClosingDate" style="width: 150px;">
                                            <option value=""></option>
                                            <option value="15">１５日締</option>
                                            <option value="25">２５日締</option>
                                            <option selected="selected" value="31">末締</option>

                                        </select>
                                        <span id="ctl00_cphContentsArea_cvClosingDate" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>所属</th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlCompany" tabindex="30" id="ctl00_cphContentsArea_ddlCompany" style="width: 300px;">
                                            <option selected="selected" value=""></option>
                                            <option value="001">A派遣</option>
                                            <option value="002">B派遣</option>
                                            <option value="003">C派遣</option>

                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>社員番号２</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtEmp2Cd" tabindex="31" class="imeDisabled" id="ctl00_cphContentsArea_txtEmp2Cd" style="width: 80px;" onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;" onfocus="this.select();" onchange="javascript:setTimeout('__doPostBack(\'ctl00$cphContentsArea$txtEmp2Cd\',\'\')', 0)" type="text" maxlength="10">

                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="line"></div>

                        <p class="ButtonField1">
                            <input name="ctl00$cphContentsArea$btnUpdate" tabindex="29" id="ctl00_cphContentsArea_btnUpdate" onclick="if(confirm('更新します。よろしいですか?') ==  false){ return false;};WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions())" type="button" value="更新">
                            <input name="ctl00$cphContentsArea$btnCancel" tabindex="30" id="ctl00_cphContentsArea_btnCancel" onclick="CloseSubWindow();__doPostBack('ctl00$cphContentsArea$btnCancel','')" type="button" value="キャンセル">
                            <input name="ctl00$cphContentsArea$btnDelete" tabindex="31" disabled="disabled" id="ctl00_cphContentsArea_btnDelete" type="button" value="削除">
                        </p>

                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('menu.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\06_SVN\resources\views/master/MT10EmpEditor.blade.php ENDPATH**/ ?>