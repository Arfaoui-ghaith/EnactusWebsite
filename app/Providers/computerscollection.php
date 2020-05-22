<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Computer;

class computerscollection extends ServiceProvider
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
                if(!$view->offsetExists('computers'))
                {
                    $computers = Computer::all();
                    $view->with('computers', $computers);
                }
            });
        }
    }
}
