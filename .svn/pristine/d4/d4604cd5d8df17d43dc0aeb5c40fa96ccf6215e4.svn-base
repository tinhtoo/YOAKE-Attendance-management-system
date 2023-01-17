<!-- ログイン情報入力=>社員情報照会  -->
@extends('menu.main')

@section('title','ログイン情報入力=>社員情報照会 ')

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
                                    <th>社員番号</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtEmpCd" tabindex="1" disabled="disabled" class="imeDisabled" id="ctl00_cphContentsArea_txtEmpCd" style="width: 80px;" type="text" maxlength="10" value=" ">
                                        <span class="OutlineLabel" id="ctl00_cphContentsArea_lblEmpName" style="width: 230px; display: inline-block;"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>ログインID</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtLoginId" tabindex="2" class="imeDisabled" id="ctl00_cphContentsArea_txtLoginId" style="width: 80px;" onfocus="this.select();" type="text" maxlength="10">

                                        <span id="ctl00_cphContentsArea_cvLoginId" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>変更後パスワード</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtNewPassword" tabindex="3" class="imeDisabled" id="ctl00_cphContentsArea_txtNewPassword" style="width: 90px;" onfocus="this.select();" type="password" maxlength="10">

                                        <span id="ctl00_cphContentsArea_cvNewPassword" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>パスワード再入力</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtNewPassword2" tabindex="4" class="imeDisabled" id="ctl00_cphContentsArea_txtNewPassword2" style="width: 90px;" onfocus="this.select();" type="password" maxlength="10">

                                        <span id="ctl00_cphContentsArea_cvNewPassword2" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>機能権限</th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlPgAuth" tabindex="5" id="ctl00_cphContentsArea_ddlPgAuth" style="width: 170px;">
                                            <option selected="selected" value=""></option>
                                            <option value="000001">一般ユーザー</option>
                                            <option value="000002">照会ユーザー</option>
                                            <option value="100000">部門管理者</option>
                                            <option value="999999">管理者権限</option>

                                        </select>
                                        <span id="ctl00_cphContentsArea_cvPgAuth" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="line"></div>
                        <p class="ButtonField1">
                            <input name="ctl00$cphContentsArea$btnUpdate" tabindex="6" id="ctl00_cphContentsArea_btnUpdate" onclick="if(confirm('更新します。よろしいですか?') ==  false){ return false;};WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions())" type="button" value="更新">
                            <input name="ctl00$cphContentsArea$btnCancel" tabindex="7" id="ctl00_cphContentsArea_btnCancel" onclick="javascript:__doPostBack('ctl00$cphContentsArea$btnCancel','')" type="button" value="キャンセル">
                        </p>



                    </div>

                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
