<?php
/**
 * @author Chrisostomos Bakouras.
 */

namespace App\Repositories\System;


use App\Repositories\AbstractRepository;

class UserRepositoryImpl extends AbstractRepository implements UserRepository
{
    protected $modelClassName = '\App\Models\User';

    public function findUserByUsername($username)
    {
        $where = call_user_func_array("{$this->modelClassName}::where", array($username));

        return $where->get();
    }

    public function syncPosts($id)
    {
        $user = $this->find($id);
        $user->posts()->sync(array());
    }
}
