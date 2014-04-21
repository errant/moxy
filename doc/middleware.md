# Middleware

Moxy implements a very lightweight, pluggable Middleware. All custom Middleware should extend \Moxy\Middleware and implement the interface \Moxy\Interfaces\Middleware. Your middleware must implement a "dispatch" method, which accepts two parameters - Request and Response. 

Returning anything that equates to false will end execution. Any other return will continue execution.

    class MyCustomMiddleware extends \Moxy\Middleware implements \Moxy\Interfaces\Middleware {
        public function dispatch($request,$resonse) { ... }
    }

Middleware is added to the execution by calling "applyMiddleware" on the Application instance. Middleware is executed in the order it is applied.

    $app = new \Moxy\Moxy;

    $app->applyMiddleware(new MyCustomMiddleware);

