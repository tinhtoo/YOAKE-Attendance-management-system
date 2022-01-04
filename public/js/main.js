
//table header add
function hh() {
    var header = '<tr class="d_head" ><th scope="col">部門コード</th><th scope="col">部門名</th><th scope="col">行削除</th></tr>';
    $(".gvDept").append(header);
}


//var count = 0;
//table row add 
function hh_2() {
    //count++;
    var html_input = '<tr class="data"><td ><input tabindex="4" class="input_id" name="dept_id" style="width: 55px;" type="text" maxlength="6" value="" required></td><td><input tabindex="4" class="dept_name" name="dept_name" style="width: 270px;" type="text" maxlength="20" value="" required></td><td><input tabindex="4" class="DeleteRow" name="del-col" type="button" value="削除"></td><br><td><div id="adiv" style="color: red;"></div></td></tr>';

    $(".gvDept").append(html_input);

}

// var which = true;
// let lineNo = 0;
// $(document).on('click', '#AddNewRow', function () {
//     if (which) {
//         hh()
//         hh_2()
//         which = false;
//     } else {
//         //hh()
//         hh_2()

//     }

// })
// lineNo++;

// ????? 追加日日6/6/2020 ????? start//


let lineNo = 0;
$(document).on('click', '#AddNewRow', function () {
    if ($(".d_head")[0]) {
        hh_2()
    } else {
        hh()
        hh_2()
    }

})
lineNo++;


// ????? 追加日日6/6/2020 ????? end//


//行削除ボタン
// function d_head() {
//     $(".gvDept").find('input[name="record_1"]').each(function () {

//         $(this).parents(".d_head").remove();

//     });
// }

// var IsClicked = false;
// $(".gvDept").on("click", '.DeleteRow', function () {
//     IsClicked = true;
// });
// if (IsClicked) {
//     d_head();
// }
// else {
//     $(this).closest('.data').remove();

// }


//***** 行削除ボタン処理 *****//
$(".gvDept").on("click", ".DeleteRow", function () {

    if ($(".data")[1]) {
        $(this).closest('.data').remove();
    } else {
        $(this).closest('.data').remove();
        $(".d_head").remove();
    }

});

//....test.....end//

// //行削除ボタン
// $(".gvDept").on("click",'.DeleteRow',function(){

//     $(this).closest('tr').remove(); 
//  });

//全行削除ボタン
// $("#btnDelete").on("click", function () {
//     $(this).closest("tr").find(".d_head").remove();
//     $(".gvDept").find('input[name *="record"]').each(function () {

//         // $(this).parents("tr").find(".d_head").remove();

//         //$(this).parents(".data").remove();

//     });

// });

// $(".ButtonField1").on("click", '#btnUpdate', function () {
//     var val = $(".input_id").length > 0 && $("input_id").val() != '';
//     var test = $($(".input_id").val());
//     // if($("input[type='text']").length > 0 && $("input[type='text']").val() != ''){
//     if (val) {
//         // test.prop("disabled", true);
//         // $(".input_id").prop("disabled", true);
//         ($('.input_id').val()).prop("disabled", true); 

//         confirm('更新します。よろしいですか?????');
//     } else {
//         alert('failed');
//     };


// });


// $(".ButtonField1").on("click", '#btnUpdate', function () {
//     var val = $(".input_id").length > 0 && $("input_id").val() != '';
//     var check = $(".input_id").val();
//     var error;
//     $(".input_id").on("focusout",function(){
//         if(check != ''){

//         }else{

//         }
//     })
//     if (check === '') {
//         error = true;
//         confirm('Error。よろしいですか?????');
//     } else {


//         if (val) {

//             $(".input_id").prop("disabled", true);

//             confirm('更新します。よろしいですか?????');
//         }
//     }

// });
// if (error) {
//     // エラーが見つかった場合
//     if (!$(this).next('span.error').length) { // この要素の後続要素が存在しない場合
//         $(this).after('<span class="error">必須入力項目です。</span>'); // この要素の後にエラーメッセージを挿入 
//     } else {
//         // エラーがなかった場合
//         $(this).next('span.error').remove(); // この要素の後続要素を削除
//     }
// }

//***** 全行削除ボタン処理 *****//
$(".ButtonField1").on("click", '#btnDelete', function () {
    if (confirm('削除します。よろしいですか?')) {

        $(".gvDept").find('input[name *="dept_id"]').each(function () {

            // $(this).parents("tr").find(".d_head").remove();

            $(this).parents(".data").remove();

        });
        $(this).parents("tr").find(".d_head").remove();
    }
});


