<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\MT99Msg;

class MT99MsgRepository
{
    /**
     * メッセージ全件を取得
     * 共通処理で利用する
     *
     * @return
     */
    public function getAllMsgs()
    {
        return MT99Msg::select('MSG_NO', 'MSG_CONT')
            ->get()->pluck('MSG_CONT', 'MSG_NO');
    }

    /**
     * 引数で指定されたメッセージを複数件取得して返す
     * 例：getMsgs('2004','2005')
     *
     * @param String ...$MessageNumbers
     * @return
     */
    public function getMsgs(String ...$MessageNumbers)
    {
        return MT99Msg::select('MSG_NO', 'MSG_CONT')
            ->whereIn('MSG_NO', $MessageNumbers)
            ->get()->pluck('MSG_CONT', 'MSG_NO');
    }
}
