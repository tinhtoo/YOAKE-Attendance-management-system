<!-- パスワード変更入力  -->
@extends('menu.main')

@section('title','パスワード変更入力')

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
                                    <th>現パスワード</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtPassword" tabindex="1" class="imeDisabled" id="ctl00_cphContentsArea_txtPassword" style="width: 90px;" onfocus="this.select();" type="password" maxlength="10">

                                        <span id="ctl00_cphContentsArea_cvPassword" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>変更後パスワード</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtNewPassword" tabindex="2" class="imeDisabled" id="ctl00_cphContentsArea_txtNewPassword" style="width: 90px;" onfocus="this.select();" type="password" maxlength="10">

                                        <span id="ctl00_cphContentsArea_cvNewPassword" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>パスワード再入力</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtRePassword" tabindex="3" class="imeDisabled" id="ctl00_cphContentsArea_txtRePassword" style="width: 90px;" onfocus="this.select();" type="password" maxlength="10">

                                        <span id="ctl00_cphContentsArea_cvRePassword" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="line"></div>
                        <p class="ButtonField1">
                            <input name="ctl00$cphContentsArea$btnUpdate" tabindex="4" id="ctl00_cphContentsArea_btnUpdate" onclick="if(confirm('更新します。よろしいですか?') ==  false){ return false;};WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions())" type="button" value="更新">
                            <input name="ctl00$cphContentsArea$btnCancel" tabindex="5" id="ctl00_cphContentsArea_btnCancel" onclick="javascript:__doPostBack('ctl00$cphContentsArea$btnCancel','')" type="button" value="キャンセル">
                        </p>

                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