/**
 * subwindow処理
*/

// var subWindowSearchUpDept;
// function SetUpDeptItem() {
//     var lblDeptCd = document.getElementById('<%= lblDeptCd.ClientID %>');


//     if (subWindowSearchUpDept && !subWindowSearchUpDept.closed) {
//         subWindowSearchUpDept.close();
//     }

//     var windowW = 380;
//     var windowH = 565;
//     var windowX = (screen.width - windowW) / 2;
//     var windowY = (screen.height - windowH) / 2;

//     var param = '';

//     param += 'DeptCd=' + lblDeptCd.innerText;
//     param += '&UpDeptCdClienId=' + '<%= lblUpDeptCd.ClientID %>';
//     param += '&UpDeptNameClienId=' + '<%= lblUpDeptName.ClientID %>';
//     param += '&HidUpDeptCdClienId=' + '<%= hidUpDeptCd.ClientID %>';
//     param += '&DispClsCd=01';

//     subWindowSearchUpDept = window.open('UpDeptSearch.blade.php' + param, 'UpDeptSearch', 'left=' + windowX + ', top=' + windowY + ', width=' + windowW + ', height=' + windowH + 'scrollbars=no, resizable=yes');

// }

/**
 * sub-window処理
*/
//新部門選択サブ画面
function SetUpDeptItem() {

    window.open('UpDeptSearch', '', 'width=600,height=750');
    // return false;
};

//部門情報検索サブ画面
$(function () {
    $("#btnSearchDeptCd").on('click', function () {
        window.open('/search/MT12DeptSearch', '', 'width=400, height=550, top=90, left=400');
    });
});

// //社員情報書出処理 _「test方法２」
// function SetDeptItem() {

//     window.open('/search/MT12DeptSearch', '', 'width=400,height=650');
//     // return false;
// };
// //社員情報書出処理_test「test方法２」
// function SetEmpItem() {

//     window.open('/search/MT10EmpSearch', '', 'width=550,height=750');
//     // return false;
// };


//社員情報検索サブ画面
$(function () {
    $("#btnSearchEmpCd").on('click', function () {
        window.open('/search/MT10EmpSearch', '', 'width=500, height=650, top=90, left=350');
    });
});





/**
 * 部門権限情報入力 処理
*/

$('#btnSelectAll').on('click', function () {
    $('input').prop('checked', true);
});

$('#btnNotSelectAll').on('click', function () {
    $('input').prop('checked', false);
});


//祝祭日・会社休日情報入力 

function month() {
    var $select = $(".select_month");
    for (i = 1; i <= 12; i++) {
        $select.append($('<option></option > ').val(i).html(i))
    }
}
function day() {
    var $select = $(".select_day");
    for (i = 1; i <= 31; i++) {
        $select.append($('<option></option > ').val(i).html(i))
    }
}

//table header add
function MT08() {
    var MT08_header = '<tr class="MT08_head" ><th scope="col">月</th><th scope="col">日</th><th scope="col">名称</th><th scope="col"> 行削除</th></tr>';
    $(".gvDept_2").append(MT08_header);
}



//table row add 
function MT08_2() {
    // month();
    // day();
    var MT08_html = '<tr class="data"><td class="GridViewRowCenter"><select class="select_month" tabindex="6"  id="ddlChHldMonth" style="width: 45px;">' + month() + '</select><span id="MonthUnit">月</span></td><td><select class="select_day" tabindex="6"  id="ddlChHldDay" style="width: 45px;">' + day() + '</select><span id="DayUnit">日</span></td><td class="GridViewRowLeft"><input name="NhHldName" tabindex="3" class="imeOn" style="width: 170px;" onfocus="" type="text" maxlength="20" value=""><br></td><td><input tabindex="4" class="DeleteRow" name="del-col" type="button" value="削除"></td><br><td><div id="adiv" style="color: red;"></div></td></tr>';

    $(".gvDept_2").append(MT08_html);

}

//let line = 0;
$('#contents-stage').on('click', '#btnAddNationalHoliday', function add() {
    if ($(".MT08_head")[0]) {
        MT08_2()
    } else {
        MT08()
        MT08_2()
    }

})

//キャンセルボタンクリック
function SetEmpItem(){
    $("#gridview-warp").empty();
}

//line++;


// function MT08() {
//     var header = '<tr class="head_2" ><th scope="col">月</th><th scope="col">日</th><th scope="col">名称</th><th scope="col"> 行削除</th></tr>';
//     $(".gvDept_2").append(header);
// }

