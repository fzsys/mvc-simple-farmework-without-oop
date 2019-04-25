<?php

namespace app\core;


class View
{

    public $path;
    public $route;
    public $layout = 'default';

    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $this->route['controller'] . '/' . $this->route['action'];
    }

    public static function errorCode($code)
    {
        $path = 'app/views/errors/' . $code . '.php';
        if (file_exists($path)) {
            http_response_code($code);
            require $path;
            exit();
        }
    }

    public function render($title, $vars = [])
    {
        extract($vars);
        if (file_exists('app/views/' . $this->path . '.php')) {
            ob_start();
            require 'app/views/' . $this->path . '.php';
            $content = ob_get_clean();
        }

        require 'app/views/layouts/' . $this->layout . '.php';
    }

    public function redirect($url)
    {
        header('Location:' . $url);
        exit;
    }
}