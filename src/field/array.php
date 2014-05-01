<?
namespace Moxy\Field;
/**
 * Array Type Field Object
 * 
 * @author  Tom Morton <tom@errant.me.uk>
 */
class Array extends \Moxy\Field\Type  {

    public function __construct($options=array())
    {
       parent::__construct(array_merge($options, array('type' => 'array')));
    }

    public function retrieve()
    {
        return serialize($this->value);
    }

    public function populate($value)
    {
        parent::populate(unserialize($value));
    }

}