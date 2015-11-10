<?php

namespace Unisharp\Widget;

class Widget
{
    private $arr_widgets = [];
    private $position = null;

    public function get($position)
    {
        foreach ($this->arr_widgets[$position] as $widget) {
            echo $widget;
        }
    }

    public function set($position, $widget_name, $args = [])
    {
        if (!array_key_exists($position, $this->arr_widgets)) {
            $this->arr_widgets[$position] = [];
        }

        $func_name = ucfirst($widget_name);

        $inc = "\App\Widgets\\$func_name";

        $obj = new $inc;

        $var = $obj->getData($args);

        $widget = view($obj->view)->with($var);

        array_push($this->arr_widgets[$position], $widget);
    }
}
