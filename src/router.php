<?php
namespace Moxy;

class Router implements \Moxy\Interfaces\Service {

    protected static $router;
    protected $middleware = array();

    public static function create($container)
    {
        if(!self::$router) {
            self::$router = new \Klein\Klein;
        }
        return self::$router;
    }

    public function respond($HTTPMethod, $route, $callable) 
    {
        self::$router->response($HTTPMethod, $route, $callable);
    }

    public function dispatch()
    {
        foreach($this->middleware as $middleware) {
            if(!$middleware->dispatch(self::$router->request(),self::$router->response())) {
                return;
            }
        }
        self::$router->dispatch();
    }

    public function applyMiddleware($middleware)
    {
        $this->middleware[] = $middleware;
    }
}