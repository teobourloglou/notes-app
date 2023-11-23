<?php

// As a general rule each request should have its own controller
$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');

$router->get('/notes', 'controllers/notes/index.php');
$router->get('/note', 'controllers/notes/show.php');
// We declare a delete request for our single note and we call a destroy controller
$router->delete('/note', 'controllers/notes/destroy.php');

$router->get('/notes/create', 'controllers/notes/create.php');
$router->post('/notes/create', 'controllers/notes/store.php');