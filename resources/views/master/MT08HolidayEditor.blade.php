<!-- 祝祭日・会社休日情報入力 -->
@extends('menu.main')
@section('title', '祝祭日・会社休日情報入力 ')
@section('content')
    <div id="contents-stage">
        <table class="BaseContainerStyle3">
            <tbody>
                <tr>
                    <td>
                        <div id="UpdatePanel1">
                            <form action="" method="post" id="form">
                                @csrf
                                    <div class="GridViewStyle1">
                                        <div class="flow">
                                            <div class="pd5">
                                                <input type="hidden" name="year" id="year" value="{{ $year }}">
                                                <p class="CategoryTitle1">祝祭日</p>

                                                <input name="btnAddNationalHoliday" tabindex="1" class="ButtonStyle1"
                                                    id="btnAddNationalHoliday" onclick="appendRowNationalHolidays()" type="button" value="新規行追加">
                                                <div class="GridViewPanelStyle3 mg10" id="NationalHoliday">

                                                    <div>
                                                        <table tabindex="2" class="GridViewBorder" id="nationalHolidays"
                                                            style="border-collapse: collapse;" border="1" rules="all"
                                                            cellspacing="0">
                                                            <tbody class="gvDept_2">
                                                                <tr id="headerNationalHolidays">
                                                                    <th scope="col">月</th>
                                                                    <th scope="col">日</th>
                                                                    <th scope="col">名称</th>
                                                                    <th scope="col">行削除</th>
                                                                </tr>
                                                                @foreach ($holidays as $i => $holiday)
                                                                <tr class="rowNationalHolidays">
                                                                    <td>
                                                                        <select name="hld_month_holiday[{{ $i }}][HLD_MONTH]" id="hld_month_holiday{{ $i }}hld_month"
                                                                            class="hld_month_holiday" style="width: 45px;"
                                                                            onchange="AddDropDownList('year', 'hld_month_holiday{{ $i }}hld_month', 'hld_day_holiday{{ $i }}hld_day', true)"
                                                                            autofocus tabindex="3">
                                                                            @for($m = 1; $m <= 12; $m++)
                                                                            <option value="{{ $m }}"
                                                                                {{ $m == (old('hld_month_holiday') ?? $holiday->HLD_MONTH) ? 'selected' : '' }}>
                                                                                {{ $m }}
                                                                            </option>
                                                                            @endfor
                                                                        </select>
                                                                        &nbsp;月&nbsp;
                                                                    </td>
                                                                    <td>
                                                                        <select name="hld_day_holiday[{{ $i }}][HLD_DAY]" id="hld_day_holiday{{ $i }}hld_day" class="hld_day_holiday" style="width: 45px;" tabindex="3">
                                                                            @for($d = 1; $d <= 31; $d++)
                                                                            <option value="{{ $d }}"
                                                                            {{ $d == (old('hld_day_holiday') ?? $holiday->HLD_DAY) ? 'selected' : '' }}>
                                                                            {{ $d }}
                                                                            </option>
                                                                            @endfor
                                                                        </select>
                                                                        &nbsp;日&nbsp;
                                                                    </td>
                                                                    <td>
                                                                        <input type="search" name="hld_name_holiday[{{ $i }}][HLD_NAME]"
                                                                            id="hld_name_holiday{{ $i }}hld_name" class="hld_name_holiday" maxlength="20"
                                                                            value="{{ old('hld_name_holiday') ?? $holiday->HLD_NAME }}"
                                                                            style="width: 170px;" onFocus="this.select()" tabindex="3"><br>
                                                                        <span class="text-danger" id="nationalHolidays{{ $i }}nameNat"></span>
                                                                        <span class="text-danger" id="nationalHolidays{{ $i }}"></span>
                                                                    </td>
                                                                    <td>
                                                                        <input type="button" name="dltBtn[{{ $i }}][btnDelete]" style="width:75px;" class="deleteButtonRow" value="削除" tabindex="3">
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                        <div class="flow">
                                            <div class="pd5">

                                                <p class="CategoryTitle1">会社休日</p>
                                                <input name="btnAddCompanyHoliday" tabindex="4" id="btnAddCompanyHoliday" onclick="appendRowCompanyHolidays()"
                                                    type="button" value="新規行追加">
                                                <div class="GridViewPanelStyle3 mg10" id="CompanyHoliday">

                                                    <div>
                                                        <table tabindex="5" class="GridViewBorder" id="companyHolidays"
                                                            style="border-collapse: collapse;" border="1" rules="all"
                                                            cellspacing="0">
                                                            <tbody class="gvDept_3">
                                                                <tr id="headerCompanyHolidays">
                                                                    <th scope="col">月</th>
                                                                    <th scope="col">日</th>
                                                                    <th scope="col">名称</th>
                                                                    <th scope="col">行削除</th>
                                                                </tr>
                                                                @foreach ($company_holidays as $i => $company_holiday)
                                                                <tr class="rowCompanyHolidays">
                                                                    <td>
                                                                        <select name="hld_month_company_holiday[{{ $i }}][HLD_MONTH]"
                                                                            id="hld_month_company_holiday{{ $i }}hld_month" class="hld_month_company_holiday"
                                                                            onchange="AddDropDownList('year', 'hld_month_company_holiday{{ $i }}hld_month', 'hld_day_company_holiday{{ $i }}hld_day', true)"
                                                                            style="width: 45px;" tabindex="6">
                                                                            @for($m = 1; $m <= 12; $m++)
                                                                            <option value="{{ $m }}"
                                                                                {{ $m == (old('hld_month_company_holiday') ?? $company_holiday->HLD_MONTH) ? 'selected' : '' }}>
                                                                                {{ $m }}
                                                                            </option>
                                                                            @endfor
                                                                        </select>
                                                                        &nbsp;月&nbsp;
                                                                    </td>
                                                                    <td>
                                                                        <select name="hld_day_company_holiday[{{ $i }}][HLD_DAY]" id="hld_day_company_holiday{{ $i }}hld_day" class="hld_day_company_holiday" style="width: 45px;" tabindex="6">
                                                                            @for($d = 1; $d <= 31; $d++)
                                                                            <option value="{{ $d }}"
                                                                            {{ $d == (old('hld_day_company_holiday') ?? $company_holiday->HLD_DAY) ? 'selected' : '' }}>
                                                                            {{ $d }}
                                                                            </option>
                                                                            @endfor
                                                                        </select>
                                                                        &nbsp;日&nbsp;
                                                                    </td>
                                                                    <td>
                                                                        <input type="search" name="hld_name_company_holiday[{{ $i }}][HLD_NAME]" id="hld_name_company_holiday{{ $i }}hld_name" class="hld_name_company_holiday" maxlength="20"
                                                                            value="{{ old('hld_name_company_holiday') ?? $company_holiday->HLD_NAME }}"
                                                                            style="width: 170px;" onFocus="this.select()" tabindex="6"><br>
                                                                        <span class="text-danger" id="companyHolidays{{ $i }}nameCom"></span>
                                                                        <span class="text-danger" id="companyHolidays{{ $i }}"></span>
                                                                    </td>
                                                                    <td>
                                                                        <input type="button" name="dltBtn[{{ $i }}][btnDelete]" style="width:75px;" class="deleteButtonRow" value="削除" tabindex="6">
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                    <div class="clearBoth"></div>
                                    </div>
                                    <div class="line"></div>
                                    <p class="ButtonField1">
                                        <input type="button" value="更新" name="btnUpdate" tabindex="7" id="btnUpdate"
                                            class="ButtonStyle1 update"
                                            data-url="{{ url('master/MT08HolidayUpdate') }}"
                                            >
                                        <input type="button" name="btnCancel" tabindex="8" id="btnCancel"
                                            class="ButtonStyle1" value="キャンセル"
                                            onclick="location.reload();"
                                            >
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
$(function() {
    // ENTER時に送信されないようにする
    $('input').not('[type="button"]').keypress(function(e) {
        if (e.which == 13) {
            return false;
        }
    });

    // 「祝祭日」が無い場合、ヘッダー非表示
    var objTblNat = document.getElementById("nationalHolidays");
    var countTblNat = objTblNat.rows.length;
    if (countTblNat == 1) {
        document.getElementById("headerNationalHolidays").style.display ="none";
    }

    // 「会社休日」が無い場合、ヘッダー非表示
    var objTblCom = document.getElementById("companyHolidays");
    var countTblCom = objTblCom.rows.length;
    if (countTblCom == 1) {
        document.getElementById("headerCompanyHolidays").style.display ="none";
    }

    // 「祝祭日」と「会社休日」が無い場合「祝祭日.新規行追加」ボタンフォーカス
    if (countTblNat == 1 && countTblCom == 1) {
        document.getElementById("btnAddNationalHoliday").focus();
    }

    // 行削除や追加する際にインデックス番号を更新
    var updateIndex = function(clickedObj) {
        var index = $(clickedObj).attr("name").replace(/[^0-9]/g, "");
        $(clickedObj).closest('tr').nextAll().each(function(i,element){
            $(element).find("input,span,select").each(function(i,e) {
                var elementObj = $(e);
                var eleId = elementObj.attr("id");
                var eleName = elementObj.attr("name");
                var eleOnchange = elementObj.attr("onchange");
                if (eleId && eleId.replace(/^([^0-9]+)/g, "")) {
                    var newId = eleId.replace(/^([^0-9]+)[0-9]+([^0-9]*)$/, function(){return arguments[1] + index + arguments[2]});
                    elementObj.attr("id", newId);
                }
                if (eleName && eleName.replace(/^([^0-9]+)/g, "")) {
                    var newName = eleName && eleName.replace(/^([^0-9]+)[0-9]+([^0-9]+)$/, function(){return arguments[1] + index + arguments[2]});
                    elementObj.attr("name", newName);
                }
                if (eleOnchange && eleOnchange.replace(/^([^0-9]+)/g, "")) {
                    var newOnchange = eleOnchange && eleOnchange.replace(/^([^0-9]+)[0-9]+([^0-9]+)[0-9]+([^0-9]+)$/, function(){return arguments[1] + index + arguments[2] + index + arguments[3]});
                    elementObj.attr("onchange", newOnchange);
                }
            });
            index++;
        });
    }

    // ヘッダー以外行がない場合は、ヘッダーを非表示にする
    var headerHidden = function() {
        // 「祝祭日」
        var objTblNationalHld = document.getElementById("nationalHolidays");
        var countNationalHld = objTblNationalHld.rows.length;
        if (countNationalHld == 1){
            document.getElementById("headerNationalHolidays").style.display ="none";
        }
        // 「会社休日」
        var objTblCompanyHld = document.getElementById("companyHolidays");
        var countCompanyHld = objTblCompanyHld.rows.length;
        if (countCompanyHld == 1){
            document.getElementById("headerCompanyHolidays").style.display ="none";
        }
    }

    // 更新
    $(document).on('click', '.update', function() {
        if (!window.confirm("{{ getArrValue($error_messages, 1005) }}")) {
            return false;
        }

        var errors = $("#form").find('span.text-danger');
        if (errors.length) {
            errors.text("");
        }

        var nationalHolidays = [];
        $('.rowNationalHolidays').each(function(i,element) {
            nationalHolidays[i] = {
                'monthNat': $(element).find('.hld_month_holiday').val(),
                'dayNat': $(element).find('.hld_day_holiday').val(),
                'nameNat': $(element).find('.hld_name_holiday').val(),
            };
        })

        var companyHolidays = [];
        $('.rowCompanyHolidays').each(function(i,element) {
            companyHolidays[i]={
                'monthCom':$(element).find('.hld_month_company_holiday').val(),
                'dayCom':$(element).find('.hld_day_company_holiday').val(),
                'nameCom':$(element).find('.hld_name_company_holiday').val(),
            };
        })
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:$(this).data('url'),
            type:'POST',
            data:{
                'nationalHolidays':nationalHolidays,
                'companyHolidays':companyHolidays,
            }
        })
        .done((data, textStatus, jqXHR) => {
            location.reload();
        })
        .fail ((jqXHR, textStatus, errorThrown) => {
            $.each(jqXHR.responseJSON.errors, function(i, value) {
                $('#' + i.replaceAll('.', '')).text(value[0]);
            });
        });

        return false;
    });

    // 行削除
    $(document).on('click', '.deleteButtonRow', function() {
        var parent = $(this).closest('tr');
        updateIndex(this);
        parent.remove();
        headerHidden();
        return false;
    });


    // 年月日プルダウンの「日」の初期値を作成
    // 祝祭日
    $('.hld_month_holiday').each( function( index, element ){
        AddDropDownList('year', 'hld_month_holiday' + index + 'hld_month', 'hld_day_holiday' + index + 'hld_day', true);
    });
    // 会社休日
    $('.hld_month_company_holiday').each( function( index, element ){
        AddDropDownList('year', 'hld_month_company_holiday' + index + 'hld_month', 'hld_day_company_holiday' + index + 'hld_day', true);
    });


    // エラー文言削除
    $('.deleteButtonRow').click(function() {
        var parent = $(this).closest('.GridViewStyle1');
        if (parent.find('span.text-danger').length) {
            parent.find('span.text-danger').text("");
        }
    });
});


