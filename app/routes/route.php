<?php
class Route
{

    public function __construct()
    {
    }

    public static  function view($vista = null, $head = null,  $footer = null, $parameter = null)
    {
        if (!empty($head)) {
            require "public/view/{$head}.php";
        }
        require "public/view/{$vista}.php";
        
        if (!empty($footer)) {;
            require "public/view/{$footer}.php";
        }
    }

    public static  function viewadd($vista = null, $parameter = null)
    {
        require "public/view/{$vista}.php";
    }
}
