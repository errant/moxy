<?
namespace Moxy\Interfaces;
/**
 * Model Interface
 *
 * @author  Tom Morton
 */
interface Model {

    /*public function getDatasource();
    public function __get($name);
    public function __set($name, $value);
    public function __unset($name);*/
    
    public function save(\Datasource $datasource);
}