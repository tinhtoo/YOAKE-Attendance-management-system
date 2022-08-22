<?php

namespace App\Repositories;

use App\Models\MT91ClsDetail;


class MT91ClsDetailRepository
{
    public function getClsDetailName($cls_cd)
    {
        return MT91ClsDetail::select('CLS_DETAIL_CD','CLS_DETAIL_NAME')
            ->where('CLS_CD', $cls_cd)
            ->orderby('CLS_DETAIL_CD')
            ->get();
    }
}
