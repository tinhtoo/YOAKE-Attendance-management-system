<?php

namespace App\Repositories;

use App\Models\MT93Pg;

class MT93PgRepository
{
    public function getMenu($loginId)
    {
        $MT93pgs = MT93Pg::select(
            'MT93_PG.PG_CD',
            'MT93_PG.PG_NAME',
            'MT93_PG.MCLS_CD',
            'MT93_PG.MCLS_NAME'
        )
            ->join('MT14_PG_AUTH', 'MT93_PG.PG_CD', '=', 'MT14_PG_AUTH.PG_CD')
            ->join('MT10_EMP', 'MT14_PG_AUTH.PG_AUTH_CD', '=', 'MT10_EMP.PG_AUTH_CD')
            ->join('MT11_LOGIN', 'MT10_EMP.EMP_CD', '=', 'MT11_LOGIN.EMP_CD')
            ->where('MT11_LOGIN.LOGIN_ID', '=', $loginId)
            ->get();
        $menu = [];
        foreach ($MT93pgs as $MT93pg) {
            $menu[$MT93pg->MCLS_CD]['MCLS_NAME'] = $MT93pg->MCLS_NAME;
            $menu[$MT93pg->MCLS_CD][$MT93pg->PG_CD] = $MT93pg->PG_NAME;
        }
        return $menu;
    }
}
