<?php
/**
 * @author Chrisostomos Bakouras.
 */

namespace App\Http\ViewComposers\Backend;


use Illuminate\Support\Facades\Input;
use Illuminate\View\View;

class PostsCreateComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with(
                'postType',
                Input::has('type') ? Input::get('type') : 'post'
            );
    }
}