<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $CLOSING_DATE_CD
 * @property integer $CLOSING_DATE
 * @property string $MONTH_CLS_CD
 * @property string $CLOSING_DATE_NAME
 * @property string $RSV1_CLS_CD
 * @property string $RSV2_CLS_CD
 */
class MT22ClosingDate extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'MT22_CLOSING_DATE';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'CLOSING_DATE_CD';

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
    protected $fillable = ['CLOSING_DATE', 'MONTH_CLS_CD', 'CLOSING_DATE_NAME', 'RSV1_CLS_CD', 'RSV2_CLS_CD'];

    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'sqlsrv';

}
