<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Smartphone;

class smartphonescollection extends ServiceProvider
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
                if(!$view->offsetExists('smartphones'))
                {
                    $smartphones = Smartphone::all();
                    $view->with('smartphones', $smartphones);
                }
            });
        }
    }
}
