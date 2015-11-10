<?php

namespace App\Widgets;

use Unisharp\Widget\WidgetInterface;

class ExampleWidget implements WidgetInterface
{
    public $view = null;

    public function getData()
    {
        return true;
    }
}
