<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $GRT_NO
 * @property integer $WORK_YEAR
 * @property integer $WORK_MONTH
 * @property float $PD_GRANT_NUM
 */
class MT21_PDHOLIDAY_GRT extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'MT21_PDHOLIDAY_GRT';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'GRT_NO';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['WORK_YEAR', 'WORK_MONTH', 'PD_GRANT_NUM'];

    /**
     * The connection name for the model.
     *
     * @var string
     */
    // //protected $connection = 'sqlsrv';

}
