<?php

namespace Core;



class Routes
{
    protected $routes = [];
//    public $auth;

// global variable


    public function add($method, $url, $controller)
 {
    $this->routes[] = [
        'uri' => $url,
        'controller' => $controller,
        'method' => $method,
//        'function' => $function,
        'Middleware' => null,
    ];
    return $this;
}

//get all routes

    public function get($url, $controller)
{

    return $this->add('GET', $url, $controller);
}

    public function Post($url, $controller)
{
    return $this->add('POST', $url, $controller);
}

    public function put($url, $controller)
{
    return $this->add('PUT', $url, $controller);
}
public function patch($url, $controller,$function)
{
    return $this->add('PATCH', $url, $controller);
}

    public function delete($url, $controller)
{
    return $this->add('DELETE', $url, $controller);
}
public function auth($key)
{
    $this->routes[array_key_last($this->routes)]['Middleware'] = $key;
}


//valid  ROUTER check
    public function router($url, $method)
    {
        foreach ($this->routes as $route) {
            /** @var resource $route */
            if ($route['method'] === $method  && $route['uri'] === $url) {
                $path = explode("/", $url)[1];
              require base_path('/Core/Middlewares/Middleware.php');
                return call_user_func($route['controller'], "");


//                include base_path('/Http/Controller/' . $route['controller']) ?? $this->Abord();
//                $route['function']();`
//                return;
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

    public function redirect($view = null, $attributes = [])
    {
        $layout = ($this->Layout());
        $views = ($this->render($view, $attributes));
        echo str_replace('{{__contain}}', $views, $layout);
    }


    public function Layout()
    {

        ob_start();
         if($_SESSION['__route']["Auths"]==="Admin")
         {
             include __DIR__ . '/../View/BackEnd/index.php';

         }
         if($_SESSION['__route']["Auths"]==="Auth" || $_SESSION['__route']["Auths"]==="Guest")
         {
             include __DIR__ . '/../View/index.php';
         }
        return ob_get_clean();
    }


////
    public function render($view = null, $attributes = [])
    {
        ob_start();
        extract($attributes);
        include __DIR__ . '/../View/' . $view;
        return ob_get_clean();

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

