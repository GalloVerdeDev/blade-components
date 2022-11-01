<?php

declare(strict_types=1);

namespace GalloVerde\BladeComponents;

use Illuminate\Support\ServiceProvider;

class BladeComponentsServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'blade-com');
        $this->mergeConfigFrom(__DIR__.'/../config/blade-components.php', 'blade-components');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/blade-com'),
        ]);

        $this->publishes([
            __DIR__.'/../config/blade-components.php' => config_path('blade-components.php'),
        ]);
    }
}
