<!-- 基本情報入力 -->
@extends('menu.main')

@section('title','基本情報入力 ')

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
                                    <th>会社名</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtCompanyName" tabindex="1" class="imeOn" id="ctl00_cphContentsArea_txtCompanyName" style="width: 370px;" onfocus="this.select();" type="text" maxlength="30" value="アイティーエス株式会社(ｖ3-02)">
                                        <span id="ctl00_cphContentsArea_cvCompanyName" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>会社カナ名</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtCompanyKana" tabindex="2" class="imeOn" id="ctl00_cphContentsArea_txtCompanyKana" style="width: 370px;" onfocus="this.select();" type="text" maxlength="30" value="ｱｲﾃｨｰｴｽ">
                                        <span id="ctl00_cphContentsArea_cvCompanyKana" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>会社略名</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtCompanyAbrName" tabindex="3" class="imeOn" id="ctl00_cphContentsArea_txtCompanyAbrName" style="width: 250px;" onfocus="this.select();" type="text" maxlength="20" value="ITS">
                                        <span id="ctl00_cphContentsArea_cvCompanyAbrName" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>郵便番号</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtPostCd" tabindex="4" class="imeDisabled" id="ctl00_cphContentsArea_txtPostCd" style="width: 60px;" onfocus="this.select();" type="text" maxlength="8" value="301-0845">

                                    </td>
                                </tr>
                                <tr>
                                    <th>住所１</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtAddress1" tabindex="5" class="imeOn" id="ctl00_cphContentsArea_txtAddress1" style="width: 370px;" onfocus="this.select();" type="text" maxlength="30" value="群馬県前橋市999">
                                    </td>
                                </tr>
                                <tr>
                                    <th>住所２</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtAddress2" tabindex="6" class="imeOn" id="ctl00_cphContentsArea_txtAddress2" style="width: 370px;" onfocus="this.select();" type="text" maxlength="30" value="9998">
                                    </td>
                                </tr>
                                <tr>
                                    <th>住所３</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtAddress3" tabindex="7" class="imeOn" id="ctl00_cphContentsArea_txtAddress3" style="width: 370px;" onfocus="this.select();" type="text" maxlength="30">
                                    </td>
                                </tr>
                                <tr>
                                    <th>電話番号</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtTel" tabindex="8" class="imeDisabled" id="ctl00_cphContentsArea_txtTel" style="width: 110px;" onfocus="this.select();" type="text" maxlength="15" value="027-999-9999">


                                    </td>
                                </tr>
                                <tr>
                                    <th>ＦＡＸ番号</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtFax" tabindex="9" class="imeDisabled" id="ctl00_cphContentsArea_txtFax" style="width: 110px;" onfocus="this.select();" type="text" maxlength="15" value="027-999-9900">


                                    </td>
                                </tr>
                                <tr>
                                    <th>Ｅメール</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtMail" tabindex="10" class="imeDisabled" id="ctl00_cphContentsArea_txtMail" style="width: 350px;" onfocus="this.select();" type="text" maxlength="50">
                                    </td>
                                </tr>
                                <tr>
                                    <th>URL</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtUrl" tabindex="11" class="imeOff" id="ctl00_cphContentsArea_txtUrl" style="width: 350px;" onfocus="this.select();" type="text" maxlength="50">
                                    </td>
                                </tr>
                                <tr>
                                    <th>締日</th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlClosingDate" tabindex="12" disabled="disabled" id="ctl00_cphContentsArea_ddlClosingDate" style="width: 50px;" onchange="javascript:setTimeout('__doPostBack(\'ctl00$cphContentsArea$ddlClosingDate\',\'\')', 0)">
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
                                            <option selected="selected" value="25">25</option>
                                            <option value="31">末</option>

                                        </select>
                                        日
                                    </td>
                                </tr>
                                <tr>
                                    <th>月度</th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlMonthClsCd" tabindex="13" disabled="disabled" id="ctl00_cphContentsArea_ddlMonthClsCd" style="width: 200px;">
                                            <option selected="selected" value="00">締日以前を当月度とする</option>
                                            <option value="01">締日以降を当月度とする</option>

                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>期首</th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlTermStrMonth" tabindex="14" class="imeDisabled" id="ctl00_cphContentsArea_ddlTermStrMonth" style="width: 50px;">
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
                                        月
                                    </td>
                                </tr>
                                <tr>
                                    <th>出退勤入力コメント</th>
                                    <td>
                                        <textarea name="ctl00$cphContentsArea$txtComnt1" tabindex="15" class="imeOn" id="ctl00_cphContentsArea_txtComnt1" style="width: 660px;" onfocus="this.select();" rows="2" cols="20"></textarea>

                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="line"></div>
                        <p class="ButtonField1">
                            <input name="ctl00$cphContentsArea$btnUpdate" tabindex="16" id="ctl00_cphContentsArea_btnUpdate" onclick="if(confirm('更新します。よろしいですか?') ==  false){ return false;};WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$cphContentsArea$btnUpdate&quot;, &quot;&quot;, true, &quot;Update&quot;, &quot;&quot;, false, true))" type="button" value="更新">
                            <input name="ctl00$cphContentsArea$btnCancel" tabindex="17" id="ctl00_cphContentsArea_btnCancel" onclick="javascript:__doPostBack('ctl00$cphContentsArea$btnCancel','')" type="button" value="キャンセル">
                        </p>


                    </div>

                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection