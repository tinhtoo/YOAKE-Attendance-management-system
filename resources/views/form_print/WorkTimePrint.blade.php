<!-- 勤怠予定表(週・月別)画面 -->
@extends('menu.main')

@section('title', '勤怠予定表(週・月別)')

@section('content')
    <div id="contents-stage">
        <table class="BaseContainerStyle2">
            <tbody>
                <tr>
                    <td>

                        <div id="ctl00_cphContentsArea_UpdatePanel4">

                            <table class="InputFieldStyle1">
                                <tbody>
                                    <tr>
                                        <th>帳票区分</th>
                                        <td>
                                            <div class="GroupBox1">
                                                <input name="ctl00$cphContentsArea$ReportCategory" tabindex="1"
                                                    id="ctl00_cphContentsArea_rbWeek" type="radio" checked="checked"
                                                    value="rbWeek"><label for="ctl00_cphContentsArea_rbWeek">週間</label>
                                                <input name="ctl00$cphContentsArea$ReportCategory" tabindex="2"
                                                    id="ctl00_cphContentsArea_rbMonth"
                                                    onclick="javascript:setTimeout('__doPostBack(\'ctl00$cphContentsArea$rbMonth\',\'\')', 0)"
                                                    type="radio" value="rbMonth"><label
                                                    for="ctl00_cphContentsArea_rbMonth">月間</label>
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
                                            <input name="ctl00$cphContentsArea$txtStartTargetYear" tabindex="3"
                                                class="imeDisabled" id="ctl00_cphContentsArea_txtStartTargetYear"
                                                style="width: 40px;" onfocus="this.select();" onchange="AddDropDownList()"
                                                type="text" maxlength="4">

                                            &nbsp;年&nbsp;
                                            <select name="ctl00$cphContentsArea$ddlStartTargetMonth" tabindex="4"
                                                class="imeDisabled" id="ctl00_cphContentsArea_ddlStartTargetMonth"
                                                style="width: 50px;" onchange="AddDropDownList()">
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
                                            <select name="ctl00$cphContentsArea$ddlStartTargetDay" tabindex="5"
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
                                            <span id="ctl00_cphContentsArea_lblDateRange">より7日後まで</span>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th>開始部門コード</th>
                                        <td>
                                            <input name="ctl00$cphContentsArea$txtStartDeptCd" tabindex="8"
                                                class="imeDisabled" id="ctl00_cphContentsArea_txtStartDeptCd"
                                                style="width: 50px;"
                                                onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;"
                                                onfocus="this.select();"
                                                onchange="javascript:setTimeout('__doPostBack(\'ctl00$cphContentsArea$txtStartDeptCd\',\'\')', 0)"
                                                type="text" maxlength="6">
                                            <input name="ctl00$cphContentsArea$btnSearchStartDeptCd" tabindex="9"
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
                                            <input name="ctl00$cphContentsArea$txtEndDeptCd" tabindex="10"
                                                class="imeDisabled" id="ctl00_cphContentsArea_txtEndDeptCd"
                                                style="width: 50px;"
                                                onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;"
                                                onfocus="this.select();"
                                                onchange="javascript:setTimeout('__doPostBack(\'ctl00$cphContentsArea$txtEndDeptCd\',\'\')', 0)"
                                                type="text" maxlength="6">
                                            <input name="ctl00$cphContentsArea$btnSearchEndDeptCd" tabindex="11"
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
                                            <input name="ctl00$cphContentsArea$txtStartEmpCd" tabindex="12"
                                                class="imeDisabled" id="ctl00_cphContentsArea_txtStartEmpCd"
                                                style="width: 80px;"
                                                onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;"
                                                onfocus="this.select();"
                                                onchange="javascript:setTimeout('__doPostBack(\'ctl00$cphContentsArea$txtStartEmpCd\',\'\')', 0)"
                                                type="text" maxlength="10">
                                            <input name="ctl00$cphContentsArea$btnSearchStartEmpCd" tabindex="13"
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
                                            <input name="ctl00$cphContentsArea$txtEndEmpCd" tabindex="14"
                                                class="imeDisabled" id="ctl00_cphContentsArea_txtEndEmpCd"
                                                style="width: 80px;"
                                                onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;"
                                                onfocus="this.select();"
                                                onchange="javascript:setTimeout('__doPostBack(\'ctl00$cphContentsArea$txtEndEmpCd\',\'\')', 0)"
                                                type="text" maxlength="10">
                                            <input name="ctl00$cphContentsArea$btnSearchEndEmpCd" tabindex="15"
                                                class="SearchButton" id="ctl00_cphContentsArea_btnSearchEndEmpCd"
                                                onclick="SetEmpItem('ctl00_cphContentsArea_txtEndEmpCd', 'ctl00_cphContentsArea_lblEndEmpName');__doPostBack('ctl00$cphContentsArea$btnSearchEndEmpCd','')"
                                                type="button" value="?">
                                            <span class="OutlineLabel" id="ctl00_cphContentsArea_lblEndEmpName"
                                                style="width: 200px; height: 17px; display: inline-block;"></span>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="line"></div>
                            <p class="ButtonField1">
                                <input name="ctl00$cphContentsArea$btnPrint" tabindex="16"
                                    id="ctl00_cphContentsArea_btnPrint"
                                    onclick='if (confirm(GetQuesMessage()) == false) {return false;};WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions("ctl00$cphContentsArea$btnPrint", "", true, "Print", "", false, true))'
                                    type="button" value="印刷">
                                <input name="ctl00$cphContentsArea$btnCancel" tabindex="17"
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
