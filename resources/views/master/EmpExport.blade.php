<!-- 社員情報書出処理 -->
@extends('menu.main')

@section('title','社員情報書出処理 ')

@section('content')
<div id="contents-stage">
    <table class="BaseContainerStyle2">
        <tbody>
            <tr>
                <td>
                    <div id="UpdatePanel4">
                        <div class="clearBoth"></div>
                        <form action="" method="POST" id="form" >
                            {{ csrf_field() }}

                                <table class="InputFieldStyle1">
                                    <tbody>
                                        <tr>
                                            <th>開始部門コード</th>
                                            <td>
                                                <input name="filter[txtStartDeptCd]"
                                                    tabindex="1"
                                                    @if(empty($errors->all())) autofocus @endif
                                                    autocomplete="off"
                                                    onfocus="this.select();"
                                                    oninput="value=onlyHalfNumWord(value)"
                                                    class="txtDeptCd searchDeptCd startDeptCd allErrorRemoveWhenChange"
                                                    maxlength="6"
                                                    id="txtDeptCd"
                                                    style="width: 50px;"
                                                    type="text"
                                                    value="{{ old('filter.txtStartDeptCd') }}">
                                                <input name="btnSearchStartDeptCd"
                                                    tabindex="2"
                                                    class="SearchButton allErrorRemoveWhenClick"
                                                    id="btnSearchStartDeptCd"
                                                    onclick="SearchDept(this);return false"
                                                    type="button"
                                                    value="?">
                                                <input class="txtDeptName"
                                                    id="deptName"
                                                    data-isdeptauth=true
                                                    style="width: 200px; display: inline-block;">
                                                <span class="text-danger" id="deptNameError"></span>
                                                @error('filter.txtStartDeptCd')
                                                    <span class="text-danger" id="DeptCdValidError">{{ getArrValue($error_messages, $errors->first('filter.txtStartDeptCd')) }}</span>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>終了部門コード</th>
                                            <td>
                                                <input name="filter[txtEndDeptCd]"
                                                    tabindex="3"
                                                    autocomplete="off"
                                                    onfocus="this.select();"
                                                    oninput="value=onlyHalfNumWord(value)"
                                                    class="txtDeptCd searchDeptCd endDeptCd allErrorRemoveWhenChange"
                                                    maxlength="6"
                                                    id="txtDeptCd"
                                                    style="width: 50px;"
                                                    type="text"
                                                    value="{{ old('filter.txtEndDeptCd') }}">
                                                <input name="btnSearchEndDeptCd"
                                                    tabindex="4"
                                                    class="SearchButton allErrorRemoveWhenClick"
                                                    id="btnSearchEndDeptCd"
                                                    onclick="SearchDept(this);return false"
                                                    type="button"
                                                    value="?">
                                                <input class="txtDeptName"
                                                    id="deptName"
                                                    data-isdeptauth=true
                                                    style="width: 200px; display: inline-block;">
                                                <span class="text-danger" id="deptNameError"></span>
                                                @error('filter.txtEndDeptCd')
                                                    <span class="text-danger" id="DeptCdValidError">{{ getArrValue($error_messages, $errors->first('filter.txtEndDeptCd')) }}</span>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>開始社員番号</th>
                                            <td>
                                                <input name="filter[txtStartEmpCd]"
                                                    type="text"
                                                    tabindex="5"
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
                                                    tabindex="6"
                                                    id="btnSearchStartEmpCd"
                                                    class="SearchButton allErrorRemoveWhenClick"
                                                    onclick="SearchEmp(this);return false"
                                                    value="?">
                                                <input class="txtEmpName" id="empName"
                                                    data-isdeptauth=true
                                                    style="width: 200px; display: inline-block;">
                                                <span class="text-danger" id="EmpCdError"></span>
                                                @error('filter.txtStartEmpCd')
                                                    <span class="text-danger" id="EmpCdValidError">{{ getArrValue($error_messages, $errors->first('filter.txtStartEmpCd')) }}</span>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>終了社員番号</th>
                                            <td>
                                                <input name="filter[txtEndEmpCd]"
                                                    type="text"
                                                    tabindex="7"
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
                                                    tabindex="8"
                                                    id="btnSearchEndEmpCd"
                                                    class="SearchButton allErrorRemoveWhenClick"
                                                    onclick="SearchEmp(this);return false"
                                                    value="?">
                                                <input class="txtEmpName" id="empName"
                                                    data-isdeptauth=true
                                                    style="width: 200px; display: inline-block;">
                                                <span class="text-danger" id="EmpCdError"></span>
                                                @error('filter.txtEndEmpCd')
                                                    <span class="text-danger" id="EmpCdValidError">{{ getArrValue($error_messages, $errors->first('filter.txtEndEmpCd')) }}</span>
                                                @enderror
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                        </form>

                        <div class="line"></div>
                        <p class="ButtonField1">
                            <input name="btnExport" type="button"
                                tabindex="9" id="btnExport"
                                class="ButtonStyle1 output"
                                data-url="{{ route('EmpExport.export')}}"
                                value="出力"
                                @if(!empty($errors->all())) autofocus @endif>
                            <input type="button" name="btnCancel" tabindex="10" id="btnCancel"
                                class="ButtonStyle1" value="キャンセル"
                                onclick="location.reload();">
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

    // 更新submit-form
    $(document).on('click', '.output', function() {
         // エラー文言削除
         var errors = $("#form").find('span.text-danger');
        if (errors.length) {
            errors.text("");
        }

        var message = "{{ getArrValue($error_messages, '1013') }}";
            if (window.confirm(message.replace('{0}','ファイル'))) {
                var url = $(this).data('url');
                $('#form').attr('action', url);
                $('#form').submit();
            }
            return false;
    });

    // 入力可能文字：半角英数字・文字
    onlyHalfNumWord = n => n.replace(/[０-９Ａ-Ｚａ-ｚ]/g, s => String.fromCharCode(s.charCodeAt(0) - 65248))
    .replace(/[^0-9a-zA-Z]/g, '');

    // エラー文言削除
    $('.allErrorRemoveWhenClick').click(() => {
        $('.text-danger').text('');
    });

    $('.allErrorRemoveWhenChange').change(() => {
        $('.text-danger').text('');
    });
});
</script>
@endsection
