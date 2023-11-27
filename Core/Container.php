<?php

namespace Core;

class Container {
    // An array with all the bindings we want to do
    protected $bindings = [];
    // As parameters we get a key which is the path of what we want to bind and a resolver function
    public function bind($key, $resolver) {
        $this->bindings[$key] = $resolver;
    }
    
    public function resolve($key) {
        if (! array_key_exists($key, $this->bindings)) {
            // If our key doesn't exist then we want to throw a new exception
            throw new \Exception("No matching binding found for your {$key}");
        }
        // But if our key exists then we execute:
        $resolver = $this->bindings[$key];

        // call_user_func calls our function. We then return it
        return call_user_func($resolver);
    }
}