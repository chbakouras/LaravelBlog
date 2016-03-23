<?php
/**
 * @author Chrisostomos Bakouras.
 */

namespace App\Http\ViewComposers\Backend;


use Illuminate\View\View;

class PostsPartialsPublishComposer
{
    public function compose(View $view)
    {
        return $view;
    }
}