<!-- シフトパターン選択 -->
@extends('common.home')
@section('title', 'シフトパターン選択')
@section('content_search')
    <br>
    <div id="search-container">
        <div id="contents-stage">
            <p class="ButtonField1">
                <input type="button" name="btnOK" value="ＯＫ" id="btnOK" disabled="disabled" tabindex="1" />
                <input type="button" name="btnCancel" value="ｷｬﾝｾﾙ" id="btnCancel" tabindex="2" />
                <input type="button" name="btnBack" id="btnBack" tabindex="3"
                    style="width: 80px; margin-bottom:4px"
                    onclick="window.close();" value="戻る">
            </p>

            {{ csrf_field() }}
            <table class="InputFieldStyle1">
                <tr>
                    <th>パターンコード</th>
                    <td>
                        <select name="shiftPtn" id="shiftPtn" tabindex="4" style="width:280px;" autofocus>
                            <option selected="selected" value=""></option>
                            @foreach($shift_ptns as $shit_ptn)
                            <option value="{{ $shit_ptn->SHIFTPTN_CD }}">{{ $shit_ptn->SHIFTPTN_NAME }}</option>
                            @endforeach
                        </select>
                        <span id="cvShiftPtn" style="color:Red;display:none;">ErrorMessage</span>
                    </td>
                </tr>
            </table>

            <div class="GridViewStyle1 mg10">
                <div id="pnlShiftPtn" class="GridViewPanelStyle4">
                    <div>
                        <table tabIndex="5" id="shiftPtnTable" class="GridViewPadding GridViewBorder"
                            style="display:none; BORDER-COLLAPSE: collapse;" cellSpacing=0 rules=all border=1>
                            <tbody>
                                <tr>
                                    <th scope=col>日</th>
                                    <th scope=col>勤務体系 </th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <table class="InputFieldStyle1">
                <tr>
                    <th>起点日</th>
                    <td>
                        <select name="startCaldDate" id="startCaldDate" disabled="disabled" tabindex="5"
                            class="coloredSelect" style="width:90px;">
                            <option selected="selected" value="" style="color:black"></option>
                            @foreach($cald_days as $i => $cald_day)
                            <option value="{{ $i }}"
                                {{ $cald_day->format('w') == '0'
                                || $cald_day->format('w') == '6'
                                || $holidays->contains($cald_day->format('md')) ? 'class=text-danger' : 'style=color:black;'}}
                                style="width: 80px; display: inline-block;">
                                {{ $cald_day->format('n/d') }} ({{ config('consts.weeks')[$cald_day->format('w')] }})
                            </option>
                            @endforeach
                        </select>
                        <span class="text-danger error" id="startCaldDateError"></span>
                    </td>
                </tr>
                <tr>
                    <th>適用開始日</th>
                    <td>
                        シフトパターンの
                        &nbsp;
                        <input name="startNo" type="text" maxlength="2" id="startNo" disabled="disabled"
                            tabindex="6" class="right" onfocus="this.select();"
                            oninput="value=onlyNumbers(value)"
                            style="width:30px;" />
                        &nbsp;
                        日目の勤務体系から順に反映
                        <br />
                        <span class="text-danger error" id="startNoError"></span>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <input type="hidden" id="2002error" value="{{ getArrValue($error_messages, '2002') }}">
    <input type="hidden" id="2006error" value="{{ getArrValue($error_messages, '2006') }}">
