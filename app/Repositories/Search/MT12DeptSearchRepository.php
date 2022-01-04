<?php

namespace App\Repositories\Search;

use Illuminate\Http\Request;

use App\Models\MT10Emp;
use App\Models\MT12Dept;



class MT12DeptSearchRepository
{
    public function data_search()
    {
        $query = MT12Dept::paginate(20);

        return $query;
    }

}