// day 1-31ループ
var day;
for (i = 1; i <= 31; i++) {
    day = day + '<option value="' + i + '">' + i + '</option>';
                    }
// month 1-12ループ
var month;
for (i = 1; i <= 12; i++) {
    month = month + '<option value="' + i + '">' + i + '</option>';
}

// テーブルに行を追加「祝祭日」
function appendRowNationalHolidays() {
    var objTBL = document.getElementById("nationalHolidays");
    var count = objTBL.rows.length;

    // 全行削除時また追加するときにヘッダー表示
    if (count == 1) {
        document.getElementById("headerNationalHolidays").style.display ="";
    }

    // 最終行に新しい行を追加
    var row = objTBL.insertRow(count);
    row.className = 'rowNationalHolidays';

    // 列の追加
    var c1 = row.insertCell(0);
    var c2 = row.insertCell(1);
    var c3 = row.insertCell(2);
    var c4 = row.insertCell(3);

    var mark = "'";

    // 各列に表示内容を設定
    c1.innerHTML = '<select name="hld_month_holiday[' + (count - 1) + '][HLD_MONTH]" id= "hld_month_holiday' + (count - 1)
                            + 'hld_month" class="hld_month_holiday" onchange="AddDropDownList('+mark+'year'
                            +mark+','+mark+'hld_month_holiday' + (count - 1) + 'hld_month'+mark+','+mark
                            +'hld_day_holiday' + (count - 1) + 'hld_day'+mark+',true)"style="width: 45px;" autofocus tabindex="3">'
                            + month +'</select> &nbsp;月&nbsp;';
    c2.innerHTML = '<select name="hld_day_holiday[' + (count - 1) + '][HLD_DAY]" id="hld_day_holiday' + (count - 1)
                            + 'hld_day" class="hld_day_holiday" style="width: 45px;" tabindex="3">' + day +'</select> &nbsp;日&nbsp;';
    c3.innerHTML = '<input type="search" name="hld_name_holiday[' + (count - 1)
                            + '][HLD_NAME]" class="hld_name_holiday" maxlength="20" style="width: 170px;" onFocus="this.select()" tabindex="3"><br>'
                            + '<span class="text-danger" id="nationalHolidays' + (count - 1) + 'nameNat"></span>'
                            + '<span class="text-danger" id="nationalHolidays' + (count - 1) + '"></span>';
    c4.innerHTML = '<input type="button" tabindex="3" name="dltBtn[' + (count - 1) + '][btnDelete]" style="width:75px;" class="deleteButtonRow" value="削除">';

    // エラー文言削除
    $('#btnAddNationalHoliday').click(function() {
        if ($(this).val() && $(this).parent().parent().parent().find('span.text-danger').length) {
            $(this).parent().parent().parent().find('span.text-danger').text("");
        }
    });
    $('.deleteButtonRow').click(function() {
        var parent = $(this).closest('.GridViewStyle1');
        if (parent.find('span.text-danger').length) {
            parent.find('span.text-danger').text("");
        }
    });
}

