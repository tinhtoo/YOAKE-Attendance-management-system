<!-- 端数処理情報入力 -->
@extends('menu.main')

@section('title','端数処理情報入力')

@section('content')
<div id="contents-stage">
    <table style="width: 850px;">
        <tbody>
            <tr>
                <td>
                    <div id="ctl00_cphContentsArea_UpdatePanel1">
                        <table class="InputFieldStyle1">
                            <tbody>
                                <tr>
                                    <th>勤務体系</th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlWorkptnCd" tabindex="1" id="ctl00_cphContentsArea_ddlWorkptnCd" style="width: 250px;" onchange="javascript:setTimeout('WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$cphContentsArea$ddlWorkptnCd&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, true))', 0)">
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
                                            <option value="999">共通</option>

                                        </select>
                                        <span id="ctl00_cphContentsArea_cvWorkptnCd" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <p class="CategoryTitle1">出退勤端数処理</p>
                        <table class="GroupBox1">
                            <tbody>
                                <tr>
                                    <td>
                                        <span disabled="disabled"><input name="ctl00$cphContentsArea$FractionCls" tabindex="2" disabled="disabled" id="ctl00_cphContentsArea_rbFractionClsHr" type="radio" checked="checked" value="rbFractionClsHr"><label for="ctl00_cphContentsArea_rbFractionClsHr">時間</label></span>
                                        <span disabled="disabled"><input name="ctl00$cphContentsArea$FractionCls" tabindex="3" disabled="disabled" id="ctl00_cphContentsArea_rbFractionClsTm" onclick="javascript:setTimeout('__doPostBack(\'ctl00$cphContentsArea$rbFractionClsTm\',\'\')', 0)" type="radio" value="rbFractionClsTm"><label for="ctl00_cphContentsArea_rbFractionClsTm">時刻</label></span>
                                        <div class="clearBoth"></div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <table class="InputFieldStyle1 mg10">
                            <tbody>
                                <tr>
                                    <th>出勤時間</th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlWthrUnderMi" tabindex="4" disabled="disabled" class="imeDisabled" id="ctl00_cphContentsArea_ddlWthrUnderMi" style="width: 50px;">
                                            <option selected="selected" value=""></option>
                                            <option value="00">0</option>
                                            <option value="05">5</option>
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="60">60</option>

                                        </select>
                                        <span id="ctl00_cphContentsArea_lblTitleWthrUnderMiUnit">分未満</span>
                                    </td>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlWthrFrcClsCd" tabindex="5" disabled="disabled" id="ctl00_cphContentsArea_ddlWthrFrcClsCd" style="width: 110px;">
                                            <option selected="selected" value=""></option>
                                            <option value="00">切上げ</option>
                                            <option value="01">切捨て</option>
                                            <option value="02">四捨五入</option>

                                        </select>

                                    </td>
                                    <th>出勤時刻</th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlWttmUnderMi" tabindex="12" disabled="disabled" class="imeDisabled" id="ctl00_cphContentsArea_ddlWttmUnderMi" style="width: 50px;">
                                            <option selected="selected" value=""></option>
                                            <option value="00">0</option>
                                            <option value="05">5</option>
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="60">60</option>

                                        </select>
                                        <span id="ctl00_cphContentsArea_lblTitleWttmUnderMiUnit">分未満</span>
                                    </td>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlWttmFrcClsCd" tabindex="13" disabled="disabled" id="ctl00_cphContentsArea_ddlWttmFrcClsCd" style="width: 110px;">
                                            <option selected="selected" value=""></option>
                                            <option value="00">切上げ</option>
                                            <option value="01">切捨て</option>
                                            <option value="02">四捨五入</option>

                                        </select>

                                    </td>
                                </tr>
                                <tr>
                                    <th>遅刻時間</th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlLthrUnderMi" tabindex="6" disabled="disabled" class="imeDisabled" id="ctl00_cphContentsArea_ddlLthrUnderMi" style="width: 50px;">
                                            <option selected="selected" value=""></option>
                                            <option value="00">0</option>
                                            <option value="05">5</option>
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="60">60</option>

                                        </select>
                                        <span id="ctl00_cphContentsArea_lblTitleLthrUnderMiUnit">分未満</span>
                                    </td>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlLthrFrcClsCd" tabindex="7" disabled="disabled" id="ctl00_cphContentsArea_ddlLthrFrcClsCd" style="width: 110px;">
                                            <option selected="selected" value=""></option>
                                            <option value="00">切上げ</option>
                                            <option value="01">切捨て</option>
                                            <option value="02">四捨五入</option>

                                        </select>

                                    </td>
                                    <th>退出時刻</th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlLvtmUnderMi" tabindex="14" disabled="disabled" class="imeDisabled" id="ctl00_cphContentsArea_ddlLvtmUnderMi" style="width: 50px;">
                                            <option selected="selected" value=""></option>
                                            <option value="00">0</option>
                                            <option value="05">5</option>
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="60">60</option>

                                        </select>
                                        <span id="ctl00_cphContentsArea_lblTitleLvtmUnderMiUnit">分未満</span>
                                    </td>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlLvtmFrcClsCd" tabindex="15" disabled="disabled" id="ctl00_cphContentsArea_ddlLvtmFrcClsCd" style="width: 110px;">
                                            <option selected="selected" value=""></option>
                                            <option value="00">切上げ</option>
                                            <option value="01">切捨て</option>
                                            <option value="02">四捨五入</option>

                                        </select>

                                    </td>
                                </tr>
                                <tr>
                                    <th>早退時間</th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlErhrUnderMi" tabindex="8" disabled="disabled" class="imeDisabled" id="ctl00_cphContentsArea_ddlErhrUnderMi" style="width: 50px;">
                                            <option selected="selected" value=""></option>
                                            <option value="00">0</option>
                                            <option value="05">5</option>
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="60">60</option>

                                        </select>
                                        <span id="ctl00_cphContentsArea_lblTitleErhrUnderMiUnit">分未満</span>
                                    </td>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlErhrFrcClsCd" tabindex="9" disabled="disabled" id="ctl00_cphContentsArea_ddlErhrFrcClsCd" style="width: 110px;">
                                            <option selected="selected" value=""></option>
                                            <option value="00">切上げ</option>
                                            <option value="01">切捨て</option>
                                            <option value="02">四捨五入</option>

                                        </select>

                                    </td>
                                    <th>外出時刻</th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlOttmUnderMi" tabindex="16" disabled="disabled" class="imeDisabled" id="ctl00_cphContentsArea_ddlOttmUnderMi" style="width: 50px;">
                                            <option selected="selected" value=""></option>
                                            <option value="00">0</option>
                                            <option value="05">5</option>
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="60">60</option>

                                        </select>
                                        <span id="ctl00_cphContentsArea_lblTitleOttmUnderMiUnit">分未満</span>
                                    </td>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlOttmFrcClsCd" tabindex="17" disabled="disabled" id="ctl00_cphContentsArea_ddlOttmFrcClsCd" style="width: 110px;">
                                            <option selected="selected" value=""></option>
                                            <option value="00">切上げ</option>
                                            <option value="01">切捨て</option>
                                            <option value="02">四捨五入</option>

                                        </select>

                                    </td>
                                </tr>
                                <tr>
                                    <th>外出時間</th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlOthrUnderMi" tabindex="10" disabled="disabled" class="imeDisabled" id="ctl00_cphContentsArea_ddlOthrUnderMi" style="width: 50px;">
                                            <option selected="selected" value=""></option>
                                            <option value="00">0</option>
                                            <option value="05">5</option>
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="60">60</option>

                                        </select>
                                        <span id="ctl00_cphContentsArea_lblTitleOthrUnderMiUnit">分未満</span>
                                    </td>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlOthrFrcClsCd" tabindex="11" disabled="disabled" id="ctl00_cphContentsArea_ddlOthrFrcClsCd" style="width: 110px;">
                                            <option selected="selected" value=""></option>
                                            <option value="00">切上げ</option>
                                            <option value="01">切捨て</option>
                                            <option value="02">四捨五入</option>

                                        </select>

                                    </td>
                                    <th>再入時刻</th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlRetmUnderMi" tabindex="18" disabled="disabled" class="imeDisabled" id="ctl00_cphContentsArea_ddlRetmUnderMi" style="width: 50px;">
                                            <option selected="selected" value=""></option>
                                            <option value="00">0</option>
                                            <option value="05">5</option>
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="60">60</option>

                                        </select>
                                        <span id="ctl00_cphContentsArea_lblTitleRetmUnderMiUnit">分未満</span>
                                    </td>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlRetmFrcClsCd" tabindex="19" disabled="disabled" id="ctl00_cphContentsArea_ddlRetmFrcClsCd" style="width: 110px;">
                                            <option selected="selected" value=""></option>
                                            <option value="00">切上げ</option>
                                            <option value="01">切捨て</option>
                                            <option value="02">四捨五入</option>

                                        </select>

                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <p class="CategoryTitle1">残業時間端数処理</p>
                        <table class="InputFieldStyle1">
                            <tbody>
                                <tr>
                                    <th>残業項目１</th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlOvtm1Cd" tabindex="20" disabled="disabled" id="ctl00_cphContentsArea_ddlOvtm1Cd" style="width: 180px;">
                                            <option selected="selected" value=""></option>
                                            <option value="100">早出時間</option>
                                            <option value="101">普通残業時間</option>
                                            <option value="102">深夜残業時間</option>
                                            <option value="103">休日残業時間</option>
                                            <option value="104">休日深夜残業時間</option>

                                        </select>
                                    </td>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlOvtm1UnderMi" tabindex="21" disabled="disabled" class="imeDisabled" id="ctl00_cphContentsArea_ddlOvtm1UnderMi" style="width: 50px;">
                                            <option selected="selected" value=""></option>
                                            <option value="00">0</option>
                                            <option value="05">5</option>
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="60">60</option>

                                        </select>
                                        <span id="ctl00_cphContentsArea_lblTitleOvtm1UnderMiUnit">分未満</span>
                                    </td>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlOvtm1FrcClsCd" tabindex="22" disabled="disabled" id="ctl00_cphContentsArea_ddlOvtm1FrcClsCd" style="width: 110px;">
                                            <option selected="selected" value=""></option>
                                            <option value="00">切上げ</option>
                                            <option value="01">切捨て</option>
                                            <option value="02">四捨五入</option>

                                        </select>

                                    </td>
                                </tr>
                                <tr>
                                    <th>残業項目２</th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlOvtm2Cd" tabindex="23" disabled="disabled" id="ctl00_cphContentsArea_ddlOvtm2Cd" style="width: 180px;">
                                            <option selected="selected" value=""></option>
                                            <option value="100">早出時間</option>
                                            <option value="101">普通残業時間</option>
                                            <option value="102">深夜残業時間</option>
                                            <option value="103">休日残業時間</option>
                                            <option value="104">休日深夜残業時間</option>

                                        </select>
                                    </td>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlOvtm2UnderMi" tabindex="24" disabled="disabled" class="imeDisabled" id="ctl00_cphContentsArea_ddlOvtm2UnderMi" style="width: 50px;">
                                            <option selected="selected" value=""></option>
                                            <option value="00">0</option>
                                            <option value="05">5</option>
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="60">60</option>

                                        </select>
                                        <span id="ctl00_cphContentsArea_lblTitleOvtm2UnderMiUnit">分未満</span>
                                    </td>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlOvtm2FrcClsCd" tabindex="25" disabled="disabled" id="ctl00_cphContentsArea_ddlOvtm2FrcClsCd" style="width: 110px;">
                                            <option selected="selected" value=""></option>
                                            <option value="00">切上げ</option>
                                            <option value="01">切捨て</option>
                                            <option value="02">四捨五入</option>

                                        </select>

                                    </td>
                                </tr>
                                <tr>
                                    <th>残業項目３</th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlOvtm3Cd" tabindex="26" disabled="disabled" id="ctl00_cphContentsArea_ddlOvtm3Cd" style="width: 180px;">
                                            <option selected="selected" value=""></option>
                                            <option value="100">早出時間</option>
                                            <option value="101">普通残業時間</option>
                                            <option value="102">深夜残業時間</option>
                                            <option value="103">休日残業時間</option>
                                            <option value="104">休日深夜残業時間</option>

                                        </select>
                                    </td>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlOvtm3UnderMi" tabindex="27" disabled="disabled" class="imeDisabled" id="ctl00_cphContentsArea_ddlOvtm3UnderMi" style="width: 50px;">
                                            <option selected="selected" value=""></option>
                                            <option value="00">0</option>
                                            <option value="05">5</option>
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="60">60</option>

                                        </select>
                                        <span id="ctl00_cphContentsArea_lblTitleOvtm3UnderMiUnit">分未満</span>
                                    </td>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlOvtm3FrcClsCd" tabindex="28" disabled="disabled" id="ctl00_cphContentsArea_ddlOvtm3FrcClsCd" style="width: 110px;">
                                            <option selected="selected" value=""></option>
                                            <option value="00">切上げ</option>
                                            <option value="01">切捨て</option>
                                            <option value="02">四捨五入</option>

                                        </select>

                                    </td>
                                </tr>
                                <tr>
                                    <th>残業項目４</th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlOvtm4Cd" tabindex="29" disabled="disabled" id="ctl00_cphContentsArea_ddlOvtm4Cd" style="width: 180px;">
                                            <option selected="selected" value=""></option>
                                            <option value="100">早出時間</option>
                                            <option value="101">普通残業時間</option>
                                            <option value="102">深夜残業時間</option>
                                            <option value="103">休日残業時間</option>
                                            <option value="104">休日深夜残業時間</option>

                                        </select>
                                    </td>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlOvtm4UnderMi" tabindex="30" disabled="disabled" class="imeDisabled" id="ctl00_cphContentsArea_ddlOvtm4UnderMi" style="width: 50px;">
                                            <option selected="selected" value=""></option>
                                            <option value="00">0</option>
                                            <option value="05">5</option>
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="60">60</option>

                                        </select>
                                        <span id="ctl00_cphContentsArea_lblTitleOvtm4UnderMiUnit">分未満</span>
                                    </td>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlOvtm4FrcClsCd" tabindex="31" disabled="disabled" id="ctl00_cphContentsArea_ddlOvtm4FrcClsCd" style="width: 110px;">
                                            <option selected="selected" value=""></option>
                                            <option value="00">切上げ</option>
                                            <option value="01">切捨て</option>
                                            <option value="02">四捨五入</option>

                                        </select>

                                    </td>
                                </tr>
                                <tr>
                                    <th>残業項目５</th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlOvtm5Cd" tabindex="32" disabled="disabled" id="ctl00_cphContentsArea_ddlOvtm5Cd" style="width: 180px;">
                                            <option selected="selected" value=""></option>
                                            <option value="100">早出時間</option>
                                            <option value="101">普通残業時間</option>
                                            <option value="102">深夜残業時間</option>
                                            <option value="103">休日残業時間</option>
                                            <option value="104">休日深夜残業時間</option>

                                        </select>
                                    </td>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlOvtm5UnderMi" tabindex="33" disabled="disabled" class="imeDisabled" id="ctl00_cphContentsArea_ddlOvtm5UnderMi" style="width: 50px;">
                                            <option selected="selected" value=""></option>
                                            <option value="00">0</option>
                                            <option value="05">5</option>
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="60">60</option>

                                        </select>
                                        <span id="ctl00_cphContentsArea_lblTitleOvtm5UnderMiUnit">分未満</span>
                                    </td>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlOvtm5FrcClsCd" tabindex="34" disabled="disabled" id="ctl00_cphContentsArea_ddlOvtm5FrcClsCd" style="width: 110px;">
                                            <option selected="selected" value=""></option>
                                            <option value="00">切上げ</option>
                                            <option value="01">切捨て</option>
                                            <option value="02">四捨五入</option>

                                        </select>

                                    </td>
                                </tr>
                                <tr>
                                    <th>残業項目６</th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlOvtm6Cd" tabindex="35" disabled="disabled" id="ctl00_cphContentsArea_ddlOvtm6Cd" style="width: 180px;">
                                            <option selected="selected" value=""></option>
                                            <option value="100">早出時間</option>
                                            <option value="101">普通残業時間</option>
                                            <option value="102">深夜残業時間</option>
                                            <option value="103">休日残業時間</option>
                                            <option value="104">休日深夜残業時間</option>

                                        </select>
                                    </td>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlOvtm6UnderMi" tabindex="36" disabled="disabled" class="imeDisabled" id="ctl00_cphContentsArea_ddlOvtm6UnderMi" style="width: 50px;">
                                            <option selected="selected" value=""></option>
                                            <option value="00">0</option>
                                            <option value="05">5</option>
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="60">60</option>

                                        </select>
                                        <span id="ctl00_cphContentsArea_lblTitleOvtm6UnderMiUnit">分未満</span>
                                    </td>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlOvtm6FrcClsCd" tabindex="37" disabled="disabled" id="ctl00_cphContentsArea_ddlOvtm6FrcClsCd" style="width: 110px;">
                                            <option selected="selected" value=""></option>
                                            <option value="00">切上げ</option>
                                            <option value="01">切捨て</option>
                                            <option value="02">四捨五入</option>

                                        </select>

                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <p class="CategoryTitle1">割増時間端数処理</p>
                        <table class="InputFieldStyle1">
                            <tbody>
                                <tr>
                                    <th>割増対象１</th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlExt1Cd" tabindex="38" disabled="disabled" id="ctl00_cphContentsArea_ddlExt1Cd" style="width: 180px;">
                                            <option selected="selected" value=""></option>
                                            <option value="200">深夜割増</option>

                                        </select>
                                    </td>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlExt1UnderMi" tabindex="39" disabled="disabled" class="imeDisabled" id="ctl00_cphContentsArea_ddlExt1UnderMi" style="width: 50px;">
                                            <option selected="selected" value=""></option>
                                            <option value="00">0</option>
                                            <option value="05">5</option>
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="60">60</option>

                                        </select>
                                        <span id="ctl00_cphContentsArea_Label1">分未満</span>
                                    </td>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlExt1FrcClsCd" tabindex="40" disabled="disabled" id="ctl00_cphContentsArea_ddlExt1FrcClsCd" style="width: 110px;">
                                            <option selected="selected" value=""></option>
                                            <option value="00">切上げ</option>
                                            <option value="01">切捨て</option>
                                            <option value="02">四捨五入</option>

                                        </select>

                                    </td>
                                </tr>
                                <tr>
                                    <th>割増対象２</th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlExt2Cd" tabindex="41" disabled="disabled" id="ctl00_cphContentsArea_ddlExt2Cd" style="width: 180px;">
                                            <option selected="selected" value=""></option>
                                            <option value="200">深夜割増</option>

                                        </select>
                                    </td>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlExt2UnderMi" tabindex="42" disabled="disabled" class="imeDisabled" id="ctl00_cphContentsArea_ddlExt2UnderMi" style="width: 50px;">
                                            <option selected="selected" value=""></option>
                                            <option value="00">0</option>
                                            <option value="05">5</option>
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="60">60</option>

                                        </select>
                                        <span id="ctl00_cphContentsArea_Label2">分未満</span>
                                    </td>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlExt2FrcClsCd" tabindex="43" disabled="disabled" id="ctl00_cphContentsArea_ddlExt2FrcClsCd" style="width: 110px;">
                                            <option selected="selected" value=""></option>
                                            <option value="00">切上げ</option>
                                            <option value="01">切捨て</option>
                                            <option value="02">四捨五入</option>

                                        </select>

                                    </td>
                                </tr>
                                <tr>
                                    <th>割増対象３</th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlExt3Cd" tabindex="44" disabled="disabled" id="ctl00_cphContentsArea_ddlExt3Cd" style="width: 180px;">
                                            <option selected="selected" value=""></option>
                                            <option value="200">深夜割増</option>

                                        </select>
                                    </td>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlExt3UnderMi" tabindex="45" disabled="disabled" class="imeDisabled" id="ctl00_cphContentsArea_ddlExt3UnderMi" style="width: 50px;">
                                            <option selected="selected" value=""></option>
                                            <option value="00">0</option>
                                            <option value="05">5</option>
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="60">60</option>

                                        </select>
                                        <span id="ctl00_cphContentsArea_Label3">分未満</span>
                                    </td>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlExt3FrcClsCd" tabindex="46" disabled="disabled" id="ctl00_cphContentsArea_ddlExt3FrcClsCd" style="width: 110px;">
                                            <option selected="selected" value=""></option>
                                            <option value="00">切上げ</option>
                                            <option value="01">切捨て</option>
                                            <option value="02">四捨五入</option>

                                        </select>

                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="line"></div>

                        <p class="ButtonField1">
                            <input name="ctl00$cphContentsArea$btnUpdate" tabindex="47" disabled="disabled" id="ctl00_cphContentsArea_btnUpdate" type="button" value="更新">
                            <input name="ctl00$cphContentsArea$btnCancel" tabindex="48" id="ctl00_cphContentsArea_btnCancel" onclick="javascript:__doPostBack('ctl00$cphContentsArea$btnCancel','')" type="button" value="キャンセル">
                            <input name="ctl00$cphContentsArea$btnDelete" tabindex="49" disabled="disabled" id="ctl00_cphContentsArea_btnDelete" type="button" value="削除">
                        </p>


                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection