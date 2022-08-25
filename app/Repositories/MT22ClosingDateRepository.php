<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\MT22ClosingDate;
use Illuminate\Support\Facades\DB;

class MT22ClosingDateRepository
{
    public function getMt22()
    {
        return MT22ClosingDate::orderby('CLOSING_DATE_CD')->get();
    }

    public function getFirst($CLOSING_DATE_CD)
    {
        return MT22ClosingDate::where('CLOSING_DATE_CD', $CLOSING_DATE_CD)->first();
    }
}
