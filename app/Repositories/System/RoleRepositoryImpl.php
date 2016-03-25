<?php
/**
 * @author Chrisostomos Bakouras.
 */

namespace App\Repositories\System;


use App\Repositories\AbstractRepository;

class RoleRepositoryImpl extends AbstractRepository implements RoleRepository
{
    protected $modelClassName = '\App\Models\Role';
}