<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $WORK_DESC_CD
 * @property string $WORK_DESC_NAME
 * @property string $WORK_DESC_CLS_CD
 * @property string $RSV1_CLS_CD
 * @property string $RSV2_CLS_CD
 * @property string $UPD_DATE
 */
class MT94WorkDesc extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'MT94_WORK_DESC';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'WORK_DESC_CD';

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
    protected $fillable = ['WORK_DESC_NAME', 'WORK_DESC_CLS_CD', 'RSV1_CLS_CD', 'RSV2_CLS_CD', 'UPD_DATE'];

    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'sqlsrv';

}
