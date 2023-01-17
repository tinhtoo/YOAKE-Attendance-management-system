<?php

namespace App\Repositories\Master;

use App\Models\MT14PgAuth;
use Illuminate\Support\Facades\DB;

class MT14AuthRefRepository extends MT14PgAuth
{
    public function getPgAuthPage()
    {
        return DB::table('MT14_PG_AUTH')
                ->select('PG_AUTH_CD', 'PG_AUTH_NAME')
                ->groupByRaw('PG_AUTH_CD, PG_AUTH_NAME')
                ->orderBy('PG_AUTH_CD')
                ->paginate(40);
    }

    public function edit($id)
    {
        $pg_auth_cd = MT14PgAuth::where('PG_AUTH_CD', $id)->first();
        return $pg_auth_cd;
    }

    public function pg($id)
    {
        return DB::table('MT93_PG')
                        ->leftJoin('MT14_PG_AUTH', function ($join) use ($id) {
                            $join->on('MT14_PG_AUTH.PG_CD', '=', 'MT93_PG.PG_CD')
                                ->where('MT14_PG_AUTH.PG_AUTH_CD', '=', $id);
                        })
                        ->select(
                            'MT14_PG_AUTH.PG_AUTH_CD',
                            'MT14_PG_AUTH.PG_AUTH_NAME',
                            'MT93_PG.PG_CD',
                            'MT93_PG.PG_NAME',
                            'MT93_PG.MCLS_NAME'
                        )
                     ->get();
    }

    public function empExist($pg_auth_cd)
    {
        return DB::table('MT10_EMP')
                    ->select('MT10_EMP.PG_AUTH_CD')
                    ->where('PG_AUTH_CD', '=', $pg_auth_cd)
                    ->exists();
    }

    public function upsertAuth($record, $update_col)
    {
        return DB::table($this->table)
                ->upsert($record, $this->primaryKey, $update_col);
    }

    public function deleteAuth($record)
    {
            return DB::table('MT14_PG_AUTH')
                ->where('PG_AUTH_CD', $record)
                ->delete();
    }
}
