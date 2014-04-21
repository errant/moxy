<?
namespace Moxy\Interfaces;
/**
 * Middleware Interface
 *
 * @author  Tom Morton
 */
interface Middleware {

    public static function dispatch($request, $response);
}