<?php
/**
 * @author Chrisostomos Bakouras.
 */

namespace App\Repositories;

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
}