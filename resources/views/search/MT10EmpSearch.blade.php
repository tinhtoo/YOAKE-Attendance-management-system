<!-- 社員情報検索 -->
@extends('common.home')

@section('title', '社員情報検索')

@section('content_search')
    <div id="search-container">
        <div id="contents-stage">
            <form action="{{ route('emp.search') }}" method="get" id="form">
                {{ csrf_field() }}
                @if(key_exists('regClsCd', $request_data))<input type="hidden" name="regClsCd" value="{{ $request_data['regClsCd'] }}">@endif
                @if(key_exists('isDeptAuth', $request_data))<input type="hidden" name="isDeptAuth" value="{{ $request_data['isDeptAuth'] }}">@endif
                @if(key_exists('calendarClsCd', $request_data))<input type="hidden" name="calendarClsCd" value="{{ $request_data['calendarClsCd'] }}">@endif

                <input type="button" name="btnBack" id="btnBack" style="width: 80px; margin-bottom:4px" onclick="window.close();" value="戻る">
                <div id="UpdatePanel1">

                    <table class="InputFieldStyle1">
                        <tbody>
                            <tr>
                                <th>社員カナ名</th>
                                <td>
                                    <input type="text" name="filter[txtEmpKana]" class="imeOn" id="txtEmpKana"
                                        style="width:160px;" maxlength="20"
                                        value="{{ old('filter[txtEmpKana]', !empty($search_data['txtEmpKana']) ? $search_data['txtEmpKana'] : '') }}">
                                </td>
                            </tr>
                            <tr>
                                <th>部門</th>
                                <td>
                                    <input type="text" name="filter[txtDeptCd]" id="txtDeptCd" class="searchDeptCd txtDeptCd"
                                        style="width:50px;" maxlength="6"
                                        value="{{ old('filter[txtDeptCd]', !empty($search_data['txtDeptCd']) ? $search_data['txtDeptCd'] : '') }}">
                                    <input type="button" name="btnSearchDeptCd" class="SearchButton" id="btnSearchDeptCd"
                                        value="?" onclick="SearchDept(this);return false">
                                    <input type="text" name="deptName" data-dispclscd=01 data-isdeptauth=true
                                        style="width:200px; display:inline-block;" id="deptName" class="txtDeptName"
                                        value="{{ old('deptName', !empty($request_data['deptName']) ? $request_data['deptName'] : '') }}"
                                        readonly="readonly">
                                    <span class="text-danger" id="deptNameError"></span>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>

                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <p class="FunctionMenu1">
                        <input type="submit" name="btnSearch" id="btnSearch" class="SearchButton" value="検索" onclick="return (!$('#deptNameError').text())">
                        <input type="button" name="btnCancel" class="SearchButton" id="btnCancel" onclick="Cancel();" value="キャンセル">
                    </p>

                    <div class="clearBoth"></div>

                    <div class="line"></div>

                    <ul class="HolizonListMenu1">
                        <li><input type="submit" name="btnAll" id="btnAll" class="SearchButton" value="全件" onclick="return (!$('#deptNameError').text())"></li>
                        <li><input type="submit" name="button_A" value="あ" onclick="return (!$('#deptNameError').text())"></li>
                        <li><input type="submit" name="button_KA" value="か" onclick="return (!$('#deptNameError').text())"></li>
                        <li><input type="submit" name="button_SA" value="さ" onclick="return (!$('#deptNameError').text())"></li>
                        <li><input type="submit" name="button_TA" value="た" onclick="return (!$('#deptNameError').text())"></li>
                        <li><input type="submit" name="button_NA" value="な" onclick="return (!$('#deptNameError').text())"></li>
                        <li><input type="submit" name="button_HA" value="は" onclick="return (!$('#deptNameError').text())"></li>
                        <li><input type="submit" name="button_MA" value="ま" onclick="return (!$('#deptNameError').text())"></li>
                        <li><input type="submit" name="button_YA" value="や" onclick="return (!$('#deptNameError').text())"></li>
                        <li><input type="submit" name="button_RA" value="ら" onclick="return (!$('#deptNameError').text())"></li>
                        <li><input type="submit" name="button_WA" value="わ" onclick="return (!$('#deptNameError').text())"></li>
                        <li><input type="submit" name="button_EN" value="英字" onclick="return (!$('#deptNameError').text())"></li>
                    </ul>

                    <div class="line"></div>

                    <div class="GridViewStyle1 mg10" id="search-gridview-container">
                        <div class="GridViewPanelStyle6" id="pnlEmp">

                            <div>
                                @if (!empty($request_data))
                                    @isset($search_result)
                                        <table class="GridViewPadding" id="gvEmp" style="border-collapse: collapse;" border="1"
                                            cellspacing="0">
                                            <tbody>

                                                @if ($search_result->isEmpty())
                                                    <tr style="width:70px; text-align:center;">
                                                        <td><span>{{ getArrValue($error_messages, '2000') }}</span></td>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <th scope="col">選択</th>
                                                        <th scope="col">コード</th>
                                                        <th scope="col">社員名</th>
                                                        <th scope="col">部門名</th>
                                                    </tr>
                                                    @foreach ($search_result as $item)
                                                        <tr background-color: transparent;>
                                                            <td style="width: 30px; white-space: nowrap;">
                                                                <input name="rbSelectRow" id="{{ $item->EMP_CD }}"
                                                                    type="radio" class="check-row">
                                                            </td>
                                                            <td style="width: 50px; white-space: nowrap;">
                                                                <label for="{{ $item->EMP_CD }}" style="width: 100%; cursor: pointer;">
                                                                    <span class="lblEmpCd" style="cursor: pointer;"
                                                                        data-code="{{ $item->EMP_CD }}">{{ $item->EMP_CD }}</span>
                                                                </label>
                                                            </td>
                                                            <td style="width: 200px; white-space: nowrap;">
                                                                <label for="{{ $item->EMP_CD }}" style="width: 100%; cursor: pointer;">
                                                                    <span class="lblEmpName" style="cursor: pointer;"
                                                                        data-name="{{ $item->EMP_NAME }}">{{ $item->EMP_NAME }}</span>
                                                                </label>
                                                            </td>
                                                            <td style="width: 200px; white-space: nowrap;">
                                                                <label for="{{ $item->EMP_CD }}" style="width: 100%; cursor: pointer;">
                                                                    <span class="lblDeptName" style="cursor: pointer;"
                                                                        data-dept="{{ $item->DEPT_NAME }}">{{ $item->DEPT_NAME }}</span>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    @endisset
                                @endif
                            </div>

                        </div>
                    </div>

                    @if(!empty($request_data))
                        <div class="line"></div>
                        <div class="d-flex justify-content-center" id="pegination">
                            @isset($search_result)
                                {{ $search_result->appends(request()->query())->links() }}
                            @endisset
                        </div>
                    @endif

                    <div class="line"></div>
                    <p class="ButtonField1">
                        <input type="button" name="btnCancel" class="SearchButton" id="btnCancel" onclick="Cancel();" value="キャンセル">
                    </p>

                </div>
            </form>

        </div>
    </div>

