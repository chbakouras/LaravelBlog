<?php
/**
 * @author Chrisostomos Bakouras.
 */

namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class BlogFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'blogHelper';
    }
}