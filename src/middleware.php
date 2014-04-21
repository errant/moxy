<?
namespace Moxy;

class Middleware {

    protected static $application;

    public static function setApplication($application) 
    {
        self::$application = $application;
    }
}