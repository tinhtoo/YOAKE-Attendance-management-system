<?php

namespace App\Repositories;

use App\Models\TR01Work;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Filters\WorkPlanPrintFilter;
use App\WorkTmSvc\CalculateWorkTime;
use Carbon\Carbon;

/**
 * TR01WorkRepositoryが肥大化しすぎるため、切り出す。
 */
class WorkTimePrintRepository extends TR01Work
{
    /**
     * 勤務実績表(日報)用情報を取得
     * @param [type] $filter
     * @param [type] $start
     * @param [type] $end
     * @return void
     */
    public function getWorkTimeDailyData($filter, $start, $end)
    {
        return TR01Work::select(
            'TR01.CALD_DATE',
            'MT10.DEPT_CD',
            'MT12.DEPT_NAME',
            'TR01.EMP_CD',
            'MT10.EMP_NAME',
            'MT05.WORKPTN_NAME',
            'MT09.REASON_NAME',
            'TR01.WORK_TIME_HH',
            'TR01.WORK_TIME_MI',
            'TR01.TARD_TIME_HH',
            'TR01.TARD_TIME_MI',
            'TR01.LEAVE_TIME_HH',
            'TR01.LEAVE_TIME_MI',
            'TR01.OUT_TIME_HH',
            'TR01.OUT_TIME_MI',
            'MT94_100.WORK_DESC_NAME as WORK_DESC_NAME_100',
            'TR01.OVTM1_TIME_HH',
            'TR01.OVTM1_TIME_MI',
            'MT94_101.WORK_DESC_NAME as WORK_DESC_NAME_101',
            'TR01.OVTM2_TIME_HH',
            'TR01.OVTM2_TIME_MI',
            'MT94_102.WORK_DESC_NAME as WORK_DESC_NAME_102',
            'TR01.OVTM3_TIME_HH',
            'TR01.OVTM3_TIME_MI',
            'MT94_103.WORK_DESC_NAME as WORK_DESC_NAME_103',
            'TR01.OVTM4_TIME_HH',
            'TR01.OVTM4_TIME_MI',
            'MT94_104.WORK_DESC_NAME as WORK_DESC_NAME_104',
            'TR01.OVTM5_TIME_HH',
            'TR01.OVTM5_TIME_MI',
            'MT94_105.WORK_DESC_NAME as WORK_DESC_NAME_105',
            'TR01.OVTM6_TIME_HH',
            'TR01.OVTM6_TIME_MI',
            'MT94_200.WORK_DESC_NAME as WORK_DESC_NAME_200',
            'TR01.EXT1_TIME_HH',
            'TR01.EXT1_TIME_MI',
            'MT94_201.WORK_DESC_NAME as WORK_DESC_NAME_201',
            'TR01.EXT2_TIME_HH',
            'TR01.EXT2_TIME_MI',
            'MT94_202.WORK_DESC_NAME as WORK_DESC_NAME_202',
            'TR01.EXT3_TIME_HH',
            'TR01.EXT3_TIME_MI'
        )
        ->selectRaw('CONVERT(VARCHAR, TR01.CALD_DATE, 121) AS CALD_DATE_FOR_GROUP')
        ->selectRaw("Case When TR01.OFC_TIME_HH = Null OR TR01.OFC_TIME_HH = '0' Then ''
                  Else Convert(VarChar, TR01.OFC_TIME_HH)  + ':' + Right('00' + Convert(VarChar, TR01.OFC_TIME_MI), 2)
                End OFC_TIME")
        ->selectRaw("Case When TR01.LEV_TIME_HH = Null OR TR01.LEV_TIME_HH = '0' Then ''
                  Else Convert(VarChar, TR01.LEV_TIME_HH)  + ':' + Right('00' + Convert(VarChar, TR01.LEV_TIME_MI), 2)
                End LEV_TIME")
        ->selectRaw("Case When TR01.OUT1_TIME_HH = Null OR TR01.OUT1_TIME_HH = '0' Then ''
                  Else Convert(VarChar, TR01.OUT1_TIME_HH) + ':' + Right('00' + Convert(VarChar, TR01.OUT1_TIME_MI), 2)
                End OUT1_TIME")
        ->selectRaw("Case When TR01.IN1_TIME_HH = Null OR TR01.IN1_TIME_HH = '0' Then ''
                  Else Convert(VarChar, TR01.IN1_TIME_HH)  + ':' + Right('00' + Convert(VarChar, TR01.IN1_TIME_MI), 2)
                End IN1_TIME")
        ->selectRaw("Case When TR01.OUT2_TIME_HH = Null OR TR01.OUT2_TIME_HH = '0' Then ''
                  Else Convert(VarChar, TR01.OUT2_TIME_HH) + ':' + Right('00' + Convert(VarChar, TR01.OUT2_TIME_MI), 2)
                End OUT2_TIME")
        ->selectRaw("Case When TR01.IN2_TIME_HH = Null OR TR01.IN2_TIME_HH = '0' Then ''
                  Else Convert(VarChar, TR01.IN2_TIME_HH)  + ':' + Right('00' + Convert(VarChar, TR01.IN2_TIME_MI), 2)
                End IN2_TIME")
        ->from('TR01_WORK as TR01')
        ->leftJoin('MT10_EMP       as MT10', 'TR01.EMP_CD', 'MT10.EMP_CD')
        ->leftJoin('MT12_DEPT      as MT12', 'MT10.DEPT_CD', 'MT12.DEPT_CD')
        ->leftJoin('MT05_WORKPTN   as MT05', 'TR01.WORKPTN_CD', 'MT05.WORKPTN_CD')
        ->leftJoin('MT09_REASON    as MT09', 'TR01.REASON_CD', 'MT09.REASON_CD')
        ->leftJoin('MT94_WORK_DESC as MT94_100', function ($join) {
            $join->on('MT94_100.WORK_DESC_CD', '=', 'MT94_100.WORK_DESC_CD')
            ->where('MT94_100.WORK_DESC_CD', '=', '100');
        })
        ->leftJoin('MT94_WORK_DESC as MT94_101', function ($join) {
            $join->on('MT94_101.WORK_DESC_CD', '=', 'MT94_101.WORK_DESC_CD')
            ->where('MT94_101.WORK_DESC_CD', '=', '101');
        })
        ->leftJoin('MT94_WORK_DESC as MT94_102', function ($join) {
            $join->on('MT94_102.WORK_DESC_CD', '=', 'MT94_102.WORK_DESC_CD')
            ->where('MT94_102.WORK_DESC_CD', '=', '102');
        })
        ->leftJoin('MT94_WORK_DESC as MT94_103', function ($join) {
            $join->on('MT94_103.WORK_DESC_CD', '=', 'MT94_103.WORK_DESC_CD')
            ->where('MT94_103.WORK_DESC_CD', '=', '103');
        })
        ->leftJoin('MT94_WORK_DESC as MT94_104', function ($join) {
            $join->on('MT94_104.WORK_DESC_CD', '=', 'MT94_104.WORK_DESC_CD')
            ->where('MT94_104.WORK_DESC_CD', '=', '104');
        })
        ->leftJoin('MT94_WORK_DESC as MT94_105', function ($join) {
            $join->on('MT94_105.WORK_DESC_CD', '=', 'MT94_105.WORK_DESC_CD')
            ->where('MT94_105.WORK_DESC_CD', '=', '105');
        })
        ->leftJoin('MT94_WORK_DESC as MT94_200', function ($join) {
            $join->on('MT94_200.WORK_DESC_CD', '=', 'MT94_200.WORK_DESC_CD')
            ->where('MT94_200.WORK_DESC_CD', '=', '200');
        })
        ->leftJoin('MT94_WORK_DESC as MT94_201', function ($join) {
            $join->on('MT94_201.WORK_DESC_CD', '=', 'MT94_201.WORK_DESC_CD')
            ->where('MT94_201.WORK_DESC_CD', '=', '201');
        })
        ->leftJoin('MT94_WORK_DESC as MT94_202', function ($join) {
            $join->on('MT94_202.WORK_DESC_CD', '=', 'MT94_202.WORK_DESC_CD')
            ->where('MT94_202.WORK_DESC_CD', '=', '202');
        })
        ->whereBetween('TR01.CALD_DATE', [$start, $end])
        ->filter($filter)
        ->orderBy('TR01.CALD_DATE')
        ->orderBy('MT10.DEPT_CD')
        ->orderBy('TR01.EMP_CD')
        ->get();
    }

    /**
     * 勤務実績表(社員別月報)A3縦用情報を取得
     *
     * @param [type] $filter
     * @param [type] $year
     * @param [type] $month
     * @return void
     */
    public function getWorkTimePortraitData($filter, $year, $month)
    {
        $sum_count_query = \DB::table('TR01_WORK')
                            ->select(
                                'EMP_CD',
                                DB::raw('Sum(WORKDAY_CNT) SUM_WORKDAY_CNT'),
                                DB::raw('Sum(PADHOL_CNT) SUM_PADHOL_CNT'),
                                DB::raw('Sum(COMPDAY_CNT) SUM_COMPDAY_CNT'),
                                DB::raw('Sum(SPCHOL_CNT) SUM_SPCHOL_CNT'),
                                DB::raw('Sum(HOLWORK_CNT) SUM_HOLWORK_CNT'),
                                DB::raw('Sum(ABCWORK_CNT) SUM_ABCWORK_CNT')
                            )
                            ->whereRaw("CALD_YEAR = '". $year ."' and CALD_MONTH = '".$month."'")
                            ->groupBy('EMP_CD')
                            ->toSql();

        $sum_tard_query = \DB::table('TR01_WORK')->select('EMP_CD', DB::raw('Count(*) SUM_TARD_CNT'))
                    ->whereRaw("CALD_YEAR = '". $year ."' and CALD_MONTH = '".$month."'")
                    ->whereRaw('Not(TARD_TIME_HH = 0 And TARD_TIME_MI = 0)')
                    ->groupBy('EMP_CD')
                    ->toSql();

        $sum_leave_query = \DB::table('TR01_WORK')->select('EMP_CD', DB::raw('Count(*) SUM_LEAVE_CNT'))
                    ->whereRaw("CALD_YEAR = '". $year ."' and CALD_MONTH = '".$month."'")
                    ->whereRaw('Not(LEAVE_TIME_HH = 0 And LEAVE_TIME_MI = 0)')
                    ->groupBy('EMP_CD')
                    ->toSql();
                            
        return TR01Work::select(
            'MT10.DEPT_CD',
            'MT12.DEPT_NAME',
            'TR01.EMP_CD',
            'MT10.EMP_NAME',
            'TR01.CALD_DATE',
            'MT05.WORKPTN_NAME',
            'MT09.REASON_NAME',
            'TR01.WORK_TIME_HH',
            'TR01.WORK_TIME_MI',
            'TR01.TARD_TIME_HH',
            'TR01.TARD_TIME_MI',
            'TR01.LEAVE_TIME_HH',
            'TR01.LEAVE_TIME_MI',
            'TR01.OUT_TIME_HH',
            'TR01.OUT_TIME_MI',
            'MT94_100.WORK_DESC_NAME as WORK_DESC_NAME_100',
            'TR01.OVTM1_TIME_HH',
            'TR01.OVTM1_TIME_MI',
            'MT94_101.WORK_DESC_NAME as WORK_DESC_NAME_101',
            'TR01.OVTM2_TIME_HH',
            'TR01.OVTM2_TIME_MI',
            'MT94_102.WORK_DESC_NAME as WORK_DESC_NAME_102',
            'TR01.OVTM3_TIME_HH',
            'TR01.OVTM3_TIME_MI',
            'MT94_103.WORK_DESC_NAME as WORK_DESC_NAME_103',
            'TR01.OVTM4_TIME_HH',
            'TR01.OVTM4_TIME_MI',
            'MT94_104.WORK_DESC_NAME as WORK_DESC_NAME_104',
            'TR01.OVTM5_TIME_HH',
            'TR01.OVTM5_TIME_MI',
            'MT94_105.WORK_DESC_NAME as WORK_DESC_NAME_105',
            'TR01.OVTM6_TIME_HH',
            'TR01.OVTM6_TIME_MI',
            'MT94_200.WORK_DESC_NAME as WORK_DESC_NAME_200',
            'TR01.EXT1_TIME_HH',
            'TR01.EXT1_TIME_MI',
            'MT94_201.WORK_DESC_NAME as WORK_DESC_NAME_201',
            'TR01.EXT2_TIME_HH',
            'TR01.EXT2_TIME_MI',
            'MT94_202.WORK_DESC_NAME as WORK_DESC_NAME_202',
            'TR01.EXT3_TIME_HH',
            'TR01.EXT3_TIME_MI'
        )
        ->selectRaw('0 PAGE_NO')
        ->selectRaw('IsNull(TR01_SUB.SUM_WORKDAY_CNT, 0) SUM_WORKDAY_CNT')
        ->selectRaw('IsNull(TR01_SUB.SUM_PADHOL_CNT, 0)  SUM_PADHOL_CNT')
        ->selectRaw('IsNull(TR01_SUB.SUM_COMPDAY_CNT, 0) SUM_COMPDAY_CNT')
        ->selectRaw('IsNull(TR01_SUB.SUM_SPCHOL_CNT, 0)  SUM_SPCHOL_CNT')
        ->selectRaw('IsNull(TR01_SUB.SUM_HOLWORK_CNT, 0) SUM_HOLWORK_CNT')
        ->selectRaw('IsNull(TR01_SUB.SUM_ABCWORK_CNT, 0) SUM_ABCWORK_CNT')
        ->selectRaw('IsNull(TR01_TARD.SUM_TARD_CNT, 0)   SUM_TARD_CNT')
        ->selectRaw('IsNull(TR01_LEAVE.SUM_LEAVE_CNT, 0) SUM_LEAVE_CNT')
        ->selectRaw("Case When TR01.OFC_TIME_HH = Null OR TR01.OFC_TIME_HH = '0' Then ''
            Else Convert(VarChar, TR01.OFC_TIME_HH)  + ':' + Right('00' + Convert(VarChar, TR01.OFC_TIME_MI), 2)
        End OFC_TIME")
        ->selectRaw("Case When TR01.LEV_TIME_HH = Null OR TR01.LEV_TIME_HH = '0' Then ''
            Else Convert(VarChar, TR01.LEV_TIME_HH)  + ':' + Right('00' + Convert(VarChar, TR01.LEV_TIME_MI), 2)
        End LEV_TIME")
        ->selectRaw("Case When TR01.OUT1_TIME_HH = Null OR TR01.OUT1_TIME_HH = '0' Then ''
            Else Convert(VarChar, TR01.OUT1_TIME_HH) + ':' + Right('00' + Convert(VarChar, TR01.OUT1_TIME_MI), 2)
        End OUT1_TIME")
        ->selectRaw("Case When TR01.IN1_TIME_HH = Null OR TR01.IN1_TIME_HH = '0' Then ''
            Else Convert(VarChar, TR01.IN1_TIME_HH)  + ':' + Right('00' + Convert(VarChar, TR01.IN1_TIME_MI), 2)
        End IN1_TIME")
        ->selectRaw("Case When TR01.OUT2_TIME_HH = Null OR TR01.OUT2_TIME_HH = '0' Then ''
            Else Convert(VarChar, TR01.OUT2_TIME_HH) + ':' + Right('00' + Convert(VarChar, TR01.OUT2_TIME_MI), 2)
        End OUT2_TIME")
        ->selectRaw("Case When TR01.IN2_TIME_HH = Null OR TR01.IN2_TIME_HH = '0' Then ''
            Else Convert(VarChar, TR01.IN2_TIME_HH)  + ':' + Right('00' + Convert(VarChar, TR01.IN2_TIME_MI), 2)
        End IN2_TIME")
        ->from('TR01_WORK as TR01')
        ->leftJoin('MT10_EMP       as MT10', 'TR01.EMP_CD', 'MT10.EMP_CD')
        ->leftJoin('MT12_DEPT      as MT12', 'MT10.DEPT_CD', 'MT12.DEPT_CD')
        ->leftJoin('MT05_WORKPTN   as MT05', 'TR01.WORKPTN_CD', 'MT05.WORKPTN_CD')
        ->leftJoin('MT09_REASON    as MT09', 'TR01.REASON_CD', 'MT09.REASON_CD')
        ->leftJoin('MT94_WORK_DESC as MT94_100', function ($join) {
            $join->on('MT94_100.WORK_DESC_CD', '=', 'MT94_100.WORK_DESC_CD')
            ->where('MT94_100.WORK_DESC_CD', '=', '100');
        })
        ->leftJoin('MT94_WORK_DESC as MT94_101', function ($join) {
            $join->on('MT94_101.WORK_DESC_CD', '=', 'MT94_101.WORK_DESC_CD')
            ->where('MT94_101.WORK_DESC_CD', '=', '101');
        })
        ->leftJoin('MT94_WORK_DESC as MT94_102', function ($join) {
            $join->on('MT94_102.WORK_DESC_CD', '=', 'MT94_102.WORK_DESC_CD')
            ->where('MT94_102.WORK_DESC_CD', '=', '102');
        })
        ->leftJoin('MT94_WORK_DESC as MT94_103', function ($join) {
            $join->on('MT94_103.WORK_DESC_CD', '=', 'MT94_103.WORK_DESC_CD')
            ->where('MT94_103.WORK_DESC_CD', '=', '103');
        })
        ->leftJoin('MT94_WORK_DESC as MT94_104', function ($join) {
            $join->on('MT94_104.WORK_DESC_CD', '=', 'MT94_104.WORK_DESC_CD')
            ->where('MT94_104.WORK_DESC_CD', '=', '104');
        })
        ->leftJoin('MT94_WORK_DESC as MT94_105', function ($join) {
            $join->on('MT94_105.WORK_DESC_CD', '=', 'MT94_105.WORK_DESC_CD')
            ->where('MT94_105.WORK_DESC_CD', '=', '105');
        })
        ->leftJoin('MT94_WORK_DESC as MT94_200', function ($join) {
            $join->on('MT94_200.WORK_DESC_CD', '=', 'MT94_200.WORK_DESC_CD')
            ->where('MT94_200.WORK_DESC_CD', '=', '200');
        })
        ->leftJoin('MT94_WORK_DESC as MT94_201', function ($join) {
            $join->on('MT94_201.WORK_DESC_CD', '=', 'MT94_201.WORK_DESC_CD')
            ->where('MT94_201.WORK_DESC_CD', '=', '201');
        })
        ->leftJoin('MT94_WORK_DESC as MT94_202', function ($join) {
            $join->on('MT94_202.WORK_DESC_CD', '=', 'MT94_202.WORK_DESC_CD')
            ->where('MT94_202.WORK_DESC_CD', '=', '202');
        })
        ->leftJoinSub($sum_count_query, 'TR01_SUB', function ($join) {
            $join->on('TR01.EMP_CD', '=', 'TR01_SUB.EMP_CD');
        })
        ->leftJoinSub($sum_tard_query, 'TR01_TARD', function ($join) {
            $join->on('TR01.EMP_CD', '=', 'TR01_TARD.EMP_CD');
        })
        ->leftJoinSub($sum_leave_query, 'TR01_LEAVE', function ($join) {
            $join->on('TR01.EMP_CD', '=', 'TR01_LEAVE.EMP_CD');
        })
        ->where("CALD_YEAR", $year)
        ->where("CALD_MONTH", $month)
        ->filter($filter)
        ->orderBy('MT10.DEPT_CD')
        ->orderBy('TR01.EMP_CD')
        ->orderBy('TR01.CALD_DATE')
        ->get();
    }

    /**
     * 勤務実績表(社員別月報)A3縦PTN2用情報を取得
     *
     * @param [type] $filter
     * @param [type] $year
     * @param [type] $month
     * @return void
     */
    public function getWorkTimePortrait2Data($filter, $year, $month)
    {
        // 出勤時間 [MT05.WORK_CLS_CD = '01']
        $wt_def = TR01Work::select(
            'TR01.EMP_CD',
            'TR01.CALD_DATE',
            'TR01.WORK_TIME_HH',
            'TR01.WORK_TIME_MI',
        )
        ->from('TR01_WORK as TR01')
        ->leftJoin('MT05_WORKPTN as MT05', 'TR01.WORKPTN_CD', 'MT05.WORKPTN_CD')
        ->whereRaw("MT05.WORK_CLS_CD = '01'")
        ->toSql();

        // 休日出勤(法定) [MT05.WORK_CLS_CD = '00' & MT05.RSV1_CLS_CD = '00']
        $wt_hol = TR01Work::select(
            'TR01.EMP_CD',
            'TR01.CALD_DATE',
            'TR01.WORK_TIME_HH',
            'TR01.WORK_TIME_MI',
        )
        ->from('TR01_WORK as TR01')
        ->leftJoin('MT05_WORKPTN as MT05', 'TR01.WORKPTN_CD', 'MT05.WORKPTN_CD')
        ->whereRaw("MT05.WORK_CLS_CD = '00'")
        ->whereRaw("MT05.RSV1_CLS_CD = '00'")
        ->toSql();

        // 休日出勤(法定外) [MT05.WORK_CLS_CD = '00' & MT05.RSV1_CLS_CD = '01']
        $wt_hol_out = TR01Work::select(
            'TR01.EMP_CD',
            'TR01.CALD_DATE',
            'TR01.WORK_TIME_HH',
            'TR01.WORK_TIME_MI',
        )
        ->from('TR01_WORK as TR01')
        ->leftJoin('MT05_WORKPTN as MT05', 'TR01.WORKPTN_CD', 'MT05.WORKPTN_CD')
        ->whereRaw("MT05.WORK_CLS_CD = '00'")
        ->whereRaw("MT05.RSV1_CLS_CD = '01'")
        ->toSql();

        $sum_count_query = \DB::table('TR01_WORK')
                            ->select(
                                'EMP_CD',
                                DB::raw('Sum(WORKDAY_CNT) SUM_WORKDAY_CNT'),
                                DB::raw('Sum(PADHOL_CNT) SUM_PADHOL_CNT'),
                                DB::raw('Sum(COMPDAY_CNT) SUM_COMPDAY_CNT'),
                                DB::raw('Sum(SPCHOL_CNT) SUM_SPCHOL_CNT'),
                                DB::raw('Sum(HOLWORK_CNT) SUM_HOLWORK_CNT'),
                                DB::raw('Sum(ABCWORK_CNT) SUM_ABCWORK_CNT')
                            )
                            ->whereRaw("CALD_YEAR = '". $year ."' and CALD_MONTH = '". $month ."'")
                            ->groupBy('EMP_CD')
                            ->toSql();

        $sum_tard_query = \DB::table('TR01_WORK')->select('EMP_CD', DB::raw('Count(*) SUM_TARD_CNT'))
                            ->whereRaw("CALD_YEAR = '". $year ."' and CALD_MONTH = '". $month ."'")
                            ->whereRaw('Not(TARD_TIME_HH = 0 And TARD_TIME_MI = 0)')
                            ->groupBy('EMP_CD')
                            ->toSql();

        $sum_leave_query = \DB::table('TR01_WORK')->select('EMP_CD', DB::raw('Count(*) SUM_LEAVE_CNT'))
                            ->whereRaw("CALD_YEAR = '". $year ."' and CALD_MONTH = '". $month ."'")
                            ->whereRaw('Not(LEAVE_TIME_HH = 0 And LEAVE_TIME_MI = 0)')
                            ->groupBy('EMP_CD')
                            ->toSql();

        return TR01Work::select(
            'MT10.DEPT_CD',
            'MT12.DEPT_NAME',
            'TR01.EMP_CD',
            'MT10.EMP_NAME',
            'TR01.CALD_DATE',
            'MT05.WORKPTN_NAME',
            'MT09.REASON_NAME',
            'WT_DEF.WORK_TIME_HH     as DEF_WORK_TIME_HH',
            'WT_DEF.WORK_TIME_MI     as DEF_WORK_TIME_MI',
            'WT_HOL.WORK_TIME_HH     as HOL_WORK_TIME_HH',
            'WT_HOL.WORK_TIME_MI     as HOL_WORK_TIME_MI',
            'WT_HOL_OUT.WORK_TIME_HH as HOL_OUT_WORK_TIME_HH',
            'WT_HOL_OUT.WORK_TIME_MI as HOL_OUT_WORK_TIME_MI',
            'TR01.WORK_TIME_HH',
            'TR01.WORK_TIME_MI',
            'TR01.TARD_TIME_HH',
            'TR01.TARD_TIME_MI',
            'TR01.LEAVE_TIME_HH',
            'TR01.LEAVE_TIME_MI',
            'TR01.OUT_TIME_HH',
            'TR01.OUT_TIME_MI',
            'MT94_100.WORK_DESC_NAME as WORK_DESC_NAME_100',
            'TR01.OVTM1_TIME_HH',
            'TR01.OVTM1_TIME_MI',
            'MT94_101.WORK_DESC_NAME as WORK_DESC_NAME_101',
            'TR01.OVTM2_TIME_HH',
            'TR01.OVTM2_TIME_MI',
            'MT94_102.WORK_DESC_NAME as WORK_DESC_NAME_102',
            'TR01.OVTM3_TIME_HH',
            'TR01.OVTM3_TIME_MI',
            'MT94_103.WORK_DESC_NAME as WORK_DESC_NAME_103',
            'TR01.OVTM4_TIME_HH',
            'TR01.OVTM4_TIME_MI',
            'MT94_104.WORK_DESC_NAME as WORK_DESC_NAME_104',
            'TR01.OVTM5_TIME_HH',
            'TR01.OVTM5_TIME_MI',
            'MT94_105.WORK_DESC_NAME as WORK_DESC_NAME_105',
            'TR01.OVTM6_TIME_HH',
            'TR01.OVTM6_TIME_MI',
        )
        ->selectRaw('IsNull(TR01_SUB.SUM_WORKDAY_CNT, 0) SUM_WORKDAY_CNT')
        ->selectRaw('IsNull(TR01_SUB.SUM_PADHOL_CNT, 0)  SUM_PADHOL_CNT')
        ->selectRaw('IsNull(TR01_SUB.SUM_COMPDAY_CNT, 0) SUM_COMPDAY_CNT')
        ->selectRaw('IsNull(TR01_SUB.SUM_SPCHOL_CNT, 0)  SUM_SPCHOL_CNT')
        ->selectRaw('IsNull(TR01_SUB.SUM_HOLWORK_CNT, 0) SUM_HOLWORK_CNT')
        ->selectRaw('IsNull(TR01_SUB.SUM_ABCWORK_CNT, 0) SUM_ABCWORK_CNT')
        ->selectRaw('IsNull(TR01_TARD.SUM_TARD_CNT, 0)   SUM_TARD_CNT')
        ->selectRaw('IsNull(TR01_LEAVE.SUM_LEAVE_CNT, 0) SUM_LEAVE_CNT')
        ->selectRaw("Case When TR01.OFC_TIME_HH = Null OR TR01.OFC_TIME_HH = '0' Then ''
            Else Convert(VarChar, TR01.OFC_TIME_HH)  + ':' + Right('00' + Convert(VarChar, TR01.OFC_TIME_MI), 2)
        End OFC_TIME")
        ->selectRaw("Case When TR01.LEV_TIME_HH = Null OR TR01.LEV_TIME_HH = '0' Then ''
            Else Convert(VarChar, TR01.LEV_TIME_HH)  + ':' + Right('00' + Convert(VarChar, TR01.LEV_TIME_MI), 2)
        End LEV_TIME")
        ->selectRaw("Case When TR01.OUT1_TIME_HH = Null OR TR01.OUT1_TIME_HH = '0' Then ''
            Else Convert(VarChar, TR01.OUT1_TIME_HH) + ':' + Right('00' + Convert(VarChar, TR01.OUT1_TIME_MI), 2)
        End OUT1_TIME")
        ->selectRaw("Case When TR01.IN1_TIME_HH = Null OR TR01.IN1_TIME_HH = '0' Then ''
            Else Convert(VarChar, TR01.IN1_TIME_HH)  + ':' + Right('00' + Convert(VarChar, TR01.IN1_TIME_MI), 2)
        End IN1_TIME")
        ->from('TR01_WORK as TR01')
        ->leftJoin('MT10_EMP       as MT10', 'TR01.EMP_CD', 'MT10.EMP_CD')
        ->leftJoin('MT12_DEPT      as MT12', 'MT10.DEPT_CD', 'MT12.DEPT_CD')
        ->leftJoin('MT05_WORKPTN   as MT05', 'TR01.WORKPTN_CD', 'MT05.WORKPTN_CD')
        ->leftJoin('MT09_REASON    as MT09', 'TR01.REASON_CD', 'MT09.REASON_CD')
        ->leftJoin('MT94_WORK_DESC as MT94_100', function ($join) {
            $join->on('MT94_100.WORK_DESC_CD', '=', 'MT94_100.WORK_DESC_CD')
            ->where('MT94_100.WORK_DESC_CD', '=', '100');
        })
        ->leftJoin('MT94_WORK_DESC as MT94_101', function ($join) {
            $join->on('MT94_101.WORK_DESC_CD', '=', 'MT94_101.WORK_DESC_CD')
            ->where('MT94_101.WORK_DESC_CD', '=', '101');
        })
        ->leftJoin('MT94_WORK_DESC as MT94_102', function ($join) {
            $join->on('MT94_102.WORK_DESC_CD', '=', 'MT94_102.WORK_DESC_CD')
            ->where('MT94_102.WORK_DESC_CD', '=', '102');
        })
        ->leftJoin('MT94_WORK_DESC as MT94_103', function ($join) {
            $join->on('MT94_103.WORK_DESC_CD', '=', 'MT94_103.WORK_DESC_CD')
            ->where('MT94_103.WORK_DESC_CD', '=', '103');
        })
        ->leftJoin('MT94_WORK_DESC as MT94_104', function ($join) {
            $join->on('MT94_104.WORK_DESC_CD', '=', 'MT94_104.WORK_DESC_CD')
            ->where('MT94_104.WORK_DESC_CD', '=', '104');
        })
        ->leftJoin('MT94_WORK_DESC as MT94_105', function ($join) {
            $join->on('MT94_105.WORK_DESC_CD', '=', 'MT94_105.WORK_DESC_CD')
            ->where('MT94_105.WORK_DESC_CD', '=', '105');
        })
        ->leftJoin('MT94_WORK_DESC as MT94_200', function ($join) {
            $join->on('MT94_200.WORK_DESC_CD', '=', 'MT94_200.WORK_DESC_CD')
            ->where('MT94_200.WORK_DESC_CD', '=', '200');
        })
        ->leftJoin('MT94_WORK_DESC as MT94_201', function ($join) {
            $join->on('MT94_201.WORK_DESC_CD', '=', 'MT94_201.WORK_DESC_CD')
            ->where('MT94_201.WORK_DESC_CD', '=', '201');
        })
        ->leftJoin('MT94_WORK_DESC as MT94_202', function ($join) {
            $join->on('MT94_202.WORK_DESC_CD', '=', 'MT94_202.WORK_DESC_CD')
            ->where('MT94_202.WORK_DESC_CD', '=', '202');
        })
        ->leftJoinSub($wt_def, 'WT_DEF', function ($join) {
            $join->on('TR01.EMP_CD', '=', 'WT_DEF.EMP_CD')
            ->whereRaw('TR01.CALD_DATE = WT_DEF.CALD_DATE');
        })
        ->leftJoinSub($wt_hol, 'WT_HOL', function ($join) {
            $join->on('TR01.EMP_CD', '=', 'WT_HOL.EMP_CD')
            ->whereRaw('TR01.CALD_DATE = WT_HOL.CALD_DATE');
        })
        ->leftJoinSub($wt_hol_out, 'WT_HOL_OUT', function ($join) {
            $join->on('TR01.EMP_CD', '=', 'WT_HOL_OUT.EMP_CD')
            ->whereRaw('TR01.CALD_DATE = WT_HOL_OUT.CALD_DATE');
        })
        ->leftJoinSub($sum_count_query, 'TR01_SUB', function ($join) {
            $join->on('TR01.EMP_CD', '=', 'TR01_SUB.EMP_CD');
        })
        ->leftJoinSub($sum_tard_query, 'TR01_TARD', function ($join) {
            $join->on('TR01.EMP_CD', '=', 'TR01_TARD.EMP_CD');
        })
        ->leftJoinSub($sum_leave_query, 'TR01_LEAVE', function ($join) {
            $join->on('TR01.EMP_CD', '=', 'TR01_LEAVE.EMP_CD');
        })
        ->where("CALD_YEAR", $year)
        ->where("CALD_MONTH", $month)
        ->filter($filter)
        ->orderBy('MT10.DEPT_CD')
        ->orderBy('TR01.EMP_CD')
        ->orderBy('TR01.CALD_DATE')
        ->get();
    }

    /**
     * 勤務実績表(社員別月報)A3横用キー項目情報を取得
     *
     * @param [type] $filter
     * @param [type] $year
     * @param [type] $month
     * @return object
     */
    public function getWorkTimeLandscapeKeyData($filter, $year, $month) : object
    {
        return TR01WORK::select(
            'MT10.DEPT_CD',
            'MT12.DEPT_NAME',
            'TR01.EMP_CD',
            'MT10.EMP_NAME'
        )
        ->from('TR01_WORK as TR01')
        ->leftJoin('MT10_EMP  as MT10', 'TR01.EMP_CD', 'MT10.EMP_CD')
        ->leftJoin('MT12_DEPT as MT12', 'MT10.DEPT_CD', 'MT12.DEPT_CD')
        ->where('TR01.CALD_YEAR', $year)
        ->where('TR01.CALD_MONTH', $month)
        ->filter($filter)
        ->distinct('MT10.DEPT_CD')
        ->orderBy('MT10.DEPT_CD')
        ->orderBy('TR01.EMP_CD')
        ->get();
    }

    /**
     * 勤務実績表(社員別日報)A3横用情報を取得
     *
     * @param [type] $emp_cd
     * @param [type] $year
     * @param [type] $month
     * @return void
     */
    public function getWorkTimeLandscapeData($emp_cd, $year, $month)
    {
        $sum_count_query = \DB::table('TR01_WORK')
                            ->select(
                                'EMP_CD',
                                DB::raw('SUM(WORKDAY_CNT) SUM_WORKDAY_CNT'),
                                DB::raw('SUM(PADHOL_CNT)  SUM_PADHOL_CNT'),
                                DB::raw('SUM(COMPDAY_CNT) SUM_COMPDAY_CNT'),
                                DB::raw('SUM(SPCHOL_CNT)  SUM_SPCHOL_CNT'),
                                DB::raw('SUM(OVTM1_TIME_HH) SUM_OVTM1_TIME_HH'),
                                DB::raw('SUM(OVTM1_TIME_MI) SUM_OVTM1_TIME_MI'),
                                DB::raw('SUM(OVTM2_TIME_HH) SUM_OVTM2_TIME_HH'),
                                DB::raw('SUM(OVTM2_TIME_MI) SUM_OVTM2_TIME_MI'),
                                DB::raw('SUM(OVTM3_TIME_HH) SUM_OVTM3_TIME_HH'),
                                DB::raw('SUM(OVTM3_TIME_MI) SUM_OVTM3_TIME_MI'),
                                DB::raw('SUM(OVTM4_TIME_HH) SUM_OVTM4_TIME_HH'),
                                DB::raw('SUM(OVTM4_TIME_MI) SUM_OVTM4_TIME_MI'),
                                DB::raw('SUM(EXT1_TIME_HH)  SUM_EXT1_TIME_HH'),
                                DB::raw('SUM(EXT1_TIME_MI)  SUM_EXT1_TIME_MI')
                            )
                            ->whereRaw("CALD_YEAR = '". $year ."' and CALD_MONTH = '".$month."'")
                            ->groupBy('EMP_CD')
                            ->toSql();

        return TR01WORK::select(
            'MT10.DEPT_CD',
            'MT12.DEPT_NAME',
            'TR01.EMP_CD',
            'MT10.EMP_NAME',
            'TR01.CALD_DATE',
            'TR01_SUB.SUM_WORKDAY_CNT',
            'TR01_SUB.SUM_PADHOL_CNT',
            'TR01_SUB.SUM_COMPDAY_CNT',
            'TR01_SUB.SUM_SPCHOL_CNT'
        )
        ->selectRaw("Case When TR01.OFC_TIME_HH = Null OR TR01.OFC_TIME_HH = '0' Then ''
            Else Convert(VarChar, TR01.OFC_TIME_HH)  + ':' + Right('00' + Convert(VarChar, TR01.OFC_TIME_MI), 2)
        End OFC_TIME")
        ->selectRaw("Case When TR01.LEV_TIME_HH = Null OR TR01.LEV_TIME_HH = '0' Then ''
            Else Convert(VarChar, TR01.LEV_TIME_HH)  + ':' + Right('00' + Convert(VarChar, TR01.LEV_TIME_MI), 2)
        End LEV_TIME")
        ->selectRaw("Case When TR01.TARD_TIME_HH = 0 And TR01.TARD_TIME_MI = 0 Then ''
            Else Convert(VarChar, TR01.TARD_TIME_HH) + ':' + Right('00' + Convert(VarChar, TR01.TARD_TIME_MI), 2)
        End TARD_TIME")
        ->selectRaw("Case When TR01.LEAVE_TIME_HH = 0 And TR01.LEAVE_TIME_MI = 0 Then ''
            Else Convert(VarChar, TR01.LEAVE_TIME_HH) + ':' + Right('00' + Convert(VarChar, TR01.LEAVE_TIME_MI), 2)
        End LEAVE_TIME")
        ->selectRaw("Case When TR01.OVTM1_TIME_HH + TR01.OVTM2_TIME_HH + TR01.OVTM3_TIME_HH +
                                    TR01.OVTM4_TIME_HH + TR01.OVTM5_TIME_HH + TR01.OVTM6_TIME_HH +
                                (TR01.OVTM1_TIME_HH + TR01.OVTM2_TIME_HH + TR01.OVTM3_TIME_HH + TR01.OVTM4_TIME_HH +
                                    TR01.OVTM5_TIME_HH + TR01.OVTM6_TIME_HH) / 60 = 0 And 
                                (TR01.OVTM1_TIME_MI + TR01.OVTM2_TIME_MI + TR01.OVTM3_TIME_MI + TR01.OVTM4_TIME_MI +
                                    TR01.OVTM5_TIME_MI + TR01.OVTM6_TIME_MI) % 60 = 0 Then ''
                    Else Convert(VarChar, TR01.OVTM1_TIME_HH + TR01.OVTM2_TIME_HH + TR01.OVTM3_TIME_HH +
                                    TR01.OVTM4_TIME_HH + TR01.OVTM5_TIME_HH + TR01.OVTM6_TIME_HH +
                                (TR01.OVTM1_TIME_MI + TR01.OVTM2_TIME_MI + TR01.OVTM3_TIME_MI + TR01.OVTM4_TIME_MI +
                                    TR01.OVTM5_TIME_MI + TR01.OVTM6_TIME_MI) / 60)
                                + ':' +
                                Right('00' + Convert(VarChar, (TR01.OVTM1_TIME_MI + TR01.OVTM2_TIME_MI +
                                    TR01.OVTM3_TIME_MI + TR01.OVTM4_TIME_MI + TR01.OVTM5_TIME_MI + TR01.OVTM6_TIME_MI)
                                 % 60), 2)
                    End OVTM_TIME")
        ->selectRaw("Left(MT94_100.WORK_DESC_NAME, 4) WORK_DESC_NAME_100")
        ->selectRaw("Convert(VarChar, TR01_SUB.SUM_OVTM1_TIME_HH + TR01_SUB.SUM_OVTM1_TIME_MI / 60) + ':' + 
                        Right('00' + Convert(VarChar, TR01_SUB.SUM_OVTM1_TIME_MI % 60), 2) SUM_OVTM1_TIME")
        ->selectRaw("Left(MT94_101.WORK_DESC_NAME, 4) WORK_DESC_NAME_101")
        ->selectRaw("Convert(VarChar, TR01_SUB.SUM_OVTM2_TIME_HH + TR01_SUB.SUM_OVTM2_TIME_MI / 60) + ':' + 
                        Right('00' + Convert(VarChar, TR01_SUB.SUM_OVTM2_TIME_MI % 60), 2) SUM_OVTM2_TIME")
        ->selectRaw("Left(MT94_102.WORK_DESC_NAME, 4) WORK_DESC_NAME_102")
        ->selectRaw("Convert(VarChar, TR01_SUB.SUM_OVTM3_TIME_HH + TR01_SUB.SUM_OVTM3_TIME_MI / 60) + ':' + 
                        Right('00' + Convert(VarChar, TR01_SUB.SUM_OVTM3_TIME_MI % 60), 2) SUM_OVTM3_TIME")
        ->selectRaw("Left(MT94_103.WORK_DESC_NAME, 4) WORK_DESC_NAME_103")
        ->selectRaw("Convert(VarChar, TR01_SUB.SUM_OVTM4_TIME_HH + TR01_SUB.SUM_OVTM4_TIME_MI / 60) + ':' + 
                        Right('00' + Convert(VarChar, TR01_SUB.SUM_OVTM4_TIME_MI % 60), 2) SUM_OVTM4_TIME")
        ->selectRaw("Left(MT94_200.WORK_DESC_NAME, 4) WORK_DESC_NAME_200")
        ->selectRaw("Convert(VarChar, TR01_SUB.SUM_EXT1_TIME_HH + TR01_SUB.SUM_EXT1_TIME_MI / 60)   + ':' + 
                        Right('00' + Convert(VarChar, TR01_SUB.SUM_EXT1_TIME_MI % 60), 2)  SUM_EXT1_TIME")
        ->from('TR01_WORK as TR01')
        ->leftJoin('MT10_EMP       as MT10', 'TR01.EMP_CD', 'MT10.EMP_CD')
        ->leftJoin('MT12_DEPT      as MT12', 'MT10.DEPT_CD', 'MT12.DEPT_CD')
        ->leftJoin('MT94_WORK_DESC as MT94_100', function ($join) {
            $join->on('MT94_100.WORK_DESC_CD', '=', 'MT94_100.WORK_DESC_CD')
            ->where('MT94_100.WORK_DESC_CD', '=', '100');
        })
        ->leftJoin('MT94_WORK_DESC as MT94_101', function ($join) {
            $join->on('MT94_101.WORK_DESC_CD', '=', 'MT94_101.WORK_DESC_CD')
            ->where('MT94_101.WORK_DESC_CD', '=', '101');
        })
        ->leftJoin('MT94_WORK_DESC as MT94_102', function ($join) {
            $join->on('MT94_102.WORK_DESC_CD', '=', 'MT94_102.WORK_DESC_CD')
            ->where('MT94_102.WORK_DESC_CD', '=', '102');
        })
        ->leftJoin('MT94_WORK_DESC as MT94_103', function ($join) {
            $join->on('MT94_103.WORK_DESC_CD', '=', 'MT94_103.WORK_DESC_CD')
            ->where('MT94_103.WORK_DESC_CD', '=', '103');
        })
        ->leftJoin('MT94_WORK_DESC as MT94_200', function ($join) {
            $join->on('MT94_200.WORK_DESC_CD', '=', 'MT94_200.WORK_DESC_CD')
            ->where('MT94_200.WORK_DESC_CD', '=', '200');
        })
        ->leftJoinSub($sum_count_query, 'TR01_SUB', function ($join) {
            $join->on('TR01.EMP_CD', '=', 'TR01_SUB.EMP_CD');
        })
        ->where('TR01.CALD_YEAR', $year)
        ->where('TR01.CALD_MONTH', $month)
        ->where('TR01.EMP_CD', $emp_cd)
        ->orderBy('TR01.CALD_DATE')
        ->get()
        ->toArray();
    }

    /**
     * 勤務実績表(社員別月報)A4横PTN1用情報をを取得
     *
     * @param [type] $filter
     * @param [type] $year
     * @param [type] $month
     * @return void
     */
    public function getWorkTimeLandscape2Data($filter, $year, $month)
    {
        // 出勤時間 [MT05.WORK_CLS_CD = '01']
        $wt_def = TR01Work::select(
            'TR01.EMP_CD',
            'TR01.CALD_DATE',
            'TR01.WORK_TIME_HH',
            'TR01.WORK_TIME_MI',
        )
        ->from('TR01_WORK as TR01')
        ->leftJoin('MT05_WORKPTN as MT05', 'TR01.WORKPTN_CD', 'MT05.WORKPTN_CD')
        ->whereRaw("MT05.WORK_CLS_CD = '01'")
        ->toSql();

        // 休日出勤(法定) [MT05.WORK_CLS_CD = '00' & MT05.RSV1_CLS_CD = '00']
        $wt_hol = TR01Work::select(
            'TR01.EMP_CD',
            'TR01.CALD_DATE',
            'TR01.WORK_TIME_HH',
            'TR01.WORK_TIME_MI',
        )
        ->from('TR01_WORK as TR01')
        ->leftJoin('MT05_WORKPTN as MT05', 'TR01.WORKPTN_CD', 'MT05.WORKPTN_CD')
        ->whereRaw("MT05.WORK_CLS_CD = '00'")
        ->whereRaw("MT05.RSV1_CLS_CD = '00'")
        ->toSql();

        // 休日出勤(法定外) [MT05.WORK_CLS_CD = '00' & MT05.RSV1_CLS_CD = '01']
        $wt_hol_out = TR01Work::select(
            'TR01.EMP_CD',
            'TR01.CALD_DATE',
            'TR01.WORK_TIME_HH',
            'TR01.WORK_TIME_MI',
        )
        ->from('TR01_WORK as TR01')
        ->leftJoin('MT05_WORKPTN as MT05', 'TR01.WORKPTN_CD', 'MT05.WORKPTN_CD')
        ->whereRaw("MT05.WORK_CLS_CD = '00'")
        ->whereRaw("MT05.RSV1_CLS_CD = '01'")
        ->toSql();

        $sum_count_query = \DB::table('TR01_WORK')
                            ->select(
                                'EMP_CD',
                                DB::raw('Sum(WORKDAY_CNT) SUM_WORKDAY_CNT'),
                                DB::raw('Sum(PADHOL_CNT) SUM_PADHOL_CNT'),
                                DB::raw('Sum(COMPDAY_CNT) SUM_COMPDAY_CNT'),
                                DB::raw('Sum(SPCHOL_CNT) SUM_SPCHOL_CNT'),
                                DB::raw('Sum(HOLWORK_CNT) SUM_HOLWORK_CNT'),
                                DB::raw('Sum(ABCWORK_CNT) SUM_ABCWORK_CNT')
                            )
                            ->whereRaw("CALD_YEAR = '". $year ."' and CALD_MONTH = '".$month."'")
                            ->groupBy('EMP_CD')
                            ->toSql();

        $sum_tard_query = \DB::table('TR01_WORK')->select('EMP_CD', DB::raw('Count(*) SUM_TARD_CNT'))
                            ->whereRaw("CALD_YEAR = '". $year ."' and CALD_MONTH = '".$month."'")
                            ->whereRaw('Not(TARD_TIME_HH = 0 And TARD_TIME_MI = 0)')
                            ->groupBy('EMP_CD')
                            ->toSql();

        $sum_leave_query = \DB::table('TR01_WORK')->select('EMP_CD', DB::raw('Count(*) SUM_LEAVE_CNT'))
                            ->whereRaw("CALD_YEAR = '". $year ."' and CALD_MONTH = '".$month."'")
                            ->whereRaw('Not(LEAVE_TIME_HH = 0 And LEAVE_TIME_MI = 0)')
                            ->groupBy('EMP_CD')
                            ->toSql();

        return TR01Work::select(
            'MT10.DEPT_CD',
            'MT12.DEPT_NAME',
            'TR01.EMP_CD',
            'MT10.EMP_NAME',
            'TR01.CALD_DATE',
            'MT05.WORKPTN_NAME',
            'MT09.REASON_NAME',
            'WT_DEF.WORK_TIME_HH     as DEF_WORK_TIME_HH',
            'WT_DEF.WORK_TIME_MI     as DEF_WORK_TIME_MI',
            'WT_HOL.WORK_TIME_HH     as HOL_WORK_TIME_HH',
            'WT_HOL.WORK_TIME_MI     as HOL_WORK_TIME_MI',
            'WT_HOL_OUT.WORK_TIME_HH as HOL_OUT_WORK_TIME_HH',
            'WT_HOL_OUT.WORK_TIME_MI as HOL_OUT_WORK_TIME_MI',
            'TR01.WORK_TIME_HH',
            'TR01.WORK_TIME_MI',
            'TR01.TARD_TIME_HH',
            'TR01.TARD_TIME_MI',
            'TR01.LEAVE_TIME_HH',
            'TR01.LEAVE_TIME_MI',
            'TR01.OUT_TIME_HH',
            'TR01.OUT_TIME_MI',
            'MT94_100.WORK_DESC_NAME as WORK_DESC_NAME_100',
            'TR01.OVTM1_TIME_HH',
            'TR01.OVTM1_TIME_MI',
            'MT94_101.WORK_DESC_NAME as WORK_DESC_NAME_101',
            'TR01.OVTM2_TIME_HH',
            'TR01.OVTM2_TIME_MI',
            'MT94_102.WORK_DESC_NAME as WORK_DESC_NAME_102',
            'TR01.OVTM3_TIME_HH',
            'TR01.OVTM3_TIME_MI',
            'MT94_103.WORK_DESC_NAME as WORK_DESC_NAME_103',
            'TR01.OVTM4_TIME_HH',
            'TR01.OVTM4_TIME_MI',
            'MT94_104.WORK_DESC_NAME as WORK_DESC_NAME_104',
            'TR01.OVTM5_TIME_HH',
            'TR01.OVTM5_TIME_MI',
            'MT94_105.WORK_DESC_NAME as WORK_DESC_NAME_105',
            'TR01.OVTM6_TIME_HH',
            'TR01.OVTM6_TIME_MI',
        )
        ->selectRaw('IsNull(TR01_SUB.SUM_WORKDAY_CNT, 0) SUM_WORKDAY_CNT')
        ->selectRaw('IsNull(TR01_SUB.SUM_PADHOL_CNT, 0)  SUM_PADHOL_CNT')
        ->selectRaw('IsNull(TR01_SUB.SUM_COMPDAY_CNT, 0) SUM_COMPDAY_CNT')
        ->selectRaw('IsNull(TR01_SUB.SUM_SPCHOL_CNT, 0)  SUM_SPCHOL_CNT')
        ->selectRaw('IsNull(TR01_SUB.SUM_HOLWORK_CNT, 0) SUM_HOLWORK_CNT')
        ->selectRaw('IsNull(TR01_SUB.SUM_ABCWORK_CNT, 0) SUM_ABCWORK_CNT')
        ->selectRaw('IsNull(TR01_TARD.SUM_TARD_CNT, 0)   SUM_TARD_CNT')
        ->selectRaw('IsNull(TR01_LEAVE.SUM_LEAVE_CNT, 0) SUM_LEAVE_CNT')
        ->selectRaw("Case When TR01.OFC_TIME_HH = Null OR TR01.OFC_TIME_HH = '0' Then ''
            Else Convert(VarChar, TR01.OFC_TIME_HH)  + ':' + Right('00' + Convert(VarChar, TR01.OFC_TIME_MI), 2)
        End OFC_TIME")
        ->selectRaw("Case When TR01.LEV_TIME_HH = Null OR TR01.LEV_TIME_HH = '0' Then ''
            Else Convert(VarChar, TR01.LEV_TIME_HH)  + ':' + Right('00' + Convert(VarChar, TR01.LEV_TIME_MI), 2)
        End LEV_TIME")
        ->selectRaw("Case When TR01.OUT1_TIME_HH = Null OR TR01.OUT1_TIME_HH = '0' Then ''
            Else Convert(VarChar, TR01.OUT1_TIME_HH) + ':' + Right('00' + Convert(VarChar, TR01.OUT1_TIME_MI), 2)
        End OUT1_TIME")
        ->selectRaw("Case When TR01.IN1_TIME_HH = Null OR TR01.IN1_TIME_HH = '0' Then ''
            Else Convert(VarChar, TR01.IN1_TIME_HH)  + ':' + Right('00' + Convert(VarChar, TR01.IN1_TIME_MI), 2)
        End IN1_TIME")
        ->from('TR01_WORK as TR01')
        ->leftJoin('MT10_EMP       as MT10', 'TR01.EMP_CD', 'MT10.EMP_CD')
        ->leftJoin('MT12_DEPT      as MT12', 'MT10.DEPT_CD', 'MT12.DEPT_CD')
        ->leftJoin('MT05_WORKPTN   as MT05', 'TR01.WORKPTN_CD', 'MT05.WORKPTN_CD')
        ->leftJoin('MT09_REASON    as MT09', 'TR01.REASON_CD', 'MT09.REASON_CD')
        ->leftJoin('MT94_WORK_DESC as MT94_100', function ($join) {
            $join->on('MT94_100.WORK_DESC_CD', '=', 'MT94_100.WORK_DESC_CD')
            ->where('MT94_100.WORK_DESC_CD', '=', '100');
        })
        ->leftJoin('MT94_WORK_DESC as MT94_101', function ($join) {
            $join->on('MT94_101.WORK_DESC_CD', '=', 'MT94_101.WORK_DESC_CD')
            ->where('MT94_101.WORK_DESC_CD', '=', '101');
        })
        ->leftJoin('MT94_WORK_DESC as MT94_102', function ($join) {
            $join->on('MT94_102.WORK_DESC_CD', '=', 'MT94_102.WORK_DESC_CD')
            ->where('MT94_102.WORK_DESC_CD', '=', '102');
        })
        ->leftJoin('MT94_WORK_DESC as MT94_103', function ($join) {
            $join->on('MT94_103.WORK_DESC_CD', '=', 'MT94_103.WORK_DESC_CD')
            ->where('MT94_103.WORK_DESC_CD', '=', '103');
        })
        ->leftJoin('MT94_WORK_DESC as MT94_104', function ($join) {
            $join->on('MT94_104.WORK_DESC_CD', '=', 'MT94_104.WORK_DESC_CD')
            ->where('MT94_104.WORK_DESC_CD', '=', '104');
        })
        ->leftJoin('MT94_WORK_DESC as MT94_105', function ($join) {
            $join->on('MT94_105.WORK_DESC_CD', '=', 'MT94_105.WORK_DESC_CD')
            ->where('MT94_105.WORK_DESC_CD', '=', '105');
        })
        ->leftJoin('MT94_WORK_DESC as MT94_200', function ($join) {
            $join->on('MT94_200.WORK_DESC_CD', '=', 'MT94_200.WORK_DESC_CD')
            ->where('MT94_200.WORK_DESC_CD', '=', '200');
        })
        ->leftJoin('MT94_WORK_DESC as MT94_201', function ($join) {
            $join->on('MT94_201.WORK_DESC_CD', '=', 'MT94_201.WORK_DESC_CD')
            ->where('MT94_201.WORK_DESC_CD', '=', '201');
        })
        ->leftJoin('MT94_WORK_DESC as MT94_202', function ($join) {
            $join->on('MT94_202.WORK_DESC_CD', '=', 'MT94_202.WORK_DESC_CD')
            ->where('MT94_202.WORK_DESC_CD', '=', '202');
        })
        ->leftJoinSub($wt_def, 'WT_DEF', function ($join) {
            $join->on('TR01.EMP_CD', '=', 'WT_DEF.EMP_CD')
            ->whereRaw('TR01.CALD_DATE = WT_DEF.CALD_DATE');
        })
        ->leftJoinSub($wt_hol, 'WT_HOL', function ($join) {
            $join->on('TR01.EMP_CD', '=', 'WT_HOL.EMP_CD')
            ->whereRaw('TR01.CALD_DATE = WT_HOL.CALD_DATE');
        })
        ->leftJoinSub($wt_hol_out, 'WT_HOL_OUT', function ($join) {
            $join->on('TR01.EMP_CD', '=', 'WT_HOL_OUT.EMP_CD')
            ->whereRaw('TR01.CALD_DATE = WT_HOL_OUT.CALD_DATE');
        })
        ->leftJoinSub($sum_count_query, 'TR01_SUB', function ($join) {
            $join->on('TR01.EMP_CD', '=', 'TR01_SUB.EMP_CD');
        })
        ->leftJoinSub($sum_tard_query, 'TR01_TARD', function ($join) {
            $join->on('TR01.EMP_CD', '=', 'TR01_TARD.EMP_CD');
        })
        ->leftJoinSub($sum_leave_query, 'TR01_LEAVE', function ($join) {
            $join->on('TR01.EMP_CD', '=', 'TR01_LEAVE.EMP_CD');
        })
        ->where("CALD_YEAR", $year)
        ->where("CALD_MONTH", $month)
        ->filter($filter)
        ->orderBy('MT10.DEPT_CD')
        ->orderBy('TR01.EMP_CD')
        ->orderBy('TR01.CALD_DATE')
        ->get();
    }

    /**
     * 勤務実績表(社員別月報)A4横PTN2用情報
     *
     * @param [type] $input_datas
     * @param [type] $filter
     * @param [type] $start
     * @param [type] $end
     * @return void
     */
    public function getWorkTimeLandscape3Data($input_datas, $filter, $start, $end, $year, $month)
    {
        // 出勤時間 [MT05.WORK_CLS_CD = '01']
        $wt_def = TR01Work::select(
            'TR01.EMP_CD',
            'TR01.CALD_DATE',
            'TR01.WORK_TIME_HH',
            'TR01.WORK_TIME_MI',
        )
        ->from('TR01_WORK as TR01')
        ->leftJoin('MT05_WORKPTN as MT05', 'TR01.WORKPTN_CD', 'MT05.WORKPTN_CD')
        ->whereRaw('MT05.WORK_CLS_CD = 01')
        ->toSql();

        // 休日出勤(法定) [MT05.WORK_CLS_CD = '00' & MT05.RSV1_CLS_CD = '00']
        $wt_hol_in = TR01Work::select(
            'TR01.EMP_CD',
            'TR01.CALD_DATE',
            'TR01.WORK_TIME_HH',
            'TR01.WORK_TIME_MI',
            'TR01.OVTM4_TIME_HH',
            'TR01.OVTM4_TIME_MI',
            'TR01.OVTM5_TIME_HH',
            'TR01.OVTM5_TIME_MI'
        )
        ->from('TR01_WORK as TR01')
        ->leftJoin('MT05_WORKPTN as MT05', 'TR01.WORKPTN_CD', 'MT05.WORKPTN_CD')
        ->whereRaw('MT05.WORK_CLS_CD = 00')
        ->whereRaw('MT05.RSV1_CLS_CD = 00')
        ->toSql();

        // 休日出勤(法定外) [MT05.WORK_CLS_CD = '00' & MT05.RSV1_CLS_CD = '01']
        $wt_hol_out = TR01Work::select(
            'TR01.EMP_CD',
            'TR01.CALD_DATE',
            'TR01.WORK_TIME_HH',
            'TR01.WORK_TIME_MI',
            'TR01.OVTM4_TIME_HH',
            'TR01.OVTM4_TIME_MI',
            'TR01.OVTM5_TIME_HH',
            'TR01.OVTM5_TIME_MI'
        )
        ->from('TR01_WORK as TR01')
        ->leftJoin('MT05_WORKPTN as MT05', 'TR01.WORKPTN_CD', 'MT05.WORKPTN_CD')
        ->whereRaw('MT05.WORK_CLS_CD = 00')
        ->whereRaw('MT05.RSV1_CLS_CD = 01')
        ->toSql();

        $tr01_tlo = TR01Work::select(
            'EMP_CD',
            'CALD_DATE'
        )
        ->selectRaw("Case When TARD_TIME_HH > 0 Then 'チ'
                          When TARD_TIME_MI > 0 Then 'チ'
                          Else ''
                    End TARD_MARK")
        ->selectRaw("Case When LEAVE_TIME_HH > 0 Then 'ソ'
                          When LEAVE_TIME_MI > 0 Then 'ソ'
                          Else ''
                     End LEAVE_MARK")
        ->selectRaw("Case When OVTM1_TIME_HH > 0 Then 'ザ'
                          When OVTM1_TIME_MI > 0 Then 'ザ'
                          When OVTM2_TIME_HH > 0 Then 'ザ'
                          When OVTM2_TIME_MI > 0 Then 'ザ'
                          When OVTM3_TIME_HH > 0 Then 'ザ'
                          When OVTM3_TIME_MI > 0 Then 'ザ'
                          When OVTM4_TIME_HH > 0 Then 'ザ'
                          When OVTM4_TIME_MI > 0 Then 'ザ'
                          When OVTM5_TIME_HH > 0 Then 'ザ'
                          When OVTM5_TIME_MI > 0 Then 'ザ'
                          When OVTM6_TIME_HH > 0 Then 'ザ'
                          When OVTM6_TIME_MI > 0 Then 'ザ'
                          Else ''
                     End OVTM_MARK")
        ->from('TR01_WORK as TR01')
        ->toSql();

        // 各合計時間
        $sum_count_query = \DB::table('TR01_WORK')
                            ->select(
                                'EMP_CD',
                                DB::raw('Sum(WORKDAY_CNT) SUM_WORKDAY_CNT'),
                                DB::raw('Sum(PADHOL_CNT) SUM_PADHOL_CNT'),
                                DB::raw('Sum(SPCHOL_CNT) SUM_SPCHOL_CNT'),
                                DB::raw('Sum(ABCWORK_CNT) SUM_ABCWORK_CNT')
                            )
                            ->when($input_datas['OutputCls'] == 'rbDateRange', function ($query) use ($start, $end) {
                                $query->whereRaw("CALD_DATE between '". $start ."' and '". $end."'");
                            })
                            ->when($input_datas['OutputCls'] == 'rbMonthCls', function ($query) use ($year, $month) {
                                $query->whereRaw("CALD_YEAR = '". $year ."' and CALD_MONTH = '".$month."'");
                            })
                            ->groupBy('EMP_CD')
                            ->toSql();

        return TR01Work::select(
            'TR01.EMP_CD',       // 社員CD
            'MT10.EMP_NAME',     // 社員名称
            'MT10.EMP2_CD',      // 社員２CD
            'MT10.DEPT_CD',      // 部門CD
            'MT12.DEPT_NAME',    // 部門名称
            'MT10.COMPANY_CD',   // 所属CD
            'MT23.COMPANY_NAME', // 所属名称
            'TR01.CALD_DATE',    // 日付
            'TR01.EXT1_TIME_HH', // 割増項目１時間（深夜割増）
            'TR01.EXT1_TIME_MI',
            'TR01.OVTM3_TIME_HH  as LATE_NIGHT_OVTM_TIME_HH', // 深夜残業
            'TR01.OVTM3_TIME_MI  as LATE_NIGHT_OVTM_TIME_MI',
            'TR01.OUT_TIME_HH', // 外出時間
            'TR01.OUT_TIME_MI',
            'TR01.REMARK'
        )
        ->selectRaw("Case When MT08.HLD_NO Is Null Then
                        Case DatePart(dw, TR01.CALD_DATE) 
                            When 1 Then '○' 
                            When 7 Then '○' 
                            Else ''
                        End 
                    Else 
                        '○' 
                    End HOLDAY_MARK") // 休日(土日、会社休日のレコードに"○"を設定)
        ->selectRaw("Case When TR01.OFC_TIME_HH Is Null And TR01.LEV_TIME_HH Is Null Then '' 
                        Else MT05.WORKPTN_NAME 
                    End WORKPTN_NAME") // 勤務体系名称
        ->selectRaw("Case When TR01.REASON_CD = '01' Then '' Else MT09.REASON_NAME End REASON_NAME") // 事由名称
        ->selectRaw("Case When TR01.OFC_TIME_HH = Null Then ''
                        Else 
                            Convert(VarChar, Case When TR01.OFC_TIME_HH >= 24 Then TR01.OFC_TIME_HH - 24 
                                                Else 
                                                TR01.OFC_TIME_HH End)
                                                + ':' +
                                                Right('00' + Convert(VarChar, TR01.OFC_TIME_MI), 2)
                    End OFC_TIME") // 出勤時刻
        ->selectRaw("Case When TR01.LEV_TIME_HH = Null Then ''
                        Else 
                            Convert(VarChar, Case When TR01.LEV_TIME_HH >= 24 Then TR01.LEV_TIME_HH - 24
                                                Else
                                                TR01.LEV_TIME_HH End)
                                                + ':' + Right('00' + Convert(VarChar, TR01.LEV_TIME_MI), 2)
                    End LEV_TIME") // 退出時刻
        ->selectRaw("(TR01_TLO.TARD_MARK + TR01_TLO.LEAVE_MARK + TR01_TLO.OVTM_MARK) TLO_MARK") //遅刻、早退、残業の有無文字列
        ->selectRaw("Case When TR01.OUT1_TIME_HH = Null Then ''
                        Else
                            Convert(VarChar, Case When TR01.OUT1_TIME_HH >= 24 Then TR01.OUT1_TIME_HH - 24
                                                Else
                                                TR01.OUT1_TIME_HH End)
                                                + ':' + Right('00' + Convert(VarChar, TR01.OUT1_TIME_MI), 2)
                    End OUT1_TIME") // 外出１時刻
        ->selectRaw("Case When TR01.IN1_TIME_HH = Null Then ''
                        Else
                            Convert(VarChar, Case When TR01.IN1_TIME_HH >= 24 Then TR01.IN1_TIME_HH - 24
                                                Else
                                                TR01.IN1_TIME_HH End) 
                                                + ':' + Right('00' + Convert(VarChar, TR01.IN1_TIME_MI), 2)
                    End IN1_TIME") //再入１時刻
        ->selectRaw("(TR01.WORK_TIME_HH  + TR01.OVTM1_TIME_HH + TR01.OVTM2_TIME_HH + TR01.OVTM3_TIME_HH +
                        TR01.OVTM4_TIME_HH + TR01.OVTM5_TIME_HH + TR01.OVTM6_TIME_HH) +
                     (TR01.WORK_TIME_MI  + TR01.OVTM1_TIME_MI + TR01.OVTM2_TIME_MI + TR01.OVTM3_TIME_MI +
                        TR01.OVTM4_TIME_MI + TR01.OVTM5_TIME_MI + TR01.OVTM6_TIME_MI)  / 60 TOTAL_WORK_TIME_HH") // 実働
        ->selectRaw("(TR01.WORK_TIME_MI  + TR01.OVTM1_TIME_MI + TR01.OVTM2_TIME_MI + TR01.OVTM3_TIME_MI +
                        TR01.OVTM4_TIME_MI + TR01.OVTM5_TIME_MI + TR01.OVTM6_TIME_MI)  % 60 TOTAL_WORK_TIME_MI")
        ->selectRaw("IsNull(WT_DEF.WORK_TIME_HH, 0)     DEF_WORK_TIME_HH") // 出勤時刻
        ->selectRaw("IsNull(WT_DEF.WORK_TIME_MI, 0)     DEF_WORK_TIME_MI")
        ->selectRaw("(TR01.OVTM1_TIME_HH + TR01.OVTM2_TIME_HH) + 
                     (TR01.OVTM1_TIME_MI + TR01.OVTM2_TIME_MI) / 60 NORMAL_OVTM_TIME_HH") // 普通残業
        ->selectRaw("IsNull((TR01.OVTM1_TIME_MI + TR01.OVTM2_TIME_MI) % 60, 0) NORMAL_OVTM_TIME_MI")
        ->selectRaw("IsNull((WT_HOL_IN.WORK_TIME_HH + WT_HOL_IN.OVTM4_TIME_HH) +
                            (WT_HOL_IN.WORK_TIME_MI + WT_HOL_IN.OVTM4_TIME_MI) / 60, 0) HOL_IN_WORK_TIME_HH") //法定休日出勤時間
        ->selectRaw("IsNull((WT_HOL_IN.WORK_TIME_MI + WT_HOL_IN.OVTM4_TIME_MI) % 60, 0) HOL_IN_WORK_TIME_MI")
        ->selectRaw("IsNull(WT_HOL_IN.OVTM5_TIME_HH, 0) HOL_IN_OVTM_TIME_HH") // 法定休日深夜残業
        ->selectRaw("IsNull(WT_HOL_IN.OVTM5_TIME_MI, 0) HOL_IN_OVTM_TIME_MI")
        ->selectRaw("IsNull(WT_HOL_OUT.WORK_TIME_HH, 0) HOL_OUT_WORK_TIME_HH") // 法定外休日出勤時間
        ->selectRaw("IsNull(WT_HOL_OUT.WORK_TIME_MI, 0) HOL_OUT_WORK_TIME_MI")
        ->selectRaw("IsNull(WT_HOL_OUT.OVTM4_TIME_HH, 0) HOL_OUT_OVTM_TIME_HH") // 法定外休日残業
        ->selectRaw("IsNull(WT_HOL_OUT.OVTM4_TIME_MI, 0) HOL_OUT_OVTM_TIME_MI")
        ->selectRaw("IsNull(WT_HOL_OUT.OVTM5_TIME_HH, 0) HOL_OUT_LATE_NIGHT_OVTM_TIME_HH") // 法定外休日深夜残業
        ->selectRaw("IsNull(WT_HOL_OUT.OVTM5_TIME_MI, 0) HOL_OUT_LATE_NIGHT_OVTM_TIME_MI")
        ->selectRaw("(TR01.TARD_TIME_HH + TR01.LEAVE_TIME_HH) +
                     (TR01.TARD_TIME_MI + TR01.LEAVE_TIME_MI) / 60 TARD_LEAVE_TIME_HH") //遅刻早退時間
        ->selectRaw("(TR01.TARD_TIME_MI + TR01.LEAVE_TIME_MI) % 60 TARD_LEAVE_TIME_MI")
        ->selectRaw("IsNull(TR01_SUB.SUM_WORKDAY_CNT, 0) SUM_WORKDAY_CNT") // 出勤日数
        ->selectRaw("IsNull(TR01_SUB.SUM_ABCWORK_CNT, 0) SUM_ABCWORK_CNT") // 欠勤日数")
        ->selectRaw("IsNull(TR01_SUB.SUM_PADHOL_CNT, 0)  SUM_PADHOL_CNT") // 有給日数
        ->selectRaw("IsNull(TR01_SUB.SUM_SPCHOL_CNT, 0)  SUM_SPCHOL_CNT") // 特休日数
        ->from('TR01_WORK as TR01')
        ->leftJoin('MT10_EMP     as MT10', 'TR01.EMP_CD', 'MT10.EMP_CD')
        ->leftJoin('MT12_DEPT    as MT12', 'MT10.DEPT_CD', 'MT12.DEPT_CD')
        ->leftJoin('MT23_COMPANY as MT23', function ($join) {
            $join->on('MT10.COMPANY_CD', 'MT23.COMPANY_CD')
                 ->where('MT23.DISP_CLS_CD', '01');
        })
        ->leftJoin('MT08_HOLIDAY as MT08', 'MT08.HLD_DATE', DB::raw('Right(Convert(Varchar, TR01.CALD_DATE, 112), 4)'))
        ->leftJoin('MT05_WORKPTN as MT05', 'TR01.WORKPTN_CD', 'MT05.WORKPTN_CD')
        ->leftJoin('MT09_REASON  as MT09', 'TR01.REASON_CD', 'MT09.REASON_CD')
        ->leftJoinSub($wt_def, 'WT_DEF', function ($join) {
            $join->on('TR01.EMP_CD', '=', 'WT_DEF.EMP_CD')
            ->whereRaw('TR01.CALD_DATE = WT_DEF.CALD_DATE');
        })
        ->leftJoinSub($wt_hol_in, 'WT_HOL_IN', function ($join) {
            $join->on('TR01.EMP_CD', '=', 'WT_HOL_IN.EMP_CD')
            ->whereRaw('TR01.CALD_DATE = WT_HOL_IN.CALD_DATE');
        })
        ->leftJoinSub($wt_hol_out, 'WT_HOL_OUT', function ($join) {
            $join->on('TR01.EMP_CD', '=', 'WT_HOL_OUT.EMP_CD')
            ->whereRaw('TR01.CALD_DATE = WT_HOL_OUT.CALD_DATE');
        })
        ->leftJoinSub($tr01_tlo, 'TR01_TLO', function ($join) {
            $join->on('TR01.EMP_CD', '=', 'TR01_TLO.EMP_CD')
            ->whereRaw('TR01.CALD_DATE = TR01_TLO.CALD_DATE');
        })
        ->leftJoinSub($sum_count_query, 'TR01_SUB', function ($join) {
            $join->on('TR01.EMP_CD', '=', 'TR01_SUB.EMP_CD');
        })
        ->when($input_datas['OutputCls'] == 'rbDateRange', function ($query) use ($start, $end) {
            $query->whereRaw("TR01.CALD_DATE between '". $start ."' and '". $end."'");
        })
        ->when($input_datas['OutputCls'] == 'rbMonthCls', function ($query) use ($year, $month) {
            $query->whereRaw("TR01.CALD_YEAR = '". $year ."' and TR01.CALD_MONTH = '".$month."'");
        })
        ->filter($filter)
        ->when($input_datas['Sort'] == 'rbSortDept', function ($query) {
            $query->orderBy('MT10.DEPT_CD')
                  ->orderBy('TR01.EMP_CD')
                  ->orderBy('TR01.CALD_DATE');
        })
        ->when($input_datas['Sort'] == 'rbSortSection', function ($query) {
            $query->orderBy('MT10.COMPANY_CD')
                  ->orderBy('TR01.EMP_CD')
                  ->orderBy('TR01.CALD_DATE');
        })
        ->get();
    }

    /**
     * 勤務実集計表用情報を取得
     *
     * @param [type] $filter
     * @param [type] $start
     * @param [type] $end
     * @return void
     */
    public function getWorkTimeSumData($filter, $start, $end)
    {
        return TR01WORK::select(
            'MT10.DEPT_CD',
            'MT12.DEPT_NAME',
            'TR01.EMP_CD',
            'MT10.EMP_NAME',
            'MT94_100.WORK_DESC_NAME as WORK_DESC_NAME_100',
            'MT94_101.WORK_DESC_NAME as WORK_DESC_NAME_101',
            'MT94_102.WORK_DESC_NAME as WORK_DESC_NAME_102',
            'MT94_103.WORK_DESC_NAME as WORK_DESC_NAME_103',
            'MT94_104.WORK_DESC_NAME as WORK_DESC_NAME_104',
            'MT94_105.WORK_DESC_NAME as WORK_DESC_NAME_105',
            'MT94_200.WORK_DESC_NAME as WORK_DESC_NAME_200',
            'MT94_201.WORK_DESC_NAME as WORK_DESC_NAME_201',
            'MT94_202.WORK_DESC_NAME as WORK_DESC_NAME_202'
        )
        ->selectRaw('Sum(TR01.WORKDAY_CNT) as SUM_WORKDAY_CNT')
        ->selectRaw('Sum(TR01.HOLWORK_CNT) as SUM_HOLWORK_CNT')
        ->selectRaw('Sum(TR01.SPCHOL_CNT)  as SUM_SPCHOL_CNT')
        ->selectRaw('Sum(TR01.PADHOL_CNT)  as SUM_PADHOL_CNT')
        ->selectRaw('Sum(TR01.ABCWORK_CNT) as SUM_ABCWORK_CNT')
        ->selectRaw('Sum(TR01.COMPDAY_CNT) as SUM_COMPDAY_CNT')
        ->selectRaw('Sum(TR01.WORK_TIME_HH)  + Sum(TR01.WORK_TIME_MI)  / 60 SUM_WORK_TIME_HH')
        ->selectRaw('Sum(TR01.WORK_TIME_MI)  % 60 SUM_WORK_TIME_MI')
        ->selectRaw('Sum(TR01.TARD_TIME_HH)  + Sum(TR01.TARD_TIME_MI)  / 60 SUM_TARD_TIME_HH')
        ->selectRaw('Sum(TR01.TARD_TIME_MI)  % 60 SUM_TARD_TIME_MI')
        ->selectRaw('Sum(TR01.LEAVE_TIME_HH) + Sum(TR01.LEAVE_TIME_MI) / 60 SUM_LEAVE_TIME_HH')
        ->selectRaw('Sum(TR01.LEAVE_TIME_MI) % 60 SUM_LEAVE_TIME_MI')
        ->selectRaw('Sum(TR01.OUT_TIME_HH)   + Sum(TR01.OUT_TIME_MI)   / 60 SUM_OUT_TIME_HH')
        ->selectRaw('Sum(TR01.OUT_TIME_MI)   % 60 SUM_OUT_TIME_MI')
        ->selectRaw('Sum(TR01.OVTM1_TIME_HH) + Sum(TR01.OVTM1_TIME_MI) / 60 SUM_OVTM1_TIME_HH')
        ->selectRaw('Sum(TR01.OVTM1_TIME_MI) % 60 SUM_OVTM1_TIME_MI')
        ->selectRaw('Sum(TR01.OVTM2_TIME_HH) + Sum(TR01.OVTM2_TIME_MI) / 60 SUM_OVTM2_TIME_HH')
        ->selectRaw('Sum(TR01.OVTM2_TIME_MI) % 60 SUM_OVTM2_TIME_MI')
        ->selectRaw('Sum(TR01.OVTM3_TIME_HH) + Sum(TR01.OVTM3_TIME_MI) / 60 SUM_OVTM3_TIME_HH')
        ->selectRaw('Sum(TR01.OVTM3_TIME_MI) % 60 SUM_OVTM3_TIME_MI')
        ->selectRaw('Sum(TR01.OVTM4_TIME_HH) + Sum(TR01.OVTM4_TIME_MI) / 60 SUM_OVTM4_TIME_HH')
        ->selectRaw('Sum(TR01.OVTM4_TIME_MI) % 60 SUM_OVTM4_TIME_MI')
        ->selectRaw('Sum(TR01.OVTM5_TIME_HH) + Sum(TR01.OVTM5_TIME_MI) / 60 SUM_OVTM5_TIME_HH')
        ->selectRaw('Sum(TR01.OVTM5_TIME_MI) % 60 SUM_OVTM5_TIME_MI')
        ->selectRaw('Sum(TR01.OVTM6_TIME_HH) + Sum(TR01.OVTM6_TIME_MI) / 60 SUM_OVTM6_TIME_HH')
        ->selectRaw('Sum(TR01.OVTM6_TIME_MI) % 60 SUM_OVTM6_TIME_MI')
        ->selectRaw('Sum(TR01.EXT1_TIME_HH)  + Sum(TR01.EXT1_TIME_MI)  / 60 SUM_EXT1_TIME_HH')
        ->selectRaw('Sum(TR01.EXT1_TIME_MI)  % 60 SUM_EXT1_TIME_MI')
        ->selectRaw('Sum(TR01.EXT2_TIME_HH)  + Sum(TR01.EXT2_TIME_MI)  / 60 SUM_EXT2_TIME_HH')
        ->selectRaw('Sum(TR01.EXT2_TIME_MI)  % 60 SUM_EXT2_TIME_MI')
        ->selectRaw('Sum(TR01.EXT3_TIME_HH)  + Sum(TR01.EXT3_TIME_MI)  / 60 SUM_EXT3_TIME_HH')
        ->selectRaw('Sum(TR01.EXT3_TIME_MI)  % 60 SUM_EXT3_TIME_MI')
        ->from('TR01_WORK as TR01')
        ->leftJoin('MT10_EMP       as MT10', 'TR01.EMP_CD', 'MT10.EMP_CD')
        ->leftJoin('MT12_DEPT      as MT12', 'MT10.DEPT_CD', 'MT12.DEPT_CD')
        ->leftJoin('MT94_WORK_DESC as MT94_100', function ($join) {
            $join->on('MT94_100.WORK_DESC_CD', '=', 'MT94_100.WORK_DESC_CD')
            ->where('MT94_100.WORK_DESC_CD', '=', '100');
        })
        ->leftJoin('MT94_WORK_DESC as MT94_101', function ($join) {
            $join->on('MT94_101.WORK_DESC_CD', '=', 'MT94_101.WORK_DESC_CD')
            ->where('MT94_101.WORK_DESC_CD', '=', '101');
        })
        ->leftJoin('MT94_WORK_DESC as MT94_102', function ($join) {
            $join->on('MT94_102.WORK_DESC_CD', '=', 'MT94_102.WORK_DESC_CD')
            ->where('MT94_102.WORK_DESC_CD', '=', '102');
        })
        ->leftJoin('MT94_WORK_DESC as MT94_103', function ($join) {
            $join->on('MT94_103.WORK_DESC_CD', '=', 'MT94_103.WORK_DESC_CD')
            ->where('MT94_103.WORK_DESC_CD', '=', '103');
        })
        ->leftJoin('MT94_WORK_DESC as MT94_104', function ($join) {
            $join->on('MT94_104.WORK_DESC_CD', '=', 'MT94_104.WORK_DESC_CD')
            ->where('MT94_104.WORK_DESC_CD', '=', '104');
        })
        ->leftJoin('MT94_WORK_DESC as MT94_105', function ($join) {
            $join->on('MT94_105.WORK_DESC_CD', '=', 'MT94_105.WORK_DESC_CD')
            ->where('MT94_105.WORK_DESC_CD', '=', '105');
        })
        ->leftJoin('MT94_WORK_DESC as MT94_200', function ($join) {
            $join->on('MT94_200.WORK_DESC_CD', '=', 'MT94_200.WORK_DESC_CD')
            ->where('MT94_200.WORK_DESC_CD', '=', '200');
        })
        ->leftJoin('MT94_WORK_DESC as MT94_201', function ($join) {
            $join->on('MT94_201.WORK_DESC_CD', '=', 'MT94_201.WORK_DESC_CD')
            ->where('MT94_201.WORK_DESC_CD', '=', '201');
        })
        ->leftJoin('MT94_WORK_DESC as MT94_202', function ($join) {
            $join->on('MT94_202.WORK_DESC_CD', '=', 'MT94_202.WORK_DESC_CD')
            ->where('MT94_202.WORK_DESC_CD', '=', '202');
        })
        ->filter($filter)
        ->whereBetween('TR01.CALD_DATE', [$start, $end])
        ->groupBy(['MT10.DEPT_CD', 'MT12.DEPT_NAME', 'TR01.EMP_CD', 'MT10.EMP_NAME', 'MT94_100.WORK_DESC_NAME',
                    'MT94_101.WORK_DESC_NAME', 'MT94_102.WORK_DESC_NAME', 'MT94_103.WORK_DESC_NAME',
                    'MT94_104.WORK_DESC_NAME', 'MT94_105.WORK_DESC_NAME', 'MT94_200.WORK_DESC_NAME',
                    'MT94_201.WORK_DESC_NAME', 'MT94_202.WORK_DESC_NAME'])
        ->orderBy('MT10.DEPT_CD')
        ->orderBy('TR01.EMP_CD')
        ->get();
    }
}
