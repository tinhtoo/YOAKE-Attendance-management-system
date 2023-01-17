<!-- 勤務体系情報入力   -->
@extends('menu.main')

@section('title','勤務体系情報入力 ')

@section('content')
<div id="contents-stage">
    <table class="BaseContainerStyle1">
        <tbody>
            <tr>
                <td>
                    <div id="ctl00_cphContentsArea_UpdatePanel1">

                        <!-- header block -->
                        <table class="InputFieldStyle1">
                            <tbody>
                                <tr>
                                    <th>
                                        勤務体系コード
                                    </th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtWorkPtnCd" tabindex="1" class="imeDisabled" id="ctl00_cphContentsArea_txtWorkPtnCd" style="width: 50px;" onfocus="this.select();" type="text" maxlength="3">


                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        勤務体系名
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtWorkPtnName" tabindex="2" class="imeOn" id="ctl00_cphContentsArea_txtWorkPtnName" style="width: 300px;" onfocus="this.select();" type="text" maxlength="20">

                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        勤務体系略名
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtWorkPtnAbrName" tabindex="3" class="imeOn" id="ctl00_cphContentsArea_txtWorkPtnAbrName" style="width: 70px;" onfocus="this.select();" type="text" maxlength="5">

                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        出勤区分
                                    </th>
                                    <td>
                                        <div class="GroupBox1">
                                            <input name="ctl00$cphContentsArea$WorkCls" tabindex="4" id="ctl00_cphContentsArea_rbRegularWork" type="radio" checked="checked" value="rbRegularWork"><label for="ctl00_cphContentsArea_rbRegularWork">通常出勤</label>
                                            <input name="ctl00$cphContentsArea$WorkCls" tabindex="5" id="ctl00_cphContentsArea_rbHolidayWork" onclick="javascript:setTimeout('__doPostBack(\'ctl00$cphContentsArea$rbHolidayWork\',\'\')', 0)" type="radio" value="rbHolidayWork"><label for="ctl00_cphContentsArea_rbHolidayWork">休日出勤</label>
                                            <div class="clearBoth">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        休日区分
                                    </th>
                                    <td>
                                        <div class="GroupBox1">
                                            <span disabled="disabled"><input name="ctl00$cphContentsArea$HolidayCls" tabindex="6" disabled="disabled" id="ctl00_cphContentsArea_rbLeg" type="radio" checked="checked" value="rbLeg"><label for="ctl00_cphContentsArea_rbLeg">法定</label></span>
                                            <span disabled="disabled"><input name="ctl00$cphContentsArea$HolidayCls" tabindex="7" disabled="disabled" id="ctl00_cphContentsArea_rbOutLeg" type="radio" value="rbOutLeg"><label for="ctl00_cphContentsArea_rbOutLeg">法定外</label></span>
                                            <div class="clearBoth">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        職務種別
                                    </th>
                                    <td>
                                        <div class="GroupBox1">
                                            <input name="ctl00$cphContentsArea$DutyCls" tabindex="8" id="ctl00_cphContentsArea_rbDutyTime" type="radio" checked="checked" value="rbDutyTime"><label for="ctl00_cphContentsArea_rbDutyTime">時間帯</label>
                                            <input name="ctl00$cphContentsArea$DutyCls" tabindex="9" id="ctl00_cphContentsArea_rbDutyHours" onclick="javascript:setTimeout('__doPostBack(\'ctl00$cphContentsArea$rbDutyHours\',\'\')', 0)" type="radio" value="rbDutyHours"><label for="ctl00_cphContentsArea_rbDutyHours">時間数</label>
                                            <div class="clearBoth">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- header block end -->
                        <!-- detail block -->
                        <div id="ctl00_cphContentsArea_pnlTime">

                            <!-- 時間帯設定 -->
                            <p class="CategoryTitle1">
                                時間帯設定</p>


                            <table class="GridViewStyle2">
                                <tbody>
                                    <tr>
                                        <th>
                                            勤怠項目
                                        </th>
                                        <th>
                                            開始時間
                                        </th>
                                        <td>
                                        </td>
                                        <th>
                                            終了時間
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select name="ctl00$cphContentsArea$ddlPTimeWk1" tabindex="10" id="ctl00_cphContentsArea_ddlPTimeWk1" style="width: 150px;">
                                                <option selected="selected" value=""></option>
                                                <option value="001">就業時間</option>
                                                <option value="100">早出時間</option>
                                                <option value="101">普通残業時間</option>
                                                <option value="102">深夜残業時間</option>
                                                <option value="103">休日残業時間</option>
                                                <option value="104">休日深夜残業時間</option>

                                            </select>
                                        </td>
                                        <td>
                                            <select name="ctl00$cphContentsArea$ddlPTimeWk1StrHh" tabindex="11" class="imeDisabled" id="ctl00_cphContentsArea_ddlPTimeWk1StrHh" style="width: 50px;">
                                                <option selected="selected" value=""></option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                                <option value="32">32</option>
                                                <option value="33">33</option>
                                                <option value="34">34</option>
                                                <option value="35">35</option>

                                            </select>
                                            &nbsp;時
                                            <select name="ctl00$cphContentsArea$ddlPTimeWk1StrMi" tabindex="12" class="imeDisabled" id="ctl00_cphContentsArea_ddlPTimeWk1StrMi" style="width: 50px;">
                                                <option selected="selected" value=""></option>
                                                <option value="0">0</option>
                                                <option value="5">5</option>
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

                                            </select>
                                            &nbsp;分<br>
                                        </td>
                                        <td>
                                            &nbsp;～
                                        </td>
                                        <td>
                                            <select name="ctl00$cphContentsArea$ddlPTimeWk1EndHh" tabindex="13" class="imeDisabled" id="ctl00_cphContentsArea_ddlPTimeWk1EndHh" style="width: 50px;">
                                                <option selected="selected" value=""></option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                                <option value="32">32</option>
                                                <option value="33">33</option>
                                                <option value="34">34</option>
                                                <option value="35">35</option>
                                                <option value="36">36</option>

                                            </select>
                                            &nbsp;時
                                            <select name="ctl00$cphContentsArea$ddlPTimeWk1EndMi" tabindex="14" class="imeDisabled" id="ctl00_cphContentsArea_ddlPTimeWk1EndMi" style="width: 50px;">
                                                <option selected="selected" value=""></option>
                                                <option value="0">0</option>
                                                <option value="5">5</option>
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

                                            </select>
                                            &nbsp;分
                                        </td>
                                        <td>
                                            <span id="ctl00_cphContentsArea_cvPTimeWk1" style="color: red; display: none;">ErrorMessage</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select name="ctl00$cphContentsArea$ddlPTimeWk2" tabindex="15" id="ctl00_cphContentsArea_ddlPTimeWk2" style="width: 150px;">
                                                <option selected="selected" value=""></option>
                                                <option value="001">就業時間</option>
                                                <option value="100">早出時間</option>
                                                <option value="101">普通残業時間</option>
                                                <option value="102">深夜残業時間</option>
                                                <option value="103">休日残業時間</option>
                                                <option value="104">休日深夜残業時間</option>

                                            </select>
                                        </td>
                                        <td>
                                            <select name="ctl00$cphContentsArea$ddlPTimeWk2StrHh" tabindex="16" class="imeDisabled" id="ctl00_cphContentsArea_ddlPTimeWk2StrHh" style="width: 50px;">
                                                <option selected="selected" value=""></option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                                <option value="32">32</option>
                                                <option value="33">33</option>
                                                <option value="34">34</option>
                                                <option value="35">35</option>

                                            </select>
                                            &nbsp;時
                                            <select name="ctl00$cphContentsArea$ddlPTimeWk2StrMi" tabindex="17" class="imeDisabled" id="ctl00_cphContentsArea_ddlPTimeWk2StrMi" style="width: 50px;">
                                                <option selected="selected" value=""></option>
                                                <option value="0">0</option>
                                                <option value="5">5</option>
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

                                            </select>
                                            &nbsp;分
                                        </td>
                                        <td>
                                            &nbsp;～
                                        </td>
                                        <td>
                                            <select name="ctl00$cphContentsArea$ddlPTimeWk2EndHh" tabindex="18" class="imeDisabled" id="ctl00_cphContentsArea_ddlPTimeWk2EndHh" style="width: 50px;">
                                                <option selected="selected" value=""></option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                                <option value="32">32</option>
                                                <option value="33">33</option>
                                                <option value="34">34</option>
                                                <option value="35">35</option>
                                                <option value="36">36</option>

                                            </select>
                                            &nbsp;時
                                            <select name="ctl00$cphContentsArea$ddlPTimeWk2EndMi" tabindex="19" class="imeDisabled" id="ctl00_cphContentsArea_ddlPTimeWk2EndMi" style="width: 50px;">
                                                <option selected="selected" value=""></option>
                                                <option value="0">0</option>
                                                <option value="5">5</option>
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

                                            </select>
                                            &nbsp;分
                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select name="ctl00$cphContentsArea$ddlPTimeWk3" tabindex="20" id="ctl00_cphContentsArea_ddlPTimeWk3" style="width: 150px;">
                                                <option selected="selected" value=""></option>
                                                <option value="001">就業時間</option>
                                                <option value="100">早出時間</option>
                                                <option value="101">普通残業時間</option>
                                                <option value="102">深夜残業時間</option>
                                                <option value="103">休日残業時間</option>
                                                <option value="104">休日深夜残業時間</option>

                                            </select>
                                        </td>
                                        <td>
                                            <select name="ctl00$cphContentsArea$ddlPTimeWk3StrHh" tabindex="21" class="imeDisabled" id="ctl00_cphContentsArea_ddlPTimeWk3StrHh" style="width: 50px;">
                                                <option selected="selected" value=""></option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                                <option value="32">32</option>
                                                <option value="33">33</option>
                                                <option value="34">34</option>
                                                <option value="35">35</option>

                                            </select>
                                            &nbsp;時
                                            <select name="ctl00$cphContentsArea$ddlPTimeWk3StrMi" tabindex="22" class="imeDisabled" id="ctl00_cphContentsArea_ddlPTimeWk3StrMi" style="width: 50px;">
                                                <option selected="selected" value=""></option>
                                                <option value="0">0</option>
                                                <option value="5">5</option>
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

                                            </select>
                                            &nbsp;分
                                        </td>
                                        <td>
                                            &nbsp;～
                                        </td>
                                        <td>
                                            <select name="ctl00$cphContentsArea$ddlPTimeWk3EndHh" tabindex="23" class="imeDisabled" id="ctl00_cphContentsArea_ddlPTimeWk3EndHh" style="width: 50px;">
                                                <option selected="selected" value=""></option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                                <option value="32">32</option>
                                                <option value="33">33</option>
                                                <option value="34">34</option>
                                                <option value="35">35</option>
                                                <option value="36">36</option>

                                            </select>
                                            &nbsp;時
                                            <select name="ctl00$cphContentsArea$ddlPTimeWk3EndMi" tabindex="24" class="imeDisabled" id="ctl00_cphContentsArea_ddlPTimeWk3EndMi" style="width: 50px;">
                                                <option selected="selected" value=""></option>
                                                <option value="0">0</option>
                                                <option value="5">5</option>
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

                                            </select>
                                            &nbsp;分
                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select name="ctl00$cphContentsArea$ddlPTimeWk4" tabindex="25" id="ctl00_cphContentsArea_ddlPTimeWk4" style="width: 150px;">
                                                <option selected="selected" value=""></option>
                                                <option value="001">就業時間</option>
                                                <option value="100">早出時間</option>
                                                <option value="101">普通残業時間</option>
                                                <option value="102">深夜残業時間</option>
                                                <option value="103">休日残業時間</option>
                                                <option value="104">休日深夜残業時間</option>

                                            </select>
                                        </td>
                                        <td>
                                            <select name="ctl00$cphContentsArea$ddlPTimeWk4StrHh" tabindex="26" class="imeDisabled" id="ctl00_cphContentsArea_ddlPTimeWk4StrHh" style="width: 50px;">
                                                <option selected="selected" value=""></option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                                <option value="32">32</option>
                                                <option value="33">33</option>
                                                <option value="34">34</option>
                                                <option value="35">35</option>

                                            </select>
                                            &nbsp;時
                                            <select name="ctl00$cphContentsArea$ddlPTimeWk4StrMi" tabindex="27" class="imeDisabled" id="ctl00_cphContentsArea_ddlPTimeWk4StrMi" style="width: 50px;">
                                                <option selected="selected" value=""></option>
                                                <option value="0">0</option>
                                                <option value="5">5</option>
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

                                            </select>
                                            &nbsp;分
                                        </td>
                                        <td>
                                            &nbsp;～
                                        </td>
                                        <td>
                                            <select name="ctl00$cphContentsArea$ddlPTimeWk4EndHh" tabindex="28" class="imeDisabled" id="ctl00_cphContentsArea_ddlPTimeWk4EndHh" style="width: 50px;">
                                                <option selected="selected" value=""></option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                                <option value="32">32</option>
                                                <option value="33">33</option>
                                                <option value="34">34</option>
                                                <option value="35">35</option>
                                                <option value="36">36</option>

                                            </select>
                                            &nbsp;時
                                            <select name="ctl00$cphContentsArea$ddlPTimeWk4EndMi" tabindex="29" class="imeDisabled" id="ctl00_cphContentsArea_ddlPTimeWk4EndMi" style="width: 50px;">
                                                <option selected="selected" value=""></option>
                                                <option value="0">0</option>
                                                <option value="5">5</option>
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

                                            </select>
                                            &nbsp;分
                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select name="ctl00$cphContentsArea$ddlPTimeWk5" tabindex="30" id="ctl00_cphContentsArea_ddlPTimeWk5" style="width: 150px;">
                                                <option selected="selected" value=""></option>
                                                <option value="001">就業時間</option>
                                                <option value="100">早出時間</option>
                                                <option value="101">普通残業時間</option>
                                                <option value="102">深夜残業時間</option>
                                                <option value="103">休日残業時間</option>
                                                <option value="104">休日深夜残業時間</option>

                                            </select>
                                        </td>
                                        <td>
                                            <select name="ctl00$cphContentsArea$ddlPTimeWk5StrHh" tabindex="31" class="imeDisabled" id="ctl00_cphContentsArea_ddlPTimeWk5StrHh" style="width: 50px;">
                                                <option selected="selected" value=""></option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                                <option value="32">32</option>
                                                <option value="33">33</option>
                                                <option value="34">34</option>
                                                <option value="35">35</option>

                                            </select>
                                            &nbsp;時
                                            <select name="ctl00$cphContentsArea$ddlPTimeWk5StrMi" tabindex="32" class="imeDisabled" id="ctl00_cphContentsArea_ddlPTimeWk5StrMi" style="width: 50px;">
                                                <option selected="selected" value=""></option>
                                                <option value="0">0</option>
                                                <option value="5">5</option>
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

                                            </select>
                                            &nbsp;分
                                        </td>
                                        <td>
                                            &nbsp;～
                                        </td>
                                        <td>
                                            <select name="ctl00$cphContentsArea$ddlPTimeWk5EndHh" tabindex="33" class="imeDisabled" id="ctl00_cphContentsArea_ddlPTimeWk5EndHh" style="width: 50px;">
                                                <option selected="selected" value=""></option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                                <option value="32">32</option>
                                                <option value="33">33</option>
                                                <option value="34">34</option>
                                                <option value="35">35</option>
                                                <option value="36">36</option>

                                            </select>
                                            &nbsp;時
                                            <select name="ctl00$cphContentsArea$ddlPTimeWk5EndMi" tabindex="34" class="imeDisabled" id="ctl00_cphContentsArea_ddlPTimeWk5EndMi" style="width: 50px;">
                                                <option selected="selected" value=""></option>
                                                <option value="0">0</option>
                                                <option value="5">5</option>
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

                                            </select>
                                            &nbsp;分
                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select name="ctl00$cphContentsArea$ddlPTimeWk6" tabindex="35" id="ctl00_cphContentsArea_ddlPTimeWk6" style="width: 150px;">
                                                <option selected="selected" value=""></option>
                                                <option value="001">就業時間</option>
                                                <option value="100">早出時間</option>
                                                <option value="101">普通残業時間</option>
                                                <option value="102">深夜残業時間</option>
                                                <option value="103">休日残業時間</option>
                                                <option value="104">休日深夜残業時間</option>

                                            </select>
                                        </td>
                                        <td>
                                            <select name="ctl00$cphContentsArea$ddlPTimeWk6StrHh" tabindex="36" class="imeDisabled" id="ctl00_cphContentsArea_ddlPTimeWk6StrHh" style="width: 50px;">
                                                <option selected="selected" value=""></option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                                <option value="32">32</option>
                                                <option value="33">33</option>
                                                <option value="34">34</option>
                                                <option value="35">35</option>

                                            </select>
                                            &nbsp;時
                                            <select name="ctl00$cphContentsArea$ddlPTimeWk6StrMi" tabindex="37" class="imeDisabled" id="ctl00_cphContentsArea_ddlPTimeWk6StrMi" style="width: 50px;">
                                                <option selected="selected" value=""></option>
                                                <option value="0">0</option>
                                                <option value="5">5</option>
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

                                            </select>
                                            &nbsp;分
                                        </td>
                                        <td>
                                            &nbsp;～
                                        </td>
                                        <td>
                                            <select name="ctl00$cphContentsArea$ddlPTimeWk6EndHh" tabindex="38" class="imeDisabled" id="ctl00_cphContentsArea_ddlPTimeWk6EndHh" style="width: 50px;">
                                                <option selected="selected" value=""></option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                                <option value="32">32</option>
                                                <option value="33">33</option>
                                                <option value="34">34</option>
                                                <option value="35">35</option>
                                                <option value="36">36</option>

                                            </select>
                                            &nbsp;時
                                            <select name="ctl00$cphContentsArea$ddlPTimeWk6EndMi" tabindex="39" class="imeDisabled" id="ctl00_cphContentsArea_ddlPTimeWk6EndMi" style="width: 50px;">
                                                <option selected="selected" value=""></option>
                                                <option value="0">0</option>
                                                <option value="5">5</option>
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

                                            </select>
                                            &nbsp;分
                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select name="ctl00$cphContentsArea$ddlPTimeWk7" tabindex="40" id="ctl00_cphContentsArea_ddlPTimeWk7" style="width: 150px;">
                                                <option selected="selected" value=""></option>
                                                <option value="001">就業時間</option>
                                                <option value="100">早出時間</option>
                                                <option value="101">普通残業時間</option>
                                                <option value="102">深夜残業時間</option>
                                                <option value="103">休日残業時間</option>
                                                <option value="104">休日深夜残業時間</option>

                                            </select>
                                        </td>
                                        <td>
                                            <select name="ctl00$cphContentsArea$ddlPTimeWk7StrHh" tabindex="41" class="imeDisabled" id="ctl00_cphContentsArea_ddlPTimeWk7StrHh" style="width: 50px;">
                                                <option selected="selected" value=""></option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                                <option value="32">32</option>
                                                <option value="33">33</option>
                                                <option value="34">34</option>
                                                <option value="35">35</option>

                                            </select>
                                            &nbsp;時
                                            <select name="ctl00$cphContentsArea$ddlPTimeWk7StrMi" tabindex="42" class="imeDisabled" id="ctl00_cphContentsArea_ddlPTimeWk7StrMi" style="width: 50px;">
                                                <option selected="selected" value=""></option>
                                                <option value="0">0</option>
                                                <option value="5">5</option>
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

                                            </select>
                                            &nbsp;分
                                        </td>
                                        <td>
                                            &nbsp;～
                                        </td>
                                        <td>
                                            <select name="ctl00$cphContentsArea$ddlPTimeWk7EndHh" tabindex="43" class="imeDisabled" id="ctl00_cphContentsArea_ddlPTimeWk7EndHh" style="width: 50px;">
                                                <option selected="selected" value=""></option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                                <option value="32">32</option>
                                                <option value="33">33</option>
                                                <option value="34">34</option>
                                                <option value="35">35</option>
                                                <option value="36">36</option>

                                            </select>
                                            &nbsp;時
                                            <select name="ctl00$cphContentsArea$ddlPTimeWk7EndMi" tabindex="44" class="imeDisabled" id="ctl00_cphContentsArea_ddlPTimeWk7EndMi" style="width: 50px;">
                                                <option selected="selected" value=""></option>
                                                <option value="0">0</option>
                                                <option value="5">5</option>
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

                                            </select>
                                            &nbsp;分
                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="line">
                            </div>
                            <table class="GridViewStyle2 mg10">
                                <tbody>
                                    <tr>
                                        <th>
                                            割増対象
                                        </th>
                                        <th>
                                            開始時間
                                        </th>
                                        <td>
                                        </td>
                                        <th>
                                            終了時間
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select name="ctl00$cphContentsArea$ddlPTimeExt1" tabindex="45" id="ctl00_cphContentsArea_ddlPTimeExt1" style="width: 150px;">
                                                <option selected="selected" value=""></option>
                                                <option value="200">深夜割増</option>

                                            </select>
                                        </td>
                                        <td>
                                            <select name="ctl00$cphContentsArea$ddlPTimeExt1StrHh" tabindex="46" class="imeDisabled" id="ctl00_cphContentsArea_ddlPTimeExt1StrHh" style="width: 50px;">
                                                <option selected="selected" value=""></option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                                <option value="32">32</option>
                                                <option value="33">33</option>
                                                <option value="34">34</option>
                                                <option value="35">35</option>

                                            </select>
                                            &nbsp;時
                                            <select name="ctl00$cphContentsArea$ddlPTimeExt1StrMi" tabindex="47" class="imeDisabled" id="ctl00_cphContentsArea_ddlPTimeExt1StrMi" style="width: 50px;">
                                                <option selected="selected" value=""></option>
                                                <option value="0">0</option>
                                                <option value="5">5</option>
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

                                            </select>
                                            &nbsp;分
                                        </td>
                                        <td>
                                            &nbsp;～
                                        </td>
                                        <td>
                                            <select name="ctl00$cphContentsArea$ddlPTimeExt1EndHh" tabindex="48" class="imeDisabled" id="ctl00_cphContentsArea_ddlPTimeExt1EndHh" style="width: 50px;">
                                                <option selected="selected" value=""></option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                                <option value="32">32</option>
                                                <option value="33">33</option>
                                                <option value="34">34</option>
                                                <option value="35">35</option>
                                                <option value="36">36</option>

                                            </select>
                                            &nbsp;時
                                            <select name="ctl00$cphContentsArea$ddlPTimeExt1EndMi" tabindex="49" class="imeDisabled" id="ctl00_cphContentsArea_ddlPTimeExt1EndMi" style="width: 50px;">
                                                <option selected="selected" value=""></option>
                                                <option value="0">0</option>
                                                <option value="5">5</option>
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

                                            </select>
                                            &nbsp;分
                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select name="ctl00$cphContentsArea$ddlPTimeExt2" tabindex="50" id="ctl00_cphContentsArea_ddlPTimeExt2" style="width: 150px;">
                                                <option selected="selected" value=""></option>
                                                <option value="200">深夜割増</option>

                                            </select>
                                        </td>
                                        <td>
                                            <select name="ctl00$cphContentsArea$ddlPTimeExt2StrHh" tabindex="51" class="imeDisabled" id="ctl00_cphContentsArea_ddlPTimeExt2StrHh" style="width: 50px;">
                                                <option selected="selected" value=""></option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                                <option value="32">32</option>
                                                <option value="33">33</option>
                                                <option value="34">34</option>
                                                <option value="35">35</option>

                                            </select>
                                            &nbsp;時
                                            <select name="ctl00$cphContentsArea$ddlPTimeExt2StrMi" tabindex="52" class="imeDisabled" id="ctl00_cphContentsArea_ddlPTimeExt2StrMi" style="width: 50px;">
                                                <option selected="selected" value=""></option>
                                                <option value="0">0</option>
                                                <option value="5">5</option>
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

                                            </select>
                                            &nbsp;分
                                        </td>
                                        <td>
                                            &nbsp;～
                                        </td>
                                        <td>
                                            <select name="ctl00$cphContentsArea$ddlPTimeExt2EndHh" tabindex="53" class="imeDisabled" id="ctl00_cphContentsArea_ddlPTimeExt2EndHh" style="width: 50px;">
                                                <option selected="selected" value=""></option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                                <option value="32">32</option>
                                                <option value="33">33</option>
                                                <option value="34">34</option>
                                                <option value="35">35</option>
                                                <option value="36">36</option>

                                            </select>
                                            &nbsp;時
                                            <select name="ctl00$cphContentsArea$ddlPTimeExt2EndMi" tabindex="54" class="imeDisabled" id="ctl00_cphContentsArea_ddlPTimeExt2EndMi" style="width: 50px;">
                                                <option selected="selected" value=""></option>
                                                <option value="0">0</option>
                                                <option value="5">5</option>
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

                                            </select>
                                            &nbsp;分
                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select name="ctl00$cphContentsArea$ddlPTimeExt3" tabindex="55" id="ctl00_cphContentsArea_ddlPTimeExt3" style="width: 150px;">
                                                <option selected="selected" value=""></option>
                                                <option value="200">深夜割増</option>

                                            </select>
                                        </td>
                                        <td>
                                            <select name="ctl00$cphContentsArea$ddlPTimeExt3StrHh" tabindex="56" class="imeDisabled" id="ctl00_cphContentsArea_ddlPTimeExt3StrHh" style="width: 50px;">
                                                <option selected="selected" value=""></option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                                <option value="32">32</option>
                                                <option value="33">33</option>
                                                <option value="34">34</option>
                                                <option value="35">35</option>

                                            </select>
                                            &nbsp;時
                                            <select name="ctl00$cphContentsArea$ddlPTimeExt3StrMi" tabindex="57" class="imeDisabled" id="ctl00_cphContentsArea_ddlPTimeExt3StrMi" style="width: 50px;">
                                                <option selected="selected" value=""></option>
                                                <option value="0">0</option>
                                                <option value="5">5</option>
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

                                            </select>
                                            &nbsp;分
                                        </td>
                                        <td>
                                            &nbsp;～
                                        </td>
                                        <td>
                                            <select name="ctl00$cphContentsArea$ddlPTimeExt3EndHh" tabindex="58" class="imeDisabled" id="ctl00_cphContentsArea_ddlPTimeExt3EndHh" style="width: 50px;">
                                                <option selected="selected" value=""></option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                                <option value="32">32</option>
                                                <option value="33">33</option>
                                                <option value="34">34</option>
                                                <option value="35">35</option>
                                                <option value="36">36</option>

                                            </select>
                                            &nbsp;時
                                            <select name="ctl00$cphContentsArea$ddlPTimeExt3EndMi" tabindex="59" class="imeDisabled" id="ctl00_cphContentsArea_ddlPTimeExt3EndMi" style="width: 50px;">
                                                <option selected="selected" value=""></option>
                                                <option value="0">0</option>
                                                <option value="5">5</option>
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

                                            </select>
                                            &nbsp;分
                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="line">
                            </div>

                            <table class="InputFieldStyle1">
                                <tbody>
                                    <tr>
                                        <th>
                                            遅刻算出
                                        </th>
                                        <td>
                                            <div class="GroupBox1">
                                                <input name="ctl00$cphContentsArea$Rsv3Cls" tabindex="60" id="ctl00_cphContentsArea_rbRsv3ClsYes" type="radio" checked="checked" value="rbRsv3ClsYes"><label for="ctl00_cphContentsArea_rbRsv3ClsYes">する</label>
                                                <input name="ctl00$cphContentsArea$Rsv3Cls" tabindex="61" id="ctl00_cphContentsArea_rbRsv3ClsNo" type="radio" value="rbRsv3ClsNo"><label for="ctl00_cphContentsArea_rbRsv3ClsNo">しない</label>
                                                <div class="clearBoth">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            早退算出
                                        </th>
                                        <td>
                                            <div class="GroupBox1">
                                                <input name="ctl00$cphContentsArea$Rsv4Cls" tabindex="62" id="ctl00_cphContentsArea_rbRsv4ClsYes" type="radio" checked="checked" value="rbRsv4ClsYes"><label for="ctl00_cphContentsArea_rbRsv4ClsYes">する</label>
                                                <input name="ctl00$cphContentsArea$Rsv4Cls" tabindex="63" id="ctl00_cphContentsArea_rbRsv4ClsNo" type="radio" value="rbRsv4ClsNo"><label for="ctl00_cphContentsArea_rbRsv4ClsNo">しない</label>
                                                <div class="clearBoth">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            勤務時間
                                        </th>
                                        <td>
                                            <select name="ctl00$cphContentsArea$ddlPRsv1Hh" tabindex="64" class="imeDisabled" id="ctl00_cphContentsArea_ddlPRsv1Hh" style="width: 50px;">
                                                <option selected="selected" value=""></option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                                <option value="32">32</option>
                                                <option value="33">33</option>
                                                <option value="34">34</option>
                                                <option value="35">35</option>

                                            </select>
                                            &nbsp;時間
                                            <select name="ctl00$cphContentsArea$ddlPRsv1Mi" tabindex="65" class="imeDisabled" id="ctl00_cphContentsArea_ddlPRsv1Mi" style="width: 50px;">
                                                <option selected="selected" value=""></option>
                                                <option value="0">0</option>
                                                <option value="5">5</option>
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

                                            </select>
                                            &nbsp;分
                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            前半終了時間
                                        </th>
                                        <td>
                                            <select name="ctl00$cphContentsArea$ddlPTimeFstPrdEndHh" tabindex="66" class="imeDisabled" id="ctl00_cphContentsArea_ddlPTimeFstPrdEndHh" style="width: 50px;">
                                                <option selected="selected" value=""></option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                                <option value="32">32</option>
                                                <option value="33">33</option>
                                                <option value="34">34</option>
                                                <option value="35">35</option>

                                            </select>
                                            &nbsp;時
                                            <select name="ctl00$cphContentsArea$ddlPTimeFstPrdEndMi" tabindex="67" class="imeDisabled" id="ctl00_cphContentsArea_ddlPTimeFstPrdEndMi" style="width: 50px;">
                                                <option selected="selected" value=""></option>
                                                <option value="0">0</option>
                                                <option value="5">5</option>
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

                                            </select>
                                            &nbsp;分
                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            後半開始時間
                                        </th>
                                        <td>
                                            <select name="ctl00$cphContentsArea$ddlPTimeScdPrdStrHh" tabindex="68" class="imeDisabled" id="ctl00_cphContentsArea_ddlPTimeScdPrdStrHh" style="width: 50px;">
                                                <option selected="selected" value=""></option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                                <option value="32">32</option>
                                                <option value="33">33</option>
                                                <option value="34">34</option>
                                                <option value="35">35</option>

                                            </select>
                                            &nbsp;時
                                            <select name="ctl00$cphContentsArea$ddlPTimeScdPrdStrMi" tabindex="69" class="imeDisabled" id="ctl00_cphContentsArea_ddlPTimeScdPrdStrMi" style="width: 50px;">
                                                <option selected="selected" value=""></option>
                                                <option value="0">0</option>
                                                <option value="5">5</option>
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

                                            </select>
                                            &nbsp;分
                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            日替時刻
                                        </th>
                                        <td>
                                            <select name="ctl00$cphContentsArea$ddlPTimeDailyHh" tabindex="70" class="imeDisabled" id="ctl00_cphContentsArea_ddlPTimeDailyHh" style="width: 50px;">
                                                <option selected="selected" value=""></option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>

                                            </select>
                                            &nbsp;時
                                            <select name="ctl00$cphContentsArea$ddlPTimeDailyMi" tabindex="71" class="imeDisabled" id="ctl00_cphContentsArea_ddlPTimeDailyMi" style="width: 50px;">
                                                <option selected="selected" value=""></option>
                                                <option value="0">0</option>
                                                <option value="5">5</option>
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

                                            </select>
                                            &nbsp;分
                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>

                        <!-- 休憩時間設定 -->
                        <p class="CategoryTitle1">
                            休憩時間設定</p>
                        <table class="InputFieldStyle1">
                            <tbody>
                                <tr>
                                    <th>
                                        休憩時間
                                    </th>
                                    <td>
                                        <div class="GroupBox1">
                                            <input name="ctl00$cphContentsArea$BreakCls" tabindex="116" id="ctl00_cphContentsArea_rbBreakTime" type="radio" checked="checked" value="rbBreakTime"><label for="ctl00_cphContentsArea_rbBreakTime">時間帯</label>
                                            <input name="ctl00$cphContentsArea$BreakCls" tabindex="117" id="ctl00_cphContentsArea_rbBreakHours" onclick="javascript:setTimeout('__doPostBack(\'ctl00$cphContentsArea$rbBreakHours\',\'\')', 0)" type="radio" value="rbBreakHours"><label for="ctl00_cphContentsArea_rbBreakHours">時間数</label>
                                            <input name="ctl00$cphContentsArea$BreakCls" tabindex="118" id="ctl00_cphContentsArea_rbBreakHourly" onclick="javascript:setTimeout('__doPostBack(\'ctl00$cphContentsArea$rbBreakHourly\',\'\')', 0)" type="radio" value="rbBreakHourly"><label for="ctl00_cphContentsArea_rbBreakHourly">時間毎</label>
                                            <div class="clearBoth">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="CategoryTitle1">
                            時間帯</p>
                        <table class="GridViewStyle2">
                            <tbody>
                                <tr>
                                    <td>
                                    </td>
                                    <th>
                                        開始時間
                                    </th>
                                    <td>
                                    </td>
                                    <th>
                                        終了時間
                                    </th>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="RowTitle">
                                        休憩時間１
                                    </th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlPBrk1StrHh" tabindex="119" class="imeDisabled" id="ctl00_cphContentsArea_ddlPBrk1StrHh" style="width: 50px;" onchange="SetPBrkTime('ctl00_cphContentsArea_ddlPBrk1StrHh','ctl00_cphContentsArea_ddlPBrk1StrMi','ctl00_cphContentsArea_ddlPBrk1EndHh','ctl00_cphContentsArea_ddlPBrk1EndMi','ctl00_cphContentsArea_lblPBrk1Time')">
                                            <option selected="selected" value=""></option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                            <option value="32">32</option>
                                            <option value="33">33</option>
                                            <option value="34">34</option>
                                            <option value="35">35</option>

                                        </select>
                                        &nbsp;時
                                        <select name="ctl00$cphContentsArea$ddlPBrk1StrMi" tabindex="120" class="imeDisabled" id="ctl00_cphContentsArea_ddlPBrk1StrMi" style="width: 50px;" onchange="SetPBrkTime('ctl00_cphContentsArea_ddlPBrk1StrHh','ctl00_cphContentsArea_ddlPBrk1StrMi','ctl00_cphContentsArea_ddlPBrk1EndHh','ctl00_cphContentsArea_ddlPBrk1EndMi','ctl00_cphContentsArea_lblPBrk1Time')">
                                            <option selected="selected" value=""></option>
                                            <option value="0">0</option>
                                            <option value="5">5</option>
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

                                        </select>
                                        &nbsp;分
                                    </td>
                                    <td>
                                        &nbsp;～
                                    </td>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlPBrk1EndHh" tabindex="121" class="imeDisabled" id="ctl00_cphContentsArea_ddlPBrk1EndHh" style="width: 50px;" onchange="SetPBrkTime('ctl00_cphContentsArea_ddlPBrk1StrHh','ctl00_cphContentsArea_ddlPBrk1StrMi','ctl00_cphContentsArea_ddlPBrk1EndHh','ctl00_cphContentsArea_ddlPBrk1EndMi','ctl00_cphContentsArea_lblPBrk1Time')">
                                            <option selected="selected" value=""></option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                            <option value="32">32</option>
                                            <option value="33">33</option>
                                            <option value="34">34</option>
                                            <option value="35">35</option>
                                            <option value="36">36</option>

                                        </select>
                                        &nbsp;時
                                        <select name="ctl00$cphContentsArea$ddlPBrk1EndMi" tabindex="122" class="imeDisabled" id="ctl00_cphContentsArea_ddlPBrk1EndMi" style="width: 50px;" onchange="SetPBrkTime('ctl00_cphContentsArea_ddlPBrk1StrHh','ctl00_cphContentsArea_ddlPBrk1StrMi','ctl00_cphContentsArea_ddlPBrk1EndHh','ctl00_cphContentsArea_ddlPBrk1EndMi','ctl00_cphContentsArea_lblPBrk1Time')">
                                            <option selected="selected" value=""></option>
                                            <option value="0">0</option>
                                            <option value="5">5</option>
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

                                        </select>
                                        &nbsp;分
                                    </td>
                                    <td align="right">
                                        &nbsp;&nbsp;&nbsp;
                                        <span id="ctl00_cphContentsArea_lblPBrk1Time"></span>
                                    </td>
                                    <td>

                                    </td>
                                </tr>
                                <tr>
                                    <th class="RowTitle">
                                        休憩時間２
                                    </th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlPBrk2StrHh" tabindex="123" class="imeDisabled" id="ctl00_cphContentsArea_ddlPBrk2StrHh" style="width: 50px;" onchange="SetPBrkTime('ctl00_cphContentsArea_ddlPBrk2StrHh','ctl00_cphContentsArea_ddlPBrk2StrMi','ctl00_cphContentsArea_ddlPBrk2EndHh','ctl00_cphContentsArea_ddlPBrk2EndMi','ctl00_cphContentsArea_lblPBrk2Time')">
                                            <option selected="selected" value=""></option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                            <option value="32">32</option>
                                            <option value="33">33</option>
                                            <option value="34">34</option>
                                            <option value="35">35</option>

                                        </select>
                                        &nbsp;時
                                        <select name="ctl00$cphContentsArea$ddlPBrk2StrMi" tabindex="124" class="imeDisabled" id="ctl00_cphContentsArea_ddlPBrk2StrMi" style="width: 50px;" onchange="SetPBrkTime('ctl00_cphContentsArea_ddlPBrk2StrHh','ctl00_cphContentsArea_ddlPBrk2StrMi','ctl00_cphContentsArea_ddlPBrk2EndHh','ctl00_cphContentsArea_ddlPBrk2EndMi','ctl00_cphContentsArea_lblPBrk2Time')">
                                            <option selected="selected" value=""></option>
                                            <option value="0">0</option>
                                            <option value="5">5</option>
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

                                        </select>
                                        &nbsp;分
                                    </td>
                                    <td>
                                        &nbsp;～
                                    </td>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlPBrk2EndHh" tabindex="125" class="imeDisabled" id="ctl00_cphContentsArea_ddlPBrk2EndHh" style="width: 50px;" onchange="SetPBrkTime('ctl00_cphContentsArea_ddlPBrk2StrHh','ctl00_cphContentsArea_ddlPBrk2StrMi','ctl00_cphContentsArea_ddlPBrk2EndHh','ctl00_cphContentsArea_ddlPBrk2EndMi','ctl00_cphContentsArea_lblPBrk2Time')">
                                            <option selected="selected" value=""></option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                            <option value="32">32</option>
                                            <option value="33">33</option>
                                            <option value="34">34</option>
                                            <option value="35">35</option>
                                            <option value="36">36</option>

                                        </select>
                                        &nbsp;時
                                        <select name="ctl00$cphContentsArea$ddlPBrk2EndMi" tabindex="126" class="imeDisabled" id="ctl00_cphContentsArea_ddlPBrk2EndMi" style="width: 50px;" onchange="SetPBrkTime('ctl00_cphContentsArea_ddlPBrk2StrHh','ctl00_cphContentsArea_ddlPBrk2StrMi','ctl00_cphContentsArea_ddlPBrk2EndHh','ctl00_cphContentsArea_ddlPBrk2EndMi','ctl00_cphContentsArea_lblPBrk2Time')">
                                            <option selected="selected" value=""></option>
                                            <option value="0">0</option>
                                            <option value="5">5</option>
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

                                        </select>
                                        &nbsp;分
                                    </td>
                                    <td align="right">
                                        &nbsp;&nbsp;&nbsp;
                                        <span id="ctl00_cphContentsArea_lblPBrk2Time"></span>
                                    </td>
                                    <td>

                                    </td>
                                </tr>
                                <tr>
                                    <th class="RowTitle">
                                        休憩時間３
                                    </th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlPBrk3StrHh" tabindex="127" class="imeDisabled" id="ctl00_cphContentsArea_ddlPBrk3StrHh" style="width: 50px;" onchange="SetPBrkTime('ctl00_cphContentsArea_ddlPBrk3StrHh','ctl00_cphContentsArea_ddlPBrk3StrMi','ctl00_cphContentsArea_ddlPBrk3EndHh','ctl00_cphContentsArea_ddlPBrk3EndMi','ctl00_cphContentsArea_lblPBrk3Time')">
                                            <option selected="selected" value=""></option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                            <option value="32">32</option>
                                            <option value="33">33</option>
                                            <option value="34">34</option>
                                            <option value="35">35</option>

                                        </select>
                                        &nbsp;時
                                        <select name="ctl00$cphContentsArea$ddlPBrk3StrMi" tabindex="128" class="imeDisabled" id="ctl00_cphContentsArea_ddlPBrk3StrMi" style="width: 50px;" onchange="SetPBrkTime('ctl00_cphContentsArea_ddlPBrk3StrHh','ctl00_cphContentsArea_ddlPBrk3StrMi','ctl00_cphContentsArea_ddlPBrk3EndHh','ctl00_cphContentsArea_ddlPBrk3EndMi','ctl00_cphContentsArea_lblPBrk3Time')">
                                            <option selected="selected" value=""></option>
                                            <option value="0">0</option>
                                            <option value="5">5</option>
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

                                        </select>
                                        &nbsp;分
                                    </td>
                                    <td>
                                        &nbsp;～
                                    </td>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlPBrk3EndHh" tabindex="129" class="imeDisabled" id="ctl00_cphContentsArea_ddlPBrk3EndHh" style="width: 50px;" onchange="SetPBrkTime('ctl00_cphContentsArea_ddlPBrk3StrHh','ctl00_cphContentsArea_ddlPBrk3StrMi','ctl00_cphContentsArea_ddlPBrk3EndHh','ctl00_cphContentsArea_ddlPBrk3EndMi','ctl00_cphContentsArea_lblPBrk3Time')">
                                            <option selected="selected" value=""></option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                            <option value="32">32</option>
                                            <option value="33">33</option>
                                            <option value="34">34</option>
                                            <option value="35">35</option>
                                            <option value="36">36</option>

                                        </select>
                                        &nbsp;時
                                        <select name="ctl00$cphContentsArea$ddlPBrk3EndMi" tabindex="130" class="imeDisabled" id="ctl00_cphContentsArea_ddlPBrk3EndMi" style="width: 50px;" onchange="SetPBrkTime('ctl00_cphContentsArea_ddlPBrk3StrHh','ctl00_cphContentsArea_ddlPBrk3StrMi','ctl00_cphContentsArea_ddlPBrk3EndHh','ctl00_cphContentsArea_ddlPBrk3EndMi','ctl00_cphContentsArea_lblPBrk3Time')">
                                            <option selected="selected" value=""></option>
                                            <option value="0">0</option>
                                            <option value="5">5</option>
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

                                        </select>
                                        &nbsp;分
                                    </td>
                                    <td align="right">
                                        &nbsp;&nbsp;&nbsp;
                                        <span id="ctl00_cphContentsArea_lblPBrk3Time"></span>
                                    </td>
                                    <td>

                                    </td>
                                </tr>
                                <tr>
                                    <th class="RowTitle">
                                        休憩時間４
                                    </th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlPBrk4StrHh" tabindex="131" class="imeDisabled" id="ctl00_cphContentsArea_ddlPBrk4StrHh" style="width: 50px;" onchange="SetPBrkTime('ctl00_cphContentsArea_ddlPBrk4StrHh','ctl00_cphContentsArea_ddlPBrk4StrMi','ctl00_cphContentsArea_ddlPBrk4EndHh','ctl00_cphContentsArea_ddlPBrk4EndMi','ctl00_cphContentsArea_lblPBrk4Time')">
                                            <option selected="selected" value=""></option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                            <option value="32">32</option>
                                            <option value="33">33</option>
                                            <option value="34">34</option>
                                            <option value="35">35</option>

                                        </select>
                                        &nbsp;時
                                        <select name="ctl00$cphContentsArea$ddlPBrk4StrMi" tabindex="132" class="imeDisabled" id="ctl00_cphContentsArea_ddlPBrk4StrMi" style="width: 50px;" onchange="SetPBrkTime('ctl00_cphContentsArea_ddlPBrk4StrHh','ctl00_cphContentsArea_ddlPBrk4StrMi','ctl00_cphContentsArea_ddlPBrk4EndHh','ctl00_cphContentsArea_ddlPBrk4EndMi','ctl00_cphContentsArea_lblPBrk4Time')">
                                            <option selected="selected" value=""></option>
                                            <option value="0">0</option>
                                            <option value="5">5</option>
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

                                        </select>
                                        &nbsp;分
                                    </td>
                                    <td>
                                        &nbsp;～
                                    </td>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlPBrk4EndHh" tabindex="133" class="imeDisabled" id="ctl00_cphContentsArea_ddlPBrk4EndHh" style="width: 50px;" onchange="SetPBrkTime('ctl00_cphContentsArea_ddlPBrk4StrHh','ctl00_cphContentsArea_ddlPBrk4StrMi','ctl00_cphContentsArea_ddlPBrk4EndHh','ctl00_cphContentsArea_ddlPBrk4EndMi','ctl00_cphContentsArea_lblPBrk4Time')">
                                            <option selected="selected" value=""></option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                            <option value="32">32</option>
                                            <option value="33">33</option>
                                            <option value="34">34</option>
                                            <option value="35">35</option>
                                            <option value="36">36</option>

                                        </select>
                                        &nbsp;時
                                        <select name="ctl00$cphContentsArea$ddlPBrk4EndMi" tabindex="134" class="imeDisabled" id="ctl00_cphContentsArea_ddlPBrk4EndMi" style="width: 50px;" onchange="SetPBrkTime('ctl00_cphContentsArea_ddlPBrk4StrHh','ctl00_cphContentsArea_ddlPBrk4StrMi','ctl00_cphContentsArea_ddlPBrk4EndHh','ctl00_cphContentsArea_ddlPBrk4EndMi','ctl00_cphContentsArea_lblPBrk4Time')">
                                            <option selected="selected" value=""></option>
                                            <option value="0">0</option>
                                            <option value="5">5</option>
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

                                        </select>
                                        &nbsp;分
                                    </td>
                                    <td align="right">
                                        &nbsp;&nbsp;&nbsp;
                                        <span id="ctl00_cphContentsArea_lblPBrk4Time"></span>
                                    </td>
                                    <td>

                                    </td>
                                </tr>
                                <tr>
                                    <th class="RowTitle">
                                        休憩時間５
                                    </th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlPBrk5StrHh" tabindex="135" class="imeDisabled" id="ctl00_cphContentsArea_ddlPBrk5StrHh" style="width: 50px;" onchange="SetPBrkTime('ctl00_cphContentsArea_ddlPBrk5StrHh','ctl00_cphContentsArea_ddlPBrk5StrMi','ctl00_cphContentsArea_ddlPBrk5EndHh','ctl00_cphContentsArea_ddlPBrk5EndMi','ctl00_cphContentsArea_lblPBrk5Time')">
                                            <option selected="selected" value=""></option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                            <option value="32">32</option>
                                            <option value="33">33</option>
                                            <option value="34">34</option>
                                            <option value="35">35</option>

                                        </select>
                                        &nbsp;時
                                        <select name="ctl00$cphContentsArea$ddlPBrk5StrMi" tabindex="136" class="imeDisabled" id="ctl00_cphContentsArea_ddlPBrk5StrMi" style="width: 50px;" onchange="SetPBrkTime('ctl00_cphContentsArea_ddlPBrk5StrHh','ctl00_cphContentsArea_ddlPBrk5StrMi','ctl00_cphContentsArea_ddlPBrk5EndHh','ctl00_cphContentsArea_ddlPBrk5EndMi','ctl00_cphContentsArea_lblPBrk5Time')">
                                            <option selected="selected" value=""></option>
                                            <option value="0">0</option>
                                            <option value="5">5</option>
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

                                        </select>
                                        &nbsp;分
                                    </td>
                                    <td>
                                        &nbsp;～
                                    </td>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlPBrk5EndHh" tabindex="137" class="imeDisabled" id="ctl00_cphContentsArea_ddlPBrk5EndHh" style="width: 50px;" onchange="SetPBrkTime('ctl00_cphContentsArea_ddlPBrk5StrHh','ctl00_cphContentsArea_ddlPBrk5StrMi','ctl00_cphContentsArea_ddlPBrk5EndHh','ctl00_cphContentsArea_ddlPBrk5EndMi','ctl00_cphContentsArea_lblPBrk5Time')">
                                            <option selected="selected" value=""></option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                            <option value="32">32</option>
                                            <option value="33">33</option>
                                            <option value="34">34</option>
                                            <option value="35">35</option>
                                            <option value="36">36</option>

                                        </select>
                                        &nbsp;時
                                        <select name="ctl00$cphContentsArea$ddlPBrk5EndMi" tabindex="138" class="imeDisabled" id="ctl00_cphContentsArea_ddlPBrk5EndMi" style="width: 50px;" onchange="SetPBrkTime('ctl00_cphContentsArea_ddlPBrk5StrHh','ctl00_cphContentsArea_ddlPBrk5StrMi','ctl00_cphContentsArea_ddlPBrk5EndHh','ctl00_cphContentsArea_ddlPBrk5EndMi','ctl00_cphContentsArea_lblPBrk5Time')">
                                            <option selected="selected" value=""></option>
                                            <option value="0">0</option>
                                            <option value="5">5</option>
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

                                        </select>
                                        &nbsp;分
                                    </td>
                                    <td align="right">
                                        &nbsp;&nbsp;&nbsp;
                                        <span id="ctl00_cphContentsArea_lblPBrk5Time"></span>
                                    </td>
                                    <td>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="CategoryTitle1">
                            時間数</p>
                        <table class="InputFieldStyle1">
                            <tbody>
                                <tr>
                                    <th>
                                        休憩時間
                                    </th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlNBrkTime" tabindex="139" disabled="disabled" class="imeDisabled" id="ctl00_cphContentsArea_ddlNBrkTime" style="width: 50px;">
                                            <option selected="selected" value=""></option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>

                                        </select>
                                        &nbsp;時間&nbsp;
                                        <select name="ctl00$cphContentsArea$ddlNBrkMinute" tabindex="140" disabled="disabled" class="imeDisabled" id="ctl00_cphContentsArea_ddlNBrkMinute" style="width: 50px;">
                                            <option selected="selected" value=""></option>
                                            <option value="0">0</option>
                                            <option value="5">5</option>
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

                                        </select>
                                        &nbsp;分

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="CategoryTitle1">
                            時間毎</p>
                        <table class="InputFieldStyle1">
                            <tbody>
                                <tr>
                                    <th>
                                        休憩時間
                                    </th>
                                    <td>
                                        <select name="ctl00$cphContentsArea$ddlEBrkPTime" tabindex="141" disabled="disabled" class="imeDisabled" id="ctl00_cphContentsArea_ddlEBrkPTime" style="width: 50px;">
                                            <option selected="selected" value=""></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>

                                        </select>
                                        &nbsp;時間働く毎に &nbsp;
                                        <select name="ctl00$cphContentsArea$ddlEBrkMinute" tabindex="142" disabled="disabled" class="imeDisabled" id="ctl00_cphContentsArea_ddlEBrkMinute" style="width: 50px;">
                                            <option selected="selected" value=""></option>
                                            <option value="0">0</option>
                                            <option value="5">5</option>
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
                                        &nbsp;分

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- detail block end -->
                        <!-- footer block -->
                        <div class="line">
                        </div>
                        <p class="ButtonField1">
                            <input name="ctl00$cphContentsArea$btnUpdate" tabindex="143" id="ctl00_cphContentsArea_btnUpdate" onclick="if(confirm('更新します。よろしいですか?') ==  false){ return false;};WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$cphContentsArea$btnUpdate&quot;, &quot;&quot;, true, &quot;Update&quot;, &quot;&quot;, false, true))" type="button" value="更新">
                            <input name="ctl00$cphContentsArea$btnCancel" tabindex="144" id="ctl00_cphContentsArea_btnCancel" onclick="javascript:__doPostBack('ctl00$cphContentsArea$btnCancel','')" type="button" value="キャンセル">
                            <input name="ctl00$cphContentsArea$btnDelete" tabindex="145" disabled="disabled" id="ctl00_cphContentsArea_btnDelete" type="button" value="削除">
                        </p>
                        <!-- footer block end -->

                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection