<?php
/**
 * @author Chrisostomos Bakouras.
 */

namespace App\Helpers;


class ViewHelper
{
    function sectionExists($section)
    {
        return array_key_exists($section, app('view')->getSections());
    }
}