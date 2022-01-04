
@if(!empty($results))
    <tr>
        <th scope="col">
            日付
        </th>
        <th scope="col">
            曜日
        </th>
        <!-- <th scope="col">&nbsp;</th> -->
        <th scope="col">
            勤務体系
        </th>
        <th scope="col">
            事由
        </th>
        <th scope="col">
            出勤
        </th>
        <th scope="col">
            退出
        </th>
        <th scope="col">
            外出1
        </th>
        <th scope="col">
            再入１
        </th>
        <th scope="col">
            外出２
        </th>
        <th scope="col">
            再入２
        </th>
        <th scope="col">
            出勤時間
        </th>
        <th scope="col">
            遅刻時間
        </th>
        <th scope="col">
            早退時間
        </th>
        <th scope="col">
            外出時間
        </th>
        <th scope="col">早出時間</th>
        <th scope="col">普通残業時間</th>
        <th scope="col">深夜残業時間</th>
        <th scope="col">休日残業時間</th>
        <th scope="col">休日深夜残業時間</th>
        <th scope="col"></th>
        <th scope="col">深夜割増</th>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col">
            備考
        </th>
        <!-- <th scope="col">&nbsp;</th> -->
    </tr>
    @foreach($results as $i=>$result)
        <tr>
            <td style="width: 80px;">
                <span id="lblCaldDate" 
                    class="{{ $result->WORKPTN_CD == '002'?'text-danger':''}}" 
                    style="width: 80px; display: inline-block;">{{ date('Y/m/d', strtotime($result->CALD_DATE)) }}
                </span>
                <input type="hidden" name="worktime[{{ $i }}][CALD_DATE]" value="{{ date('Y-m-d', strtotime($result->CALD_DATE)) }}"/>
            </td>
            <td style="width: 30px;">
                <span id="lblDayOfWeek" class="{{ config('consts.weeks') == '土' && '日'?'text-danger':''}}" style="width: 30px; display: inline-block;">{{ config('consts.weeks')[date('w', strtotime($result->CALD_DATE))] }}</span>
            </td>

            <td style="width: 150px;">
                <select 
                    name="worktime[{{ $i }}][WORKPTN_NAME]"
                    style="width: 150px;" 
                >
                    @foreach ( $workptn_names as $workptn_name)
                        <option 
                            value="{{ $workptn_name->WORKPTN_CD }}" 
                            class="{{ $workptn_name->WORK_CLS_CD == '00'?'text-danger':''}}"
                            {{ $workptn_name->WORKPTN_NAME ==  $result->WORKPTN_NAME ? "selected" : "" }}
                        >
                            {{$workptn_name->WORKPTN_NAME }}
                        </option>
                    @endforeach
                </select>
            </td>

            <td style="width: 70px;">
                <select 
                    name="worktime[{{ $i }}][REASON_NAME ]"
                    style="width: 70px;"
                >
                    @foreach ($reason_names as $reason_name)
                        <option 
                            value="{{ $reason_name->REASON_CD }}" 
                            class="{{ $reason_name->REASON_PTN_CD == '01'?'text-danger':''}} {{ $reason_name->REASON_PTN_CD == '02'?'text-primary':''}}" 
                            {{ $reason_name->REASON_NAME ==  $result->REASON_NAME ? "selected" : "" }}
                        >
                            {{ $reason_name->REASON_NAME }}
                        </option>
                    @endforeach
                </select>
            </td>

            <td style="white-space: nowrap;">
                <input 
                    name="worktime[{{ $i }}][OFC_TIME]" 
                    class="imeDisabled" 
                    style="width: 40px;" 
                    type="text" 
                    maxlength="5" 
                    value="{{ $result->OFC_TIME }}"
                >
            </td>
            <td style="white-space: nowrap;">
                <input 
                    name="worktime[{{ $i }}][LEV_TIME]" 
                    class="imeDisabled" 
                    style="width: 40px;" 
                    type="text" 
                    maxlength="5" 
                    value="{{ $result->LEV_TIME }}"
                >
            </td>
            <td style="white-space: nowrap;">
                <input 
                    name="worktime[{{ $i }}][OUT1_TIME]" 
                    class="imeDisabled" 
                    style="width: 40px;" 
                    type="text" 
                    maxlength="5" 
                    value="{{ $result->OUT1_TIME }}"
                >
            </td>
            <td style="white-space: nowrap;">
                <input 
                    name="worktime[{{ $i }}][IN1_TIME]" 
                    class="imeDisabled" 
                    style="width: 40px;" 
                    type="text" 
                    maxlength="5" 
                    value="{{ $result->IN1_TIME }}"
                >
            </td>
            <td style="white-space: nowrap;">
                <input 
                    name="worktime[{{ $i }}][OUT2_TIME]" 
                    class="imeDisabled" 
                    style="width: 40px;" 
                    type="text" 
                    maxlength="5" 
                    value="{{ $result->OUT2_TIME }}"
                >
            </td>
            <td style="white-space: nowrap;">
                <input 
                    name="worktime[{{ $i }}][IN2_TIME]" 
                    class="imeDisabled" 
                    style="width: 40px;" 
                    type="text" 
                    maxlength="5" 
                    value="{{ $result->IN2_TIME }}"
                >
            </td>
            <td style="white-space: nowrap;">
                <input 
                    name="worktime[{{ $i }}][WORK_TIME]" 
                    class="imeDisabled" 
                    style="width: 40px;" 
                    type="text" 
                    maxlength="5" 
                    value="{{ $result->WORK_TIME }}"
                >
            </td>
            <td style="white-space: nowrap;">
                <input 
                    name="worktime[{{ $i }}][TARD_TIME]" 
                    class="imeDisabled" 
                    style="width: 40px;" 
                    type="text" 
                    maxlength="5" 
                    value="{{ $result->TARD_TIME }}"
                >
            </td>
            <td style="white-space: nowrap;">
                <input 
                    name="worktime[{{ $i }}][LEAVE_TIME]" 
                    class="imeDisabled" 
                    style="width: 40px;" 
                    type="text" 
                    maxlength="5" 
                    value="{{ $result->LEAVE_TIME }}"
                >
            </td>
            <td style="white-space: nowrap;">
                <input 
                    name="worktime[{{ $i }}][OUT_TIME]" 
                    class="imeDisabled" 
                    style="width: 40px;" 
                    type="text" 
                    maxlength="5" 
                    value="{{ $result->OUT_TIME }}"
                >
            </td>
            <td style="white-space: nowrap;">
                <input 
                    name="worktime[{{ $i }}][OVTM1_TIME]" 
                    class="imeDisabled" 
                    style="width: 40px;" 
                    type="text" 
                    maxlength="5" 
                    value="{{ $result->OVTM1_TIME }}"
                >
            </td>
            <td style="white-space: nowrap;">
                <input 
                    name="worktime[{{ $i }}][OVTM2_TIME]" 
                    class="imeDisabled" 
                    id="txtOvtm2Time" 
                    style="width: 40px;" 
                    type="text" 
                    maxlength="5" 
                    value="{{ $result->OVTM2_TIME }}"
                >
            </td>
            <td style="white-space: nowrap;">
                <input 
                    name="worktime[{{ $i }}][OVTM3_TIME]" 
                    class="imeDisabled" 
                    style="width: 40px;" 
                    type="text" 
                    maxlength="5" 
                    value="{{ $result->OVTM3_TIME }}"
                >
            </td>
            <td style="white-space: nowrap;">
                <input 
                    name="worktime[{{ $i }}][OVTM4_TIME]" 
                    class="imeDisabled" 
                    style="width: 40px;" 
                    type="text" 
                    maxlength="5" 
                    value="{{ $result->OVTM4_TIME }}"
                >
            </td>
            <td style="white-space: nowrap;">
                <input 
                    name="worktime[{{ $i }}][OVTM5_TIME]" 
                    class="imeDisabled"
                    style="width: 40px;" 
                    type="text" 
                    maxlength="5" 
                    value="{{ $result->OVTM5_TIME }}"
                >
            </td>
            <td style="white-space: nowrap;">
                <input 
                    name="worktime[{{ $i }}][OVTM6_TIME]" 
                    class="imeDisabled" 
                    style="width: 40px;" 
                    type="text" 
                    maxlength="5" 
                    value="{{ $result->OVTM6_TIME }}"
                >
            </td>
            <td style="white-space: nowrap;">
                <input 
                    name="worktime[{{ $i }}][EXT1_TIME]" 
                    class="imeDisabled" 
                    style="width: 40px;" 
                    type="text" 
                    maxlength="5" 
                    value="{{ $result->EXT1_TIME }}"
                >
            </td>
            <td style="white-space: nowrap;">
                <input 
                    name="worktime[{{ $i }}][EXT2_TIME]" 
                    class="imeDisabled"
                    style="width: 40px;"
                    type="text" 
                    maxlength="5" 
                    value="{{ $result->EXT2_TIME }}"
                >
            </td>
            <td style="white-space: nowrap;">
                <input 
                    name="worktime[{{ $i }}][EXT3_TIME]" 
                    class="imeDisabled" 
                    style="width: 40px;" 
                    type="text" 
                    maxlength="5" 
                    value="{{ $result->EXT3_TIME }}"
                >
            </td>
            <td class="GridViewRowLeft" style="white-space: nowrap;">
                <input 
                    name="worktime[{{ $i }}][RSV1_TIME]" 
                    class="imeDisabled" 
                    style="width: 250px;" 
                    type="text" 
                    maxlength="" 
                    value="{{ $result->RSV1_TIME }}"
                >
            </td>
        </tr>
    @endforeach
@endif