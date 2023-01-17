<?php

namespace App\Repositories\Master;

use Illuminate\Http\Request;
use App\Models\MT02CalendarPtn;
use App\Models\MT05Workptn;

class MT02CalendarPtnRepository
{
    public function calendarPtns()
    {
        /**
         * カレンダーパターン情報取得
         * MT02CalendarPtnReference(カレンダーパターン情報入力「参照画面」)
         * @return $items (MT23CompanyReferenceController)
         */
        $calendarPtn = MT02CalendarPtn::where('CALENDAR_CLS_CD', '<>', '02')
            ->orderby('CALENDAR_CD')
            ->paginate(40);
        return $calendarPtn;
    }

    /**
     * 勤怠体系情報の取得
     * MT02CalendarPtnEditor(カレンダーパターン情報入力「勤怠体系ドロップダウン」)
     * @return void
     */
    public function workPtn()
    {
        $workptn = MT05Workptn::where('COM_CLS_CD', '01')->get();
        return $workptn;
    }

    /**
     * カレンダーパターン情報取得
     * MT02CalendarPtnEditor(カレンダーパターン情報入力「更新・修正用」)
     * @return void
     */
    public function calendarPtnsEdit($id)
    {
        $calendarPtnEdit = MT02CalendarPtn::where('CALENDAR_CLS_CD', '<>', '02')
            ->where('MT02_CALENDAR_PTN.CALENDAR_CD', $id)
            ->first();
        return $calendarPtnEdit;
    }


    public function getNormalCalendarCd()
    {
        return MT02CalendarPtn::select('CALENDAR_CD', 'CALENDAR_NAME')
                    ->WHERE('CALENDAR_CD', '<>', '999')
                    ->WHERE('CALENDAR_CLS_CD', '00')
                    ->orderBy('CALENDAR_CD')
                    ->get();
    }
}
