<!-- 出退勤入力（部門別）画面 -->
@extends('menu.main')

@section('title','出退勤入力(部門別)')

@section('content')
<div id="contents-stage">
    <table>
        <tbody>
            <tr>
                <td>
                    <div id="UpdatePanel1">
                        <!-- header -->
                        <form action="" method="Post" id="form" >
                            {{ csrf_field() }}
                            <table class="InputFieldStyle1">
                                <tbody>
                                    <tr>
                                        <th>対象月度</th>
                                        <td>
                                            <select name="ddlTargetYear" tabindex="1" class="imeDisabled"
                                                id="ddlTargetYear" style="width: 70px;" disabled>
                                                <option>
                                                {{ session('year') }}
                                                </option>
                                            </select>
                                            &nbsp;年
                                            <select name="ddlTargetMonth" tabindex="2" class="imeDisabled"
                                                id="ddlTargetMonth" disabled>
                                                <option>
                                                {{ session('month') }}
                                                </option>
                                            </select>
                                            &nbsp;月
                                            <select name="ddlTargetDay" tabindex="3" class="imeDisabled"
                                                id="ddlTargetDay" disabled>
                                                <option>
                                                {{ session('day') }}
                                                </option>
                                            </select>
                                            &nbsp;日
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>部門</th>
                                        <td>
                                            <input name="txtDeptCd" 
                                                class="OutlineLabel"
                                                id="deptcd" 
                                                style="width: 80px;" 
                                                type="text"
                                                maxlength="10"
                                                value="{{ session('deptcd') }}"
                                                disabled
                                                >
                                            <input name="btnSearchDeptCd" class="SearchButton" id="btnSearchDeptCd" type="button" value="?" onclick="SearchDept();return false" disabled>
                                            <!-- <input class="SearchButton" type="button" id="MT12DeptSearch" onclick="SetDeptItem();" value="?"> -->
                                            <input class="OutlineLabel"
                                                name="deptname" 
                                                type="text"
                                                style="width: 200px; height: 17px; display: inline-block;" 
                                                id="deptname"
                                                value="{{ session()->get('deptname') }}"
                                                readonly="readonly"
                                                >
                                            <!-- @if ($errors->has('txtDeptCd'))
                                                <span class="alert-danger">{{ $errors->first('txtDeptCd') }}</span>
                                            @endif -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>開始所属</th>
                                        {{ session()->get('startcompany') }}
                                        <td>
                                            <select name="filter[ddlStartCompany]" tabindex="6" id="ddlStartCompany"
                                                style="width: 300px;" disabled>
                                                <option value=""></option>
                                                    @isset($haken_company)
                                                    @foreach ($haken_company as $companyName)
                                                        <option value="{{ $companyName->COMPANY_CD }}"
                                                            {{ old('filter.ddlStartCompany', !empty($filterData['ddlStartCompany']) ? $filterData['ddlStartCompany'] : '') == $companyName->COMPANY_CD ? 'selected' : '' }}>
                                                            {{ $companyName->COMPANY_ABR }}
                                                        </option>
                                                    @endforeach
                                                    @endisset
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>終了所属</th>
                                        <td>
                                            <select name="filter[ddlEndCompany]" tabindex="7" id="ddlEndCompany"
                                                style="width: 300px;" disabled>
                                                <option value=""></option>
                                                    @isset($haken_company)
                                                    @foreach ($haken_company as $companyName)
                                                        <option value="{{ $companyName->COMPANY_CD }}"
                                                            {{ old('filter.ddlEndCompany', !empty($filterData['ddlEndCompany']) ? $filterData['ddlEndCompany'] : '') == $companyName->COMPANY_CD ? 'selected' : '' }}>
                                                            {{ $companyName->COMPANY_ABR }}
                                                        </option>
                                                    @endforeach
                                                    @endisset
                                            </select>
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
                                            <input name="btnDisp" 
                                                class="ButtonStyle1 submit-form" 
                                                id="btnShow"
                                                type="button" 
                                                value="表示"
                                                data-url = "{{ route('wtde.search')}}"
                                                style="width: 80px;"
                                                disabled
                                            >
                                            <input 
                                                name="btnCancel2" 
                                                class="ButtonStyle1 submit-form" 
                                                id="btnCancel2"
                                                type="submit" 
                                                value="キャンセル"
                                                onclick="history.back();"
                                            >
                                            @if(!empty($results))
                                            <input 
                                                name="btnEdit" 
                                                id="btnUpdate" 
                                                type="button"
                                                value="更新" 
                                                class="submit-form" 
                                                data-url = "{{ route('wte.update')}}"
                                            >
                                            @endif
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

                            <!-- detail -->
                            <input name="hdnCvClientIdList" id="hdnCvClientIdList" type="hidden" value="">
                            <div class="GridViewStyle1" id="gridview-container">
                                <div class="GridViewPanelStyle1" style="width: 1084px;">
                                    <div id="pnlWorkTime">
                                        <div>
                                            <table class="GridViewBorder GridViewRowCenter GridViewPadding" id="gvWorkTime" style="border-collapse: collapse;" border="1" rules="all" cellspacing="0">
                                                <tbody id="gridview-warp">
                                                    @isset($results)
                                                        @if(count($results) < 1) 
                                                            <tr style="width:70px;">
                                                                <td><span>{{ $errMsg_4029 }}</span></td>
                                                            </tr>
                                                        @else
                                                            <tr>
                                                                <th scope="col"> 部門コード </th>
                                                                <th scope="col"> 部門名  </th>
                                                                <th scope="col"> 社員番号 </th>
                                                                <th scope="col"> 社員名 </th>
                                                                <th scope="col"> 勤務体系 </th>
                                                                <th scope="col"> 事由 </th>
                                                                <th scope="col"> 出勤 </th>
                                                                <th scope="col"> 退出 </th>
                                                                <th scope="col"> 外出1 </th>
                                                                <th scope="col"> 再入１ </th>
                                                                <th scope="col"> 外出２ </th>
                                                                <th scope="col"> 再入２ </th>
                                                                <th scope="col"> 出勤時間 </th>
                                                                <th scope="col"> 遅刻時間 </th>
                                                                <th scope="col"> 早退時間 </th>
                                                                <th scope="col"> 外出時間 </th>
                                                                <th scope="col"> 早出時間 </th>
                                                                <th scope="col"> 普通残業時間 </th>
                                                                <th scope="col"> 深夜残業時間 </th>
                                                                <th scope="col"> 休日残業時間 </th>
                                                                <th scope="col"> 休日深夜残業時間 </th>
                                                                <th scope="col"> </th>
                                                                <th scope="col"> 深夜割増 </th>
                                                                <th scope="col"> </th>
                                                                <th scope="col"> </th>
                                                                <th scope="col"> 備考 </th>
                                                            </tr>
                                                            @foreach($results as $i=>$result)
                                                                <tr>
                                                                    <td class="GridViewRowLeft">
                                                                        <span id="lblDeptCd" style="width: 80px; display: inline-block;">{{ $result->DEPT_CD }}</span>
                                                                        <input type="hidden" name="worktime[{{ $i }}][DEPT_CD]" value="{{ $result->DEPT_CD }}"/>
                                                                    </td>
                                                                    <td class="GridViewRowLeft">
                                                                        <span id="lblDeptName" style="width: 130px; display: inline-block;">{{ $result->DEPT_NAME }}</span>
                                                                        <input type="hidden" name="worktime[{{ $i }}][DEPT_NAME]" value="{{ $result->DEPT_NAME }}"/>
                                                                    </td>
                                                                    <td class="GridViewRowLeft">
                                                                        <span id="lblEmpCd" style="width: 80px; display: inline-block;">{{ $result->EMP_CD }}</span>
                                                                        <input type="hidden" name="worktime[{{ $i }}][EMP_CD]" value="{{ $result->EMP_CD }}"/>
                                                                    </td>
                                                                    <td class="GridViewRowLeft">
                                                                        <span id="lblEmpName" style="width: 130px; display: inline-block;">{{ $result->EMP_NAME }}</span>
                                                                        <input type="hidden" name="worktime[{{ $i }}][EMP_NAME]" value="{{ $result->EMP_NAME }}"/>
                                                                    </td>
                                                                    <td id="b" style="width: 150px;">
                                                                        <select 
                                                                            name="worktime[{{ $i }}][WORKPTN_CD]"
                                                                            style="width: 150px;" 
                                                                        >
                                                                            @foreach ( $workptn_names as $workptn_name)
                                                                                <option 
                                                                                    value="{{ $workptn_name->WORKPTN_CD }}" 
                                                                                    class="{{ $workptn_name->WORK_CLS_CD == '00'?'text-danger':''}}"
                                                                                    {{ $workptn_name->WORKPTN_NAME ==  $result->WORKPTN_NAME ? "selected" : "" }}
                                                                                >
                                                                                    {{$workptn_name->WORKPTN_NAME }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </td>
                                                                    <td id="b" style="width: 70px;">
                                                                        <select 
                                                                            name="worktime[{{ $i }}][REASON_CD]"
                                                                            style="width: 70px;"
                                                                        >
                                                                            @foreach ($reason_names as $reason_name)
                                                                                <option 
                                                                                    value="{{ $reason_name->REASON_CD }}" 
                                                                                    class="{{ $reason_name->REASON_PTN_CD == '01'?'text-danger':''}} {{ $reason_name->REASON_PTN_CD == '02'?'text-primary':''}}" 
                                                                                    {{ $reason_name->REASON_NAME ==  $result->REASON_NAME ? "selected" : "" }}
                                                                                >
                                                                                    {{ $reason_name->REASON_NAME }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </td>
                                                                    <td style="white-space: nowrap;">
                                                                        <input 
                                                                            name="worktime[{{ $i }}][OFC_TIME]" 
                                                                            class="imeDisabled" 
                                                                            style="width: 40px;" 
                                                                            type="text" 
                                                                            maxlength="5" 
                                                                            value="{{ $result->OFC_TIME }}"
                                                                        >
                                                                    </td>
                                                                    <td style="white-space: nowrap;">
                                                                        <input 
                                                                            name="worktime[{{ $i }}][LEV_TIME]" 
                                                                            class="imeDisabled" 
                                                                            style="width: 40px;" 
                                                                            type="text" 
                                                                            maxlength="5" 
                                                                            value="{{ $result->LEV_TIME }}"
                                                                        >
                                                                    </td>
                                                                    <td style="white-space: nowrap;">
                                                                        <input 
                                                                            name="worktime[{{ $i }}][OUT1_TIME]" 
                                                                            class="imeDisabled" 
                                                                            style="width: 40px;" 
                                                                            type="text" 
                                                                            maxlength="5" 
                                                                            value="{{ $result->OUT1_TIME }}"
                                                                        >
                                                                    </td>
                                                                    <td style="white-space: nowrap;">
                                                                        <input 
                                                                            name="worktime[{{ $i }}][IN1_TIME]" 
                                                                            class="imeDisabled" 
                                                                            style="width: 40px;" 
                                                                            type="text" 
                                                                            maxlength="5" 
                                                                            value="{{ $result->IN1_TIME }}"
                                                                        >
                                                                    </td>
                                                                    <td style="white-space: nowrap;">
                                                                        <input 
                                                                            name="worktime[{{ $i }}][OUT2_TIME]" 
                                                                            class="imeDisabled" 
                                                                            style="width: 40px;" 
                                                                            type="text" 
                                                                            maxlength="5" 
                                                                            value="{{ $result->OUT2_TIME }}"
                                                                        >
                                                                    </td>
                                                                    <td style="white-space: nowrap;">
                                                                        <input 
                                                                            name="worktime[{{ $i }}][IN2_TIME]" 
                                                                            class="imeDisabled" 
                                                                            style="width: 40px;" 
                                                                            type="text" 
                                                                            maxlength="5" 
                                                                            value="{{ $result->IN2_TIME }}"
                                                                        >
                                                                    </td>
                                                                    <td style="white-space: nowrap;">
                                                                        <input 
                                                                            name="worktime[{{ $i }}][WORK_TIME]" 
                                                                            class="imeDisabled" 
                                                                            style="width: 40px;" 
                                                                            type="text" 
                                                                            maxlength="5" 
                                                                            value="{{ $result->WORK_TIME }}"
                                                                        >
                                                                    </td>
                                                                    <td style="white-space: nowrap;">
                                                                        <input 
                                                                            name="worktime[{{ $i }}][TARD_TIME]" 
                                                                            class="imeDisabled" 
                                                                            style="width: 40px;" 
                                                                            type="text" 
                                                                            maxlength="5" 
                                                                            value="{{ $result->TARD_TIME }}"
                                                                        >
                                                                    </td>
                                                                    <td style="white-space: nowrap;">
                                                                        <input 
                                                                            name="worktime[{{ $i }}][LEAVE_TIME]" 
                                                                            class="imeDisabled" 
                                                                            style="width: 40px;" 
                                                                            type="text" 
                                                                            maxlength="5" 
                                                                            value="{{ $result->LEAVE_TIME }}"
                                                                        >
                                                                    </td>
                                                                    <td style="white-space: nowrap;">
                                                                        <input 
                                                                            name="worktime[{{ $i }}][OUT_TIME]" 
                                                                            class="imeDisabled" 
                                                                            style="width: 40px;" 
                                                                            type="text" 
                                                                            maxlength="5" 
                                                                            value="{{ $result->OUT_TIME }}"
                                                                        >
                                                                    </td>
                                                                    <td style="white-space: nowrap;">
                                                                        <input 
                                                                            name="worktime[{{ $i }}][OVTM1_TIME]" 
                                                                            class="imeDisabled" 
                                                                            style="width: 40px;" 
                                                                            type="text" 
                                                                            maxlength="5" 
                                                                            value="{{ $result->OVTM1_TIME }}"
                                                                        >
                                                                    </td>
                                                                    <td style="white-space: nowrap;">
                                                                        <input 
                                                                            name="worktime[{{ $i }}][OVTM2_TIME]" 
                                                                            class="imeDisabled" 
                                                                            id="txtOvtm2Time" 
                                                                            style="width: 40px;" 
                                                                            type="text" 
                                                                            maxlength="5" 
                                                                            value="{{ $result->OVTM2_TIME }}"
                                                                        >
                                                                    </td>
                                                                    <td style="white-space: nowrap;">
                                                                        <input 
                                                                            name="worktime[{{ $i }}][OVTM3_TIME]" 
                                                                            class="imeDisabled" 
                                                                            style="width: 40px;" 
                                                                            type="text" 
                                                                            maxlength="5" 
                                                                            value="{{ $result->OVTM3_TIME }}"
                                                                        >
                                                                    </td>
                                                                    <td style="white-space: nowrap;">
                                                                        <input 
                                                                            name="worktime[{{ $i }}][OVTM4_TIME]" 
                                                                            class="imeDisabled" 
                                                                            style="width: 40px;" 
                                                                            type="text" 
                                                                            maxlength="5" 
                                                                            value="{{ $result->OVTM4_TIME }}"
                                                                        >
                                                                    </td>
                                                                    <td style="white-space: nowrap;">
                                                                        <input 
                                                                            name="worktime[{{ $i }}][OVTM5_TIME]" 
                                                                            class="imeDisabled"
                                                                            style="width: 40px;" 
                                                                            type="text" 
                                                                            maxlength="5" 
                                                                            value="{{ $result->OVTM5_TIME }}"
                                                                        >
                                                                    </td>
                                                                    <td style="white-space: nowrap;">
                                                                        <input 
                                                                            name="worktime[{{ $i }}][OVTM6_TIME]" 
                                                                            class="imeDisabled" 
                                                                            style="width: 40px;" 
                                                                            type="text" 
                                                                            maxlength="5" 
                                                                            value="{{ $result->OVTM6_TIME }}"
                                                                        >
                                                                    </td>
                                                                    <td style="white-space: nowrap;">
                                                                        <input 
                                                                            name="worktime[{{ $i }}][EXT1_TIME]" 
                                                                            class="imeDisabled" 
                                                                            style="width: 40px;" 
                                                                            type="text" 
                                                                            maxlength="5" 
                                                                            value="{{ $result->EXT1_TIME }}"
                                                                        >
                                                                    </td>
                                                                    <td style="white-space: nowrap;">
                                                                        <input 
                                                                            name="worktime[{{ $i }}][EXT2_TIME]" 
                                                                            class="imeDisabled"
                                                                            style="width: 40px;"
                                                                            type="text" 
                                                                            maxlength="5" 
                                                                            value="{{ $result->EXT2_TIME }}"
                                                                        >
                                                                    </td>
                                                                    <td style="white-space: nowrap;">
                                                                        <input 
                                                                            name="worktime[{{ $i }}][EXT3_TIME]" 
                                                                            class="imeDisabled" 
                                                                            style="width: 40px;" 
                                                                            type="text" 
                                                                            maxlength="5" 
                                                                            value="{{ $result->EXT3_TIME }}"
                                                                        >
                                                                    </td>
                                                                    <td class="GridViewRowLeft" style="white-space: nowrap;">
                                                                        <input 
                                                                            name="worktime[{{ $i }}][RSV1_TIME]" 
                                                                            class="imeDisabled" 
                                                                            style="width: 250px;" 
                                                                            type="text" 
                                                                            maxlength="" 
                                                                            value="{{ $result->RSV1_TIME }}"
                                                                        >
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
                            </div>

                            <div>
                                <!-- ErrorMessage -->
                                <span id="lblErrMsg" style="color: red;"></span>
                            </div>

                            <br>
                            <!-- footer -->
                            <div class="line">
                                <hr>
                            </div>
                            <p class="ButtonField2">
                                <input name="btnCancel2" 
                                    class="ButtonStyle1 submit-form" 
                                    id="btnCancel2"
                                    type="button" value="キャンセル"
                                    data-url = "{{ route('wtde.cancel')}}"
                                    style="width: 80px;"
                                >
                            </p>
                        </form>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
@section('script')

<script>
    //ボタンクリック
    $(document).on('click', '.submit-form', function(){
        var url = $(this).data('url');
        $('#form').attr('action', url);
        $('#form').submit();
    });
</script>

@endsection