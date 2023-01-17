<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $TERM_NO
 * @property object $STR_DATE
 * @property object $END_DATE
 * @property string $GET_FLG
 * @property string $ERR_CONT
 */
class LG01Worktimeconv extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'LG01_WORKTIMECONV';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = ['TERM_NO','STR_DATE'];

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
    protected $fillable = ['END_DATE', 'GET_FLG', 'ERR_CONT'];

    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'sqlsrv';

    // created_atとupdated_atを無効化
    public $timestamps = false;
}
