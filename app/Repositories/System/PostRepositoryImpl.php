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

    public function eagerLoadAllPaginated($with, $perPage = 20)
    {
        $with = call_user_func_array("{$this->modelClassName}::with", $with);

        return $with->paginate($perPage);
    }

    public function eagerLoadOne($with, $id)
    {
        $where = call_user_func_array("{$this->modelClassName}::where", array('id', $id));
        $with = $where->with($with);

        return $with->first();
    }

    public function syncCategories($id, $array = array(1))
    {
        $post = $this->find($id);
        $post->categories()->sync($array);
    }
}
