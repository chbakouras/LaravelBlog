<?php
/**
 * @author Chrisostomos Bakouras.
 */

namespace App\Repositories\System;


use App\Repositories\Repository;

interface OptionRepository extends Repository
{
    public function findOptionStringValueByName($name);

    public function findOptionBooleanValueByName($name);

    public function findOptionIntegerValueByName($name);
}