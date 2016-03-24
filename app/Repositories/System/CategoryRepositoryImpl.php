<?php
/**
 * @author Chrisostomos Bakouras.
 */

namespace App\Repositories\System;


use App\Repositories\AbstractRepository;

class CategoryRepositoryImpl extends AbstractRepository implements CategoryRepository
{
    protected $modelClassName = '\App\Models\Category';

    /**
     * Find category by slug.
     *
     * @param $categorySlug
     * @return mixed
     */
    public function findBySlug($categorySlug)
    {
        $where = call_user_func_array("{$this->modelClassName}::where", array('slug', $categorySlug));

        return $where->first();
    }

    public function getPostsBySlug($categorySlug)
    {
        $category = $this->findBySlug($categorySlug);

        return $category->posts;
    }

    public function syncPosts($id)
    {
        $category = $this->find($id);
        $category->posts()->sync(array());
    }
}
