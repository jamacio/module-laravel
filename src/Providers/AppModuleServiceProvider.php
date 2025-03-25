<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;
use SimpleXMLElement;

class AppModuleServiceProvider extends ServiceProvider
{
    protected array $modules = [];
    protected array $dependencies = [];

    public function boot()
    {
        $modulesPath = base_path('app/Code/');
        $moduleDirs = array_filter(glob($modulesPath . '*'), 'is_dir');

        foreach ($moduleDirs as $moduleDir) {
            $xmlFile = $moduleDir . '/module.xml';

            if (File::exists($xmlFile)) {
                $relativePath = str_replace($modulesPath, '', $moduleDir);
                $this->parseModuleConfig($xmlFile, $relativePath);
            }
        }

        $this->registerModulesInOrder();
    }

    protected function parseModuleConfig(string $filePath, string $relativePath)
    {
        $xml = new SimpleXMLElement(File::get($filePath));
        $moduleName = (string) $xml->module['name'];
        $this->modules[$moduleName] = $relativePath;

        if (isset($xml->sequence->module)) {
            foreach ($xml->sequence->module as $dependency) {
                $this->dependencies[$moduleName][] = (string) $dependency['name'];
            }
        }
    }

    protected function registerModulesInOrder()
    {
        $resolved = [];
        $unresolved = [];

        $resolve = function ($module) use (&$resolve, &$resolved, &$unresolved) {
            if (isset($resolved[$module])) {
                return;
            }
            if (isset($unresolved[$module])) {
                throw new \Exception("Circular dependency detected in module: $module");
            }

            $unresolved[$module] = true;
            if (isset($this->dependencies[$module])) {
                foreach ($this->dependencies[$module] as $dependency) {
                    if (!isset($this->modules[$dependency])) {
                        throw new \Exception("Module {$dependency} not found, but it is a dependency of {$module}");
                    }
                    $resolve($dependency);
                }
            }
            unset($unresolved[$module]);
            $resolved[$module] = true;

            $this->registerModule($module);
        };

        foreach (array_keys($this->modules) as $module) {
            $resolve($module);
        }
    }

    protected function registerModule(string $moduleName)
    {
        $modulesPath = base_path('app/Code/');
        $relativePath = $this->modules[$moduleName];
        $moduleDir = $modulesPath . $relativePath;

        $this->app->booted(function () use ($moduleDir) {
            $routesDir = $moduleDir . '/Routes';
            if (is_dir($routesDir)) {
                foreach (glob($routesDir . '/*.php') as $routeFile) {
                    require $routeFile;
                }
            }
        });

        $viewsPath = $moduleDir . '/Views';
        if (is_dir($viewsPath)) {
            $alias = strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $moduleName));
            $this->loadViewsFrom($viewsPath, $alias);
        }

        $migrationsPath = $moduleDir . '/Database/Migrations';
        if (is_dir($migrationsPath)) {
            $this->loadMigrationsFrom($migrationsPath);
        }

        $seedersPath = $moduleDir . '/Database/Seeders';
        if (is_dir($seedersPath)) {
            foreach (glob($seedersPath . '/*.php') as $seederFile) {
                require_once $seederFile;
            }
        }
    }
}
