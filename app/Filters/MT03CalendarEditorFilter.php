<?php

namespace App\Filters;

use App\Filters\Filter;
use Illuminate\Http\Request;

class MT03CalendarEditorFilter extends Filter
{
    /**
     * filter properties.
     */
    protected $filters = [
        'filter' => [
            'calendarCd',
            'caldYearMonth',
            'closingDateCd',
        ]
    ];

    // カレンダーコード
    public function calendarCd($value)
    {
        $this->builder->where('MT03_CALENDAR.CALENDAR_CD', $value);
    }

    // 年
    public function caldYearMonth($value)
    {
        $this->builder->where('MT03_CALENDAR.CALD_YEAR', substr($value, 0, 4))
                      ->where('MT03_CALENDAR.CALD_MONTH', (int)substr($value, 7, 2));
    }

    // 締日
    public function closingDateCd($value)
    {
        $this->builder->where('MT03_CALENDAR.CLOSING_DATE_CD', $value);
    }
}
