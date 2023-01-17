<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $PG_AUTH_CD
 * @property string $PG_AUTH_NAME
 * @property string $PG_CD
 * @property string $RSV1_CLS_CD
 * @property string $RSV2_CLS_CD
 * @property string $UPD_DATE
 */
class MT14PgAuth extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'MT14_PG_AUTH';

    /**
     * @var array
     */
    protected $fillable = ['PG_AUTH_NAME', 'RSV1_CLS_CD', 'RSV2_CLS_CD', 'UPD_DATE'];

      /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = ['PG_AUTH_CD','PG_CD'];
    public $incrementing = false;

    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'sqlsrv';

    /**
     * Query scope.
     */
    public function scopeFilter($query, $filter)
    {
        $filter->apply($query);
    }
}
