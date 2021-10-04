<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $HLD_NO
 * @property string $HLD_DATE
 * @property string $HLD_MONTH
 * @property string $HLD_DAY
 * @property string $HLD_NAME
 * @property string $HLD_CLS_CD
 */
class MT08Holiday extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'MT08_HOLIDAY';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'HLD_NO';

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
    protected $fillable = ['HLD_DATE', 'HLD_MONTH', 'HLD_DAY', 'HLD_NAME', 'HLD_CLS_CD'];

    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'sqlsrv';

}
