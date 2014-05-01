<?
namespace Moxy\Field;
/**
 * Integer Type Field Object
 * 
 * @author  Tom Morton <tom@errant.me.uk>
 */
class Integer extends \Moxy\Field\Type  {

    public function __construct($options=array())
    {
        parent::__construct(array_merge($options, array('type' => 'integer')));
    }

}