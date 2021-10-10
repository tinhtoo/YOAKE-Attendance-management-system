<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $MSG_NO
 * @property string $MSG_CONT
 */
class MT99Msg extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'MT99_MSG';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'MSG_NO';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['MSG_CONT'];

    /**
     * The connection name for the model.
     *
     * @var string
     */
    //protected $connection = 'sqlsrv';

}
