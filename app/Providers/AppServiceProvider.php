<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

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
        Schema::defaultStringLength(191);

        Blade::if('settings', function ($env) {
            if ($env == 'darkMode') {
                if (settings()->get($env, $default = false) == 'on') {
                    return true;
                } else {
                    return false;
                }
            } else {
                return settings()->get($env, $default = false);
            }
        });
    }
}
