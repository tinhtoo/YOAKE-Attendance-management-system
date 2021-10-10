<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
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
 */
class MT02CalendarPtn extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'MT02_CALENDAR_PTN';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'CALENDAR_CD';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['CALENDAR_NAME', 'CALENDAR_CLS_CD', 'MON_WORKPTN_CD', 'TUE_WORKPTN_CD', 'WED_WORKPTN_CD', 'THU_WORKPTN_CD', 'FRI_WORKPTN_CD', 'SAT_WORKPTN_CD', 'SUN_WORKPTN_CD', 'HLD_WORKPTN_CD', 'RSV1_CLS_CD', 'RSV2_CLS_CD', 'UPD_DATE'];

    /**
     * The connection name for the model.
     *
     * @var string
     */
    // //protected $connection = 'sqlsrv';

}
