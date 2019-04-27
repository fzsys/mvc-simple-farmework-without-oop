<?php

namespace application\core;


class Router
{
    protected $routes = [];
    protected $params = [];

    function __construct()
    {
        $arr = require 'application/config/routes.php';
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
            $path = 'application\controllers\\' . ucfirst($this->params['controller']) . 'Controller';

            if (class_exists($path)) {
                $action = $this->params['action'] . 'Action';

                if (method_exists($path, $action)) {
                    $controller = new $path($this->params);
                    //debug($controller);
                    $controller->$action();
                } else {
                    View::errorCode(404);
                }

            } else {
                View::errorCode(404);
            }

        } else {
            View::errorCode(404);
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