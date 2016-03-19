<?php
/**
 * @author Chrisostomos Bakouras.
 */

namespace App\Repositories;


class UserRepositoryImpl extends AbstractRepository implements UserRepository
{
    protected $modelClassName = 'User';

    public function findUserByUsername($username)
    {
        $where = call_user_func_array("{$this->modelClassName}::where", array($username));

        return $where->get();
    }
}
