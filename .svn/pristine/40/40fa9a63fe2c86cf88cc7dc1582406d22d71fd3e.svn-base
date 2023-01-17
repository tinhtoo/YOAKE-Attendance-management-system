<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $TERM_NO
 * @property string $COMPUTER_NAME
 * @property string $INSTANCE_NAME
 * @property string $DATABASE_NAME
 * @property string $USER_NAME
 * @property string $USER_PASSWORD
 * @property string $TERM_NAME
 */
class MT95Term extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'MT95_TERM';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'TERM_NO';

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
    protected $fillable = ['COMPUTER_NAME', 'INSTANCE_NAME', 'DATABASE_NAME', 'USER_NAME', 'USER_PASSWORD', 'TERM_NAME'];

    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'sqlsrv';
}
