<!-- 所属情報入力 -->
@extends('menu.main')

@section('title', '所属情報入力')

@section('content')
    <div id="contents-stage">
        <table class="BaseContainerStyle1">
            <tbody>
                <tr>
                    <td>
                        <div id="UpdatePanel1">
                            <form action="" method="POST" id="form">
                                @csrf
                                <table class="InputFieldStyle1">
                                    <tbody>
                                        <tr>
                                            <th>所属番号</th>
                                            <td>
                                                <input type="hidden" name="COMPANY_CD"
                                                    value="{{ $search_result->COMPANY_CD }}">
                                                <input name="companyCd" tabindex="1"
                                                    id="editCompanyCd" style="width: 80px;" type="text"
                                                    maxlength="6" onfocus="this.select();"
                                                    oninput="value = onlyHalfNumAlf(value)" onfocus="this.select();"
                                                    @if(isset($search_result->COMPANY_CD)) disabled @else autofocus @endif
                                                    value="{{ old('companyCd', $search_result->COMPANY_CD) }}">
                                                @error('companyCd')
                                                    <span class="text-danger">{{ getArrValue($error_messages, $message) }}</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>所属先名</th>
                                            <td>
                                                <input name="companyName" tabindex="2" onfocus="this.select();"
                                                    id="editCompanyName" style="width: 370px;" type="text"
                                                    maxlength="20" oninput="value = ngVerticalBar(value)"
                                                    @if(isset($search_result->COMPANY_CD)) autofocus @endif
                                                    value="{{ old('companyName', $search_result->COMPANY_NAME) }}">
                                                @error('companyName')
                                                    <span class="text-danger">{{ getArrValue($error_messages, $message) }}</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>所属先カナ名</th>
                                            <td>
                                                <input name="companyKana" tabindex="3" onfocus="this.select();"
                                                    id="editCompanyKana" style="width: 370px;" type="text"
                                                    maxlength="20"
                                                    value="{{ old('companyKana', $search_result->COMPANY_KANA) }}">
                                                @error('companyKana')
                                                    <span class="text-danger">{{ getArrValue($error_messages, $message) }}</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>所属先略名</th>
                                            <td>
                                                <input name="companyAbr" tabindex="4" onfocus="this.select();"
                                                    id="editCompanyAbr" style="width: 180px;" type="text"
                                                    maxlength="10"
                                                    value="{{ old('companyAbr', $search_result->COMPANY_ABR) }}">
                                                @error('companyAbr')
                                                    <span class="text-danger">{{ getArrValue($error_messages, $message) }}</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>郵便番号</th>
                                            <td>
                                                <input name="txtPostCd" tabindex="5" id="txtPostCd" onfocus="this.select();"
                                                    style="width: 70px;" type="text" maxlength="8"
                                                    value="{{ old('txtPostCd', $search_result->POST_CD) }}"
                                                    oninput="value = onlyNubersBar(value)">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>住所１</th>
                                            <td>
                                                <input name="txtAddress1" tabindex="6" onfocus="this.select();"
                                                    id="txtAddress1" style="width: 430px;" type="text"
                                                    maxlength="30"
                                                    value="{{ old('txtAddress1', $search_result->ADDRESS1) }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>住所２</th>
                                            <td>
                                                <input name="txtAddress2" tabindex="7" onfocus="this.select();"
                                                    id="txtAddress2" style="width: 430px;" type="text"
                                                    maxlength="30"
                                                    value="{{ old('txtAddress2', $search_result->ADDRESS2) }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>住所３</th>
                                            <td>
                                                <input name="txtAddress3" tabindex="8" onfocus="this.select();"
                                                    id="txtAddress3" style="width: 430px;" type="text"
                                                    maxlength="30"
                                                    value="{{ old('txtAddress3', $search_result->ADDRESS3) }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>電話番号</th>
                                            <td>
                                                <input name="txtTel" tabindex="9" id="txtTel" onfocus="this.select();"
                                                    style="width: 120px;" type="text" maxlength="15"
                                                    value="{{ old('txtTel', $search_result->TEL) }}"
                                                    oninput="value = onlyNubersBarParen(value)">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>ＦＡＸ番号</th>
                                            <td>
                                                <input name="txtFax" tabindex="10" id="txtFax" onfocus="this.select();"
                                                    style="width: 120px;" type="text" maxlength="15"
                                                    value="{{ old('txtFax', $search_result->FAX) }}"
                                                    oninput="value = onlyNubersBarParen(value)">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>表示区分</th>
                                            <td>
                                                <select name="ddlDispCls" tabindex="11" id="ddlDispCls"
                                                    style="width: 100px;">
                                                    @foreach ($dispcls_cd as $dispclsCd)
                                                        <option value="{{ $dispclsCd->CLS_DETAIL_CD }}"
                                                            {{ $dispclsCd->CLS_DETAIL_CD == (old('ddlDispCls') ?? $search_result->DISP_CLS_CD) ? 'selected' : '' }}>
                                                            {{ $dispclsCd->CLS_DETAIL_NAME }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>

                                <div class="line"></div>

                                <div class="ButtonField1">
                                    <input type="button" class="ButtonStyle1 cancel-form" id="btnUpdate" name="btnUpdate"
                                        onclick="return checkSubmit();" tabindex="12" value="更新"
                                        @if(isset($search_result->COMPANY_CD))
                                        data-url="{{ route('MT23.update', ['id' => isset($search_result->COMPANY_CD) ? $search_result->COMPANY_CD : 'add']) }}">
                                        @else
                                        data-url="{{ route('MT23.companyRegister') }}">
                                        @endif

                                    <input name="btnCancel" tabindex="13" id="btnCancel" type="button"
                                        class="ButtonStyle1" value="キャンセル"
                                        onclick="location.reload();">
                                    <input type="button" name="btnDelete" tabindex="14" id="btnDelete"
                                        class="ButtonStyle1 submit-form" value="削除"
                                        onclick="return checkDelete(this)"
                                        @if(isset($search_result->COMPANY_CD))
                                        data-url="{{ route('MT23.delete', isset($search_result->COMPANY_CD) ? $search_result->COMPANY_CD : 'add') }}">
                                        @else
                                        disabled
                                        @endif
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

        // 確認ダイアログ(更新処理)
        function checkSubmit() {
            var check = window.confirm("{{ getArrValue($error_messages, '1005') }}");
            if (check == true) {
                $(document).on('click', '.cancel-form', function() {
                    var url = $(this).data('url');
                    $('#form').attr('action', url);
                    $('#form').submit();
                });
            } else {
                return false;
            }
        }

        // 確認ダイアログ（削除処理）
        function checkDelete() {
            if (window.confirm("{{ getArrValue($error_messages, '1004') }}")) {
                // ボタンクリック
                $(document).on('click', '.submit-form', function(){
                    var url = $(this).data('url');
                    $('#form').attr('action', url);
                    $('#form').submit();
                });
            } else {
            return false;
            }
        }

        $(function() {
            // 入力可能文字：半角
            onlyHalfNumAlf = n => n.replace(/[０-９Ａ-Ｚａ-ｚ]/g, s => String.fromCharCode(s.charCodeAt(0) - 65248))
                .replace(/[^a-zA-Z0-9]/g, '');

            // 入力可能文字：数値、ハイフン
            onlyNubersBar = n => n.replace(/[０-９]/g, s => String.fromCharCode(s.charCodeAt(0) - 65248))
                .replace(/[ー]/g, '-')
                .replace(/[^-\d]/g, '');

            // 入力不可能文字：|
            ngVerticalBar = n => n.replace(/\|/g, '');

            // 入力可能文字：数値、ハイフン、括弧
            onlyNubersBarParen = n => n.replace(/[０-９（）]/g, s => String.fromCharCode(s.charCodeAt(0) - 65248))
                .replace(/[ー]/g, '-')
                .replace(/[^-()\d]/g, '');
        });
    </script>

@endsection
