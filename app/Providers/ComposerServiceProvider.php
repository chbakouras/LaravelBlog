<?php
/**
 * @author Chrisostomos Bakouras.
 */

namespace App\Providers;


use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('admin.partials.header', 'App\Http\ViewComposers\AdminHeaderComposer');
        view()->composer('admin.posts.partials.categories', 'App\Http\ViewComposers\PostCategoriesComposer');
        view()->composer('theme.posts.show', 'App\Http\ViewComposers\ShowPostComposer');
        view()->composer('admin.posts.partials.posts-status-tabs', 'App\Http\ViewComposers\IndexPostsComposer');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}