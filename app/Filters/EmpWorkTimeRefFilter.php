<?php

namespace App\Filters;

use App\Filters\Filter;

class EmpWorkTimeRefFilter extends Filter
{
    /**
     * filter properties.
     */
    protected $filters = [
        'filter' => [
            // 'ddlTargetYear',
            // 'ddlTargetMonth',
            'ddlDate',
            'ddlClosingDate',
            'txtDeptCd',
            'ddlStartCompany',
            'ddlEndCompany',
            'txtEmpCd'
        ]
    ];

    public function ddlDate($value)
    {
        // dd($value);
        $year = mb_substr(($value), 0, 4);
        $month = mb_substr(($value), 5, 2);
        // dd($year);
        // dd($month);
        $this->builder->where('TR01_WORK.CALD_YEAR', (int)$year)->where('TR01_WORK.CALD_MONTH', (int)$month);
        // $this->builder->where('TR01_WORK.CALD_YEAR', $month);
    }

    // public function ddlDate($value)
    // {
    //     // dd($value);
    //     $month = mb_substr(($value), 7, 2);
    //     dd($month);
    //     $this->builder->where('TR01_WORK.CALD_YEAR', $month);
    // }

    // /**
    //  * Search by ddlTargetYear.
    //  */
    // public function ddlTargetYear($value)
    // {
    //     // dd($value);
    //     $this->builder->where('TR01_WORK.CALD_YEAR', $value);
    // }

    // /**
    //  * Search by ddlTargetMonth.
    //  */
    // public function ddlTargetMonth($value)
    // {
    //     $this->builder->where('TR01_WORK.CALD_MONTH', $value);
    // }
    
    public function ddlClosingDate($value)
    {
        // dd($value);
        $this->builder->where('MT10_EMP.CLOSING_DATE_CD', $value);
    }

    public function txtDeptCd($value)
    {
        if(!empty($value)){
            $this->builder->where('MT10_EMP.DEPT_CD', $value);
        }
    }
    
    public function ddlStartCompany($value)
    {
        if(!empty($value)){
            $this->builder->where('MT10_EMP.COMPANY_CD', '>=', $value);
        }
        
    }

    public function ddlEndCompany($value)
    {
        if(!empty($value)){
            $this->builder->where('MT10_EMP.COMPANY_CD', '<=', $value);
        }        
    }

    public function txtEmpCd($value)
    {
        if(!empty($value)){
            $this->builder->where('MT10_EMP.REG_CLS_CD','<>','02')
                      ->where('MT10_EMP.EMP_CD', $value);
        }
    }

}