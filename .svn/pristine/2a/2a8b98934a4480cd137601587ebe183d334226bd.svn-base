<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $DEPT_CD
 * @property string $DEPT_NAME
 * @property string $UP_DEPT_CD
 * @property integer $LEVEL_NO
 * @property string $DISP_CLS_CD
 * @property string $RSV1_CLS_CD
 * @property string $RSV2_CLS_CD
 * @property string $UPD_DATE
 */
class MT12Dept extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'MT12_DEPT';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'DEPT_CD';

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
    protected $fillable = ['DEPT_NAME', 'UP_DEPT_CD', 'LEVEL_NO', 'DISP_CLS_CD', 'RSV1_CLS_CD', 'RSV2_CLS_CD', 'UPD_DATE'];

    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'sqlsrv';

}
