<!-- シフトパターン情報入力画面 -->
@extends('menu.main')
@section('title', 'シフトパターン情報入力')
@section('content')
    <div id="contents-stage">
        <table class="BaseContainerStyle1">
            <tbody>
                <tr>
                    <td>

                        <div id="ctl00_cphContentsArea_UpdatePanel1">

                            <p class="FunctionMenu1">
                                <a id="addShipPtn" style="font-size: 12px;"
                                    href="{{url('/shift/MT04ShiftPtnEditorAddNew')}}">新規シフトパターン登録</a>
                            </p>

                            <div class="line"></div>

                            <div class="GridViewStyle1">
                                <div>
                                    <table class="GridViewSpace" id="ctl00_cphContentsArea_gvShiftPtn"
                                        style="border-collapse: collapse;" border="1" rules="all" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <th scope="col">
                                                    シフトパターン
                                                </th>
                                                <th scope="col">
                                                    シフトパターン
                                                </th>
                                            </tr>
                                            @for($i = 0; $i < count($shiftptn_data) && $i < 20; $i++)
                                            <tr style="background-color: white;">
                                                <td class="col-sm-4">
                                                    <a href="{{ url('/shift/MT04ShiftPtnEditor/'. $shiftptn_data[$i]->SHIFTPTN_CD )}}">
                                                        {{ $shiftptn_data[$i]->SHIFTPTN_CD }} : {{ $shiftptn_data[$i]->SHIFTPTN_NAME }}
                                                    </a>
                                                </td>
                                                <td class="col-sm-4">
                                                    @if($shiftptn_data[$i + 20] != null )
                                                    <a href="{{ url('/shift/MT04ShiftPtnEditor/'. $shiftptn_data[$i + 20]->SHIFTPTN_CD )}}">
                                                        {{ $shiftptn_data[$i + 20]->SHIFTPTN_CD }} : {{ $shiftptn_data[$i + 20]->SHIFTPTN_NAME }}
                                                    </a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endfor

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center" id="pegination">
                                {{ $shiftptn_data->links() }}
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
