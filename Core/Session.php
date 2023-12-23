<?php

namespace Core;

class Session {
    public static function has($key) {
        return (bool) static::get($key);
    }

    public static function put($key, $value) {
        $_SESSION[$key] = $value;
    }

    public static function get($key, $default = null) {
        // We first check if our key exists in flash array and if not then we check on the top level
        if (isset($_SESSION['_flash'][$key])) {
            return $_SESSION['_flash'][$key];
        }
        return $_SESSION[$key] ?? $default;
    }

    // We make a distinction that these data shouldn't stay in the session but get flashed after one request
    public static function flash($key, $value) {
        $_SESSION['_flash'][$key] = $value;
    }

    public static function unflash() {
        unset($_SESSION['flash']);
    }

    public static function flush() {
        $_SESSION = [];
    }

    public static function destroy() {
        // Clear out the superglobal
        static::flush();
        // Destroy the session file
        session_destroy();
    
        // We delete the cookie that is saved in the browser session.
        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['httponly']);
    }
}