<!-- 月次確定状況照会画面 -->
@extends('menu.main')
@section('title', '月次確定状況照会')
@section('content')
    <div id="contents-stage">
        <table class="BaseContainerStyle1">
            <tbody>
                <tr>
                    <td>
                        <div id="ctl00_cphContentsArea_upWorkTimeFix">
                            <form action="" method="post" id="form">
                                @csrf
                                <table class="InputFieldStyle1">
                                    <tbody>
                                        <tr>
                                            <th>対象月度</th>
                                            <td>
                                                <input type="text" id="yearMonth" class="yearMonth" name="yearMonth" autocomplete="off" onfocus="this.select();"
                                                    tabindex="1" style="width: 100px;" autofocus
                                                    value="{{ ((isset($search_data) ? $search_data['yearMonth'] : null ) ?? $view_data['def_year'].'年'.sprintf('%02d', $view_data['def_month']).'月') }}" />
                                                <span class="text-danger error" id="dateError">
                                                @error('yearMonth')
                                                    {{ getArrValue($error_messages, $message) }}
                                                @enderror
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>締日</th>
                                            <td>
                                                <select name="closingDateCd" tabindex="3"
                                                    id="closingDateCd" style="width: 150px;">
                                                    @foreach ($view_data['closing_dates'] as $closing_date)
                                                    <option value="{{ $closing_date->CLOSING_DATE_CD }}"
                                                        {{ $closing_date->CLOSING_DATE_CD == (( isset($search_data) ? $search_data['closingDateCd'] : null ) ?? $view_data['def_closing_date_cd']) ? 'selected' : '' }}>
                                                        {{ $closing_date->CLOSING_DATE_NAME }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <label for="noFix" style="position:relative;padding-left:1.5em;line-height:1.4em;">
                                    <input name="noFix" tabindex="4" id="noFix" type="checkbox" {{ isset($search_data) && !key_exists('noFix', $search_data) ? '' : 'checked' }}
                                        style = "position:absolute;top:2px;bottom:0;left:2px;margin:auto;">
                                    未確定のみ表示
                                </label>

                                <div class="line"></div>
                                <p class="ButtonField2">
                                    <input type="button" value="表示" tabindex="5"
                                        id="btnView" name="btnView" class="ButtonStyle1 view"
                                        data-url="{{ url('mng_oprt/WorkTimeFixReference') }}">
                                    <input type="button" value="キャンセル" tabindex="6"
                                        id="btnCancel" name="btnCancel" class="ButtonStyle1"
                                        onclick="location.href='{{ url('mng_oprt/WorkTimeFixReference') }}'">
                                </p>
                            </form>

                            <div class="GridViewStyle1 mg10" id="gridview-container">
                                <div class="GridViewPanelStyle5" id="ctl00_cphContentsArea_pnlWorkTimeFixReference">
                                    <div>
                                        <table tabindex="7" class="GridViewBorder" id="ctl00_cphContentsArea_gvWorkTimeFixReference" style="border-collapse: collapse;" border="1" rules="all" cellspacing="0">
                                            <tbody>
                                                @isset($results)
                                                    @if($results->isEmpty())
                                                        <tr style="width:70px;">
                                                            <td><span>{{ getArrValue($error_messages, '4029') }}</span></td>
                                                        </tr>
                                                    @else
                                                        <tr class="sticky-head">
                                                            <th class="fixed01" scope="col" style="width: 60px; background: #4682B4; left: 0px;">
                                                                部門コード
                                                            </th>
                                                            <th class="fixed01" scope="col" style="width: 140px; background: #4682B4; left: 0px;">
                                                                部門名
                                                            </th>
                                                            <th class="fixed01" scope="col" style="width: 60px; background: #4682B4; left: 0px;">
                                                                社員番号
                                                            </th>
                                                            <th class="fixed01" scope="col" style="width: 140px; background: #4682B4; left: 0px;">
                                                                社員名
                                                            </th>
                                                            <th class="fixed01" scope="col" style="width: 40px; background: #4682B4; left: 0px;">
                                                                確定
                                                            </th>
                                                        </tr>
                                                        @foreach($results as $result)
                                                        <tr>
                                                            <td class="fixed01" style="left: 0px;">
                                                                {{ $result->DEPT_CD }}
                                                            </td>
                                                            <td class="fixed01" style="left: 0px;">
                                                                {{ $result->DEPT_NAME }}
                                                            </td>
                                                            <td class="fixed01" style="left: 0px;">
                                                                {{ $result->EMP_CD }}
                                                            </td>
                                                            <td class="fixed01" style="left: 0px;">
                                                                {{ $result->EMP_NAME }}
                                                            </td>
                                                            <td class="fixed01" style="left: 0px;">
                                                                {{ $result->FIXED }}
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

                            <div class="line"></div>
                            <p class="ButtonField2">
                                <input type="button" value="キャンセル" tabindex="8"
                                    id="btnCancel" name="btnCancel" class="ButtonStyle1"
                                    onclick="location.href='{{ url('mng_oprt/WorkTimeFixReference') }}'">
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

        // 明細表示
        $(document).on('click', '.view', function() {
            var url = $(this).data('url');
            $('#form').attr('action', url);
            $('#form').submit();
        });

        // カレンダー機能の設定
        $('#yearMonth').datepicker({
            format: 'yyyy年mm月',
            autoclose: true,
            language: 'ja',
            minViewMode: 1,
            startDate: '{{ $view_data['def_year'] - 1 }}年01月',
            endDate: '{{ $view_data['def_year']}}年12月'
        });
        $('#yearMonth').on('click', function(event){$(event.target).focusout().focus()});
        $('#yearMonth').on('input', function(event){$(event.target).datepicker('show')});
    });
</script>
@endsection
