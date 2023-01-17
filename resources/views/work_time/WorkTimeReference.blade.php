{{-- 勤務状況照会(個人用) --}}
@extends('menu.main')
@section('title', '勤務状況照会(個人用) ')
@section('content')
<div id="contents-stage">
    <table>
        <tbody>
            <tr>
                <td>
                    <div id="UpdatePanel1">
                        <!-- header -->
                        <form action="" method="POST" id="form">
                            {{ csrf_field() }}
                            <table class="InputFieldStyle1">
                                <tbody>
                                    <tr>
                                        <th>対象月度</th>
                                        <td>
                                            <input type="text" id="YearMonth" name="ddlDate" autocomplete="off" onfocus="this.select();" style="width: 100px;"
                                                @if(!isset($empWorkTimeResults) || $empWorkTimeResults->isEmpty()) autofocus @endif
                                                value="{{ old('ddlDate', !empty($inputSearchData['ddlDate']) ? $inputSearchData['ddlDate'] : $def_ddlDate) }}" />
                                            @error('ddlDate')
                                            <span class="text-danger">
                                            {{ getArrValue($error_messages, $message) }}
                                            </span>
                                            @endif
                                        </td>
                                    </tr>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>社員番号</th>
                                        <td>
                                            <input name="txtEmpCd" class="searchEmpCd txtEmpCd" id="txtEmpCd" oninput="value=onlyHalfWord(value)"
                                                value="{{ old('txtEmpCd', !empty($inputSearchData['txtEmpCd']) ? $inputSearchData['txtEmpCd'] : '') }}"
                                                style="width: 80px;" type="text" maxlength="10">
                                            <input name="btnSearchEmpCd" class="SearchButton" id="btnSearchEmpCd" type="button" value="?"
                                                onclick="SearchEmp(this);return false">
                                            <input name="empName" class="txtEmpName" type="text" data-regclscd=00 data-isdeptauth=true
                                                style="width: 200px; display: inline-block;" id="empName"
                                                value="{{ !empty($inputSearchData['txtEmpCd']) ? $depEmpName[0]->EMP_NAME : '' }}"
                                                disabled="disabled">
                                            @error('txtEmpCd')
                                            <span class="text-danger" id="EmpCdValidError">{{ getArrValue($error_messages, $message) }}</span>
                                            @enderror
                                            <span class="text-danger" id="EmpCdError"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>部門</th>
                                        <td>
                                            <input name="deptName" type="text" disabled
                                                style="width: 200px; display: inline-block;" id="deptNameWithEmp">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="line"></div>

                            <table>
                                <tbody>
                                    <tr>
                                        <td style="width: auto;">
                                            <input name="btnDisp" id="btnShow" class="ButtonStyle1 submit-form" type="button" value="表示"
                                                data-url="{{ route('worktimeRef.search') }}" style="width: 80px;">
                                            <input name="btnCancel2" id="btnCancel2" class="ButtonStyle1 submit-form" type="button" value="キャンセル"
                                                data-url="{{ route('worktimeRef.cancel') }}" style="width: 80px;">
                                            &nbsp;
                                            <span id="lblNoStampColor" style="background-color: tomato;">　　　 </span>
                                            <span id="lblNoStamp">未打刻</span>
                                            &nbsp;
                                            <span id="lblDbStampColor" style="background-color: lightskyblue;">　　　</span>
                                            <span id="lblDbStamp">二重打刻</span>
                                            &nbsp;
                                            <span class="font-style2" id="lblFixMsg"></span>
                                            @if(isset($workTimeFix) && $workTimeFix)
                                                <span class="font-style2">{{ $FIX_MSG }}</span>
                                            @endif
                                        </td>
                                        <td class="right">
                                            <span class="font-style1" id="lblDispCaldDate"></span>
                                            &nbsp;
                                            <span class="font-style1" id="lblDispOfcTime"></span>
                                            &nbsp;
                                            <span class="font-style1" id="lblDispLevTime"></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <!-- detail -->
                            <div class="GridViewStyle1" id="gridview-container">
                                <div class="GridViewPanelStyle5" id="ctl00_cphContentsArea_pnlWorkTime">
                                    <div>
                                        <table class="GridViewBorder GridViewPadding GridViewRowCenter" id="ctl00_cphContentsArea_gvWorkTime"
                                            style="border-collapse: collapse;" border="1" rules="all" cellspacing="0">
                                            <tbody id="gridview-warp">
                                                @isset($empWorkTimeResults)
                                                    @if($empWorkTimeResults->isEmpty())
                                                        <tr style="width: 70px;">
                                                            <td><span>{{ getArrValue($error_messages, '4029') }}</span></td>
                                                        </tr>
                                                    @else
                                                        <tr>
                                                            <th scope="col">日付</th>
                                                            <th scope="col">曜日</th>
                                                            <th scope="col">勤務体系</th>
                                                            <th scope="col">事由</th>
                                                            <th scope="col">出勤</th>
                                                            <th scope="col">退出</th>
                                                            <th scope="col">外出1</th>
                                                            <th scope="col">再入１</th>
                                                            <th scope="col">外出２</th>
                                                            <th scope="col">再入２</th>
                                                        </tr>
                                                        @foreach ($empWorkTimeResults as $empWorkTimeResult)
                                                            <tr>
                                                                <td style="width: 70px;">
                                                                @if(in_array(date('md', strtotime($empWorkTimeResult->CALD_DATE)), $holidays)
                                                                        || date('w', strtotime($empWorkTimeResult->CALD_DATE)) === '0'
                                                                        || date('w', strtotime($empWorkTimeResult->CALD_DATE)) === '6')
                                                                    <span id="lblCaldDate" style="width: 70px; display: inline-block; color: red">
                                                                @else
                                                                    <span id="lblCaldDate" style="width: 70px; display: inline-block;">
                                                                @endif
                                                                        {{ date('Y/m/d', strtotime($empWorkTimeResult->CALD_DATE)) }}
                                                                    </span>
                                                                </td>
                                                                <td style="width: 30px;">
                                                                @if(in_array(date('md', strtotime($empWorkTimeResult->CALD_DATE)), $holidays)
                                                                        || date('w', strtotime($empWorkTimeResult->CALD_DATE)) === '0'
                                                                        || date('w', strtotime($empWorkTimeResult->CALD_DATE)) === '6')
                                                                    <span id="lblCaldDate" style="width: 30px; display: inline-block; color: red">
                                                                @else
                                                                    <span id="lblCaldDate" style="width: 30px; display: inline-block;">
                                                                @endif
                                                                        {{ config('consts.weeks')[date('w', strtotime($empWorkTimeResult->CALD_DATE))] }}
                                                                    </span>
                                                                </td>

                                                                <td class="GridViewRowLeft" style="width: 160px;">
                                                                    <span id="lblWorkptnName" class="{{ $empWorkTimeResult->WORK_CLS_CD == '00' ? 'text-danger' : '' }}"
                                                                            style="width: 160px; display: inline-block;">
                                                                        {{ $empWorkTimeResult->WORKPTN_NAME }}
                                                                    </span>
                                                                </td>
                                                                <td style="width: 50px;">
                                                                    <span id="lblReasonName"
                                                                        class="{{ $empWorkTimeResult->REASON_PTN_CD == '01' ? 'text-danger' : '' }} &&
                                                                            {{ $empWorkTimeResult->REASON_PTN_CD == '02' ? 'text-primary' : '' }}">
                                                                        {{ $empWorkTimeResult->REASON_NAME }}
                                                                    </span>
                                                                </td>

                                                                @if($empWorkTimeResult->OFC_CNT >= 2 && empty($empWorkTimeResult->OFC_TIME_HH))
                                                                <td style="width: 40px; background-color: lightskyblue;">
                                                                @elseif(empty($empWorkTimeResult->OFC_TIME_HH) && isset($empWorkTimeResult->LEV_TIME_HH))
                                                                <td style="width: 40px; background-color: tomato;">
                                                                @else
                                                                <td style="width: 40px;" <span id="hlLevTime">
                                                                @endif
                                                                    <span id="hlLevTime">{{ $empWorkTimeResult->OFC_TIME }}</span>
                                                                </td>

                                                                @if($empWorkTimeResult->LEV_CNT >= 2 && empty($empWorkTimeResult->LEV_TIME_HH))
                                                                <td style="width: 40px; background-color: lightskyblue;">
                                                                @elseif(isset($empWorkTimeResult->OFC_TIME_HH) && empty($empWorkTimeResult->LEV_TIME_HH))
                                                                <td style="width: 40px; background-color: tomato;">
                                                                @else
                                                                <td style="width: 40px;" <span id="hlLevTime">
                                                                @endif
                                                                    <span id="hlLevTime">{{ $empWorkTimeResult->LEV_TIME }}</span>
                                                                </td>

                                                                @if($empWorkTimeResult->OUT1_CNT >= 2 && empty($empWorkTimeResult->OUT1_TIME_HH))
                                                                <td style="width: 40px; background-color: lightskyblue;">
                                                                @elseif(empty($empWorkTimeResult->OUT1_TIME_HH) && isset($empWorkTimeResult->IN1_TIME_HH))
                                                                <td style="width: 40px; background-color: tomato;">
                                                                @else
                                                                <td style="width: 40px;">
                                                                @endif
                                                                    <span id="hlLevTime">{{ $empWorkTimeResult->OUT1_TIME }}</span>
                                                                </td>

                                                                @if ($empWorkTimeResult->IN1_CNT >= 2 && empty($empWorkTimeResult->IN1_TIME_HH))
                                                                <td style="width: 40px; background-color: lightskyblue;">
                                                                @elseif (isset($empWorkTimeResult->OUT1_TIME_HH) && empty($empWorkTimeResult->IN1_TIME_HH))
                                                                <td style="width: 40px; background-color: tomato;">
                                                                @else
                                                                <td style="width: 40px;">
                                                                @endif
                                                                    <span id="hlLevTime">{{ $empWorkTimeResult->IN1_TIME }}</span>
                                                                </td>

                                                                @if ($empWorkTimeResult->OUT2_CNT >= 2 && empty($empWorkTimeResult->OUT2_TIME_HH))
                                                                <td style="width: 40px; background-color: lightskyblue;">
                                                                @elseif (empty($empWorkTimeResult->OUT2_TIME_HH) && isset($empWorkTimeResult->IN2_TIME_HH))
                                                                <td style="width: 40px; background-color: tomato;">
                                                                @else
                                                                <td style="width: 40px;">
                                                                @endif
                                                                    <span id="hlLevTime">{{ $empWorkTimeResult->OUT2_TIME }}</span>
                                                                </td>

                                                                @if ($empWorkTimeResult->IN2_CNT >= 2 && empty($empWorkTimeResult->IN2_TIME_HH))
                                                                <td style="width: 40px; background-color: lightskyblue;">
                                                                @elseif (isset($empWorkTimeResult->OUT2_TIME_HH) && empty($empWorkTimeResult->IN2_TIME_HH))
                                                                <td style="width: 40px; background-color: tomato;">
                                                                @else
                                                                <td style="width: 40px;">
                                                                @endif
                                                                    {{ $empWorkTimeResult->IN2_TIME }}</span>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endisset
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- footer -->
                                <div class="line"></div>
                                <p class="ButtonField2">
                                    <input name="btnCancel" id="btnCancel" class="ButtonStyle1 submit-form"
                                        onclick="CloseSubWindow();__doPostBack('btnCancel','')" type="button" value="キャンセル"
                                        @if(isset($empWorkTimeResults) && !$empWorkTimeResults->isEmpty()) autofocus @endif
                                        data-url="{{ route('worktimeRef.cancel') }}">
                                </p>
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
        $(document).on('click', '.submit-form', function() {
            var url = $(this).data('url');
            $('#form').attr('action', url);
            $('#form').submit();
        });

        // 検索時ボタン機能無効
        $(document).on('click', '#btnShow', function load() {
            $('#btnShow, #ddlTargetYear, #ddlTargetMonth, #txtEmpCd, #btnSearchEmpCd').attr('disabled', true);
        });

        // カレンダー機能の設定
        $(function() {
            $('#YearMonth').datepicker({
                format: 'yyyy年mm月',
                autoclose: true,
                language: 'ja',
                minViewMode: 1
            });
            $('#YearMonth').on('click', function(event){$(event.target).focusout().focus()});
            $('#YearMonth').on('input', function(event){$(event.target).datepicker('show')});
        });

        // 入力可能文字：半角英数
        onlyHalfWord = n => n.replace(/[０-９Ａ-Ｚａ-ｚ]/g, s => String.fromCharCode(s.charCodeAt(0) - 65248))
            .replace(/[^0-9a-zA-Z]/g, '');
    </script>
@endsection
