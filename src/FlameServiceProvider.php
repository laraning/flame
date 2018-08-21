<?php

namespace Laraning\Flame;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class FlameServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishConfiguration();
        $this->loadConfigurationGroups();

        if (config('flame.demo.route')) {
            $this->loadDemoRoute();
        };

        $this->loadBladeDirectives();
        $this->loadMacros();
    }

    public function register()
    {
        $this->commands([
            \Laraning\Flame\Commands\MakeFeatureCommand::class,
            \Laraning\Flame\Commands\ViewhintsCommand::class,
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
        collect(config('flame.groups'))->each(function ($item, $key) {
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

    protected function loadMacros()
    {
        /*
         * Returns the string that matchest the longest FULL string from an array of strings.
         * @param array $haystack The strings array.
         * @param string $needle The string to match.
         * @return string|null The full longest string matched, or null in case there is no match.
         */
        if (!method_exists('Str', 'longestMatch')) {
            Str::macro('longestMatch', function (array $haystack, string $needle) {
                $longestDegree = 0;
                $result = null;
                collect($haystack)->each(function ($item) use ($needle, &$result, &$longestDegree) {
                    $partialDegree = 0;
                    foreach (str_split($item) as $index => $letter) {
                        // Test each character, and exit when character is different.
                        if ($letter != substr($needle, $index, 1)) {
                            break;
                        }
                        $partialDegree++;
                    }

                    if ($partialDegree > $longestDegree && $partialDegree == strlen($item)) {
                        $longestDegree = $partialDegree;
                        $result = $item;
                    }
                });

                return $result;
            });
        }

        /*
         * Creates directories given a directories array
         * @var array Directories array to create (e.g.: ['test','john/smith']).
         */
        if (!method_exists('File', 'makeDirectories')) {
            File::macro('makeDirectories', function (array $directories): void {
                foreach ($directories as $directory) {
                    if (!File::exists($directory)) {
                        File::makeDirectory($directory, 0775, true);
                    }
                }
            });
        }
    }
}
