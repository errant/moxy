<?
namespace Moxy;

class Moxy extends Container {

    public function __construct()
    {
        \Moxy\Middleware::setApplication($this);
        $this->createService('router',array('\Moxy\Router','create'));
    }

    public function __get($name)
    {
        return $this->getService($name);
    }

}