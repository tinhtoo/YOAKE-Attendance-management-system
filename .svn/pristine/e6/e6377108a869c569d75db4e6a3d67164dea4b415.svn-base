<?php

namespace App\Filters;

use App\Filters\Filter;

class EmpExportFilter extends Filter
{
    /**
     * filter properties.
     */
    protected $filters = [
        'filter' => [
            'txtStartDeptCd',
            'txtEndDeptCd',
            'txtStartEmpCd',
            'txtEndEmpCd',
        ]
    ];

    //開始部門コード
    public function txtStartDeptCd($value)
    {
        if (!empty($value)) {
            $this->builder->where('MT12.DEPT_CD', '>=', $value);
        }
    }

    //終了部門コード
    public function txtEndDeptCd($value)
    {
        if (!empty($value)) {
            $this->builder->where('MT12.DEPT_CD', '<=', $value);
        }
    }

    //開始社員コード
    public function txtStartEmpCd($value)
    {
        if (!empty($value)) {
            $this->builder->where('MT10.EMP_CD', '>=', $value);
        }
    }

    //終了社員コード
    public function txtEndEmpCd($value)
    {
        if (!empty($value)) {
            $this->builder->where('MT10.EMP_CD', '<=', $value);
        }
    }
}
