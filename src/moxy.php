<?
namespace Moxy;
/**
 * The Main Moxy Application Container
 *
 * Functions as:
 *     - A DI container (inherits \Moxy\Container)
 *     - An observable (inherits \Moxy\Patterns\Observer)
 *     - A config hanlder (inherits \Moxy\Config)
 */
class Moxy extends Container {

    public function __construct()
    {
        // Inject self into the Middleware object
        \Moxy\Middleware::setApplication($this);
        // Fix Observer ID to moxy
        $this->observerUniqid = 'moxy';
        // The router as a service
        $this->createService('router',array('\Moxy\Router','create'));
        // Emit startup event
        $this->emit('init');
    }

    public function __get($name)
    {
        return $this->getService($name);
    }

}