<?php

namespace Unisharp\Widget;

class Widget
{
    // private $vars = [];

    private $inc = null;

    // public function __destruct()
    // {
    //     $this->render();
    // }

    // public function setVar($args = [])
    // {
    //     $this->vars = $args;

    //     return $this;
    // }

    public function get($widget_name, $args = [])
    {
        $func_name = ucfirst($widget_name);

        $inc = "\App\Widgets\\$func_name";

        $this->inc = $inc;

        $obj = new $this->inc;

        $var = call_user_func_array([$obj, 'getData'], $args);

        return view($obj->view)->with($var);
    }

    // public function render()
    // {
    //     $inc = new $this->inc;

    //     $var = call_user_func_array([$inc, 'getData'], $this->vars);

    //     return view($inc->view)->with($var);
    // }

    public function all()
    {
        $arr_widgets = [];

        foreach (config('widget') as $widget) {
            $arr_widgets[] = $this->make($widget);
        }

        return $arr_widgets;
    }


    public function getByGroup($group)
    {
        $arr_widgets = [];

        if (is_array($group)) {
            foreach ($group as $group_name) {
                $arr_group_widget = [];

                foreach (config('widget') as $widget) {
                    if (in_array($group_name, $widget['groups'])) {
                        $arr_group_widget[] = $this->make($widget);
                    }
                }

                $arr_widgets[$group_name] = $arr_group_widget;
            }

            return $arr_widgets;
        }

        foreach (config('widget') as $widget) {
            if (in_array($group, $widget['groups'])) {
                $arr_widgets[] = $this->make($widget);
            }
        }

        return $arr_widgets;
    }


    public function getByName($arr_widget_name = [])
    {
        $arr_widgets = [];

        foreach ($arr_widget_name as $widget_name) {
            $widget_info = $this->getWidgetByName($widget_name);

            $arr_widgets[] = $this->make($widget_info);
        }

        return $arr_widgets;
    }


    public function getWithVar($arr_widget_name = [])
    {
        $arr_widgets = [];

        foreach ($arr_widget_name as $name => $vars) {
            $widget_info = $this->getWidgetByName($name);

            if (is_null($widget_info)) {
                $arr_widgets[] = null;
            }

            $arr_widgets[] = $this->make($widget_info, $vars);
        }

        return $arr_widgets;
    }


    public function setVars()
    {
        return true;
    }


    private function getWidgetByName($widget_name)
    {
        $widget_info = config('widget.' . $widget_name);

        if (is_null($widget_info)) {
            throw new \Exception("Widget : '$widget_name' not found");
        }

        return $widget_info;
    }


    private function make($widget_info, $vars = null)
    {
        $render = explode('@', $widget_info['render']);

        $obj = new $render[0];

        $func_name = $render[1];

        if (is_array($vars)) {
            return call_user_func_array([$obj, $func_name], $vars);
        }

        return $obj->$func_name($vars);
    }
}
