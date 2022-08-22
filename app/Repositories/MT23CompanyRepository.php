<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\MT23Company;

class MT23CompanyRepository
{

    /**
     * 表示区分が「表示」の全件を返す
     * @return object
     */
    public function getDisp()
    {
        return MT23Company::where('DISP_CLS_CD', '01')->get();
    }
}
