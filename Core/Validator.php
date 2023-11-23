<?php

// We declare that our Validator class is under the Core namespace
namespace Core;

// But what is a Validator class? What's its use? A Validator class consists of various little validations we're gonna need inside our app.
class Validator
{
    // For example we have our string validator that checks if a string is inside the minimum and maximum values of characters we want
    public static function string($value, $min = 1, $max = INF)
    {
        $value = trim($value);

        return strlen($value) >= $min && strlen($value) <= $max;
    }

    // Or we have our email validator that checks if a value is actually an email
    public static function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}
