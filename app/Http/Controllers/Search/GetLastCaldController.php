<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use App\Repositories\Search\MT10EmpSearchRepository;
use App\Repositories\TR01WorkRepository;
use Illuminate\Http\Request;

class GetLastCaldController extends Controller
{
    private $tr01;
    private $mt10;
    public function __construct(
        MT10EmpSearchRepository $mt10_rep,
        TR01WorkRepository $tr01_rep
    ) {
        $this->mt10 = $mt10_rep;
        $this->tr01 = $tr01_rep;
    }

    /**
     * 最新カレンダー年月を返す
     * @return 最新カレンダー年月
     */
    public function get(Request $request, $emp_cd)
    {
        // 該当社員の存在チェック
        if (is_nullorwhitespace($emp_cd)
             || $this->mt10->getName($emp_cd, '00,01', true) == null) {
            return ;
        }

        $last_cald = $this->tr01->getLastCald($emp_cd);
        if (!$last_cald) {
            return ;
        }

        return ['last_cald' => $last_cald[0]->CALD_YEAR.'年'.$last_cald[0]->CALD_MONTH.'月'];
    }
}
