<?php
/**
 * @author Chrisostomos Bakouras.
 */

namespace App\Repositories;

/**
 * Interface Repository
 *
 * Provides the standard functions to be expected of any repository
 *
 * @package App\Repositories
 */
interface Repository
{
    public function create(array $attributes);

    public function all($columns = array('*'));

    public function find($id, $columns = array('*'));

    public function destroy($ids);
}