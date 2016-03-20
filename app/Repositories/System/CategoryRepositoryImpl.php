<?php
/**
 * @author Chrisostomos Bakouras.
 */

namespace App\Repositories\System;


use App\Repositories\AbstractRepository;

class CategoriesRepositoryImpl extends AbstractRepository implements CategoriesRepository
{
    protected $modelClassName = '\App\Models\Category';
}