<?php

namespace Laraning\Flame\Renderers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Laraning\Flame\Exceptions\FlameException;

class Renderer
{
    public function __construct()
    {
    }

    /**
     * Returns the Controller namespace.
     *
     * @return string Controller namespace.
     */
    final protected function controllerNamespace()
    {
        return get_class(Route::getCurrentRoute()->getController());
    }

    /**
     * Computes the View hint based in the Controller namespace and the
     * Flame configuration.
     *
     * @throws Laraning\Flame\Exceptions\FlameException
     *
     * @return string View hint.
     */
    final protected function getHint()
    {
        // Map a new array with [group => namespace].
        $groups = collect(config('flame.groups'))->mapWithKeys(function ($item, $key) {
            return [$key => $item['namespace']];
        });

        //Map a new array only with namespaces.
        $namespaces = $groups->values();

        //Get the namespace that longest matches the controller namespace.
        $matchedNamespace = Str::longestMatch($namespaces->toArray(), $this->controllerNamespace());

        // Cannot continue if no namespace was found for the View hint.
        if (is_null($matchedNamespace)) {
            throw FlameException::namespaceNotFound($this->controllerNamespace());
        }

        return $groups->flip()[$matchedNamespace];
    }

    /**
     * Returns the Controller action method.
     *
     * @return string
     */
    protected function getActionMethod()
    {
        return Route::getCurrentRoute()->getActionMethod();
    }

    /**
     * Resolves the view intermediate path.
     *
     * @param string $hint View hint (=the flame group key).
     *
     * @return string Intermediate path already with '.' separations.
     */
    protected function getIntermediatePath($hint)
    {
        $namespace = config("flame.groups.{$hint}.namespace");
        $namespaceTail = substr($this->controllerNamespace(), strlen($namespace) + 1);

        return collect(explode('\\', $namespaceTail))->splice(0, -2)->implode('.');
    }
}
