<!-- 月別シフト入力画面 -->
@extends('menu.main')
@section('title', '月別シフト入力')
@section('content')
    <div id="contents-stage">
        <table class="BaseContainerStyle2">
            <tbody>
                <tr>
                    <td>
                        <div id="UpdatePanel1">
                            <form action="" method="post" id="searchForm">
                            @csrf
                                <table class="InputFieldStyle1">
                                    <tbody>
                                        <tr>
                                            <th>対象月度</th>
                                            <td>
                                                <input type="text" class="yearMonth" name="filter[caldYearMonth]" id="yearMonth" autocomplete="off"
                                                    onfocus="this.select();" autofocus tabindex="1" style="width: 100px;"
                                                    @isset($search_results) disabled="disabled" @endisset
                                                    value="{{ old('filter.caldYearMonth', isset($search_data) ? $search_data['caldYearMonth'] : $def_cald_year.'年'.sprintf('%02d', $def_cald_month).'月') }}" />
                                                @error('filter.caldYearMonth')
                                                <span class="text-danger">{{ getArrValue($error_messages, $message) }}</span>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>表示区分</th>
                                            <td>
                                                <div class="GroupBox1" style="width:220px">
                                                    <input type="radio" name="filter[searchCondition]" id="searchDept"
                                                        class="searchCondition" tabindex="2" value="0"
                                                        @isset($search_results) disabled="disabled" @endisset
                                                        {{ old('filter.searchCondition', isset($search_data) && $search_data['searchCondition']) ? '' : 'checked="checked"' ; }} >
                                                    <label for="searchDept" style="padding: 1.5px;">部門</label>
                                                    <input type="radio" name="filter[searchCondition]" id="searchEmp"
                                                        class="searchCondition" tabindex="3" value="1"
                                                        @isset($search_results) disabled="disabled" @endisset
                                                        {{ old('filter.searchCondition', isset($search_data) && $search_data['searchCondition']) ? 'checked="checked"' : '' ; }} >
                                                    <label for="searchEmp" style="padding: 1.5px;">社員</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>締日</th>
                                            <td>
                                                <select name="filter[closingDateCd]" tabindex="4"
                                                    id="closingDateCd" style="width: 150px;"
                                                    @if(old('filter.searchCondition', isset($search_data))) disabled="disabled" @endif>
                                                    @foreach ($closing_dates as $closing_date)
                                                    <option value="{{ $closing_date->CLOSING_DATE_CD }}"
                                                        {{ $closing_date->CLOSING_DATE_CD == (old('closingDateCd', isset($search_data) && !$search_data['searchCondition'] ? $search_data['closingDateCd'] : null ) ?? $def_closing_date_cd) ? 'selected' : '' }}>
                                                        {{ $closing_date->CLOSING_DATE_NAME }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @if(!isset($search_data)) <div style="display:none" id="defClosing">{{ $def_closing_date_cd }}</div> @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>部門</th>
                                            <td>
                                                <input name="filter[txtDeptCd]" tabindex="5" class="txtDeptCd searchDeptCd"
                                                    id="txtDeptCd" style="width: 50px;" type="text" maxlength="6"
                                                    oninput="value=onlyHalfWord(value)" onfocus="this.select();"
                                                    @if(old('filter.searchCondition', isset($search_data))) disabled="disabled" @endif
                                                    value="{{ old('filter.txtDeptCd' , (!empty($search_data) && !$search_data['searchCondition'] ? $search_data['txtDeptCd'] : '')) }}">
                                                <input type="button" name="btnSearchDeptCd" class="SearchButton" id="btnSearchDeptCd"
                                                    @if(old('filter.searchCondition', isset($search_data))) disabled="disabled" @endif
                                                    tabindex="6" value="?" onclick="SearchDept(this);return false">
                                                <input type="text" name="deptName" id="deptName" class="txtDeptName"
                                                    data-dispclscd=01 data-isdeptauth=true
                                                    style="width: 200px; display: inline-block;"
                                                    disabled="disabled">
                                                @error('filter.txtDeptCd')
                                                <span class="text-danger" id="DeptCdValidError">{{ getArrValue($error_messages, $message) }}</span>
                                                @endif
                                                <span class="text-danger" id="deptNameError"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>社員番号</th>
                                            <td>
                                                <input type="text" name="filter[txtEmpCd]" tabindex="7" class="txtEmpCd searchEmpCd"
                                                    id="txtEmpCd" style="width: 80px;" maxlength="10"
                                                    oninput="value=onlyHalfWord(value)" onfocus="this.select();"
                                                    @if(!old('filter.searchCondition') || isset($search_data))) disabled="disabled" @endif
                                                    value="{{ old('filter.txtEmpCd', !empty($search_data) && $search_data['searchCondition'] ? $search_data['txtEmpCd'] : '') }}">
                                                <input type="button" name="btnSearchEmpCd" tabindex="8" class="SearchButton"
                                                    id="btnSearchEmpCd" onclick="SearchEmp(this);return false" value="?"
                                                    @if(!old('filter.searchCondition') || isset($search_data))) disabled="disabled" @endif>
                                                <input name="empName" id="empName" class="txtEmpName" type="text"
                                                    data-regclscd=00,01 data-isdeptauth=true data-calendarclscd=01
                                                    style="width: 200px; display: inline-block;"
                                                    disabled="disabled">
                                                @error('filter.txtEmpCd')
                                                <span class="text-danger" id="EmpCdValidError">{{ getArrValue($error_messages, $message) }}</span>
                                                @endif
                                                <span class="text-danger" id="EmpCdError"></span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>

                            <div class="line"></div>
                            <p>
                                <input type="button" name="view" class="ButtonStyle1 view" id="view1"
                                    tabindex="9" value="表示"
                                    data-url="{{ url('shift/MonthShiftEditor') }}"
                                    @if(isset($search_results)) disabled="disabled" @endif>
                                <input type="button" name="shiftPtn" class="ButtonStyle1 shiftPtn" id="shiftPtn1"
                                    tabindex="10" value="パターン"
                                    @if(!isset($search_results)) disabled="disabled" @endif>
                                <input type="button" name="update" class="ButtonStyle1 update" id="update"
                                    tabindex="11" value="更新"
                                    data-url="{{ url('shift/MonthShiftUpdate') }}"
                                    @if(!isset($search_results)) disabled="disabled" @endif>
                                <input type="button" name="cancel2" class="ButtonStyle1" id="cancel2"
                                    tabindex="12" value="キャンセル"
                                    onclick="location.href='{{ url('shift/MonthShiftEditor') }}'">
                                &nbsp;
                                @if(isset($fix_flg) && $fix_flg)
                                <span class="font-style2" id="lblFixMsg">{{ config('consts.fix_msg')}}</span>
                                @endif
                            </p>


                            <div class="GridViewStyle1 GridViewPanelStyle2" id="shiftCalendar">
                                @isset($search_results)
                                <div class="flow">
                                    <div>
                                        <table class="GridViewRowCenter GridViewBorder" id="gvCalendar1" style="border-collapse: collapse;" border="1" rules="all" cellspacing="0">
                                            <tbody>
                                                <tr class="GridViewHeaderTitle1"><th scope="col">日付</th><th scope="col">曜日</th><th scope="col">勤務体系</th></tr>
                                                @for($i = 0; $i < 15; $i++)
                                                <tr class="calendar_left">
                                                    <td align="center" style="width: 80px;">
                                                        <span {{ $search_results[$i]->CALD_DATE->format('w') == '0'
                                                            || $search_results[$i]->CALD_DATE->format('w') == '6'
                                                            || $holidays->contains($search_results[$i]->CALD_DATE->format('md')) ? 'class=text-danger' : ''}}
                                                            style="width: 80px; display: inline-block;">
                                                            {{ $search_results[$i]->CALD_DATE->format('Y/m/d') }}
                                                        </span>
                                                        <input type="hidden" class="caldDate" name="calendar[{{ $i }}][CALD_DATE]"
                                                                value="{{ $search_results[$i]->CALD_DATE->format('Y/m/d') }}"/>
                                                    </td>
                                                    <td align="center" style="width: 30px;">
                                                        <span {{ $search_results[$i]->CALD_DATE->format('w') == '0'
                                                            || $search_results[$i]->CALD_DATE->format('w') == '6'
                                                            || $holidays->contains($search_results[$i]->CALD_DATE->format('md')) ? 'class=text-danger' : ''}}
                                                            style="width: 30px; display: inline-block;">
                                                            {{ config('consts.weeks')[$search_results[$i]->CALD_DATE->format('w')] }}
                                                        </span>
                                                    </td>
                                                    <td class="GridViewRowLeft" style="width: 280px;">
                                                        <select name="calendar[{{ $i }}][WORKPTN_CD]" id="txtWorkPtnCd{{ $i }}"
                                                            class="workPtnCd coloredSelect" style="width: 276px;" tabindex="13">
                                                            <option style=color:black; value=""></option>
                                                            @foreach ( $workptn_names as $workptn_name)
                                                            <option
                                                                value="{{ $workptn_name->WORKPTN_CD }}"
                                                                {{ $workptn_name->WORK_CLS_CD == '00' ? 'class=text-danger' : 'style=color:black;'}}
                                                                {{ $workptn_name->WORKPTN_CD == $search_results[$i]->WORKPTN_CD ? "selected" : "" }}
                                                            >
                                                                {{$workptn_name->WORKPTN_NAME }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                        <br>
                                                        <span class="text-danger" id="calendarData{{ $i }}workPtnCd"></span>
                                                    </td>
                                                </tr>
                                                @endfor
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="flow">
                                    <div>
                                        <table class="GridViewRowCenter GridViewBorder" id="gvCalendar2" style="border-collapse: collapse;" border="1" rules="all" cellspacing="0">
                                            <tbody>
                                                <tr class="GridViewHeaderTitle1"><th scope="col">日付</th><th scope="col">曜日</th><th scope="col">勤務体系</th></tr>
                                                @for($i = 15; $i < count($search_results); $i++)
                                                <tr class="calendar_right">
                                                    <td align="center" style="width: 80px;">
                                                        <span {{ $search_results[$i]->CALD_DATE->format('w') == '0'
                                                            || $search_results[$i]->CALD_DATE->format('w') == '6'
                                                            || $holidays->contains($search_results[$i]->CALD_DATE->format('md')) ? 'class=text-danger' : ''}}
                                                            style="width: 80px; display: inline-block;">
                                                            {{ $search_results[$i]->CALD_DATE->format('Y/m/d') }}
                                                        </span>
                                                        <input type="hidden" class="caldDate" name="calendar[{{ $i }}][CALD_DATE]"
                                                                value="{{ $search_results[$i]->CALD_DATE->format('Y/m/d') }}"/>
                                                    </td>
                                                    <td align="center" style="width: 30px;">
                                                        <span {{ $search_results[$i]->CALD_DATE->format('w') == '0'
                                                            || $search_results[$i]->CALD_DATE->format('w') == '6'
                                                            || $holidays->contains($search_results[$i]->CALD_DATE->format('md')) ? 'class=text-danger' : ''}}
                                                            style="width: 30px; display: inline-block;">
                                                            {{ config('consts.weeks')[$search_results[$i]->CALD_DATE->format('w')] }}
                                                        </span>
                                                    </td>
                                                    <td class="GridViewRowLeft" style="width: 280px;">
                                                        <select name="calendar[{{ $i }}][WORKPTN_CD]" id="txtWorkPtnCd{{ $i }}"
                                                            class="workPtnCd coloredSelect" style="width: 276px;" tabindex="14">
                                                            <option style=color:black; value=""></option>
                                                            @foreach ( $workptn_names as $workptn_name)
                                                            <option
                                                                value="{{ $workptn_name->WORKPTN_CD }}"
                                                                {{ $workptn_name->WORK_CLS_CD == '00' ? 'class=text-danger' : 'style=color:black;'}}
                                                                {{ $workptn_name->WORKPTN_CD == $search_results[$i]->WORKPTN_CD ? "selected" : "" }}
                                                            >
                                                                {{$workptn_name->WORKPTN_NAME }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                        <br>
                                                        <span class="text-danger" id="calendarData{{ $i }}workPtnCd"></span>
                                                    </td>
                                                </tr>
                                            @endfor
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="clearBoth"></div>
                                <input type="hidden" id="startDate" value={{ $search_results[0]->CALD_DATE->format('Y/m/d') }}>
                                <input type="hidden" id="endDate" value={{ $search_results[count($search_results) - 1]->CALD_DATE->format('Y/m/d') }}>
                                <input type="hidden" id="endShiftptnCd" value="{{ $last_shift_ptn_cd }}">
                                <input type="hidden" id="endDayNo" value="{{ $last_day_no }}">
                                <script type="text/javascript">
                                    document.getElementById('txtWorkPtnCd0').focus();
                                </script>
                                @endisset
                            </div>


                            <div class="line"></div>
                            <p class="ButtonField2">
                                <input type="button" name="btnCancel" id="btnCancel"
                                    tabindex="15" value="キャンセル"
                                    onclick="location.href='{{ url('shift/MonthShiftEditor') }}'">
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
        // ENTER時に送信されないようにする
        $('input').not('[type="button"]').keypress(function(e) {
            if (e.which == 13) {
                return false;
            }
        });

        // 検索条件制御
        $('.searchCondition').change(function(ele) {
            if (ele.target.value === '1') {
                // 社員
                $('#closingDateCd').val($('#defClosing').text());
                $('#closingDateCd').attr('disabled', 'disabled');
                $('#txtDeptCd').attr('disabled', 'disabled');
                $('#btnSearchDeptCd').attr('disabled', 'disabled');
                $('#txtDeptCd').val('');
                $('#deptName').val('');
                $('#beforeDept').val('');
                $('#txtEmpCd').attr('disabled', false);
                $('#btnSearchEmpCd').attr('disabled', false);
            } else {
                // 部門
                $('#closingDateCd').attr('disabled', false);
                $('#txtDeptCd').attr('disabled', false);
                $('#btnSearchDeptCd').attr('disabled', false);
                $('#txtEmpCd').val('');
                $('#empName').val('');
                $('#beforeEmp').val('');
                $('#txtEmpCd').attr('disabled', 'disabled');
                $('#btnSearchEmpCd').attr('disabled', 'disabled');
            }
            $('.text-danger').text('');
        });

        // 明細表示
        $(document).on('click', '.view', function() {
            var url = $(this).data('url');
            $('#searchForm').attr('action', url);
            $('#searchForm').submit();
        });

        // 更新
        var disableFlg = false;
        $(document).on('click', '.update', function() {
            if (disableFlg || !window.confirm("{{ getArrValue($error_messages, 1005) }}")) {
                return false;
            }
            disableFlg = true;
            var calendarData = [];
            $('.calendar_left').each(function(i,element) {
                calendarData[i] = {
                    'caldDate': $(element).find('.caldDate').val(),
                    'workPtnCd': $(element).find('.workPtnCd').val(),
                };
            })
            $('.calendar_right').each(function(i,element) {
                calendarData[i + 15] = {
                    'caldDate': $(element).find('.caldDate').val(),
                    'workPtnCd': $(element).find('.workPtnCd').val(),
                };
            })
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:$(this).data('url'),
                type:'POST',
                data:{
                    'caldYM':$("#yearMonth").val(),
                    'searchCondition':$('.searchCondition:checked').val(),
                    'closingDateCd':$('#closingDateCd').val(),
                    'txtDeptCd':$('#txtDeptCd').val(),
                    'txtEmpCd':$('#txtEmpCd').val(),
                    'calendarData':calendarData,
                    'endShiftptnCd':$('#endShiftptnCd').val(),
                    'endDayNo':$('#endDayNo').val(),
                }
            })
            .done((data, textStatus, jqXHR) => {
                location.href='{{ url('shift/MonthShiftEditor') }}';
            })
            .fail ((jqXHR, textStatus, errorThrown) => {
                $.each(jqXHR.responseJSON.errors, function(i, value) {
                    if (i.slice(0,13) !== 'calendarData.') {
                        location.href='{{ url('shift/MonthShiftEditor') }}';
                    }
                    $('#' + i.replaceAll('.', '')).text(value[0]);
                });
                disableFlg = false;
                $('#btnUpdate').focus();
            });

            return false;
        });

        // パターンダイアログ表示
        $('.shiftPtn').click(function() {
            // パターン選択　子ウィンドウ表示
            var paramObject = {};
            paramObject['startDate'] = $('#startDate').val();
            paramObject['endDate'] = $('#endDate').val();
            var searchParam = new URLSearchParams(paramObject).toString();
            var param = '?' + searchParam;
            var url = '/shift/ShiftPtnSearch' + param;
            popupPtn = window.open(url, 'シフトパターン選択', 'height=635,width=500,left=400,top=90,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');
            window.focus();
            popupPtn.focus();
        });

        // 値選択後、エラー文言削除
        $('.workPtnCd').change(function() {
            if ($(this).val() && $(this).parent().find('span').text()) {
                $(this).parent().find('span').text("");
            }
        });

        // プルダウンの色設定
        var changeColor = function() {
            $(".coloredSelect").each(function(i,e){
                $(e).css('color', $(e).children("option:selected").css("color"))
            });
        };
        changeColor();
        $(".coloredSelect").on('change', (ele) => {
            $(ele.target).css('color', $(ele.target).children("option:selected").css("color"))
        });

        // カレンダー機能の設定
        $('.yearMonth').datepicker({
            format: 'yyyy年mm月',
            autoclose: true,
            language: 'ja',
            minViewMode: 1,
            startDate: '{{ $def_cald_year - 1 }}年01月',
            endDate: '{{ $def_cald_year + 1 }}年12月'
        });
        $('.yearMonth').on('click', function(event){$(event.target).focusout().focus()});
        $('.yearMonth').on('input', function(event){$(event.target).datepicker('show')});

        // 入力可能文字：半角英文字・数字のみ
        onlyHalfWord = n => n.replace(/[０-９Ａ-Ｚａ-ｚ]/g, s => String.fromCharCode(s.charCodeAt(0) - 65248))
                            .replace(/[^0-9a-zA-Z]/g, '');
    });
</script>
@endsection
