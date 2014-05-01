<?
namespace Moxy\Interfaces;
/**
 * Datasource Interface
 *
 * @author  Tom Morton
 */
interface Datasource {

    public function create($data);
    public function update($primaryKey, $data);
}