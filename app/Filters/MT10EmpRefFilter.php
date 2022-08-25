<?php

namespace App\Filters;

use App\Filters\Filter;

class MT10EmpRefFilter extends Filter
{
    /**
     * filter properties.
     */
    protected $filters = [
        'filter' => [
            'txtEmpCd',
            'txtEmpKana',
            'txtDeptCd',
        ]
    ];
    // 社員番号
    public function txtEmpCd($value)
    {
        if (!is_nullorwhitespace($value)) {
            $this->builder->where('MT10_EMP.EMP_CD', $value);
        }
    }

    // カナ検索
    public function txtEmpKana($value)
    {
        if (!is_nullorwhitespace($value)) {
            $this->builder->where('MT10_EMP.EMP_KANA', 'like', "%{$value}%");
        }
    }

    // 部門
    public function txtDeptCd($value)
    {
        if (!is_nullorwhitespace($value)) {
            $this->builder->where('MT10_EMP.DEPT_CD', $value);
        }
    }
}
