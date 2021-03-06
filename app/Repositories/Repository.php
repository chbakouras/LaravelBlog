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

    public function findWithTrashed($id, $columns = array('*'));

    public function eagerLoadOne($with, $id);

    public function destroy($ids);

    public function update(array $data, $id, $attribute="id");

    public function findAllPaginated($perPage = 20);

    public function softDelete($id);

    public function forceDelete($id);
}