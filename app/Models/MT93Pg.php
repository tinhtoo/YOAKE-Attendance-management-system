<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $PG_CD
 * @property string $PG_NAME
 * @property string $MCLS_CD
 * @property string $MCLS_NAME
 */
class MT93Pg extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'MT93_PG';

    /**
     * @var array
     */
    protected $fillable = ['PG_CD','PG_NAME','MCLS_CD','MCLS_NAME'];

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
