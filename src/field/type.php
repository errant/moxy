<?
namespace Moxy\Field;
/**
 * Type Field Object
 *
 * Clever Class that can emulate any normal PHP type
 * 
 * @author  Tom Morton <tom@errant.me.uk>
 */
class Type extends \Moxy\Field implements \Moxy\Interfaces\Field {

    // Options
    protected $type;
    protected $allowNull;

    public function __construct($options)
    {
       $this->parseOption($options,'type','Must specify a type');
       $this->parseOption($options,'allowNull');
    }

    public function set($value)
    {
        if(gettype($value) != $this->type && (is_null($value) && !$this->allowNull)) {
            throw new \Exception('Invalid type for field');
        }

        parent::set($value);
    }

}