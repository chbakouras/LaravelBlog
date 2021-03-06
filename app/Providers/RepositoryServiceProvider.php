<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind('App\Repositories\System\UserRepository', 'App\Repositories\System\UserRepositoryImpl');
        $this->app->bind('App\Repositories\System\CategoryRepository', 'App\Repositories\System\CategoryRepositoryImpl');
        $this->app->bind('App\Repositories\System\PostRepository', 'App\Repositories\System\PostRepositoryImpl');
        $this->app->bind('App\Repositories\System\OptionRepository', 'App\Repositories\System\OptionRepositoryImpl');
        $this->app->bind('App\Repositories\System\RoleRepository', 'App\Repositories\System\RoleRepositoryImpl');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
