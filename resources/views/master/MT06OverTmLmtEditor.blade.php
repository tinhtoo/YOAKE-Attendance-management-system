<!-- 残業上限情報入力 -->
@extends('menu.main')

@section('title', '残業上限情報入力 ')

@section('content')
    <div id="contents-stage">
        <table class="BaseContainerStyle1">
            <tbody>
                <form action="{{ route('MT06.index') }}" method="GET" name="MT06form">
                @csrf
                    <tr>
                        <td>
                            <div id="ctl00_cphContentsArea_UpdatePanel1">

                                <table class="InputFieldStyle1">
                                    <tbody>
                                        <tr>
                                            <th>カレンダー</th>
                                            <td>
                                                <select name="CalendarCd" tabindex="1" id="CalendarCd" style="width: 250px;"
                                                    @if (isset($CalendarCdKey)) disabled @endif
                                                    onchange=" submit(this.form)">
                                                    <option selected="selected"> </option>
                                                    @foreach ($items as $item)
                                                        <option value="{{ $item->CALENDAR_CD }}"
                                                            @if ($item->CALENDAR_CD == (int) old('CalendarCd', $CalendarCdKey)) selected @endif>
                                                            {{ $item->CALENDAR_NAME }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>

                            <div class="line"></div>

                            <form action="{{ route('MT06.update') }}" method="POST" name="MT06updateform"
                                id="MT06updateform">
                                @csrf
                                <table class="InputFieldStyle1">
                                    <tbody>
                                        {{-- 選択したカレンダーコード --}}
                                        <input type="hidden" name="CalendarCdData" value="{{ $CalendarCdKey }}">
                                        <tr>
                                            <th>残業項目１</th>
                                            <td>
                                                <select name="Ovtm1Cd" tabindex="2" id="Ovtm1Cd" style="width: 180px;"
                                                    onchange="" @if (!isset($CalendarCdKey)) disabled @endif>
                                                    <option selected="selected"></option>
                                                    @foreach ($works as $work)
                                                        <option value="{{ $work->WORK_DESC_CD }} "
                                                            @if ($work->WORK_DESC_CD == (int) old('Ovtm1Cd', $OVTM1key)) selected @endif>
                                                            {{ $work->WORK_DESC_NAME }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('Ovtm1Cd'))
                                                    <span class="text-danger">{{ getArrValue($error_messages, $errors->first('Ovtm1Cd')) }} </span>
                                                @endif
                                            </td>

                                            <td>
                                                <input name="Ovtm1Hr" tabindex="3" class="right" id="Ovtm1Hr"
                                                    style="width: 35px;" onfocus="this.select();" type="text" maxlength="3"
                                                    value="{{ old('Ovtm1Hr', $OVTM1HRkey) }}"
                                                    @if (!isset($CalendarCdKey)) disabled @endif>
                                                <span id="Ovtm1HrUnit">時間 / 月</span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>残業項目２</th>
                                            <td>
                                                <select name="Ovtm2Cd" tabindex="4" id="Ovtm2Cd" style="width: 180px;"
                                                    onchange="" @if (!isset($CalendarCdKey)) disabled @endif>
                                                    <option selected="selected"></option>
                                                    @foreach ($works as $work)
                                                        <option value="{{ $work->WORK_DESC_CD }} "
                                                            @if ($work->WORK_DESC_CD == (int) old('Ovtm2Cd', $OVTM2key)) selected @endif>
                                                            {{ $work->WORK_DESC_NAME }}
                                                        </option>
                                                    @endforeach

                                                </select>

                                                @if ($errors->has('Ovtm2Cd'))
                                                    <span class="text-danger">{{ getArrValue($error_messages, $errors->first('Ovtm2Cd')) }} </span>
                                                @endif
                                            </td>

                                            <td>
                                                <input name="Ovtm2Hr" tabindex="5" class="right" id="Ovtm2Hr"
                                                    style="width: 35px;" onfocus="this.select();" type="text" maxlength="3"
                                                    value="{{ old('Ovtm2Hr', $OVTM2HRkey) }}"
                                                    @if (!isset($CalendarCdKey)) disabled @endif>
                                                <span id="Ovtm2HrUnit">時間 / 月</span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>残業項目３</th>
                                            <td>
                                                <select name="Ovtm3Cd" tabindex="6" id="Ovtm3Cd" style="width: 180px;"
                                                    onchange="" @if (!isset($CalendarCdKey)) disabled @endif>
                                                    <option selected="selected"></option>
                                                    @foreach ($works as $work)
                                                        <option value="{{ $work->WORK_DESC_CD }} "
                                                            @if ($work->WORK_DESC_CD == (int) old('Ovtm3Cd', $OVTM3key)) selected @endif>
                                                            {{ $work->WORK_DESC_NAME }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('Ovtm3Cd'))
                                                    <span class="text-danger">{{ getArrValue($error_messages, $errors->first('Ovtm3Cd')) }} </span>
                                                @endif
                                            </td>

                                            <td>
                                                <input name="Ovtm3Hr" tabindex="7" class="right" id="Ovtm3Hr"
                                                    style="width: 35px;" onfocus="this.select();" type="text" maxlength="3"
                                                    value="{{ old('Ovtm3Hr', $OVTM3HRkey) }}"
                                                    @if (!isset($CalendarCdKey)) disabled @endif>

                                                <span id="Ovtm3HrUnit">時間 / 月</span>

                                            </td>
                                        </tr>

                                        <tr>
                                            <th>残業項目４</th>
                                            <td>
                                                <select name="Ovtm4Cd" tabindex="8" id="Ovtm4Cd" style="width: 180px;"
                                                    onchange="" @if (!isset($CalendarCdKey)) disabled @endif>
                                                    <option selected="selected"></option>
                                                    @foreach ($works as $work)
                                                        <option value="{{ $work->WORK_DESC_CD }} "
                                                            @if ($work->WORK_DESC_CD == (int) old('Ovtm4Cd', $OVTM4key)) selected @endif>
                                                            {{ $work->WORK_DESC_NAME }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('Ovtm4Cd'))
                                                    <span class="text-danger">{{getArrValue($error_messages, $errors->first('Ovtm4Cd')) }}</span>
                                                @endif
                                            </td>

                                            <td>
                                                <input name="Ovtm4Hr" tabindex="9" class="right" id="Ovtm4Hr"
                                                    style="width: 35px;" onfocus="this.select();" type="text" maxlength="3"
                                                    value="{{ old('Ovtm4Hr', $OVTM4HRkey) }}"
                                                    @if (!isset($CalendarCdKey)) disabled @endif>
                                                <span id="Ovtm4HrUnit">時間 / 月</span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>残業項目５</th>
                                            <td>
                                                <select name="Ovtm5Cd" tabindex="10" id="Ovtm5Cd" style="width: 180px;"
                                                    onchange="" @if (!isset($CalendarCdKey)) disabled @endif>
                                                    <option selected="selected"></option>
                                                    @foreach ($works as $work)
                                                        <option value="{{ $work->WORK_DESC_CD }} "
                                                            @if ($work->WORK_DESC_CD == (int) old('Ovtm5Cd', $OVTM5key)) selected @endif>
                                                            {{ $work->WORK_DESC_NAME }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('Ovtm5Cd'))
                                                    <span class="text-danger">{{ getArrValue($error_messages, $errors->first('Ovtm5Cd')) }} </span>
                                                @endif
                                            </td>

                                            <td>
                                                <input name="Ovtm5Hr" tabindex="11" class="right" id="Ovtm5Hr"
                                                    style="width: 35px;" onfocus="this.select();" type="text" maxlength="3"
                                                    value="{{ old('Ovtm5Hr', $OVTM5HRkey) }}"
                                                    @if (!isset($CalendarCdKey)) disabled @endif>
                                                <span id="Ovtm5HrUnit">時間 / 月</span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>残業項目６</th>
                                            <td>
                                                <select name="Ovtm6Cd" tabindex="12" id="Ovtm6Cd" style="width: 180px;"
                                                    onchange="" @if (!isset($CalendarCdKey)) disabled @endif>
                                                    <option selected="selected"></option>
                                                    @foreach ($works as $work)
                                                        <option value="{{ $work->WORK_DESC_CD }} "
                                                            @if ($work->WORK_DESC_CD == (int) old('Ovtm6Cd', $OVTM6key)) selected @endif>
                                                            {{ $work->WORK_DESC_NAME }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('Ovtm6Cd'))
                                                    <span class="text-danger">{{ getArrValue($error_messages, $errors->first('Ovtm6Cd')) }} </span>
                                                @endif
                                            </td>

                                            <td>
                                                <input name="Ovtm6Hr" tabindex="13" class="right" id="Ovtm6Hr"
                                                    style="width: 35px;" onfocus="this.select();" type="text" maxlength="3"
                                                    value="{{ old('Ovtm6Hr', $OVTM6HRkey) }}"
                                                    @if (!isset($CalendarCdKey)) disabled @endif>
                                                <span id="Ovtm6HrUnit">時間 / 月</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="line"></div>

                                <table class="InputFieldStyle1">
                                    <tbody>
                                        <tr>
                                            <th>残業未対応時間</th>
                                            <td>
                                                <span id="NoOvertmMiUnit1">１日の残業時間のうち</span>
                                                <select name="NoOvertmMi" tabindex="14"
                                                    id="NoOvertmMi" style="width: 50px;"
                                                    @if (!isset($CalendarCdKey)) disabled @endif>

                                                    @foreach ($NoOvertmMis as $NoOvertmMi)
                                                        <option value=" {{ $NoOvertmMi->CLS_DETAIL_CD }}"
                                                            @if ($NoOvertmMi->CLS_DETAIL_CD == (int) old('NoOvertmMiUnit1', $NoOvertmMisOld)) selected @endif>
                                                            {{ $NoOvertmMi->CLS_DETAIL_NAME }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <span id="NoOvertmMiUnit2">分未満は未対応</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="line"></div>

                                <table class="InputFieldStyle1">
                                    <tbody>
                                        <tr>
                                            <th>総残業時間上限１</th>
                                            <td>
                                                <input name="TtlOvtm1Hr" tabindex="15" class="right"
                                                    id="TtlOvtm1Hr" style="width: 35px;" onfocus="this.select();"
                                                    type="text" maxlength="3" value="{{ old('TtlOvtm1Hr', $TtlOvtm1Hr) }}"
                                                    @if (!isset($CalendarCdKey)) disabled
                                                    @elseif($enabled02 != '02')   disabled
                                                    @endif
                                                >
                                                <span id="TtlOvtm1HrUnit">時間 / 月</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>総残業時間上限２</th>
                                            <td>
                                                <input name="TtlOvtm2Hr" tabindex="16" class="right"
                                                    id="TtlOvtm2Hr" style="width: 35px;" onfocus="this.select();"
                                                    type="text" maxlength="3" value="{{ old('TtlOvtm2Hr', $TtlOvtm2Hr) }}"
                                                    @if (!isset($CalendarCdKey)) disabled
                                                    @elseif($enabled02 != '02')  disabled
                                                    @endif
                                                >
                                                <span id="TtlOvtm2HrUnit">時間 / 月</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>総残業時間上限３</th>
                                            <td>
                                                <input name="TtlOvtm3Hr" tabindex="17" class="right"
                                                    id="TtlOvtm3Hr" style="width: 35px;" onfocus="this.select();"
                                                    type="text" maxlength="3" value="{{ old('TtlOvtm3Hr', $TtlOvtm3Hr) }}"
                                                    @if (!isset($CalendarCdKey)) disabled
                                                    @elseif($enabled02 != '02')  disabled
                                                    @endif
                                                >
                                                <span id="TtlOvtm3HrUnit">時間 / 月</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="line"></div>

                                <p class="ButtonField1">
                                    <!-- 更新ボタン押下時 -->
                                    <input type="submit" class="ButtonStyle1" id="btnUpdate" name="btnUpdate" tabindex="18"
                                        value="更新" onclick="return checkSubmitUpdate(this)"
                                        @if (!isset($CalendarCdKey)) disabled @endif>


                                    <!-- キャンセルボタン押下時 -->
                                    <input name="btnCancel2" class="ButtonStyle2" id="btnCancel2" type="button" tabindex="19"
                                        value="キャンセル" onclick="location.href='MT06OverTmLmtEditor'">

                                    <!-- 削除ボタン押下時 -->
                                    <input class="ButtonStyle2" id="btnDelete1" type="submit" name="btnDelete1"
                                        tabindex="20" value="削除" onclick="return checkSubmitDelete(this)"
                                        @if (!isset($CalendarCdKey)) disabled @endif>

                                </p>

                                <script>
                                    // 更新ボタン・確認ダイアル
                                    function checkSubmitUpdate() {

                                        $checked = confirm("{{ getArrValue($error_messages, '1005') }}");
                                        if ($checked == true) {
                                            // 有効で送信
                                            document.getElementById("CalendarCd").disabled = false;
                                            document.getElementById('MT06updateform').submit();
                                            return true;
                                        } else {
                                            return false;
                                        }
                                    }

                                    // 削除ボタン・確認ダイアル
                                    function checkSubmitDelete() {

                                        $checkedDelete = confirm("{{ getArrValue($error_messages, '1005') }}");
                                        if ($checkedDelete == true) {
                                            // 有効で送信
                                            document.getElementById("CalendarCd").disabled = false;
                                            document.getElementById('MT06updateform').submit();
                                            return true;
                                        } else {
                                            return false;
                                        }
                                    }

                                    $(function() {
                                        // ENTER時に送信されないようにする
                                        $('input').not('[type="button"]').not('[type="submit"]').keypress(function(e) {
                                            if (e.which == 13) {
                                                return false;
                                            }
                                        });

                                        // 数値のみ入力可能
                                        var onlyNumber = function(e) {
                                                var k = e.keyCode;
                                                // 0～9:code48-57, テンキ―0～9:code96-105, backspace:code8, delete:code46, →:code39, ←:code37,Tab:code9,Enter:code13,insert:45 以外は入力キャンセル
                                                if (!((k >= 48 && k <= 57) || (k >= 96 && k <= 105) || k == 8 || k == 46 || k == 39 || k ==
                                                        37 || k == 9 || k == 13 || k == 45)) {
                                                    return false;
                                                }
                                        };
                                        $('#Ovtm1Hr').on('keydown', onlyNumber);
                                        $('#Ovtm2Hr').on('keydown', onlyNumber);
                                        $('#Ovtm3Hr').on('keydown', onlyNumber);
                                        $('#Ovtm4Hr').on('keydown', onlyNumber);
                                        $('#Ovtm5Hr').on('keydown', onlyNumber);
                                        $('#Ovtm6Hr').on('keydown', onlyNumber);
                                        $('#TtlOvtm1Hr').on('keydown', onlyNumber);
                                        $('#TtlOvtm2Hr').on('keydown', onlyNumber);
                                        $('#TtlOvtm3Hr').on('keydown', onlyNumber);
                                    });

                                    // ｛カレンダー｝フォーカス
                                    document.MT06form.CalendarCd.focus();

                                    // E-1
                                    @if ($errors->has('Ovtm1Cd')
                                        || $errors->has('Ovtm2Cd')
                                        || $errors->has('Ovtm3Cd')
                                        || $errors->has('Ovtm4Cd')
                                        || $errors->has('Ovtm5Cd')
                                        || $errors->has('Ovtm6Cd'))
                                    document.MT06updateform.btnUpdate.focus();
                                    @endif
                                </script>
                            </div>
                        </td>
                    </tr>
                </form>
            </tbody>
        </table>

    </div>
@endsection
