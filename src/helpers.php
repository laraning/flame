<?php

use Laraning\Flame\Renderers\Panel;

function flame($data = [])
{
    return (new Panel($data))->makeView();
}

if (!function_exists('package_path')) {
    function package_path($path)
    {
        $base = file_exists(base_path('vendor/laraning/flame')) ?
            'vendor' :
            'packages';

        return base_path("{$base}/laraning/flame/src/".$path);
    }
}

if (!function_exists('path_separators')) {
    function path_separators($path)
    {
        $path = str_replace('/', DIRECTORY_SEPARATOR, $path);
        $path = str_replace('\\', DIRECTORY_SEPARATOR, $path);

        return $path;
    }
}
