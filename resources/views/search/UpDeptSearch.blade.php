<!-- 部門情報検索 -->
@extends('common.home')

@section('title', '部門情報検索')

@section('content_search')
    <div id="search-container">
        <form id="DeptModal" runat="server" name="DeptModal">
            {{ csrf_field() }}
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
                                        <th scope="col" colspan="2">
                                            部門
                                        </th>
                                    </tr>
                                    @foreach ($dept_all as $dept)
                                    <tr class="bkcolor" backgroundColor="transparent" >
                                        <td style="width: 30px;" >
                                            @if(!in_array($dept->DEPT_CD, $check_hide_list, true))
                                            <input type="radio" name="dept" value="{{ $dept->DEPT_CD }}"
                                                id="{{ $dept->DEPT_NAME }}" onclick="deptFunc();">
                                            @endif
                                        </td>
                                        <td style="width: 30px; white-space: nowrap;">
                                            <label for="{{ $dept->DEPT_NAME }}" style="width: 100%;@if (!in_array($dept->DEPT_CD, $check_hide_list)) cursor: pointer; @endif">
                                                {{ $dept->DEPT_CD }}:
                                            </label>
                                        </td>
                                        <td style="width: 170px; white-space: nowrap;">
                                            <label for="{{ $dept->DEPT_NAME }}" style="width: 100%; @if (!in_array($dept->DEPT_CD, $check_hide_list)) cursor: pointer; @endif">
                                                {{ str_pad($dept->DEPT_NAME, strlen($dept->DEPT_NAME) + 9 * $dept->LEVEL_NO, '　　　', STR_PAD_LEFT) }}
                                            </label>
                                        </td>
                                    </tr>
                                    @endforeach
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
        function deptFunc() {
            if (!window.opener || window.opener.closed) {
                alert("呼び出し元が既に閉じられています。");
                return false;
            }

            var checkDept = $("input:checked");
            var deptCD = checkDept.val();
            var deptName = checkDept.attr('id');

            var dispDeptCd = window.opener.document.getElementById('txtUpDeptCd'); // 値のセット先取得（表示用）
            var hideDeptCd = window.opener.document.getElementById('txtUpHideCd'); // 値のセット先取得（更新用）
            if (dispDeptCd != null && hideDeptCd != null) { // セット先があれば値をセット
                dispDeptCd.value = deptCD;
                hideDeptCd.value = deptCD;
            }
            var dispDeptName = window.opener.document.getElementById('txtUpDeptName');
            if (dispDeptName != null) {
                var status = dispDeptName.disabled;
                if (status) {
                    dispDeptName.disabled = false;
                }
                dispDeptName.value = deptName;
                if (status) {
                    dispDeptName.disabled = true;
                }
            }
            window.close();
        }
    </script>
@endsection
