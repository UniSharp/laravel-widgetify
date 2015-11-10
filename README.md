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

1. publish widget template class

    ```php
        php artisan vendor:publish --tag=widget_example
    ```

## Usage

```php
    Widget::set('side', 'widget-class-name', $args = []]);
    // set widgets with position

    Widget::get('side');
    // get all widgets of a position
```

## Example

1. in controller :

    ```php
        \Widget::set('side', 'block', ['alias' => 'side_top_html']);
        \Widget::set('side', 'facebook');
        \Widget::set('side', 'block', ['alias' => 'side_mid_html']);
        \Widget::set('side', 'subscription');
        \Widget::set('side', 'block', ['alias' => 'side_buttom_html']);
    ```

2. in view :

    ```html
        {!! \Widget::get('side') !!}
    ```
