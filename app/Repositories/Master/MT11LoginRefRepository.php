<?php

namespace App\Repositories\Master;

use Illuminate\Http\Request;

use App\Models\MT10Emp;
use App\Models\MT11Login;
use App\Models\MT14PgAuth;

use App\Filters\MT11LoginRefFilter;
use App\Http\Requests\MT11LoginRefRequest;
use App\Repositories\MT13DeptAuthRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;

class MT11LoginRefRepository extends MT11Login
{
    public function search(MT11LoginRefFilter $filter)
    {

        $query = MT10Emp::filter($filter)
        ->orderBy('EMP_CD');

        // 部門権限チェック
        $login_id = session('id');
        $login_emp_cd = (new MT11LoginRefRepository())->getEmpCd($login_id);
        $view_dept = (new MT13DeptAuthRepository())->getChangeableDept($login_id);
        $query->where(function ($q) use ($view_dept, $login_emp_cd) {
            $q->whereIn('MT10_EMP.DEPT_CD', $view_dept)
                ->orWhere('MT10_EMP.EMP_CD', $login_emp_cd);
        });

        if (isset($_GET['button_A'])) {
            $query->where('MT10_EMP.EMP_KANA', 'like', "[ァ-オ]%");
        } elseif (isset($_GET['button_KA'])) {
            $query->where('MT10_EMP.EMP_KANA', 'like', "[カ-ゴ]%");
        } elseif (isset($_GET['button_SA'])) {
            $query->where('MT10_EMP.EMP_KANA', 'like', "[サ-ゾ]%");
        } elseif (isset($_GET['button_TA'])) {
            $query->where('MT10_EMP.EMP_KANA', 'like', "[タ-ド]%");
        } elseif (isset($_GET['button_NA'])) {
            $query->where('MT10_EMP.EMP_KANA', 'like', "[ナ-ノ]%");
        } elseif (isset($_GET['button_HA'])) {
            $query->where('MT10_EMP.EMP_KANA', 'like', "[ハ-ポ]%");
        } elseif (isset($_GET['button_MA'])) {
            $query->where('MT10_EMP.EMP_KANA', 'like', "[マ-モ]%");
        } elseif (isset($_GET['button_YA'])) {
            $query->where('MT10_EMP.EMP_KANA', 'like', "[ャ-ヨ]%");
        } elseif (isset($_GET['button_RA'])) {
            $query->where('MT10_EMP.EMP_KANA', 'like', "[ラ-ロ]%");
        } elseif (isset($_GET['button_WA'])) {
            $query->where('MT10_EMP.EMP_KANA', 'like', "[ヮ-ン]%");
        } elseif (isset($_GET['button_EN'])) {
            $query->where('MT10_EMP.EMP_KANA', 'like', "[a-zA-Z]%");
        }

        $query_results = $query->paginate(40);

        return $query_results;
    }

    public function edit($id)
    {

        $emp_cd = MT10Emp::where('EMP_CD', $id)->first();
        return $emp_cd;
    }

    public function user($id)
    {
        $emp_cd = MT11Login::where('EMP_CD', $id)->first();
        return $emp_cd;
    }

    public function pgauth()
    {
        $pg_auth = MT14PgAuth::select('MT14_PG_AUTH.*')->get();

        return $pg_auth;
    }

    public function getEmpCd($login_id)
    {
        return MT11Login::where('LOGIN_ID', $login_id)->first()->EMP_CD;
    }

    public function upsertLogin($record)
    {
        return DB::table($this->table)
                ->upsert($record, $this->primaryKey, ['PASSWORD', 'UPD_DATE']);
    }

    public function updateWithEmpCd($emp_cd, $udpate_data)
    {
        return MT11Login::where('EMP_CD', $emp_cd)
                        ->update($udpate_data);
    }
}
