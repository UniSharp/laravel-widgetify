<?php

namespace App;

class Widget
{
	public function calendar($size = '1', $num = null)
    {
        return "<h$size>calendar : $num</h$size>";
    }

    public function quote()
    {
        return '<h6>This is a quote.</h6>';
    }
}