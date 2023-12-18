<?php

// Login the user if the credentials match
use Core\Authenticator;
use Http\Forms\LoginForm;


$email = $_POST['email'];
$password = $_POST['password'];


$form = new LoginForm();

// Try to validate the credentials.
if ($form->validate($email, $password)) {
    // If we're successful try to authenticate the user.
    if ((new Authenticator)->attempt($email, $password)) {
        // If authentication passes then we redirect to the homepage.
        redirect('/');
    } 
    // If not update our errors list.
    $form->error('email', 'No matching account found for that email address and password');
}


// If not then we return the error.
return view('session/create.view.php', [
    'errors' => $form->errors()
]);