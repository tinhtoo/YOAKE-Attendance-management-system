<?php

namespace App\Filters;

use App\Filters\Filter;
use Illuminate\Http\Request;

class MT10EmpSearchFilter extends Filter
{
    /**
     * filter properties.
     */
    protected $filters = [
        'filter' => [
            'txtEmpKana',
            'txtDeptCd',
        ]
    ];

    // カナ検索
    public function txtEmpKana($value)
    {
        if (!empty($value)) {
            $this->builder->where('MT10_EMP.EMP_KANA', 'like', "%$value%");
        }
    }

    // 部門
    public function txtDeptCd($value)
    {
        if (!empty($value)) {
            $this->builder->where('MT10_EMP.DEPT_CD', $value);
        }
    }
}
