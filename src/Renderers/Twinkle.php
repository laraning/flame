<?php

namespace Laraning\Flame\Renderers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Laraning\Flame\Exceptions\FlameException;

class Twinkle extends Renderer
{
    public function __construct($name = null)
    {
    }

    protected function findView()
    {
        /**
         * Tries to find the hinted view.
         * If not found, tries to find the $this->name view.
         */
        $possibleView = $this->hint.
                        '::'.
                        $this->intermediatePath.
                        '.Twinkles.'.
                        $this->name;

        if (view()->exists($possibleView)) {
            return $possibleView;
        }

        if (view()->exists($this->name)) {
            return $this->name;
        }

        // Cannot continue if no view name was found for the Twinkle.
        throw FlameException::twinkleNotFound($this->name);
    }

    /**
     * Besides the data that is passed via argument, it is possible to
     * have a component controller inside the Controllers folder.
     * If there is an action as the one that the parent controller is running
     * then we should run the method and grab (if returned) the data as an array.
     * This should be then added to the data that was passed via the constructor.
     *
     * @return [type] [description]
     */
    protected function enrichData()
    {
        $action = null;

        //Compute component controller namespace (studly case!).
        $namespace = config("flame.groups.{$this->hint}.namespace").
                          '\\'.
                          str_replace('.', '\\', $this->intermediatePath).
                          '\\Controllers\\'.
                          studly_case($this->name).
                          'Controller';

        // Identify controller action: current action or 'default'.
        if (@method_exists($namespace, $this->action)) {
            $action = $this->action;
        } elseif (@method_exists($namespace, 'default')) {
            $action = 'default';
        }

        if (!is_null($action)) {
            // Obtain route parameters.
            $router = app()->make('router');
            $arguments = $router->getCurrentRoute()->parameters;

            // In case the action is update or store, we need to pass the request.
            if ($action == 'update' || $action == 'store') {
                $arguments['request'] = request();
            }

            // Verify if there are extra parameters in the method that need depedency injection.
            $ref = new \ReflectionMethod($namespace, $action);

            $extraArguments = [];
            if (count($ref->getParameters()) > 0) {
                foreach ($ref->getParameters() as $data) {
                    $extraArguments[$data->getName()] = app()->make((string) $data->getType());
                }
            }

            // Obtain response.
            $response = app()->call("{$namespace}@{$action}", array_merge($arguments, $extraArguments));

            // Compute response to be arrayable.
            $response = !is_array($response) ? [$response] : $response;

            // Merge response with the current data.
            $this->data = array_merge_recursive((array) $this->data, $response);
        }
    }
}
