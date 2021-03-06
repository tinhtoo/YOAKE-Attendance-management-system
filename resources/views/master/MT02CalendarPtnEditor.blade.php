<!--カレンダーパターン情報入力 -->
@extends('menu.main')

@section('title','カレンダーパターン情報入力 ')

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
                                    <th>カレンダーコード</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtCalendarCd" tabindex="1" class="imeDisabled" id="ctl00_cphContentsArea_txtCalendarCd" style="width: 30px;" onfocus="this.select();" type="text" maxlength="3">

                                        <span id="ctl00_cphContentsArea_cvCalendarCd" style="color: red; display: none;">ErrorMessage</span>
                                        <span id="ctl00_cphContentsArea_cvCalendarCdDlt" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>カレンダー名</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtCalendarPtnName" tabindex="2" class="imeOn" id="ctl00_cphContentsArea_txtCalendarPtnName" style="width: 300px;" onfocus="this.select();" type="text" maxlength="20">

                                        <span id="ctl00_cphContentsArea_cvCalendarPtnName" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <p class="CategoryTitle1">カレンダー区分</p>
                        <table class="GroupBox1">
                            <tbody>
                                <tr>
                                    <td>
                                        <input name="ctl00$cphContentsArea$WorkPtn" tabindex="3" id="ctl00_cphContentsArea_rbUsuallyWork" type="radio" checked="checked" value="rbUsuallyWork"><label for="ctl00_cphContentsArea_rbUsuallyWork">通常勤務用</label>
                                        <input name="ctl00$cphContentsArea$WorkPtn" tabindex="4" id="ctl00_cphContentsArea_rbShiftWork" onclick="javascript:setTimeout('__doPostBack(\'ctl00$cphContentsArea$rbShiftWork\',\'\')', 0)" type="radio" value="rbShiftWork"><label for="ctl00_cphContentsArea_rbShiftWork">シフト勤務用</label>
                                        <div class="clearBoth"></div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="GridViewStyle2 mg10">
                            <table>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <th>勤務体系</th>
                                    </tr>
                                    <tr>
                                        <th class="RowTitle">月曜日</th>
                                        <td>
                                            <select name="ctl00$cphContentsArea$ddlMonWorkPtn" tabindex="5" id="ctl00_cphContentsArea_ddlMonWorkPtn" style="width: 260px;">
                                                <option selected="selected" value=""></option>
                                                <option value="001">通常１(8-17)</option>
                                                <option style="color: red;" value="002">休日勤務</option>
                                                <option value="003">通常２(5-14)</option>
                                                <option value="004">通常３(6-15)</option>
                                                <option value="005">通常４(7-16)</option>
                                                <option value="006">通常５(9-18)</option>
                                                <option value="007">通常６(10-19)</option>
                                                <option value="008">通常７(11-20)</option>
                                                <option value="009">通常８(13-22)</option>
                                                <option value="011">通常１０(15-24)</option>
                                                <option value="012">通常１１(5:30-14:30)</option>
                                                <option value="013">通常１２(6:30-15:30)</option>
                                                <option value="101">夜間Ⅰ(20-29)</option>
                                                <option style="color: red;" value="102">休日夜間勤務</option>
                                                <option value="103">夜間Ⅱ(16-25)</option>
                                                <option value="104">夜間Ⅲ(17-26)</option>
                                                <option value="105">夜間Ⅳ(18-27)</option>
                                                <option value="106">夜間Ⅴ(19-28)</option>
                                                <option value="107">夜間Ⅵ(21-30)</option>
                                                <option value="108">夜間Ⅶ(22-31)</option>
                                                <option value="109">夜間Ⅷ(23-32)</option>
                                                <option value="200">パート０１</option>

                                            </select>
                                        </td>
                                        <td>
                                            <span id="ctl00_cphContentsArea_cvMonWorkPtn" style="color: red; display: none;">ErrorMessage</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="RowTitle">火曜日</th>
                                        <td>
                                            <select name="ctl00$cphContentsArea$ddlTueWorkPtn" tabindex="6" id="ctl00_cphContentsArea_ddlTueWorkPtn" style="width: 260px;">
                                                <option selected="selected" value=""></option>
                                                <option value="001">通常１(8-17)</option>
                                                <option style="color: red;" value="002">休日勤務</option>
                                                <option value="003">通常２(5-14)</option>
                                                <option value="004">通常３(6-15)</option>
                                                <option value="005">通常４(7-16)</option>
                                                <option value="006">通常５(9-18)</option>
                                                <option value="007">通常６(10-19)</option>
                                                <option value="008">通常７(11-20)</option>
                                                <option value="009">通常８(13-22)</option>
                                                <option value="011">通常１０(15-24)</option>
                                                <option value="012">通常１１(5:30-14:30)</option>
                                                <option value="013">通常１２(6:30-15:30)</option>
                                                <option value="101">夜間Ⅰ(20-29)</option>
                                                <option style="color: red;" value="102">休日夜間勤務</option>
                                                <option value="103">夜間Ⅱ(16-25)</option>
                                                <option value="104">夜間Ⅲ(17-26)</option>
                                                <option value="105">夜間Ⅳ(18-27)</option>
                                                <option value="106">夜間Ⅴ(19-28)</option>
                                                <option value="107">夜間Ⅵ(21-30)</option>
                                                <option value="108">夜間Ⅶ(22-31)</option>
                                                <option value="109">夜間Ⅷ(23-32)</option>
                                                <option value="200">パート０１</option>

                                            </select>
                                        </td>
                                        <td>
                                            <span id="ctl00_cphContentsArea_cvTueWorkPtn" style="color: red; display: none;">ErrorMessage</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="RowTitle">水曜日</th>
                                        <td>
                                            <select name="ctl00$cphContentsArea$ddlWedWorkPtn" tabindex="7" id="ctl00_cphContentsArea_ddlWedWorkPtn" style="width: 260px;">
                                                <option selected="selected" value=""></option>
                                                <option value="001">通常１(8-17)</option>
                                                <option style="color: red;" value="002">休日勤務</option>
                                                <option value="003">通常２(5-14)</option>
                                                <option value="004">通常３(6-15)</option>
                                                <option value="005">通常４(7-16)</option>
                                                <option value="006">通常５(9-18)</option>
                                                <option value="007">通常６(10-19)</option>
                                                <option value="008">通常７(11-20)</option>
                                                <option value="009">通常８(13-22)</option>
                                                <option value="011">通常１０(15-24)</option>
                                                <option value="012">通常１１(5:30-14:30)</option>
                                                <option value="013">通常１２(6:30-15:30)</option>
                                                <option value="101">夜間Ⅰ(20-29)</option>
                                                <option style="color: red;" value="102">休日夜間勤務</option>
                                                <option value="103">夜間Ⅱ(16-25)</option>
                                                <option value="104">夜間Ⅲ(17-26)</option>
                                                <option value="105">夜間Ⅳ(18-27)</option>
                                                <option value="106">夜間Ⅴ(19-28)</option>
                                                <option value="107">夜間Ⅵ(21-30)</option>
                                                <option value="108">夜間Ⅶ(22-31)</option>
                                                <option value="109">夜間Ⅷ(23-32)</option>
                                                <option value="200">パート０１</option>

                                            </select>
                                        </td>
                                        <td>
                                            <span id="ctl00_cphContentsArea_cvWedWorkPtn" style="color: red; display: none;">ErrorMessage</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="RowTitle">木曜日</th>
                                        <td>
                                            <select name="ctl00$cphContentsArea$ddlThuWorkPtn" tabindex="8" id="ctl00_cphContentsArea_ddlThuWorkPtn" style="width: 260px;">
                                                <option selected="selected" value=""></option>
                                                <option value="001">通常１(8-17)</option>
                                                <option style="color: red;" value="002">休日勤務</option>
                                                <option value="003">通常２(5-14)</option>
                                                <option value="004">通常３(6-15)</option>
                                                <option value="005">通常４(7-16)</option>
                                                <option value="006">通常５(9-18)</option>
                                                <option value="007">通常６(10-19)</option>
                                                <option value="008">通常７(11-20)</option>
                                                <option value="009">通常８(13-22)</option>
                                                <option value="011">通常１０(15-24)</option>
                                                <option value="012">通常１１(5:30-14:30)</option>
                                                <option value="013">通常１２(6:30-15:30)</option>
                                                <option value="101">夜間Ⅰ(20-29)</option>
                                                <option style="color: red;" value="102">休日夜間勤務</option>
                                                <option value="103">夜間Ⅱ(16-25)</option>
                                                <option value="104">夜間Ⅲ(17-26)</option>
                                                <option value="105">夜間Ⅳ(18-27)</option>
                                                <option value="106">夜間Ⅴ(19-28)</option>
                                                <option value="107">夜間Ⅵ(21-30)</option>
                                                <option value="108">夜間Ⅶ(22-31)</option>
                                                <option value="109">夜間Ⅷ(23-32)</option>
                                                <option value="200">パート０１</option>

                                            </select>
                                        </td>
                                        <td>
                                            <span id="ctl00_cphContentsArea_cvThuWorkPtn" style="color: red; display: none;">ErrorMessage</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="RowTitle">金曜日</th>
                                        <td>
                                            <select name="ctl00$cphContentsArea$ddlFriWorkPtn" tabindex="9" id="ctl00_cphContentsArea_ddlFriWorkPtn" style="width: 260px;">
                                                <option selected="selected" value=""></option>
                                                <option value="001">通常１(8-17)</option>
                                                <option style="color: red;" value="002">休日勤務</option>
                                                <option value="003">通常２(5-14)</option>
                                                <option value="004">通常３(6-15)</option>
                                                <option value="005">通常４(7-16)</option>
                                                <option value="006">通常５(9-18)</option>
                                                <option value="007">通常６(10-19)</option>
                                                <option value="008">通常７(11-20)</option>
                                                <option value="009">通常８(13-22)</option>
                                                <option value="011">通常１０(15-24)</option>
                                                <option value="012">通常１１(5:30-14:30)</option>
                                                <option value="013">通常１２(6:30-15:30)</option>
                                                <option value="101">夜間Ⅰ(20-29)</option>
                                                <option style="color: red;" value="102">休日夜間勤務</option>
                                                <option value="103">夜間Ⅱ(16-25)</option>
                                                <option value="104">夜間Ⅲ(17-26)</option>
                                                <option value="105">夜間Ⅳ(18-27)</option>
                                                <option value="106">夜間Ⅴ(19-28)</option>
                                                <option value="107">夜間Ⅵ(21-30)</option>
                                                <option value="108">夜間Ⅶ(22-31)</option>
                                                <option value="109">夜間Ⅷ(23-32)</option>
                                                <option value="200">パート０１</option>

                                            </select>
                                        </td>
                                        <td>
                                            <span id="ctl00_cphContentsArea_cvFriWorkPtn" style="color: red; display: none;">ErrorMessage</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="RowTitle">土曜日</th>
                                        <td>
                                            <select name="ctl00$cphContentsArea$ddlSatWorkPtn" tabindex="10" id="ctl00_cphContentsArea_ddlSatWorkPtn" style="width: 260px;">
                                                <option selected="selected" value=""></option>
                                                <option value="001">通常１(8-17)</option>
                                                <option style="color: red;" value="002">休日勤務</option>
                                                <option value="003">通常２(5-14)</option>
                                                <option value="004">通常３(6-15)</option>
                                                <option value="005">通常４(7-16)</option>
                                                <option value="006">通常５(9-18)</option>
                                                <option value="007">通常６(10-19)</option>
                                                <option value="008">通常７(11-20)</option>
                                                <option value="009">通常８(13-22)</option>
                                                <option value="011">通常１０(15-24)</option>
                                                <option value="012">通常１１(5:30-14:30)</option>
                                                <option value="013">通常１２(6:30-15:30)</option>
                                                <option value="101">夜間Ⅰ(20-29)</option>
                                                <option style="color: red;" value="102">休日夜間勤務</option>
                                                <option value="103">夜間Ⅱ(16-25)</option>
                                                <option value="104">夜間Ⅲ(17-26)</option>
                                                <option value="105">夜間Ⅳ(18-27)</option>
                                                <option value="106">夜間Ⅴ(19-28)</option>
                                                <option value="107">夜間Ⅵ(21-30)</option>
                                                <option value="108">夜間Ⅶ(22-31)</option>
                                                <option value="109">夜間Ⅷ(23-32)</option>
                                                <option value="200">パート０１</option>

                                            </select>
                                        </td>
                                        <td>
                                            <span id="ctl00_cphContentsArea_cvSatWorkPtn" style="color: red; display: none;">ErrorMessage</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="RowTitle">日曜日</th>
                                        <td>
                                            <select name="ctl00$cphContentsArea$ddlSunWorkPtn" tabindex="11" id="ctl00_cphContentsArea_ddlSunWorkPtn" style="width: 260px;">
                                                <option selected="selected" value=""></option>
                                                <option value="001">通常１(8-17)</option>
                                                <option style="color: red;" value="002">休日勤務</option>
                                                <option value="003">通常２(5-14)</option>
                                                <option value="004">通常３(6-15)</option>
                                                <option value="005">通常４(7-16)</option>
                                                <option value="006">通常５(9-18)</option>
                                                <option value="007">通常６(10-19)</option>
                                                <option value="008">通常７(11-20)</option>
                                                <option value="009">通常８(13-22)</option>
                                                <option value="011">通常１０(15-24)</option>
                                                <option value="012">通常１１(5:30-14:30)</option>
                                                <option value="013">通常１２(6:30-15:30)</option>
                                                <option value="101">夜間Ⅰ(20-29)</option>
                                                <option style="color: red;" value="102">休日夜間勤務</option>
                                                <option value="103">夜間Ⅱ(16-25)</option>
                                                <option value="104">夜間Ⅲ(17-26)</option>
                                                <option value="105">夜間Ⅳ(18-27)</option>
                                                <option value="106">夜間Ⅴ(19-28)</option>
                                                <option value="107">夜間Ⅵ(21-30)</option>
                                                <option value="108">夜間Ⅶ(22-31)</option>
                                                <option value="109">夜間Ⅷ(23-32)</option>
                                                <option value="200">パート０１</option>

                                            </select>
                                        </td>
                                        <td>
                                            <span id="ctl00_cphContentsArea_cvSunWorkPtn" style="color: red; display: none;">ErrorMessage</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="RowTitle">祝日</th>
                                        <td>
                                            <select name="ctl00$cphContentsArea$ddlHldWorkPtn" tabindex="12" id="ctl00_cphContentsArea_ddlHldWorkPtn" style="width: 260px;">
                                                <option selected="selected" value=""></option>
                                                <option value="001">通常１(8-17)</option>
                                                <option style="color: red;" value="002">休日勤務</option>
                                                <option value="003">通常２(5-14)</option>
                                                <option value="004">通常３(6-15)</option>
                                                <option value="005">通常４(7-16)</option>
                                                <option value="006">通常５(9-18)</option>
                                                <option value="007">通常６(10-19)</option>
                                                <option value="008">通常７(11-20)</option>
                                                <option value="009">通常８(13-22)</option>
                                                <option value="011">通常１０(15-24)</option>
                                                <option value="012">通常１１(5:30-14:30)</option>
                                                <option value="013">通常１２(6:30-15:30)</option>
                                                <option value="101">夜間Ⅰ(20-29)</option>
                                                <option style="color: red;" value="102">休日夜間勤務</option>
                                                <option value="103">夜間Ⅱ(16-25)</option>
                                                <option value="104">夜間Ⅲ(17-26)</option>
                                                <option value="105">夜間Ⅳ(18-27)</option>
                                                <option value="106">夜間Ⅴ(19-28)</option>
                                                <option value="107">夜間Ⅵ(21-30)</option>
                                                <option value="108">夜間Ⅶ(22-31)</option>
                                                <option value="109">夜間Ⅷ(23-32)</option>
                                                <option value="200">パート０１</option>

                                            </select>
                                        </td>
                                        <td>
                                            <span id="ctl00_cphContentsArea_cvHldWorkPtn" style="color: red; display: none;">ErrorMessage</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="line"></div>
                        <p class="ButtonField1">
                            <input name="ctl00$cphContentsArea$btnUpdate" tabindex="13" id="ctl00_cphContentsArea_btnUpdate" onclick="if(confirm('更新します。よろしいですか?') ==  false){ return false;};WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$cphContentsArea$btnUpdate&quot;, &quot;&quot;, true, &quot;Update&quot;, &quot;&quot;, false, true))" type="button" value="更新">
                            <input name="ctl00$cphContentsArea$btnCancel" tabindex="14" id="ctl00_cphContentsArea_btnCancel" onclick="javascript:__doPostBack('ctl00$cphContentsArea$btnCancel','')" type="button" value="キャンセル">
                            <input name="ctl00$cphContentsArea$btnDelete" tabindex="15" disabled="disabled" id="ctl00_cphContentsArea_btnDelete" type="button" value="削除">
                        </p>



                    </div>

                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection