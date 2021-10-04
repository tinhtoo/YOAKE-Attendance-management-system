<!-- 社員情報書出処理  -->
@extends('menu.main')

@section('title','社員情報書出処理 ')

@section('content')
<div id="contents-stage">
    <table class="BaseContainerStyle2">
        <tbody>
            <tr>
                <td>

                    <div id="UpdatePanel4">


                        <div class="clearBoth"></div>

                        <table class="InputFieldStyle1">
                            <tbody>
                                <tr>
                                    <th>開始部門コード</th>
                                    <td>
                                        <input name="txtStartDeptCd" tabindex="1" class="imeDisabled" id="txtStartDeptCd" style="width: 50px;" onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;" onfocus="this.select();" onchange="javascript:setTimeout('__doPostBack(\'txtStartDeptCd\',\'\')', 0)" type="text" maxlength="6">
                                        <input name="btnSearchStartDeptCd" tabindex="2" class="SearchButton" id="btnSearchStartDeptCd" onclick="SetDeptItem()" type="button" value="?">
                                        <span class="OutlineLabel" id="lblStartDeptName" style="width: 200px; display: inline-block;"></span>

                                    </td>
                                </tr>
                                <tr>
                                    <th>終了部門コード</th>
                                    <td>
                                        <input name="txtEndDeptCd" tabindex="3" class="imeDisabled" id="txtEndDeptCd" style="width: 50px;" onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;" onfocus="this.select();" onchange="javascript:setTimeout('__doPostBack(\'txtEndDeptCd\',\'\')', 0)" type="text" maxlength="6">
                                        <input name="btnSearchEndDeptCd" tabindex="4" class="SearchButton" id="btnSearchEndDeptCd" onclick="SetDeptItem('txtEndDeptCd', 'lblEndDeptName');__doPostBack('btnSearchEndDeptCd','')" type="button" value="?">
                                        <span class="OutlineLabel" id="lblEndDeptName" style="width: 200px; display: inline-block;"></span>

                                    </td>
                                </tr>
                                <tr>
                                    <th>開始社員番号</th>
                                    <td>
                                        <input name="txtStartEmpCd" tabindex="5" class="imeDisabled" id="txtStartEmpCd" style="width: 80px;" onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;" onfocus="this.select();" onchange="javascript:setTimeout('__doPostBack(\'txtStartEmpCd\',\'\')', 0)" type="text" maxlength="10">
                                        <input name="btnSearchStartEmpCd" tabindex="6" class="SearchButton" id="btnSearchStartEmpCd" onclick="SetEmpItem('txtStartEmpCd', 'lblStartEmpName');__doPostBack('btnSearchStartEmpCd','')" type="button" value="?">
                                        <span class="OutlineLabel" id="lblStartEmpName" style="width: 200px; height: 17px; display: inline-block;"></span>

                                    </td>
                                </tr>
                                <tr>
                                    <th>終了社員番号</th>
                                    <td>
                                        <input name="txtEndEmpCd" tabindex="7" class="imeDisabled" id="txtEndEmpCd" style="width: 80px;" onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;" onfocus="this.select();" onchange="javascript:setTimeout('__doPostBack(\'txtEndEmpCd\',\'\')', 0)" type="text" maxlength="10">
                                        <input name="btnSearchEndEmpCd" tabindex="8" class="SearchButton" id="btnSearchEndEmpCd" onclick="SetEmpItem('txtEndEmpCd', 'lblEndEmpName');__doPostBack('btnSearchEndEmpCd','')" type="button" value="?">
                                        <span class="OutlineLabel" id="lblEndEmpName" style="width: 200px; height: 17px; display: inline-block;"></span>

                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="line"></div>
                        <p class="ButtonField1">
                            <input name="btnExport" tabindex="9" id="btnExport" onclick='if (confirm(GetQuesMessage()) == false) {return false;};WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions("btnExport", "", true, "Export", "", false, true))' type="button" value="出力">
                            <input name="btnCancel" tabindex="10" id="btnCancel" onclick="CloseSubWindow();__doPostBack('btnCancel','')" type="button" value="キャンセル">
                        </p>


                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection