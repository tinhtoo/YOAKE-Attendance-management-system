<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $CLS_CD
 * @property string $CLS_DETAIL_CD
 * @property string $CLS_DETAIL_NAME
 */
class MT91ClsDetail extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'MT91_CLS_DETAIL';

    /**
     * @var array
     */
    protected $fillable = ['CLS_DETAIL_NAME'];

    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'sqlsrv';
}
