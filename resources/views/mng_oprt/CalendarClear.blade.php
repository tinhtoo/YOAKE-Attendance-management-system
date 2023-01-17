<!-- カレンダー情報クリア処理画面 -->
@extends('menu.main')
@section('title', 'カレンダー情報クリア処理')
@section('content')
    <div id="contents-stage">
        <table class="BaseContainerStyle1">
            <tbody>
                <tr>
                    <td>
                        <div id="ctl00_cphContentsArea_UpdatePanel1">
                            <form action="" method="POST" id="form" >
                                {{ csrf_field() }}
                                <table class="InputFieldStyle1">
                                    <tbody>
                                        <tr>
                                            <th>対象月度</th>
                                            <td>
                                                <input type="text"
                                                        name="ym"
                                                        id="tm"
                                                        class="ym"
                                                        autocomplete="off"
                                                        onfocus="this.select();"
                                                        autofocus
                                                        tabindex="1"
                                                        style="width: 80px;"
                                                        value="{{ old('ym') }}"
                                                />
                                                @error('ym')
                                                <span class="text-danger valid-error">{{ getArrValue($error_messages, $message) }}</span>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>社員番号</th>
                                            <td>
                                                <input name="txtEmpCd"
                                                    id="txtEmpCd"
                                                    class="searchEmpCd txtEmpCd"
                                                    style="width: 80px;"
                                                    type="text"
                                                    maxlength="10"
                                                    onfocus="this.select();"
                                                    value="{{ old('txtEmpCd') }}"
                                                    oninput="value=onlyHalfNumWord(value)"
                                                    tabindex="2"
                                                    >
                                                <input name="btnSearchEmpCd"
                                                    class="SearchButton eraseError"
                                                    id="btnSearchEmpCd"
                                                    type="button"
                                                    value="?"
                                                    onclick="SearchEmp(this);return false"
                                                    tabindex="3"
                                                >
                                                <input name="empName"
                                                    class="txtEmpName"
                                                    type="text"
                                                    style="width: 200px; display: inline-block;"
                                                    id="empName"
                                                    data-regclscd=00,01 data-isdeptauth=true
                                                    disabled="disabled"
                                                >
                                                @error('txtEmpCd')
                                                <span class="text-danger valid-error" id="EmpCdValidError">{{ getArrValue($error_messages, $message) }}</span>
                                                @enderror
                                                <span class="text-danger" id="EmpCdError"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>最新カレンダー年月</th>
                                            <td>
                                                <input type="text" id="lastYM" name="lastYM" disabled style="width:80px" value="{{ old('lastYM') }}"></span>
                                                <input type="button" id="getLastYM" tabindex="4" class="SearchButton eraseError" value="表示">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>

                            <div style="width:100%; display:table; text-align:center; margin:30px 0px">
                                <span style="font-size:1.1em; color: red; vertical-align:middle; display:table-cell;">
                                    打刻情報は削除されませんが、打刻時間は初期化されます。
                                </span>
                            </div>

                            <div class="line"></div>

                            <p class="ButtonField1">
                                <input name="btnDataClear" tabindex="5"
                                    id="btnDataClear"
                                    class="clear"
                                    data-url = "{{ route('CalendarClear.clear')}}"
                                    type="button" value="更新">
                                <input name="btnCancel" tabindex="6"
                                    id="btnCancel"
                                    class="cancel"
                                    onclick="location.href='{{ url('mng_oprt/CalendarClear') }}'"
                                    type="button" value="キャンセル">
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

    var disableFlg = false;
    $(document).on('click', '#getLastYM', function() {
        disableFlg = true;
        var target = $("#lastYM");
        target.prop("disabled", false);
        target.val('');
        target.prop("disabled", true);

        var empCd = $('#txtEmpCd').val();
        if (!empCd) {
            return false;
        }
        $.get('/search/GetLastCald/' + empCd, function(data) {
            if (data) {
                var target = $("#lastYM");
                target.prop("disabled", false);
                target.val(data.last_cald);
                target.prop("disabled", true);
                $('#btnDataClear').focus();
            }
            disableFlg = false;
        });
    });

    // 入力可能文字：半角英数字・文字
    onlyHalfNumWord = n => n.replace(/[０-９Ａ-Ｚａ-ｚ]/g, s => String.fromCharCode(s.charCodeAt(0) - 65248))
        .replace(/[^0-9a-zA-Z]/g, '');

    // 更新
    $(document).on('click', '.clear', function() {
        if (!window.confirm("{{ getArrValue($error_messages, 3002) }}")) {
            $(this).focus();
            return false;
        }
        var url = $(this).data('url');
        $('#form').attr('action', url);
        $('#lastYM').prop('disabled', false);
        $('#form').submit();
    });

    $('.ym').datepicker({
        format: 'yyyy年mm月',
        autoclose: true,
        language: 'ja', // カレンダー日本語化のため
        minViewMode : 1
    });
    $('.ym').on('click', function(event){$(event.target).focusout().focus()});
    $('.ym').on('input', function(event){$(event.target).datepicker('show')});

    $("input[type=button].eraseError").click(function(){
        $(".valid-error").text("");
    })

    $("input[type=text].eraseError").change(function(){
        $(".valid-error").text("");
    })
})
</script>
@endsection
