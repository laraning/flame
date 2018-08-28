<?php

use Laraning\Flame\Renderers\Panel;

function flame(...$args)
{
    return (new Panel($args))->makeView();
}
