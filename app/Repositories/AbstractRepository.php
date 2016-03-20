<?php
/**
 * @author Chrisostomos Bakouras.
 */

namespace App\Repositories;

/**
 * Class AbstractRepository
 *
 * Provides default implementations of the methods defined in the base repository.
 * These simply delegate static function calls to the right eloquent model based
 * on the $modelClassName.
 *
 * @package App\Repositories
 */
abstract class AbstractRepository implements Repository
{
    protected $modelClassName;

    public function create(array $attributes)
    {
        return call_user_func_array("{$this->modelClassName}::create", array($attributes));
    }

    public function all($columns = array('*'))
    {
        return call_user_func_array("{$this->modelClassName}::all", array($columns));
    }

    public function find($id, $columns = array('*'))
    {
        return call_user_func_array("{$this->modelClassName}::find", array($id, $columns));
    }

    public function destroy($ids)
    {
        return call_user_func_array("{$this->modelClassName}::destroy", array($ids));
    }
}
