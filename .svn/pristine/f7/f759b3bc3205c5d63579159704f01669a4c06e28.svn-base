<?php

namespace App\Filters;

use App\Filters\Filter;

class WorkTimeDeptEditorFilter extends Filter
{
    /**
     * filter properties
     */
    protected $filters = [
        'filter' => [
            'ddlStartCompany',
            'ddlEndCompany',
        ]
    ];

    /**
     * ddlStartCompany で検索.
     * 検索データがなければスキップ
     */
    public function ddlStartCompany($value)
    {
        if (!empty($value)) {
            $this->builder->where('MT10.COMPANY_CD', '>=', $value);
        }
    }

    /**
     * ddlEndCompany で検索.
     * 検索データがなければスキップ
     */
    public function ddlEndCompany($value)
    {
        if (!empty($value)) {
            $this->builder->where('MT10.COMPANY_CD', '<=', $value);
        }
    }
}
