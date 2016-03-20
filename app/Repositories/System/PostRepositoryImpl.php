<?php
/**
 * @author Chrisostomos Bakouras.
 */

namespace App\Repositories\System;


use App\Repositories\AbstractRepository;

class PostRepositoryImpl extends AbstractRepository implements PostRepository
{
    protected $modelClassName = '\App\Models\Post';

}