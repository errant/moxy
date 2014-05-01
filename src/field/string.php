<?
namespace Moxy\Field;
/**
 * String Type Field Object
 * 
 * @author  Tom Morton <tom@errant.me.uk>
 */
class String extends \Moxy\Field\Type  {

    public function __construct($options=array())
    {
       parent::__construct(array_merge($options, array('type' => 'string')));
    }

}