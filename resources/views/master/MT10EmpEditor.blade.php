<!-- 社員情報入力  -->
@extends('menu.main')

@section('title','社員情報入力')

@section('content')
<div id="contents-stage">
    <table class="BaseContainerStyle1">
        <tbody>
            <tr>
                <td>
                    <div id="UpdatePanel1">


                        <table class="InputFieldStyle1">
                            <tbody>
                                <tr>
                                    <th class="required">社員番号</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtEmpCd" tabindex="1" class="imeDisabled" id="txtEmpCd" style="width: 80px;" onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;" onfocus="this.select();" onchange="javascript:setTimeout('__doPostBack(\'ctl00$cphContentsArea$txtEmpCd\',\'\')', 0)" type="text" maxlength="10">

                                        <span id="cvEmpCd" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="required">社員名</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtEmpName" tabindex="2" class="imeOn" id="txtEmpName" style="width: 300px;" onfocus="this.select();" type="text" maxlength="20">

                                        <span id="cvEmpName" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="required">社員カナ名</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtEmpKana" tabindex="3" class="imeOn" id="txtEmpKana" style="width: 160px;" onfocus="this.select();" type="text" maxlength="20">
                                        <span id="cvEmpKana" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="required">部門</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtDeptCd" tabindex="4" class="imeDisabled" id="txtDeptCd" style="width: 50px;" onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;" onfocus="this.select();" onchange="javascript:setTimeout('__doPostBack(\'ctl00$cphContentsArea$txtDeptCd\',\'\')', 0)" type="text" maxlength="6">
                                        <input name="ctl00$cphContentsArea$btnSearchDeptCd" tabindex="5" class="SearchButton" id="btnSearchDeptCd" onclick="SetDeptItem();__doPostBack('ctl00$cphContentsArea$btnSearchDeptCd','')" type="button" value="?">
                                        <span class="OutlineLabel" id="lblDeptName" style="width: 280px; display: inline-block;"></span>
                                        <span id="cvDeptCd" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>入社年月日</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtEntYear" tabindex="6" class="imeDisabled" id="txtEntYear" FilterType="Numbers" style="width: 40px;" onfocus="this.select();" onchange="AddDropDownList('txtEntYear', 'ddlEntMonth', 'ddlEntDay')" type="text" maxlength="4">

                                        &nbsp;年&nbsp;
                                        <select name="ctl00$cphContentsArea$ddlEntMonth" tabindex="7" class="imeDisabled" id="ddlEntMonth" style="width: 50px;" onchange="AddDropDownList('txtEntYear', 'ddlEntMonth', 'ddlEntDay')">
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
                                        <select name="ctl00$cphContentsArea$ddlEntDay" tabindex="8" class="imeDisabled" id="ddlEntDay" style="width: 50px;">
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
                                        <span id="cvEntDate" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>退職年月日</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtRetYear" tabindex="9" class="imeDisabled" id="txtRetYear" style="width: 40px;" onfocus="this.select();" onchange="AddDropDownList('txtRetYear', 'ddlRetMonth', 'ddlRetDay')" type="text" maxlength="4">

                                        &nbsp;年&nbsp;
                                        <select name="ctl00$cphContentsArea$ddlRetMonth" tabindex="10" class="imeDisabled" id="ddlRetMonth" style="width: 50px;" onchange="AddDropDownList('txtRetYear', 'ddlRetMonth', 'ddlRetDay')">
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
                                        <select name="ctl00$cphContentsArea$ddlRetDay" tabindex="11" class="imeDisabled" id="ddlRetDay" style="width: 50px;">
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
                                        <span id="cvRetDate" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="required">在籍区分</th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlRegCls" tabindex="12" id="ddlRegCls" style="width: 80px;">
                                            <option selected="selected" value=""></option>
                                            <option value="00">在籍</option>
                                            <option value="01">休職</option>
                                            <option value="02">退職</option>

                                        </select>
                                        <span id="cvRegCls" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>生年月日</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtBirthYear" tabindex="13" class="imeDisabled" id="txtBirthYear" style="width: 40px;" onfocus="this.select();" onchange="AddDropDownList('txtBirthYear', 'ddlBirthMonth', 'ddlBirthDay')" type="text" maxlength="4">

                                        &nbsp;年&nbsp;
                                        <select name="ctl00$cphContentsArea$ddlBirthMonth" tabindex="14" class="imeDisabled" id="ddlBirthMonth" style="width: 50px;" onchange="AddDropDownList('txtBirthYear', 'ddlBirthMonth', 'ddlBirthDay')">
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
                                        <select name="ctl00$cphContentsArea$ddlBirthDay" tabindex="15" class="imeDisabled" id="ddlBirthDay" style="width: 50px;">
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
                                        <span id="cvBirthDate" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="required">性別</th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlSexCls" tabindex="16" id="ddlSexCls" style="width: 50px;">
                                            <option selected="selected" value=""></option>
                                            <option value="00">男</option>
                                            <option value="01">女</option>

                                        </select>
                                        <span id="cvSexCls" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="required">社員区分</th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlEmpCls" tabindex="17" id="ddlEmpCls" style="width: 300px;">
                                            <option selected="selected" value=""></option>
                                            <option value="00">役員</option>
                                            <option value="01">正社員</option>
                                            <option value="02">派遣社員</option>
                                            <option value="03">パート</option>
                                            <option value="04">アルバイト</option>

                                        </select>
                                        <span id="cvEmpCls" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="required">使用カレンダー</th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlCalendar" tabindex="18" id="ddlCalendar" style="width: 300px;">
                                            <option selected="selected" value=""></option>
                                            <option value="001">通常１(8:00～17:00)</option>
                                            <option value="002">通常2(7:00～16:00)</option>
                                            <option value="003">通常3(9:00～1800)</option>
                                            <option value="010">夜勤Ⅰ(20:00～29:00)</option>
                                            <option value="011">夜勤Ⅱ(16:00～25:00)</option>
                                            <option value="100">シフト勤務用</option>

                                        </select>
                                        <span id="cvCalendar" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>部門権限</th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlDeptAuth" tabindex="19" id="ddlDeptAuth" style="width: 300px;">
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
                                        <span id="cvDeptAuth" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>郵便番号</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtPostCd" tabindex="20" class="imeDisabled" id="txtPostCd" style="width: 70px;" onfocus="this.select();" type="text" maxlength="8">

                                    </td>
                                </tr>
                                <tr>
                                    <th>住所１</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtAddress1" tabindex="21" class="imeOn" id="txtAddress1" style="width: 430px;" onfocus="this.select();" type="text" maxlength="30">
                                    </td>
                                </tr>
                                <tr>
                                    <th>住所２</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtAddress2" tabindex="22" class="imeOn" id="txtAddress2" style="width: 430px;" onfocus="this.select();" type="text" maxlength="30">
                                    </td>
                                </tr>
                                <tr>
                                    <th>電話番号</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtTel" tabindex="23" class="imeDisabled" id="txtTel" style="width: 120px;" onfocus="this.select();" type="text" maxlength="15">


                                    </td>
                                </tr>
                                <tr>
                                    <th>携帯番号</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtCellular" tabindex="24" class="imeDisabled" id="txtCellular" style="width: 120px;" onfocus="this.select();" type="text" maxlength="15">


                                    </td>
                                </tr>
                                <tr>
                                    <th>Ｅメール</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtMail" tabindex="25" class="imeOff" id="txtMail" style="width: 360px;" onfocus="this.select();" type="text" maxlength="50">
                                    </td>
                                </tr>
                                <tr>
                                    <th>有休付与算出基準年月</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtPhGrantYear" tabindex="26" class="imeDisabled" id="txtPhGrantYear" style="width: 40px;" onfocus="this.select();" type="text" maxlength="4">

                                        &nbsp;年度&nbsp;
                                        <select name="ctl00$cphContentsArea$ddlPhGrantMonth" tabindex="27" class="imeDisabled" id="ddlPhGrantMonth" style="width: 50px;">
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
                                        <span id="cvPhGrantDate" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="required">職種区分</th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlEmpCls2" tabindex="28" id="ddlEmpCls2" style="width: 300px;">
                                            <option selected="selected" value=""></option>
                                            <option value="00">管理者</option>
                                            <option value="01">部長</option>
                                            <option value="02">課長</option>
                                            <option value="05">一般</option>

                                        </select>
                                        <span id="cvEmpCls2" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="required">締日</th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlClosingDate" tabindex="29" id="ddlClosingDate" style="width: 150px;">
                                            <option value=""></option>
                                            <option value="15">１５日締</option>
                                            <option value="25">２５日締</option>
                                            <option selected="selected" value="31">末締</option>

                                        </select>
                                        <span id="cvClosingDate" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>所属</th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlCompany" tabindex="30" id="ddlCompany" style="width: 300px;">
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
                                        <input name="ctl00$cphContentsArea$txtEmp2Cd" tabindex="31" class="imeDisabled" id="txtEmp2Cd" style="width: 80px;" onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;" onfocus="this.select();" onchange="javascript:setTimeout('__doPostBack(\'ctl00$cphContentsArea$txtEmp2Cd\',\'\')', 0)" type="text" maxlength="10">

                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="line"></div>

                        <p class="ButtonField1">
                            <input name="ctl00$cphContentsArea$btnUpdate" tabindex="29" id="btnUpdate" onclick="if(confirm('更新します。よろしいですか?') ==  false){ return false;};WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions())" type="button" value="更新">
                            <input name="ctl00$cphContentsArea$btnCancel" tabindex="30" id="btnCancel" onclick="CloseSubWindow();__doPostBack('ctl00$cphContentsArea$btnCancel','')" type="button" value="キャンセル">
                            <input name="ctl00$cphContentsArea$btnDelete" tabindex="31" disabled="disabled" id="btnDelete" type="button" value="削除">
                        </p>

                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection
