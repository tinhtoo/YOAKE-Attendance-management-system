<!-- 勤務実績表(日・週・月別)画面 -->
@extends('menu.main')

@section('title', '勤務実績表(日・週・月別)')

@section('content')
    <div id="contents-stage">
        <table class="BaseContainerStyle2">
            <tbody>
                <tr>
                    <td>
                        <form action="" method="post" id="form" >
                            {{ csrf_field() }}
                            <div id="UpdatePanel4">
                                <table width="1000" class="InputFieldStyle1">
                                    <tbody>
                                        <tr>
                                            <th>帳票区分</th>
                                            <td>
                                                <div class="GroupBox3">
                                                    <input type="radio"
                                                        name="ReportCategory"
                                                        id="rbWorkTimeDaily"
                                                        class="rbWorkTimeDaily"
                                                        tabindex="1"
                                                        value="rbWorkTimeDaily"
                                                        {{ old('ReportCategory', !empty($input_datas['ReportCategory']) ? $input_datas['ReportCategory'] : '') == 'rbWorkTimeDaily'? 'checked': ''}}
                                                        @if(empty( $input_datas['ReportCategory']))
                                                        checked
                                                        @endif
                                                    >
                                                    <label for="rbWorkTimeDaily">日報</label>
                                                    <input type="radio"
                                                        name="ReportCategory"
                                                        id="rbWorkTimeEmpDailyPortrait"
                                                        class="rbWorkTimeEmpDailyPortrait"
                                                        tabindex="2"
                                                        value="rbWorkTimeEmpDailyPortrait"
                                                        {{ old('ReportCategory', !empty($input_datas['ReportCategory']) ? $input_datas['OutputCls'] : '') == 'rbWorkTimeEmpDailyPortrait'? 'checked': '' }}
                                                    >
                                                    <label for="rbWorkTimeEmpDailyPortrait">月報 A3縦 PTN1</label>
                                                    <input type="radio"
                                                        name="ReportCategory"
                                                        id="rbWorkTimeEmpDailyPortrait2"
                                                        class="rbWorkTimeEmpDailyPortrait2"
                                                        tabindex="3"
                                                        value="rbWorkTimeEmpDailyPortrait2"
                                                        {{ old('ReportCategory', !empty($input_datas['ReportCategory']) ? $input_datas['OutputCls'] : '') == 'rbWorkTimeEmpDailyPortrait2'? 'checked': '' }}
                                                    >
                                                    <label for="rbWorkTimeEmpDailyPortrait2">月報 A3縦 PTN2</label>
                                                    <input type="radio"
                                                        name="ReportCategory"
                                                        id="rbWorkTimeEmpDailyLandscape"
                                                        class="rbWorkTimeEmpDailyLandscape"
                                                        tabindex="4"
                                                        value="rbWorkTimeEmpDailyLandscape"
                                                        {{ old('ReportCategory', !empty($input_datas['ReportCategory']) ? $input_datas['OutputCls'] : '') == 'rbWorkTimeEmpDailyLandscape'? 'checked': '' }}
                                                    >
                                                    <label for="rbWorkTimeEmpDailyLandscape">月報 A3横</label>
                                                    <input type="radio"
                                                        name="ReportCategory"
                                                        id="rbWorkTimeEmpDailyLandscape2"
                                                        class="rbWorkTimeEmpDailyLandscape2"
                                                        tabindex="5"
                                                        value="rbWorkTimeEmpDailyLandscape2"
                                                        {{ old('ReportCategory', !empty($input_datas['ReportCategory']) ? $input_datas['OutputCls'] : '') == 'rbWorkTimeEmpDailyLandscape2'? 'checked': '' }}
                                                    >
                                                    <label for="rbWorkTimeEmpDailyLandscape2">月報 A4横 PTN1</label>
                                                    <input type="radio"
                                                        name="ReportCategory"
                                                        id="rbWorkTimeEmpDailyLandscape3"
                                                        class="rbWorkTimeEmpDailyLandscape3"
                                                        tabindex="6"
                                                        value="rbWorkTimeEmpDailyLandscape3"
                                                        {{ old('ReportCategory', !empty($input_datas['ReportCategory']) ? $input_datas['OutputCls'] : '') == 'rbWorkTimeEmpDailyLandscape3'? 'checked': '' }}
                                                    >
                                                    <label for="rbWorkTimeEmpDailyLandscape3">月報 A4横 PTN2</label>
                                                    <input type="radio"
                                                        name="ReportCategory"
                                                        id="rbWorkTimeSum"
                                                        class="rbWorkTimeSum"
                                                        tabindex="7"
                                                        value="rbWorkTimeSum"
                                                        {{ old('ReportCategory', !empty($input_datas['ReportCategory']) ? $input_datas['OutputCls'] : '') == 'rbWorkTimeSum'? 'checked': '' }}
                                                    >
                                                    <label for="rbWorkTimeSum">集計表</label>
                                                    <div class="clearBoth"></div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <table class="InputFieldStyle1">
                                    <tbody>
                                        <tr>
                                            <th>出力区分</th>
                                            <td>
                                                <div class="GroupBox1">
                                                    <input type="radio"
                                                        name="OutputCls"
                                                        id="rbDateRange"
                                                        class="rbDateRange"
                                                        tabindex="8"
                                                        value="rbDateRange"
                                                        {{ old('OutputCls', !empty( $input_datas['OutputCls']) ? $input_datas['OutputCls'] : '') == 'rbDateRange'? 'checked': '' }}
                                                        @if(empty($input_datas['OutputCls']))
                                                        checked
                                                        @endif
                                                    >
                                                    <label for="rbDateRange" style="padding: 1.5px 0 0 3px;">日付範囲</label>
                                                    <input type="radio"
                                                        name="OutputCls"
                                                        id="rbMonthCls"
                                                        class="rbMonthCls"
                                                        tabindex="9"
                                                        value="rbMonthCls"
                                                        {{ old('OutputCls', !empty($input_datas['OutputCls']) ? $input_datas['OutputCls'] : '') == 'rbMonthCls'? 'checked': '' }}
                                                    >
                                                    <label for="rbMonthCls" style="padding: 1.5px 0 0 3px;">月度</label>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <table class="InputFieldStyle1">
                                    <tbody>
                                        <tr>
                                            <th>並順</th>
                                            <td>
                                                <div class="GroupBox1">
                                                    <span>
                                                        <input type="radio"
                                                            name="Sort"
                                                            id="rbSortDept"
                                                            class="rbSortDept"
                                                            tabindex="10"
                                                            value="rbSortDept"
                                                            {{ old('Sort', !empty($input_datas['Sort']) ? $input_datas['Sort'] : '') == 'rbSortDept'? 'checked': '' }}
                                                            @if(empty($input_datas['Sort']))
                                                            checked
                                                            @endif
                                                        >
                                                        <label for="rbSortDept">部門</label>
                                                    </span>
                                                    <span>
                                                        <input type="radio"
                                                            name="Sort"
                                                            id="rbSortSection"
                                                            class="rbSortSection"
                                                            tabindex="11"
                                                            value="rbSortSection"
                                                            {{ old('Sort', !empty($input_datas['Sort']) ? $input_datas['Sort'] : '') == 'rbSortSection'? 'checked': '' }}
                                                        >
                                                        <label for="rbSortSection">所属</label>
                                                    </span>
                                                    <div class="clearBoth"></div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <table class="InputFieldStyle1">
                                    <tbody>
                                        <tr>
                                            <th>開始対象日</th>
                                            <td>
                                                <input type="text"
                                                    name="filter[startDate]"
                                                    id="YearMonth"
                                                    class="date"
                                                    autocomplete="off"
                                                    onfocus="this.select();"
                                                    tabindex="12"
                                                    autofocus
                                                    value="{{ old('filter.startDate', !empty(Session::get('ymd_date')) ? Session::get('ymd_date'): '' ) }}"
                                                />
                                                @error('filter.startDate')
                                                <span class="text-danger date-Error">{{ getArrValue($error_messages, $message) }}</span>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>終了対象日</th>
                                            <td>
                                                <input type="text"
                                                    name="filter[endDate]"
                                                    id="YearMonth"
                                                    class="date"
                                                    autocomplete="off"
                                                    onfocus="this.select();"
                                                    tabindex="13"
                                                    value="{{ old('filter.endDate', !empty(Session::get('ymd_date')) ? Session::get('ymd_date'): '' ) }}"
                                                />
                                                @error('filter.endDate')
                                                <span class="text-danger date-Error">{{ getArrValue($error_messages, $message) }}</span>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>対象月度</th>
                                            <td>
                                                <input type="text"
                                                    name="filter[yearMonthDate]"
                                                    id="yearMonth"
                                                    class="yearMonth"
                                                    tabindex="14"
                                                    autocomplete="off"
                                                    value="{{ old('filter.yearMonthDate', !empty(Session::get('ym_date')) ? Session::get('ym_date'): '' ) }}"
                                                />
                                                @error('filter.yearMonthDate')
                                                <span class="text-danger yearMonth-Error">{{ getArrValue($error_messages, $message) }}</span>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>締日</th>
                                            <td>
                                                <select name="filter[ddlClosingDate]" id="ddlClosingDate" class="ddlClosingDate" tabindex="15" style="width: 150px;">
                                                    <option class="BlaClosingDate" value=""></option>
                                                    @isset($closing_dates)
                                                    @foreach ($closing_dates as $closing_date)
                                                        <option value="{{ $closing_date->CLOSING_DATE_CD }}"
                                                            {{ old('filter.ddlClosingDate', !empty($search_data['ddlClosingDate']) ? $search_data['ddlClosingDate'] : '') ==$closing_date->CLOSING_DATE_CD? 'selected': '' }}>
                                                            {{ $closing_date->CLOSING_DATE_NAME }}
                                                        </option>
                                                    @endforeach
                                                    @endisset
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>開始部門コード</th>
                                            <td>
                                                <input type="text"
                                                    name="filter[txtStartDeptCd]"
                                                    id="txtDeptCd"
                                                    class="txtDeptCd searchDeptCd startDeptCd"
                                                    tabindex="16"
                                                    style="width: 50px;"
                                                    onfocus="this.select();"
                                                    oninput="value=onlyHalfWord(value)"
                                                    autocomplete="off"
                                                    maxlength="6"
                                                    value="{{ old('filter.txtStartDeptCd', !empty( $input_datas['filter']['txtStartDeptCd'])? $input_datas['filter']['txtStartDeptCd'] : '')}}"
                                                >
                                                <input type="button"
                                                    name="btnSearchStartDeptCd"
                                                    id="btnSearchStartDeptCd"
                                                    class="SearchButton"
                                                    tabindex="17"
                                                    onclick="SearchDept(this);return false"
                                                    value="?"
                                                >
                                                <input id="deptName"
                                                    class="txtDeptName"
                                                    data-dispclscd=01 data-isdeptauth=true
                                                    style="width: 200px; display: inline-block;"
                                                >
                                                <span class="text-danger" id="deptNameError"></span>
                                                @error('filter.txtStartDeptCd')
                                                <span class="text-danger" id="DeptCdValidError">{{ getArrValue($error_messages, $errors->first('filter.txtStartDeptCd')) }}</span>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>終了部門コード</th>
                                            <td>
                                                <input type="text"
                                                    name="filter[txtEndDeptCd]"
                                                    id="txtDeptCd"
                                                    class="txtDeptCd searchDeptCd endDeptCd"
                                                    tabindex="18"
                                                    style="width: 50px;"
                                                    onfocus="this.select();"
                                                    oninput="value=onlyHalfWord(value)"
                                                    autocomplete="off"
                                                    maxlength="6"
                                                    value="{{ old('filter.txtEndDeptCd', !empty( $input_datas['filter']['txtEndDeptCd'])? $input_datas['filter']['txtEndDeptCd'] : '')}}"
                                                >
                                                <input type="button"
                                                    name="btnSearchEndDeptCd"
                                                    id="btnSearchEndDeptCd"
                                                    class="SearchButton"
                                                    tabindex="19"
                                                    onclick="SearchDept(this);return false"
                                                    value="?"
                                                >
                                                <input id="deptName" class="txtDeptName"
                                                    data-dispclscd=01 data-isdeptauth=true
                                                    style="width: 200px; display: inline-block;"
                                                >
                                                <span class="text-danger" id="deptNameError"></span>
                                                @error('filter.txtEndDeptCd')
                                                <span class="text-danger" id="DeptCdValidError">{{ getArrValue($error_messages, $errors->first('filter.txtEndDeptCd')) }}</span>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>開始所属</th>
                                            <td>
                                                <select name="filter[ddlStartCompany]" id="ddlStartCompany" class="ddlStartCompany" tabindex="20" style="width: 300px;">
                                                    <option value=""></option>
                                                    @isset($company_list)
                                                    @foreach ($company_list as $company)
                                                        <option value="{{ $company->COMPANY_CD }}"
                                                            {{ old('filter.ddlStartCompany') === $company->COMPANY_CD ? 'selected' : ''}}>
                                                            {{ $company->COMPANY_ABR }}
                                                        </option>
                                                    @endforeach             
                                                    @endisset
                                                </select>
                                                @error('filter.ddlStartCompany')
                                                <span class="text-danger startCompany-Error">{{ getArrValue($error_messages, $errors->first('filter.ddlStartCompany')) }}</span>
                                                @enderror
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>終了所属</th>
                                            <td>
                                                <select name="filter[ddlEndCompany]" id="ddlEndCompany" class="ddlEndCompany" tabindex="21" style="width: 300px;">
                                                    <option value=""></option>
                                                    @isset($company_list)
                                                    @foreach ($company_list as $company)
                                                        <option value="{{ $company->COMPANY_CD }}"
                                                            {{ old('filter.ddlEndCompany') === $company->COMPANY_CD ? 'selected' : ''}}>
                                                            {{ $company->COMPANY_ABR }}
                                                        </option>
                                                    @endforeach
                                                    @endisset
                                                </select>
                                                @error('filter.ddlEndCompany')
                                                <span class="text-danger endCompany-Error">{{ getArrValue($error_messages, $errors->first('filter.ddlEndCompany')) }}</span>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>開始社員番号</th>
                                            <td>
                                                <input type="text"
                                                    name="filter[txtStartEmpCd]"
                                                    id="txtEmpCd"
                                                    class="txtEmpCd searchEmpCd"
                                                    tabindex="22"
                                                    style="width: 80px;"
                                                    onfocus="this.select();"
                                                    oninput="value=onlyHalfWord(value)"
                                                    autocomplete="off"
                                                    maxlength="10"
                                                    value="{{ old('filter.txtStartEmpCd', !empty( $input_datas['filter']['txtStartEmpCd'])? $input_datas['filter']['txtStartEmpCd'] : '')}}"
                                                >
                                                <input type="button"
                                                    name="btnSearchStartEmpCd"
                                                    id="btnSearchStartEmpCd"
                                                    class="SearchButton"
                                                    tabindex="23"
                                                    onclick="SearchEmp(this);return false"
                                                    value="?"
                                                >
                                                <input id="empName"
                                                    class="txtEmpName"
                                                    style="width: 200px; display: inline-block;"
                                                    @if(old('filter.chkRegCls', empty($errors->all()))) data-regclscd=00 @endif
                                                    data-isdeptauth=true
                                                >    
                                                <span id="EmpCdError" class="text-danger"></span>
                                                @error('filter.txtStartEmpCd')
                                                <span id="EmpCdValidError" class="text-danger">{{ getArrValue($error_messages, $errors->first('filter.txtStartEmpCd')) }}</span>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>終了社員番号</th>
                                            <td>
                                                <input type="text"
                                                    name="filter[txtEndEmpCd]"
                                                    id="txtEmpCd"
                                                    class="txtEmpCd searchEmpCd"
                                                    tabindex="24"
                                                    style="width: 80px;"
                                                    onfocus="this.select();"
                                                    oninput="value=onlyHalfWord(value)"
                                                    autocomplete="off"
                                                    maxlength="10"
                                                    value="{{ old('filter.txtEndEmpCd', !empty( $input_datas['filter']['txtEndEmpCd'])? $input_datas['filter']['txtEndEmpCd'] : '')}}"
                                                >
                                                <input type="button"
                                                    name="btnSearchEndEmpCd"
                                                    id="btnSearchEndEmpCd"
                                                    class="SearchButton"
                                                    tabindex="25"
                                                    onclick="SearchEmp(this);return false"
                                                    value="?"
                                                >
                                                <input id="empName"
                                                    class="txtEmpName"
                                                    style="width: 200px; display: inline-block;"
                                                    @if(old('filter.chkRegCls', empty($errors->all()))) data-regclscd=00 @endif
                                                    data-isdeptauth=true
                                                >
                                                <span id="EmpCdError" class="text-danger"></span>
                                                @error('filter.txtEndEmpCd')
                                                <span id="EmpCdValidError" class="text-danger">{{ getArrValue($error_messages, $errors->first('filter.txtEndEmpCd')) }}</span>
                                                @enderror
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <input type="checkbox"
                                                    name="filter[chkRegCls]"
                                                    id="chkRegCls"
                                                    tabindex="26"
                                                    @if(old('filter.chkRegCls', empty($errors->all()))) checked="checked" @endif
                                                    style="vertical-align: middle;"
                                                >
                                                <label for="chkRegCls">在籍のみ表示</label>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="line"></div>
                                <p class="ButtonField1">
                                    <input type="button"
                                        name="btnPrint"
                                        id="btnPrint"
                                        class="ButtonStyle1 print"
                                        tabindex="27"
                                        value="印刷"
                                        data-url="{{ route('WorkTimePrint.Print')}}"
                                    >
                                    <input type="button"
                                        name="btnCancel"
                                        id="btnCancel"
                                        class="ButtonStyle1"
                                        tabindex="28"
                                        onclick=" location.href='{{ route('WorkTimePrint.index') }}' "
                                        value="キャンセル"
                                    >
                                </p>
                            </div>
                        
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
@section('script')
<script>
$(function() {
    // 帳票区分
    function reportCategoryRadio(ele) {

        // 日報, 集計表
        if (ele.hasClass('rbWorkTimeDaily') || ele.hasClass('rbWorkTimeSum')) {
            $(".rbDateRange").prop("disabled", false);
            $(".rbMonthCls").prop("disabled", true); 
            $(".rbSortDept").prop("disabled", true); 
            $(".rbSortSection").prop("disabled", true);
            $(".date").prop("disabled", false);
            $(".yearMonth").prop("disabled", true);
            $(".ddlClosingDate").prop("disabled", true);
            $(".ddlStartCompany").prop("disabled", true);
            $(".ddlEndCompany").prop("disabled", true);

            $(".rbMonthCls").prop("checked", false);
            $(".rbDateRange").prop("checked", true);
            $(".yearMonth").val('');
            $(".ddlClosingDate").val('');
            $(".ddlStartCompany").val('');
            $(".ddlEndCompany").val('');
            $(".yearMonth-Error").text('');
            $(".startCompany-Error").text('');
            $(".endCompany-Error").text('');
            $(".BlaClosingDate").show();
        }
        
        // 月報 A3縦 PTN1, 月報 A3縦 PTN2, 月報 A3縦 PTN2 
        if (ele.hasClass('rbWorkTimeEmpDailyPortrait') || ele.hasClass('rbWorkTimeEmpDailyPortrait2') || ele.hasClass('rbWorkTimeEmpDailyLandscape2')) {
            $(".rbDateRange").prop("disabled", true);
            $(".rbMonthCls").prop("disabled", false);
            $(".rbSortDept").prop("disabled", true);
            $(".rbSortSection").prop("disabled", true);
            $(".date").prop("disabled", true);
            $(".yearMonth").prop("disabled", false);
            $(".ddlClosingDate").prop("disabled", false);
            $(".ddlStartCompany").prop("disabled", true);
            $(".ddlEndCompany").prop("disabled", true);

            $(".rbMonthCls").prop("checked", true);
            $(".rbDateRange").prop("checked", false);
            $(".date").val('');
            $(".ddlStartCompany").val('');
            $(".ddlEndCompany").val('');
            $(".date-Error").text('');
            $(".BlaClosingDate").show();
        }

        // 月報 A3横
        if (ele.hasClass('rbWorkTimeEmpDailyLandscape')) {
            $(".rbDateRange").prop("disabled", true);
            $(".rbMonthCls").prop("disabled", false);
            $(".rbSortDept").prop("disabled", true);
            $(".rbSortSection").prop("disabled", true);
            $(".date").prop("disabled", true);
            $(".yearMonth").prop("disabled", false);
            $(".ddlClosingDate").prop("disabled", false);
            $(".ddlStartCompany").prop("disabled", true);
            $(".ddlEndCompany").prop("disabled", true);

            $(".rbMonthCls").prop("checked", true);
            $(".rbDateRange").prop("checked", false);
            $(".date").val('');
            $(".ddlStartCompany").val('');
            $(".ddlEndCompany").val('');
            $(".BlaClosingDate").hide();
            $(".ddlClosingDate").val(15);
        }

        // 月報 A4横 PTN2
        if (ele.hasClass('rbWorkTimeEmpDailyLandscape3')) {
            $(".rbDateRange").prop("disabled", false);
            $(".rbMonthCls").prop("disabled", false); 
            $(".rbSortDept").prop("disabled", false); 
            $(".rbSortSection").prop("disabled", false);
            $(".date").prop("disabled", false);
            $(".yearMonth").prop("disabled", true);
            $(".ddlClosingDate").prop("disabled", true);
            $(".ddlStartCompany").prop("disabled", false);
            $(".ddlEndCompany").prop("disabled", false);
            $(".yearMonth").val('');
            $(".ddlClosingDate").val('');
            $(".BlaClosingDate").show();

            function outputClsRadio(ele) {
                if (ele.hasClass('rbMonthCls')) {
                    $(".date").prop("disabled", true);
                    $(".yearMonth").prop("disabled", false);
                    $(".ddlClosingDate").prop("disabled", false);
                    $(".date").val('');
                } else {
                    $(".date").prop("disabled", false);
                    $(".yearMonth").prop("disabled", true);
                    $(".ddlClosingDate").prop("disabled", true);
                    $(".yearMonth").val('');
                    $(".yearMonth-Error").text('');
                }
            }

            // 出力区分
            outputClsRadio($("input[type='radio']:checked"), true);
            $("input[type='radio'][name='OutputCls']").on('click', function() {
                outputClsRadio($(this));
            })
        }
    }

    // 帳票区分
    reportCategoryRadio($("input[type='radio']:checked"), true);
    $("input[type='radio'][name='ReportCategory']").on('click', function() {
        reportCategoryRadio($(this));
    })

    // 印刷
    $(document).on('click', '.print', function() {
        var dailyWorkTime = $(".rbWorkTimeDaily").prop("checked"); // 日報
        var MonthlyReportPortrait = $(".rbWorkTimeEmpDailyPortrait").prop("checked"); // 月報 A3縦 PTN1
        var MonthlyReportPortrait2 = $(".rbWorkTimeEmpDailyPortrait2").prop("checked"); // 月報 A3縦 PTN2
        var MonthlyReportLandscape = $(".rbWorkTimeEmpDailyLandscape").prop("checked"); // 月報 A3横
        var MonthlyReportLandscape2 = $(".rbWorkTimeEmpDailyLandscape2").prop("checked"); // 月報 A4横 PTN1
        var MonthlyReportLandscape3 = $(".rbWorkTimeEmpDailyLandscape3").prop("checked"); // 月報 A4横 PTN2
        var workTimeSum = $(".rbWorkTimeSum").prop("checked"); // 集計表
        var message = "{{ getArrValue($error_messages, 1011) }}"; // {0}を印刷しますか？

        // 日報
        if (dailyWorkTime) {
            if (window.confirm(message.replace('{0}','勤務実績表(日報)'))) {
                var url = $(this).data('url');
                $('#form').attr('action', url);
                $('#form').submit();
            }
            return false;
        }

        // 月報 A3縦 PTN1
        if (MonthlyReportPortrait) {
            if (window.confirm(message.replace('{0}','勤務実績表(社員別月報)A3縦 PTN1'))) {
                var url = $(this).data('url');
                $('#form').attr('action', url);
                $('#form').submit();
            }
            return false;
        }

        // 月報 A3縦 PTN2
        if (MonthlyReportPortrait2) {
            if (window.confirm(message.replace('{0}','勤務実績表(社員別月報)A3縦 PTN2'))) {
                var url = $(this).data('url');
                $('#form').attr('action', url);
                $('#form').submit();
            }
            return false;
        }

        // 月報 A3横
        if (MonthlyReportLandscape) {
            if (window.confirm(message.replace('{0}','勤務実績表(社員別月報)A3横'))) {
                var url = $(this).data('url');
                $('#form').attr('action', url);
                $('#form').submit();
            }
            return false;
        }

        // 月報 A4横 PTN1
        if (MonthlyReportLandscape2) {
            if (window.confirm(message.replace('{0}','勤務実績表(社員別月報)A4横 PTN1'))) {
                var url = $(this).data('url');
                $('#form').attr('action', url);
                $('#form').submit();
            }
            return false;
        }

        // 月報 A4横 PTN2
        if (MonthlyReportLandscape3) {
            if (window.confirm(message.replace('{0}','勤務実績表(社員別月報)A4横 PTN2'))) {
                var url = $(this).data('url');
                $('#form').attr('action', url);
                $('#form').submit();
            }
            return false;
        }

        // 集計表
        if (workTimeSum) {
            if (window.confirm(message.replace('{0}','勤務実績集計表'))) {
                var url = $(this).data('url');
                $('#form').attr('action', url);
                $('#form').submit();
            }
            return false;
        }
    });

    // 年月日
    $('.date').datepicker({
        format: 'yyyy年mm月dd日',
        autoclose: true,
        language: 'ja', // カレンダー日本語化のため
    });
    $('.date').on('click', function(event){$(event.target).focusout().focus()});
    $('.date').on('input', function(event){$(event.target).datepicker('show')});

    // 年月
    $('.yearMonth').datepicker({
        format: 'yyyy年mm月',
        autoclose: true,
        language: 'ja', // カレンダー日本語化のため
        minViewMode : 1
    });
    $('.yearMonth').on('click', function(event){$(event.target).focusout().focus()});
    $('.yearMonth').on('input', function(event){$(event.target).datepicker('show')});

    // 入力可能文字：半角英数
    onlyHalfWord = n => n.replace(/[０-９Ａ-Ｚａ-ｚ]/g, s => String.fromCharCode(s.charCodeAt(0) - 65248))
            .replace(/[^0-9a-zA-Z]/g, '');

    $('#chkRegCls').change(ele => {
        if (ele.target.checked) {
            $(".txtEmpName").data('regclscd', '00');
        } else {
            $(".txtEmpName").data('regclscd', '')
        }
    })
})
</script>
@endsection