@endsection
@section('script')
<script>
$(function() {
    // 選択された値を渡す
    $('.check-row').on('click', function() {
        if (!window.opener || window.opener.closed) {
            alert("呼び出し元が既に閉じられています。");
            return false;
        }
        var ele = $(this);
        var parentTd = window.opener.$(".clickedTableRecord").closest("td");
        var targetDeptNameTd = window.opener.$('#deptNameWithEmp').closest("td");
        var txtDeptName = targetDeptNameTd.find('#deptNameWithEmp');

        if (ele.is(':checked')) {
            var tr = ele.closest('tr');
            if (parentTd.length) {
                var txtEmpCd = parentTd.find('.txtEmpCd');
                var txtEmpName = parentTd.find('.txtEmpName');

                var code = tr.find('.lblEmpCd').data('code');
                txtEmpCd.val(code);

                var name = tr.find('.lblEmpName').data('name');
                txtEmpName.val(name);

                parentTd.find("#EmpCdError").text("");
            }
            if(targetDeptNameTd.length) {
                if (targetDeptNameTd.find('#deptNameWithEmp') != null) {
                    var deptName = tr.find('.lblDeptName').data('dept');
                    txtDeptName.val(deptName);
                }
            }
        }
        window.close();
    });

    Cancel = function() {
        $("#txtEmpKana, #txtDeptCd, #deptName").val('');
        $("#deptNameError").text('');
        var tbl = document.getElementById('gvEmp');
        tbl.remove();
        var ftr = document.getElementById('pegination');
        ftr.remove();
    }
})
</script>
@endsection
