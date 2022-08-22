<!-- 端数処理情報入力 -->
@extends('menu.main')

@section('title', '端数処理情報入力')

@section('content')
    <div id="contents-stage">
        <table style="width: 850px;">
            <tbody>
                <tr>
                    <td>
                        <div id="ctl00_cphContentsArea_UpdatePanel1">
                            <form action="" method="post" id="form">
                                @csrf
                                <table class="InputFieldStyle1">
                                    <tbody>
                                        <tr>
                                            <th>勤務体系</th>
                                            <td>
                                                <select name="WORKPTN_CD" tabindex="1" autofocus
                                                    id="WORKPTN_CD" style="width: 250px;" @isset($workptn_cd) disabled="disabled" @endisset
                                                    onchange=" submit(this.form)">
                                                    <option style=color:black; value="" ></option>
                                                    @foreach ($workptn_names as $workptn_name )
                                                    <option value="{{ $workptn_name->WORKPTN_CD }}" class ="view" data-url="{{ url('master/MT07FractionEditor') }}"
                                                        {{ $workptn_name->WORK_CLS_CD == '00' ? 'style=color:red;' : 'style=color:black;'}}
                                                        {{ $workptn_name->WORKPTN_CD == (old('WORKPTN_CD', isset($workptn_cd) ? $workptn_cd : '' )) ? 'selected' : '' }}>
                                                        {{ $workptn_name->WORKPTN_NAME }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @if (isset($workptn_cd))
                                                <input type="hidden" name="WORKPTN_CD_HIDE" value="{{ $workptn_cd }}">
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p class="CategoryTitle1">出退勤端数処理</p>
                                <table class="GroupBox1">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <input name="FRACTION_CLS_CD" tabindex="2"
                                                    id="rbFractionClsHr" type="radio"
                                                    value="00"
                                                    {{ old('FRACTION_CLS_CD',isset($search_fraction_data) ? $search_fraction_data->FRACTION_CLS_CD : '') == '00' ? 'checked': '' }}
                                                    @if (empty($search_fraction_data->FRACTION_CLS_CD))
                                                    checked
                                                    @endif
                                                    @if(!isset($workptn_cd)) disabled="disabled" @endif>
                                                    <label for="rbFractionClsHr">時間</label>
                                                <input name="FRACTION_CLS_CD" tabindex="3"
                                                    id="rbFractionClsTm"
                                                    type="radio" value="01"
                                                    {{ old('FRACTION_CLS_CD',isset($search_fraction_data) ? $search_fraction_data->FRACTION_CLS_CD : '') == '01' ? 'checked': '' }}
                                                    @if(!isset($workptn_cd)) disabled="disabled" @endif>
                                                    <label for="rbFractionClsTm">時刻</label>
                                                <div class="clearBoth"></div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <table class="InputFieldStyle1 mg10">
                                    <tbody>
                                        <tr>
                                            <th>出勤時間</th>
                                            <td>
                                                <select name="WTHR_UNDER_MI" tabindex="4" class="thr"
                                                    id="WTHR_UNDER_MI" style="width: 50px;"
                                                    @if(!isset($workptn_cd)) disabled="disabled" @endif>
                                                    <option value=""></option>
                                                    @foreach ($cls_detail_mins as $cls_detail_min)
                                                    <option value="{{ $cls_detail_min->CLS_DETAIL_CD }}"
                                                        @if(isset($search_fraction_data))
                                                        {{ $search_fraction_data->WTHR_UNDER_MI == (old('WTHR_UNDER_MI',$cls_detail_min->CLS_DETAIL_CD)) ? 'selected' : '' }}
                                                        @endif>
                                                        {{ $cls_detail_min->CLS_DETAIL_NAME }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                <span id="titleWthrUnderMiUnit">分未満</span>
                                            </td>
                                            <td>
                                                <select name="WTHR_FRC_CLS_CD" tabindex="5" class="thr"
                                                    id="WTHR_FRC_CLS_CD" style="width: 110px;"
                                                    @if(!isset($workptn_cd)) disabled="disabled" @endif>
                                                    <option value=""></option>
                                                    @foreach ($cls_detail_rfs as $cls_detail_rf)
                                                    <option value="{{ $cls_detail_rf->CLS_DETAIL_CD }}"
                                                        @if(isset($search_fraction_data))
                                                        {{ $search_fraction_data->WTHR_FRC_CLS_CD == (old('WTHR_FRC_CLS_CD',$cls_detail_rf->CLS_DETAIL_CD)) ? 'selected' : '' }}
                                                        @endif>
                                                        {{ $cls_detail_rf->CLS_DETAIL_NAME }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <span class="text-danger" id="wthrOverTime"></span>
                                            </td>
                                            <th>出勤時刻</th>
                                            <td>
                                                <select name="WTTM_UNDER_MI" tabindex="12" class="ttm"
                                                     id="WTTM_UNDER_MI" style="width: 50px;"
                                                    @if(!isset($workptn_cd)) disabled="disabled" @endif>
                                                    <option value=""></option>
                                                    @foreach ($cls_detail_mins as $cls_detail_min)
                                                    <option value="{{ $cls_detail_min->CLS_DETAIL_CD }}"
                                                        @if(isset($search_fraction_data))
                                                        {{ $search_fraction_data->WTTM_UNDER_MI == (old('WTTM_UNDER_MI',$cls_detail_min->CLS_DETAIL_CD)) ? 'selected' : '' }}
                                                        @endif>
                                                        {{ $cls_detail_min->CLS_DETAIL_NAME }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                <span id="titleWttmUnderMiUnit">分未満</span>
                                            </td>
                                            <td>
                                                <select name="WTTM_FRC_CLS_CD" tabindex="13" class="ttm"
                                                    id="WTTM_FRC_CLS_CD" style="width: 110px;"
                                                    @if(!isset($workptn_cd)) disabled="disabled" @endif>
                                                    <option value=""></option>
                                                    @foreach ($cls_detail_rfs as $cls_detail_rf)
                                                    <option value="{{ $cls_detail_rf->CLS_DETAIL_CD }}"
                                                        @if(isset($search_fraction_data))
                                                        {{ $search_fraction_data->WTTM_FRC_CLS_CD == (old('WTTM_FRC_CLS_CD',$cls_detail_rf->CLS_DETAIL_CD)) ? 'selected' : '' }}
                                                        @endif>
                                                        {{ $cls_detail_rf->CLS_DETAIL_NAME }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                <td>
                                                    <span class="text-danger" id="wttmExtraTime"></span>
                                                </td>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>遅刻時間</th>
                                            <td>
                                                <select name="LTHR_UNDER_MI" tabindex="6" class="thr"
                                                    id="LTHR_UNDER_MI" style="width: 50px;"
                                                    @if(!isset($workptn_cd)) disabled="disabled" @endif>
                                                    <option value=""></option>
                                                    @foreach ($cls_detail_mins as $cls_detail_min)
                                                    <option value="{{ $cls_detail_min->CLS_DETAIL_CD }}"
                                                        @if(isset($search_fraction_data))
                                                        {{ $search_fraction_data->LTHR_UNDER_MI == (old('LTHR_UNDER_MI',$cls_detail_min->CLS_DETAIL_CD)) ? 'selected' : '' }}
                                                        @endif>
                                                        {{ $cls_detail_min->CLS_DETAIL_NAME }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                <span id="titleLthrUnderMiUnit">分未満</span>
                                            </td>
                                            <td>
                                                <select name="LTHR_FRC_CLS_CD" tabindex="7" class="thr"
                                                    id="LTHR_FRC_CLS_CD" style="width: 110px;"
                                                    @if(!isset($workptn_cd)) disabled="disabled" @endif>
                                                    <option value=""></option>
                                                    @foreach ($cls_detail_rfs as $cls_detail_rf)
                                                    <option value="{{ $cls_detail_rf->CLS_DETAIL_CD }}"
                                                        @if(isset($search_fraction_data))
                                                        {{ $search_fraction_data->LTHR_FRC_CLS_CD == (old('LTHR_FRC_CLS_CD',$cls_detail_rf->CLS_DETAIL_CD)) ? 'selected' : '' }}
                                                        @endif>
                                                        {{ $cls_detail_rf->CLS_DETAIL_NAME }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <span class="text-danger" id="lthrOverTime"></span>
                                            </td>
                                            <th>退出時刻</th>
                                            <td>
                                                <select name="LVTM_UNDER_MI" tabindex="14" class="ttm"
                                                    id="LVTM_UNDER_MI" style="width: 50px;"
                                                    @if(!isset($workptn_cd)) disabled="disabled" @endif>
                                                    <option value=""></option>
                                                    @foreach ($cls_detail_mins as $cls_detail_min)
                                                    <option value="{{ $cls_detail_min->CLS_DETAIL_CD }}"
                                                        @if(isset($search_fraction_data))
                                                        {{ $search_fraction_data->LVTM_UNDER_MI == (old('LVTM_UNDER_MI',$cls_detail_min->CLS_DETAIL_CD)) ? 'selected' : '' }}
                                                        @endif>
                                                        {{ $cls_detail_min->CLS_DETAIL_NAME }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                <span id="titleLvtmUnderMiUnit">分未満</span>
                                            </td>
                                            <td>
                                                <select name="LVTM_FRC_CLS_CD" tabindex="15" class="ttm"
                                                    id="LVTM_FRC_CLS_CD" style="width: 110px;"
                                                    @if(!isset($workptn_cd)) disabled="disabled" @endif>
                                                    <option value=""></option>
                                                    @foreach ($cls_detail_rfs as $cls_detail_rf)
                                                    <option value="{{ $cls_detail_rf->CLS_DETAIL_CD }}"
                                                        @if(isset($search_fraction_data))
                                                        {{ $search_fraction_data->LVTM_FRC_CLS_CD == (old('LVTM_FRC_CLS_CD',$cls_detail_rf->CLS_DETAIL_CD)) ? 'selected' : '' }}
                                                        @endif>
                                                        {{ $cls_detail_rf->CLS_DETAIL_NAME }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <span class="text-danger" id="lvtmExtraTime"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>早退時間</th>
                                            <td>
                                                <select name="ERHR_UNDER_MI" tabindex="8" class="thr"
                                                    id="ERHR_UNDER_MI" style="width: 50px;"
                                                    @if(!isset($workptn_cd)) disabled="disabled" @endif>
                                                    <option value=""></option>
                                                    @foreach ($cls_detail_mins as $cls_detail_min)
                                                    <option value="{{ $cls_detail_min->CLS_DETAIL_CD }}"
                                                        @if(isset($search_fraction_data))
                                                        {{ $search_fraction_data->ERHR_UNDER_MI == (old('ERHR_UNDER_MI',$cls_detail_min->CLS_DETAIL_CD)) ? 'selected' : '' }}
                                                        @endif>
                                                        {{ $cls_detail_min->CLS_DETAIL_NAME }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                <span id="titleErhrUnderMiUnit">分未満</span>
                                            </td>
                                            <td>
                                                <select name="ERHR_FRC_CLS_CD" tabindex="9" class="thr"
                                                    id="ERHR_FRC_CLS_CD" style="width: 110px;"
                                                    @if(!isset($workptn_cd)) disabled="disabled" @endif>
                                                    <option value=""></option>
                                                    @foreach ($cls_detail_rfs as $cls_detail_rf)
                                                    <option value="{{ $cls_detail_rf->CLS_DETAIL_CD }}"
                                                        @if(isset($search_fraction_data))
                                                        {{ $search_fraction_data->ERHR_FRC_CLS_CD == (old('ERHR_FRC_CLS_CD',$cls_detail_rf->CLS_DETAIL_CD)) ? 'selected' : '' }}
                                                        @endif>
                                                        {{ $cls_detail_rf->CLS_DETAIL_NAME }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <span class="text-danger" id="erhrOverTime"></span>
                                            </td>
                                            <th>外出時刻</th>
                                            <td>
                                                <select name="OTTM_UNDER_MI" tabindex="16"class="ttm"
                                                    id="OTTM_UNDER_MI" style="width: 50px;"
                                                    @if(!isset($workptn_cd)) disabled="disabled" @endif>
                                                    <option value=""></option>
                                                    @foreach ($cls_detail_mins as $cls_detail_min)
                                                    <option value="{{ $cls_detail_min->CLS_DETAIL_CD }}"
                                                        @if(isset($search_fraction_data))
                                                        {{ $search_fraction_data->OTTM_UNDER_MI == (old('OTTM_UNDER_MI',$cls_detail_min->CLS_DETAIL_CD)) ? 'selected' : '' }}
                                                        @endif>
                                                        {{ $cls_detail_min->CLS_DETAIL_NAME }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                <span id="titleOttmUnderMiUnit">分未満</span>
                                            </td>
                                            <td>
                                                <select name="OTTM_FRC_CLS_CD" tabindex="17" class="ttm"
                                                    id="OTTM_FRC_CLS_CD" style="width: 110px;"
                                                    @if(!isset($workptn_cd)) disabled="disabled" @endif>
                                                    <option value=""></option>
                                                    @foreach ($cls_detail_rfs as $cls_detail_rf)
                                                    <option value="{{ $cls_detail_rf->CLS_DETAIL_CD }}"
                                                        @if(isset($search_fraction_data))
                                                        {{ $search_fraction_data->OTTM_FRC_CLS_CD == (old('OTTM_FRC_CLS_CD',$cls_detail_rf->CLS_DETAIL_CD)) ? 'selected' : '' }}
                                                        @endif>
                                                        {{ $cls_detail_rf->CLS_DETAIL_NAME }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <span class="text-danger" id="ottmExtraTime"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>外出時間</th>
                                            <td>
                                                <select name="OTHR_UNDER_MI" tabindex="10" class="thr"
                                                     id="OTHR_UNDER_MI" style="width: 50px;"
                                                    @if(!isset($workptn_cd)) disabled="disabled" @endif>
                                                    <option value=""></option>
                                                    @foreach ($cls_detail_mins as $cls_detail_min)
                                                    <option value="{{ $cls_detail_min->CLS_DETAIL_CD }}"
                                                        @if(isset($search_fraction_data))
                                                        {{ $search_fraction_data->OTHR_UNDER_MI == (old('OTHR_UNDER_MI',$cls_detail_min->CLS_DETAIL_CD)) ? 'selected' : '' }}
                                                        @endif>
                                                        {{ $cls_detail_min->CLS_DETAIL_NAME }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                <span id="titleOthrUnderMiUnit">分未満</span>
                                            </td>
                                            <td>
                                                <select name="OTHR_FRC_CLS_CD" tabindex="11" class="thr"
                                                    id="OTHR_FRC_CLS_CD" style="width: 110px;"
                                                    @if(!isset($workptn_cd)) disabled="disabled" @endif>
                                                    <option value=""></option>
                                                    @foreach ($cls_detail_rfs as $cls_detail_rf)
                                                    <option value="{{ $cls_detail_rf->CLS_DETAIL_CD }}"
                                                        @if(isset($search_fraction_data))
                                                        {{ $search_fraction_data->OTHR_FRC_CLS_CD == (old('OTHR_FRC_CLS_CD',$cls_detail_rf->CLS_DETAIL_CD)) ? 'selected' : '' }}
                                                        @endif>
                                                        {{ $cls_detail_rf->CLS_DETAIL_NAME }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <span class="text-danger" id="othrOverTime"></span>
                                            </td>
                                            <th>再入時刻</th>
                                            <td>
                                                <select name="RETM_UNDER_MI" tabindex="18" class="ttm"
                                                    id="RETM_UNDER_MI" style="width: 50px;"
                                                    @if(!isset($workptn_cd)) disabled="disabled" @endif>
                                                    <option value=""></option>
                                                    @foreach ($cls_detail_mins as $cls_detail_min)
                                                    <option value="{{ $cls_detail_min->CLS_DETAIL_CD }}"
                                                        @if(isset($search_fraction_data))
                                                        {{ $search_fraction_data->RETM_UNDER_MI == (old('RETM_UNDER_MI',$cls_detail_min->CLS_DETAIL_CD)) ? 'selected' : '' }}
                                                        @endif>
                                                        {{ $cls_detail_min->CLS_DETAIL_NAME }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                <span id="titleRetmUnderMiUnit">分未満</span>
                                            </td>
                                            <td>
                                                <select name="RETM_FRC_CLS_CD" tabindex="19" class="ttm"
                                                    id="RETM_FRC_CLS_CD" style="width: 110px;"
                                                    @if(!isset($workptn_cd)) disabled="disabled" @endif>
                                                    <option value=""></option>
                                                    @foreach ($cls_detail_rfs as $cls_detail_rf)
                                                    <option value="{{ $cls_detail_rf->CLS_DETAIL_CD }}"
                                                        @if(isset($search_fraction_data))
                                                        {{ $search_fraction_data->RETM_FRC_CLS_CD == (old('RETM_FRC_CLS_CD',$cls_detail_rf->CLS_DETAIL_CD)) ? 'selected' : '' }}
                                                        @endif>
                                                        {{ $cls_detail_rf->CLS_DETAIL_NAME }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <span class="text-danger" id="retmExtraTime"></span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <p class="CategoryTitle1">残業時間端数処理</p>
                                <table class="InputFieldStyle1">
                                    <tbody>
                                        <tr class="overTime">
                                            <th>残業項目１</th>
                                            <td>
                                                <select name="OVTM1_CD" tabindex="20" class="ovtCD"
                                                    id="OVTM1_CD" style="width: 180px;"
                                                    @if(!isset($workptn_cd)) disabled="disabled" @endif>
                                                    <option value=""></option>
                                                    @foreach ($ovt_datas as $ovt_cd)
                                                    <option value="{{ $ovt_cd->WORK_DESC_CD }}"
                                                        @if(isset($search_fraction_data))
                                                        {{ $search_fraction_data->OVTM1_CD == (old('OVTM1_CD',$ovt_cd->WORK_DESC_CD)) ? 'selected' : '' }}
                                                        @endif>
                                                        {{ $ovt_cd->WORK_DESC_NAME }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select name="OVTM1_UNDER_MI" tabindex="21" class="ovtUnderMi"
                                                    class="OutlineLabel" id="OVTM1_UNDER_MI"
                                                    style="width: 50px;"
                                                    @if(!isset($workptn_cd)) disabled="disabled" @endif>
                                                    <option value=""></option>
                                                    @foreach ($cls_detail_mins as $cls_detail_min)
                                                    <option value="{{ $cls_detail_min->CLS_DETAIL_CD }}"
                                                        @if(isset($search_fraction_data))
                                                        {{ $search_fraction_data->OVTM1_UNDER_MI == (old('OVTM1_UNDER_MI',$cls_detail_min->CLS_DETAIL_CD)) ? 'selected' : '' }}
                                                        @endif>
                                                        {{ $cls_detail_min->CLS_DETAIL_NAME }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                <span id="titleOvtm1UnderMiUnit">分未満</span>
                                            </td>
                                            <td>
                                                <select name="OVTM1_FRC_CLS_CD" tabindex="22" class="ovtFrcClsCd"
                                                    id="OVTM1_FRC_CLS_CD" style="width: 110px;"
                                                    @if(!isset($workptn_cd)) disabled="disabled" @endif>
                                                    <option value=""></option>
                                                    @foreach ($cls_detail_rfs as $cls_detail_rf)
                                                    <option value="{{ $cls_detail_rf->CLS_DETAIL_CD }}"
                                                        @if(isset($search_fraction_data))
                                                        {{ $search_fraction_data->OVTM1_FRC_CLS_CD == (old('OVTM1_FRC_CLS_CD',$cls_detail_rf->CLS_DETAIL_CD)) ? 'selected' : '' }}
                                                        @endif>
                                                        {{ $cls_detail_rf->CLS_DETAIL_NAME }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <span class="text-danger" id="overTime0"></span>
                                            </td>
                                        </tr>
                                        <tr class="overTime">
                                            <th>残業項目２</th>
                                            <td>
                                                <select name="OVTM2_CD" tabindex="23" class="ovtCD"
                                                    id="OVTM2_CD" style="width: 180px;"
                                                    @if(!isset($workptn_cd)) disabled="disabled" @endif>
                                                    <option value=""></option>
                                                    @foreach ($ovt_datas as $ovt_cd)
                                                    <option value="{{ $ovt_cd->WORK_DESC_CD }}"
                                                        @if(isset($search_fraction_data))
                                                        {{ $search_fraction_data->OVTM2_CD == (old('OVTM2_CD',$ovt_cd->WORK_DESC_CD)) ? 'selected' : '' }}
                                                        @endif>
                                                        {{ $ovt_cd->WORK_DESC_NAME }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select name="OVTM2_UNDER_MI" tabindex="24" class="ovtUnderMi"
                                                    class="OutlineLabel" id="OVTM2_UNDER_MI"
                                                    style="width: 50px;"
                                                    @if(!isset($workptn_cd)) disabled="disabled" @endif>
                                                    <option value=""></option>
                                                    @foreach ($cls_detail_mins as $cls_detail_min)
                                                    <option value="{{ $cls_detail_min->CLS_DETAIL_CD }}"
                                                        @if(isset($search_fraction_data))
                                                        {{ $search_fraction_data->OVTM2_UNDER_MI == (old('OVTM2_UNDER_MI',$cls_detail_min->CLS_DETAIL_CD)) ? 'selected' : '' }}
                                                        @endif>
                                                        {{ $cls_detail_min->CLS_DETAIL_NAME }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                <span id="titleOvtm2UnderMiUnit">分未満</span>
                                            </td>
                                            <td>
                                                <select name="OVTM2_FRC_CLS_CD" tabindex="25" class="ovtFrcClsCd"
                                                    id="OVTM2_FRC_CLS_CD" style="width: 110px;"
                                                    @if(!isset($workptn_cd)) disabled="disabled" @endif>
                                                    <option value=""></option>
                                                    @foreach ($cls_detail_rfs as $cls_detail_rf)
                                                    <option value="{{ $cls_detail_rf->CLS_DETAIL_CD }}"
                                                        @if(isset($search_fraction_data))
                                                        {{ $search_fraction_data->OVTM2_FRC_CLS_CD == (old('OVTM2_FRC_CLS_CD',$cls_detail_rf->CLS_DETAIL_CD)) ? 'selected' : '' }}
                                                        @endif>
                                                        {{ $cls_detail_rf->CLS_DETAIL_NAME }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <span class="text-danger" id="overTime1"></span>
                                            </td>
                                        </tr>
                                        <tr class="overTime">
                                            <th>残業項目３</th>
                                            <td>
                                                <select name="OVTM3_CD" tabindex="26" class="ovtCD"
                                                    id="OVTM3_CD" style="width: 180px;"
                                                    @if(!isset($workptn_cd)) disabled="disabled" @endif>
                                                    <option value=""></option>
                                                    @foreach ($ovt_datas as $ovt_cd)
                                                    <option value="{{ $ovt_cd->WORK_DESC_CD }}"
                                                        @if(isset($search_fraction_data))
                                                        {{ $search_fraction_data->OVTM3_CD == (old('OVTM3_CD',$ovt_cd->WORK_DESC_CD)) ? 'selected' : '' }}
                                                        @endif>
                                                        {{ $ovt_cd->WORK_DESC_NAME }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select name="OVTM3_UNDER_MI" tabindex="27" class="ovtUnderMi"
                                                    class="OutlineLabel" id="OVTM3_UNDER_MI"
                                                    style="width: 50px;"
                                                    @if(!isset($workptn_cd)) disabled="disabled" @endif>
                                                    <option value=""></option>
                                                    @foreach ($cls_detail_mins as $cls_detail_min)
                                                    <option value="{{ $cls_detail_min->CLS_DETAIL_CD }}"
                                                        @if(isset($search_fraction_data))
                                                        {{ $search_fraction_data->OVTM3_UNDER_MI == (old('OVTM3_UNDER_MI',$cls_detail_min->CLS_DETAIL_CD)) ? 'selected' : '' }}
                                                        @endif>
                                                        {{ $cls_detail_min->CLS_DETAIL_NAME }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                <span id="titleOvtm3UnderMiUnit">分未満</span>
                                            </td>
                                            <td>
                                                <select name="OVTM3_FRC_CLS_CD" tabindex="28" class="ovtFrcClsCd"
                                                    id="OVTM3_FRC_CLS_CD" style="width: 110px;"
                                                    @if(!isset($workptn_cd)) disabled="disabled" @endif>
                                                    <option value=""></option>
                                                    @foreach ($cls_detail_rfs as $cls_detail_rf)
                                                    <option value="{{ $cls_detail_rf->CLS_DETAIL_CD }}"
                                                        @if(isset($search_fraction_data))
                                                        {{ $search_fraction_data->OVTM3_FRC_CLS_CD == (old('OVTM3_FRC_CLS_CD',$cls_detail_rf->CLS_DETAIL_CD)) ? 'selected' : '' }}
                                                        @endif>
                                                        {{ $cls_detail_rf->CLS_DETAIL_NAME }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <span class="text-danger" id="overTime2"></span>
                                            </td>
                                        </tr>
                                        <tr class="overTime">
                                            <th>残業項目４</th>
                                            <td>
                                                <select name="OVTM4_CD" tabindex="29" class="ovtCD"
                                                    id="OVTM4_CD" style="width: 180px;"
                                                    @if(!isset($workptn_cd)) disabled="disabled" @endif>
                                                    <option value=""></option>
                                                    @foreach ($ovt_datas as $ovt_cd)
                                                    <option value="{{ $ovt_cd->WORK_DESC_CD }}"
                                                        @if(isset($search_fraction_data))
                                                        {{ $search_fraction_data->OVTM4_CD == (old('OVTM4_CD',$ovt_cd->WORK_DESC_CD)) ? 'selected' : '' }}
                                                        @endif>
                                                        {{ $ovt_cd->WORK_DESC_NAME }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select name="OVTM4_UNDER_MI" tabindex="30" class="ovtUnderMi"
                                                    id="OVTM4_UNDER_MI" style="width: 50px;"
                                                    @if(!isset($workptn_cd)) disabled="disabled" @endif>
                                                    <option value=""></option>
                                                    @foreach ($cls_detail_mins as $cls_detail_min)
                                                    <option value="{{ $cls_detail_min->CLS_DETAIL_CD }}"
                                                        @if(isset($search_fraction_data))
                                                        {{ $search_fraction_data->OVTM4_UNDER_MI == (old('OVTM4_UNDER_MI',$cls_detail_min->CLS_DETAIL_CD)) ? 'selected' : '' }}
                                                        @endif>
                                                        {{ $cls_detail_min->CLS_DETAIL_NAME }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                <span id="titleOvtm4UnderMiUnit">分未満</span>
                                            </td>
                                            <td>
                                                <select name="OVTM4_FRC_CLS_CD" tabindex="31" class="ovtFrcClsCd"
                                                    id="OVTM4_FRC_CLS_CD" style="width: 110px;"
                                                    @if(!isset($workptn_cd)) disabled="disabled" @endif>
                                                    <option value=""></option>
                                                    @foreach ($cls_detail_rfs as $cls_detail_rf)
                                                    <option value="{{ $cls_detail_rf->CLS_DETAIL_CD }}"
                                                        @if(isset($search_fraction_data))
                                                        {{ $search_fraction_data->OVTM4_FRC_CLS_CD == (old('OVTM4_FRC_CLS_CD',$cls_detail_rf->CLS_DETAIL_CD)) ? 'selected' : '' }}
                                                        @endif>
                                                        {{ $cls_detail_rf->CLS_DETAIL_NAME }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <span class="text-danger" id="overTime3"></span>
                                            </td>
                                        </tr>
                                        <tr class="overTime">
                                            <th>残業項目５</th>
                                            <td>
                                                <select name="OVTM5_CD" tabindex="32" class="ovtCD"
                                                    id="OVTM5_CD" style="width: 180px;"
                                                    @if(!isset($workptn_cd)) disabled="disabled" @endif>
                                                    <option value=""></option>
                                                    @foreach ($ovt_datas as $ovt_cd)
                                                    <option value="{{ $ovt_cd->WORK_DESC_CD }}"
                                                        @if(isset($search_fraction_data))
                                                        {{ $search_fraction_data->OVTM5_CD == (old('OVTM5_CD',$ovt_cd->WORK_DESC_CD)) ? 'selected' : '' }}
                                                        @endif>
                                                        {{ $ovt_cd->WORK_DESC_NAME }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select name="OVTM5_UNDER_MI" tabindex="33" class="ovtUnderMi"
                                                    id="OVTM5_UNDER_MI" style="width: 50px;"
                                                    @if(!isset($workptn_cd)) disabled="disabled" @endif>
                                                    <option value=""></option>
                                                    @foreach ($cls_detail_mins as $cls_detail_min)
                                                    <option value="{{ $cls_detail_min->CLS_DETAIL_CD }}"
                                                        @if(isset($search_fraction_data))
                                                        {{ $search_fraction_data->OVTM5_UNDER_MI == (old('OVTM5_UNDER_MI',$cls_detail_min->CLS_DETAIL_CD)) ? 'selected' : '' }}
                                                        @endif>
                                                        {{ $cls_detail_min->CLS_DETAIL_NAME }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                <span id="titleOvtm5UnderMiUnit">分未満</span>
                                            </td>
                                            <td>
                                                <select name="OVTM5_FRC_CLS_CD" tabindex="34" class="ovtFrcClsCd"
                                                    id="OVTM5_FRC_CLS_CD" style="width: 110px;"
                                                    @if(!isset($workptn_cd)) disabled="disabled" @endif>
                                                    <option value=""></option>
                                                    @foreach ($cls_detail_rfs as $cls_detail_rf)
                                                    <option value="{{ $cls_detail_rf->CLS_DETAIL_CD }}"
                                                        @if(isset($search_fraction_data))
                                                        {{ $search_fraction_data->OVTM5_FRC_CLS_CD == (old('OVTM5_FRC_CLS_CD',$cls_detail_rf->CLS_DETAIL_CD)) ? 'selected' : '' }}
                                                        @endif>
                                                        {{ $cls_detail_rf->CLS_DETAIL_NAME }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <span class="text-danger" id="overTime4"></span>
                                            </td>
                                        </tr>
                                        <tr class="overTime">
                                            <th>残業項目６</th>
                                            <td>
                                                <select name="OVTM6_CD" tabindex="35" class="ovtCD"
                                                    id="OVTM6_CD" style="width: 180px;"
                                                    @if(!isset($workptn_cd)) disabled="disabled" @endif>
                                                    <option value=""></option>
                                                    @foreach ($ovt_datas as $ovt_cd)
                                                    <option value="{{ $ovt_cd->WORK_DESC_CD }}"
                                                        @if(isset($search_fraction_data))
                                                        {{ $search_fraction_data->OVTM6_CD == (old('OVTM6_CD',$ovt_cd->WORK_DESC_CD)) ? 'selected' : '' }}
                                                        @endif>
                                                        {{ $ovt_cd->WORK_DESC_NAME }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select name="OVTM6_UNDER_MI" tabindex="36" class="ovtUnderMi"
                                                    id="OVTM6_UNDER_MI" style="width: 50px;"
                                                    @if(!isset($workptn_cd)) disabled="disabled" @endif>
                                                    <option value=""></option>
                                                    @foreach ($cls_detail_mins as $cls_detail_min)
                                                    <option value="{{ $cls_detail_min->CLS_DETAIL_CD }}"
                                                        @if(isset($search_fraction_data))
                                                        {{ $search_fraction_data->OVTM6_UNDER_MI == (old('OVTM6_UNDER_MI',$cls_detail_min->CLS_DETAIL_CD)) ? 'selected' : '' }}
                                                        @endif>
                                                        {{ $cls_detail_min->CLS_DETAIL_NAME }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                <span id="titleOvtm6UnderMiUnit">分未満</span>
                                            </td>
                                            <td>
                                                <select name="OVTM6_FRC_CLS_CD" tabindex="37" class="ovtFrcClsCd"
                                                    id="OVTM6_FRC_CLS_CD" style="width: 110px;"
                                                    @if(!isset($workptn_cd)) disabled="disabled" @endif>
                                                    <option value=""></option>
                                                    @foreach ($cls_detail_rfs as $cls_detail_rf)
                                                    <option value="{{ $cls_detail_rf->CLS_DETAIL_CD }}"
                                                        @if(isset($search_fraction_data))
                                                        {{ $search_fraction_data->OVTM6_FRC_CLS_CD == (old('OVTM6_FRC_CLS_CD',$cls_detail_rf->CLS_DETAIL_CD)) ? 'selected' : '' }}
                                                        @endif>
                                                        {{ $cls_detail_rf->CLS_DETAIL_NAME }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <span class="text-danger" id="overTime5"></span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <p class="CategoryTitle1">割増時間端数処理</p>
                                <table class="InputFieldStyle1">
                                    <tbody>
                                        <tr class="extraTime">
                                            <th>割増対象１</th>
                                            <td>
                                                <select name="EXT1_CD" tabindex="38" class="extCD"
                                                    id="EXT1_CD" style="width: 180px;"
                                                    @if(!isset($workptn_cd)) disabled="disabled" @endif>
                                                    <option value=""></option>
                                                    @foreach ($ext_datas as $ext_data)
                                                    <option value="{{ $ext_data->WORK_DESC_CD }}"
                                                        @if(isset($search_fraction_data))
                                                        {{ $search_fraction_data->EXT1_CD == (old('EXT1_CD',$ext_data->WORK_DESC_CD)) ? 'selected' : '' }}
                                                        @endif>
                                                        {{ $ext_data->WORK_DESC_NAME }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select name="EXT1_UNDER_MI" tabindex="39" class="extUnderMi"
                                                    id="EXT1_UNDER_MI" style="width: 50px;"
                                                    @if(!isset($workptn_cd)) disabled="disabled" @endif>
                                                    <option value=""></option>
                                                    @foreach ($cls_detail_mins as $cls_detail_min)
                                                    <option value="{{ $cls_detail_min->CLS_DETAIL_CD }}"
                                                        @if(isset($search_fraction_data))
                                                        {{ $search_fraction_data->EXT1_UNDER_MI == (old('EXT1_UNDER_MI',$cls_detail_min->CLS_DETAIL_CD)) ? 'selected' : '' }}
                                                        @endif>
                                                        {{ $cls_detail_min->CLS_DETAIL_NAME }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                <span id="titleExt1Mi">分未満</span>
                                            </td>
                                            <td>
                                                <select name="EXT1_FRC_CLS_CD" tabindex="40" class="extFrcClsCd"
                                                    id="EXT1_FRC_CLS_CD" style="width: 110px;"
                                                    @if(!isset($workptn_cd)) disabled="disabled" @endif>
                                                    <option value=""></option>
                                                    @foreach ($cls_detail_rfs as $cls_detail_rf)
                                                    <option value="{{ $cls_detail_rf->CLS_DETAIL_CD }}"
                                                        @if(isset($search_fraction_data))
                                                        {{ $search_fraction_data->EXT1_FRC_CLS_CD == (old('EXT1_FRC_CLS_CD',$cls_detail_rf->CLS_DETAIL_CD)) ? 'selected' : '' }}
                                                        @endif>
                                                        {{ $cls_detail_rf->CLS_DETAIL_NAME }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <span class="text-danger" id="extraTime0"></span>
                                            </td>
                                        </tr>
                                        <tr class="extraTime">
                                            <th>割増対象２</th>
                                            <td>
                                                <select name="EXT2_CD" tabindex="41" class="extCD"
                                                    id="EXT2_CD" style="width: 180px;"
                                                    @if(!isset($workptn_cd)) disabled="disabled" @endif>
                                                    <option value=""></option>
                                                    @foreach ($ext_datas as $ext_data)
                                                    <option value="{{ $ext_data->WORK_DESC_CD }}"
                                                        @if(isset($search_fraction_data))
                                                        {{ $search_fraction_data->EXT2_CD == (old('EXT2_CD',$ext_data->WORK_DESC_CD)) ? 'selected' : '' }}
                                                        @endif>
                                                        {{ $ext_data->WORK_DESC_NAME }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select name="EXT2_UNDER_MI" tabindex="42" class="extUnderMi"
                                                    id="EXT2_UNDER_MI" style="width: 50px;"
                                                    @if(!isset($workptn_cd)) disabled="disabled" @endif>
                                                    <option value=""></option>
                                                    @foreach ($cls_detail_mins as $cls_detail_min)
                                                    <option value="{{ $cls_detail_min->CLS_DETAIL_CD }}"
                                                        @if(isset($search_fraction_data))
                                                        {{ $search_fraction_data->EXT2_UNDER_MI == (old('EXT2_UNDER_MI',$cls_detail_min->CLS_DETAIL_CD)) ? 'selected' : '' }}
                                                        @endif>
                                                        {{ $cls_detail_min->CLS_DETAIL_NAME }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                <span id="titleExt2Mi">分未満</span>
                                            </td>
                                            <td>
                                                <select name="EXT2_FRC_CLS_CD" tabindex="43" class="extFrcClsCd"
                                                    id="EXT2_FRC_CLS_CD" style="width: 110px;"
                                                    @if(!isset($workptn_cd)) disabled="disabled" @endif>
                                                    <option value=""></option>
                                                    @foreach ($cls_detail_rfs as $cls_detail_rf)
                                                    <option value="{{ $cls_detail_rf->CLS_DETAIL_CD }}"
                                                        @if(isset($search_fraction_data))
                                                        {{ $search_fraction_data->EXT2_FRC_CLS_CD == (old('EXT2_FRC_CLS_CD',$cls_detail_rf->CLS_DETAIL_CD)) ? 'selected' : '' }}
                                                        @endif>
                                                        {{ $cls_detail_rf->CLS_DETAIL_NAME }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <span class="text-danger" id="extraTime1"></span>
                                            </td>
                                        </tr>
                                        <tr class="extraTime">
                                            <th>割増対象３</th>
                                            <td>
                                                <select name="EXT3_CD" tabindex="44" class="extCD"
                                                    id="EXT3_CD" style="width: 180px;"
                                                    @if(!isset($workptn_cd)) disabled="disabled" @endif>
                                                    <option value=""></option>
                                                    @foreach ($ext_datas as $ext_data)
                                                    <option value="{{ $ext_data->WORK_DESC_CD }}"
                                                        @if(isset($search_fraction_data))
                                                        {{ $search_fraction_data->EXT3_CD == (old('EXT3_CD',$ext_data->WORK_DESC_CD)) ? 'selected' : '' }}
                                                        @endif>
                                                        {{ $ext_data->WORK_DESC_NAME }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select name="EXT3_UNDER_MI" tabindex="45" class="extUnderMi"
                                                    id="EXT3_UNDER_MI" style="width: 50px;"
                                                    @if(!isset($workptn_cd)) disabled="disabled" @endif>
                                                    <option value=""></option>
                                                    @foreach ($cls_detail_mins as $cls_detail_min)
                                                    <option value="{{ $cls_detail_min->CLS_DETAIL_CD }}"
                                                        @if(isset($search_fraction_data))
                                                        {{ $search_fraction_data->EXT3_UNDER_MI == (old('EXT3_UNDER_MI',$cls_detail_min->CLS_DETAIL_CD)) ? 'selected' : '' }}
                                                        @endif>
                                                        {{ $cls_detail_min->CLS_DETAIL_NAME }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                <span id="titleExt3Mi">分未満</span>
                                            </td>
                                            <td>
                                                <select name="EXT3_FRC_CLS_CD" tabindex="46" class="extFrcClsCd"
                                                    id="EXT3_FRC_CLS_CD" style="width: 110px;"
                                                    @if(!isset($workptn_cd)) disabled="disabled" @endif>
                                                    <option value=""></option>
                                                    @foreach ($cls_detail_rfs as $cls_detail_rf)
                                                    <option value="{{ $cls_detail_rf->CLS_DETAIL_CD }}"
                                                        @if(isset($search_fraction_data))
                                                        {{ $search_fraction_data->EXT3_FRC_CLS_CD == (old('EXT3_FRC_CLS_CD',$cls_detail_rf->CLS_DETAIL_CD)) ? 'selected' : '' }}
                                                        @endif>
                                                        {{ $cls_detail_rf->CLS_DETAIL_NAME }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <span class="text-danger" id="extraTime2"></span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            <div class="line"></div>
                            <p class="ButtonField1">
                                <input type="button" value="更新" name="btnUpdate" tabindex="47" id="btnUpdate"
                                    class="ButtonStyle1 update"
                                    data-url="{{ url('master/MT07FractionUpdate') }}"
                                    @if(!isset($workptn_cd)) disabled="disabled" @endif>
                                <input type="button" name="btnCancel" tabindex="48" id="btnCancel"
                                    class="ButtonStyle1" value="キャンセル"
                                    onclick="location.href='{{ url('master/MT07FractionEditor') }}'">
                                <input type="button" value="削除" name="btnDelete" tabindex="49" id="btnDelete"
                                    class="ButtonStyle1 delete"
                                    data-url="{{ url('master/MT07FractionDelete') }}"
                                    @if(!isset($workptn_cd)) disabled="disabled" @endif>
                            </p>
                        </div>
                    </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
@section('script')
<script>
    $(function() {
        // ENTER時に送信されないようにする
        $('input').not('[type="button"]').keypress(function(e) {
            if (e.which == 13) {
                return false;
            }
        });

        // 明細表示
        $(document).on('click', '.view', function() {
            var url = $(this).data('url');
            $('#form').attr('action', url);
            $('#form').submit();
        });

        // 初期表示で「時間」が選択されたら、右側「出勤時刻、退出時刻、外出時刻、再入時刻」をdisabledにする
        var rbFractionClsHr = $('#rbFractionClsHr').prop('checked');
        if (rbFractionClsHr) {
            $('#WTHR_UNDER_MI').focus();
            $('.ttm').prop('disabled', true);
        } else {
            $('#WTTM_UNDER_MI').focus();
            $('.thr').prop('disabled', true);
        }

        var errors = $("#form").find('span.text-danger');
        $('#rbFractionClsHr').on('click', function() {
            // エラー文言削除
            if (errors.length) {
                errors.text("");
            }
            // 右側「出勤時刻、退出時刻、外出時刻、再入時刻」をdisabledにする
            $('.ttm').prop('disabled', true);
            $('.thr').prop('disabled', false);
            $('#WTHR_UNDER_MI').focus();
        });
        $('#rbFractionClsTm').on('click', function() {
            // エラー文言削除
            if (errors.length) {
                errors.text("");
            }
            // 左側「出勤時刻、遅刻時間、早退時間、外出時間をdisabledにする
            $('.ttm').prop('disabled', false);
            $('.thr').prop('disabled', true);
            $('#WTTM_UNDER_MI').focus();
        });

    // 更新
    var disableFlg = false;
    $(document).on('click', '.update', function() {
        if (disableFlg || !window.confirm("{{ getArrValue($error_messages, 1005) }}")) {
            return false;
        }
        disableFlg = true;
        // エラー文言削除
        var errors = $("#form").find('span.text-danger');
        if (errors.length) {
            errors.text("");
        }
        // 残業時間端数処理
        var overTime = [];
        $('.overTime').each(function(i,element) {
            overTime[i] = {
                'ovtCD': $(element).find('.ovtCD').val(),
                'ovtUnderMi': $(element).find('.ovtUnderMi').val(),
                'ovtFrcClsCd': $(element).find('.ovtFrcClsCd').val(),
            };
        })
        // 割増時間端数処理
        var extraTime = [];
        $('.extraTime').each(function(i,element) {
            extraTime[i] = {
                'extCD': $(element).find('.extCD').val(),
                'extUnderMi': $(element).find('.extUnderMi').val(),
                'extFrcClsCd': $(element).find('.extFrcClsCd').val(),
            };
        })
        // 出退勤端数処理 「時間」'00' / 「時刻」'01'
        var fractionClsCd = document.querySelector('input[name="FRACTION_CLS_CD"]:checked').value;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var dataObj;
        // 時間
        if ($('#rbFractionClsHr').prop('checked')) {
            dataObj = {
                'workPtnCd':$('#WORKPTN_CD').val(),
                'fractionClsCd':fractionClsCd,
                'wthrOverTime':[$("#WTHR_UNDER_MI").val(),$("#WTHR_FRC_CLS_CD").val()],
                'lthrOverTime':[$("#LTHR_UNDER_MI").val(),$("#LTHR_FRC_CLS_CD").val()],
                'erhrOverTime':[$("#ERHR_UNDER_MI").val(),$("#ERHR_FRC_CLS_CD").val()],
                'othrOverTime':[$("#OTHR_UNDER_MI").val(),$("#OTHR_FRC_CLS_CD").val()],
                'overTime':overTime,
                'extraTime':extraTime,
            };
        }
        // 時刻
        if ($('#rbFractionClsTm').prop('checked')) {
            dataObj = {
                'workPtnCd':$('#WORKPTN_CD').val(),
                'fractionClsCd':fractionClsCd,
                'wttmExtraTime':[$("#WTTM_UNDER_MI").val(),$("#WTTM_FRC_CLS_CD").val()],
                'lvtmExtraTime':[$("#LVTM_UNDER_MI").val(),$("#LVTM_FRC_CLS_CD").val()],
                'ottmExtraTime':[$("#OTTM_UNDER_MI").val(),$("#OTTM_FRC_CLS_CD").val()],
                'retmExtraTime':[$("#RETM_UNDER_MI").val(),$("#RETM_FRC_CLS_CD").val()],
                'overTime':overTime,
                'extraTime':extraTime,
            };
        }
        $.ajax({
            url:$(this).data('url'),
            type:'POST',
            data:dataObj,
        })
        .done((data, textStatus, jqXHR) => {
            location.href='{{ url('master/MT07FractionEditor') }}';
        })
        .fail ((jqXHR, textStatus, errorThrown) => {
            $.each(jqXHR.responseJSON.errors, function(i, value) {
                $('#' + i.replaceAll('.', '')).text(value[0]);
            });
            disableFlg = false;
            $('#btnUpdate').focus();
        });
        return false;
    });

    // 削除処理
    $(document).on('click', '.delete', function() {
        if (disableFlg || !window.confirm("{{ getArrValue($error_messages, '1004') }}")) {
            return false;
        }
        var url = $(this).data('url');
        $('#form').attr('action', url);
        $('#form').submit();
    });
});
</script>
@endsection
