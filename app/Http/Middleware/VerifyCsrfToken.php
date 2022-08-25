<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
    ];

    /**
     * セッションタイムアウトした時ログアウト機能は「419エラー」表示せっずログアウト
     *
     * @param [type] $request
     * @param Closure $next
     * @return void
     */
    public function handle($request, Closure $next)
    {
        if (!session()->has('id') && $request->route()->named('logout.form')) {
            $this->except[] = route('logout.form');
        }

        return parent::handle($request, $next);
    }
}
