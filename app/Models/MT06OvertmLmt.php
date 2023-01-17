<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
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
 */
class MT06OvertmLmt extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'MT06_OVERTM_LMT';

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
    protected $fillable = ['OVTM1_CD', 'OVTM1_HR', 'OVTM2_CD', 'OVTM2_HR', 'OVTM3_CD', 'OVTM3_HR', 'OVTM4_CD', 'OVTM4_HR', 'OVTM5_CD', 'OVTM5_HR', 'OVTM6_CD', 'OVTM6_HR', 'OVTM7_CD', 'OVTM7_HR', 'OVTM8_CD', 'OVTM8_HR', 'OVTM9_CD', 'OVTM9_HR', 'OVTM10_CD', 'OVTM10_HR', 'NO_OVERTM_MI', 'RSV1_CLS_CD', 'RSV2_CLS_CD', 'UPD_DATE', 'TTL_OVTM1_HR', 'TTL_OVTM2_HR', 'TTL_OVTM3_HR'];

    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'sqlsrv';
}
