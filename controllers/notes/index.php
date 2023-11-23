<?php

use Core\Database;

// We require our config file in order to use it to establish a database connection
$config = require base_path('config.php');
$db = new Database($config['database']);

// We fetch all the notes of the corresponding user
$notes = $db->query('select * from notes where user_id = 1')->get();

view("notes/index.view.php", [
    'heading' => 'My Notes',
    'notes' => $notes
]);