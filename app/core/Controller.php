<?php

namespace app\core;


class Controller
{
    public $route;

    public function __construct($route)
    {
        $this->route = $route;
    }
}