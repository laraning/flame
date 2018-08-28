<?php

use Laraning\Flame\Renderers\Panel;

function flame(...$args)
{
    return (new Panel($args))->makeView();
}

if (!function_exists('path_separators')) {
    function path_separators($path)
    {
        $path = str_replace('/', DIRECTORY_SEPARATOR, $path);
        $path = str_replace('\\', DIRECTORY_SEPARATOR, $path);

        return $path;
    }
}
