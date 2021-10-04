<!--ログイン画面-->
@extends('common.home')

@section('title', '勤怠管理システム_login')

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

    <div class="contents-login">
        <div class="login-innere">
            <form method="POST" action="{{ route('auth.check') }}">
                @csrf
                <strong class="title">
                    <span id="login_title">{{ __('ログインIDとパスワードを入力してください。') }}</span>
                </strong>
                <!-- ユーザID入力とパスワード入力 -->
                <table>
                    <tr>
                        <th>
                            <label for="loginId">{{ __('ログインID：') }}</label>
                        </th>
                        <td>
                            <input name="txtLoginId" class="input-txt imeoff" type="text" style="width: 90px;" maxlength="10">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <label for="loginPwd">{{ __('パスワード：') }}</label>
                        </th>
                        <td>
                            <input name="password" class="input-txt imeoff" type="password" style="width: 90px" maxlength="10">
                            <br />
                            <div class="button">
                                <button type="submit" class="btn btn-secondary" name="login-btn">
                                    {{ __('ログイン') }}
                                </button>
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
@endsection
