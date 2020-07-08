<?php

namespace CoolStudio\LaravelImagePipeline;

use Illuminate\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    public function register()
    {
        
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/image-pipelines.php' => config_path('image-pipelines.php'),
        ], 'configs');
    }
}
