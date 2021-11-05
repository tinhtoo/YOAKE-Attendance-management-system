<!-- 出退勤入力画面 -->
@section('details_edit')
<!-- detail -->
<div class="GridViewStyle1" id="gridview-container">
    <div class="GridViewPanelStyle1" id="data_edit">
        <div id="pnlWorkTime">
            <div>
                <table class="GridViewBorder GridViewRowCenter GridViewPadding" id="gvWorkTime" style="border-collapse: collapse;" border="1" rules="all" cellspacing="0">


                    <tbody id="gridview-warp2">
                            @isset($results)
                            
                            <tr>
                                <td style="width: 80px;">
                                    <span id="lblCaldDate" class="{{ $result->WORKPTN_CD == '002'?'text-danger':''}}" style="width: 80px; display: inline-block;">{{ date('Y/m/d', strtotime($result->CALD_DATE)) }}</span>
                                </td>
                                <td style="width: 30px;">
                                    <span id="lblDayOfWeek" class="{{ config('consts.weeks') == '土' && '日'?'text-danger':''}}" style="width: 30px; display: inline-block;">{{ config('consts.weeks')[date('w', strtotime($result->CALD_DATE))] }}</span>
                                </td>
                                <td>
                                    <!-- <input name="btnEdit" id="btnEdit" onclick="javascript:__doPostBack('btnEdit','')" type="button" value="編集"> -->
                                    <input name="ctl02$btnUpdate" id="btnUpdate" onclick="" type="button" value="更新">
                                    <input name="ctl02$btnCancel" id="btnCancel" onclick="javascript:__doPostBack('btnCancel','')" type="button" value="ｷｬﾝｾﾙ">
                                </td>


                                <td style="width: 150px;">
                                    <select name="ddlWorkPtn" id="ddlWorkPtn" style="width: 150px;" onchange="javascript:setTimeout('__doPostBack(\'ddlWorkPtn\',\'\')', 0)">
                                        @foreach ( $workptn_names as $workptn_name)
                                        <option value="{{ $workptn_name->WORKPTN_CD }}" class="{{ $workptn_name->WORK_CLS_CD == '00'?'text-danger':''}}" {{ $workptn_name->WORKPTN_NAME ==  $result->WORKPTN_NAME ? "selected" : "" }}>
                                            {{$workptn_name->WORKPTN_NAME }}
                                        </option>
                                        @endforeach
                                    </select>
                                </td>

                                <td style="width: 70px;">
                                    <select name="ddlReason" id="ddlReason" style="width: 70px;" onchange="javascript:setTimeout('__doPostBack(\'ddlReason\',\'\')', 0)">
                                        @foreach ($reason_names as $reason_name)
                                        <option value="{{ $reason_name->REASON_CD }}" class="{{ $reason_name->REASON_PTN_CD == '01'?'text-danger':''}} && {{ $reason_name->REASON_PTN_CD == '02'?'text-primary':''}}" {{ $reason_name->REASON_NAME ==  $result->REASON_NAME ? "selected" : "" }}>
                                            {{$reason_name->REASON_NAME }}
                                        </option>
                                        @endforeach

                                    </select>
                                </td>

                                <td style="white-space: nowrap;">

                                    <input name="txtOfcTime" class="imeDisabled" id="txtOfcTime" style="width: 40px;" type="text" maxlength="5" value="{{ $result->OFC_TIME }}">

                                </td>
                                <td style="white-space: nowrap;">

                                    <input name="txtLevTime" class="imeDisabled" id="txtLevTime" style="width: 40px;" type="text" maxlength="5" value="{{ $result->LEV_TIME }}">

                                </td>
                                <td style="white-space: nowrap;">

                                    <input name="txtIn1Time" class="imeDisabled" id="txtIn1Time" style="width: 40px;" type="text" maxlength="5" value="{{ $result->OUT1_TIME }}">

                                </td>
                                <td style="white-space: nowrap;">

                                    <input name="txtIn1Time" class="imeDisabled" id="txtIn1Time" style="width: 40px;" type="text" maxlength="5" value="{{ $result->IN1_TIME }}">

                                </td>
                                <td style="white-space: nowrap;">

                                    <input name="txtOut2Time" class="imeDisabled" id="txtOut2Time" style="width: 40px;" type="text" maxlength="5" value="{{ $result->OUT2_TIME }}">

                                </td>
                                <td style="white-space: nowrap;">

                                    <input name="txtIn2Time" class="imeDisabled" id="txtIn2Time" style="width: 40px;" type="text" maxlength="5" value="{{ $result->IN2_TIME }}">

                                </td>
                                <td style="white-space: nowrap;">

                                    <input name="txtWorkTime" class="imeDisabled" id="txtWorkTime" style="width: 40px;" type="text" maxlength="5" value="{{ $result->WORK_TIME }}">

                                </td>
                                <td style="white-space: nowrap;">

                                    <input name="txtTardTime" class="imeDisabled" id="txtTardTime" style="width: 40px;" type="text" maxlength="5" value="{{ $result->TARD_TIME }}">

                                </td>
                                <td style="white-space: nowrap;">

                                    <input name="txtLeaveTime" class="imeDisabled" id="txtLeaveTime" style="width: 40px;" type="text" maxlength="5" value="{{ $result->LEAVE_TIME }}">

                                </td>
                                <td style="white-space: nowrap;">

                                    <input name="txtOutTime" class="imeDisabled" id="txtOutTime" style="width: 40px;" type="text" maxlength="5" value="{{ $result->OUT_TIME }}">

                                </td>
                                <td style="white-space: nowrap;">

                                    <input name="txtOvtm1Time" class="imeDisabled" id="txtOvtm1Time" style="width: 40px;" type="text" maxlength="5" value="{{ $result->OVTM1_TIME }}">

                                </td>
                                <td style="white-space: nowrap;">

                                    <input name="txtOvtm2Time" class="imeDisabled" id="txtOvtm2Time" style="width: 40px;" type="text" maxlength="5" value="{{ $result->OVTM2_TIME }}">

                                </td>
                                <td style="white-space: nowrap;">

                                    <input name="txtOvtm3Time" class="imeDisabled" id="txtOvtm3Time" style="width: 40px;" type="text" maxlength="5" value="{{ $result->OVTM3_TIME }}">

                                </td>
                                <td style="white-space: nowrap;">

                                    <input name="txtOvtm4Time" class="imeDisabled" id="txtOvtm4Time" style="width: 40px;" type="text" maxlength="5" value="{{ $result->OVTM4_TIME }}">

                                </td>
                                <td style="white-space: nowrap;">

                                    <input name="txtOvtm5Time" class="imeDisabled" id="txtOvtm5Time" style="width: 40px;" type="text" maxlength="5" value="{{ $result->OVTM5_TIME }}">

                                </td>
                                <td style="white-space: nowrap;">

                                    <input name="txtOvtm6Time" class="imeDisabled" id="txtOvtm6Time" style="width: 40px;" type="text" maxlength="5" value="{{ $result->OVTM6_TIME }}">

                                </td>
                                <td style="white-space: nowrap;">

                                    <input name="txtExt1Time" class="imeDisabled" id="txtExt1Time" style="width: 40px;" type="text" maxlength="5" value="{{ $result->EXT1_TIME }}">

                                </td>
                                <td style="white-space: nowrap;">

                                    <input name="txtExt2Time" class="imeDisabled" id="txtExt2Time" style="width: 40px;" type="text" maxlength="5" value="{{ $result->EXT2_TIME }}">

                                </td>
                                <td style="white-space: nowrap;">

                                    <input name="txtExt3Time" class="imeDisabled" id="txtExt3Time" style="width: 40px;" type="text" maxlength="5" value="{{ $result->EXT3_TIME }}">

                                </td>
                                <td class="GridViewRowLeft" style="white-space: nowrap;">

                                    <input name="txtRemark" class="imeDisabled" id="txtRemark" style="width: 250px;" type="text" maxlength="" value="{{ $result->RSV1_TIME }}">

                                </td>
                            </tr>
                            
                            @endisset


                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
@endsection