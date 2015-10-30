<?php

namespace Unisharp\Widget;

trait Widget
{
    public function getWidgetByName($widget_name)
    {
        $widget_info = config('widget.' . $widget_name);

        return $widget_info;
    }
}
