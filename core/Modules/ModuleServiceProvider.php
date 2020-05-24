<?php

namespace Core\Modules;

use Illuminate\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider{
    public function register()
    {

    }
    public function boot(){
        $listModule = array_map('basename', \File::directories(__DIR__));
        foreach ($listModule as $module) {
            //Route
            if (file_exists($pathFileRoute = __DIR__ .'/'.$module.'/routes.php')) {
                $this->loadRoutesFrom($pathFileRoute);
            }
            //Views
            if (is_dir($pathFolView = __DIR__ .'/'.$module.'/Views')) {
                $this->loadViewsFrom($pathFolView, $module);
            }
        }

    }
}
