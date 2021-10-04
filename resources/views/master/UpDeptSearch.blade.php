@extends('common.home')

@section('title','部門情報検索 ')

@section('content_search')
<div id="search-container">
    <form id="frmMT12DeptSearch" runat="server">
        <div id="contents-stage">
            <input name="btnBack" id="btnBack" style="width: 80px; height: 21px; " onclick="javascript:__doPostBack('btnBack','')" type="button" value="戻る">

            <div class="GridViewStyle1 mg10" id="search-gridview-container">
                <div class="GridViewPanelStyle3" id="pnlCalendarPtn">

                    <div>
                        <table class="GridViewPadding" id="gvDept" style="border-collapse: collapse;" border="1" rules="all" cellspacing="0">
                            <tbody>
                                <tr>
                                    <th scope="col">
                                        選択
                                    </th>
                                    <th scope="col">
                                        部門
                                    </th>
                                </tr>
                                <tr>
                                    <td style="width: 20px;">

                                    </td>
                                    <td>
                                        <span id="gvDept_ctl02_lblDept">000000 : アイティーエス</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 20px;">

                                    </td>
                                    <td>
                                        <span id="gvDept_ctl03_lblDept">000010 :営業部</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 20px;">

                                    </td>
                                    <td>
                                        <span id="gvDept_ctl04_lblDept">000011 :営業一課</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 20px;">

                                    </td>
                                    <td>
                                        <span id="gvDept_ctl05_lblDept">000012 :営業二課</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 20px;">

                                    </td>
                                    <td>
                                        <span id="gvDept_ctl06_lblDept">EA0013 :営業三課</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 20px;">

                                    </td>
                                    <td>
                                        <span id="gvDept_ctl15_lblDept">000020 :製造部</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 20px;">

                                    </td>
                                    <td>
                                        <span id="gvDept_ctl16_lblDept">000021 :製造一課</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 20px;">

                                    </td>
                                    <td>
                                        <span id="gvDept_ctl17_lblDept">000022 :製造二課</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 20px;">

                                    </td>
                                    <td>
                                        <span id="gvDept_ctl18_lblDept">000023 :製造三課</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 20px;">

                                    </td>
                                    <td>
                                        <span id="gvDept_ctl19_lblDept">000030 :経理部</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 20px;">

                                    </td>
                                    <td>
                                        <span id="gvDept_ctl20_lblDept">000040 :総務部</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 20px;">

                                    </td>
                                    <td>
                                        <span id="gvDept_ctl21_lblDept">000050 :購買部</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 20px;">

                                    </td>
                                    <td>
                                        <span id="gvDept_ctl22_lblDept">000051 :購買一課</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 20px;">

                                    </td>
                                    <td>
                                        <span id="gvDept_ctl23_lblDept">000052 :購買二課</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 20px;">

                                    </td>
                                    <td>
                                        <span id="gvDept_ctl24_lblDept">000060 :資材部</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 20px;">

                                    </td>
                                    <td>
                                        <span id="gvDept_ctl25_lblDept">000070 :品質保証一部</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 20px;">

                                    </td>
                                    <td>
                                        <span id="gvDept_ctl26_lblDept">000071 :品質保証一課</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 20px;">

                                    </td>
                                    <td>
                                        <span id="gvDept_ctl27_lblDept">000080 :品質保証二部</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 20px;">

                                    </td>
                                    <td>
                                        <span id="gvDept_ctl28_lblDept">000072 :品質保証二課</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </form>
</div>
@endsection