// function MT08_2() {
//     //count++;
//     var $select = $(".select_month");
//     for (i = 1; i <= 12; i++) {
//         $select.append($('<option></option > ').val(i).html(i))
//     }

//     var $select = $(".select_day");
//     for (i = 1; i <= 31; i++) {
//         $select.append($('<option></option > ').val(i).html(i))
//     }

//     var html_input = '<tr class="data"><td class="GridViewRowCenter"><select class="select_month" tabindex="6"  id="ddlChHldMonth" style="width: 45px;"></select><span id="MonthUnit">月</span></td><td><select class="select_day" tabindex="6"  id="ddlChHldDay" style="width: 45px;"></select><span id="DayUnit">日</span></td><td class="GridViewRowLeft"><input name="NhHldName" tabindex="3" class="imeOn" style="width: 170px;" onfocus="" type="text" maxlength="20" value="元旦"><br></td><td><input tabindex="4" class="DeleteRow" name="del-col" type="button" value="削除"></td><br><td><div id="adiv" style="color: red;"></div></td></tr>';

//     $(".gvDept_2").append(html_input);

// }
// // $(function () {
// var $select = $(".data,.select_month");
// for (i = 1; i <= 12; i++) {
//     $select.append($('<option></option >').val(i).html(i))
// }
// // });
// //$(function () {
// var $select = $(".data,.select_day");
// for (i = 1; i <= 31; i++) {
//     $select.append($('<option></option >').val(i).html(i))
// }
// // });

// var count = 0
// var header = '<tr class="head_2" ><th scope="col">月</th><th scope="col">日</th><th scope="col">名称</th><th scope="col"> 行削除</th></tr>';

// var html_input = '<tr class="data"><td class="GridViewRowCenter"><select class="select_month" tabindex="6" id="ddlChHldMonth" style="width: 45px;"></select><span id="MonthUnit">月</span></td><td><select class="select_day" tabindex="6"  id="ddlChHldDay" style="width: 45px;"></select><span id="DayUnit">日</span></td><td class="GridViewRowLeft"><input name="NhHldName" tabindex="3" class="imeOn" style="width: 170px;" onfocus="" type="text" maxlength="20" value=""><br></td><td><input tabindex="4" class="DeleteRow" name="del-col" type="button" value="削除"></td><br><td><div id="adiv" style="color: red;"></div></td></tr>';

// function t_header() {
//     // var header = '<tr class="head_2" ><th scope="col">月</th><th scope="col">日</th><th scope="col">名称</th><th scope="col"> 行削除</th></tr>';
//     $(".gvDept_2").append(header);
// }

// function t_data() {
//     var $select = $(".select_month");
//     for (i = 1; i <= 12; i++) {
//         if(html(i) = 12){
//             break;
//         }
//         $select.append($('<option></option >').val(i).html(i));

//     }
//     var $select = $(".select_day");
//     for (i = 1; i <= 31; i++) {

//         $select.append($('<option></option >').val(i).html(i));

//     }
//     // var html_input = '<tr class="data"><td class="GridViewRowCenter"><select class="select_month" tabindex="6"  id="ddlChHldMonth" style="width: 45px;"></select><span id="MonthUnit">月</span></td><td><select class="select_day" tabindex="6"  id="ddlChHldDay" style="width: 45px;"></select><span id="DayUnit">日</span></td><td class="GridViewRowLeft"><input name="NhHldName" tabindex="3" class="imeOn" style="width: 170px;" onfocus="" type="text" maxlength="20" value=""><br></td><td><input tabindex="4" class="DeleteRow" name="del-col" type="button" value="削除"></td><br><td><div id="adiv" style="color: red;"></div></td></tr>';
//     $(".gvDept_2").append(html_input);

// }

// function t_header2() {

//     //var header = '<tr class="head_2" ><th scope="col">月</th><th scope="col">日</th><th scope="col">名称</th><th scope="col"> 行削除</th></tr>';
//     $(".gvDept_3").append(header);
// }

// function t_data2() {
//     var $select2 = $(".select_month");
//     for (a = 1; a <= 12; a++) {

//         $select2.append($('<option></option >').val(a).html(a));

//     }
//     var $select = $(".select_day");
//     for (a = 1; a <= 31; a++) {
//         $select.append($('<option></option >').val(a++).html(a))
//     }
//     //var html_input = '<tr class="data"><td class="GridViewRowCenter"><select class="select_month" tabindex="6"  id="ddlChHldMonth" style="width: 45px;"></select><span id="MonthUnit">月</span></td><td><select class="select_day" tabindex="6"  id="ddlChHldDay" style="width: 45px;"></select><span id="DayUnit">日</span></td><td class="GridViewRowLeft"><input name="NhHldName" tabindex="3" class="imeOn" style="width: 170px;" onfocus="" type="text" maxlength="20" value=""><br></td><td><input tabindex="4" class="DeleteRow" name="del-col" type="button" value="削除"></td><br><td><div id="adiv" style="color: red;"></div></td></tr>';
//     $(".gvDept_3").append(html_input);
// }

// $(function () {
//     var $select = $(".select_month");
//     for (i = 1; i <= 12; i++) {
//         $select.append($('<option></option >').val(i).html(i))
//     }
// });
// $(function () {
//     var $select = $(".select_day");
//     for (i = 1; i <= 31; i++) {
//         $select.append($('<option></option >').val(i).html(i))
//     }
// });

//クリック
// let lineNo_2 = 0;
// $('#contents-stage').on('click', '#btnAddNationalHoliday', function (e) {

//     e.preventDefault();

//     if ($("#NationalHoliday").find(".head_2")[0]) {
//         //$(".gvDept_2").append(html_input);
//         t_data();
//     } else {
//         // $(".gvDept_2").append(header);
//         // $(".gvDept_2").append(html_input);
//         t_header();
//         t_data();
//     }
//     //confirm('クリックしました。')

// })
// lineNo_2++;

// let lineNo_3 = 0;
// $('#contents-stage').on('click', '#btnAddCompanyHoliday', function (e) {
//     e.preventDefault();

//     if ($("#CompanyHoliday").find(".head_2")[0]) {
//         //$(".gvDept_3").append(html_input);
//         t_data2();
//     } else {
//         // $(".gvDept_3").append(header);
//         // $(".gvDept_3").append(html_input);
//         t_header2();
//         t_data2();
//     }

// })
// lineNo_3++;


/**
 * 年
*/
// $(function () {
//     //DropDownListを参照します。
//     var ddlYears = $("#ddlTargetYear");

//     //現在の年を決定します。
//     var currentYear = (new Date()).getFullYear();

//     //ループして、Year値をDropDownListに追加します。
//     for (var i = currentYear - 3; i <= currentYear + 3; i++) {
//         var option = $("<option />");
//         option.html(i);
//         option.val(i);
//         ddlYears.append(option);
//     }

// });

/**
 * 月
*/
// $(function () {
//     //DropDownListを参照します。
//     var ddlYears = $("#ddlTargetMonth");

//     //ループして、Month値をDropDownListに追加します。
//     for (var i = 1; i <= 12; i++) {
//         var option = $("<option />");
//         option.html(i);
//         option.val(i);
//         ddlYears.append(option);
//     }
// });



/**
 * 勤務状況照会（管理者）
 */

// $('input:radio').on('click', function () {
//     $("#txtEmpCd, #btnSearchEmpCd").prop("disabled", true);
//     $("#txtDeptCd, #ddlStartCompany, #ddlEndCompany, #ddlClosingDate, #btnSearchDeptCd").prop("disabled", false);
//     if ($(this).hasClass('rbSearchEmp')) {
//         $("#txtEmpCd, #btnSearchEmpCd").prop("disabled", false);
//         $("#txtDeptCd, #ddlStartCompany, #ddlEndCompany, #ddlClosingDate, #btnSearchDeptCd").prop("disabled", true);
//     }
// })



/**
 * 出退勤入力画面詳細枠の表示
**/

$("#btnDisp").on('click', function () {
    //var table = document.getElementById('#gridview-warp');
    $('#gridview-warp').show('slow');
    $(this).attr('disabled', 'disabled');

});

// function wte_edit() {
//     if ($("#td_1")) {
//         if ($("#td_1").style.display == 'none') {
//             $("#td_1").style.display == 'block';
//             $("#td_2").style.display == 'none';
//         } else {
//             $("#td_1").style.display == 'none';
//             $("#td_2").style.display == 'block';
//         }
//     }
// }

// $("#td_1").on('click', function(){

//     // $("#td_2").hide();
//     $("#td_1").show();
//     $(this).hide();
// })
// $("#btnUpdate").on('click', function () {
//     $("#btnEdit,[id = 'b']").show();

//     $("#btnUpdate,[id = 'a']").hide();

// });





