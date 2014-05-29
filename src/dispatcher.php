<?
namespace Moxy;

class Dispatcher {

    protected $namespace;
    protected $container;
    protected $middleware = array();

    public function __construct($namespace, $container)
    {
        $this->namespace = $namespace;
        $this->container = $container;
    }

    private function constructAction($request) 
    {
        return $request->action ?  $request->action . 'Action' : 'indexAction';
    }

    public function applyMiddleware($middleware)
    {
        $this->middleware[] = $middleware;
    }

    public function controllerRoute($request,$response) 
    {
        $controllerClass = $this->namespace . '\\Controllers\\' . ucfirst($request->controller);

        if(!class_exists($controllerClass)) {
            $controllerClass = '\Moxy\Controller\Error';
            $action = 'code404';
        }

        $controller = new $controllerClass($request,$response,$this->container);

        $action = $this->constructAction($request);

        if(!method_exists($controller,$action)) {
            $controller = new \Moxy\Controller\Error($request,$response,$this->container);
            $action = 'code404';
        }

        foreach($this->middleware as $middleware) {
            if(!$middleware->dispatch($request,$response)) {
                return;
            }
        }

        call_user_func(array($controller,$action));

        $response->send();
    }

    public function defaultRoute($request,$response)
    {
        if(!$request->controller) {
          $request->controller = 'main';
        }

        return $this->controllerRoute($request,$response);
    }
}