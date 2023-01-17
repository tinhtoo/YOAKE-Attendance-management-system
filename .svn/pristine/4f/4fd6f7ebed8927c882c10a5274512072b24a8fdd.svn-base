<?php

namespace App\Http\Controllers\Mng_Oprt;

use App\Filters\WorkTimeClearFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\WorkTimeClearRequest;
use App\Models\TR50WorkTime;
use App\Repositories\Master\MT10EmpRefRepository;
use App\Repositories\MT13DeptAuthRepository;
use Illuminate\Http\Request;
use App\Repositories\MT93PgRepository;
use App\Repositories\Search\MT12DeptSearchRepository;
use App\Repositories\TR01WorkRepository;
use App\Repositories\TR50WorkTimeRepository;

use function Symfony\Component\VarDumper\Dumper\esc;

/**
 * 出退勤情報クリア処理画面
 */
class WorkTimeClearController extends Controller
{
    private $mt10_emp;
    private $mt12_dept;
    private $mt13_dept_auth;
    private $tr01_work;
    private $tr50_worktime;
    private $today;
    /**
     * コントローラインスタンスの生成
     * @param
     * @return void
     */
    public function __construct(
        MT10EmpRefRepository $mt10_emp_rep,
        MT12DeptSearchRepository $mt12_dept_search_rep,
        MT13DeptAuthRepository $mt13_dept_auth_rep,
        TR01WorkRepository $tr01_work_rep,
        TR50WorkTimeRepository $tr50_worktime_rep,
        MT93PgRepository $pg_repository
    ) {
        parent::__construct($pg_repository, '040007');
        $this->mt10_emp = $mt10_emp_rep;
        $this->mt12_dept = $mt12_dept_search_rep;
        $this->mt13_dept_auth = $mt13_dept_auth_rep;
        $this->tr01_work = $tr01_work_rep;
        $this->tr50_worktime = $tr50_worktime_rep;
    }

    /**
     * 出退勤情報クリア処理画面表示
     * @return view
     */
    public function index(Request $request)
    {
        $disp_cls_cd = '01';
        $dept_list = $this->mt12_dept->getSorted($disp_cls_cd);
        $changeable_dept_cd_list = $this->mt13_dept_auth->getChangeableDept(
            session('id'),
            $disp_cls_cd
        )->pluck('DEPT_CD')->toArray();
        $changeable_dept_cd_list[] = $this->mt10_emp->getDeptWithLoginCd(session('id'))->DEPT_CD;
        return parent::viewWithMenu('mng_oprt.WorkTimeClear', compact('dept_list', 'changeable_dept_cd_list'));
    }

    /**
     * 出退勤情報クリア処理
     * @return view
     */
    public function clear(WorkTimeClearRequest $request, WorkTimeClearFilter $filter)
    {
        $clear_category = $request['clearCategory'];
        $key_list = $clear_category ? $this->omitDisableDept($request['deptCd']) : [$request['txtEmpCd']];
        $this->today = date('Y-m-d H:i:s');

        try {
            \DB::beginTransaction();

            // 更新処理
            // 部門ごとに一括、または社員一括で更新を行う
            foreach ($key_list as $key) {
                $this->updateFunc($clear_category, $key, $filter);
            }

            \DB::commit();
        } catch (\Throwable $e) {
            \Log::debug($e);
            \DB::rollBack();
        }

        return redirect('mng_oprt/WorkTimeClear');
    }

    /**
     * 画面から渡された部門コード配列から、権限外の部門を除外した配列を返す。
     *
     * @param [type] $dept_cd_list
     * @return array
     */
    private function omitDisableDept($dept_cd_list) :array
    {
        $checkable_dept_cd_list = $this->mt13_dept_auth->getChangeableDept(session('id'), '01')->pluck('DEPT_CD')->toArray();
        $checkable_dept_cd_list[] = $this->mt10_emp->getDeptWithLoginCd(session('id'))->DEPT_CD;
        return array_intersect($dept_cd_list, $checkable_dept_cd_list);
    }

    private function updateFunc($dept_flg, $key, $filter)
    {
        foreach ($this->tr01_work->getWorkWithEmpOrDept($dept_flg, $filter, $key) as $tr01) {
            $this->tr01_work->updateWithKey($tr01->EMP_CD, $tr01->CALD_DATE, $this->createTr01ClearData($tr01));
            $this->tr50_worktime->update50WorkWithEmpCdCaldDate($tr01->EMP_CD, $tr01->CALD_DATE, $this->createTr50ClearData());
        }

        return ;
    }

