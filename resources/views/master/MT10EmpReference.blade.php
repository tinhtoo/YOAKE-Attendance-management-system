<!-- 社員情報照会 -->
@extends('menu.main')

@section('title','社員情報照会')

@section('content')
<div id="contents-stage">
    <table class="BaseContainerStyle1">
        <tbody>
            <tr>
                <td>
                    <div id="ctl00_cphContentsArea_UpdatePanel1">


                        <table class="InputFieldStyle1">
                            <tbody>
                                <tr>
                                    <th>社員番号</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtEmpCd" tabindex="1" class="imeDisabled" id="ctl00_cphContentsArea_txtEmpCd" style="width: 80px;" onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;" onfocus="this.select();" onchange="javascript:setTimeout('__doPostBack(\'ctl00$cphContentsArea$txtEmpCd\',\'\')', 0)" type="text" maxlength="10">
                                    </td>
                                </tr>
                                <tr>
                                    <th>社員カナ名</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtEmpKana" tabindex="2" class="imeOn" id="ctl00_cphContentsArea_txtEmpKana" style="width: 160px;" onfocus="this.select();" type="text" maxlength="20">
                                    </td>
                                </tr>
                                <tr>
                                    <th>部門</th>
                                    <td>
                                        <input name="ctl00$cphContentsArea$txtDeptCd" tabindex="3" class="imeDisabled" id="ctl00_cphContentsArea_txtDeptCd" style="width: 50px;" onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;" onfocus="this.select();" onchange="javascript:setTimeout('__doPostBack(\'ctl00$cphContentsArea$txtDeptCd\',\'\')', 0)" type="text" maxlength="6">
                                        <input name="ctl00$cphContentsArea$btnSearchDeptCd" tabindex="4" class="SearchButton" id="ctl00_cphContentsArea_btnSearchDeptCd" onclick="SetDeptItem();__doPostBack('ctl00$cphContentsArea$btnSearchDeptCd','')" type="button" value="?">
                                        <span class="OutlineLabel" id="ctl00_cphContentsArea_lblDeptName" style="width: 200px; height: 17px; display: inline-block;"></span>

                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <p class="FunctionMenu1">
                            <a class="left" id="ctl00_cphContentsArea_hlAddEmp" href="MT10EmpEditor?Id=Add">新規社員登録</a>
                            <input name="ctl00$cphContentsArea$btnSearch" tabindex="5" class="SearchButton" id="ctl00_cphContentsArea_btnSearch" onclick="javascript:__doPostBack('ctl00$cphContentsArea$btnSearch','')" type="button" value="検索">
                            <input name="ctl00$cphContentsArea$btnCancelSearch" tabindex="6" class="SearchButton" id="ctl00_cphContentsArea_btnCancelSearch" onclick="CloseSubWindow();__doPostBack('ctl00$cphContentsArea$btnCancelSearch','')" type="button" value="キャンセル">
                        </p>

                        <div class="clearBoth"></div>

                        <div class="line"></div>

                        <ul class="HolizonListMenu1" style="text-align: left">
                            <li><a id="ctl00_cphContentsArea_lbAll" href="javascript:__doPostBack('ctl00$cphContentsArea$lbAll','')">全件</a></li>
                            <li><a id="ctl00_cphContentsArea_lbA" href="javascript:__doPostBack('ctl00$cphContentsArea$lbA','')">あ</a></li>
                            <li><a id="ctl00_cphContentsArea_lbKa" href="javascript:__doPostBack('ctl00$cphContentsArea$lbKa','')">か</a></li>
                            <li><a id="ctl00_cphContentsArea_lbSa" href="javascript:__doPostBack('ctl00$cphContentsArea$lbSa','')">さ</a></li>
                            <li><a id="ctl00_cphContentsArea_lbTa" href="javascript:__doPostBack('ctl00$cphContentsArea$lbTa','')">た</a></li>
                            <li><a id="ctl00_cphContentsArea_lbNa" href="javascript:__doPostBack('ctl00$cphContentsArea$lbNa','')">な</a></li>
                            <li><a id="ctl00_cphContentsArea_lbHa" href="javascript:__doPostBack('ctl00$cphContentsArea$lbHa','')">は</a></li>
                            <li><a id="ctl00_cphContentsArea_lbMa" href="javascript:__doPostBack('ctl00$cphContentsArea$lbMa','')">ま</a></li>
                            <li><a id="ctl00_cphContentsArea_lbYa" href="javascript:__doPostBack('ctl00$cphContentsArea$lbYa','')">や</a></li>
                            <li><a id="ctl00_cphContentsArea_lbRa" href="javascript:__doPostBack('ctl00$cphContentsArea$lbRa','')">ら</a></li>
                            <li><a id="ctl00_cphContentsArea_lbWa" href="javascript:__doPostBack('ctl00$cphContentsArea$lbWa','')">わ</a></li>
                            <li><a id="ctl00_cphContentsArea_lbAz" href="javascript:__doPostBack('ctl00$cphContentsArea$lbAz','')">英字</a></li>
                        </ul>

                        <div class="clearBoth"></div>
                        <div class="line"></div>

                        <div class="GridViewStyle1">
                            <div>
                                <table tabindex="7" class="GridViewSpace" id="ctl00_cphContentsArea_gvEmp" style="border-collapse: collapse;" border="1" rules="all" cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <th scope="col">
                                                社員
                                            </th>
                                            <th scope="col">
                                                社員
                                            </th>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a tabindex="8" id="ctl00_cphContentsArea_gvEmp_ctl02_hlEmp1" href="MT10EmpEditor.aspx?Id=001">001 : 佐藤　明</a>
                                            </td>
                                            <td style="width: 350px;">
                                                <a tabindex="9" id="ctl00_cphContentsArea_gvEmp_ctl02_hlEmp2" href="MT10EmpEditor.aspx?Id=117">117 : 清水　弘子</a>
                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a tabindex="8" id="ctl00_cphContentsArea_gvEmp_ctl03_hlEmp1" href="MT10EmpEditor.aspx?Id=002">002 : 鈴木　由美</a>
                                            </td>
                                            <td style="width: 350px;">
                                                <a tabindex="9" id="ctl00_cphContentsArea_gvEmp_ctl03_hlEmp2" href="MT10EmpEditor.aspx?Id=118">118 : 山崎　浩二</a>
                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a tabindex="8" id="ctl00_cphContentsArea_gvEmp_ctl04_hlEmp1" href="MT10EmpEditor.aspx?Id=003">003 : 高橋　正</a>
                                            </td>
                                            <td style="width: 350px;">
                                                <a tabindex="9" id="ctl00_cphContentsArea_gvEmp_ctl04_hlEmp2" href="MT10EmpEditor.aspx?Id=119">119 : 森　真由美</a>
                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a tabindex="8" id="ctl00_cphContentsArea_gvEmp_ctl05_hlEmp1" href="MT10EmpEditor.aspx?Id=004">004 : 田中　恵美</a>
                                            </td>
                                            <td style="width: 350px;">
                                                <a tabindex="9" id="ctl00_cphContentsArea_gvEmp_ctl05_hlEmp2" href="MT10EmpEditor.aspx?Id=120">120 : 阿部　茂</a>
                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a tabindex="8" id="ctl00_cphContentsArea_gvEmp_ctl06_hlEmp1" href="MT10EmpEditor.aspx?Id=005">005 : 渡辺　大輔</a>
                                            </td>
                                            <td style="width: 350px;">
                                                <a tabindex="9" id="ctl00_cphContentsArea_gvEmp_ctl06_hlEmp2" href="MT10EmpEditor.aspx?Id=121">121 : 長谷川　久美子</a>
                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a tabindex="8" id="ctl00_cphContentsArea_gvEmp_ctl07_hlEmp1" href="MT10EmpEditor.aspx?Id=100">100 : 伊藤　香織</a>
                                            </td>
                                            <td style="width: 350px;">
                                                <a tabindex="9" id="ctl00_cphContentsArea_gvEmp_ctl07_hlEmp2" href="MT10EmpEditor.aspx?Id=122">122 : 村上　達也</a>
                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a tabindex="8" id="ctl00_cphContentsArea_gvEmp_ctl08_hlEmp1" href="MT10EmpEditor.aspx?Id=101">101 : 山本　修</a>
                                            </td>
                                            <td style="width: 350px;">
                                                <a tabindex="9" id="ctl00_cphContentsArea_gvEmp_ctl08_hlEmp2" href="MT10EmpEditor.aspx?Id=123">123 : 近藤　京子</a>
                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a tabindex="8" id="ctl00_cphContentsArea_gvEmp_ctl09_hlEmp1" href="MT10EmpEditor.aspx?Id=102">102 : 中村　啓子</a>
                                            </td>
                                            <td style="width: 350px;">
                                                <a tabindex="9" id="ctl00_cphContentsArea_gvEmp_ctl09_hlEmp2" href="MT10EmpEditor.aspx?Id=124">124 : 石井　勉</a>
                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a tabindex="8" id="ctl00_cphContentsArea_gvEmp_ctl10_hlEmp1" href="MT10EmpEditor.aspx?Id=103">103 : 小林　和夫</a>
                                            </td>
                                            <td style="width: 350px;">
                                                <a tabindex="9" id="ctl00_cphContentsArea_gvEmp_ctl10_hlEmp2" href="MT10EmpEditor.aspx?Id=125">125 : 坂本　美智子</a>
                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a tabindex="8" id="ctl00_cphContentsArea_gvEmp_ctl11_hlEmp1" href="MT10EmpEditor.aspx?Id=104">104 : 加藤　幸子</a>
                                            </td>
                                            <td style="width: 350px;">
                                                <a tabindex="9" id="ctl00_cphContentsArea_gvEmp_ctl11_hlEmp2" href="MT10EmpEditor.aspx?Id=126">126 : 遠藤　剛</a>
                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a tabindex="8" id="ctl00_cphContentsArea_gvEmp_ctl12_hlEmp1" href="MT10EmpEditor.aspx?Id=105">105 : 吉田　和彦</a>
                                            </td>
                                            <td style="width: 350px;">
                                                <a tabindex="9" id="ctl00_cphContentsArea_gvEmp_ctl12_hlEmp2" href="MT10EmpEditor.aspx?Id=127">127 : 青木　美穂</a>
                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a tabindex="8" id="ctl00_cphContentsArea_gvEmp_ctl13_hlEmp1" href="MT10EmpEditor.aspx?Id=106">106 : 山田　純子</a>
                                            </td>
                                            <td style="width: 350px;">
                                                <a tabindex="9" id="ctl00_cphContentsArea_gvEmp_ctl13_hlEmp2" href="MT10EmpEditor.aspx?Id=201">201 : 池田　優子</a>
                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a tabindex="8" id="ctl00_cphContentsArea_gvEmp_ctl14_hlEmp1" href="MT10EmpEditor.aspx?Id=110">110 : 佐々木　勝利</a>
                                            </td>
                                            <td style="width: 350px;">
                                                <a tabindex="9" id="ctl00_cphContentsArea_gvEmp_ctl14_hlEmp2" href="MT10EmpEditor.aspx?Id=202">202 : 橋本　淳</a>
                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a tabindex="8" id="ctl00_cphContentsArea_gvEmp_ctl15_hlEmp1" href="MT10EmpEditor.aspx?Id=1100">1100 : 山田　太郎</a>
                                            </td>
                                            <td style="width: 350px;">
                                                <a tabindex="9" id="ctl00_cphContentsArea_gvEmp_ctl15_hlEmp2" href="MT10EmpEditor.aspx?Id=203">203 : 山下　明美</a>
                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a tabindex="8" id="ctl00_cphContentsArea_gvEmp_ctl16_hlEmp1" href="MT10EmpEditor.aspx?Id=111">111 : 山口　節子</a>
                                            </td>
                                            <td style="width: 350px;">
                                                <a tabindex="9" id="ctl00_cphContentsArea_gvEmp_ctl16_hlEmp2" href="MT10EmpEditor.aspx?Id=204">204 : 石川　進</a>
                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a tabindex="8" id="ctl00_cphContentsArea_gvEmp_ctl17_hlEmp1" href="MT10EmpEditor.aspx?Id=112">112 : 斉藤　清</a>
                                            </td>
                                            <td style="width: 350px;">
                                                <a tabindex="9" id="ctl00_cphContentsArea_gvEmp_ctl17_hlEmp2" href="MT10EmpEditor.aspx?Id=205">205 : 中島　洋子</a>
                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a tabindex="8" id="ctl00_cphContentsArea_gvEmp_ctl18_hlEmp1" href="MT10EmpEditor.aspx?Id=113">113 : 松本　順子</a>
                                            </td>
                                            <td style="width: 350px;">
                                                <a tabindex="9" id="ctl00_cphContentsArea_gvEmp_ctl18_hlEmp2" href="MT10EmpEditor.aspx?Id=206">206 : 前田　大介</a>
                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a tabindex="8" id="ctl00_cphContentsArea_gvEmp_ctl19_hlEmp1" href="MT10EmpEditor.aspx?Id=114">114 : 井上　健一</a>
                                            </td>
                                            <td style="width: 350px;">
                                                <a tabindex="9" id="ctl00_cphContentsArea_gvEmp_ctl19_hlEmp2" href="MT10EmpEditor.aspx?Id=207">207 : 藤田　恵美子</a>
                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a tabindex="8" id="ctl00_cphContentsArea_gvEmp_ctl20_hlEmp1" href="MT10EmpEditor.aspx?Id=115">115 : 木村　信子</a>
                                            </td>
                                            <td style="width: 350px;">
                                                <a tabindex="9" id="ctl00_cphContentsArea_gvEmp_ctl20_hlEmp2" href="MT10EmpEditor.aspx?Id=208">208 : 小川　崇</a>
                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a tabindex="8" id="ctl00_cphContentsArea_gvEmp_ctl21_hlEmp1" href="MT10EmpEditor.aspx?Id=116">116 : 林　浩一</a>
                                            </td>
                                            <td style="width: 350px;">
                                                <a tabindex="9" id="ctl00_cphContentsArea_gvEmp_ctl21_hlEmp2" href="MT10EmpEditor.aspx?Id=209">209 : 後藤　和子</a>
                                            </td>
                                        </tr>
                                        <tr class="ButtonField1">
                                            <td colspan="2">
                                                <div class="line"></div>
                                                <ul class="HolizonListMenu1">
                                                    <li><a id="ctl00_cphContentsArea_gvEmp_ctl23_LinkButton1" href="javascript:__doPostBack('ctl00$cphContentsArea$gvEmp$ctl23$LinkButton1','')">最初へ</a></li>
                                                    <li><a id="ctl00_cphContentsArea_gvEmp_ctl23_LinkButton2" href="javascript:__doPostBack('ctl00$cphContentsArea$gvEmp$ctl23$LinkButton2','')">前へ</a></li>
                                                    <li><span>(1 / 2)</span></li>
                                                    <li><a id="ctl00_cphContentsArea_gvEmp_ctl23_LinkButton3" href="javascript:__doPostBack('ctl00$cphContentsArea$gvEmp$ctl23$LinkButton3','')">次へ</a></li>
                                                    <li><a id="ctl00_cphContentsArea_gvEmp_ctl23_LinkButton4" href="javascript:__doPostBack('ctl00$cphContentsArea$gvEmp$ctl23$LinkButton4','')">最後へ</a></li>
                                                </ul>
                                                <div class="clearBoth"></div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="line"></div>
                        <p class="ButtonField1"><input name="ctl00$cphContentsArea$btnCancel" tabindex="10" id="ctl00_cphContentsArea_btnCancel" onclick="CloseSubWindow();__doPostBack('ctl00$cphContentsArea$btnCancel','')" type="button" value="キャンセル"></p>


                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
