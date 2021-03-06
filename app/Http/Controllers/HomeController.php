<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // //////***** 勤怠管理 *****//////
    // /**
    //  * 出退勤入力処理
    //  *
    //  * @return view
    //  */
    // public function WorkTimeEditor()
    // {
    //     return view('work_time.WorkTimeEditor');
    // }

    /**
     * 出退勤入力(部門別) 処理
     *
     * @return view
     */
    public function WorkTimeDeptEditor()
    {
        return view('work_time.WorkTimeDeptEditor');
    }

    /**
     * 出退勤照会 処理
     *
     * @return view
     */
    public function EmpWorkStatusReference()
    {
        return view('work_time.EmpWorkStatusReference');
    }

    /**
     * 勤務状況照会(個人用) 処理
     *
     * @return view
     */
    public function WorkTimeReference()
    {
        return view('work_time.WorkTimeReference');
    }

    /**
     * 勤務状況照会(管理者用) 処理
     *
     * @return view
     */
    public function EmpWorkTimeReference()
    {
        return view('work_time.EmpWorkTimeReference');
    }

    //////***** 帳票 *****//////
    /**
     * 勤務予定表(週・月別) 処理
     *
     * @return view
     */
    public function WorkPlanPrint()
    {
        return view('form_print.WorkPlanPrint');
    }

    /**
     * 勤務実績表(日・週・月別) 処理
     *
     * @return view
     */
    public function WorkTimePrint()
    {
        return view('form_print.WorkTimePrint');
    }

    /**
     * 未打刻／二重打刻一覧表 処理
     *
     * @return view
     */
    public function TimeStampPrint()
    {
        return view('form_print.TimeStampPrint');
    }

    /**
     * 事由／勤怠一覧表 処理
     *
     * @return view
     */
    public function ReasonWorkPtnPrint()
    {
        return view('form_print.ReasonWorkPtnPrint');
    }

    /**
     * 残業申請書 処理
     *
     * @return view
     */
    public function OvertimeAplPrint()
    {
        return view('form_print.OvertimeAplPrint');
    }

    /////***** シフト管理　*****/////
    /**
     * シフトパターン情報入力 処理
     *
     * @return view
     */
    public function MT04ShiftPtnReference()
    {
        return view('shift.MT04ShiftPtnReference');
    }

    /**
     * シフトパターン情報入力(新規シフトパタン登録) 処理
     *
     * @return view
     */
    public function MT04ShiftPtnEditor()
    {
        return view('shift.MT04ShiftPtnEditor');
    }

    /**
     * 月別シフト入力 処理
     *
     * @return view
     */
    public function MonthShiftEditor()
    {
        return view('shift.MonthShiftEditor');
    }

    /**
     * 社員別月別シフト入力 処理
     *
     * @return view
     */
    public function MonthShiftEmpEditor()
    {
        return view('shift.MonthShiftEmpEditor');
    }

    /////***** 管理業務　*****/////

    /**
     * カレンダー情報入力画面 処理
     *
     * @return view
     */
    public function MT03CalendarEditor()
    {
        return view('mng_oprt.MT03CalendarEditor');
    }

    /**
     * シフト月次更新処理画面 処理
     *
     * @return view
     */
    public function ShiftCalendarCarryOver()
    {
        return view('mng_oprt.ShiftCalendarCarryOver');
    }

    /**
     * 月次確定処理画面 処理
     *
     * @return view
     */
    public function WorkTimeFix()
    {
        return view('mng_oprt.WorkTimeFix');
    }

    /**
     * 月次確定状況照会画面 処理
     *
     * @return view
     */
    public function WorkTimeFixReference()
    {
        return view('mng_oprt/WorkTimeFixReference');
    }

    /**
     * 最新打刻情報取得処理画面 処理
     *
     * @return view
     */
    public function WorkTimeConvert()
    {
        return view('mng_oprt/WorkTimeConvert');
    }

    /**
     * 出退勤情報クリア処理画面 処理
     *
     * @return view
     */
    public function WorkTimeClear()
    {
        return view('mng_oprt/WorkTimeClear');
    }

    /**
     * カレンダー情報クリア処理画面 処理
     *
     * @return view
     */
    public function CalendarClear()
    {
        return view('mng_oprt/CalendarClear');
    }

    /**
     * 勤務実績情報出力画面 処理
     *
     * @return view
     */
    public function WorkTimeExport()
    {
        return view('mng_oprt/WorkTimeExport');
    }


    /////***** マスタ　*****/////

    /**
     * 社員情報照会 処理
     *
     * @return view
     */
    public function MT10EmpReference()
    {
        return view('master.MT10EmpReference');
    }

    /**
     * 社員情報入力 処理
     *
     * @return view
     */
    public function MT10EmpEditor()
    {
        return view('master.MT10EmpEditor');
    }

    /**
     * ログイン情報入力 処理
     *
     * @return view
     */
    public function MT11LoginReference()
    {
        return view('master.MT11LoginReference');
    }

    /**
     * ログイン情報照会 処理
     *
     * @return view
     */
    public function MT11LoginEditor()
    {
        return view('master.MT11LoginEditor');
    }

    /**
     * パスワード変更入力 処理
     *
     * @return view
     */
    public function MT11PasswordEditor()
    {
        return view('master.MT11PasswordEditor');
    }

    /**
     * 機能権限情報入力 処理
     *
     * @return view
     */
    public function MT14PGAuthReference()
    {
        return view('master.MT14PGAuthReference');
    }

    /**
     * 機能権限情報照会 処理
     *
     * @return view
     */
    public function MT14PGAuthEditor()
    {
        return view('master.MT14PGAuthEditor');
    }

    /**
     * 部門情報参照 処理
     *
     * @return view
     */
    public function MT12DeptReference()
    {
        return view('master.MT12DeptReference');
    }

    /**
     * 部門情報入力 処理
     *
     * @return view
     */
    public function MT12DeptEditor()
    {
        return view('master.MT12DeptEditor');
    }

    /**
     * 部門情報入力 処理_test
     * いろいろテスト
     * @return view
     */
    public function table_add_test(Request $request)
    {
        // $request->validate([
        //     'txtUpDeptName' => 'required',
        //     'dept_id' => 'required',

        // ]);
        return view('master.table_add_test');
    }

    /**
     * 組織変更参照 処理
     *
     * @return view
     */
    public function MT12OrgReference()
    {
        return view('master.MT12OrgReference');
    }

    /**
     * 組織変更入力 処理
     *
     * @return view
     */
    public function MT12OrgEditor()
    {
        return view('master.MT12OrgEditor');
    }

    /**
     * 部門情報検索 処理
     *
     * @return view
     */
    public function UpDeptSearch()
    {
        return view('master.UpDeptSearch');
    }

    /**
     * 部門権限情報照会 処理
     *
     * @return view
     */
    public function MT13DeptAuthReference()
    {
        return view('master.MT13DeptAuthReference');
    }

    /**
     * 部門権限情報入力 処理
     *
     * @return view
     */
    public function MT13DeptAuthEditor()
    {
        return view('master.MT13DeptAuthEditor');
    }

    /**
     * 祝祭日・会社休日情報入力 処理
     *
     * @return view
     */
    public function MT08HolidayEditor()
    {
        return view('master.MT08HolidayEditor');
    }

    /**
     * 勤務体系情報照会 処理
     *
     * @return view
     */
    public function MT05WorkPtnReference()
    {
        return view('master.MT05WorkPtnReference');
    }

    /**
     * 勤務体系情報照会 処理
     *
     * @return view
     */
    public function MT05WorkPtnEditor()
    {
        return view('master.MT05WorkPtnEditor');
    }

    /**
     * 端数処理情報入力 処理
     *
     * @return view
     */
    public function MT07FractionEditor()
    {
        return view('master.MT07FractionEditor');
    }

    /**
     * カレンダーパターン情報照会 処理
     *
     * @return view
     */
    public function MT02CalendarPtnReference()
    {
        return view('master.MT02CalendarPtnReference');
    }

    /**
     * カレンダーパターン情報入力 処理
     *
     * @return view
     */
    public function MT02CalendarPtnEditor()
    {
        return view('master.MT02CalendarPtnEditor');
    }

    //未実施*******未実装

    /**
     * 残業上限情報入力 処理
     *
     * @return view
     */
    public function MT06OverTmLmtEditor()
    {
        return view('master.MT06OverTmLmtEditor');
    }

    /**
     * 基本情報入力 処理
     *
     * @return view
     */
    public function MT01ControlEditor()
    {
        return view('master.MT01ControlEditor');
    }

    /**
     * 有休情報照会 処理
     *
     * @return view
     */
    public function MT17PdHolidayReference()
    {
        return view('master.MT17PdHolidayReference');
    }

    /**
     * 有休情報入力 処理
     *
     * @return view
     */
    public function MT17PdHolidayEditor()
    {
        return view('master.MT17PdHolidayEditor');
    }

    /**
     * 社員番号一括変換 処理
     *
     * @return view
     */
    public function MT10EmpCnvert()
    {
        return view('master.MT10EmpCnvert');
    }

    /**
     * 社員情報書出処理　処理
     *
     * @return view
     */
    public function EmpExport()
    {
        return view('master.EmpExport');
    }

    /**
     * 社員情報取込処理　処理
     *
     * @return view
     */
    public function EmpImport()
    {
        return view('master.EmpImport');
    }

    /**
     * 所属情報照会 処理
     *
     * @return view
     */
    public function MT23CompanyReference()
    {
        return view('master.MT23CompanyReference');
    }

    /**
     * 所属情報入力 処理
     *
     * @return view
     */
    public function MT23CompanyEditor()
    {
        return view('master.MT23CompanyEditor');
    }


    //*****search sub-画面追加*****//

    /**
     * 部門情報検索（MT12DeptSearch) 処理
     *
     * @return view
     */
    public function MT12DeptSearch()
    {
        return view('search.MT12DeptSearch');
    }

    /**
     * 社員情報検索（MT10EmpSearch) 処理
     *
     * @return view
     */
    public function MT10EmpSearch()
    {
        return view('search.MT10EmpSearch');
    }
}
