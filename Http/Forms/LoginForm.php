<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm {
    protected $errors = [];

    public function validate($email, $password) {
        if (!Validator::email($email)) {
            $this->errors['email'] = 'Please provide a valid email address';
        }

        if (!Validator::string($password)) {
            $this->errors['password'] = 'Please provide a password of at least 7 characters';
        }

        // We return a boolean that depends on the state of errors array, whether its empty or not
        return empty($this->errors);
    }

    public function errors() {
        return $this->errors;
    }

    public function error($field, $message) {
        $this->errors[$field] = $message;
    }
}