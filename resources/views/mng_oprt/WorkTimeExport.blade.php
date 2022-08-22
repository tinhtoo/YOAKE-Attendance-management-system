<!-- 勤務実績情報出力画面 -->
@extends('menu.main')
@section('title', '勤務実績情報出力')
@section('content')
<div id="contents-stage">
    <table class="BaseContainerStyle1">
        <tbody>
            <tr>
                <td>
                    <form action="" method="POST" id="form" >
                        {{ csrf_field() }}
                        <div id="UpdatePanel1">
                            <table class="InputFieldStyle1">
                                <tbody>
                                    <tr>
                                        <th>出力区分</th>
                                        <td>
                                            <div class="GroupBox1" style="width: 220px">
                                                <input type="radio"
                                                        name="filter[exportCategory]"
                                                        id="detailCls"
                                                        value="0"
                                                        tabindex="1"
                                                        class="exportCategory"
                                                        @if(empty($errors->all())) autofocus @endif
                                                        {{ old('filter.exportCategory') ? '' : 'checked' }}>
                                                <label for="detailCls" style="padding: 1.5px 0 0 3px;">明細</label>
                                                <input type="radio"
                                                        name="filter[exportCategory]"
                                                        id="totalCls"
                                                        value="1"
                                                        tabindex="2"
                                                        class="exportCategory"
                                                        {{ old('filter.exportCategory') ? 'checked' : '' }}>
                                                <label for="totalCls" style="padding: 1.5px 0 0 3px;">集計</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>開始対象日</th>
                                        <td>
                                            <input type="text"
                                                    name="filter[startDate]"
                                                    id="startDate"
                                                    class="date"
                                                    autocomplete="off"
                                                    onfocus="this.select();"
                                                    tabindex="3"
                                                    value="{{ old('filter.startDate') }}">
                                            <span class="text-danger error">
                                                @error('filter.startDate')
                                                {{ getArrValue($error_messages, $message) }}
                                                @enderror
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>終了対象日</th>
                                        <td>
                                            <input type="text"
                                                    name="filter[endDate]"
                                                    id="endDate"
                                                    class="date"
                                                    autocomplete="off"
                                                    onfocus="this.select();"
                                                    tabindex="4"
                                                    value="{{ old('filter.endDate') }}">
                                            <span class="text-danger error">
                                                @error('filter.endDate')
                                                {{ getArrValue($error_messages, $message) }}
                                                @enderror
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>開始部門コード</th>
                                        <td>
                                            <input name="filter[txtStartDeptCd]"
                                                type="text"
                                                tabindex="5"
                                                id="txtDeptCd"
                                                class="txtDeptCd searchDeptCd startDeptCd allErrorRemoveWhenChange"
                                                style="width: 50px;"
                                                onfocus="this.select();"
                                                oninput="value=onlyHalfNumWord(value)"
                                                autocomplete="off"
                                                maxlength="6"
                                                value="{{ old('filter.txtStartDeptCd') }}">
                                            <input name="btnSearchStartDeptCd"
                                                type="button"
                                                tabindex="6"
                                                id="btnSearchStartDeptCd"
                                                class="SearchButton allErrorRemoveWhenClick"
                                                onclick="SearchDept(this);return false"
                                                value="?">
                                            <input class="txtDeptName" id="deptName"
                                                data-dispclscd=01 data-isdeptauth=true
                                                style="width: 200px; display: inline-block;">
                                            <span class="text-danger" id="deptNameError"></span>
                                            @error('filter.txtStartDeptCd')
                                            <span class="text-danger error" id="DeptCdValidError">{{ getArrValue($error_messages, $message) }}</span>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>終了部門コード</th>
                                        <td>
                                            <input name="filter[txtEndDeptCd]"
                                                type="text"
                                                tabindex="7"
                                                id="txtDeptCd"
                                                class="txtDeptCd searchDeptCd endDeptCd allErrorRemoveWhenChange"
                                                style="width: 50px;"
                                                onfocus="this.select();"
                                                oninput="value=onlyHalfNumWord(value)"
                                                autocomplete="off"
                                                maxlength="6"
                                                value="{{ old('filter.txtEndDeptCd') }}">
                                            <input name="btnSearchEndDeptCd"
                                                type="button"
                                                tabindex="8"
                                                id="btnSearchEndDeptCd"
                                                class="SearchButton allErrorRemoveWhenClick"
                                                onclick="SearchDept(this);return false"
                                                value="?">
                                            <input class="txtDeptName" id="deptName"
                                                data-dispclscd=01 data-isdeptauth=true
                                                style="width: 200px; display: inline-block;">
                                            <span class="text-danger" id="deptNameError"></span>
                                            @error('filter.txtEndDeptCd')
                                            <span class="text-danger error" id="DeptCdValidError">{{ getArrValue($error_messages, $message) }}</span>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>開始所属</th>
                                        <td>
                                            <select name="filter[startCompany]"
                                                tabindex="9"
                                                id="startCompany"
                                                style="width: 300px;">
                                                <option value=""></option>
                                                @foreach ($company_list as $company)
                                                    <option value="{{ $company->COMPANY_CD }}"
                                                        {{ old('filter.startCompany') === $company->COMPANY_CD ? 'selected' : ''}}>
                                                        {{ $company->COMPANY_ABR }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger error">
                                                @error('filter.startCompany')
                                                {{ getArrValue($error_messages, $message) }}
                                                @enderror
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>終了所属</th>
                                        <td>
                                            <select name="filter[endCompany]"
                                                tabindex="10"
                                                id="endCompany"
                                                style="width: 300px;">
                                                <option value=""></option>
                                                @foreach ($company_list as $company)
                                                    <option value="{{ $company->COMPANY_CD }}"
                                                        {{ old('filter.endCompany') === $company->COMPANY_CD ? 'selected' : ''}}>
                                                        {{ $company->COMPANY_ABR }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger error">
                                                @error('filter.endCompany')
                                                {{ getArrValue($error_messages, $message) }}
                                                @enderror
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>開始社員番号 </th>
                                        <td>
                                            <input name="filter[txtStartEmpCd]"
                                                type="text"
                                                tabindex="11"
                                                id="txtEmpCd"
                                                class="txtEmpCd searchEmpCd allErrorRemoveWhenChange"
                                                style="width: 80px;"
                                                onfocus="this.select();"
                                                oninput="value=onlyHalfNumWord(value)"
                                                autocomplete="off"
                                                maxlength="10"
                                                value="{{ old('filter.txtStartEmpCd') }}">
                                            <input name="btnSearchStartEmpCd"
                                                type="button"
                                                tabindex="12"
                                                id="btnSearchStartEmpCd"
                                                class="SearchButton allErrorRemoveWhenClick"
                                                onclick="SearchEmp(this);return false"
                                                value="?">
                                            <input class="txtEmpName" id="empName"
                                                @if(old('filter.regCls', empty($errors->all()))) data-regclscd=00 @endif
                                                data-isdeptauth=true
                                                style="width: 200px; display: inline-block;">
                                            <span class="text-danger" id="EmpCdError"></span>
                                            @error('filter.txtStartEmpCd')
                                            <span class="text-danger error" id="EmpCdValidError">{{ getArrValue($error_messages, $message) }}</span>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>終了社員番号</th>
                                        <td>
                                            <input name="filter[txtEndEmpCd]"
                                                type="text"
                                                tabindex="13"
                                                id="txtEmpCd"
                                                class="txtEmpCd searchEmpCd allErrorRemoveWhenChange"
                                                style="width: 80px;"
                                                onfocus="this.select();"
                                                oninput="value=onlyHalfNumWord(value)"
                                                autocomplete="off"
                                                maxlength="10"
                                                value="{{ old('filter.txtEndEmpCd') }}">
                                            <input name="btnSearchEndEmpCd"
                                                type="button"
                                                tabindex="14"
                                                id="btnSearchEndEmpCd"
                                                class="SearchButton allErrorRemoveWhenClick"
                                                onclick="SearchEmp(this);return false"
                                                value="?">
                                            <input class="txtEmpName" id="empName"
                                                @if(old('filter.regCls', empty($errors->all()))) data-regclscd=00 @endif
                                                data-isdeptauth=true
                                                style="width: 200px; display: inline-block;">
                                            <span class="text-danger" id="EmpCdError"></span>
                                            @error('filter.txtEndEmpCd')
                                            <span class="text-danger error" id="EmpCdValidError">{{ getArrValue($error_messages, $message) }}</span>
                                            @enderror
                                        </td>
                                    </tr>
                                </tbody>
                            </table>


                            <input type="checkbox" id="regCls" name="filter[regCls]" tabindex="15" value="00"
                                @if(old('filter.regCls', empty($errors->all()))) checked="checked" @endif style="vertical-align: middle;">
                            <label for="regCls">在籍のみ表示</label>

                            <div class="line"></div>
                            <p class="ButtonField1">
                                <input type="button" id="export" tabindex="16" value="出力"
                                        @if(!empty($errors->all())) autofocus @endif>
                                <input type="button" id="cancel" tabindex="17" value="キャンセル"
                                    onclick="location.href='{{ url('mng_oprt/WorkTimeExport') }}'">
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
$(function() {

    // 入力可能文字：半角英数字・文字
    onlyHalfNumWord = n => n.replace(/[０-９Ａ-Ｚａ-ｚ]/g, s => String.fromCharCode(s.charCodeAt(0) - 65248))
        .replace(/[^0-9a-zA-Z]/g, '');

    // CSV出力
    $('#export').click(() => {
        if (!window.confirm("{{ str_replace('{0}', 'ファイル', getArrValue($error_messages, 1013)) }}")) {
            return false;
        }
        var url = $(this).data('url');
        $('#form').attr('action', url);
        $('#form').submit();
    });

    $('.date').datepicker({
        format: 'yyyy年mm月dd日',
        autoclose: true,
        language: 'ja', // カレンダー日本語化のため
        startDate: '1900年01月01日',
        endDate: '2100年12月31日'
    });

    $('#regCls').change(ele => {
        if (ele.target.checked) {
            $(".txtEmpName").data('regclscd', '00');
        } else {
            $(".txtEmpName").data('regclscd', '')
        }
    })

    $('.date').change(ele => {
        ele.currentTarget.nextElementSibling.textContent = '';
    });

    $('.allErrorRemoveWhenChange').change(() => {
        $('.error').text('');
    });

    $('.allErrorRemoveWhenClick').click(() => {
        $('.error').text('');
    });
})
</script>
@endsection
