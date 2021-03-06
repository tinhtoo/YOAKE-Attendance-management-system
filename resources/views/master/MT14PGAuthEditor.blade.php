<!-- 機能権限情報入力=>機能権限情報照会 -->
@extends('menu.main')

@section('title','機能権限情報入力=>機能権限情報照会 ')

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
                                    <th>機能権限コード</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtPgAuthCd" tabindex="1" class="imeDisabled" id="ctl00_cphContentsArea_txtPgAuthCd" style="width: 50px;" onfocus="this.select();" type="text" maxlength="6">

                                        <span id="ctl00_cphContentsArea_cvPgAuthCd" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>機能権限名</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtPgAuthName" tabindex="2" class="imeOn" id="ctl00_cphContentsArea_txtPgAuthName" style="width: 240px;" onfocus="this.select();" type="text" maxlength="20">

                                        <span id="ctl00_cphContentsArea_cvPgAuthName" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="line"></div>
                        <div style="text-align: left;">
                        <input name="ctl00$cphContentsArea$btnSelectAll" tabindex="3" id="ctl00_cphContentsArea_btnSelectAll" onclick="ChangeAllCheckBoxStates('ctl00_cphContentsArea_gvPgAuth_ctl02_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl03_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl04_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl05_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl06_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl07_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl08_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl09_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl10_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl11_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl12_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl13_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl14_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl15_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl16_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl17_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl18_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl19_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl20_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl21_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl22_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl23_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl24_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl25_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl26_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl27_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl28_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl29_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl30_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl31_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl32_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl33_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl34_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl35_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl36_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl37_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl38_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl39_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl40_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl41_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl42_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl43_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl44_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl45_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl46_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl47_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl48_chkIsSelect', true)" type="button" value="全選択">
                        <input name="ctl00$cphContentsArea$btnNotSelectAll" tabindex="4" id="ctl00_cphContentsArea_btnNotSelectAll" onclick="ChangeAllCheckBoxStates('ctl00_cphContentsArea_gvPgAuth_ctl02_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl03_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl04_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl05_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl06_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl07_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl08_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl09_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl10_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl11_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl12_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl13_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl14_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl15_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl16_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl17_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl18_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl19_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl20_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl21_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl22_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl23_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl24_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl25_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl26_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl27_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl28_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl29_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl30_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl31_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl32_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl33_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl34_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl35_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl36_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl37_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl38_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl39_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl40_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl41_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl42_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl43_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl44_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl45_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl46_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl47_chkIsSelect,ctl00_cphContentsArea_gvPgAuth_ctl48_chkIsSelect', false)" type="button" value="全解除">
                        <span id="ctl00_cphContentsArea_cvPgAuth" style="color: red; display: none;">ErrorMessage</span>
                        </div>
                        <div class="GridViewStyle1 mg10" id="gridview-container">
                            <div class="GridViewPanelStyle7" id="ctl00_cphContentsArea_pnlPgAuth">

                                <div>
                                    <table tabindex="5" class="GridViewBorder GridViewPadding" id="ctl00_cphContentsArea_gvPgAuth" style="border-collapse: collapse;" border="1" rules="all" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <th scope="col">&nbsp;</th>
                                                <th scope="col">
                                                    分類
                                                </th>
                                                <th style="white-space: nowrap;" scope="col">
                                                    プログラム名
                                                </th>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 20px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvPgAuth$ctl02$chkIsSelect" id="ctl00_cphContentsArea_gvPgAuth_ctl02_chkIsSelect" type="checkbox">
                                                </td>
                                                <td style="width: 110px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl02_lblMclsName">マスタ</span>
                                                </td>
                                                <td style="width: 170px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl02_lblPgName">社員情報入力</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 20px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvPgAuth$ctl03$chkIsSelect" id="ctl00_cphContentsArea_gvPgAuth_ctl03_chkIsSelect" type="checkbox">
                                                </td>
                                                <td style="width: 110px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl03_lblMclsName">マスタ</span>
                                                </td>
                                                <td style="width: 170px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl03_lblPgName">ログイン情報入力</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 20px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvPgAuth$ctl04$chkIsSelect" id="ctl00_cphContentsArea_gvPgAuth_ctl04_chkIsSelect" type="checkbox">
                                                </td>
                                                <td style="width: 110px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl04_lblMclsName">マスタ</span>
                                                </td>
                                                <td style="width: 170px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl04_lblPgName">機能権限情報入力</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 20px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvPgAuth$ctl05$chkIsSelect" id="ctl00_cphContentsArea_gvPgAuth_ctl05_chkIsSelect" type="checkbox">
                                                </td>
                                                <td style="width: 110px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl05_lblMclsName">マスタ</span>
                                                </td>
                                                <td style="width: 170px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl05_lblPgName">部門情報入力</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 20px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvPgAuth$ctl06$chkIsSelect" id="ctl00_cphContentsArea_gvPgAuth_ctl06_chkIsSelect" type="checkbox">
                                                </td>
                                                <td style="width: 110px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl06_lblMclsName">マスタ</span>
                                                </td>
                                                <td style="width: 170px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl06_lblPgName">部門権限情報入力</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 20px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvPgAuth$ctl07$chkIsSelect" id="ctl00_cphContentsArea_gvPgAuth_ctl07_chkIsSelect" type="checkbox">
                                                </td>
                                                <td style="width: 110px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl07_lblMclsName">マスタ</span>
                                                </td>
                                                <td style="width: 170px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl07_lblPgName">勤務体系情報入力</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 20px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvPgAuth$ctl08$chkIsSelect" id="ctl00_cphContentsArea_gvPgAuth_ctl08_chkIsSelect" type="checkbox">
                                                </td>
                                                <td style="width: 110px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl08_lblMclsName">マスタ</span>
                                                </td>
                                                <td style="width: 170px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl08_lblPgName">端数処理情報入力</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 20px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvPgAuth$ctl09$chkIsSelect" id="ctl00_cphContentsArea_gvPgAuth_ctl09_chkIsSelect" type="checkbox">
                                                </td>
                                                <td style="width: 110px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl09_lblMclsName">マスタ</span>
                                                </td>
                                                <td style="width: 170px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl09_lblPgName">カレンダーパターン情報入力</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 20px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvPgAuth$ctl10$chkIsSelect" id="ctl00_cphContentsArea_gvPgAuth_ctl10_chkIsSelect" type="checkbox">
                                                </td>
                                                <td style="width: 110px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl10_lblMclsName">マスタ</span>
                                                </td>
                                                <td style="width: 170px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl10_lblPgName">残業上限情報入力</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 20px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvPgAuth$ctl11$chkIsSelect" id="ctl00_cphContentsArea_gvPgAuth_ctl11_chkIsSelect" type="checkbox">
                                                </td>
                                                <td style="width: 110px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl11_lblMclsName">マスタ</span>
                                                </td>
                                                <td style="width: 170px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl11_lblPgName">基本情報入力</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 20px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvPgAuth$ctl12$chkIsSelect" id="ctl00_cphContentsArea_gvPgAuth_ctl12_chkIsSelect" type="checkbox">
                                                </td>
                                                <td style="width: 110px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl12_lblMclsName">マスタ</span>
                                                </td>
                                                <td style="width: 170px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl12_lblPgName">祝祭日・会社休日情報入力</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 20px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvPgAuth$ctl13$chkIsSelect" id="ctl00_cphContentsArea_gvPgAuth_ctl13_chkIsSelect" type="checkbox">
                                                </td>
                                                <td style="width: 110px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl13_lblMclsName">マスタ</span>
                                                </td>
                                                <td style="width: 170px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl13_lblPgName">パスワード変更入力</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 20px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvPgAuth$ctl14$chkIsSelect" id="ctl00_cphContentsArea_gvPgAuth_ctl14_chkIsSelect" type="checkbox">
                                                </td>
                                                <td style="width: 110px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl14_lblMclsName">マスタ</span>
                                                </td>
                                                <td style="width: 170px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl14_lblPgName">組織変更入力</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 20px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvPgAuth$ctl15$chkIsSelect" id="ctl00_cphContentsArea_gvPgAuth_ctl15_chkIsSelect" type="checkbox">
                                                </td>
                                                <td style="width: 110px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl15_lblMclsName">マスタ</span>
                                                </td>
                                                <td style="width: 170px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl15_lblPgName">社員番号一括変換</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 20px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvPgAuth$ctl16$chkIsSelect" id="ctl00_cphContentsArea_gvPgAuth_ctl16_chkIsSelect" type="checkbox">
                                                </td>
                                                <td style="width: 110px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl16_lblMclsName">マスタ</span>
                                                </td>
                                                <td style="width: 170px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl16_lblPgName">社員情報書出処理</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 20px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvPgAuth$ctl17$chkIsSelect" id="ctl00_cphContentsArea_gvPgAuth_ctl17_chkIsSelect" type="checkbox">
                                                </td>
                                                <td style="width: 110px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl17_lblMclsName">マスタ</span>
                                                </td>
                                                <td style="width: 170px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl17_lblPgName">社員情報取込処理</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 20px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvPgAuth$ctl18$chkIsSelect" id="ctl00_cphContentsArea_gvPgAuth_ctl18_chkIsSelect" type="checkbox">
                                                </td>
                                                <td style="width: 110px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl18_lblMclsName">マスタ</span>
                                                </td>
                                                <td style="width: 170px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl18_lblPgName">所属情報入力</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 20px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvPgAuth$ctl19$chkIsSelect" id="ctl00_cphContentsArea_gvPgAuth_ctl19_chkIsSelect" type="checkbox">
                                                </td>
                                                <td style="width: 110px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl19_lblMclsName">マスタ</span>
                                                </td>
                                                <td style="width: 170px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl19_lblPgName">給食情報入力</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 20px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvPgAuth$ctl20$chkIsSelect" id="ctl00_cphContentsArea_gvPgAuth_ctl20_chkIsSelect" type="checkbox">
                                                </td>
                                                <td style="width: 110px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl20_lblMclsName">マスタ</span>
                                                </td>
                                                <td style="width: 170px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl20_lblPgName">仕入先情報入力</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 20px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvPgAuth$ctl21$chkIsSelect" id="ctl00_cphContentsArea_gvPgAuth_ctl21_chkIsSelect" type="checkbox">
                                                </td>
                                                <td style="width: 110px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl21_lblMclsName">勤怠管理</span>
                                                </td>
                                                <td style="width: 170px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl21_lblPgName">出退勤入力</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 20px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvPgAuth$ctl22$chkIsSelect" id="ctl00_cphContentsArea_gvPgAuth_ctl22_chkIsSelect" type="checkbox">
                                                </td>
                                                <td style="width: 110px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl22_lblMclsName">勤怠管理</span>
                                                </td>
                                                <td style="width: 170px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl22_lblPgName">勤務状況照会(個人用)</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 20px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvPgAuth$ctl23$chkIsSelect" id="ctl00_cphContentsArea_gvPgAuth_ctl23_chkIsSelect" type="checkbox">
                                                </td>
                                                <td style="width: 110px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl23_lblMclsName">勤怠管理</span>
                                                </td>
                                                <td style="width: 170px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl23_lblPgName">勤務状況照会(管理者用)</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 20px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvPgAuth$ctl24$chkIsSelect" id="ctl00_cphContentsArea_gvPgAuth_ctl24_chkIsSelect" type="checkbox">
                                                </td>
                                                <td style="width: 110px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl24_lblMclsName">勤怠管理</span>
                                                </td>
                                                <td style="width: 170px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl24_lblPgName">出退勤照会</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 20px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvPgAuth$ctl25$chkIsSelect" id="ctl00_cphContentsArea_gvPgAuth_ctl25_chkIsSelect" type="checkbox">
                                                </td>
                                                <td style="width: 110px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl25_lblMclsName">勤怠管理</span>
                                                </td>
                                                <td style="width: 170px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl25_lblPgName">出退勤入力(部門別)</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 20px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvPgAuth$ctl26$chkIsSelect" id="ctl00_cphContentsArea_gvPgAuth_ctl26_chkIsSelect" type="checkbox">
                                                </td>
                                                <td style="width: 110px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl26_lblMclsName">帳票</span>
                                                </td>
                                                <td style="width: 170px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl26_lblPgName">勤務予定表(週・月別)</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 20px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvPgAuth$ctl27$chkIsSelect" id="ctl00_cphContentsArea_gvPgAuth_ctl27_chkIsSelect" type="checkbox">
                                                </td>
                                                <td style="width: 110px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl27_lblMclsName">帳票</span>
                                                </td>
                                                <td style="width: 170px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl27_lblPgName">勤務実績表(日・週・月別)</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 20px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvPgAuth$ctl28$chkIsSelect" id="ctl00_cphContentsArea_gvPgAuth_ctl28_chkIsSelect" type="checkbox">
                                                </td>
                                                <td style="width: 110px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl28_lblMclsName">帳票</span>
                                                </td>
                                                <td style="width: 170px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl28_lblPgName">未打刻／二重打刻一覧表</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 20px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvPgAuth$ctl29$chkIsSelect" id="ctl00_cphContentsArea_gvPgAuth_ctl29_chkIsSelect" type="checkbox">
                                                </td>
                                                <td style="width: 110px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl29_lblMclsName">帳票</span>
                                                </td>
                                                <td style="width: 170px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl29_lblPgName">事由／勤怠一覧表</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 20px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvPgAuth$ctl30$chkIsSelect" id="ctl00_cphContentsArea_gvPgAuth_ctl30_chkIsSelect" type="checkbox">
                                                </td>
                                                <td style="width: 110px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl30_lblMclsName">帳票</span>
                                                </td>
                                                <td style="width: 170px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl30_lblPgName">残業申請書</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 20px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvPgAuth$ctl31$chkIsSelect" id="ctl00_cphContentsArea_gvPgAuth_ctl31_chkIsSelect" type="checkbox">
                                                </td>
                                                <td style="width: 110px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl31_lblMclsName">シフト管理</span>
                                                </td>
                                                <td style="width: 170px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl31_lblPgName">シフトパターン情報入力</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 20px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvPgAuth$ctl32$chkIsSelect" id="ctl00_cphContentsArea_gvPgAuth_ctl32_chkIsSelect" type="checkbox">
                                                </td>
                                                <td style="width: 110px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl32_lblMclsName">シフト管理</span>
                                                </td>
                                                <td style="width: 170px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl32_lblPgName">月別シフト入力</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 20px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvPgAuth$ctl33$chkIsSelect" id="ctl00_cphContentsArea_gvPgAuth_ctl33_chkIsSelect" type="checkbox">
                                                </td>
                                                <td style="width: 110px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl33_lblMclsName">シフト管理</span>
                                                </td>
                                                <td style="width: 170px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl33_lblPgName">社員別月別シフト入力</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 20px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvPgAuth$ctl34$chkIsSelect" id="ctl00_cphContentsArea_gvPgAuth_ctl34_chkIsSelect" type="checkbox">
                                                </td>
                                                <td style="width: 110px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl34_lblMclsName">管理業務</span>
                                                </td>
                                                <td style="width: 170px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl34_lblPgName">カレンダー情報入力</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 20px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvPgAuth$ctl35$chkIsSelect" id="ctl00_cphContentsArea_gvPgAuth_ctl35_chkIsSelect" type="checkbox">
                                                </td>
                                                <td style="width: 110px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl35_lblMclsName">管理業務</span>
                                                </td>
                                                <td style="width: 170px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl35_lblPgName">シフト月次更新処理</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 20px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvPgAuth$ctl36$chkIsSelect" id="ctl00_cphContentsArea_gvPgAuth_ctl36_chkIsSelect" type="checkbox">
                                                </td>
                                                <td style="width: 110px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl36_lblMclsName">管理業務</span>
                                                </td>
                                                <td style="width: 170px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl36_lblPgName">最新打刻情報取得処理</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 20px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvPgAuth$ctl37$chkIsSelect" id="ctl00_cphContentsArea_gvPgAuth_ctl37_chkIsSelect" type="checkbox">
                                                </td>
                                                <td style="width: 110px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl37_lblMclsName">管理業務</span>
                                                </td>
                                                <td style="width: 170px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl37_lblPgName">月次確定処理</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 20px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvPgAuth$ctl38$chkIsSelect" id="ctl00_cphContentsArea_gvPgAuth_ctl38_chkIsSelect" type="checkbox">
                                                </td>
                                                <td style="width: 110px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl38_lblMclsName">管理業務</span>
                                                </td>
                                                <td style="width: 170px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl38_lblPgName">出退勤情報クリア処理</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 20px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvPgAuth$ctl39$chkIsSelect" id="ctl00_cphContentsArea_gvPgAuth_ctl39_chkIsSelect" type="checkbox">
                                                </td>
                                                <td style="width: 110px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl39_lblMclsName">管理業務</span>
                                                </td>
                                                <td style="width: 170px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl39_lblPgName">月次確定状況照会</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 20px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvPgAuth$ctl40$chkIsSelect" id="ctl00_cphContentsArea_gvPgAuth_ctl40_chkIsSelect" type="checkbox">
                                                </td>
                                                <td style="width: 110px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl40_lblMclsName">管理業務</span>
                                                </td>
                                                <td style="width: 170px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl40_lblPgName">カレンダー情報クリア処理</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 20px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvPgAuth$ctl41$chkIsSelect" id="ctl00_cphContentsArea_gvPgAuth_ctl41_chkIsSelect" type="checkbox">
                                                </td>
                                                <td style="width: 110px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl41_lblMclsName">管理業務</span>
                                                </td>
                                                <td style="width: 170px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl41_lblPgName">勤務実績情報出力</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 20px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvPgAuth$ctl42$chkIsSelect" id="ctl00_cphContentsArea_gvPgAuth_ctl42_chkIsSelect" type="checkbox">
                                                </td>
                                                <td style="width: 110px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl42_lblMclsName">管理業務</span>
                                                </td>
                                                <td style="width: 170px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl42_lblPgName">給食予約入力</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 20px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvPgAuth$ctl43$chkIsSelect" id="ctl00_cphContentsArea_gvPgAuth_ctl43_chkIsSelect" type="checkbox">
                                                </td>
                                                <td style="width: 110px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl43_lblMclsName">管理業務</span>
                                                </td>
                                                <td style="width: 170px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl43_lblPgName">給食予約確定処理</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 20px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvPgAuth$ctl44$chkIsSelect" id="ctl00_cphContentsArea_gvPgAuth_ctl44_chkIsSelect" type="checkbox">
                                                </td>
                                                <td style="width: 110px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl44_lblMclsName">管理業務</span>
                                                </td>
                                                <td style="width: 170px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl44_lblPgName">給食予約情報出力</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 20px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvPgAuth$ctl45$chkIsSelect" id="ctl00_cphContentsArea_gvPgAuth_ctl45_chkIsSelect" type="checkbox">
                                                </td>
                                                <td style="width: 110px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl45_lblMclsName">管理業務</span>
                                                </td>
                                                <td style="width: 170px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl45_lblPgName">給食予約一括処理</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 20px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvPgAuth$ctl46$chkIsSelect" id="ctl00_cphContentsArea_gvPgAuth_ctl46_chkIsSelect" type="checkbox">
                                                </td>
                                                <td style="width: 110px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl46_lblMclsName">C/S</span>
                                                </td>
                                                <td style="width: 170px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl46_lblPgName">シフト変更処理</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 20px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvPgAuth$ctl47$chkIsSelect" id="ctl00_cphContentsArea_gvPgAuth_ctl47_chkIsSelect" type="checkbox">
                                                </td>
                                                <td style="width: 110px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl47_lblMclsName">C/S</span>
                                                </td>
                                                <td style="width: 170px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl47_lblPgName">勤務予定表</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="GridViewRowCenter" style="width: 20px; white-space: nowrap;">
                                                    <input name="ctl00$cphContentsArea$gvPgAuth$ctl48$chkIsSelect" id="ctl00_cphContentsArea_gvPgAuth_ctl48_chkIsSelect" type="checkbox">
                                                </td>
                                                <td style="width: 110px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl48_lblMclsName">C/S</span>
                                                </td>
                                                <td style="width: 170px; white-space: nowrap;">
                                                    <span id="ctl00_cphContentsArea_gvPgAuth_ctl48_lblPgName">出退勤入力(部門別)</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>

                        <div class="line"></div>

                        <p class="ButtonField1">
                            <input name="ctl00$cphContentsArea$btnUpdate" tabindex="6" id="ctl00_cphContentsArea_btnUpdate" onclick="if(confirm('更新します。よろしいですか?') ==  false){ return false;};WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions())" type="button" value="更新">
                            <input name="ctl00$cphContentsArea$btnCancel" tabindex="7" id="ctl00_cphContentsArea_btnCancel" onclick="javascript:__doPostBack('ctl00$cphContentsArea$btnCancel','')" type="button" value="キャンセル">
                            <input name="ctl00$cphContentsArea$btnDelete" tabindex="8" disabled="disabled" id="ctl00_cphContentsArea_btnDelete" type="button" value="削除">
                        </p>

                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
