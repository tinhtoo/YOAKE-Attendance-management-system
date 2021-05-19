<!-- 勤務実績表(日・週・月別)画面 -->
@extends('menu.main')

@section('title', '勤務実績表(日・週・月別)')

@section('content')
    <div id="contents-stage">
        <table class="BaseContainerStyle2">
            <tbody>
                <tr>
                    <td>

                        <div id="ctl00_cphContentsArea_UpdatePanel4">

                            <table width="1000" class="InputFieldStyle1">
                                <tbody>
                                    <tr>
                                        <th>帳票区分</th>
                                        <td>
                                            <div class="GroupBox3">
                                                <input name="ctl00$cphContentsArea$ReportCategory" tabindex="1"
                                                    id="ctl00_cphContentsArea_rbWorkTimeDaily" type="radio"
                                                    checked="checked" value="rbWorkTimeDaily"><label
                                                    for="ctl00_cphContentsArea_rbWorkTimeDaily">日報</label>
                                                <input name="ctl00$cphContentsArea$ReportCategory" tabindex="2"
                                                    id="ctl00_cphContentsArea_rbWorkTimeEmpDailyPortrait"
                                                    onclick="javascript:setTimeout('__doPostBack(\'ctl00$cphContentsArea$rbWorkTimeEmpDailyPortrait\',\'\')', 0)"
                                                    type="radio" value="rbWorkTimeEmpDailyPortrait"><label
                                                    for="ctl00_cphContentsArea_rbWorkTimeEmpDailyPortrait">月報 A3縦
                                                    PTN1</label>
                                                <input name="ctl00$cphContentsArea$ReportCategory" tabindex="3"
                                                    id="ctl00_cphContentsArea_rbWorkTimeEmpDailyPortrait2"
                                                    onclick="javascript:setTimeout('__doPostBack(\'ctl00$cphContentsArea$rbWorkTimeEmpDailyPortrait2\',\'\')', 0)"
                                                    type="radio" value="rbWorkTimeEmpDailyPortrait2"><label
                                                    for="ctl00_cphContentsArea_rbWorkTimeEmpDailyPortrait2">月報 A3縦
                                                    PTN2</label>
                                                <input name="ctl00$cphContentsArea$ReportCategory" tabindex="4"
                                                    id="ctl00_cphContentsArea_rbWorkTimeEmpDailyLandscape"
                                                    onclick="javascript:setTimeout('__doPostBack(\'ctl00$cphContentsArea$rbWorkTimeEmpDailyLandscape\',\'\')', 0)"
                                                    type="radio" value="rbWorkTimeEmpDailyLandscape"><label
                                                    for="ctl00_cphContentsArea_rbWorkTimeEmpDailyLandscape">月報 A3横</label>
                                                <input name="ctl00$cphContentsArea$ReportCategory" tabindex="5"
                                                    id="ctl00_cphContentsArea_rbWorkTimeEmpDailyLandscape2"
                                                    onclick="javascript:setTimeout('__doPostBack(\'ctl00$cphContentsArea$rbWorkTimeEmpDailyLandscape2\',\'\')', 0)"
                                                    type="radio" value="rbWorkTimeEmpDailyLandscape2"><label
                                                    for="ctl00_cphContentsArea_rbWorkTimeEmpDailyLandscape2">月報 A4横
                                                    PTN1</label>
                                                <input name="ctl00$cphContentsArea$ReportCategory" tabindex="6"
                                                    id="ctl00_cphContentsArea_rbWorkTimeEmpDailyLandscape3"
                                                    onclick="javascript:setTimeout('__doPostBack(\'ctl00$cphContentsArea$rbWorkTimeEmpDailyLandscape3\',\'\')', 0)"
                                                    type="radio" value="rbWorkTimeEmpDailyLandscape3"><label
                                                    for="ctl00_cphContentsArea_rbWorkTimeEmpDailyLandscape3">月報 A4横
                                                    PTN2</label>
                                                <input name="ctl00$cphContentsArea$ReportCategory" tabindex="7"
                                                    id="ctl00_cphContentsArea_rbWorkTimeSum"
                                                    onclick="javascript:setTimeout('__doPostBack(\'ctl00$cphContentsArea$rbWorkTimeSum\',\'\')', 0)"
                                                    type="radio" value="rbWorkTimeSum"><label
                                                    for="ctl00_cphContentsArea_rbWorkTimeSum">集計表</label>
                                                <div class="clearBoth"></div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <table class="InputFieldStyle1">
                                <tbody>
                                    <tr>
                                        <th>出力区分</th>
                                        <td>
                                            <div class="GroupBox1">
                                                <input name="ctl00$cphContentsArea$OutputCls" tabindex="8"
                                                    id="ctl00_cphContentsArea_rbDateRange" type="radio" checked="checked"
                                                    value="rbDateRange"><label
                                                    for="ctl00_cphContentsArea_rbDateRange">日付範囲</label>
                                                <span disabled="disabled"><input name="ctl00$cphContentsArea$OutputCls"
                                                        tabindex="9" disabled="disabled"
                                                        id="ctl00_cphContentsArea_rbMonthCls"
                                                        onclick="javascript:setTimeout('__doPostBack(\'ctl00$cphContentsArea$rbMonthCls\',\'\')', 0)"
                                                        type="radio" value="rbMonthCls"><label
                                                        for="ctl00_cphContentsArea_rbMonthCls">月度</label></span>
                                                <div class="clearBoth"></div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <table class="InputFieldStyle1">
                                <tbody>
                                    <tr>
                                        <th>並順</th>
                                        <td>
                                            <div class="GroupBox1">
                                                <span disabled="disabled"><input name="ctl00$cphContentsArea$Sort"
                                                        tabindex="10" disabled="disabled"
                                                        id="ctl00_cphContentsArea_rbSortDept" type="radio" checked="checked"
                                                        value="rbSortDept"><label
                                                        for="ctl00_cphContentsArea_rbSortDept">部門</label></span>
                                                <span disabled="disabled"><input name="ctl00$cphContentsArea$Sort"
                                                        tabindex="11" disabled="disabled"
                                                        id="ctl00_cphContentsArea_rbSortSection"
                                                        onclick="javascript:setTimeout('__doPostBack(\'ctl00$cphContentsArea$rbSortSection\',\'\')', 0)"
                                                        type="radio" value="rbSortSection"><label
                                                        for="ctl00_cphContentsArea_rbSortSection">所属</label></span>
                                                <div class="clearBoth"></div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="clearBoth"></div>

                            <table class="InputFieldStyle1">
                                <tbody>
                                    <tr>
                                        <th>開始対象日</th>
                                        <td>
                                            <input name="ctl00$cphContentsArea$txtStartTargetYear" tabindex="12"
                                                class="imeDisabled" id="ctl00_cphContentsArea_txtStartTargetYear"
                                                style="width: 40px;" onfocus="this.select();"
                                                onchange="AddDropDownList('ctl00_cphContentsArea_txtStartTargetYear', 'ctl00_cphContentsArea_ddlStartTargetMonth', 'ctl00_cphContentsArea_ddlStartTargetDay')"
                                                type="text" maxlength="4">

                                            &nbsp;年&nbsp;
                                            <select name="ctl00$cphContentsArea$ddlStartTargetMonth" tabindex="13"
                                                class="imeDisabled" id="ctl00_cphContentsArea_ddlStartTargetMonth"
                                                style="width: 50px;"
                                                onchange="AddDropDownList('ctl00_cphContentsArea_txtStartTargetYear', 'ctl00_cphContentsArea_ddlStartTargetMonth', 'ctl00_cphContentsArea_ddlStartTargetDay')">
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
                                            <select name="ctl00$cphContentsArea$ddlStartTargetDay" tabindex="14"
                                                class="imeDisabled" id="ctl00_cphContentsArea_ddlStartTargetDay"
                                                style="width: 50px;">
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
                                            <span id="ctl00_cphContentsArea_cvStartTargetDate"
                                                style="color: red; display: none;">ErrorMessage</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>終了対象日</th>
                                        <td>
                                            <input name="ctl00$cphContentsArea$txtEndTargetYear" tabindex="15"
                                                class="imeDisabled" id="ctl00_cphContentsArea_txtEndTargetYear"
                                                style="width: 40px;" onfocus="this.select();"
                                                onchange="AddDropDownList('ctl00_cphContentsArea_txtEndTargetYear', 'ctl00_cphContentsArea_ddlEndTargetMonth', 'ctl00_cphContentsArea_ddlEndTargetDay')"
                                                type="text" maxlength="4">

                                            &nbsp;年&nbsp;
                                            <select name="ctl00$cphContentsArea$ddlEndTargetMonth" tabindex="16"
                                                class="imeDisabled" id="ctl00_cphContentsArea_ddlEndTargetMonth"
                                                style="width: 50px;"
                                                onchange="AddDropDownList('ctl00_cphContentsArea_txtEndTargetYear', 'ctl00_cphContentsArea_ddlEndTargetMonth', 'ctl00_cphContentsArea_ddlEndTargetDay')">
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
                                            <select name="ctl00$cphContentsArea$ddlEndTargetDay" tabindex="17"
                                                class="imeDisabled" id="ctl00_cphContentsArea_ddlEndTargetDay"
                                                style="width: 50px;">
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
                                            <span id="ctl00_cphContentsArea_cvEndTargetDate"
                                                style="color: red; display: none;">ErrorMessage</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>対象月度</th>
                                        <td>
                                            <input name="ctl00$cphContentsArea$txtTargetYear" tabindex="18"
                                                disabled="disabled" class="imeDisabled"
                                                id="ctl00_cphContentsArea_txtTargetYear" style="width: 40px;"
                                                onfocus="this.select();" type="text" maxlength="4">

                                            &nbsp;年&nbsp;
                                            <select name="ctl00$cphContentsArea$ddlTargetMonth" tabindex="19"
                                                disabled="disabled" class="imeDisabled"
                                                id="ctl00_cphContentsArea_ddlTargetMonth" style="width: 50px;">
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
                                            &nbsp;月度&nbsp;
                                            <span id="ctl00_cphContentsArea_cvTargetDate"
                                                style="color: red; display: none;">ErrorMessage</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>締日</th>
                                        <td>
                                            <select name="ctl00$cphContentsArea$ddlClosingDate" tabindex="20"
                                                disabled="disabled" id="ctl00_cphContentsArea_ddlClosingDate"
                                                style="width: 150px;">
                                                <option selected="selected" value=""></option>
                                                <option value="15">１５日締</option>
                                                <option value="25">２５日締</option>
                                                <option value="31">末締</option>

                                            </select>
                                            <span id="ctl00_cphContentsArea_CustomValidator1"
                                                style="color: red; display: none;">ErrorMessage</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>開始部門コード</th>
                                        <td>
                                            <input name="ctl00$cphContentsArea$txtStartDeptCd" tabindex="21"
                                                class="imeDisabled" id="ctl00_cphContentsArea_txtStartDeptCd"
                                                style="width: 50px;"
                                                onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;"
                                                onfocus="this.select();"
                                                onchange="javascript:setTimeout('__doPostBack(\'ctl00$cphContentsArea$txtStartDeptCd\',\'\')', 0)"
                                                type="text" maxlength="6">
                                            <input name="ctl00$cphContentsArea$btnSearchStartDeptCd" tabindex="22"
                                                class="SearchButton" id="ctl00_cphContentsArea_btnSearchStartDeptCd"
                                                onclick="SetDeptItem('ctl00_cphContentsArea_txtStartDeptCd', 'ctl00_cphContentsArea_lblStartDeptName');__doPostBack('ctl00$cphContentsArea$btnSearchStartDeptCd','')"
                                                type="button" value="?">
                                            <span class="OutlineLabel" id="ctl00_cphContentsArea_lblStartDeptName"
                                                style="width: 200px; display: inline-block;"></span>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th>終了部門コード</th>
                                        <td>
                                            <input name="ctl00$cphContentsArea$txtEndDeptCd" tabindex="23"
                                                class="imeDisabled" id="ctl00_cphContentsArea_txtEndDeptCd"
                                                style="width: 50px;"
                                                onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;"
                                                onfocus="this.select();"
                                                onchange="javascript:setTimeout('__doPostBack(\'ctl00$cphContentsArea$txtEndDeptCd\',\'\')', 0)"
                                                type="text" maxlength="6">
                                            <input name="ctl00$cphContentsArea$btnSearchEndDeptCd" tabindex="24"
                                                class="SearchButton" id="ctl00_cphContentsArea_btnSearchEndDeptCd"
                                                onclick="SetDeptItem('ctl00_cphContentsArea_txtEndDeptCd', 'ctl00_cphContentsArea_lblEndDeptName');__doPostBack('ctl00$cphContentsArea$btnSearchEndDeptCd','')"
                                                type="button" value="?">
                                            <span class="OutlineLabel" id="ctl00_cphContentsArea_lblEndDeptName"
                                                style="width: 200px; display: inline-block;"></span>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th>開始所属</th>
                                        <td>
                                            <select name="ctl00$cphContentsArea$ddlStartCompany" tabindex="25"
                                                disabled="disabled" id="ctl00_cphContentsArea_ddlStartCompany"
                                                style="width: 300px;">
                                                <option selected="selected" value=""></option>
                                                <option value="001">A派遣</option>
                                                <option value="002">B派遣</option>
                                                <option value="003">C派遣</option>

                                            </select>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th>終了所属</th>
                                        <td>
                                            <select name="ctl00$cphContentsArea$ddlEndCompany" tabindex="26"
                                                disabled="disabled" id="ctl00_cphContentsArea_ddlEndCompany"
                                                style="width: 300px;">
                                                <option selected="selected" value=""></option>
                                                <option value="001">A派遣</option>
                                                <option value="002">B派遣</option>
                                                <option value="003">C派遣</option>

                                            </select>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th>開始社員番号 </th>
                                        <td>
                                            <input name="ctl00$cphContentsArea$txtStartEmpCd" tabindex="27"
                                                class="imeDisabled" id="ctl00_cphContentsArea_txtStartEmpCd"
                                                style="width: 80px;"
                                                onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;"
                                                onfocus="this.select();"
                                                onchange="javascript:setTimeout('__doPostBack(\'ctl00$cphContentsArea$txtStartEmpCd\',\'\')', 0)"
                                                type="text" maxlength="10">
                                            <input name="ctl00$cphContentsArea$btnSearchStartEmpCd" tabindex="28"
                                                class="SearchButton" id="ctl00_cphContentsArea_btnSearchStartEmpCd"
                                                onclick="SetEmpItem('ctl00_cphContentsArea_txtStartEmpCd', 'ctl00_cphContentsArea_lblStartEmpName');__doPostBack('ctl00$cphContentsArea$btnSearchStartEmpCd','')"
                                                type="button" value="?">
                                            <span class="OutlineLabel" id="ctl00_cphContentsArea_lblStartEmpName"
                                                style="width: 200px; height: 17px; display: inline-block;"></span>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th>終了社員番号</th>
                                        <td>
                                            <input name="ctl00$cphContentsArea$txtEndEmpCd" tabindex="29"
                                                class="imeDisabled" id="ctl00_cphContentsArea_txtEndEmpCd"
                                                style="width: 80px;"
                                                onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;"
                                                onfocus="this.select();"
                                                onchange="javascript:setTimeout('__doPostBack(\'ctl00$cphContentsArea$txtEndEmpCd\',\'\')', 0)"
                                                type="text" maxlength="10">
                                            <input name="ctl00$cphContentsArea$btnSearchEndEmpCd" tabindex="30"
                                                class="SearchButton" id="ctl00_cphContentsArea_btnSearchEndEmpCd"
                                                onclick="SetEmpItem('ctl00_cphContentsArea_txtEndEmpCd', 'ctl00_cphContentsArea_lblEndEmpName');__doPostBack('ctl00$cphContentsArea$btnSearchEndEmpCd','')"
                                                type="button" value="?">
                                            <span class="OutlineLabel" id="ctl00_cphContentsArea_lblEndEmpName"
                                                style="width: 200px; height: 17px; display: inline-block;"></span>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input name="ctl00$cphContentsArea$chkRegCls" tabindex="31"
                                                id="ctl00_cphContentsArea_chkRegCls" type="checkbox"
                                                checked="checked"><label
                                                for="ctl00_cphContentsArea_chkRegCls">在籍のみ表示</label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="line"></div>
                            <p class="ButtonField1">
                                <input name="ctl00$cphContentsArea$btnPrint" tabindex="32"
                                    id="ctl00_cphContentsArea_btnPrint"
                                    onclick='if (confirm(GetQuesMessage()) == false) {return false;};WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions("ctl00$cphContentsArea$btnPrint", "", true, "Print", "", false, true))'
                                    type="button" value="印刷">
                                <input name="ctl00$cphContentsArea$btnCancel" tabindex="33"
                                    id="ctl00_cphContentsArea_btnCancel"
                                    onclick="CloseSubWindow();__doPostBack('ctl00$cphContentsArea$btnCancel','')"
                                    type="button" value="キャンセル">
                            </p>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
