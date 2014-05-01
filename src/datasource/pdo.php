<?
namespace Moxy\Datasource;
/**
 * PDO Datasource Object
 *
 * @author  Tom Morton <tom@errant.me.uk>
 */
class PDO implements Interfaces\Datasource {

    protected $table;

    public function update($primaryKey,$data)
    {
        // Update
    }

    public function create($data)
    {
        // First time
    }
}