    private function createTr01ClearData($tr01)
    {
        return [
              'OFC_TIME_HH'    => null         , 'OFC_TIME_MI'    => null       , 'OFC_CNT'  => 0
            , 'LEV_TIME_HH'    => null         , 'LEV_TIME_MI'    => null       , 'LEV_CNT'  => 0
            , 'OUT1_TIME_HH'   => null         , 'OUT1_TIME_MI'   => null       , 'OUT1_CNT' => 0
            , 'IN1_TIME_HH'    => null         , 'IN1_TIME_MI'    => null       , 'IN1_CNT'  => 0
            , 'OUT2_TIME_HH'   => null         , 'OUT2_TIME_MI'   => null       , 'OUT2_CNT' => 0
            , 'IN2_TIME_HH'    => null         , 'IN2_TIME_MI'    => null       , 'IN2_CNT'  => 0
            , 'WORK_TIME_HH'   => 0            , 'WORK_TIME_MI'   => 0
            , 'TARD_TIME_HH'   => 0            , 'TARD_TIME_MI'   => 0
            , 'LEAVE_TIME_HH'  => 0            , 'LEAVE_TIME_MI'  => 0
            , 'OUT_TIME_HH'    => 0            , 'OUT_TIME_MI'    => 0
            , 'OVTM1_TIME_HH'  => 0            , 'OVTM1_TIME_MI'  => 0
            , 'OVTM2_TIME_HH'  => 0            , 'OVTM2_TIME_MI'  => 0
            , 'OVTM3_TIME_HH'  => 0            , 'OVTM3_TIME_MI'  => 0
            , 'OVTM4_TIME_HH'  => 0            , 'OVTM4_TIME_MI'  => 0
            , 'OVTM5_TIME_HH'  => 0            , 'OVTM5_TIME_MI'  => 0
            , 'OVTM6_TIME_HH'  => 0            , 'OVTM6_TIME_MI'  => 0
            , 'OVTM7_TIME_HH'  => 0            , 'OVTM7_TIME_MI'  => 0
            , 'OVTM8_TIME_HH'  => 0            , 'OVTM8_TIME_MI'  => 0
            , 'OVTM9_TIME_HH'  => 0            , 'OVTM9_TIME_MI'  => 0
            , 'OVTM10_TIME_HH' => 0            , 'OVTM10_TIME_MI' => 0
            , 'EXT1_TIME_HH'   => 0            , 'EXT1_TIME_MI'   => 0
            , 'EXT2_TIME_HH'   => 0            , 'EXT2_TIME_MI'   => 0
            , 'EXT3_TIME_HH'   => 0            , 'EXT3_TIME_MI'   => 0
            , 'EXT4_TIME_HH'   => 0            , 'EXT4_TIME_MI'   => 0
            , 'EXT5_TIME_HH'   => 0            , 'EXT5_TIME_MI'   => 0
            , 'RSV1_TIME_HH'   => 0            , 'RSV1_TIME_MI'   => 0
            , 'RSV2_TIME_HH'   => 0            , 'RSV2_TIME_MI'   => 0
            , 'RSV3_TIME_HH'   => 0            , 'RSV3_TIME_MI'   => 0
            , 'WORKDAY_CNT'    => 0            , 'HOLWORK_CNT'    => 0
            , 'SPCHOL_CNT'     => $tr01->SPCHOL_CLS_CD  == '02' ? $tr01->SPCHOL_CNT  : 0
            , 'PADHOL_CNT'     => $tr01->PADHOL_CLS_CD  == '02' ? $tr01->PADHOL_CNT  : 0
            , 'ABCWORK_CNT'    => $tr01->ABCWORK_CLS_CD == '02' ? $tr01->ABCWORK_CNT : 0
            , 'COMPDAY_CNT'    => $tr01->COMPDAY_CLS_CD == '02' ? $tr01->COMPDAY_CNT : 0
            , 'RSV1_CNT'       => $tr01->RSV1_CLS_CD    == '02' ? $tr01->RSV1_CNT    : 0
            , 'RSV2_CNT'       => 0
            , 'RSV3_CNT'       => 0
            , 'UPD_CLS_CD'     => '00'
            , 'FIX_CLS_CD'     => '00'
            , 'RSV1_CLS_CD'    => ''
            , 'RSV2_CLS_CD'    => ''
            , 'UPD_DATE'       => $this->today
            , 'REMARK'         => ''
            , 'SUBHOL_CNT'     => $tr01->SUBHOL_CLS_CD == '02' ? $tr01->SUBWORK_CNT : 0
            , 'SUBWORK_CNT'    => $tr01->SUBWORK_CLS_CD == '02' ? $tr01->SUBWORK_CNT : 0
        ];
    }

    /**
     * TR50_WORKTIMEのクリア用更新データを返す
     *
     * @param
     * @return Array
     */
    private function createTr50ClearData() : Array
    {
        return [
              'DATA_OUT_CLS_CD' => '00'
            , 'DATA_OUT_DATE'   => ''
            , 'CALD_DATE'       => null
        ];
    }
}
