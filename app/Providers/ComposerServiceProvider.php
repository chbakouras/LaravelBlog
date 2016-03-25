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
        // Backend
        view()->composer('admin.partials.header', 'App\Http\ViewComposers\Backend\AdminHeaderComposer');

        view()->composer('admin.posts.index', 'App\Http\ViewComposers\Backend\PostsIndexComposer');
        view()->composer('admin.posts.create', 'App\Http\ViewComposers\Backend\PostsCreateComposer');
        view()->composer('admin.posts.partials.categories', 'App\Http\ViewComposers\Backend\PostsPartialsCategoriesComposer');
        view()->composer('admin.posts.partials.publish', 'App\Http\ViewComposers\Backend\PostsPartialsPublishComposer');

        view()->composer('admin.categories.partials.category-list', 'App\Http\ViewComposers\Backend\CategoriesPartialsCategoryList');

        view()->composer('admin.users.create', 'App\Http\ViewComposers\Backend\UsersCreateComposer');
        view()->composer('admin.users.index', 'App\Http\ViewComposers\Backend\UsersIndexComposer');

        // Frontend
        view()->composer('theme.posts.show', 'App\Http\ViewComposers\Frontend\PostsShowComposer');
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