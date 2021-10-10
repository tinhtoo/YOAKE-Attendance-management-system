<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $CALD_DATE
 * @property string $DEPT_CD
 * @property integer $FIX_CNT
 * @property string $UPD_DATE
 */
class TR05WorkTimeFixDly extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'TR05_WORKTIMEFIXDLY';

    /**
     * @var array
     */
    protected $fillable = ['FIX_CNT', 'UPD_DATE'];

    /**
     * The connection name for the model.
     *
     * @var string
     */
    //protected $connection = 'sqlsrv';

}
