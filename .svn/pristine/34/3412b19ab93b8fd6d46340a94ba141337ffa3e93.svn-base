<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MT23CompanyEditorRequest;
use App\Http\Requests\MT23CompanyRegisterRequest;
use App\Repositories\Master\Mt23CompanyRepository;
use App\Models\MT23Company;
use App\Models\MT91ClsDetail;
use App\Repositories\MT93PgRepository;

/**
 * 所属情報入力、所属情報照会
 */
class MT23CompanyController extends Controller
{
    /**
     * $Mt23Company_Repositoryリポジトリの実装
     * @var Mt23CompanyRepository
     */
    protected $Mt23Company_Repository;

    /**
     * コントローラインスタンスの生成
     * @param  Mt23CompanyRepository $Mt23Company_Repository
     * @return void
     */
    public function __construct(
        Mt23CompanyRepository $Mt23Company_Repository,
        MT93PgRepository $pg_repository
    ) {
        parent::__construct($pg_repository, '000022');
        $this->Mt23Company_Repository = $Mt23Company_Repository;
    }

    /**
     * 所属情報照会 画面表示
     * MT23 Comany会社名表示
     * @return view (MT23CompanyReference.blade)
     */
    public function MT23CompanyReferenceIndex(Request $request)
    {
        $haken_company = $this->Mt23Company_Repository->companyName();
        return parent::viewWithMenu('master.MT23CompanyReference', compact('haken_company'));
    }

    /**
     * 所属情報照会 登録画面表示
     * @return view (MT23CompanyEditor.blade)
     */
    public function registerIndex()
    {
        // 更新画面用データ取得
        $search_result = new MT23Company();
        $dispcls_cd = MT91ClsDetail::where('CLS_CD', '01')->orderBy('CLS_DETAIL_CD', 'ASC')->get();

        return parent::viewWithMenu('master.MT23CompanyEditor', ['search_result' => $search_result,
                                                                'dispcls_cd' => $dispcls_cd]);
    }

    /**
     * 所属情報照会 登録処理
     * @return view (MT23CompanyReference.blade)
     */
    public function companyRegister(MT23CompanyRegisterRequest $request)
    {
        // 登録
        $insetCompanyData = MT23Company::find($request->companyCd);
        if (!isset($insetCompanyData)) {
            $insetCompanyData = new MT23Company;
            $insetCompanyData->COMPANY_CD = $request->companyCd;
            $insetCompanyData->COMPANY_NAME = $request->companyName;
            $insetCompanyData->COMPANY_KANA = $request->companyKana;
            $insetCompanyData->COMPANY_ABR = $request->companyAbr;
            $insetCompanyData->POST_CD  = $request->txtPostCd ?? '';
            $insetCompanyData->ADDRESS1  = $request->txtAddress1 ?? '';
            $insetCompanyData->ADDRESS2  = $request->txtAddress2 ?? '';
            $insetCompanyData->ADDRESS3  = $request->txtAddress3 ?? '';
            $insetCompanyData->TEL  = $request->txtTel ?? '';
            $insetCompanyData->FAX  = $request->txtFax ?? '';
            $insetCompanyData->REMARK = "";
            if ($request->ddlDispCls == null) {
                $request->ddlDispCls = "";
                $insetCompanyData->DISP_CLS_CD = $request->ddlDispCls;
            } else {
                $insetCompanyData->DISP_CLS_CD  = $request->ddlDispCls;
            }
            $insetCompanyData->RSV1_CLS_CD = "";
            $insetCompanyData->RSV2_CLS_CD = "";
            $insetCompanyData->RSV1_TXT = "";
            $insetCompanyData->RSV2_TXT = "";
            // 登録日付（TimeZone->Asia/Tokyo)
            date_default_timezone_set('Asia/Tokyo');
            $insetCompanyData->UPD_DATE = now();
            $insetCompanyData->timestamps = false;
            $insetCompanyData->save();
        }
        return redirect()->route('MT23.registerIndex');
    }

    /**
     * 所属情報入力 詳細画面の表示
     * 修正モード
     * @return view (MT23CompanyEditor.blade)
     */
    public function edit($id)
    {
        // 更新画面用データ取得
        $search_result = MT23Company::where('COMPANY_CD', $id)->first();
        if ($search_result === null) {
            return parent::viewErrorWithMenu([
                'view_path' => '/master/MT23CompanyReference',
                'view_name' => '所属情報入力',
                'message' => '2000',
            ]);
        }

        $dispcls_cd = MT91ClsDetail::where('CLS_CD', '01')->orderBy('CLS_DETAIL_CD', 'ASC')->get();
        return parent::viewWithMenu('master.MT23CompanyEditor', ['search_result' => $search_result,
                                                                'dispcls_cd' => $dispcls_cd]);
    }

    /**
     * 所属情報入力 MT23Company更新処理
     * 修正モード
     * @return view (MT23CompanyEditor.blade)
     */
    public function update(MT23CompanyEditorRequest $request)
    {
        // 入力データを取得
        $inputData = $request->all();
        // MT23 Comany会社名取得
        $haken_company = $this->Mt23Company_Repository->companyName();

        // 更新処理(require)
        $mt23CompanyData = MT23Company::find($inputData['COMPANY_CD']);
        $mt23CompanyData->COMPANY_NAME = $request->companyName;
        $mt23CompanyData->COMPANY_KANA = $request->companyKana;
        $mt23CompanyData->COMPANY_ABR = $request->companyAbr;
        $mt23CompanyData->DISP_CLS_CD = $request->ddlDispCls;
        // 未入力時空文字で更新
        $mt23CompanyData->POST_CD = $request->txtPostCd ?? '';
        $mt23CompanyData->ADDRESS1 = $request->txtAddress1 ?? '';
        $mt23CompanyData->ADDRESS2 = $request->txtAddress2 ?? '';
        $mt23CompanyData->ADDRESS3 = $request->txtAddress3 ?? '';
        $mt23CompanyData->TEL = $request->txtTel ?? '';
        $mt23CompanyData->FAX = $request->txtFax ?? '';
        // 更新日付（TimeZone->Asia/Tokyo)
        date_default_timezone_set('Asia/Tokyo');
        $mt23CompanyData->UPD_DATE = now();
        $mt23CompanyData->timestamps = false;
        $mt23CompanyData->save();
        return redirect()->route('MT23.index', ['haken_company' => $haken_company]);
    }

    /**
     * 所属情報入力 MT23Companys削徐処理
     * 修正モード
     * @return view (MT23CompanyEditor.blade)
     */
    public function delete(Request $request, $id)
    {
        if (!isset($id)) {
            return redirect(route('MT23.edit'));
        }

        MT23Company::destroy($id);
        return redirect('master/MT23CompanyReference/');
    }

    /**
     * 所属情報入力 キャンセル処理
     *  @return view (MT23CompanyReference.blade)
     */
    public function cancel(Request $request, $id)
    {
        return redirect()->route('MT23.edit', $id)->withInput($request->only(['editCompanyCd',
                                                                              'editCompanyName',
                                                                              'editCompanyKana',
                                                                              'editCompanyAbr']));
    }
}
