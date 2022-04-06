<!-- 社員情報検索  -->
@extends('common.home')

@section('title','社員情報検索')

@section('content_search')
<div id="search-container">
    <div id="contents-stage">
        <form action="" method="get" id="form">
            {{ csrf_field() }}
            <input name="btnBack" id="btnBack" style="width: 80px;" type="button" onclick="window.close();" value="戻る">
            <div id="UpdatePanel1">

                <table class="InputFieldStyle1 mg10">
                    <tbody>
                        <tr>
                            <th>社員カナ名</th>
                            <td>
                                <input name="filter[txtEmpKana]"
                                class="imeOn" 
                                id="txtEmpKana" 
                                style="width: 160px;" 
                                type="text" 
                                maxlength="20"
                                value="{{ old('filter[txtEmpKana]', !empty($search_data['txtEmpKana']) ? $search_data['txtEmpKana']:'') }}">
                            </td>
                        </tr>
                        <tr>
                            <th>部門</th>
                            <td>
                                <!-- <span>id="txtDeptCd"</span> -->
                                <input name="filter[txtDeptCd]" 
                                class="imeDisabled" 
                                id="txtDeptCd" 
                                style="width: 50px;" 
                                type="text" 
                                maxlength="6"
                                value="{{ old('filter[txtDeptCd]', !empty($search_data['txtDeptCd']) ? $search_data['txtDeptCd']:'') }}">
                                <!-- <input name="btnSearchDeptCd" class="SearchButton" id="btnSearchDeptCd" type="button" value="?" > -->
                                <input name="btnSearchDeptCd" class="SearchButton" id="btnSearchDeptCd" type="button" value="?" onclick="SearchDept();return false">
                                <!-- <span>id="lblDeptName"</span> -->
                                <!-- <span 
                                class="OutlineLabel" 
                                id="deptname" 
                                style="width: 200px; height: 17px; display: inline-block;"></span> -->
                                <input 
                                name="deptName" 
                                class="OutlineLabel" 
                                type="text" 
                                style="width: 200px; height: 17px; display: inline-block;" 
                                id="deptName" 
                                value="{{ old('deptName', !empty($request_data['deptName']) ? $request_data['deptName']:'') }}"
                                readonly="readonly">
                    
                                @if ($errors->has('filter.txtDeptCd'))
                                <span class="text-danger d-block">{{ $errors->first('filter.txtDeptCd')  }}</span>
                                @endif
                            </td>
                        </tr>
                        <!-- <tr>
                            <td></td>
                            <td>

                            </td>
                        </tr> -->
                    </tbody>
                </table>

                <p class="FunctionMenu1">
                    <!-- <input name="btnSearch" class="SearchButton" id="btnSearch" type="button" value="検索"> -->
                    @if (Session()->has('id'))
                    <input 
                        name="btnSearch" 
                        id="btnSearch" 　
                        class="SearchButton submit-form" 
                        type="button" 
                        value="検索"
                        data-url = "{{ route('emp.search')}}"
                    >
                    @else
                    <input 
                        name="btnSearch" 
                        id="btnSearch" 　
                        class="SearchButton submit-form" 
                        type="button" 
                        value="検索"
                        onclick="window.opener.location.reload(true);window.close();"
                    >
                    @endif
                    <input name="btnCancel" class="SearchButton" id="btnCancel" type="button" onclick="Cancel()" value="キャンセル">
                </p>

                <div class="clearBoth"></div>

                <div class="line"></div>

                <ul class="HolizonListMenu1">
                    <!-- <button name="button-all" type="button" value="fav_HTML" class="SearchButton submit-form" data-url = "{{ route('emp.search')}}">全件</button> -->
                    <li><input name="btnAll" id="btnAll" class="SearchButton submit-form" type="button" value="全件" data-url = "{{ route('emp.search')}}"></li>
                    <li><input type="submit" name="button_A" value="あ" class="buttonTest"></li>
                    <li><input type="submit" name="button_KA" value="か" class="buttonTest"></li>
                    <li><input type="submit" name="button_SA" value="さ" class="buttonTest"></li>
                    <li><input type="submit" name="button_TA" value="た" class="buttonTest"></li>
                    <li><input type="submit" name="button_NA" value="な" class="buttonTest"></li>
                    <li><input type="submit" name="button_HA" value="は" class="buttonTest"></li>
                    <li><input type="submit" name="button_MA" value="ま" class="buttonTest"></li>
                    <li><input type="submit" name="button_YA" value="や" class="buttonTest"></li>
                    <li><input type="submit" name="button_RA" value="ら" class="buttonTest"></li>
                    <li><input type="submit" name="button_WA" value="わ" class="buttonTest"></li>
                    <li><input type="submit" name="button_EN" value="英字" class="buttonTest"></li>
                </ul>

                <div class="clearBoth"></div>
                <div class="line"></div>
                <div>
                    
                </div>
                <div class="GridViewStyle1 mg10" id="search-gridview-container">
                    <div class="GridViewPanelStyle6" id="pnlEmp">

                        <div>
                        @if(!empty($request_data))
                        @isset($search_result)
                            <table class="GridViewPadding" id="gvEmp" style="border-collapse: collapse;" border="1" cellspacing="0">
                                <tbody>
                                    
                                        @if(count($search_result) < 1) 
                                            <tr style="width:70px; text-align:center;">
                                                <td><span>{{ $messages }}</span></td>
                                            </tr>
                                        @else
                                            <tr>
                                                <th scope="col">
                                                    選択
                                                </th>
                                                <th scope="col">
                                                    コード
                                                </th>
                                                <th scope="col">
                                                    社員名
                                                </th>
                                                <th scope="col">
                                                    部門名
                                                </th>
                                            </tr>
                                            @foreach($search_result as $item)
                                                <!-- <tr style="cursor: pointer; background-color: transparent;" backgroundColor="transparent">
                                                    <td style="width: 30px; white-space: nowrap;">
                                                        <input name="rbSelectRow" id="{{ $item->EMP_NAME }}" onclick="Deptfunc();" type="radio" value="{{ $item->EMP_CD }}" >
                                                    </td>
                                                    <td style="width: 50px; white-space: nowrap;">
                                                        <span id="lblEmpCd">{{ $item->EMP_CD }}</span>
                                                    </td>
                                                    <td style="width: 200px; white-space: nowrap;">
                                                        <span id="lblEmpName">{{ $item->EMP_NAME }}</span>
                                                    </td>
                                                    <td>
                                                        <span id="lblDeptName">{{ $item->DEPT_NAME }}</span>
                                                    </td>
                                                </tr> -->
                                                <tr class="empSearch" style="cursor: pointer; background-color: transparent;" backgroundColor="transparent">
                                                    <td style="width: 30px; white-space: nowrap;">
                                                        <input 
                                                            name="rbSelectRow" 
                                                            type="radio" 
                                                            class="check-row"    
                                                        >
                                                    </td>
                                                    <td style="width: 50px; white-space: nowrap;">
                                                        <span class="lblEmpCd" data-code="{{ $item->EMP_CD }}">{{ $item->EMP_CD }}</span>
                                                    </td>
                                                    <td style="width: 200px; white-space: nowrap;">
                                                        <span class="lblEmpName" data-name="{{ $item->EMP_NAME }}">{{ $item->EMP_NAME }}</span>
                                                    </td>
                                                    <td>
                                                        <span class="lblDeptName" data-dept="{{ $item->DEPT_NAME }}">{{ $item->DEPT_NAME }}</span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    
                                    
                                    
                                    <!-- <tr class="ButtonField1">
                                        <td colspan="4">
                                            <div class="line"></div>
                                            <div class="d-flex justify-content-center">
                                            @isset($search_result)
                                                {{ $search_result->links() }}
                                            @endisset
                                            </div>
                                        </td>
                                    </tr> -->
                                </tbody>
                            </table>
                        @endisset
                        @endif
                        </div>

                    </div>
                </div>
                @if(!empty($request_data)) 
                    <div class="line"></div>
                    <div class="d-flex justify-content-center" id="pegination">
                    @isset($search_result)
                        {{ $search_result->links() }}
                    @endisset
                    </div>
                @endif     
                <div class="line"></div>
                <p class="ButtonField1">
                <input name="btnCancel" class="SearchButton" id="btnCancel" type="button" onclick="Cancel()" value="キャンセル">
                </p>

            </div>
        </form>
        
    </div>
