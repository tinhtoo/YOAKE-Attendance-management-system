<!doctype html>
<html lang="ja">
<!-- ▼▼▼▼ 自動翻訳させないための記述 -->
<meta http-equiv="Content-Language" content="ja">
<meta name="google" content="notranslate">
<!-- ▲▲▲▲　ここまで -->
@extends('layouts.app')
<head>   
@yield('header')
</head>

<body>
@yield('login')
@yield('main')
@yield('content_search')
@yield('details_edit')
</body>

</html>
