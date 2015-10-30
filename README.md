# Widget generator for Laravel

 * Help you get partial views as widgets

## Installation

1. install package

    ```php
        composer require unisharp/laravel-widgetify
    ```

1. edit config/app.php

    service provider :

    ```php
        Unisharp\Widget\WidgetServiceProvider::class,
    ```

    class aliases :

    ```php
        'Widget' => Unisharp\Widget\WidgetFacade::class,
    ```

1. publish config file

    ```
        php artisan vendor:publish --tag=widget_config
    ```

## Usage

```php
    $page->getWidgetByName('calendar');
    // get widget by name
```
