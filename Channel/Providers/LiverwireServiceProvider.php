<?php

namespace Modules\Channel\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Filesystem\Filesystem;
use Nwidart\Modules\Facades\Module;
use Illuminate\Support\Str;
use Livewire\Livewire;

class LivewireServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->loadComponents();
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }

    protected function loadComponents()
    {
        $modules = Module::toCollection();

        $filesystem = new Filesystem();

        $modules->map(function ($module) use ($filesystem) {
            $modulePath = $module->getPath();

            $moduleName = $module->getName();

            $path = $modulePath . '/Http/Livewire';

            $files = collect($filesystem->isDirectory($path) ? $filesystem->allFiles($path) : []);

            $files->map(function ($file) use ($moduleName, $path) {
                $componentPath = Str::after($file->getPathname(), $path . '/');

                $componentClassPath = strtr($componentPath, ['/' => '\\', '.php' => '']);

                $componentName = $this->getComponentName($componentClassPath, $moduleName);

                $componentClassStr = "\\Modules\\{$moduleName}\\Http\\Livewire\\" . $componentClassPath;

                $componentClass = get_class(new $componentClassStr);

                $loadComponent = Livewire::component($componentName, $componentClass);
            });
        });
    }

    protected function getComponentName($componentClassPath, $moduleName = null)
    {
        $dirs = explode('\\', $componentClassPath);

        $componentName = '';

        foreach ($dirs as $dir) {
            $componentName .= Str::kebab(lcfirst($dir)) . '.';
        }

        $moduleNamePrefix = ($moduleName) ? Str::lower($moduleName) . '::' : null;

        return Str::substr($moduleNamePrefix . $componentName, 0, -1);
    }
}