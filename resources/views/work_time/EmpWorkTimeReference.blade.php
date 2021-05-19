<!-- 勤務状況照会(管理者用)   -->
@extends('menu.main')

@section('title','勤務状況照会(管理者用) ')

@section('content')
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
                                    <th>対象月度</th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlTargetYear" tabindex="1" class="imeDisabled" id="ctl00_cphContentsArea_ddlTargetYear" style="width: 70px;" onchange="SetTargetDate()">
                                            <option value="2020">2020</option>
                                            <option selected="selected" value="2021">2021</option>
                                            <option value="2022">2022</option>

                                        </select>
                                        &nbsp;年
                                        <input name="ctl00$cphContentsArea$hdnTargetYear" id="ctl00_cphContentsArea_hdnTargetYear" type="hidden" value="2021">
                                        <select name="ctl00$cphContentsArea$ddlTargetMonth" tabindex="2" class="imeDisabled" id="ctl00_cphContentsArea_ddlTargetMonth" onchange="SetTargetDate()">
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
                                        &nbsp;月度
                                        <input name="ctl00$cphContentsArea$hdnTargetMonth" id="ctl00_cphContentsArea_hdnTargetMonth" type="hidden" value="5">
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
                                            <input name="ctl00$cphContentsArea$SearchCondition" tabindex="3" id="ctl00_cphContentsArea_rbSearchDept" type="radio" checked="checked" value="rbSearchDept"><label for="ctl00_cphContentsArea_rbSearchDept">部門</label>
                                            <input name="ctl00$cphContentsArea$SearchCondition" tabindex="4" id="ctl00_cphContentsArea_rbSearchEmp" onclick="javascript:setTimeout('__doPostBack(\'ctl00$cphContentsArea$rbSearchEmp\',\'\')', 0)" type="radio" value="rbSearchEmp"><label for="ctl00_cphContentsArea_rbSearchEmp">社員</label>
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
                                        <select name="ctl00$cphContentsArea$ddlClosingDate" tabindex="5" id="ctl00_cphContentsArea_ddlClosingDate" style="width: 150px;">
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
                                        <input name="ctl00$cphContentsArea$txtDeptCd" tabindex="6" class="imeDisabled" id="ctl00_cphContentsArea_txtDeptCd" style="width: 50px;" onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;" onfocus="this.select();" onchange="javascript:setTimeout('__doPostBack(\'ctl00$cphContentsArea$txtDeptCd\',\'\')', 0)" type="text" maxlength="6">
                                        <input name="ctl00$cphContentsArea$btnSearchDeptCd" tabindex="7" class="SearchButton" id="ctl00_cphContentsArea_btnSearchDeptCd" onclick="SetDeptItem();__doPostBack('ctl00$cphContentsArea$btnSearchDeptCd','')" type="button" value="?">
                                        <span class="OutlineLabel" id="ctl00_cphContentsArea_lblDeptName" style="width: 200px; height: 17px; display: inline-block;"></span>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="InputFieldStyle1">
                            <tbody>
                                <tr>
                                    <th>開始所属</th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlStartCompany" tabindex="8" id="ctl00_cphContentsArea_ddlStartCompany" style="width: 300px;">
                                            <option selected="selected" value=""></option>
                                            <option value="001">A派遣</option>
                                            <option value="002">B派遣</option>
                                            <option value="003">C派遣</option>

                                        </select>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="InputFieldStyle1">
                            <tbody>
                                <tr>
                                    <th>終了所属</th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlEndCompany" tabindex="9" id="ctl00_cphContentsArea_ddlEndCompany" style="width: 300px;">
                                            <option selected="selected" value=""></option>
                                            <option value="001">A派遣</option>
                                            <option value="002">B派遣</option>
                                            <option value="003">C派遣</option>

                                        </select>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="InputFieldStyle1">
                            <tbody>
                                <tr>
                                    <th>社員番号</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtEmpCd" tabindex="10" disabled="disabled" class="imeDisabled" id="ctl00_cphContentsArea_txtEmpCd" style="width: 80px;" onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;" onfocus="this.select();" onchange="javascript:setTimeout('__doPostBack(\'ctl00$cphContentsArea$txtEmpCd\',\'\')', 0)" type="text" maxlength="10">
                                        <input name="ctl00$cphContentsArea$btnSearchEmpCd" tabindex="11" disabled="disabled" class="SearchButton" id="ctl00_cphContentsArea_btnSearchEmpCd" type="button" value="?">
                                        <span class="OutlineLabel" id="ctl00_cphContentsArea_lblEmpName" style="width: 200px; height: 17px; display: inline-block;"></span>

                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="line"></div>

                        <p>
                            <input name="ctl00$cphContentsArea$btnDisp" tabindex="12" class="ButtonStyle1" id="ctl00_cphContentsArea_btnDisp" onclick='javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions("ctl00$cphContentsArea$btnDisp", "", true, "Search", "", false, true))' type="button" value="表示">
                            <input name="ctl00$cphContentsArea$btnCancel2" tabindex="13" class="ButtonStyle1" id="ctl00_cphContentsArea_btnCancel2" onclick="CloseSubWindow();__doPostBack('ctl00$cphContentsArea$btnCancel2','')" type="button" value="キャンセル">
                            &nbsp;
                            <span class="font-style2" id="ctl00_cphContentsArea_lblFixMsg"></span>
                        </p>

                        <!-- detail -->
                        <div class="GridViewStyle1" id="gridview-container">
                            <div class="GridViewPanelStyle1" id="ctl00_cphContentsArea_pnlEmpWorkTime" style="width: 911px;">

                                <div>
                                    <table class="GridViewBorder GridViewPadding GridViewRowCenter GridViewRowCut" id="ctl00_cphContentsArea_gvEmpWorkTime" style="border-collapse: collapse;" border="1" rules="all" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <td>

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>

                        <!-- footer -->
                        <div class="line"></div>
                        <p class="ButtonField2">
                            <input name="ctl00$cphContentsArea$btnCancel" tabindex="14" id="ctl00_cphContentsArea_btnCancel" onclick="CloseSubWindow();__doPostBack('ctl00$cphContentsArea$btnCancel','')" type="button" value="キャンセル">
                        </p>


                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
