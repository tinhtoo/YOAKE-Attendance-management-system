<?php

namespace App\Repositories;

use App\Models\MT94WorkDesc;

class MT94WorkDescRepository
{
    /**
     * 出退勤の残業系ヘッダー名を取得（CLS_CDは"01"）
     *
     * @return WORK_DESK_CLS_CDが02の行、WORK_DESK_CD昇順
     */
    public function getOvtms()
    {
        return MT94WorkDesc::select('WORK_DESC_CD', 'WORK_DESC_NAME', 'WORK_DESC_CLS_CD')
            ->where('WORK_DESC_CLS_CD', '01')
            ->orderby('WORK_DESC_CD')
            ->get();
    }

    /**
     * 出退勤の割増系ヘッダー名を取得（CLS_CDは"02"）
     *
     * @return WORK_DESK_CLS_CDが02の行、WORK_DESK_CD昇順
     */
    public function getExts()
    {
        return MT94WorkDesc::select('WORK_DESC_CD', 'WORK_DESC_NAME', 'WORK_DESC_CLS_CD')
            ->where('WORK_DESC_CLS_CD', '02')
            ->orderby('WORK_DESC_CD')
            ->get();
    }

    public function isRegularWork($work_desc_cd)
    {
        return MT94WorkDesc::where('WORK_DESC_CD', $work_desc_cd)
            ->where('WORK_DESC_CLS_CD', '00')
            ->exists();
    }
    
    /**
     * RSV1_CLS_CDを取得
     * 該当データ無しの場合は空文字を返す
     *
     * @param $work_desc_cd
     * @return string RSV1_CLS_CD
     */
    public function getBreakTimePriority($work_desc_cd)
    {
        $result = MT94WorkDesc::where('WORK_DESC_CD', $work_desc_cd)
                    ->first();
        if (is_null($result)) {
            return '';
        }
        return $result->RSV1_CLS_CD;
    }
}
