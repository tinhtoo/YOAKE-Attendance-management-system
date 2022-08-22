<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MT12Dept;
use App\Repositories\MT93PgRepository;

class HomeController extends Controller
{
    public function __construct(MT93PgRepository $pg_repository)
    {
        parent::__construct($pg_repository);
    }

    //////***** 勤怠管理 *****//////
    /**
     * 出退勤入力処理
     *
     * @return view
     */
    public function WorkTimeEditor()
    {
        return parent::viewWithMenu('work_time.WorkTimeEditor');
    }

    /**
     * 出退勤入力(部門別) 処理
     *
     * @return view
     */
    public function WorkTimeDeptEditor()
    {
        return parent::viewWithMenu('work_time.WorkTimeDeptEditor');
    }

    /**
     * 勤務状況照会(管理者用) 処理
     *
     * @return view
     */
    public function EmpWorkTimeReference()
    {
        return parent::viewWithMenu('work_time.EmpWorkTimeReference');
    }

    //////***** 帳票 *****//////
    /**
     * 勤務予定表(週・月別) 処理
     *
     * @return view
     */
    public function WorkPlanPrint()
    {
        return parent::viewWithMenu('form_print.WorkPlanPrint');
    }

    /**
     * 勤務実績表(日・週・月別) 処理
     *
     * @return view
     */
    public function WorkTimePrint()
    {
        return parent::viewWithMenu('form_print.WorkTimePrint');
    }

    /**
     * 未打刻／二重打刻一覧表 処理
     *
     * @return view
     */
    public function TimeStampPrint()
    {
        return parent::viewWithMenu('form_print.TimeStampPrint');
    }

    /**
     * 事由／勤怠一覧表 処理
     *
     * @return view
     */
    public function ReasonWorkPtnPrint()
    {
        return parent::viewWithMenu('form_print.ReasonWorkPtnPrint');
    }

    /**
     * 残業申請書 処理
     *
     * @return view
     */
    public function OvertimeAplPrint()
    {
        return parent::viewWithMenu('form_print.OvertimeAplPrint');
    }

    /////***** シフト管理　*****/////
    /**
     * シフトパターン情報入力 処理
     *
     * @return view
     */
    public function MT04ShiftPtnReference()
    {
        return parent::viewWithMenu('shift.MT04ShiftPtnReference');
    }

    /**
     * シフトパターン情報入力(新規シフトパタン登録) 処理
     *
     * @return view
     */
    public function MT04ShiftPtnEditor()
    {
        return parent::viewWithMenu('shift.MT04ShiftPtnEditor');
    }

    /**
     * 月別シフト入力 処理
     *
     * @return view
     */
    public function MonthShiftEditor()
    {
        return parent::viewWithMenu('shift.MonthShiftEditor');
    }

    /**
     * 社員別月別シフト入力 処理
     *
     * @return view
     */
    public function MonthShiftEmpEditor()
    {
        return parent::viewWithMenu('shift.MonthShiftEmpEditor');
    }

    /////***** 管理業務　*****/////

    /**
     * カレンダー情報入力画面 処理
     *
     * @return view
     */
    public function MT03CalendarEditor()
    {
        return parent::viewWithMenu('mng_oprt.MT03CalendarEditor');
    }

    /**
     * シフト月次更新処理画面 処理
     *
     * @return view
     */
    public function ShiftCalendarCarryOver()
    {
        return parent::viewWithMenu('mng_oprt.ShiftCalendarCarryOver');
    }

    /**
     * 月次確定処理画面 処理
     *
     * @return view
     */
    public function WorkTimeFix()
    {
        return parent::viewWithMenu('mng_oprt.WorkTimeFix');
    }

    /**
     * 月次確定状況照会画面 処理
     *
     * @return view
     */
    public function WorkTimeFixReference()
    {
        return parent::viewWithMenu('mng_oprt.WorkTimeFixReference');
    }

    /**
     * 最新打刻情報取得処理画面 処理
     *
     * @return view
     */
    public function WorkTimeConvert()
    {
        return parent::viewWithMenu('mng_oprt.WorkTimeConvert');
    }

    /**
     * 出退勤情報クリア処理画面 処理
     *
     * @return view
     */
    public function WorkTimeClear()
    {
        return parent::viewWithMenu('mng_oprt.WorkTimeClear');
    }

    /**
     * カレンダー情報クリア処理画面 処理
     *
     * @return view
     */
    public function CalendarClear()
    {
        return parent::viewWithMenu('mng_oprt.CalendarClear');
    }

    /**
     * 勤務実績情報出力画面 処理
     *
     * @return view
     */
    public function WorkTimeExport()
    {
        return parent::viewWithMenu('mng_oprt.WorkTimeExport');
    }


    /////***** マスタ　*****/////

    /**
     * 社員情報照会 処理
     *
     * @return view
     */
    public function MT10EmpReference()
    {
        return parent::viewWithMenu('master.MT10EmpReference');
    }

    /**
     * 社員情報入力 処理
     *
     * @return view
     */
    public function MT10EmpEditor()
    {
        return parent::viewWithMenu('master.MT10EmpEditor');
    }

