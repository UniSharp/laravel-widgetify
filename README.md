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

1. publish config file and demo class

    ```php
        php artisan vendor:publish --tag=widget_config
        php artisan vendor:publish --tag=widget_example
    ```

## Usage

```php
    Widget::all();
    // get all widgets

    Widget::getByGroup('page');
    // get widgets belonging to the group
    // accept single variable or array

    Widget::getByName('calendar');
    // get widget by widget name
    // accept single variable or array

    Widget::getWithVar(['calendar' => [4, 6], 'quote' => [8]]);
    // get widget by name and pass variables
    // accept only array

    Widget::set('side', ['class' => 'class_name', $data = []]);
    // set widgets with position

    Widget::random('side', $number = 3);
    // set a random widget with position
```

in view :

```html
    {!! d('widget.side') !!}
```
