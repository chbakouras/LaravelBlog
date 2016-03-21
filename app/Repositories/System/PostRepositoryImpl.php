<?php
/**
 * @author Chrisostomos Bakouras.
 */

namespace App\Repositories\System;


use App\Repositories\AbstractRepository;

class PostRepositoryImpl extends AbstractRepository implements PostRepository
{
    protected $modelClassName = '\App\Models\Post';

    /**
     * Find post by slug.
     *
     * @param $postSlug
     * @return mixed
     */
    public function findBySlug($postSlug)
    {
        $where = call_user_func_array("{$this->modelClassName}::where", array('slug', $postSlug));

        return $where->first();
    }

    public function findAllWithTypePaginated($type = 'post', $perPage = 20)
    {
        $where = call_user_func_array("{$this->modelClassName}::where", array('type', $type));

        return $where->paginate($perPage);
    }

    public function eagerLoadAllPaginated($array, $perPage = 20)
    {
        $where = call_user_func_array("{$this->modelClassName}::with", $array);

        return $where->paginate($perPage);
    }
}
