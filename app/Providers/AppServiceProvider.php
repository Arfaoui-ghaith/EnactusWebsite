<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Brand;

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
            if(!$view->offsetExists('brandsmenu'))
            {
                $brandsmenu = Brand::all();
                $view->with('brandsmenu', $brandsmenu);
            }
        });
    }
}
