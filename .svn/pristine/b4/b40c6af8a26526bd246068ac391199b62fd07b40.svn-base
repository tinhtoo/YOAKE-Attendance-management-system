<?php
namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\MT01ControlEditorRequest;
use App\Models\MT01Control;
use App\Models\MT91ClsDetail;

use App\Repositories\MT93PgRepository;

class MT01ControlEditorController extends Controller
{
    public function __construct(MT93PgRepository $pg_repository)
    {
        parent::__construct($pg_repository, '000011');
    }

    public function index()
    {
        $mt01control = MT01Control::where("CONTROL_CD", "=", "1")->first();
        if ($mt01control == null) {
            $mt01control = new MT01Control();
        }

        // 月度リストボックスを取得
        $mt91list = MT91ClsDetail::where('CLS_CD', '06')->orderBy('CLS_DETAIL_CD', 'ASC')->get();

        // ビューに変数を渡す
        return parent::viewWithMenu('master.MT01ControlEditor', ['item' => $mt01control, 'monthlist' => $mt91list]);
    }

    public function update(MT01ControlEditorRequest $request)
    {
        // CONTROL_CD=1を修正
        $data = MT01Control::find("1");

        // 新規登録
        if ($data == null) {
            $data = new MT01Control;
            $data->CONTROL_CD = "1";
            $data->REMARK1 = $request->REMARK1 ?? "";
            $data->REMARK2 = $request->REMARK2 ?? "";
            $data->EMPFILE_PATH = $request->EMPFILE_PATH ?? "";
            $data->RSV1_PATH = $request->RSV1_PATH ?? "";
            $data->RSV2_PATH = $request->RSV2_PATH ?? "";
            $data->ADD_ZERO_NUM = $request->ADD_ZERO_NUM ?? "";
            $data->COMNT2 = $request->COMNT2 ?? "";
            $data->COMNT3 = $request->COMNT3 ?? "";
        }
        // 新規・修正
        // CONTROL_CDは1固定
        $request->CONTROL_CD=1;
        $data->CONTROL_CD = $request->CONTROL_CD;

        $data->COMPANY_NAME = $request->COMPANY_NAME;
        $data->COMPANY_KANA = $request->COMPANY_KANA;
        $data->COMPANY_ABR_NAME = $request->COMPANY_ABR_NAME;
        // 空白時は空文字
        $data->POST_CD = $request->POST_CD ?? "";
        $data->ADDRESS1 = $request->ADDRESS1 ?? "";
        $data->ADDRESS2 = $request->ADDRESS2 ?? "";
        $data->ADDRESS3 = $request->ADDRESS3 ?? "";
        $data->TEL = $request->TEL ?? "";
        $data->FAX = $request->FAX ?? "";
        $data->MAIL = $request->MAIL ?? "";
        $data->URL = $request->URL ?? "";

        // 選択されている締日コード
        $data->CLOSING_DATE = $request->CLOSING_DATE;
        // 選択されているコード
        $data->MONTH_CLS_CD = $request->MONTH_CLS_CD;
        // 選択されている月
        $data->TERM_STR_MONTH = $request-> TERM_STR_MONTH;

        // 空白時空文字
        $data->RSV1_CLS_CD = $request->RSV1_CLS_CD ?? "";

        // 空白時空文字
        $data->RSV2_CLS_CD = $request->RSV2_CLS_CD ?? "";

        // 日付
        date_default_timezone_set('Asia/Tokyo');
        $data->UPD_DATE = now();
        // 1で固定
        $data->ADD_ZERO_NUM = 1;

        // 空白時空文字
        $data->COMNT1 = $request->COMNT1 ?? "";
        $data->timestamps = false;
        $data->save();

        return redirect('master/MT01ControlEditor');
    }
}
