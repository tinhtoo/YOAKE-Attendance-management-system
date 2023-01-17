<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\MT09Reason;

class MT09ReasonRepository
{
    /**
     * 事由を全件取得
     *
     * @return object
     */
    public function reasons()
    {
        return MT09Reason::get();
    }

    /**
     * 主キー(REASON_CD)で該当レコードを取得
     *
     * @param $reason_cd
     * @return object
     */
    public function getWithPrimary($reason_cd)
    {
        return MT09Reason::where('REASON_CD', $reason_cd)->first();
    }
}
