<?php

namespace App\Repositories;

use App\Models\MT08Holiday;
use Illuminate\Support\Facades\DB;

class MT08HolidayRepository
{
    // 祝日を取得
    public function getHolidays()
    {
        return MT08Holiday::orderby('HLD_NO')->pluck('HLD_DATE');
    }

    public function getHolidaysWithCls($hld_cls_cd)
    {
        return DB::table('MT08_HOLIDAY')
                    ->where('HLD_CLS_CD', $hld_cls_cd)
                    ->orderby('HLD_DATE')
                    ->get();
    }

    public function deleteAll()
    {
        return DB::table('MT08_HOLIDAY')
                    ->delete();
    }

    public function insertHoliday($record)
    {
        return DB::table('MT08_HOLIDAY')
                    ->insert($record);
    }
}
