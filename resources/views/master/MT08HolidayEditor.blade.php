<!-- 祝祭日・会社休日情報入力  -->
@extends('menu.main')

@section('title','祝祭日・会社休日情報入力 ')

@section('content')
<div id="contents-stage">
    <table class="BaseContainerStyle3">
        <tbody>
            <tr>
                <td>
                    <div id="ctl00_cphContentsArea_UpdatePanel1">

                        <div class="GridViewStyle1">
                            <div class="flow">
                                <div class="pd5">

                                    <p class="CategoryTitle1">祝祭日</p>
                                    <input name="ctl00$cphContentsArea$btnAddNationalHoliday" tabindex="1" class="ButtonStyle1" id="ctl00_cphContentsArea_btnAddNationalHoliday" onclick="javascript:__doPostBack('ctl00$cphContentsArea$btnAddNationalHoliday','')" type="button" value="新規行追加">
                                    <div class="GridViewPanelStyle3 mg10" id="ctl00_cphContentsArea_pnlNationalHoliday">

                                        <div>
                                            <table tabindex="2" class="GridViewBorder" id="ctl00_cphContentsArea_gvNationalHoliday" style="border-collapse: collapse;" border="1" rules="all" cellspacing="0">
                                                <tbody>
                                                    <tr>
                                                        <th scope="col">
                                                            月
                                                        </th>
                                                        <th scope="col">
                                                            日
                                                        </th>
                                                        <th scope="col">
                                                            名称
                                                        </th>
                                                        <th scope="col">
                                                            行削除
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <td class="GridViewRowCenter">
                                                            <select name="ctl00$cphContentsArea$gvNationalHoliday$ctl02$ddlNhHldMonth" tabindex="3" class="imeDisabled" id="ctl00_cphContentsArea_gvNationalHoliday_ctl02_ddlNhHldMonth" style="width: 45px;" onchange="AddDropDownList('ctl00_cphContentsArea_gvNationalHoliday_ctl02_ddlNhHldMonth','ctl00_cphContentsArea_gvNationalHoliday_ctl02_ddlNhHldDay', 2021)">
                                                                <option selected="selected" value="1">1</option>
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

                                                            </select>
                                                            <span id="ctl00_cphContentsArea_gvNationalHoliday_ctl02_lblTitleNhNldMonthUnit">月</span>
                                                        </td>
                                                        <td class="GridViewRowCenter">
                                                            <select name="ctl00$cphContentsArea$gvNationalHoliday$ctl02$ddlNhHldDay" tabindex="3" class="imeDisabled" id="ctl00_cphContentsArea_gvNationalHoliday_ctl02_ddlNhHldDay" style="width: 45px;">
                                                                <option selected="selected" value="1">1</option>
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

                                                            </select>
                                                            <span id="ctl00_cphContentsArea_gvNationalHoliday_ctl02_lblTitleNhNldDayUnit">日</span>
                                                        </td>
                                                        <td class="GridViewRowLeft">
                                                            <input name="ctl00$cphContentsArea$gvNationalHoliday$ctl02$txtNhHldName" tabindex="3" class="imeOn" id="ctl00_cphContentsArea_gvNationalHoliday_ctl02_txtNhHldName" style="width: 170px;" onfocus="this.select();" type="text" maxlength="20" value="元旦">
                                                            <br>


                                                        </td>
                                                        <td class="GridViewRowCenter">
                                                            <input name="ctl00$cphContentsArea$gvNationalHoliday$ctl02$btnNhDeleteRow" tabindex="3" class="ButtonStyle1" id="ctl00_cphContentsArea_gvNationalHoliday_ctl02_btnNhDeleteRow" onclick="javascript:__doPostBack('ctl00$cphContentsArea$gvNationalHoliday$ctl02$btnNhDeleteRow','')" type="button" value="削除">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="GridViewRowCenter">
                                                            <select name="ctl00$cphContentsArea$gvNationalHoliday$ctl03$ddlNhHldMonth" tabindex="3" class="imeDisabled" id="ctl00_cphContentsArea_gvNationalHoliday_ctl03_ddlNhHldMonth" style="width: 45px;" onchange="AddDropDownList('ctl00_cphContentsArea_gvNationalHoliday_ctl03_ddlNhHldMonth','ctl00_cphContentsArea_gvNationalHoliday_ctl03_ddlNhHldDay', 2021)">
                                                                <option selected="selected" value="1">1</option>
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

                                                            </select>
                                                            <span id="ctl00_cphContentsArea_gvNationalHoliday_ctl03_lblTitleNhNldMonthUnit">月</span>
                                                        </td>
                                                        <td class="GridViewRowCenter">
                                                            <select name="ctl00$cphContentsArea$gvNationalHoliday$ctl03$ddlNhHldDay" tabindex="3" class="imeDisabled" id="ctl00_cphContentsArea_gvNationalHoliday_ctl03_ddlNhHldDay" style="width: 45px;">
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
                                                                <option selected="selected" value="11">11</option>
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

                                                            </select>
                                                            <span id="ctl00_cphContentsArea_gvNationalHoliday_ctl03_lblTitleNhNldDayUnit">日</span>
                                                        </td>
                                                        <td class="GridViewRowLeft">
                                                            <input name="ctl00$cphContentsArea$gvNationalHoliday$ctl03$txtNhHldName" tabindex="3" class="imeOn" id="ctl00_cphContentsArea_gvNationalHoliday_ctl03_txtNhHldName" style="width: 170px;" onfocus="this.select();" type="text" maxlength="20" value="成人の日">
                                                            <br>


                                                        </td>
                                                        <td class="GridViewRowCenter">
                                                            <input name="ctl00$cphContentsArea$gvNationalHoliday$ctl03$btnNhDeleteRow" tabindex="3" class="ButtonStyle1" id="ctl00_cphContentsArea_gvNationalHoliday_ctl03_btnNhDeleteRow" onclick="javascript:__doPostBack('ctl00$cphContentsArea$gvNationalHoliday$ctl03$btnNhDeleteRow','')" type="button" value="削除">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="GridViewRowCenter">
                                                            <select name="ctl00$cphContentsArea$gvNationalHoliday$ctl04$ddlNhHldMonth" tabindex="3" class="imeDisabled" id="ctl00_cphContentsArea_gvNationalHoliday_ctl04_ddlNhHldMonth" style="width: 45px;" onchange="AddDropDownList('ctl00_cphContentsArea_gvNationalHoliday_ctl04_ddlNhHldMonth','ctl00_cphContentsArea_gvNationalHoliday_ctl04_ddlNhHldDay', 2021)">
                                                                <option value="1">1</option>
                                                                <option selected="selected" value="2">2</option>
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

                                                            </select>
                                                            <span id="ctl00_cphContentsArea_gvNationalHoliday_ctl04_lblTitleNhNldMonthUnit">月</span>
                                                        </td>
                                                        <td class="GridViewRowCenter">
                                                            <select name="ctl00$cphContentsArea$gvNationalHoliday$ctl04$ddlNhHldDay" tabindex="3" class="imeDisabled" id="ctl00_cphContentsArea_gvNationalHoliday_ctl04_ddlNhHldDay" style="width: 45px;">
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
                                                                <option selected="selected" value="11">11</option>
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

                                                            </select>
                                                            <span id="ctl00_cphContentsArea_gvNationalHoliday_ctl04_lblTitleNhNldDayUnit">日</span>
                                                        </td>
                                                        <td class="GridViewRowLeft">
                                                            <input name="ctl00$cphContentsArea$gvNationalHoliday$ctl04$txtNhHldName" tabindex="3" class="imeOn" id="ctl00_cphContentsArea_gvNationalHoliday_ctl04_txtNhHldName" style="width: 170px;" onfocus="this.select();" type="text" maxlength="20" value="建国記念の日">
                                                            <br>


                                                        </td>
                                                        <td class="GridViewRowCenter">
                                                            <input name="ctl00$cphContentsArea$gvNationalHoliday$ctl04$btnNhDeleteRow" tabindex="3" class="ButtonStyle1" id="ctl00_cphContentsArea_gvNationalHoliday_ctl04_btnNhDeleteRow" onclick="javascript:__doPostBack('ctl00$cphContentsArea$gvNationalHoliday$ctl04$btnNhDeleteRow','')" type="button" value="削除">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="GridViewRowCenter">
                                                            <select name="ctl00$cphContentsArea$gvNationalHoliday$ctl05$ddlNhHldMonth" tabindex="3" class="imeDisabled" id="ctl00_cphContentsArea_gvNationalHoliday_ctl05_ddlNhHldMonth" style="width: 45px;" onchange="AddDropDownList('ctl00_cphContentsArea_gvNationalHoliday_ctl05_ddlNhHldMonth','ctl00_cphContentsArea_gvNationalHoliday_ctl05_ddlNhHldDay', 2021)">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option selected="selected" value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option value="8">8</option>
                                                                <option value="9">9</option>
                                                                <option value="10">10</option>
                                                                <option value="11">11</option>
                                                                <option value="12">12</option>

                                                            </select>
                                                            <span id="ctl00_cphContentsArea_gvNationalHoliday_ctl05_lblTitleNhNldMonthUnit">月</span>
                                                        </td>
                                                        <td class="GridViewRowCenter">
                                                            <select name="ctl00$cphContentsArea$gvNationalHoliday$ctl05$ddlNhHldDay" tabindex="3" class="imeDisabled" id="ctl00_cphContentsArea_gvNationalHoliday_ctl05_ddlNhHldDay" style="width: 45px;">
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
                                                                <option selected="selected" value="20">20</option>
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

                                                            </select>
                                                            <span id="ctl00_cphContentsArea_gvNationalHoliday_ctl05_lblTitleNhNldDayUnit">日</span>
                                                        </td>
                                                        <td class="GridViewRowLeft">
                                                            <input name="ctl00$cphContentsArea$gvNationalHoliday$ctl05$txtNhHldName" tabindex="3" class="imeOn" id="ctl00_cphContentsArea_gvNationalHoliday_ctl05_txtNhHldName" style="width: 170px;" onfocus="this.select();" type="text" maxlength="20" value="春分の日">
                                                            <br>


                                                        </td>
                                                        <td class="GridViewRowCenter">
                                                            <input name="ctl00$cphContentsArea$gvNationalHoliday$ctl05$btnNhDeleteRow" tabindex="3" class="ButtonStyle1" id="ctl00_cphContentsArea_gvNationalHoliday_ctl05_btnNhDeleteRow" onclick="javascript:__doPostBack('ctl00$cphContentsArea$gvNationalHoliday$ctl05$btnNhDeleteRow','')" type="button" value="削除">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="GridViewRowCenter">
                                                            <select name="ctl00$cphContentsArea$gvNationalHoliday$ctl06$ddlNhHldMonth" tabindex="3" class="imeDisabled" id="ctl00_cphContentsArea_gvNationalHoliday_ctl06_ddlNhHldMonth" style="width: 45px;" onchange="AddDropDownList('ctl00_cphContentsArea_gvNationalHoliday_ctl06_ddlNhHldMonth','ctl00_cphContentsArea_gvNationalHoliday_ctl06_ddlNhHldDay', 2021)">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option selected="selected" value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option value="8">8</option>
                                                                <option value="9">9</option>
                                                                <option value="10">10</option>
                                                                <option value="11">11</option>
                                                                <option value="12">12</option>

                                                            </select>
                                                            <span id="ctl00_cphContentsArea_gvNationalHoliday_ctl06_lblTitleNhNldMonthUnit">月</span>
                                                        </td>
                                                        <td class="GridViewRowCenter">
                                                            <select name="ctl00$cphContentsArea$gvNationalHoliday$ctl06$ddlNhHldDay" tabindex="3" class="imeDisabled" id="ctl00_cphContentsArea_gvNationalHoliday_ctl06_ddlNhHldDay" style="width: 45px;">
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
                                                                <option selected="selected" value="21">21</option>
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

                                                            </select>
                                                            <span id="ctl00_cphContentsArea_gvNationalHoliday_ctl06_lblTitleNhNldDayUnit">日</span>
                                                        </td>
                                                        <td class="GridViewRowLeft">
                                                            <input name="ctl00$cphContentsArea$gvNationalHoliday$ctl06$txtNhHldName" tabindex="3" class="imeOn" id="ctl00_cphContentsArea_gvNationalHoliday_ctl06_txtNhHldName" style="width: 170px;" onfocus="this.select();" type="text" maxlength="20" value="振替休日">
                                                            <br>


                                                        </td>
                                                        <td class="GridViewRowCenter">
                                                            <input name="ctl00$cphContentsArea$gvNationalHoliday$ctl06$btnNhDeleteRow" tabindex="3" class="ButtonStyle1" id="ctl00_cphContentsArea_gvNationalHoliday_ctl06_btnNhDeleteRow" onclick="javascript:__doPostBack('ctl00$cphContentsArea$gvNationalHoliday$ctl06$btnNhDeleteRow','')" type="button" value="削除">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="GridViewRowCenter">
                                                            <select name="ctl00$cphContentsArea$gvNationalHoliday$ctl07$ddlNhHldMonth" tabindex="3" class="imeDisabled" id="ctl00_cphContentsArea_gvNationalHoliday_ctl07_ddlNhHldMonth" style="width: 45px;" onchange="AddDropDownList('ctl00_cphContentsArea_gvNationalHoliday_ctl07_ddlNhHldMonth','ctl00_cphContentsArea_gvNationalHoliday_ctl07_ddlNhHldDay', 2021)">
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
                                                            <span id="ctl00_cphContentsArea_gvNationalHoliday_ctl07_lblTitleNhNldMonthUnit">月</span>
                                                        </td>
                                                        <td class="GridViewRowCenter">
                                                            <select name="ctl00$cphContentsArea$gvNationalHoliday$ctl07$ddlNhHldDay" tabindex="3" class="imeDisabled" id="ctl00_cphContentsArea_gvNationalHoliday_ctl07_ddlNhHldDay" style="width: 45px;">
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
                                                                <option selected="selected" value="29">29</option>
                                                                <option value="30">30</option>

                                                            </select>
                                                            <span id="ctl00_cphContentsArea_gvNationalHoliday_ctl07_lblTitleNhNldDayUnit">日</span>
                                                        </td>
                                                        <td class="GridViewRowLeft">
                                                            <input name="ctl00$cphContentsArea$gvNationalHoliday$ctl07$txtNhHldName" tabindex="3" class="imeOn" id="ctl00_cphContentsArea_gvNationalHoliday_ctl07_txtNhHldName" style="width: 170px;" onfocus="this.select();" type="text" maxlength="20" value="昭和の日">
                                                            <br>


                                                        </td>
                                                        <td class="GridViewRowCenter">
                                                            <input name="ctl00$cphContentsArea$gvNationalHoliday$ctl07$btnNhDeleteRow" tabindex="3" class="ButtonStyle1" id="ctl00_cphContentsArea_gvNationalHoliday_ctl07_btnNhDeleteRow" onclick="javascript:__doPostBack('ctl00$cphContentsArea$gvNationalHoliday$ctl07$btnNhDeleteRow','')" type="button" value="削除">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="GridViewRowCenter">
                                                            <select name="ctl00$cphContentsArea$gvNationalHoliday$ctl08$ddlNhHldMonth" tabindex="3" class="imeDisabled" id="ctl00_cphContentsArea_gvNationalHoliday_ctl08_ddlNhHldMonth" style="width: 45px;" onchange="AddDropDownList('ctl00_cphContentsArea_gvNationalHoliday_ctl08_ddlNhHldMonth','ctl00_cphContentsArea_gvNationalHoliday_ctl08_ddlNhHldDay', 2021)">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option selected="selected" value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option value="8">8</option>
                                                                <option value="9">9</option>
                                                                <option value="10">10</option>
                                                                <option value="11">11</option>
                                                                <option value="12">12</option>

                                                            </select>
                                                            <span id="ctl00_cphContentsArea_gvNationalHoliday_ctl08_lblTitleNhNldMonthUnit">月</span>
                                                        </td>
                                                        <td class="GridViewRowCenter">
                                                            <select name="ctl00$cphContentsArea$gvNationalHoliday$ctl08$ddlNhHldDay" tabindex="3" class="imeDisabled" id="ctl00_cphContentsArea_gvNationalHoliday_ctl08_ddlNhHldDay" style="width: 45px;">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option selected="selected" value="3">3</option>
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

                                                            </select>
                                                            <span id="ctl00_cphContentsArea_gvNationalHoliday_ctl08_lblTitleNhNldDayUnit">日</span>
                                                        </td>
                                                        <td class="GridViewRowLeft">
                                                            <input name="ctl00$cphContentsArea$gvNationalHoliday$ctl08$txtNhHldName" tabindex="3" class="imeOn" id="ctl00_cphContentsArea_gvNationalHoliday_ctl08_txtNhHldName" style="width: 170px;" onfocus="this.select();" type="text" maxlength="20" value="憲法記念日">
                                                            <br>


                                                        </td>
                                                        <td class="GridViewRowCenter">
                                                            <input name="ctl00$cphContentsArea$gvNationalHoliday$ctl08$btnNhDeleteRow" tabindex="3" class="ButtonStyle1" id="ctl00_cphContentsArea_gvNationalHoliday_ctl08_btnNhDeleteRow" onclick="javascript:__doPostBack('ctl00$cphContentsArea$gvNationalHoliday$ctl08$btnNhDeleteRow','')" type="button" value="削除">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="GridViewRowCenter">
                                                            <select name="ctl00$cphContentsArea$gvNationalHoliday$ctl09$ddlNhHldMonth" tabindex="3" class="imeDisabled" id="ctl00_cphContentsArea_gvNationalHoliday_ctl09_ddlNhHldMonth" style="width: 45px;" onchange="AddDropDownList('ctl00_cphContentsArea_gvNationalHoliday_ctl09_ddlNhHldMonth','ctl00_cphContentsArea_gvNationalHoliday_ctl09_ddlNhHldDay', 2021)">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option selected="selected" value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option value="8">8</option>
                                                                <option value="9">9</option>
                                                                <option value="10">10</option>
                                                                <option value="11">11</option>
                                                                <option value="12">12</option>

                                                            </select>
                                                            <span id="ctl00_cphContentsArea_gvNationalHoliday_ctl09_lblTitleNhNldMonthUnit">月</span>
                                                        </td>
                                                        <td class="GridViewRowCenter">
                                                            <select name="ctl00$cphContentsArea$gvNationalHoliday$ctl09$ddlNhHldDay" tabindex="3" class="imeDisabled" id="ctl00_cphContentsArea_gvNationalHoliday_ctl09_ddlNhHldDay" style="width: 45px;">
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

                                                            </select>
                                                            <span id="ctl00_cphContentsArea_gvNationalHoliday_ctl09_lblTitleNhNldDayUnit">日</span>
                                                        </td>
                                                        <td class="GridViewRowLeft">
                                                            <input name="ctl00$cphContentsArea$gvNationalHoliday$ctl09$txtNhHldName" tabindex="3" class="imeOn" id="ctl00_cphContentsArea_gvNationalHoliday_ctl09_txtNhHldName" style="width: 170px;" onfocus="this.select();" type="text" maxlength="20" value="みどりの日">
                                                            <br>


                                                        </td>
                                                        <td class="GridViewRowCenter">
                                                            <input name="ctl00$cphContentsArea$gvNationalHoliday$ctl09$btnNhDeleteRow" tabindex="3" class="ButtonStyle1" id="ctl00_cphContentsArea_gvNationalHoliday_ctl09_btnNhDeleteRow" onclick="javascript:__doPostBack('ctl00$cphContentsArea$gvNationalHoliday$ctl09$btnNhDeleteRow','')" type="button" value="削除">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="GridViewRowCenter">
                                                            <select name="ctl00$cphContentsArea$gvNationalHoliday$ctl10$ddlNhHldMonth" tabindex="3" class="imeDisabled" id="ctl00_cphContentsArea_gvNationalHoliday_ctl10_ddlNhHldMonth" style="width: 45px;" onchange="AddDropDownList('ctl00_cphContentsArea_gvNationalHoliday_ctl10_ddlNhHldMonth','ctl00_cphContentsArea_gvNationalHoliday_ctl10_ddlNhHldDay', 2021)">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option selected="selected" value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option value="8">8</option>
                                                                <option value="9">9</option>
                                                                <option value="10">10</option>
                                                                <option value="11">11</option>
                                                                <option value="12">12</option>

                                                            </select>
                                                            <span id="ctl00_cphContentsArea_gvNationalHoliday_ctl10_lblTitleNhNldMonthUnit">月</span>
                                                        </td>
                                                        <td class="GridViewRowCenter">
                                                            <select name="ctl00$cphContentsArea$gvNationalHoliday$ctl10$ddlNhHldDay" tabindex="3" class="imeDisabled" id="ctl00_cphContentsArea_gvNationalHoliday_ctl10_ddlNhHldDay" style="width: 45px;">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option selected="selected" value="5">5</option>
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

                                                            </select>
                                                            <span id="ctl00_cphContentsArea_gvNationalHoliday_ctl10_lblTitleNhNldDayUnit">日</span>
                                                        </td>
                                                        <td class="GridViewRowLeft">
                                                            <input name="ctl00$cphContentsArea$gvNationalHoliday$ctl10$txtNhHldName" tabindex="3" class="imeOn" id="ctl00_cphContentsArea_gvNationalHoliday_ctl10_txtNhHldName" style="width: 170px;" onfocus="this.select();" type="text" maxlength="20" value="こどもの日">
                                                            <br>


                                                        </td>
                                                        <td class="GridViewRowCenter">
                                                            <input name="ctl00$cphContentsArea$gvNationalHoliday$ctl10$btnNhDeleteRow" tabindex="3" class="ButtonStyle1" id="ctl00_cphContentsArea_gvNationalHoliday_ctl10_btnNhDeleteRow" onclick="javascript:__doPostBack('ctl00$cphContentsArea$gvNationalHoliday$ctl10$btnNhDeleteRow','')" type="button" value="削除">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="GridViewRowCenter">
                                                            <select name="ctl00$cphContentsArea$gvNationalHoliday$ctl11$ddlNhHldMonth" tabindex="3" class="imeDisabled" id="ctl00_cphContentsArea_gvNationalHoliday_ctl11_ddlNhHldMonth" style="width: 45px;" onchange="AddDropDownList('ctl00_cphContentsArea_gvNationalHoliday_ctl11_ddlNhHldMonth','ctl00_cphContentsArea_gvNationalHoliday_ctl11_ddlNhHldDay', 2021)">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option selected="selected" value="7">7</option>
                                                                <option value="8">8</option>
                                                                <option value="9">9</option>
                                                                <option value="10">10</option>
                                                                <option value="11">11</option>
                                                                <option value="12">12</option>

                                                            </select>
                                                            <span id="ctl00_cphContentsArea_gvNationalHoliday_ctl11_lblTitleNhNldMonthUnit">月</span>
                                                        </td>
                                                        <td class="GridViewRowCenter">
                                                            <select name="ctl00$cphContentsArea$gvNationalHoliday$ctl11$ddlNhHldDay" tabindex="3" class="imeDisabled" id="ctl00_cphContentsArea_gvNationalHoliday_ctl11_ddlNhHldDay" style="width: 45px;">
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
                                                                <option selected="selected" value="18">18</option>
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

                                                            </select>
                                                            <span id="ctl00_cphContentsArea_gvNationalHoliday_ctl11_lblTitleNhNldDayUnit">日</span>
                                                        </td>
                                                        <td class="GridViewRowLeft">
                                                            <input name="ctl00$cphContentsArea$gvNationalHoliday$ctl11$txtNhHldName" tabindex="3" class="imeOn" id="ctl00_cphContentsArea_gvNationalHoliday_ctl11_txtNhHldName" style="width: 170px;" onfocus="this.select();" type="text" maxlength="20" value="海の日">
                                                            <br>


                                                        </td>
                                                        <td class="GridViewRowCenter">
                                                            <input name="ctl00$cphContentsArea$gvNationalHoliday$ctl11$btnNhDeleteRow" tabindex="3" class="ButtonStyle1" id="ctl00_cphContentsArea_gvNationalHoliday_ctl11_btnNhDeleteRow" onclick="javascript:__doPostBack('ctl00$cphContentsArea$gvNationalHoliday$ctl11$btnNhDeleteRow','')" type="button" value="削除">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="GridViewRowCenter">
                                                            <select name="ctl00$cphContentsArea$gvNationalHoliday$ctl12$ddlNhHldMonth" tabindex="3" class="imeDisabled" id="ctl00_cphContentsArea_gvNationalHoliday_ctl12_ddlNhHldMonth" style="width: 45px;" onchange="AddDropDownList('ctl00_cphContentsArea_gvNationalHoliday_ctl12_ddlNhHldMonth','ctl00_cphContentsArea_gvNationalHoliday_ctl12_ddlNhHldDay', 2021)">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option selected="selected" value="8">8</option>
                                                                <option value="9">9</option>
                                                                <option value="10">10</option>
                                                                <option value="11">11</option>
                                                                <option value="12">12</option>

                                                            </select>
                                                            <span id="ctl00_cphContentsArea_gvNationalHoliday_ctl12_lblTitleNhNldMonthUnit">月</span>
                                                        </td>
                                                        <td class="GridViewRowCenter">
                                                            <select name="ctl00$cphContentsArea$gvNationalHoliday$ctl12$ddlNhHldDay" tabindex="3" class="imeDisabled" id="ctl00_cphContentsArea_gvNationalHoliday_ctl12_ddlNhHldDay" style="width: 45px;">
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
                                                                <option selected="selected" value="11">11</option>
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

                                                            </select>
                                                            <span id="ctl00_cphContentsArea_gvNationalHoliday_ctl12_lblTitleNhNldDayUnit">日</span>
                                                        </td>
                                                        <td class="GridViewRowLeft">
                                                            <input name="ctl00$cphContentsArea$gvNationalHoliday$ctl12$txtNhHldName" tabindex="3" class="imeOn" id="ctl00_cphContentsArea_gvNationalHoliday_ctl12_txtNhHldName" style="width: 170px;" onfocus="this.select();" type="text" maxlength="20" value="山の日">
                                                            <br>


                                                        </td>
                                                        <td class="GridViewRowCenter">
                                                            <input name="ctl00$cphContentsArea$gvNationalHoliday$ctl12$btnNhDeleteRow" tabindex="3" class="ButtonStyle1" id="ctl00_cphContentsArea_gvNationalHoliday_ctl12_btnNhDeleteRow" onclick="javascript:__doPostBack('ctl00$cphContentsArea$gvNationalHoliday$ctl12$btnNhDeleteRow','')" type="button" value="削除">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="GridViewRowCenter">
                                                            <select name="ctl00$cphContentsArea$gvNationalHoliday$ctl13$ddlNhHldMonth" tabindex="3" class="imeDisabled" id="ctl00_cphContentsArea_gvNationalHoliday_ctl13_ddlNhHldMonth" style="width: 45px;" onchange="AddDropDownList('ctl00_cphContentsArea_gvNationalHoliday_ctl13_ddlNhHldMonth','ctl00_cphContentsArea_gvNationalHoliday_ctl13_ddlNhHldDay', 2021)">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option value="8">8</option>
                                                                <option selected="selected" value="9">9</option>
                                                                <option value="10">10</option>
                                                                <option value="11">11</option>
                                                                <option value="12">12</option>

                                                            </select>
                                                            <span id="ctl00_cphContentsArea_gvNationalHoliday_ctl13_lblTitleNhNldMonthUnit">月</span>
                                                        </td>
                                                        <td class="GridViewRowCenter">
                                                            <select name="ctl00$cphContentsArea$gvNationalHoliday$ctl13$ddlNhHldDay" tabindex="3" class="imeDisabled" id="ctl00_cphContentsArea_gvNationalHoliday_ctl13_ddlNhHldDay" style="width: 45px;">
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
                                                                <option selected="selected" value="18">18</option>
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

                                                            </select>
                                                            <span id="ctl00_cphContentsArea_gvNationalHoliday_ctl13_lblTitleNhNldDayUnit">日</span>
                                                        </td>
                                                        <td class="GridViewRowLeft">
                                                            <input name="ctl00$cphContentsArea$gvNationalHoliday$ctl13$txtNhHldName" tabindex="3" class="imeOn" id="ctl00_cphContentsArea_gvNationalHoliday_ctl13_txtNhHldName" style="width: 170px;" onfocus="this.select();" type="text" maxlength="20" value="敬老の日">
                                                            <br>


                                                        </td>
                                                        <td class="GridViewRowCenter">
                                                            <input name="ctl00$cphContentsArea$gvNationalHoliday$ctl13$btnNhDeleteRow" tabindex="3" class="ButtonStyle1" id="ctl00_cphContentsArea_gvNationalHoliday_ctl13_btnNhDeleteRow" onclick="javascript:__doPostBack('ctl00$cphContentsArea$gvNationalHoliday$ctl13$btnNhDeleteRow','')" type="button" value="削除">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="GridViewRowCenter">
                                                            <select name="ctl00$cphContentsArea$gvNationalHoliday$ctl14$ddlNhHldMonth" tabindex="3" class="imeDisabled" id="ctl00_cphContentsArea_gvNationalHoliday_ctl14_ddlNhHldMonth" style="width: 45px;" onchange="AddDropDownList('ctl00_cphContentsArea_gvNationalHoliday_ctl14_ddlNhHldMonth','ctl00_cphContentsArea_gvNationalHoliday_ctl14_ddlNhHldDay', 2021)">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option value="8">8</option>
                                                                <option selected="selected" value="9">9</option>
                                                                <option value="10">10</option>
                                                                <option value="11">11</option>
                                                                <option value="12">12</option>

                                                            </select>
                                                            <span id="ctl00_cphContentsArea_gvNationalHoliday_ctl14_lblTitleNhNldMonthUnit">月</span>
                                                        </td>
                                                        <td class="GridViewRowCenter">
                                                            <select name="ctl00$cphContentsArea$gvNationalHoliday$ctl14$ddlNhHldDay" tabindex="3" class="imeDisabled" id="ctl00_cphContentsArea_gvNationalHoliday_ctl14_ddlNhHldDay" style="width: 45px;">
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
                                                                <option selected="selected" value="23">23</option>
                                                                <option value="24">24</option>
                                                                <option value="25">25</option>
                                                                <option value="26">26</option>
                                                                <option value="27">27</option>
                                                                <option value="28">28</option>
                                                                <option value="29">29</option>
                                                                <option value="30">30</option>

                                                            </select>
                                                            <span id="ctl00_cphContentsArea_gvNationalHoliday_ctl14_lblTitleNhNldDayUnit">日</span>
                                                        </td>
                                                        <td class="GridViewRowLeft">
                                                            <input name="ctl00$cphContentsArea$gvNationalHoliday$ctl14$txtNhHldName" tabindex="3" class="imeOn" id="ctl00_cphContentsArea_gvNationalHoliday_ctl14_txtNhHldName" style="width: 170px;" onfocus="this.select();" type="text" maxlength="20" value="秋分の日">
                                                            <br>


                                                        </td>
                                                        <td class="GridViewRowCenter">
                                                            <input name="ctl00$cphContentsArea$gvNationalHoliday$ctl14$btnNhDeleteRow" tabindex="3" class="ButtonStyle1" id="ctl00_cphContentsArea_gvNationalHoliday_ctl14_btnNhDeleteRow" onclick="javascript:__doPostBack('ctl00$cphContentsArea$gvNationalHoliday$ctl14$btnNhDeleteRow','')" type="button" value="削除">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="GridViewRowCenter">
                                                            <select name="ctl00$cphContentsArea$gvNationalHoliday$ctl15$ddlNhHldMonth" tabindex="3" class="imeDisabled" id="ctl00_cphContentsArea_gvNationalHoliday_ctl15_ddlNhHldMonth" style="width: 45px;" onchange="AddDropDownList('ctl00_cphContentsArea_gvNationalHoliday_ctl15_ddlNhHldMonth','ctl00_cphContentsArea_gvNationalHoliday_ctl15_ddlNhHldDay', 2021)">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option value="8">8</option>
                                                                <option value="9">9</option>
                                                                <option selected="selected" value="10">10</option>
                                                                <option value="11">11</option>
                                                                <option value="12">12</option>

                                                            </select>
                                                            <span id="ctl00_cphContentsArea_gvNationalHoliday_ctl15_lblTitleNhNldMonthUnit">月</span>
                                                        </td>
                                                        <td class="GridViewRowCenter">
                                                            <select name="ctl00$cphContentsArea$gvNationalHoliday$ctl15$ddlNhHldDay" tabindex="3" class="imeDisabled" id="ctl00_cphContentsArea_gvNationalHoliday_ctl15_ddlNhHldDay" style="width: 45px;">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option value="8">8</option>
                                                                <option selected="selected" value="9">9</option>
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

                                                            </select>
                                                            <span id="ctl00_cphContentsArea_gvNationalHoliday_ctl15_lblTitleNhNldDayUnit">日</span>
                                                        </td>
                                                        <td class="GridViewRowLeft">
                                                            <input name="ctl00$cphContentsArea$gvNationalHoliday$ctl15$txtNhHldName" tabindex="3" class="imeOn" id="ctl00_cphContentsArea_gvNationalHoliday_ctl15_txtNhHldName" style="width: 170px;" onfocus="this.select();" type="text" maxlength="20" value="体育の日">
                                                            <br>


                                                        </td>
                                                        <td class="GridViewRowCenter">
                                                            <input name="ctl00$cphContentsArea$gvNationalHoliday$ctl15$btnNhDeleteRow" tabindex="3" class="ButtonStyle1" id="ctl00_cphContentsArea_gvNationalHoliday_ctl15_btnNhDeleteRow" onclick="javascript:__doPostBack('ctl00$cphContentsArea$gvNationalHoliday$ctl15$btnNhDeleteRow','')" type="button" value="削除">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="GridViewRowCenter">
                                                            <select name="ctl00$cphContentsArea$gvNationalHoliday$ctl16$ddlNhHldMonth" tabindex="3" class="imeDisabled" id="ctl00_cphContentsArea_gvNationalHoliday_ctl16_ddlNhHldMonth" style="width: 45px;" onchange="AddDropDownList('ctl00_cphContentsArea_gvNationalHoliday_ctl16_ddlNhHldMonth','ctl00_cphContentsArea_gvNationalHoliday_ctl16_ddlNhHldDay', 2021)">
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
                                                                <option selected="selected" value="11">11</option>
                                                                <option value="12">12</option>

                                                            </select>
                                                            <span id="ctl00_cphContentsArea_gvNationalHoliday_ctl16_lblTitleNhNldMonthUnit">月</span>
                                                        </td>
                                                        <td class="GridViewRowCenter">
                                                            <select name="ctl00$cphContentsArea$gvNationalHoliday$ctl16$ddlNhHldDay" tabindex="3" class="imeDisabled" id="ctl00_cphContentsArea_gvNationalHoliday_ctl16_ddlNhHldDay" style="width: 45px;">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option selected="selected" value="3">3</option>
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

                                                            </select>
                                                            <span id="ctl00_cphContentsArea_gvNationalHoliday_ctl16_lblTitleNhNldDayUnit">日</span>
                                                        </td>
                                                        <td class="GridViewRowLeft">
                                                            <input name="ctl00$cphContentsArea$gvNationalHoliday$ctl16$txtNhHldName" tabindex="3" class="imeOn" id="ctl00_cphContentsArea_gvNationalHoliday_ctl16_txtNhHldName" style="width: 170px;" onfocus="this.select();" type="text" maxlength="20" value="文化の日">
                                                            <br>


                                                        </td>
                                                        <td class="GridViewRowCenter">
                                                            <input name="ctl00$cphContentsArea$gvNationalHoliday$ctl16$btnNhDeleteRow" tabindex="3" class="ButtonStyle1" id="ctl00_cphContentsArea_gvNationalHoliday_ctl16_btnNhDeleteRow" onclick="javascript:__doPostBack('ctl00$cphContentsArea$gvNationalHoliday$ctl16$btnNhDeleteRow','')" type="button" value="削除">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="GridViewRowCenter">
                                                            <select name="ctl00$cphContentsArea$gvNationalHoliday$ctl17$ddlNhHldMonth" tabindex="3" class="imeDisabled" id="ctl00_cphContentsArea_gvNationalHoliday_ctl17_ddlNhHldMonth" style="width: 45px;" onchange="AddDropDownList('ctl00_cphContentsArea_gvNationalHoliday_ctl17_ddlNhHldMonth','ctl00_cphContentsArea_gvNationalHoliday_ctl17_ddlNhHldDay', 2021)">
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
                                                                <option selected="selected" value="11">11</option>
                                                                <option value="12">12</option>

                                                            </select>
                                                            <span id="ctl00_cphContentsArea_gvNationalHoliday_ctl17_lblTitleNhNldMonthUnit">月</span>
                                                        </td>
                                                        <td class="GridViewRowCenter">
                                                            <select name="ctl00$cphContentsArea$gvNationalHoliday$ctl17$ddlNhHldDay" tabindex="3" class="imeDisabled" id="ctl00_cphContentsArea_gvNationalHoliday_ctl17_ddlNhHldDay" style="width: 45px;">
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
                                                                <option selected="selected" value="23">23</option>
                                                                <option value="24">24</option>
                                                                <option value="25">25</option>
                                                                <option value="26">26</option>
                                                                <option value="27">27</option>
                                                                <option value="28">28</option>
                                                                <option value="29">29</option>
                                                                <option value="30">30</option>

                                                            </select>
                                                            <span id="ctl00_cphContentsArea_gvNationalHoliday_ctl17_lblTitleNhNldDayUnit">日</span>
                                                        </td>
                                                        <td class="GridViewRowLeft">
                                                            <input name="ctl00$cphContentsArea$gvNationalHoliday$ctl17$txtNhHldName" tabindex="3" class="imeOn" id="ctl00_cphContentsArea_gvNationalHoliday_ctl17_txtNhHldName" style="width: 170px;" onfocus="this.select();" type="text" maxlength="20" value="勤労感謝の日">
                                                            <br>


                                                        </td>
                                                        <td class="GridViewRowCenter">
                                                            <input name="ctl00$cphContentsArea$gvNationalHoliday$ctl17$btnNhDeleteRow" tabindex="3" class="ButtonStyle1" id="ctl00_cphContentsArea_gvNationalHoliday_ctl17_btnNhDeleteRow" onclick="javascript:__doPostBack('ctl00$cphContentsArea$gvNationalHoliday$ctl17$btnNhDeleteRow','')" type="button" value="削除">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="GridViewRowCenter">
                                                            <select name="ctl00$cphContentsArea$gvNationalHoliday$ctl18$ddlNhHldMonth" tabindex="3" class="imeDisabled" id="ctl00_cphContentsArea_gvNationalHoliday_ctl18_ddlNhHldMonth" style="width: 45px;" onchange="AddDropDownList('ctl00_cphContentsArea_gvNationalHoliday_ctl18_ddlNhHldMonth','ctl00_cphContentsArea_gvNationalHoliday_ctl18_ddlNhHldDay', 2021)">
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
                                                                <option selected="selected" value="12">12</option>

                                                            </select>
                                                            <span id="ctl00_cphContentsArea_gvNationalHoliday_ctl18_lblTitleNhNldMonthUnit">月</span>
                                                        </td>
                                                        <td class="GridViewRowCenter">
                                                            <select name="ctl00$cphContentsArea$gvNationalHoliday$ctl18$ddlNhHldDay" tabindex="3" class="imeDisabled" id="ctl00_cphContentsArea_gvNationalHoliday_ctl18_ddlNhHldDay" style="width: 45px;">
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
                                                                <option selected="selected" value="23">23</option>
                                                                <option value="24">24</option>
                                                                <option value="25">25</option>
                                                                <option value="26">26</option>
                                                                <option value="27">27</option>
                                                                <option value="28">28</option>
                                                                <option value="29">29</option>
                                                                <option value="30">30</option>
                                                                <option value="31">31</option>

                                                            </select>
                                                            <span id="ctl00_cphContentsArea_gvNationalHoliday_ctl18_lblTitleNhNldDayUnit">日</span>
                                                        </td>
                                                        <td class="GridViewRowLeft">
                                                            <input name="ctl00$cphContentsArea$gvNationalHoliday$ctl18$txtNhHldName" tabindex="3" class="imeOn" id="ctl00_cphContentsArea_gvNationalHoliday_ctl18_txtNhHldName" style="width: 170px;" onfocus="this.select();" type="text" maxlength="20" value="天皇誕生日">
                                                            <br>


                                                        </td>
                                                        <td class="GridViewRowCenter">
                                                            <input name="ctl00$cphContentsArea$gvNationalHoliday$ctl18$btnNhDeleteRow" tabindex="3" class="ButtonStyle1" id="ctl00_cphContentsArea_gvNationalHoliday_ctl18_btnNhDeleteRow" onclick="javascript:__doPostBack('ctl00$cphContentsArea$gvNationalHoliday$ctl18$btnNhDeleteRow','')" type="button" value="削除">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>

                                </div>
                            </div>

                            <div class="flow">
                                <div class="pd5">

                                    <p class="CategoryTitle1">会社休日</p>
                                    <input name="ctl00$cphContentsArea$btnAddCompanyHoliday" tabindex="4" id="ctl00_cphContentsArea_btnAddCompanyHoliday" onclick="javascript:__doPostBack('ctl00$cphContentsArea$btnAddCompanyHoliday','')" type="button" value="新規行追加">
                                    <div class="GridViewPanelStyle3 mg10" id="ctl00_cphContentsArea_pnlCompanyHoliday">

                                        <div>
                                            <table tabindex="5" class="GridViewBorder" id="ctl00_cphContentsArea_gvCompanyHoliday" style="border-collapse: collapse;" border="1" rules="all" cellspacing="0">
                                                <tbody>
                                                    <tr>
                                                        <th scope="col">
                                                            月
                                                        </th>
                                                        <th scope="col">
                                                            日
                                                        </th>
                                                        <th scope="col">
                                                            名称
                                                        </th>
                                                        <th scope="col">
                                                            行削除
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <td class="GridViewRowCenter">
                                                            <select name="ctl00$cphContentsArea$gvCompanyHoliday$ctl02$ddlChHldMonth" tabindex="6" class="imeDisabled" id="ctl00_cphContentsArea_gvCompanyHoliday_ctl02_ddlChHldMonth" style="width: 45px;" onchange="AddDropDownList('ctl00_cphContentsArea_gvCompanyHoliday_ctl02_ddlChHldMonth','ctl00_cphContentsArea_gvCompanyHoliday_ctl02_ddlChHldDay', 2021)">
                                                                <option selected="selected" value="1">1</option>
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

                                                            </select>
                                                            <span id="ctl00_cphContentsArea_gvCompanyHoliday_ctl02_lblTitleChNldMonthUnit">月</span>
                                                        </td>
                                                        <td class="GridViewRowCenter">
                                                            <select name="ctl00$cphContentsArea$gvCompanyHoliday$ctl02$ddlChHldDay" tabindex="6" class="imeDisabled" id="ctl00_cphContentsArea_gvCompanyHoliday_ctl02_ddlChHldDay" style="width: 45px;">
                                                                <option value="1">1</option>
                                                                <option selected="selected" value="2">2</option>
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

                                                            </select>
                                                            <span id="ctl00_cphContentsArea_gvCompanyHoliday_ctl02_lblTitleChNldDayUnit">日</span>
                                                        </td>
                                                        <td class="GridViewRowLeft">
                                                            <input name="ctl00$cphContentsArea$gvCompanyHoliday$ctl02$txtChHldName" tabindex="6" class="imeOn" id="ctl00_cphContentsArea_gvCompanyHoliday_ctl02_txtChHldName" style="width: 170px;" onfocus="this.select();" type="text" maxlength="20" value="冬期休暇">
                                                            <br>
                                                            <span id="ctl00_cphContentsArea_gvCompanyHoliday_ctl02_cvChHldName" style="color: red; display: none;">ErrorMessage</span>
                                                            <span id="ctl00_cphContentsArea_gvCompanyHoliday_ctl02_cvChHldMonth" style="color: red; display: none;">ErrorMessage</span>
                                                        </td>
                                                        <td class="GridViewRowCenter">
                                                            <input name="ctl00$cphContentsArea$gvCompanyHoliday$ctl02$btnChDeleteRow" tabindex="6" class="ButtonStyle1" id="ctl00_cphContentsArea_gvCompanyHoliday_ctl02_btnChDeleteRow" onclick="javascript:__doPostBack('ctl00$cphContentsArea$gvCompanyHoliday$ctl02$btnChDeleteRow','')" type="button" value="削除">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="GridViewRowCenter">
                                                            <select name="ctl00$cphContentsArea$gvCompanyHoliday$ctl03$ddlChHldMonth" tabindex="6" class="imeDisabled" id="ctl00_cphContentsArea_gvCompanyHoliday_ctl03_ddlChHldMonth" style="width: 45px;" onchange="AddDropDownList('ctl00_cphContentsArea_gvCompanyHoliday_ctl03_ddlChHldMonth','ctl00_cphContentsArea_gvCompanyHoliday_ctl03_ddlChHldDay', 2021)">
                                                                <option selected="selected" value="1">1</option>
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

                                                            </select>
                                                            <span id="ctl00_cphContentsArea_gvCompanyHoliday_ctl03_lblTitleChNldMonthUnit">月</span>
                                                        </td>
                                                        <td class="GridViewRowCenter">
                                                            <select name="ctl00$cphContentsArea$gvCompanyHoliday$ctl03$ddlChHldDay" tabindex="6" class="imeDisabled" id="ctl00_cphContentsArea_gvCompanyHoliday_ctl03_ddlChHldDay" style="width: 45px;">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option selected="selected" value="3">3</option>
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

                                                            </select>
                                                            <span id="ctl00_cphContentsArea_gvCompanyHoliday_ctl03_lblTitleChNldDayUnit">日</span>
                                                        </td>
                                                        <td class="GridViewRowLeft">
                                                            <input name="ctl00$cphContentsArea$gvCompanyHoliday$ctl03$txtChHldName" tabindex="6" class="imeOn" id="ctl00_cphContentsArea_gvCompanyHoliday_ctl03_txtChHldName" style="width: 170px;" onfocus="this.select();" type="text" maxlength="20" value="冬期休暇">
                                                            <br>
                                                            <span id="ctl00_cphContentsArea_gvCompanyHoliday_ctl03_cvChHldName" style="color: red; display: none;">ErrorMessage</span>
                                                            <span id="ctl00_cphContentsArea_gvCompanyHoliday_ctl03_cvChHldMonth" style="color: red; display: none;">ErrorMessage</span>
                                                        </td>
                                                        <td class="GridViewRowCenter">
                                                            <input name="ctl00$cphContentsArea$gvCompanyHoliday$ctl03$btnChDeleteRow" tabindex="6" class="ButtonStyle1" id="ctl00_cphContentsArea_gvCompanyHoliday_ctl03_btnChDeleteRow" onclick="javascript:__doPostBack('ctl00$cphContentsArea$gvCompanyHoliday$ctl03$btnChDeleteRow','')" type="button" value="削除">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="GridViewRowCenter">
                                                            <select name="ctl00$cphContentsArea$gvCompanyHoliday$ctl04$ddlChHldMonth" tabindex="6" class="imeDisabled" id="ctl00_cphContentsArea_gvCompanyHoliday_ctl04_ddlChHldMonth" style="width: 45px;" onchange="AddDropDownList('ctl00_cphContentsArea_gvCompanyHoliday_ctl04_ddlChHldMonth','ctl00_cphContentsArea_gvCompanyHoliday_ctl04_ddlChHldDay', 2021)">
                                                                <option selected="selected" value="1">1</option>
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

                                                            </select>
                                                            <span id="ctl00_cphContentsArea_gvCompanyHoliday_ctl04_lblTitleChNldMonthUnit">月</span>
                                                        </td>
                                                        <td class="GridViewRowCenter">
                                                            <select name="ctl00$cphContentsArea$gvCompanyHoliday$ctl04$ddlChHldDay" tabindex="6" class="imeDisabled" id="ctl00_cphContentsArea_gvCompanyHoliday_ctl04_ddlChHldDay" style="width: 45px;">
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

                                                            </select>
                                                            <span id="ctl00_cphContentsArea_gvCompanyHoliday_ctl04_lblTitleChNldDayUnit">日</span>
                                                        </td>
                                                        <td class="GridViewRowLeft">
                                                            <input name="ctl00$cphContentsArea$gvCompanyHoliday$ctl04$txtChHldName" tabindex="6" class="imeOn" id="ctl00_cphContentsArea_gvCompanyHoliday_ctl04_txtChHldName" style="width: 170px;" onfocus="this.select();" type="text" maxlength="20" value="冬期休暇">
                                                            <br>
                                                            <span id="ctl00_cphContentsArea_gvCompanyHoliday_ctl04_cvChHldName" style="color: red; display: none;">ErrorMessage</span>
                                                            <span id="ctl00_cphContentsArea_gvCompanyHoliday_ctl04_cvChHldMonth" style="color: red; display: none;">ErrorMessage</span>
                                                        </td>
                                                        <td class="GridViewRowCenter">
                                                            <input name="ctl00$cphContentsArea$gvCompanyHoliday$ctl04$btnChDeleteRow" tabindex="6" class="ButtonStyle1" id="ctl00_cphContentsArea_gvCompanyHoliday_ctl04_btnChDeleteRow" onclick="javascript:__doPostBack('ctl00$cphContentsArea$gvCompanyHoliday$ctl04$btnChDeleteRow','')" type="button" value="削除">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="GridViewRowCenter">
                                                            <select name="ctl00$cphContentsArea$gvCompanyHoliday$ctl05$ddlChHldMonth" tabindex="6" class="imeDisabled" id="ctl00_cphContentsArea_gvCompanyHoliday_ctl05_ddlChHldMonth" style="width: 45px;" onchange="AddDropDownList('ctl00_cphContentsArea_gvCompanyHoliday_ctl05_ddlChHldMonth','ctl00_cphContentsArea_gvCompanyHoliday_ctl05_ddlChHldDay', 2021)">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option selected="selected" value="8">8</option>
                                                                <option value="9">9</option>
                                                                <option value="10">10</option>
                                                                <option value="11">11</option>
                                                                <option value="12">12</option>

                                                            </select>
                                                            <span id="ctl00_cphContentsArea_gvCompanyHoliday_ctl05_lblTitleChNldMonthUnit">月</span>
                                                        </td>
                                                        <td class="GridViewRowCenter">
                                                            <select name="ctl00$cphContentsArea$gvCompanyHoliday$ctl05$ddlChHldDay" tabindex="6" class="imeDisabled" id="ctl00_cphContentsArea_gvCompanyHoliday_ctl05_ddlChHldDay" style="width: 45px;">
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
                                                                <option selected="selected" value="15">15</option>
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

                                                            </select>
                                                            <span id="ctl00_cphContentsArea_gvCompanyHoliday_ctl05_lblTitleChNldDayUnit">日</span>
                                                        </td>
                                                        <td class="GridViewRowLeft">
                                                            <input name="ctl00$cphContentsArea$gvCompanyHoliday$ctl05$txtChHldName" tabindex="6" class="imeOn" id="ctl00_cphContentsArea_gvCompanyHoliday_ctl05_txtChHldName" style="width: 170px;" onfocus="this.select();" type="text" maxlength="20" value="夏季休暇">
                                                            <br>
                                                            <span id="ctl00_cphContentsArea_gvCompanyHoliday_ctl05_cvChHldName" style="color: red; display: none;">ErrorMessage</span>
                                                            <span id="ctl00_cphContentsArea_gvCompanyHoliday_ctl05_cvChHldMonth" style="color: red; display: none;">ErrorMessage</span>
                                                        </td>
                                                        <td class="GridViewRowCenter">
                                                            <input name="ctl00$cphContentsArea$gvCompanyHoliday$ctl05$btnChDeleteRow" tabindex="6" class="ButtonStyle1" id="ctl00_cphContentsArea_gvCompanyHoliday_ctl05_btnChDeleteRow" onclick="javascript:__doPostBack('ctl00$cphContentsArea$gvCompanyHoliday$ctl05$btnChDeleteRow','')" type="button" value="削除">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="GridViewRowCenter">
                                                            <select name="ctl00$cphContentsArea$gvCompanyHoliday$ctl06$ddlChHldMonth" tabindex="6" class="imeDisabled" id="ctl00_cphContentsArea_gvCompanyHoliday_ctl06_ddlChHldMonth" style="width: 45px;" onchange="AddDropDownList('ctl00_cphContentsArea_gvCompanyHoliday_ctl06_ddlChHldMonth','ctl00_cphContentsArea_gvCompanyHoliday_ctl06_ddlChHldDay', 2021)">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option selected="selected" value="8">8</option>
                                                                <option value="9">9</option>
                                                                <option value="10">10</option>
                                                                <option value="11">11</option>
                                                                <option value="12">12</option>

                                                            </select>
                                                            <span id="ctl00_cphContentsArea_gvCompanyHoliday_ctl06_lblTitleChNldMonthUnit">月</span>
                                                        </td>
                                                        <td class="GridViewRowCenter">
                                                            <select name="ctl00$cphContentsArea$gvCompanyHoliday$ctl06$ddlChHldDay" tabindex="6" class="imeDisabled" id="ctl00_cphContentsArea_gvCompanyHoliday_ctl06_ddlChHldDay" style="width: 45px;">
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
                                                                <option selected="selected" value="16">16</option>
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

                                                            </select>
                                                            <span id="ctl00_cphContentsArea_gvCompanyHoliday_ctl06_lblTitleChNldDayUnit">日</span>
                                                        </td>
                                                        <td class="GridViewRowLeft">
                                                            <input name="ctl00$cphContentsArea$gvCompanyHoliday$ctl06$txtChHldName" tabindex="6" class="imeOn" id="ctl00_cphContentsArea_gvCompanyHoliday_ctl06_txtChHldName" style="width: 170px;" onfocus="this.select();" type="text" maxlength="20" value="夏季休暇">
                                                            <br>
                                                            <span id="ctl00_cphContentsArea_gvCompanyHoliday_ctl06_cvChHldName" style="color: red; display: none;">ErrorMessage</span>
                                                            <span id="ctl00_cphContentsArea_gvCompanyHoliday_ctl06_cvChHldMonth" style="color: red; display: none;">ErrorMessage</span>
                                                        </td>
                                                        <td class="GridViewRowCenter">
                                                            <input name="ctl00$cphContentsArea$gvCompanyHoliday$ctl06$btnChDeleteRow" tabindex="6" class="ButtonStyle1" id="ctl00_cphContentsArea_gvCompanyHoliday_ctl06_btnChDeleteRow" onclick="javascript:__doPostBack('ctl00$cphContentsArea$gvCompanyHoliday$ctl06$btnChDeleteRow','')" type="button" value="削除">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="GridViewRowCenter">
                                                            <select name="ctl00$cphContentsArea$gvCompanyHoliday$ctl07$ddlChHldMonth" tabindex="6" class="imeDisabled" id="ctl00_cphContentsArea_gvCompanyHoliday_ctl07_ddlChHldMonth" style="width: 45px;" onchange="AddDropDownList('ctl00_cphContentsArea_gvCompanyHoliday_ctl07_ddlChHldMonth','ctl00_cphContentsArea_gvCompanyHoliday_ctl07_ddlChHldDay', 2021)">
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
                                                                <option selected="selected" value="12">12</option>

                                                            </select>
                                                            <span id="ctl00_cphContentsArea_gvCompanyHoliday_ctl07_lblTitleChNldMonthUnit">月</span>
                                                        </td>
                                                        <td class="GridViewRowCenter">
                                                            <select name="ctl00$cphContentsArea$gvCompanyHoliday$ctl07$ddlChHldDay" tabindex="6" class="imeDisabled" id="ctl00_cphContentsArea_gvCompanyHoliday_ctl07_ddlChHldDay" style="width: 45px;">
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
                                                                <option selected="selected" value="29">29</option>
                                                                <option value="30">30</option>
                                                                <option value="31">31</option>

                                                            </select>
                                                            <span id="ctl00_cphContentsArea_gvCompanyHoliday_ctl07_lblTitleChNldDayUnit">日</span>
                                                        </td>
                                                        <td class="GridViewRowLeft">
                                                            <input name="ctl00$cphContentsArea$gvCompanyHoliday$ctl07$txtChHldName" tabindex="6" class="imeOn" id="ctl00_cphContentsArea_gvCompanyHoliday_ctl07_txtChHldName" style="width: 170px;" onfocus="this.select();" type="text" maxlength="20" value="冬期休暇">
                                                            <br>
                                                            <span id="ctl00_cphContentsArea_gvCompanyHoliday_ctl07_cvChHldName" style="color: red; display: none;">ErrorMessage</span>
                                                            <span id="ctl00_cphContentsArea_gvCompanyHoliday_ctl07_cvChHldMonth" style="color: red; display: none;">ErrorMessage</span>
                                                        </td>
                                                        <td class="GridViewRowCenter">
                                                            <input name="ctl00$cphContentsArea$gvCompanyHoliday$ctl07$btnChDeleteRow" tabindex="6" class="ButtonStyle1" id="ctl00_cphContentsArea_gvCompanyHoliday_ctl07_btnChDeleteRow" onclick="javascript:__doPostBack('ctl00$cphContentsArea$gvCompanyHoliday$ctl07$btnChDeleteRow','')" type="button" value="削除">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="GridViewRowCenter">
                                                            <select name="ctl00$cphContentsArea$gvCompanyHoliday$ctl08$ddlChHldMonth" tabindex="6" class="imeDisabled" id="ctl00_cphContentsArea_gvCompanyHoliday_ctl08_ddlChHldMonth" style="width: 45px;" onchange="AddDropDownList('ctl00_cphContentsArea_gvCompanyHoliday_ctl08_ddlChHldMonth','ctl00_cphContentsArea_gvCompanyHoliday_ctl08_ddlChHldDay', 2021)">
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
                                                                <option selected="selected" value="12">12</option>

                                                            </select>
                                                            <span id="ctl00_cphContentsArea_gvCompanyHoliday_ctl08_lblTitleChNldMonthUnit">月</span>
                                                        </td>
                                                        <td class="GridViewRowCenter">
                                                            <select name="ctl00$cphContentsArea$gvCompanyHoliday$ctl08$ddlChHldDay" tabindex="6" class="imeDisabled" id="ctl00_cphContentsArea_gvCompanyHoliday_ctl08_ddlChHldDay" style="width: 45px;">
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
                                                                <option selected="selected" value="30">30</option>
                                                                <option value="31">31</option>

                                                            </select>
                                                            <span id="ctl00_cphContentsArea_gvCompanyHoliday_ctl08_lblTitleChNldDayUnit">日</span>
                                                        </td>
                                                        <td class="GridViewRowLeft">
                                                            <input name="ctl00$cphContentsArea$gvCompanyHoliday$ctl08$txtChHldName" tabindex="6" class="imeOn" id="ctl00_cphContentsArea_gvCompanyHoliday_ctl08_txtChHldName" style="width: 170px;" onfocus="this.select();" type="text" maxlength="20" value="冬期休暇">
                                                            <br>
                                                            <span id="ctl00_cphContentsArea_gvCompanyHoliday_ctl08_cvChHldName" style="color: red; display: none;">ErrorMessage</span>
                                                            <span id="ctl00_cphContentsArea_gvCompanyHoliday_ctl08_cvChHldMonth" style="color: red; display: none;">ErrorMessage</span>
                                                        </td>
                                                        <td class="GridViewRowCenter">
                                                            <input name="ctl00$cphContentsArea$gvCompanyHoliday$ctl08$btnChDeleteRow" tabindex="6" class="ButtonStyle1" id="ctl00_cphContentsArea_gvCompanyHoliday_ctl08_btnChDeleteRow" onclick="javascript:__doPostBack('ctl00$cphContentsArea$gvCompanyHoliday$ctl08$btnChDeleteRow','')" type="button" value="削除">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="GridViewRowCenter">
                                                            <select name="ctl00$cphContentsArea$gvCompanyHoliday$ctl09$ddlChHldMonth" tabindex="6" class="imeDisabled" id="ctl00_cphContentsArea_gvCompanyHoliday_ctl09_ddlChHldMonth" style="width: 45px;" onchange="AddDropDownList('ctl00_cphContentsArea_gvCompanyHoliday_ctl09_ddlChHldMonth','ctl00_cphContentsArea_gvCompanyHoliday_ctl09_ddlChHldDay', 2021)">
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
                                                                <option selected="selected" value="12">12</option>

                                                            </select>
                                                            <span id="ctl00_cphContentsArea_gvCompanyHoliday_ctl09_lblTitleChNldMonthUnit">月</span>
                                                        </td>
                                                        <td class="GridViewRowCenter">
                                                            <select name="ctl00$cphContentsArea$gvCompanyHoliday$ctl09$ddlChHldDay" tabindex="6" class="imeDisabled" id="ctl00_cphContentsArea_gvCompanyHoliday_ctl09_ddlChHldDay" style="width: 45px;">
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
                                                                <option selected="selected" value="31">31</option>

                                                            </select>
                                                            <span id="ctl00_cphContentsArea_gvCompanyHoliday_ctl09_lblTitleChNldDayUnit">日</span>
                                                        </td>
                                                        <td class="GridViewRowLeft">
                                                            <input name="ctl00$cphContentsArea$gvCompanyHoliday$ctl09$txtChHldName" tabindex="6" class="imeOn" id="ctl00_cphContentsArea_gvCompanyHoliday_ctl09_txtChHldName" style="width: 170px;" onfocus="this.select();" type="text" maxlength="20" value="冬期休暇">
                                                            <br>
                                                            <span id="ctl00_cphContentsArea_gvCompanyHoliday_ctl09_cvChHldName" style="color: red; display: none;">ErrorMessage</span>
                                                            <span id="ctl00_cphContentsArea_gvCompanyHoliday_ctl09_cvChHldMonth" style="color: red; display: none;">ErrorMessage</span>
                                                        </td>
                                                        <td class="GridViewRowCenter">
                                                            <input name="ctl00$cphContentsArea$gvCompanyHoliday$ctl09$btnChDeleteRow" tabindex="6" class="ButtonStyle1" id="ctl00_cphContentsArea_gvCompanyHoliday_ctl09_btnChDeleteRow" onclick="javascript:__doPostBack('ctl00$cphContentsArea$gvCompanyHoliday$ctl09$btnChDeleteRow','')" type="button" value="削除">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>

                                </div>
                            </div>

                            <div class="clearBoth"></div>
                        </div>

                        <div class="line"></div>

                        <p class="ButtonField1">
                            <input name="ctl00$cphContentsArea$btnUpdate" tabindex="7" id="ctl00_cphContentsArea_btnUpdate" onclick="if(confirm('更新します。よろしいですか?') ==  false){ return false;};WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$cphContentsArea$btnUpdate&quot;, &quot;&quot;, true, &quot;Update&quot;, &quot;&quot;, false, true))" type="button" value="更新">
                            <input name="ctl00$cphContentsArea$btnCancel" tabindex="8" id="ctl00_cphContentsArea_btnCancel" onclick="javascript:__doPostBack('ctl00$cphContentsArea$btnCancel','')" type="button" value="キャンセル">
                        </p>


                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection