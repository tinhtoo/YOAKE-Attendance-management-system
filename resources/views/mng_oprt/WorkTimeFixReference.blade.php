<!-- 月次確定状況照会画面 -->
@extends('menu.main')
@section('title', '月次確定状況照会')
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
                                    </tr>
                                </tbody>
                            </table>
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input name="ctl00$cphContentsArea$chkNoFix" tabindex="4"
                                                id="ctl00_cphContentsArea_chkNoFix" type="checkbox" checked="checked"><label
                                                for="ctl00_cphContentsArea_chkNoFix">未確定のみ表示</label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="line"></div>

                            <input name="ctl00$cphContentsArea$btnDisp" tabindex="5" class="ButtonStyle1"
                                id="ctl00_cphContentsArea_btnDisp"
                                onclick='javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions("ctl00$cphContentsArea$btnDisp", "", true, "Search", "", false, true))'
                                type="button" value="表示">
                            <input name="ctl00$cphContentsArea$btnCancel2" tabindex="6" class="ButtonStyle1"
                                id="ctl00_cphContentsArea_btnCancel2"
                                onclick="javascript:__doPostBack('ctl00$cphContentsArea$btnCancel2','')" type="button"
                                value="キャンセル">

                            <div class="GridViewStyle1 mg10" id="gridview-container">
                                <div class="GridViewPanelStyle5" id="ctl00_cphContentsArea_pnlWorkTimeFixReference">

                                    <div>
                                        <table tabindex="7" class="GridViewBorder GridViewPadding"
                                            id="ctl00_cphContentsArea_gvWorkTimeFixReference"
                                            style="border-collapse: collapse;" border="1" rules="all" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td>

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>

                            <div class="line"></div>
                            <p class="ButtonField2">
                                <input name="ctl00$cphContentsArea$btnCancel" tabindex="8"
                                    id="ctl00_cphContentsArea_btnCancel"
                                    onclick="javascript:__doPostBack('ctl00$cphContentsArea$btnCancel','')" type="button"
                                    value="キャンセル">
                            </p>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
