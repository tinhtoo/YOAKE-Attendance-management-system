<?php

namespace App\Http\Controllers\Work_Time;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\EmpWorkStatusReferenceRequest;
use App\Filters\EmpWorkStatusRefFilter;
use App\Repositories\Master\MT10EmpRefRepository;
use App\Repositories\Master\MT11LoginRefRepository;
use App\Repositories\MT13DeptAuthRepository;
use App\Repositories\Mt23CompanyRepository;
use App\Repositories\TR50WorkTimeRepository;
use App\Repositories\MT93PgRepository;
use App\Repositories\TR01WorkRepository;

use function Symfony\Component\VarDumper\Dumper\esc;

/**
 * 出退勤照会
 */
class EmpWorkStatusReferenceController extends Controller
{
    /*
     * リポジトリの実装
     */
    private $mt10_emp;
    private $mt11_login;
    private $mt13_deptauth;
    private $mt23_company;
    private $tr50_worktime;
    private $tr01_work;

    /**
     * コントローラインスタンスの生成
     * @param  Repositorys
     * @return void
     */
    public function __construct(
        MT93PgRepository $pg_repository,
        MT10EmpRefRepository $mt10_emp_ref_repository,
        MT11LoginRefRepository $mt11_login_ref_repository,
        MT13DeptAuthRepository $mt13_dept_auth_repository,
        Mt23CompanyRepository $mt23_company_repository,
        TR50WorkTimeRepository $tr50_work_time_repository,
        TR01WorkRepository $tr01_work_repository
    ) {
        parent::__construct($pg_repository, '010004');
        $this->mt10_emp = $mt10_emp_ref_repository;
        $this->mt11_login = $mt11_login_ref_repository;
        $this->mt13_deptauth = $mt13_dept_auth_repository;
        $this->mt23_company = $mt23_company_repository;
        $this->tr50_worktime = $tr50_work_time_repository;
        $this->tr01_work = $tr01_work_repository;
    }

    /**
     * 出退勤照会 画面表示
     * @return view
     */
    public function empWorkStatusReference(Request $request)
    {
        $request->session()->put(['filter.ddlDate' => $request->old('filter.ddlDate')]);
        $haken_company = $this->mt23_company->getDisp();
        return parent::viewWithMenu('work_time.EmpWorkStatusReference', compact('haken_company'));
    }

    /**
     * 出退勤照会 画面各機能(データ渡し)処理
     * @return view
     */
    public function search(EmpWorkStatusReferenceRequest $request, EmpWorkStatusRefFilter $filter)
    {
        $search_data = $request->all();
        $login_emp_dept_cd = $this->mt10_emp->getEmp($this->mt11_login->getEmpCd(session('id')))->DEPT_CD;
        $view_dept = $this->mt13_deptauth->getChangeableDept(session('id'));
        $cald_date = substr($request['filter']['ddlDate'], 0, 4). substr($request['filter']['ddlDate'], 7, 2). substr($request['filter']['ddlDate'], 12, 2);

        // 一覧表示データ取得
        $empWorkTimeResults = $this->tr01_work->getEmpWorkStatusData($filter, $login_emp_dept_cd, $view_dept);

        // 端末名取得
        foreach ($empWorkTimeResults as $record) {
            $term_names_00 = $this->tr50_worktime->getTermName($record->EMP_CD, $cald_date, '00');
            if (!$term_names_00->isEmpty() && $term_names_00->count() === 1) {
                $record->OFC_TERM_NAME = $term_names_00->first()->TERM_NAME;
            }
            $term_names_01 = $this->tr50_worktime->getTermName($record->EMP_CD, $cald_date, '01');
            if (!$term_names_01->isEmpty() && $term_names_01->count() === 1) {
                $record->LEV_TERM_NAME = $term_names_01->first()->TERM_NAME;
            }
        }

        $work_count = "出勤人数:" . count($empWorkTimeResults->where('OFC_TIME', '<>', '')) . "人";
        $haken_company = $this->mt23_company->getDisp();
        return parent::viewWithMenu('work_time.EmpWorkStatusReference', compact(
            'empWorkTimeResults',
            'work_count',
            'search_data',
            'haken_company'
        ));
    }

    /**
     * 出退勤照会 画面機能キャンセル処理
     * @return view
     */
    public function cancel(Request $request)
    {
        return redirect()->route('empworkstatusRef')
                ->withInput(['filter.ddlDate' => $request['filter']['ddlDate']]);
    }
}
