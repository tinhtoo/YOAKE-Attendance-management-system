@extends('menu.main')

@section('title','部門情報入力 ')

@section('content')
<form action="" id="contents-stage">
<div id="contents-stage">
    <table class="BaseContainerStyle2">
        <tbody>
            <tr>
                <td>
                    <div id="ctl00_cphContentsArea_UpdatePanel1">

                        <table class="InputFieldStyle1">
                            <tbody>
                                <tr>
                                    <th>親部門</th>
                                    <td>
                                        <input name="txtUpDeptCd" disabled="disabled" class="imeDisabled" id="txtUpDeptCd" style="width: 50px;" type="text" maxlength="6" value="">
                                        <input name="txtUpDeptName" tabindex="1" class="imeOn" id="txtUpDeptName" style="width: 300px;" onfocus="this.select();" type="text" maxlength="20" value="">
                                        <span id="cvUpDeptName" style="color: red; display: none;">ErrorMessage</span>
                                        <span id="cvUpDeptCdDelete" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="line"></div>

                        <input name="Add-NewRow" tabindex="2" id="AddNewRow" type="button" value="新規行追加">

                        <div class="GridViewStyle1 mg10" id="table">
                            <div class="GridViewPanelStyle7" id="pnlDept">

                                <div>
                                    <table tabindex="3" class="Center" style="border-collapse: collapse;" border="1" rules="all" cellspacing="0">
                                        <tbody class="gvDept">

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>

                        <div class="line"></div>
                        <p class="ButtonField1">
                            <input name="btnUpdate" tabindex="5" id="btnUpdate" onclick="" type="submit" value="更新">
                            <input name="btnCancel" tabindex="6" id="btnCancel" onclick="javascript:__doPostBack('btnCancel','')" type="button" value="キャンセル">
                            <input name="btnDelete" tabindex="7" id="btnDelete" onclick="" type="button" value="削除">
                        </p>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
</form>
@endsection