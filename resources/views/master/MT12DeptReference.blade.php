<!-- 部門情報照会 -->
@extends('menu.main')

@section('title', '部門情報照会 ')

@section('content')
    <div id="contents-stage">
        <table class="BaseContainerStyle1">
            <tbody>
                <tr>
                    <td>
                        <div id="ctl00_cphContentsArea_UpdatePanel1">

                            <div class="GridViewStyle1">
                                <div>
                                    <table id="ctl00_cphContentsArea_gvDept" style="border-collapse: collapse;" border="1"
                                        rules="all" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <th scope="col">
                                                    部門
                                                </th>
                                            </tr>
                                            @foreach($paginateDept as $DeptItem )
                                            <tr style="background-color: white;">
                                                <td class="col-sm-4">
                                                        <a href="{{ url('master/MT12DeptEditor/'. $DeptItem->DEPT_CD )}}">
                                                            {{ $DeptItem->DEPT_CD }} :
                                                                @for($i = 0 ; $i < ($DeptItem->LEVEL_NO) ; $i++)
                                                                　　　
                                                                @endfor
                                                            {{ $DeptItem->DEPT_NAME }}
                                                        </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="line"></div>
                            <tr class="ButtonField1">
                                <td>
                                    <div class="d-flex justify-content-center" id="pegination">
                                    {{ $paginateDept->links() }}
                                    </div>
                                </td>
                            </tr>

                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
