<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\MT99Msg;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Arr;
use Illuminate\Pagination\Paginator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        View::share('error_messages', $this->getMessage());
    }

    private function getMessage()
    {
        $messages = MT99Msg::all()->toArray();
        $messages = Arr::pluck($messages, 'MSG_CONT', 'MSG_NO');
        return $messages;
    }

}