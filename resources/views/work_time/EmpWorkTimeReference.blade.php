<!-- 勤務状況照会(管理者用)   -->
@extends('menu.main')

@section('title','勤務状況照会(管理者用) ')

@section('content')
<div id="contents-stage">
    <table>
        <tbody>
            <tr>
                <td>

                    <div id="UpdatePanel1">


                        <!-- header -->
                        <form action="{{ route('emp.search')}}" method="post">

                            {{ csrf_field() }}
                            <table class="InputFieldStyle1">
                                <tbody>
                                    <tr>
                                        <th>対象月度</th>
                                        <td>
                                            <select name="ddlTargetYear" tabindex="1" class="imeDisabled" id="ddlTargetYear" style="width: 70px;" onchange="SetTargetDate()">
                                                <option value="2020">2020</option>
                                                <option selected="selected" value="2021">2021</option>
                                                <option value="2022">2022</option>

                                            </select>
                                            &nbsp;年
                                            <input name="hdnTargetYear" id="hdnTargetYear" type="hidden" value="2021">
                                            <select name="ddlTargetMonth" tabindex="2" class="imeDisabled" id="ddlTargetMonth" onchange="SetTargetDate()">
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
                                            &nbsp;月度
                                            <input name="hdnTargetMonth" id="hdnTargetMonth" type="hidden" value="5">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="InputFieldStyle1">
                                <tbody>
                                    <tr>
                                        <th>表示区分</th>
                                        <td>
                                            <div class="GroupBox1">
                                                <input name="SearchCondition" tabindex="3" id="rbSearchDept" type="radio" checked="checked" value="rbSearchDept"><label for="rbSearchDept">部門</label>
                                                <input name="SearchCondition" tabindex="4" id="rbSearchEmp" onclick="" type="radio" value="rbSearchEmp" class="rbSearchEmp"><label for="rbSearchEmp">社員</label>
                                                <div class="clearBoth"></div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="InputFieldStyle1">
                                <tbody>
                                    <tr>
                                        <th>締日</th>
                                        <td>
                                            <select name="ddlClosingDate" tabindex="5" id="ddlClosingDate" style="width: 150px;">
                                                <option selected="selected" value="15">１５日締</option>
                                                <option value="25">２５日締</option>
                                                <option value="31">末締</option>

                                            </select>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="InputFieldStyle1">
                                <tbody>
                                    <tr>
                                        <th>部門</th>
                                        <td>
                                            <input name="txtDeptCd" tabindex="6" class="imeDisabled" id="txtDeptCd" style="width: 50px;" onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;" onfocus="this.select();" onchange="javascript:setTimeout('__doPostBack(\'txtDeptCd\',\'\')', 0)" type="text" maxlength="6">
                                            <input name="btnSearchDeptCd" tabindex="7" class="SearchButton" id="btnSearchDeptCd" onclick="SetDeptItem();__doPostBack('btnSearchDeptCd','')" type="button" value="?">
                                            <span class="OutlineLabel" id="lblDeptName" style="width: 200px; height: 17px; display: inline-block;"></span>

                                            @if ($errors->has('txtDeptCd'))
                                            <span class="alert-danger">{{ $errors->first('txtDeptCd') }}</span>
                                            @endif

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="InputFieldStyle1">
                                <tbody>
                                    <tr>
                                        <th>開始所属</th>
                                        <td>
                                            <select name="ddlStartCompany" tabindex="8" id="ddlStartCompany" style="width: 300px;">
                                                <option selected="selected" value=""></option>
                                                <option value="001">A派遣</option>
                                                <option value="002">B派遣</option>
                                                <option value="003">C派遣</option>

                                            </select>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="InputFieldStyle1">
                                <tbody>
                                    <tr>
                                        <th>終了所属</th>
                                        <td>
                                            <select name="ddlEndCompany" tabindex="9" id="ddlEndCompany" style="width: 300px;">
                                                <option selected="selected" value=""></option>
                                                <option value="001">A派遣</option>
                                                <option value="002">B派遣</option>
                                                <option value="003">C派遣</option>

                                            </select>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="InputFieldStyle1">
                                <tbody>
                                    <tr>
                                        <th>社員番号</th>
                                        <td>
                                            <input name="txtEmpCd" tabindex="10" class="imeDisabled" id="txtEmpCd" style="width: 80px;" onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;" onfocus="this.select();" onchange="javascript:setTimeout('__doPostBack(\'txtEmpCd\',\'\')', 0)" type="text" maxlength="10">
                                            <input name="btnSearchEmpCd" tabindex="11" class="SearchButton" id="btnSearchEmpCd" type="button" value="?">
                                            <span class="OutlineLabel" id="lblEmpName" style="width: 200px; height: 17px; display: inline-block;"></span>

                                            @if ($errors->has('txtEmpCd'))
                                            <span class="alert-danger">{{ $errors->first('txtEmpCd') }}</span>
                                            @endif

                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="line"></div>

                            <p>
                                <!-- <input name="btnDisp" tabindex="12" class="ButtonStyle1" id="btnDisp" onclick='' type="button" value="表示"> -->
                                <button type="submit" class="ButtonStyle1" id="btnShow" name="btnDisp" tabindex="7">表示button</button>
                                <input name="btnCancel2" tabindex="13" class="ButtonStyle1" id="btnCancel2" onclick="CloseSubWindow();__doPostBack('btnCancel2','')" type="button" value="キャンセル">
                                &nbsp;
                                <span class="font-style2" id="lblFixMsg"></span>
                            </p>
                        </form>
                        <!-- detail -->
                        <div class="GridViewStyle1" id="gridview-container">
                            <div class="GridViewPanelStyle1" id="pnlEmpWorkTime" style="width: 911px;">

                                <div>
                                    <table class="GridViewBorder GridViewPadding GridViewRowCenter GridViewRowCut" id="gvEmpWorkTime" style="border-collapse: collapse;" border="1" rules="all" cellspacing="0">
                                        <tbody>
                                            @isset($results)
                                            @if(count($results) < 1) <tr style="width:70px;">
                                                <td><span>{{ $messages }}</span></td>
                                            </tr>
                                            @else
                                            <tr>
                                                <th scope="col">
                                                    部門コード
                                                </th>
                                                <th scope="col">
                                                    部門名
                                                </th>
                                                <th scope="col">
                                                    社員番号
                                                </th>
                                                <th scope="col">
                                                    社員名
                                                </th>
                                                <th scope="col">
                                                    カレンダー名称
                                                </th>
                                                <th scope="col">
                                                    出勤
                                                </th>
                                                <th scope="col">
                                                    休出
                                                </th>
                                                <th scope="col">
                                                    特休
                                                </th>
                                                <th scope="col">
                                                    有休
                                                </th>
                                                <th scope="col">
                                                    欠勤
                                                </th>
                                                <th scope="col">
                                                    代休
                                                </th>
                                                <th scope="col">
                                                    出勤時間
                                                </th>
                                                <th scope="col">
                                                    遅刻時間
                                                </th>
                                                <th scope="col">
                                                    早退時間
                                                </th>
                                                <th scope="col">
                                                    外出時間
                                                </th>
                                                <th scope="col">早出時間</th>
                                                <th scope="col">普通残業時間</th>
                                                <th scope="col">深夜残業時間</th>
                                                <th scope="col">休日残業時間</th>
                                                <th scope="col">休日深夜残業時間</th>
                                                <th scope="col"></th>
                                                <th scope="col">深夜割増</th>
                                                <th scope="col"></th>
                                                <th scope="col"></th>
                                            </tr>
                                            @foreach($results as $result)
                                            <tr>
                                                <td class="GridViewRowLeft">
                                                    <span id="lblDeptCd" style="width: 80px; display: inline-block;">{{ date('Y/m/d', strtotime($result->CALD_DATE)) }}</span>
                                                </td>
                                                <td class="GridViewRowLeft">
                                                    <span id="lblDeptName" style="width: 130px; display: inline-block;">営業部</span>
                                                </td>
                                                <td class="GridViewRowLeft">
                                                    <span id="lblEmpCd" style="width: 80px; display: inline-block;">001</span>
                                                </td>
                                                <td class="GridViewRowLeft">
                                                    <span id="lblEmpName" style="width: 130px; display: inline-block;">佐藤　明</span>
                                                </td>
                                                <td class="GridViewRowLeft">
                                                    <span id="lblCalendarName" style="width: 150px; display: inline-block;">通常１(8:00～17:00)</span>
                                                </td>
                                                <td>
                                                    <span id="lblSumWorkdayCnt" style="width: 50px; display: inline-block;">4.0</span>
                                                </td>
                                                <td>
                                                    <span id="lblSumHolworkCnt" style="width: 50px; display: inline-block;">0.0</span>
                                                </td>
                                                <td>
                                                    <span id="lblSumSpcholCnt" style="width: 50px; display: inline-block;">0.0</span>
                                                </td>
                                                <td>
                                                    <span id="lblSumPadholCnt" style="width: 50px; display: inline-block;">1.0</span>
                                                </td>
                                                <td>
                                                    <span id="lblSumAbcdCnt" style="width: 50px; display: inline-block;">0.0</span>
                                                </td>
                                                <td>
                                                    <span id="lblSumCompdayCnt" style="width: 50px; display: inline-block;">0.0</span>
                                                </td>
                                                <td>
                                                    <span id="lblSumWorkTime" style="width: 60px; display: inline-block;">30:00</span>
                                                </td>
                                                <td>
                                                    <span id="lblSumTardTime" style="width: 60px; display: inline-block;">0:30</span>
                                                </td>
                                                <td>
                                                    <span id="lblSumLeaveTime" style="width: 60px; display: inline-block;">0:00</span>
                                                </td>
                                                <td>
                                                    <span id="lblSumOutTime" style="width: 60px; display: inline-block;">1:30</span>
                                                </td>
                                                <td>
                                                    <span id="lblSumOvtm1Time" style="width: 60px; display: inline-block;">0:30</span>
                                                </td>
                                                <td>
                                                    <span id="lblSumOvtm2Time" style="width: 60px; display: inline-block;">12:00</span>
                                                </td>
                                                <td>
                                                    <span id="lblSumOvtm3Time" style="width: 60px; display: inline-block;">1:00</span>
                                                </td>
                                                <td>
                                                    <span id="lblSumOvtm4Time" style="width: 60px; display: inline-block;">0:00</span>
                                                </td>
                                                <td>
                                                    <span id="lblSumOvtm5Time" style="width: 60px; display: inline-block;">0:00</span>
                                                </td>
                                                <td>
                                                    <span id="lblSumOvtm6Time" style="width: 60px; display: inline-block;">0:00</span>
                                                </td>
                                                <td>
                                                    <span id="lblSumExt1Time" style="width: 60px; display: inline-block;">0:00</span>
                                                </td>
                                                <td>
                                                    <span id="lblSumExt2Time" style="width: 60px; display: inline-block;">0:00</span>
                                                </td>
                                                <td>
                                                    <span id="lblSumExt3Time" style="width: 60px; display: inline-block;">0:00</span>
                                                </td>
                                            </tr>
                                            @endforeach

                                            @endif

                                            @endisset

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>

                        <!-- footer -->
                        <div class="line"></div>
                        <p class="ButtonField2">
                            <input name="btnCancel" tabindex="14" id="btnCancel" onclick="CloseSubWindow();__doPostBack('btnCancel','')" type="button" value="キャンセル">
                        </p>


                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection