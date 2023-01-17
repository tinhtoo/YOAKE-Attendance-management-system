<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $CLS_CD
 * @property string $DESC_DETAIL_CD
 * @property string $DESC_DETAIL_NAME
 */
class MT92DescDetail extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'MT92_DESC_DETAIL';

    /**
     * @var array
     */
    protected $fillable = ['DESC_DETAIL_NAME'];

    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'sqlsrv';
}
