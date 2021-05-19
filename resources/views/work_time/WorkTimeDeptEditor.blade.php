<!-- 出退勤入力（部門別）画面 -->
@extends('menu.main')

@section('title','出退勤入力(部門別)')

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
                                        <option selected="selected" value="2020">2020</option>
                                        <option selected="" value="2021">2021</option>
                                        <option selected="" value="2022">2022</option>
                                        </select>
                                        &nbsp;年
                                        <input name="ctl00$cphContentsArea$hdnTargetYear" id="ctl00_cphContentsArea_hdnTargetYear" type="hidden" value="">
                                        <select name="ctl00$cphContentsArea$ddlTargetMonth" tabindex="2" class="imeDisabled" id="ctl00_cphContentsArea_ddlTargetMonth" onchange="SetTargetDate()">
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
                                        <input name="ctl00$cphContentsArea$hdnTargetMonth" id="ctl00_cphContentsArea_hdnTargetMonth" type="hidden" value="">
                                    </td>
                                </tr>
                                <tr>
                                    <th>部門</th>
                                    <td>
                                    <input name="ctl00$cphContentsArea$txtEmpCd" tabindex="3" class="imeDisabled" id="ctl00_cphContentsArea_txtEmpCd" style="width: 80px;" onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;" onfocus="this.select();" onchange="javascript:setTimeout('__doPostBack(\'ctl00$cphContentsArea$txtEmpCd\',\'\')', 0)" type="text" maxlength="10">
                                    <input name="ctl00$cphContentsArea$btnSearchEmpCd" tabindex="4" class="SearchButton" id="ctl00_cphContentsArea_btnSearchEmpCd" onclick="SetEmpItem();__doPostBack('ctl00$cphContentsArea$btnSearchEmpCd','')" type="button" value="?">
                                    <span class="OutlineLabel" id="ctl00_cphContentsArea_lblEmpName" style="width: 200px; height: 17px; display: inline-block;"></span>
                                    </td>
                                </tr>
                                <tr>
                                <th>開始所属</th>
                                <td>
                                    <select name="ctl00$cphContentsArea$ddlStartCompany" tabindex="6" id="ctl00_cphContentsArea_ddlStartCompany" style="width: 300px;">
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
                                    <select name="ctl00$cphContentsArea$ddlEndCompany" tabindex="7" id="ctl00_cphContentsArea_ddlEndCompany" style="width: 300px;">
                                        <option selected="selected" value=""></option>
                                        <option value="001">A派遣</option>
                                        <option value="002">B派遣</option>
                                        <option value="003">C派遣</option>

                                    </select>
                
                                </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="line"><hr></div>

                        <table>
                            <tbody>
                                <tr>
                                    <td style="width: auto;">
                                        <input name="ctl00$cphContentsArea$btnDisp" tabindex="7" class="ButtonStyle1" id="ctl00_cphContentsArea_btnDisp" onclick='javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions("ctl00$cphContentsArea$btnDisp", "", true, "Search", "", false, true))' type="button" value="表示">
                                        <input name="ctl00$cphContentsArea$btnCancel2" tabindex="8" class="ButtonStyle1" id="ctl00_cphContentsArea_btnCancel2" onclick="CloseSubWindow();__doPostBack('ctl00$cphContentsArea$btnCancel2','')" type="button" value="キャンセル">
                                        &nbsp;
                                        <span id="ctl00_cphContentsArea_lblNoStampColor" style="background-color: tomato;">　　　</span>
                                        <span id="ctl00_cphContentsArea_lblNoStamp">未打刻</span>
                                        &nbsp;
                                        <span id="ctl00_cphContentsArea_lblDbStampColor" style="background-color: lightskyblue;">　　　</span>
                                        <span id="ctl00_cphContentsArea_lblDbStamp">二重打刻</span>
                                        &nbsp;
                                        <span class="font-style2" id="ctl00_cphContentsArea_lblFixMsg"></span>
                                    </td>
                                    <td class="right">
                                        <span class="font-style1" id="ctl00_cphContentsArea_lblDispCaldDate"></span>
                                        &nbsp;
                                        <span class="font-style1" id="ctl00_cphContentsArea_lblDispOfcTime"></span>
                                        &nbsp;
                                        <span class="font-style1" id="ctl00_cphContentsArea_lblDispLevTime"></span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <!-- detail -->
                        <input name="ctl00$cphContentsArea$hdnCvClientIdList" id="ctl00_cphContentsArea_hdnCvClientIdList" type="hidden" value="ctl00_cphContentsArea_gvWorkTime_ctl02_cvOfcTime,ctl00_cphContentsArea_gvWorkTime_ctl02_cvLevTime,ctl00_cphContentsArea_gvWorkTime_ctl02_cvOut1Time,ctl00_cphContentsArea_gvWorkTime_ctl02_cvIn1Time,ctl00_cphContentsArea_gvWorkTime_ctl02_cvOut2Time,ctl00_cphContentsArea_gvWorkTime_ctl02_cvIn2Time,ctl00_cphContentsArea_gvWorkTime_ctl02_cvWorkTime,ctl00_cphContentsArea_gvWorkTime_ctl02_cvTardTime,ctl00_cphContentsArea_gvWorkTime_ctl02_cvLeaveTime,ctl00_cphContentsArea_gvWorkTime_ctl02_cvOutTime,ctl00_cphContentsArea_gvWorkTime_ctl02_cvOvtm1Time,ctl00_cphContentsArea_gvWorkTime_ctl02_cvOvtm2Time,ctl00_cphContentsArea_gvWorkTime_ctl02_cvOvtm3Time,ctl00_cphContentsArea_gvWorkTime_ctl02_cvOvtm4Time,ctl00_cphContentsArea_gvWorkTime_ctl02_cvOvtm5Time,ctl00_cphContentsArea_gvWorkTime_ctl02_cvOvtm6Time,ctl00_cphContentsArea_gvWorkTime_ctl02_cvExt1Time,ctl00_cphContentsArea_gvWorkTime_ctl02_cvExt2Time,ctl00_cphContentsArea_gvWorkTime_ctl02_cvExt3Time">
                        <div class="GridViewStyle1" id="gridview-container">
                            <div class="GridViewPanelStyle1" style="width: 1084px;">
                                <div id="ctl00_cphContentsArea_pnlWorkTime">
                                    <div>
                                        <table class="GridViewBorder GridViewRowCenter GridViewPadding" id="ctl00_cphContentsArea_gvWorkTime" style="border-collapse: collapse;" border="1" rules="all" cellspacing="0">
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
                        <span id="ctl00_cphContentsArea_lblErrMsg" style="color: red;"></span>
                        </div>

                        <br>
                        <!-- footer -->
                        <div class="line"><hr></div>
                        <p class="ButtonField2">
                            <input name="ctl00$cphContentsArea$btnCancel" tabindex="9" id="ctl00_cphContentsArea_btnCancel" onclick="CloseSubWindow();__doPostBack('ctl00$cphContentsArea$btnCancel','')" type="button" value="キャンセル">
                        </p>
                    </div>      
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
