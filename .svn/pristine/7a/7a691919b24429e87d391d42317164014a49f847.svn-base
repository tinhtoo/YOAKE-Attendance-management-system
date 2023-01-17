<?php

namespace App\Filters;

use App\Filters\Filter;
use Illuminate\Http\Request;

class WorkTimeExportFilter extends Filter
{
    /**
     * filter properties.
     */
    protected $filters = [
        'filter' => [
            'exportCategory',
            'startDate',
            'endDate',
            'txtStartDeptCd',
            'txtEndDeptCd',
            'startCompany',
            'endCompany',
            'txtStartEmpCd',
            'txtEndEmpCd',
            'regCls'
        ]
    ];

    public function exportCategory($value)
    {
        if ($value) {
            // 集計
        } else {
            // 明細
            $this->builder->select(\DB::raw("
                    MT10.DEPT_CD
                    , MT12.DEPT_NAME
                    , TR01.EMP_CD
                    , MT10.EMP_NAME
                    , MT10.EMP_CLS1_CD
                    , MT92.DESC_DETAIL_NAME EMP_CLS1_NAME
                    , FORMAT(TR01.CALD_DATE, 'yyyy/MM/dd') CALD_DATE
                    , Case DATEPART(WEEKDAY,TR01.CALD_DATE)
                        When 1 Then '日'
                        When 2 Then '月'
                        When 3 Then '火'
                        When 4 Then '水'
                        When 5 Then '木'
                        When 6 Then '金'
                        When 7 Then '土'
                        END CALD_WEEKDAY
                    , Case When TR01.OFC_TIME_HH Is NULL OR TR01.OFC_TIME_HH = '' Then ''
                        Else Convert(VarChar, TR01.OFC_TIME_HH)  + ':' + Right('00' + Convert(VarChar, TR01.OFC_TIME_MI), 2)
                        End OFC_TIME
                    , Case When TR01.OUT1_TIME_HH Is NULL OR TR01.OUT1_TIME_HH = '' Then ''
                        Else Convert(VarChar, TR01.OUT1_TIME_HH) + ':' + Right('00' + Convert(VarChar, TR01.OUT1_TIME_MI), 2)
                        End OUT1_TIME
                    , Case When TR01.IN1_TIME_HH  Is NULL OR TR01.IN1_TIME_HH  = '' Then ''
                        Else Convert(VarChar, TR01.IN1_TIME_HH)  + ':' + Right('00' + Convert(VarChar, TR01.IN1_TIME_MI), 2)
                        End IN1_TIME
                    , Case When TR01.LEV_TIME_HH  Is NULL OR TR01.LEV_TIME_HH  = '' Then ''
                        Else Convert(VarChar, TR01.LEV_TIME_HH)  + ':' + Right('00' + Convert(VarChar, TR01.LEV_TIME_MI), 2)
                        End LEV_TIME
                    , MT05.WORKPTN_NAME
                    , FORMAT(Round((TR01.WORK_TIME_HH  * 60 + TR01.WORK_TIME_MI)  / 60.0, 2, 1), 'F2') WORK_TIME
                    , Case When MT05.WORK_CLS_CD = '01' Then FORMAT(Round((IsNull(MT05.RSV1_HH, 0) * 60 + IsNull(MT05.RSV1_MI, 0)) / 60.0, 2, 1), 'F2')
                        Else FORMAT(0, 'F2')
                        End RSV1_TIME
                    , FORMAT(Round((TR01.EXT1_TIME_HH  * 60 + TR01.EXT1_TIME_MI)  / 60.0, 2, 1), 'F2') EXT1_TIME
                    , FORMAT(Round((TR01.OVTM1_TIME_HH * 60 + TR01.OVTM1_TIME_MI) / 60.0, 2, 1), 'F2') OVTM1_TIME
                    , FORMAT(Round((TR01.OVTM2_TIME_HH * 60 + TR01.OVTM2_TIME_MI) / 60.0, 2, 1), 'F2') OVTM2_TIME
                    , FORMAT(Round((TR01.OVTM3_TIME_HH * 60 + TR01.OVTM3_TIME_MI) / 60.0, 2, 1), 'F2') OVTM3_TIME
                    , FORMAT(Round((TR01.OVTM4_TIME_HH * 60 + TR01.OVTM4_TIME_MI) / 60.0, 2, 1), 'F2') OVTM4_TIME
                    , Case When MT05.WORK_CLS_CD = '00' And TR01.REASON_CD Not In ('15', '16', '17')
                        Then FORMAT(Round((TR01.WORK_TIME_HH * 60 + TR01.WORK_TIME_MI) / 60.0, 2, 1), 'F2')
                        Else FORMAT(0, 'F2')
                        End HOL_WORK_TIME
                    , FORMAT(Round((TR01.TARD_TIME_HH * 60 + TR01.TARD_TIME_MI) / 60.0, 2, 1), 'F2')   TARD_TIME
            "))

            ->leftJoin('MT10_EMP as MT10', 'TR01.EMP_CD', '=', 'MT10.EMP_CD')
            ->leftJoin('MT12_DEPT as MT12', 'MT10.DEPT_CD', '=', 'MT12.DEPT_CD')
            ->leftJoin('MT92_DESC_DETAIL as MT92', function ($join) {
                $join->on('MT10.EMP_CLS1_CD', '=', 'MT92.DESC_DETAIL_CD')
                     ->where('MT92.CLS_CD', '=', '50');
            })
            ->leftJoin('MT05_WORKPTN as MT05', 'TR01.WORKPTN_CD', '=', 'MT05.WORKPTN_CD')
            ->orderBy('MT10.DEPT_CD')
            ->orderBy('TR01.EMP_CD')
            ->orderBy('TR01.CALD_DATE');
        }
    }

    public function startDate($value)
    {
        if (!empty($value)) {
            $this->builder->where('TR01.CALD_DATE', '>=', substr($value, 0, 4). substr($value, 7, 2). substr($value, 12, 2));
        }
    }

    public function endDate($value)
    {
        if (!empty($value)) {
            $this->builder->where('TR01.CALD_DATE', '<=', substr($value, 0, 4). substr($value, 7, 2). substr($value, 12, 2));
        }
    }

    public function txtStartDeptCd($value)
    {
        if (!empty($value)) {
            $this->builder->where('MT10.DEPT_CD', '>=', $value);
        }
    }

    public function txtEndDeptCd($value)
    {
        if (!empty($value)) {
            $this->builder->where('MT10.DEPT_CD', '<=', $value);
        }
    }

    public function startCompany($value)
    {
        if (!empty($value)) {
            $this->builder->where('MT10.COMPANY_CD', '>=', $value);
        }
    }

    public function endCompany($value)
    {
        if (!empty($value)) {
            $this->builder->where('MT10.COMPANY_CD', '<=', $value);
        }
    }

    public function txtStartEmpCd($value)
    {
        if (!empty($value)) {
            $this->builder->where('TR01.EMP_CD', '>=', $value);
        }
    }

    public function txtEndEmpCd($value)
    {
        if (!empty($value)) {
            $this->builder->where('TR01.EMP_CD', '<=', $value);
        }
    }

    public function regCls($value)
    {
        if ($value) {
            $this->builder->where('MT10.REG_CLS_CD', '=', '00');
        }
    }
}