<!-- 部門情報入力  -->


<?php $__env->startSection('title', '部門情報入力 '); ?>

<?php $__env->startSection('content'); ?>
    <div id="contents-stage">
        <table class="BaseContainerStyle2">
            <tbody>
                <tr>
                    <td>
                        <div id="ctl00_cphContentsArea_UpdatePanel1">
                            <form action="" method="post" id="form">
                                <?php echo csrf_field(); ?>

                                <table class="InputFieldStyle1">
                                    <tbody>
                                        <tr>
                                            <th>親部門</th>
                                            <td class="deptHead">
                                                <input type="text "name="txtUpDeptCd" class="txtUpDeptCd"
                                                        disabled="disabled" class="OutlineLabel" oninput="value = onlyHalfNumber(value)"
                                                        style="width: 50px;" maxlength="6" value="<?php echo e(old('txtUpDeptCd') ?? $dept_data->DEPT_CD); ?>"
                                                        <?php if(isset($dept_data->DEPT_CD)): ?>
                                                        disabled
                                                        <?php else: ?>
                                                        autofocus
                                                        onFocus="this.select()"
                                                        <?php endif; ?>
                                                        >
                                                        <?php if(isset($dept_data->DEPT_CD )): ?>
                                                        <input type="hidden" name="txtUpDeptCd" class="txtUpDeptCd" value=<?php echo e($dept_data->DEPT_CD); ?>>
                                                        <input type="hidden" name="deptLevelNo" class="deptLevelNo" value=<?php echo e($dept_data->LEVEL_NO); ?>>
                                                        <?php endif; ?>
                                                        <span class="txtUpDeptCd text-danger" id="txtUpDeptCd"></span>
                                                <input type="search" name="txtUpDeptName" class="txtUpDeptName" tabindex="1"
                                                        style="width: 300px;" onfocus="this.select();" oninput="value = ngVerticalBar(value)"
                                                        maxlength="20" value="<?php echo e(old('txtUpDeptName') ??$dept_data ->DEPT_NAME); ?>"
                                                        <?php if(isset($dept_data ->DEPT_NAME )): ?>
                                                        autofocus
                                                        onFocus="this.select()"
                                                        <?php endif; ?>
                                                        >
                                                        <span class="txtUpDeptName text-danger" id="txtUpDeptName"></span>
                                                        <span class="deltTxtUpDeptCd text-danger" id="deltTxtUpDeptCd"></span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="line"></div>

                                <input name="Add-NewRow" tabindex="2"  type="button"  id=   "coladd" onclick="appendRow()" value="新規行追加">
                                <div class="GridViewStyle1 mg10" >
                                    <div class="GridViewPanelStyle7" >
                                        <table id="tbl" tabindex="3" style="border-collapse: collapse;" border="1" rules="all" cellspacing="0" >
                                            <tbody>
                                                <tr id="p1">
                                                    <th scope="col">部門コード</th>
                                                    <th scope="col">部門名</th>
                                                    <th scope="col">行削除</th>
                                                </tr>

                                                <?php $__currentLoopData = $dept_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $dept_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr class="rowDeptList">
                                                    <td>
                                                        <input type="text" style="width: 55px;" name="deptCd[<?php echo e($i); ?>][DEPT_CD]" id="deptDataCd<?php echo e($i); ?>deptCd"
                                                            maxlength="6" tabindex="4" class="deptCd imeDisabled" onfocus="this.select();"
                                                            value="<?php echo e($dept_list->DEPT_CD); ?>"
                                                            <?php if(isset($dept_list->DEPT_CD)): ?>
                                                            disabled
                                                            <?php endif; ?>
                                                            />
                                                            <input type="hidden" class="deptCd imeDisabled" name="deptCd[<?php echo e($i); ?>][DEPT_CD]" value=<?php echo e($dept_list->DEPT_CD); ?>>
                                                    </td>
                                                    <td style="text-align:center">
                                                        <input type="search" style="width: 270px;" name="deptName[<?php echo e($i); ?>][DEPT_NAME]"
                                                            maxlength="20" tabindex="4" class="deptName imeOn" onfocus="this.select();"
                                                            value="<?php echo e($dept_list ->DEPT_NAME); ?>"
                                                            <?php if(isset($dept_list ->DEPT_NAME )): ?>
                                                            onFocus="this.select()"
                                                            <?php endif; ?>
                                                            />
                                                            <br/>
                                                            <span class="deptCd text-danger" id="deptData<?php echo e($i); ?>deptCd"></span>
                                                            <span class="deptName text-danger" id="deptData<?php echo e($i); ?>deptName"></span>
                                                            <span class="text-danger" id="delRowCdData<?php echo e($i); ?>deptCdRow"></span>
                                                            <span class="delOneRow text-danger" id="delOneRowCdData"></span>
                                                    </td>
                                                    <td>
                                                        <input type="button" tabindex="4" data-url="<?php echo e(url('master/MT12DeptDelRow')); ?>" name="dltBtn[<?php echo e($i); ?>][btnDelete]" style="width:75px;" class="deleteButtonRow datacheck" value="削除">
                                                    </td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="line"></div>
                                <p class="ButtonField1">
                                        <input type="button" value="更新" name="btnUpdate" tabindex="7" id="btnUpdate"
                                            class="ButtonStyle1 update"
                                            data-url="<?php echo e(url('master/MT12DeptUpdate')); ?>"
                                            >
                                        <input type="button" name="btnCancel" tabindex="8" id="btnCancel"
                                            class="ButtonStyle1" value="キャンセル"
                                            onclick="location.reload();"
                                            >
                                        <input type="button" value="削除" name="btnDelete" tabindex="9" id="btnDelete"
                                            class="ButtonStyle1 delete" data-url="<?php echo e(url('master/MT12DeptDelete')); ?>"
                                            >
                                </p>

                            </form>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
// ENTER時に送信されないようにする
$('input').not('[type="button"]').keypress(function(e) {
    if (e.which == 13) {
        return false;
    }
});

$(function() {

    var updateIndex = function(clickedObj) {
        var index = $(clickedObj).attr("name").replace(/[^0-9]/g, "");
        $(clickedObj).closest('tr').nextAll().each(function(i,element){
            $(element).find("input,span").each(function(i,e) {
                var elementObj = $(e);
                var eleId = elementObj.attr("id");
                var eleName = elementObj.attr("name");
                if (eleId && eleId.replace(/^([^0-9]+)/g, "")) {
                    var newId = eleId.replace(/^([^0-9]+)[0-9]+([^0-9]+)$/, function(){return arguments[1] + index + arguments[2]});
                    elementObj.attr("id", newId);
                }
                if (eleName && eleName.replace(/^([^0-9]+)/g, "")) {
                    var newName = eleName && eleName.replace(/^([^0-9]+)[0-9]+([^0-9]+)$/, function(){return arguments[1] + index + arguments[2]});
                    elementObj.attr("name", newName);
                }
            });

            index++;
        });
    }

    var headerHidden = function() {
        // ヘッダー以外行がない場合は、ヘッダーを非表示にする
        var objTBL = document.getElementById("tbl");
        var count = objTBL.rows.length;
        if(count == 1){
            document.getElementById("p1").style.display ="none";
        }
    }

    // 更新
    $(document).on('click', '.update', function() {
        if (!window.confirm("<?php echo e(getArrValue($error_messages, 1005)); ?>")) {
            return false;
        }

        var errors = $("#form").find('span.deptName,span.deptCd,span.txtUpDeptName,span.delOneRow');
        if (errors.length) {
            errors.text("");
        }

        var deptData = [];
        $('.rowDeptList').each(function(i,element) {
            deptData[i] = {
                'deptCd': $(element).find('.deptCd').val(),
                'deptName': $(element).find('.deptName').val(),
            };
        })

        var deptDataNew = [];
        $('.rowDeptList').each(function(i,element) {
            deptDataNew[i]={
                'deptCdNew':$(element).find('.deptCd.imeDisabled.new').val()
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
                'txtUpDeptCd':$('.txtUpDeptCd').val(),
                'txtUpDeptName':$('.txtUpDeptName').val(),
                'deptData':deptData,
                'deptDataNew':deptDataNew,
                'txtUpDeptCd':$('.txtUpDeptCd').val(),
                'deptLevelNo':$('.deptLevelNo').val(),
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

    // 削除処理
    $(document).on('click', '.delete', function() {
        if (!window.confirm("<?php echo e(getArrValue($error_messages, '1004')); ?>")) {
            return false;
        }

        var errors = $("#form").find('span.deptName,span.deptCd,span.txtUpDeptName,span.delOneRow');
        if (errors.length) {
            errors.text("");
        }

        var delRowCdData = [];
        $('.rowDeptList').each(function(i,element) {
            delRowCdData[i] = {
                'deptCdRow': $(element).find('.deptCd.imeDisabled').val(),
            };
        })
        var deptData = [];
        $('.rowDeptList').each(function(i,element) {
            deptData[i] = {
                'deptCd': $(element).find('.deptCd').val(),
                'deptName': $(element).find('.deptName').val(),
            };
        })
        var deptDataNew = [];
        $('.rowDeptList').each(function(i,element) {
            deptDataNew[i]={
                'deptCdNew':$(element).find('.deptCd.imeDisabled.new').val()
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
                'delRowCdData':delRowCdData,
                'deltTxtUpDeptCd':$('.txtUpDeptCd').val(),
                'txtUpDeptName':$('.txtUpDeptName').val(),
                'deptData':deptData,
                'deptDataNew':deptDataNew,
                'txtUpDeptCd':$('.txtUpDeptCd').val(),
                'deptLevelNo':$('.deptLevelNo').val(),
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

    // エラー文言削除
    $('.txtUpDeptCd').focusout(function() {
        if ($(this).val() && $(this).parent().find('span.txtUpDeptCd').length) {
            $(this).parent().find('span.txtUpDeptCd').text("");
        }
    });
    $('.txtUpDeptName').focusout(function() {
        if ($(this).val() && $(this).parent().find('span.txtUpDeptName').length) {
            $(this).parent().find('span.txtUpDeptName').text("");
        }
    });
    $('.deptCd').focusout(function() {
        if ($(this).val() && $(this).parent().parent().find('span.deptCd').length) {
            $(this).parent().parent().find('span.deptCd').text("");
        }
    });
    $('.deptName').focusout(function() {
        if ($(this).val() && $(this).parent().find('span.deptName').length) {
            $(this).parent().find('span.deptName').text("");
        }
    });

    var num = $(this).find('.rowDeptList').length;
    if(num == 0) {
        document.getElementById("p1").style.display ="none";
    }

    // 機能権限コード英数半角のみ入力可
    onlyHalfNumber = n => n.replace(/[０-９]/g, s => String.fromCharCode(s.charCodeAt(0) - 65248))
                                        .replace(/\D/g, '');
    // 入力不可能文字：|
    ngVerticalBar = n => n.replace(/\|/g, '');

    // 入力可能文字：半角英数
    onlyHalfWord = n => n.replace(/[０-９Ａ-Ｚａ-ｚ]/g, s => String.fromCharCode(s.charCodeAt(0) - 65248))
            .replace(/[^0-9a-zA-Z]/g, '');

    // 行削除処理エラーチェック
    $(document).on('click', '.datacheck', function() {
        var delOneRowCdData = $(this).closest('tr').find('.deptCd.imeDisabled').val();
        var parent = $(this).closest('tr');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:$(this).data('url'),
            type:'POST',
            data:{
                'delOneRowCdData':delOneRowCdData,
            }
        }).done((data, textStatus, jqXHR) => {
            // 行削除
            updateIndex(this);
            parent.remove();
            headerHidden();
        }).fail ((jqXHR, textStatus, errorThrown) => {
            $.each(jqXHR.responseJSON.errors, function(i,value) {
                parent.find('#' + i).text(value[0]);
            });
        });
    });
    // 新しい行の為、削除エラーチェック無し
    $(document).on('click', '.deleteNew', function() {
        var parent = $(this).closest('tr');
        // フォーカス設定
        var indexRow = $(this).attr("name").replace(/[^0-9]/g, "");
        var indexRow = parseInt(indexRow) - 1;
        $('input[name="deptCd['+ indexRow +'][DEPT_CD]"]').focus();
        updateIndex(this);
        parent.remove();
        headerHidden();
        return false;
    });
});

// テーブルに行を追加
function appendRow() {
    var objTBL = document.getElementById("tbl");
    var count = objTBL.rows.length;

    if(count==1) {
        document.getElementById("p1").style.display ="";
    }

    // 最終行に新しい行を追加
    var row = objTBL.insertRow(count);
    row.className = 'rowDeptList';

    // 列の追加
    var c1 = row.insertCell(0);
    var c2 = row.insertCell(1);
    var c3 = row.insertCell(2);

    // 各列にスタイルを設定
    c2.style.cssText = "text-align:center;";

    // 各列に表示内容を設定
    c1.innerHTML = '<input type="text" style="width: 55px;" name="deptCd['  + (count - 1) + '][DEPT_CD]" maxlength="6" tabindex="4" class="deptCd imeDisabled new" oninput="value = onlyHalfWord(value)" onfocus="this.select();"/>';
    c2.innerHTML = '<input type="search" style="width: 270px;" name="deptName['  + (count - 1) + '][DEPT_NAME]" maxlength="20" tabindex="4" class="deptName imeOn new" oninput="value = ngVerticalBar(value)" onfocus="this.select();"/></br>'+
                            '<span class="deptCd text-danger" id="deptData'  + (count - 1) + 'deptCd"></span>'+
                            '<span class="deptCd text-danger" id="deptDataNew'  + (count - 1) + 'deptCdNew"></span>'+
                            '<span class="deptName text-danger" id="deptData'  + (count - 1) + 'deptName"></span>' +
                            '<span class="dltBtn text-danger" id="dltBtn'  + (count - 1) + 'dltBtn"></span>';
    c3.innerHTML = '<input type="button" tabindex="4" name="dltBtn['  + (count - 1) + '][btnDelete]" style="width:75px;" class="deleteButtonRow deleteNew" value="削除">';

    // フォーカス設定
    $('table#tbl tr:last td:first input').focus();

    // 行追加エラー文言削除
    $('.deptCd').focusout(function() {
        if ($(this).val() && $(this).parent().parent().find('span.deptCd').length) {
            $(this).parent().parent().find('span.deptCd').text("");
        }
    });
    $('.deptName').focusout(function() {
        if ($(this).val() && $(this).parent().find('span.deptName').length) {
            $(this).parent().find('span.deptName').text("");
        }
    });
    // エラー文言削除
    var errorsAll = $("#form").find('span.text-danger');
    $('.deleteButtonRow').click(function() {
        if (errorsAll.length) {
            errorsAll.text("");
        }
    });
    if (errorsAll.length) {
        errorsAll.text("");
    }
}

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('menu.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\06_SVN\resources\views/master/MT12DeptEditor.blade.php ENDPATH**/ ?>