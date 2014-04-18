<?
namespace Moxy\Interfaces\Route;
/**
 * Route Parser Interface
 *
 * Outline interface for various ways to parse
 * routing information
 *
 * @author  Tom Morton
 */
interface Parser {

    /**
     * Parse Route
     * 
     * @param  string $routeString
     * @return boolean
     */
    public function parse($routeString);

    public function add($route,$callable=null);
}