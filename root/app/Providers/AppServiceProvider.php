<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // setlocale(LC_TIME, 'id_ID.UTF-8'); // Set locale for date formatting
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            setlocale(LC_TIME, 'Indonesian'); // Windows-compatible
        } else {
            setlocale(LC_TIME, 'id_ID.UTF-8'); // Linux-compatible
        }
        Carbon::setLocale('id'); // Set Carbon's locale for translations
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
