<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //////***** 勤怠管理 *****//////
    /**
     * 出退勤入力処理
     *
     * @return view
     */
    public function WorkTimeEditor()
    {
        return view('work_time.WorkTimeEditor');
    }

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
}
