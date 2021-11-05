<!doctype html>
<html lang="ja">
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
