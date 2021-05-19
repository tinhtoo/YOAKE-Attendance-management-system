<!-- 出退勤情報クリア処理画面 -->
@extends('menu.main')
@section('title', '出退勤情報クリア処理')
@section('content')
    <div id="contents-stage">
        <table class="BaseContainerStyle1">
            <tbody>
                <tr>
                    <td>
                        <div id="ctl00_cphContentsArea_UpdatePanel1">

                            <table class="InputFieldStyle1">
                                <tbody>
                                    <tr>
                                        <th>削除区分</th>
                                        <td>
                                            <div class="GroupBox1">
                                                <input name="ctl00$cphContentsArea$DeleteCategory" tabindex="1"
                                                    id="ctl00_cphContentsArea_rbEmpCls" type="radio" checked="checked"
                                                    value="rbEmpCls"><label for="ctl00_cphContentsArea_rbEmpCls">社員</label>
                                                <input name="ctl00$cphContentsArea$DeleteCategory" tabindex="2"
                                                    id="ctl00_cphContentsArea_rbDeptCls"
                                                    onclick="javascript:setTimeout('__doPostBack(\'ctl00$cphContentsArea$rbDeptCls\',\'\')', 0)"
                                                    type="radio" value="rbDeptCls"><label
                                                    for="ctl00_cphContentsArea_rbDeptCls">部門</label>
                                                <div class="clearBoth"></div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="InputFieldStyle1">
                                <tbody>
                                    <tr>
                                        <th>開始対象日</th>
                                        <td>
                                            <input name="ctl00$cphContentsArea$txtStartTargetYear" tabindex="3"
                                                class="imeDisabled" id="ctl00_cphContentsArea_txtStartTargetYear"
                                                style="width: 40px;" onfocus="this.select();"
                                                onchange="AddDropDownList('ctl00_cphContentsArea_txtStartTargetYear', 'ctl00_cphContentsArea_ddlStartTargetMonth', 'ctl00_cphContentsArea_ddlStartTargetDay')"
                                                type="text" maxlength="4" value="2021">

                                            &nbsp;年&nbsp;
                                            <select name="ctl00$cphContentsArea$ddlStartTargetMonth" tabindex="4"
                                                class="imeDisabled" id="ctl00_cphContentsArea_ddlStartTargetMonth"
                                                style="width: 50px;"
                                                onchange="AddDropDownList('ctl00_cphContentsArea_txtStartTargetYear', 'ctl00_cphContentsArea_ddlStartTargetMonth', 'ctl00_cphContentsArea_ddlStartTargetDay')">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option selected="selected" value="5">5</option>
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
                                                <option selected="selected" value="12">12</option>
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
                                            <input name="ctl00$cphContentsArea$txtEndTargetYear" tabindex="6"
                                                class="imeDisabled" id="ctl00_cphContentsArea_txtEndTargetYear"
                                                style="width: 40px;" onfocus="this.select();"
                                                onchange="AddDropDownList('ctl00_cphContentsArea_txtEndTargetYear', 'ctl00_cphContentsArea_ddlEndTargetMonth', 'ctl00_cphContentsArea_ddlEndTargetDay')"
                                                type="text" maxlength="4" value="2021">

                                            &nbsp;年&nbsp;
                                            <select name="ctl00$cphContentsArea$ddlEndTargetMonth" tabindex="7"
                                                class="imeDisabled" id="ctl00_cphContentsArea_ddlEndTargetMonth"
                                                style="width: 50px;"
                                                onchange="AddDropDownList('ctl00_cphContentsArea_txtEndTargetYear', 'ctl00_cphContentsArea_ddlEndTargetMonth', 'ctl00_cphContentsArea_ddlEndTargetDay')">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option selected="selected" value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>

                                            </select>
                                            &nbsp;月&nbsp;
                                            <select name="ctl00$cphContentsArea$ddlEndTargetDay" tabindex="8"
                                                class="imeDisabled" id="ctl00_cphContentsArea_ddlEndTargetDay"
                                                style="width: 50px;">
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
                                                <option selected="selected" value="12">12</option>
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
                                </tbody>
                            </table>

                            <div class="line"></div>

                            <div id="ctl00_cphContentsArea_pnlEmpCls">

                                <table class="InputFieldStyle1">
                                    <tbody>
                                        <tr>
                                            <th>社員番号</th>
                                            <td>
                                                <input name="ctl00$cphContentsArea$txtEmpCd" tabindex="9"
                                                    class="imeDisabled" id="ctl00_cphContentsArea_txtEmpCd"
                                                    style="width: 80px;"
                                                    onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;"
                                                    onfocus="this.select();"
                                                    onchange="javascript:setTimeout('__doPostBack(\'ctl00$cphContentsArea$txtEmpCd\',\'\')', 0)"
                                                    type="text" maxlength="10">
                                                <input name="ctl00$cphContentsArea$btnSearchEmpCd" tabindex="10"
                                                    class="SearchButton" id="ctl00_cphContentsArea_btnSearchEmpCd"
                                                    onclick="SetEmpItem();__doPostBack('ctl00$cphContentsArea$btnSearchEmpCd','')"
                                                    type="button" value="?">
                                                <span class="OutlineLabel" id="ctl00_cphContentsArea_lblEmpName"
                                                    style="width: 200px; height: 17px; display: inline-block;"></span>

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>

                            <div class="line"></div>

                            <p class="ButtonField1">
                                <input name="ctl00$cphContentsArea$btnDataClear" tabindex="15"
                                    id="ctl00_cphContentsArea_btnDataClear"
                                    onclick="if(confirm('データをクリアしますか？') ==  false){ return false;};WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$cphContentsArea$btnDataClear&quot;, &quot;&quot;, true, &quot;DataClear&quot;, &quot;&quot;, false, true))"
                                    type="button" value="データクリア">
                                <input name="ctl00$cphContentsArea$btnCancel" tabindex="16"
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
