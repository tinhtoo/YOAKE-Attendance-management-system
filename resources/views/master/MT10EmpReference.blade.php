<!-- 社員情報照会 -->
@extends('menu.main')

@section('title','社員情報照会')

@section('content')
<div id="contents-stage">
    <table class="BaseContainerStyle1">
        <tbody>
            <tr>
                <td>
                    <div id="UpdatePanel1">


                        <table class="InputFieldStyle1">
                            <tbody>
                                <tr>
                                    <th>社員番号</th>
                                    <td>
                                        <input name="txtEmpCd" tabindex="1" class="imeDisabled" id="txtEmpCd" style="width: 80px;" onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;" onfocus="this.select();" onchange="javascript:setTimeout('__doPostBack(\'txtEmpCd\',\'\')', 0)" type="text" maxlength="10">
                                    </td>
                                </tr>
                                <tr>
                                    <th>社員カナ名</th>
                                    <td>
                                        <input name="txtEmpKana" tabindex="2" class="imeOn" id="txtEmpKana" style="width: 160px;" onfocus="this.select();" type="text" maxlength="20">
                                    </td>
                                </tr>
                                <tr>
                                    <th>部門</th>
                                    <td>
                                        <input name="txtDeptCd" tabindex="3" class="imeDisabled" id="txtDeptCd" style="width: 50px;" onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;" onfocus="this.select();" onchange="javascript:setTimeout('__doPostBack(\'txtDeptCd\',\'\')', 0)" type="text" maxlength="6">
                                        <input name="btnSearchDeptCd" tabindex="4" class="SearchButton" id="btnSearchDeptCd" type="button" value="?">
                                        <span class="OutlineLabel" id="lblDeptName" style="width: 200px; height: 17px; display: inline-block;"></span>

                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <p class="FunctionMenu1">
                            <a class="left" id="hlAddEmp" href="MT10EmpEditor?Id=Add">新規社員登録</a>
                            <input name="btnSearch" tabindex="5" class="SearchButton" id="btnSearch" onclick="javascript:__doPostBack('btnSearch','')" type="button" value="検索">
                            <input name="btnCancelSearch" tabindex="6" class="SearchButton" id="btnCancelSearch" onclick="CloseSubWindow();__doPostBack('btnCancelSearch','')" type="button" value="キャンセル">
                        </p>

                        <div class="clearBoth"></div>

                        <div class="line"></div>

                        <ul class="HolizonListMenu1" style="text-align: left">
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

                        <div class="GridViewStyle1">
                            <div>
                                <table tabindex="7" class="GridViewSpace" id="gvEmp" style="border-collapse: collapse;" border="1" rules="all" cellspacing="0">
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
                                                <a tabindex="8" id="gvEmp_ctl02_hlEmp1" href="MT10EmpEditor.aspx?Id=001">001 : 佐藤　明</a>
                                            </td>
                                            <td style="width: 350px;">
                                                <a tabindex="9" id="gvEmp_ctl02_hlEmp2" href="MT10EmpEditor.aspx?Id=117">117 : 清水　弘子</a>
                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a tabindex="8" id="gvEmp_ctl03_hlEmp1" href="MT10EmpEditor.aspx?Id=002">002 : 鈴木　由美</a>
                                            </td>
                                            <td style="width: 350px;">
                                                <a tabindex="9" id="gvEmp_ctl03_hlEmp2" href="MT10EmpEditor.aspx?Id=118">118 : 山崎　浩二</a>
                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a tabindex="8" id="gvEmp_ctl04_hlEmp1" href="MT10EmpEditor.aspx?Id=003">003 : 高橋　正</a>
                                            </td>
                                            <td style="width: 350px;">
                                                <a tabindex="9" id="gvEmp_ctl04_hlEmp2" href="MT10EmpEditor.aspx?Id=119">119 : 森　真由美</a>
                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a tabindex="8" id="gvEmp_ctl05_hlEmp1" href="MT10EmpEditor.aspx?Id=004">004 : 田中　恵美</a>
                                            </td>
                                            <td style="width: 350px;">
                                                <a tabindex="9" id="gvEmp_ctl05_hlEmp2" href="MT10EmpEditor.aspx?Id=120">120 : 阿部　茂</a>
                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a tabindex="8" id="gvEmp_ctl06_hlEmp1" href="MT10EmpEditor.aspx?Id=005">005 : 渡辺　大輔</a>
                                            </td>
                                            <td style="width: 350px;">
                                                <a tabindex="9" id="gvEmp_ctl06_hlEmp2" href="MT10EmpEditor.aspx?Id=121">121 : 長谷川　久美子</a>
                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a tabindex="8" id="gvEmp_ctl07_hlEmp1" href="MT10EmpEditor.aspx?Id=100">100 : 伊藤　香織</a>
                                            </td>
                                            <td style="width: 350px;">
                                                <a tabindex="9" id="gvEmp_ctl07_hlEmp2" href="MT10EmpEditor.aspx?Id=122">122 : 村上　達也</a>
                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a tabindex="8" id="gvEmp_ctl08_hlEmp1" href="MT10EmpEditor.aspx?Id=101">101 : 山本　修</a>
                                            </td>
                                            <td style="width: 350px;">
                                                <a tabindex="9" id="gvEmp_ctl08_hlEmp2" href="MT10EmpEditor.aspx?Id=123">123 : 近藤　京子</a>
                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a tabindex="8" id="gvEmp_ctl09_hlEmp1" href="MT10EmpEditor.aspx?Id=102">102 : 中村　啓子</a>
                                            </td>
                                            <td style="width: 350px;">
                                                <a tabindex="9" id="gvEmp_ctl09_hlEmp2" href="MT10EmpEditor.aspx?Id=124">124 : 石井　勉</a>
                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a tabindex="8" id="gvEmp_ctl10_hlEmp1" href="MT10EmpEditor.aspx?Id=103">103 : 小林　和夫</a>
                                            </td>
                                            <td style="width: 350px;">
                                                <a tabindex="9" id="gvEmp_ctl10_hlEmp2" href="MT10EmpEditor.aspx?Id=125">125 : 坂本　美智子</a>
                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a tabindex="8" id="gvEmp_ctl11_hlEmp1" href="MT10EmpEditor.aspx?Id=104">104 : 加藤　幸子</a>
                                            </td>
                                            <td style="width: 350px;">
                                                <a tabindex="9" id="gvEmp_ctl11_hlEmp2" href="MT10EmpEditor.aspx?Id=126">126 : 遠藤　剛</a>
                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a tabindex="8" id="gvEmp_ctl12_hlEmp1" href="MT10EmpEditor.aspx?Id=105">105 : 吉田　和彦</a>
                                            </td>
                                            <td style="width: 350px;">
                                                <a tabindex="9" id="gvEmp_ctl12_hlEmp2" href="MT10EmpEditor.aspx?Id=127">127 : 青木　美穂</a>
                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a tabindex="8" id="gvEmp_ctl13_hlEmp1" href="MT10EmpEditor.aspx?Id=106">106 : 山田　純子</a>
                                            </td>
                                            <td style="width: 350px;">
                                                <a tabindex="9" id="gvEmp_ctl13_hlEmp2" href="MT10EmpEditor.aspx?Id=201">201 : 池田　優子</a>
                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a tabindex="8" id="gvEmp_ctl14_hlEmp1" href="MT10EmpEditor.aspx?Id=110">110 : 佐々木　勝利</a>
                                            </td>
                                            <td style="width: 350px;">
                                                <a tabindex="9" id="gvEmp_ctl14_hlEmp2" href="MT10EmpEditor.aspx?Id=202">202 : 橋本　淳</a>
                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a tabindex="8" id="gvEmp_ctl15_hlEmp1" href="MT10EmpEditor.aspx?Id=1100">1100 : 山田　太郎</a>
                                            </td>
                                            <td style="width: 350px;">
                                                <a tabindex="9" id="gvEmp_ctl15_hlEmp2" href="MT10EmpEditor.aspx?Id=203">203 : 山下　明美</a>
                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a tabindex="8" id="gvEmp_ctl16_hlEmp1" href="MT10EmpEditor.aspx?Id=111">111 : 山口　節子</a>
                                            </td>
                                            <td style="width: 350px;">
                                                <a tabindex="9" id="gvEmp_ctl16_hlEmp2" href="MT10EmpEditor.aspx?Id=204">204 : 石川　進</a>
                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a tabindex="8" id="gvEmp_ctl17_hlEmp1" href="MT10EmpEditor.aspx?Id=112">112 : 斉藤　清</a>
                                            </td>
                                            <td style="width: 350px;">
                                                <a tabindex="9" id="gvEmp_ctl17_hlEmp2" href="MT10EmpEditor.aspx?Id=205">205 : 中島　洋子</a>
                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a tabindex="8" id="gvEmp_ctl18_hlEmp1" href="MT10EmpEditor.aspx?Id=113">113 : 松本　順子</a>
                                            </td>
                                            <td style="width: 350px;">
                                                <a tabindex="9" id="gvEmp_ctl18_hlEmp2" href="MT10EmpEditor.aspx?Id=206">206 : 前田　大介</a>
                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a tabindex="8" id="gvEmp_ctl19_hlEmp1" href="MT10EmpEditor.aspx?Id=114">114 : 井上　健一</a>
                                            </td>
                                            <td style="width: 350px;">
                                                <a tabindex="9" id="gvEmp_ctl19_hlEmp2" href="MT10EmpEditor.aspx?Id=207">207 : 藤田　恵美子</a>
                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a tabindex="8" id="gvEmp_ctl20_hlEmp1" href="MT10EmpEditor.aspx?Id=115">115 : 木村　信子</a>
                                            </td>
                                            <td style="width: 350px;">
                                                <a tabindex="9" id="gvEmp_ctl20_hlEmp2" href="MT10EmpEditor.aspx?Id=208">208 : 小川　崇</a>
                                            </td>
                                        </tr>
                                        <tr style="background-color: white;">
                                            <td style="width: 350px;">
                                                <a tabindex="8" id="gvEmp_ctl21_hlEmp1" href="MT10EmpEditor.aspx?Id=116">116 : 林　浩一</a>
                                            </td>
                                            <td style="width: 350px;">
                                                <a tabindex="9" id="gvEmp_ctl21_hlEmp2" href="MT10EmpEditor.aspx?Id=209">209 : 後藤　和子</a>
                                            </td>
                                        </tr>
                                        <tr class="ButtonField1">
                                            <td colspan="2">
                                                <div class="line"></div>
                                                <ul class="HolizonListMenu1">
                                                    <li><a id="gvEmp_ctl23_LinkButton1" href="javascript:__doPostBack('gvEmp$ctl23$LinkButton1','')">最初へ</a></li>
                                                    <li><a id="gvEmp_ctl23_LinkButton2" href="javascript:__doPostBack('gvEmp$ctl23$LinkButton2','')">前へ</a></li>
                                                    <li><span>(1 / 2)</span></li>
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

                        <div class="line"></div>
                        <p class="ButtonField1"><input name="btnCancel" tabindex="10" id="btnCancel" onclick="CloseSubWindow();__doPostBack('btnCancel','')" type="button" value="キャンセル"></p>


                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
