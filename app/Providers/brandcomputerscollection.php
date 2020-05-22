<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\BrandComputer;

class brandcomputerscollection extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        {
            view()->composer('*', function ($view)
            {
                if(!$view->offsetExists('brandscompmenu'))
                {
                    $brandscompmenu = BrandComputer::all();
                    $view->with('brandscompmenu', $brandscompmenu);
                }
            });
        }
    }
}
