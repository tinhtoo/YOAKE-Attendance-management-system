<!-- 機能権限情報入力-->
@extends('menu.main')

@section('title', '機能権限情報入力')

@section('content')
    <div id="contents-stage">
        <table class="BaseContainerStyle1">
            <tbody>
                <tr>
                    <td>
                        <div id="ctl00_cphContentsArea_UpdatePanel1">
                            <form action="" method="post" id="form">
                                @csrf
                                <table class="InputFieldStyle1">
                                    <tbody>
                                        <tr>
                                            <th >機能権限コード</th>
                                            <td>
                                                <input type="text" name="PG_AUTH_CD" id="PG_AUTH_CD" maxlength="6"
                                                        oninput="value = onlyHalfNumber(value)"
                                                        value="{{ old('PG_AUTH_CD') ?? $pgAuth_data->PG_AUTH_CD }}"
                                                        style="width: 80px;" tabindex="1"
                                                        @if(isset($pgAuth_data->PG_AUTH_CD))
                                                        disabled
                                                        @else
                                                        autofocus
                                                        onFocus="this.select()"
                                                        @endif
                                                        >
                                                        @if(isset($pgAuth_data->PG_AUTH_CD))
                                                        <input type="hidden" name="PG_AUTH_CD" value={{ $pgAuth_data->PG_AUTH_CD }}>
                                                        @endif
                                                        @error('PG_AUTH_CD')
                                                        <span class="text-danger">{{ getArrValue($error_messages, $message) }}</span>
                                                        @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>機能権限名</th>
                                            <td>
                                                <input type="search" name="PG_AUTH_NAME" id="PG_AUTH_NAME"
                                                    oninput="value = ngVerticalBar(value)"
                                                    value="{{ old('PG_AUTH_NAME') ?? $pgAuth_data->PG_AUTH_NAME   }}"
                                                    style="width: 230px;" maxlength="20" tabindex="2"
                                                    @if(isset($pgAuth_data->PG_AUTH_NAME))
                                                    autofocus
                                                    onFocus="this.select()"
                                                    @endif
                                                    >
                                                    @error('PG_AUTH_NAME')
                                                    <span class="text-danger">{{ getArrValue($error_messages, $message) }}</span>
                                                    @enderror
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="line"></div>
                                <div style="text-align: left;">
                                    <input name="SelectAll" tabindex="3"
                                        id="btn"
                                        type="button" value="全選択">
                                    <input name="NotSelectAll" tabindex="4"
                                        id="btn2"
                                        type="button" value="全解除">
                                    @error('checkList')
                                    <span class="text-danger">{{ getArrValue($error_messages, $message) }}</span>
                                    @enderror
                                </div>

                                <div class="GridViewStyle1 mg10" id="gridview-container">
                                    <div class="GridViewPanelStyle7" id="ctl00_cphContentsArea_pnlPgAuth">
                                        <div>
                                            <table tabindex="5" class="GridViewBorder GridViewPadding"
                                                id="ctl00_cphContentsArea_gvPgAuth" style="border-collapse: collapse;"
                                                border="1" rules="all" cellspacing="0">
                                                <tbody>
                                                    <tr>
                                                        <th scope="col">&nbsp;</th>
                                                        <th scope="col">
                                                            分類
                                                        </th>
                                                        <th style="white-space: nowrap;" scope="col">
                                                            プログラム名
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        @foreach ($pg as $checkB)
                                                        <tr>
                                                            <td>
                                                                <input type="checkbox" name="checkList[]" id="checkList"
                                                                value="{{ $checkB->PG_CD }}" {{ $checkB->PG_AUTH_CD != null ? 'checked' : ''}}
                                                                @if(!isset($pgAuth_data->PG_AUTH_CD))
                                                                {{ ( is_array (old('checkList')) && in_array ($checkB->PG_CD, old('checkList')) ) ? ' checked' : '' }}
                                                                @endif
                                                                >
                                                            </td>
                                                            <td>{{ $checkB->MCLS_NAME }}</td>
                                                            <td>{{ $checkB->PG_NAME }}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="change" value="{{ $pgAuth_data->PG_AUTH_CD }}">

                                <div class="line"></div>
                                <p class="ButtonField1">
                                    <input type="button" value="更新" name="btnUpdate" tabindex="6" id="btnUpdate"
                                                        class="ButtonStyle1 update"
                                                        data-url="{{ url('master/MT14PgAuthUpdate') }}">
                                    <input type="button" name="btnCancel" tabindex="7" id="btnCancel"
                                                        class="ButtonStyle1" value="キャンセル"
                                                        onclick="location.reload();">
                                    <input type="button" value="削除" name="btnDelete" tabindex="8" id="btnDelete"
                                                        class="ButtonStyle1 delete"
                                                        @if(!isset($pgAuth_data->PG_AUTH_CD))
                                                        disabled="disabled"
                                                        @else
                                                        data-url="{{ url('master/MT14PgAuthDelete') }}"
                                                        @endif
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
    // ENTER時に送信されないようにする
    $('input').not('[type="button"]').keypress(function(e) {
        if (e.which == 13) {
            return false;
        }
    });

    // キャンセルボタン
    function Cancel() {
            $("#PG_AUTH_CD, #PG_AUTH_NAME, #checkList").val('');
        }

    // 全選択・全解除ボタン
    $(document).ready(function () {

        $('#btn').on('click', function () {
          $('input[type=checkbox]').prop( 'checked', true );
        });

        $('#btn2').on('click', function () {
          $('input[type=checkbox]').prop( 'checked', false );
        });

    });

    $(function() {
        // 更新submit-form
        $(document).on('click', '.update', function() {
            if (window.confirm("{{ getArrValue($error_messages, '1005') }}")) {
                var url = $(this).data('url');
                $('#form').attr('action', url);
                $('#form').submit();
            }
            return false;

        });

        // 削除処理submit-form
        $(document).on('click', '.delete', function() {
            if (window.confirm("{{ getArrValue($error_messages, '1004') }}")) {
                var url = $(this).data('url');
                $('#form').attr('action', url);
                $('#form').submit();
            }
            return false;
        });

        // 機能権限コード英数半角のみ入力可
        onlyHalfNumber = n => n.replace(/[０-９]/g, s => String.fromCharCode(s.charCodeAt(0) - 65248))
                                            .replace(/\D/g, '');
        // 入力不可能文字：|
        ngVerticalBar = n => n.replace(/\|/g, '');

    });
</script>
@endsection
