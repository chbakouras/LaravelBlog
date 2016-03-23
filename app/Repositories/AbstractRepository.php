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

    public function findWithTrashed($id, $columns = array('*'))
    {
        $where = call_user_func_array("{$this->modelClassName}::where", array('id', $id));
        $withTrashed = $where->withTrashed();

        return $withTrashed->first();
    }

    public function destroy($ids)
    {
        return call_user_func_array("{$this->modelClassName}::destroy", array($ids));
    }

    public function findAllPaginated($perPage = 20)
    {
        return call_user_func_array("{$this->modelClassName}::paginate", array($perPage));
    }

    public function update(array $data, $id, $attribute="id")
    {
        return call_user_func_array("{$this->modelClassName}::where", array($attribute, $id))->update($data);
    }

    public function softDelete($id)
    {
        $traits = class_uses($this->modelClassName);

        if (in_array('Illuminate\Database\Eloquent\SoftDeletes', $traits)) {
            $this->find($id)->delete();
        }
    }

    public function forceDelete($id)
    {
        $this->findWithTrashed($id)->forceDelete();
    }
}
