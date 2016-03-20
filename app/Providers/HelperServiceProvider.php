<?php
/**
 * @author Chrisostomos Bakouras.
 */

namespace App\Providers;


use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        App::bind('viewHelper', function()
        {
            return new \App\Helpers\ViewHelper;
        });
    }
}