<!-- ログイン情報入力=>社員情報照会  -->
@extends('menu.main')

@section('title','ログイン情報入力=>社員情報照会 ')

@section('content')
<div id="contents-stage">
    <table class="BaseContainerStyle1">
        <tbody>
            <tr>
                <td>

                    <div id="UpdatePanel1">

                        <form action="" method="POST" id="form" autocomplete="off">
                            @csrf
                            <table class="InputFieldStyle1">
                                <tbody>
                                    <tr>
                                        <th>社員番号</th>
                                        <td>
                                            <input name="txtEmpCd" 
                                            tabindex="1" 
                                            disabled="disabled" 
                                            class="imeDisabled" 
                                            id="txtEmpCd" 
                                            style="width: 80px;" 
                                            type="text" 
                                            maxlength="10" 
                                            value="{{ $emp_data-> EMP_CD }}"
                                            >
                                            <input type="hidden" name="txtEmpCd" value="{{ $emp_data-> EMP_CD }}">
                                            <span class="OutlineLabel" 
                                            id="lblEmpName" 
                                            style="width: 230px; display: inline-block;"
                                            >
                                            {{ $emp_data-> EMP_NAME }}
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>ログインID</th>
                                        <td>
                                            <input name="txtLoginId" 
                                            tabindex="2" 
                                            class="imeDisabled" 
                                            id="txtLoginId" 
                                            style="width: 80px; ime-mode:disabled;" 
                                            type="text" 
                                            maxlength="10"
                                            value="{{ old('txtLoginId', !empty($request_data['txtLoginId']) ? $request_data['txtLoginId'] : $login_datas-> LOGIN_ID ?? '') }}"
                                            >
                                            <!-- value="{{ $login_datas-> LOGIN_ID ?? ''}} {{ old('txtLoginId', !empty($request_data['txtLoginId']) ? $request_data['txtLoginId']:'') }}" -->
                                            <!--  value="{{ old('txtLoginId', !empty($search_data['txtLoginId']) ? $search_data['txtLoginId']:'') }}" -->
                                            
                                            <!-- onInput="checkForm(this)" -->
                                            @if ($errors->has('txtLoginId'))
                                            <span class="text-danger">{{ $errors->first('txtLoginId')  }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>変更後パスワード</th>
                                        <td>
                                            <input name="txtNewPassword" 
                                            tabindex="3" 
                                            class="imeDisabled" 
                                            id="txtNewPassword" 
                                            style="width: 90px;" 
                                            type="password" 
                                            maxlength="10"
                                            >
                                            
                                            <!-- onInput="checkForm(this)" -->
                                            @if ($errors->has('txtNewPassword'))
                                            <span class="text-danger">{{ $errors->first('txtNewPassword') }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>パスワード再入力</th>
                                        <td>
                                            <input name="txtNewPassword2" 
                                            tabindex="4" 
                                            class="imeDisabled" 
                                            id="txtNewPassword2" 
                                            style="width: 90px;" 
                                            type="password" 
                                            maxlength="10"
                                            >
                                            @if ($errors->has('txtNewPassword2'))
                                            <span class="text-danger">{{ $errors->first('txtNewPassword2')  }}</span>
                                            @endif

                                        </td>
                                    </tr>
                                    <tr>
                                        <th>機能権限</th>
                                        <td>
                                            <select name="ddlPgAuth" tabindex="5" id="ddlPgAuth" style="width: 170px;" value="{{ old('ddlPgAuth', !empty($auth_cd['PG_AUTH_CD']) ? $auth_cd['PG_AUTH_CD']:'') }}" >
                                                
                                                <option value=""></option>
                                                @foreach ( $pg_auth->unique('PG_AUTH_CD') as $auth_cd)
                                                    <option 
                                                        value="{{ $auth_cd->PG_AUTH_CD }}" 
                                                        {{ ($auth_cd->PG_AUTH_CD ==  $emp_data->PG_AUTH_CD && !empty($login_datas-> LOGIN_ID ) ? "selected" : "") ?? old('ddlPgAuth')}}//test
                                                        
                                                    >
                                                        {{ $auth_cd->PG_AUTH_NAME }} 
                                                    </option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('ddlPgAuth'))
                                            <span class="text-danger">{{ $errors->first('ddlPgAuth')  }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="line"></div>
                            <p class="ButtonField1">
                                <!-- <input name="btnUpdate" tabindex="6" id="btnUpdate" onclick="if(confirm('更新します。よろしいですか?') ==  false){ return false;};WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions())" type="button" value="更新"> -->
                                <input name="btnSearch" 
                                id="btnSearch" 
                                class="SearchButton submit-form" 
                                type="button" 
                                value="更新"
                                data-url = "{{ route('MT11LoginEdit.update', ['id' => $emp_data->EMP_CD ])}}"
                                onclick="return checkSubmit(this)"
                                >
                                <input name="btnCancel" tabindex="7" id="btnCancel" onclick="location.reload();" type="button" value="キャンセル">
                            </p>

                        </form>
                    </div>

                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
@section('script')
<script>
    //formボタンクリック
    // $(document).on('click', '.submit-form', function(){
    //     var url = $(this).data('url');
    //     $('#form').attr('action', url);
    //     $('#form').submit();
    // });

    //キャンセルボタン
    function Cancel(){
    $("#txtEmpCd, #txtEmpKana, #txtDeptCd, #deptName").val('');
    // var tbl = document.getElementById('gvEmp');
    // tbl.remove();
    // var ftr = document.getElementById('pegination');
    // ftr.remove();
    }

    // function checkForm($this)
    // {
    //     var str=$this.value;
    //     while(str.match(/[^A-Z^a-z\d\-]/))
    //     // while(str.match(/^[0-9a-zA-Z]*$/))
    //     {
    //         // str=str.replace(/^[0-9a-zA-Z]*$/,"");
    //         str=str.replace(/[^A-Z^a-z\d\-]/,"");
    //     }
    //     $this.value=str;
    // }
    
    // 全角なら自動で半角へ変更
    // $(document).on("change", 'input', function(){
    //     let str = $(this).val()
    //     str = str.replace(/[Ａ-Ｚａ-ｚ０-９]/g, function(s) {
    //         // return String.fromCharCode(s.charCodeAt(0) - 0xFEE0);
    //         return String.fromCharCode(s.charCodeAt(0) - 65248);
    //     });
    //     $(this).val(str);
    // });

    // $(document).on("change", 'input', function(){
    //     let str = $(this).val()
    //     if( !(str.match(/^[a-zA-Z0-9]+$/)) ){
    //     // 文字列は英数字のみです
    //     return false;
    //     }
    // });

    // $(function() {
    //     $('#txtLoginId').on('keydown', function(e) {
    //         var k = e.keyCode;
    //         //* 0～9:code48-57, テンキ―0～9:code96-105, ハイフン:code189, テンキー:code109, backspace:code8, delete:code46, →:code39, ←:code37,Tab:code9,Enter:code13,insert:45 以外は入力キャンセル *//
    //         if (!((k >= 48 && k <= 57) || (k >= 96 && k <= 105) || k != 220)) {
    //             return false;
    //         }
    //         if ($(this).val() = (/[Ａ-Ｚａ-ｚ０-９]/g)){
    //             return String.fromCharCode(e.charCodeAt(0) - 0xFEE0);
    //         }
    //     });
    // });

    // jQuery(document).on('keydown', '.imeDisabled', function(e){
    // let str = String.fromCharCode(k);
    // if(!(str.match(/[0-9a-zA-Z]/))){
    //     return false;
    // }
    // });

    $(document).on("change", 'input', function(){
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

    // 確認ダイアル
    function checkSubmit() {
        if (window.confirm("{{ $msg_1005 }}")) {
            $(document).on('click', '.submit-form', function(){
                var url = $(this).data('url');
                $('#form').attr('action', url);
                $('#form').submit();
            });
        } else {
            return false;
        }
    }
    
</script>
@endsection
