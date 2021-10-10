<!-- 出退勤入力画面 -->
@extends('menu.main')

@section('title','出退勤入力')

@section('content')
<div id="contents-stage">
    <table>
        <tbody>
            <tr>
                <td>
                    <div id="UpdatePanel1">
                        <!-- header -->

                        <form action="{{ route('wte.search')}}" method="POST">
                            <!-- @method('PUT') -->

                            {{ csrf_field() }}
                            <table class="InputFieldStyle1">
                                <tbody>
                                    <tr>
                                        <th>対象月度</th>
                                        <td>
                                            <select name="ddlTargetYear" tabindex="1" class="imeDisabled" id="ddlTargetYear" style="width: 70px;" onchange="SetTargetDate()">
                                                <option selected="" value="2020">2020</option>
                                                <option selected="" value="2021">2021</option>
                                                <option selected="" value="2022">2022</option>
                                            </select>
                                            &nbsp;年
                                            <input name="hdnTargetYear" id="hdnTargetYear" type="hidden" value="">
                                            <select name="ddlTargetMonth" tabindex="2" class="imeDisabled" id="ddlTargetMonth" onchange="SetTargetDate()">
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
                                            </select>
                                            &nbsp;月度
                                            <input name="hdnTargetMonth" id="hdnTargetMonth" type="hidden" value="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>社員番号</th>
                                        <td>
                                            <!-- <input name="txtEmpCd" tabindex="3" name="emp_no" class="imeDisabled" id="txtEmpCd" style="width: 80px;" onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;" onfocus="this.select();"  type="text" maxlength="10"> -->
                                            <input name="txtEmpCd" tabindex="3" class="imeDisabled" id="txtEmpCd" style="width: 80px;" type="text" maxlength="10" value = "{{ session('txtEmpCd')}}">
                                            <input name="btnSearchEmpCd" tabindex="4" class="SearchButton" id="btnSearchEmpCd" type="button" value="?">
                                            <span class="OutlineLabel" id="lblEmpName" style="width: 200px; height: 17px; display: inline-block;"></span>
                                            <!-- @if(session()->has('error'))
                                                <span class="alert-danger">{{ session('error') }}</span>
                                            @endif -->

                                            @if ($errors->has('txtEmpCd'))
                                                <span class="alert-danger">{{ $errors->first('txtEmpCd')  }}</span>
                                            @endif


                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th>部門</th>
                                        <td>
                                            <span class="OutlineLabel" id="lblDeptName" style="width: 200px; height: 17px; display: inline-block;"></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="line">
                                <hr>
                            </div>

                            <table>
                                <tbody>
                                    <tr>
                                        <td style="width: auto;">
                                            <!-- <input name="btnDisp" tabindex="7" class="ButtonStyle1"  type="submit" value="表示"> -->
                                            <!-- <input name="btnDisp" id="btnDisp" tabindex="7" class="ButtonStyle1" type="submit" value="表示"> -->
                                            <button type='submit' class="btn btn-primary" id='btnshow' name="btnDisp">表示button</button>
                                            <input name="btnCancel2" tabindex="8" class="ButtonStyle1" id="btnCancel2" onClick="window.parent.location.reload();window.close()" type="button" onClick="history.go(0)" value="キャンセル">
                                            &nbsp;
                                            <span id="lblNoStampColor" style="background-color: tomato;">　　　</span>
                                            <span id="lblNoStamp">未打刻</span>
                                            &nbsp;
                                            <span id="lblDbStampColor" style="background-color: lightskyblue;">　　　</span>
                                            <span id="lblDbStamp">二重打刻</span>
                                            &nbsp;
                                            <span class="font-style2" id="lblFixMsg"></span>
                                        </td>
                                        <td class="right">
                                            <span class="font-style1" id="lblDispCaldDate"></span>
                                            &nbsp;
                                            <span class="font-style1" id="lblDispOfcTime"></span>
                                            &nbsp;
                                            <span class="font-style1" id="lblDispLevTime"></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                        <!-- detail -->
                        <input name="hdnCvClientIdList" id="hdnCvClientIdList" type="hidden" value="cvOfcTime,cvLevTime,cvOut1Time,cvIn1Time,cvOut2Time,cvIn2Time,cvWorkTime,cvTardTime,cvLeaveTime,cvOutTime,cvOvtm1Time,cvOvtm2Time,cvOvtm3Time,cvOvtm4Time,cvOvtm5Time,cvOvtm6Time,cvExt1Time,cvExt2Time,cvExt3Time">
                        <div class="GridViewStyle1" id="gridview-container">
                            <div class="GridViewPanelStyle1" style="width: 1084px;">
                                <div id="pnlWorkTime">
                                    <div>
                                        <table class="GridViewBorder GridViewRowCenter GridViewPadding" id="gvWorkTime" style="border-collapse: collapse;" border="1" rules="all" cellspacing="0">
                                            <tbody id="gridview-warp" style="display: none;">
                                                <tr>
                                                    <th scope="col">
                                                        日付
                                                    </th>
                                                    <th scope="col">
                                                        曜日
                                                    </th>
                                                    <th scope="col">&nbsp;</th>
                                                    <th scope="col">
                                                        勤務体系
                                                    </th>
                                                    <th scope="col">
                                                        事由
                                                    </th>
                                                    <th scope="col">
                                                        出勤
                                                    </th>
                                                    <th scope="col">
                                                        退出
                                                    </th>
                                                    <th scope="col">
                                                        外出1
                                                    </th>
                                                    <th scope="col">
                                                        再入１
                                                    </th>
                                                    <th scope="col">
                                                        外出２
                                                    </th>
                                                    <th scope="col">
                                                        再入２
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
                                                    <th scope="col">
                                                        備考
                                                    </th>
                                                    <th scope="col">&nbsp;</th>
                                                </tr>


                                                <tr>
                                                    <td style="width: 80px;">
                                                        <span id="lblCaldDate" style="width: 80px; display: inline-block;"></span>
                                                    </td>
                                                    <td style="width: 30px;">
                                                        <span id="lblDayOfWeek" style="width: 30px; display: inline-block;">金</span>
                                                    </td>
                                                    <td>
                                                        <input name="gvWorkTime$ctl02$btnEdit" id="btnEdit" onclick="javascript:__doPostBack('gvWorkTime$ctl02$btnEdit','')" type="button" value="編集">
                                                    </td>
                                                    <td style="width: 150px;">
                                                        <span id="lblWorkPtnName" style="width: 150px; display: inline-block;">通常１(8-17)</span>
                                                    </td>
                                                    <td style="width: 70px;">
                                                        <span id="lblReasonName" style="width: 70px; display: inline-block;">通常</span>
                                                    </td>
                                                    <td style="white-space: nowrap;">
                                                        <span id="lblOfcTime" style="width: 40px; display: inline-block;"></span>
                                                    </td>
                                                    <td style="white-space: nowrap;">
                                                        <span id="lblLevTime" style="width: 40px; display: inline-block;"></span>
                                                    </td>
                                                    <td style="white-space: nowrap;">
                                                        <span id="lblOut1Time" style="width: 40px; display: inline-block;"></span>
                                                    </td>
                                                    <td style="white-space: nowrap;">
                                                        <span id="lblIn1Time" style="width: 40px; display: inline-block;"></span>
                                                    </td>
                                                    <td style="white-space: nowrap;">
                                                        <span id="lblOut2Time" style="width: 40px; display: inline-block;"></span>
                                                    </td>
                                                    <td style="white-space: nowrap;">
                                                        <span id="lblIn2Time" style="width: 40px; display: inline-block;"></span>
                                                    </td>
                                                    <td style="white-space: nowrap;">
                                                        <span id="lblWorkTime" style="width: 40px; display: inline-block;"></span>
                                                    </td>
                                                    <td style="white-space: nowrap;">
                                                        <span id="lblTardTime" style="width: 40px; display: inline-block;"></span>
                                                    </td>
                                                    <td style="white-space: nowrap;">
                                                        <span id="lblLeaveTime" style="width: 40px; display: inline-block;"></span>
                                                    </td>
                                                    <td style="white-space: nowrap;">
                                                        <span id="lblOutTime" style="width: 40px; display: inline-block;"></span>
                                                    </td>
                                                    <td style="white-space: nowrap;">
                                                        <span id="lblOvtm1Time" style="width: 40px; display: inline-block;"></span>
                                                    </td>
                                                    <td style="white-space: nowrap;">
                                                        <span id="lblOvtm2Time" style="width: 40px; display: inline-block;" autopostback="True" ontextchanged="WorkTimes_TextChanged"></span>
                                                    </td>
                                                    <td style="white-space: nowrap;">
                                                        <span id="lblOvtm3Time" style="width: 40px; display: inline-block;" autopostback="True" ontextchanged="WorkTimes_TextChanged"></span>
                                                    </td>
                                                    <td style="white-space: nowrap;">
                                                        <span id="lblOvtm4Time" style="width: 40px; display: inline-block;"></span>
                                                    </td>
                                                    <td style="white-space: nowrap;">
                                                        <span id="lblOvtm5Time" style="width: 40px; display: inline-block;"></span>
                                                    </td>
                                                    <td style="white-space: nowrap;">
                                                        <span id="lblOvtm6Time" style="width: 40px; display: inline-block;"></span>
                                                    </td>
                                                    <td style="white-space: nowrap;">
                                                        <span id="lblExt1Time" style="width: 40px; display: inline-block;"></span>
                                                    </td>
                                                    <td style="white-space: nowrap;">
                                                        <span id="lblExt2Time" style="width: 40px; display: inline-block;"></span>
                                                    </td>
                                                    <td style="white-space: nowrap;">
                                                        <span id="lblExt3Time" style="width: 40px; display: inline-block;"></span>
                                                    </td>
                                                    <td class="GridViewRowLeft" style="white-space: nowrap;">
                                                        <span id="lblRemark" style="width: 250px; display: inline-block;"></span>
                                                    </td>
                                                    <td>
                                                        <input name="gvWorkTime$ctl02$btnEdit2" id="btnEdit2" onclick="javascript:__doPostBack('gvWorkTime$ctl02$btnEdit2','')" type="button" value="編集">
                                                    </td>
                                                </tr>


                                                <!-- <tr>
                                                    <td colspan="26">
                                                        <div class="line"></div>
                                                        <ul class="HolizonListMenu1">
                                                            <li><a id="gvWorkTime_ctl19_LinkButton1" href="javascript:__doPostBack('gvWorkTime$ctl19$LinkButton1','')">前半</a></li>
                                                            <li><span>/</span></li>
                                                            <li><a id="gvWorkTime_ctl19_LinkButton2" href="javascript:__doPostBack('gvWorkTime$ctl19$LinkButton2','')">後半</a></li>
                                                        </ul>
                                                        <div class="clearBoth"></div>
                                                    </td>
                                                </tr> -->

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <!-- ErrorMessage -->
                            <span id="lblErrMsg" style="color: red;"></span>
                        </div>

                        <br>
                        <!-- footer -->
                        <div class="GridViewStyle3">
                            <table>
                                <tbody>
                                    <tr>
                                        <th>出勤</th>
                                        <th>休出</th>
                                        <th>特休</th>
                                        <th>有休</th>
                                        <th>欠勤</th>
                                        <th>代休</th>
                                        <!-- <td class="no-style" rowspan="2" colspan="5" type="hidden"></td> -->
                                    </tr>
                                    <tr>
                                        <td><span id="lblSumWorkdayCnt">　</span></td>
                                        <td><span id="lblSumHolworkCnt">　</span></td>
                                        <td><span id="lblSumSpcholCnt">　</span></td>
                                        <td><span id="lblSumPadholCnt">　</span></td>
                                        <td><span id="lblSumAbcworkCnt">　</span></td>
                                        <td><span id="lblSumCompdayCnt">　</span></td>
                                    </tr>
                                    <tr>
                                        <th>出勤時間</th>
                                        <th>遅刻時間</th>
                                        <th>早退時間</th>
                                        <th>外出時間</th>
                                        <th>早出時間</th>
                                        <th>普通残業時間</th>
                                        <th>深夜残業時間</th>
                                        <th>休日残業時間</th>
                                        <th>休日深夜残業時間</th>
                                        <th></th>
                                        <th>合計</th>
                                    </tr>
                                    <tr>
                                        <td><span id="lblSumWorkTime">　</span></td>
                                        <td><span id="lblSumTardTime">　</span></td>
                                        <td><span id="lblSumLeaveTime">　</span></td>
                                        <td><span id="lblSumOutTime">　</span></td>
                                        <td><span id="lblSumOvtm1Time">　</span></td>
                                        <td><span id="lblSumOvtm2Time">　</span></td>
                                        <td><span id="lblSumOvtm3Time">　</span></td>
                                        <td><span id="lblSumOvtm4Time">　</span></td>
                                        <td><span id="lblSumOvtm5Time">　</span></td>
                                        <td><span id="lblSumOvtm6Time">　</span></td>
                                        <td><span id="lblSumTimes">　</span></td>
                                    </tr>
                                    <tr>
                                        <th>深夜割増</th>
                                        <th></th>
                                        <th></th>
                                        <th>合計</th>
                                        <!-- <td class="no-style" rowspan="2" colspan="7"></td> -->
                                    </tr>
                                    <tr>
                                        <td><span id="lblSumExt1Time">　</span></td>
                                        <td><span id="lblSumExt2Time">　</span></td>
                                        <td><span id="lblSumExt3Time">　</span></td>
                                        <td><span id="lblSumExtTimes">　</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="line">
                            <hr>
                        </div>
                        <p class="ButtonField2">
                            <input name="btnCancel" tabindex="9" id="btnCancel" onclick="CloseSubWindow();__doPostBack('btnCancel','')" type="button" value="キャンセル">
                        </p>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection