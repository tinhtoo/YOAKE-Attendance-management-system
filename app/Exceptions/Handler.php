<?php

namespace App\Exceptions;

use Illuminate\Session\TokenMismatchException; //追加
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * セッションタイムアウトで419エラーが表示しないようにする
     * ログイン画面へ戻す
     * @return view
     */
    public function render($request, Throwable $exception)
    {

        if ($exception instanceof TokenMismatchException) {
            return redirect('/');//ログイン画面のURLお好みで
        }

        return parent::render($request, $exception);
    }
}
