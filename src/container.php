<?php
namespace Moxy;

class Container extends Config {

    protected $services = array();
    protected $serviceInterfaces = array();

    public function createService($name,$callable) {
        $this->services[$name] = $callable;
    }

    public function getService($name) {
        if(!isset($this->services[$name])) {
            throw new \Moxy\Exception('No service set up for name: ' . $name);
        }
        
        if(!isset($this->serviceInterfaces[$name])) {
            $this->serviceInterfaces[$name] = call_user_func($this->services[$name],$this);
        }

        return $this->serviceInterfaces[$name];
    }
}