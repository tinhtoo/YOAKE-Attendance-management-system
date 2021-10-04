<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
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
 */
class MT07Fraction extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'MT07_FRACTION';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'WORKPTN_CD';

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
    protected $fillable = ['FRACTION_CLS_CD', 'WTHR_UNDER_MI', 'WTHR_FRC_CLS_CD', 'LTHR_UNDER_MI', 'LTHR_FRC_CLS_CD', 'ERHR_UNDER_MI', 'ERHR_FRC_CLS_CD', 'OTHR_UNDER_MI', 'OTHR_FRC_CLS_CD', 'WTTM_UNDER_MI', 'WTTM_FRC_CLS_CD', 'LVTM_UNDER_MI', 'LVTM_FRC_CLS_CD', 'OTTM_UNDER_MI', 'OTTM_FRC_CLS_CD', 'RETM_UNDER_MI', 'RETM_FRC_CLS_CD', 'OVTM1_CD', 'OVTM1_UNDER_MI', 'OVTM1_FRC_CLS_CD', 'OVTM2_CD', 'OVTM2_UNDER_MI', 'OVTM2_FRC_CLS_CD', 'OVTM3_CD', 'OVTM3_UNDER_MI', 'OVTM3_FRC_CLS_CD', 'OVTM4_CD', 'OVTM4_UNDER_MI', 'OVTM4_FRC_CLS_CD', 'OVTM5_CD', 'OVTM5_UNDER_MI', 'OVTM5_FRC_CLS_CD', 'OVTM6_CD', 'OVTM6_UNDER_MI', 'OVTM6_FRC_CLS_CD', 'OVTM7_CD', 'OVTM7_UNDER_MI', 'OVTM7_FRC_CLS_CD', 'OVTM8_CD', 'OVTM8_UNDER_MI', 'OVTM8_FRC_CLS_CD', 'OVTM9_CD', 'OVTM9_UNDER_MI', 'OVTM9_FRC_CLS_CD', 'OVTM10_CD', 'OVTM10_UNDER_MI', 'OVTM10_FRC_CLS_CD', 'EXT1_CD', 'EXT1_UNDER_MI', 'EXT1_FRC_CLS_CD', 'EXT2_CD', 'EXT2_UNDER_MI', 'EXT2_FRC_CLS_CD', 'EXT3_CD', 'EXT3_UNDER_MI', 'EXT3_FRC_CLS_CD', 'EXT4_CD', 'EXT4_UNDER_MI', 'EXT4_FRC_CLS_CD', 'EXT5_CD', 'EXT5_UNDER_MI', 'EXT5_FRC_CLS_CD', 'RSV1_CLS_CD', 'RSV2_CLS_CD', 'UPD_DATE'];

    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'sqlsrv';

}
