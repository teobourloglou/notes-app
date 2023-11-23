<?php
// We declare that our Router class is under the Core namespace
namespace Core;

class Router
{
    // There is no reason for our routes to be accessed from anywhere else so we prefer to keep them protected or private
    protected $routes = [];

    // We create our add function in order to not repeat the same code for each request type
    // This function saves every new route to the routes array
    public function add($method, $uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method
        ];
    }

    // We create a function for each request type
    public function get($uri, $controller)
    {
        $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller)
    {
        $this->add('POST', $uri, $controller);
    }

    public function delete($uri, $controller)
    {
        $this->add('DELETE', $uri, $controller);
    }

    public function patch($uri, $controller)
    {
        $this->add('PATCH', $uri, $controller);
    }

    public function put($uri, $controller)
    {
        $this->add('PUT', $uri, $controller);
    }

    // Our route function takes a uri and a method parameter. It loops through our routes array and if the uri and the method are identical it calls the corresponding controller
    // We use strtoupper function to make sure that our method variable is passed as uppercase
    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                return require base_path($route['controller']);
            }
        }

        $this->abort();
    }

    // In the worst case of a route not founded we need an abort function that will load a view for every not existing route. We set 404 as our default response code but we can always call pass a different value
    protected function abort($code = 404)
    {
        http_response_code($code);

        require base_path("views/{$code}.php");

        die();
    }
}
