<?php

namespace App\Repositories\Master;

use App\Models\MT07Fraction;
use Illuminate\Support\Facades\DB;

class MT07FractionRepository extends MT07Fraction
{
    public function getDataWithPrimaryKey($id)
    {
        return DB::table('MT07_FRACTION')
                ->where('WORKPTN_CD', $id)
                ->first();
    }

    public function upsertFraction($record, $update_col)
    {
        return DB::table($this->table)
                ->upsert($record, $this->primaryKey, $update_col);
    }

    public function deleteFraction($record)
    {
        return DB::table('MT07_FRACTION')
                ->where('WORKPTN_CD', $record)
                ->delete();
    }
}
