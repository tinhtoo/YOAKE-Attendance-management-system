<?php

namespace App\Repositories;

use App\Models\MT17PdHoliday;

class MT17PdHolidayRepository extends MT17PdHoliday
{
    public function getWithEmpCd($emp_cd)
    {
        return MT17PdHoliday::where('EMP_CD', $emp_cd)
                    ->get();
    }

    public function updateWithEmpCd($emp_cd, $update_data)
    {
        return MT17PdHoliday::where('EMP_CD', $emp_cd)
                    ->update($update_data);
    }
}
