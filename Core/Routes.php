<?php

namespace Core;



use Http\Controller\DController;

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
              call_user_func_array($route['controller'],[""]);

//                include base_path('/Http/Controller/' . $route['controller']) ?? $this->Abord();
//                $route['function']();`
//                return;
            }

        }
//        $this->Abord();
    }

    protected function Abord($code = 404)
    {
        http_response_code(404);
        echo "404";
        die();
    }

    public function redirect($view = null,)
    {
        $layout = ($this->Layout());
        $views = ($this->render($view));
        echo str_replace('{{containt}}', $views, $layout);
    }

    public function Layout()
    {
        ob_start();
        include __DIR__ . '/../View/index.php';
        return ob_get_clean();
    }

////
    public function render($view = null)
    {
        ob_start();
        include __DIR__ . '/../View/' . $view;
        return ob_get_clean();

    }
    public static function test($data ,$controller, ){
       return call_user_func_array($data, [$controller]);
    }

}

$router= new Routes();
require base_path('Route/web.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['method'] ?? $_SERVER['REQUEST_METHOD'];
//echo $method;

$router->router($uri, $method, );

// Define parameters


//    call_user_func('test');

