<!-- 勤務体系情報照会 -->
@extends('menu.main')

@section('title','勤務体系情報照会')

@section('content')
<div id="contents-stage">
    <table class="BaseContainerStyle1">
        <tbody>
            <tr>
                <td>
                    <div id="ctl00_cphContentsArea_UpdatePanel1">

                        <p class="FunctionMenu1"><a id="ctl00_cphContentsArea_hlAddEmp" href="MT05WorkPtnEditorAddNew">新規勤務体系登録</a></p>

                        <div class="line"></div>

                        <div class="GridViewStyle1">
                            <div>
                                <table class="GridViewSpace" id="ctl00_cphContentsArea_gvWorkPtn" style="border-collapse: collapse;" border="1" rules="all" cellspacing="0">
                                    <tbody>

                                        <tr class="GridViewHeaderTitle1 Nowrap">
                                            <th scope="col">
                                                勤務体系
                                            </th>
                                            <th scope="col">
                                                勤務体系
                                            </th>
                                        </tr>

                                        @for($i = 0; $i < count($allWorkPtn) && $i < 20; $i++)
                                            <tr style="background-color: white;">
                                                <td class="col-sm-4">
                                                        <a href="{{ url('master/MT05WorkPtnEditor/'. $allWorkPtn[$i]->WORKPTN_CD )}}">
                                                            {{ $allWorkPtn[$i]->WORKPTN_CD }} : {{ $allWorkPtn[$i]->WORKPTN_NAME }}
                                                        </a>
                                                </td>
                                                <td class="col-sm-4">
                                                    @if($allWorkPtn[$i + 20] != null )
                                                    <a href="{{ url('master/MT05WorkPtnEditor/'. $allWorkPtn[$i + 20]->WORKPTN_CD )}}">
                                                        {{ $allWorkPtn[$i + 20]->WORKPTN_CD }} : {{ $allWorkPtn[$i + 20]->WORKPTN_NAME }}
                                                    </a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endfor

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="line"></div>
                        <div class="d-flex justify-content-center" id="pegination">
                                {{ $allWorkPtn->links() }}
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
