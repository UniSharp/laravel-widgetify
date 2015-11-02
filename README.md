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

    ```php
        php artisan vendor:publish --tag=widget_config
    ```

## Config

In `config/widget.php`, set every widget you need, and remember to implement your method

```php
    'calendar' => [                          // widget name
        'groups' => ['page', 'event'],       // widget's group name
        'render' => '\App\Widget@calendar',  // where your render function is
    ],
    
    'quote' => [                             // another widget
        'groups' => ['page'],
        'render' => '\App\Widget@quote',
    ]
```

## Usage

```php
    Widget::all();
    // get all widgets

    Widget::getByGroup('date');
    // get widgets belonging to the group
    // accept single variable or array

    Widget::getByName('calendar');
    // get widget by widget name
    // accept single variable or array

    Widget::getWithVar(['calendar' => [4, 6], 'quote' => [8]]);
    // get widget by name and pass variables
    // accept only array
```
