<!-- シフトパターン情報入力画面 -->
@extends('menu.main')
@section('title', 'シフトパターン情報入力')
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
                                        <th>対象月度</th>
                                        <td>
                                            <select name="ctl00$cphContentsArea$ddlCaldYear" tabindex="1"
                                                class="imeDisabled" id="ctl00_cphContentsArea_ddlCaldYear"
                                                style="width: 70px;">
                                                <option value="2020">2020</option>
                                                <option selected="selected" value="2021">2021</option>
                                                <option value="2022">2022</option>

                                            </select>
                                            &nbsp;
                                            年
                                            &nbsp;
                                            <select name="ctl00$cphContentsArea$ddlCaldMonth" tabindex="2"
                                                class="imeDisabled" id="ctl00_cphContentsArea_ddlCaldMonth"
                                                style="width: 50px;">
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
                                            &nbsp; 月度
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="InputFieldStyle1">
                                <tbody>
                                    <tr>
                                        <th>表示区分</th>
                                        <td>
                                            <div class="GroupBox1">
                                                <input name="ctl00$cphContentsArea$SearchCondition" tabindex="3"
                                                    id="ctl00_cphContentsArea_rbSearchDept" type="radio" checked="checked"
                                                    value="rbSearchDept"><label
                                                    for="ctl00_cphContentsArea_rbSearchDept">部門</label>
                                                <input name="ctl00$cphContentsArea$SearchCondition" tabindex="4"
                                                    id="ctl00_cphContentsArea_rbSearchEmp"
                                                    onclick="javascript:setTimeout('__doPostBack(\'ctl00$cphContentsArea$rbSearchEmp\',\'\')', 0)"
                                                    type="radio" value="rbSearchEmp"><label
                                                    for="ctl00_cphContentsArea_rbSearchEmp">社員</label>
                                                <div class="clearBoth"></div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="InputFieldStyle1">
                                <tbody>
                                    <tr>
                                        <th>締日</th>
                                        <td>
                                            <select name="ctl00$cphContentsArea$ddlClosingDate" tabindex="5"
                                                id="ctl00_cphContentsArea_ddlClosingDate" style="width: 150px;">
                                                <option selected="selected" value="15">１５日締</option>
                                                <option value="25">２５日締</option>
                                                <option value="31">末締</option>

                                            </select>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="InputFieldStyle1">
                                <tbody>
                                    <tr>
                                        <th>部門</th>
                                        <td>
                                            <input name="ctl00$cphContentsArea$txtDeptCd" tabindex="6" class="imeDisabled"
                                                id="ctl00_cphContentsArea_txtDeptCd" style="width: 50px;"
                                                onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;"
                                                onfocus="this.select();"
                                                onchange="javascript:setTimeout('__doPostBack(\'ctl00$cphContentsArea$txtDeptCd\',\'\')', 0)"
                                                type="text" maxlength="6">
                                            <input name="ctl00$cphContentsArea$btnSearchDeptCd" tabindex="7"
                                                class="SearchButton" id="ctl00_cphContentsArea_btnSearchDeptCd"
                                                onclick="SetDeptItem();__doPostBack('ctl00$cphContentsArea$btnSearchDeptCd','')"
                                                type="button" value="?">
                                            <span class="OutlineLabel" id="ctl00_cphContentsArea_lblDeptName"
                                                style="width: 200px; height: 17px; display: inline-block;"></span>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th>社員番号</th>
                                        <td>
                                            <input name="ctl00$cphContentsArea$txtEmpCd" tabindex="8" disabled="disabled"
                                                class="imeDisabled" id="ctl00_cphContentsArea_txtEmpCd" style="width: 80px;"
                                                onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;"
                                                onfocus="this.select();"
                                                onchange="javascript:setTimeout('__doPostBack(\'ctl00$cphContentsArea$txtEmpCd\',\'\')', 0)"
                                                type="text" maxlength="10">
                                            <input name="ctl00$cphContentsArea$btnSearchEmpCd" tabindex="9"
                                                disabled="disabled" class="SearchButton"
                                                id="ctl00_cphContentsArea_btnSearchEmpCd" type="button" value="?">
                                            <span class="OutlineLabel" id="ctl00_cphContentsArea_lblEmpName"
                                                style="width: 200px; height: 17px; display: inline-block;"></span>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="line"></div>

                            <p>
                                <input name="ctl00$cphContentsArea$btnDisp" tabindex="10" class="ButtonStyle1"
                                    id="ctl00_cphContentsArea_btnDisp"
                                    onclick='javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions("ctl00$cphContentsArea$btnDisp", "", true, "Search", "", false, true))'
                                    type="button" value="表示">
                                <input name="ctl00$cphContentsArea$btnShiftPtn" tabindex="11" disabled="disabled"
                                    class="ButtonStyle1" id="ctl00_cphContentsArea_btnShiftPtn" type="button" value="パターン">
                                <input name="ctl00$cphContentsArea$btnUpdate" tabindex="12" disabled="disabled"
                                    class="ButtonStyle1" id="ctl00_cphContentsArea_btnUpdate" type="button" value="更新">
                                <input name="ctl00$cphContentsArea$btnCancel2" tabindex="13" class="ButtonStyle1"
                                    id="ctl00_cphContentsArea_btnCancel2"
                                    onclick="CloseSubWindow();__doPostBack('ctl00$cphContentsArea$btnCancel2','')"
                                    type="button" value="キャンセル">
                                &nbsp;
                                <span class="font-style2" id="ctl00_cphContentsArea_lblFixMsg"></span>
                            </p>



                            <div class="GridViewStyle1 GridViewPanelStyle2">
                                <div class="flow">


                                    <input name="ctl00$cphContentsArea$hdnStartCaldDate"
                                        id="ctl00_cphContentsArea_hdnStartCaldDate" type="hidden">
                                    <input name="ctl00$cphContentsArea$hdnEndCaldDate"
                                        id="ctl00_cphContentsArea_hdnEndCaldDate" type="hidden">
                                    <input name="ctl00$cphContentsArea$hdnLastPtnCd" id="ctl00_cphContentsArea_hdnLastPtnCd"
                                        type="hidden">
                                    <input name="ctl00$cphContentsArea$hdnLastDayNo" id="ctl00_cphContentsArea_hdnLastDayNo"
                                        type="hidden">

                                    <div>

                                    </div>
                                </div>

                                <div class="flow">

                                    <div>

                                    </div>
                                </div>
                                <div class="clearBoth"></div>
                            </div>

                            <div class="line"></div>
                            <p class="ButtonField2">
                                <input name="ctl00$cphContentsArea$btnCancel" tabindex="18"
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
