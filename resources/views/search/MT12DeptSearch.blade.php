<!-- 部門情報検索  -->
@extends('common.home')

@section('title','部門情報検索')

@section('content_search')
<!-- <script>
    function Deptfunc() {
        if (!window.opener || window.opener.closed) {
            alert("呼び出し元が既に閉じられています。");
            return false;
        }

        var Depts = document.getElementsByName("dept");//
        for (var i = 0; i < Depts.length; i++) {
            if (Depts[i].checked) {
                //console.log("選択された値：", Depts[i].value);
                deptCD = Depts[i].value
                deptName = Depts[i].id
            }
        }

        var MT10sendCD = window.opener.document.getElementById('deptcd'); //値をセットするオブジェクトを取得
        if (MT10sendCD != null) { //値をセットする先が存在する場合は値をセットする
            MT10sendCD.value = deptCD
        }
        var MT10sendName = window.opener.document.getElementById('deptname');
        if (MT10sendName != null) { 
            MT10sendName.value = deptName
        }
        window.close();
    }
    Deptfunc();
</script> -->
<div id="search-container">
    <form id="DeptModal" runat="server" name="DeptModal">
        {{ csrf_field() }}
        <div id="contents-stage">
            <input name="btnBack" id="btnBack" style="width: 80px; height: 21px;" onclick="window.close();" type="button" value="戻る">

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
                                @isset($dept_search)
                                @foreach ($dept_search as $item)
                                <tr style="cursor: pointer;" backgroundColor="transparent">
                                    <td style="width: 20px;">
                                        <input type="radio" name="dept" value="{{ $item->DEPT_CD }}" id="{{ $item->DEPT_NAME }}" onclick="Deptfunc();">
                                    </td>
                                    <td>
                                        <span id="">{{$item->DEPT_CD}} : {{$item->DEPT_NAME}}</span>
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

        var Depts = document.getElementsByName("dept");//
        for (var i = 0; i < Depts.length; i++) {
            if (Depts[i].checked) {
                //console.log("選択された値：", Depts[i].value);
                deptCD = Depts[i].value
                deptName = Depts[i].id
            }
        }

        var MT10sendCD = window.opener.document.getElementById('txtDeptCd'); //値をセットするオブジェクトを取得
        if (MT10sendCD != null) { //値をセットする先が存在する場合は値をセットする
            MT10sendCD.value = deptCD
        }
        var MT10sendName = window.opener.document.getElementById('deptName');
        if (MT10sendName != null) { 
            MT10sendName.value = deptName
        }
        window.close();
    }
    Deptfunc();
</script>
@endsection