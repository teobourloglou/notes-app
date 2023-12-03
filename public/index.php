<?php

// We start our session
session_start();

// We create a global constant of the base path
const BASE_PATH = __DIR__.'/../';

// We need to require the functions.php file
require BASE_PATH.'Core/functions.php';

// spl_autoload_register autoloads a function. In this case we replace the default directory separator with a '\' and then require it
spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    require base_path("{$class}.php");
});

// We require our bootstrap file
require base_path('bootstrap.php');

// We declare our router after we required it and then we fetch also all the routes from the routes.php file
$router = new \Core\Router();
$routes = require base_path('routes.php');

// We get our path from the SERVER superglobal
// It's a very common practice to have a '_method' named input that holds the optimal request type that we want to hint to our browser. This is used because browsers not always support all kinds of requests
// If this exists then we use this method, if not then we take the tradiotional path of using the $_SERVER['REQUEST_METHOD'] value
// Reminder: $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'] is the same as this: $_POST['_method'] ? $_POST['_method'] : $_SERVER['REQUEST_METHOD']
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);