</div>

@endsection
@section('script')
<script>
    //formボタンクリック
    $(document).on('click', '.submit-form', function(){
        var url = $(this).data('url');
        $('#form').attr('action', url);
        $('#form').submit();
    });

    //選択された値を渡す
    $(document).on('click', '.check-row', function(){
        if (!window.opener || window.opener.closed) {
            alert("呼び出し元が既に閉じられています。");
            return false;
        }
        var ele = $(this);
        var MT10sendCD = window.opener.document.getElementById('txtEmpCd'); 
        var MT10sendName = window.opener.document.getElementById('empName');
        var MT10DeptName = window.opener.document.getElementById('lblDeptName');
        if(ele.is(':checked')){
            var tr = ele.closest('tr');
            if(MT10sendCD != null) {
                MT10sendCD.value = tr.find('.lblEmpCd').data('code');
            }
           
            if(MT10sendName != null) {
                MT10sendName.value = tr.find('.lblEmpName').data('name');
            }

            if(MT10DeptName != null) {
                MT10DeptName.value = tr.find('.lblDeptName').data('dept');
            }
        }
        window.close();
    });
   
    // //選択された値を渡す
    // function Deptfunc() {
    //     if (!window.opener || window.opener.closed) {
    //         alert("呼び出し元が既に閉じられています。");
    //         return false;
    //     }

    //     var Emps = document.getElementsByName("rbSelectRow");//
    //     for (var i = 0; i < Emps.length; i++) {
    //         if (Emps[i].checked) {
    //             //console.log("選択された値：", Emps[i].value);
    //             empCD = Emps[i].value
    //             empName = Emps[i].id
    //             depName = Emps[i].lblDeptName
    //         }
    //     }

    //     var MT10sendCD = window.opener.document.getElementById('txtEmpCd'); //値をセットするオブジェクトを取得
    //     if (MT10sendCD != null) { //値をセットする先が存在する場合は値をセットする
    //         MT10sendCD.value = empCD
    //     }
    //     var MT10sendName = window.opener.document.getElementById('lblEmpName');
    //     if (MT10sendName != null) { 
    //         MT10sendName.value = empName
    //     }
    //     var MT10sendName = window.opener.document.getElementById('lblDeptName');
    //     if (MT10sendName != null) { 
    //         MT10sendName.value = depName
    //     }
    //     window.close();
    // }
    // Deptfunc();
//**削除　2022/02/01 S 「ティン」 */
    // $(document).on('click', '#btnCancel', function() {
    // $(this).closest('form').find("input[type=text], textarea").val("");
    
    // });
//**削除　2022/02/01 E 「ティン」 */    

    function Cancel(){
    $("#txtEmpKana, #txtDeptCd, #deptName").val('');
    var tbl = document.getElementById('gvEmp');
    tbl.remove();
    var ftr = document.getElementById('pegination');
    ftr.remove();
    }

</script>
@endsection