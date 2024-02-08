<?php

namespace Core;

class Routes
{
public $routes = [];



 public  function add($method, $uri, $controller){
    $this->routes[] = [
        'uri' => $uri,
        'controller' => $controller,
        'method' => $method,
    ];
}
//get all routes
public function get($url, $controller){
    $this->add('GET', $url, $controller);
}
public function Post($url, $controller){
    $this->add('POST', $url, $controller);
}
public function put($url, $controller){
    $this->add('PUT', $url, $controller);
}
public function patch($url, $controller){
    $this->add('PATCH', $url, $controller);
}
public function delete($url, $controller){
    $this->add('DELETE', $url, $controller);
}
//valid  ROUTER check
    public function router($uri, $method)
    {
        foreach ($this->routes as $route) {
            /** @var resource $route */
            if ($route['method'] === $method  && $route['uri'] === $uri) {
                return require base_path($route['controller']);
            }
        }
        $this->Abord();
    }

    protected function Abord($code = 404)
    {
        http_response_code(404);
        echo "404";
        die();
    }

}