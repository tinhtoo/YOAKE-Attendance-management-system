<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\MT10EmpCnvertRequest;
use Illuminate\Support\Facades\DB;
use App\Repositories\MT93PgRepository;
use App\Repositories\TR01WorkRepository;
use App\Repositories\Master\MT10EmpRefRepository;
use App\Repositories\Master\MT11LoginRefRepository;
use App\Repositories\TR02EmpCalendarRepository;
use App\Repositories\TR50WorkTimeRepository;

/**
 * 社員番号一括変換
 */
class MT10EmpCnvertController extends Controller
{

    public function __construct(
        MT93PgRepository $pg_repository,
        TR01WorkRepository $tr01_work,
        MT10EmpRefRepository $mt10_emp_ref,
        MT11LoginRefRepository $mt11_login_ref,
        TR02EmpCalendarRepository $tr02_emp_calendar,
        TR50WorkTimeRepository $mt50_work_time
    ) {
        parent::__construct($pg_repository, '000019');
        $this->tr01 = $tr01_work;
        $this->mt10 = $mt10_emp_ref;
        $this->mt11 = $mt11_login_ref;
        $this->tr02 = $tr02_emp_calendar;
        $this->tr50 = $mt50_work_time;
    }

    /**
     * 社員番号一括変換 画面表示
     * @return view (MT10EmpCnvert.Blade)
     */
    public function index()
    {
        return parent::viewWithMenu('master.MT10EmpCnvert');
    }

    /**
     * 社員番号一括変換更新処理
     * [MT10_EMP],[MT11_LOGIN],[TR01_WORK],[TR02_EMPCALENDAR],[TR50_WORKTIME],[MT17_PDHOLIDAY]更新処理
     * キー：EMP_CDの修正
     * @return view (MT10EmpCnvert.Blade)
     */
    public function update(MT10EmpCnvertRequest $request)
    {
        // 画面から入力フォームデータ取得
        $old_emp_cd = $request->txtEmpCd;
        $new_emp_cd = $request->txtNewEmpCd;

        try {
            DB::beginTransaction();

            // 更新対象を取得
            $mt10EmpUpdate = $this->mt10->getEmp($old_emp_cd);
            $mt11LoginUpdate = $this->mt11->edit($old_emp_cd);
            $tr01WorkUpdates = $this->tr01->getWithEmpCd($old_emp_cd);
            $tr02EmpCalUpdates = $this->tr02->getWithEmpCd($old_emp_cd);
            $tr50WorktimeUpdates = $this->tr50->getWithEmpCd($old_emp_cd);

            // [MT10_EMP]更新
            if (isset($mt10EmpUpdate)) {
                $this->mt10->updateWithEmpCd(
                    $mt10EmpUpdate['EMP_CD'],
                    ['EMP_CD' => $new_emp_cd,]
                );
            }
            // [MT11_LOGIN]更新
            if (isset($mt11LoginUpdate)) {
                $this->mt11->updateWithEmpCd(
                    $mt11LoginUpdate['EMP_CD'],
                    ['EMP_CD' => $new_emp_cd,]
                );
            }
            // [TR01_WORK]更新
            if (isset($tr01WorkUpdates)) {
                $this->tr01->updateWithEmpCd(
                    $old_emp_cd,
                    ['EMP_CD' => $new_emp_cd,]
                );
            }
            // [TR02_EMPCALENDER]更新
            if (isset($tr02EmpCalUpdates)) {
                $this->tr02->updateWithEmpCd(
                    $old_emp_cd,
                    ['EMP_CD' => $new_emp_cd,]
                );
            }
            // [TR50_WORKTIME]更新
            if (isset($tr50WorktimeUpdates)) {
                $this->tr50->updateWithEmpCd(
                    $old_emp_cd,
                    ['EMP_CD' => $new_emp_cd,]
                );
            }
            DB::commit();
        } catch (\Throwable $e) {
            \Log::debug($e);
            DB::rollBack();
        }
        return redirect()->route('MT10EmpCnvert.index');
    }
}
