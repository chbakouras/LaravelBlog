<?php
/**
 * @author Chrisostomos Bakouras.
 */

namespace App\Repositories\System;
use App\Repositories\Repository;

/**
 * Interface PostRepository
 *
 * Contains only method signatures for methods related to the Post object
 *
 * @package App\Repositories
 */
interface PostRepository extends Repository
{
    public function findBySlug($postSlug);
}