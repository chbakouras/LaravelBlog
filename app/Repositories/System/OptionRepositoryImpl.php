<?php
/**
 * @author Chrisostomos Bakouras.
 */

namespace App\Repositories\System;


use App\Repositories\AbstractRepository;

class OptionRepositoryImpl extends AbstractRepository implements OptionRepository
{
    protected $modelClassName = '\App\Models\Option';

    /**
     * Returns the String value of an option.
     *
     * @param $name
     * @return mixed
     */
    public function findOptionStringValueByName($name)
    {
        $where = call_user_func_array("{$this->modelClassName}::where", array('name', $name));

        return $where->first()->value;
    }

    /**
     * Returns the Boolean value of an option.
     *
     * @param $name
     * @return mixed
     */
    public function findOptionBooleanValueByName($name)
    {
        $where = call_user_func_array("{$this->modelClassName}::where", array('name', $name));

        return $where->first()->value === 'true'? true: false;
    }

    public function findOptionIntegerValueByName($name)
    {
        $where = call_user_func_array("{$this->modelClassName}::where", array('name', $name));

        return intval($where->first()->value);
    }
}