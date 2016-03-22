<?php
/**
 * @author Chrisostomos Bakouras.
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

/**
 * Class Post
 * @property mixed type
 * @package App\Models
 */
class Post extends Model
{
    use SoftDeletes;
    /**
     * Boot function for using with Invoice Events
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        // TODO:: generate slug with another methodology (e.g. Create a service? || Create event and handler?)
        static::creating(function ($model)
        {
            $model->slug = $model->getUniqueSlug($model);
        });
    }

    protected $table = 'posts';

    protected $fillable = array('title', 'content', 'author_id', 'slug', 'excerpt', 'type');

    public $timestamps = true;

    protected $dates = ['deleted_at'];

    public function author()
    {
        return $this->belongsTo('App\Models\User', 'author_id');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }

    /**
     * Generate a unique slug.
     * If it already exists, a number suffix will be appended.
     * It probably works only with MySQL.
     *
     * @link http://chrishayes.ca/blog/code/laravel-4-generating-unique-slugs-elegantly
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return string
     */
    private function getUniqueSlug(Model $model)
    {
        $slug = Str::slug($model->title);
        $slugCount = count($model->whereRaw("slug REGEXP '^{$slug}(-[0-9]+)?$' and id != '{$model->id}'")->get());

        return ($slugCount > 0) ? "{$slug}-{$slugCount}" : $slug;
    }
}