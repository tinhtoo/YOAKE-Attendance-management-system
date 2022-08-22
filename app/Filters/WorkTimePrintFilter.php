<?php

namespace App\Filters;

use App\Filters\Filter;
use Illuminate\Http\Request;

class WorkTimePrintFilter extends Filter
{
    /**
     * filter properties.
     */
    protected $filters = [
        'filter' => [
            'ddlClosingDate',
            'txtStartDeptCd',
            'txtEndDeptCd',
            'ddlStartCompany',
            'ddlEndCompany',
            'txtStartEmpCd',
            'txtEndEmpCd',
            'chkRegCls',
        ]
    ];

    // 締日
    public function ddlClosingDate($value)
    {
        if (!empty($value)) {
            $this->builder->where('MT10.CLOSING_DATE_CD', $value);
        }
    }
    // 開始部門コード
    public function txtStartDeptCd($value)
    {
        if (!empty($value)) {
            $this->builder->where('MT10.DEPT_CD', '>=', $value);
        }
    }

    // 終了部門コード
    public function txtEndDeptCd($value)
    {
        if (!empty($value)) {
            $this->builder->where('MT10.DEPT_CD', '<=', $value);
        }
    }

    // 開始所属コード
    public function ddlStartCompany($value)
    {
        if (!empty($value)) {
            $this->builder->where('MT10.COMPANY_CD', '>=', $value);
        }
    }

    // 終了所属コード
    public function ddlEndCompany($value)
    {
        if (!empty($value)) {
            $this->builder->where('MT10.COMPANY_CD', '<=', $value);
        }
    }

    // 開始社員コード
    public function txtStartEmpCd($value)
    {
        if (!empty($value)) {
            $this->builder->where('TR01.EMP_CD', '>=', $value);
        }
    }

    // 終了社員コード
    public function txtEndEmpCd($value)
    {
        if (!empty($value)) {
            $this->builder->where('TR01.EMP_CD', '<=', $value);
        }
    }

    // 在籍のみ表示
    public function chkRegCls($value)
    {
        if (!empty($value)) {
            $this->builder->where('MT10.REG_CLS_CD', '=', '00');
        }
    }
}
