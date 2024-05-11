<?php 
declare(strict_types=1);
namespace app;
use \app\Exceptions\RouteNotFoundException;

class Router
{   
    //array com as possíveis rotas do site
    private array $routes;

    //Método para registrar uma rota do site
    public function register(string $route, callable|array $action):self
    {
        $this->routes[$route] = $action;
        return $this;
    }

    //Método para executar a ação de acordo com a Url
    public function resolve(string $requestUri)
    {
        $route = explode('?', $requestUri)[0];
        $action = $this->routes[$route] ?? null;

        if (! $action){
            throw new RouteNotFoundException();
        }

        if (is_callable($action)){
            return call_user_func($action);
        }

        if (is_array($action)){
            [$class, $method] = $action;

            if (class_exists($class)){
                $class = new $class();
            }

            if (method_exists($class,$method)){
                return call_user_func_array([$class, $method], []);
            }
        }

        throw new RouteNotFoundException();
        
    }
}
?>