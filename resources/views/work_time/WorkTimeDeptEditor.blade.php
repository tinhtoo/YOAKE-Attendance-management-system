<!-- 出退勤入力（部門別）画面 -->
@extends('menu.main')

@section('title','出退勤入力(部門別)')

@section('content')
<div id="contents-stage">
    <table>
        <tbody>
            <tr>
                <td>
                    <div id="UpdatePanel1">
                        <!-- header -->
                        <table class="InputFieldStyle1">
                            <tbody>
                                <tr>
                                    <th>対象月度</th>
                                    <td>
                                        <select name="ddlTargetYear" tabindex="1" class="imeDisabled" id="ddlTargetYear" style="width: 70px;" onchange="SetTargetDate()">
                                            <option selected="selected" value="2020">2020</option>
                                            <option selected="" value="2021">2021</option>
                                            <option selected="" value="2022">2022</option>
                                        </select>
                                        &nbsp;年
                                        <input name="hdnTargetYear" id="hdnTargetYear" type="hidden" value="">
                                        <select name="ddlTargetMonth" tabindex="2" class="imeDisabled" id="ddlTargetMonth" onchange="SetTargetDate()">
                                            <option selected="selected" value="1">1</option>
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
                                        &nbsp;月度
                                        <input name="hdnTargetMonth" id="hdnTargetMonth" type="hidden" value="">
                                    </td>
                                </tr>
                                <tr>
                                    <th>部門</th>
                                    <td>
                                        <input name="txtDeptCd" tabindex="4" class="imeDisabled" id="txtDeptCd" style="width: 50px;" onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;" onfocus="this.select();" onchange="javascript:setTimeout('__doPostBack(\'txtDeptCd\',\'\')', 0)" type="text" maxlength="6">
                                        <input name="btnSearchDeptCd" tabindex="5" class="SearchButton" id="btnSearchDeptCd" onclick="SetDeptItem();__doPostBack('btnSearchDeptCd','')" type="button" value="?">
                                        <span class="OutlineLabel" id="lblDeptName" style="width: 200px; height: 17px; display: inline-block;"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>開始所属</th>
                                    <td>
                                        <select name="ddlStartCompany" tabindex="6" id="ddlStartCompany" style="width: 300px;">
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
                                        <select name="ddlEndCompany" tabindex="7" id="ddlEndCompany" style="width: 300px;">
                                            <option selected="selected" value=""></option>
                                            <option value="001">A派遣</option>
                                            <option value="002">B派遣</option>
                                            <option value="003">C派遣</option>

                                        </select>

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
                                        <input name="btnDisp" tabindex="7" class="ButtonStyle1" id="btnDisp" onclick='javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions("btnDisp", "", true, "Search", "", false, true))' type="button" value="表示">
                                        <input name="btnCancel2" tabindex="8" class="ButtonStyle1" id="btnCancel2" onclick="CloseSubWindow();__doPostBack('btnCancel2','')" type="button" value="キャンセル">
                                        &nbsp;
                                        <span id="lblNoStampColor" style="background-color: tomato;">　　　</span>
                                        <span id="lblNoStamp">未打刻</span>
                                        &nbsp;
                                        <span id="lblDbStampColor" style="background-color: lightskyblue;">　　　</span>
                                        <span id="lblDbStamp">二重打刻</span>
                                        &nbsp;
                                        <span class="font-style2" id="lblFixMsg"></span>
                                    </td>
                                    <td class="right">
                                        <span class="font-style1" id="lblDispCaldDate"></span>
                                        &nbsp;
                                        <span class="font-style1" id="lblDispOfcTime"></span>
                                        &nbsp;
                                        <span class="font-style1" id="lblDispLevTime"></span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- detail -->
                        <input name="hdnCvClientIdList" id="hdnCvClientIdList" type="hidden" value="gvWorkTime_ctl02_cvOfcTime,gvWorkTime_ctl02_cvLevTime,gvWorkTime_ctl02_cvOut1Time,gvWorkTime_ctl02_cvIn1Time,gvWorkTime_ctl02_cvOut2Time,gvWorkTime_ctl02_cvIn2Time,gvWorkTime_ctl02_cvWorkTime,gvWorkTime_ctl02_cvTardTime,gvWorkTime_ctl02_cvLeaveTime,gvWorkTime_ctl02_cvOutTime,gvWorkTime_ctl02_cvOvtm1Time,gvWorkTime_ctl02_cvOvtm2Time,gvWorkTime_ctl02_cvOvtm3Time,gvWorkTime_ctl02_cvOvtm4Time,gvWorkTime_ctl02_cvOvtm5Time,gvWorkTime_ctl02_cvOvtm6Time,gvWorkTime_ctl02_cvExt1Time,gvWorkTime_ctl02_cvExt2Time,gvWorkTime_ctl02_cvExt3Time">
                        <div class="GridViewStyle1" id="gridview-container">
                            <div class="GridViewPanelStyle1" style="width: 1084px;">
                                <div id="pnlWorkTime">
                                    <div>
                                        <table class="GridViewBorder GridViewRowCenter GridViewPadding" id="gvWorkTime" style="border-collapse: collapse;" border="1" rules="all" cellspacing="0">
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
                        </div>

                        <div>
                            <!-- ErrorMessage -->
                            <span id="lblErrMsg" style="color: red;"></span>
                        </div>

                        <br>
                        <!-- footer -->
                        <div class="line">
                            <hr>
                        </div>
                        <p class="ButtonField2">
                            <input name="btnCancel" tabindex="9" id="btnCancel" onclick="CloseSubWindow();__doPostBack('btnCancel','')" type="button" value="キャンセル">
                        </p>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection