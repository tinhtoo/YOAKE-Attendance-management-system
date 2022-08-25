<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $CONTROL_CD
 * @property string $COMPANY_NAME
 * @property string $COMPANY_KANA
 * @property string $COMPANY_ABR_NAME
 * @property string $POST_CD
 * @property string $ADDRESS1
 * @property string $ADDRESS2
 * @property string $ADDRESS3
 * @property string $TEL
 * @property string $FAX
 * @property string $MAIL
 * @property string $URL
 * @property integer $CLOSING_DATE
 * @property string $MONTH_CLS_CD
 * @property string $TERM_STR_MONTH
 * @property string $RSV1_CLS_CD
 * @property string $RSV2_CLS_CD
 * @property string $REMARK1
 * @property string $REMARK2
 * @property string $UPD_DATE
 * @property string $EMPFILE_PATH
 * @property string $RSV1_PATH
 * @property string $RSV2_PATH
 * @property integer $ADD_ZERO_NUM
 * @property string $COMNT1
 * @property string $COMNT2
 * @property string $COMNT3
 */
class MT01Control extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'MT01_CONTROL';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'CONTROL_CD';

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
    protected $fillable = ['COMPANY_NAME', 'COMPANY_KANA', 'COMPANY_ABR_NAME', 'POST_CD', 'ADDRESS1', 'ADDRESS2', 'ADDRESS3', 'TEL', 'FAX', 'MAIL', 'URL', 'CLOSING_DATE', 'MONTH_CLS_CD', 'TERM_STR_MONTH', 'RSV1_CLS_CD', 'RSV2_CLS_CD', 'REMARK1', 'REMARK2', 'UPD_DATE', 'EMPFILE_PATH', 'RSV1_PATH', 'RSV2_PATH', 'ADD_ZERO_NUM', 'COMNT1', 'COMNT2', 'COMNT3'];

    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'sqlsrv';
}
