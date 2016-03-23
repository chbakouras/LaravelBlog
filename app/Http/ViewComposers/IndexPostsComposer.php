<?php
/**
 * @author Chrisostomos Bakouras.
 */

namespace App\Http\ViewComposers;


use App\Repositories\System\PostRepository;
use Illuminate\Support\Facades\Input;
use Illuminate\View\View;

class IndexPostsComposer
{
    /**
     * The user repository implementation.
     *
     * @var PostRepository
     */
    protected $postRepository;

    /**
     * Create a new profile composer.
     *
     * @param PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with(
            'statuses',
            $this->postRepository
                ->findDistinctStatus()
        )->with(
            'activeStatus',
            Input::has('status') ? Input::get('status') : ''
        );
    }
}