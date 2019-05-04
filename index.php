<?php
require 'application/lib/dev.php';

//namespaces
use application\core\Router;

//автолоадер для классов
spl_autoload_register(function ($class) {
    $path = str_replace('\\', '/', $class) . '.php';
    if (file_exists($path)) {
        require "$path";
    }
});

session_start();

$router = new Router();
$router->run();