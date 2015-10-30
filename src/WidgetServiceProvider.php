<?php 

namespace Unisharp\Widget;

use Illuminate\Support\ServiceProvider;

/**
 * Class FileapiServiceProvider
 * @package Unisharp\Fileapi
 */
class WidgetServiceProvider extends ServiceProvider {

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

    }
}
