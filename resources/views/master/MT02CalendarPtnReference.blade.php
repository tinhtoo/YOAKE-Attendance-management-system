<!-- カレンダーパターン情報入力   -->
@extends('menu.main')

@section('title','カレンダーパターン情報入力 ')

@section('content')
<div id="contents-stage">
    <table class="BaseContainerStyle1">
        <tbody>
            <tr>
                <td>

                    <div id="ctl00_cphContentsArea_UpdatePanel1">


                        <p class="FunctionMenu1"><a id="ctl00_cphContentsArea_hlAddCalendarPtn" href="MT02CalendarPtnEditor.aspx?Id=Add">新規カレンダーパターン登録</a></p>
                        <div class="line"></div>

                        <div class="GridViewStyle1">

                            <div>
                                <table class="GridViewSpace" id="ctl00_cphContentsArea_gvCalendarPtn" style="border-collapse: collapse;" border="1" rules="all" cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <th scope="col">
                                                カレンダーパターン
                                            </th>
                                            <th scope="col">
                                                カレンダーパターン
                                            </th>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a id="ctl00_cphContentsArea_gvCalendarPtn_ctl02_hlCalendarPtn1" href="MT02CalendarPtnEditor.aspx?Id=001">001:通常１(8:00～17:00)</a>
                                            </td>
                                            <td style="width: 350px;">

                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a id="ctl00_cphContentsArea_gvCalendarPtn_ctl03_hlCalendarPtn1" href="MT02CalendarPtnEditor.aspx?Id=002">002:通常2(7:00～16:00)</a>
                                            </td>
                                            <td style="width: 350px;">

                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a id="ctl00_cphContentsArea_gvCalendarPtn_ctl04_hlCalendarPtn1" href="MT02CalendarPtnEditor.aspx?Id=003">003:通常3(9:00～1800)</a>
                                            </td>
                                            <td style="width: 350px;">

                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a id="ctl00_cphContentsArea_gvCalendarPtn_ctl05_hlCalendarPtn1" href="MT02CalendarPtnEditor.aspx?Id=010">010:夜勤Ⅰ(20:00～29:00)</a>
                                            </td>
                                            <td style="width: 350px;">

                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a id="ctl00_cphContentsArea_gvCalendarPtn_ctl06_hlCalendarPtn1" href="MT02CalendarPtnEditor.aspx?Id=011">011:夜勤Ⅱ(16:00～25:00)</a>
                                            </td>
                                            <td style="width: 350px;">

                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a id="ctl00_cphContentsArea_gvCalendarPtn_ctl07_hlCalendarPtn1" href="MT02CalendarPtnEditor.aspx?Id=100">100:シフト勤務用</a>
                                            </td>
                                            <td style="width: 350px;">

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>

                </td>
            </tr>

        </tbody>
    </table>
</div>
@endsection