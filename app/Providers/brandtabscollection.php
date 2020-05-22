<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\BrandTab;

class brandtabscollection extends ServiceProvider
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
                if(!$view->offsetExists('brandstabmenu'))
                {
                    $brandstabmenu = BrandTab::all();
                    $view->with('brandstabmenu', $brandstabmenu);
                }
            });
        }
    }
}
