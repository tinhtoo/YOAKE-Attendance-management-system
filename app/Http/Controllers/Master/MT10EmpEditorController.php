<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\MT10EmpEditRequest;
use App\Models\MT10Emp;
use App\Repositories\Master\MT10EmpRefRepository;
use App\Repositories\MT22ClosingDateRepository;
use App\Repositories\MT93PgRepository;
use Illuminate\Http\Request;

class MT10EmpEditorController extends Controller
{
    protected $emp_ref;
    protected $mt22_closing_date;
    /**
     * コンストラクタ
     * リポジトリのインスタンスを生成、格納
     *
     * @param  UserRepository  $emp_ref_repository
     * @return void
     */
    public function __construct(MT10EmpRefRepository $emp_ref_repository
                                , MT22ClosingDateRepository $mt22_closing_date_repository
                                , MT93PgRepository $pg_repository)
    {
        parent::__construct($pg_repository, '000001');
        $this->emp_ref = $emp_ref_repository;
        $this->mt22_closing_date = $mt22_closing_date_repository;
    }

    /**
     * 月や日に0を付与するために使用する。
     *
     * @param [string] $param
     * @return void
     */
    private function addZero($param) {
        return strlen($param) == 1 ? '0'.$param : $param;
    }

    /**
     * 画面表示
     * 引数がない、またはnullの場合は新規登録
     *
     * @param [type] $id
     * @return void
     */
    public function edit($id = null)
    {
        $emp_data = new MT10Emp();
        if ($id != null) {
            $emp_data = $this->emp_ref->getEmp($id);
        }
        $reg_cls_cd = $this->emp_ref->getRegClsCd();
        $sex_cls_cd = $this->emp_ref->getSexClsCd();
        $emp_csl1_cd = $this->emp_ref->getEmpCsl1Cd();
        $emp_csl2_cd = $this->emp_ref->getEmpCsl2Cd();
        $calendar_cd = $this->emp_ref->getCalendarCd();
        $dept_auth_cd = $this->emp_ref->getDeptAuthCd();
        $can_change_dept = $this->emp_ref->canChengeDept(session('id'));
        $closing_date_cd_list = $this->mt22_closing_date->getMt22();
        $def_closing_date_cd = $closing_date_cd_list->firstWhere('RSV1_CLS_CD', '01')->CLOSING_DATE_CD;
        $closing_date_disable = $this->emp_ref->existTr01Work($id);
        $company_cd = $this->emp_ref->getCompanyCd();

        return parent::viewWithMenu('master.MT10EmpEditor', compact('emp_data',
                    'reg_cls_cd', 'sex_cls_cd', 'emp_csl1_cd', 'emp_csl2_cd',
                    'calendar_cd', 'dept_auth_cd', 'can_change_dept', 'closing_date_cd_list',
                    'def_closing_date_cd', 'closing_date_disable', 'company_cd'));
    }

    public function update(MT10EmpEditRequest $request)
    {
        $today = date('Y-m-d H:i:s');

        $param = [
            'EMP_CD' => $request->EMP_CD,
            'EMP_NAME' => $request->EMP_NAME,
            'EMP_KANA' => $request->EMP_KANA,
            'EMP_ABR' => '',
            'DEPT_CD' => $request->DEPT_CD,
            'ENT_DATE' => $request->ENT_DATE
                        ? substr($request->ENT_DATE, 0, 4).substr($request->ENT_DATE, 7, 2).substr($request->ENT_DATE, 12, 2)
                        : '',
            'ENT_YEAR' => $request->ENT_DATE ? substr($request->ENT_DATE, 0, 4) : '',
            'ENT_MONTH' => $request->ENT_DATE ? (int)substr($request->ENT_DATE, 7, 2) : '',
            'ENT_DAY' => $request->ENT_DATE ? (int)substr($request->ENT_DATE, 12, 2) : '',
            'RET_DATE' => $request->RET_DATE
                        ? substr($request->RET_DATE, 0, 4).substr($request->RET_DATE, 7, 2).substr($request->RET_DATE, 12, 2)
                        : '',
            'RET_YEAR' => $request->RET_DATE ? substr($request->RET_DATE, 0, 4) : '',
            'RET_MONTH' => $request->RET_DATE ? (int)substr($request->RET_DATE, 7, 2) : '',
            'RET_DAY' => $request->RET_DATE ? (int)substr($request->RET_DATE, 12, 2) : '',
            'REG_CLS_CD' => $request->REG_CLS_CD,
            'BIRTH_DATE' => $request->BIRTH_DATE
                        ? substr($request->BIRTH_DATE, 0, 4).substr($request->BIRTH_DATE, 7, 2).substr($request->BIRTH_DATE, 12, 2)
                        : '',
            'BIRTH_YEAR' => $request->BIRTH_DATE ? substr($request->BIRTH_DATE, 0, 4) : '',
            'BIRTH_MONTH' => $request->BIRTH_DATE ? (int)substr($request->BIRTH_DATE, 7, 2) : '',
            'BIRTH_DAY' => $request->BIRTH_DATE ? (int)substr($request->BIRTH_DATE, 12, 2) : '',
            'SEX_CLS_CD' => $request->SEX_CLS_CD,
            'EMP_CLS1_CD' => $request->EMP_CLS1_CD,
            'EMP_CLS2_CD' => $request->EMP_CLS2_CD,
            'EMP_CLS3_CD' => '',
            'CALENDAR_CD' => $request->CALENDAR_CD,
            'DEPT_AUTH_CD' => $request->DEPT_AUTH_CD ?? '',
            'PG_AUTH_CD' => '',
            'POST_CD' => $request->POST_CD ?? '',
            'ADDRESS1' => $request->ADDRESS1 ?? '',
            'ADDRESS2' => $request->ADDRESS2 ?? '',
            'TEL' => $request->TEL ?? '',
            'CELLULAR' => $request->CELLULAR ?? '',
            'MAIL' => $request->MAIL ?? '',
            'RSV1_CLS_CD' => '',
            'RSV2_CLS_CD' => '',
            'UPD_DATE' => $today,
            'PH_GRANT' => $request->PH_GRANT_YM
                        ? substr($request->PH_GRANT_YM, 0, 4).substr($request->PH_GRANT_YM, 7, 2)
                        : '',
            'PH_GRANT_YEAR' => $request->PH_GRANT_YM ? substr($request->PH_GRANT_YM, 0, 4) : '',
            'PH_GRANT_MONTH' => $request->PH_GRANT_YM ? (int)substr($request->PH_GRANT_YM, 7, 2) : '',
            'CLOSING_DATE_CD' => $request->CLOSING_DATE_CD,
            'COMPANY_CD' => $request->COMPANY_CD ?? '',
            'EMP2_CD' => $request->EMP2_CD ?? '',
            'EMP3_CD' => '',
        ];
        $this->emp_ref->upsertEmp($param);

        if ($request->change != null) {
            return redirect('master/MT10EmpReference');
        }

        return redirect('master/MT10EmpEditor');
    }

    public function delete(Request $request)
    {
        $this->emp_ref->deleteEmp($request->EMP_CD);
        return redirect('master/MT10EmpReference');
    }
}
