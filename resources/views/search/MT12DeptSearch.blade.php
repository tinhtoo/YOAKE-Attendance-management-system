<!-- 部門情報検索 -->
@extends('common.home')
@section('title', '部門情報検索')
@section('content_search')
    <div id="search-container">
        <form id="DeptModal" runat="server" name="DeptModal">
            {{ csrf_field() }}
            @if(key_exists('dispClsCd', $request_data))<input type="hidden" name="dispClsCd" value="{{ $request_data['dispClsCd'] }}">@endif
            @if(key_exists('isDeptAuth', $request_data))<input type="hidden" name="isDeptAuth" value="{{ $request_data['isDeptAuth'] }}">@endif
            <div id="contents-stage">
                <input name="btnBack" id="btnBack" style="width: 80px; height: 21px;" onclick="window.close();"
                    type="button" value="戻る">

                <div class="GridViewStyle1 mg10" id="search-gridview-container">
                    <div class="GridViewPanelStyle3" id="pnlCalendarPtn">

                        <div>
                            <table class="GridViewPadding" id="gvDept" style="border-collapse: collapse;" border="1"
                                rules="all" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <th scope="col">
                                            選択
                                        </th>
                                        <th scope="col">
                                            部門
                                        </th>
                                    </tr>
                                    @isset($dept_list)
                                        @foreach ($dept_list as $dept)
                                            <tr class="bkcolor" backgroundColor="transparent">
                                                <td style="width: 15px;">
                                                    @if(!$selectable_dept || in_array($dept->DEPT_CD, $selectable_dept))
                                                    <input type="radio" name="dept" value="{{ $dept->DEPT_CD }}"
                                                        id="{{ $dept->DEPT_NAME }}" onclick="Deptfunc();">
                                                    @endif
                                                </td>
                                                <td style="width: 200px; white-space: nowrap;">
                                                    <label for="{{ $dept->DEPT_NAME }}"
                                                        style="width: 13%;@if(!$selectable_dept || in_array($dept->DEPT_CD, $selectable_dept))cursor: pointer;@endif">
                                                        <span>{{ $dept->DEPT_CD }}
                                                    </label>
                                                    <label for="{{ $dept->DEPT_NAME }}"
                                                        style="width: 87%;@if(!$selectable_dept || in_array($dept->DEPT_CD, $selectable_dept))cursor: pointer;@endif">
                                                        <span>:&nbsp;
                                                            {{ str_pad($dept->DEPT_NAME, strlen($dept->DEPT_NAME) + 9 * $dept->LEVEL_NO, '　　　', STR_PAD_LEFT) }}</span>
                                                    </label>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endisset
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </form>
    </div>
@endsection
@section('script')
<script>
    function Deptfunc() {
        if (!window.opener || window.opener.closed) {
            alert("呼び出し元が既に閉じられています。");
            return false;
        }

        var Depts = document.getElementsByName("dept");
        var parentTd;
        var txtDeptCd;
        var txtDeptName;

        var deptCd = $("[name=dept]:checked").val();
        var deptName = $("[name=dept]:checked").attr("id");

        if (window.opener.$(".clickedTableRecord").length) {
            parentTd = window.opener.$(".clickedTableRecord").closest("td");
            txtDeptCd = parentTd.find('.txtDeptCd');
            txtDeptName = parentTd.find('.txtDeptName');
            parentTd.find("#deptNameError").text("");
        } else {
            parentTd = window.opener.$('#txtDeptCd').closest("td");
            txtDeptCd = parentTd.find('#txtDeptCd');
            txtDeptName = parentTd.find('#deptName');
            parentTd.find("#deptNameError").text("");
        }

        if (parentTd.length) {
            txtDeptCd.val(deptCd);
        }

        if (parentTd.length) {
            txtDeptName.val(deptName);
        }
        window.close();
    }
</script>
@endsection
