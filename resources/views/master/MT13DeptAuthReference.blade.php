<!-- 部門権限情報入力 -->
@extends('menu.main')

@section('title','部門権限情報入力')

@section('content')
<div id="contents-stage">
    <table class="BaseContainerStyle1">
        <tbody>
            <tr>
                <td>
                    <div id="ctl00_cphContentsArea_UpdatePanel1">

                        <p class="FunctionMenu1"><a id="ctl00_cphContentsArea_hlAddDeptAuth" href="MT13DeptAuthEditor?Id=Add">新規部門権限登録</a></p>

                        <div class="line"></div>

                        <div class="GridViewStyle1">
                            <div>
                                <table class="GridViewSpace" id="ctl00_cphContentsArea_gvDeptAuth" style="border-collapse: collapse;" border="1" rules="all" cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <th scope="col">
                                                部門権限
                                            </th>
                                            <th scope="col">
                                                部門権限
                                            </th>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a id="ctl00_cphContentsArea_gvDeptAuth_ctl02_hlDeptAuth1" href="MT13DeptAuthEditor.aspx?Id=000010">000010 : 営業部管理者</a>
                                            </td>
                                            <td style="width: 350px;">

                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a id="ctl00_cphContentsArea_gvDeptAuth_ctl03_hlDeptAuth1" href="MT13DeptAuthEditor.aspx?Id=000020">000020 : 製造部管理者</a>
                                            </td>
                                            <td style="width: 350px;">

                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a id="ctl00_cphContentsArea_gvDeptAuth_ctl04_hlDeptAuth1" href="MT13DeptAuthEditor.aspx?Id=000030">000030 : 経理部管理者</a>
                                            </td>
                                            <td style="width: 350px;">

                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a id="ctl00_cphContentsArea_gvDeptAuth_ctl05_hlDeptAuth1" href="MT13DeptAuthEditor.aspx?Id=000040">000040 : 総務部管理者</a>
                                            </td>
                                            <td style="width: 350px;">

                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a id="ctl00_cphContentsArea_gvDeptAuth_ctl06_hlDeptAuth1" href="MT13DeptAuthEditor.aspx?Id=000050">000050 : 購買部管理者</a>
                                            </td>
                                            <td style="width: 350px;">

                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a id="ctl00_cphContentsArea_gvDeptAuth_ctl07_hlDeptAuth1" href="MT13DeptAuthEditor.aspx?Id=000060">000060 : 資材部管理者</a>
                                            </td>
                                            <td style="width: 350px;">

                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a id="ctl00_cphContentsArea_gvDeptAuth_ctl08_hlDeptAuth1" href="MT13DeptAuthEditor.aspx?Id=000070">000070 : 品質保証部管理者</a>
                                            </td>
                                            <td style="width: 350px;">

                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a id="ctl00_cphContentsArea_gvDeptAuth_ctl09_hlDeptAuth1" href="MT13DeptAuthEditor.aspx?Id=999999">999999 : 管理者</a>
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