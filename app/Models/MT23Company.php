<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $COMPANY_CD
 * @property string $COMPANY_NAME
 * @property string $COMPANY_KANA
 * @property string $COMPANY_ABR
 * @property string $POST_CD
 * @property string $ADDRESS1
 * @property string $ADDRESS2
 * @property string $ADDRESS3
 * @property string $TEL
 * @property string $FAX
 * @property string $REMARK
 * @property string $DISP_CLS_CD
 * @property string $RSV1_CLS_CD
 * @property string $RSV2_CLS_CD
 * @property string $RSV1_TXT
 * @property string $RSV2_TXT
 * @property string $UPD_DATE
 */
class MT23Company extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'MT23_COMPANY';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'COMPANY_CD';

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
    protected $fillable = ['COMPANY_NAME', 'COMPANY_KANA', 'COMPANY_ABR', 'POST_CD', 'ADDRESS1', 'ADDRESS2', 'ADDRESS3', 'TEL', 'FAX', 'REMARK', 'DISP_CLS_CD', 'RSV1_CLS_CD', 'RSV2_CLS_CD', 'RSV1_TXT', 'RSV2_TXT', 'UPD_DATE'];

    /**
     * The connection name for the model.
     *
     * @var string
     */
    // //protected $connection = 'sqlsrv';

}
