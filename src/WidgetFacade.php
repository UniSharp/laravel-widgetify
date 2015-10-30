<?php

namespace Unisharp\Widget;

use Illuminate\Support\Facades\Facade;

class WidgetFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Widget';
    }
}
