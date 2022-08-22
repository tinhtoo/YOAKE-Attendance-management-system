<!-- カレンダーパターン情報入力   -->
@extends('menu.main')

@section('title','カレンダーパターン情報入力 ')

@section('content')
<div id="contents-stage">
    <form action="" method="get" id="form">
        @csrf
        <table class="BaseContainerStyle1">
            <tbody>
                <tr>
                    <td>
                        <div id="UpdatePanel1">

                            <p class="FunctionMenu1">
                                <a id="hlAddCalendarPtn" href="{{ route('MT02.storeIndex') }}">新規カレンダーパターン登録</a>
                            </p>
                            <div class="line"></div>
                            <div class="GridViewStyle1">
                                <table style="border-collapse: separate;">
                                    <tbody>
                                        <tr>
                                            <th>
                                                カレンダーパターン
                                            </th>
                                            <th>
                                                カレンダーパターン
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            @isset($calendar_ptns)
                            <div class="GridViewStyle1">
                                <div>
                                    <table class="GridViewSpace" id="gvEmp" border="1" cellspacing="0">
                                        <tbody>
                                            @for($i = 0; $i < count($calendar_ptns) && $i < 20; $i++)
                                            <tr>
                                                <td class="col-sm-4">
                                                    <a href="{{ url('master/MT02CalendarPtnEditor/'. $calendar_ptns[$i]->CALENDAR_CD )}}">
                                                        {{ $calendar_ptns[$i]->CALENDAR_CD }} : {{ $calendar_ptns[$i]->CALENDAR_NAME }}
                                                    </a>
                                                </td>
                                                <td class="col-sm-4">
                                                    @if($calendar_ptns[$i + 20] != null )
                                                    <a href="{{ url('master/MT02CalendarPtnEditor/'. $calendar_ptns[$i + 20]->CALENDAR_CD )}}">
                                                        {{ $calendar_ptns[$i + 20]->CALENDAR_CD }} : {{ $calendar_ptns[$i + 20]->CALENDAR_NAME }}
                                                    </a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endfor
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @endisset
                            @isset($calendar_ptns)
                            <div class="line"></div>
                            <div class="d-flex justify-content-center mx-auto" id="pegination">
                                {{ $calendar_ptns->links() }}
                            </div>
                            @endisset
                        </div>

                    </td>
                </tr>

            </tbody>
        </table>
    </form>
</div>
@endsection