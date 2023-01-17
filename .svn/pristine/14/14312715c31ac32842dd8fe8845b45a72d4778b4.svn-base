<!-- メニュー付きエラー画面 -->
@extends('menu.main')
@section('title', '勤怠管理システム')
@section('content')
    <div id="contents-stage">
        <table class="BaseContainerStyle2">
            <tbody>
                <tr>
                    <td>
                        <div id="ctl00_cphContentsArea_UpdatePanel1">
                            <table cellSpacing=10 cellPadding=5>
                                <tbody>
                                    <tr>
                                        <td style="padding:0.8em 0;">
                                            エラーが発生しました。
                                        </td>
                                    </tr>
                                <tr>
                                    <td style="padding:0.8em 0; BORDER-TOP: steelblue 1px dotted; BORDER-BOTTOM: steelblue 1px dotted">
                                        {{ getArrValue($error_messages, $message) }}
                                    </td>
                                </tr>
                                    <tr>
                                        <td style="padding:0.8em 0;">
                                            <a href="{{ url($view_path) }}">{{ $view_name }}</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection