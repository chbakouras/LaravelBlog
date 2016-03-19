<?php
/**
 * @author Chrisostomos Bakouras.
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 * @package App\Models
 */
class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = array('title', 'content', 'author_id', 'slug', 'excerpt');

    public $timestamps = true;

    public function Author()
    {
        return $this->belongsTo('User', 'author_id');
    }
}