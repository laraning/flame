<?php

namespace Laraning\Flame\Blade\Directives;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\View;
use Laraning\Flame\Renderers\Twinkle as TwinkleRenderer;

class Twinkle extends TwinkleRenderer implements Renderable
{
    /**
     * [$hint description].
     *
     * @var null
     */
    protected $hint = null;

    /**
     * [$intermediatePath description].
     *
     * @var null
     */
    protected $intermediatePath = null;

    /**
     * [$view description].
     *
     * @var null
     */
    protected $view = null;

    /**
     * [$data description].
     *
     * @var null
     */
    protected $data = null;

    protected $name = null;

    protected $action = null;

    public function __construct($name, $data = [])
    {
        $this->name = $name;
        $this->data = $data;

        $this->hint = $this->getHint();
        $this->intermediatePath = $this->getIntermediatePath($this->hint);
        $this->action = $this->getActionMethod();
        $this->view = $this->findView();
        $this->enrichData();
    }

    public function render()
    {
        return View::make($this->view)->with($this->data)->render();
    }
}
