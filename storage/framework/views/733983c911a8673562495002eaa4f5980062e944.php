<!-- カレンダー情報クリア処理画面 -->

<?php $__env->startSection('title', 'カレンダー情報クリア処理'); ?>
<?php $__env->startSection('content'); ?>
    <div id="contents-stage">
        <table class="BaseContainerStyle1">
            <tbody>
                <tr>
                    <td>
                        <div id="ctl00_cphContentsArea_UpdatePanel1">
                            <table class="InputFieldStyle1">
                                <tbody>
                                    <tr>
                                        <th>対象月度</th>
                                        <td>
                                            <input name="ctl00$cphContentsArea$txtTargetYear" tabindex="1"
                                                class="OutlineLabel" id="ctl00_cphContentsArea_txtTargetYear"
                                                style="width: 40px;" onfocus="this.select();" type="text" maxlength="4">

                                            &nbsp;年&nbsp;
                                            <select name="ctl00$cphContentsArea$ddlTargetMonth" tabindex="2"
                                                class="OutlineLabel" id="ctl00_cphContentsArea_ddlTargetMonth"
                                                style="width: 50px;">
                                                <option selected="selected" value=""></option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>

                                            </select>
                                            &nbsp;月度&nbsp;

                                        </td>
                                    </tr>
                                    <tr>
                                        <th>社員番号</th>
                                        <td>
                                            <input name="ctl00$cphContentsArea$txtEmpCd" tabindex="3" class="OutlineLabel"
                                                id="ctl00_cphContentsArea_txtEmpCd" style="width: 80px;"
                                                onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;"
                                                onfocus="this.select();"
                                                onchange="javascript:setTimeout('__doPostBack(\'ctl00$cphContentsArea$txtEmpCd\',\'\')', 0)"
                                                type="text" maxlength="10">
                                            <input name="ctl00$cphContentsArea$btnSearchEmpCd" tabindex="4"
                                                class="SearchButton" id="ctl00_cphContentsArea_btnSearchEmpCd"
                                                onclick="SetEmpItem();__doPostBack('ctl00$cphContentsArea$btnSearchEmpCd','')"
                                                type="button" value="?">
                                            <span class="OutlineLabel" id="ctl00_cphContentsArea_lblEmpName"
                                                style="width: 200px; height: 17px; display: inline-block;"></span>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th>最新カレンダー年月</th>
                                        <td>
                                            <span class="OutlineLabel" id="ctl00_cphContentsArea_lblMaxCald"
                                                style="width: 80px; height: 17px; display: inline-block;"></span>
                                            <input name="ctl00$cphContentsArea$btnSetData" tabindex="5" class="SearchButton"
                                                id="ctl00_cphContentsArea_btnSetData"
                                                onclick="javascript:__doPostBack('ctl00$cphContentsArea$btnSetData','')"
                                                type="button" value="表示">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <table class="style1">
                                <tbody>
                                    <tr>
                                        <td align="center">
                                            <br>
                                            <br>
                                            <br>
                                            <span id="ctl00_cphContentsArea_lblInfoMsg"
                                                style="height: 17px; color: red; display: inline-block;">打刻情報は削除されませんが、打刻時間は初期化されます。</span>
                                            <br>
                                            <br>
                                            <br>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="line"></div>

                            <p class="ButtonField1">
                                <input name="ctl00$cphContentsArea$btnUpdate" tabindex="6"
                                    id="ctl00_cphContentsArea_btnUpdate"
                                    onclick="if(confirm('カレンダー情報をクリアしますか？') ==  false){ return false;};WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$cphContentsArea$btnUpdate&quot;, &quot;&quot;, true, &quot;Update&quot;, &quot;&quot;, false, true))"
                                    type="button" value="更新">
                                <input name="ctl00$cphContentsArea$btnCancel" tabindex="7"
                                    id="ctl00_cphContentsArea_btnCancel"
                                    onclick="CloseSubWindow();__doPostBack('ctl00$cphContentsArea$btnCancel','')"
                                    type="button" value="キャンセル">
                            </p>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('menu.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\06_SVN\resources\views/mng_oprt/CalendarClear.blade.php ENDPATH**/ ?>