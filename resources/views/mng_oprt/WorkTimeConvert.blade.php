<!-- 最新打刻情報取得処理画面 -->
@extends('menu.main')
@section('title', '最新打刻情報取得処理')
@section('content')
    <div id="contents-stage">
        <table class="BaseContainerStyle2">
            <tbody>
                <tr>
                    <td>
                        <table class="style1">
                            <tbody>
                                <tr>
                                    <td align="center">
                                        <br>
                                        <br>
                                        <br>
                                        打刻用端末から最新の打刻データを取得します。<br>
                                        取得ボタンを押してください。<br>
                                        <br>
                                        <br>
                                        <br>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <input name="ctl00$cphContentsArea$btnGetWorkTimeData"
                                            id="ctl00_cphContentsArea_btnGetWorkTimeData"
                                            style="width: 200px; height: 40px;" type="submit" value="取得">
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <br>
                                        <br>
                                        <br>
                                        <span id="ctl00_cphContentsArea_lblMessage"></span>
                                        <br>
                                        <br>
                                        <br>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div id="ctl00_cphContentsArea_UpdatePanel1">

                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            <span id="ctl00_cphContentsArea_lblTitleWorkTimeConv">前回取得状況</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="line"></div>

                            <div class="GridViewStyle1" id="gridview-container">
                                <div class="GridViewPanelStyle1" style="width: 1158px;">
                                    <div id="ctl00_cphContentsArea_pnlWorkTimeConvert">

                                        <div>
                                            <table tabindex="2" class="GridViewBorder GridViewPadding GridViewRowCenter"
                                                id="ctl00_cphContentsArea_gvWorkTimeConvert"
                                                style="border-collapse: collapse;" border="1" rules="all" cellspacing="0">
                                                <tbody>
                                                    <tr>
                                                        <th scope="col">
                                                            端末番号
                                                        </th>
                                                        <th scope="col">
                                                            設置場所
                                                        </th>
                                                        <th scope="col">
                                                            結果
                                                        </th>
                                                        <th scope="col">
                                                            取得開始日
                                                        </th>
                                                        <th scope="col">
                                                            取得開始時刻
                                                        </th>
                                                        <th scope="col">
                                                            取得終了日
                                                        </th>
                                                        <th scope="col">
                                                            取得終了時刻
                                                        </th>
                                                        <th scope="col">
                                                            エラー内容
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <td class="GridViewRowLeft" style="width: 70px;">
                                                            <span
                                                                id="ctl00_cphContentsArea_gvWorkTimeConvert_ctl02_lblTermNo">1</span>
                                                        </td>
                                                        <td class="GridViewRowLeft" style="width: 110px;">
                                                            <span
                                                                id="ctl00_cphContentsArea_gvWorkTimeConvert_ctl02_lblTermName">本社</span>
                                                        </td>
                                                        <td style="width: 50px; background-color: red;">
                                                            <span
                                                                id="ctl00_cphContentsArea_gvWorkTimeConvert_ctl02_lblGetFlg">×</span>
                                                        </td>
                                                        <td class="GridViewRowLeft" style="width: 85px;">
                                                            <span
                                                                id="ctl00_cphContentsArea_gvWorkTimeConvert_ctl02_lblStrDate">2021/04/28</span>
                                                        </td>
                                                        <td class="GridViewRowLeft" style="width: 90px;">
                                                            <span
                                                                id="ctl00_cphContentsArea_gvWorkTimeConvert_ctl02_lblStrTime">10:17:50</span>
                                                        </td>
                                                        <td class="GridViewRowLeft" style="width: 85px;">
                                                            <span
                                                                id="ctl00_cphContentsArea_gvWorkTimeConvert_ctl02_lblEndDate">2021/04/28</span>
                                                        </td>
                                                        <td class="GridViewRowLeft" style="width: 90px;">
                                                            <span
                                                                id="ctl00_cphContentsArea_gvWorkTimeConvert_ctl02_lblEndTime">10:17:50</span>
                                                        </td>
                                                        <td class="GridViewRowLeft" style="width: 355px;">
                                                            <span
                                                                id="ctl00_cphContentsArea_gvWorkTimeConvert_ctl02_lblErrCont">このログインで要求されたデータベース
                                                                "its_worktmmng_v3" を開けません。ログインに失敗しました。
                                                                ユーザー 'its_work_user' はログインできませんでした。</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="GridViewRowLeft" style="width: 70px;">
                                                            <span
                                                                id="ctl00_cphContentsArea_gvWorkTimeConvert_ctl03_lblTermNo">2</span>
                                                        </td>
                                                        <td class="GridViewRowLeft" style="width: 110px;">
                                                            <span
                                                                id="ctl00_cphContentsArea_gvWorkTimeConvert_ctl03_lblTermName">第１工場事務所</span>
                                                        </td>
                                                        <td style="width: 50px; background-color: red;">
                                                            <span
                                                                id="ctl00_cphContentsArea_gvWorkTimeConvert_ctl03_lblGetFlg">×</span>
                                                        </td>
                                                        <td class="GridViewRowLeft" style="width: 85px;">
                                                            <span
                                                                id="ctl00_cphContentsArea_gvWorkTimeConvert_ctl03_lblStrDate">2021/04/28</span>
                                                        </td>
                                                        <td class="GridViewRowLeft" style="width: 90px;">
                                                            <span
                                                                id="ctl00_cphContentsArea_gvWorkTimeConvert_ctl03_lblStrTime">10:17:50</span>
                                                        </td>
                                                        <td class="GridViewRowLeft" style="width: 85px;">
                                                            <span
                                                                id="ctl00_cphContentsArea_gvWorkTimeConvert_ctl03_lblEndDate">2021/04/28</span>
                                                        </td>
                                                        <td class="GridViewRowLeft" style="width: 90px;">
                                                            <span
                                                                id="ctl00_cphContentsArea_gvWorkTimeConvert_ctl03_lblEndTime">10:17:50</span>
                                                        </td>
                                                        <td class="GridViewRowLeft" style="width: 355px;">
                                                            <span
                                                                id="ctl00_cphContentsArea_gvWorkTimeConvert_ctl03_lblErrCont">このログインで要求されたデータベース
                                                                "its_worktmmng_v3" を開けません。ログインに失敗しました。
                                                                ユーザー 'its_work_user' はログインできませんでした。</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="GridViewRowLeft" style="width: 70px;">
                                                            <span
                                                                id="ctl00_cphContentsArea_gvWorkTimeConvert_ctl04_lblTermNo">3</span>
                                                        </td>
                                                        <td class="GridViewRowLeft" style="width: 110px;">
                                                            <span
                                                                id="ctl00_cphContentsArea_gvWorkTimeConvert_ctl04_lblTermName">第１工場A棟</span>
                                                        </td>
                                                        <td style="width: 50px; background-color: red;">
                                                            <span
                                                                id="ctl00_cphContentsArea_gvWorkTimeConvert_ctl04_lblGetFlg">×</span>
                                                        </td>
                                                        <td class="GridViewRowLeft" style="width: 85px;">
                                                            <span
                                                                id="ctl00_cphContentsArea_gvWorkTimeConvert_ctl04_lblStrDate">2021/04/28</span>
                                                        </td>
                                                        <td class="GridViewRowLeft" style="width: 90px;">
                                                            <span
                                                                id="ctl00_cphContentsArea_gvWorkTimeConvert_ctl04_lblStrTime">10:17:50</span>
                                                        </td>
                                                        <td class="GridViewRowLeft" style="width: 85px;">
                                                            <span
                                                                id="ctl00_cphContentsArea_gvWorkTimeConvert_ctl04_lblEndDate">2021/04/28</span>
                                                        </td>
                                                        <td class="GridViewRowLeft" style="width: 90px;">
                                                            <span
                                                                id="ctl00_cphContentsArea_gvWorkTimeConvert_ctl04_lblEndTime">10:17:50</span>
                                                        </td>
                                                        <td class="GridViewRowLeft" style="width: 355px;">
                                                            <span
                                                                id="ctl00_cphContentsArea_gvWorkTimeConvert_ctl04_lblErrCont">このログインで要求されたデータベース
                                                                "its_worktmmng_v3" を開けません。ログインに失敗しました。
                                                                ユーザー 'its_work_user' はログインできませんでした。</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="GridViewRowLeft" style="width: 70px;">
                                                            <span
                                                                id="ctl00_cphContentsArea_gvWorkTimeConvert_ctl05_lblTermNo">4</span>
                                                        </td>
                                                        <td class="GridViewRowLeft" style="width: 110px;">
                                                            <span
                                                                id="ctl00_cphContentsArea_gvWorkTimeConvert_ctl05_lblTermName">第２工場</span>
                                                        </td>
                                                        <td style="width: 50px; background-color: red;">
                                                            <span
                                                                id="ctl00_cphContentsArea_gvWorkTimeConvert_ctl05_lblGetFlg">×</span>
                                                        </td>
                                                        <td class="GridViewRowLeft" style="width: 85px;">
                                                            <span
                                                                id="ctl00_cphContentsArea_gvWorkTimeConvert_ctl05_lblStrDate">2021/04/28</span>
                                                        </td>
                                                        <td class="GridViewRowLeft" style="width: 90px;">
                                                            <span
                                                                id="ctl00_cphContentsArea_gvWorkTimeConvert_ctl05_lblStrTime">10:17:50</span>
                                                        </td>
                                                        <td class="GridViewRowLeft" style="width: 85px;">
                                                            <span
                                                                id="ctl00_cphContentsArea_gvWorkTimeConvert_ctl05_lblEndDate">2021/04/28</span>
                                                        </td>
                                                        <td class="GridViewRowLeft" style="width: 90px;">
                                                            <span
                                                                id="ctl00_cphContentsArea_gvWorkTimeConvert_ctl05_lblEndTime">10:17:50</span>
                                                        </td>
                                                        <td class="GridViewRowLeft" style="width: 355px;">
                                                            <span
                                                                id="ctl00_cphContentsArea_gvWorkTimeConvert_ctl05_lblErrCont">このログインで要求されたデータベース
                                                                "its_worktmmng_v3" を開けません。ログインに失敗しました。
                                                                ユーザー 'its_work_user' はログインできませんでした。</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="GridViewRowLeft" style="width: 70px;">
                                                            <span
                                                                id="ctl00_cphContentsArea_gvWorkTimeConvert_ctl06_lblTermNo">5</span>
                                                        </td>
                                                        <td class="GridViewRowLeft" style="width: 110px;">
                                                            <span
                                                                id="ctl00_cphContentsArea_gvWorkTimeConvert_ctl06_lblTermName">北関東営業所</span>
                                                        </td>
                                                        <td style="width: 50px; background-color: red;">
                                                            <span
                                                                id="ctl00_cphContentsArea_gvWorkTimeConvert_ctl06_lblGetFlg">×</span>
                                                        </td>
                                                        <td class="GridViewRowLeft" style="width: 85px;">
                                                            <span
                                                                id="ctl00_cphContentsArea_gvWorkTimeConvert_ctl06_lblStrDate">2021/04/28</span>
                                                        </td>
                                                        <td class="GridViewRowLeft" style="width: 90px;">
                                                            <span
                                                                id="ctl00_cphContentsArea_gvWorkTimeConvert_ctl06_lblStrTime">10:17:50</span>
                                                        </td>
                                                        <td class="GridViewRowLeft" style="width: 85px;">
                                                            <span
                                                                id="ctl00_cphContentsArea_gvWorkTimeConvert_ctl06_lblEndDate">2021/04/28</span>
                                                        </td>
                                                        <td class="GridViewRowLeft" style="width: 90px;">
                                                            <span
                                                                id="ctl00_cphContentsArea_gvWorkTimeConvert_ctl06_lblEndTime">10:17:51</span>
                                                        </td>
                                                        <td class="GridViewRowLeft" style="width: 355px;">
                                                            <span
                                                                id="ctl00_cphContentsArea_gvWorkTimeConvert_ctl06_lblErrCont">このログインで要求されたデータベース
                                                                "its_worktmmng_v3" を開けません。ログインに失敗しました。
                                                                ユーザー 'its_work_user' はログインできませんでした。</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="line"></div>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
