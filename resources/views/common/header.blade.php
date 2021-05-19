@extends('layouts.app')

@section('header')
<!-- ヘッダーの共通部分 -->
<div id="header" style="text-align: right;">
    <div id="header-inner">
        <span>
            <img src="../images/WorkTmMng-corporate.jpg" alt="Corporate-Logo" />
        </span>
        <span>
            <img src="../images/WorkTmMng-title.gif" alt="勤怠管理システム" width="250" height="50">
        </span>
        <span style="float: right!important; padding:10px;">
            ようこそ <span>管理者</span> さん
            <br>
            <a class="singout" id="" href="{{url('/')}}" style="color: #369; font-size: 0.9em; text-align: left; text-decoration: none;">ログアウト</a>
        </span>
    </div>
</div>
@endsection