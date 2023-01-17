<!-- 基本情報入力 -->
@extends('menu.main')

@section('title', '基本情報入力')

@section('content')

    <div id="contents-stage">
        <table class="BaseContainerStyle2">
            <tbody>
                <tr>
                    <td>
                        <div id="">
                            <div class="wrapper">
                                <form action="{{ route('MT01.update') }}" method="post" id="M1cont" >
                                    @csrf
                                    <table class="InputFieldStyle1">
                                        <tbody>
                                            <tr>
                                                <input type="hidden" name="CONTROL_CD" value="{{$item->CONTROL_CD}}">
                                                <th>会社名</th>
                                                <td>
                                                    <input name="COMPANY_NAME" tabindex="1" id="COMPANY_NAME" style="width: 370px;" onfocus="this.select();"
                                                        type="text" maxlength="30" value="{{old('COMPANY_NAME',$item->COMPANY_NAME)}}">
                                                    @if ($errors->has('COMPANY_NAME'))
                                                    <span class="text-danger">{{ getArrValue($error_messages, $errors->first('COMPANY_NAME')) }}</span>
                                                    @endif
                                                </td>

                                            </tr>
                                            <tr>
                                                <th>会社カナ名</th>
                                                <td>
                                                    <input name="COMPANY_KANA" tabindex="2" id="COMPANY_KANA" style="width: 370px;"
                                                        onfocus="this.select();" type="text" maxlength="30" value="{{old('COMPANY_KANA',$item->COMPANY_KANA)}}">
                                                    @if ($errors->has('COMPANY_KANA'))
                                                    <span class="text-danger">{{ getArrValue($error_messages, $errors->first('COMPANY_KANA')) }}</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>会社略名</th>
                                                <td>
                                                    <input name="COMPANY_ABR_NAME" tabindex="3" id="COMPANY_ABR_NAME" style="width: 250px;"
                                                        onfocus="this.select();" type="text" maxlength="20" value="{{old('COMPANY_ABR_NAME',$item->COMPANY_ABR_NAME)}}">
                                                        @if ($errors->has('COMPANY_ABR_NAME'))
                                                            <span class="text-danger">{{ getArrValue($error_messages, $errors->first('COMPANY_ABR_NAME')) }}</span>
                                                        @endif

                                                </td>
                                            </tr>
                                            <tr>
                                                <th>郵便番号</th>
                                                <td>
                                                    <input name="POST_CD" tabindex="4" id="POST_CD" style="width: 60px;"
                                                        onfocus="this.select();" type="text" maxlength="8" value="{{old('POST_CD',$item->POST_CD)}}">

                                                </td>
                                            </tr>
                                            <tr>
                                                <th>住所１</th>
                                                <td>
                                                    <input name="ADDRESS1" tabindex="5"id="ADDRESS1" style="width: 370px;"
                                                        onfocus="this.select();" type="text" maxlength="30" value="{{old('ADDRESS1',$item->ADDRESS1)}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>住所２</th>
                                                <td>
                                                    <input name="ADDRESS2" tabindex="6" id="ADDRESS2" style="width: 370px;"
                                                        onfocus="this.select();" type="text" maxlength="30" value="{{old('ADDRESS2',$item->ADDRESS2)}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>住所３</th>
                                                <td>
                                                    <input name="ADDRESS3" tabindex="7" id="ADDRESS33" style="width: 370px;"
                                                        onfocus="this.select();" type="text" maxlength="30"value="{{old('ADDRESS3',$item->ADDRESS3)}}">

                                                </td>
                                            </tr>
                                            <tr>
                                                <th>電話番号</th>
                                                <td>
                                                    <input name="TEL" tabindex="8" id="TEL" style="width: 110px;"
                                                        onfocus="this.select();" type="text" maxlength="15" value="{{old('TEL',$item->TEL)}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>ＦＡＸ番号</th>
                                                <td>
                                                    <input name="FAX" tabindex="9" id="FAX" style="width: 110px;"
                                                        onfocus="this.select();" type="text" maxlength="15" value="{{old('FAX',$item->FAX)}}">


                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Ｅメール</th>
                                                <td>
                                                    <input name="MAIL" tabindex="10" id="MAIL" style="width: 350px;"
                                                        onfocus="this.select();" type="text" maxlength="50"value="{{old('MAIL',$item->MAIL)}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>URL</th>
                                                <td>
                                                    <input name="URL" tabindex="11" id="URL" style="width: 350px;"
                                                        onfocus="this.select();" type="text" maxlength="50" value="{{old('URL',$item->URL)}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>締日</th>
                                                <td>
                                                    <select name="CLOSING_DATE" tabindex="12" disabled
                                                            id="CLOSING_DATE" style="width: 50px;" maxlength="2">
                                                        <option value="5"  @if ('5' == old('CLOSING_DATE', $item->CLOSING_DATE)) selected @endif >5</option>
                                                        <option value="10" @if ('10' == old('CLOSING_DATE', $item->CLOSING_DATE)) selected @endif>10</option>
                                                        <option value="15" @if ('15' == old('CLOSING_DATE', $item->CLOSING_DATE)) selected @endif >15</option>
                                                        <option value="20" @if ('20' == old('CLOSING_DATE', $item->CLOSING_DATE)) selected @endif>20</option>
                                                        <option value="25" @if ('25' == old('CLOSING_DATE', $item->CLOSING_DATE)) selected @endif>25</option>
                                                        <option value="31"
                                                        @if (!empty($item->CLOSING_DATE)) @if ('31' == old('CLOSING_DATE', $item->CLOSING_DATE)) selected @endif
                                                        @else
                                                        selected="CLOSING_DATE"
                                                        @endif
                                                        >末</option>
                                                    </select>
                                                    日
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>月度</th>
                                                <td>
                                                    <select name="MONTH_CLS_CD" tabindex="13" disabled
                                                            id="MONTH_CLS_CD" style="width: 200px;" maxlength="15">
                                                    @foreach ($monthlist as $month)
                                                        <option value="{{ $month->CLS_DETAIL_CD }}" @if ($month->CLS_DETAIL_CD == (int) old('MONTH_CLS_CD', $item->MONTH_CLS_CD)) selected @endif>
                                                            {{ $month->CLS_DETAIL_NAME }}
                                                        </option>
                                                    @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>期首</th>
                                                <td>
                                                    <select name="TERM_STR_MONTH" tabindex="14" class="TERM_STR_MONTH" id="TERM_STR_MONTH" style="width: 50px;">
                                                        @if(!empty($item->TERM_STR_MONTH))
                                                            @for ($TERM_STR_MONTH = 1; $TERM_STR_MONTH <= 12; $TERM_STR_MONTH++)
                                                                <option value="{{ $TERM_STR_MONTH }}"  @if ($TERM_STR_MONTH == (int) old('TERM_STR_MONTH', $item->TERM_STR_MONTH)) selected @endif>{{ $TERM_STR_MONTH }}</option>
                                                            @endfor
                                                        @else
                                                            @for ($TERM_STR_MONTH2 = 1; $TERM_STR_MONTH2 <= 12; $TERM_STR_MONTH2++)
                                                                <option value="{{ $TERM_STR_MONTH2 }}" @if ($TERM_STR_MONTH2 == 1)selected @endif >{{ $TERM_STR_MONTH2 }}</option>
                                                            @endfor
                                                        @endif
                                                    </select>
                                                    月
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>出退勤入力コメント</th>
                                                <td>
                                                    <textarea name="COMNT1" tabindex="15" class="COMNT1"
                                                        id="COMNT1" style="width: 660px;" maxlength="80" onfocus="this.select();" rows="2" cols="20"
                                                    >{{ old('COMNT1',$item ->COMNT1)}}</textarea>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="line"></div>

                                    <!-- 更新ボタン押下時 -->
                                    <p class="ButtonField1">
                                        <input type="submit" class="ButtonStyle1" id="btnUpdate"
                                                name="btnUpdate" tabindex="16" value="更新"onclick="return checkSubmit(this)">
                                        <input name="btnCancel2" class="ButtonStyle2" id="btnCancel2"
                                                type="button" tabindex="17" value="キャンセル" onclick="location.href='MT01ControlEditor'">
                                    </p>
                                </form>

                                {{-- 確認ダイアル --}}
                                <script>
                                    function checkSubmit(){
                                        if(confirm("{{ getArrValue($error_messages, '1005') }}")){
                                            // 送信時有効
                                            document.getElementById("CLOSING_DATE").disabled = false;
                                            document.getElementById("MONTH_CLS_CD").disabled = false;
                                            document.getElementById("M1cont").submit();
                                            return true;
                                        }
                                        return false;
                                    }

                                    // ENTER時に送信されないようにする
                                    $(function(){
                                        $('input').not('[type="button"]').not('[type="submit"]').keypress(function(e){
                                            if(e.which == 13) {
                                                return false;
                                            }
                                        });

                                        // 入力可能文字：数値、ハイフン
                                        var onlyNumberAndBar = function(e) {
                                            var k = e.keyCode;
                                            // 0～9:code48-57, テンキ―0～9:code96-105, ハイフン:code189, テンキー:code109, backspace:code8, delete:code46, →:code39, ←:code37,Tab:code9,Enter:code13,insert:45 以外は入力キャンセル
                                            if(!((k >= 48 && k <= 57) || (k >= 96 && k <= 105) ||k == 189 || k == 109||k == 8 || k == 46 || k == 39 || k == 37 ||k == 9 ||k==13||k==45)) {
                                                return false;
                                            }
                                        };

                                        $('#POST_CD').on('keydown', onlyNumberAndBar);
                                        $('#TEL').on('keydown', onlyNumberAndBar);
                                        $('#FAX').on('keydown', onlyNumberAndBar);
                                    });

                                    {{-- フォーカス --}}
                                    // ｛会社名テキスト｝フォーカス
                                    $('#COMPANY_NAME').focus();
                                    @if($errors->has('COMPANY_NAME')
                                        || $errors->has('COMPANY_KANA')
                                        || $errors->has('COMPANY_ABR_NAME'))
                                    // エラー発生時のフォーカス
                                    $('#btnUpdate').focus();
                                    @endif
                                </script>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
