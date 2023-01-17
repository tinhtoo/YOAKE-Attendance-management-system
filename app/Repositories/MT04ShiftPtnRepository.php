<?php

namespace App\Repositories;

use App\Models\MT04ShiftPtn;

class MT04ShiftPtnRepository extends MT04ShiftPtn
{
    public function getWithShiftPtnCd($shift_ptn_cd)
    {
        return MT04ShiftPtn::where('SHIFTPTN_CD', $shift_ptn_cd)
                    ->orderBy('SHIFTPTN_CD')
                    ->orderBy('DAY_NO')
                    ->get();
    }

    public function getShiftPtn()
    {
        return MT04ShiftPtn::selectRaw('distinct SHIFTPTN_CD, SHIFTPTN_NAME')
                    ->orderBy('SHIFTPTN_CD')
                    ->get();
    }

    public function getJoinWorkptn($shift_ptn_cd)
    {
        return MT04ShiftPtn::select('DAY_NO', 'MT04.WORKPTN_CD', 'WORKPTN_NAME', 'WORK_CLS_CD')
                    ->from('MT04_SHIFTPTN as MT04')
                    ->leftJoin('MT05_WORKPTN as MT05', 'MT04.WORKPTN_CD', '=', 'MT05.WORKPTN_CD')
                    ->where('SHIFTPTN_CD', $shift_ptn_cd)
                    ->orderBy('DAY_NO')
                    ->get();
    }

    public function getShiftPtnPage()
    {
        return \DB::table('MT04_SHIFTPTN')
                    ->select('SHIFTPTN_CD', 'SHIFTPTN_NAME')
                    ->groupByRaw('SHIFTPTN_CD, SHIFTPTN_NAME')
                    ->orderBy('SHIFTPTN_CD')
                    ->paginate(40);
    }

    public function getPrimaryKey($id)
    {
        return \DB::table('MT04_SHIFTPTN')
                    ->where('SHIFTPTN_CD', $id)
                    ->first();
    }

    public function deleteShiftPtnWithCd($cd)
    {
        return \DB::table('MT04_SHIFTPTN')
            ->where('SHIFTPTN_CD', $cd)
            ->delete();
    }

    public function upsertShiftPtn($record)
    {
        return \DB::table($this->table)
                ->upsert($record, $this->primaryKey, $this->fillable);
    }
}
