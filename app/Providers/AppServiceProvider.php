<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        View::share('contador', 0);

        //global variable to show actual cuatrimestre in the nevabar
        //need to be updated to show the actual cuatrimestre
        View::share('cuatrimestre_actual', \App\Models\Cuatrimestre::current()->first());

    }
}
