<!--ログイン画面-->
@extends('common.home')

@section('title','勤怠管理システム_login')

@section('login')
<!-- ヘッダーの共通部分 -->
<div id="header">
    <div id="header-inner">
        <span>
            <img src="../images/WorkTmMng-corporate.jpg" alt="Corporate-Logo" />
        </span>
        <span>
            <img src="../images/WorkTmMng-title.gif" alt="勤怠管理システム" width="250" height="50">
        </span>
    </div>
</div>
<!-- ログイン画面 -->
<!-- <div class="contents-login">
    <div class="login-inner">
        <strong class="title">
            <span id="login_title">ログインIDとパスワードを入力してください。</span>
        </strong>
        <table>
            <tr>
                <th>
                    <label for="loginId">ログインID：</label>
                </th>
                <td>
                    <input name="inputLoginId" class="input-txt imeoff" type="text" style="width: 90px;" maxlength="10">
                </td>
            </tr>
            <tr>
                <th>
                    <label for="loginPwd">パスワード：</label>
                </th>
                <td>
                    <input name="input-Pwd" class="input-txt imeoff" type="password" style="width: 90px" maxlength="10">
                    <br />
                    <div class="button">
                        <a href="{{url('/main')}}"><button type="button" id="loginBtn" name="login-btn">ログイン</button></a>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</div> -->
<div class="contents-login">
    <div class="login-innere">
        <!-- route('main') と書くと=> /main -->
        <form method="GET" action="{{ route('main') }}">

            @csrf

            <strong class="title">
                <span id="login_title">ログインIDとパスワードを入力してください。</span>
            </strong>
            <table>
                <tr>
                    <th>
                        <label for="loginId">ログインID：</label>
                    </th>
                    <td>
                        <input name="inputLoginId" class="input-txt imeoff" type="text" style="width: 90px;" maxlength="10" value="{{('LOGIN_ID')}}">
                    </td>
                </tr>
                <tr>
                    <th>
                        <label for="loginPwd">パスワード：</label>
                    </th>
                    <td>
                        <input name="input-Pwd" class="input-txt imeoff" type="password" style="width: 90px" maxlength="10" value="{{('PASSWORD')}}">
                        <br />
                        <div class="button">
                            <button type="submit" id="loginBtn" name="login-btn">ログイン</button>
                        </div>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
@endsection