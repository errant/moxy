<?php
namespace Moxy;
/**
 * Extends the Klien Router to implement Middleware
 *
 * @author  Tom Morton <tom@errant.me.uk>
 */
class Router extends \Klein\Klein implements Interfaces\Service {

    protected $middleware = array();

    public static function create($container)
    {
        return new self;
    }

    public function dispatch()
    {
        foreach($this->middleware as $middleware) {
            if(!$middleware->dispatch(self::$router->request(),self::$router->response())) {
                return;
            }
        }
        parent::dispatch();
    }

    public function applyMiddleware($middleware)
    {
        $this->middleware[] = $middleware;
    }
}