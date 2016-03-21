<?php
/**
 * @author Chrisostomos Bakouras.
 */

namespace App\Helpers;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SlugHelper
{
    /**
     * Generate a unique slug.
     * If it already exists, a number suffix will be appended.
     * It probably works only with MySQL.
     *
     * @link http://chrishayes.ca/blog/code/laravel-4-generating-unique-slugs-elegantly
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param string $value
     * @return string
     */
    function getUniqueSlug(Model $model, $value)
    {
        $slug = Str::slug($value);
        $slugCount = count($model->whereRaw("slug REGEXP '^{$slug}(-[0-9]+)?$' and id != '{$model->id}'")->get());

        return ($slugCount > 0) ? "{$slug}-{$slugCount}" : $slug;
    }
}