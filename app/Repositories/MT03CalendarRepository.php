<?php

namespace App\Repositories;

use App\Models\MT03Calendar;

use App\Filters\MT03CalendarEditorFilter;
use Illuminate\Support\Facades\DB;

class MT03CalendarRepository extends MT03Calendar
{
    public function search(MT03CalendarEditorFilter $filter)
    {
        return MT03Calendar::filter($filter)
                    ->orderBy('CALD_YEAR')
                    ->orderBy('CALD_MONTH')
                    ->orderBy('CALD_DATE')
                    ->get();
    }

    public function upsertCalendar($record, $update_col)
    {
        return DB::table($this->table)->upsert($record, $this->primaryKey, $update_col);
    }

    public function deleteCalendar($calendar_cd, $cald_year, $cald_month, $closing_date_cd)
    {
        return MT03Calendar
                ::where('CALENDAR_CD', $calendar_cd)
                ->where('CALD_YEAR', $cald_year)
                ->where('CALD_MONTH', $cald_month)
                ->where('CLOSING_DATE_CD', $closing_date_cd)
                ->delete();
    }

    public function getWithPrimary($calendar_cd, $cald_year, $cald_month, $closing_date_cd, $cald_date)
    {
        return MT03Calendar::where('CALENDAR_CD', $calendar_cd)
                            ->where('CALD_YEAR', $cald_year)
                            ->where('CALD_MONTH', $cald_month)
                            ->where('CLOSING_DATE_CD', $closing_date_cd)
                            ->where('CALD_DATE', $cald_date)
                            ->first();
    }
}
