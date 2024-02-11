<?php

namespace Core;

class Routes
{
public $routes = [];

 public  function add($method, $url, $controller,$function){
    $this->routes[] = [
        'uri' => $url,
        'controller' => $controller,
        'method' => $method,
        'function' => $function,
    ];
}
//get all routes

public function get($url, $controller, $function) {
    $this->add('GET', $url, $controller, $function);
}
public function Post($url, $controller,$function){
    $this->add('POST', $url, $controller,$function);
}
public function put($url, $controller,$function){
    $this->add('PUT', $url, $controller,$function );
}
public function patch($url, $controller,$function){
    $this->add('PATCH', $url, $controller,$function);
}
public function delete($url, $controller,$function){
    $this->add('DELETE', $url, $controller,$function);
}
//valid  ROUTER check
    public function router($url, $method)
    {
        foreach ($this->routes as $route) {
            /** @var resource $route */
            if ($route['method'] === $method  && $route['uri'] === $url) {
                //call function name
                include base_path($route['controller']);
                $route['function']();
                return;
//                return require base_path($route['controller']).hello();
//                return require base_path($route['controller']).'.'.'/';
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

$router= new Routes();
require base_path('Route/web.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['method'] ?? $_SERVER['REQUEST_METHOD'];
//echo $method;
$router->router($uri, $method, );