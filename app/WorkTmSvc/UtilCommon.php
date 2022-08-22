<?php
namespace App\WorkTmSvc;

use Carbon\Carbon;
use Illuminate\Support\Facades\Facade;
use PDO;

/**
 * 共通クラス
 */
class UtilCommon extends Facade
{
    /**
     * 引数を元に接続文字列を生成します。
     *
     * @param $dataSource
     * @param $initialCatalog
     * @param $userId
     * @param $password
     * @param boolean $integratedSecurity 現在のWindowsアカウントの資格情報を認証に使用する場合はTrue。省略可能で省略時はFalseが設定されます。
     * @return object ADOベースの接続文字列
     */
    public static function combineDBConnectString(
        $dataSource,
        $initialCatalog,
        $userId,
        $password,
        $integratedSecurity = false
    ) {
        config([
            'database.connections.term_connection' => [
                'driver' => 'sqlsrv',
                // 'url' => $dataSource,
                'host' => $dataSource,
                'port' => config('database.connections.sqlsrv.port'),
                'database' => $initialCatalog,
                'username' => $userId,
                'password' => $password,
                'charset' => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix' => '',
                'prefix_indexes' => true,
            ]
        ]);
        return \DB::connection('term_connection');
    }

    /**
     * プログラム実行フォルダにエラーログを書き出します。
     *
     * @param $exception 例外
     * @return void
     */
    public static function writeErrorLog($exception)
    {
        \Log::channel('workTimeSvcError')->info($exception);
    }

    /**
     * 引数を連結し日付を返します。
     *
     * @param $data 日付 Carbonかstring
     * @param $hh 時間
     * @param $mm 分
     * @return object
     */
    public static function combineDateTime($data, $hh, $mm)
    {
        if (is_string($data)) {
            $data = new Carbon($data);
        }
        return $data->addHours($hh)->addMinutes($mm);
    }
}
