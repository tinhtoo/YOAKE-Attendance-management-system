<!-- 社員番号一括変換 -->
@extends('menu.main')

@section('title','社員番号一括変換')

@section('content')
<div id="contents-stage">
    <table class="BaseContainerStyle1">
        <tbody>
            <tr>
                <td>

                    <div id="ctl00_cphContentsArea_UpdatePanel1">


                        <table class="InputFieldStyle1">
                            <tbody>
                                <tr>
                                    <th>旧社員番号</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtOldEmpCd" tabindex="1" class="imeDisabled" id="ctl00_cphContentsArea_txtOldEmpCd" style="width: 80px;" onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;" onfocus="this.select();" onchange="javascript:setTimeout('__doPostBack(\'ctl00$cphContentsArea$txtOldEmpCd\',\'\')', 0)" type="text" maxlength="10">
                                        <input name="ctl00$cphContentsArea$btnSearchEmpCd" tabindex="2" class="SearchButton" id="ctl00_cphContentsArea_btnSearchEmpCd" onclick="SetEmpItem();__doPostBack('ctl00$cphContentsArea$btnSearchEmpCd','')" type="button" value="?">
                                        <span class="OutlineLabel" id="ctl00_cphContentsArea_lblOldEmpName" style="width: 200px; height: 17px; display: inline-block;"></span>

                                    </td>
                                </tr>
                                <tr>
                                    <th>新社員番号</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtNewEmpCd" tabindex="3" class="imeDisabled" id="ctl00_cphContentsArea_txtNewEmpCd" style="width: 80px;" onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;" onfocus="this.select();" onchange="javascript:setTimeout('__doPostBack(\'ctl00$cphContentsArea$txtNewEmpCd\',\'\')', 0)" type="text" maxlength="10">

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="line"></div>
                        <p class="ButtonField1">
                            <input name="ctl00$cphContentsArea$btnUpdate" tabindex="4" id="ctl00_cphContentsArea_btnUpdate" onclick="if(confirm('更新します。よろしいですか?') ==  false){ return false;};WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$cphContentsArea$btnUpdate&quot;, &quot;&quot;, true, &quot;Update&quot;, &quot;&quot;, false, true))" type="button" value="更新">
                            <input name="ctl00$cphContentsArea$btnCancel" tabindex="5" id="ctl00_cphContentsArea_btnCancel" onclick="javascript:__doPostBack('ctl00$cphContentsArea$btnCancel','')" type="button" value="キャンセル">
                        </p>

                    </div>

                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection