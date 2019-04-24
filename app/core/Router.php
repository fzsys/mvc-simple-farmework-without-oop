<?php

namespace app\core;


class Router
{
    protected $routes = [];
    protected $params = [];

    function __construct()
    {
        $arr = require 'app/config/routes.php';
        foreach ($arr as $key => $value) {
            $this->add($key, $value);
        }
    }

    public function add($route, $params)
    {
        $route = '#^' . $route . '$#';
        $this->routes[$route] = $params;
    }

    public function run()
    {
        if ($this->match()) {
            $path = 'app\controllers\\' . ucfirst($this->params['controller']) . 'Controller';

            if (class_exists($path)) {
                $action = $this->params['action'] . 'Action';

                if (method_exists($path, $action)) {
                    $controller = new $path($this->params);
                    //debug($controller);
                    $controller->$action();
                } else {
                    echo $action . ' action was not found';
                }

            } else {
                echo $path . ' controller was not found';
            }

        } else {
            echo 'route was not found';
        }
    }

    public function match()
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $match)) {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }
}