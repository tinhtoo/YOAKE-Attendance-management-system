<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- 出退勤入力画面 -->
    @extends('menu.main')

    @section('title','出退勤入力')

    @section('content')
    <form action="{{ route('test_tmp')}}" method="POST">
        {{ csrf_field() }}
        <table class="InputFieldStyle1">
            <tbody>
                <tr>
                    <th>対象月度</th>
                    <td>
                        <select name="ddlTargetYear" tabindex="1" class="imeDisabled" id="ddlTargetYear" style="width: 70px;" onchange="SetTargetDate()">
                            <option selected="" value="2020">2020</option>
                            <option selected="" value="2021">2021</option>
                            <option selected="" value="2022">2022</option>
                        </select>
                        &nbsp;年
                        <input name="hdnTargetYear" id="hdnTargetYear" type="hidden" value="">
                        <select name="ddlTargetMonth" tabindex="2" class="imeDisabled" id="ddlTargetMonth" onchange="SetTargetDate()">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                        &nbsp;月度
                        <input name="hdnTargetMonth" id="hdnTargetMonth" type="hidden" value="">
                    </td>
                </tr>
                <tr>
                    <th>社員番号</th>
                    <td>
                        <!-- <input type="text">
                        <input type="submit"> -->
                        <input name="txtEmpCd" tabindex="3" class="imeDisabled" id="txtEmpCd" style="width: 80px;" type="text" maxlength="10">
                        <input name="btnSearchEmpCd" tabindex="4" class="SearchButton" id="btnSearchEmpCd" type="submit" value="?">
                        <span class="OutlineLabel" id="lblEmpName" style="width: 200px; height: 17px; display: inline-block;"></span>
                    </td>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <td>

                </tr>
                <tr>
                    <th>部門</th>
                    <td>
                        <span class="OutlineLabel" id="lblDeptName" style="width: 200px; height: 17px; display: inline-block;"></span>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="line">
            <hr>
        </div>

        <table>
            <tbody>
                <tr>
                    <td style="width: auto;">
                        <input name="btnDisp" tabindex="7" class="ButtonStyle1" type="submit" value="表示">
                        <button type='submit' class="btn btn-primary">表示button</button>
                        <input name="btnCancel2" tabindex="8" class="ButtonStyle1" id="btnCancel2" onclick="CloseSubWindow();__doPostBack('btnCancel2','')" type="button" value="キャンセル">
                        &nbsp;
                        <span id="lblNoStampColor" style="background-color: tomato;">　　　</span>
                        <span id="lblNoStamp">未打刻</span>
                        &nbsp;
                        <span id="lblDbStampColor" style="background-color: lightskyblue;">　　　</span>
                        <span id="lblDbStamp">二重打刻</span>
                        &nbsp;
                        <span class="font-style2" id="lblFixMsg"></span>
                    </td>
                    <td class="right">
                        <span class="font-style1" id="lblDispCaldDate"></span>
                        &nbsp;
                        <span class="font-style1" id="lblDispOfcTime"></span>
                        &nbsp;
                        <span class="font-style1" id="lblDispLevTime"></span>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>



    @endsection

</body>

</html>