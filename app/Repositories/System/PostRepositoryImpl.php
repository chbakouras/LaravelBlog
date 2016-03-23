<?php
/**
 * @author Chrisostomos Bakouras.
 */

namespace App\Repositories\System;


use App\Repositories\AbstractRepository;
use App\Repositories\Criteria\AndWhereCriteria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

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

    public function eagerLoadAllPaginated($with, $query, $perPage = 20)
    {

        $where = call_user_func_array("{$this->modelClassName}::where",
            array('type', array_key_exists('type', $query) ? $query['type'] : 'post')
        );

        if (array_key_exists('status', $query)) {
            $where->where(
                'status',
                $query['status']
            );
            if ($query['status'] === Config::get('blog.post.status.thrashed'))
                $where->onlyTrashed();
        }

        $where->with($with);

        return $where->paginate($perPage);
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

    public function syncCategoriesToModel(Model $model, $array = array(1))
    {
        $model->categories()->sync($array);
    }

    public function findDistinctStatus()
    {
        $query = call_user_func_array("{$this->modelClassName}::select", array('status'));

        return $query->groupBy('status')->lists('status');
    }

    public function softDelete($id)
    {
        $traits = class_uses($this->modelClassName);

        if (in_array('Illuminate\Database\Eloquent\SoftDeletes', $traits)) {
            $post = $this->find($id);
            $post->status = Config::get('blog.post.status.thrashed');
            $post->save();
            $post->delete();
        }
    }

    public function forceDelete($id)
    {
        $post = $this->findWithTrashed($id);
        $this->syncCategoriesToModel($post, array());

        $post->forceDelete();
    }
}
