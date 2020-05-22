<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Tablette;

class tablettescollection extends ServiceProvider
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
                if(!$view->offsetExists('tablettes'))
                {
                    $tablettes = Tablette::all();
                    $view->with('tablettes', $tablettes);
                }
            });
        }
    }
}
