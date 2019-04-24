<?php
require 'app/lib/dev.php';

//namespaces
use app\core\Router;

//autoloader for classes
spl_autoload_register(function ($class) {
    $path = str_replace('\\', '/', $class) . '.php';
    if (file_exists($path)) {
        require "$path";
    }
});

session_start();

$router = new Router();
$router->run();