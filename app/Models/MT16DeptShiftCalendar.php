<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $CALD_YEAR
 * @property string $CALD_MONTH
 * @property string $DEPT_CD
 * @property string $CALD_DATE
 * @property string $WORKPTN_CD
 * @property string $RSV1_CLS_CD
 * @property string $RSV2_CLS_CD
 * @property string $UPD_DATE
 * @property string $CLOSING_DATE_CD
 */
class MT16DeptShiftCalendar extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'MT16_DEPTSHIFTCALENDAR';

    /**
     * @var array
     */
    protected $fillable = ['WORKPTN_CD', 'RSV1_CLS_CD', 'RSV2_CLS_CD', 'UPD_DATE'];

    /**
     * The connection name for the model.
     *
     * @var string
     */
    // //protected $connection = 'sqlsrv';

}
