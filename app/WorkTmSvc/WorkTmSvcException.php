<?php
namespace App\WorkTmSvc;

use Exception;
use Throwable;

/**
 * 勤怠管理システム(タイムレコーダ連動処理) 例外クラス
 */
class WorkTmSvcException extends Exception
{
    public function __construct($message = '', $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}
