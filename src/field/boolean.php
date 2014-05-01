<?
namespace Moxy\Field;
/**
 * Boolean Type Field Object
 * 
 * @author  Tom Morton <tom@errant.me.uk>
 */
class Boolean extends \Moxy\Field\Type  {

    public function __construct($options=array())
    {
       parent::__construct(array_merge($options, array('type' => 'boolean')));
    }

}