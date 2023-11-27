<?php

namespace Core;

// We make this App class with static functions in order for us to be able to access our container wherever we want
class App {
    // We make our container variable static in order for it to be available in our setContainer function
    protected static $container;
    // This function is static in order for it to be available without first creating an object
    public static function setContainer($container) {
        // We initialize our container
        static::$container = $container;
    }

    public static function container() {
        // We return our container
        return static::$container;
    }

    // These two methods call the corresponding methods from the container. Why would that be?
    // It turns out that this is what enables us to call the function in our code like this App::resolve(Database::class) and note like this $db = App::container()->resolve(Database::class);
    // We simply pass the data from one end to the other
    public static function bind($key, $resolver) {
        static::container()->bind($key, $resolver);
    }

    public static function resolve($key) {
        return static::container()->resolve($key);
    }

}
