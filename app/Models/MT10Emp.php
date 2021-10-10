<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $EMP_CD
 * @property string $EMP_NAME
 * @property string $EMP_KANA
 * @property string $EMP_ABR
 * @property string $DEPT_CD
 * @property string $ENT_DATE
 * @property string $ENT_YEAR
 * @property string $ENT_MONTH
 * @property string $ENT_DAY
 * @property string $RET_DATE
 * @property string $RET_YEAR
 * @property string $RET_MONTH
 * @property string $RET_DAY
 * @property string $REG_CLS_CD
 * @property string $BIRTH_DATE
 * @property string $BIRTH_YEAR
 * @property string $BIRTH_MONTH
 * @property string $BIRTH_DAY
 * @property string $SEX_CLS_CD
 * @property string $EMP_CLS1_CD
 * @property string $EMP_CLS2_CD
 * @property string $EMP_CLS3_CD
 * @property string $CALENDAR_CD
 * @property string $DEPT_AUTH_CD
 * @property string $PG_AUTH_CD
 * @property string $POST_CD
 * @property string $ADDRESS1
 * @property string $ADDRESS2
 * @property string $TEL
 * @property string $CELLULAR
 * @property string $MAIL
 * @property string $RSV1_CLS_CD
 * @property string $RSV2_CLS_CD
 * @property string $UPD_DATE
 * @property string $PH_GRANT
 * @property string $PH_GRANT_YEAR
 * @property string $PH_GRANT_MONTH
 * @property string $CLOSING_DATE_CD
 * @property string $COMPANY_CD
 * @property string $EMP2_CD
 * @property string $EMP3_CD
 */
class MT10Emp extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'MT10_EMP';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'EMP_CD';

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
    protected $fillable = ['EMP_NAME', 'EMP_KANA', 'EMP_ABR', 'DEPT_CD', 'ENT_DATE', 'ENT_YEAR', 'ENT_MONTH', 'ENT_DAY', 'RET_DATE', 'RET_YEAR', 'RET_MONTH', 'RET_DAY', 'REG_CLS_CD', 'BIRTH_DATE', 'BIRTH_YEAR', 'BIRTH_MONTH', 'BIRTH_DAY', 'SEX_CLS_CD', 'EMP_CLS1_CD', 'EMP_CLS2_CD', 'EMP_CLS3_CD', 'CALENDAR_CD', 'DEPT_AUTH_CD', 'PG_AUTH_CD', 'POST_CD', 'ADDRESS1', 'ADDRESS2', 'TEL', 'CELLULAR', 'MAIL', 'RSV1_CLS_CD', 'RSV2_CLS_CD', 'UPD_DATE', 'PH_GRANT', 'PH_GRANT_YEAR', 'PH_GRANT_MONTH', 'CLOSING_DATE_CD', 'COMPANY_CD', 'EMP2_CD', 'EMP3_CD'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    // //protected $connection = 'sqlsrv';

}
