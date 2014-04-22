<?
namespace Moxy\Patterns;
/**
 * An Event Observer Patter
 *
 * @author  Tom Morton <tom@errant.me.uk>
 */
abstract class Observer {

    /**
     * Stores the Observer Uniqid
     * 
     * @var string
     */
    protected $observerUniqid;

    /**
     * Creates an Observer Uniqid
     *
     * Each object recieves a uniqid so that
     * bindings can be unique to that object
     */
    protected function createObserverUniqid()
    {
        if(!$this->observerUniqid) {
            $this->observerUniqid = uniqid();
        }
    }

    /**
     * Observe All Events on this Object
     * 
     * @param  Callable $callable PHP valid callback
     */
    public function observe($callable)
    {
        $this->createObserverUniqid();
        \Moxy\Event::bind($this->observerUniqid, $callable);
    }

    /**
     * Bind to a specific event on this Object
     * 
     * @param  string   $name       Event Name
     * @param  callable $callable   PHP valid callback
     */
    public function bind($name, $callable)
    {
        $this->createObserverUniqid();
        \Moxy\Event::bind($this->observerUniqid . '.' . $name, $callable);
    }

    /**
     * Alias for ::bind
     */
    public function on($name,$callable) 
    {
        $this->bind($name, $callable);
    }

    /**
     * Emit an Event
     *
     * Also calls a global object event based on its uniqid
     * 
     * @param  string $name       Event Name
     * @param  array  $context    Optional array of Event data
     */
    public function emit($name,$context=array())
    {
        $context = array_merge($context,array('class' => $this, 'event' => $name));
        \Moxy\Event::trigger($this->observerUniqid . '-' . $name, $context);
        \Moxy\Event::trigger($this->observerUniqid, $context);
    }

    /**
     * Alias for ::emit
     */
    public function trigger($name, $context=array())
    {
        $this->emit($name, $context);
    }
}