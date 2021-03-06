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
                        <form action="" method="POST" id="form" >
                            {{ csrf_field() }}
                            <table class="InputFieldStyle1">
                                <tbody>
                                    <tr>
                                        <th>対象月度</th>
                                        <!-- 2022/03/07 追加 ティン Start -->
                                        <td>
                                            <input name="ddlDate" 
                                            id="YearMonth" 
                                            class="imeDisabled" 
                                            type="text"
                                            autocomplete="off"
                                            value="{{ old('ddlDate', !empty($inputSearchData['ddlDate']) ? $inputSearchData['ddlDate']: date('Y年m月d日') ) }}"
                                            />
                                        </td>
                                        <!-- 2022/03/07 追加 ティン End -->
                                        <!-- 2022/03/07 削除 ティン Start -->
                                        <!-- <td>
                                            <select name="ddlTargetYear" tabindex="1" class="imeDisabled"
                                                id="ddlTargetYear" style="width: 70px;">
                                                @for ($year = date('Y') - 3; $year <= date('Y') + 3; $year++)
                                                    <option value="{{ $year }}"
                                                        {{ old('ddlTargetYear', !empty($inputSearchData['ddlTargetYear']) ? $inputSearchData['ddlTargetYear'] : date('Y')) == $year ? 'selected' : '' }}>
                                                        {{ $year }}
                                                    </option>
                                                @endfor
                                            </select>
                                            &nbsp;年
                                            <select name="ddlTargetMonth" tabindex="2" class="imeDisabled"
                                                id="ddlTargetMonth">
                                                @for ($month = 01; $month <= 12; $month++)
                                                    <option value="{{ $month }}"
                                                        {{ old('ddlTargetMonth', !empty($inputSearchData['ddlTargetMonth']) ? $inputSearchData['ddlTargetMonth'] : date('m')) == $month ? 'selected' : '' }}>
                                                        {{ $month }}
                                                    </option>
                                                @endfor
                                            </select>
                                            &nbsp;月
                                            <select name="ddlTargetDay" tabindex="3" class="imeDisabled"
                                                id="ddlTargetDay">
                                                @for ($day = 01; $day <= 31; $day++)
                                                    <option value="{{ $day }}"
                                                        {{ old('ddlTargetDay', !empty($inputSearchData['ddlTargetDay']) ? $inputSearchData['ddlTargetDay'] : date('d')) == $day ? 'selected' : '' }}>
                                                        {{ $day }}
                                                    </option>
                                                @endfor
                                            </select>
                                            &nbsp;日
                                        </td> -->
                                        <!-- 2022/03/07 削除 ティン End -->
                                    </tr>
                                    <tr>
                                        <th>部門</th>
                                        <td>
                                            <input name="txtDeptCd" 
                                                class="imeDisabled"
                                                id="txtDeptCd" 
                                                style="width: 80px;" 
                                                type="text"
                                                maxlength="10"
                                                value="{{ old('txtDeptCd', !empty($inputSearchData['txtDeptCd']) ? $inputSearchData['txtDeptCd'] : '') }}"
                                                >
                                            <input name="btnSearchDeptCd" class="SearchButton" id="btnSearchDeptCd" type="button" value="?" onclick="SearchDept();return false">
                                            <!-- <input class="SearchButton" type="button" id="MT12DeptSearch" onclick="SetDeptItem();" value="?"> -->
                                            <input class="OutlineLabel"
                                                name="deptName" 
                                                type="text"
                                                style="width: 200px; height: 17px; display: inline-block;" 
                                                id="deptName"
                                                value="{{ (!empty($inputSearchData['txtDeptCd']) ? $name[0] : '')}}"
                                                readonly="readonly"
                                                >
                                            @if ($errors->has('txtDeptCd'))
                                                <span class="alert-danger">{{ $errors->first('txtDeptCd') }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>開始所属</th>
                                        <td>
                                            <select name="filter[ddlStartCompany]" tabindex="6" id="ddlStartCompany"
                                                style="width: 300px;">
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
                                                style="width: 300px;">
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
                                            >
                                            <input name="btnCancel2" 
                                                class="ButtonStyle1 submit-form" 
                                                id="btnCancel2"
                                                type="button" value="キャンセル"
                                                data-url = "{{ route('wtde.cancel')}}"
                                                style="width: 80px;"
                                            >
                                            @if(!empty($results))
                                                <input 
                                                    name="btnEdit" 
                                                    class="submit-form"
                                                    type="button" 
                                                    value="編集"
                                                    data-url = "{{ route('wtde.edit')}}"
                                            >
                                                <!-- <input 
                                                    name="btnEdit" 
                                                    id="btnUpdate" 
                                                    type="button"
                                                    value="更新" 
                                                    style="display: none;"
                                                    class="submit-form" 
                                                    data-url = "{{ route('wtde.update')}}"
                                                > -->
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
                                                            @foreach($results as $result)
                                                                <tr>
                                                                    <td class="GridViewRowLeft">
                                                                        <span id="lblDeptCd" style="width: 80px; display: inline-block;">{{ $result->DEPT_CD }}</span>
                                                                    </td>
                                                                    <td class="GridViewRowLeft">
                                                                        <span id="lblDeptName" style="width: 130px; display: inline-block;">{{ $result->DEPT_NAME }}</span>
                                                                    </td>
                                                                    <td class="GridViewRowLeft">
                                                                        <span id="lblEmpCd" style="width: 80px; display: inline-block;">{{ $result->EMP_CD }}</span>
                                                                    </td>
                                                                    <td class="GridViewRowLeft">
                                                                        <span id="lblEmpName" style="width: 130px; display: inline-block;">{{ $result->EMP_NAME }}</span>
                                                                    </td>
                                                                    <td id="b" style="width: 150px;">
                                                                        <span id="lblWorkPtnName" name="lblWorkPtnName" class="{{ $result->WORK_CLS_CD == '00'?'text-danger':''}}" style="width: 150px; display: inline-block;">{{ $result->WORKPTN_NAME }}</span>

                                                                    </td>
                                                                    <td id="b" style="width: 70px;">
                                                                        <span id="lblReasonName" class="{{ $result->REASON_PTN_CD == '01'?'text-danger':''}} && {{ $result->REASON_PTN_CD == '02'?'text-primary':''}}" style="width: 70px; display: inline-block;">{{ $result->REASON_NAME }}</span>
                                                                    
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

    // 2022/03/07 追加 ティン Start
    //bootstrap date picker
    $('#YearMonth').datepicker({
      format: 'yyyy年mm月dd日',
      autoclose: true,
      language: 'ja',       // カレンダー日本語化のため
    //   minViewMode : 1
    });
    // 2022/03/07 追加 ティン End
</script>

@endsection