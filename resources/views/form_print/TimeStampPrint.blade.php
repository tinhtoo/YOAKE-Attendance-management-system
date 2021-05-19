<!-- 未打刻／二重打刻一覧表画面 -->
@extends('menu.main')

@section('title', '未打刻／二重打刻一覧表')

@section('content')
    <div id="contents-stage">
        <table class="BaseContainerStyle2">
            <tbody>
                <tr>
                    <td>
                        <div id="ctl00_cphContentsArea_UpdatePanel1">


                            <table class="InputFieldStyle1">
                                <tbody>
                                    <tr>
                                        <th>帳票区分</th>
                                        <td>
                                            <div class="GroupBox1">
                                                <input name="ctl00$cphContentsArea$ReportCategory" tabindex="1"
                                                    id="ctl00_cphContentsArea_rbNoTimeStamp" type="radio" checked="checked"
                                                    value="rbNoTimeStamp"><label
                                                    for="ctl00_cphContentsArea_rbNoTimeStamp">未打刻</label>
                                                <input name="ctl00$cphContentsArea$ReportCategory" tabindex="2"
                                                    id="ctl00_cphContentsArea_rbDbTimeStamp"
                                                    onclick="javascript:setTimeout('__doPostBack(\'ctl00$cphContentsArea$rbDbTimeStamp\',\'\')', 0)"
                                                    type="radio" value="rbDbTimeStamp"><label
                                                    for="ctl00_cphContentsArea_rbDbTimeStamp">二重打刻</label>
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
                                                <input name="ctl00$cphContentsArea$OutputCls" tabindex="3"
                                                    id="ctl00_cphContentsArea_rbDateRange" type="radio" checked="checked"
                                                    value="rbDateRange"><label
                                                    for="ctl00_cphContentsArea_rbDateRange">日付範囲</label>
                                                <input name="ctl00$cphContentsArea$OutputCls" tabindex="4"
                                                    id="ctl00_cphContentsArea_rbMonthCls"
                                                    onclick="javascript:setTimeout('__doPostBack(\'ctl00$cphContentsArea$rbMonthCls\',\'\')', 0)"
                                                    type="radio" value="rbMonthCls"><label
                                                    for="ctl00_cphContentsArea_rbMonthCls">月度</label>
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
                                            <input name="ctl00$cphContentsArea$txtStartTargetYear" tabindex="5"
                                                class="imeDisabled" id="ctl00_cphContentsArea_txtStartTargetYear"
                                                style="width: 40px;" onfocus="this.select();"
                                                onchange="AddDropDownList('ctl00_cphContentsArea_txtStartTargetYear', 'ctl00_cphContentsArea_ddlStartTargetMonth', 'ctl00_cphContentsArea_ddlStartTargetDay')"
                                                type="text" maxlength="4">

                                            &nbsp;年&nbsp;
                                            <select name="ctl00$cphContentsArea$ddlStartTargetMonth" tabindex="6"
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
                                            <select name="ctl00$cphContentsArea$ddlStartTargetDay" tabindex="7"
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
                                            <input name="ctl00$cphContentsArea$txtEndTargetYear" tabindex="8"
                                                class="imeDisabled" id="ctl00_cphContentsArea_txtEndTargetYear"
                                                style="width: 40px;" onfocus="this.select();"
                                                onchange="AddDropDownList('ctl00_cphContentsArea_txtEndTargetYear', 'ctl00_cphContentsArea_ddlEndTargetMonth', 'ctl00_cphContentsArea_ddlEndTargetDay')"
                                                type="text" maxlength="4">

                                            &nbsp;年&nbsp;
                                            <select name="ctl00$cphContentsArea$ddlEndTargetMonth" tabindex="9"
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
                                            <select name="ctl00$cphContentsArea$ddlEndTargetDay" tabindex="10"
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
                                            <input name="ctl00$cphContentsArea$txtTargetYear" tabindex="11"
                                                disabled="disabled" class="imeDisabled"
                                                id="ctl00_cphContentsArea_txtTargetYear" style="width: 40px;"
                                                onfocus="this.select();" type="text" maxlength="4">

                                            &nbsp;年&nbsp;
                                            <select name="ctl00$cphContentsArea$ddlTargetMonth" tabindex="12"
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
                                        <th>開始部門コード</th>
                                        <td>
                                            <input name="ctl00$cphContentsArea$txtStartDeptCd" tabindex="13"
                                                class="imeDisabled" id="ctl00_cphContentsArea_txtStartDeptCd"
                                                style="width: 50px;"
                                                onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;"
                                                onfocus="this.select();"
                                                onchange="javascript:setTimeout('__doPostBack(\'ctl00$cphContentsArea$txtStartDeptCd\',\'\')', 0)"
                                                type="text" maxlength="6">
                                            <input name="ctl00$cphContentsArea$btnSearchStartDeptCd" tabindex="14"
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
                                            <input name="ctl00$cphContentsArea$txtEndDeptCd" tabindex="15"
                                                class="imeDisabled" id="ctl00_cphContentsArea_txtEndDeptCd"
                                                style="width: 50px;"
                                                onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;"
                                                onfocus="this.select();"
                                                onchange="javascript:setTimeout('__doPostBack(\'ctl00$cphContentsArea$txtEndDeptCd\',\'\')', 0)"
                                                type="text" maxlength="6">
                                            <input name="ctl00$cphContentsArea$btnSearchEndDeptCd" tabindex="16"
                                                class="SearchButton" id="ctl00_cphContentsArea_btnSearchEndDeptCd"
                                                onclick="SetDeptItem('ctl00_cphContentsArea_txtEndDeptCd', 'ctl00_cphContentsArea_lblEndDeptName');__doPostBack('ctl00$cphContentsArea$btnSearchEndDeptCd','')"
                                                type="button" value="?">
                                            <span class="OutlineLabel" id="ctl00_cphContentsArea_lblEndDeptName"
                                                style="width: 200px; display: inline-block;"></span>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th>開始社員番号 </th>
                                        <td>
                                            <input name="ctl00$cphContentsArea$txtStartEmpCd" tabindex="17"
                                                class="imeDisabled" id="ctl00_cphContentsArea_txtStartEmpCd"
                                                style="width: 80px;"
                                                onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;"
                                                onfocus="this.select();"
                                                onchange="javascript:setTimeout('__doPostBack(\'ctl00$cphContentsArea$txtStartEmpCd\',\'\')', 0)"
                                                type="text" maxlength="10">
                                            <input name="ctl00$cphContentsArea$btnSearchStartEmpCd" tabindex="18"
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
                                            <input name="ctl00$cphContentsArea$txtEndEmpCd" tabindex="19"
                                                class="imeDisabled" id="ctl00_cphContentsArea_txtEndEmpCd"
                                                style="width: 80px;"
                                                onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;"
                                                onfocus="this.select();"
                                                onchange="javascript:setTimeout('__doPostBack(\'ctl00$cphContentsArea$txtEndEmpCd\',\'\')', 0)"
                                                type="text" maxlength="10">
                                            <input name="ctl00$cphContentsArea$btnSearchEndEmpCd" tabindex="20"
                                                class="SearchButton" id="ctl00_cphContentsArea_btnSearchEndEmpCd"
                                                onclick="SetEmpItem('ctl00_cphContentsArea_txtEndEmpCd', 'ctl00_cphContentsArea_lblEndEmpName');__doPostBack('ctl00$cphContentsArea$btnSearchEndEmpCd','')"
                                                type="button" value="?">
                                            <span class="OutlineLabel" id="ctl00_cphContentsArea_lblEndEmpName"
                                                style="width: 200px; height: 17px; display: inline-block;"></span>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input name="ctl00$cphContentsArea$chkNoTime" tabindex="21"
                                                id="ctl00_cphContentsArea_chkNoTime" type="checkbox"><label
                                                for="ctl00_cphContentsArea_chkNoTime">出勤・退社両方未打刻も含む</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input name="ctl00$cphContentsArea$chkRegCls" tabindex="22"
                                                id="ctl00_cphContentsArea_chkRegCls" type="checkbox"
                                                checked="checked"><label
                                                for="ctl00_cphContentsArea_chkRegCls">在籍のみ表示</label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="line"></div>
                            <p class="ButtonField1">
                                <input name="ctl00$cphContentsArea$btnPrint" tabindex="23"
                                    id="ctl00_cphContentsArea_btnPrint"
                                    onclick='if (confirm(GetQuesMessage()) == false) {return false;};WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions("ctl00$cphContentsArea$btnPrint", "", true, "Print", "", false, true))'
                                    type="button" value="印刷">
                                <input name="ctl00$cphContentsArea$btnCancel" tabindex="24"
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
