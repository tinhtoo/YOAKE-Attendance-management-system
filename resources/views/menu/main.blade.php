@extends('common.home')
@section('title', '勤怠管理システム_main')
@include('common.header')
@include('menu.index')

@section('main')
    <table id="body" style="height: 883px;">
        <tr>
            <td class="body-border"></td>
            <td id="menu">
                @if(isset($menu_list))
                <div class="sidenav">
                    <input type="button" class="WorkTmMngMenuFirst" value="勤怠管理システムメニュー" />
                    @if(key_exists('01', $menu_list))
                    <button class="dropdown-btn WorkTmMngMenuSecond">勤怠管理</button>
                    <div id="01" class="WorkTmMngMenuThird"
                            @if(isset($this_pg_cd) && $this_pg_cd['mcls'] === '01')
                            style="display:block;"
                            @endif>
                        @if(key_exists('010001', $menu_list['01']))
                        <a id="010001" href="{{ url('/work_time/WorkTimeEditor') }}"
                            @if(isset($this_pg_cd) && $this_pg_cd['pg'] === '010001')
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            @else
                            ><i class="fas fa-caret-right pg-head"></i
                            @endif
                            >出退勤入力
                        </a>
                        @endif
                        @if(key_exists('010005', $menu_list['01']))
                        <a id="010005" href="{{ url('/work_time/WorkTimeDeptEditor') }}"
                            @if(isset($this_pg_cd) && $this_pg_cd['pg'] === '010005')
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            @else
                            ><i class="fas fa-caret-right pg-head"></i
                            @endif
                            >出退勤入力(部門別)
                        </a>
                        @endif
                        @if(key_exists('010004', $menu_list['01']))
                        <a id="010004" href="{{ url('/work_time/EmpWorkStatusReference') }}"
                            @if(isset($this_pg_cd) && $this_pg_cd['pg'] === '010004')
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            @else
                            ><i class="fas fa-caret-right pg-head"></i
                            @endif
                            >出退勤照会
                        </a>
                        @endif
                        @if(key_exists('010002', $menu_list['01']))
                        <a id="010002" href="{{ url('/work_time/WorkTimeReference') }}"
                            @if(isset($this_pg_cd) && $this_pg_cd['pg'] === '010002')
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            @else
                            ><i class="fas fa-caret-right pg-head"></i
                            @endif
                            >勤務状況照会(個人用)
                        </a>
                        @endif
                        @if(key_exists('010003', $menu_list['01']))
                        <a id="010003" href="{{ url('/work_time/EmpWorkTimeReference') }}"
                            @if(isset($this_pg_cd) && $this_pg_cd['pg'] === '010003')
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            @else
                            ><i class="fas fa-caret-right pg-head"></i
                            @endif
                            >勤務状況照会(管理者用)
                        </a>
                        @endif
                    </div>
                    @endif
                    @if(key_exists('02', $menu_list))
                    <button class="dropdown-btn WorkTmMngMenuSecond">帳票</i></button>
                    <div id="02" class="WorkTmMngMenuThird"
                            @if(isset($this_pg_cd) && $this_pg_cd['mcls'] === '02')
                            style="display:block;"
                            @endif>
                        @if(key_exists('020001', $menu_list['02']))
                        <a id="020001" href="{{ url('/form_print/WorkPlanPrint') }}"
                            @if(isset($this_pg_cd) && $this_pg_cd['pg'] === '020001')
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            @else
                            ><i class="fas fa-caret-right pg-head"></i
                            @endif
                            >勤務予定表(週・月別)
                        </a>
                        @endif
                        @if(key_exists('020002', $menu_list['02']))
                        <a id="020002" href="{{ url('/form_print/WorkTimePrint') }}"
                            @if(isset($this_pg_cd) && $this_pg_cd['pg'] === '020002')
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            @else
                            ><i class="fas fa-caret-right pg-head"></i
                            @endif
                            >勤務実績表(日・週・月別)
                        </a>
                        @endif
                        @if(key_exists('020003', $menu_list['02']))
                        <a id="020003" href="{{ url('/form_print/TimeStampPrint') }}"
                            @if(isset($this_pg_cd) && $this_pg_cd['pg'] === '020003')
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            @else
                            ><i class="fas fa-caret-right pg-head"></i
                            @endif
                            >未打刻／二重打刻一覧表
                        </a>
                        @endif
                        @if(key_exists('020004', $menu_list['02']))
                        <a id="020004" href="{{ url('/form_print/ReasonWorkPtnPrint') }}"
                            @if(isset($this_pg_cd) && $this_pg_cd['pg'] === '020004')
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            @else
                            ><i class="fas fa-caret-right pg-head"></i
                            @endif
                            >事由／勤怠一覧表
                        </a>
                        @endif
                        @if(key_exists('020005', $menu_list['02']))
                        <a id="020005" href="{{ url('/form_print/OvertimeAplPrint') }}"
                            @if(isset($this_pg_cd) && $this_pg_cd['pg'] === '020005')
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            @else
                            ><i class="fas fa-caret-right pg-head"></i
                            @endif
                            >残業申請書
                        </a>
                        @endif
                    </div>
                    @endif
                    @if(key_exists('03', $menu_list))
                    <button class="dropdown-btn WorkTmMngMenuSecond">シフト管理</button>
                    <div id="03" class="WorkTmMngMenuThird"
                            @if(isset($this_pg_cd) && $this_pg_cd['mcls'] === '03')
                            style="display:block;"
                            @endif>
                        @if(key_exists('030001', $menu_list['03']))
                        <a id="030001" href="{{ url('/shift/MT04ShiftPtnReference') }}"
                            @if(isset($this_pg_cd) && $this_pg_cd['pg'] === '030001')
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            @else
                            ><i class="fas fa-caret-right pg-head"></i
                            @endif
                            >シフトパターン情報入力
                        </a>
                        @endif
                        @if(key_exists('030003', $menu_list['03']))
                        <a id="030003" href="{{ url('/shift/MonthShiftEditor') }}"
                            @if(isset($this_pg_cd) && $this_pg_cd['pg'] === '030003')
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            @else
                            ><i class="fas fa-caret-right pg-head"></i
                            @endif
                            >月別シフト入力
                        </a>
                        @endif
                        @if(key_exists('030004', $menu_list['03']))
                        <a id="030004" href="{{ url('/shift/MonthShiftEmpEditor') }}"
                            @if(isset($this_pg_cd) && $this_pg_cd['pg'] === '030004')
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            @else
                            ><i class="fas fa-caret-right pg-head"></i
                            @endif
                            >社員別月別シフト入力
                        </a>
                        @endif
                    </div>
                    @endif
                    @if(key_exists('04', $menu_list))
                    <button class="dropdown-btn WorkTmMngMenuSecond">管理業務</button>
                    <div id="04" class="WorkTmMngMenuThird"
                            @if(isset($this_pg_cd) && $this_pg_cd['mcls'] === '04')
                            style="display:block;"
                            @endif>
                        @if(key_exists('040001', $menu_list['04']))
                        <a id="040001" href="{{ url('/mng_oprt/MT03CalendarEditor') }}"
                            @if(isset($this_pg_cd) && $this_pg_cd['pg'] === '040001')
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            @else
                            ><i class="fas fa-caret-right pg-head"></i
                            @endif
                            >カレンダー情報入力
                        </a>
                        @endif
                        @if(key_exists('040002', $menu_list['04']))
                        <a id="040002" href="{{ url('/mng_oprt/ShiftCalendarCarryOver') }}"
                            @if(isset($this_pg_cd) && $this_pg_cd['pg'] === '040002')
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            @else
                            ><i class="fas fa-caret-right pg-head"></i
                            @endif
                            >シフト月次更新処理
                        </a>
                        @endif
                        @if(key_exists('040006', $menu_list['04']))
                        <a id="040006" href="{{ url('/mng_oprt/WorkTimeFix') }}"
                            @if(isset($this_pg_cd) && $this_pg_cd['pg'] === '040006')
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            @else
                            ><i class="fas fa-caret-right pg-head"></i
                            @endif
                            >月次確定処理
                        </a>
                        @endif
                        @if(key_exists('040009', $menu_list['04']))
                        <a id="040009" href="{{ url('/mng_oprt/WorkTimeFixReference') }}"
                            @if(isset($this_pg_cd) && $this_pg_cd['pg'] === '040009')
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            @else
                            ><i class="fas fa-caret-right pg-head"></i
                            @endif
                            >月次確定状況照会
                        </a>
                        @endif
                        @if(key_exists('040003', $menu_list['04']))
                        <a id="040003" href="{{ url('/mng_oprt/WorkTimeConvert') }}"
                            @if(isset($this_pg_cd) && $this_pg_cd['pg'] === '040003')
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            @else
                            ><i class="fas fa-caret-right pg-head"></i
                            @endif
                            >最新打刻情報取得処理
                        </a>
                        @endif
                        {{-- 凍結（開発対象外）@if(key_exists('040005', $menu_list['04']))
                        <a id="040005" href="{{ url('/mng_oprt/TermInfoConvert') }}"
                            @if(isset($this_pg_cd) && $this_pg_cd['pg'] === '040005')
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            @else
                            ><i class="fas fa-caret-right pg-head"></i
                            @endif
                            >端末情報更新処理
                        </a>
                        @endif --}}
                        @if(key_exists('040007', $menu_list['04']))
                        <a id="040007" href="{{ url('/mng_oprt/WorkTimeClear') }}"
                            @if(isset($this_pg_cd) && $this_pg_cd['pg'] === '040007')
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            @else
                            ><i class="fas fa-caret-right pg-head"></i
                            @endif
                            >出退勤情報クリア処理
                        </a>
                        @endif
                        @if(key_exists('040011', $menu_list['04']))
                        <a id="040011" href="{{ url('/mng_oprt/CalendarClear') }}"
                            @if(isset($this_pg_cd) && $this_pg_cd['pg'] === '040011')
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            @else
                            ><i class="fas fa-caret-right pg-head"></i
                            @endif
                            >カレンダー情報クリア処理
                        </a>
                        @endif
                        {{-- 凍結（開発対象外）@if(key_exists('040004', $menu_list['04']))
                        <a id="040011" href="{{ url('/mng_oprt/PdHolidayCarryOver') }}"
                            @if(isset($this_pg_cd) && $this_pg_cd['pg'] === '040011')
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            @else
                            ><i class="fas fa-caret-right pg-head"></i
                            @endif
                            >有休情報更新処理
                        </a>
                        @endif --}}
                        {{-- 凍結（開発対象外）@if(key_exists('040012', $menu_list['04']))
                        <a id="040012" href="{{ url('/mng_oprt/WorkTimeDlyFix') }}"
                            @if(isset($this_pg_cd) && $this_pg_cd['pg'] === '040012')
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            @else
                            ><i class="fas fa-caret-right pg-head"></i
                            @endif
                            >日次確定処理
                        </a>
                        @endif --}}
                        {{-- 凍結（開発対象外）@if(key_exists('040013', $menu_list['04']))
                        <a id="040013" href="{{ url('/mng_oprt/WorkTimeFixDlyReference') }}"
                            @if(isset($this_pg_cd) && $this_pg_cd['pg'] === '040013')
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            @else
                            ><i class="fas fa-caret-right pg-head"></i
                            @endif
                            >日次確定状況照会
                        </a>
                        @endif --}}
                        @if(key_exists('042000', $menu_list['04']))
                        <a id="042000" href="{{ url('/mng_oprt/WorkTimeExport') }}"
                            @if(isset($this_pg_cd) && $this_pg_cd['pg'] === '042000')
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            @else
                            ><i class="fas fa-caret-right pg-head"></i
                            @endif
                            >勤務実績情報出力
                        </a>
                        @endif
                    </div>
                    @endif
                    @if(key_exists('00', $menu_list))
                    <button class="dropdown-btn WorkTmMngMenuSecond">マスタ</i></button>
                    <div id="00" class="WorkTmMngMenuThird"
                            @if(isset($this_pg_cd) && $this_pg_cd['mcls'] === '00')
                            style="display:block;"
                            @endif>
                        @if(key_exists('000001', $menu_list['00']))
                        <a id="000001" href="{{ url('/master/MT10EmpReference') }}"
                            @if(isset($this_pg_cd) && $this_pg_cd['pg'] === '000001')
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            @else
                            ><i class="fas fa-caret-right pg-head"></i
                            @endif
                            >社員情報入力
                        </a>
                        @endif
                        @if(key_exists('000002', $menu_list['00']))
                        <a id="000002" href="{{ url('/master/MT11LoginReference') }}"
                            @if(isset($this_pg_cd) && $this_pg_cd['pg'] === '000002')
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            @else
                            ><i class="fas fa-caret-right pg-head"></i
                            @endif
                            >ログイン情報入力
                        </a>
                        @endif
                        @if(key_exists('000014', $menu_list['00']))
                        <a id="000014" href="{{ url('/master/MT11PasswordEditor') }}"
                            @if(isset($this_pg_cd) && $this_pg_cd['pg'] === '000014')
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            @else
                            ><i class="fas fa-caret-right pg-head"></i
                            @endif
                            >パスワード変更入力
                        </a>
                        @endif
                        @if(key_exists('000003', $menu_list['00']))
                        <a id="000003" href="{{ url('/master/MT14PGAuthReference') }}"
                            @if(isset($this_pg_cd) && $this_pg_cd['pg'] === '000003')
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            @else
                            ><i class="fas fa-caret-right pg-head"></i
                            @endif
                            >機能権限情報入力
                        </a>
                        @endif
                        @if(key_exists('000004', $menu_list['00']))
                        <a id="000004" href="{{ url('/master/MT12DeptReference') }}"
                            @if(isset($this_pg_cd) && $this_pg_cd['pg'] === '000004')
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            @else
                            ><i class="fas fa-caret-right pg-head"></i
                            @endif
                            >部門情報入力
                        </a>
                        @endif
                        @if(key_exists('000018', $menu_list['00']))
                        <a id="000018" href="{{ url('/master/MT12OrgReference') }}"
                            @if(isset($this_pg_cd) && $this_pg_cd['pg'] === '000018')
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            @else
                            ><i class="fas fa-caret-right pg-head"></i
                            @endif
                            >組織変更入力
                        </a>
                        @endif
                        @if(key_exists('000005', $menu_list['00']))
                        <a id="000005" href="{{ url('/master/MT13DeptAuthReference') }}"
                            @if(isset($this_pg_cd) && $this_pg_cd['pg'] === '000005')
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            @else
                            ><i class="fas fa-caret-right pg-head"></i
                            @endif
                            >部門権限情報入力
                        </a>
                        @endif
                        @if(key_exists('000012', $menu_list['00']))
                        <a id="000012" href="{{ url('/master/MT08HolidayEditor') }}"
                            @if(isset($this_pg_cd) && $this_pg_cd['pg'] === '000012')
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            @else
                            ><i class="fas fa-caret-right pg-head"></i
                            @endif
                            >祝祭日・会社休日情報入力
                        </a>
                        @endif
                        @if(key_exists('000006', $menu_list['00']))
                        <a id="000006" href="{{ url('/master/MT05WorkPtnReference') }}"
                            @if(isset($this_pg_cd) && $this_pg_cd['pg'] === '000006')
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            @else
                            ><i class="fas fa-caret-right pg-head"></i
                            @endif
                            >勤務体系情報入力
                        </a>
                        @endif
                        @if(key_exists('000007', $menu_list['00']))
                        <a id="000007" href="{{ url('/master/MT07FractionEditor') }}"
                            @if(isset($this_pg_cd) && $this_pg_cd['pg'] === '000007')
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            @else
                            ><i class="fas fa-caret-right pg-head"></i
                            @endif
                            >端数処理情報入力
                        </a>
                        @endif
                        @if(key_exists('000008', $menu_list['00']))
                        <a id="000008" href="{{ url('/master/MT02CalendarPtnReference') }}"
                            @if(isset($this_pg_cd) && $this_pg_cd['pg'] === '000008')
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            @else
                            ><i class="fas fa-caret-right pg-head"></i
                            @endif
                            >カレンダーパターン情報入力
                        </a>
                        @endif
                        @if(key_exists('000010', $menu_list['00']))
                        <a id="000010" href="{{ url('/master/MT06OverTmLmtEditor') }}"
                            @if(isset($this_pg_cd) && $this_pg_cd['pg'] === '000010')
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            @else
                            ><i class="fas fa-caret-right pg-head"></i
                            @endif
                            >残業上限情報入力
                        </a>
                        @endif
                        @if(key_exists('000011', $menu_list['00']))
                        <a id="000011" href="{{ url('/master/MT01ControlEditor') }}"
                            @if(isset($this_pg_cd) && $this_pg_cd['pg'] === '000011')
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            @else
                            ><i class="fas fa-caret-right pg-head"></i
                            @endif
                            >基本情報入力
                        </a>
                        @endif
                        @if(key_exists('000019', $menu_list['00']))
                        <a id="000019" href="{{ url('/master/MT10EmpCnvert') }}"
                            @if(isset($this_pg_cd) && $this_pg_cd['pg'] === '000019')
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            @else
                            ><i class="fas fa-caret-right pg-head"></i
                            @endif
                            >社員番号一括変換
                        </a>
                        @endif
                        @if(key_exists('000020', $menu_list['00']))
                        <a id="000020" href="{{ url('/master/EmpExport') }}"
                            @if(isset($this_pg_cd) && $this_pg_cd['pg'] === '000020')
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            @else
                            ><i class="fas fa-caret-right pg-head"></i
                            @endif
                            >社員情報書出処理
                        </a>
                        @endif
                        @if(key_exists('000021', $menu_list['00']))
                        <a id="000021" href="{{ url('/master/EmpImport') }}"
                            @if(isset($this_pg_cd) && $this_pg_cd['pg'] === '000021')
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            @else
                            ><i class="fas fa-caret-right pg-head"></i
                            @endif
                            >社員情報取込処理
                        </a>
                        @endif
                        @if(key_exists('000022', $menu_list['00']))
                        <a id="000022" href="{{ url('/master/MT23CompanyReference') }}"
                            @if(isset($this_pg_cd) && $this_pg_cd['pg'] === '000022')
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            @else
                            ><i class="fas fa-caret-right pg-head"></i
                            @endif
                            >所属情報入力
                        </a>
                        @endif
                    </div>
                    @endif
                </div>
                @endif
            </td>
            <td class="body-border" id="vertical-splitter">
                <p title="折り畳み/展開"></p>
            </td>
            <td id="contents">
                <div id="contents-container">
                    <div id="contents-sitemap">
                        @if(isset($this_pg_cd) && $this_pg_cd['mcls'] !== '')
                        <span id=sitemappath style="font-family: verdana">
                            <span>
                                <a title="勤怠管理システムメニュー" style="color: #1c5e55">勤怠管理システムメニュー</a>
                            </span>
                            <span style="color: #1c5e55">＞</span>
                            <span>
                                <a title="マスタ" style="color: #666666" id="pathMenuSecond">
                                    {{ $menu_list[$this_pg_cd['mcls']]['MCLS_NAME'] }}
                                </a>
                            </span>
                            <span style="color: #1c5e55">＞</span>
                            <span style="font-weight: bold; color: #333333" id="pathMenuThird">
                                {{ $menu_list[$this_pg_cd['mcls']][$this_pg_cd['pg']] }}
                            </span>
                        </span>
                        @endif
                        <span style="padding:1em"></span>
                    </div>
                    @yield('content')
                </div>
            </td>
        </tr>
    </table>

    <script>
        // 勤怠管理システムメニュー　一覧表示処理
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;

        for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var dropdownContent = this.nextElementSibling;
                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                } else {
                    dropdownContent.style.display = "block";
                }
            });
        }


        $(function(){
            $('#vertical-splitter').click(function() {
                if ($('#menu').css('display') == 'none') {
                    $('#menu').css('display', 'table-cell');
                    $('#vertical-splitter p').removeClass('on');
                } else {
                    $('#menu').hide();
                    $('#vertical-splitter p').addClass('on');
                }
                $(window).resize();
            });

            // すべて閉じる
            $('table.WorkTmMngMenuThird').parent().parent().hide();

            // 「勤怠管理システムメニュー」押下時のメニュー開閉
            $(".WorkTmMngMenuFirst").click(function() {
                var anyOpened = $(".WorkTmMngMenuThird:visible").length > 0;
                if (anyOpened) {
                    $('.WorkTmMngMenuThird').hide();
                } else {
                    $('.WorkTmMngMenuThird').show();
                }
            });
        });

    </script>
@endsection
