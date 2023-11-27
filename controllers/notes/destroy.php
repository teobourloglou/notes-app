<?php

use Core\App;
use Core\Database;

// We don't need to take this approach anymore now that we created a service container
// use Core\Database;

// We require our config file in order to use it to establish a database connection
// $config = require base_path('config.php');
// $db = new Database($config['database']);

// It turns out that Database::class == 'Core\Database'
$db = App::resolve(Database::class);

$currentUserId = 1;

$note = $db->query('select * from notes where id = :id', [
    'id' => $_POST['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$db->query('delete from notes where id = :id', [
    'id' => $_POST['id']
]);

header('location: /notes');
exit();