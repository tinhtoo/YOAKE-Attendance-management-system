<!-- 部門権限情報入力 -->
@extends('menu.main')

@section('title','部門権限情報入力')

@section('content')
<div id="contents-stage">
    <table class="BaseContainerStyle1">
        <tbody>
            <tr>
                <td>
                    <div id="UpdatePanel1">

                        <table class="InputFieldStyle1">
                            <tbody>
                                <tr>
                                    <th>部門権限コード</th>
                                    <td>
                                        <input name="txtDeptAuthCd" tabindex="1" class="imeDisabled" id="txtDeptAuthCd" style="width: 50px;" onfocus="this.select();" type="text" maxlength="6">

                                        <span id="cvDeptAuthCd" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>部門権限名</th>
                                    <td>
                                        <input name="txtDeptAuthName" tabindex="2" class="imeOn" id="txtDeptAuthName" style="width: 300px;" onfocus="this.select();" type="text" maxlength="20">

                                        <span id="cvDeptAuthName" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="line"></div>

                        <input name="btnSelectAll" tabindex="3" id="btnSelectAll" type="button" value="全選択">
                        <input name="btnNotSelectAll" tabindex="4" id="btnNotSelectAll" type="button" value="全解除">
                        <span id="cvDeptAuth" style="color: red; display: none;"></span>

                        <div class="GridViewStyle1 mg10" id="gridview-container">
                            <div class="GridViewPanelStyle7" id="pnlDeptAuth">

                                <div>
                                    <table tabindex="5" class="GridViewBorder GridViewPadding" id="gvDeptAuth" style="border-collapse: collapse;" border="1" rules="all" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <th scope="col">&nbsp;</th>
                                                <th scope="col">部門</th>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                    <input name="chkIsSelect" id="chkIsSelect" type="checkbox">
                                                </td>
                                                <td class="GridViewRowLeft">
                                                    <span class="OutlineLabel" id="lblDeptName" style="width: 300px; height: 17px; display: inline-block;">アイティーエス</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                    <input name="chkIsSelect" id="gvDeptAuth_ctl03_chkIsSelect" type="checkbox">
                                                </td>
                                                <td class="GridViewRowLeft">
                                                    <span class="OutlineLabel" id="gvDeptAuth_ctl03_lblDeptName" style="width: 300px; height: 17px; display: inline-block;">　　　営業部</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                    <input name="chkIsSelect" id="gvDeptAuth_ctl04_chkIsSelect" type="checkbox">
                                                </td>
                                                <td class="GridViewRowLeft">
                                                    <span class="OutlineLabel" id="gvDeptAuth_ctl04_lblDeptName" style="width: 300px; height: 17px; display: inline-block;">　　　　　　営業一課</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                    <input name="chkIsSelect" id="gvDeptAuth_ctl05_chkIsSelect" type="checkbox">
                                                </td>
                                                <td class="GridViewRowLeft">
                                                    <span class="OutlineLabel" id="gvDeptAuth_ctl05_lblDeptName" style="width: 300px; height: 17px; display: inline-block;">　　　　　　営業二課</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                    <input name="chkIsSelect" id="gvDeptAuth_ctl06_chkIsSelect" type="checkbox">
                                                </td>
                                                <td class="GridViewRowLeft">
                                                    <span class="OutlineLabel" id="gvDeptAuth_ctl06_lblDeptName" style="width: 300px; height: 17px; display: inline-block;">　　　製造部</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                    <input name="chkIsSelect" id="gvDeptAuth_ctl07_chkIsSelect" type="checkbox">
                                                </td>
                                                <td class="GridViewRowLeft">
                                                    <span class="OutlineLabel" id="gvDeptAuth_ctl07_lblDeptName" style="width: 300px; height: 17px; display: inline-block;">　　　　　　製造一課</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                    <input name="chkIsSelect" id="gvDeptAuth_ctl08_chkIsSelect" type="checkbox">
                                                </td>
                                                <td class="GridViewRowLeft">
                                                    <span class="OutlineLabel" id="gvDeptAuth_ctl08_lblDeptName" style="width: 300px; height: 17px; display: inline-block;">　　　　　　製造二課</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                    <input name="chkIsSelect" id="gvDeptAuth_ctl09_chkIsSelect" type="checkbox">
                                                </td>
                                                <td class="GridViewRowLeft">
                                                    <span class="OutlineLabel" id="gvDeptAuth_ctl09_lblDeptName" style="width: 300px; height: 17px; display: inline-block;">　　　　　　製造三課</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                    <input name="chkIsSelect" id="gvDeptAuth_ctl10_chkIsSelect" type="checkbox">
                                                </td>
                                                <td class="GridViewRowLeft">
                                                    <span class="OutlineLabel" id="gvDeptAuth_ctl10_lblDeptName" style="width: 300px; height: 17px; display: inline-block;">　　　経理部</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                    <input name="chkIsSelect" id="gvDeptAuth_ctl11_chkIsSelect" type="checkbox">
                                                </td>
                                                <td class="GridViewRowLeft">
                                                    <span class="OutlineLabel" id="gvDeptAuth_ctl11_lblDeptName" style="width: 300px; height: 17px; display: inline-block;">　　　総務部</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                    <input name="chkIsSelect" id="gvDeptAuth_ctl12_chkIsSelect" type="checkbox">
                                                </td>
                                                <td class="GridViewRowLeft">
                                                    <span class="OutlineLabel" id="gvDeptAuth_ctl12_lblDeptName" style="width: 300px; height: 17px; display: inline-block;">　　　購買部</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                    <input name="chkIsSelect" id="gvDeptAuth_ctl13_chkIsSelect" type="checkbox">
                                                </td>
                                                <td class="GridViewRowLeft">
                                                    <span class="OutlineLabel" id="gvDeptAuth_ctl13_lblDeptName" style="width: 300px; height: 17px; display: inline-block;">　　　　　　購買一課</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                    <input name="chkIsSelect" id="gvDeptAuth_ctl14_chkIsSelect" type="checkbox">
                                                </td>
                                                <td class="GridViewRowLeft">
                                                    <span class="OutlineLabel" id="gvDeptAuth_ctl14_lblDeptName" style="width: 300px; height: 17px; display: inline-block;">　　　　　　購買二課</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                    <input name="chkIsSelect" id="gvDeptAuth_ctl15_chkIsSelect" type="checkbox">
                                                </td>
                                                <td class="GridViewRowLeft">
                                                    <span class="OutlineLabel" id="gvDeptAuth_ctl15_lblDeptName" style="width: 300px; height: 17px; display: inline-block;">　　　資材部</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                    <input name="chkIsSelect" id="gvDeptAuth_ctl16_chkIsSelect" type="checkbox">
                                                </td>
                                                <td class="GridViewRowLeft">
                                                    <span class="OutlineLabel" id="gvDeptAuth_ctl16_lblDeptName" style="width: 300px; height: 17px; display: inline-block;">　　　品質保証一部</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                    <input name="chkIsSelect" id="gvDeptAuth_ctl17_chkIsSelect" type="checkbox">
                                                </td>
                                                <td class="GridViewRowLeft">
                                                    <span class="OutlineLabel" id="gvDeptAuth_ctl17_lblDeptName" style="width: 300px; height: 17px; display: inline-block;">　　　　　　品質保証一課</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                    <input name="chkIsSelect" id="gvDeptAuth_ctl18_chkIsSelect" type="checkbox">
                                                </td>
                                                <td class="GridViewRowLeft">
                                                    <span class="OutlineLabel" id="gvDeptAuth_ctl18_lblDeptName" style="width: 300px; height: 17px; display: inline-block;">　　　品質保証二部</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                    <input name="chkIsSelect" id="gvDeptAuth_ctl19_chkIsSelect" type="checkbox">
                                                </td>
                                                <td class="GridViewRowLeft">
                                                    <span class="OutlineLabel" id="gvDeptAuth_ctl19_lblDeptName" style="width: 300px; height: 17px; display: inline-block;">　　　　　　品質保証二課</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>

                        <div class="line"></div>

                        <p class="ButtonField1">
                            <input name="btnUpdate" tabindex="7" id="btnUpdate" onclick="if(confirm('更新します。よろしいですか?') ==  false){ return false;};WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;btnUpdate&quot;, &quot;&quot;, true, &quot;Update&quot;, &quot;&quot;, false, true))" type="button" value="更新">
                            <input name="btnCancel" tabindex="8" id="btnCancel" onclick="javascript:__doPostBack('btnCancel','')" type="button" value="キャンセル">
                            <input name="btnDelete" tabindex="9" disabled="disabled" id="btnDelete" type="button" value="削除">
                        </p>

                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection