<!-- 部門情報入力  -->
@extends('menu.main')

@section('title','部門情報入力 ')

@section('content')
<div id="contents-stage">
    <table class="BaseContainerStyle1">
        <tbody>
            <tr>
                <td>
                    <div id="ctl00_cphContentsArea_UpdatePanel1">

                        <div class="GridViewStyle1">
                            <div>
                                <table id="ctl00_cphContentsArea_gvDept" style="border-collapse: collapse;" border="1" rules="all" cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <th scope="col">
                                                部門
                                            </th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a id="ctl00_cphContentsArea_gvDept_ctl02_hlDept" href="MT12DeptEditor.aspx?Id=000000">000000 : アイティーエス</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a id="ctl00_cphContentsArea_gvDept_ctl03_hlDept" href="MT12DeptEditor.aspx?Id=000010">000010 : 　　　営業部</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a id="ctl00_cphContentsArea_gvDept_ctl04_hlDept" href="MT12DeptEditor.aspx?Id=000011">000011 : 　　　　　　営業一課</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a id="ctl00_cphContentsArea_gvDept_ctl05_hlDept" href="MT12DeptEditor.aspx?Id=000012">000012 : 　　　　　　営業二課</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a id="ctl00_cphContentsArea_gvDept_ctl06_hlDept" href="MT12DeptEditor.aspx?Id=000020">000020 : 　　　製造部</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a id="ctl00_cphContentsArea_gvDept_ctl07_hlDept" href="MT12DeptEditor.aspx?Id=000021">000021 : 　　　　　　製造一課</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a id="ctl00_cphContentsArea_gvDept_ctl08_hlDept" href="MT12DeptEditor.aspx?Id=000022">000022 : 　　　　　　製造二課</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a id="ctl00_cphContentsArea_gvDept_ctl09_hlDept" href="MT12DeptEditor.aspx?Id=000023">000023 : 　　　　　　製造三課</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a id="ctl00_cphContentsArea_gvDept_ctl10_hlDept" href="MT12DeptEditor.aspx?Id=000030">000030 : 　　　経理部</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a id="ctl00_cphContentsArea_gvDept_ctl11_hlDept" href="MT12DeptEditor.aspx?Id=000040">000040 : 　　　総務部</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a id="ctl00_cphContentsArea_gvDept_ctl12_hlDept" href="MT12DeptEditor.aspx?Id=000050">000050 : 　　　購買部</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a id="ctl00_cphContentsArea_gvDept_ctl13_hlDept" href="MT12DeptEditor.aspx?Id=000051">000051 : 　　　　　　購買一課</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a id="ctl00_cphContentsArea_gvDept_ctl14_hlDept" href="MT12DeptEditor.aspx?Id=000052">000052 : 　　　　　　購買二課</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a id="ctl00_cphContentsArea_gvDept_ctl15_hlDept" href="MT12DeptEditor.aspx?Id=000060">000060 : 　　　資材部</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a id="ctl00_cphContentsArea_gvDept_ctl16_hlDept" href="MT12DeptEditor.aspx?Id=000070">000070 : 　　　品質保証一部</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a id="ctl00_cphContentsArea_gvDept_ctl17_hlDept" href="MT12DeptEditor.aspx?Id=000071">000071 : 　　　　　　品質保証一課</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a id="ctl00_cphContentsArea_gvDept_ctl18_hlDept" href="MT12DeptEditor.aspx?Id=000080">000080 : 　　　品質保証二部</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a id="ctl00_cphContentsArea_gvDept_ctl19_hlDept" href="MT12DeptEditor.aspx?Id=000072">000072 : 　　　　　　品質保証二課</a>
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