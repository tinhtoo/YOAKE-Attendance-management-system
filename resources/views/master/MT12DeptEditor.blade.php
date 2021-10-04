@extends('menu.main')

@section('title','部門情報入力 ')

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
                                    <th>親部門</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtUpDeptCd" disabled="disabled" class="imeDisabled" id="ctl00_cphContentsArea_txtUpDeptCd" style="width: 50px;" type="text" maxlength="6" value="000000">
                                        <input name="ctl00$cphContentsArea$txtUpDeptName" tabindex="1" class="imeOn" id="ctl00_cphContentsArea_txtUpDeptName" style="width: 300px;" onfocus="this.select();" type="text" maxlength="20" value="アイティーエス">
                                        <span id="ctl00_cphContentsArea_cvUpDeptName" style="color: red; display: none;">ErrorMessage</span>
                                        <span id="ctl00_cphContentsArea_cvUpDeptCdDelete" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="line"></div>

                        <input name="ctl00$cphContentsArea$btnAddNewRow" tabindex="2" id="ctl00_cphContentsArea_btnAddNewRow" onclick="javascript:__doPostBack('ctl00$cphContentsArea$btnAddNewRow','')" type="button" value="新規行追加">

                        <div class="GridViewStyle1 mg10">
                            <div class="GridViewPanelStyle7" id="ctl00_cphContentsArea_pnlDept">

                                <div>
                                    <table tabindex="3" class="GridViewPadding GridViewRowCenter" id="ctl00_cphContentsArea_gvDept" style="border-collapse: collapse;" border="1" rules="all" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <th scope="col">
                                                    部門コード
                                                </th>
                                                <th scope="col">
                                                    部門名
                                                </th>
                                                <th scope="col">
                                                    行削除
                                                </th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="ctl00$cphContentsArea$gvDept$ctl02$txtDeptCd" tabindex="4" disabled="disabled" class="imeDisabled" id="ctl00_cphContentsArea_gvDept_ctl02_txtDeptCd" style="width: 55px;" onfocus="this.select();" type="text" maxlength="6" value="000010">

                                                </td>
                                                <td>
                                                    <input name="ctl00$cphContentsArea$gvDept$ctl02$txtDeptName" tabindex="4" class="imeOn" id="ctl00_cphContentsArea_gvDept_ctl02_txtDeptName" style="width: 270px;" onfocus="this.select();" type="text" maxlength="20" value="営業部">
                                                    <br>
                                                    <span id="ctl00_cphContentsArea_gvDept_ctl02_cvDeptCd" style="color: red; display: none;">ErrorMessage</span>
                                                    <span id="ctl00_cphContentsArea_gvDept_ctl02_cvDeptCdDelete" style="color: red; display: none;">ErrorMessage</span>
                                                    <span id="ctl00_cphContentsArea_gvDept_ctl02_cvDeptName" style="color: red; display: none;">ErrorMessage</span>
                                                </td>
                                                <td>
                                                    <input name="ctl00$cphContentsArea$gvDept$ctl02$btnDeleteRow" tabindex="4" class="ButtonStyle1" id="ctl00_cphContentsArea_gvDept_ctl02_btnDeleteRow" onclick="javascript:__doPostBack('ctl00$cphContentsArea$gvDept$ctl02$btnDeleteRow','')" type="button" value="削除">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="ctl00$cphContentsArea$gvDept$ctl03$txtDeptCd" tabindex="4" disabled="disabled" class="imeDisabled" id="ctl00_cphContentsArea_gvDept_ctl03_txtDeptCd" style="width: 55px;" onfocus="this.select();" type="text" maxlength="6" value="000020">

                                                </td>
                                                <td>
                                                    <input name="ctl00$cphContentsArea$gvDept$ctl03$txtDeptName" tabindex="4" class="imeOn" id="ctl00_cphContentsArea_gvDept_ctl03_txtDeptName" style="width: 270px;" onfocus="this.select();" type="text" maxlength="20" value="製造部">
                                                    <br>
                                                    <span id="ctl00_cphContentsArea_gvDept_ctl03_cvDeptCd" style="color: red; display: none;">ErrorMessage</span>
                                                    <span id="ctl00_cphContentsArea_gvDept_ctl03_cvDeptCdDelete" style="color: red; display: none;">ErrorMessage</span>
                                                    <span id="ctl00_cphContentsArea_gvDept_ctl03_cvDeptName" style="color: red; display: none;">ErrorMessage</span>
                                                </td>
                                                <td>
                                                    <input name="ctl00$cphContentsArea$gvDept$ctl03$btnDeleteRow" tabindex="4" class="ButtonStyle1" id="ctl00_cphContentsArea_gvDept_ctl03_btnDeleteRow" onclick="javascript:__doPostBack('ctl00$cphContentsArea$gvDept$ctl03$btnDeleteRow','')" type="button" value="削除">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="ctl00$cphContentsArea$gvDept$ctl04$txtDeptCd" tabindex="4" disabled="disabled" class="imeDisabled" id="ctl00_cphContentsArea_gvDept_ctl04_txtDeptCd" style="width: 55px;" onfocus="this.select();" type="text" maxlength="6" value="000030">

                                                </td>
                                                <td>
                                                    <input name="ctl00$cphContentsArea$gvDept$ctl04$txtDeptName" tabindex="4" class="imeOn" id="ctl00_cphContentsArea_gvDept_ctl04_txtDeptName" style="width: 270px;" onfocus="this.select();" type="text" maxlength="20" value="経理部">
                                                    <br>
                                                    <span id="ctl00_cphContentsArea_gvDept_ctl04_cvDeptCd" style="color: red; display: none;">ErrorMessage</span>
                                                    <span id="ctl00_cphContentsArea_gvDept_ctl04_cvDeptCdDelete" style="color: red; display: none;">ErrorMessage</span>
                                                    <span id="ctl00_cphContentsArea_gvDept_ctl04_cvDeptName" style="color: red; display: none;">ErrorMessage</span>
                                                </td>
                                                <td>
                                                    <input name="ctl00$cphContentsArea$gvDept$ctl04$btnDeleteRow" tabindex="4" class="ButtonStyle1" id="ctl00_cphContentsArea_gvDept_ctl04_btnDeleteRow" onclick="javascript:__doPostBack('ctl00$cphContentsArea$gvDept$ctl04$btnDeleteRow','')" type="button" value="削除">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="ctl00$cphContentsArea$gvDept$ctl05$txtDeptCd" tabindex="4" disabled="disabled" class="imeDisabled" id="ctl00_cphContentsArea_gvDept_ctl05_txtDeptCd" style="width: 55px;" onfocus="this.select();" type="text" maxlength="6" value="000040">

                                                </td>
                                                <td>
                                                    <input name="ctl00$cphContentsArea$gvDept$ctl05$txtDeptName" tabindex="4" class="imeOn" id="ctl00_cphContentsArea_gvDept_ctl05_txtDeptName" style="width: 270px;" onfocus="this.select();" type="text" maxlength="20" value="総務部">
                                                    <br>
                                                    <span id="ctl00_cphContentsArea_gvDept_ctl05_cvDeptCd" style="color: red; display: none;">ErrorMessage</span>
                                                    <span id="ctl00_cphContentsArea_gvDept_ctl05_cvDeptCdDelete" style="color: red; display: none;">ErrorMessage</span>
                                                    <span id="ctl00_cphContentsArea_gvDept_ctl05_cvDeptName" style="color: red; display: none;">ErrorMessage</span>
                                                </td>
                                                <td>
                                                    <input name="ctl00$cphContentsArea$gvDept$ctl05$btnDeleteRow" tabindex="4" class="ButtonStyle1" id="ctl00_cphContentsArea_gvDept_ctl05_btnDeleteRow" onclick="javascript:__doPostBack('ctl00$cphContentsArea$gvDept$ctl05$btnDeleteRow','')" type="button" value="削除">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="ctl00$cphContentsArea$gvDept$ctl06$txtDeptCd" tabindex="4" disabled="disabled" class="imeDisabled" id="ctl00_cphContentsArea_gvDept_ctl06_txtDeptCd" style="width: 55px;" onfocus="this.select();" type="text" maxlength="6" value="000050">

                                                </td>
                                                <td>
                                                    <input name="ctl00$cphContentsArea$gvDept$ctl06$txtDeptName" tabindex="4" class="imeOn" id="ctl00_cphContentsArea_gvDept_ctl06_txtDeptName" style="width: 270px;" onfocus="this.select();" type="text" maxlength="20" value="購買部">
                                                    <br>
                                                    <span id="ctl00_cphContentsArea_gvDept_ctl06_cvDeptCd" style="color: red; display: none;">ErrorMessage</span>
                                                    <span id="ctl00_cphContentsArea_gvDept_ctl06_cvDeptCdDelete" style="color: red; display: none;">ErrorMessage</span>
                                                    <span id="ctl00_cphContentsArea_gvDept_ctl06_cvDeptName" style="color: red; display: none;">ErrorMessage</span>
                                                </td>
                                                <td>
                                                    <input name="ctl00$cphContentsArea$gvDept$ctl06$btnDeleteRow" tabindex="4" class="ButtonStyle1" id="ctl00_cphContentsArea_gvDept_ctl06_btnDeleteRow" onclick="javascript:__doPostBack('ctl00$cphContentsArea$gvDept$ctl06$btnDeleteRow','')" type="button" value="削除">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="ctl00$cphContentsArea$gvDept$ctl07$txtDeptCd" tabindex="4" disabled="disabled" class="imeDisabled" id="ctl00_cphContentsArea_gvDept_ctl07_txtDeptCd" style="width: 55px;" onfocus="this.select();" type="text" maxlength="6" value="000060">

                                                </td>
                                                <td>
                                                    <input name="ctl00$cphContentsArea$gvDept$ctl07$txtDeptName" tabindex="4" class="imeOn" id="ctl00_cphContentsArea_gvDept_ctl07_txtDeptName" style="width: 270px;" onfocus="this.select();" type="text" maxlength="20" value="資材部">
                                                    <br>
                                                    <span id="ctl00_cphContentsArea_gvDept_ctl07_cvDeptCd" style="color: red; display: none;">ErrorMessage</span>
                                                    <span id="ctl00_cphContentsArea_gvDept_ctl07_cvDeptCdDelete" style="color: red; display: none;">ErrorMessage</span>
                                                    <span id="ctl00_cphContentsArea_gvDept_ctl07_cvDeptName" style="color: red; display: none;">ErrorMessage</span>
                                                </td>
                                                <td>
                                                    <input name="ctl00$cphContentsArea$gvDept$ctl07$btnDeleteRow" tabindex="4" class="ButtonStyle1" id="ctl00_cphContentsArea_gvDept_ctl07_btnDeleteRow" onclick="javascript:__doPostBack('ctl00$cphContentsArea$gvDept$ctl07$btnDeleteRow','')" type="button" value="削除">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="ctl00$cphContentsArea$gvDept$ctl08$txtDeptCd" tabindex="4" disabled="disabled" class="imeDisabled" id="ctl00_cphContentsArea_gvDept_ctl08_txtDeptCd" style="width: 55px;" onfocus="this.select();" type="text" maxlength="6" value="000070">

                                                </td>
                                                <td>
                                                    <input name="ctl00$cphContentsArea$gvDept$ctl08$txtDeptName" tabindex="4" class="imeOn" id="ctl00_cphContentsArea_gvDept_ctl08_txtDeptName" style="width: 270px;" onfocus="this.select();" type="text" maxlength="20" value="品質保証一部">
                                                    <br>
                                                    <span id="ctl00_cphContentsArea_gvDept_ctl08_cvDeptCd" style="color: red; display: none;">ErrorMessage</span>
                                                    <span id="ctl00_cphContentsArea_gvDept_ctl08_cvDeptCdDelete" style="color: red; display: none;">ErrorMessage</span>
                                                    <span id="ctl00_cphContentsArea_gvDept_ctl08_cvDeptName" style="color: red; display: none;">ErrorMessage</span>
                                                </td>
                                                <td>
                                                    <input name="ctl00$cphContentsArea$gvDept$ctl08$btnDeleteRow" tabindex="4" class="ButtonStyle1" id="ctl00_cphContentsArea_gvDept_ctl08_btnDeleteRow" onclick="javascript:__doPostBack('ctl00$cphContentsArea$gvDept$ctl08$btnDeleteRow','')" type="button" value="削除">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="ctl00$cphContentsArea$gvDept$ctl09$txtDeptCd" tabindex="4" disabled="disabled" class="imeDisabled" id="ctl00_cphContentsArea_gvDept_ctl09_txtDeptCd" style="width: 55px;" onfocus="this.select();" type="text" maxlength="6" value="000080">

                                                </td>
                                                <td>
                                                    <input name="ctl00$cphContentsArea$gvDept$ctl09$txtDeptName" tabindex="4" class="imeOn" id="ctl00_cphContentsArea_gvDept_ctl09_txtDeptName" style="width: 270px;" onfocus="this.select();" type="text" maxlength="20" value="品質保証二部">
                                                    <br>
                                                    <span id="ctl00_cphContentsArea_gvDept_ctl09_cvDeptCd" style="color: red; display: none;">ErrorMessage</span>
                                                    <span id="ctl00_cphContentsArea_gvDept_ctl09_cvDeptCdDelete" style="color: red; display: none;">ErrorMessage</span>
                                                    <span id="ctl00_cphContentsArea_gvDept_ctl09_cvDeptName" style="color: red; display: none;">ErrorMessage</span>
                                                </td>
                                                <td>
                                                    <input name="ctl00$cphContentsArea$gvDept$ctl09$btnDeleteRow" tabindex="4" class="ButtonStyle1" id="ctl00_cphContentsArea_gvDept_ctl09_btnDeleteRow" onclick="javascript:__doPostBack('ctl00$cphContentsArea$gvDept$ctl09$btnDeleteRow','')" type="button" value="削除">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>

                        <div class="line"></div>
                        <p class="ButtonField1">
                            <input name="ctl00$cphContentsArea$btnUpdate" tabindex="5" id="ctl00_cphContentsArea_btnUpdate" onclick="if(confirm('更新します。よろしいですか?') ==  false){ return false;};WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$cphContentsArea$btnUpdate&quot;, &quot;&quot;, true, &quot;Update&quot;, &quot;&quot;, false, true))" type="button" value="更新">
                            <input name="ctl00$cphContentsArea$btnCancel" tabindex="6" id="ctl00_cphContentsArea_btnCancel" onclick="javascript:__doPostBack('ctl00$cphContentsArea$btnCancel','')" type="button" value="キャンセル">
                            <input name="ctl00$cphContentsArea$btnDelete" tabindex="7" id="ctl00_cphContentsArea_btnDelete" onclick="if(confirm('削除します。よろしいですか?') ==  false){ return false;};WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$cphContentsArea$btnDelete&quot;, &quot;&quot;, true, &quot;Update&quot;, &quot;&quot;, false, true))" type="button" value="削除">
                        </p>


                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection