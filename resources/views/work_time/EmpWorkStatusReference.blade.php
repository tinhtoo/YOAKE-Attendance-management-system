<!-- 出退勤入力（部門別）画面 -->
@extends('menu.main')

@section('title', '出退勤照会')

@section('content')
    <div id="contents-stage">
        <table>
            <tbody>
                <tr>
                    <td>
                        <div id="UpdatePanel1">
                            <!-- header -->
                            <form action="" method="POST" id="form">
                                {{ csrf_field() }}
                                <table class="InputFieldStyle1">
                                    <tbody>
                                        <tr>
                                            <th>対象年月日</th>
                                            <td>
                                                <select name="ddlTargetYear" tabindex="1" class="imeDisabled"
                                                    id="ddlTargetYear" style="width: 70px;">
                                                    @for ($year = date('Y') - 3; $year <= date('Y') + 3; $year++)
                                                        <option value="{{ $year }}"
                                                            {{ old('ddlTargetYear', !empty($inputSearchData['ddlTargetYear']) ? $inputSearchData['ddlTargetYear'] : date('Y')) == $year ? 'selected' : '' }}>
                                                            {{ $year }}
                                                        </option>
                                                    @endfor
                                                </select>
                                                &nbsp;年
                                                <select name="ddlTargetMonth" tabindex="2" class="imeDisabled"
                                                    id="ddlTargetMonth">
                                                    @for ($month = 01; $month <= 12; $month++)
                                                        <option value="{{ $month }}"
                                                            {{ old('ddlTargetMonth', !empty($inputSearchData['ddlTargetMonth']) ? $inputSearchData['ddlTargetMonth'] : date('m')) == $month ? 'selected' : '' }}>
                                                            {{ $month }}
                                                        </option>
                                                    @endfor
                                                </select>
                                                &nbsp;月
                                                <select name="ddlTargetDay" tabindex="3" class="imeDisabled"
                                                    id="ddlTargetDay">
                                                    @for ($day = 01; $day <= 31; $day++)
                                                        <option value="{{ $day }}"
                                                            {{ old('ddlTargetDay', !empty($inputSearchData['ddlTargetDay']) ? $inputSearchData['ddlTargetDay'] : date('d')) == $day ? 'selected' : '' }}>
                                                            {{ $day }}
                                                        </option>
                                                    @endfor
                                                </select>
                                                &nbsp;日
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>部門</th>
                                            <td>
                                                <input name="filter[txtDeptCd]" tabindex="3" class="imeDisabled"
                                                    id="txtDeptCd" style="width: 50px;" type="text" maxlength="6"
                                                    value="{{ old('filter[txtDeptCd]', !empty($searchData['txtDeptCd']) ? $searchData['txtDeptCd'] :'') }}">
                                                <input name="btnSearchDeptCd" class="SearchButton" id="btnSearchDeptCd" type="button" value="?" onclick="SearchDept();return false">
                                                <input class="OutlineLabel" type="text" name="deptName" id="deptName"
                                                    style="width: 200px; height: 17px; display: inline-block;"
                                                    value="{{ old('deptName', !empty($inputSearchData['deptName']) ? $inputSearchData['deptName']:'') }}"
                                                    readonly="readonly">

                                                    @if ($errors->has('filter.txtDeptCd'))
                                                        <span class="alert-danger">{{ $errors->first('filter.txtDeptCd') }}</span>
                                                    @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>開始所属</th>
                                            <td>
                                                <select name="filter[ddlStartCompany]" tabindex="6" id="ddlStartCompany"
                                                    style="width: 300px;">
                                                    <option value=""></option>
                                                    @isset($haken_company)
                                                        @foreach ($haken_company as $companyName)
                                                            <option value="{{ $companyName->COMPANY_CD }}"
                                                                {{ old('filter.ddlStartCompany', !empty($searchData['ddlStartCompany']) ? $searchData['ddlStartCompany'] : '') == $companyName->COMPANY_CD ? 'selected' : '' }}>
                                                                {{ $companyName->COMPANY_ABR }}
                                                            </option>
                                                        @endforeach
                                                    @endisset
                                                </select>


                                            </td>
                                        </tr>
                                        <tr>
                                            <th>終了所属</th>
                                            <td>
                                                <select name="filter[ddlEndCompany]" tabindex="7" id="ddlEndCompany"
                                                    style="width: 300px;">
                                                    <option value=""></option>
                                                    @isset($haken_company)
                                                        @foreach ($haken_company as $companyName)
                                                            <option value="{{ $companyName->COMPANY_CD }}"
                                                                {{ old('filter.ddlEndCompany', !empty($searchData['ddlEndCompany']) ? $searchData['ddlEndCompany'] : '') == $companyName->COMPANY_CD ? 'selected' : '' }}>
                                                                {{ $companyName->COMPANY_ABR }}
                                                            </option>
                                                        @endforeach
                                                    @endisset
                                                </select>

                                            </td>
                                        </tr>
                                        <tr>
                                            <th>社員番号</th>
                                            <td>
                                                <input name="filter[txtEmpCd]" tabindex="3" class="OutlineLabel"
                                                    id="txtEmpCd" style="width: 80px;" type="text" maxlength="10"
                                                    value="{{ old('filter.txtEmpCd', !empty($searchData['txtEmpCd']) ? $searchData['txtEmpCd'] : '') }}">
                                                <input name="btnSearchEmpCd" tabindex="4" class="SearchButton"
                                                    id="btnSearchEmpCd"
                                                    onclick="SearchEmp();return false"
                                                    type="button" value="?">
                                                <input name="empName" class="OutlineLabel" type="text"
                                                    style="width: 200px; height: 17px; display: inline-block;" id="empName"
                                                    disabled="disabled">
                                                &nbsp;
                                                @if ($errors->has('filter.txtEmpCd'))
                                                    <span class="alert-danger">{{ $errors->first('filter.txtEmpCd') }}</span>
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>


                                <div class="mg10" style="text-align:left;border-bottom: 4px solid #fff;">
                                    <input tabindex="10" id="btnSelectAll" onclick="ChangeAllCheckBoxStates1();"
                                        type="button" value="全選択">
                                    <input tabindex="11" id="btnNotSelectAll" onclick="ChangeAllCheckBoxStates2();"
                                        type="button" value="全解除">
                                </div>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <form action="" name="checkform" method="GET">
                                                    <table class="GroupBox3">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <input name="filter[ckWorkd]" value="01"
                                                                    {{ old('filter.ckWorkd', !empty($search_data['ckWorkd']) ? $search_data['ckWorkd'] : '') == '01' ? 'checked' : '' }}
                                                                    id="ckWorkd" tabindex="12" class="check" type="checkbox" checked>
                                                                    <label>通常</label>

                                                                    <input name="filter[ckPadh]" value="02"
                                                                    {{ old('filter.ckPadh', !empty($search_data['ckPadh']) ? $search_data['ckPadh'] : '') == '02' ? 'checked' : '' }}
                                                                    id="ckPadh" tabindex="13" class="check" type="checkbox" checked>
                                                                    <label>有休</label>

                                                                    <input name="filter[ckPadbh]" value="03"
                                                                    {{ old('filter.ckPadbh', !empty($search_data['ckPadbh']) ? $search_data['ckPadbh'] : '') == '03' ? 'checked' : '' }}
                                                                    id="ckPadbh" tabindex="14" class="check" type="checkbox" checked>
                                                                    <label>前休</label>

                                                                    <input name="filter[ckPadah]" value="04"
                                                                    {{ old('filter.ckPadah', !empty($search_data['ckPadah']) ? $search_data['ckPadah'] : '') == '04' ? 'checked' : '' }}
                                                                    id="ckPadah" tabindex="15" class="check" type="checkbox" checked>
                                                                    <label>後休</label>

                                                                    <input name="filter[ckCompd]" value="05"
                                                                    {{ old('filter.ckCompd', !empty($search_data['ckCompd']) ? $search_data['ckCompd'] : '') == '05' ? 'checked' : '' }}
                                                                    id="ckCompd" tabindex="16" class="check" type="checkbox" checked>
                                                                    <label>代休</label>

                                                                    <input name="filter[ckCompbd]" value="06"
                                                                    {{ old('filter.ckCompbd', !empty($search_data['ckCompbd']) ? $search_data['ckCompbd'] : '') == '06' ? 'checked' : '' }}
                                                                    id="ckCompbd" tabindex="17" class="check" type="checkbox" checked>
                                                                    <label>前代</label>

                                                                    <input name="filter[ckCompad]" value="07"
                                                                    {{ old('filter.ckCompad', !empty($search_data['ckCompad']) ? $search_data['ckCompad'] : '') == '07' ? 'checked' : '' }}
                                                                    id="ckCompad" tabindex="18" class="check" type="checkbox" checked>
                                                                    <label>後代</label>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input name="filter[ckSpch]" value="08"
                                                                    {{ old('filter.ckSpch', !empty($search_data['ckSpch']) ? $search_data['ckSpch'] : '') == '08' ? 'checked' : '' }}
                                                                    id="ckSpch" tabindex="19" class="check" type="checkbox" checked>
                                                                    <label>特休</label>

                                                                    <input name="filter[ckAbcd]" value="09"
                                                                    {{ old('filter.ckAbcd', !empty($search_data['ckAbcd']) ? $search_data['ckAbcd'] : '') == '09' ? 'checked' : '' }}
                                                                    id="ckAbcd" tabindex="20" class="check" type="checkbox" checked>
                                                                    <label>欠勤</label>

                                                                    <input name="filter[ckDirg]" value="10"
                                                                    {{ old('filter.ckDirg', !empty($search_data['ckDirg']) ? $search_data['ckDirg'] : '') == '10' ? 'checked' : '' }}
                                                                    id="ckDirg" tabindex="21" class="check" type="checkbox" checked>
                                                                    <label>直行</label>

                                                                    <input name="filter[ckDirr]" value="11"
                                                                    {{ old('filter.ckDirr', !empty($search_data['ckDirr']) ? $search_data['ckDirr'] : '') == '11' ? 'checked' : '' }}
                                                                    id="ckDirr" tabindex="22" class="check" type="checkbox" checked>
                                                                    <label>直帰</label>

                                                                    <input name="filter[ckDirqr]" value="12"
                                                                    {{ old('filter.ckDirqr', !empty($search_data['ckDirqr']) ? $search_data['ckDirqr'] : '') == '12' ? 'checked' : '' }}
                                                                    id="ckDirqr" tabindex="23" class="check" type="checkbox" checked>
                                                                    <label>直直</label>

                                                                    <input name="filter[ckBusj]" value="13"
                                                                    {{ old('filter.ckBusj', !empty($search_data['ckBusj']) ? $search_data['ckBusj'] : '') == '13' ? 'checked' : '' }}
                                                                    id="ckBusj" tabindex="24" class="check" type="checkbox" checked>
                                                                    <label>出張</label>

                                                                    <input name="filter[ckDelay]" value="14"
                                                                    {{ old('filter.ckDelay', !empty($search_data['ckDelay']) ? $search_data['ckDelay'] : '') == '14' ? 'checked' : '' }}
                                                                    id="ckDelay" tabindex="25" class="check" type="checkbox" checked>
                                                                    <label>遅延</label>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </form>
                                            </td>
                                            <td class="pd5Left">
                                                @if ($errors->has('filter.ckWorkd','filter.ckPadh', 'filter.ckPadbh', 'filter.ckPadah', 'filter.ckCompd', 'filter.ckCompbd', 'filter.ckCompad',
                                                'filter.ckSpch', 'filter.ckAbcd', 'filter.ckDirg', 'filter.ckDirr', 'filter.ckDirqr', 'filter.ckBusj', 'filter.ckDelay'))
                                                    <span class="alert-danger">{{ $errors->first('filter.ckWorkd') }}</span>
                                                @endif
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
                                                <input name="btnDisp" class="ButtonStyle1 submit-form" id="btnShow"
                                                    type="button" value="表示" onclick="return"
                                                    data-url="{{ route('empworkstatusRef.search') }}"
                                                    style="width: 80px;">
                                                <input name="btnCancel2" class="ButtonStyle1 submit-form" id="btnCancel2"
                                                    type="button" value="キャンセル"
                                                    data-url="{{ route('empworkstatusRef.cancel') }}"
                                                    style="width: 80px;">
                                                &nbsp;
                                                <span id="lblNoStampColor" style="background-color: tomato;">　　　</span>
                                                <span id="lblNoStamp">未打刻</span>
                                                &nbsp;
                                                <span id="lblDbStampColor"
                                                    style="background-color: lightskyblue;">　　　</span>
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

                                <!-- detail -->
                                <div class="GridViewStyle1" id="gridview-container">
                                    <div class="GridViewPanelStyle2" id="pnlEmpWorkStatus" style="width: 990px;">
                                        <div>
                                            <table tabindex="28" class="GridViewBorder GridViewPadding" id="gvEmpWorkStatus"
                                                style="border-collapse: collapse;" border="1" rules="all" cellspacing="0">
                                                <tbody>
                                                    @isset($empWorkTimeResults)
                                                        @if (count($empWorkTimeResults) < 1)
                                                            <tr style="width: 70px;">
                                                                <td><span>{{ $errMsg_4029 }}</span></td>
                                                            </tr>
                                                        @else
                                                            <tr>
                                                                <th scope="col">
                                                                    部門コード
                                                                </th>
                                                                <th scope="col">
                                                                    部門名
                                                                </th>
                                                                <th scope="col">
                                                                    社員番号
                                                                </th>
                                                                <th scope="col">
                                                                    社員名
                                                                </th>
                                                                <th scope="col">
                                                                    勤務体系
                                                                </th>
                                                                <th scope="col">
                                                                    事由
                                                                </th>
                                                                <th scope="col">
                                                                    出勤打刻場所
                                                                </th>
                                                                <th scope="col">
                                                                    出勤
                                                                </th>
                                                                <th scope="col">
                                                                    退出
                                                                </th>
                                                                <th scope="col">
                                                                    退出打刻場所
                                                                </th>
                                                            </tr>
                                                            @foreach ($empWorkTimeResults->unique('EMP_CD') as $empWorkTimeResult)
                                                                <tr>
                                                                    <td style="width: 70px;">
                                                                        <span
                                                                            id="lblDeptCd">{{ $empWorkTimeResult->DEPT_CD }}</span>
                                                                    </td>
                                                                    <td style="width: 130px;">
                                                                        <span
                                                                            id="lblDeptName">{{ $empWorkTimeResult->DEPT_NAME }}</span>
                                                                    </td>
                                                                    <td style="width: 80px;">
                                                                        <span
                                                                            id="lblEmpCd">{{ $empWorkTimeResult->EMP_CD }}</span>
                                                                    </td>
                                                                    <td style="width: 130px;">
                                                                        <span
                                                                            id="lblEmpName">{{ $empWorkTimeResult->EMP_NAME }}</span>
                                                                    </td>
                                                                    <td style="width: 130px;">
                                                                        <span id="lblWorkPtn"
                                                                            class="{{ $empWorkTimeResult->WORK_CLS_CD == '00' ? 'text-danger' : '' }}"
                                                                            style="width: 160px; display: inline-block;">{{ $empWorkTimeResult->WORKPTN_NAME }}</span>
                                                                    </td>
                                                                    <td class="GridViewRowCenter" style="width: 50px;">
                                                                        <span id="lblReason"
                                                                            class="{{ $empWorkTimeResult->REASON_PTN_CD == '01' ? 'text-danger' : '' }} &&
                                                                            {{ $empWorkTimeResult->REASON_PTN_CD == '02' ? 'text-primary' : '' }}">
                                                                            {{ $empWorkTimeResult->REASON_NAME }}
                                                                        </span>
                                                                    </td>

                                                                    @if ($empWorkTimeResult->WORKTIME_CLS_CD == 00)
                                                                        <td class="GridViewRowCenter" style="width: 130px;">
                                                                            <span
                                                                                id="lblTeamName">{{ $empWorkTimeResult->TERM_NAME }}
                                                                            </span>
                                                                        </td>
                                                                    @else
                                                                        <td class="GridViewRowCenter" style="width: 130px;">
                                                                            <span id="lblTeamName"></span>
                                                                        </td>
                                                                    @endif

                                                                    @if ($empWorkTimeResult->OFC_CNT >= 2 && empty($empWorkTimeResult->OFC_TIME_HH))
                                                                        <td style="width: 40px; background-color: lightskyblue;"
                                                                            <span id="lblOfcTime">
                                                                            {{ $empWorkTimeResult->OFC_TIME }}</span>
                                                                        </td>
                                                                    @elseif (empty($empWorkTimeResult->OFC_TIME_HH) &&
                                                                        isset($empWorkTimeResult->LEV_TIME_HH))
                                                                        <td style="width: 40px; background-color: tomato;" <span
                                                                            id="lblOfcTime">
                                                                            {{ $empWorkTimeResult->OFC_TIME }}</span>
                                                                        </td>
                                                                    @elseif (empty($empWorkTimeResult->OFC_TIME_HH) &&
                                                                        empty($empWorkTimeResult->LEV_TIME_HH))
                                                                        <td style="width: 40px;" <span id="lblOfcTime">
                                                                            {{ $empWorkTimeResult->OFC_TIME }}</span>
                                                                        </td>
                                                                    @else
                                                                        <td style="width: 40px;" <span id="lblOfcTime">
                                                                            {{ $empWorkTimeResult->OFC_TIME }}</span>
                                                                        </td>
                                                                    @endif

                                                                    @if ($empWorkTimeResult->LEV_CNT >= 2 && empty($empWorkTimeResult->LEV_TIME_HH))
                                                                        <td style="width: 40px; background-color: lightskyblue;"
                                                                            <span id="lblLevTime">
                                                                            {{ $empWorkTimeResult->LEV_TIME }}</span>
                                                                        </td>
                                                                    @elseif (isset($empWorkTimeResult->OFC_TIME_HH) &&
                                                                        empty($empWorkTimeResult->LEV_TIME_HH))
                                                                        <td style="width: 40px; background-color: tomato;" <span
                                                                            id="lblLevTime">
                                                                            {{ $empWorkTimeResult->LEV_TIME }}</span>
                                                                        </td>
                                                                    @elseif (empty($empWorkTimeResult->OFC_TIME_HH) &&
                                                                        empty($empWorkTimeResult->LEV_TIME_HH))
                                                                        <td style="width: 40px;" <span id="lblLevTime">
                                                                            {{ $empWorkTimeResult->LEV_TIME }}</span>
                                                                        </td>
                                                                    @else
                                                                        <td style="width: 40px;" <span id="lblLevTime">
                                                                            {{ $empWorkTimeResult->LEV_TIME }}</span>
                                                                        </td>
                                                                    @endif

                                                                    @if ($empWorkTimeResult->WORKTIME_CLS_CD == 01)
                                                                        <td class="GridViewRowCenter" style="width: 130px;">
                                                                            <span
                                                                                id="lblTeamName">{{ $empWorkTimeResult->TERM_NAME }}
                                                                            </span>
                                                                        </td>
                                                                    @else
                                                                        <td class="GridViewRowCenter" style="width: 130px;">
                                                                            <span id="lblTeamName"></span>
                                                                        </td>
                                                                    @endif
                                                                </tr>
                                                            @endforeach
                                                        @endisset
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>

                                    <!-- footer -->
                                    <div class="line">
                                        <hr>
                                    </div>
                                    <p class="ButtonField2">
                                        <input name="ctl00$cphContentsArea$btnCancel" tabindex="9"
                                        id="ctl00_cphContentsArea_btnCancel"
                                        onclick="CloseSubWindow();__doPostBack('ctl00$cphContentsArea$btnCancel','')"
                                        type="button" value="キャンセル">
                                    </p>
                            </form>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
@section('script')

    <script>
        $(document).on('click', '.submit-form', function() {
            var url = $(this).data('url');
            $('#form').attr('action', url);
            $('#form').submit();
        });

        //検索の際ボンタン機能無効
        $(document).on('click', '#btnShow', function load() {
            $('#btnShow, #ddlTargetYear, #ddlTargetMonth, #ddlTargetDay, #txtEmpCd, #btnSearchEmpCd').attr(
                'disabled', true);
        });

        function ChangeAllCheckBoxStates1() {
            //チャックボックスのid
            const ElementsCount = document.getElementsByClassName("check");
            //全選択を切り替え
            for (let i = 0; i < ElementsCount.length; i++) {
                ElementsCount[i].checked = true;
            }
        }

        function ChangeAllCheckBoxStates2() {
            //チャックボックスのid
            const ElementsCount = document.getElementsByClassName("check");
            //全解除を切り替え
            for (let i = 0; i < ElementsCount.length; i++) {
                ElementsCount[i].checked = false;
            }
        }
    </script>
@endsection
