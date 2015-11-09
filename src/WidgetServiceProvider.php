<?php

namespace Unisharp\Widget;

use Illuminate\Support\ServiceProvider;

/**
 * Class FileapiServiceProvider
 * @package Unisharp\Fileapi
 */
class WidgetServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/widget.php' => config_path('widget.php', 'config'),
        ], 'widget_config');

        $this->publishes([
            __DIR__ . '/example/ExampleWidget.php' => base_path('app/Widgets/ExampleWidget.php'),
        ], 'widget_example');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Widget', function () {
            return new Widget;
        });

        $this->app->bind('\Unisharp\Widget\WidgetInterface', '\Unisharp\Widget\Widget');
    }
}
