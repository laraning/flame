<?php

namespace Laraning\Flame;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class FlameServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishConfiguration();

        $this->loadConfigurationGroups();

        if (config('flame.demo.route')) {
            $this->loadDemoRoute();
        }

        $this->loadBladeDirectives();
    }

    public function register()
    {
        $this->commands([
            \Laraning\Flame\Commands\MakeFeatureCommand::class,
        ]);
    }

    protected function publishConfiguration()
    {
        $this->publishes([
            __DIR__.'/../config/flame.php' => config_path('flame.php'),
        ], 'flame-configuration');
    }

    protected function loadBladeDirectives()
    {
        Blade::directive(
            'twinkle',
            function ($expression) {
                return "<?php echo (new \\Laraning\\Flame\\Blade\\Directives\\Twinkle($expression))->render() ?>";
            }
        );
    }

    /**
     * Loads the flame configuration groups from your configuration file.
     * Each group will be located via the view hint given by the namespace name.
     *
     * @return void
     */
    protected function loadConfigurationGroups()
    {
        collect(config('flame'))->each(function ($item, $key) {
            $this->loadViewsFrom($item['path'], $key);
        });
    }

    /**
     * Just a demo route on '/flame' :) .
     *
     * @return void
     */
    protected function loadDemoRoute()
    {
        Route::middleware(['web'])
             ->group(path_separators(__DIR__.'/Routes/flame.php'));
    }
}
