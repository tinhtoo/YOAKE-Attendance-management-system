<!-- 所属情報入力  -->
@extends('menu.main')

@section('title','所属情報入力 ')

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
                                    <th>所属番号</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtCompanyCd" tabindex="1" class="imeDisabled" id="ctl00_cphContentsArea_txtCompanyCd" style="width: 80px;" onfocus="this.select();" type="text" maxlength="6">

                                        <span id="ctl00_cphContentsArea_cvCompanyCd" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>所属先名</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtCompanyName" tabindex="2" class="imeOn" id="ctl00_cphContentsArea_txtCompanyName" style="width: 370px;" onfocus="this.select();" type="text" maxlength="20">

                                        <span id="ctl00_cphContentsArea_cvCompanyName" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>所属先カナ名</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtCompanyKana" tabindex="3" class="imeOn" id="ctl00_cphContentsArea_txtCompanyKana" style="width: 370px;" onfocus="this.select();" type="text" maxlength="20">
                                        <span id="ctl00_cphContentsArea_cvCompanyKana" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>所属先略名</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtCompanyAbr" tabindex="4" class="imeOn" id="ctl00_cphContentsArea_txtCompanyAbr" style="width: 180px;" onfocus="this.select();" type="text" maxlength="10">
                                        <span id="ctl00_cphContentsArea_cvCompanyAbr" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>郵便番号</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtPostCd" tabindex="5" class="imeDisabled" id="ctl00_cphContentsArea_txtPostCd" style="width: 70px;" onfocus="this.select();" type="text" maxlength="8">

                                    </td>
                                </tr>
                                <tr>
                                    <th>住所１</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtAddress1" tabindex="6" class="imeOn" id="ctl00_cphContentsArea_txtAddress1" style="width: 430px;" onfocus="this.select();" type="text" maxlength="30">
                                    </td>
                                </tr>
                                <tr>
                                    <th>住所２</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtAddress2" tabindex="7" class="imeOn" id="ctl00_cphContentsArea_txtAddress2" style="width: 430px;" onfocus="this.select();" type="text" maxlength="30">
                                    </td>
                                </tr>
                                <tr>
                                    <th>住所３</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtAddress3" tabindex="8" class="imeOn" id="ctl00_cphContentsArea_txtAddress3" style="width: 430px;" onfocus="this.select();" type="text" maxlength="30">
                                    </td>
                                </tr>
                                <tr>
                                    <th>電話番号</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtTel" tabindex="9" class="imeDisabled" id="ctl00_cphContentsArea_txtTel" style="width: 120px;" onfocus="this.select();" type="text" maxlength="15">


                                    </td>
                                </tr>
                                <tr>
                                    <th>ＦＡＸ番号</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtFax" tabindex="10" class="imeDisabled" id="ctl00_cphContentsArea_txtFax" style="width: 120px;" onfocus="this.select();" type="text" maxlength="15">


                                    </td>
                                </tr>
                                <tr>
                                    <th>表示区分</th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlDispCls" tabindex="11" id="ctl00_cphContentsArea_ddlDispCls" style="width: 100px;">
                                            <option value="00">非表示</option>
                                            <option selected="selected" value="01">表示</option>

                                        </select>
                                        <span id="ctl00_cphContentsArea_cvDispCls" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="line"></div>
                        <p class="ButtonField1">
                            <input name="ctl00$cphContentsArea$btnUpdate" tabindex="12" id="ctl00_cphContentsArea_btnUpdate" onclick="if(confirm('更新します。よろしいですか?') ==  false){ return false;};WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$cphContentsArea$btnUpdate&quot;, &quot;&quot;, true, &quot;Update&quot;, &quot;&quot;, false, true))" type="button" value="更新">
                            <input name="ctl00$cphContentsArea$btnCancel" tabindex="13" id="ctl00_cphContentsArea_btnCancel" onclick="javascript:__doPostBack('ctl00$cphContentsArea$btnCancel','')" type="button" value="キャンセル">
                            <input name="ctl00$cphContentsArea$btnDelete" tabindex="14" disabled="disabled" id="ctl00_cphContentsArea_btnDelete" type="button" value="削除">
                        </p>




                    </div>

                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection