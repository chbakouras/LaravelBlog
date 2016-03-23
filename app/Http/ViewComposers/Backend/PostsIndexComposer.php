<?php
/**
 * @author Chrisostomos Bakouras.
 */

namespace App\Http\ViewComposers\Backend;


use App\Repositories\System\PostRepository;
use Illuminate\Support\Facades\Input;
use Illuminate\View\View;

class PostsIndexComposer
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
        $postType = Input::has('type') ? Input::get('type') : 'post';
        $activeStatus = Input::has('status') ? Input::get('status') : '';

        $view->with('statuses', $this->postRepository->findDistinctStatus($postType))
            ->with('activeStatus', $activeStatus)
            ->with('postType', $postType);
    }
}