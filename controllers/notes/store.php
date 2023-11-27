<?php


use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$errors = [];

// We first validate if our request method is a post method and then if the post's body is inside the range we want it to be. If not, we pass the corresponding error
if (! Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required.';
}

if (! Validator::string($_POST['title'], 1, 100)) {
    $errors['title'] = 'A title of no more than 100 characters is required.';
}

// If the errors array is not empty then we return create view again
if (! empty($errors)) {
    return view("notes/create.view.php", [
       'heading' => 'Create Note',
       'errors' => $errors 
    ]);
}

// If not any errors have occured then that means that we are clear to go on with our query
// In our query we insert a new note to the notes table. In order to avoid SQL injections from the html we need to pass our values as parameters to the query
$db->query('INSERT INTO notes(user_id, title, body) VALUES(:user_id, :title, :body)', [
    'user_id' => 1,
    'title' => $_POST['title'],
    'body' => $_POST['body'],
]);

// The following redirects the user to notes location
header('location: /notes');
die();