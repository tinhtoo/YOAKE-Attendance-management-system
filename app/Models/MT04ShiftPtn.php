<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $SHIFTPTN_CD
 * @property string $SHIFTPTN_NAME
 * @property integer $DAY_NO
 * @property string $WORKPTN_CD
 * @property string $RSV1_CLS_CD
 * @property string $RSV2_CLS_CD
 * @property string $UPD_DATE
 */
class MT04ShiftPtn extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'MT04_SHIFTPTN';

    /**
     * @var array
     */
    protected $fillable = ['SHIFTPTN_NAME', 'WORKPTN_CD', 'RSV1_CLS_CD', 'RSV2_CLS_CD', 'UPD_DATE'];

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = ['SHIFTPTN_CD','DAY_NO'];
    public $incrementing = false;

    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'sqlsrv';
}
