<?
namespace Moxy;
/**
 * Field Object
 *
 * @author  Tom Morton <tom@errant.me.uk>
 */
class Field {

    protected $value;

    protected function parseOption($options,$option,$errorMessageOnMissing=false)
    {
        if(array_key_exists($option,$options)) {
            $this->$option = $options[$option];
            return $this;
        }

        if($errorMessageOnMissing) {
            throw new \Exception('Field Error: ' . get_class() . ' ' . $errorMessageOnMissing);
        }
    }

    public function populate($value)
    {
        $this->value = $value;
    }

    public function retrieve($value)
    {
        return $this->value;
    }

    public function get()
    {
        return $this->value;
    }

    public function set($value)
    {
        $this->value = $value;
    }

}