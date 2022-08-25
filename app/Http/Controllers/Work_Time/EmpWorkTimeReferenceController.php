<?php

namespace App\Http\Controllers\Work_Time;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmpWorkTimeReferenceRequest;
use App\Repositories\Work_Time\EmpWorkTimeReferenceRepository;
use App\Filters\EmpWorkTimeRefFilter;
use App\Repositories\MT01ControlRepository;
use App\Repositories\MT23CompanyRepository;
use App\Repositories\MT93PgRepository;
use App\Repositories\MT94WorkDescRepository;
use Illuminate\Http\Request;

class EmpWorkTimeReferenceController extends Controller
{
    /**
     * リポジトリの実装
     *
     * @var
     */
    protected $control;
    protected $emp_repo;
    protected $work_desc;
    protected $company;

    /**
     * 新しいコントローラインスタンスの生成
     *
     * @param  UserRepository  $emp_repo
     * @return void
     */
    public function __construct(
        EmpWorkTimeReferenceRepository $emp_repo,
        MT01ControlRepository $mt01_control_repo,
        MT23CompanyRepository $mt23_company_repo,
        MT94WorkDescRepository $work_desc_repo,
        MT93PgRepository $pg_repository
    ) {
        parent::__construct($pg_repository, '010003');
        $this->emp_repo = $emp_repo;
        $this->control = $mt01_control_repo;
        $this->company = $mt23_company_repo;
        $this->work_desc = $work_desc_repo;
    }

    /**
     * 指定画面の表示
     *
     * @param  $request
     * @return view
     */
    public function empworktimeRef(Request $request)
    {
        $closing_dates = $this->emp_repo->shimebi();
        $company_list = $this->company->getDisp();

        // 年月の初期値設定
        $control = $this->control->getMt01();
        $today = date('Y-m-d');
        $def_ym = getYearAndMonthWithControl($today, $control->MONTH_CLS_CD, $control->CLOSING_DATE);
        $def_ddlDate = $def_ym['year']. "年". sprintf('%02d', $def_ym['month']). "月";

        return parent::viewWithMenu(
            'work_time.EmpWorkTimeReference',
            compact('closing_dates', 'def_ddlDate', 'company_list')
        );
    }

    /**
     * 指定ユーザーの詳細データの表示
     *
     * @param $request
     * @return Response
     */
    public function search(EmpWorkTimeReferenceRequest $request, EmpWorkTimeRefFilter $filter)
    {
        $input_datas = $request->all();
        $data = $request->only('filter');
        $search_data = $data['filter'];
        $results = $this->emp_repo->select($filter);
        $company_list = $this->company->getDisp();
        $closing_dates = $this->emp_repo->shimebi();
        $confirm_check = $this->emp_repo->confirm($request);

        $ovtm_header_names = $this->work_desc->getOvtms()->toArray(); // テーブルヘッダー（残業）
        $ext_header_names = $this->work_desc->getExts()->toArray(); // テーブルヘッダー（割増）

        return parent::viewWithMenu(
            'work_time.EmpWorkTimeReference',
            compact(
                'input_datas',
                'search_data',
                'results',
                'closing_dates',
                'company_list',
                'confirm_check',
                'ovtm_header_names',
                'ext_header_names'
            )
        );
    }

    public function cancel(Request $request)
    {
        return redirect()->back()->withInput($request->only([
            'filter.ddlDate',
        ]));
    }
}
