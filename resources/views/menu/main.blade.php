@extends('common.home')

@section('title','勤怠管理システム_main')

@include('common.header')

@include('menu.index')

@section('main')
    <table id="body" style="height: 883px;">
        <tr>
            <td class="body-border"></td>
            <td id="menu">
                <div class="sidenav">
                    {{-- <button class="WorkTmMngMenuFirst">勤怠管理システムメニュー</button> --}}
                    <input type="button" class="WorkTmMngMenuFirst" value="勤怠管理システムメニュー" />
                    <button class="dropdown-btn WorkTmMngMenuSecond">勤怠管理<i class="fa fa-caret-down"></i></button>
                    <div class="WorkTmMngMenuThird">
                        <a href="{{ url('/work_time/WorkTimeEditor') }}">出退勤入力</a>
                        <a href="{{ url('/work_time/WorkTimeDeptEditor') }}">出退勤入力(部門別)</a>
                        <a href="{{ url('/work_time/EmpWorkStatusReference') }}">出退勤照会</a>
                        <a href="{{ url('/work_time/WorkTimeReference') }}">勤務状況照会(個人用)</a>
                        <a href="{{ url('/work_time/EmpWorkTimeReference') }}">勤務状況照会(管理者用)</a>
                    </div>
                    <button class="dropdown-btn WorkTmMngMenuSecond">帳票<i class="fa fa-caret-down"></i></button>
                    <div class="WorkTmMngMenuThird">
                        <a href="{{url('/form_print/WT_Print')}}">勤務予定表(週・月別)</a>
                        <a href="{{url('/form_print/WP_Print')}}">勤務実績表(日・週・月別)</a>
                        <a href="{{url('/form_print/TS_Print')}}">未打刻／二重打刻一覧表</a>
                        <a href="{{url('/form_print/RW_Print')}}">事由／勤怠一覧表</a>
                        <a href="{{url('/form_print/OT_Print')}}">残業申請書</a>
                    </div>
                    <button class="dropdown-btn WorkTmMngMenuSecond">シフト管理<i class="fa fa-caret-down"></i></button>
                    <div class="WorkTmMngMenuThird">
                        <a href="{{url('/shift/ShiftPtn_Editor')}}">シフトパターン情報入力</a>
                        <a href="{{url('/shift/MonthShift_Editor')}}">月別シフト入力</a>
                        <a href="{{url('/shift/MonthShiftEmp_Editor')}}">社員別月別シフト入力</a>
                    </div>
                    <button class="dropdown-btn WorkTmMngMenuSecond">管理業務<i class="fa fa-caret-down"></i></button>
                    <div class="WorkTmMngMenuThird">
                    <a href="{{url('/mng_oprt/MT03CalendarEditor')}}">カレンダー情報入力</a>
                        <a href="{{url('/mng_oprt/ShiftCalendarCarryOver')}}">シフト月次更新処理</a>
                        <a href="{{url('/mng_oprt/WorkTimeFix')}}">月次確定処理</a>
                        <a href="{{url('/mng_oprt/WorkTimeFixReference')}}">月次確定状況照会</a>
                        <a href="{{url('/mng_oprt/WorkTimeConvert')}}">最新打刻情報取得処理</a>
                        <a href="{{url('/mng_oprt/WorkTimeClear')}}">出退勤情報クリア処理</a>
                        <a href="{{url('/mng_oprt/CalendarClear')}}">カレンダー情報クリア処理</a>
                        <a href="{{url('/mng_oprt/WorkTimeExport')}}">勤務実績情報出力</a>
                    </div>
                    <button class="dropdown-btn WorkTmMngMenuSecond">マスタ<i class="fa fa-caret-down"></i></button>
                    <div class="WorkTmMngMenuThird">
                        <a href="{{url('/master/MT10EmpReference')}}">社員情報入力</a>
                        <a href="{{url('/master/MT11LoginReference')}}">ログイン情報入力</a>
                        <a href="{{url('/master/MT11PasswordEditor')}}">パスワード変更入力</a>
                        <a href="{{url('/master/MT14PGAuthReference')}}">機能権限情報入力</a>
                        <a href="{{url('/master/MT12DeptReference')}}">部門情報入力</a>
                        <a href="{{url('/master/MT12OrgReference')}}">組織変更入力</a>
                        <a href="{{url('/master/MT13DeptAuthReference')}}">部門権限情報入力</a>
                        <a href="{{url('/master/MT08HolidayEditor')}}">祝祭日・会社休日情報入力</a>
                        <a href="{{url('/master/MT05WorkPtnReference')}}">勤務体系情報入力</a>
                        <a href="{{url('/master/MT07FractionEditor')}}">端数処理情報入力</a>
                        <a href="{{url('/master/MT02CalendarPtnReference')}}">カレンダーパターン情報入力</a>
                        <a href="{{url('/master/MT06OverTmLmtEditor')}}">残業上限情報入力</a>
                        <a href="{{url('/master/MT01ControlEditor')}}">基本情報入力</a>
                        <a href="{{url('/master/')}}">有休情報入力（後追加）</a>
                        <a href="{{url('/master/MT10EmpCnvert')}}">社員番号一括変換</a>
                        <a href="{{url('/master/EmpExport')}}">社員情報書出処理</a>
                        <a href="{{url('/master/EmpImport')}}">社員情報取込処理</a>
                        <a href="{{url('/master/MT23CompanyReference')}}">所属情報入力</a>
                    </div>
            </td>
            <td class="body-border" id="vertical-splitter">
                <p title="折り畳み/展開"></p>
            </td>
            <td id="contents">
                <div id="contents-container">
                    <div id="contents-sitemap">
                        <span>
                            <a href="#">
                                <img style="width: 0px; height: 0px;" src="" alt="ナビゲーション リンクのスキップ">
                            </a>
                            <a id=""></a>
                        </span>
                    </div>
                   @yield('content')
                </div>
            </td>
        </tr>
    </table>

    <script>
        //勤怠管理システムメニュー　一覧表示処理
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

        //折り畳み/展開処理
        $('#vertical-splitter').click(function() {
            if ($('#menu').css('display') == 'none') {
                $('#menu').css('display', 'block');
                $('#vertical-splitter p').removeClass('on');
            } else {
                $('#menu').css('display', 'none');
                $('#vertical-splitter p').addClass('on');
            }
            $(window).resize();
        });

        // すべて閉じる
        $('table.WorkTmMngMenuThird').parent().parent().css('display', 'none');

    </script>
@endsection
