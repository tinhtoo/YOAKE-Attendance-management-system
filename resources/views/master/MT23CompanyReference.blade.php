<!-- 所属情報入力   -->
@extends('menu.main')

@section('title','所属情報入力 ')

@section('content')
<div id="contents-stage">
    <table class="BaseContainerStyle1">
        <tbody>
            <tr>
                <td>
                    <div id="ctl00_cphContentsArea_UpdatePanel1">

                        <p class="FunctionMenu1"><a id="ctl00_cphContentsArea_hlAddSplyer" href="MT23CompanyEditor.aspx?Id=Add">新規所属登録</a></p>

                        <div class="line"></div>

                        <div class="GridViewStyle1">
                            <div>
                                <table class="GridViewSpace" id="ctl00_cphContentsArea_gvCompany" style="border-collapse: collapse;" border="1" rules="all" cellspacing="0">
                                    <tbody>
                                        <tr class="GridViewHeaderTitle1 Nowrap">
                                            <th scope="col">
                                                所属
                                            </th>
                                            <th scope="col">
                                                所属
                                            </th>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a id="ctl00_cphContentsArea_gvCompany_ctl02_hlCompany1" href="MT23CompanyEditor.aspx?Id=001">001 : A派遣株式会社</a>
                                            </td>
                                            <td style="width: 350px;">

                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a id="ctl00_cphContentsArea_gvCompany_ctl03_hlCompany1" href="MT23CompanyEditor.aspx?Id=002">002 : B派遣株式会社</a>
                                            </td>
                                            <td style="width: 350px;">

                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a id="ctl00_cphContentsArea_gvCompany_ctl04_hlCompany1" href="MT23CompanyEditor.aspx?Id=003">003 : C派遣株式会社</a>
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