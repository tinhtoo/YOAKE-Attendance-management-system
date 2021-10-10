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
     * @var array
     */
    protected $fillable = ['NUM_CARRYOVER', 'PD_MONTH', 'PD_OFFSET', 'PD_USED'];

    /**
     * The connection name for the model.
     *
     * @var string
     */
    // //protected $connection = 'sqlsrv';

}
