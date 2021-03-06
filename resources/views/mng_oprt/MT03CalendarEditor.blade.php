<!-- カレンダー情報入力画面 -->
@extends('menu.main')
@section('title','カレンダー情報入力')
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
                                        <th>カレンダー</th>
                                        <td>
                                            <select name="ctl00$cphContentsArea$ddlCalendar" tabindex="1"
                                                id="ctl00_cphContentsArea_ddlCalendar" style="width: 280px;">
                                                <option selected="selected" value="001">通常１(8:00～17:00)</option>
                                                <option value="002">通常2(7:00～16:00)</option>
                                                <option value="003">通常3(9:00～1800)</option>
                                                <option value="010">夜勤Ⅰ(20:00～29:00)</option>
                                                <option value="011">夜勤Ⅱ(16:00～25:00)</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>対象月度</th>
                                        <td>
                                            <select name="ctl00$cphContentsArea$ddlCaldYear" tabindex="2"
                                                class="imeDisabled" id="ctl00_cphContentsArea_ddlCaldYear"
                                                style="width: 70px;">
                                                <option value="2020">2020</option>
                                                <option selected="selected" value="2021">2021</option>
                                                <option value="2022">2022</option>

                                            </select>
                                            &nbsp;
                                            年
                                            &nbsp;
                                            <select name="ctl00$cphContentsArea$ddlCaldMonth" tabindex="3"
                                                class="imeDisabled" id="ctl00_cphContentsArea_ddlCaldMonth"
                                                style="width: 50px;">
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
                                            &nbsp;
                                            月度
                                            &nbsp;
                                            <span id="ctl00_cphContentsArea_cvCaldYear"
                                                style="color: red; display: none;">ErrorMessage</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>締日</th>
                                        <td>
                                            <select name="ctl00$cphContentsArea$ddlClosingDate" tabindex="4"
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



                            <div class="line"></div>

                            <p>
                                <input name="ctl00$cphContentsArea$btnDisp" tabindex="5" class="ButtonStyle1"
                                    id="ctl00_cphContentsArea_btnDisp"
                                    onclick='javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions("ctl00$cphContentsArea$btnDisp", "", true, "Search", "", false, true))'
                                    type="button" value="表示">
                                <input name="ctl00$cphContentsArea$btnUpdate" tabindex="6" disabled="disabled"
                                    class="ButtonStyle1" id="ctl00_cphContentsArea_btnUpdate" type="button" value="更新">
                                <input name="ctl00$cphContentsArea$btnCancel2" tabindex="7" class="ButtonStyle1"
                                    id="ctl00_cphContentsArea_btnCancel2"
                                    onclick="javascript:__doPostBack('ctl00$cphContentsArea$btnCancel2','')" type="button"
                                    value="キャンセル">
                                <input name="ctl00$cphContentsArea$btnDelete" tabindex="8" disabled="disabled"
                                    class="ButtonStyle1" id="ctl00_cphContentsArea_btnDelete" type="button" value="削除">
                            </p>



                            <div class="GridViewStyle1 GridViewPanelStyle2">
                                <div class="flow">

                                    <div>

                                    </div>
                                </div>

                                <div class="flow">

                                    <div>

                                    </div>
                                </div>
                                <div class="clearBoth"></div>
                            </div>

                            <div class="line"></div>
                            <p class="ButtonField2">
                                <input name="ctl00$cphContentsArea$btnCancel" tabindex="13"
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
