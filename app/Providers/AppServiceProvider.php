<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        view()->composer('*', function ($view) 
        {
            $session_username = session('session_username');
            $notification_count = DB::table('usernotifications')->select('notificationsrno')
            ->where('notificationpostusername',$session_username)->where('notificationread',0)->count();
            //...with this variable
            View::share('notification_count', $notification_count);   
        }); 
    }
}
