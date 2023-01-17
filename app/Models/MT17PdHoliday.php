<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $EMP_CD
 * @property string $PD_YEAR
 * @property float $NUM_CARRYOVER
 * @property integer $MONTH_NO
 * @property string $PD_MONTH
 * @property float $PD_OFFSET
 * @property float $PD_USED
 */
class MT17PdHoliday extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'MT17_PDHOLIDAY';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = ['EMP_CD', 'PD_YEAR', 'MONTH_NO'];

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * @var array
     */
    protected $fillable = ['NUM_CARRYOVER', 'PD_MONTH', 'PD_OFFSET', 'PD_USED'];

    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'sqlsrv';

    // created_atとupdated_atを無効化
    public $timestamps = false;
    public $incrementing = false;
}
