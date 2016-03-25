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

    public function eagerLoadAllPaginated($with, $perPage = 20)
    {
        $builder = call_user_func_array("{$this->modelClassName}::with", array($with));

        return $builder->paginate($perPage);
    }

    public function syncRole($id, $roleId)
    {
        $user = $this->find($id);
        $user->role()->sync(array($roleId));
    }

    public function countUserPosts($id)
    {
        return $this->find($id)
            ->posts
            ->count();
    }
}
