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

    protected $optionRepository;

    /**
     * Create a new repository instance.
     *
     * @param OptionRepository $optionRepository
     */
    public function __construct(OptionRepository $optionRepository)
    {
        $this->optionRepository = $optionRepository;
    }

    /**
     * Find post by slug.
     *
     * @param $postSlug
     * @return mixed
     */
    public function findBySlug($postSlug)
    {
        $builder = call_user_func_array("{$this->modelClassName}::where", array('slug', $postSlug));

        return $builder->first();
    }

    public function findAllWithTypePaginated($type = 'post', $perPage = 20)
    {
        $builder = call_user_func_array("{$this->modelClassName}::where", array('type', $type));

        return $builder->paginate($perPage);
    }

    public function eagerLoadAllPaginated($with, $query, $perPage = 20)
    {
        $builder = call_user_func_array("{$this->modelClassName}::where",
            array('type', array_key_exists('type', $query) ? $query['type'] : 'post')
        );

        if (array_key_exists('status', $query)) {
            $builder->where(
                'status',
                $query['status']
            );
            if ($query['status'] === Config::get('blog.post.status.trashed')) {
                $builder->onlyTrashed();
            }
        }

        $builder->with($with);

        return $builder->paginate($perPage);
    }

    public function eagerLoadOne($with, $id)
    {
        $builder = call_user_func_array("{$this->modelClassName}::where", array('id', $id));
        $builder->with($with);

        return $builder->first();
    }

    public function syncCategories($id, $array = array())
    {
        if (empty($array)) {
            $array = array($this->optionRepository->findOptionIntegerValueByName('default-category-id'));
        }

        $post = $this->find($id);
        $post->categories()->sync($array);
    }

    public function syncCategoriesToModel(Model $post, $array = array())
    {
        $post->categories()->sync($array);
    }

    public function findDistinctStatus($type)
    {
        $builder = call_user_func_array("{$this->modelClassName}::select", array('status'));
        $builder->where('type', $type);
        $builder->withTrashed();

        return $builder->groupBy('status')->lists('status');
    }

    public function softDelete($id)
    {
        $traits = class_uses($this->modelClassName);

        if (in_array('Illuminate\Database\Eloquent\SoftDeletes', $traits)) {
            $post = $this->find($id);
            $post->status = Config::get('blog.post.status.trashed');
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

    public function forceDeleteAuthorPosts($author)
    {
        $posts = $author->posts;
        foreach ($posts as $post) {
            $this->forceDelete($post->id);
        }
    }
}