    /**
     * ログイン情報入力 処理
     *
     * @return view
     */
    public function MT11LoginReference()
    {
        return parent::viewWithMenu('master.MT11LoginReference');
    }

    /**
     * ログイン情報照会 処理
     *
     * @return view
     */
    public function MT11LoginEditor()
    {
        return parent::viewWithMenu('master.MT11LoginEditor');
    }

    /**
     * パスワード変更入力 処理
     *
     * @return view
     */
    public function MT11PasswordEditor()
    {
        return parent::viewWithMenu('master.MT11PasswordEditor');
    }

    /**
     * 機能権限情報入力 処理
     *
     * @return view
     */
    public function MT14PGAuthReference()
    {
        return parent::viewWithMenu('master.MT14PGAuthReference');
    }

    /**
     * 機能権限情報照会 処理
     *
     * @return view
     */
    public function MT14PGAuthEditor()
    {
        return parent::viewWithMenu('master.MT14PGAuthEditor');
    }

    /**
     * 部門情報参照 処理
     *
     * @return view
     */
    public function MT12DeptReference()
    {
        return parent::viewWithMenu('master.MT12DeptReference');
    }

    /**
     * 部門情報入力 処理
     *
     * @return view
     */
    public function MT12DeptEditor()
    {
        return parent::viewWithMenu('master.MT12DeptEditor');
    }

    /**
     * 組織変更参照 処理
     *
     * @return view
     */
    public function MT12OrgReference()
    {
        return parent::viewWithMenu('master.MT12OrgReference');
    }

    /**
     * 組織変更入力 処理
     *
     * @return view
     */
    public function MT12OrgEditor()
    {
        return parent::viewWithMenu('master.MT12OrgEditor');
    }

    /**
     * 部門情報検索 処理
     *
     * @return view
     */
    public function UpDeptSearch()
    {
        return parent::viewWithMenu('master.UpDeptSearch');
    }

    /**
     * 部門権限情報照会 処理
     *
     * @return view
     */
    public function MT13DeptAuthReference()
    {
        return parent::viewWithMenu('master.MT13DeptAuthReference');
    }

    /**
     * 部門権限情報入力  処理
     *
     * @return view
     */
    public function MT13DeptAuthEditor()
    {
        return parent::viewWithMenu('master.MT13DeptAuthEditor');
    }

    /**
     * 祝祭日・会社休日情報入力   処理
     *
     * @return view
     */
    public function MT08HolidayEditor()
    {
        return parent::viewWithMenu('master.MT08HolidayEditor');
    }

    /**
     * 勤務体系情報照会 処理
     *
     * @return view
     */
    public function MT05WorkPtnReference()
    {
        return parent::viewWithMenu('master.MT05WorkPtnReference');
    }

    /**
     * 勤務体系情報入力 処理
     *
     * @return view
     */
    public function MT05WorkPtnEditor()
    {
        return parent::viewWithMenu('master.MT05WorkPtnEditor');
    }
    /**
     * 端数処理情報入力  処理
     *
     * @return view
     */
    public function MT07FractionEditor()
    {
        return parent::viewWithMenu('master.MT07FractionEditor');
    }

    /**
     * カレンダーパターン情報照会 処理
     *
     * @return view
     */
    public function MT02CalendarPtnReference()
    {
        return parent::viewWithMenu('master.MT02CalendarPtnReference');
    }

    /**
     * カレンダーパターン情報入力 処理
     *
     * @return view
     */
    public function MT02CalendarPtnEditor()
    {
        return parent::viewWithMenu('master.MT02CalendarPtnEditor');
    }

    //*****未実施*******未実装*****//

    /**
     * 残業上限情報入力 処理
     *
     * @return view
     */
    public function MT06OverTmLmtEditor()
    {
        return parent::viewWithMenu('master.MT06OverTmLmtEditor');
    }

    /**
     * 基本情報入力 処理
     *
     * @return view
     */
    public function MT01ControlEditor()
    {
        return parent::viewWithMenu('master.MT01ControlEditor');
    }

    /**
     * 社員情報書出処理　処理
     *
     * @return view
     */
    public function EmpExport()
    {
        return parent::viewWithMenu('master.EmpExport');
    }

    /**
     * 社員情報取込処理　処理
     *
     * @return view
     */
    public function EmpImport()
    {
        return parent::viewWithMenu('master.EmpImport');
    }

    /**
     * 所属情報照会 処理
     *
     * @return view
     */
    public function MT23CompanyReference()
    {
        return parent::viewWithMenu('master.MT23CompanyReference');
    }

    /**
     * 所属情報入力 処理
     *
     * @return view
     */
    public function MT23CompanyEditor()
    {
        return parent::viewWithMenu('master.MT23CompanyEditor');
    }

    //*****search sub-画面追加*****//

    /**
     * 部門情報検索（MT12DeptSearch) 処理
     *
     * @return view
     */
    public function MT12DeptSearch()
    {
        $query = MT12Dept::all();

        return parent::viewWithMenu('search.MT12DeptSearch',['dept' => $query]);
    }

    /**
     * 社員情報検索（MT10EmpSearch) 処理
     *
     * @return view
     */
    public function MT10EmpSearch()
    {
        return parent::viewWithMenu('search.MT10EmpSearch');
    }
}
