<!-- パスワード変更入力 -->
@extends('menu.main')

@section('title','パスワード変更入力')

@section('content')
<div id="contents-stage">
    <table class="BaseContainerStyle1">
        <tbody>
            <tr>
                <td>
                    <div id="ctl00_cphContentsArea_UpdatePanel1">

                        <form action="{{ route('MT11Pass.update') }}" method="post" name = "MT11Pass" onsubmit="return checkSubmit()">
                        @csrf

                        <table class="InputFieldStyle1">
                            <tbody>
                                <tr>
                                    <th>現パスワード</th>
                                    <td>
                                        <input name="txtPassword" tabindex="1" id="txtPassword"
                                               style="width: 90px;" type="password" maxlength="10" onfocus="this.select();">
                                        @if ($errors->has('txtPassword'))
                                            <span class="text-danger">{{ $errors->first('txtPassword') }}
                                            </span>
                                        @endif


                                    </td>
                                </tr>
                                <tr>
                                    <th>変更後パスワード</th>
                                    <td>
                                        <input name="txtNewPassword" tabindex="2" id="txtNewPassword"
                                               style="width: 90px;" type="password" maxlength="10" onfocus="this.select();">
                                        @if ($errors->has('txtNewPassword'))
                                            <span class="text-danger">{{ $errors->first('txtNewPassword') }}
                                            </span>
                                        @endif


                                    </td>
                                </tr>
                                <tr>
                                    <th>パスワード再入力</th>
                                    <td>
                                        <input name="txtRePassword" tabindex="3" id="txtRePassword"
                                               style="width: 90px;" type="password" maxlength="10" onfocus="this.select();">
                                        @if ($errors->has('txtRePassword'))
                                            <span class="text-danger">{{ $errors->first('txtRePassword') }}</span>

                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="line"></div>


                        <!-- 更新ボタン押下時 -->
                        <p class="ButtonField1">
                            <input name="btnUpdate" id="btnUpdate" tabindex="7" type="submit" value="更新">

                            <input name="btnCancel" id="btnCancel" tabindex="8" type="button" value="キャンセル" onclick="location.href='MT11PasswordEditor'">
                        </p>

                        {{-- 確認ダイアル --}}
                        <script>
                            function checkSubmit(){
                                $checked = confirm("{{getArrValue($error_messages, '1005')}}")
                                if($checked == true){
                                    return true;
                                } else {
                                    return false;
                                }
                            }
                             // ENTER時に送信されないようにする
                                $(function(){
                                    $('input').not('[type="button"]').not('[type="submit"]').keypress(function(e){
                                        if(e.which == 13) {
                                            return false;
                                        }
                                     });
                                });

                           // 'I'は入力不可
                                window.onload=function(){
                                    document.getElementById("txtPassword").addEventListener('keypress',function(){
                                    // "|"（keyCode=124）が押された場合は入力を無効にする
                                    if(event.keyCode == 124){
                                         event.preventDefault();
                                         }
                                    });
                                    document.getElementById("txtNewPassword").addEventListener('keypress',function(){
                                    // "|"（keyCode=124）が押された場合は入力を無効にする
                                    if(event.keyCode == 124){
                                         event.preventDefault();
                                         }
                                    });
                                    document.getElementById("txtRePassword").addEventListener('keypress',function(){
                                    // "|"（keyCode=124）が押された場合は入力を無効にする
                                    if(event.keyCode == 124){
                                         event.preventDefault();
                                         }
                                    });
                                }

                        </script>


                            {{-- フォーカス --}}
                        <script>
                            // ｛現パスワード｝テキストへフォーカス
                            document.MT11Pass.txtPassword.focus();
                            // E-1,E-2
                            @if ($errors->has('txtPassword'))
                                document.MT11Pass.btnUpdate.focus();
                            @endif
                            // E-3
                            @if($errors->has('txtNewPassword'))
                                document.MT11Pass.btnUpdate.focus();
                            @endif
                            // E-4,E-5
                            @if($errors->has('txtRePassword'))
                                document.MT11Pass.btnUpdate.focus();
                            @endif
                        </script>

                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
