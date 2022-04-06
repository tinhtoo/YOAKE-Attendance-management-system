@extends('layouts.app')

@section('header')
<!-- ヘッダーの共通部分 -->
<div id="header" style="text-align: right;">
    <div id="header-inner">
        <span>
            <!-- <img src="../images/WorkTmMng-corporate.jpg" alt="Corporate-Logo" /> -->
            <img src="{{asset('../images/WorkTmMng-corporate.jpg')}}" alt="Corporate-Logo" />
        </span>
        <span>
            <!-- <img src="../images/WorkTmMng-title.gif" alt="勤怠管理システム" width="250" height="50"> -->
            <img src="{{asset('../images/WorkTmMng-title.gif') }}" alt="勤怠管理システム" width="250" height="50">
        </span>
        <span id="header-welcom" style="float: right!important; padding:10px;">
            ようこそ {{ session('name') }} さん
            <br>
            <!-- <a class="singout" id="" href="{{url('/')}}" style="color: #369; font-size: 0.9em; text-align: left; text-decoration: none;">ログアウト</a> -->
            <a class="signout" id="ctl00_lbLogout" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout.form') }}" method="POST">
                @csrf
                <!-- <a class="signout" id="ctl00_lbLogout">ログアウト1</a>
                <button class="signout" id="ctl00_lbLogout">ログアウト2</button> -->
            </form>
        </span>
    </div>
</div>
@endsection