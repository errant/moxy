<?
namespace Moxy;
/**
 * Model Object
 *
 * @author  Tom Morton <tom@errant.me.uk>
 */
class Model implements Interfaces\Model {

    protected $fields;

    public function __construct($fields)
    {
        if(!is_array($fields)) {
            throw new \Exception('Model fields list must be an array: ' . get_class());
        }

        $this->fields = $fields;
    }

    public function __get($name)
    {
        return $this->fields[$name]->get();
    }

    public function __set($name,$value)
    {
        $this->fields[$name]->set($value);
    }

    public function populate($data)
    {
        foreach($data as $name => $value)
        {
            $this->fields[$name]->populate($value);
        }
    }

    public function retrieve()
    {
        $data = array();

        foreach($this->fields as $name => $field) {
            $data[$name] = $field->retrieve();
        }

        return $data;
    }

    public function save(\Interfaces\Datasource $datasource)
    {
        $datasource->store($this->retrieve());
    }
}