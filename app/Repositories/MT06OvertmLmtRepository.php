<?php

namespace App\Repositories;

use App\Models\MT06OvertmLmt;
use App\Models\MT91ClsDetail;
use App\Models\MT94WorkDesc;
use Illuminate\Support\Facades\DB;

class MT06OvertmLmtRepository extends MT06OvertmLmt
{
    /**
     * 主キーで該当レコードを検索
     * 主キー：カレンダーコード
     *
     * @param  $calendar_cd
     * @return object
     */
    public function getWithPrimary($calendar_cd)
    {
        return MT06OvertmLmt::where('CALENDAR_CD', $calendar_cd)
                ->first();
    }
}
