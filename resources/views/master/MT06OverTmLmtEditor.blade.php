<!-- 残業上限情報入力  -->
@extends('menu.main')

@section('title','残業上限情報入力 ')

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
                                    <th>カレンダー</th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlCalendarCd" tabindex="1" id="ctl00_cphContentsArea_ddlCalendarCd" style="width: 250px;" onchange="javascript:setTimeout('WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$cphContentsArea$ddlCalendarCd&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, true))', 0)">
                                            <option selected="selected" value=""></option>
                                            <option value="001">通常１(8:00～17:00)</option>
                                            <option value="002">通常2(7:00～16:00)</option>
                                            <option value="003">通常3(9:00～1800)</option>
                                            <option value="010">夜勤Ⅰ(20:00～29:00)</option>
                                            <option value="011">夜勤Ⅱ(16:00～25:00)</option>
                                            <option value="100">シフト勤務用</option>
                                            <option value="999">共通</option>

                                        </select>
                                        <span id="ctl00_cphContentsArea_cvCalendarCd" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="line"></div>

                        <table class="InputFieldStyle1">
                            <tbody>
                                <tr>
                                    <th>残業項目１</th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlOvtm1Cd" tabindex="2" disabled="disabled" id="ctl00_cphContentsArea_ddlOvtm1Cd" style="width: 180px;" onchange="ClearOvtmHr('ctl00_cphContentsArea_ddlOvtm1Cd', 'ctl00_cphContentsArea_txtOvtm1Hr');">
                                            <option selected="selected" value=""></option>
                                            <option value="100">早出時間</option>
                                            <option value="101">普通残業時間</option>
                                            <option value="102">深夜残業時間</option>
                                            <option value="103">休日残業時間</option>
                                            <option value="104">休日深夜残業時間</option>

                                        </select>

                                    </td>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtOvtm1Hr" tabindex="3" disabled="disabled" class="imeDisabled right" id="ctl00_cphContentsArea_txtOvtm1Hr" style="width: 35px;" onfocus="this.select();" type="text" maxlength="3">

                                        <span id="ctl00_cphContentsArea_lblTitleOvtm1HrUnit">時間 / 月</span>

                                    </td>
                                </tr>
                                <tr>
                                    <th>残業項目２</th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlOvtm2Cd" tabindex="4" disabled="disabled" id="ctl00_cphContentsArea_ddlOvtm2Cd" style="width: 180px;" onchange="ClearOvtmHr('ctl00_cphContentsArea_ddlOvtm2Cd', 'ctl00_cphContentsArea_txtOvtm2Hr');">
                                            <option selected="selected" value=""></option>
                                            <option value="100">早出時間</option>
                                            <option value="101">普通残業時間</option>
                                            <option value="102">深夜残業時間</option>
                                            <option value="103">休日残業時間</option>
                                            <option value="104">休日深夜残業時間</option>

                                        </select>

                                    </td>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtOvtm2Hr" tabindex="5" disabled="disabled" class="imeDisabled right" id="ctl00_cphContentsArea_txtOvtm2Hr" style="width: 35px;" onfocus="this.select();" type="text" maxlength="3">

                                        <span id="ctl00_cphContentsArea_lblTitleOvtm2HrUnit">時間 / 月</span>

                                    </td>
                                </tr>
                                <tr>
                                    <th>残業項目３</th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlOvtm3Cd" tabindex="6" disabled="disabled" id="ctl00_cphContentsArea_ddlOvtm3Cd" style="width: 180px;" onchange="ClearOvtmHr('ctl00_cphContentsArea_ddlOvtm3Cd', 'ctl00_cphContentsArea_txtOvtm3Hr');">
                                            <option selected="selected" value=""></option>
                                            <option value="100">早出時間</option>
                                            <option value="101">普通残業時間</option>
                                            <option value="102">深夜残業時間</option>
                                            <option value="103">休日残業時間</option>
                                            <option value="104">休日深夜残業時間</option>

                                        </select>

                                    </td>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtOvtm3Hr" tabindex="7" disabled="disabled" class="imeDisabled right" id="ctl00_cphContentsArea_txtOvtm3Hr" style="width: 35px;" onfocus="this.select();" type="text" maxlength="3">

                                        <span id="ctl00_cphContentsArea_lblTitleOvtm3HrUnit">時間 / 月</span>

                                    </td>
                                </tr>
                                <tr>
                                    <th>残業項目４</th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlOvtm4Cd" tabindex="8" disabled="disabled" id="ctl00_cphContentsArea_ddlOvtm4Cd" style="width: 180px;" onchange="ClearOvtmHr('ctl00_cphContentsArea_ddlOvtm4Cd', 'ctl00_cphContentsArea_txtOvtm4Hr');">
                                            <option selected="selected" value=""></option>
                                            <option value="100">早出時間</option>
                                            <option value="101">普通残業時間</option>
                                            <option value="102">深夜残業時間</option>
                                            <option value="103">休日残業時間</option>
                                            <option value="104">休日深夜残業時間</option>

                                        </select>

                                    </td>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtOvtm4Hr" tabindex="9" disabled="disabled" class="imeDisabled right" id="ctl00_cphContentsArea_txtOvtm4Hr" style="width: 35px;" onfocus="this.select();" type="text" maxlength="3">

                                        <span id="ctl00_cphContentsArea_lblTitleOvtm4HrUnit">時間 / 月</span>

                                    </td>
                                </tr>
                                <tr>
                                    <th>残業項目５</th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlOvtm5Cd" tabindex="10" disabled="disabled" id="ctl00_cphContentsArea_ddlOvtm5Cd" style="width: 180px;" onchange="ClearOvtmHr('ctl00_cphContentsArea_ddlOvtm5Cd', 'ctl00_cphContentsArea_txtOvtm5Hr');">
                                            <option selected="selected" value=""></option>
                                            <option value="100">早出時間</option>
                                            <option value="101">普通残業時間</option>
                                            <option value="102">深夜残業時間</option>
                                            <option value="103">休日残業時間</option>
                                            <option value="104">休日深夜残業時間</option>

                                        </select>

                                    </td>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtOvtm5Hr" tabindex="11" disabled="disabled" class="imeDisabled right" id="ctl00_cphContentsArea_txtOvtm5Hr" style="width: 35px;" onfocus="this.select();" type="text" maxlength="3">

                                        <span id="ctl00_cphContentsArea_lblTitleOvtm5HrUnit">時間 / 月</span>

                                    </td>
                                </tr>
                                <tr>
                                    <th>残業項目６</th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlOvtm6Cd" tabindex="12" disabled="disabled" id="ctl00_cphContentsArea_ddlOvtm6Cd" style="width: 180px;" onchange="ClearOvtmHr('ctl00_cphContentsArea_ddlOvtm6Cd', 'ctl00_cphContentsArea_txtOvtm6Hr');">
                                            <option selected="selected" value=""></option>
                                            <option value="100">早出時間</option>
                                            <option value="101">普通残業時間</option>
                                            <option value="102">深夜残業時間</option>
                                            <option value="103">休日残業時間</option>
                                            <option value="104">休日深夜残業時間</option>

                                        </select>

                                    </td>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtOvtm6Hr" tabindex="13" disabled="disabled" class="imeDisabled right" id="ctl00_cphContentsArea_txtOvtm6Hr" style="width: 35px;" onfocus="this.select();" type="text" maxlength="3">

                                        <span id="ctl00_cphContentsArea_lblTitleOvtm6HrUnit">時間 / 月</span>

                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="line"></div>

                        <table class="InputFieldStyle1">
                            <tbody>
                                <tr>
                                    <th>残業未対応時間</th>
                                    <td>
                                        <span id="ctl00_cphContentsArea_lblTitleNoOvertmMiUnit1">１日の残業時間のうち</span>
                                        <select name="ctl00$cphContentsArea$ddlNoOvertmMi" tabindex="14" disabled="disabled" class="imeDisabled" id="ctl00_cphContentsArea_ddlNoOvertmMi" style="width: 50px;">
                                            <option selected="selected" value="00">0</option>
                                            <option value="05">5</option>
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
                                            <option value="25">25</option>
                                            <option value="30">30</option>
                                            <option value="35">35</option>
                                            <option value="40">40</option>
                                            <option value="45">45</option>
                                            <option value="50">50</option>
                                            <option value="55">55</option>
                                            <option value="60">60</option>

                                        </select>
                                        <span id="ctl00_cphContentsArea_lblTitleNoOvertmMiUnit2">分未満は未対応</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="line"></div>

                        <table class="InputFieldStyle1">
                            <tbody>
                                <tr>
                                    <th>総残業時間上限１</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtTtlOvtm1Hr" tabindex="15" disabled="disabled" class="imeDisabled right" id="ctl00_cphContentsArea_txtTtlOvtm1Hr" style="width: 35px;" onfocus="this.select();" type="text" maxlength="3">

                                        <span id="ctl00_cphContentsArea_lblTitleTtlOvtm1HrUnit">時間 / 月</span>

                                    </td>
                                </tr>
                                <tr>
                                    <th>総残業時間上限２</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtTtlOvtm2Hr" tabindex="16" disabled="disabled" class="imeDisabled right" id="ctl00_cphContentsArea_txtTtlOvtm2Hr" style="width: 35px;" onfocus="this.select();" type="text" maxlength="3">

                                        <span id="ctl00_cphContentsArea_lblTitleTtlOvtm2HrUnit">時間 / 月</span>

                                    </td>
                                </tr>
                                <tr>
                                    <th>総残業時間上限３</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtTtlOvtm3Hr" tabindex="17" disabled="disabled" class="imeDisabled right" id="ctl00_cphContentsArea_txtTtlOvtm3Hr" style="width: 35px;" onfocus="this.select();" type="text" maxlength="3">

                                        <span id="ctl00_cphContentsArea_lblTitleTtlOvtm3HrUnit">時間 / 月</span>

                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="line"></div>
                        <p class="ButtonField1">
                            <input name="ctl00$cphContentsArea$btnUpdate" tabindex="18" disabled="disabled" id="ctl00_cphContentsArea_btnUpdate" type="button" value="更新">
                            <input name="ctl00$cphContentsArea$btnCancel" tabindex="19" id="ctl00_cphContentsArea_btnCancel" onclick="javascript:__doPostBack('ctl00$cphContentsArea$btnCancel','')" type="button" value="キャンセル">
                            <input name="ctl00$cphContentsArea$btnDelete" tabindex="20" disabled="disabled" id="ctl00_cphContentsArea_btnDelete" type="button" value="削除">
                        </p>


                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection