
// $(".ButtonField1").on("click", '#btnUpdate', function () {
//ここから
// $(function () {
//     var $err = $("#contents-stage");
//     if ($err.length) {
//         $err.validate({
//             rules: {
//                 dept_id: {
//                     required: true
//                 },
//                 dept_name: {
//                     required: true
//                 }

//             },
//             messages: {
//                 dept_id: {
//                     required: '必須入力項目です。'
//                 },
//                 dept_name: {
//                     required: '必須入力項目です。'
//                 }
//             }
//         })
//     }
// });
//ここまで
// });

// another way test
// $('.input_id').focusout(function() {
//     if ($('.input_id').val().length == 0) {
//       $('#adiv').html("必須入力項目です。")
//     }
//   });
// $('#btnUpdate').on('click', function () {
//     if ($(".gvDept").find('input[name ="dept_id"]').val().length == 0) {
//         //if ($(".gvDept").find('input[class="input_id"]').val().length == 0) {
//         $(this).parents('#adiv').html("please 必須入力項目です11111。")
//         return false;//add this
//     }
// });

$(".ButtonField1").on("click", '#btnUpdate', function () {
    if (confirm('更新します。よろしいですか?')) {

        if ($(".gvDept").find('input[name *="dept_id"]').val().length == 0) {
            $('#adiv').html("please 必須入力項目です22222。")

        }
    }
});



