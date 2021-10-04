<!-- 組織変更入力  -->
@extends('menu.main')

@section('title','組織変更入力 ')

@section('content')
<div id="contents-stage">
    <table class="BaseContainerStyle2">
        <tbody>
            <tr>
                <td>
                    <div id="UpdatePanel1">


                        <table class="InputFieldStyle1">
                            <tbody>
                                <tr>
                                    <th>部門コード</th>
                                    <td>
                                        <span class="OutlineLabel" id="lblDeptCd" style="width: 80px; display: inline-block;">000000</span>
                                        <span class="OutlineLabel" id="lblDeptName" style="width: 280px; display: inline-block;">アイティーエス</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <span id="cvDeptCd" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>親部門コード</th>
                                    <td>
                                        <span class="OutlineLabel" id="lblUpDeptCd" style="width: 80px; display: inline-block;"></span>
                                        <span class="OutlineLabel" id="lblUpDeptName" style="width: 280px; display: inline-block;"></span>
                                        <input name="hidUpDeptCd" id="hidUpDeptCd" type="hidden">
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <span id="cvUpDeptCd" style="color: red; display: none;">ErrorMessage</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="line"></div>
                        <p class="ButtonField1">
                            <input name="btnSelect" tabindex="1" id="btnSelect" onclick="SetUpDeptItem()" type="button" value="親部門選択" /> 
                            <input name="btnUpdate" tabindex="2" id="btnUpdate" onclick="if(confirm('更新します。よろしいですか?') ==  false){ return false;};WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;btnUpdate&quot;, &quot;&quot;, true, &quot;Update&quot;, &quot;&quot;, false, true))" type="button" value="更新" ValidationGroup="Update" UseSubmitBehavior="False" />
                            <input name="btnCancel" tabindex="3" id="btnCancel" onclick="javascript:__doPostBack('btnCancel','')" type="button" value="キャンセル" UseSubmitBehavior="False"/>
                        </p>


                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection