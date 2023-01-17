<?php

namespace App\Repositories;

use App\Models\MT16DeptShiftCalendar;

class MT16DeptShiftCalendarRepository extends MT16DeptShiftCalendar
{
    /**
     * 部門、年度、月度、締日で該当レコードの存在チェックをする
     *
     * @param [type] $year
     * @param [type] $month
     * @param [type] $dept_cd
     * @param [type] $closing_date_cd
     * @return bool 該当データがあればtrue
     */
    public function existWithDeptYearMonthAndClosing($year, $month, $dept_cd, $closing_date_cd)
    {
        return $this->withDeptYearMonthAndClosing($year, $month, $dept_cd, $closing_date_cd)->exists();
    }

    public function insertRecord($record)
    {
        return MT16DeptShiftCalendar::insert($record);
    }

    /**
     * 部門、年度、月度、締日で該当レコードを取得する
     *
     * @param [type] $year
     * @param [type] $month
     * @param [type] $dept_cd
     * @param [type] $closing_date_cd
     * @return object 該当レコード
     */
    public function getWithDeptYearMonthAndClosing($year, $month, $dept_cd, $closing_date_cd)
    {
        return $this->withDeptYearMonthAndClosing($year, $month, $dept_cd, $closing_date_cd)->get();
    }

    private function withDeptYearMonthAndClosing($year, $month, $dept_cd, $closing_date_cd)
    {
        return MT16DeptShiftCalendar::where('CALD_YEAR', $year)
            ->where('CALD_MONTH', (int)$month)
            ->where('DEPT_CD', $dept_cd)
            ->where('CLOSING_DATE_CD', $closing_date_cd);
    }

    public function upsertMt16($records, $update_col)
    {
        return \DB::table($this->table)->upsert($records, $this->primaryKey, $update_col);
    }

    public function getWithPrimary($year, $month, $closing_date_cd, $dept_cd, $date)
    {
        return MT16DeptShiftCalendar::where('CALD_YEAR', $year)
            ->where('CALD_MONTH', (int)$month)
            ->where('DEPT_CD', $dept_cd)
            ->where('CLOSING_DATE_CD', $closing_date_cd)
            ->where('CALD_DATE', $date)
            ->first();
    }
}
