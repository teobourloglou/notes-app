<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

// We fetch all the notes of the corresponding user
$notes = $db->query('select * from notes where user_id = 1')->get();

view("notes/index.view.php", [
    'heading' => 'Notes',
    'notes' => $notes
]);