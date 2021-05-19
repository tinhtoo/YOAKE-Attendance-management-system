<!-- 月次確定処理画面 -->
@extends('menu.main')
@section('title', '月次確定処理')
@section('content')
    <div id="contents-stage">
        <table class="BaseContainerStyle1">
            <tbody>
                <tr>
                    <td>

                        <div id="ctl00_cphContentsArea_upWorkTimeFix">


                            <table class="InputFieldStyle1">
                                <tbody>
                                    <tr>
                                        <th>対象月度</th>
                                        <td>
                                            <select name="ctl00$cphContentsArea$ddlTargetYear" tabindex="1"
                                                class="imeDisabled" id="ctl00_cphContentsArea_ddlTargetYear"
                                                style="width: 70px;">
                                                <option value="2020">2020</option>
                                                <option selected="selected" value="2021">2021</option>
                                                <option value="2022">2022</option>

                                            </select>
                                            &nbsp;年&nbsp;
                                            <select name="ctl00$cphContentsArea$ddlTargetMonth" tabindex="2"
                                                class="imeDisabled" id="ctl00_cphContentsArea_ddlTargetMonth"
                                                style="width: 50px;">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option selected="selected" value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>

                                            </select>
                                            &nbsp;月度&nbsp;
                                        </td>
                                        <td>
                                            <span id="ctl00_cphContentsArea_lblMessage"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>締日</th>
                                        <td>
                                            <select name="ctl00$cphContentsArea$ddlClosingDate" tabindex="3"
                                                id="ctl00_cphContentsArea_ddlClosingDate" style="width: 150px;">
                                                <option selected="selected" value="15">１５日締</option>
                                                <option value="25">２５日締</option>
                                                <option value="31">末締</option>

                                            </select>
                                            <span id="ctl00_cphContentsArea_cvClosingDate"
                                                style="color: red; display: none;">ErrorMessage</span>

                                        </td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="line"></div>

                            <input name="ctl00$cphContentsArea$btnSelectAll" tabindex="4"
                                id="ctl00_cphContentsArea_btnSelectAll"
                                onclick="ChangeAllCheckBoxStates('ctl00_cphContentsArea_gvWorkTimeFix_ctl02_chkIsSelect,ctl00_cphContentsArea_gvWorkTimeFix_ctl03_chkIsSelect,ctl00_cphContentsArea_gvWorkTimeFix_ctl04_chkIsSelect,ctl00_cphContentsArea_gvWorkTimeFix_ctl05_chkIsSelect,ctl00_cphContentsArea_gvWorkTimeFix_ctl06_chkIsSelect,ctl00_cphContentsArea_gvWorkTimeFix_ctl07_chkIsSelect,ctl00_cphContentsArea_gvWorkTimeFix_ctl08_chkIsSelect,ctl00_cphContentsArea_gvWorkTimeFix_ctl09_chkIsSelect,ctl00_cphContentsArea_gvWorkTimeFix_ctl10_chkIsSelect,ctl00_cphContentsArea_gvWorkTimeFix_ctl11_chkIsSelect,ctl00_cphContentsArea_gvWorkTimeFix_ctl12_chkIsSelect,ctl00_cphContentsArea_gvWorkTimeFix_ctl13_chkIsSelect,ctl00_cphContentsArea_gvWorkTimeFix_ctl14_chkIsSelect,ctl00_cphContentsArea_gvWorkTimeFix_ctl15_chkIsSelect,ctl00_cphContentsArea_gvWorkTimeFix_ctl16_chkIsSelect,ctl00_cphContentsArea_gvWorkTimeFix_ctl17_chkIsSelect,ctl00_cphContentsArea_gvWorkTimeFix_ctl18_chkIsSelect,ctl00_cphContentsArea_gvWorkTimeFix_ctl19_chkIsSelect', true)"
                                type="button" value="全選択">
                            <input name="ctl00$cphContentsArea$btnNotSelectAll" tabindex="5"
                                id="ctl00_cphContentsArea_btnNotSelectAll"
                                onclick="ChangeAllCheckBoxStates('ctl00_cphContentsArea_gvWorkTimeFix_ctl02_chkIsSelect,ctl00_cphContentsArea_gvWorkTimeFix_ctl03_chkIsSelect,ctl00_cphContentsArea_gvWorkTimeFix_ctl04_chkIsSelect,ctl00_cphContentsArea_gvWorkTimeFix_ctl05_chkIsSelect,ctl00_cphContentsArea_gvWorkTimeFix_ctl06_chkIsSelect,ctl00_cphContentsArea_gvWorkTimeFix_ctl07_chkIsSelect,ctl00_cphContentsArea_gvWorkTimeFix_ctl08_chkIsSelect,ctl00_cphContentsArea_gvWorkTimeFix_ctl09_chkIsSelect,ctl00_cphContentsArea_gvWorkTimeFix_ctl10_chkIsSelect,ctl00_cphContentsArea_gvWorkTimeFix_ctl11_chkIsSelect,ctl00_cphContentsArea_gvWorkTimeFix_ctl12_chkIsSelect,ctl00_cphContentsArea_gvWorkTimeFix_ctl13_chkIsSelect,ctl00_cphContentsArea_gvWorkTimeFix_ctl14_chkIsSelect,ctl00_cphContentsArea_gvWorkTimeFix_ctl15_chkIsSelect,ctl00_cphContentsArea_gvWorkTimeFix_ctl16_chkIsSelect,ctl00_cphContentsArea_gvWorkTimeFix_ctl17_chkIsSelect,ctl00_cphContentsArea_gvWorkTimeFix_ctl18_chkIsSelect,ctl00_cphContentsArea_gvWorkTimeFix_ctl19_chkIsSelect', false)"
                                type="button" value="全解除">
                            <span id="ctl00_cphContentsArea_cvWorkTimeFix"
                                style="color: red; display: none;">ErrorMessage</span>

                            <div class="GridViewStyle1 mg10" id="gridview-container">
                                <div class="GridViewPanelStyle7" id="ctl00_cphContentsArea_pnlWorkTimeFix">

                                    <div>
                                        <table tabindex="6" class="GridViewBorder GridViewPadding"
                                            id="ctl00_cphContentsArea_gvWorkTimeFix" style="border-collapse: collapse;"
                                            border="1" rules="all" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <th scope="col">&nbsp;</th>
                                                    <th scope="col">部門</th>
                                                </tr>
                                                <tr>
                                                    <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                        <input name="ctl00$cphContentsArea$gvWorkTimeFix$ctl02$chkIsSelect"
                                                            id="ctl00_cphContentsArea_gvWorkTimeFix_ctl02_chkIsSelect"
                                                            type="checkbox">
                                                    </td>
                                                    <td class="GridViewRowLeft">
                                                        <span class="OutlineLabel"
                                                            id="ctl00_cphContentsArea_gvWorkTimeFix_ctl02_lblDeptName"
                                                            style="width: 300px; height: 17px; display: inline-block;">アイティーエス</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                        <input name="ctl00$cphContentsArea$gvWorkTimeFix$ctl03$chkIsSelect"
                                                            id="ctl00_cphContentsArea_gvWorkTimeFix_ctl03_chkIsSelect"
                                                            type="checkbox">
                                                    </td>
                                                    <td class="GridViewRowLeft">
                                                        <span class="OutlineLabel"
                                                            id="ctl00_cphContentsArea_gvWorkTimeFix_ctl03_lblDeptName"
                                                            style="width: 300px; height: 17px; display: inline-block;">　　　営業部</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                        <input name="ctl00$cphContentsArea$gvWorkTimeFix$ctl04$chkIsSelect"
                                                            id="ctl00_cphContentsArea_gvWorkTimeFix_ctl04_chkIsSelect"
                                                            type="checkbox">
                                                    </td>
                                                    <td class="GridViewRowLeft">
                                                        <span class="OutlineLabel"
                                                            id="ctl00_cphContentsArea_gvWorkTimeFix_ctl04_lblDeptName"
                                                            style="width: 300px; height: 17px; display: inline-block;">　　　　　　営業一課</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                        <input name="ctl00$cphContentsArea$gvWorkTimeFix$ctl05$chkIsSelect"
                                                            id="ctl00_cphContentsArea_gvWorkTimeFix_ctl05_chkIsSelect"
                                                            type="checkbox">
                                                    </td>
                                                    <td class="GridViewRowLeft">
                                                        <span class="OutlineLabel"
                                                            id="ctl00_cphContentsArea_gvWorkTimeFix_ctl05_lblDeptName"
                                                            style="width: 300px; height: 17px; display: inline-block;">　　　　　　営業二課</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                        <input name="ctl00$cphContentsArea$gvWorkTimeFix$ctl06$chkIsSelect"
                                                            id="ctl00_cphContentsArea_gvWorkTimeFix_ctl06_chkIsSelect"
                                                            type="checkbox">
                                                    </td>
                                                    <td class="GridViewRowLeft">
                                                        <span class="OutlineLabel"
                                                            id="ctl00_cphContentsArea_gvWorkTimeFix_ctl06_lblDeptName"
                                                            style="width: 300px; height: 17px; display: inline-block;">　　　製造部</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                        <input name="ctl00$cphContentsArea$gvWorkTimeFix$ctl07$chkIsSelect"
                                                            id="ctl00_cphContentsArea_gvWorkTimeFix_ctl07_chkIsSelect"
                                                            type="checkbox">
                                                    </td>
                                                    <td class="GridViewRowLeft">
                                                        <span class="OutlineLabel"
                                                            id="ctl00_cphContentsArea_gvWorkTimeFix_ctl07_lblDeptName"
                                                            style="width: 300px; height: 17px; display: inline-block;">　　　　　　製造一課</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                        <input name="ctl00$cphContentsArea$gvWorkTimeFix$ctl08$chkIsSelect"
                                                            id="ctl00_cphContentsArea_gvWorkTimeFix_ctl08_chkIsSelect"
                                                            type="checkbox">
                                                    </td>
                                                    <td class="GridViewRowLeft">
                                                        <span class="OutlineLabel"
                                                            id="ctl00_cphContentsArea_gvWorkTimeFix_ctl08_lblDeptName"
                                                            style="width: 300px; height: 17px; display: inline-block;">　　　　　　製造二課</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                        <input name="ctl00$cphContentsArea$gvWorkTimeFix$ctl09$chkIsSelect"
                                                            id="ctl00_cphContentsArea_gvWorkTimeFix_ctl09_chkIsSelect"
                                                            type="checkbox">
                                                    </td>
                                                    <td class="GridViewRowLeft">
                                                        <span class="OutlineLabel"
                                                            id="ctl00_cphContentsArea_gvWorkTimeFix_ctl09_lblDeptName"
                                                            style="width: 300px; height: 17px; display: inline-block;">　　　　　　製造三課</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                        <input name="ctl00$cphContentsArea$gvWorkTimeFix$ctl10$chkIsSelect"
                                                            id="ctl00_cphContentsArea_gvWorkTimeFix_ctl10_chkIsSelect"
                                                            type="checkbox">
                                                    </td>
                                                    <td class="GridViewRowLeft">
                                                        <span class="OutlineLabel"
                                                            id="ctl00_cphContentsArea_gvWorkTimeFix_ctl10_lblDeptName"
                                                            style="width: 300px; height: 17px; display: inline-block;">　　　経理部</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                        <input name="ctl00$cphContentsArea$gvWorkTimeFix$ctl11$chkIsSelect"
                                                            id="ctl00_cphContentsArea_gvWorkTimeFix_ctl11_chkIsSelect"
                                                            type="checkbox">
                                                    </td>
                                                    <td class="GridViewRowLeft">
                                                        <span class="OutlineLabel"
                                                            id="ctl00_cphContentsArea_gvWorkTimeFix_ctl11_lblDeptName"
                                                            style="width: 300px; height: 17px; display: inline-block;">　　　総務部</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                        <input name="ctl00$cphContentsArea$gvWorkTimeFix$ctl12$chkIsSelect"
                                                            id="ctl00_cphContentsArea_gvWorkTimeFix_ctl12_chkIsSelect"
                                                            type="checkbox">
                                                    </td>
                                                    <td class="GridViewRowLeft">
                                                        <span class="OutlineLabel"
                                                            id="ctl00_cphContentsArea_gvWorkTimeFix_ctl12_lblDeptName"
                                                            style="width: 300px; height: 17px; display: inline-block;">　　　購買部</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                        <input name="ctl00$cphContentsArea$gvWorkTimeFix$ctl13$chkIsSelect"
                                                            id="ctl00_cphContentsArea_gvWorkTimeFix_ctl13_chkIsSelect"
                                                            type="checkbox">
                                                    </td>
                                                    <td class="GridViewRowLeft">
                                                        <span class="OutlineLabel"
                                                            id="ctl00_cphContentsArea_gvWorkTimeFix_ctl13_lblDeptName"
                                                            style="width: 300px; height: 17px; display: inline-block;">　　　　　　購買一課</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                        <input name="ctl00$cphContentsArea$gvWorkTimeFix$ctl14$chkIsSelect"
                                                            id="ctl00_cphContentsArea_gvWorkTimeFix_ctl14_chkIsSelect"
                                                            type="checkbox">
                                                    </td>
                                                    <td class="GridViewRowLeft">
                                                        <span class="OutlineLabel"
                                                            id="ctl00_cphContentsArea_gvWorkTimeFix_ctl14_lblDeptName"
                                                            style="width: 300px; height: 17px; display: inline-block;">　　　　　　購買二課</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                        <input name="ctl00$cphContentsArea$gvWorkTimeFix$ctl15$chkIsSelect"
                                                            id="ctl00_cphContentsArea_gvWorkTimeFix_ctl15_chkIsSelect"
                                                            type="checkbox">
                                                    </td>
                                                    <td class="GridViewRowLeft">
                                                        <span class="OutlineLabel"
                                                            id="ctl00_cphContentsArea_gvWorkTimeFix_ctl15_lblDeptName"
                                                            style="width: 300px; height: 17px; display: inline-block;">　　　資材部</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                        <input name="ctl00$cphContentsArea$gvWorkTimeFix$ctl16$chkIsSelect"
                                                            id="ctl00_cphContentsArea_gvWorkTimeFix_ctl16_chkIsSelect"
                                                            type="checkbox">
                                                    </td>
                                                    <td class="GridViewRowLeft">
                                                        <span class="OutlineLabel"
                                                            id="ctl00_cphContentsArea_gvWorkTimeFix_ctl16_lblDeptName"
                                                            style="width: 300px; height: 17px; display: inline-block;">　　　品質保証一部</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                        <input name="ctl00$cphContentsArea$gvWorkTimeFix$ctl17$chkIsSelect"
                                                            id="ctl00_cphContentsArea_gvWorkTimeFix_ctl17_chkIsSelect"
                                                            type="checkbox">
                                                    </td>
                                                    <td class="GridViewRowLeft">
                                                        <span class="OutlineLabel"
                                                            id="ctl00_cphContentsArea_gvWorkTimeFix_ctl17_lblDeptName"
                                                            style="width: 300px; height: 17px; display: inline-block;">　　　　　　品質保証一課</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                        <input name="ctl00$cphContentsArea$gvWorkTimeFix$ctl18$chkIsSelect"
                                                            id="ctl00_cphContentsArea_gvWorkTimeFix_ctl18_chkIsSelect"
                                                            type="checkbox">
                                                    </td>
                                                    <td class="GridViewRowLeft">
                                                        <span class="OutlineLabel"
                                                            id="ctl00_cphContentsArea_gvWorkTimeFix_ctl18_lblDeptName"
                                                            style="width: 300px; height: 17px; display: inline-block;">　　　品質保証二部</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap;">
                                                        <input name="ctl00$cphContentsArea$gvWorkTimeFix$ctl19$chkIsSelect"
                                                            id="ctl00_cphContentsArea_gvWorkTimeFix_ctl19_chkIsSelect"
                                                            type="checkbox">
                                                    </td>
                                                    <td class="GridViewRowLeft">
                                                        <span class="OutlineLabel"
                                                            id="ctl00_cphContentsArea_gvWorkTimeFix_ctl19_lblDeptName"
                                                            style="width: 300px; height: 17px; display: inline-block;">　　　　　　品質保証二課</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                                <div class="line"></div>
                                <p class="ButtonField1">
                                    <input name="ctl00$cphContentsArea$btnUpdate" tabindex="7"
                                        id="ctl00_cphContentsArea_btnUpdate"
                                        onclick="if(confirm('更新します。よろしいですか?') ==  false){ return false;};WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$cphContentsArea$btnUpdate&quot;, &quot;&quot;, true, &quot;Update&quot;, &quot;&quot;, false, true))"
                                        type="button" value="更新">
                                    <input name="ctl00$cphContentsArea$btnCancel" tabindex="8"
                                        id="ctl00_cphContentsArea_btnCancel"
                                        onclick="javascript:__doPostBack('ctl00$cphContentsArea$btnCancel','')"
                                        type="button" value="キャンセル">
                                </p>

                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

@endsection
