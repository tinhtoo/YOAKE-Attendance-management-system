<!-- 部門権限情報入力 -->
@extends('menu.main')

@section('title','部門権限情報入力')

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
                                    <th>部門権限コード</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtDeptAuthCd" tabindex="1" class="imeDisabled" id="ctl00_cphContentsArea_txtDeptAuthCd" style="width: 50px;" onfocus="this.select();" type="text" maxlength="6">

                                        <span id="ctl00_cphContentsArea_cvDeptAuthCd" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>部門権限名</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtDeptAuthName" tabindex="2" class="imeOn" id="ctl00_cphContentsArea_txtDeptAuthName" style="width: 300px;" onfocus="this.select();" type="text" maxlength="20">

                                        <span id="ctl00_cphContentsArea_cvDeptAuthName" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="line"></div>

                        <input name="ctl00$cphContentsArea$btnSelectAll" tabindex="3" id="ctl00_cphContentsArea_btnSelectAll" onclick="ChangeAllCheckBoxStates('ctl00_cphContentsArea_gvDeptAuth_ctl02_chkIsSelect,ctl00_cphContentsArea_gvDeptAuth_ctl03_chkIsSelect,ctl00_cphContentsArea_gvDeptAuth_ctl04_chkIsSelect,ctl00_cphContentsArea_gvDeptAuth_ctl05_chkIsSelect,ctl00_cphContentsArea_gvDeptAuth_ctl06_chkIsSelect,ctl00_cphContentsArea_gvDeptAuth_ctl07_chkIsSelect,ctl00_cphContentsArea_gvDeptAuth_ctl08_chkIsSelect,ctl00_cphContentsArea_gvDeptAuth_ctl09_chkIsSelect,ctl00_cphContentsArea_gvDeptAuth_ctl10_chkIsSelect,ctl00_cphContentsArea_gvDeptAuth_ctl11_chkIsSelect,ctl00_cphContentsArea_gvDeptAuth_ctl12_chkIsSelect,ctl00_cphContentsArea_gvDeptAuth_ctl13_chkIsSelect,ctl00_cphContentsArea_gvDeptAuth_ctl14_chkIsSelect,ctl00_cphContentsArea_gvDeptAuth_ctl15_chkIsSelect,ctl00_cphContentsArea_gvDeptAuth_ctl16_chkIsSelect,ctl00_cphContentsArea_gvDeptAuth_ctl17_chkIsSelect,ctl00_cphContentsArea_gvDeptAuth_ctl18_chkIsSelect,ctl00_cphContentsArea_gvDeptAuth_ctl19_chkIsSelect', true)" type="button" value="全選択">
                        <input name="ctl00$cphContentsArea$btnNotSelectAll" tabindex="4" id="ctl00_cphContentsArea_btnNotSelectAll" onclick="ChangeAllCheckBoxStates('ctl00_cphContentsArea_gvDeptAuth_ctl02_chkIsSelect,ctl00_cphContentsArea_gvDeptAuth_ctl03_chkIsSelect,ctl00_cphContentsArea_gvDeptAuth_ctl04_chkIsSelect,ctl00_cphContentsArea_gvDeptAuth_ctl05_chkIsSelect,ctl00_cphContentsArea_gvDeptAuth_ctl06_chkIsSelect,ctl00_cphContentsArea_gvDeptAuth_ctl07_chkIsSelect,ctl00_cphContentsArea_gvDeptAuth_ctl08_chkIsSelect,ctl00_cphContentsArea_gvDeptAuth_ctl09_chkIsSelect,ctl00_cphContentsArea_gvDeptAuth_ctl10_chkIsSelect,ctl00_cphContentsArea_gvDeptAuth_ctl11_chkIsSelect,ctl00_cphContentsArea_gvDeptAuth_ctl12_chkIsSelect,ctl00_cphContentsArea_gvDeptAuth_ctl13_chkIsSelect,ctl00_cphContentsArea_gvDeptAuth_ctl14_chkIsSelect,ctl00_cphContentsArea_gvDeptAuth_ctl15_chkIsSelect,ctl00_cphContentsArea_gvDeptAuth_ctl16_chkIsSelect,ctl00_cphContentsArea_gvDeptAuth_ctl17_chkIsSelect,ctl00_cphContentsArea_gvDeptAuth_ctl18_chkIsSelect,ctl00_cphContentsArea_gvDeptAuth_ctl19_chkIsSelect', false)" type="button" value="全解除">
                        <span id="ctl00_cphContentsArea_cvDeptAuth" style="color: red; display: none;">ErrorMessage</span>

                        <div class="GridViewStyle1 mg10" id="gridview-container">
                            <div class="GridViewPanelStyle7" id="ctl00_cphContentsArea_pnlDeptAuth">

                                <div>
                                    <table tabindex="5" class="GridViewBorder GridViewPadding" id="ctl00_cphContentsArea_gvDeptAuth" style="border-collapse: collapse;" border="1" rules="all" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <th scope="col">&nbsp;</th>
                                                <th scope="col">部門</th>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvDeptAuth$ctl02$chkIsSelect" id="ctl00_cphContentsArea_gvDeptAuth_ctl02_chkIsSelect" type="checkbox">
                                                </td>
                                                <td class="GridViewRowLeft">
                                                    <span class="OutlineLabel" id="ctl00_cphContentsArea_gvDeptAuth_ctl02_lblDeptName" style="width: 300px; height: 17px; display: inline-block;">アイティーエス</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvDeptAuth$ctl03$chkIsSelect" id="ctl00_cphContentsArea_gvDeptAuth_ctl03_chkIsSelect" type="checkbox">
                                                </td>
                                                <td class="GridViewRowLeft">
                                                    <span class="OutlineLabel" id="ctl00_cphContentsArea_gvDeptAuth_ctl03_lblDeptName" style="width: 300px; height: 17px; display: inline-block;">　　　営業部</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvDeptAuth$ctl04$chkIsSelect" id="ctl00_cphContentsArea_gvDeptAuth_ctl04_chkIsSelect" type="checkbox">
                                                </td>
                                                <td class="GridViewRowLeft">
                                                    <span class="OutlineLabel" id="ctl00_cphContentsArea_gvDeptAuth_ctl04_lblDeptName" style="width: 300px; height: 17px; display: inline-block;">　　　　　　営業一課</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvDeptAuth$ctl05$chkIsSelect" id="ctl00_cphContentsArea_gvDeptAuth_ctl05_chkIsSelect" type="checkbox">
                                                </td>
                                                <td class="GridViewRowLeft">
                                                    <span class="OutlineLabel" id="ctl00_cphContentsArea_gvDeptAuth_ctl05_lblDeptName" style="width: 300px; height: 17px; display: inline-block;">　　　　　　営業二課</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvDeptAuth$ctl06$chkIsSelect" id="ctl00_cphContentsArea_gvDeptAuth_ctl06_chkIsSelect" type="checkbox">
                                                </td>
                                                <td class="GridViewRowLeft">
                                                    <span class="OutlineLabel" id="ctl00_cphContentsArea_gvDeptAuth_ctl06_lblDeptName" style="width: 300px; height: 17px; display: inline-block;">　　　製造部</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvDeptAuth$ctl07$chkIsSelect" id="ctl00_cphContentsArea_gvDeptAuth_ctl07_chkIsSelect" type="checkbox">
                                                </td>
                                                <td class="GridViewRowLeft">
                                                    <span class="OutlineLabel" id="ctl00_cphContentsArea_gvDeptAuth_ctl07_lblDeptName" style="width: 300px; height: 17px; display: inline-block;">　　　　　　製造一課</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvDeptAuth$ctl08$chkIsSelect" id="ctl00_cphContentsArea_gvDeptAuth_ctl08_chkIsSelect" type="checkbox">
                                                </td>
                                                <td class="GridViewRowLeft">
                                                    <span class="OutlineLabel" id="ctl00_cphContentsArea_gvDeptAuth_ctl08_lblDeptName" style="width: 300px; height: 17px; display: inline-block;">　　　　　　製造二課</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvDeptAuth$ctl09$chkIsSelect" id="ctl00_cphContentsArea_gvDeptAuth_ctl09_chkIsSelect" type="checkbox">
                                                </td>
                                                <td class="GridViewRowLeft">
                                                    <span class="OutlineLabel" id="ctl00_cphContentsArea_gvDeptAuth_ctl09_lblDeptName" style="width: 300px; height: 17px; display: inline-block;">　　　　　　製造三課</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvDeptAuth$ctl10$chkIsSelect" id="ctl00_cphContentsArea_gvDeptAuth_ctl10_chkIsSelect" type="checkbox">
                                                </td>
                                                <td class="GridViewRowLeft">
                                                    <span class="OutlineLabel" id="ctl00_cphContentsArea_gvDeptAuth_ctl10_lblDeptName" style="width: 300px; height: 17px; display: inline-block;">　　　経理部</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvDeptAuth$ctl11$chkIsSelect" id="ctl00_cphContentsArea_gvDeptAuth_ctl11_chkIsSelect" type="checkbox">
                                                </td>
                                                <td class="GridViewRowLeft">
                                                    <span class="OutlineLabel" id="ctl00_cphContentsArea_gvDeptAuth_ctl11_lblDeptName" style="width: 300px; height: 17px; display: inline-block;">　　　総務部</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvDeptAuth$ctl12$chkIsSelect" id="ctl00_cphContentsArea_gvDeptAuth_ctl12_chkIsSelect" type="checkbox">
                                                </td>
                                                <td class="GridViewRowLeft">
                                                    <span class="OutlineLabel" id="ctl00_cphContentsArea_gvDeptAuth_ctl12_lblDeptName" style="width: 300px; height: 17px; display: inline-block;">　　　購買部</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvDeptAuth$ctl13$chkIsSelect" id="ctl00_cphContentsArea_gvDeptAuth_ctl13_chkIsSelect" type="checkbox">
                                                </td>
                                                <td class="GridViewRowLeft">
                                                    <span class="OutlineLabel" id="ctl00_cphContentsArea_gvDeptAuth_ctl13_lblDeptName" style="width: 300px; height: 17px; display: inline-block;">　　　　　　購買一課</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvDeptAuth$ctl14$chkIsSelect" id="ctl00_cphContentsArea_gvDeptAuth_ctl14_chkIsSelect" type="checkbox">
                                                </td>
                                                <td class="GridViewRowLeft">
                                                    <span class="OutlineLabel" id="ctl00_cphContentsArea_gvDeptAuth_ctl14_lblDeptName" style="width: 300px; height: 17px; display: inline-block;">　　　　　　購買二課</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvDeptAuth$ctl15$chkIsSelect" id="ctl00_cphContentsArea_gvDeptAuth_ctl15_chkIsSelect" type="checkbox">
                                                </td>
                                                <td class="GridViewRowLeft">
                                                    <span class="OutlineLabel" id="ctl00_cphContentsArea_gvDeptAuth_ctl15_lblDeptName" style="width: 300px; height: 17px; display: inline-block;">　　　資材部</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvDeptAuth$ctl16$chkIsSelect" id="ctl00_cphContentsArea_gvDeptAuth_ctl16_chkIsSelect" type="checkbox">
                                                </td>
                                                <td class="GridViewRowLeft">
                                                    <span class="OutlineLabel" id="ctl00_cphContentsArea_gvDeptAuth_ctl16_lblDeptName" style="width: 300px; height: 17px; display: inline-block;">　　　品質保証一部</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvDeptAuth$ctl17$chkIsSelect" id="ctl00_cphContentsArea_gvDeptAuth_ctl17_chkIsSelect" type="checkbox">
                                                </td>
                                                <td class="GridViewRowLeft">
                                                    <span class="OutlineLabel" id="ctl00_cphContentsArea_gvDeptAuth_ctl17_lblDeptName" style="width: 300px; height: 17px; display: inline-block;">　　　　　　品質保証一課</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvDeptAuth$ctl18$chkIsSelect" id="ctl00_cphContentsArea_gvDeptAuth_ctl18_chkIsSelect" type="checkbox">
                                                </td>
                                                <td class="GridViewRowLeft">
                                                    <span class="OutlineLabel" id="ctl00_cphContentsArea_gvDeptAuth_ctl18_lblDeptName" style="width: 300px; height: 17px; display: inline-block;">　　　品質保証二部</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvDeptAuth$ctl19$chkIsSelect" id="ctl00_cphContentsArea_gvDeptAuth_ctl19_chkIsSelect" type="checkbox">
                                                </td>
                                                <td class="GridViewRowLeft">
                                                    <span class="OutlineLabel" id="ctl00_cphContentsArea_gvDeptAuth_ctl19_lblDeptName" style="width: 300px; height: 17px; display: inline-block;">　　　　　　品質保証二課</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>

                        <div class="line"></div>

                        <p class="ButtonField1">
                            <input name="ctl00$cphContentsArea$btnUpdate" tabindex="7" id="ctl00_cphContentsArea_btnUpdate" onclick="if(confirm('更新します。よろしいですか?') ==  false){ return false;};WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$cphContentsArea$btnUpdate&quot;, &quot;&quot;, true, &quot;Update&quot;, &quot;&quot;, false, true))" type="button" value="更新">
                            <input name="ctl00$cphContentsArea$btnCancel" tabindex="8" id="ctl00_cphContentsArea_btnCancel" onclick="javascript:__doPostBack('ctl00$cphContentsArea$btnCancel','')" type="button" value="キャンセル">
                            <input name="ctl00$cphContentsArea$btnDelete" tabindex="9" disabled="disabled" id="ctl00_cphContentsArea_btnDelete" type="button" value="削除">
                        </p>

                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection