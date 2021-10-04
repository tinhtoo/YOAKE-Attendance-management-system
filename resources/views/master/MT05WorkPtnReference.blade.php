<!-- 勤務体系情報照会 -->
@extends('menu.main')

@section('title','勤務体系情報照会')

@section('content')
<div id="contents-stage">
    <table class="BaseContainerStyle1">
        <tbody>
            <tr>
                <td>
                    <div id="ctl00_cphContentsArea_UpdatePanel1">

                        <p class="FunctionMenu1"><a id="ctl00_cphContentsArea_hlAddEmp" href="MT05WorkPtnEditor?Id=Add">新規勤務体系登録</a></p>

                        <div class="line"></div>

                        <div class="GridViewStyle1">
                            <div>
                                <table class="GridViewSpace" id="ctl00_cphContentsArea_gvWorkPtn" style="border-collapse: collapse;" border="1" rules="all" cellspacing="0">
                                    <tbody>
                                        <tr class="GridViewHeaderTitle1 Nowrap">
                                            <th scope="col">
                                                勤務体系
                                            </th>
                                            <th scope="col">
                                                勤務体系
                                            </th>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a id="ctl00_cphContentsArea_gvWorkPtn_ctl02_hlWorkPtn1" href="MT05WorkPtnEditor.aspx?Id=001">001 : 通常１(8-17)</a>
                                            </td>
                                            <td style="width: 350px;">
                                                <a id="ctl00_cphContentsArea_gvWorkPtn_ctl02_hlWorkPtn2" href="MT05WorkPtnEditor.aspx?Id=109">109 : 夜間Ⅷ(23-32)</a>
                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a id="ctl00_cphContentsArea_gvWorkPtn_ctl03_hlWorkPtn1" href="MT05WorkPtnEditor.aspx?Id=002">002 : 休日勤務</a>
                                            </td>
                                            <td style="width: 350px;">
                                                <a id="ctl00_cphContentsArea_gvWorkPtn_ctl03_hlWorkPtn2" href="MT05WorkPtnEditor.aspx?Id=200">200 : パート０１</a>
                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a id="ctl00_cphContentsArea_gvWorkPtn_ctl04_hlWorkPtn1" href="MT05WorkPtnEditor.aspx?Id=003">003 : 通常２(5-14)</a>
                                            </td>
                                            <td style="width: 350px;">

                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a id="ctl00_cphContentsArea_gvWorkPtn_ctl05_hlWorkPtn1" href="MT05WorkPtnEditor.aspx?Id=004">004 : 通常３(6-15)</a>
                                            </td>
                                            <td style="width: 350px;">

                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a id="ctl00_cphContentsArea_gvWorkPtn_ctl06_hlWorkPtn1" href="MT05WorkPtnEditor.aspx?Id=005">005 : 通常４(7-16)</a>
                                            </td>
                                            <td style="width: 350px;">

                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a id="ctl00_cphContentsArea_gvWorkPtn_ctl07_hlWorkPtn1" href="MT05WorkPtnEditor.aspx?Id=006">006 : 通常５(9-18)</a>
                                            </td>
                                            <td style="width: 350px;">

                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a id="ctl00_cphContentsArea_gvWorkPtn_ctl08_hlWorkPtn1" href="MT05WorkPtnEditor.aspx?Id=007">007 : 通常６(10-19)</a>
                                            </td>
                                            <td style="width: 350px;">

                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a id="ctl00_cphContentsArea_gvWorkPtn_ctl09_hlWorkPtn1" href="MT05WorkPtnEditor.aspx?Id=008">008 : 通常７(11-20)</a>
                                            </td>
                                            <td style="width: 350px;">

                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a id="ctl00_cphContentsArea_gvWorkPtn_ctl10_hlWorkPtn1" href="MT05WorkPtnEditor.aspx?Id=009">009 : 通常８(13-22)</a>
                                            </td>
                                            <td style="width: 350px;">

                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a id="ctl00_cphContentsArea_gvWorkPtn_ctl11_hlWorkPtn1" href="MT05WorkPtnEditor.aspx?Id=011">011 : 通常１０(15-24)</a>
                                            </td>
                                            <td style="width: 350px;">

                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a id="ctl00_cphContentsArea_gvWorkPtn_ctl12_hlWorkPtn1" href="MT05WorkPtnEditor.aspx?Id=012">012 : 通常１１(5:30-14:30)</a>
                                            </td>
                                            <td style="width: 350px;">

                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a id="ctl00_cphContentsArea_gvWorkPtn_ctl13_hlWorkPtn1" href="MT05WorkPtnEditor.aspx?Id=013">013 : 通常１２(6:30-15:30)</a>
                                            </td>
                                            <td style="width: 350px;">

                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a id="ctl00_cphContentsArea_gvWorkPtn_ctl14_hlWorkPtn1" href="MT05WorkPtnEditor.aspx?Id=101">101 : 夜間Ⅰ(20-29)</a>
                                            </td>
                                            <td style="width: 350px;">

                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a id="ctl00_cphContentsArea_gvWorkPtn_ctl15_hlWorkPtn1" href="MT05WorkPtnEditor.aspx?Id=102">102 : 休日夜間勤務</a>
                                            </td>
                                            <td style="width: 350px;">

                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a id="ctl00_cphContentsArea_gvWorkPtn_ctl16_hlWorkPtn1" href="MT05WorkPtnEditor.aspx?Id=103">103 : 夜間Ⅱ(16-25)</a>
                                            </td>
                                            <td style="width: 350px;">

                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a id="ctl00_cphContentsArea_gvWorkPtn_ctl17_hlWorkPtn1" href="MT05WorkPtnEditor.aspx?Id=104">104 : 夜間Ⅲ(17-26)</a>
                                            </td>
                                            <td style="width: 350px;">

                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a id="ctl00_cphContentsArea_gvWorkPtn_ctl18_hlWorkPtn1" href="MT05WorkPtnEditor.aspx?Id=105">105 : 夜間Ⅳ(18-27)</a>
                                            </td>
                                            <td style="width: 350px;">

                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a id="ctl00_cphContentsArea_gvWorkPtn_ctl19_hlWorkPtn1" href="MT05WorkPtnEditor.aspx?Id=106">106 : 夜間Ⅴ(19-28)</a>
                                            </td>
                                            <td style="width: 350px;">

                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a id="ctl00_cphContentsArea_gvWorkPtn_ctl20_hlWorkPtn1" href="MT05WorkPtnEditor.aspx?Id=107">107 : 夜間Ⅵ(21-30)</a>
                                            </td>
                                            <td style="width: 350px;">

                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a id="ctl00_cphContentsArea_gvWorkPtn_ctl21_hlWorkPtn1" href="MT05WorkPtnEditor.aspx?Id=108">108 : 夜間Ⅶ(22-31)</a>
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