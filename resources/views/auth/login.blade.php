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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="contents-login">
                <div class="login-innere">
                    <form method="POST" action="{{ route('auth.check') }}">
                        @csrf
                        <strong class="title" style="margin-bottom: 30px;">
                            <span id="login_title" class="gutters">{{ __('ログインIDとパスワードを入力してください。') }}</span>
                        </strong>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('ログインID：') }}</label>

                            <div class="col-md-6">
                                <input id="txtLoginId" type="text" class="form-control border @error('txtLoginId') is-invalid @enderror" name="txtLoginId" value="{{ old('txtLoginId') }}" autocomplete="txtLoginId" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('パスワード：') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control border @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-6">
                                <button type="submit" class="btn btn-secondary rounded-0" style="margin-bottom: 30px;">
                                    {{ __('ログイン') }}
                                </button>

                                @if(Session::get('fail'))
                                    <div class="text-danger">{{ Session::get('fail') }}</div>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
