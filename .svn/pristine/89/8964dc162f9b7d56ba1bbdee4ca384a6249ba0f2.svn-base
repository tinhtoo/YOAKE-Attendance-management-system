<!-- 社員情報入力 -->
@extends('menu.main')

@section('title', '社員情報入力')

@section('content')
    <div id="contents-stage">
        <table class="BaseContainerStyle1">
            <form action="" method="post" id="form">
                @csrf
                <div id="ctl00_cphContentsArea_UpdatePanel1">
                    <table class="InputFieldStyle1">
                        <tbody>
                            <tr>
                                <th class="required">社員番号</th>
                                <td>
                                    <input type="text" name="EMP_CD" id="EMP_CD"
                                        value="{{ old('EMP_CD') ?? $emp_data->EMP_CD }}"
                                        style="width: 80px;" maxlength="10" tabindex="1"
                                        oninput="value = onlyHalfWord(value)" onfocus="this.select();"
                                        @if(!is_nullorwhitespace($emp_data->EMP_CD))
                                        disabled
                                        @else
                                        autofocus
                                        @endif
                                    >
                                    @if(!is_nullorwhitespace($emp_data->EMP_CD))
                                    <input type="hidden" name="EMP_CD" value={{ $emp_data->EMP_CD }}>
                                    @endif
                                    @error('EMP_CD')
                                    <span class="text-danger">{{ getArrValue($error_messages, $message) }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th class="required">社員名</th>
                                <td>
                                    <input type="text" name="EMP_NAME" id="EMP_NAME"
                                        value="{{ old('EMP_NAME') ?? $emp_data->EMP_NAME }}"
                                        style="width: 300px;" maxlength="20" tabindex="2"
                                        oninput="value = ngVerticalBar(value)" onfocus="this.select();"
                                        @if(!is_nullorwhitespace($emp_data->EMP_CD))
                                        autofocus
                                        @endif
                                        >
                                    @error('EMP_NAME')
                                    <span class="text-danger">{{ getArrValue($error_messages, $message) }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th class="required">社員カナ名</th>
                                <td>
                                    <input name="EMP_KANA" id="EMP_KANA" tabindex="3"
                                        value="{{ old('EMP_KANA') ?? $emp_data->EMP_KANA }}"
                                        style="width: 160px;" onfocus="this.select();" type="text" maxlength="20">
                                    @error('EMP_KANA')
                                    <span class="text-danger">{{ getArrValue($error_messages, $message) }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th class="required">部門</th>
                                <td>
                                    <input name="DEPT_CD" id="txtDeptCd" style="width: 50px;" class="searchDeptCd txtDeptCd"
                                        type="text" tabindex="4" maxlength="6" oninput="value = onlyHalf(value)" onfocus="this.select();"
                                        value="{{ old('DEPT_CD', !empty($search_data['DEPT_CD']) ? $search_data['DEPT_CD'] : $emp_data->DEPT_CD) }}">
                                    <input name="btnSearchDeptCd" class="SearchButton" id="btnSearchDeptCd"
                                        tabindex="5" type="button" value="?" onclick="SearchDept(this);return false">
                                    <input name="deptName" type="text" class="txtDeptName" style="width: 200px; height: 23px; display: inline-block;"
                                        id="deptName" value="{{ old('deptName', !empty($request_data['deptName']) ? $request_data['deptName']:'') }}"
                                        disabled data-dispclscd=01>
                                    @error('DEPT_CD')
                                    <span class="text-danger" id="DeptCdValidError">{{ getArrValue($error_messages, $message) }}</span>
                                    @enderror
                                    <span class="text-danger" id="deptNameError"></span>
                                </td>
                            </tr>
                            <tr>
                                <th>入社年月日</th>
                                <td>
                                    <input type="text"
                                        name="ENT_DATE"
                                        class="yearMonthDay"
                                        autocomplete="off"
                                        onfocus="this.select();"
                                        tabindex="6"
                                        value="{{ old('ENT_DATE', (!empty($emp_data->ENT_YEAR) ? $emp_data->ENT_YEAR.'年'.sprintf('%02d', $emp_data->ENT_MONTH).'月'.sprintf('%02d', $emp_data->ENT_DAY).'日' : '')) }}"
                                    >
                                    @error('ENT_DATE')
                                    <span class="text-danger">{{ getArrValue($error_messages, $message) }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th>退職年月日</th>
                                <td>
                                    <input type="text"
                                        name="RET_DATE"
                                        class="yearMonthDay"
                                        autocomplete="off"
                                        onfocus="this.select();"
                                        tabindex="7"
                                        value="{{ old('RET_DATE', (!empty($emp_data->RET_YEAR) ? $emp_data->RET_YEAR.'年'.sprintf('%02d', $emp_data->RET_MONTH).'月'.sprintf('%02d', $emp_data->RET_DAY).'日' : '')) }}"
                                    >
                                    @error('RET_DATE')
                                    <span class="text-danger">{{ getArrValue($error_messages, $message) }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th class="required">在籍区分</th>
                                <td>
                                    <select name="REG_CLS_CD" tabindex="8"
                                        id="REG_CLS_CD" style="width: 80px;">
                                        <option value=""></option>
                                    @foreach ($reg_cls_cd as $regClsCd)
                                        <option value="{{ $regClsCd->CLS_DETAIL_CD }}"
                                            {{ $regClsCd->CLS_DETAIL_CD == (old('REG_CLS_CD') ?? $emp_data->REG_CLS_CD) ? 'selected' : '' }}>
                                            {{ $regClsCd->CLS_DETAIL_NAME }}
                                        </option>
                                    @endforeach
                                    </select>
                                    @error('REG_CLS_CD')
                                    <span class="text-danger">{{ getArrValue($error_messages, $message) }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th>生年月日</th>
                                <td>
                                    <input type="text"
                                        name="BIRTH_DATE"
                                        class="yearMonthDay"
                                        autocomplete="off"
                                        onfocus="this.select();"
                                        tabindex="9"
                                        value="{{ old('BIRTH_DATE', (!empty($emp_data->BIRTH_YEAR) ? $emp_data->BIRTH_YEAR.'年'.sprintf('%02d', $emp_data->BIRTH_MONTH).'月'.sprintf('%02d', $emp_data->BIRTH_DAY).'日' : '')) }}"
                                    >
                                    @error('BIRTH_DATE')
                                    <span class="text-danger">{{ getArrValue($error_messages, $message) }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th class="required">性別</th>
                                <td>
                                    <select name="SEX_CLS_CD" tabindex="10" id="SEX_CLS_CD" style="width:50px;">
                                        <option value=""></option>
                                    @foreach ($sex_cls_cd as $sexClsCd)
                                        <option value="{{ $sexClsCd->CLS_DETAIL_CD }}"
                                            {{ $sexClsCd->CLS_DETAIL_CD == (old('SEX_CLS_CD') ?? $emp_data->SEX_CLS_CD) ? 'selected' : '' }}>
                                            {{ $sexClsCd->CLS_DETAIL_NAME }}
                                        </option>
                                    @endforeach
                                    </select>
                                    @error('SEX_CLS_CD')
                                    <span class="text-danger">{{ getArrValue($error_messages, $message) }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th class="required">社員区分</th>
                                <td>
                                    <select name="EMP_CLS1_CD" tabindex="11" id="EMP_CLS1_CD" style="width: 300px;">
                                        <option value=""></option>
                                    @foreach ($emp_csl1_cd as $empCls1Cd))
                                        <option value="{{ $empCls1Cd->DESC_DETAIL_CD }}"
                                            {{ $empCls1Cd->DESC_DETAIL_CD == (old('EMP_CLS1_CD') ?? $emp_data->EMP_CLS1_CD) ? 'selected' : '' }}>
                                            {{ $empCls1Cd->DESC_DETAIL_NAME }}
                                        </option>
                                    @endforeach
                                    </select>
                                    @error('EMP_CLS1_CD')
                                    <span class="text-danger">{{ getArrValue($error_messages, $message) }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th class="required">使用カレンダー</th>
                                <td>
                                    <select name="CALENDAR_CD" tabindex="12" id="CALENDAR_CD" style="width: 300px;">
                                        <option value=""></option>
                                    @foreach ($calendar_cd as $calendarCd))
                                        <option value="{{ $calendarCd->CALENDAR_CD }}"
                                            {{ $calendarCd->CALENDAR_CD == (old('CALENDAR_CD') ?? $emp_data->CALENDAR_CD) ? 'selected' : '' }}>
                                            {{ $calendarCd->CALENDAR_NAME }}
                                        </option>
                                    @endforeach
                                    </select>
                                    @error('CALENDAR_CD')
                                    <span class="text-danger">{{ getArrValue($error_messages, $message) }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th>部門権限</th>
                                <td>
                                    <select name="DEPT_AUTH_CD" tabindex="13" id="DEPT_AUTH_CD" style="width: 300px;"
                                    @if(!$can_change_dept)
                                    disabled
                                    @endif
                                    >
                                        <option value=""></option>
                                    @foreach ($dept_auth_cd as $deptAuthCd)
                                        <option value="{{ $deptAuthCd->DEPT_AUTH_CD }}"
                                            {{ $deptAuthCd->DEPT_AUTH_CD == (old('DEPT_AUTH_CD') ?? $emp_data->DEPT_AUTH_CD) ? 'selected' : '' }}>
                                            {{ $deptAuthCd->DEPT_AUTH_NAME }}
                                        </option>
                                    @endforeach
                                    </select>
                                    @if(!$can_change_dept)
                                    <input type=hidden name='DEPT_AUTH_CD' value={{ $emp_data->DEPT_AUTH_CD }}>
                                    @endif
                                    @error('DEPT_AUTH_CD')
                                    <span class="text-danger">{{ getArrValue($error_messages, $message) }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th>郵便番号</th>
                                <td>
                                    <input name="POST_CD" tabindex="14" id="POST_CD"
                                        oninput="value = onlyNubersBar(value)" onfocus="this.select();"
                                        value="{{ old('POST_CD') ?? $emp_data->POST_CD }}"
                                        style="width:70px;" type="text" maxlength="8">
                                    @error('POST_CD')
                                    <span class="text-danger">{{ getArrValue($error_messages, $message) }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th>住所１</th>
                                <td>
                                    <input name="ADDRESS1" tabindex="15" id="ADDRESS1" onfocus="this.select();"
                                        value="{{ old('ADDRESS1') ?? $emp_data->ADDRESS1 }}"
                                        style="width: 430px;" type="text" maxlength="30">
                                    @error('ADDRESS1')
                                    <span class="text-danger">{{ getArrValue($error_messages, $message) }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th>住所２</th>
                                <td>
                                    <input name="ADDRESS2" tabindex="16" id="ADDRESS2" onfocus="this.select();"
                                        value="{{ old('ADDRESS2') ?? $emp_data->ADDRESS2 }}"
                                        style="width: 430px;" type="text" maxlength="30">
                                    @error('ADDRESS2')
                                    <span class="text-danger">{{ getArrValue($error_messages, $message) }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th>電話番号</th>
                                <td>
                                    <input type="text" name="TEL" id="TEL" tabindex="17"
                                        oninput="value = onlyNubersBar(value)" onfocus="this.select();"
                                        value="{{ old('TEL') ?? $emp_data->TEL }}"
                                        style="width: 120px;" maxlength="15">
                                    @error('TEL')
                                    <span class="text-danger">{{ getArrValue($error_messages, $message) }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th>携帯番号</th>
                                <td>
                                    <input type="text" name="CELLULAR" id="CELLULAR" tabindex="18"
                                        oninput="value = onlyNubersBar(value)" onfocus="this.select();"
                                        value="{{ old('CELLULAR') ?? $emp_data->CELLULAR }}"
                                        style="width: 120px;" maxlength="15">
                                    @error('CELLULAR')
                                    <span class="text-danger">{{ getArrValue($error_messages, $message) }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th>Ｅメール</th>
                                <td>
                                    <input type="text" name="MAIL" id="MAIL" tabindex="19"
                                        oninput="value = onlyHalf(value)" onfocus="this.select();"
                                        value="{{ old('MAIL') ?? $emp_data->MAIL }}"
                                        style="width: 360px;" maxlength="50">
                                    @error('MAIL')
                                    <span class="text-danger">{{ getArrValue($error_messages, $message) }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th>有休付与算出基準年月</th>
                                <td>
                                    <input
                                        type="text"
                                        class="yearMonth"
                                        name="PH_GRANT_YM"
                                        autocomplete="off"
                                        onfocus="this.select();"
                                        style="width: 100px;"
                                        tabindex="20"
                                        id="PH_GRANT_YM"
                                        value="{{ old('PH_GRANT_YM', (!empty($emp_data->PH_GRANT_YEAR) ? $emp_data->PH_GRANT_YEAR.'年'.sprintf('%02d', $emp_data->PH_GRANT_MONTH).'月' : '')) }}"
                                    >
                                    @error('PH_GRANT_YM')
                                    <span class="text-danger">{{ getArrValue($error_messages, $message) }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th class="required">職種区分</th>
                                <td>
                                    <select name="EMP_CLS2_CD" id="EMP_CLS2_CD" tabindex="21" style="width: 300px;">
                                        <option value=""></option>
                                    @foreach ($emp_csl2_cd as $empCls2Cd))
                                        <option value="{{ $empCls2Cd->DESC_DETAIL_CD }}"
                                            {{ $empCls2Cd->DESC_DETAIL_CD == (old('EMP_CLS2_CD') ?? $emp_data->EMP_CLS2_CD) ? 'selected' : '' }}>
                                            {{ $empCls2Cd->DESC_DETAIL_NAME }}
                                        </option>
                                    @endforeach
                                    </select>
                                    @error('EMP_CLS2_CD')
                                    <span class="text-danger">{{ getArrValue($error_messages, $message) }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th class="required">締日</th>
                                <td>
                                    <select name="CLOSING_DATE_CD" id="CLOSING_DATE_CD" tabindex="22" style="width: 150px;"
                                    @if($closing_date_disable)
                                    disabled
                                    @endif
                                    >
                                        <option value=""></option>
                                    @foreach ($closing_date_cd_list as $closing_date_cd))
                                        <option value="{{ $closing_date_cd->CLOSING_DATE_CD }}"
                                            {{ $closing_date_cd->CLOSING_DATE_CD == (old('CLOSING_DATE_CD', isset($emp_data) ? $emp_data['CLOSING_DATE_CD'] : null ) ?? $def_closing_date_cd) ? 'selected' : '' }}>
                                            {{ $closing_date_cd->CLOSING_DATE_NAME }}
                                        </option>
                                    @endforeach
                                    </select>
                                    @error('CLOSING_DATE_CD')
                                    <span class="text-danger">{{ getArrValue($error_messages, $message) }}</span>
                                    @enderror
                                </td>
                                @if($closing_date_disable)
                                <input type=hidden name='CLOSING_DATE_CD' value={{ $emp_data->CLOSING_DATE_CD }}>
                                @endif
                            </tr>
                            <tr>
                                <th>所属</th>
                                <td>
                                    <select name="COMPANY_CD" id="COMPANY_CD" tabindex="23" style="width: 150px;">
                                        <option value=""></option>
                                    @foreach ($company_cd as $companyCd))
                                        <option value="{{ $companyCd->COMPANY_CD }}"
                                            {{ $companyCd->COMPANY_CD == (old('COMPANY_CD') ?? $emp_data->COMPANY_CD) ? 'selected' : '' }}>
                                            {{ $companyCd->COMPANY_ABR }}
                                        </option>
                                    @endforeach
                                    </select>
                                    @error('COMPANY_CD')
                                    <span class="text-danger">{{ getArrValue($error_messages, $message) }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th>社員番号２</th>
                                <td>
                                    <input type="text" name="EMP2_CD" id="EMP2_CD" tabindex="24"
                                        oninput="value = onlyHalfWord(value)" onfocus="this.select();"
                                        value="{{ old('EMP2_CD') ?? $emp_data->EMP2_CD }}"
                                        style="width: 80px;" maxlength="10"
                                    >
                                    @error('EMP2_CD')
                                    <span class="text-danger">{{ getArrValue($error_messages, $message) }}</span>
                                    @enderror
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <input type="hidden" name="change" value="{{ $emp_data->EMP_CD }}">
                    <div class="line"></div>

                    <p class="ButtonField1">
                        <input type="button" value="更新" name="btnUpdate" tabindex="25" id="btnUpdate"
                            class="ButtonStyle1 update"
                            data-url="{{ url('master/MT10EmpUpdate') }}">

                        <input type="button" name="btnCancel" tabindex="26" id="btnCancel"
                            class="ButtonStyle1" value="キャンセル"
                            onclick="location.reload();"
                        >
                        <input type="button" name="btnDelete" tabindex="27" id="btnDelete"
                            class="ButtonStyle1 delete" value="削除"
                            @if(is_nullorwhitespace($emp_data->EMP_CD))
                            disabled="disabled"
                            @else
                            data-url="{{ url('master/MT10EmpDelete') }}"
                            @endif
                        >
                    </p>
                </div>
            </form>
        </table>
    </div>

@endsection

@section('script')
<script>
    $(function() {
        // ENTER時に送信されないようにする
        $('input').not('[type="button"]').keypress(function(e) {
            if (e.which == 13) {
                return false;
            }
        });

        // カレンダー機能の設定
        $(function() {
            $('.yearMonth').datepicker({
                format: 'yyyy年mm月',
                autoclose: true,
                language: 'ja',
                minViewMode: 1,
                startDate: '1900年01月',
                endDate: '2100年12月'
            });
        });
        $('.yearMonth').on('click', function(event){$(event.target).focusout().focus()});
        $('.yearMonth').on('input', function(event){$(event.target).datepicker('show')});
        $('.yearMonthDay').datepicker({
            format: 'yyyy年mm月dd日',
            autoclose: true,
            language: 'ja',
            startDate: '1900年01月01日',
            endDate: '2100年12月31日'
        });
        $('.yearMonthDay').on('click', function(event){$(event.target).focusout().focus()});
        $('.yearMonthDay').on('input', function(event){$(event.target).datepicker('show')});

        // 入力制御関連
        // 入力可能文字：半角
        onlyHalf = n => n.replace(/[０-９Ａ-Ｚａ-ｚ]/g, s => String.fromCharCode(s.charCodeAt(0) - 65248))
            .replace(/[^-a-zA-Z0-9+=^$*.\[\]{}()?\"\'!@#%&\/\\\\,><:;_~|`+=]/g, '');
        // 入力可能文字：半角英数
        onlyHalfWord = n => n.replace(/[０-９Ａ-Ｚａ-ｚ]/g, s => String.fromCharCode(s.charCodeAt(0) - 65248))
            .replace(/[^0-9a-zA-Z]/g, '');
        // 所属番号英数半角のみ入力可
        onlyHalfNumber = n => n.replace(/[０-９]/g, s => String.fromCharCode(s.charCodeAt(0) - 65248))
            .replace(/\D/g, '');
        // 入力可能文字：数値、ハイフン
        onlyNubersBar = n => n.replace(/[０-９]/g, s => String.fromCharCode(s.charCodeAt(0) - 65248))
            .replace(/[ー]/g, '-')
            .replace(/[^-\d]/g, '');
        // 入力不可能文字：|
        ngVerticalBar = n => n.replace(/\|/g, '');

        // 更新submit-form
        $(document).on('click', '.update', function() {
            if (window.confirm("{{ getArrValue($error_messages, 1005) }}")) {
                var url = $(this).data('url');
                $('#form').attr('action', url);
                $('#form').submit();
            }
            return false;
        });

        // 削除処理submit-form
        $(document).on('click', '.delete', function() {
            if (window.confirm("{{ getArrValue($error_messages, 1004) }}")) {
                var url = $(this).data('url');
                $('#form').attr('action', url);
                $('#form').submit();
            }
            return false;
        });
    });
</script>
@endsection
