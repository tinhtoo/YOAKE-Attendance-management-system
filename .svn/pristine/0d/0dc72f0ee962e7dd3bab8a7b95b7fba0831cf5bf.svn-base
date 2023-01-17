<?php

namespace App\Logging;

use Monolog\Logger;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Formatter\LineFormatter;

class WorkTimeSvcErrorLogger
{
    /**
     * SQLクエリ用Monologインスタンス生成
     * @param  array  $config config/logging.php の設定内容
     * @return \Monolog\Logger
     */
    public function __invoke(array $config)
    {
        // 'debug' とかの文字列をMonologが使えるログレベルに変換
        $level = Logger::toMonologLevel($config['level']);

        // 日ごとにログローテートするハンドラ作成
        $hander = new RotatingFileHandler($config['path'], $config['days'], $level);

        // 改行コードを出力する＆カラのコンテキストを出力しないフォーマッタを設定
        $hander->setFormatter(new LineFormatter(null, null, true, true));

        // Monologインスタンス作成してハンドラ設定して返却
        $logger = new Logger('WorkTimeSVC');  // ロガー名は 'SQL' にした。これはログに出力される
        $logger->pushHandler($hander);
        return $logger;
    }
}
