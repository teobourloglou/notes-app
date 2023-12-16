<?php

use Core\Response;

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort($code = 404)
{
    http_response_code($code);

    require base_path("views/{$code}.php");

    die();
}

// The authorize function takes a condition and authorizes it turns out true
function authorize($condition, $status = Response::FORBIDDEN)
{
    if (! $condition) {
        abort($status);
    }

    return true;
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);

    require base_path('views/' . $path);
}

function login($user) {
    // mark that the user has logged in
    $_SESSION['user'] = [
        'email' => $user['email']
    ];

    // We do this to be 100% security safe.
    session_regenerate_id(true);
}

function logout() {
    // Clear out the superglobal
    $_SESSION = [];
    // Destroy the session file
    session_destroy();

    // We delete the cookie that is saved in the browser session.
    $params = session_get_cookie_params();
    setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['httponly']);
}