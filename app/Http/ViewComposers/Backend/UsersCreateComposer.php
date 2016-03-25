<?php
/**
 * @author Chrisostomos Bakouras.
 */

namespace App\Http\ViewComposers\Backend;


use App\Repositories\System\RoleRepository;
use Illuminate\Support\Facades\Config;
use Illuminate\View\View;

class UsersCreateComposer
{
    protected $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $roles = array();
        foreach($this->roleRepository->all() as $role) {
            $roles[$role->id] = $role->name;
        }
        $view->with('roles', $roles);

        $status = Config::get('blog.auth.status');
        $view->with('status', $status);
    }
}