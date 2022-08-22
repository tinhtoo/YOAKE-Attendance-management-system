<!-- 部門権限情報照会 -->
@extends('menu.main')

@section('title', '部門権限情報照会')

@section('content')
    <div id="contents-stage">
        <table class="BaseContainerStyle1">
            <tbody>
                <tr>
                    <td>
                        <div id="ctl00_cphContentsArea_UpdatePanel1">

                            <p class="FunctionMenu1">
                                <a id="ctl00_cphContentsArea_hlAddDeptAuth" href="MT13DeptAuthEditor?Id=Add">新規部門権限登録</a>
                            </p>

                            <div class="line"></div>
                            <div class="GridViewStyle1">
                                <div>
                                    <table class="GridViewSpace" id="ctl00_cphContentsArea_gvDeptAuth"
                                        style="border-collapse: collapse;" border="1" rules="all" cellspacing="0">
                                        <tbody>

                                            <tr>
                                                <th scope="col">
                                                    部門権限
                                                </th>
                                                <th scope="col">
                                                    部門権限
                                                </th>
                                            </tr>

                                            @for($i = 0; $i < count($dept_data) && $i < 20; $i++)
                                            <tr style="background-color: white;">
                                                <td class="col-sm-4">
                                                        <a href="{{ url('master/MT13DeptAuthEditor/'. $dept_data[$i]->DEPT_AUTH_CD )}}">
                                                            {{ $dept_data[$i]->DEPT_AUTH_CD }} : {{ $dept_data[$i]->DEPT_AUTH_NAME }}
                                                        </a>
                                                </td>
                                                <td class="col-sm-4">
                                                    @if($dept_data[$i + 20] != null )
                                                    <a href="{{ url('master/MT13DeptAuthEditor/'. $dept_data[$i + 20]->DEPT_AUTH_CD )}}">
                                                        {{ $dept_data[$i + 20]->DEPT_AUTH_CD }} : {{ $dept_data[$i + 20]->DEPT_AUTH_NAME }}
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
                                    {{ $dept_data->links() }}
                            </div>

                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
