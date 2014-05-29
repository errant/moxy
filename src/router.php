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
        $request = \Klein\Request::createFromGlobals();

        foreach($this->middleware as $middleware) {
            if(!$middleware->dispatch($request)) {
                return;
            }
        }

        parent::dispatch($request, $response);
    }

    public function applyMiddleware($middleware)
    {
        $this->middleware[] = $middleware;
    }
}