<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = array('name', 'slug', 'description');

    public function posts()
    {
        return $this->belongsToMany('App\Models\Post');
    }
}
