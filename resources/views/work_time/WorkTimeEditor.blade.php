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
                        <form action="{{ route('wte.search')}}" method="post">
                            {{ csrf_field() }}
                            <table class="InputFieldStyle1">
                                <tbody>
                                    <tr>
                                        <th>対象月度</th>
                                        <td>
                                            <select name="ddlTargetYear" tabindex="1" class="imeDisabled" style="width: 70px;">
                                                @for($y=date('Y')-3;$y<=date('Y')+3;$y++) <option value="{{ $y }}" {{ old("ddlTargetYear", !empty($search_data["ddlTargetYear"]) ? $search_data["ddlTargetYear"]:"") == $y ? "selected" : "" }}>{{ $y }}</option>
                                                    @endfor
                                            </select>

                                            &nbsp;年

                                            <select name="ddlTargetMonth" tabindex="2" class="imeDisabled">
                                                @for($m=1;$m<=12;$m++) <option value="{{ $m }}" {{ old("ddlTargetMonth", !empty($search_data["ddlTargetMonth"]) ? $search_data["ddlTargetMonth"]:"") == $m ? "selected" : "" }}>{{ $m }}</option>
                                                    @endfor
                                            </select>
                                            &nbsp;月度
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>社員番号</th>
                                        <td>
                                            <!-- <input name="txtEmpCd" tabindex="3" name="emp_no" class="imeDisabled" id="txtEmpCd" style="width: 80px;" onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;" onfocus="this.select();"  type="text" maxlength="10"> -->
                                            <input name="txtEmpCd" tabindex="3" class="imeDisabled" id="txtEmpCd" style="width: 80px;" type="text" maxlength="10" value="{{ old('txtEmpCd', !empty($search_data['txtEmpCd'])?$search_data['txtEmpCd']:'') }}">
                                            <input name="btnSearchEmpCd" tabindex="4" class="SearchButton" id="btnSearchEmpCd" type="button" value="?">
                                            <span class="OutlineLabel" id="lblEmpName" style="width: 200px; height: 17px; display: inline-block;"></span>

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
                                            <input name="btnDisp" id="btnShow" 　tabindex="7" class="ButtonStyle1" type="submit" value="表示">
                                            <!-- <input name="btnDisp" id="btnDisp" tabindex="7" class="ButtonStyle1" type="submit" value="表示"> -->
                                            <!-- <button type="submit" class="ButtonStyle1" id="btnShow" name="btnDisp" tabindex="7">表示button</button> -->
                                            <input name="btnCancel2" tabindex="8" class="ButtonStyle1" id="btnCancel2" onClick="SetEmpItem()" type="button" value="キャンセル">

                                            <span id="btnEdit">
                                                <input name="btnEdit" id="btnEdit" onclick="javascript:__doPostBack('btnEdit','')" type="button" value="編集">
                                            </span>
                                            <span id="btnUpdate">
                                                <input name="btnEdit" id="btnUpdate" onclick="javascript:__doPostBack('btnEdit','')" type="button" value="更新" style="display: none;">
                                            </span>
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
                        <input name="hdnCvClientIdList" id="hdnCvClientIdList" type="hidden" value="">
                        <div class="GridViewStyle1" id="gridview-container">
                            <div class="GridViewPanelStyle1">
                                <div id="pnlWorkTime">
                                    <div>
                                        <table class="GridViewBorder GridViewRowCenter GridViewPadding" id="gvWorkTime" style="border-collapse: collapse;" border="1" rules="all" cellspacing="0">
                                            <tbody id="gridview-warp">
                                                @isset($results)
                                                @if(count($results) < 1) <tr style="width:70px;">
                                                    <td><span>{{ $messages }}</span></td>
                                                </tr>
                                                @else
                                                <tr>
                                                    <th scope="col">
                                                        日付
                                                    </th>
                                                    <th scope="col">
                                                        曜日
                                                    </th>
                                                    <!-- <th scope="col">&nbsp;</th> -->
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
                                                    <!-- <th scope="col">&nbsp;</th> -->
                                                </tr>

                                                @foreach($results as $result)
                                                <tr>
                                                    <td id="b" style="width: 80px;">
                                                        <span id="lblCaldDate" class="{{ $result->WORKPTN_CD == '002'?'text-danger':''}}" style="width: 80px; display: inline-block;">{{ date('Y/m/d', strtotime($result->CALD_DATE)) }}</span>
                                                    </td>
                                                    <td id="b" style="width: 30px;">
                                                        <span id="lblDayOfWeek" class="{{ config('consts.weeks') == '土' && '日'?'text-danger':''}}" style="width: 30px; display: inline-block;">{{ config('consts.weeks')[date('w', strtotime($result->CALD_DATE))] }}</span>
                                                    </td>
                                                    <!-- <td id="b">
                                                        <input name="btnEdit" id="btnEdit" onclick="javascript:__doPostBack('btnEdit','')" type="button" value="編集">
                                                    </td> -->
                                                    <td id="b" style="width: 150px;">
                                                        <span id="lblWorkPtnName" name="lblWorkPtnName" class="{{ $result->WORK_CLS_CD == '00'?'text-danger':''}}" style="width: 150px; display: inline-block;">{{ $result->WORKPTN_NAME }}</span>

                                                        <!-- <td id="a" style="width: 150px; display: none;">
                                                            <select name="ddlWorkPtn" id="ddlWorkPtn" style="width: 150px;" onchange="javascript:setTimeout('__doPostBack(\'ddlWorkPtn\',\'\')', 0)">
                                                                @foreach ( $workptn_names as $workptn_name)
                                                                <option value="{{ $workptn_name->WORKPTN_CD }}" class="{{ $workptn_name->WORK_CLS_CD == '00'?'text-danger':''}}" {{ $workptn_name->WORKPTN_NAME ==  $result->WORKPTN_NAME ? "selected" : "" }}>
                                                                    {{$workptn_name->WORKPTN_NAME }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </td> -->
                                                    </td>
                                                    <td id="b" style="width: 70px;">
                                                        <span id="lblReasonName" class="{{ $result->REASON_PTN_CD == '01'?'text-danger':''}} && {{ $result->REASON_PTN_CD == '02'?'text-primary':''}}" style="width: 70px; display: inline-block;">{{ $result->REASON_NAME }}</span>
                                                        <!-- <td id="a" style="width: 70px; display: none;">
                                                            <select name="ddlReason" id="ddlReason" style="width: 70px;" onchange="javascript:setTimeout('__doPostBack(\'ddlReason\',\'\')', 0)">
                                                                @foreach ($reason_names as $reason_name)
                                                                <option value="{{ $reason_name->REASON_CD }}" class="{{ $reason_name->REASON_PTN_CD == '01'?'text-danger':''}} && {{ $reason_name->REASON_PTN_CD == '02'?'text-primary':''}}" {{ $reason_name->REASON_NAME ==  $result->REASON_NAME ? "selected" : "" }}>
                                                                    {{$reason_name->REASON_NAME }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </td> -->
                                                    </td>
                                                    <td id="b" style="white-space: nowrap;">
                                                        <span id="lblOfcTime" style="width: 40px; display: inline-block;">{{ $result->OFC_TIME }}</span>
                                                        <!-- <td id="a" style="display: none;">
                                                                                                <input name="txtOfcTime" class="imeDisabled" id="txtOfcTime" style="width: 40px;" type="text" maxlength="5" value="{{ $result->OFC_TIME }}">
                                                                                            </td> -->
                                                    </td>
                                                    <td id="b" style="white-space: nowrap;">
                                                        <span id="lblLevTime" style="width: 40px; display: inline-block;">{{ $result->LEV_TIME }}</span>
                                                        <!-- <td id="a" style="display: none;">
                                                                                                <input name="txtLevTime" class="imeDisabled" id="txtLevTime" style="width: 40px;" type="text" maxlength="5" value="{{ $result->LEV_TIME }}">
                                                                                            </td> -->
                                                    </td>
                                                    <td id="b" style="white-space: nowrap;">
                                                        <span id="lblOut1Time" style="width: 40px; display: inline-block;">{{ $result->OUT1_TIME }}</span>
                                                        <!-- <td id="a" style="display: none;">
                                                                                                <input name="txtIn1Time" class="imeDisabled" id="txtIn1Time" style="width: 40px;" type="text" maxlength="5" value="{{ $result->OUT1_TIME }}">
                                                                                            </td> -->
                                                    </td>
                                                    <td id="b" style="white-space: nowrap;">
                                                        <span id="lblIn1Time" style="width: 40px; display: inline-block;">{{ $result->IN1_TIME }}</span>
                                                        <!-- <td id="a" style="display: none;">
                                                                                                <input name="txtIn1Time" class="imeDisabled" id="txtIn1Time" style="width: 40px;" type="text" maxlength="5" value="{{ $result->IN1_TIME }}">
                                                                                            </td> -->
                                                    </td>
                                                    <td id="b" style="white-space: nowrap;">
                                                        <span id="lblOut2Time" style="width: 40px; display: inline-block;">{{ $result->OUT2_TIME }}</span>
                                                        <!-- <td id="a" style="display: none;">
                                                                                                <input name="txtOut2Time" class="imeDisabled" id="txtOut2Time" style="width: 40px;" type="text" maxlength="5" value="{{ $result->OUT2_TIME }}">
                                                                                            </td> -->
                                                    </td>
                                                    <td id="b" style="white-space: nowrap;">
                                                        <span id="lblIn2Time" style="width: 40px; display: inline-block;">{{ $result->IN2_TIME }}</span>
                                                        <!-- <td id="a" style="display: none;">
                                                                                                <input name="txtIn2Time" class="imeDisabled" id="txtIn2Time" style="width: 40px;" type="text" maxlength="5" value="{{ $result->IN2_TIME }}">
                                                                                            </td> -->
                                                    </td>
                                                    <td id="b" style="white-space: nowrap;">
                                                        <span id="lblWorkTime" style="width: 40px; display: inline-block;">{{ $result->WORK_TIME }}</span>
                                                        <!-- <td id="a" style="display: none;">
                                                                                                <input name="txtWorkTime" class="imeDisabled" id="txtWorkTime" style="width: 40px;" type="text" maxlength="5" value="{{ $result->WORK_TIME }}">
                                                                                            </td> -->
                                                    </td>
                                                    <td id="b" style="white-space: nowrap;">
                                                        <span id="lblTardTime" style="width: 40px; display: inline-block;">{{ $result->TARD_TIME }}</span>
                                                        <!-- <td id="a" style="display: none;">
                                                                                                <input name="txtTardTime" class="imeDisabled" id="txtTardTime" style="width: 40px;" type="text" maxlength="5" value="{{ $result->TARD_TIME }}">
                                                                                            </td> -->
                                                    </td>
                                                    <td id="b" style="white-space: nowrap;">
                                                        <span id="lblLeaveTime" style="width: 40px; display: inline-block;">{{ $result->LEAVE_TIME }}</span>
                                                        <!-- <td id="a" style="display: none;">
                                                                                                <input name="txtLeaveTime" class="imeDisabled" id="txtLeaveTime" style="width: 40px;" type="text" maxlength="5" value="{{ $result->LEAVE_TIME }}">
                                                                                            </td> -->
                                                    </td>
                                                    <td id="b" style="white-space: nowrap;">
                                                        <span id="lblOutTime" style="width: 40px; display: inline-block;">{{ $result->OUT_TIME }}</span>
                                                        <!-- <td id="a" style="display: none;">
                                                                                                <input name="txtOutTime" class="imeDisabled" id="txtOutTime" style="width: 40px;" type="text" maxlength="5" value="{{ $result->OUT_TIME }}">
                                                                                            </td> -->
                                                    </td>
                                                    <td id="b" style="white-space: nowrap;">
                                                        <span id="lblOvtm1Time" style="width: 40px; display: inline-block;">{{ $result->OVTM1_TIME }}</span>
                                                        <!-- <td id="a" style="display: none;">
                                                                                                <input name="txtOvtm1Time" class="imeDisabled" id="txtOvtm1Time" style="width: 40px;" type="text" maxlength="5" value="{{ $result->OVTM1_TIME }}">
                                                                                            </td> -->
                                                    </td>
                                                    <td id="b" style="white-space: nowrap;">
                                                        <span id="lblOvtm2Time" style="width: 40px; display: inline-block;" autopostback="True" ontextchanged="WorkTimes_TextChanged">{{ $result->OVTM2_TIME }}</span>
                                                        <!-- <td id="a" style="display: none;">
                                                                                                <input name="txtOvtm2Time" class="imeDisabled" id="txtOvtm2Time" style="width: 40px;" type="text" maxlength="5" value="{{ $result->OVTM2_TIME }}">
                                                                                            </td> -->
                                                    </td>
                                                    <td id="b" style="white-space: nowrap;">
                                                        <span id="lblOvtm3Time" style="width: 40px; display: inline-block;" autopostback="True" ontextchanged="WorkTimes_TextChanged">{{ $result->OVTM3_TIME }}</span>
                                                        <!-- <td id="a" style="display: none;">
                                                                                                <input name="txtOvtm3Time" class="imeDisabled" id="txtOvtm3Time" style="width: 40px;" type="text" maxlength="5" value="{{ $result->OVTM3_TIME }}">
                                                                                            </td> -->
                                                    </td>
                                                    <td id="b" style="white-space: nowrap;">
                                                        <span id="lblOvtm4Time" style="width: 40px; display: inline-block;">{{ $result->OVTM4_TIME }}</span>
                                                        <!-- <td id="a" style="display: none;">
                                                                                                <input name="txtOvtm4Time" class="imeDisabled" id="txtOvtm4Time" style="width: 40px;" type="text" maxlength="5" value="{{ $result->OVTM4_TIME }}">
                                                                                            </td> -->
                                                    </td>
                                                    <td id="b" style="white-space: nowrap;">
                                                        <span id="lblOvtm5Time" style="width: 40px; display: inline-block;">{{ $result->OVTM5_TIME }}</span>
                                                        <!-- <td id="a" style="display: none;">
                                                                                                <input name="txtOvtm5Time" class="imeDisabled" id="txtOvtm5Time" style="width: 40px;" type="text" maxlength="5" value="{{ $result->OVTM5_TIME }}">
                                                                                            </td> -->
                                                    </td>
                                                    <td id="b" style="white-space: nowrap;">
                                                        <span id="lblOvtm6Time" style="width: 40px; display: inline-block;">{{ $result->OVTM6_TIME }}</span>
                                                        <!-- <td id="a" style="display: none;">
                                                                                                <input name="txtOvtm6Time" class="imeDisabled" id="txtOvtm6Time" style="width: 40px;" type="text" maxlength="5" value="{{ $result->OVTM6_TIME }}">
                                                                                            </td> -->
                                                    </td>
                                                    <td id="b" style="white-space: nowrap;">
                                                        <span id="lblExt1Time" style="width: 40px; display: inline-block;">{{ $result->EXT1_TIME }}</span>
                                                        <!-- <td id="a" style="display: none;">
                                                                                                <input name="txtExt1Time" class="imeDisabled" id="txtExt1Time" style="width: 40px;" type="text" maxlength="5" value="{{ $result->EXT1_TIME }}">
                                                                                            </td> -->
                                                    </td>
                                                    <td id="b" style="white-space: nowrap;">
                                                        <span id="lblExt2Time" style="width: 40px; display: inline-block;">{{ $result->EXT2_TIME }}</span>
                                                        <!-- <td id="a" style="display: none;">
                                                                                                <input name="txtExt2Time" class="imeDisabled" id="txtExt2Time" style="width: 40px;" type="text" maxlength="5" value="{{ $result->EXT2_TIME }}">
                                                                                            </td> -->
                                                    </td>
                                                    <td id="b" style="white-space: nowrap;">
                                                        <span id="lblExt3Time" style="width: 40px; display: inline-block;">{{ $result->EXT3_TIME }}</span>
                                                        <!-- <td id="a" style="display: none;">
                                                                                                <input name="txtExt3Time" class="imeDisabled" id="txtExt3Time" style="width: 40px;" type="text" maxlength="5" value="{{ $result->EXT3_TIME }}">
                                                                                            </td> -->
                                                    </td>
                                                    <td id="b" class="GridViewRowLeft" style="white-space: nowrap;">
                                                        <span id="lblRemark" style="width: 250px; display: inline-block;">{{ $result->RSV1_TIME }}</span>
                                                        <!-- <td id="a" style="display: none;">
                                                                                                <input name="txtRemark" class="imeDisabled" id="txtRemark" style="width: 250px;" type="text" maxlength="" value="{{ $result->RSV1_TIME }}">
                                                                                            </td> -->
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
                                    @section('script')

                                    <script>
                                        //キャンセルボタンクリック
                                        function SetEmpItem() {
                                            $("#gridview-warp").empty();
                                        }
                                    </script>

                                    @endsection