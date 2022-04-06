<!-- ログイン情報入力  -->
@extends('menu.main')

@section('title','ログイン情報入力 ')

@section('content')
<div id="contents-stage">
    <form action="" method="get" id="form">
        @csrf
        <table class="BaseContainerStyle1">
            <tbody>
                <tr>
                    <td>
                        <div id="UpdatePanel1">
                            <table class="InputFieldStyle1">
                                <tbody>
                                    <tr>
                                        <th>社員番号</th>
                                        <td>
                                            <input name="filter[txtEmpCd]" 
                                            class="imeDisabled" 
                                            id="txtEmpCd" 
                                            style="width: 80px;" 
                                            type="search"
                                            style="ime-inactive;" 
                                            maxlength="10" 
                                            value="{{ old('filter[txtEmpCd]', !empty($search_data['txtEmpCd'])?$search_data['txtEmpCd']:'') }}"
                                            >
                                                @if ($errors->has('txtEmpCd'))
                                                <span class="alert-danger">{{ $errors->first('txtEmpCd')  }}</span>
                                                @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>社員カナ名</th>
                                        <td>
                                            <input name="filter[txtEmpKana]"
                                            class="imeOn" 
                                            id="txtEmpKana" 
                                            style="width: 160px;" 
                                            type="search" 
                                            maxlength="20"
                                            value="{{ old('filter[txtEmpKana]', !empty($search_data['txtEmpKana']) ? $search_data['txtEmpKana']:'') }}"
                                            >
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>部門</th>
                                        <td>
                                            <input name="filter[txtDeptCd]" 
                                            class="imeDisabled" 
                                            id="txtDeptCd" 
                                            style="width: 50px;" 
                                            type="text" 
                                            maxlength="6"
                                            value="{{ old('filter[txtDeptCd]', !empty($search_data['txtDeptCd']) ? $search_data['txtDeptCd']:'') }}">
                                            <input name="btnSearchDeptCd" class="SearchButton" id="btnSearchDeptCd" type="button" value="?" onclick="SearchDept();return false">
                                            <input 
                                            name="deptName" 
                                            class="OutlineLabel" 
                                            type="text" 
                                            style="width: 200px; height: 23px; display: inline-block;" 
                                            id="deptName" 
                                            value="{{ old('deptName', !empty($request_data['deptName']) ? $request_data['deptName']:'') }}"
                                            readonly="readonly">
                                
                                            @if ($errors->has('filter.txtDeptCd'))
                                            <span class="text-danger d-block">{{ $errors->first('filter.txtDeptCd')  }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <p class="FunctionMenu1">
                                <input name="btnSearch" 
                                id="btnSearch" 
                                class="SearchButton submit-form" 
                                type="button" 
                                value="検索"
                                data-url = "{{ route('MT11LoginRef.search')}}"
                                >
                                <input name="btnCancel" 
                                class="SearchButton" 
                                id="btnCancel" 
                                type="button" 
                                onclick="Cancel()" 
                                value="キャンセル"
                                >    
                            </p>

                            <div class="clearBoth"></div>

                            <div class="line"></div>

                            <ul class="HolizonListMenu1">
                                <li><input name="btnAll" id="btnAll" class="SearchButton submit-form" type="button" value="全件" data-url = "{{ route('MT11LoginRef.search')}}"></li>
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

                            <!-- <div class="GridViewStyle1">
                                <div>
                                    <table style="border-spacing: 10px; border-collapse: separate;">
                                        <tbody>
                                            <tr>
                                                <th scope="col">
                                                    社員
                                                </th>
                                                <th scope="col">
                                                    社員
                                                </th>
                                            </tr>
                                            @isset($search_results)
                                            @if(count($search_results) < 1) 
                                                <tr style="background-color: white;">
                                                    <td style="width: 350px;"><span>{{ $messages }}</span></td>
                                                </tr>
                                            @else
                                                @foreach ($search_results as $item)
                                                <tr style="background-color: white;">
                                                    <td class="col-sm-4" style="width: 350px;">
                                                        <a href="">{{ $item->EMP_CD }} :
                                                            {{ $item->EMP_NAME }}</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            @endif
                                            @endisset
                                        </tbody>
                                    </table>
                                </div>
                                <!-- <div class="GridViewStyle1">
                                    <div class="two-col">
                                    @isset($search_results)
                                        <table tabindex="7" class="GridViewSpace" id="gvEmp"
                                        style="width: 350px;" 
                                        border="1" rules="all" cellspacing="0">
                                            <tbody>
                                                @if(count($search_results) < 1) 
                                                <tr style="width:70px; text-align:center;">
                                                    <td><span>{{ $messages }}</span></td>
                                                </tr>
                                                @else
                                                    @foreach ($search_results as $item)
                                                        <tr>
                                                            <td class="col-sm-4">
                                                                <a href="">{{ $item->EMP_CD }} :
                                                                    {{ $item->EMP_NAME }}</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    @endisset
                                    </div>
                                </div> -->
                                <!-- <div class="d-flex justify-content-center">
                                    {{ $search_results->appends(request()->input())->render('pagination::bootstrap-4') }} -->
                                    
                                    <!-- <div class="d-flex justify-content-center" id="pegination">
                                    @isset($search_result)
                                        {{ $search_result->links() }}
                                    @endisset
                                    </div> -->
                                
                                <!-- </div>
                            </div> --> 
                            <div class="GridViewStyle1">
                                <table style="border-collapse: separate;">
                                    <tbody>
                                        <tr>
                                            <th>
                                                社員
                                            </th>
                                            <th>
                                                社員
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            @isset($search_results)
                            <div class="GridViewStyle1">
                                <div class="two-col" style="column-count:2;">   
                                    <table class="GridViewSpace" id="gvEmp" style="border-collapse: collapse;" border="1" cellspacing="0">
                                        <tbody>
                                            @if(count($search_results) < 1) 
                                                <tr style="width:70px; text-align:center;">
                                                    <td><span>{{ $messages }}</span></td>
                                                </tr>
                                            @else
                                            @foreach ($search_results as $item)
                                            
                                                <tr>
                                                    <td class="col-sm-4">
                                                        <a href="{{ url('master/MT11LoginEditor/'. $item->EMP_CD )}}">{{ $item->EMP_CD }} :
                                                            {{ $item->EMP_NAME }}</a>
                                                    </td>
                                                </tr>
                                              
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>    
                                </div>
                            </div>
                            @endisset
                            
                            <!-- <div class="d-flex justify-content-center">
                                {{ $search_results->appends(request()->input())->render('pagination::bootstrap-4') }}
                            </div> -->
                            <div class="line"></div>
                            <div class="d-flex justify-content-center" id="pegination">
                            @isset($search_results)
                                {{ $search_results->links() }}
                            @endisset
                            </div>
                            <div class="line"></div>
                            <p class="ButtonField1">
                                <input name="btnCancel" class="SearchButton" id="btnCancel" type="button" onclick="Cancel();" value="キャンセル">
                            </p>

                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>    
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

    //キャンセルボタン
    function Cancel(){
    $("#txtEmpCd, #txtEmpKana, #txtDeptCd, #deptName").val('');
    // var tbl = document.getElementById('gvEmp');
    // tbl.remove();
    // var ftr = document.getElementById('pegination');
    // ftr.remove();

    // location.reload();
    // window.history.back();
    window.location.replace("MT11LoginReference");
    }

    // 全角なら自動で半角へ変更
    $(document).on("change", '#txtEmpCd', function(){
        let str = $(this).val()
        str = str.replace(/[Ａ-Ｚａ-ｚ０-９]/g, function(s) {
            return String.fromCharCode(s.charCodeAt(0) - 0xFEE0);
            // return String.fromCharCode(s.charCodeAt(0) - 65248);
        });
        // var k = e.keyCode;
        str = str.replace( /[^!-~]/g , "" );
        // str = str.replace( /[k == 220]/g , "" );
        $(this).val(str);
    });

</script>
@endsection