<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $CALD_YEAR
 * @property string $CALD_MONTH
 * @property string $DEPT_CD
 * @property integer $FIX_CNT
 * @property string $UPD_DATE
 * @property string $CLOSING_DATE_CD
 */
class TR04WorkTimeFix extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'TR04_WORKTIMEFIX';

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
