<?php
/**
 * @author Chrisostomos Bakouras.
 */

namespace App\Repositories\System;
use App\Repositories\Repository;

/**
 * Interface CategoryRepository
 *
 * Contains only method signatures for methods related to the Category object
 *
 * @package App\Repositories
 */
interface CategoryRepository extends Repository
{
    public function findBySlug($categorySlug);

    public function getPostsBySlug($categorySlug);

    public function syncPosts($id);
}
