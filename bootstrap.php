<?php

use Core\App;
use Core\Container;
use Core\Database;

$container = new Container();

// We associate a function with a string called "Core\Database" in order to bind it to our container
$container->bind('Core\Database', function() {
    $config = require base_path('config.php');
    return new Database($config['database']);
});

App::setContainer($container);