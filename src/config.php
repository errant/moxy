<?php
namespace Moxy;

class Config implements \ArrayAccess {

    public $config = array();

    public function __construct($fileName='config')
    {
        $this->loadFile($fileName);
    }

    public function loadFile($fileName)
    {
        $filePath = $fileName . '.php';
        $config = require $filePath;

        $this->config = array_merge($this->config,$config);
    }
    
    public function offsetExists($offset)
    {
        return isset($this->config[$offset]);
    }

    public function offsetGet($offset)
    {
        return isset($this->config[$offset]) ? $this->config[$offset] : null;
    }

    public function offsetSet($offset,$value)
    {
        $this->config[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        unset($this->config[$offset]);
    }


}