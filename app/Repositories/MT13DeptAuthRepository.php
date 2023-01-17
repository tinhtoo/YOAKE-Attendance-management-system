<?php

namespace App\Repositories;

use App\Models\MT13DeptAuth;
use Illuminate\Support\Facades\DB;

class MT13DeptAuthRepository extends MT13DeptAuth
{

    public function getChangeableDept($loginId)
    {
        return MT13DeptAuth::join('MT10_EMP', 'MT13_DEPT_AUTH.DEPT_AUTH_CD', '=', 'MT10_EMP.DEPT_AUTH_CD')
                    ->join('MT11_LOGIN', 'MT10_EMP.EMP_CD', '=', 'MT11_LOGIN.EMP_CD')
                    ->wHERE('MT11_LOGIN.LOGIN_ID', '=', $loginId)
                    ->select('MT13_DEPT_AUTH.DEPT_CD')
                    ->get();
    }

    public function getPrimaryKey($id)
    {
        return DB::table('MT13_DEPT_AUTH')
                ->where('DEPT_AUTH_CD', $id)
                ->first();
    }

    public function getDeptIn($id)
    {
        return DB::table('MT13_DEPT_AUTH')
                ->join('MT12_DEPT', 'MT13_DEPT_AUTH.DEPT_CD', '=', 'MT12_DEPT.DEPT_CD')
                ->where('MT13_DEPT_AUTH.DEPT_AUTH_CD', '=', $id)
                ->select('MT12_DEPT.DEPT_CD')
                ->get();
    }

    public function upsertDeptAuth($record, $update_col)
    {
        return DB::table($this->table)
                ->upsert($record, $this->primaryKey, $update_col);
    }

    public function deleteDeptAuth($record)
    {
        return DB::table('MT13_DEPT_AUTH')
            ->where('DEPT_AUTH_CD', $record)
            ->delete();
    }

    public function getDeptAuthPage()
    {
        return DB::table('MT13_DEPT_AUTH')
                                ->select('DEPT_AUTH_CD', 'DEPT_AUTH_NAME')
                                ->groupByRaw('DEPT_AUTH_CD, DEPT_AUTH_NAME')
                                ->orderBy('DEPT_AUTH_CD')
                                ->paginate(40);
    }
}
