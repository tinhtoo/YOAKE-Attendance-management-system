<!-- 社員番号一括変換 -->
@extends('menu.main')

@section('title','社員番号一括変換')

@section('content')
<div id="contents-stage">
    <table class="BaseContainerStyle1">
        <tbody>
            <tr>
                <td>

                    <div id="UpdatePanel1">


                        <table class="InputFieldStyle1">
                            <tbody>
                                <tr>
                                    <th>旧社員番号</th>
                                    <td>
                                        <input name="txtOldEmpCd" tabindex="1" class="imeDisabled" id="txtOldEmpCd" style="width: 80px;" onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;" onfocus="this.select();" onchange="javascript:setTimeout('__doPostBack(\'txtOldEmpCd\',\'\')', 0)" type="text" maxlength="10">
                                        <input name="btnSearchEmpCd" tabindex="2" class="SearchButton" id="btnSearchEmpCd" onclick="" type="button" value="?">
                                        <span class="OutlineLabel" id="lblOldEmpName" style="width: 200px; height: 17px; display: inline-block;"></span>

                                    </td>
                                </tr>
                                <tr>
                                    <th>新社員番号</th>
                                    <td>
                                        <input name="txtNewEmpCd" tabindex="3" class="imeDisabled" id="txtNewEmpCd" style="width: 80px;" onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;" onfocus="this.select();" onchange="javascript:setTimeout('__doPostBack(\'txtNewEmpCd\',\'\')', 0)" type="text" maxlength="10">

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="line"></div>
                        <p class="ButtonField1">
                            <input name="btnUpdate" tabindex="4" id="btnUpdate" onclick="if(confirm('更新します。よろしいですか?') ==  false){ return false;};WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;btnUpdate&quot;, &quot;&quot;, true, &quot;Update&quot;, &quot;&quot;, false, true))" type="button" value="更新">
                            <input name="btnCancel" tabindex="5" id="btnCancel" onclick="javascript:__doPostBack('btnCancel','')" type="button" value="キャンセル">
                        </p>

                    </div>

                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection