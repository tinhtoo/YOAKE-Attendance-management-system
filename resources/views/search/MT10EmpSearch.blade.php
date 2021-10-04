<!-- 社員情報検索  -->
@extends('common.home')

@section('title','社員情報検索')

@section('content_search')
<div id="search-container">
    <form id="frmMT12DeptSearch" runat="server">
        <div id="contents-stage">
            <input name="btnBack" id="btnBack" style="width: 80px;" onclick="window.close();" type="button" value="戻る">


            <div id="UpdatePanel1">

                <table class="InputFieldStyle1 mg10">
                    <tbody>
                        <tr>
                            <th>社員カナ名</th>
                            <td>
                                <input name="txtEmpKana" tabindex="1" class="imeOn" id="txtEmpKana" style="width: 160px;" onfocus="this.select();" type="text" maxlength="20">
                            </td>
                        </tr>
                        <tr>
                            <th>部門</th>
                            <td>
                                <input name="txtDeptCd" tabindex="2" class="imeDisabled" id="txtDeptCd" style="width: 50px;" onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;" onfocus="this.select();" onchange="javascript:setTimeout('__doPostBack(\'txtDeptCd\',\'\')', 0)" type="text" maxlength="6">
                                <input name="btnSearchDeptCd" tabindex="3" class="SearchButton" id="btnSearchDeptCd" onclick="SetDeptItem();__doPostBack('btnSearchDeptCd','')" type="button" value="?">
                                <span class="OutlineLabel" id="lblDeptName" style="width: 200px; height: 17px; display: inline-block;"></span>
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
                    <input name="btnSearch" tabindex="4" class="SearchButton" id="btnSearch" onclick="javascript:__doPostBack('btnSearch','')" type="button" value="検索">
                    <input name="btnCancelSearch" tabindex="5" class="SearchButton" id="btnCancelSearch" onclick="CloseSubWindow();__doPostBack('btnCancelSearch','')" type="button" value="キャンセル">
                </p>

                <div class="clearBoth"></div>

                <div class="line"></div>

                <ul class="HolizonListMenu1">
                    <li><a id="lbAll" href="javascript:__doPostBack('lbAll','')">全件</a></li>
                    <li><a id="lbA" href="javascript:__doPostBack('lbA','')">あ</a></li>
                    <li><a id="lbKa" href="javascript:__doPostBack('lbKa','')">か</a></li>
                    <li><a id="lbSa" href="javascript:__doPostBack('lbSa','')">さ</a></li>
                    <li><a id="lbTa" href="javascript:__doPostBack('lbTa','')">た</a></li>
                    <li><a id="lbNa" href="javascript:__doPostBack('lbNa','')">な</a></li>
                    <li><a id="lbHa" href="javascript:__doPostBack('lbHa','')">は</a></li>
                    <li><a id="lbMa" href="javascript:__doPostBack('lbMa','')">ま</a></li>
                    <li><a id="lbYa" href="javascript:__doPostBack('lbYa','')">や</a></li>
                    <li><a id="lbRa" href="javascript:__doPostBack('lbRa','')">ら</a></li>
                    <li><a id="lbWa" href="javascript:__doPostBack('lbWa','')">わ</a></li>
                    <li><a id="lbAz" href="javascript:__doPostBack('lbAz','')">英字</a></li>
                </ul>

                <div class="clearBoth"></div>
                <div class="line"></div>

                <div class="GridViewStyle1 mg10" id="search-gridview-container">
                    <div class="GridViewPanelStyle6" id="pnlEmp">

                        <div>
                            <table class="GridViewPadding" id="gvEmp" style="border-collapse: collapse;" border="1" rules="all" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <th scope="col">
                                            選択
                                        </th>
                                        <th scope="col">
                                            コード
                                        </th>
                                        <th scope="col">
                                            社員名
                                        </th>
                                        <th scope="col">
                                            部門名
                                        </th>
                                    </tr>
                                    <tr style="cursor: pointer; background-color: transparent;" backgroundColor="transparent">
                                        <td style="width: 30px; white-space: nowrap;">
                                            <input name="gvEmp$ctl02$rbSelectRow" id="gvEmp_ctl02_rbSelectRow" onclick="javascript:setTimeout('__doPostBack(\'gvEmp$ctl02$rbSelectRow\',\'\')', 0)" type="radio" value="rbSelectRow">
                                        </td>
                                        <td style="width: 50px; white-space: nowrap;">
                                            <span id="gvEmp_ctl02_lblEmpCd">001</span>
                                        </td>
                                        <td style="width: 200px; white-space: nowrap;">
                                            <span id="gvEmp_ctl02_lblEmpName">佐藤　明</span>
                                        </td>
                                        <td>
                                            <span id="gvEmp_ctl02_lblDeptName">営業部</span>
                                        </td>
                                    </tr>
                                    <tr style="cursor: pointer; background-color: transparent;" backgroundColor="transparent">
                                        <td style="width: 30px; white-space: nowrap;">
                                            <input name="gvEmp$ctl03$rbSelectRow" id="gvEmp_ctl03_rbSelectRow" onclick="javascript:setTimeout('__doPostBack(\'gvEmp$ctl03$rbSelectRow\',\'\')', 0)" type="radio" value="rbSelectRow">
                                        </td>
                                        <td style="width: 50px; white-space: nowrap;">
                                            <span id="gvEmp_ctl03_lblEmpCd">002</span>
                                        </td>
                                        <td style="width: 200px; white-space: nowrap;">
                                            <span id="gvEmp_ctl03_lblEmpName">鈴木　由美</span>
                                        </td>
                                        <td>
                                            <span id="gvEmp_ctl03_lblDeptName">営業部</span>
                                        </td>
                                    </tr>
                                    <tr style="cursor: pointer; background-color: transparent;" backgroundColor="transparent">
                                        <td style="width: 30px; white-space: nowrap;">
                                            <input name="gvEmp$ctl04$rbSelectRow" id="gvEmp_ctl04_rbSelectRow" onclick="javascript:setTimeout('__doPostBack(\'gvEmp$ctl04$rbSelectRow\',\'\')', 0)" type="radio" value="rbSelectRow">
                                        </td>
                                        <td style="width: 50px; white-space: nowrap;">
                                            <span id="gvEmp_ctl04_lblEmpCd">003</span>
                                        </td>
                                        <td style="width: 200px; white-space: nowrap;">
                                            <span id="gvEmp_ctl04_lblEmpName">高橋　正</span>
                                        </td>
                                        <td>
                                            <span id="gvEmp_ctl04_lblDeptName">営業部</span>
                                        </td>
                                    </tr>
                                    <tr style="cursor: pointer; background-color: transparent;" backgroundColor="transparent">
                                        <td style="width: 30px; white-space: nowrap;">
                                            <input name="gvEmp$ctl05$rbSelectRow" id="gvEmp_ctl05_rbSelectRow" onclick="javascript:setTimeout('__doPostBack(\'gvEmp$ctl05$rbSelectRow\',\'\')', 0)" type="radio" value="rbSelectRow">
                                        </td>
                                        <td style="width: 50px; white-space: nowrap;">
                                            <span id="gvEmp_ctl05_lblEmpCd">004</span>
                                        </td>
                                        <td style="width: 200px; white-space: nowrap;">
                                            <span id="gvEmp_ctl05_lblEmpName">田中　恵美</span>
                                        </td>
                                        <td>
                                            <span id="gvEmp_ctl05_lblDeptName">営業部</span>
                                        </td>
                                    </tr>
                                    <tr style="cursor: pointer; background-color: transparent;" backgroundColor="transparent">
                                        <td style="width: 30px; white-space: nowrap;">
                                            <input name="gvEmp$ctl06$rbSelectRow" id="gvEmp_ctl06_rbSelectRow" onclick="javascript:setTimeout('__doPostBack(\'gvEmp$ctl06$rbSelectRow\',\'\')', 0)" type="radio" value="rbSelectRow">
                                        </td>
                                        <td style="width: 50px; white-space: nowrap;">
                                            <span id="gvEmp_ctl06_lblEmpCd">005</span>
                                        </td>
                                        <td style="width: 200px; white-space: nowrap;">
                                            <span id="gvEmp_ctl06_lblEmpName">渡辺　大輔</span>
                                        </td>
                                        <td>
                                            <span id="gvEmp_ctl06_lblDeptName">営業部</span>
                                        </td>
                                    </tr>
                                    <tr style="cursor: pointer; background-color: transparent;" backgroundColor="transparent">
                                        <td style="width: 30px; white-space: nowrap;">
                                            <input name="gvEmp$ctl07$rbSelectRow" id="gvEmp_ctl07_rbSelectRow" onclick="javascript:setTimeout('__doPostBack(\'gvEmp$ctl07$rbSelectRow\',\'\')', 0)" type="radio" value="rbSelectRow">
                                        </td>
                                        <td style="width: 50px; white-space: nowrap;">
                                            <span id="gvEmp_ctl07_lblEmpCd">100</span>
                                        </td>
                                        <td style="width: 200px; white-space: nowrap;">
                                            <span id="gvEmp_ctl07_lblEmpName">伊藤　香織</span>
                                        </td>
                                        <td>
                                            <span id="gvEmp_ctl07_lblDeptName">製造一課</span>
                                        </td>
                                    </tr>
                                    <tr style="cursor: pointer; background-color: transparent;" backgroundColor="transparent">
                                        <td style="width: 30px; white-space: nowrap;">
                                            <input name="gvEmp$ctl08$rbSelectRow" id="gvEmp_ctl08_rbSelectRow" onclick="javascript:setTimeout('__doPostBack(\'gvEmp$ctl08$rbSelectRow\',\'\')', 0)" type="radio" value="rbSelectRow">
                                        </td>
                                        <td style="width: 50px; white-space: nowrap;">
                                            <span id="gvEmp_ctl08_lblEmpCd">101</span>
                                        </td>
                                        <td style="width: 200px; white-space: nowrap;">
                                            <span id="gvEmp_ctl08_lblEmpName">山本　修</span>
                                        </td>
                                        <td>
                                            <span id="gvEmp_ctl08_lblDeptName">製造一課</span>
                                        </td>
                                    </tr>
                                    <tr style="cursor: pointer; background-color: transparent;" backgroundColor="transparent">
                                        <td style="width: 30px; white-space: nowrap;">
                                            <input name="gvEmp$ctl09$rbSelectRow" id="gvEmp_ctl09_rbSelectRow" onclick="javascript:setTimeout('__doPostBack(\'gvEmp$ctl09$rbSelectRow\',\'\')', 0)" type="radio" value="rbSelectRow">
                                        </td>
                                        <td style="width: 50px; white-space: nowrap;">
                                            <span id="gvEmp_ctl09_lblEmpCd">102</span>
                                        </td>
                                        <td style="width: 200px; white-space: nowrap;">
                                            <span id="gvEmp_ctl09_lblEmpName">中村　啓子</span>
                                        </td>
                                        <td>
                                            <span id="gvEmp_ctl09_lblDeptName">製造一課</span>
                                        </td>
                                    </tr>
                                    <tr style="cursor: pointer; background-color: transparent;" backgroundColor="transparent">
                                        <td style="width: 30px; white-space: nowrap;">
                                            <input name="gvEmp$ctl10$rbSelectRow" id="gvEmp_ctl10_rbSelectRow" onclick="javascript:setTimeout('__doPostBack(\'gvEmp$ctl10$rbSelectRow\',\'\')', 0)" type="radio" value="rbSelectRow">
                                        </td>
                                        <td style="width: 50px; white-space: nowrap;">
                                            <span id="gvEmp_ctl10_lblEmpCd">103</span>
                                        </td>
                                        <td style="width: 200px; white-space: nowrap;">
                                            <span id="gvEmp_ctl10_lblEmpName">小林　和夫</span>
                                        </td>
                                        <td>
                                            <span id="gvEmp_ctl10_lblDeptName">製造一課</span>
                                        </td>
                                    </tr>
                                    <tr style="cursor: pointer; background-color: transparent;" backgroundColor="transparent">
                                        <td style="width: 30px; white-space: nowrap;">
                                            <input name="gvEmp$ctl11$rbSelectRow" id="gvEmp_ctl11_rbSelectRow" onclick="javascript:setTimeout('__doPostBack(\'gvEmp$ctl11$rbSelectRow\',\'\')', 0)" type="radio" value="rbSelectRow">
                                        </td>
                                        <td style="width: 50px; white-space: nowrap;">
                                            <span id="gvEmp_ctl11_lblEmpCd">104</span>
                                        </td>
                                        <td style="width: 200px; white-space: nowrap;">
                                            <span id="gvEmp_ctl11_lblEmpName">加藤　幸子</span>
                                        </td>
                                        <td>
                                            <span id="gvEmp_ctl11_lblDeptName">製造一課</span>
                                        </td>
                                    </tr>
                                    <tr style="cursor: pointer; background-color: transparent;" backgroundColor="transparent">
                                        <td style="width: 30px; white-space: nowrap;">
                                            <input name="gvEmp$ctl12$rbSelectRow" id="gvEmp_ctl12_rbSelectRow" onclick="javascript:setTimeout('__doPostBack(\'gvEmp$ctl12$rbSelectRow\',\'\')', 0)" type="radio" value="rbSelectRow">
                                        </td>
                                        <td style="width: 50px; white-space: nowrap;">
                                            <span id="gvEmp_ctl12_lblEmpCd">105</span>
                                        </td>
                                        <td style="width: 200px; white-space: nowrap;">
                                            <span id="gvEmp_ctl12_lblEmpName">吉田　和彦</span>
                                        </td>
                                        <td>
                                            <span id="gvEmp_ctl12_lblDeptName">製造一課</span>
                                        </td>
                                    </tr>
                                    <tr style="cursor: pointer; background-color: transparent;" backgroundColor="transparent">
                                        <td style="width: 30px; white-space: nowrap;">
                                            <input name="gvEmp$ctl13$rbSelectRow" id="gvEmp_ctl13_rbSelectRow" onclick="javascript:setTimeout('__doPostBack(\'gvEmp$ctl13$rbSelectRow\',\'\')', 0)" type="radio" value="rbSelectRow">
                                        </td>
                                        <td style="width: 50px; white-space: nowrap;">
                                            <span id="gvEmp_ctl13_lblEmpCd">106</span>
                                        </td>
                                        <td style="width: 200px; white-space: nowrap;">
                                            <span id="gvEmp_ctl13_lblEmpName">山田　純子</span>
                                        </td>
                                        <td>
                                            <span id="gvEmp_ctl13_lblDeptName">製造一課</span>
                                        </td>
                                    </tr>
                                    <tr style="cursor: pointer; background-color: transparent;" backgroundColor="transparent">
                                        <td style="width: 30px; white-space: nowrap;">
                                            <input name="gvEmp$ctl14$rbSelectRow" id="gvEmp_ctl14_rbSelectRow" onclick="javascript:setTimeout('__doPostBack(\'gvEmp$ctl14$rbSelectRow\',\'\')', 0)" type="radio" value="rbSelectRow">
                                        </td>
                                        <td style="width: 50px; white-space: nowrap;">
                                            <span id="gvEmp_ctl14_lblEmpCd">110</span>
                                        </td>
                                        <td style="width: 200px; white-space: nowrap;">
                                            <span id="gvEmp_ctl14_lblEmpName">佐々木　勝利</span>
                                        </td>
                                        <td>
                                            <span id="gvEmp_ctl14_lblDeptName">製造二課</span>
                                        </td>
                                    </tr>
                                    <tr style="cursor: pointer; background-color: transparent;" backgroundColor="transparent">
                                        <td style="width: 30px; white-space: nowrap;">
                                            <input name="gvEmp$ctl15$rbSelectRow" id="gvEmp_ctl15_rbSelectRow" onclick="javascript:setTimeout('__doPostBack(\'gvEmp$ctl15$rbSelectRow\',\'\')', 0)" type="radio" value="rbSelectRow">
                                        </td>
                                        <td style="width: 50px; white-space: nowrap;">
                                            <span id="gvEmp_ctl15_lblEmpCd">1100</span>
                                        </td>
                                        <td style="width: 200px; white-space: nowrap;">
                                            <span id="gvEmp_ctl15_lblEmpName">山田　太郎</span>
                                        </td>
                                        <td>
                                            <span id="gvEmp_ctl15_lblDeptName">製造一課</span>
                                        </td>
                                    </tr>
                                    <tr style="cursor: pointer; background-color: transparent;" backgroundColor="transparent">
                                        <td style="width: 30px; white-space: nowrap;">
                                            <input name="gvEmp$ctl16$rbSelectRow" id="gvEmp_ctl16_rbSelectRow" onclick="javascript:setTimeout('__doPostBack(\'gvEmp$ctl16$rbSelectRow\',\'\')', 0)" type="radio" value="rbSelectRow">
                                        </td>
                                        <td style="width: 50px; white-space: nowrap;">
                                            <span id="gvEmp_ctl16_lblEmpCd">111</span>
                                        </td>
                                        <td style="width: 200px; white-space: nowrap;">
                                            <span id="gvEmp_ctl16_lblEmpName">山口　節子</span>
                                        </td>
                                        <td>
                                            <span id="gvEmp_ctl16_lblDeptName">経理部</span>
                                        </td>
                                    </tr>
                                    <tr style="cursor: pointer; background-color: transparent;" backgroundColor="transparent">
                                        <td style="width: 30px; white-space: nowrap;">
                                            <input name="gvEmp$ctl17$rbSelectRow" id="gvEmp_ctl17_rbSelectRow" onclick="javascript:setTimeout('__doPostBack(\'gvEmp$ctl17$rbSelectRow\',\'\')', 0)" type="radio" value="rbSelectRow">
                                        </td>
                                        <td style="width: 50px; white-space: nowrap;">
                                            <span id="gvEmp_ctl17_lblEmpCd">112</span>
                                        </td>
                                        <td style="width: 200px; white-space: nowrap;">
                                            <span id="gvEmp_ctl17_lblEmpName">斉藤　清</span>
                                        </td>
                                        <td>
                                            <span id="gvEmp_ctl17_lblDeptName">経理部</span>
                                        </td>
                                    </tr>
                                    <tr style="cursor: pointer; background-color: transparent;" backgroundColor="transparent">
                                        <td style="width: 30px; white-space: nowrap;">
                                            <input name="gvEmp$ctl18$rbSelectRow" id="gvEmp_ctl18_rbSelectRow" onclick="javascript:setTimeout('__doPostBack(\'gvEmp$ctl18$rbSelectRow\',\'\')', 0)" type="radio" value="rbSelectRow">
                                        </td>
                                        <td style="width: 50px; white-space: nowrap;">
                                            <span id="gvEmp_ctl18_lblEmpCd">113</span>
                                        </td>
                                        <td style="width: 200px; white-space: nowrap;">
                                            <span id="gvEmp_ctl18_lblEmpName">松本　順子</span>
                                        </td>
                                        <td>
                                            <span id="gvEmp_ctl18_lblDeptName">経理部</span>
                                        </td>
                                    </tr>
                                    <tr style="cursor: pointer; background-color: transparent;" backgroundColor="transparent">
                                        <td style="width: 30px; white-space: nowrap;">
                                            <input name="gvEmp$ctl19$rbSelectRow" id="gvEmp_ctl19_rbSelectRow" onclick="javascript:setTimeout('__doPostBack(\'gvEmp$ctl19$rbSelectRow\',\'\')', 0)" type="radio" value="rbSelectRow">
                                        </td>
                                        <td style="width: 50px; white-space: nowrap;">
                                            <span id="gvEmp_ctl19_lblEmpCd">114</span>
                                        </td>
                                        <td style="width: 200px; white-space: nowrap;">
                                            <span id="gvEmp_ctl19_lblEmpName">井上　健一</span>
                                        </td>
                                        <td>
                                            <span id="gvEmp_ctl19_lblDeptName">総務部</span>
                                        </td>
                                    </tr>
                                    <tr style="cursor: pointer; background-color: transparent;" backgroundColor="transparent">
                                        <td style="width: 30px; white-space: nowrap;">
                                            <input name="gvEmp$ctl20$rbSelectRow" id="gvEmp_ctl20_rbSelectRow" onclick="javascript:setTimeout('__doPostBack(\'gvEmp$ctl20$rbSelectRow\',\'\')', 0)" type="radio" value="rbSelectRow">
                                        </td>
                                        <td style="width: 50px; white-space: nowrap;">
                                            <span id="gvEmp_ctl20_lblEmpCd">115</span>
                                        </td>
                                        <td style="width: 200px; white-space: nowrap;">
                                            <span id="gvEmp_ctl20_lblEmpName">木村　信子</span>
                                        </td>
                                        <td>
                                            <span id="gvEmp_ctl20_lblDeptName">総務部</span>
                                        </td>
                                    </tr>
                                    <tr style="cursor: pointer; background-color: transparent;" backgroundColor="transparent">
                                        <td style="width: 30px; white-space: nowrap;">
                                            <input name="gvEmp$ctl21$rbSelectRow" id="gvEmp_ctl21_rbSelectRow" onclick="javascript:setTimeout('__doPostBack(\'gvEmp$ctl21$rbSelectRow\',\'\')', 0)" type="radio" value="rbSelectRow">
                                        </td>
                                        <td style="width: 50px; white-space: nowrap;">
                                            <span id="gvEmp_ctl21_lblEmpCd">116</span>
                                        </td>
                                        <td style="width: 200px; white-space: nowrap;">
                                            <span id="gvEmp_ctl21_lblEmpName">林　浩一</span>
                                        </td>
                                        <td>
                                            <span id="gvEmp_ctl21_lblDeptName">総務部</span>
                                        </td>
                                    </tr>
                                    <tr class="ButtonField1">
                                        <td colspan="4">
                                            <div class="line"></div>
                                            <ul class="HolizonListMenu1">
                                                <li><a id="gvEmp_ctl23_LinkButton1" href="javascript:__doPostBack('gvEmp$ctl23$LinkButton1','')">最初へ</a></li>
                                                <li><a id="gvEmp_ctl23_LinkButton2" href="javascript:__doPostBack('gvEmp$ctl23$LinkButton2','')">前へ</a></li>
                                                <li><span>(1 / 3)</span></li>
                                                <li><a id="gvEmp_ctl23_LinkButton3" href="javascript:__doPostBack('gvEmp$ctl23$LinkButton3','')">次へ</a></li>
                                                <li><a id="gvEmp_ctl23_LinkButton4" href="javascript:__doPostBack('gvEmp$ctl23$LinkButton4','')">最後へ</a></li>
                                            </ul>
                                            <div class="clearBoth"></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

                <div class="line"></div>
                <p class="ButtonField1"><input name="btnCancel" tabindex="6" id="btnCancel" onclick="CloseSubWindow();__doPostBack('btnCancel','')" type="button" value="キャンセル"></p>

            </div>
        </div>
    </form>
</div>
@endsection