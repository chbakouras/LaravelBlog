<?php
/**
 * @author Chrisostomos Bakouras.
 */

namespace App\Providers;


use App\Helpers\BlogHelper;
use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('blogHelper', function()
        {
            return new BlogHelper($this->app->make('App\Repositories\System\OptionRepository'));
        });
    }
}