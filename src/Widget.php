<?php

namespace Unisharp\Widget;

class Widget
{
    public function getWidgetByName($arr_widget_name = [])
    {
    	$arr_widgets = [];

    	foreach ($arr_widget_name as $widget_name) {
    		$widget_info = config('widget.' . $widget_name);

    		$arr_widgets[] = $this->make($widget_info);
    	}

        return $arr_widgets;
    }

    public function getWidgetsByParent($parent_name)
    {
    	$arr_widgets = [];

    	foreach (config('widget') as $widget) {
    		if (in_array($parent_name, $widget['parents'])) {
    			$arr_widgets[] = $this->make($widget);
    		}
    	}

    	return $arr_widgets;
    }

    public function allWidgets()
    {
    	$arr_widgets = [];

    	foreach (config('widget') as $widget) {
    		$arr_widgets[] = $this->make($widget);
    	}

    	return $arr_widgets;
    }

    public function getWidgetWithVar($widget_name, $var)
    {
    	$widget_info = config('widget.' . $widget_name);

    	return $this->make($widget_info, $var);
    }

    private function make($widget_info, $var = null)
    {
        $obj = new $widget_info['class'];

        $render = $widget_info['method'];

        return $obj->$render($var);
    }
}
