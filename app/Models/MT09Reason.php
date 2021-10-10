<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
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
 */
class MT09Reason extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'MT09_REASON';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'REASON_CD';

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
    protected $fillable = ['REASON_NAME', 'WORKDAY_CLS_CD', 'HOLWORK_CLS_CD', 'SPCHOL_CLS_CD', 'PADHOL_CLS_CD', 'ABCWORK_CLS_CD', 'COMPDAY_CLS_CD', 'WORKDAY_NO', 'REASON_PTN_CD', 'RSV1_CLS_CD', 'RSV2_CLS_CD', 'RSV1_NUM', 'RSV2_NUM', 'SUBHOL_CLS_CD', 'SUBWORK_CLS_CD', 'REASON_MARK'];

    /**
     * The connection name for the model.
     *
     * @var string
     */
    // //protected $connection = 'sqlsrv';

}
