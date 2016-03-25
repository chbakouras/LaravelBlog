<?php
/**
 * @author Chrisostomos Bakouras.
 */

namespace App\Repositories\System;
use App\Repositories\Repository;

/**
 * Interface UserRepository
 *
 * Contains only method signatures for methods related to the User object
 *
 * @package App\Repositories
 */
interface UserRepository extends Repository
{
    public function findUserByUsername($username);

    public function syncPosts($id);

    public function syncRole($id, $roleId);
}
