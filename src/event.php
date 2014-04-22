<?
namespace Moxy;

class Event {

    protected static $events = array();

    public static function bind($name, $callback)
    {
        if(!isset(self::$events[$name])) {
            self::$events[$name] = array();
        }

        self::$events[$name][] = $callback;
    }
    
    public static function trigger($name, $context=array())
    {
        if(isset(self::$events[$name])) {
            foreach(self::$events[$name] as $callback) {
                call_user_func($callback, $name, $context);
            }
        }
    }
}