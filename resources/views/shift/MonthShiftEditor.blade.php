<!-- 月別シフト入力画面 -->
@extends('menu.main')
@section('title','月別シフト入力')
@section('content')
    <div id="contents-stage">
        <table class="BaseContainerStyle1">
            <tbody>
                <tr>
                    <td>

                        <div id="ctl00_cphContentsArea_UpdatePanel1">

                            <p class="FunctionMenu1">
                                <a id="ctl00_cphContentsArea_hlAddShipPtn" style="font-size: 12px;"
                                    href="MT04ShiftPtnEditor.aspx?Id=Add">新規シフトパターン登録</a>
                            </p>

                            <div class="line"></div>

                            <div class="GridViewStyle1">
                                <div>
                                    <table class="GridViewSpace" id="ctl00_cphContentsArea_gvShiftPtn"
                                        style="border-collapse: collapse;" border="1" rules="all" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <th scope="col">
                                                    シフトパターン
                                                </th>
                                                <th scope="col">
                                                    シフトパターン
                                                </th>
                                            </tr>
                                            <tr style="background-color: white;">
                                                <td style="width: 350px;">
                                                    <a id="ctl00_cphContentsArea_gvShiftPtn_ctl02_hlShiftPtn1"
                                                        href="MT04ShiftPtnEditor.aspx?Id=001">001 : ４勤２休</a>
                                                </td>
                                                <td style="width: 350px;">

                                                </td>
                                            </tr>
                                            <tr style="background-color: white;">
                                                <td style="width: 350px;">
                                                    <a id="ctl00_cphContentsArea_gvShiftPtn_ctl03_hlShiftPtn1"
                                                        href="MT04ShiftPtnEditor.aspx?Id=002">002 : ３勤１休(Aパターン)</a>
                                                </td>
                                                <td style="width: 350px;">

                                                </td>
                                            </tr>
                                            <tr style="background-color: white;">
                                                <td style="width: 350px;">
                                                    <a id="ctl00_cphContentsArea_gvShiftPtn_ctl04_hlShiftPtn1"
                                                        href="MT04ShiftPtnEditor.aspx?Id=003">003 : ３勤１休(Bパターン)</a>
                                                </td>
                                                <td style="width: 350px;">

                                                </td>
                                            </tr>
                                            <tr style="background-color: white;">
                                                <td style="width: 350px;">
                                                    <a id="ctl00_cphContentsArea_gvShiftPtn_ctl05_hlShiftPtn1"
                                                        href="MT04ShiftPtnEditor.aspx?Id=004">004 : 5勤2休</a>
                                                </td>
                                                <td style="width: 350px;">

                                                </td>
                                            </tr>
                                            <tr style="background-color: white;">
                                                <td style="width: 350px;">
                                                    <a id="ctl00_cphContentsArea_gvShiftPtn_ctl06_hlShiftPtn1"
                                                        href="MT04ShiftPtnEditor.aspx?Id=100">100 : tin</a>
                                                </td>
                                                <td style="width: 350px;">

                                                </td>
                                            </tr>
                                            <tr style="background-color: white;">
                                                <td style="width: 350px;">
                                                    <a id="ctl00_cphContentsArea_gvShiftPtn_ctl07_hlShiftPtn1"
                                                        href="MT04ShiftPtnEditor.aspx?Id=900">900 : 4勤2休(パターン２)</a>
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
