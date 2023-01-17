<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\LG01Worktimeconv
 *
 * @property integer $TERM_NO
 * @property object $STR_DATE
 * @property object $END_DATE
 * @property string $GET_FLG
 * @property string $ERR_CONT
 * @method static \Illuminate\Database\Eloquent\Builder|LG01Worktimeconv newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LG01Worktimeconv newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LG01Worktimeconv query()
 * @method static \Illuminate\Database\Eloquent\Builder|LG01Worktimeconv whereENDDATE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LG01Worktimeconv whereERRCONT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LG01Worktimeconv whereGETFLG($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LG01Worktimeconv whereSTRDATE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LG01Worktimeconv whereTERMNO($value)
 */
	class LG01Worktimeconv extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MT01Control
 *
 * @property string $CONTROL_CD
 * @property string $COMPANY_NAME
 * @property string $COMPANY_KANA
 * @property string $COMPANY_ABR_NAME
 * @property string $POST_CD
 * @property string $ADDRESS1
 * @property string $ADDRESS2
 * @property string $ADDRESS3
 * @property string $TEL
 * @property string $FAX
 * @property string $MAIL
 * @property string $URL
 * @property integer $CLOSING_DATE
 * @property string $MONTH_CLS_CD
 * @property string $TERM_STR_MONTH
 * @property string $RSV1_CLS_CD
 * @property string $RSV2_CLS_CD
 * @property string $REMARK1
 * @property string $REMARK2
 * @property string $UPD_DATE
 * @property string $EMPFILE_PATH
 * @property string $RSV1_PATH
 * @property string $RSV2_PATH
 * @property integer $ADD_ZERO_NUM
 * @property string $COMNT1
 * @property string $COMNT2
 * @property string $COMNT3
 * @method static \Illuminate\Database\Eloquent\Builder|MT01Control newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT01Control newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT01Control query()
 * @method static \Illuminate\Database\Eloquent\Builder|MT01Control whereADDRESS1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT01Control whereADDRESS2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT01Control whereADDRESS3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT01Control whereADDZERONUM($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT01Control whereCLOSINGDATE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT01Control whereCOMNT1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT01Control whereCOMNT2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT01Control whereCOMNT3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT01Control whereCOMPANYABRNAME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT01Control whereCOMPANYKANA($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT01Control whereCOMPANYNAME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT01Control whereCONTROLCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT01Control whereEMPFILEPATH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT01Control whereFAX($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT01Control whereMAIL($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT01Control whereMONTHCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT01Control wherePOSTCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT01Control whereREMARK1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT01Control whereREMARK2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT01Control whereRSV1CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT01Control whereRSV1PATH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT01Control whereRSV2CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT01Control whereRSV2PATH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT01Control whereTEL($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT01Control whereTERMSTRMONTH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT01Control whereUPDDATE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT01Control whereURL($value)
 */
	class MT01Control extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MT02CalendarPtn
 *
 * @property string $CALENDAR_CD
 * @property string $CALENDAR_NAME
 * @property string $CALENDAR_CLS_CD
 * @property string $MON_WORKPTN_CD
 * @property string $TUE_WORKPTN_CD
 * @property string $WED_WORKPTN_CD
 * @property string $THU_WORKPTN_CD
 * @property string $FRI_WORKPTN_CD
 * @property string $SAT_WORKPTN_CD
 * @property string $SUN_WORKPTN_CD
 * @property string $HLD_WORKPTN_CD
 * @property string $RSV1_CLS_CD
 * @property string $RSV2_CLS_CD
 * @property string $UPD_DATE
 * @method static \Illuminate\Database\Eloquent\Builder|MT02CalendarPtn newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT02CalendarPtn newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT02CalendarPtn query()
 * @method static \Illuminate\Database\Eloquent\Builder|MT02CalendarPtn whereCALENDARCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT02CalendarPtn whereCALENDARCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT02CalendarPtn whereCALENDARNAME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT02CalendarPtn whereFRIWORKPTNCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT02CalendarPtn whereHLDWORKPTNCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT02CalendarPtn whereMONWORKPTNCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT02CalendarPtn whereRSV1CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT02CalendarPtn whereRSV2CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT02CalendarPtn whereSATWORKPTNCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT02CalendarPtn whereSUNWORKPTNCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT02CalendarPtn whereTHUWORKPTNCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT02CalendarPtn whereTUEWORKPTNCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT02CalendarPtn whereUPDDATE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT02CalendarPtn whereWEDWORKPTNCD($value)
 */
	class MT02CalendarPtn extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MT03Calendar
 *
 * @property string $CALENDAR_CD
 * @property string $CALD_YEAR
 * @property string $CALD_MONTH
 * @property string $CALD_DATE
 * @property string $WORKPTN_CD
 * @property string $RSV1_CLS_CD
 * @property string $RSV2_CLS_CD
 * @property string $UPD_DATE
 * @property string $CLOSING_DATE_CD
 * @method static \Illuminate\Database\Eloquent\Builder|MT03Calendar filter($filter)
 * @method static \Illuminate\Database\Eloquent\Builder|MT03Calendar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT03Calendar newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT03Calendar query()
 * @method static \Illuminate\Database\Eloquent\Builder|MT03Calendar whereCALDDATE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT03Calendar whereCALDMONTH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT03Calendar whereCALDYEAR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT03Calendar whereCALENDARCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT03Calendar whereCLOSINGDATECD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT03Calendar whereRSV1CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT03Calendar whereRSV2CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT03Calendar whereUPDDATE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT03Calendar whereWORKPTNCD($value)
 */
	class MT03Calendar extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MT04ShiftPtn
 *
 * @property string $SHIFTPTN_CD
 * @property string $SHIFTPTN_NAME
 * @property integer $DAY_NO
 * @property string $WORKPTN_CD
 * @property string $RSV1_CLS_CD
 * @property string $RSV2_CLS_CD
 * @property string $UPD_DATE
 * @method static \Illuminate\Database\Eloquent\Builder|MT04ShiftPtn newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT04ShiftPtn newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT04ShiftPtn query()
 * @method static \Illuminate\Database\Eloquent\Builder|MT04ShiftPtn whereDAYNO($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT04ShiftPtn whereRSV1CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT04ShiftPtn whereRSV2CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT04ShiftPtn whereSHIFTPTNCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT04ShiftPtn whereSHIFTPTNNAME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT04ShiftPtn whereUPDDATE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT04ShiftPtn whereWORKPTNCD($value)
 */
	class MT04ShiftPtn extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MT05Workptn
 *
 * @property string $WORKPTN_CD
 * @property string $WORKPTN_NAME
 * @property string $WORKPTN_ABR_NAME
 * @property string $WORK_CLS_CD
 * @property string $DUTY_CLS_CD
 * @property string $PTIME_WK1_CD
 * @property integer $PTIME_WK1_STR_HH
 * @property integer $PTIME_WK1_STR_MI
 * @property integer $PTIME_WK1_END_HH
 * @property integer $PTIME_WK1_END_MI
 * @property string $PTIME_WK2_CD
 * @property integer $PTIME_WK2_STR_HH
 * @property integer $PTIME_WK2_STR_MI
 * @property integer $PTIME_WK2_END_HH
 * @property integer $PTIME_WK2_END_MI
 * @property string $PTIME_WK3_CD
 * @property integer $PTIME_WK3_STR_HH
 * @property integer $PTIME_WK3_STR_MI
 * @property integer $PTIME_WK3_END_HH
 * @property integer $PTIME_WK3_END_MI
 * @property string $PTIME_WK4_CD
 * @property integer $PTIME_WK4_STR_HH
 * @property integer $PTIME_WK4_STR_MI
 * @property integer $PTIME_WK4_END_HH
 * @property integer $PTIME_WK4_END_MI
 * @property string $PTIME_WK5_CD
 * @property integer $PTIME_WK5_STR_HH
 * @property integer $PTIME_WK5_STR_MI
 * @property integer $PTIME_WK5_END_HH
 * @property integer $PTIME_WK5_END_MI
 * @property string $PTIME_WK6_CD
 * @property integer $PTIME_WK6_STR_HH
 * @property integer $PTIME_WK6_STR_MI
 * @property integer $PTIME_WK6_END_HH
 * @property integer $PTIME_WK6_END_MI
 * @property string $PTIME_WK7_CD
 * @property integer $PTIME_WK7_STR_HH
 * @property integer $PTIME_WK7_STR_MI
 * @property integer $PTIME_WK7_END_HH
 * @property integer $PTIME_WK7_END_MI
 * @property string $PTIME_WK8_CD
 * @property integer $PTIME_WK8_STR_HH
 * @property integer $PTIME_WK8_STR_MI
 * @property integer $PTIME_WK8_END_HH
 * @property integer $PTIME_WK8_END_MI
 * @property string $PTIME_WK9_CD
 * @property integer $PTIME_WK9_STR_HH
 * @property integer $PTIME_WK9_STR_MI
 * @property integer $PTIME_WK9_END_HH
 * @property integer $PTIME_WK9_END_MI
 * @property string $PTIME_WK10_CD
 * @property integer $PTIME_WK10_STR_HH
 * @property integer $PTIME_WK10_STR_MI
 * @property integer $PTIME_WK10_END_HH
 * @property integer $PTIME_WK10_END_MI
 * @property string $PTIME_EXT1_CD
 * @property integer $PTIME_EXT1_STR_HH
 * @property integer $PTIME_EXT1_STR_MI
 * @property integer $PTIME_EXT1_END_HH
 * @property integer $PTIME_EXT1_END_MI
 * @property string $PTIME_EXT2_CD
 * @property integer $PTIME_EXT2_STR_HH
 * @property integer $PTIME_EXT2_STR_MI
 * @property integer $PTIME_EXT2_END_HH
 * @property integer $PTIME_EXT2_END_MI
 * @property string $PTIME_EXT3_CD
 * @property integer $PTIME_EXT3_STR_HH
 * @property integer $PTIME_EXT3_STR_MI
 * @property integer $PTIME_EXT3_END_HH
 * @property integer $PTIME_EXT3_END_MI
 * @property string $PTIME_EXT4_CD
 * @property integer $PTIME_EXT4_STR_HH
 * @property integer $PTIME_EXT4_STR_MI
 * @property integer $PTIME_EXT4_END_HH
 * @property integer $PTIME_EXT4_END_MI
 * @property string $PTIME_EXT5_CD
 * @property integer $PTIME_EXT5_STR_HH
 * @property integer $PTIME_EXT5_STR_MI
 * @property integer $PTIME_EXT5_END_HH
 * @property integer $PTIME_EXT5_END_MI
 * @property integer $PTIME_FSTPRD_END_HH
 * @property integer $PTIME_FSTPRD_END_MI
 * @property integer $PTIME_SCDPRD_STR_HH
 * @property integer $PTIME_SCDPRD_STR_MI
 * @property integer $TIME_DAILY_HH
 * @property integer $TIME_DAILY_MI
 * @property string $NTIME_WK1_CD
 * @property integer $NTIME_WK1_STR_HH
 * @property integer $NTIME_WK1_STR_MI
 * @property integer $NTIME_WK1_END_HH
 * @property integer $NTIME_WK1_END_MI
 * @property string $NTIME_WK2_CD
 * @property integer $NTIME_WK2_STR_HH
 * @property integer $NTIME_WK2_STR_MI
 * @property integer $NTIME_WK2_END_HH
 * @property integer $NTIME_WK2_END_MI
 * @property string $NTIME_WK3_CD
 * @property integer $NTIME_WK3_STR_HH
 * @property integer $NTIME_WK3_STR_MI
 * @property integer $NTIME_WK3_END_HH
 * @property integer $NTIME_WK3_END_MI
 * @property string $NTIME_WK4_CD
 * @property integer $NTIME_WK4_STR_HH
 * @property integer $NTIME_WK4_STR_MI
 * @property integer $NTIME_WK4_END_HH
 * @property integer $NTIME_WK4_END_MI
 * @property string $NTIME_WK5_CD
 * @property integer $NTIME_WK5_STR_HH
 * @property integer $NTIME_WK5_STR_MI
 * @property integer $NTIME_WK5_END_HH
 * @property integer $NTIME_WK5_END_MI
 * @property string $NTIME_WK6_CD
 * @property integer $NTIME_WK6_STR_HH
 * @property integer $NTIME_WK6_STR_MI
 * @property integer $NTIME_WK6_END_HH
 * @property integer $NTIME_WK6_END_MI
 * @property string $NTIME_WK7_CD
 * @property integer $NTIME_WK7_STR_HH
 * @property integer $NTIME_WK7_STR_MI
 * @property integer $NTIME_WK7_END_HH
 * @property integer $NTIME_WK7_END_MI
 * @property string $NTIME_WK8_CD
 * @property integer $NTIME_WK8_STR_HH
 * @property integer $NTIME_WK8_STR_MI
 * @property integer $NTIME_WK8_END_HH
 * @property integer $NTIME_WK8_END_MI
 * @property string $NTIME_WK9_CD
 * @property integer $NTIME_WK9_STR_HH
 * @property integer $NTIME_WK9_STR_MI
 * @property integer $NTIME_WK9_END_HH
 * @property integer $NTIME_WK9_END_MI
 * @property string $NTIME_WK10_CD
 * @property integer $NTIME_WK10_STR_HH
 * @property integer $NTIME_WK10_STR_MI
 * @property integer $NTIME_WK10_END_HH
 * @property integer $NTIME_WK10_END_MI
 * @property string $NTIME_LEAVE_CLS_CD
 * @property integer $NTIME_START_HH
 * @property integer $NTIME_START_MI
 * @property integer $NTIME_START_TK_TIME
 * @property string $BREAK_CLS_CD
 * @property integer $PBRK1_STR_HH
 * @property integer $PBRK1_STR_MI
 * @property integer $PBRK1_END_HH
 * @property integer $PBRK1_END_MI
 * @property integer $PBRK1_TIME
 * @property integer $PBRK2_STR_HH
 * @property integer $PBRK2_STR_MI
 * @property integer $PBRK2_END_HH
 * @property integer $PBRK2_END_MI
 * @property integer $PBRK2_TIME
 * @property integer $PBRK3_STR_HH
 * @property integer $PBRK3_STR_MI
 * @property integer $PBRK3_END_HH
 * @property integer $PBRK3_END_MI
 * @property integer $PBRK3_TIME
 * @property integer $PBRK4_STR_HH
 * @property integer $PBRK4_STR_MI
 * @property integer $PBRK4_END_HH
 * @property integer $PBRK4_END_MI
 * @property integer $PBRK4_TIME
 * @property integer $PBRK5_STR_HH
 * @property integer $PBRK5_STR_MI
 * @property integer $PBRK5_END_HH
 * @property integer $PBRK5_END_MI
 * @property integer $PBRK5_TIME
 * @property integer $PBRK6_STR_HH
 * @property integer $PBRK6_STR_MI
 * @property integer $PBRK6_END_HH
 * @property integer $PBRK6_END_MI
 * @property integer $PBRK6_TIME
 * @property integer $PBRK7_STR_HH
 * @property integer $PBRK7_STR_MI
 * @property integer $PBRK7_END_HH
 * @property integer $PBRK7_END_MI
 * @property integer $PBRK7_TIME
 * @property integer $NBRK_TIME
 * @property integer $NBRK_MINUTE
 * @property integer $EBRK_PTIME
 * @property integer $EBRK_MINUTE
 * @property string $COM_CLS_CD
 * @property string $RSV1_CLS_CD
 * @property string $RSV2_CLS_CD
 * @property string $UPD_DATE
 * @property string $NWORK1_CLS_CD
 * @property string $RSV3_CLS_CD
 * @property string $RSV4_CLS_CD
 * @property string $RSV5_CLS_CD
 * @property integer $RSV1_HH
 * @property integer $RSV1_MI
 * @property integer $RSV2_HH
 * @property integer $RSV2_MI
 * @property integer $RSV3_HH
 * @property integer $RSV3_MI
 * @property string $NTIME_WK1_DCLS_CD
 * @property string $NTIME_WK2_DCLS_CD
 * @property string $NTIME_WK3_DCLS_CD
 * @property string $NTIME_WK4_DCLS_CD
 * @property string $NTIME_WK5_DCLS_CD
 * @property string $NTIME_WK6_DCLS_CD
 * @property string $NTIME_WK7_DCLS_CD
 * @property string $NTIME_WK8_DCLS_CD
 * @property string $NTIME_WK9_DCLS_CD
 * @property string $NTIME_WK10_DCLS_CD
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn query()
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereBREAKCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereCOMCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereDUTYCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereEBRKMINUTE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereEBRKPTIME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNBRKMINUTE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNBRKTIME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMELEAVECLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMESTARTHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMESTARTMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMESTARTTKTIME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK10CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK10DCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK10ENDHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK10ENDMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK10STRHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK10STRMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK1CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK1DCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK1ENDHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK1ENDMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK1STRHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK1STRMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK2CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK2DCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK2ENDHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK2ENDMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK2STRHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK2STRMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK3CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK3DCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK3ENDHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK3ENDMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK3STRHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK3STRMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK4CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK4DCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK4ENDHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK4ENDMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK4STRHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK4STRMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK5CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK5DCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK5ENDHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK5ENDMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK5STRHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK5STRMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK6CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK6DCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK6ENDHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK6ENDMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK6STRHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK6STRMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK7CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK7DCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK7ENDHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK7ENDMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK7STRHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK7STRMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK8CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK8DCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK8ENDHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK8ENDMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK8STRHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK8STRMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK9CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK9DCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK9ENDHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK9ENDMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK9STRHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNTIMEWK9STRMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereNWORK1CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePBRK1ENDHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePBRK1ENDMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePBRK1STRHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePBRK1STRMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePBRK1TIME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePBRK2ENDHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePBRK2ENDMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePBRK2STRHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePBRK2STRMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePBRK2TIME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePBRK3ENDHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePBRK3ENDMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePBRK3STRHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePBRK3STRMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePBRK3TIME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePBRK4ENDHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePBRK4ENDMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePBRK4STRHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePBRK4STRMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePBRK4TIME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePBRK5ENDHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePBRK5ENDMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePBRK5STRHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePBRK5STRMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePBRK5TIME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePBRK6ENDHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePBRK6ENDMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePBRK6STRHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePBRK6STRMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePBRK6TIME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePBRK7ENDHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePBRK7ENDMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePBRK7STRHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePBRK7STRMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePBRK7TIME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEEXT1CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEEXT1ENDHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEEXT1ENDMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEEXT1STRHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEEXT1STRMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEEXT2CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEEXT2ENDHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEEXT2ENDMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEEXT2STRHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEEXT2STRMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEEXT3CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEEXT3ENDHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEEXT3ENDMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEEXT3STRHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEEXT3STRMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEEXT4CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEEXT4ENDHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEEXT4ENDMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEEXT4STRHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEEXT4STRMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEEXT5CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEEXT5ENDHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEEXT5ENDMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEEXT5STRHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEEXT5STRMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEFSTPRDENDHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEFSTPRDENDMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMESCDPRDSTRHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMESCDPRDSTRMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEWK10CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEWK10ENDHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEWK10ENDMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEWK10STRHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEWK10STRMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEWK1CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEWK1ENDHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEWK1ENDMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEWK1STRHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEWK1STRMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEWK2CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEWK2ENDHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEWK2ENDMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEWK2STRHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEWK2STRMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEWK3CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEWK3ENDHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEWK3ENDMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEWK3STRHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEWK3STRMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEWK4CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEWK4ENDHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEWK4ENDMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEWK4STRHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEWK4STRMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEWK5CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEWK5ENDHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEWK5ENDMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEWK5STRHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEWK5STRMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEWK6CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEWK6ENDHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEWK6ENDMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEWK6STRHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEWK6STRMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEWK7CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEWK7ENDHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEWK7ENDMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEWK7STRHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEWK7STRMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEWK8CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEWK8ENDHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEWK8ENDMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEWK8STRHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEWK8STRMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEWK9CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEWK9ENDHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEWK9ENDMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEWK9STRHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn wherePTIMEWK9STRMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereRSV1CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereRSV1HH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereRSV1MI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereRSV2CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereRSV2HH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereRSV2MI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereRSV3CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereRSV3HH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereRSV3MI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereRSV4CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereRSV5CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereTIMEDAILYHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereTIMEDAILYMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereUPDDATE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereWORKCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereWORKPTNABRNAME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereWORKPTNCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT05Workptn whereWORKPTNNAME($value)
 */
	class MT05Workptn extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MT06OvertmLmt
 *
 * @property string $CALENDAR_CD
 * @property string $OVTM1_CD
 * @property integer $OVTM1_HR
 * @property string $OVTM2_CD
 * @property integer $OVTM2_HR
 * @property string $OVTM3_CD
 * @property integer $OVTM3_HR
 * @property string $OVTM4_CD
 * @property integer $OVTM4_HR
 * @property string $OVTM5_CD
 * @property integer $OVTM5_HR
 * @property string $OVTM6_CD
 * @property integer $OVTM6_HR
 * @property string $OVTM7_CD
 * @property integer $OVTM7_HR
 * @property string $OVTM8_CD
 * @property integer $OVTM8_HR
 * @property string $OVTM9_CD
 * @property integer $OVTM9_HR
 * @property string $OVTM10_CD
 * @property integer $OVTM10_HR
 * @property integer $NO_OVERTM_MI
 * @property string $RSV1_CLS_CD
 * @property string $RSV2_CLS_CD
 * @property string $UPD_DATE
 * @property integer $TTL_OVTM1_HR
 * @property integer $TTL_OVTM2_HR
 * @property integer $TTL_OVTM3_HR
 * @method static \Illuminate\Database\Eloquent\Builder|MT06OvertmLmt newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT06OvertmLmt newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT06OvertmLmt query()
 * @method static \Illuminate\Database\Eloquent\Builder|MT06OvertmLmt whereCALENDARCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT06OvertmLmt whereNOOVERTMMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT06OvertmLmt whereOVTM10CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT06OvertmLmt whereOVTM10HR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT06OvertmLmt whereOVTM1CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT06OvertmLmt whereOVTM1HR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT06OvertmLmt whereOVTM2CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT06OvertmLmt whereOVTM2HR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT06OvertmLmt whereOVTM3CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT06OvertmLmt whereOVTM3HR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT06OvertmLmt whereOVTM4CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT06OvertmLmt whereOVTM4HR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT06OvertmLmt whereOVTM5CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT06OvertmLmt whereOVTM5HR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT06OvertmLmt whereOVTM6CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT06OvertmLmt whereOVTM6HR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT06OvertmLmt whereOVTM7CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT06OvertmLmt whereOVTM7HR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT06OvertmLmt whereOVTM8CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT06OvertmLmt whereOVTM8HR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT06OvertmLmt whereOVTM9CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT06OvertmLmt whereOVTM9HR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT06OvertmLmt whereRSV1CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT06OvertmLmt whereRSV2CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT06OvertmLmt whereTTLOVTM1HR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT06OvertmLmt whereTTLOVTM2HR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT06OvertmLmt whereTTLOVTM3HR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT06OvertmLmt whereUPDDATE($value)
 */
	class MT06OvertmLmt extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MT07Fraction
 *
 * @property string $WORKPTN_CD
 * @property string $FRACTION_CLS_CD
 * @property integer $WTHR_UNDER_MI
 * @property string $WTHR_FRC_CLS_CD
 * @property integer $LTHR_UNDER_MI
 * @property string $LTHR_FRC_CLS_CD
 * @property integer $ERHR_UNDER_MI
 * @property string $ERHR_FRC_CLS_CD
 * @property integer $OTHR_UNDER_MI
 * @property string $OTHR_FRC_CLS_CD
 * @property integer $WTTM_UNDER_MI
 * @property string $WTTM_FRC_CLS_CD
 * @property integer $LVTM_UNDER_MI
 * @property string $LVTM_FRC_CLS_CD
 * @property integer $OTTM_UNDER_MI
 * @property string $OTTM_FRC_CLS_CD
 * @property integer $RETM_UNDER_MI
 * @property string $RETM_FRC_CLS_CD
 * @property string $OVTM1_CD
 * @property integer $OVTM1_UNDER_MI
 * @property string $OVTM1_FRC_CLS_CD
 * @property string $OVTM2_CD
 * @property integer $OVTM2_UNDER_MI
 * @property string $OVTM2_FRC_CLS_CD
 * @property string $OVTM3_CD
 * @property integer $OVTM3_UNDER_MI
 * @property string $OVTM3_FRC_CLS_CD
 * @property string $OVTM4_CD
 * @property integer $OVTM4_UNDER_MI
 * @property string $OVTM4_FRC_CLS_CD
 * @property string $OVTM5_CD
 * @property integer $OVTM5_UNDER_MI
 * @property string $OVTM5_FRC_CLS_CD
 * @property string $OVTM6_CD
 * @property integer $OVTM6_UNDER_MI
 * @property string $OVTM6_FRC_CLS_CD
 * @property string $OVTM7_CD
 * @property integer $OVTM7_UNDER_MI
 * @property string $OVTM7_FRC_CLS_CD
 * @property string $OVTM8_CD
 * @property integer $OVTM8_UNDER_MI
 * @property string $OVTM8_FRC_CLS_CD
 * @property string $OVTM9_CD
 * @property integer $OVTM9_UNDER_MI
 * @property string $OVTM9_FRC_CLS_CD
 * @property string $OVTM10_CD
 * @property integer $OVTM10_UNDER_MI
 * @property string $OVTM10_FRC_CLS_CD
 * @property string $EXT1_CD
 * @property integer $EXT1_UNDER_MI
 * @property string $EXT1_FRC_CLS_CD
 * @property string $EXT2_CD
 * @property integer $EXT2_UNDER_MI
 * @property string $EXT2_FRC_CLS_CD
 * @property string $EXT3_CD
 * @property integer $EXT3_UNDER_MI
 * @property string $EXT3_FRC_CLS_CD
 * @property string $EXT4_CD
 * @property integer $EXT4_UNDER_MI
 * @property string $EXT4_FRC_CLS_CD
 * @property string $EXT5_CD
 * @property integer $EXT5_UNDER_MI
 * @property string $EXT5_FRC_CLS_CD
 * @property string $RSV1_CLS_CD
 * @property string $RSV2_CLS_CD
 * @property string $UPD_DATE
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction query()
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereERHRFRCCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereERHRUNDERMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereEXT1CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereEXT1FRCCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereEXT1UNDERMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereEXT2CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereEXT2FRCCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereEXT2UNDERMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereEXT3CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereEXT3FRCCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereEXT3UNDERMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereEXT4CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereEXT4FRCCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereEXT4UNDERMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereEXT5CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereEXT5FRCCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereEXT5UNDERMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereFRACTIONCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereLTHRFRCCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereLTHRUNDERMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereLVTMFRCCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereLVTMUNDERMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereOTHRFRCCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereOTHRUNDERMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereOTTMFRCCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereOTTMUNDERMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereOVTM10CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereOVTM10FRCCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereOVTM10UNDERMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereOVTM1CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereOVTM1FRCCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereOVTM1UNDERMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereOVTM2CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereOVTM2FRCCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereOVTM2UNDERMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereOVTM3CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereOVTM3FRCCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereOVTM3UNDERMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereOVTM4CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereOVTM4FRCCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereOVTM4UNDERMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereOVTM5CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereOVTM5FRCCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereOVTM5UNDERMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereOVTM6CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereOVTM6FRCCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereOVTM6UNDERMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereOVTM7CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereOVTM7FRCCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereOVTM7UNDERMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereOVTM8CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereOVTM8FRCCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereOVTM8UNDERMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereOVTM9CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereOVTM9FRCCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereOVTM9UNDERMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereRETMFRCCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereRETMUNDERMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereRSV1CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereRSV2CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereUPDDATE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereWORKPTNCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereWTHRFRCCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereWTHRUNDERMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereWTTMFRCCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT07Fraction whereWTTMUNDERMI($value)
 */
	class MT07Fraction extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MT08Holiday
 *
 * @property integer $HLD_NO
 * @property string $HLD_DATE
 * @property string $HLD_MONTH
 * @property string $HLD_DAY
 * @property string $HLD_NAME
 * @property string $HLD_CLS_CD
 * @method static \Illuminate\Database\Eloquent\Builder|MT08Holiday newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT08Holiday newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT08Holiday query()
 * @method static \Illuminate\Database\Eloquent\Builder|MT08Holiday whereHLDCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT08Holiday whereHLDDATE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT08Holiday whereHLDDAY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT08Holiday whereHLDMONTH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT08Holiday whereHLDNAME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT08Holiday whereHLDNO($value)
 */
	class MT08Holiday extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MT09Reason
 *
 * @property string $REASON_CD
 * @property string $REASON_NAME
 * @property string $WORKDAY_CLS_CD
 * @property string $HOLWORK_CLS_CD
 * @property string $SPCHOL_CLS_CD
 * @property string $PADHOL_CLS_CD
 * @property string $ABCWORK_CLS_CD
 * @property string $COMPDAY_CLS_CD
 * @property float $WORKDAY_NO
 * @property string $REASON_PTN_CD
 * @property string $RSV1_CLS_CD
 * @property string $RSV2_CLS_CD
 * @property float $RSV1_NUM
 * @property float $RSV2_NUM
 * @property string $SUBHOL_CLS_CD
 * @property string $SUBWORK_CLS_CD
 * @property string $REASON_MARK
 * @method static \Illuminate\Database\Eloquent\Builder|MT09Reason newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT09Reason newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT09Reason query()
 * @method static \Illuminate\Database\Eloquent\Builder|MT09Reason whereABCWORKCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT09Reason whereCOMPDAYCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT09Reason whereHOLWORKCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT09Reason wherePADHOLCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT09Reason whereREASONCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT09Reason whereREASONMARK($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT09Reason whereREASONNAME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT09Reason whereREASONPTNCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT09Reason whereRSV1CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT09Reason whereRSV1NUM($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT09Reason whereRSV2CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT09Reason whereRSV2NUM($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT09Reason whereSPCHOLCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT09Reason whereSUBHOLCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT09Reason whereSUBWORKCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT09Reason whereWORKDAYCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT09Reason whereWORKDAYNO($value)
 */
	class MT09Reason extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MT10Emp
 *
 * @property string $EMP_CD
 * @property string $EMP_NAME
 * @property string $EMP_KANA
 * @property string $EMP_ABR
 * @property string $DEPT_CD
 * @property string $ENT_DATE
 * @property string $ENT_YEAR
 * @property string $ENT_MONTH
 * @property string $ENT_DAY
 * @property string $RET_DATE
 * @property string $RET_YEAR
 * @property string $RET_MONTH
 * @property string $RET_DAY
 * @property string $REG_CLS_CD
 * @property string $BIRTH_DATE
 * @property string $BIRTH_YEAR
 * @property string $BIRTH_MONTH
 * @property string $BIRTH_DAY
 * @property string $SEX_CLS_CD
 * @property string $EMP_CLS1_CD
 * @property string $EMP_CLS2_CD
 * @property string $EMP_CLS3_CD
 * @property string $CALENDAR_CD
 * @property string $DEPT_AUTH_CD
 * @property string $PG_AUTH_CD
 * @property string $POST_CD
 * @property string $ADDRESS1
 * @property string $ADDRESS2
 * @property string $TEL
 * @property string $CELLULAR
 * @property string $MAIL
 * @property string $RSV1_CLS_CD
 * @property string $RSV2_CLS_CD
 * @property string $UPD_DATE
 * @property string $PH_GRANT
 * @property string $PH_GRANT_YEAR
 * @property string $PH_GRANT_MONTH
 * @property string $CLOSING_DATE_CD
 * @property string $COMPANY_CD
 * @property string $EMP2_CD
 * @property string $EMP3_CD
 * @method static \Illuminate\Database\Eloquent\Builder|MT10Emp filter($filter)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10Emp newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT10Emp newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT10Emp query()
 * @method static \Illuminate\Database\Eloquent\Builder|MT10Emp whereADDRESS1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10Emp whereADDRESS2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10Emp whereBIRTHDATE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10Emp whereBIRTHDAY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10Emp whereBIRTHMONTH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10Emp whereBIRTHYEAR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10Emp whereCALENDARCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10Emp whereCELLULAR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10Emp whereCLOSINGDATECD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10Emp whereCOMPANYCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10Emp whereDEPTAUTHCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10Emp whereDEPTCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10Emp whereEMP2CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10Emp whereEMP3CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10Emp whereEMPABR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10Emp whereEMPCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10Emp whereEMPCLS1CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10Emp whereEMPCLS2CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10Emp whereEMPCLS3CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10Emp whereEMPKANA($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10Emp whereEMPNAME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10Emp whereENTDATE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10Emp whereENTDAY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10Emp whereENTMONTH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10Emp whereENTYEAR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10Emp whereMAIL($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10Emp wherePGAUTHCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10Emp wherePHGRANT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10Emp wherePHGRANTMONTH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10Emp wherePHGRANTYEAR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10Emp wherePOSTCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10Emp whereREGCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10Emp whereRETDATE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10Emp whereRETDAY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10Emp whereRETMONTH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10Emp whereRETYEAR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10Emp whereRSV1CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10Emp whereRSV2CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10Emp whereSEXCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10Emp whereTEL($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10Emp whereUPDDATE($value)
 */
	class MT10Emp extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MT11Login
 *
 * @property string $EMP_CD
 * @property string $LOGIN_ID
 * @property string $PASSWORD
 * @property string $UPD_DATE
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MT10Emp[] $EmpDept
 * @property-read int|null $emp_dept_count
 * @method static \Illuminate\Database\Eloquent\Builder|MT11Login newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT11Login newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT11Login query()
 * @method static \Illuminate\Database\Eloquent\Builder|MT11Login whereEMPCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT11Login whereLOGINID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT11Login wherePASSWORD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT11Login whereUPDDATE($value)
 */
	class MT11Login extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MT12Dept
 *
 * @property string $DEPT_CD
 * @property string $DEPT_NAME
 * @property string $UP_DEPT_CD
 * @property integer $LEVEL_NO
 * @property string $DISP_CLS_CD
 * @property string $RSV1_CLS_CD
 * @property string $RSV2_CLS_CD
 * @property string $UPD_DATE
 * @method static \Illuminate\Database\Eloquent\Builder|MT12Dept newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT12Dept newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT12Dept query()
 * @method static \Illuminate\Database\Eloquent\Builder|MT12Dept whereDEPTCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT12Dept whereDEPTNAME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT12Dept whereDISPCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT12Dept whereLEVELNO($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT12Dept whereRSV1CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT12Dept whereRSV2CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT12Dept whereUPDDATE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT12Dept whereUPDEPTCD($value)
 */
	class MT12Dept extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MT13DeptAuth
 *
 * @property string $DEPT_AUTH_CD
 * @property string $DEPT_AUTH_NAME
 * @property string $DEPT_CD
 * @property string $RSV1_CLS_CD
 * @property string $RSV2_CLS_CD
 * @property string $UPD_DATE
 * @method static \Illuminate\Database\Eloquent\Builder|MT13DeptAuth newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT13DeptAuth newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT13DeptAuth query()
 * @method static \Illuminate\Database\Eloquent\Builder|MT13DeptAuth whereDEPTAUTHCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT13DeptAuth whereDEPTAUTHNAME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT13DeptAuth whereDEPTCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT13DeptAuth whereRSV1CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT13DeptAuth whereRSV2CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT13DeptAuth whereUPDDATE($value)
 */
	class MT13DeptAuth extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MT14PgAuth
 *
 * @property string $PG_AUTH_CD
 * @property string $PG_AUTH_NAME
 * @property string $PG_CD
 * @property string $RSV1_CLS_CD
 * @property string $RSV2_CLS_CD
 * @property string $UPD_DATE
 * @method static \Illuminate\Database\Eloquent\Builder|MT14PgAuth filter($filter)
 * @method static \Illuminate\Database\Eloquent\Builder|MT14PgAuth newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT14PgAuth newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT14PgAuth query()
 * @method static \Illuminate\Database\Eloquent\Builder|MT14PgAuth wherePGAUTHCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT14PgAuth wherePGAUTHNAME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT14PgAuth wherePGCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT14PgAuth whereRSV1CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT14PgAuth whereRSV2CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT14PgAuth whereUPDDATE($value)
 */
	class MT14PgAuth extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MT16DeptShiftCalendar
 *
 * @property string $CALD_YEAR
 * @property string $CALD_MONTH
 * @property string $DEPT_CD
 * @property string $CALD_DATE
 * @property string $WORKPTN_CD
 * @property string $RSV1_CLS_CD
 * @property string $RSV2_CLS_CD
 * @property string $UPD_DATE
 * @property string $CLOSING_DATE_CD
 * @method static \Illuminate\Database\Eloquent\Builder|MT16DeptShiftCalendar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT16DeptShiftCalendar newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT16DeptShiftCalendar query()
 * @method static \Illuminate\Database\Eloquent\Builder|MT16DeptShiftCalendar whereCALDDATE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT16DeptShiftCalendar whereCALDMONTH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT16DeptShiftCalendar whereCALDYEAR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT16DeptShiftCalendar whereCLOSINGDATECD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT16DeptShiftCalendar whereDEPTCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT16DeptShiftCalendar whereRSV1CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT16DeptShiftCalendar whereRSV2CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT16DeptShiftCalendar whereUPDDATE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT16DeptShiftCalendar whereWORKPTNCD($value)
 */
	class MT16DeptShiftCalendar extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MT17PdHoliday
 *
 * @property string $EMP_CD
 * @property string $PD_YEAR
 * @property float $NUM_CARRYOVER
 * @property integer $MONTH_NO
 * @property string $PD_MONTH
 * @property float $PD_OFFSET
 * @property float $PD_USED
 * @method static \Illuminate\Database\Eloquent\Builder|MT17PdHoliday newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT17PdHoliday newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT17PdHoliday query()
 * @method static \Illuminate\Database\Eloquent\Builder|MT17PdHoliday whereEMPCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT17PdHoliday whereMONTHNO($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT17PdHoliday whereNUMCARRYOVER($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT17PdHoliday wherePDMONTH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT17PdHoliday wherePDOFFSET($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT17PdHoliday wherePDUSED($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT17PdHoliday wherePDYEAR($value)
 */
	class MT17PdHoliday extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MT21_PDHOLIDAY_GRT
 *
 * @property integer $GRT_NO
 * @property integer $WORK_YEAR
 * @property integer $WORK_MONTH
 * @property float $PD_GRANT_NUM
 * @method static \Illuminate\Database\Eloquent\Builder|MT21_PDHOLIDAY_GRT newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT21_PDHOLIDAY_GRT newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT21_PDHOLIDAY_GRT query()
 * @method static \Illuminate\Database\Eloquent\Builder|MT21_PDHOLIDAY_GRT whereGRTNO($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT21_PDHOLIDAY_GRT wherePDGRANTNUM($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT21_PDHOLIDAY_GRT whereWORKMONTH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT21_PDHOLIDAY_GRT whereWORKYEAR($value)
 */
	class MT21_PDHOLIDAY_GRT extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MT22ClosingDate
 *
 * @property string $CLOSING_DATE_CD
 * @property integer $CLOSING_DATE
 * @property string $MONTH_CLS_CD
 * @property string $CLOSING_DATE_NAME
 * @property string $RSV1_CLS_CD
 * @property string $RSV2_CLS_CD
 * @method static \Illuminate\Database\Eloquent\Builder|MT22ClosingDate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT22ClosingDate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT22ClosingDate query()
 * @method static \Illuminate\Database\Eloquent\Builder|MT22ClosingDate whereCLOSINGDATE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT22ClosingDate whereCLOSINGDATECD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT22ClosingDate whereCLOSINGDATENAME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT22ClosingDate whereMONTHCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT22ClosingDate whereRSV1CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT22ClosingDate whereRSV2CLSCD($value)
 */
	class MT22ClosingDate extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MT23Company
 *
 * @property string $COMPANY_CD
 * @property string $COMPANY_NAME
 * @property string $COMPANY_KANA
 * @property string $COMPANY_ABR
 * @property string $POST_CD
 * @property string $ADDRESS1
 * @property string $ADDRESS2
 * @property string $ADDRESS3
 * @property string $TEL
 * @property string $FAX
 * @property string $REMARK
 * @property string $DISP_CLS_CD
 * @property string $RSV1_CLS_CD
 * @property string $RSV2_CLS_CD
 * @property string $RSV1_TXT
 * @property string $RSV2_TXT
 * @property string $UPD_DATE
 * @method static \Illuminate\Database\Eloquent\Builder|MT23Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT23Company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT23Company query()
 * @method static \Illuminate\Database\Eloquent\Builder|MT23Company whereADDRESS1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT23Company whereADDRESS2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT23Company whereADDRESS3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT23Company whereCOMPANYABR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT23Company whereCOMPANYCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT23Company whereCOMPANYKANA($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT23Company whereCOMPANYNAME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT23Company whereDISPCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT23Company whereFAX($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT23Company wherePOSTCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT23Company whereREMARK($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT23Company whereRSV1CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT23Company whereRSV1TXT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT23Company whereRSV2CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT23Company whereRSV2TXT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT23Company whereTEL($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT23Company whereUPDDATE($value)
 */
	class MT23Company extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MT91ClsDetail
 *
 * @property string $CLS_CD
 * @property string $CLS_DETAIL_CD
 * @property string $CLS_DETAIL_NAME
 * @method static \Illuminate\Database\Eloquent\Builder|MT91ClsDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT91ClsDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT91ClsDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|MT91ClsDetail whereCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT91ClsDetail whereCLSDETAILCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT91ClsDetail whereCLSDETAILNAME($value)
 */
	class MT91ClsDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MT92DescDetail
 *
 * @property string $CLS_CD
 * @property string $DESC_DETAIL_CD
 * @property string $DESC_DETAIL_NAME
 * @method static \Illuminate\Database\Eloquent\Builder|MT92DescDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT92DescDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT92DescDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|MT92DescDetail whereCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT92DescDetail whereDESCDETAILCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT92DescDetail whereDESCDETAILNAME($value)
 */
	class MT92DescDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MT93Pg
 *
 * @property string $PG_CD
 * @property string $PG_NAME
 * @property string $MCLS_CD
 * @property string $MCLS_NAME
 * @method static \Illuminate\Database\Eloquent\Builder|MT93Pg filter($filter)
 * @method static \Illuminate\Database\Eloquent\Builder|MT93Pg newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT93Pg newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT93Pg query()
 * @method static \Illuminate\Database\Eloquent\Builder|MT93Pg whereMCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT93Pg whereMCLSNAME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT93Pg wherePGCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT93Pg wherePGNAME($value)
 */
	class MT93Pg extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MT94WorkDesc
 *
 * @property string $WORK_DESC_CD
 * @property string $WORK_DESC_NAME
 * @property string $WORK_DESC_CLS_CD
 * @property string $RSV1_CLS_CD
 * @property string $RSV2_CLS_CD
 * @property string $UPD_DATE
 * @method static \Illuminate\Database\Eloquent\Builder|MT94WorkDesc newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT94WorkDesc newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT94WorkDesc query()
 * @method static \Illuminate\Database\Eloquent\Builder|MT94WorkDesc whereRSV1CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT94WorkDesc whereRSV2CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT94WorkDesc whereUPDDATE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT94WorkDesc whereWORKDESCCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT94WorkDesc whereWORKDESCCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT94WorkDesc whereWORKDESCNAME($value)
 */
	class MT94WorkDesc extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MT95Term
 *
 * @property integer $TERM_NO
 * @property string $COMPUTER_NAME
 * @property string $INSTANCE_NAME
 * @property string $DATABASE_NAME
 * @property string $USER_NAME
 * @property string $USER_PASSWORD
 * @property string $TERM_NAME
 * @method static \Illuminate\Database\Eloquent\Builder|MT95Term newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT95Term newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT95Term query()
 * @method static \Illuminate\Database\Eloquent\Builder|MT95Term whereCOMPUTERNAME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT95Term whereDATABASENAME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT95Term whereINSTANCENAME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT95Term whereTERMNAME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT95Term whereTERMNO($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT95Term whereUSERNAME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT95Term whereUSERPASSWORD($value)
 */
	class MT95Term extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MT99Msg
 *
 * @property int $MSG_NO
 * @property string $MSG_CONT
 * @method static \Illuminate\Database\Eloquent\Builder|MT99Msg newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT99Msg newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT99Msg query()
 * @method static \Illuminate\Database\Eloquent\Builder|MT99Msg whereMSGCONT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT99Msg whereMSGNO($value)
 */
	class MT99Msg extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TR01Work
 *
 * @property string $EMP_CD
 * @property string $CALD_YEAR
 * @property string $CALD_MONTH
 * @property string $CALD_DATE
 * @property string $WORKPTN_CD
 * @property string $WORKPTN_STR_TIME
 * @property string $WORKPTN_END_TIME
 * @property string $REASON_CD
 * @property integer $OFC_TIME_HH
 * @property integer $OFC_TIME_MI
 * @property integer $OFC_CNT
 * @property integer $LEV_TIME_HH
 * @property integer $LEV_TIME_MI
 * @property integer $LEV_CNT
 * @property integer $OUT1_TIME_HH
 * @property integer $OUT1_TIME_MI
 * @property integer $OUT1_CNT
 * @property integer $IN1_TIME_HH
 * @property integer $IN1_TIME_MI
 * @property integer $IN1_CNT
 * @property integer $OUT2_TIME_HH
 * @property integer $OUT2_TIME_MI
 * @property integer $OUT2_CNT
 * @property integer $IN2_TIME_HH
 * @property integer $IN2_TIME_MI
 * @property integer $IN2_CNT
 * @property integer $WORK_TIME_HH
 * @property integer $WORK_TIME_MI
 * @property integer $TARD_TIME_HH
 * @property integer $TARD_TIME_MI
 * @property integer $LEAVE_TIME_HH
 * @property integer $LEAVE_TIME_MI
 * @property integer $OUT_TIME_HH
 * @property integer $OUT_TIME_MI
 * @property integer $OVTM1_TIME_HH
 * @property integer $OVTM1_TIME_MI
 * @property integer $OVTM2_TIME_HH
 * @property integer $OVTM2_TIME_MI
 * @property integer $OVTM3_TIME_HH
 * @property integer $OVTM3_TIME_MI
 * @property integer $OVTM4_TIME_HH
 * @property integer $OVTM4_TIME_MI
 * @property integer $OVTM5_TIME_HH
 * @property integer $OVTM5_TIME_MI
 * @property integer $OVTM6_TIME_HH
 * @property integer $OVTM6_TIME_MI
 * @property integer $OVTM7_TIME_HH
 * @property integer $OVTM7_TIME_MI
 * @property integer $OVTM8_TIME_HH
 * @property integer $OVTM8_TIME_MI
 * @property integer $OVTM9_TIME_HH
 * @property integer $OVTM9_TIME_MI
 * @property integer $OVTM10_TIME_HH
 * @property integer $OVTM10_TIME_MI
 * @property integer $EXT1_TIME_HH
 * @property integer $EXT1_TIME_MI
 * @property integer $EXT2_TIME_HH
 * @property integer $EXT2_TIME_MI
 * @property integer $EXT3_TIME_HH
 * @property integer $EXT3_TIME_MI
 * @property integer $EXT4_TIME_HH
 * @property integer $EXT4_TIME_MI
 * @property integer $EXT5_TIME_HH
 * @property integer $EXT5_TIME_MI
 * @property integer $RSV1_TIME_HH
 * @property integer $RSV1_TIME_MI
 * @property integer $RSV2_TIME_HH
 * @property integer $RSV2_TIME_MI
 * @property integer $RSV3_TIME_HH
 * @property integer $RSV3_TIME_MI
 * @property float $WORKDAY_CNT
 * @property float $HOLWORK_CNT
 * @property float $SPCHOL_CNT
 * @property float $PADHOL_CNT
 * @property float $ABCWORK_CNT
 * @property float $COMPDAY_CNT
 * @property float $RSV1_CNT
 * @property float $RSV2_CNT
 * @property float $RSV3_CNT
 * @property string $UPD_CLS_CD
 * @property string $FIX_CLS_CD
 * @property string $RSV1_CLS_CD
 * @property string $RSV2_CLS_CD
 * @property string $ADD_DATE
 * @property string $UPD_DATE
 * @property string $REMARK
 * @property float $SUBHOL_CNT
 * @property float $SUBWORK_CNT
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work filter($filter)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work query()
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereABCWORKCNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereADDDATE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereCALDDATE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereCALDMONTH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereCALDYEAR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereCOMPDAYCNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereEMPCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereEXT1TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereEXT1TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereEXT2TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereEXT2TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereEXT3TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereEXT3TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereEXT4TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereEXT4TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereEXT5TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereEXT5TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereFIXCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereHOLWORKCNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereIN1CNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereIN1TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereIN1TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereIN2CNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereIN2TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereIN2TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereLEAVETIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereLEAVETIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereLEVCNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereLEVTIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereLEVTIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereOFCCNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereOFCTIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereOFCTIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereOUT1CNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereOUT1TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereOUT1TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereOUT2CNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereOUT2TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereOUT2TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereOUTTIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereOUTTIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereOVTM10TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereOVTM10TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereOVTM1TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereOVTM1TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereOVTM2TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereOVTM2TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereOVTM3TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereOVTM3TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereOVTM4TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereOVTM4TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereOVTM5TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereOVTM5TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereOVTM6TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereOVTM6TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereOVTM7TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereOVTM7TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereOVTM8TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereOVTM8TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereOVTM9TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereOVTM9TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work wherePADHOLCNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereREASONCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereREMARK($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereRSV1CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereRSV1CNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereRSV1TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereRSV1TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereRSV2CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereRSV2CNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereRSV2TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereRSV2TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereRSV3CNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereRSV3TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereRSV3TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereSPCHOLCNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereSUBHOLCNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereSUBWORKCNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereTARDTIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereTARDTIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereUPDCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereUPDDATE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereWORKDAYCNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereWORKPTNCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereWORKPTNENDTIME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereWORKPTNSTRTIME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereWORKTIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work whereWORKTIMEMI($value)
 */
	class TR01Work extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TR02EmpCalendar
 *
 * @property string $CALD_YEAR
 * @property string $CALD_MONTH
 * @property string $EMP_CD
 * @property string $LAST_PTN_CD
 * @property integer $LAST_DAY_NO
 * @method static \Illuminate\Database\Eloquent\Builder|TR02EmpCalendar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TR02EmpCalendar newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TR02EmpCalendar query()
 * @method static \Illuminate\Database\Eloquent\Builder|TR02EmpCalendar whereCALDMONTH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR02EmpCalendar whereCALDYEAR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR02EmpCalendar whereEMPCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR02EmpCalendar whereLASTDAYNO($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR02EmpCalendar whereLASTPTNCD($value)
 */
	class TR02EmpCalendar extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TR03DeptCalendar
 *
 * @property string $CALD_YEAR
 * @property string $CALD_MONTH
 * @property string $DEPT_CD
 * @property string $LAST_PTN_CD
 * @property integer $LAST_DAY_NO
 * @property string $CLOSING_DATE_CD
 * @method static \Illuminate\Database\Eloquent\Builder|TR03DeptCalendar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TR03DeptCalendar newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TR03DeptCalendar query()
 * @method static \Illuminate\Database\Eloquent\Builder|TR03DeptCalendar whereCALDMONTH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR03DeptCalendar whereCALDYEAR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR03DeptCalendar whereCLOSINGDATECD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR03DeptCalendar whereDEPTCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR03DeptCalendar whereLASTDAYNO($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR03DeptCalendar whereLASTPTNCD($value)
 */
	class TR03DeptCalendar extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TR04WorkTimeFix
 *
 * @property string $CALD_YEAR
 * @property string $CALD_MONTH
 * @property string $DEPT_CD
 * @property integer $FIX_CNT
 * @property string $UPD_DATE
 * @property string $CLOSING_DATE_CD
 * @method static \Illuminate\Database\Eloquent\Builder|TR04WorkTimeFix newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TR04WorkTimeFix newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TR04WorkTimeFix query()
 * @method static \Illuminate\Database\Eloquent\Builder|TR04WorkTimeFix whereCALDMONTH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR04WorkTimeFix whereCALDYEAR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR04WorkTimeFix whereCLOSINGDATECD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR04WorkTimeFix whereDEPTCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR04WorkTimeFix whereFIXCNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR04WorkTimeFix whereUPDDATE($value)
 */
	class TR04WorkTimeFix extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TR05WorkTimeFixDly
 *
 * @property string $CALD_DATE
 * @property string $DEPT_CD
 * @property integer $FIX_CNT
 * @property string $UPD_DATE
 * @method static \Illuminate\Database\Eloquent\Builder|TR05WorkTimeFixDly newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TR05WorkTimeFixDly newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TR05WorkTimeFixDly query()
 * @method static \Illuminate\Database\Eloquent\Builder|TR05WorkTimeFixDly whereCALDDATE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR05WorkTimeFixDly whereDEPTCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR05WorkTimeFixDly whereFIXCNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR05WorkTimeFixDly whereUPDDATE($value)
 */
	class TR05WorkTimeFixDly extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TR50WorkTime
 *
 * @property string $EMP_CD
 * @property string $CRT_DATE
 * @property integer $TERM_NO
 * @property string $WORKTIME_CLS_CD
 * @property string $WORK_DATE
 * @property integer $WORK_TIME_HH
 * @property integer $WORK_TIME_MI
 * @property string $DATA_OUT_CLS_CD
 * @property string $DATA_OUT_DATE
 * @property string $CALD_DATE
 * @method static \Illuminate\Database\Eloquent\Builder|TR50WorkTime newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TR50WorkTime newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TR50WorkTime query()
 * @method static \Illuminate\Database\Eloquent\Builder|TR50WorkTime whereCALDDATE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR50WorkTime whereCRTDATE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR50WorkTime whereDATAOUTCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR50WorkTime whereDATAOUTDATE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR50WorkTime whereEMPCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR50WorkTime whereTERMNO($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR50WorkTime whereWORKDATE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR50WorkTime whereWORKTIMECLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR50WorkTime whereWORKTIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR50WorkTime whereWORKTIMEMI($value)
 */
	class TR50WorkTime extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string $status
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Wk01Work
 *
 * @property string $LOGIN_ID
 * @property string $EMP_CD
 * @property string $CALD_YEAR
 * @property string $CALD_MONTH
 * @property string $CALD_DATE
 * @property string $WORKPTN_CD
 * @property string $WORKPTN_STR_TIME
 * @property string $WORKPTN_END_TIME
 * @property string $REASON_CD
 * @property integer $OFC_TIME_HH
 * @property integer $OFC_TIME_MI
 * @property integer $OFC_CNT
 * @property integer $LEV_TIME_HH
 * @property integer $LEV_TIME_MI
 * @property integer $LEV_CNT
 * @property integer $OUT1_TIME_HH
 * @property integer $OUT1_TIME_MI
 * @property integer $OUT1_CNT
 * @property integer $IN1_TIME_HH
 * @property integer $IN1_TIME_MI
 * @property integer $IN1_CNT
 * @property integer $OUT2_TIME_HH
 * @property integer $OUT2_TIME_MI
 * @property integer $OUT2_CNT
 * @property integer $IN2_TIME_HH
 * @property integer $IN2_TIME_MI
 * @property integer $IN2_CNT
 * @property integer $WORK_TIME_HH
 * @property integer $WORK_TIME_MI
 * @property integer $TARD_TIME_HH
 * @property integer $TARD_TIME_MI
 * @property integer $LEAVE_TIME_HH
 * @property integer $LEAVE_TIME_MI
 * @property integer $OUT_TIME_HH
 * @property integer $OUT_TIME_MI
 * @property integer $OVTM1_TIME_HH
 * @property integer $OVTM1_TIME_MI
 * @property integer $OVTM2_TIME_HH
 * @property integer $OVTM2_TIME_MI
 * @property integer $OVTM3_TIME_HH
 * @property integer $OVTM3_TIME_MI
 * @property integer $OVTM4_TIME_HH
 * @property integer $OVTM4_TIME_MI
 * @property integer $OVTM5_TIME_HH
 * @property integer $OVTM5_TIME_MI
 * @property integer $OVTM6_TIME_HH
 * @property integer $OVTM6_TIME_MI
 * @property integer $OVTM7_TIME_HH
 * @property integer $OVTM7_TIME_MI
 * @property integer $OVTM8_TIME_HH
 * @property integer $OVTM8_TIME_MI
 * @property integer $OVTM9_TIME_HH
 * @property integer $OVTM9_TIME_MI
 * @property integer $OVTM10_TIME_HH
 * @property integer $OVTM10_TIME_MI
 * @property integer $EXT1_TIME_HH
 * @property integer $EXT1_TIME_MI
 * @property integer $EXT2_TIME_HH
 * @property integer $EXT2_TIME_MI
 * @property integer $EXT3_TIME_HH
 * @property integer $EXT3_TIME_MI
 * @property integer $EXT4_TIME_HH
 * @property integer $EXT4_TIME_MI
 * @property integer $EXT5_TIME_HH
 * @property integer $EXT5_TIME_MI
 * @property integer $RSV1_TIME_HH
 * @property integer $RSV1_TIME_MI
 * @property integer $RSV2_TIME_HH
 * @property integer $RSV2_TIME_MI
 * @property integer $RSV3_TIME_HH
 * @property integer $RSV3_TIME_MI
 * @property float $WORKDAY_CNT
 * @property float $HOLWORK_CNT
 * @property float $SPCHOL_CNT
 * @property float $PADHOL_CNT
 * @property float $ABCWORK_CNT
 * @property float $COMPDAY_CNT
 * @property float $RSV1_CNT
 * @property float $RSV2_CNT
 * @property float $RSV3_CNT
 * @property string $UPD_CLS_CD
 * @property string $FIX_CLS_CD
 * @property string $RSV1_CLS_CD
 * @property string $RSV2_CLS_CD
 * @property string $ADD_DATE
 * @property string $UPD_DATE
 * @property string $REMARK
 * @property float $SUBHOL_CNT
 * @property float $SUBWORK_CNT
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work filter($filter)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work query()
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereABCWORKCNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereADDDATE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereCALDDATE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereCALDMONTH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereCALDYEAR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereCOMPDAYCNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereEMPCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereEXT1TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereEXT1TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereEXT2TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereEXT2TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereEXT3TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereEXT3TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereEXT4TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereEXT4TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereEXT5TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereEXT5TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereFIXCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereHOLWORKCNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereIN1CNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereIN1TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereIN1TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereIN2CNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereIN2TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereIN2TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereLEAVETIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereLEAVETIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereLEVCNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereLEVTIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereLEVTIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereLOGINID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereOFCCNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereOFCTIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereOFCTIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereOUT1CNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereOUT1TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereOUT1TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereOUT2CNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereOUT2TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereOUT2TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereOUTTIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereOUTTIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereOVTM10TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereOVTM10TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereOVTM1TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereOVTM1TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereOVTM2TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereOVTM2TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereOVTM3TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereOVTM3TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereOVTM4TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereOVTM4TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereOVTM5TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereOVTM5TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereOVTM6TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereOVTM6TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereOVTM7TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereOVTM7TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereOVTM8TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereOVTM8TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereOVTM9TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereOVTM9TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work wherePADHOLCNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereREASONCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereREMARK($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereRSV1CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereRSV1CNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereRSV1TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereRSV1TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereRSV2CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereRSV2CNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereRSV2TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereRSV2TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereRSV3CNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereRSV3TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereRSV3TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereSPCHOLCNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereSUBHOLCNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereSUBWORKCNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereTARDTIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereTARDTIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereUPDCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereUPDDATE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereWORKDAYCNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereWORKPTNCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereWORKPTNENDTIME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereWORKPTNSTRTIME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereWORKTIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wk01Work whereWORKTIMEMI($value)
 */
	class Wk01Work extends \Eloquent {}
}

namespace App\Repositories{
/**
 * App\Repositories\MT03CalendarRepository
 *
 * @property string $CALENDAR_CD
 * @property string $CALD_YEAR
 * @property string $CALD_MONTH
 * @property \Illuminate\Support\Carbon $CALD_DATE
 * @property string $WORKPTN_CD
 * @property string $RSV1_CLS_CD
 * @property string $RSV2_CLS_CD
 * @property string $UPD_DATE
 * @property string $CLOSING_DATE_CD
 * @method static \Illuminate\Database\Eloquent\Builder|MT03Calendar filter($filter)
 * @method static \Illuminate\Database\Eloquent\Builder|MT03CalendarRepository newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT03CalendarRepository newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT03CalendarRepository query()
 * @method static \Illuminate\Database\Eloquent\Builder|MT03CalendarRepository whereCALDDATE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT03CalendarRepository whereCALDMONTH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT03CalendarRepository whereCALDYEAR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT03CalendarRepository whereCALENDARCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT03CalendarRepository whereCLOSINGDATECD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT03CalendarRepository whereRSV1CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT03CalendarRepository whereRSV2CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT03CalendarRepository whereUPDDATE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT03CalendarRepository whereWORKPTNCD($value)
 */
	class MT03CalendarRepository extends \Eloquent {}
}

namespace App\Repositories{
/**
 * App\Repositories\MT04ShiftPtnRepository
 *
 * @property string $SHIFTPTN_CD
 * @property string $SHIFTPTN_NAME
 * @property int $DAY_NO
 * @property string $WORKPTN_CD
 * @property string $RSV1_CLS_CD
 * @property string $RSV2_CLS_CD
 * @property string $UPD_DATE
 * @method static \Illuminate\Database\Eloquent\Builder|MT04ShiftPtnRepository newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT04ShiftPtnRepository newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT04ShiftPtnRepository query()
 * @method static \Illuminate\Database\Eloquent\Builder|MT04ShiftPtnRepository whereDAYNO($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT04ShiftPtnRepository whereRSV1CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT04ShiftPtnRepository whereRSV2CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT04ShiftPtnRepository whereSHIFTPTNCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT04ShiftPtnRepository whereSHIFTPTNNAME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT04ShiftPtnRepository whereUPDDATE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT04ShiftPtnRepository whereWORKPTNCD($value)
 */
	class MT04ShiftPtnRepository extends \Eloquent {}
}

namespace App\Repositories{
/**
 * App\Repositories\MT13DeptAuthRepository
 *
 * @property string $DEPT_AUTH_CD
 * @property string $DEPT_AUTH_NAME
 * @property string $DEPT_CD
 * @property string $RSV1_CLS_CD
 * @property string $RSV2_CLS_CD
 * @property string $UPD_DATE
 * @method static \Illuminate\Database\Eloquent\Builder|MT13DeptAuthRepository newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT13DeptAuthRepository newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT13DeptAuthRepository query()
 * @method static \Illuminate\Database\Eloquent\Builder|MT13DeptAuthRepository whereDEPTAUTHCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT13DeptAuthRepository whereDEPTAUTHNAME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT13DeptAuthRepository whereDEPTCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT13DeptAuthRepository whereRSV1CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT13DeptAuthRepository whereRSV2CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT13DeptAuthRepository whereUPDDATE($value)
 */
	class MT13DeptAuthRepository extends \Eloquent {}
}

namespace App\Repositories{
/**
 * App\Repositories\MT16DeptShiftCalendarRepository
 *
 * @property string $CALD_YEAR
 * @property string $CALD_MONTH
 * @property string $DEPT_CD
 * @property string $CALD_DATE
 * @property string $WORKPTN_CD
 * @property string $RSV1_CLS_CD
 * @property string $RSV2_CLS_CD
 * @property string $UPD_DATE
 * @property string $CLOSING_DATE_CD
 * @method static \Illuminate\Database\Eloquent\Builder|MT16DeptShiftCalendarRepository newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT16DeptShiftCalendarRepository newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT16DeptShiftCalendarRepository query()
 * @method static \Illuminate\Database\Eloquent\Builder|MT16DeptShiftCalendarRepository whereCALDDATE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT16DeptShiftCalendarRepository whereCALDMONTH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT16DeptShiftCalendarRepository whereCALDYEAR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT16DeptShiftCalendarRepository whereCLOSINGDATECD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT16DeptShiftCalendarRepository whereDEPTCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT16DeptShiftCalendarRepository whereRSV1CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT16DeptShiftCalendarRepository whereRSV2CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT16DeptShiftCalendarRepository whereUPDDATE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT16DeptShiftCalendarRepository whereWORKPTNCD($value)
 */
	class MT16DeptShiftCalendarRepository extends \Eloquent {}
}

namespace App\Repositories{
/**
 * App\Repositories\MT17PdHolidayRepository
 *
 * @property string $EMP_CD
 * @property string $PD_YEAR
 * @property float $NUM_CARRYOVER
 * @property int $MONTH_NO
 * @property string $PD_MONTH
 * @property float $PD_OFFSET
 * @property float $PD_USED
 * @method static \Illuminate\Database\Eloquent\Builder|MT17PdHolidayRepository newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT17PdHolidayRepository newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT17PdHolidayRepository query()
 * @method static \Illuminate\Database\Eloquent\Builder|MT17PdHolidayRepository whereEMPCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT17PdHolidayRepository whereMONTHNO($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT17PdHolidayRepository whereNUMCARRYOVER($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT17PdHolidayRepository wherePDMONTH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT17PdHolidayRepository wherePDOFFSET($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT17PdHolidayRepository wherePDUSED($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT17PdHolidayRepository wherePDYEAR($value)
 */
	class MT17PdHolidayRepository extends \Eloquent {}
}

namespace App\Repositories\Master{
/**
 * App\Repositories\Master\MT10EmpRefRepository
 *
 * @property string $EMP_CD
 * @property string $EMP_NAME
 * @property string $EMP_KANA
 * @property string $EMP_ABR
 * @property string $DEPT_CD
 * @property string $ENT_DATE
 * @property string $ENT_YEAR
 * @property string $ENT_MONTH
 * @property string $ENT_DAY
 * @property string $RET_DATE
 * @property string $RET_YEAR
 * @property string $RET_MONTH
 * @property string $RET_DAY
 * @property string $REG_CLS_CD
 * @property string $BIRTH_DATE
 * @property string $BIRTH_YEAR
 * @property string $BIRTH_MONTH
 * @property string $BIRTH_DAY
 * @property string $SEX_CLS_CD
 * @property string $EMP_CLS1_CD
 * @property string $EMP_CLS2_CD
 * @property string $EMP_CLS3_CD
 * @property string $CALENDAR_CD
 * @property string $DEPT_AUTH_CD
 * @property string $PG_AUTH_CD
 * @property string $POST_CD
 * @property string $ADDRESS1
 * @property string $ADDRESS2
 * @property string $TEL
 * @property string $CELLULAR
 * @property string $MAIL
 * @property string $RSV1_CLS_CD
 * @property string $RSV2_CLS_CD
 * @property string $UPD_DATE
 * @property string $PH_GRANT
 * @property string $PH_GRANT_YEAR
 * @property string $PH_GRANT_MONTH
 * @property string $CLOSING_DATE_CD
 * @property string $COMPANY_CD
 * @property string $EMP2_CD
 * @property string $EMP3_CD
 * @method static \Illuminate\Database\Eloquent\Builder|MT10Emp filter($filter)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10EmpRefRepository newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT10EmpRefRepository newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT10EmpRefRepository query()
 * @method static \Illuminate\Database\Eloquent\Builder|MT10EmpRefRepository whereADDRESS1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10EmpRefRepository whereADDRESS2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10EmpRefRepository whereBIRTHDATE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10EmpRefRepository whereBIRTHDAY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10EmpRefRepository whereBIRTHMONTH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10EmpRefRepository whereBIRTHYEAR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10EmpRefRepository whereCALENDARCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10EmpRefRepository whereCELLULAR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10EmpRefRepository whereCLOSINGDATECD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10EmpRefRepository whereCOMPANYCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10EmpRefRepository whereDEPTAUTHCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10EmpRefRepository whereDEPTCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10EmpRefRepository whereEMP2CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10EmpRefRepository whereEMP3CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10EmpRefRepository whereEMPABR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10EmpRefRepository whereEMPCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10EmpRefRepository whereEMPCLS1CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10EmpRefRepository whereEMPCLS2CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10EmpRefRepository whereEMPCLS3CD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10EmpRefRepository whereEMPKANA($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10EmpRefRepository whereEMPNAME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10EmpRefRepository whereENTDATE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10EmpRefRepository whereENTDAY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10EmpRefRepository whereENTMONTH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10EmpRefRepository whereENTYEAR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10EmpRefRepository whereMAIL($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10EmpRefRepository wherePGAUTHCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10EmpRefRepository wherePHGRANT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10EmpRefRepository wherePHGRANTMONTH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10EmpRefRepository wherePHGRANTYEAR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10EmpRefRepository wherePOSTCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10EmpRefRepository whereREGCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10EmpRefRepository whereRETDATE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10EmpRefRepository whereRETDAY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10EmpRefRepository whereRETMONTH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10EmpRefRepository whereRETYEAR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10EmpRefRepository whereRSV1CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10EmpRefRepository whereRSV2CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10EmpRefRepository whereSEXCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10EmpRefRepository whereTEL($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT10EmpRefRepository whereUPDDATE($value)
 */
	class MT10EmpRefRepository extends \Eloquent {}
}

namespace App\Repositories\Master{
/**
 * App\Repositories\Master\MT12DeptRepository
 *
 * @property string $DEPT_CD
 * @property string $DEPT_NAME
 * @property string $UP_DEPT_CD
 * @property int $LEVEL_NO
 * @property string $DISP_CLS_CD
 * @property string $RSV1_CLS_CD
 * @property string $RSV2_CLS_CD
 * @property string $UPD_DATE
 * @method static \Illuminate\Database\Eloquent\Builder|MT12DeptRepository newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT12DeptRepository newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT12DeptRepository query()
 * @method static \Illuminate\Database\Eloquent\Builder|MT12DeptRepository whereDEPTCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT12DeptRepository whereDEPTNAME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT12DeptRepository whereDISPCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT12DeptRepository whereLEVELNO($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT12DeptRepository whereRSV1CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT12DeptRepository whereRSV2CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT12DeptRepository whereUPDDATE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT12DeptRepository whereUPDEPTCD($value)
 */
	class MT12DeptRepository extends \Eloquent {}
}

namespace App\Repositories\Master{
/**
 * App\Repositories\Master\MT14AuthRefRepository
 *
 * @property string $PG_AUTH_CD
 * @property string $PG_AUTH_NAME
 * @property string $PG_CD
 * @property string $RSV1_CLS_CD
 * @property string $RSV2_CLS_CD
 * @property string $UPD_DATE
 * @method static \Illuminate\Database\Eloquent\Builder|MT14PgAuth filter($filter)
 * @method static \Illuminate\Database\Eloquent\Builder|MT14AuthRefRepository newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT14AuthRefRepository newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MT14AuthRefRepository query()
 * @method static \Illuminate\Database\Eloquent\Builder|MT14AuthRefRepository wherePGAUTHCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT14AuthRefRepository wherePGAUTHNAME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT14AuthRefRepository wherePGCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT14AuthRefRepository whereRSV1CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT14AuthRefRepository whereRSV2CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MT14AuthRefRepository whereUPDDATE($value)
 */
	class MT14AuthRefRepository extends \Eloquent {}
}

namespace App\Repositories{
/**
 * App\Repositories\TR01WorkRepository
 *
 * @property string $EMP_CD
 * @property string $CALD_YEAR
 * @property string $CALD_MONTH
 * @property string $CALD_DATE
 * @property string $WORKPTN_CD
 * @property string $WORKPTN_STR_TIME
 * @property string $WORKPTN_END_TIME
 * @property string $REASON_CD
 * @property int|null $OFC_TIME_HH
 * @property int|null $OFC_TIME_MI
 * @property int $OFC_CNT
 * @property int|null $LEV_TIME_HH
 * @property int|null $LEV_TIME_MI
 * @property int $LEV_CNT
 * @property int|null $OUT1_TIME_HH
 * @property int|null $OUT1_TIME_MI
 * @property int $OUT1_CNT
 * @property int|null $IN1_TIME_HH
 * @property int|null $IN1_TIME_MI
 * @property int $IN1_CNT
 * @property int|null $OUT2_TIME_HH
 * @property int|null $OUT2_TIME_MI
 * @property int $OUT2_CNT
 * @property int|null $IN2_TIME_HH
 * @property int|null $IN2_TIME_MI
 * @property int $IN2_CNT
 * @property int $WORK_TIME_HH
 * @property int $WORK_TIME_MI
 * @property int $TARD_TIME_HH
 * @property int $TARD_TIME_MI
 * @property int $LEAVE_TIME_HH
 * @property int $LEAVE_TIME_MI
 * @property int $OUT_TIME_HH
 * @property int $OUT_TIME_MI
 * @property int $OVTM1_TIME_HH
 * @property int $OVTM1_TIME_MI
 * @property int $OVTM2_TIME_HH
 * @property int $OVTM2_TIME_MI
 * @property int $OVTM3_TIME_HH
 * @property int $OVTM3_TIME_MI
 * @property int $OVTM4_TIME_HH
 * @property int $OVTM4_TIME_MI
 * @property int $OVTM5_TIME_HH
 * @property int $OVTM5_TIME_MI
 * @property int $OVTM6_TIME_HH
 * @property int $OVTM6_TIME_MI
 * @property int $OVTM7_TIME_HH
 * @property int $OVTM7_TIME_MI
 * @property int $OVTM8_TIME_HH
 * @property int $OVTM8_TIME_MI
 * @property int $OVTM9_TIME_HH
 * @property int $OVTM9_TIME_MI
 * @property int $OVTM10_TIME_HH
 * @property int $OVTM10_TIME_MI
 * @property int $EXT1_TIME_HH
 * @property int $EXT1_TIME_MI
 * @property int $EXT2_TIME_HH
 * @property int $EXT2_TIME_MI
 * @property int $EXT3_TIME_HH
 * @property int $EXT3_TIME_MI
 * @property int $EXT4_TIME_HH
 * @property int $EXT4_TIME_MI
 * @property int $EXT5_TIME_HH
 * @property int $EXT5_TIME_MI
 * @property int $RSV1_TIME_HH
 * @property int $RSV1_TIME_MI
 * @property int $RSV2_TIME_HH
 * @property int $RSV2_TIME_MI
 * @property int $RSV3_TIME_HH
 * @property int $RSV3_TIME_MI
 * @property float $WORKDAY_CNT
 * @property float $HOLWORK_CNT
 * @property float $SPCHOL_CNT
 * @property float $PADHOL_CNT
 * @property float $ABCWORK_CNT
 * @property float $COMPDAY_CNT
 * @property float $RSV1_CNT
 * @property float $RSV2_CNT
 * @property float $RSV3_CNT
 * @property string $UPD_CLS_CD
 * @property string $FIX_CLS_CD
 * @property string $RSV1_CLS_CD
 * @property string $RSV2_CLS_CD
 * @property string $ADD_DATE
 * @property string $UPD_DATE
 * @property string $REMARK
 * @property float $SUBHOL_CNT
 * @property float $SUBWORK_CNT
 * @method static \Illuminate\Database\Eloquent\Builder|TR01Work filter($filter)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository query()
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereABCWORKCNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereADDDATE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereCALDDATE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereCALDMONTH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereCALDYEAR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereCOMPDAYCNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereEMPCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereEXT1TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereEXT1TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereEXT2TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereEXT2TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereEXT3TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereEXT3TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereEXT4TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereEXT4TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereEXT5TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereEXT5TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereFIXCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereHOLWORKCNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereIN1CNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereIN1TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereIN1TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereIN2CNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereIN2TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereIN2TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereLEAVETIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereLEAVETIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereLEVCNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereLEVTIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereLEVTIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereOFCCNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereOFCTIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereOFCTIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereOUT1CNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereOUT1TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereOUT1TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereOUT2CNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereOUT2TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereOUT2TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereOUTTIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereOUTTIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereOVTM10TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereOVTM10TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereOVTM1TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereOVTM1TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereOVTM2TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereOVTM2TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereOVTM3TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereOVTM3TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereOVTM4TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereOVTM4TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereOVTM5TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereOVTM5TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereOVTM6TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereOVTM6TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereOVTM7TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereOVTM7TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereOVTM8TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereOVTM8TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereOVTM9TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereOVTM9TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository wherePADHOLCNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereREASONCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereREMARK($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereRSV1CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereRSV1CNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereRSV1TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereRSV1TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereRSV2CLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereRSV2CNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereRSV2TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereRSV2TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereRSV3CNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereRSV3TIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereRSV3TIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereSPCHOLCNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereSUBHOLCNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereSUBWORKCNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereTARDTIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereTARDTIMEMI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereUPDCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereUPDDATE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereWORKDAYCNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereWORKPTNCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereWORKPTNENDTIME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereWORKPTNSTRTIME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereWORKTIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR01WorkRepository whereWORKTIMEMI($value)
 */
	class TR01WorkRepository extends \Eloquent {}
}

namespace App\Repositories{
/**
 * App\Repositories\TR02EmpCalendarRepository
 *
 * @property string $CALD_YEAR
 * @property string $CALD_MONTH
 * @property string $EMP_CD
 * @property string|null $LAST_PTN_CD
 * @property int|null $LAST_DAY_NO
 * @method static \Illuminate\Database\Eloquent\Builder|TR02EmpCalendarRepository newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TR02EmpCalendarRepository newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TR02EmpCalendarRepository query()
 * @method static \Illuminate\Database\Eloquent\Builder|TR02EmpCalendarRepository whereCALDMONTH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR02EmpCalendarRepository whereCALDYEAR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR02EmpCalendarRepository whereEMPCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR02EmpCalendarRepository whereLASTDAYNO($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR02EmpCalendarRepository whereLASTPTNCD($value)
 */
	class TR02EmpCalendarRepository extends \Eloquent {}
}

namespace App\Repositories{
/**
 * App\Repositories\TR03DeptCalendarRepository
 *
 * @property string $CALD_YEAR
 * @property string $CALD_MONTH
 * @property string $DEPT_CD
 * @property string|null $LAST_PTN_CD
 * @property int|null $LAST_DAY_NO
 * @property string $CLOSING_DATE_CD
 * @method static \Illuminate\Database\Eloquent\Builder|TR03DeptCalendarRepository newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TR03DeptCalendarRepository newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TR03DeptCalendarRepository query()
 * @method static \Illuminate\Database\Eloquent\Builder|TR03DeptCalendarRepository whereCALDMONTH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR03DeptCalendarRepository whereCALDYEAR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR03DeptCalendarRepository whereCLOSINGDATECD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR03DeptCalendarRepository whereDEPTCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR03DeptCalendarRepository whereLASTDAYNO($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR03DeptCalendarRepository whereLASTPTNCD($value)
 */
	class TR03DeptCalendarRepository extends \Eloquent {}
}

namespace App\Repositories{
/**
 * App\Repositories\TR04WorkTimeFixRepository
 *
 * @property string $CALD_YEAR
 * @property string $CALD_MONTH
 * @property string $DEPT_CD
 * @property int $FIX_CNT
 * @property string $UPD_DATE
 * @property string $CLOSING_DATE_CD
 * @method static \Illuminate\Database\Eloquent\Builder|TR04WorkTimeFixRepository newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TR04WorkTimeFixRepository newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TR04WorkTimeFixRepository query()
 * @method static \Illuminate\Database\Eloquent\Builder|TR04WorkTimeFixRepository whereCALDMONTH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR04WorkTimeFixRepository whereCALDYEAR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR04WorkTimeFixRepository whereCLOSINGDATECD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR04WorkTimeFixRepository whereDEPTCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR04WorkTimeFixRepository whereFIXCNT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR04WorkTimeFixRepository whereUPDDATE($value)
 */
	class TR04WorkTimeFixRepository extends \Eloquent {}
}

namespace App\Repositories{
/**
 * App\Repositories\TR50WorkTimeRepository
 *
 * @property int $EMP_CD
 * @property string $CRT_DATE
 * @property int $TERM_NO
 * @property string $WORKTIME_CLS_CD
 * @property string $WORK_DATE
 * @property int $WORK_TIME_HH
 * @property int $WORK_TIME_MI
 * @property string $DATA_OUT_CLS_CD
 * @property string $DATA_OUT_DATE
 * @property string|null $CALD_DATE
 * @method static \Illuminate\Database\Eloquent\Builder|TR50WorkTimeRepository newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TR50WorkTimeRepository newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TR50WorkTimeRepository query()
 * @method static \Illuminate\Database\Eloquent\Builder|TR50WorkTimeRepository whereCALDDATE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR50WorkTimeRepository whereCRTDATE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR50WorkTimeRepository whereDATAOUTCLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR50WorkTimeRepository whereDATAOUTDATE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR50WorkTimeRepository whereEMPCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR50WorkTimeRepository whereTERMNO($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR50WorkTimeRepository whereWORKDATE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR50WorkTimeRepository whereWORKTIMECLSCD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR50WorkTimeRepository whereWORKTIMEHH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TR50WorkTimeRepository whereWORKTIMEMI($value)
 */
	class TR50WorkTimeRepository extends \Eloquent {}
}

