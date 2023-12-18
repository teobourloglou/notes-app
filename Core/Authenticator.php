<?php

namespace Core;

class Authenticator {
    public function attempt($email, $password) {
        // Match the credentials
        $user = App::resolve(Database::class)->query('select * from users where email = :email', [
            'email' => $email
        ])->find();

        if ($user) {
            // we have a user, but we don't know if the password provided matches what we have in the database.
            if (password_verify($password, $user['password'])) {
                $this->login([
                    'email' => $email,
                ]);
                return true;
            }

            return false;
        }
    }

    public function login($user) {
        // mark that the user has logged in
        $_SESSION['user'] = [
            'email' => $user['email']
        ];
    
        // We do this to be 100% security safe.
        session_regenerate_id(true);
    }
    
    public function logout() {
        // Clear out the superglobal
        $_SESSION = [];
        // Destroy the session file
        session_destroy();
    
        // We delete the cookie that is saved in the browser session.
        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['httponly']);
    }
}
