<?php
/**
 * @author Chrisostomos Bakouras.
 */

namespace App\Http\ViewComposers\Backend;


use App\Repositories\System\UserRepository;
use Illuminate\View\View;

class UsersIndexComposer
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $posts = array();
        foreach($view->users as $user) {
            $posts[$user->id] = $this->userRepository->countUserPosts($user->id);
        }

        $view->with('posts', $posts);
    }
}