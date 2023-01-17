<?php

namespace App\Repositories;

use App\Models\LG01Worktimeconv;

class LG01WorktimeconvRepository
{
    /**
     * 最新の端末打刻取得履歴情報を取得
     *
     * @return
     */
    public function getList()
    {
        return LG01Worktimeconv::select(
            'LG01.TERM_NO',
            'MT95.TERM_NAME',
            'LG01.GET_FLG',
            'LG01.STR_DATE',
            'LG01.END_DATE',
            'LG01.ERR_CONT'
        )
            ->from('LG01_WORKTIMECONV as LG01')
            ->leftJoin('MT95_TERM as MT95', 'LG01.TERM_NO', '=', 'MT95.TERM_NO')
            ->where('LG01.STR_DATE', '=', function ($q) {
                $q->from('LG01_WORKTIMECONV as LG01_2')
                    ->whereColumn('LG01.TERM_NO', 'LG01_2.TERM_NO')
                    ->selectRaw('max (LG01_2.STR_DATE)');
            })
            ->orderBy('LG01.TERM_NO')
            ->get();
    }

    /**
     * 端末打刻データ取得の開始ログを登録
     *
     * @param $term_no 端末番号
     * @param $str_date データ取得開始時刻
     * @return void
     */
    public function logStart($term_no, $str_date)
    {
        LG01Worktimeconv::insert([
            'TERM_NO' => $term_no,
            'STR_DATE' => $str_date
        ]);
        return ;
    }

    /**
     * 端末から情報を正常に取得できた場合のログを登録
     *
     * @param [type] $term_no
     * @param [type] $str_date
     * @return void
     */
    public function logEnd($term_no, $str_date)
    {
        LG01Worktimeconv::wehre('TERM_NO', $term_no)
            ->where('STR_DATE', $str_date)
            ->update([
                'END_DATE' => date('Y/m/d H:i:s.v'),
                'GET_FLG' => '1'
            ]);
        return ;
    }

    /**
     * エラー発生時のログを登録
     *
     * @param string $term_no
     * @param string $str_date
     * @param object $exception
     * @return void
     */
    public function abend($term_no, $str_date, $exception)
    {
        LG01Worktimeconv::wehre('TERM_NO', $term_no)
            ->where('STR_DATE', $str_date)
            ->update([
                'END_DATE' => date('Y/m/d H:i:s.v'),
                'GET_FLG' => '0',
                'ERR_CONT' => $exception->getMessage()
            ]);
        return ;
    }
}
