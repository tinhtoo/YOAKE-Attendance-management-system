<?php

namespace app\Repositories;

use App\Models\Wk01Work;

class Wk01WorkRepository
{
    public function getWithPrimary($emp_cd, $cald_date)
    {
        return Wk01Work::where("EMP_CD", $emp_cd)
                    ->where("CALD_DATE", $cald_date)
                    ->first();
    }
}
