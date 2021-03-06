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
                        <form action="" method="post" id="form">
                            @csrf
                            <table class="InputFieldStyle1">
                                <tbody>
                                    <tr>
                                        <th>対象月度</th>
                                        <td>
                                            <input name="filter[ddlDate]" 
                                            id="YearMonth" 
                                            class="imeDisabled" 
                                            type="text" 
                                            autocomplete = "off"
                                            value="{{ old('filter.ddlDate', !empty($search_data['ddlDate']) ? $search_data['ddlDate']: date('Y/m') ) }}"
                                            />
                                        </td>
                                        <!-- 2022/03/04 ティン Start -->
                                        <!-- <td>
                                            <select name="filter[ddlTargetYear]" id="ddlTargetYear" tabindex="1" class="imeDisabled" style="width: 70px;">
                                                @for($y=date('Y')-3; $y<=date('Y')+3; $y++) 
                                                <option 
                                                    value="{{ $y }}"
                                                    {{ old("filter.ddlTargetYear", !empty($search_data["ddlTargetYear"]) ? $search_data["ddlTargetYear"] : date('Y')) ==  $y ? "selected" : "" }}
                                                >
                                                {{ $y }}
                                                </option>
                                                @endfor
                                            </select>
                                            &nbsp;年
                                            <select name="filter[ddlTargetMonth]"  id="ddlTargetMonth" tabindex="2" class="imeDisabled">
                                                @for($m=1; $m<=12; $m++) 
                                                <option 
                                                    value="{{ $m }}" 
                                                    {{ old("filter.ddlTargetMonth", !empty($search_data["ddlTargetMonth"]) ? $search_data["ddlTargetMonth"] : date('m')) == $m ? "selected" : "" }}
                                                >
                                                {{ $m }}
                                                </option>
                                                @endfor
                                            </select>
                                            &nbsp;月度
                                        </td> -->
                                        <!-- 2022/03/04 ティン End -->
                                    </tr>
                                
                                    <tr>
                                        <th>表示区分</th>
                                        <td>
                                            <div class="GroupBox1">
                                                <input 
                                                    name="filter[SearchCondition]" 
                                                    id="rbSearchDept" 
                                                    type="radio" 
                                                    value="rbSearchDept" {{ old("filter.SearchCondition", !empty($search_data["SearchCondition"]) ? $search_data["SearchCondition"] : "" ) == 'rbSearchDept' ? "checked" : ""}}
                                                    checked 
                                                >
                                                    <label for="rbSearchDept">部門</label>
                                                <input 
                                                    name="filter[SearchCondition]" 
                                                    id="rbSearchEmp" 
                                                    type="radio" 
                                                    value="rbSearchEmp" 
                                                    class="rbSearchEmp" {{ old("filter.SearchCondition", !empty($search_data["SearchCondition"]) ? $search_data["SearchCondition"] : "" ) == 'rbSearchEmp' ? "checked" : ""}}>
                                                    <label for="rbSearchEmp">社員</label>
                                            </div>
                                        </td>
                                    </tr>
                                
                                    <tr>
                                        <th>締日</th>
                                        <td>
                                            <select name="filter[ddlClosingDate]" id="ddlClosingDate" style="width: 300px;">
                                            @isset($closing_dates)
                                            @foreach ($closing_dates as $closing_date)
                                                <option 
                                                value="{{ $closing_date->CLOSING_DATE_CD }}" 
                                                       {{ old("filter.ddlClosingDate", !empty($search_data["ddlClosingDate"]) ? $search_data["ddlClosingDate"] : "") == $closing_date->CLOSING_DATE_CD ? "selected" : "" }}
                                                > 
                                                {{ $closing_date->CLOSING_DATE_NAME }}
                                                </option>
                                            @endforeach
                                            @endisset
                                            </select>
                                        </td>
                                    </tr>
                                
                                    <tr>
                                        <th>部門</th>
                                        <td>
                                            <input name="filter[txtDeptCd]" 
                                                class="imeDisabled" 
                                                id="txtDeptCd" 
                                                style="width: 50px;" 
                                                type="text" 
                                                value="{{ old('filter.txtDeptCd', !empty($search_data['txtDeptCd']) ? $search_data['txtDeptCd']:'') }}"
                                                maxlength="6"
                                            >
                                            <input name="btnSearchDeptCd" class="SearchButton" id="btnSearchDeptCd" type="button" value="?" onclick="SearchDept();return false">
                                            <input class="OutlineLabel"
                                                name="deptName" 
                                                type="text"
                                                style="width: 200px; height: 17px; display: inline-block;" 
                                                id="deptName"
                                                value="{{ (!empty($search_data['txtDeptCd']) ? $name[0] : '')}}"
                                                readonly="readonly"
                                            >
                                            <!-- value="{{ old('deptName', !empty($input_datas['deptName']) ? session()->get('deptName') :'') }}" -->
                                            @if ($errors->has('filter.txtDeptCd'))
                                            <span class="alert-danger">{{ $errors->first('filter.txtDeptCd') }}</span>
                                            @endif

                                        </td>
                                    </tr>
                                
                                    <tr>
                                        <th>開始所属</th>
                                        <td>
                                            <select name="filter[ddlStartCompany]" id="ddlStartCompany" style="width: 300px;">
                                                <option value=""></option>
                                            @isset($haken_kaisha) 
                                            @foreach ($haken_kaisha as $company)
                                                <option 
                                                value="{{ $company->COMPANY_CD }}" 
                                                       {{ old("filter.ddlStartCompany", !empty($search_data["ddlStartCompany"]) ? $search_data["ddlStartCompany"] : "") == $company->COMPANY_CD ? "selected" : "" }}
                                                >
                                                {{ $company->COMPANY_ABR }}
                                                </option>
                                            @endforeach
                                            @endisset
                                            </select>
                                        </td>
                                    </tr>
                                
                                    <tr>
                                        <th>終了所属</th>
                                        <td>
                                            <select name="filter[ddlEndCompany]" id="ddlEndCompany" style="width: 300px;">
                                                <option value=""></option>
                                            @isset($haken_kaisha)
                                            @foreach ($haken_kaisha as $company)
                                                <option 
                                                value="{{ $company->COMPANY_CD }}" 
                                                       {{ old("filter.ddlEndCompany", !empty($search_data["ddlEndCompany"]) ? $search_data["ddlEndCompany"] : "") == $company->COMPANY_CD ? "selected" : "" }}
                                                >
                                                {{ $company->COMPANY_ABR }}
                                                </option>
                                            @endforeach
                                            @endisset
                                            </select>
                                        </td>
                                    </tr>
                                
                                    <tr>
                                        <th>社員番号</th>
                                        <td>
                                            <input 
                                                name="filter[txtEmpCd]"
                                                class="imeDisabled" 
                                                id="txtEmpCd"
                                                value="{{ old('filter.txtEmpCd', !empty($search_data['txtEmpCd']) ? $search_data['txtEmpCd']:'') }}" 
                                                style="width: 80px;" 
                                                type="text" maxlength="10">
                                            <input name="btnSearchEmpCd" class="SearchButton" id="btnSearchEmpCd" type="button" value="?" onclick="SearchEmp();return false">
                                            <input name="empName" 
                                                   class="OutlineLabel" 
                                                   type="text" 
                                                   style="width: 200px; height: 17px; display: inline-block;" 
                                                   id="empName"
                                                   value="{{ (!empty($search_data['txtEmpCd']) ? $name[0] : '')}}" 
                                                   readonly="readonly"
                                            >
                                            <!-- value="{{ old('empName', !empty($input_datas['empName']) ? $input_datas['empName']:'') }}" -->
                                            @if ($errors->has('filter.txtEmpCd'))
                                            <span class="alert-danger">{{ $errors->first('filter.txtEmpCd') }}</span>
                                            @endif

                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="line"></div>
                            <table>
                                <tbody>
                                    <tr>
                                        <td style="width: auto;">
                                            <input 
                                                name="btnDisp" 
                                                id="btnShow" 　
                                                class="ButtonStyle1 submit-form" 
                                                type="button" 
                                                value="表示"
                                                data-url = "{{ route('ewtr.search')}}"
                                            >                                           
                                            <input 
                                                name="btnCancel2" 
                                                class="ButtonStyle1 submit-form" 
                                                id="btnCancel2"
                                                type="button" 
                                                value="キャンセル"
                                                data-url = "{{ route('ewtr.cancel')}}"
                                            >
                                            &nbsp;
                                            <span class="font-style2" id="lblFixMsg"></span>
                                            @isset($results)
                                                @if(count($results) > 0)
                                                    @if (isset($confirm_check))
                                                        <span class="font-style2">確定済み</span>
                                                    @endif
                                                @endif 
                                            @endisset
                                            <!-- @if (isset($confirm_check))
                                                <span class="font-style2">確定済み</span>
                                            @endif      -->
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            
                            <!-- detail -->
                            <div class="GridViewStyle1" id="gridview-container">
                                <div class="GridViewPanelStyle1" id="pnlEmpWorkTime" style="width: 911px;">
                                    <div id="pnlWorkTime">
                                        <div>
                                            <table class="GridViewBorder GridViewPadding GridViewRowCenter GridViewRowCut yoko-tate" id="gvEmpWorkTime" style="border-collapse:separate;" border="1" rules="all" cellspacing="0">
                                                <tbody id="gridview-warp">
                                                    @isset($results)
                                                        @if(count($results) < 1) 
                                                        <tr style="width:70px;">
                                                            <td><span>{{ $messages }}</span></td>
                                                        </tr>
                                                        @else
                                                        <tr class="sticky-top">
                                                            <th class="fixed01" scope="col" style="background: #4682B4; left: 0px;">
                                                                部門コード
                                                            </th>
                                                            <th class="fixed02" scope="col" style="background: #4682B4; left: 80px;">
                                                                部門名
                                                            </th>
                                                            <th class="fixed03" scope="col" style="background: #4682B4; left: 210px;">
                                                                社員番号
                                                            </th>
                                                            <th class="fixed04" scope="col" style="background: #4682B4; left: 290px;">
                                                                社員名
                                                            </th>
                                                            <th class="fixed05" scope="col" style="background: #4682B4; left: 420px;">
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
                                                                <td class="fixed01" style="width: 80px; left: 0;">
                                                                    <span id="lblDeptCd" style="width: 80px; display: inline-block;">{{ $result->DEPT_CD }}</span>
                                                                </td>
                                                                <td class="fixed02" style="width: 130px; left: 80px;">
                                                                    <span id="lblDeptName" style="width: 130px; display: inline-block;">{{ $result->DEPT_NAME }}</span>
                                                                </td>
                                                                <td class="fixed03" style="width: 80px; left: 210px;">
                                                                    <span id="lblEmpCd" style="width: 80px; display: inline-block;">{{ $result->EMP_CD }}</span>
                                                                </td>
                                                                <td class="fixed04" style="width: 130px; left: 290px;">
                                                                    <span id="lblEmpName" style="width: 130px; display: inline-block;">{{ $result->EMP_NAME }}</span>
                                                                </td>
                                                                <td class="fixed05" style="width: 130px; left: 420px;">
                                                                    <span id="lblCalendarName" style="width: 150px; display: inline-block;">{{ $result->CALENDAR_NAME }}</span>
                                                                </td>
                                                                <td>
                                                                    <span id="lblSumWorkdayCnt" style="width: 50px; display: inline-block;">{{ $result->SUM_WORKDAY_CNT }}</span>
                                                                </td>
                                                                <td>
                                                                    <span id="lblSumHolworkCnt" style="width: 50px; display: inline-block;">{{ $result->SUM_HOLWORK_CNT }}</span>
                                                                </td>
                                                                <td>
                                                                    <span id="lblSumSpcholCnt" style="width: 50px; display: inline-block;">{{ $result->SUM_SPCHOL_CNT }}</span>
                                                                </td>
                                                                <td>
                                                                    <span id="lblSumPadholCnt" style="width: 50px; display: inline-block;">{{ $result->SUM_PADHOL_CNT }}</span>
                                                                </td>
                                                                <td>
                                                                    <span id="lblSumAbcdCnt" style="width: 50px; display: inline-block;">{{ $result->SUM_ABCWORK_CNT }}</span>
                                                                </td>
                                                                <td>
                                                                    <span id="lblSumCompdayCnt" style="width: 50px; display: inline-block;">{{ $result->SUM_COMPDAY_CNT }}</span>
                                                                </td>
                                                                <td>
                                                                    <span id="lblSumWorkTime" style="width: 60px; display: inline-block;">{{ $result->SUM_WORK_TIME }}</span>
                                                                </td>
                                                                <td>
                                                                    <span id="lblSumTardTime" style="width: 60px; display: inline-block;">{{ $result->SUM_TARD_TIME }}</span>
                                                                </td>
                                                                <td>
                                                                    <span id="lblSumLeaveTime" style="width: 60px; display: inline-block;">{{ $result->SUM_LEAVE_TIME }}</span>
                                                                </td>
                                                                <td>
                                                                    <span id="lblSumOutTime" style="width: 60px; display: inline-block;">{{ $result->SUM_OUT_TIME }}</span>
                                                                </td>
                                                                <td>
                                                                    <span id="lblSumOvtm1Time" style="width: 60px; display: inline-block;">{{ $result->SUM_OVTM1_TIME }}</span>
                                                                </td>
                                                                <td>
                                                                    <span id="lblSumOvtm2Time" style="width: 60px; display: inline-block;">{{ $result->SUM_OVTM2_TIME }}</span>
                                                                </td>
                                                                <td>
                                                                    <span id="lblSumOvtm3Time" style="width: 60px; display: inline-block;">{{ $result->SUM_OVTM3_TIME }}</span>
                                                                </td>
                                                                <td>
                                                                    <span id="lblSumOvtm4Time" style="width: 60px; display: inline-block;">{{ $result->SUM_OVTM4_TIME }}</span>
                                                                </td>
                                                                <td>
                                                                    <span id="lblSumOvtm5Time" style="width: 60px; display: inline-block;">{{ $result->SUM_OVTM5_TIME }}</span>
                                                                </td>
                                                                <td>
                                                                    <span id="lblSumOvtm6Time" style="width: 60px; display: inline-block;">{{ $result->SUM_OVTM6_TIME }}</span>
                                                                </td>
                                                                <td>
                                                                    <span id="lblSumExt1Time" style="width: 60px; display: inline-block;">{{ $result->SUM_EXT1_TIME }}</span>
                                                                </td>
                                                                <td>
                                                                    <span id="lblSumExt2Time" style="width: 60px; display: inline-block;">{{ $result->SUM_EXT2_TIME }}</span>
                                                                </td>
                                                                <td>
                                                                    <span id="lblSumExt3Time" style="width: 60px; display: inline-block;">{{ $result->SUM_EXT3_TIME }}</span>
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
                                    <input 
                                        name="btnCancel2" 
                                        class="ButtonStyle1 submit-form" 
                                        id="btnCancel2"
                                        type="button" 
                                        value="キャンセル"
                                        data-url = "{{ route('ewtr.cancel')}}"
                                    >
                                </p>
                            </div>
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
   
    $(document).ready(function () { 
        toggleRadio( $("input[type='radio']:checked") );
       
        //ボタンクリック
        $(document).on('click', '.submit-form', function(){
            var url = $(this).data('url');
            $('#form').attr('action', url);
            $('#form').submit();
        });
        //無効化
        $('input:radio').on('click', function () {
            toggleRadio($(this));
        })

    }); 

    function toggleRadio(ele) {
        $("#txtEmpCd, #btnSearchEmpCd").prop("disabled", true);
        $("#txtDeptCd, #ddlStartCompany, #ddlEndCompany, #ddlClosingDate, #btnSearchDeptCd").prop("disabled", false);
        if (ele.hasClass('rbSearchEmp')) {
            $("#txtEmpCd, #btnSearchEmpCd").prop("disabled", false);
            $("#txtDeptCd, #ddlStartCompany, #ddlEndCompany, #ddlClosingDate, #btnSearchDeptCd").prop("disabled", true);
            $("#txtDeptCd, #deptName, #ddlStartCompany, #ddlEndCompany").val('');
        }else{
            $("#txtEmpCd, #empName").val('');
        }
    }

    $('#YearMonth').datepicker({
      format: 'yyyy/mm',
      autoclose: true ,
      language: 'ja',       // カレンダー日本語化のため
      minViewMode : 1
    });
</script>
@endsection