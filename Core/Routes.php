<?php

namespace Core;



use Core\Middlewares\Auth;

class Routes
{
public $routes = [];

 public  function add($method, $url, $controller,$function)
 {
    $this->routes[] = [
        'uri' => $url,
        'controller' => $controller,
        'method' => $method,
        'function' => $function,
        'Middleware' => null,
    ];
    return $this;
}
//get all routes

public function get($url, $controller, $function)
{
  return  $this->add('GET', $url, $controller, $function);
}
public function Post($url, $controller,$function)
{
   return $this->add('POST', $url, $controller,$function);
}
public function put($url, $controller,$function)
{
   return $this->add('PUT', $url, $controller,$function );
}
public function patch($url, $controller,$function)
{
  return  $this->add('PATCH', $url, $controller,$function);
}
public function delete($url, $controller,$function)
{
  return  $this->add('DELETE', $url, $controller,$function);
}
public function auth($key)
{
    //add middleware
    $this->routes[array_key_last($this->routes)]['Middleware'] = $key;
//    print_r($this->routes);
}


//valid  ROUTER check
    public function router($url, $method)
    {
        foreach ($this->routes as $route) {
            /** @var resource $route */
            if ($route['method'] === $method  && $route['uri'] === $url) {
              require base_path('/Core/Middlewares/Middleware.php');
                //call function name
//                path
                include base_path('/Http/Controller/' . $route['controller']);
                $route['function']();
                return;
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

