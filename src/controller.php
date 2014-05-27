<?php
namespace Moxy;

abstract class Controller {

    public function __construct($request,$response,$container) {
        $this->request = $request;
        $this->response = $response;
        $this->container = $container;
        $this->template = new \Moxy\Template;

        $this->init();
    }

    abstract public function init();

}