// テーブルに行を追加「会社休日」
function appendRowCompanyHolidays() {
    var objTBL = document.getElementById("companyHolidays");
    var count = objTBL.rows.length;

    // 全行削除時また追加するときにヘッダー表示
    if (count == 1) {
        document.getElementById("headerCompanyHolidays").style.display ="";
    }

    // 最終行に新しい行を追加
    var row = objTBL.insertRow(count);
    row.className = 'rowCompanyHolidays';

    // 列の追加
    var c1 = row.insertCell(0);
    var c2 = row.insertCell(1);
    var c3 = row.insertCell(2);
    var c4 = row.insertCell(3);

    var mark = "'";

    // 各列に表示内容を設定
    c1.innerHTML = '<select name="hld_month_company_holiday[' + (count - 1) + '][HLD_MONTH]" id="hld_month_company_holiday' + (count - 1)
                            + 'hld_month" class="hld_month_company_holiday" onchange="AddDropDownList('+mark+'year'+mark+','+mark+'hld_month_company_holiday'
                            + (count - 1) + 'hld_month'+mark+','+mark+'hld_day_company_holiday' + (count - 1)
                            + 'hld_day'+mark+',true)" style="width: 45px;" autofocus tabindex="6">' + month +'</select> &nbsp;月&nbsp;' ;
    c2.innerHTML = '<select name="hld_day_company_holiday[' + (count - 1) + '][HLD_DAY]" id="hld_day_company_holiday' + (count - 1)
                            + 'hld_day" class="hld_day_company_holiday" style="width: 45px;" tabindex="6">' + day +'</select> &nbsp;日&nbsp;';
    c3.innerHTML = '<input type="search" name="hld_name_company_holiday[' + (count - 1)
                            + '][HLD_NAME]" class="hld_name_company_holiday" maxlength="20" style="width: 170px;" onFocus="this.select()" tabindex="6"><br>'
                            + '<span class="text-danger" id="companyHolidays' + (count - 1) + 'nameCom"></span>'
                            + '<span class="text-danger" id="companyHolidays' + (count - 1) + '"></span>';
    c4.innerHTML = '<input type="button" tabindex="6" name="dltBtn[' + (count - 1) + '][btnDelete]" style="width:75px;" class="deleteButtonRow" value="削除">';

    // エラー文言削除
    $('#btnAddCompanyHoliday').click(function() {
        if ($(this).val() && $(this).parent().parent().parent().find('span.text-danger').length) {
            $(this).parent().parent().parent().find('span.text-danger').text("");
        }
    });
    $('.deleteButtonRow').click(function() {
        var parent = $(this).closest('.GridViewStyle1');
        if (parent.find('span.text-danger').length) {
            parent.find('span.text-danger').text("");
        }
    });
}

</script>
@endsection
