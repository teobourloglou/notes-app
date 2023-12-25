<?php

// Login the user if the credentials match
use Core\Authenticator;
use Http\Forms\LoginForm;


$email = $_POST['email'];
$password = $_POST['password'];


// Try to validate the credentials.
$form = LoginForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);

$signedIn = (new Authenticator)->attempt(
    $attributes['email'], $attributes['password']
);

// If we're successful try to authenticate the user.
if (!$signedIn) {
    // If the authentication doesn't pass then update our errors list.
    $form->error(
        'email', 'No matching account found for that email address and password'
    )->throw();
} 

// If it passes then we redirect to the homepage.
redirect('/');