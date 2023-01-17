<!-- 出退勤情報クリア処理画面 -->
@extends('menu.main')
@section('title', '出退勤情報クリア処理')
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
                                            <th>削除区分</th>
                                            <td>
                                                <div class="GroupBox1">
                                                    <input type="radio"
                                                            name="clearCategory"
                                                            id="rbEmpCls"
                                                            value="0"
                                                            tabindex="1"
                                                            class="clearCategory"
                                                            data-category="#emp"
                                                            {{ !old('clearCategory') ? 'checked' : '' }}>
                                                    <label for="rbEmpCls">社員</label>
                                                    <input type="radio"
                                                            name="clearCategory"
                                                            id="rbDeptCls"
                                                            value="1"
                                                            tabindex="2"
                                                            class="clearCategory"
                                                            data-category="#dept"
                                                            {{ old('clearCategory') ? 'checked' : '' }}>
                                                    <label for="rbDeptCls">部門</label>
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
                                                        autofocus
                                                        onfocus="this.select();"
                                                        tabindex="3"
                                                        value="{{ old('filter.startDate', date('Y年m月d日')) }}"
                                                />
                                                @error('filter.startDate')
                                                <span class="text-danger">{{ getArrValue($error_messages, $message) }}</span>
                                                @enderror
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
                                                        value="{{ old('filter.endDate', date('Y年m月d日') ) }}"
                                                />
                                                @error('filter.endDate')
                                                <span class="text-danger">{{ getArrValue($error_messages, $message) }}</span>
                                                @enderror
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="line"></div>

                                <div id="emp"
                                    {{ old('clearCategory') ? 'style=display:none' : '' }}>
                                    <table class="InputFieldStyle1">
                                        <tbody>
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
                                                        tabindex="5"
                                                        >
                                                    <input name="btnSearchEmpCd"
                                                        class="SearchButton"
                                                        id="btnSearchEmpCd"
                                                        type="button"
                                                        value="?"
                                                        onclick="SearchEmp(this);return false"
                                                        tabindex="6"
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
                                                    <span class="text-danger" id="EmpCdValidError">{{ getArrValue($error_messages, $message) }}</span>
                                                    @enderror
                                                    <span class="text-danger" id="EmpCdError"></span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div id="dept"
                                    {{ old('clearCategory') ? '' : 'style=display:none' }}>
                                    <input type="button" class="checkControl" data-check="1" value="全選択" tabindex="7">
                                    <input type="button" class="checkControl" data-check="0" value="全解除" tabindex="8">

                                    @error('deptCd')
                                    <span class="text-danger">{{ getArrValue($error_messages, $message) }}</span>
                                    @enderror

                                    <div class="GridViewStyle1 mg10" id="gridview-container">
                                        <div class="GridViewPanelStyle7" style="height: 645px;">

                                            <div>
                                                <table class="GridViewBorder GridViewPadding" style="border-collapse: collapse;" border="1" rules="all" cellspacing="0">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="col">&nbsp;</th>
                                                            <th scope="col">部門</th>
                                                        </tr>
                                                        @foreach ($dept_list as $dept)
                                                        <tr>
                                                            <td class="GridViewRowCenter" style="width: 30px; white-space: nowrap; padding-top: 3px;">
                                                                @if(in_array($dept->DEPT_CD, $changeable_dept_cd_list))
                                                                <input type="checkbox"
                                                                        id="checkbox{{ $dept->DEPT_CD }}"
                                                                        class="deptCheckbox"
                                                                        name="deptCd[]"
                                                                        tabindex="9"
                                                                        value="{{ $dept->DEPT_CD }}"
                                                                        {{ in_array($dept->DEPT_CD, old('deptCd', []), true) ? 'checked' : '' }}>
                                                                @endif
                                                            </td>
                                                            <td class="GridViewRowLeft">
                                                                <label class="OutlineLabel" style="width: 100%; height: 17px; display: inline-block;
                                                                    @if(in_array($dept->DEPT_CD, $changeable_dept_cd_list))
                                                                    cursor: pointer;" for="checkbox{{ $dept->DEPT_CD }}@endif">
                                                                @for ($i = 0; $i < $dept->LEVEL_NO; $i++)
                                                                　　　
                                                                @endfor
                                                                {{ $dept->DEPT_NAME }}
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="line"></div>

                                <p class="ButtonField1">
                                    <input name="btnDataClear" tabindex="10"
                                        id="btnDataClear"
                                        class="clear"
                                        data-url = "{{ route('WorkTimeClear.clear')}}"
                                        type="button" value="データクリア">
                                    <input name="btnCancel" tabindex="11"
                                        id="btnCancel"
                                        class="cancel"
                                        onclick="location.href='{{ url('mng_oprt/WorkTimeClear') }}'"
                                        type="button" value="キャンセル">
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

    // 入力可能文字：半角英数字・文字
    onlyHalfNumWord = n => n.replace(/[０-９Ａ-Ｚａ-ｚ]/g, s => String.fromCharCode(s.charCodeAt(0) - 65248))
        .replace(/[^0-9a-zA-Z]/g, '');

    // 更新時ダイアログ
    $(document).on('click', '.clear', function() {
        if (!window.confirm("{{ getArrValue($error_messages, 3001) }}")) {
            $(this).focus();
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
    $('.date').on('click', function(event){$(event.target).focusout().focus()});
    $('.date').on('input', function(event){$(event.target).datepicker('show')});

    $(document).on('click', '#rbEmpCls', function() {
        $("#emp").show();
        $("#dept").hide();
        $(".text-danger").text("");
    });

    $(document).on('click', '#rbDeptCls', function() {
        $("#emp").hide();
        $("#dept").show();
        $(".text-danger").text("");
    });

    // 全チェックor全チェック外し
    $(document).on('click', '.checkControl', function() {
        $(".deptCheckbox").prop("checked", $(this).data().check);
    });
})
</script>
@endsection