@endsection
@section('script')
<script>
$(function() {
    // シフトパターンで勤務パターンを検索
    var workptns;
    var createRecord = record => {
        $("#shiftPtnTable").append(`
            <tr class="record">
                <td style="width: 70px">
                    <span class="dayNo" id="${record.DAY_NO}">
                        ${record.DAY_NO}日目
                    </span>
                </td>
                <td>
                    <span class="workptn ${record.WORK_CLS_CD === '00' ? 'text-danger' : ''}">
                        ${record.WORKPTN_NAME}
                    </span>
                    <input type="hidden" id="workptncd${record.DAY_NO}" value="${record.WORKPTN_CD}">
                </td>
            </tr>
        `);
    }
    $('#shiftPtn').change(function() {
        $(".record").remove();
        $("#shiftPtnTable").hide();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:'/shift/ShiftPtnSearch',
            type:'POST',
            data:{
                'shiftPtn':$('#shiftPtn').val(),
            }
        })
        .done((data, textStatus, jqXHR) => {
            // 正常
            if (data.search_result) {
                $("#shiftPtnTable").show();
                data.search_result.forEach(record => createRecord(record));
                workptns = data.search_result;
                $('#btnOK, #startCaldDate, #startNo').attr('disabled', false);
                $('#shiftPtn').attr('disabled', true);
                $('#startCaldDate').focus();
            }
        })
        .fail ((jqXHR, textStatus, errorThrown) => {
            // エラー
            $.each(jqXHR.responseJSON.errors, function(i, value) {
                $('#' + i.replaceAll('.', '')).text(value[0]);
            });
            disableFlg = false;
            $('#btnUpdate').focus();
        });

        return false;
    })

    // 選択された値を渡す
    $('#btnOK').on('click', function() {
        $('error').text('');
        if (!window.opener || window.opener.closed) {
            alert("呼び出し元が既に閉じられています。");
            return false;
        }
        var startCaldDate = $("#startCaldDate").val();
        var startNo = $("#startNo").val();
        var startNoError = $("#startNoError").val();
        var error2002 = $("#2002error").val();
        var error2006 = $("#2006error").val();

        var errorFlg = false;
        if (!startCaldDate) {
            $("#startCaldDateError").text(error2002);
            errorFlg = true;
        }
        if (!startNo) {
            $("#startNoError").text(error2002);
            errorFlg = true;
        } else if (isNaN(startNo) || startNo < 1 || startNo > workptns.length) {
            $("#startNoError").text(error2006);
            errorFlg = true;
        }
        if (errorFlg) {
            return false;
        }

        const countDays = $("#startCaldDate option").length - 1;
        const countRecord = workptns.length;
        var recordIndex = startNo;
        var calendarEle = null;
        var endPtnEle = null;
        var endDayNoEle = null
        if (window.opener.$(".clickedTableRecord").length === 1) {
            calendarEle = window.opener.$(".clickedTableRecord")
            endPtnEle = calendarEle.find("#endShiftptnCd")
            endDayNoEle = calendarEle.find("#endDayNo")
        } else {
            calendarEle = window.opener.$("#shiftCalendar");
            endPtnEle = window.opener.$('#endShiftptnCd')
            endDayNoEle = window.opener.$('#endDayNo')
        }
        for (var i = $('#startCaldDate').val(); i < countDays; i++) {
            var currentWorkptnCd = $('#workptncd' + recordIndex).val();
            var targetShiftPtn = calendarEle.find('#txtWorkPtnCd' + i);
            targetShiftPtn.val(currentWorkptnCd);
            targetShiftPtn.change();

            if (i == countDays - 1) {
                endPtnEle.val($('#shiftPtn').val());
                endDayNoEle.val(recordIndex);
            }

            countRecord == recordIndex ? recordIndex = 1 : recordIndex++;
        }
        window.close();
    });

    $('#btnCancel').click(function() {
        $("#shiftPtn, #startCaldDate, #startNo").val('');
        $(".record").remove();
        $("#shiftPtnTable").hide();
        $('#btnOK, #startCaldDate, #startNo').attr('disabled', true);
        $('.error').text('');
        $('#shiftPtn').attr('disabled', false);
        $('#shiftPtn').focus();
    });

    // プルダウンの色設定
    var changeColor = function() {
        $(".coloredSelect").each(function(i,e){
            $(e).css('color', $(e).children("option:selected").css("color"))
        });
    };
    changeColor();
    $(".coloredSelect").on('change', (ele) => {
        $(ele.target).css('color', $(ele.target).children("option:selected").css("color"))
    });

    onlyNumbers = n => n.replace(/[０-９]/g, s => String.fromCharCode(s.charCodeAt(0) - 65248))
                .replace(/\D/g, '');

    $('#startCaldDate, #startNo').change(function(e){
        $(e.target).nextAll('span').text('');
    });
})
</script>
@endsection
