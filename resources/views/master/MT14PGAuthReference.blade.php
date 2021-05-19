<!-- 機能権限情報入力   -->
@extends('menu.main')

@section('title','機能権限情報入力 ')

@section('content')
<div id="contents-stage">
    <table class="BaseContainerStyle1">
        <tbody>
            <tr>
                <td>
                    <div id="ctl00_cphContentsArea_UpdatePanel1">

                        <p class="FunctionMenu1"><a id="ctl00_cphContentsArea_hlAddPgAuth" href="MT14PGAuthEditor?Id=Add">新規機能権限登録</a></p>

                        <div class="line"></div>

                        <div class="GridViewStyle1">
                            <div>
                                <table class="GridViewSpace" id="ctl00_cphContentsArea_gvPgAuth" style="border-collapse: collapse;" border="1" rules="all" cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <th scope="col">
                                                機能権限
                                            </th>
                                            <th scope="col">
                                                機能権限
                                            </th>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a id="ctl00_cphContentsArea_gvPgAuth_ctl02_hlPgAuth1" href="MT14PGAuthEditor?Id=000001">000001 : 一般ユーザー</a>
                                            </td>
                                            <td style="width: 350px;">

                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a id="ctl00_cphContentsArea_gvPgAuth_ctl03_hlPgAuth1" href="MT14PGAuthEditor?Id=000002">000002 : 照会ユーザー</a>
                                            </td>
                                            <td style="width: 350px;">

                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a id="ctl00_cphContentsArea_gvPgAuth_ctl04_hlPgAuth1" href="MT14PGAuthEditor?Id=100000">100000 : 部門管理者</a>
                                            </td>
                                            <td style="width: 350px;">

                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a id="ctl00_cphContentsArea_gvPgAuth_ctl05_hlPgAuth1" href="MT14PGAuthEditor?Id=999999">999999 : 管理者権限</a>
                                            </td>
                                            <td style="width: 350px;">

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
