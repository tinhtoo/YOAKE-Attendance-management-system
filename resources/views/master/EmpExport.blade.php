<!-- 社員情報書出処理  -->
@extends('menu.main')

@section('title','社員情報書出処理 ')

@section('content')
<div id="contents-stage">
    <table class="BaseContainerStyle2">
        <tbody>
            <tr>
                <td>

                    <div id="ctl00_cphContentsArea_UpdatePanel4">


                        <div class="clearBoth"></div>

                        <table class="InputFieldStyle1">
                            <tbody>
                                <tr>
                                    <th>開始部門コード</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtStartDeptCd" tabindex="1" class="imeDisabled" id="ctl00_cphContentsArea_txtStartDeptCd" style="width: 50px;" onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;" onfocus="this.select();" onchange="javascript:setTimeout('__doPostBack(\'ctl00$cphContentsArea$txtStartDeptCd\',\'\')', 0)" type="text" maxlength="6">
                                        <input name="ctl00$cphContentsArea$btnSearchStartDeptCd" tabindex="2" class="SearchButton" id="ctl00_cphContentsArea_btnSearchStartDeptCd" onclick="SetDeptItem('ctl00_cphContentsArea_txtStartDeptCd', 'ctl00_cphContentsArea_lblStartDeptName');__doPostBack('ctl00$cphContentsArea$btnSearchStartDeptCd','')" type="button" value="?">
                                        <span class="OutlineLabel" id="ctl00_cphContentsArea_lblStartDeptName" style="width: 200px; display: inline-block;"></span>

                                    </td>
                                </tr>
                                <tr>
                                    <th>終了部門コード</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtEndDeptCd" tabindex="3" class="imeDisabled" id="ctl00_cphContentsArea_txtEndDeptCd" style="width: 50px;" onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;" onfocus="this.select();" onchange="javascript:setTimeout('__doPostBack(\'ctl00$cphContentsArea$txtEndDeptCd\',\'\')', 0)" type="text" maxlength="6">
                                        <input name="ctl00$cphContentsArea$btnSearchEndDeptCd" tabindex="4" class="SearchButton" id="ctl00_cphContentsArea_btnSearchEndDeptCd" onclick="SetDeptItem('ctl00_cphContentsArea_txtEndDeptCd', 'ctl00_cphContentsArea_lblEndDeptName');__doPostBack('ctl00$cphContentsArea$btnSearchEndDeptCd','')" type="button" value="?">
                                        <span class="OutlineLabel" id="ctl00_cphContentsArea_lblEndDeptName" style="width: 200px; display: inline-block;"></span>

                                    </td>
                                </tr>
                                <tr>
                                    <th>開始社員番号</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtStartEmpCd" tabindex="5" class="imeDisabled" id="ctl00_cphContentsArea_txtStartEmpCd" style="width: 80px;" onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;" onfocus="this.select();" onchange="javascript:setTimeout('__doPostBack(\'ctl00$cphContentsArea$txtStartEmpCd\',\'\')', 0)" type="text" maxlength="10">
                                        <input name="ctl00$cphContentsArea$btnSearchStartEmpCd" tabindex="6" class="SearchButton" id="ctl00_cphContentsArea_btnSearchStartEmpCd" onclick="SetEmpItem('ctl00_cphContentsArea_txtStartEmpCd', 'ctl00_cphContentsArea_lblStartEmpName');__doPostBack('ctl00$cphContentsArea$btnSearchStartEmpCd','')" type="button" value="?">
                                        <span class="OutlineLabel" id="ctl00_cphContentsArea_lblStartEmpName" style="width: 200px; height: 17px; display: inline-block;"></span>

                                    </td>
                                </tr>
                                <tr>
                                    <th>終了社員番号</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtEndEmpCd" tabindex="7" class="imeDisabled" id="ctl00_cphContentsArea_txtEndEmpCd" style="width: 80px;" onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;" onfocus="this.select();" onchange="javascript:setTimeout('__doPostBack(\'ctl00$cphContentsArea$txtEndEmpCd\',\'\')', 0)" type="text" maxlength="10">
                                        <input name="ctl00$cphContentsArea$btnSearchEndEmpCd" tabindex="8" class="SearchButton" id="ctl00_cphContentsArea_btnSearchEndEmpCd" onclick="SetEmpItem('ctl00_cphContentsArea_txtEndEmpCd', 'ctl00_cphContentsArea_lblEndEmpName');__doPostBack('ctl00$cphContentsArea$btnSearchEndEmpCd','')" type="button" value="?">
                                        <span class="OutlineLabel" id="ctl00_cphContentsArea_lblEndEmpName" style="width: 200px; height: 17px; display: inline-block;"></span>

                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="line"></div>
                        <p class="ButtonField1">
                            <input name="ctl00$cphContentsArea$btnExport" tabindex="9" id="ctl00_cphContentsArea_btnExport" onclick='if (confirm(GetQuesMessage()) == false) {return false;};WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions("ctl00$cphContentsArea$btnExport", "", true, "Export", "", false, true))' type="button" value="出力">
                            <input name="ctl00$cphContentsArea$btnCancel" tabindex="10" id="ctl00_cphContentsArea_btnCancel" onclick="CloseSubWindow();__doPostBack('ctl00$cphContentsArea$btnCancel','')" type="button" value="キャンセル">
                        </p>


                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection